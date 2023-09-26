<?php if (have_posts()) : ; while (have_posts()) : the_post(); ?>


        <!-- SECTION JUMBOTRON -->

        

        <?php  if(get_field('type') == 'video') :
                    get_template_part(
                        'includes/home/section',
                        'video',
                        array(
                            'id'                => 'parallax_jumbo',
                            'class'             => 'jumbotron pt-100 md-pt-50 home flex column justify-center align-center',
                            'arbitrary_data'    => array(
                                'background'    => get_field('bg'),
                                'text'          => get_field('text'),
                            ),
                        )
                    );
                elseif (get_field('type') == 'parallax') :
                    get_template_part(
                        'includes/home/section',
                        'parallax',
                        array(
                            'id'                => 'parallax_jumbo',
                            'class'             => 'jumbotron pt-100 md-pt-50 home flex column justify-center align-center',
                            'arbitrary_data'    => array(
                                'background'    => get_field('bg'),
                                'depth'         => get_field('depth'),
                                'text'          => get_field('text'),
                                'logo'          => get_field('logo'),
                            ),
                        )
                    );        
                endif;
        ?>

        <!-- SECTION CUSTOM POSTS -->

        <section class="bg-white pb-60 ">

            <?php
                $args = array(
                    'post_type'         => 'programmation',
                    'meta_key'          => 'date',
                    'orderby'			=> 'meta_value',
                    'order'             => 'ASC',
                    'posts_per_page'    => -1,
                    );
                $query = new WP_Query( $args ); 
                
                $numCols = $query -> post_count;
                $countArtists = 0;

            ?>

            <div class="container grid md-cols-1 cols-4 gap-15 archive artistes pt-60 animate">

            <h2 class="text-center colspan-4 md-colspan-1">Samedi 9 & Dimanche 10 septembre</h2>
            <h3 class="text-center colspan-4 md-colspan-1 mb-30">2 jours | 24 artistes | 14h - 00h</h3>
                
            <?php if($query->have_posts() ) : while($query->have_posts() ) : $query->the_post();

                    if(get_field('headliner') == true && $countArtists < 8) {
                        
                        get_template_part(
                            'includes/common/archive',
                            'item',
                            array(
                                'class'             => 'animate fade-in slide-left slow delay-' . $countArtists . '00ms',
                                'arbitrary_data'    => array(
                                    'title'         => get_the_title(),
                                    'thumbnail'     => get_the_post_thumbnail_url( $query->ID, 'thumbnail'),
                                    'link'          => get_permalink(),
                                ),
                            )
                        );
                        $countArtists++;
                    }


                
            endwhile; endif; 
            wp_reset_query();
            ?>
                <div class="container grid cols-2 md-cols-1 w100-p gap-30 colspan-4 md-colspan-1 mt-50">

                    <?php               
                    if (have_rows('boutons')) : 
                        while (have_rows('boutons')) : 
                            the_row(); ?>

                        <a href="<?php echo get_sub_field('link') ?>" class="btn fifth big fullWidth "><?php echo get_sub_field('text') ?></a>

                    <?php endwhile;
                    endif; ?>

                </div>

            </div>
        </section>

        <!-- SECTION NEW BUILDER -->

                <?php if (have_rows('sections')) : 
            $sections_number = 0;
            while (have_rows('sections')) : the_row();
                $sections_number++;
            endwhile;
        endif;
        
        if (have_rows('sections')) : 
            $section_number = 0;
            while (have_rows('sections')) : the_row(); 
            
                $content_width = get_sub_field('content_width');
                $background_type = get_sub_field('background_type');
                $section_number++;

                if ($background_type == 'color') :
                    $couleur_de_fond = get_sub_field('couleur_de_fond');
                elseif ($background_type == 'picture') :
                    $background_image = get_sub_field('background_image');
                endif;

                $title = get_sub_field('title');
        
                if ($content_width == 'fluid') : ?>

                    <section class="grid md-cols-1 cols-12 gap-30 <?php if ($background_type == 'color') : ?>bg-<?php echo $couleur_de_fond; endif; ?> bg-<?php echo $background_type; ?> pt-100 pb-100" <?php if ($background_type == 'picture') : ?>style="background-image: url(<?php echo get_sub_field('background_image')['url'] ?>);" <?php endif; ?>>

                <?php elseif ($content_width == 'center') : ?>

                    <section class="<?php if ($background_type == 'color') : ?>bg-<?php echo $couleur_de_fond; endif; ?> bg-<?php echo $background_type; ?> pt-80 pb-80 md-pt-30 md-pb-30 " <?php if ($background_type == 'picture') : ?>style="background-image: url(<?php echo get_sub_field('background_image')['url'] ?>);" <?php endif; ?>>

                        <div class="container grid md-cols-1 cols-12 gap-30">
                <?php endif; 
                    
                            if (have_rows('colonnes')) : 
                                $columns_number = 0;
                                while (have_rows('colonnes')) : the_row();
                                    $columns_number++;
                                endwhile;
                            endif;
                
                            if (have_rows('colonnes')) : ?>

                                <h2 class="text-center colspan-12 md-colspan-1"><?php echo $title ?></h2>

                                <?php while (have_rows('colonnes')) : the_row();

                                        if( get_row_layout() == 'colonne' ): 

                                            if($columns_number == 1) :
                                                $column_size = '12';
                                            elseif($columns_number == 2) :
                                                $column_size = get_sub_field('column_size')[0];
                                            elseif($columns_number == 3) :
                                                $column_size = '4';
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
                                                        'video' => get_sub_field('video_link'),
                                                        'slider' => $sliderpictures,
                                                        'button' => get_sub_field('button'),
                                                        'shortcode' => get_sub_field('shortcode'),
                                                        'custom-posts' => get_sub_field('custom_posts'),
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

                        <?php if ($content_width == 'center') : ?>

                        </div>
                        <?php endif; ?>
                    </section>

            <?php
            endwhile; 
        endif; ?>



        <?php 
        endwhile;
endif; ?>