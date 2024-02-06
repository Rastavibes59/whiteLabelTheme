<?php
// Example foo.php template.

// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'class'             => '',
        'arbitrary_data'    => array(
            'title'         => 'default title',
            'picture'       => 'https://placekitten.com/700/800',
            'rounded'       => false,
            'is-link'       => true,
            'picture-link'  => 'https://www.google.com',
            'newTab'        => true,
        ),
    )
);


if ($args['arbitrary_data']['is-link'] == true) :

?>
    <a class="linkPicture w-100" href="<?php echo esc_html($args['arbitrary_data']['picture-link']); ?>" <?php if ($args['arbitrary_data']['newTab'] = true) : ?>target="_blank" rel="noopener noreferrer"<?php endif; ?>>
<?php endif; ?>

    <img srcset="<?php echo esc_html($args['arbitrary_data']['picture']['sizes']['large']); ?> 500w,
                <?php echo esc_html($args['arbitrary_data']['picture']['url']); ?> 1920w"
        sizes="(max-width: 480px) 100vw, 
                (max-width: 1024px) 50vw, 
                33vw"
        src="<?php echo esc_html($args['arbitrary_data']['picture']['url']); ?>" alt="<?php echo esc_html($args['arbitrary_data']['picture']['title']); ?>" 
        title="<?php echo esc_html($args['arbitrary_data']['picture']['title']); ?>" 
        class="<?php if ($args['arbitrary_data']['rounded'] == true) : ?>rounded<?php endif;?> light"
        width="500px"
        height="400px"
        loading="lazy">
<?php if ($args['arbitrary_data']['is-link'] == true) : ?>
</a>
<?php endif; ?>

     