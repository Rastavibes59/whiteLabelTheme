<?php
// Example foo.php template.

// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'class'          => '',
        'arbitrary_data' => array(
            'title'         => 'Lorem IPSUM',
            'thumbnail'     => get_template_directory_uri() . '/assets/images/svg/logo.svg',
            'link'          => 'javascript:void(0)'
        ),
    )
);

if ($args['arbitrary_data']['thumbnail']) {
    $thumbnail_url = $args['arbitrary_data']['thumbnail'];
    $itemClass = 'cover';
    
} else {
    $thumbnail_url = get_template_directory_uri() . '/assets/images/svg/logo.svg';
    $itemClass = 'contain';

};

?>


<a href="<?php echo esc_html($args['arbitrary_data']['link']); ?>" class="flex column justify-center align-flex-start archiveItem <?php echo esc_html($args['class']); ?>">
    <img src="<?php echo $thumbnail_url ?>" alt="<?php echo esc_html($args['arbitrary_data']['title']); ?>" title="<?php echo esc_html($args['arbitrary_data']['title']); ?>" loading="lazy" class="archiveItem-image <?php echo $itemClass; ?>" width='300' height='250'>
    <div class="archiveItem-body fc-white flex column justify-center align-center p-15">
        <h3 class="text-center"><?php echo esc_html($args['arbitrary_data']['title']); ?></h3>
    </div>
</a>