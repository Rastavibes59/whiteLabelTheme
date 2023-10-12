<?php

/**
 * Contains methods for customizing the theme customization screen.
 * 
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since whiteLabel 1.0
 */
class whiteLabel_Customize
{
   /**
    * This hooks into 'customize_register' (available as of WP 3.4) and allows
    * you to add new sections and controls to the Theme Customize screen.
    * 
    * Note: To enable instant preview, we have to actually write a bit of custom
    * javascript. See live_preview() for more.
    *  
    * @see add_action('customize_register',$func)
    * @param \WP_Customize_Manager $wp_customize
    * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
    * @since whiteLabel 1.0
    */
   public static function register($wp_customize)
   {
      //1. Define a new section (if desired) to the Theme Customizer
      $wp_customize->add_panel(
         'fonts_panel',
         array(
            'title'           => __('Typographie'),
            'description'     => esc_html__('Modifier la taille des différents blocs de texte'), // Include html tags such as 
            'priority'        => 160, // Not typically needed. Default is 160
            'capability'      => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
            'theme_supports'  => '', // Rarely needed
            'active_callback' => '', // Rarely needed
         )
      );

      $wp_customize->add_panel(
         'section_panel',
         array(
            'title'           => __('Décorations des sections'),
            'description'     => esc_html__('Permet d\'ajouter des élément visuels avant et après chaque section'), // Include html tags such as 
            'priority'        => 161, // Not typically needed. Default is 160
            'capability'      => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
            'theme_supports'  => '', // Rarely needed
            'active_callback' => '', // Rarely needed
         )
      );

      //2. Register new Sections

      $wp_customize->add_section(
         'headings_section',
         array(
            'title'        => __('Gestion des titres'),
            'panel'        => 'fonts_panel',
            'description'  => esc_html__('Modifier la police et la taille des différents titres'),
            'priority'     => 160, // Not typically needed. Default is 160
            'capability'   => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
         )
      );
      $wp_customize->add_section(
         'texts_section',
         array(
            'title'        => __('Gestion des textes'),
            'panel'        => 'fonts_panel',
            'description'  => esc_html__('Modifier la police et la taille des différents blocs de texte'),
            'priority'     => 161, // Not typically needed. Default is 160
            'capability'   => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
         )
      );
      $wp_customize->add_section(
         'buttons_section',
         array(
            'title'        => __('Gestion des boutons'),
            'panel'        => 'fonts_panel',
            'description'  => esc_html__('Modifier la police et la taille des différents boutons'),
            'priority'     => 162, // Not typically needed. Default is 160
            'capability'   => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
         )
      );
      $wp_customize->add_section(
         'nav_section',
         array(
            'title'        => __('Gestion de la navigation'),
            'panel'        => 'fonts_panel',
            'description'  => esc_html__('Modifier la police et la taille des différents boutons'),
            'priority'     => 162, // Not typically needed. Default is 160
            'capability'   => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
         )
      );


      $wp_customize->add_section(
         'coordinates_section',
         array(
            'title'        => __('Coordonnées'),
            'description'  => esc_html__('Modifier les coordonées du Festival'),
            'priority'     => 160, // Not typically needed. Default is 160
            'capability'   => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
         )
      );
      

      $wp_customize->add_section(
         'before_deco_section',
         array(
            'title'        => __('Décoration avant les sections'),
            'panel'        => 'section_panel',
            'description'  => esc_html__('Permet l\'ajout d\'un élément visuel avant chaque section'),
            'priority'     => 160, // Not typically needed. Default is 160
            'capability'   => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
         )
      );

      $wp_customize->add_section(
         'after_deco_section',
         array(
            'title'        => __('Décoration après les sections'),
            'panel'        => 'section_panel',
            'description'  => esc_html__('Permet l\'ajout d\'un élément visuel après chaque section'),
            'priority'     => 160, // Not typically needed. Default is 160
            'capability'   => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
         )
      );

      //2. Register new settings to the WP database...

      /* THEME COLORS */

      $wp_customize->add_setting(
         'primary_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'    => '#000000', //Default setting/value to save
            'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         )
      );
      $wp_customize->add_setting(
         'secondary_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'    => '#000000', //Default setting/value to save
            'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         )
      );
      $wp_customize->add_setting(
         'tertiary_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'    => '#000000', //Default setting/value to save
            'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         )
      );
      $wp_customize->add_setting(
         'fourth_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'    => '#000000', //Default setting/value to save
            'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         )
      );
      $wp_customize->add_setting(
         'fifth_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'    => '#000000', //Default setting/value to save
            'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         )
      );
      $wp_customize->add_setting(
         'text_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'    => '#000000', //Default setting/value to save
            'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         )
      );

      /* FONT SIZES */

      $wp_customize->add_setting(
         'h1_size', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'            => '82', //Default setting/value to save
            'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
            'sanitize_callback'  => 'wp_filter_nohtml_kses',
         )
      );
      $wp_customize->add_setting(
         'h2_size', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'            => '60', //Default setting/value to save
            'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
            'sanitize_callback'  => 'wp_filter_nohtml_kses',
         )
      );
      $wp_customize->add_setting(
         'h3_size', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'            => '18', //Default setting/value to save
            'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
            'sanitize_callback'  => 'wp_filter_nohtml_kses',
         )
      );
      $wp_customize->add_setting(
         'h4_size', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'            => '25', //Default setting/value to save
            'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
            'sanitize_callback'  => 'wp_filter_nohtml_kses',
         )
      );
      $wp_customize->add_setting(
         'text_size', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'            => '16', //Default setting/value to save
            'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
            'sanitize_callback'  => 'wp_filter_nohtml_kses',
         )
      );
      $wp_customize->add_setting(
         'btn_size', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'            => '16', //Default setting/value to save
            'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
            'sanitize_callback'  => 'wp_filter_nohtml_kses',
         )
      );
      $wp_customize->add_setting(
         'big_btn_size', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'            => '16', //Default setting/value to save
            'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
            'sanitize_callback'  => 'wp_filter_nohtml_kses',
         )
      );
      $wp_customize->add_setting(
         'menu_size', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'            => '16', //Default setting/value to save
            'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
            'sanitize_callback'  => 'wp_filter_nohtml_kses',
         )
      );

      /* COORDINATES */

      $wp_customize->add_setting(
         'map_lattitude', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'            => 50.6323447, //Default setting/value to save
            'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
            'sanitize_callback'  => 'wp_filter_nohtml_kses',
         )
      );
      $wp_customize->add_setting(
         'map_longitude', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'            => 3.0920238, //Default setting/value to save
            'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
            'sanitize_callback'  => 'wp_filter_nohtml_kses',
         )
      );
      $wp_customize->add_setting(
         'map_title', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'            => 'Jardin électronique', //Default setting/value to save
            'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
            'sanitize_callback'  => 'wp_filter_nohtml_kses',
         )
      );

      $wp_customize->add_setting(
         'map_address', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'            => '1 Bd des Cités Unies, 59800 LILLE', //Default setting/value to save
            'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
            'sanitize_callback'  => 'wp_filter_nohtml_kses',
         )
      );

      /* SECTION DECO */

      $wp_customize->add_setting(
         'section_before', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'            => '""', //Default setting/value to save
            'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
            'sanitize_callback'  => 'wp_filter_nohtml_kses',
         )
      );

      $wp_customize->add_setting(
         'section_after', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'            => '""', //Default setting/value to save
            'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
            'sanitize_callback'  => 'wp_filter_nohtml_kses',
         )
      );


      //3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...

      /* THEME COLORS */

      $wp_customize->add_control(new WP_Customize_Color_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'whiteLabel_primary_color', //Set a unique ID for the control
         array(
            'label'      => __('Couleur principale', 'whiteLabel'), //Admin-visible name of the control
            'settings'   => 'primary_color', //Which setting to load and manipulate (serialized is okay)
            'priority'   => 10, //Determines the order this control appears in for the specified section
            'section'    => 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
         )
      ));

      $wp_customize->add_control(new WP_Customize_Color_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'whiteLabel_secondary_color', //Set a unique ID for the control
         array(
            'label'      => __('Couleur Secondaire', 'whiteLabel'), //Admin-visible name of the control
            'settings'   => 'secondary_color', //Which setting to load and manipulate (serialized is okay)
            'priority'   => 10, //Determines the order this control appears in for the specified section
            'section'    => 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
         )
      ));

      $wp_customize->add_control(new WP_Customize_Color_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'whiteLabel_tertiary_color', //Set a unique ID for the control
         array(
            'label'      => __('Troisième Couleur', 'whiteLabel'), //Admin-visible name of the control
            'settings'   => 'tertiary_color', //Which setting to load and manipulate (serialized is okay)
            'priority'   => 10, //Determines the order this control appears in for the specified section
            'section'    => 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
         )
      ));

      $wp_customize->add_control(new WP_Customize_Color_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'whiteLabel_fourth_color', //Set a unique ID for the control
         array(
            'label'      => __('Quatrième Couleur', 'whiteLabel'), //Admin-visible name of the control
            'settings'   => 'fourth_color', //Which setting to load and manipulate (serialized is okay)
            'priority'   => 10, //Determines the order this control appears in for the specified section
            'section'    => 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
         )
      ));

      $wp_customize->add_control(new WP_Customize_Color_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'whiteLabel_fifth_color', //Set a unique ID for the control
         array(
            'label'      => __('Cinquième Couleur', 'whiteLabel'), //Admin-visible name of the control
            'settings'   => 'fifth_color', //Which setting to load and manipulate (serialized is okay)
            'priority'   => 10, //Determines the order this control appears in for the specified section
            'section'    => 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
         )
      ));

      $wp_customize->add_control(new WP_Customize_Color_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'whiteLabel_text_color', //Set a unique ID for the control
         array(
            'label'      => __('Couleur du texte', 'whiteLabel'), //Admin-visible name of the control
            'settings'   => 'text_color', //Which setting to load and manipulate (serialized is okay)
            'priority'   => 10, //Determines the order this control appears in for the specified section
            'section'    => 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
         )
      ));

      /* FONT SIZES */

      $wp_customize->add_control(
         'h1_size',
         array(
            'label' => __('Taille des Titre 1'),
            'description' => esc_html__('Taille des gros titres du site (dans le jumbotron)'),
            'section' => 'headings_section',
            'priority' => 1, // Optional. Order priority to load the control. Default: 10
            'type' => 'number', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
               'class' => 'admin-fontsize',
               'style' => 'border: 1px solid rebeccapurple',
               'placeholder' => __('Ex : 82px'),
            ),
         )
      );
      $wp_customize->add_control(
         'h2_size',
         array(
            'label' => __('Taille des Titre 2'),
            'description' => esc_html__('Taille des titres de section'),
            'section' => 'headings_section',
            'priority' => 2, // Optional. Order priority to load the control. Default: 10
            'type' => 'number', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
               'class' => 'admin-fontsize',
               'style' => 'border: 1px solid rebeccapurple',
               'placeholder' => __('Ex : 82px'),
            ),
         )
      );
      $wp_customize->add_control(
         'h3_size',
         array(
            'label' => __('Taille des Titre 3'),
            'description' => esc_html__('Taille des sous-titres du site'),
            'section' => 'headings_section',
            'priority' => 3, // Optional. Order priority to load the control. Default: 10
            'type' => 'number', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
               'class' => 'admin-fontsize',
               'style' => 'border: 1px solid rebeccapurple',
               'placeholder' => __('Ex : 82px'),
            ),
         )
      );
      $wp_customize->add_control(
         'h4_size',
         array(
            'label' => __('Taille des Titre 4'),
            'description' => esc_html__('Taille des petits titres du site'),
            'section' => 'headings_section',
            'priority' => 4, // Optional. Order priority to load the control. Default: 10
            'type' => 'number', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
               'class' => 'admin-fontsize',
               'style' => 'border: 1px solid rebeccapurple',
               'placeholder' => __('Ex : 82px'),
            ),
         )
      );
      $wp_customize->add_control(
         'text_size',
         array(
            'label' => __('Taille des textes'),
            'description' => esc_html__('Taille des textes du site'),
            'section' => 'texts_section',
            'priority' => 5, // Optional. Order priority to load the control. Default: 10
            'type' => 'number', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
               'class' => 'admin-fontsize',
               'style' => 'border: 1px solid rebeccapurple',
               'placeholder' => __('Ex : 82px'),
            ),
         )
      );
      $wp_customize->add_control(
         'btn_size',
         array(
            'label' => __('Taille des textes des boutons'),
            'description' => esc_html__('Taille des textes des boutons du site'),
            'section' => 'buttons_section',
            'priority' => 6, // Optional. Order priority to load the control. Default: 10
            'type' => 'number', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
               'class' => 'admin-fontsize',
               'style' => 'border: 1px solid rebeccapurple',
               'placeholder' => __('Ex : 82px'),
            ),
         )
      );
      $wp_customize->add_control(
         'big_btn_size',
         array(
            'label' => __('Taille des textes des GROS boutons'),
            'description' => esc_html__('Taille des textes des GROS boutons du site'),
            'section' => 'buttons_section',
            'priority' => 6, // Optional. Order priority to load the control. Default: 10
            'type' => 'number', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
               'class' => 'admin-fontsize',
               'style' => 'border: 1px solid rebeccapurple',
               'placeholder' => __('Ex : 24px'),
            ),
         )
      );
      $wp_customize->add_control(
         'menu_size',
         array(
            'label' => __('Taille des textes du menu'),
            'description' => esc_html__('Taille des textes du menu du site'),
            'section' => 'nav_section',
            'priority' => 7, // Optional. Order priority to load the control. Default: 10
            'type' => 'number', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
               'class' => 'admin-fontsize',
               'style' => 'border: 1px solid rebeccapurple',
               'placeholder' => __('Ex : 16px'),
            ),
         )
      );

      /* COORDINATES */

      $wp_customize->add_control(
         'map_lattitude',
         array(
            'label' => __('Lattitude'),
            'description' => esc_html__('Lattitude des coordonnées GPS du site'),
            'section' => 'coordinates_section',
            'priority' => 10, // Optional. Order priority to load the control. Default: 10
            'type' => 'number', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
               'class' => 'admin-fontsize',
               'style' => 'border: 1px solid rebeccapurple',
               'placeholder' => __('Ex : 82px'),
            ),
         )
      );
      $wp_customize->add_control(
         'map_longitude',
         array(
            'label' => __('Longitude'),
            'description' => esc_html__('Longitude des coordonnées GPS du site'),
            'section' => 'coordinates_section',
            'priority' => 11, // Optional. Order priority to load the control. Default: 10
            'type' => 'number', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
               'class' => 'admin-fontsize',
               'style' => 'border: 1px solid rebeccapurple',
               'placeholder' => __('Ex : 82px'),
            ),
         )
      );
      $wp_customize->add_control(
         'map_title',
         array(
            'label' => __('Titre'),
            'description' => esc_html__('Le titre pour la popup'),
            'section' => 'coordinates_section',
            'priority' => 11, // Optional. Order priority to load the control. Default: 10
            'type' => 'text', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
               'class' => 'admin-fontsize',
               'style' => 'border: 1px solid rebeccapurple',
               'placeholder' => __('Ex : 1 Bd des Cités Unies, 59800 LILLE'),
            ),
         )
      );
      $wp_customize->add_control(
         'map_address',
         array(
            'label' => __('Adresse'),
            'description' => esc_html__('L\'adresse écrite pour la popup'),
            'section' => 'coordinates_section',
            'priority' => 11, // Optional. Order priority to load the control. Default: 10
            'type' => 'text', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
               'class' => 'admin-fontsize',
               'style' => 'border: 1px solid rebeccapurple',
               'placeholder' => __('Ex : 1 Bd des Cités Unies, 59800 LILLE'),
            ),
         )
      );

      /* SECTION DECO */

      $wp_customize->add_control(
         new WP_Customize_Image_Control(
             $wp_customize, 'section_before', array(
                  'label' => __('Décoration avant la section'),
                  'description' => esc_html__('Permet l\'upload d\'un élément visuel (SVG) pour décorer le haut de la section'),
                  'section' => 'before_deco_section',
                  'priority' => 11, // Optional. Order priority to load the control. Default: 10
                  'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
                  'input_attrs' => array( // Optional.
                     'class' => 'admin-fontsize',
                     'style' => 'border: 1px solid rebeccapurple',
                  ),     
               )
         )
     );

     $wp_customize->add_control(
      new WP_Customize_Image_Control(
          $wp_customize, 'section_after', array(
               'label' => __('Décoration après la section'),
               'description' => esc_html__('Permet l\'upload d\'un élément visuel (SVG) pour décorer le bas de la section'),
               'section' => 'after_deco_section',
               'priority' => 11, // Optional. Order priority to load the control. Default: 10
               'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
               'input_attrs' => array( // Optional.
                  'class' => 'admin-fontsize',
                  'style' => 'border: 1px solid rebeccapurple',
               ),     
            )
      )
  );

      //4. We can also change built-in settings by modifying properties. For instance, let's make some stuff use live preview JS...
      /* $wp_customize->get_setting( 'primary_color' )->transport = 'postMessage';
      $wp_customize->get_setting( 'secondary_color' )->transport = 'postMessage';
      $wp_customize->get_setting( 'tertiary_color' )->transport = 'postMessage';
      $wp_customize->get_setting( 'fourth_color' )->transport = 'postMessage';
      $wp_customize->get_setting( 'fifth_color' )->transport = 'postMessage';
      $wp_customize->get_setting( 'text_color' )->transport = 'postMessage';
      $wp_customize->get_setting( 'h1_size' )->transport = 'postMessage'; */
   }

   /**
    * This will output the custom WordPress settings to the live theme's WP head.
    * 
    * Used by hook: 'wp_head'
    * 
    * @see add_action('wp_head',$func)
    * @since whiteLabel 1.0
    */
   public static function header_output()
   {
?>
      <!--Customizer CSS-->
      <style type="text/css">
         html {
            /* COLOR VARIABLES */
            --color-primary: <?php echo get_theme_mod('primary_color', '#000000'); ?>;
            --color-secondary: <?php echo get_theme_mod('secondary_color', '#000000'); ?>;
            --color-tertiary: <?php echo get_theme_mod('tertiary_color', '#000000'); ?>;
            --color-fourth: <?php echo get_theme_mod('fourth_color', '#000000'); ?>;
            --color-fifth: <?php echo get_theme_mod('fifth_color', '#000000'); ?>;
            --color-text: <?php echo get_theme_mod('text_color', '#000000'); ?>;
            --h1-size: <?php echo get_theme_mod('h1_size', '82') / 10; ?>rem;
            --h2-size: <?php echo get_theme_mod('h2_size', '62') / 10; ?>rem;
            --h3-size: <?php echo get_theme_mod('h3_size', '27') / 10; ?>rem;
            --h4-size: <?php echo get_theme_mod('h4_size', '20') / 10; ?>rem;
            --text-size: <?php echo get_theme_mod('text_size', '16') / 10; ?>rem;
            --btn-size: <?php echo get_theme_mod('btn_size', '16') / 10; ?>rem;
            --big-btn-size: <?php echo get_theme_mod('btn_size', '16') / 10; ?>rem;
            --nav-size: <?php echo get_theme_mod('menu_size', '16') / 10; ?>rem;
            --nav-size: <?php echo get_theme_mod('menu_size', '16') / 10; ?>rem;
            --before-image: url(<?php echo get_theme_mod('section_before', '""'); ?>);
            --after-image: url(<?php echo get_theme_mod('section_after', '""'); ?>);
         }
      </style>
      <!--/Customizer CSS-->

      <!--Customizer MAP-->

      <script>
         var mapLattitude = <?php echo get_theme_mod('map_lattitude', 50.6323447); ?>;
         var mapLongitude = <?php echo get_theme_mod('map_longitude', 3.0920238); ?>;
         var mapPopupTitle = "<?php echo get_theme_mod('map_title', 'Jardin électronique'); ?>";
         var mapPopupText = "<?php echo get_theme_mod('map_address', '1 Bd des Cités Unies, 59800 LILLE'); ?>";
      </script>

      <!--/Customizer MAP-->

<?php
   }

   /**
    * This outputs the javascript needed to automate the live settings preview.
    * Also keep in mind that this function isn't necessary unless your settings 
    * are using 'transport'=>'postMessage' instead of the default 'transport'
    * => 'refresh'
    * 
    * Used by hook: 'customize_preview_init'
    * 
    * @see add_action('customize_preview_init',$func)
    * @since whiteLabel 1.0
    */
   public static function live_preview()
   {
      wp_enqueue_script(
         'whiteLabel-themecustomizer', // Give the script a unique ID
         get_template_directory_uri() . '/assets/public/js/theme-customizer.js', // Define the path to the JS file
         array('jquery', 'customize-preview'), // Define dependencies
         '', // Define a version (optional) 
         true // Specify whether to put in footer (leave this true)
      );
   }

   /**
    * This will generate a line of CSS for use in header output. If the setting
    * ($mod_name) has no defined value, the CSS will not be output.
    * 
    * @uses get_theme_mod()
    * @param string $selector CSS selector
    * @param string $style The name of the CSS *property* to modify
    * @param string $mod_name The name of the 'theme_mod' option to fetch
    * @param string $prefix Optional. Anything that needs to be output before the CSS property
    * @param string $postfix Optional. Anything that needs to be output after the CSS property
    * @param bool $echo Optional. Whether to print directly to the page (default: true).
    * @return string Returns a single line of CSS with selectors and a property.
    * @since whiteLabel 1.0
    */
   public static function generate_css($selector, $style, $mod_name, $prefix = '', $postfix = '', $echo = true)
   {
      $return = '';
      $mod = get_theme_mod($mod_name);
      if (!empty($mod)) {
         $return = sprintf(
            '%s { %s:%s; }',
            $selector,
            $style,
            $prefix . $mod . $postfix
         );
         if ($echo) {
            echo $return;
         }
      }
      return $return;
   }
}

// Setup the Theme Customizer settings and controls...
add_action('customize_register', array('whiteLabel_Customize', 'register'));

// Output custom CSS to live site
add_action('wp_head', array('whiteLabel_Customize', 'header_output'));

// Enqueue live preview javascript in Theme Customizer admin screen
add_action('customize_preview_init', array('whiteLabel_Customize', 'live_preview'));
