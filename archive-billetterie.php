<?php get_header();
/*
Template Name: PAGE BILLETTERIE
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
        <div class="flex column justify-flex-start align-center">
            <img src="<?php echo get_template_directory_uri() . '/assets/public/images/svg/PICTO-01.svg' ?>" class="mb-15" alt="billet remboursable" width="80" height="80" loading="lazy">
            <p class="text-center w-100p">Billets remboursables<br> en cas d'annulation de l'édition<br>liée au covid</p>
        </div>
        <a href="#faq" class="text-center w-100p" class="flex column justify-flex-start align-center">
            <img src="<?php echo get_template_directory_uri() . '/assets/public/images/svg/PICTO-02.svg' ?>" class="mb-15" alt="faq billetterie" width="80" height="80" loading="lazy">
            <p><strong>FAQ<br>billetterie</strong></p>
        </a>
        <div class="flex column justify-flex-start align-center">
            <img src="<?php echo get_template_directory_uri() . '/assets/public/images/svg/PICTO-03.svg' ?>" class="mb-15" alt="billet remboursable" width="80" height="80" loading="lazy">
            <p class="text-center w-100p">Partenaires, CE, BDE<br>associations :</p>
            <a href="<?php echo get_permalink(get_page_by_title('Contact')) ?>" class="fc-fourth text-center w-100p">Contactez-nous</a>
        </div>
    </div>
    <?php

    $args = array(
        'post_type' => 'billetterie',
        //'orderby' => get_post_meta($post->ID, 'date', true),
        'order' => 'ASC',
        'posts_per_page'    => -1,
    );
    $query = new WP_Query($args);

    $cats = get_categories($args);

    $now = date("d-m-Y h:i");
    ?>


    <ul class="container grid md-cols-1 cols-3 gap-15 archive billetterie animate pt-50 pb-5">

        <?php
        if ($query->have_posts()) :

            while ($query->have_posts()) : $query->the_post();
                $index = $query->current_post;
                get_template_part(
                    'includes/common/archive',
                    'billetterie',
                    array(
                        'class'             => 'animate fade-in slide-left slow delay-' . $index . '00ms',
                        'arbitrary_data'    => array(
                            'title'         => get_the_title(),
                            'thumbnail'     => get_the_post_thumbnail_url(),
                            'link'          => get_field('link'),
                            'desc'          => get_field('desc'),
                            'price'         => get_field('price'),
                        ),
                    )
                );

            endwhile;
        else : ?>

            <p class="size-big colspan-4 md-colspan-1 text-center">AUCUN RESULTAT POUR VOTRE RECHERCHE</p>
        <?php endif;
        wp_reset_query();
        ?>
    </ul>


</section>

<?php if (have_rows('faq')) : ?>

    <section id="faq" class="bg-white pt-60 pb-60">
        <div class="container flex column justify-flex-start align-center gap-15 animate">
            <h2 class="text-center w-100p mb-50">FAQ de la billetterie</h2>

            <?php while (have_rows('faq')) : the_row(); ?>



                <div class="flex column justify-flex-start align-flex-start faq collapsed w-100p mb-30">
                    <p class="mb-0 ml-15 upperCase"><strong class="uppercase"><?php the_sub_field('question') ?></strong></p>
                    <div class="faq-answer flex column justify-flex-start align-flex-start w-100p pt-15">
                        <?php the_sub_field('reponse') ?>
                    </div>
                </div>

            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>


<?php get_footer(); ?>