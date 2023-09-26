<?php

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'    => 'Réglages généraux du thème',
        'menu_title'    => 'Réglages du thème',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

/* CUSTOM THEME OPTIONS PAGE

Source : https://theme.fm/providing-typography-options-in-your-wordpress-themes/

*/


add_action('admin_menu', 'my_admin_menu');
function my_admin_menu()
{
    add_theme_page('Options du thème', 'Options du thème', 'edit_theme_options', 'my-theme-options', 'my_theme_options');
}

function my_theme_options()
{
?>
    <div class="wrap">
        <div><br></div>
        <h2>Options du thème</h2>

        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options'); ?>
            <?php settings_fields('my-options'); ?>
            <?php do_settings_sections('my-options'); ?>
            <?php submit_button(); ?>
        </form>
    </div>
<?php
}

add_action('admin_init', 'my_register_admin_settings');
function my_register_admin_settings()
{
    register_setting('my-options', 'my-options');

    // Settings fields and sections
    add_settings_section('section_typography', 'Options de typographie', 'my_section_typography', 'my-options');
    add_settings_field('primary-font', 'Typo des titres', 'my_field_primary_font', 'my-options', 'section_typography');
    add_settings_field('text-font', 'Typo des textes', 'my_field_text_font', 'my-options', 'section_typography');
}

function my_section_typography()
{
    echo 'Choisissez la police du texte et des titres du site en remplissant les options suivantes.';
}

function my_field_primary_font()
{
    $options = (array) get_option('my-options');
    $fonts = get_my_available_fonts();
    $current_font = 'arial';

    if (isset($options['primary-font']))
        $current_font = $options['primary-font'];

?>
    <select name="my-options[primary-font]">
        <?php foreach ($fonts as $font_key => $font) : ?>
            <option <?php selected($font_key == $current_font); ?> value="<?php echo $font_key; ?>"><?php echo $font['name']; ?></option>
        <?php endforeach; ?>
    </select>
<?php
}

function my_field_text_font()
{
    $options = (array) get_option('my-options');
    $fonts = get_my_available_fonts();
    $current_font = 'arial';

    if (isset($options['text-font']))
        $current_font = $options['text-font'];

?>
    <select name="my-options[text-font]">
        <?php foreach ($fonts as $font_key => $font) : ?>
            <option <?php selected($font_key == $current_font); ?> value="<?php echo $font_key; ?>"><?php echo $font['name']; ?></option>
        <?php endforeach; ?>
    </select>
<?php
}

function get_my_available_fonts()
{
    $fonts = array(
        'open-sans' => array(
            'name' => 'Open Sans',
            'import' => '@import url(https://fonts.googleapis.com/css?family=Open+Sanswght@300;400;600;700;800;900&display=swap);',
            'css' => "'Open Sans', sans-serif;"
        ),
        'lato' => array(
            'name' => 'Lato',
            'import' => '@import url(https://fonts.googleapis.com/css?family=Latowght@300;400;600;700;800;900&display=swap);',
            'css' => "'Lato', sans-serif;"
        ),
        'arial' => array(
            'name' => 'Arial',
            'import' => '',
            'css' => "Arial, sans-serif;"
        )
    );

    return apply_filters('my_available_fonts', $fonts);
}

add_action('wp_head', 'my_wp_head');

function my_wp_head()
{
    $options = (array) get_option('my-options');
    $fonts = get_my_available_fonts();
    $current_title_font_key = 'arial';
    $current_text_font_key = 'arial';

    if (isset($options['primary-font']))
        $current_title_font_key = $options['primary-font'];

    if (isset($options['text-font']))
        $current_text_font_key = $options['text-font'];

    if (isset($fonts[$current_title_font_key])) {
        $current_title_font = $fonts[$current_title_font_key];
        $current_text_font = $fonts[$current_text_font_key];

        echo "<style>";
        echo $current_title_font['import'];
        echo "html{    /* FONTS VARIABLES */
            --font-title: " . $current_title_font['css'] . "
            --font-text: " . $current_text_font['css'] . "
        }</style>";
    }
}

add_filter('my_available_fonts', 'my_new_fonts');

function my_new_fonts($fonts)
{
    $fonts['marvel'] = array(
        'name' => 'Marvel',
        'import' => '@import url(https://fonts.googleapis.com/css?family=Marvelwght@300;400;600;700;800;900&display=swap);',
        'css' => "'Marvel', sans-serif;"
    );
    $fonts['Montserrat'] = array(
        'name' => 'Montserrat',
        'import' => '@import url(https://fonts.googleapis.com/css?family=Montserratwght@300;400;600;700;800;900&display=swap);',
        'css' => "'Montserrat', sans-serif;"
    );
    return $fonts;
}
