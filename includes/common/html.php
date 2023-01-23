<?php
// Example foo.php template.

// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'class'          => '',
        'arbitrary_data' => array(
            'html' => '<p>Hello World !</p>',
        ),
    )
); 
?>

<?php echo $args['arbitrary_data']['html']; ?>