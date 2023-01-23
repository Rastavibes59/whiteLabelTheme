<?php
// Example foo.php template.

// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'class'          => '',
        'arbitrary_data' => array(
            'text' => 'lorem ipsum',
        ),
    )
);
?>

<div class="columnsText-2">
    <?php echo $args['arbitrary_data']['text']; ?>
</div>