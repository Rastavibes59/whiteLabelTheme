<?php
// video home section.

// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'id'                => 'parallax_jumbo',
        'class'             => 'jumbotron pt-100 md-pt-50 flex column justify-center align-center',
        'arbitrary_data'    => array(
            'background'    => get_template_directory_uri() . '/assets/public/images/background.webp',
            'text'          => '<p>HELLO WORLD !</p>',
            'mobile_placeholder'          => get_template_directory_uri() . '/assets/public/images/background.webp',
        ),
    )
);
?>
<section class="jumbotron video pt-100 md-pt-0 home flex column justify-center align-center">
    <iframe
        frameborder="0"
        height="100%"
        width="100%"
        title="YouTube video player"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        src="https://www.youtube.com/embed/<?php echo $args['arbitrary_data']['background'] ?>?controls=0&loop=1&playlist=<?php echo $args['arbitrary_data']['background'] ?>&showinfo=0&rel=0&autoplay=1&mute=1"
    >
    </iframe>
</section>

