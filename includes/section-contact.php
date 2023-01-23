        <!-- SECTION JUMBOTRON -->

        <?php if (get_field('background_image')) :

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


<!-- SECTION BREADCRUMBS -->

<?php get_template_part('includes/commons/section', 'breadcrumbs'); ?>

<!-- SECTION PRODUITS -->

<section class="pt-00 md-pb-100 pb-60">
    <div class="container grid cols-3 md-cols-1 gap-20 blog">
    <h2 class="text-center colspan-12 md-colspan-1 mb-30 upperCase">nous contacter</h2>
        <div class="flex column justify-flex-start align-center contactForm">
            <?php echo apply_shortcodes( get_field('contact_form') ); ?>
        </div>

    </div>
</section>




