<?php get_header();
/*
Template Name: PAGE PARTENAIRES
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

    <h1 class="fc-primary text-center mb-50">UN GRAND MERCI</h1>
    <h2 class="fc-secondary size-h3 text-center mt-50 mb-50">À CELLES ET CEUX QUI CROIENT EN NOUS ET AIMENT LA FÊTE AVEC UN GRAND F !</h2>
    <div class="container flex column justify-center align-center gap-15">
        <?php

        $args = array(
            'post_type' => 'partenaires',
            'order' => 'ASC',
            'posts_per_page'    => -1,
        );

        $query = new WP_Query($args);

        $terms = get_terms(array(
            'taxonomy' => 'type',
            'hide_empty' => true,
        ));

        $types = array();

        foreach ($terms as $term) {
            array_push($types, $term->slug);
        }

        ?>

        <?php
        if ($query->have_posts() && in_array('partenaires-publics', $types)) : ?>
            <div class="grid cols-12 gap-15">
                <h4 class="colspan-3 md-colspan-1 flex column justify-center align-center flex column justify-center align-center">Partenaires publics :</h4>

                <ul class="colspan-9 md-colspan-1 grid md-cols-2 cols-6 gap-15 archive partenaires animate ">
                    <?php while ($query->have_posts()) : $query->the_post();
                        $index = $query->current_post;
                        $tax = wp_get_post_terms(get_the_id(), 'type', array('fields' => 'slugs'));
                        if ($tax[0] == 'partenaires-publics') :
                    ?>
                            <li>

                                <?php get_template_part(
                                    'includes/common/archive',
                                    'partenaire',
                                    array(
                                        'class'             => 'animate fade-in slide-left slow delay-' . $index . '00ms',
                                        'arbitrary_data'    => array(
                                            'title'         => get_the_title(),
                                            'thumbnail'     => get_the_post_thumbnail_url(),
                                            'link'          => get_field('link'),
                                        ),
                                    )
                                ); ?>
                            </li>

                    <?php endif;
                    endwhile; ?>
                </ul>

            </div>
        <?php endif; ?>
        <?php
        if ($query->have_posts() && in_array('partenaires-prives', $types)) : ?>
            <div class="grid cols-12 gap-15">
                <h4 class="colspan-3 md-colspan-1 flex column justify-center align-center">Partenaires privés :</h4>

                <ul class="colspan-9 md-colspan-1 grid md-cols-2 cols-6 gap-15 archive partenaires animate ">
                    <?php while ($query->have_posts()) : $query->the_post();
                        $index = $query->current_post;
                        $tax = wp_get_post_terms(get_the_id(), 'type', array('fields' => 'slugs'));

                        if ($tax[0] == 'partenaires-prives') :
                    ?>
                            <li>

                                <?php get_template_part(
                                    'includes/common/archive',
                                    'partenaire',
                                    array(
                                        'class'             => 'animate fade-in slide-left slow delay-' . $index . '00ms',
                                        'arbitrary_data'    => array(
                                            'title'         => get_the_title(),
                                            'thumbnail'     => get_the_post_thumbnail_url(),
                                            'link'          => get_field('link'),
                                        ),
                                    )
                                ); ?>
                            </li>

                    <?php endif;
                    endwhile; ?>
                </ul>
            </div>
        <?php endif; ?>


        <?php
        if ($query->have_posts() && in_array('labels', $types)) : ?>
            <div class="grid cols-12 gap-15">
                <h4 class="colspan-3 md-colspan-1 flex column justify-center align-center">Labels obtenus :</h4>

                <ul class="colspan-9 md-colspan-1 grid md-cols-2 cols-6 gap-15 archive partenaires animate ">
                    <?php while ($query->have_posts()) : $query->the_post();
                        $index = $query->current_post;
                        $tax = wp_get_post_terms(get_the_id(), 'type', array('fields' => 'slugs'));

                        if ($tax[0] == 'labels') :
                    ?>
                            <li>

                                <?php get_template_part(
                                    'includes/common/archive',
                                    'partenaire',
                                    array(
                                        'class'             => 'animate fade-in slide-left slow delay-' . $index . '00ms',
                                        'arbitrary_data'    => array(
                                            'title'         => get_the_title(),
                                            'thumbnail'     => get_the_post_thumbnail_url(),
                                            'link'          => get_field('link'),
                                        ),
                                    )
                                ); ?>
                            </li>

                    <?php endif;
                    endwhile; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php
        if ($query->have_posts() && in_array('collaborateurs', $types)) : ?>
            <div class="grid cols-12 gap-15">
                <h4 class="colspan-3 md-colspan-1 flex column justify-center align-center">Nous travaillons ensemble :</h4>

                <ul class="colspan-9 md-colspan-1 grid md-cols-2 cols-6 gap-15 archive partenaires animate ">
                    <?php while ($query->have_posts()) : $query->the_post();
                        $index = $query->current_post;
                        $tax = wp_get_post_terms(get_the_id(), 'type', array('fields' => 'slugs'));

                        if ($tax[0] == 'collaborateurs') :
                    ?>
                            <li>

                                <?php get_template_part(
                                    'includes/common/archive',
                                    'partenaire',
                                    array(
                                        'class'             => 'animate fade-in slide-left slow delay-' . $index . '00ms',
                                        'arbitrary_data'    => array(
                                            'title'         => get_the_title(),
                                            'thumbnail'     => get_the_post_thumbnail_url(),
                                            'link'          => get_field('link'),
                                        ),
                                    )
                                ); ?>
                            </li>

                    <?php endif;
                    endwhile; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>