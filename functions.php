<?php

//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style'); // Remove WooCommerce block CSS
}
add_action('wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100);

/* LOAD META TAGS */

function header_metadata()
{

    // Post object if needed
    // global $post;

    // Page conditional if needed
    // if( is_page() ){}

?>

    <meta name="viewport" content="width=device-width, initial-scale=1">
<?php

}
add_action('wp_head', 'header_metadata');


// remove dashicons in frontend to non-admin 
function wpdocs_dequeue_dashicon()
{
    if (current_user_can('update_core')) {
        return;
    }
    wp_deregister_style('dashicons');
}
add_action('wp_enqueue_scripts', 'wpdocs_dequeue_dashicon');

// ADD YOAST TITLE TAG

add_theme_support('title-tag');

// GOOGLE FONTS

/* function google_fonts()
{
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto&family=Rubik:wght@300;400;600;700;800;900&display=swap', false);
}
add_action('wp_enqueue_scripts', 'google_fonts'); */

/* LOAD CSS */

function load_stylesheets()
{
    wp_register_style('RastaLayout', get_template_directory_uri() . '/assets/public/css/RastaLayout.css', array(), false, 'all');
    wp_enqueue_style('RastaLayout');

    wp_register_style('Components', get_template_directory_uri() . '/assets/public/css/custom.css', array(), false, 'all');
    wp_enqueue_style('Components');

    wp_register_style('leaflet', 'https://unpkg.com/leaflet@1.8.0/dist/leaflet.css', array(), false, 'all');
    wp_enqueue_style('leaflet');
}
add_action('wp_enqueue_scripts', 'load_stylesheets');

/* ADMIN CUSTOM CSS */

function admin_css()
{
    $admin_handle = 'admin_css';
    $admin_stylesheet = get_template_directory_uri() . '/assets/public/css/admin.css';

    wp_enqueue_style($admin_handle, $admin_stylesheet);
}
add_action('admin_print_styles', 'admin_css', 11);


/* INCLUDE JQUERY */

function include_jquery()
{
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', '', 1, false);
    add_action('wp_enqueue_scripts', 'jquery');
}
add_action('wp_enqueue_scripts', 'include_jquery');

/* LOAD CUSTOM SCRIPTS */

function load_scipts()
{
    wp_register_script('js-cookies', 'https://cdnjs.cloudflare.com/ajax/libs/js-cookie/3.0.1/js.cookie.min.js#asyncload', '', 1, true);
    wp_enqueue_script('js-cookies');
    wp_register_script('headerjs', get_template_directory_uri() . '/assets/public/js/header.js', '', 1, true);
    wp_enqueue_script('headerjs');
    wp_register_script('modaljs', get_template_directory_uri() . '/assets/public/js/modals.js', '', 1, true);
    wp_enqueue_script('modaljs');
    wp_register_script('inViewportjs', get_template_directory_uri() . '/assets/public/js/inViewport.js', '', 1, true);
    wp_enqueue_script('inViewportjs');
    wp_register_script('fakeSelectsjs', get_template_directory_uri() . '/assets/public/js/select.js', '', 1, true);
    wp_enqueue_script('fakeSelectsjs');
}

add_action('wp_enqueue_scripts', 'load_scipts');

/* DISABLE GUTENBERG */

add_filter('use_block_editor_for_post', '__return_false', 10);

/* HANDLE MENUS */

add_theme_support('menus');
add_theme_support('post-thumbnails');

register_nav_menus(

    array(
        'top-menu' => __('Naigation Haute', 'theme'),
        'footer-menu' => __('Menu de pied de page', 'theme'),
        'external-links-menu' => __('Menus liens externes footer', 'theme'),
    )
);

/* LOAD SCRIPTS ASYNCHRONOUSLY */

require_once(get_template_directory() . '/includes/functions/asyncLoad.php');

/* CUSTOM OTPIONS */

require_once(get_template_directory() . '/includes/functions/customizer.php');

/* CUSTOM IMAGE SIZES */

require_once(get_template_directory() . '/includes/functions/image-sizes.php');

/* CUSTOM LOGO */

require_once(get_template_directory() . '/includes/functions/custom-logo.php');

/* GET CURRENT ARCHIVE POST TYPE */

require_once(get_template_directory() . '/includes/functions/get-archive-post-type.php');

/* METABOX OPTIONS */

require_once(get_template_directory() . '/includes/functions/metabox-options.php');

/* UPLOAD CUSTOM MIME TYPES */

require_once(get_template_directory() . '/includes/functions/custom-mime-types.php');

/* EXCERPT LENGTH */

require_once(get_template_directory() . '/includes/functions/excerpt-length.php');

/* CUSTOM POST TYPES */

require_once(get_template_directory() . '/includes/functions/custom-post-types.php');

/* SHORTCODES */

require_once(get_template_directory() . '/includes/functions/shortcodes.php');

/* FIX PREVIEW MODE */

require_once(get_template_directory() . '/includes/functions/preview-fix.php');


/* MENU ATTRIBUTES */

//require_once(get_template_directory() . '/includes/functions/menu-attributes.php');

/* WP REMOVE ASSETS */

//require_once(get_template_directory() . '/includes/functions/wp-remove-assets.php');


/* ACF FUNCTIONS */

require_once(get_template_directory() . '/includes/functions/acf/acf-zero-index.php');
require_once(get_template_directory() . '/includes/functions/acf/acf-superior-date.php');


// GET FORM TITLE BY ID

function marcel_get_the_form_title($form_id)
{
    $forminfo = RGFormsModel::get_form($form_id);
    $form_title = $forminfo->title;
    return $form_title;
}

/* REMOVE P AND BR TAGS FROM CONTACT FORM 7 */

add_filter('wpcf7_autop_or_not', '__return_false');
