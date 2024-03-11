<?php
// video home section.

// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'id'                => 'parallax_jumbo',
        'class'             => 'jumbotron video pt-100 md-pt-00 home flex column justify-center align-center',
        'arbitrary_data'    => array(
            'background'    => get_template_directory_uri() . '/assets/public/images/background.webp',
            'text'          => '<p>HELLO WORLD !</p>',
            'mobile_placeholder'          => get_template_directory_uri() . '/assets/public/images/background.webp',
        ),
    )
);
?>
<section class="<?php echo $args['class'] ?>">
    <video id="background-video" loop muted poster="">
    <source src="<?php echo $args['arbitrary_data']['background'] ?>" type="video/mp4">
    </video>
</section>

<script>
$(document).ready(function(){
  var screenWidth = $(window).width();
  // if window width is smaller than 800 remove the autoplay attribute
  // from the video
  if (screenWidth < 800){
        $('video').removeAttr('autoplay');
  } else {
    $('video').attr('autoplay');
  }
});
</script>

