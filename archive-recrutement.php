<?php get_header();
/*
Template Name: PAGE RECTUREMENT
Template Post Type: page
*/

?>


<!-- SECTION JUMBOTRON -->

<?php if (get_field('background_image')) :

    $isJumbo = true;

    get_template_part(
        'includes/common/jumbotron',
        '',
        array(
            'class'             => '',
            'arbitrary_data'    => array(
                'size'          => 'standard',
                'picture'       => get_field('background_image'),
                'title'         => get_the_title(),
            ),
        )
    );
endif; ?>

<!-- SECTION BLOG  -->


<section class="bg-white pt-150 pb-60 mt-pt-70">


    <div class="container flex row justify-center align-center gap-15">
        <?php

        $args = array(
            'post_type' => 'recrutement',
            //'orderby' => get_post_meta($post->ID, 'date', true),
            'order' => 'ASC',
            'posts_per_page'    => -1,
        );
        $query = new WP_Query($args);

        ?>


        <ul class="container grid md-cols-1 cols-3 gap-15 archive billetterie animate pt-50 pb-5">

            <?php
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();


                    $index = $query->current_post;
                    get_template_part(
                        'includes/common/archive',
                        'job',
                        array(
                            'class'             => 'animate fade-in slide-left slow delay-' . $index . '00ms',
                            'arbitrary_data'    => array(
                                'title'         => get_the_title(),
                                'thumbnail'     => get_the_post_thumbnail(get_the_ID(), 'thumbnail', array('class' => 'archiveItem-image')),
                                'linkType'      => get_field('linkType'),
                                'externalLink'  => get_field('externalLink'),
                                'download'      => get_field('download'),
                                'desc'          => get_field('desc'),
                            ),
                        )
                    );

                endwhile;
            else : ?>

                <p class="size-big colspan-4 md-colspan-1 text-center">AUCUN RESULTAT POUR VOTRE RECHERCHE</p>
            <?php endif; ?>
        </ul>
    </div>

</section>
<?php get_footer(); ?>