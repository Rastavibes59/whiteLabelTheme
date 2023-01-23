<?php 
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