<?php
// Example foo.php template.

// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'class'          => '',
        'arbitrary_data' => array(
            'title'         => 'Lorem IPSUM',
            'thumbnail'     => get_template_directory_uri() . '/assets/public/images/svg/logo.svg',
            'type'          => 'Formation',
            'start'         => '01/01/1900',
            'end'           => '01/31/1901',
            'prerequisite'  => 'Aucuns',
            'desc'          => 'Description de l\'événement',
            'link'          => 'javascript:void(0)'
        ),
    )
);

if ($args['arbitrary_data']['thumbnail']) {
    $thumbnail_url = $args['arbitrary_data']['thumbnail'];
    $itemClass = 'cover';
    
} else {
    $thumbnail_url = get_template_directory_uri() . '/assets/public/images/svg/logo.svg';
    $itemClass = 'contain';

};

?>


<li class="flex column justify-flex-start align-flex-start archiveItem <?php echo $args['class']; ?>">
    <img src="<?php echo $thumbnail_url ?>" alt="<?php echo esc_html($args['arbitrary_data']['title']); ?>" title="<?php echo esc_html($args['arbitrary_data']['title']); ?>" class="archiveItem-image <?php echo $itemClass; ?>" width='280' height='200' loading="lazy">
    <div class="archiveItem-body flex column justify-flex-start align-flex-start p-15">
        <h3 class="text-left"><?php echo esc_html($args['arbitrary_data']['title']); ?></h3>
        <p class="size-formInfos"><?php foreach($args['arbitrary_data']['type'] as $cd){ echo $cd->cat_name .' '; } ?></p>
        <p class="size-formInfos"><strong>Du</strong> <?php echo esc_html($args['arbitrary_data']['start']); ?> <strong>Au</strong> <?php echo esc_html($args['arbitrary_data']['end']); ?></p>
        <?php echo wp_trim_words($args['arbitrary_data']['desc'], 30, '...'); ?>
        <a href="<?php echo esc_html($args['arbitrary_data']['link']); ?>" class="btn secondary center mt-15">M'inscrire</a>
    </div>
</li>