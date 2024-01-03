<?php
// Example foo.php template.

// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'class'          => '',
        'arbitrary_data' => array(
            'text' => 'lorem ipsum',
            'columnsNumber' => '1',
        ),
    )
);
?>

<div class="columnsText-<?php echo $args['arbitrary_data']['columnsNumber']; ?> w-100">
    <?php echo $args['arbitrary_data']['text']; ?>
</div>