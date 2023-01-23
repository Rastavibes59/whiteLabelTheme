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
            'date'          => 'Lorem Ipsum',
            'desc'          => 'Lorem Ipsum',
            'link'          => 'javascript:void(0)'
        ),
    )
);

if ($args['arbitrary_data']['thumbnail']) {
    $thumbnail_url = $args['arbitrary_data']['thumbnail'];
    $itemClass = 'cover';
    
} else {
    $thumbnail_url = get_template_directory_uri() . '/assets/public/images/svg/logo.svg';
    $itemClass = 'cover';

};

?>


<li class="flex column  justify-center align-center archiveItem blog <?php echo $args['class']; ?>">
    <div class="archiveItem-image">
        <img src="<?php echo $thumbnail_url ?>" alt="<?php echo esc_html($args['arbitrary_data']['title']); ?>" title="<?php echo esc_html($args['arbitrary_data']['title']); ?>" class="<?php echo $itemClass; ?>" width='280' height='200' loading="lazy">
    </div>
    <div class="archiveItem-deported  pt-10 pr-20 pb-10 pl-20 bg-fifth">
        <p class=" fc-white fw-900 size-small "><?php echo esc_html($args['arbitrary_data']['date']); ?></p>
    </div>
    <div class="archiveItem-body flex column justify-flex-start align-flex-start p-15 fc-white">
        <h3 class="text-center size-huge w-100"><?php echo esc_html($args['arbitrary_data']['title']); ?></h3>
    </div>
    <div class="archiveItem-body flex column justify-flex-start align-flex-start p-15 fc-white">
        <?php the_excerpt() ?>
    </div>    
    
    <div class="archiveItem-footer flex column justify-flex-start align-center mt-15">
        <a href="<?php echo esc_html($args['arbitrary_data']['link']); ?>" class="btn tertiary fullWidth center montserrat">Lire</a>
    </div>
</li>