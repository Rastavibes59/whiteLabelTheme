<?php
/*
Template Name: PAGE ARCHIVE
Template Post Type: page
*/


get_header(); ?>

<!-- SECTION Header -->

<?php get_template_part(
    'includes/commons/section',
    'jumbotron',
    array(
        'class' => '',
        'arbitrary_data' => array(
            'size' => 'small',
            'picture' => get_field('image'),
            'head' => get_field('isHeader'),
            'head-content' => get_field('texte_en_tete'),
            'body' => true,
            'body-title' => get_field('titre'),
            'body-message' => get_field('sous_titre'),
            'isbutton' => get_field('isButton'),
            'button-message' => get_field('titre_bouton'),
            'button-link' => get_field('url_du_bouton'),
            'button-class' => 'btn-pinky-red big',
            'isDecoupe' => false,
            'isIcons' => false,
        ),
    )
);
?>

<!-- SECTION BLOG  -->


<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 12,
    'paged' => $paged,
);
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$query = new WP_Query($args);

$temp_query = $wp_query;
$wp_query   = NULL;
$wp_query   = $query;

$items = array();
$items2 = array();
$i = 0;

if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

        <?php if ($i < 4) : ?>

            <?php
            $item = array(
                'picture' => get_the_post_thumbnail_url(),
                'title' => get_the_title(),
                'link' => get_the_permalink(),
            );

            $items['item-' . $i] = $item;
            $i++;
            ?>

        <?php else : ?>

            <?php
            $item = array(
                'picture' => get_the_post_thumbnail_url(),
                'title' => get_the_title(),
                'link' => get_the_permalink(),
            );

            $items2['item-' . $i] = $item;
            $i++;


            ?>
        <?php endif; ?>

<?php endwhile;
endif; ?>

<?php get_template_part(
    'includes/commons/section',
    'blog',
    array(
        'class'          => 'bg-white',
        'arbitrary_data' => array(
            'title' => '',
            'isbutton' => false,
            'button-title' => '',
            'button-link' => '#',
            'items' => $items,
            'isSeparator' => false,
        ),
    )
);
?>

<?php
get_template_part(
    'includes/blog/section',
    'archive',
    array(
        'class'          => 'bg-white',
        'arbitrary_data' => array(
            'title' => '',
            'items' => $items2,
            'isSeparator' => true,
            'isPagination' => true,
        ),
    )
);
?>
<div class="flex row justify-center align-center">
    <div class="pagination xs-mt-30">
        <?php
        global $wp_query;
        $big = 999999999; // need an unlikely integer

        echo paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages,
            'prev_text'    => sprintf('<img loading="lazy" class="icon medium" src="' . get_template_directory_uri() . '/assets/images/svg/chevron-back.svg">', 'textdomain'),
            'next_text'    => sprintf('<img loading="lazy" class="icon medium" src="' . get_template_directory_uri() . '/assets/images/svg/chevron-forward.svg">', 'textdomain'),
        ));

        $wp_query = NULL;
        $wp_query = $temp_query;
        ?>
    </div>
</div>


<?php ?>


<?php get_footer(); ?>