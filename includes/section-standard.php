<?php if (have_posts()) : while (have_posts()) : the_post();

        $nav = get_field('navigation');
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



        <?php $navItems = array(); ?>
        <!-- SECTION BUILDER -->
        <?php if (have_rows('bloc')) :
            while (have_rows('bloc')) : the_row();

                $index = get_row_index();
                $title = get_sub_field('title');

                array_push($navItems, [$index, $title]);
            endwhile;
        endif; ?>


        <?php if ($nav == true) : ?>
            <ul class="anchorNav flex justify-center align-center pt-30 pb-30 bg-white mb-50 gap-30">

                <?php foreach ($navItems as $navItem) : ?>
                    <li><a href="#section-<?php echo $navItem[0]; ?>" class="btn secondary"><?php echo $navItem[1] ?></a></li>
                <?php endforeach; ?>

            </ul>
        <?php endif; ?>

        <?php if (have_rows('bloc')) :
            while (have_rows('bloc')) : the_row();

                $content_width = get_sub_field('content_width');
                $background_type = get_sub_field('background_type');
                $columns_number = get_sub_field('columns_number');

                if ($background_type == 'color') {
                    $couleur_de_fond = get_sub_field('couleur_de_fond');
                    $section_classes = 'bg-' . $couleur_de_fond . 'grid md-cols-1 cols-' . $columns_number;
                } elseif ($background_type == 'picture') {
                    $background_image = get_sub_field('background_image');
                    $section_classes = 'grid md-cols-1 cols-' . $columns_number;
                };
                $title = get_sub_field('title');
                $index = get_row_index();

                if ($content_width == 'fluid') : ?>

                    <section id="section-<?php echo $index ?>" class="grid md-cols-1 cols-<?php echo $columns_number; ?> gap-30 bg-<?php echo $couleur_de_fond; ?> bg-<?php echo $background_type; ?> pt-60 pb-60 md-pt-20 md-pb-30" <?php if (get_sub_field('background_image')) : ?>style="background-image: url(<?php echo get_sub_field('background_image')['url'] ?>);" <?php endif; ?>>

                    <?php elseif ($content_width == 'center') : ?>

                        <section id="section-<?php echo $index ?>" class="bg-<?php echo $couleur_de_fond; ?> bg-<?php echo $background_type; ?> pt-60 pb-60" <?php if (get_sub_field('background_image')) : ?>style="background-image: url(<?php echo get_sub_field('background_image')['url'] ?>);" <?php endif; ?>>

                            <div class="container grid md-cols-1 cols-<?php echo $columns_number; ?> gap-30">

                    <?php endif;
                        if ($columns_number == '1') : ?>
                            <h2 class="text-center"><?php echo $title ?></h2>

                            <div class="flex column justify-space-between align-center gap-20 animate fade-in slide-up normal">

                                <?php while (have_rows('one_column')) : the_row(); ?>


                                    <?php get_template_part(
                                        'includes/common/' . get_sub_field('content_type'),
                                        '',
                                        array(
                                            'class' => '',
                                            'arbitrary_data' => array(
                                                'text' => get_sub_field('text'),
                                                'picture' => get_sub_field('picture'),
                                                'video' => get_sub_field('video_link'),
                                                'slider' => get_sub_field('slider'),
                                                'button' => get_sub_field('button'),
                                                'shortcode' => get_sub_field('shortcode'),
                                                'custom-posts' => get_sub_field('custom_posts'),
                                                'html' => get_sub_field('html'),
                                                'faq' => get_sub_field('faq'),
                                            ),
                                        )
                                    );
                                    ?>



                                <?php endwhile; ?>

                            </div>

                        <?php endif; ?>

                        <?php if ($columns_number == '2' || $columns_number == '1-2' || $columns_number == '2-1') : ?>
                            <h2 class="text-center colspan-2 md-colspan-1"><?php echo $title ?></h2>

                            <?php if (have_rows('2_colonnes')) : ?>
                                <?php while (have_rows('2_colonnes')) : the_row(); ?>

                                    <div class="flex column justify-space-between align-center gap-20 animate fade-in slide-right normal">

                                        <?php while (have_rows('first_collumn')) : the_row(); ?>

                                            <?php get_template_part(
                                                'includes/common/' . get_sub_field('content_type'),
                                                '',
                                                array(
                                                    'class' => '',
                                                    'arbitrary_data' => array(
                                                        'text' => get_sub_field('text'),
                                                        'picture' => get_sub_field('picture'),
                                                        'video' => get_sub_field('video_link'),
                                                        'slider' => get_sub_field('slider'),
                                                        'button' => get_sub_field('button'),
                                                        'shortcode' => get_sub_field('shortcode'),
                                                        'custom-posts' => get_sub_field('custom_posts'),
                                                        'html' => get_sub_field('html'),
                                                        'faq' => get_sub_field('faq'),
                                                    ),
                                                )
                                            );
                                            ?>

                                        <?php endwhile; ?>

                                    </div>

                                    <div class="flex column justify-space-between align-center gap-20 animate fade-in slide-left normal">

                                        <?php while (have_rows('second_collumn')) : the_row(); ?>


                                            <?php get_template_part(
                                                'includes/common/' . get_sub_field('content_type'),
                                                '',
                                                array(
                                                    'class' => '',
                                                    'arbitrary_data' => array(
                                                        'text' => get_sub_field('text'),
                                                        'picture' => get_sub_field('picture'),
                                                        'video' => get_sub_field('video_link'),
                                                        'slider' => get_sub_field('slider'),
                                                        'button' => get_sub_field('button'),
                                                        'shortcode' => get_sub_field('shortcode'),
                                                        'custom-posts' => get_sub_field('custom_posts'),
                                                        'html' => get_sub_field('html'),
                                                        'faq' => get_sub_field('faq'),
                                                    ),
                                                )
                                            );
                                            ?>



                                        <?php endwhile; ?>

                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>

                        <?php endif; ?>

                        <?php if ($columns_number == '3') : ?>
                            <h2 class="text-center colspan-3 md-colspan-1"><?php echo $title ?></h2>

                            <?php if (have_rows('3_colonnes')) : ?>
                                <?php while (have_rows('3_colonnes')) : the_row(); ?>


                                    <div class="flex column justify-space-between align-center gap-20  animate fade-in slide-right normal">

                                        <?php while (have_rows('first_collumn')) : the_row(); ?>


                                            <?php get_template_part(
                                                'includes/common/' . get_sub_field('content_type'),
                                                '',
                                                array(
                                                    'class' => '',
                                                    'arbitrary_data' => array(
                                                        'text' => get_sub_field('text'),
                                                        'picture' => get_sub_field('picture'),
                                                        'video' => get_sub_field('video_link'),
                                                        'slider' => get_sub_field('slider'),
                                                        'button' => get_sub_field('button'),
                                                        'shortcode' => get_sub_field('shortcode'),
                                                        'custom-posts' => get_sub_field('custom_posts'),
                                                        'html' => get_sub_field('html'),
                                                        'faq' => get_sub_field('faq'),
                                                    ),
                                                )
                                            );
                                            ?>
                                        <?php endwhile; ?>

                                    </div>

                                    <div class="flex column justify-space-between align-center gap-20  animate fade-in normal">
                                        <?php while (have_rows('second_collumn')) : the_row(); ?>



                                            <?php get_template_part(
                                                'includes/common/' . get_sub_field('content_type'),
                                                '',
                                                array(
                                                    'class' => '',
                                                    'arbitrary_data' => array(
                                                        'text' => get_sub_field('text'),
                                                        'picture' => get_sub_field('picture'),
                                                        'video' => get_sub_field('video_link'),
                                                        'slider' => get_sub_field('slider'),
                                                        'button' => get_sub_field('button'),
                                                        'shortcode' => get_sub_field('shortcode'),
                                                        'custom-posts' => get_sub_field('custom_posts'),
                                                        'html' => get_sub_field('html'),
                                                        'faq' => get_sub_field('faq'),
                                                    ),
                                                )
                                            );
                                            ?>



                                        <?php endwhile; ?>

                                    </div>

                                    <div class="flex column justify-space-between align-center gap-20 animate fade-in slide-left normal">

                                        <?php while (have_rows('third_collumn')) : the_row(); ?>


                                            <?php get_template_part(
                                                'includes/common/' . get_sub_field('content_type'),
                                                '',
                                                array(
                                                    'class' => '',
                                                    'arbitrary_data' => array(
                                                        'text' => get_sub_field('text'),
                                                        'picture' => get_sub_field('picture'),
                                                        'video' => get_sub_field('video_link'),
                                                        'slider' => get_sub_field('slider'),
                                                        'button' => get_sub_field('button'),
                                                        'shortcode' => get_sub_field('shortcode'),
                                                        'custom-posts' => get_sub_field('custom_posts'),
                                                        'html' => get_sub_field('html'),
                                                        'faq' => get_sub_field('faq'),
                                                    ),
                                                )
                                            );
                                            ?>



                                        <?php endwhile; ?>

                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>



                        <?php endif; ?>

                        <?php if ($content_width == 'center') : ?>

                        </div>

                        <?php endif; ?>


                        </section>







            <?php endwhile; ?>
        <?php endif;
            wp_reset_query();
                ?>

        <!-- SECTION NEW BUILDER -->
        <?php if (have_rows('sections')) :
            while (have_rows('sections')) : the_row();

                $index = get_row_index();
                $title = get_sub_field('title');

                array_push($navItems, [$index, $title]);
            endwhile;
        endif; ?>


        <?php if ($nav == true) : ?>
            <ul class="anchorNav flex justify-center align-center pt-30 pb-30 bg-white mb-50 gap-30">

                <?php foreach ($navItems as $navItem) : ?>
                    <li><a href="#section-<?php echo $navItem[0]; ?>" class="btn secondary"><?php echo $navItem[1] ?></a></li>
                <?php endforeach; ?>

            </ul>
        <?php endif; ?>

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

                if ($background_type == 'color') :
                    $couleur_de_fond = get_sub_field('couleur_de_fond');
                elseif ($background_type == 'picture') :
                    $background_image = get_sub_field('background_image');
                endif;

                $title = get_sub_field('title');

                if ($content_width == 'fluid') : ?>

                    <section id="section-<?php echo $section_number; ?>" class="grid md-cols-1 cols-12 gap-30 <?php if ($background_type == 'color') : ?>bg-<?php echo $couleur_de_fond;
                                                                                                                                                        endif; ?> bg-<?php echo $background_type; ?> pt-100 pb-100" <?php if ($background_type == 'picture') : ?>style="background-image: url(<?php echo $background_image; ?>);" <?php endif; ?>>

                    <?php elseif ($content_width == 'center') : ?>

                    <section id="section-<?php echo $section_number; ?>" class="<?php if ($background_type == 'color') : ?>bg-<?php echo $couleur_de_fond; endif; ?> bg-<?php echo $background_type; ?> pt-80 pb-80 md-pt-30 md-pb-30 " <?php if ($background_type == 'picture') : ?>style="background-image: url(<?php echo $background_image; ?>);" <?php endif; ?>>

                        <div class="container grid md-cols-1 cols-12 gap-30">
                    <?php endif;
                        $section_number++;


                        if (have_rows('colonnes')) :
                            $columns_number = 0;
                            while (have_rows('colonnes')) : the_row();
                                $columns_number++;
                            endwhile;
                        endif;

                        if (have_rows('colonnes')) : ?>

                                <h2 class="text-center colspan-12 md-colspan-1"><?php echo $title ?></h2>

                                <?php while (have_rows('colonnes')) : the_row();

                                    if (get_row_layout() == 'colonne') :

                                        if ($columns_number == 1) :
                                            $column_size = '12';
                                        elseif ($columns_number == 2) :
                                            $column_size = get_sub_field('column_size')[0];
                                        elseif ($columns_number == 3) :
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
        endif; 
        wp_reset_query();

        ?>




    <?php endwhile;
endif; ?>


