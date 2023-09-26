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
            'linkType'      => 'fiche',
            'externalLink'  => 'https://google.com',
            'download'      => 'https://plackitten.com/800/800',
),
    )
);



if ($args['arbitrary_data']['thumbnail']) {
    $thumbnail = $args['arbitrary_data']['thumbnail'];
    $itemClass = 'cover';
    
} else {
    $thumbnail = '<img src="' . get_template_directory_uri() . '/assets/public/images/svg/logo.svg" alt="' . $args['arbitrary_data']['title'] . '" loading="lazy" width="250" height="250">';
    $itemClass = 'contain';

};

?>


<div class="flex column justify-center align-flex-start archiveItem <?php echo esc_html($args['class']); ?>">
    <?php echo $args['arbitrary_data']['thumbnail'] ?>
    <div class="archiveItem-body flex column justify-space-between align-center p-15">
        <h3 class="text-center"><?php echo $args['arbitrary_data']['title']; ?></h3>
        <p class="text-center"><?php echo $args['arbitrary_data']['desc']; ?><p>
            <?php if($args['arbitrary_data']['linkType'] == 'fiche') : ?>
                <a href="<?php echo esc_html($args['arbitrary_data']['download']); ?>" class="btn secondary" target="_blank" alt="Réserver">Télécharger la fiche de mission</a>
            <?php elseif ($args['arbitrary_data']['linkType'] == 'link') : ?>
                <a href="<?php echo esc_html($args['arbitrary_data']['externalLink']); ?>" class="btn secondary" target="_blank" alt="Réserver">Postuler en ligne</a>
            <?php endif; ?>
    </div>
</div>