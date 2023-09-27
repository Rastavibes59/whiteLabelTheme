<?php
// Example foo.php template.

// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'class'          => '',
        'arbitrary_data' => array(
            'size' => 'standard',
            'picture' => 'https://placekitten.com/1920/450',
            'title' => 'LOREM IPSUM',
        ),
    )
);
?>

<section class="jumbotron pt-100 md-pt-50 <?php echo esc_html($args['class']); ?> <?php echo esc_html($args['arbitrary_data']['size']); ?>" style="background-image:url(<?php echo esc_html($args['arbitrary_data']['picture']); ?>)">
    <div class="container flex column justify-center align-center">
        <h1 class="text-center"><?php echo $args['arbitrary_data']['title']; ?></h1>
    </div>
</section>



