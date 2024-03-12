<?php get_header();

?>

<!-- SECTION BLOG  -->


<section class="bg-white pt-150 pb-60 mt-pt-70">

    <?php

    $args = array(
        'post_type' => get_archive_post_type(),
        //'orderby' => get_post_meta($post->ID, 'date', true),
        'order' => 'ASC',
        'posts_per_page'    => 12,
        'cat'               => isset($_GET['type']) ? $_GET['type'] : '',
    );
    $query = new WP_Query($args);

    $cats = get_categories($args);

    $now = date("d-m-Y h:i");
    ?>


    <?php if (get_archive_post_type() == "programmation") : ?>
        <div class="container flex row justify-center align-center">
            <form class="archiveFilters" method="GET" action="<?php echo esc_url(home_url('/' . get_archive_post_type())); ?>">
                <div class="form-row grid lg-cols-1 cols-3 gap-15 mt-10">
                    <div class="form-field flex column justify-flex-start align-flex-start">
                        <label for="type" class="mb-5">Filter par Date</label>
                        <select name="type" id="type">
                            <option value="" <?php !isset($_GET['type']) || $_GET['type'] == '' ? 'selected' : ''; ?>>Voir tout</option>

                            <?php foreach ($cats as $cat) :
                                if (isset($_GET['type']) && $_GET['type'] == $cat->term_id) {
                                    $selected = 'selected';
                                } else {
                                    $selected = '';
                                }
                            ?>
                                <option value="<?php echo $cat->term_id; ?>" <?php echo $selected ?>><?php echo $cat->cat_name; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-field flex column justify-flex-end align-flex-start">
                        <button href="#" type="submit" name="submit" class="btn secondary big">Valider</button>
                    </div>
                </div>
            </form>

        </div>
        <ul class="container grid lg-cols-1 cols-4 gap-15 archive programmation animate">

        <?php elseif (get_archive_post_type() == "billetterie") : ?>
            <ul class="container grid lg-cols-1 cols-4 gap-15 archive  animate">

            <?php endif; ?>

            <?php
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    $index = $query->current_post;
                    if (get_archive_post_type() == "programmation") {
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
                    } elseif (get_archive_post_type() == "billetterie") {
                        get_template_part(
                            'includes/common/archive',
                            'billetterie',
                            array(
                                'class'             => 'animate fade-in slide-left slow delay-' . $index . '00ms',
                                'arbitrary_data'    => array(
                                    'title'         => get_the_title(),
                                    'thumbnail'     => get_the_post_thumbnail_url($query->ID, 'thumbnail'),
                                    'link'          => get_permalink(),
                                    'desc'          => get_field('desc'),
                                    'price'         => get_field('price'),
                                ),
                            )
                        );
                    }
                endwhile;
            else : ?>

                <p class="size-big colspan-4 lg-colspan-1 text-center">AUCUN RESULTAT POUR VOTRE RECHERCHE</p>
            <?php endif; ?>
            <div class="container colspan-4 lg-colspan-1 flex column justify-center align-center pt-30">
                <a href="<?php echo get_page_link(1157) ?>" class="btn secondary revert big fullWidth">Billetterie à partir de 20€</a>
            </div>

            </ul>


</section>


<?php get_footer(); ?>