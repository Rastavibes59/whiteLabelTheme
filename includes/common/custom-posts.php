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

$countItems = 0;
$custom_posts = $args['arbitrary_data']['custom-posts']; 
$totalItems = $countItems = count($custom_posts);
?>

<div class="grid md-cols-1 cols-3 gap-15 archive artistes animate">

<?php

    foreach ($custom_posts as $post) {
        $post_id = $post->ID;
                        
            get_template_part(
                'includes/common/sejour',
                'item',
                array(
                    'class'             => 'animate fade-in slide-left slow delay-' . $countItems . '00ms',
                    'arbitrary_data'    => array(
                        'title'         => get_the_title(),
                        'thumbnail'     => get_the_post_thumbnail_url(get_the_ID(), 'custom-post'),
                        'type'          => get_the_category(),
                        'start'         => get_field('event_start'),
                        'end'           => get_field('event_stop'),
                        'prerequisite'  => get_field('prerequis'),
                        'desc'          => get_field('description'),
                        'link'          => get_permalink(),
                    ),
                )
            );
            $countItems++;
    };
    wp_reset_query();

?>

</div>


