<?php
// Example foo.php template.

// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'class'          => '',
        'arbitrary_data' => array(
            'icon-button' => 'standard',
        ),
    )
);

if ($args['arbitrary_data']['icon-button']['rounded'] == true) {
    $rounded = 'rounded';
} else {
    $rounded = '';
}


?>

<a  href="<?php echo esc_html($args['arbitrary_data']['icon-button']['link']); ?>" 
    alt="<?php echo esc_html($args['arbitrary_data']['icon-button']['text']); ?>" 
    class="btn icon <?php echo esc_html($args['arbitrary_data']['icon-button']['button_color']); ?>">
    <i class="<?php echo esc_html($args['arbitrary_data']['icon-button']['icon']).' '.$rounded; ?> big flex row justify-center align-center "></i>  
    <h3 class="fc-white mt-10"><?php echo esc_html($args['arbitrary_data']['icon-button']['text']); ?></h3>
</a>