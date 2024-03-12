<?php if (have_posts()) : ; while (have_posts()) : the_post(); ?>


        <!-- SECTION JUMBOTRON -->

        

        <?php get_template_part(
                'includes/common/jumbotron',
                '',
                array(
                    'id'                => 'parallax_jumbo',
                    'class'             => 'jumbotron pt-100 lg-pt-50 flex column justify-center align-center',
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
                        'section_mask'    => get_field('section_mask'),
                        'section_mask_color'    => get_field('section_mask_color')
        
                    ),
                )
            );
        ?>


        <!-- SECTION BUILDER -->

        <?php
        
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

                $title = get_sub_field('title'); 
                $deportedTitle = get_sub_field('deported'); 
                $decorated = get_sub_field('decorated');
                $sectionMask = get_sub_field('section_mask');
                $sectionMaskColor = get_sub_field('section_mask_color');
                ?>

                        <?php if ($sectionMask = true) : ?>
                            <style>

                                #section-<?php echo $section_number; ?>::before {
                                    background-color: <?php echo $sectionMaskColor; ?> !important;
                                }
                            </style>

                        <?php endif; ?>
        
                    <section    id="section-<?php echo $section_number ?>"
                                class="
                                <?php if ($background_type == 'color') : ?>bg-<?php echo $couleur_de_fond; endif; ?> 
                                bg-<?php echo $background_type; ?> 
                                <?php if ($actual_section == $old_section) : ?> pt-00 pb-70 <?php else :  ?> pt-50 pb-70 <?php endif; ?> 
                                <?php if ($decorated == true) : ?>decorated<?php endif;?>
                                lg-pt-30 lg-pb-30 "
                                <?php if ($background_type == 'picture') : ?> style="background-image: url(<?php echo get_sub_field('background_image')['url'] ?>);" <?php endif; ?>
                        >
                        <h2 class="container text-center <?php $deportedTitle == true ? 'deported' : ''; ?>"><?php echo $title ?></h2>

                        <?php 
                        if (have_rows('ligne')) :
                            while (have_rows('ligne')) : the_row(); ?>

                            <div class="<?php if ($content_width == 'center') : ?>container <?php endif; ?>grid lg-cols-1 cols-12 gap-30 mt-30">
                
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


                                    <div class="flex column justify-flex-start align-center gap-20 colspan-<?php echo $column_size; ?> lg-colspan-1">

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
                                                            'frame' => get_sub_field('frame'),
                                                            'picture' => get_sub_field('picture'),
                                                            'rounded' => get_sub_field('rounded'),
                                                            'is-link' => get_sub_field('is_link'),
                                                            'picture-link' => get_sub_field('picture_link'),
                                                            'newTab' => get_sub_field('new_tab'),
                                                            'video' => get_sub_field('video_link'),
                                                            'slider' => $sliderpictures,
                                                            'button' => get_sub_field('button'),
                                                            'icon-button' => get_sub_field('icon_button'),
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
        endif; ?>



        <?php 
        endwhile;
endif; ?>