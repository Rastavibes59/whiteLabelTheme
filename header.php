<!DOCTYPE html>

<html lang="<?php get_language_attributes(); ?>">
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <?php  wp_head(); ?>
    </head>

    <body <?php body_class(); ?> <?php if(get_field('fixed_background', 'option')) : ?> style="background-image: url(<?php the_field('fixed_background', 'option'); ?>)" <?php endif; ?> >
        <div class="mainContainer">
        <header class="header transparent" >
            <?php if ( has_nav_menu( 'top-menu-2' ) ) : ?>
                <div class="container flex row align-center justify-center logoCenter">

                    <nav class="collapsed nav-1">
                        <?php wp_nav_menu(

                            array(
                                'theme_location' => 'top-menu',
                                'menu_class' => 'mainNav'
                            )
                        ); ?>
                    </nav>

                    <?php if ( function_exists( 'the_custom_logo' ) ) {
                        the_custom_logo();
                    };?>
                    <nav class="collapsed nav-2">

                        <?php wp_nav_menu(

                            array(
                                'theme_location' => 'top-menu-2',
                                'menu_class' => 'mainNav'
                            )
                        ); ?>
                    </nav>
                    
                    <nav class="collapsed mobileNav">
                        <?php wp_nav_menu(

                            array(
                                'theme_location' => 'mobile-menu',
                                'menu_class' => 'mobileNav-menu'
                            )
                        ); ?>
                    </nav>
                </div>

            <?php else : ?>
                <div class="container flex row align-center justify-flex-start logoLeft">

                    <?php if ( function_exists( 'the_custom_logo' ) ) {
                        the_custom_logo();
                    };?>
                    <nav class="collapsed nav-1">
                        <?php wp_nav_menu(

                            array(
                                'theme_location' => 'top-menu',
                                'menu_class' => 'mainNav'
                            )
                        ); ?>
                    </nav>
                </div>
            <?php endif; ?>
            <?php if ( has_nav_menu( 'custom-posts-menu' ) ) : ?>
            <nav class="collapsed nav-3 p-30">
                <?php wp_nav_menu(

                    array(
                        'theme_location' => 'custom-posts-menu',
                        'menu_class' => 'custom-posts-button'
                    )
                ); ?>
            </nav>
            <?php endif; ?>
        </header>
        <div class="content">


        