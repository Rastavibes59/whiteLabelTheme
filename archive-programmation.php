<?php get_header();
/*
Template Name: PAGE PROGRAMMATION
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

    <?php

    $args = array(
        'post_type'         => 'programmation',
        //'orderby' => get_post_meta($post->ID, 'date', true),
        'order' => 'ASC',
        'posts_per_page'    => -1,
        'cat'               => isset($_GET['date']) ? $_GET['date'] : '',
    );
    $query = new WP_Query($args);

    $cats = get_categories($args);

    $now = date("d-m-Y h:i");
    ?>

    <div class="container grid cols-4 md-cols-1 gap-15 w-100p mb-50">
        <div class="colspan-3 flex column justify-flex-start align-flex-start mb-60">
            <h1 class="archiveTitle fc-secondary text-left mb-15"><?php the_field('title') ?></h1>
            <h2 class="archiveTitle fc-secondary text-left size-h3"><?php the_field('subtitle') ?></h2>
        </div>
        <form class="archiveFilters flex row justify-center align-center" method="GET" action="<?php echo esc_url(home_url('/programmation')); ?>">
            <div class="form-row mt-10">
                <div class="form-field flex column justify-flex-start align-flex-start">
                    <label for="type" class="mb-5">Filter par Date</label>
                    <select name="date" id="date" onchange="console.log('changed')">
                        <option value="" <?php !isset($_GET['date']) || $_GET['date'] == '' ? 'selected' : ''; ?>>Week-end</option>

                        <?php foreach ($cats as $cat) :
                            if (isset($_GET['date']) && $_GET['date'] == $cat->term_id) {
                                $selected = 'selected';
                            } else {
                                $selected = '';
                            }
                        ?>
                            <option value="<?php echo $cat->term_id; ?>" <?php echo $selected ?>><?php echo $cat->cat_name; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        </form>

    </div>
    <ul class="container grid md-cols-1 cols-4 gap-15 archive programmation animate">

        <?php
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                $index = $query->current_post;
                get_template_part(
                    'includes/common/archive',
                    'programmation',
                    array(
                        'class'             => 'animate fade-in slide-left slow delay-' . $index . '00ms',
                        'arbitrary_data'    => array(
                            'title'         => get_the_title(),
                            'thumbnail'     => get_the_post_thumbnail_url($query->ID, 'thumbnail'),
                            'link'          => get_permalink(),
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

    <div class="container grid cols-2 md-cols-1 w100-p gap-30 colspan-4 md-colspan-1">

        <?php
        if (have_rows('boutons')) :
            while (have_rows('boutons')) :
                the_row(); ?>

                <a href="<?php echo get_sub_field('link') ?>" class="btn fifth big fullWidth  mt-50"><?php echo get_sub_field('text') ?></a>

        <?php endwhile;
        endif; ?>

    </div>



</section>

<?php get_footer(); ?>