<?php if (have_posts()) : 
    while (have_posts()) : the_post(); ?>


<style>
        .landing-img {
            width: 100% !important;
            height: auto !important;
            object-fit: contain !important;
            padding: 0 !important;
            margin: 0 !important;
            align-self: center;
            justify-self: center;
        }


        .landing-bg {
            background-image: url(<?php echo get_template_directory_uri() . '/assets/public/images/background.jpg' ?>);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            width: 100%;
            min-height: 100vh;
        }

        @media screen and (max-width: 768px) {
            .landing-img {
                object-fit: contain;
            }

            .landing-bg {
                background-image: url(<?php echo get_template_directory_uri() . '/assets/public/images/background-mobile.jpg' ?>);
            }

        }

</style>


<section id="scene" class="landing-bg flex column justify-center align-center">
        <a href="http://www.festivalpleinair.fr/" target="_blank"  class="container flex column justify-center align-center" data-depth="0.4">
            <img src="<?php echo get_template_directory_uri() . '/assets/public/images/logo.png' ?>" width="800" height="800" class="landing-img">
        </a>
</section>




<?php 
    endwhile;
endif; ?>