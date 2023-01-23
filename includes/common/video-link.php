<?php
// Example foo.php template.

// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'class'             => '',
        'arbitrary_data'    => array(
            'video'         => 'rmmech36AH4',
        ),
    )
);

?>

<iframe width="560" height="350" src="https://www.youtube.com/embed/<?php echo esc_html($args['arbitrary_data']['video']); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class=" <?php echo $args['class'] ?>"></iframe>