<?php get_header();


$field = get_field_object('field_6262b72087619');
$value = get_field('stage');
$label = $field['choices'][$value];

?>

<section class="pt-150 md-pb-100 pb-60 bg-white programmation">
    <div class="container grid cols-2 md-cols-1 gap-15 ">
        <div class="programmation-main flex column justify-space-between align-center">
            <?php if (has_post_thumbnail()) : ?>
                <img src="<?php the_post_thumbnail_url('large'); ?>" title='<?php echo the_title() ?>' class="programmation-image" width="535" height="535" loading="lazy">
            <?php endif; ?>
            <div class="grid cols-2 md-cols-1 gap-15 p-15 w-100p">
                <div class="flex column justify-flex-start align-flex-start">
                    <?php if (have_rows('reseaux_sociaux')) : ?>
                        <ul class="flex row justify-flex-start align-center">

                            <?php while (have_rows('reseaux_sociaux')) : the_row(); ?>
                                <a href="<?php the_sub_field('link') ?>" class="programmation-rs" target="_blank"><img src="<?php echo get_template_directory_uri() . '/assets/public/images/svg/RS/icon-' . get_sub_field('reseau_social') . '.svg'; ?>" class="mr-10" alt="" width="40" height="40" loading="lazy"></a>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>

                </div>
            </div>

            <?php
            if (have_rows('boutons')) :
                while (have_rows('boutons')) :
                    the_row(); ?>
                    <a href="<?php echo get_sub_field('link') ?>" class="btn secondary big fullWidth "><?php echo get_sub_field('text') ?></a>
            <?php endwhile;
            endif; ?>


        </div>
        <div class="programmation-text p-15 mt-30 flex column justify-flex-start align-flex-start text-justify">

            <h1 class="colspan-2 md-colspan-1 fc-secondary text-left size-h2"><?php echo the_title() ?></h1>
            <p class="colspan-2 md-colspan-1 fc-fifth text-left"><?php the_field('genre'); ?></p>
            <h3 class="colspan-2 md-colspan-1 fc-secondary text-left"> <?php the_field('date'); ?> / Scène <?php echo $label; ?></h3>
            <?php the_field('desc'); ?>
            <?php the_field('embed'); ?>
        </div>

    </div>

</section>
<!-- SECTION CUSTOM POSTS -->

<section class="bg-white pt-60 pb-60 ">

    <?php
    $args = array(
        'post_type'         => 'programmation',
        'orderby'            => 'rand',
        'order'             => 'ASC',
        'posts_per_page'    => -1,
        'post__not_in'  => array(get_the_ID()),
    );
    $query = new WP_Query($args);

    $numCols = $query->post_count;
    $countArtists = 0;
    
    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                $index = $query->current_post;

                if (get_field('headliner') == true && $countArtists < 4) { ?>

    <div class="container grid md-cols-1 cols-4 gap-15 archive programmation">

        <h2 class="text-center colspan-4 md-colspan-1 mb-30">ILS SONT AUSSI PROGRAMMÉS :</h2>

            <?php get_template_part(
                        'includes/common/archive',
                        'programmation',
                        array(
                            'class'             => 'animate fade-in slide-left slow delay-' . $index . '00ms',
                            'arbitrary_data'    => array(
                                'title'         => get_the_title(),
                                'thumbnail'     => get_the_post_thumbnail_url($query->ID, 'medium'),
                                'link'          => get_permalink(),
                            ),
                        )
                    );

                    $countArtists++;
                }



        ?>

        <?php endwhile;
        endif; ?>
        <div class="container colspan-4 md-colspan-1 flex column justify-center align-center pt-30">
            <a href="<?php echo get_post_type_archive_link( $post_type ) ?>" class="btn secondary animate big fullWidth">Programmation complète</a>
        </div>
    </div>
</section>



<?php get_footer(); ?>