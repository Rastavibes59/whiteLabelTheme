<?php
// Example foo.php template.

// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'class'          => '',
        'arbitrary_data' => array(
            'title'         => 'LOREM IPSUM',
            'thumbnail'     => 'https://placekitten.com/400/250',
            'dispo'         => date('d-m-Y'),
            'stock'         => true,
            'desc'          => 'lorem ipsum doloris sic amec',
            'price'         => '70€/g',
            'terms'         => '',
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


<li class="flex column justify-center align-flex-start archiveItem <?php echo $args['class']; ?>">
    <img src="<?php echo $thumbnail_url ?>" alt="<?php echo esc_html($args['arbitrary_data']['title']); ?>" title="<?php echo esc_html($args['arbitrary_data']['title']); ?>" class="archiveItem-image p-15 <?php echo $itemClass; ?>" width='300' height='250' loading="lazy">
    <div class="archiveItem-body flex column justify-flex-start align-center p-15">
        <h3 class="text-left"><?php echo esc_html($args['arbitrary_data']['title']); ?></h3>
        <p class="size-formInfos mt-10"><?php foreach($args['arbitrary_data']['terms'] as $cd){ echo $cd->name .' • '; } ?>Disponible le : <?php echo esc_html($args['arbitrary_data']['dispo']); ?></p>
        <?php echo wp_trim_words($args['arbitrary_data']['desc'], 35, '...'); ?>
        <p class="size-regular fw-bold mt-10 mb-10"><?php echo esc_html($args['arbitrary_data']['price']); ?></p>
        <a href="#contact" class="btn secondary center mt-15" alt="Commander">Commander</a>
    </div>
</li>