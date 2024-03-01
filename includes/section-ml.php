<?php if (have_posts()) : while (have_posts()) : the_post();
    if( strlen(the_content()) > 0) : ?>
        <section class="bg-primary absoluteContent">
            <div class="container overlay">
                <?php the_content(); ?>
            </div>
        </section>
    <?php endif;
endwhile; endif;?>