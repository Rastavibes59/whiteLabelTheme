<?php
// parallax home section.

// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'id'                => 'parallax_jumbo',
        'class'             => 'jumbotron home wave pt-100 md-pt-50 flex column justify-center align-center',
        'arbitrary_data'    => array(
            'background'    => get_template_directory_uri() . '/assets/public/images/background.webp',
            'depth'         => 0.2,
            'text'          => '<p>HELLO WORLD !</p>',
            'logo'          => '',
            'mobile_placeholder' => get_template_directory_uri() . '/assets/public/images/background.webp',
        ),
    )
);
?>

<section id="<?php echo $args['id']; ?>" class="<?php echo $args['class']; ?>" style="background-image:url(<?php echo $args['arbitrary_data']['background']; ?>)">
    <div class="container flex column justify-center align-center w-100" data-depth="<?php echo $args['arbitrary_data']['depth']; ?>">
            <?php echo $args['arbitrary_data']['text']; ?>
    </div>   
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js#asyncload" async></script>

<script>
$(document).ready(function() {

    var screenWidth = window.innerWidth;
    if (screenWidth > 1024) {
        if (document.getElementById('parallax_jumbo')) {
            var scene = document.getElementById('parallax_jumbo');
            var parallaxInstance = new Parallax(scene, {
                hoverOnly: true,
                relativeInput: true,

            });
        }
    }
});


</script>