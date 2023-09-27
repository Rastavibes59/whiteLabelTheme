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
            ),
        )
    );


    if(get_field('type') == 'video') :
        get_template_part(
            'includes/common/jumbotron/section',
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
            'includes/common/jumbotron/section',
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
    elseif (get_field('type') == 'normal') :
        get_template_part(
            'includes/common/jumbotron/section',
            'jumbotron',
            array(
                'id'                => 'parallax_jumbo',
                'class'             => 'jumbotron pt-100 md-pt-50 home flex column justify-center align-center',
                'arbitrary_data'    => array(
                    'background'    => get_field('bg'),
                    'text'          => get_field('text'),
                ),
            )
        );
    endif;
?>