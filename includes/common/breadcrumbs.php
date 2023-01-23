<?php
// Example foo.php template.

// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'class'          => '',
        'arbitrary_data' => array(
            'isJumbo'          => false,
        ),
    )
);

$args['arbitrary_data']['isJumbo'] == true ? $padding='pt-30' : $padding='pt-100'

?>



<section class="breadcrumbs <?php echo $padding ?> pb-00 bg-transparent">
    <?php
        if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<div class="container">','</div>' );
        }
    ?>
</section>