<?php
get_header(); ?>

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
    <h1 class="size-huge mb-100">Cette page n'existe pas (ou pas encore ...)</h1>
    <a href="<?php echo get_home_url() ?>" class="btn primary">Retour à l'accueil</a>
</section>


<?php get_footer(); ?>