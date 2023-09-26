<?php
// Example foo.php template.

// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'class'          => '',
        'arbitrary_data' => array(
            'custom-posts' => '',
        ),
    )
); 

$countArtists = 0;
$custom_posts = $args['arbitrary_data']['custom-posts']; ?>

<div class="container grid md-cols-1 cols-4 gap-15 archive artistes pt-60 animate">

<?php

    foreach ($custom_posts as $post) {
        $post_id = $post->ID;
        
        if($countArtists < 8) {
                        
            get_template_part(
                'includes/common/archive',
                'item',
                array(
                    'class'             => 'animate fade-in slide-left slow delay-' . $countArtists . '00ms',
                    'arbitrary_data'    => array(
                        'title'         => get_the_title(),
                        'thumbnail'     => get_the_post_thumbnail_url( $post_id, 'thumbnail'),
                        'link'          => get_permalink(),
                    ),
                )
            );
            $countArtists++;
        }
    };
    wp_reset_query();

?>

</div>


