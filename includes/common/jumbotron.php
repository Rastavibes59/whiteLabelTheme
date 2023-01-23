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

<section id="parallax_jumbo" class="jumbotron <?php echo esc_html($args['class']); ?> <?php echo esc_html($args['arbitrary_data']['size']); ?> pt-70" data-parallax="scroll" data-image-src="<?php echo esc_html($args['arbitrary_data']['picture']); ?>">
    <div class="container flex column justify-center align-center">
        <h1 class="text-center"><?php echo $args['arbitrary_data']['title']; ?></h1>
    </div>
</section>