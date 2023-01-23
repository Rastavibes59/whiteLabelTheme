<?php

/*
Template Name: Archive
Template Post Type: page
*/

get_header(); 

$postID = get_the_ID();
$categories = get_categories( );


?>

<!-- SECTION JUMBOTRON -->

<?php if (get_field('background_image')) :

    get_template_part(
        'includes/common/jumbotron',
        '',
        array(
            'class'             => '',
            'arbitrary_data'    => array(
                'size'          => 'standard',
                'picture'       => get_field('background_image'),
                'title'         => get_the_title(),
            ),
        )
    );
endif; ?>


    <!-- SECTION BREADCRUMBS -->


    <?php

    if(get_field('background_image')) {
        $isJumbo = true;
    } else {
        $isJumbo = false;
    }
    
    get_template_part('includes/common/breadcrumbs', '',
        array(
            'class'             => '',
            'arbitrary_data'    => array(
                'isJumbo'          => $isJumbo,
            ),
        )
    ); 
    ?>

<!-- SECTION BLOG  -->

<?php 
    $page_title= get_the_title();

    $args = array(
        'post_type'         => get_archive_post_type(),
        'orderby'           => get_the_date(),
        'order'             => 'ASC',
        'posts_per_page'    => 12,
        );

    $query = new WP_Query( $args );   
      
?>



<section class="bg-transparent pt-100 pb-100 md-pb-50">
    <div class="container grid cols-12 md-cols-1 gap-15">
        <h2 class="colspan-12 md-colspan-1"><?php echo $page_title; ?></h2>
        <ul class="colspan-9 md-colspan-1 grid md-cols-1 cols-3 gap-15 archive">
            <?php if($query->have_posts() ) : 
                while($query->have_posts() ) : 
                    
                    $query->the_post();                    
                        get_template_part(
                            'includes/common/article',
                            'item',
                            array(
                                'class'             => 'blog',
                                'arbitrary_data'    => array(
                                    'title'         => get_the_title(),
                                    'thumbnail'     => get_the_post_thumbnail_url(),
                                    'date'          => get_the_date('d/m/Y'),
                                    'link'          => get_permalink(),
                                ),
                            )
                        );

            
                endwhile;
            else : ?>
                <p class="size-big colspan-4 md-colspan-1 text-center">AUCUN ARTICLE POUR L'INSTANT</p>
                <?php endif;
                    wp_reset_postdata();
                ?>
        </ul> 
        <aside class="colspan-3 lg-colspan-1  flex column">
            <div class="flex column justify-flex-start align-flex-start p-20 blogAside">
                <h3 class="xs-mt-40 mb-20">Informations :</h3>

                <div class="flex column justify-flex-start align-center mt-30">
                <?php if( !empty($categories)) : ?>
                    <div class="flex column justify-flex-start align-center mt-30">
                        <p class="size-regular fw-700 mb-00">Catégories : </p>
                        <ul class="tagList flex row justify-flex-start align-center gap-15">
                        <?php foreach($categories as $category) : ?>
                            <li class="tagList-item p-5"><a href="<?php echo get_home_url(); ?>/category/<?php echo $category->slug; ?>" class="montserrat fw-700"><?php echo $category->name; ?></a></li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
               
                </div>
            </div>
        </aside>
    </div>


</section>

        <!-- SECTION BUILDER -->

        <?php if (have_rows('sections')) : 
            $sections_number = 0;
            while (have_rows('sections')) : the_row();
                $sections_number++;
            endwhile;
        endif;

        
        if (have_rows('sections')) : 
            $section_number = 0;
            $old_section = '';

            while (have_rows('sections')) : the_row(); 
            
                $content_width = get_sub_field('content_width');
                $background_type = get_sub_field('background_type');
                $section_number++;

                if ($background_type == 'color') :
                    $couleur_de_fond = get_sub_field('couleur_de_fond');
                    $actual_section = get_sub_field('couleur_de_fond');
                elseif ($background_type == 'picture') :
                    $background_image = get_sub_field('background_image');
                    $actual_section = get_sub_field('background_image');
                endif;

                $title = get_sub_field('title'); ?>
        
                    <section class="<?php if ($background_type == 'color') : ?>bg-<?php echo $couleur_de_fond; endif; ?> bg-<?php echo $background_type; ?> <?php if ($actual_section == $old_section) : ?> pt-0 pb-70 <?php else :  ?> pt-50 pb-70 <?php endif; ?> md-pt-30 md-pb-30 " <?php if ($background_type == 'picture') : ?>style="background-image: url(<?php echo get_sub_field('background_image')['url'] ?>);" <?php endif; ?>>
                        <h2 class="container text-center"><?php echo $title ?></h2>

                        <?php 
                        if (have_rows('ligne')) :
                            while (have_rows('ligne')) : the_row(); ?>

                            <div class="<?php if ($content_width == 'center') : ?>container <?php endif; ?>grid md-cols-1 cols-12 gap-30 mt-30">
                
                                <?php 
                                if (have_rows('colonnes')) : 
                                    $columns_number = 0;
                                    while (have_rows('colonnes')) : the_row();
                                        $columns_number++;
                                    endwhile;
                                endif;
                    
                                if (have_rows('colonnes')) : ?>


                                    <?php while (have_rows('colonnes')) : the_row();
                                        if( get_row_layout() == 'colonne' ): 

                                            if($columns_number == 1) :
                                                $column_size = '12';
                                            elseif($columns_number == 2) :
                                                $column_size = get_sub_field('column_size')[0];
                                            elseif($columns_number == 3) :
                                                $column_size = get_sub_field('column_size')[0];
                                            elseif($columns_number == 4) :
                                                $column_size = '3';
                                            endif;
                                        endif;
                                    ?>


                                    <div class="flex column justify-flex-start align-center gap-20 colspan-<?php echo $column_size; ?> md-colspan-1">

                                        <?php if (have_rows('content')) : $countItems = 0;
                                            while (have_rows('content')) : the_row();
                                                    $sliderpictures = array();
                                                    
                                                    if (have_rows('slider')) :                                                 

                                                        while (have_rows('slider')) : the_row();

                                                        $sliderpictures[] = get_sub_field('slider_picture');

                                                        endwhile;
                                                    endif;

                                                get_template_part(
                                                    'includes/common/' . get_row_layout(),
                                                    '',
                                                    array(
                                                        'class' => 'animate fade-in slide-up slow delay-' . $countItems . '00ms',
                                                        'arbitrary_data' => array(
                                                            'text' => get_sub_field('text'),
                                                            'columnsNumber' => get_sub_field('textColumns_number'),
                                                            'picture' => get_sub_field('picture'),
                                                            'rounded' => get_sub_field('rounded'),
                                                            'video' => get_sub_field('video_link'),
                                                            'slider' => $sliderpictures,
                                                            'button' => get_sub_field('button'),
                                                            'shortcode' => get_sub_field('shortcode'),
                                                            'custom-posts' => get_sub_field('custom_posts'),
                                                            'blog-posts' => get_sub_field('blog_posts'),
                                                            'html' => get_sub_field('html'),
                                                            'faq' => get_sub_field('faq'),
                                                        ),
                                                    )
                                                );
                                                $countItems++;

                                            endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                    <?php endwhile;
                                endif; ?>

                            </div>

                            <?php 
                            endwhile;
                        endif;
                        ?>
                    </section>

            <?php
            $old_section = $actual_section;
            endwhile; 
        endif;
        get_footer(); ?>