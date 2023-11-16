<?php
// Example foo.php template.

// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'class'          => '',
        'arbitrary_data' => array(
            'custom-posts' => '',
            'post_type' => 'programmation',
        ),
    )
); 

$counter = 0;
$totalCount = 0;
$custom_posts = $args['arbitrary_data']['custom-posts'];
$post_type = $custom_posts[0]->post_type;

foreach ($custom_posts as $post) {
    $totalCount++;
}

if ($totalCount > 4) {
    $totalCount = 4;
}

?>


<div class="grid md-cols-1 cols-<?php echo $totalCount ?> gap-15 archive <?php echo $post_type ?> pt-60 animate w-100">

<?php


    foreach ($custom_posts as $post) {
        $post_id = $post->ID;
        $post_type = $post->post_type;


        
            get_template_part(
                'includes/common/archive',
                $post_type,
                array(
                    'class'             => $post_type . ' animate fade-in slide-left slow delay-' . $counter . '00ms',
                    'arbitrary_data'    => array(
                        'title'         => get_the_title(),
                        'thumbnail'     => get_the_post_thumbnail_url( $post_id, 'thumbnail'),
                        'link'          => get_permalink(),
                        'desc'          => get_field('desc'),
                        'price'         => get_field('price'),
                    ),
                )
            );
            $counter++;
    };
    wp_reset_query();

?>

</div>


