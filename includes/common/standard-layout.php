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

                    <section id="section-<?php echo $index ?>" class="grid md-cols-1 cols-<?php echo $columns_number; ?> gap-30 bg-<?php echo $couleur_de_fond; ?> bg-<?php echo $background_type; ?> pt-60 pb-60" <?php if (get_sub_field('background_image')) : ?>style="background-image: url(<?php echo get_sub_field('background_image')['url'] ?>);" <?php endif; ?>>

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
                <?php endif; ?>



        <?php endwhile;
