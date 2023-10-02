<?php  

    // parallax home section.

    // Set defaults.
    $args = wp_parse_args(
        $args,
        array(
            'id'                => 'parallax_jumbo',
            'class'             => 'jumbotron pt-100 md-pt-50 home flex column justify-center align-center',
            'arbitrary_data'    => array(
                'background'    => get_template_directory_uri() . '/assets/public/images/background.webp',
                'depth'         => 0.2,
                'text'          => '<p>HELLO WORLD !</p>',
                'logo'          => get_template_directory_uri() . '/assets/public/images/logo-leaves.webp',
                'size'          => 'standard',
                'picture'       => get_template_directory_uri() . '/assets/public/images/background.webp',
                'title'         => '<p>HELLO WORLD !</p>',
                'mobile_placeholder' => get_template_directory_uri() . '/assets/public/images/background.webp',
                'mask_color'    => 'rgba(0,0,0,0.5)',

            ),
        )
    );
    


    if(get_field('type') == 'video') :
        get_template_part(
            'includes/common/jumbotron/section',
            'video',
            array(
                'id'                => 'parallax_jumbo',
                'class'             => 'jumbotron pt-100 md-pt-50 flex column justify-center align-center',
                'arbitrary_data'    => array(
                    'background'    => get_field('bg'),
                    'text'          => get_field('text'),
                    'mobile_placeholder' => get_field('image_mobile'),
                    'mask_color'    => get_field('mask_color'),

                ),
            )
        );
    elseif (get_field('type') == 'parallax') :
        get_template_part(
            'includes/common/jumbotron/section',
            'parallax',
            array(
                'id'                => 'parallax_jumbo',
                'class'             => 'jumbotron pt-100 md-pt-50 flex column justify-center align-center',
                'arbitrary_data'    => array(
                    'background'    => get_field('bg'),
                    'depth'         => get_field('depth'),
                    'text'          => get_field('text'),
                    'logo'          => get_field('logo'),
                    'mobile_placeholder' => get_field('image_mobile'),
                    'mask_color'    => get_field('mask_color'),
                ),
            )
        );      
    else :
        get_template_part(
            'includes/common/jumbotron/section',
            'jumbotron',
            array(
                'id'                => 'parallax_jumbo',
                'class'             => 'jumbotron pt-100 md-pt-50 flex column justify-center align-center',
                'arbitrary_data'    => array(
                    'size'          => 'standard',
                    'picture'       => get_field('background_image'),
                    'title'         => get_the_title(),
                    'mobile_placeholder' => get_field('image_mobile'),
                    'mask_color'    => get_field('mask_color'),

                ),
            )
        );
    endif; ?>

        <style>

    <?php if (get_field('mask_color')) : ?>
            .jumbotron::before {
                background-color: <?php echo get_field('mask_color'); ?> !important;
            }
    <?php endif; ?>
    
<?php if ($args['arbitrary_data']['mobile_placeholder']) : ?>
        @media (max-width: 768px) {
            .jumbotron {
                background-image: url(<?php echo $args['arbitrary_data']['mobile_placeholder']; ?>) !important;
            }
        }
<?php endif; ?>
    </style>
