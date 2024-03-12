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

        <!-- SECTION CONTACTS -->
        <section id="contact" class="bg-picture bg-tertiary pt-150 pb-60 mt-pt-70" <?php if (get_field('bg_image') !== null) : ?>style="background-image: url(<?php echo get_field('bg_image') ?>);" <?php endif; ?>>
            <div class="container grid lg-cols-1 cols-4 gap-15">
                <h2 class="colspan-4 lg-colspan-1 text-center mb-30">Nous contacter</h2>
                <div></div>
                <div class="flex column justify-flex-start align-center colspan-2 lg-colspan-1 contactForm">
                    <?php echo apply_shortcodes(get_field('contact_form')); ?>
                </div>
            </div>
            </div>