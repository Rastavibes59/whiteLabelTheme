<?php
// Example foo.php template.

// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'class'          => '',
        'arbitrary_data' => array(
            'shortcode' => '',
        ),
    )
); 
?>
    
    
    <?php echo do_shortcode($args['arbitrary_data']['shortcode']); ?>
