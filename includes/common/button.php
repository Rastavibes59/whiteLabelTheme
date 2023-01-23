<?php
// Example foo.php template.

// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'class'          => '',
        'arbitrary_data' => array(
            'button' => 'standard',
        ),
    )
);

$styleString = implode(' ', $args['arbitrary_data']['button']['button_style'])
?>


<a
    href="<?php echo esc_html($args['arbitrary_data']['button']['button_link']); ?>"
    alt="<?php echo esc_html($args['arbitrary_data']['button']['button_title']); ?>"
    class="btn <?php echo esc_html($args['arbitrary_data']['button']['button_color']); ?> <?php echo esc_html($args['arbitrary_data']['button']['button_position']); ?> <?php echo $styleString; ?> <?php echo $args['class'] ?>">
    <?php echo esc_html($args['arbitrary_data']['button']['button_title']); ?>
</a>
