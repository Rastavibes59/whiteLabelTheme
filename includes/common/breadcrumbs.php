<?php
// Example foo.php template.

// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'class'          => '',
        'arbitrary_data' => array(
            'isJumbo'          => true,
        ),
    )
);
?>



<section class="breadcrumbs pt-15 pb-15 bg-tertiary">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div class="container">', '</div>');
    }
    ?>
</section>