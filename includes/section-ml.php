<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<section id="ml" class="mt-80 mb-60">
    <div class="container">
        <h1 class="text-center"><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </div>
</section>

<?php endwhile; endif;?>