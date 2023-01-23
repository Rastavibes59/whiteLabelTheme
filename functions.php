<?php

/* ADD THEME SUPPORTS */

add_theme_support( 'custom-background' );

//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

/* LOAD META TAGS */

function header_metadata() {

  ?>

        <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php

}
add_action( 'wp_head', 'header_metadata' );


// remove dashicons in frontend to non-admin 
function wpdocs_dequeue_dashicon() {
    if (current_user_can( 'update_core' )) {
        return;
    }
    wp_deregister_style('dashicons');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon' );


// ADD YOAST TITLE TAG

add_theme_support( 'title-tag' );

// GOOGLE FONTS

function google_fonts() {
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;600;800;900&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'google_fonts' );

/* LOAD CSS */

function load_stylesheets() {
    wp_register_style('RastaLayout', get_template_directory_uri() . '/assets/public/css/RastaLayout.css', array(), false, 'all' );
    wp_enqueue_style('RastaLayout');

    wp_register_style('Components', get_template_directory_uri() . '/assets/public/css/custom.css', array(), false, 'all' );
    wp_enqueue_style('Components');

}
add_action('wp_enqueue_scripts','load_stylesheets' );

/* ADMIN CUSTOM CSS */

function admin_css() {
	$admin_handle = 'admin_css';
	$admin_stylesheet = get_template_directory_uri() . '/assets/public/css/admin.css';

	wp_enqueue_style($admin_handle, $admin_stylesheet);
}
add_action('admin_print_styles', 'admin_css', 11);

/* INCLUDE JQUERY */

function include_jquery() {
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', '', 1, false );
    add_action('wp_enqueue_scripts','jquery' );
}
add_action('wp_enqueue_scripts','include_jquery' );

/* LOAD CUSTOM SCRIPTS */

function load_scipts() {
    wp_register_script('js-cookies', 'https://cdnjs.cloudflare.com/ajax/libs/js-cookie/3.0.1/js.cookie.min.js#asyncload', '', 1, true );
    wp_enqueue_script('js-cookies');
    wp_register_script('header', get_template_directory_uri() . '/assets/public/js/header.js', '', 1, true );
    wp_enqueue_script('header');
    wp_register_script('modal', get_template_directory_uri() . '/assets/public/js/modals.js', '', 1, true );
    wp_enqueue_script('modal');
    wp_register_script('order', get_template_directory_uri() . '/assets/public/js/order.js', '', 1, true );
    wp_enqueue_script('order');
    wp_register_script('inViewport', get_template_directory_uri() . '/assets/public/js/inViewport.js', '', 1, true );
    wp_enqueue_script('inViewport');
    wp_register_script('fakeSelects', get_template_directory_uri() . '/assets/public/js/select.js', '', 1, true );
    wp_enqueue_script('fakeSelects');
    wp_register_script('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js#asyncload', '', 1, true );
    wp_enqueue_script('slick');
    wp_register_script('parallaxjs', get_template_directory_uri() . '/assets/public/js/parallax.min.js', '', 1, true );
    wp_enqueue_script('parallaxjs');

;
}

add_action('wp_enqueue_scripts','load_scipts' );

/* HANDLE MENUS */

add_theme_support('menus');
add_theme_support('post-thumbnails');

register_nav_menus(

    array(
        'top-menu' => __('Naigation Haute gauche', 'theme'),
        'top-menu-2' => __('Naigation Haute droite', 'theme'),
        'custom-posts-menu' => __('Bouton déporté', 'theme'),
        'mobile-menu' => __('Menu mobile', 'theme'),
        'footer-menu' => __('Menu de pied de page', 'theme'),
        'external-links-menu' => __('Menus liens externes footer', 'theme'),
    )
);

/* CUSTOM OTPIONS */

require_once(get_template_directory() . '/includes/functions/cutom-option-pages.php');

/* CUSTOMIZER */

require_once(get_template_directory() . '/includes/functions/customizer.php');

/* CUSTOM IMAGE SIZES */

require_once(get_template_directory() . '/includes/functions/image-sizes.php');

/* CUSTOM LOGO */

require_once(get_template_directory() . '/includes/functions/custom-logo.php');

/* METABOX OPTIONS */

require_once(get_template_directory() . '/includes/functions/metabox-options.php');

/* EXCERPT LENGTH */

require_once(get_template_directory() . '/includes/functions/excerpt-length.php');

/* SHORTCODES */

require_once(get_template_directory() . '/includes/functions/shortcodes.php');

/* GET CURRENT ARCHIVE POST TYPE */

require_once(get_template_directory() . '/includes/functions/get-archive-post-type.php');

/* LOAD THEME'S PLUGINS  */
add_action('after_setup_theme', 'my_load_plugin');

// Define path and URL to the plugins directory.
function my_load_plugin() {
    define( 'MY_PLUGINS_PATH', get_template_directory() . '/includes/plugins/' );
    define( 'MY_ACF_URL', get_template_directory() . '/includes/plugins/advanced-custom-fields-pro/' );

    // Include the plugins.
    if (!class_exists('ACF')) {
        include_once( MY_PLUGINS_PATH . 'advanced-custom-fields-pro/acf.php' );
    }
    if (!function_exists('yoast_acf_report_missing_acf')) {
        include_once( MY_PLUGINS_PATH . 'acf-content-analysis-for-yoast-seo/yoast-acf-analysis.php' );
    };
    if (!function_exists('acf_cf7_textdomain')) {
        include_once( MY_PLUGINS_PATH . 'acf-field-for-contact-form-7/acf-field-for-contact-form-7.php' );
    }
    if (!class_exists('npx_acf_plugin_image_aspect_ratio_crop')) {
        include_once( MY_PLUGINS_PATH . 'acf-image-aspect-ratio-crop/acf-image-aspect-ratio-crop.php' );
    }
    if (!defined('AI1WM_PLUGIN_BASENAME')) {
        include_once( MY_PLUGINS_PATH . 'all-in-one-wp-migration/all-in-one-wp-migration.php' );
    }
    if (!defined('WPCF7_VERSION')) {
        include_once( MY_PLUGINS_PATH . 'contact-form-7/wp-contact-form-7.php' );
    }
    if (!class_exists('Duplicate_PPMC_Init')) {
        include_once( MY_PLUGINS_PATH . 'duplicate-post-page-menu-custom-post-type/duplicate-post-page-menu-cpt.php' );
    }
    if (!class_exists('RegenerateThumbnails')) {
        include_once( MY_PLUGINS_PATH . 'regenerate-thumbnails/regenerate-thumbnails.php' );
    }
    if (!defined('BODHI_SVGS_PLUGIN_PATH')) {
        include_once( MY_PLUGINS_PATH . 'svg-support/svg-support.php' );
    }
    if (!defined('WPSEO_FILE')) {
        include_once( MY_PLUGINS_PATH . 'wordpress-seo/wp-seo.php' );
    }

    /* ACF */

    // Customize the url setting to fix incorrect asset URLs.
    /* add_filter('acf/settings/url', 'my_acf_settings_url');
    function my_acf_settings_url( $url ) {
        return MY_ACF_URL;
    } */

    // (Optional) Hide the ACF admin menu item.
    add_filter('acf/settings/show_admin', '__return_true');

    // When including the PRO plugin, hide the ACF Updates menu
    add_filter('acf/settings/show_updates', '__return_true', 100);
};

    // ACF FUNCTIONS 

    require_once(get_template_directory() . '/includes/functions/acf/acf-zero-index.php');
    require_once(get_template_directory() . '/includes/functions/acf/acf-superior-date.php');
    require_once(get_template_directory() . '/includes/functions/acf/acf-custom-field-excerpt.php');

    add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
    function my_acf_json_save_point( $path ) {
        
        // update path
        $path = get_stylesheet_directory() . '/acf-json';
        
        
        // return
        return $path;
        
    }
/* WP REMOVE ASSETS */

//require_once(get_template_directory() . '/includes/functions/wp-remove-assets.php');

/**
 * Proper ob_end_flush() for all levels
 *
 * This replaces the WordPress `wp_ob_end_flush_all()` function
 * with a replacement that doesn't cause PHP notices.
 */
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );
add_action( 'shutdown', function() {
   while ( @ob_end_flush() );
} );

// GET FORM TITLE BY ID

function marcel_get_the_form_title($form_id) {
    $forminfo = RGFormsModel::get_form($form_id);
    $form_title = $forminfo->title;
    return $form_title;
}

/* REMOVE P AND BR TAGS FROM CONTACT FORM 7 */

add_filter('wpcf7_autop_or_not', '__return_false');


/* DISABLE RECAPTCHA WHEN NOT NEEDED */

function block_recaptcha_badge() {
    if ( !is_page( array( 'contact' ) ) ) {
        wp_dequeue_script( 'google-recaptcha' );
        wp_deregister_script( 'google-recaptcha' );
        add_filter( 'wpcf7_load_js', '__return_false' );
        add_filter( 'wpcf7_load_css', '__return_false' );
    }
}
add_action( 'wp_print_scripts', 'block_recaptcha_badge' );
