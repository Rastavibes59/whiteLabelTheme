<?php get_header();
/*
Template Name: PAGE PROGRAMMATION
Template Post Type: page
*/

?>



<!-- SECTION JUMBOTRON -->

<?php if (get_field('background_image')) :

    $isJumbo = true;

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

<!-- SECTION BLOG  -->


<section class="bg-white pt-150 pb-60 mt-pt-70">

    <?php

    $args = array(
        'post_type'         => 'programmation',
        //'orderby' => get_post_meta($post->ID, 'date', true),
        'order' => 'ASC',
        'posts_per_page'    => -1,
        'cat'               => isset($_GET['date']) ? $_GET['date'] : '',
    );
    $query = new WP_Query($args);

    $cats = get_categories($args);

    $now = date("d-m-Y h:i");
    ?>

    <div class="container grid cols-4 md-cols-1 gap-15 w-100p mb-50">
        <div class="colspan-3 flex column justify-flex-start align-flex-start mb-60">
            <h1 class="archiveTitle fc-secondary text-left mb-15"><?php the_field('title') ?></h1>
            <h2 class="archiveTitle fc-secondary text-left size-h3"><?php the_field('subtitle') ?></h2>
        </div>
        <form class="archiveFilters flex row justify-center align-center" method="GET" action="<?php echo esc_url(home_url('/programmation')); ?>">
            <div class="form-row mt-10">
                <div class="form-field flex column justify-flex-start align-flex-start">
                    <label for="type" class="mb-5">Filter par Date</label>
                    <select name="date" id="date" onchange="console.log('changed')">
                        <option value="" <?php !isset($_GET['date']) || $_GET['date'] == '' ? 'selected' : ''; ?>>Week-end</option>

                        <?php foreach ($cats as $cat) :
                            if (isset($_GET['date']) && $_GET['date'] == $cat->term_id) {
                                $selected = 'selected';
                            } else {
                                $selected = '';
                            }
                        ?>
                            <option value="<?php echo $cat->term_id; ?>" <?php echo $selected ?>><?php echo $cat->cat_name; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        </form>

    </div>
    <ul class="container grid md-cols-1 cols-4 gap-15 archive programmation animate">

        <?php
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                $index = $query->current_post;
                get_template_part(
                    'includes/common/archive',
                    'programmation',
                    array(
                        'class'             => 'animate fade-in slide-left slow delay-' . $index . '00ms',
                        'arbitrary_data'    => array(
                            'title'         => get_the_title(),
                            'thumbnail'     => get_the_post_thumbnail_url($query->ID, 'thumbnail'),
                            'link'          => get_permalink(),
                        ),
                    )
                );

            endwhile;
        else : ?>

            <p class="size-big colspan-4 md-colspan-1 text-center">AUCUN RESULTAT POUR VOTRE RECHERCHE</p>
        <?php endif;
        wp_reset_query();
        ?>

    </ul>

    <?php
        
        if (have_rows('sections')) : 
            $section_number = 0;
            $old_section = '';

            while (have_rows('sections')) : the_row(); 
            
                $content_width = get_sub_field('content_width');
                $background_type = get_sub_field('background_type');

                if ($background_type == 'color') :
                    $couleur_de_fond = get_sub_field('couleur_de_fond');
                    $actual_section = get_sub_field('couleur_de_fond');
                elseif ($background_type == 'picture') :
                    $background_image = get_sub_field('background_image');
                    $actual_section = get_sub_field('background_image');
                endif;

                $title = get_sub_field('title'); 
                $decorated = get_sub_field('decorated');
                $field_type = get_field('type'); 
                ?>
        
                    <section    id="section-<?php echo $section_number ?>"
                                class="
                                    <?php if ($background_type == 'color') : ?>bg-<?php echo $couleur_de_fond; endif; ?> 
                                    bg-<?php echo $background_type; ?> 
                                    <?php if($field_type == 'none' || !$field_type && $section_number == 0) : ?>noJumbo pb-70 <?php elseif ($actual_section == $old_section) : ?> pt-0 pb-70 <?php else :  ?> pt-50 pb-70 <?php endif; ?> 
                                    <?php if ($decorated == true) : ?>decorated<?php endif;?>
                                    md-pt-30 md-pb-30 
                                    " 
                                <?php if ($background_type == 'picture') : ?>style="background-image: url(<?php echo get_sub_field('background_image')['url'] ?>);" <?php endif; ?>>
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
                            $section_number++;

            $old_section = $actual_section;
            endwhile; 
        endif;
        wp_reset_query();

        ?>

</section>

<?php get_footer(); ?>