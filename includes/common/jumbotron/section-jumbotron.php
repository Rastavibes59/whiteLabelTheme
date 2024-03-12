<?php
// Example foo.php template.

// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'class'          => 'jumbotron pt-100 lg-pt-50 ',
        'arbitrary_data' => array(
            'size' => 'standard',
            'picture' => 'https://placekitten.com/1920/450',
            'title' => 'LOREM IPSUM',
            'mobile_placeholder' => get_template_directory_uri() . '/assets/public/images/background.webp',
        ),
    )
);
?>

<section class="<?php echo esc_html($args['class']); ?> <?php echo esc_html($args['arbitrary_data']['size']); ?>" style="background-image:url(<?php echo esc_html($args['arbitrary_data']['picture']); ?>)">
    <div class="container flex column justify-center align-center">
        <h1 class="text-center"><?php echo $args['arbitrary_data']['title']; ?></h1>
    </div>
</section>




