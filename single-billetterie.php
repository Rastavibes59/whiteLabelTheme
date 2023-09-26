<?php get_header(); ?>

<section class="pt-150 pb-60 mt-pt-70 bg-white">
    <div class="container grid cols-3 md-cols-1 gap-20 blog">
        <div class="md-colspan-1 colspan-2 flex column justify-flex-start align-center blogArticle bg-white shadowed md-order-1">
            <div class="blogArticle-head">
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url(); ?>" title='<?php echo the_title() ?>' class="blogArticle-image" loading="lazy">
                <?php endif; ?>
            </div>
            <div class="blogArticle-body p-15 mt-30">
                <h1><?php echo the_title() ?></h1>
                <p>Du : <strong><?php the_field('event_start'); ?></strong> Au : <strong><?php the_field('event_stop'); ?></strong></p>

                <?php the_field('description'); ?>
            </div>
        </div>

        <aside class="md-colspan-1 colspan-1 flex column justify-flex-start align-flex-start p-20 bg-white blogAside md-order-0">
            <h3 class="xs-mt-40 xs-mb-10">Informations :</h3>
            <p><strong>Date de début :</strong> <?php the_field('event_start'); ?></p>
            <p><strong>Date de fin :</strong> <?php the_field('event_stop'); ?></p>
            <?php if (get_field('prerequis') !== null) : ?>
                <p><strong>Prérequis :</strong></p>
                <p><?php the_field('prerequis'); ?></p>
            <?php endif; ?>
        </aside>

    </div>
</section>

<?php get_footer(); ?>