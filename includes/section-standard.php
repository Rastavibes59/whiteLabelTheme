<?php if (have_posts()) : while (have_posts()) : the_post();

        $nav = get_field('navigation');
        $field_type= get_field('type');

?>


        <!-- SECTION JUMBOTRON -->

        

        <?php get_template_part(
                'includes/common/jumbotron',
                '',
                array(
                    'id'                => 'parallax_jumbo',
                    'class'             => 'jumbotron pt-100 md-pt-50 flex column justify-center align-center',
                    'arbitrary_data'    => array(
                        'background'    => get_field('bg'),
                        'depth'         => get_field('depth'),
                        'text'          => get_field('text'),
                        'logo'          => get_field('logo'),
                        'size'          => 'standard',
                        'picture'       => get_field('background_image'),
                        'title'         => get_the_title(),
                        'video'         => get_field('video'),
                        'mobile_placeholder' => get_field('image_mobile'),
                        'mask_color'    => get_field('mask_color'),

                    ),
                )
            );
        ?>




        <?php $navItems = array(); ?>

        <!-- SECTION NAV -->
        <?php if (have_rows('sections')) : 
            while (have_rows('sections')) : the_row();

                $index = get_row_index();
                $title = get_sub_field('title');

                array_push($navItems, [$index, $title]);
            endwhile;
        endif; ?>


        <?php if ($nav == true) : ?>
            <ul class="anchorNav wave flex justify-center align-center pt-30 pb-30 bg-white mb-50 gap-30">

                <?php foreach ($navItems as $navItem) : ?>
                    <li><a href="#section-<?php echo $navItem[0]; ?>" class="btn secondary"><?php echo $navItem[1] ?></a></li>
                <?php endforeach; ?>

            </ul>
        <?php endif; ?>

        <!-- SECTION BUILDER -->

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
                $field_type = get_field('type');
   
                ?>
        
                    <section id="section-<?php echo $section_number ?>" class="<?php if ($background_type == 'color') : ?>bg-<?php echo $couleur_de_fond; endif; ?> bg-<?php echo $background_type; ?> <?php if($field_type == 'none' || !$field_type && $section_number == 0) : ?>pt-130 pb-70 <?php elseif ($actual_section == $old_section) : ?> pt-0 pb-70 <?php else :  ?> pt-50 pb-70 <?php endif; ?> md-pt-30 md-pb-30 " <?php if ($background_type == 'picture') : ?>style="background-image: url(<?php echo get_sub_field('background_image')['url'] ?>);" <?php endif; ?>>
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




    <?php endwhile;
endif; ?>

