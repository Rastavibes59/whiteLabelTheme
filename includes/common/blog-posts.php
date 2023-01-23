<?php
// Example foo.php template.

// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'class'          => '',
        'arbitrary_data' => array(
            'blog-posts' => '',
        ),
    )
); 

$countItems = 0;
$blog_posts = $args['arbitrary_data']['blog-posts']; 
$totalItems = $countItems = count($blog_posts);
?>

<div class="grid md-cols-1 cols-4 gap-15 archive animate w-100 bg">

<?php

    foreach ($blog_posts as $post) {
        $post_id = $post->ID;                        
            get_template_part(
                'includes/common/article',
                'item',
                array(
                    'class'             => 'animate fade-in slide-left slow delay-' . $countItems . '00ms',
                    'arbitrary_data'    => array(
                        'title'         => get_the_title(),
                        'thumbnail'     => get_the_post_thumbnail_url(get_the_ID(), 'custom-post'),
                        'link'          => get_permalink(),
                        'date'          => get_the_date('d/m/Y'),
                    ),
                )
            );
            $countItems++;
    };
    wp_reset_query();

?>

</div>


<script type="text/javascript">
    $(document).ready(function() {
      if (window.matchMedia("(max-width: 768px)").matches) {
        $('.archive').slick({
            infinite: true,
            slide: '.archiveItem',
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: 500,
            autoplay: true,
            autoplaySpeed: 5000,
            pauseOnHover: true,
            pauseOnFocus: true,
            centerMode: true,
            centerPadding: 15,
            arrows: false,
            dots: true,
        });
      }

    })
</script>


