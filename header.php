<!DOCTYPE html>

<html>
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <?php  wp_head(); ?>

    </head>

    <body <?php if ( !is_front_page() ) { body_class( 'noJumbo' ); } else { body_class(); } ?>>
        <div class="mainContainer">
        <?php if(!is_page(1317)) : ?>
            <header class="header">
                <div class="container flex row align-center justify-space-between">
                    <?php if ( function_exists( 'the_custom_logo' ) ) {
                        the_custom_logo();
                    };?>
                    <nav class="collapsed">
                            <?php wp_nav_menu(

                                array(
                                    'theme_location' => 'top-menu',
                                    'menu_class' => 'mainNav'
                                )
                            ); ?>
                    </nav>
                </div>
            </header>
        <?php endif; ?>
        <?php
            $args = array(
                'post_type' => 'reseau',
                //'orderby' => get_post_meta($post->ID, 'date', true),
                'order' => 'ASC',
                'posts_per_page'    => -1,
                );
            $query = new WP_Query( $args );   

            if($query->have_posts() ) : ?>
            <ul class="social flex column justify-flex-start align-center">
                        
               <?php while($query->have_posts() ) : $query->the_post();?>
                <li class="mb-5"><a href="<?php the_field('link') ?>"><img src="<?php echo get_template_directory_uri() . '/assets/public/images/svg/RS/icon-' . get_field('reseau') .'.svg'; ?>" width="30" height="30" alt="" loading="lazy"></a></li>
                <?php endwhile; ?>
            <?php endif; wp_reset_query()?>
        </ul>
        <div class="content">
