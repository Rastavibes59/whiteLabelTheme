<?php
// Example foo.php template.

// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'class'          => '',
        'arbitrary_data' => array(
            'text'          => 'lorem ipsum',
            'columnsNumber' => '1',
            'frame'         => false,
        ),
    )
);
?>

<div class="columnsText-<?php echo $args['arbitrary_data']['columnsNumber']; ?> w-100 <?php if($args['arbitrary_data']['frame'] == 'true' ) : ?> bg-tertiary frame p-10 <?php endif; ?> <?php echo $args['class']; ?>">
    <?php echo $args['arbitrary_data']['text']; ?>
</div>