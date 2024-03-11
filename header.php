<!DOCTYPE html>

<html lang="<?php echo get_locale() ?>">
    <head>
        <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>  -->
        <?php  wp_head(); ?>

    </head>

    <?php             
            $fixedHeader = get_theme_mod('fixed_header', true) == true ? 'fixed' : '';
            $shrinkedHeader = get_theme_mod('shrinked_header', true) == true ? 'shrink' : '';
            $transparentHeader = get_theme_mod('transparent_header', true) == true ? 'transparentNav' : '';
        ?>

    <body <?php if ( !is_front_page() ) { body_class( 'noJumbo' ); } else { body_class(); } ?>>
        <div class="mainContainer" role="main">
            <header class="header pt-10 pb-10 <?php echo $fixedHeader . ' ' . $shrinkedHeader . ' ' . $transparentHeader; ?>">
                <div class="container flex row align-center justify-space-between">
                    <?php if ( function_exists( 'the_custom_logo' ) ) {
                        the_custom_logo();
                    };?>
                    <nav id="mainNav" class="collapsed">
                        <div class="hamburger-icon" id="icon">
                            <div class="icon-1" id="a"></div>
                            <div class="icon-2" id="b"></div>
                            <div class="icon-3" id="c"></div>
                            <div class="clear"></div>
                        </div>
                        <?php wp_nav_menu(

                            array(
                                'theme_location' => 'top-menu',
                                'menu_class' => 'mainNav'
                            )
                        ); ?>
                    </nav>
                </div>
            </header>
        <?php
            $args = array(
                'post_type' => 'reseau',
                //'orderby' => get_post_meta($post->ID, 'date', true),
                'order' => 'ASC',
                'posts_per_page'    => -1,
                );
            $query = new WP_Query( $args );   

            if($query->have_posts() ) : ?>
            <ul class="social flex column justify-flex-start align-center gap-50">
                        
               <?php while($query->have_posts() ) : $query->the_post();?>
                <li class=""><a href="<?php the_field('link') ?>" target="_blank" alt="<?php echo get_field('reseau') ?>" title="<?php echo get_field('reseau') ?>" ><img src="<?php echo get_template_directory_uri() . '/assets/public/images/svg/RS/icon-' . get_field('reseau') .'.svg'; ?>" width="30" height="30" alt="" loading="lazy"></a></li>
                <?php endwhile; ?>
            <?php endif; wp_reset_query()?>
        </ul>
        <div class="content">
