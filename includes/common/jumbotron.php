<?php  

    // parallax home section.

    // Set defaults.
    $args = wp_parse_args(
        $args,
        array(
            'id'                => 'parallax_jumbo',
            'class'             => 'jumbotron wave pt-100 md-pt-50 home flex column justify-center align-center',
            'arbitrary_data'    => array(
                'background'    => get_template_directory_uri() . '/assets/public/images/background.webp',
                'depth'         => 0.2,
                'text'          => '<p>HELLO WORLD !</p>',
                'logo'          => get_template_directory_uri() . '/assets/public/images/logo-leaves.webp',
                'size'          => 'standard',
                'picture'       => get_template_directory_uri() . '/assets/public/images/background.webp',
                'title'         => '<p>HELLO WORLD !</p>',
                'mobile_placeholder' => get_template_directory_uri() . '/assets/public/images/background.webp',
                'mask'    => true,
                'mask_color'    => 'rgba(0,0,0,0.5)'
            ),
        )
    );

    $field_type= get_field('type');

    if($field_type == 'youtube') :
        get_template_part(
            'includes/common/jumbotron/section',
            'youtube',
            array(
                'id'                => 'parallax_jumbo',
                'class'             => 'jumbotron video wave pt-100 md-pt-0 home flex column justify-center align-center',
                'arbitrary_data'    => array(
                    'background'    => get_field('bg'),
                    'text'          => get_field('text'),
                    'mobile_placeholder' => get_field('image_mobile'),
                    'mask_color'    => get_field('mask_color'),

                ),
            )
        );
        elseif($field_type == 'video') :
            get_template_part(
                'includes/common/jumbotron/section',
                'video',
                array(
                    'id'                => 'parallax_jumbo',
                    'class'             => 'jumbotron video wave pt-100 md-pt-0 home flex column justify-center align-center',
                    'arbitrary_data'    => array(
                        'background'    => get_field('hosted_video'),
                        'text'          => get_field('text'),
                        'mobile_placeholder' => get_field('image_mobile'),
    
                    ),
                )
            );
        elseif ($field_type == 'parallax') :
            get_template_part(
                'includes/common/jumbotron/section',
                'parallax',
                array(
                    'id'                => 'parallax_jumbo',
                    'class'             => 'jumbotron home wave pt-100 md-pt-50 flex column justify-center align-center',
                    'arbitrary_data'    => array(
                        'background'    => get_field('bg'),
                        'depth'         => get_field('depth'),
                        'text'          => get_field('text'),
                        'logo'          => get_field('logo'),
                        'mobile_placeholder' => get_field('image_mobile'),
                    ),
                )
            );      
        elseif ($field_type == 'slider') :
            get_template_part(
                'includes/common/jumbotron/section',
                'slider',
                array(
                    'id'                => 'parallax_jumbo',
                    'class'             => 'jumbotron home grid cols-12',
                    'arbitrary_data'    => array(
                        'slider' => get_field('slider'),
                        'mask'    => get_field('mask'),
                        'mask_color'    => get_field('mask_color'),
                    ),
                )
            );      
        elseif ($field_type == 'picture') :
            get_template_part(
                'includes/common/jumbotron/section',
                'jumbotron',
                array(
                    'id'                => 'parallax_jumbo',
                    'class'             => 'jumbotron wave pt-100 md-pt-50 flex column justify-center align-center',
                    'arbitrary_data'    => array(
                        'size'          => 'standard',
                        'picture'       => get_field('bg'),
                        'title'         => get_the_title(),
                        'mobile_placeholder' => get_field('image_mobile'),

                    ),
                )
        );
    endif; ?>

        <style>

    <?php if (get_field('mask') == true && $field_type != 'slider') : ?>
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
