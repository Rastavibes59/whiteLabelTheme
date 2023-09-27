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
            'desc'          => 'Lorem Ipsum',
            'price'         => '35€',
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


<div class="flex column justify-center align-flex-start archiveItem <?php echo esc_html($args['class']); ?>">
    <img src="<?php echo $thumbnail_url ?>" alt="<?php echo esc_html($args['arbitrary_data']['title']); ?>" title="<?php echo esc_html($args['arbitrary_data']['title']); ?>" class="archiveItem-image <?php echo $itemClass; ?>" width='300' height='250' loading="lazy">
    <div class="archiveItem-body flex column justify-flex-start align-center p-15">
        <h3 class="text-center"><?php echo $args['arbitrary_data']['title']; ?></h3>
        <p class="text-center"><?php echo $args['arbitrary_data']['desc']; ?><p>
        <p class="text-center"><strong><?php echo $args['arbitrary_data']['price']; ?></strong><p>
        <a href="<?php echo esc_html($args['arbitrary_data']['link']); ?>" class="btn secondary" target="_blank" alt="Réserver">Réserver</a>
    </div>
</div>