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

    /* PANEL TYPO */

        //1. Define a new panel (if desired) to the Theme Customizer

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

        //2. Register new Sections

            /* TEXT SECTION */

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


        //3. Register new settings to the WP database...


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

            /* FONT FAMILY */

            $wp_customize->add_setting(
                'title_font', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
                array(
                    'default'            => 'Arial, sans-serif', //Default setting/value to save
                    'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                    'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                    'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
                    'sanitize_callback'  => 'wp_filter_nohtml_kses',
                )
            );

            $wp_customize->add_setting(
                'text_font', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
                array(
                    'default'            => 'Arial, sans-serif', //Default setting/value to save
                    'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                    'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                    'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
                    'sanitize_callback'  => 'wp_filter_nohtml_kses',
                )
            );

            $wp_customize->add_setting(
                'button_font', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
                array(
                    'default'            => 'Arial, sans-serif', //Default setting/value to save
                    'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                    'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                    'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
                    'sanitize_callback'  => 'wp_filter_nohtml_kses',
                )
            );

            /* TEXTS COLORS */

            $wp_customize->add_setting(
                'text_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
                array(
                   'default'    => '#000000', //Default setting/value to save
                   'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                   'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                   'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
                )
             );

            $wp_customize->add_setting(
                'h1_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
                array(
                    'default'    => '#000000', //Default setting/value to save
                    'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                    'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                    'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
                )
            );

            $wp_customize->add_setting(
                'h2_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
                array(
                    'default'    => '#000000', //Default setting/value to save
                    'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                    'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                    'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
                )
            );

            $wp_customize->add_setting(
                'h3_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
                array(
                    'default'    => '#000000', //Default setting/value to save
                    'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                    'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                    'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
                )
            );

            $wp_customize->add_setting(
                'h4_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
                array(
                    'default'    => '#000000', //Default setting/value to save
                    'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                    'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                    'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
                )
            );



        //4. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...

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

            /* FONT FAMILY */

            $wp_customize->add_control( 
                new WP_Customize_Upload_Control( 
                $wp_customize, 
                'title_font', 
                array(
                'label'      => __( 'Police des titres' ),
                'description' => esc_html__('police d\'écriture à utiliser pour les titres du site'),
                'priority' => 0, // Optional. Order priority to load the control. Default: 10

                'section'    => 'headings_section',
                'settings'   => 'title_font',
                ) ) 
            );
            $wp_customize->add_control( 
                new WP_Customize_Upload_Control( 
                $wp_customize, 
                'text_font', 
                array(
                'label'      => __( 'Police des textes' ),
                'description' => esc_html__('police d\'écriture à utiliser pour les textes du site'),
                'priority' => 0, // Optional. Order priority to load the control. Default: 10
                'section'    => 'texts_section',
                'settings'   => 'text_font',
                ) ) 
            );


            /* TEXTS COLOR */

            $wp_customize->add_control(new WP_Customize_Color_Control( //Instantiate the color control class
                $wp_customize, //Pass the $wp_customize object (required)
                'h1_color', //Set a unique ID for the control
                array(
                'label'      => __('Couleur des titres de niveau 1', 'whiteLabel'), //Admin-visible name of the control
                'settings'   => 'h1_color', //Which setting to load and manipulate (serialized is okay)
                'priority'   => 10, //Determines the order this control appears in for the specified section
                'section'    => 'headings_section', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
                )
            ));

            $wp_customize->add_control(new WP_Customize_Color_Control( //Instantiate the color control class
                $wp_customize, //Pass the $wp_customize object (required)
                'h2_color', //Set a unique ID for the control
                array(
                'label'      => __('Couleur des titres de niveau 2', 'whiteLabel'), //Admin-visible name of the control
                'settings'   => 'h2_color', //Which setting to load and manipulate (serialized is okay)
                'priority'   => 10, //Determines the order this control appears in for the specified section
                'section'    => 'headings_section', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
                )
            ));

            $wp_customize->add_control(new WP_Customize_Color_Control( //Instantiate the color control class
                $wp_customize, //Pass the $wp_customize object (required)
                'h3_color', //Set a unique ID for the control
                array(
                'label'      => __('Couleur des titres de niveau 3', 'whiteLabel'), //Admin-visible name of the control
                'settings'   => 'h3_color', //Which setting to load and manipulate (serialized is okay)
                'priority'   => 10, //Determines the order this control appears in for the specified section
                'section'    => 'headings_section', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
                )
            ));

            $wp_customize->add_control(new WP_Customize_Color_Control( //Instantiate the color control class
                $wp_customize, //Pass the $wp_customize object (required)
                'h4_color', //Set a unique ID for the control
                array(
                'label'      => __('Couleur des titres de niveau 4', 'whiteLabel'), //Admin-visible name of the control
                'settings'   => 'h4_color', //Which setting to load and manipulate (serialized is okay)
                'priority'   => 10, //Determines the order this control appears in for the specified section
                'section'    => 'headings_section', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
                )
            ));

            $wp_customize->add_control(new WP_Customize_Color_Control( //Instantiate the color control class
                $wp_customize, //Pass the $wp_customize object (required)
                'whiteLabel_text_color', //Set a unique ID for the control
                array(
                    'label'      => __('Couleur du texte', 'whiteLabel'), //Admin-visible name of the control
                    'settings'   => 'text_color', //Which setting to load and manipulate (serialized is okay)
                    'priority'   => 10, //Determines the order this control appears in for the specified section
                    'section'    => 'texts_section', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
                )
            ));



        
        
        

    /* PANEL HEADER */

        //1. Define a new panel (if desired) to the Theme Customizer

            $wp_customize->add_panel(
                'header_panel',
                array(
                    'title'           => __('Navigation haut de page'),
                    'description'     => esc_html__('Permet de modifier le de la navigation principale du site'), // Include html tags such as 
                    'priority'        => 162, // Not typically needed. Default is 160
                    'capability'      => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
                    'theme_supports'  => '', // Rarely needed
                    'active_callback' => '', // Rarely needed
                )
            );

        //2. Register new Sections

            $wp_customize->add_section(
                'layout_section',
                array(
                    'title'        => __('Gestion du header'),
                    'panel'        => 'header_panel',
                    'description'  => esc_html__('Gestion de la position et des paramètres des éléments du header'),
                    'priority'     => 160, // Not typically needed. Default is 160
                    'capability'   => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
                )
            );

        //3. Register new settings to the WP database...

            $wp_customize->add_setting(
                'header_layout', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
                array(
                    'default'            => 'left', //Default setting/value to save
                    'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                    'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                    'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
                    'sanitize_callback' => 'themeslug_sanitize_select',
                )
            );

            $wp_customize->add_setting(
                'logo_width', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
                array(
                    'default'            => '250', //Default setting/value to save
                    'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                    'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                    'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
                    'sanitize_callback'  => 'wp_filter_nohtml_kses',
                )
            );

            $wp_customize->add_setting(
                'logo_height', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
                array(
                    'default'            => '100', //Default setting/value to save
                    'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                    'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                    'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
                    'sanitize_callback'  => 'wp_filter_nohtml_kses',
                )
            );

            $wp_customize->add_setting(
                'fixed_header', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
                array(
                    'default'            => true, //Default setting/value to save
                    'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                    'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                    'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
                    'sanitize_callback'  => 'wp_filter_nohtml_kses',
                )
            );

            $wp_customize->add_setting(
                'shrinked_header', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
                array(
                    'default'            =>  true, //Default setting/value to save
                    'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                    'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                    'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
                    'sanitize_callback'  => 'wp_filter_nohtml_kses',
                )
            );

            $wp_customize->add_setting(
                'transparent_header', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
                array(
                    'default'            =>  true, //Default setting/value to save
                    'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                    'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                    'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
                    'sanitize_callback'  => 'wp_filter_nohtml_kses',
                )
            );

            $wp_customize->add_setting(
                'nav_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
                array(
                    'default'    => '#000000', //Default setting/value to save
                    'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                    'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                    'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
                )
            );

            $wp_customize->add_setting(
                'nav_text_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
                array(
                    'default'    => '#000000', //Default setting/value to save
                    'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                    'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                    'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
                )
            );

            $wp_customize->add_setting(
                'nav_text_hover_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
                array(
                    'default'    => '#000000', //Default setting/value to save
                    'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                    'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                    'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
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



        //4. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...

            $wp_customize->add_control(
                'header_layout',
                array(
                    'label' => __('Disposition des éléments'),
                    'description' => esc_html__('Disposition des éléments dans le header'),
                    'section' => 'layout_section',
                    'type' => 'select', // Can be either text, email, url, number, hidden, or date
                    'choices' => array(
                        'left' => __( 'Logo à gauche' ),
                        'center' => __( 'Logo au center (nécessite 2 menus)' ),
                        'right' => __( 'Logo à droite' ),
                    ),
                )
            );

            $wp_customize->add_control(
                'logo_width',
                array(
                    'label' => __('Largeur du logo'),
                    'description' => esc_html__('Largeur du logo'),
                    'section' => 'layout_section',
                    'type' => 'number', // Can be either text, email, url, number, hidden, or date
                    'input_attrs' => array( // Optional.
                        'class' => 'admin-fontsize',
                        'style' => 'border: 1px solid rebeccapurple',
                        'placeholder' => __('Ex : 82px'),
                    ),
                )
            );

            $wp_customize->add_control(
                'logo_height',
                array(
                    'label' => __('Largeur du logo'),
                    'description' => esc_html__('Largeur du logo'),
                    'section' => 'layout_section',
                    'type' => 'number', // Can be either text, email, url, number, hidden, or date
                    'input_attrs' => array( // Optional.
                        'class' => 'admin-fontsize',
                        'style' => 'border: 1px solid rebeccapurple',
                        'placeholder' => __('Ex : 82px'),
                    ),
                )
            );

            $wp_customize->add_control( 
                'fixed_header',
                array(
                    'label'      => __( 'Header fixe' ),
                    'section'    => 'layout_section',
                    'type'       => 'checkbox',
                    'std'        => '1',
                    'settings'   => 'fixed_header', //Which setting to load and manipulate (serialized is okay)

                )
            );

            $wp_customize->add_control( 
                'shrinked_header',
                array(
                    'label'      => __( 'Header se rétrécis au scroll' ),
                    'section'    => 'layout_section',
                    'type'       => 'checkbox',
                    'std'        => '1',
                    'settings'   => 'shrinked_header', //Which setting to load and manipulate (serialized is okay)
                )
            );

            $wp_customize->add_control( 
                'transparent_header',
                array(
                    'label'      => __( 'Header transparent en haut de page' ),
                    'section'    => 'layout_section',
                    'type'       => 'checkbox',
                    'std'        => '1',
                    'settings'   => 'transparent_header', //Which setting to load and manipulate (serialized is okay)

                )
            );

            $wp_customize->add_control(new WP_Customize_Color_Control( //Instantiate the color control class
                $wp_customize, //Pass the $wp_customize object (required)
                'whiteLabel_nav_color', //Set a unique ID for the control
                array(
                    'label'      => __('Couleur du header', 'whiteLabel'), //Admin-visible name of the control
                    'settings'   => 'nav_color', //Which setting to load and manipulate (serialized is okay)
                    'priority'   => 10, //Determines the order this control appears in for the specified section
                    'section'    => 'layout_section', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
                )
            ));

            $wp_customize->add_control(new WP_Customize_Color_Control( //Instantiate the color control class
                $wp_customize, //Pass the $wp_customize object (required)
                'whiteLabel_nav_text_color', //Set a unique ID for the control
                array(
                    'label'      => __('Couleur du texte', 'whiteLabel'), //Admin-visible name of the control
                    'settings'   => 'nav_text_color', //Which setting to load and manipulate (serialized is okay)
                    'priority'   => 10, //Determines the order this control appears in for the specified section
                    'section'    => 'layout_section', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
                )
            ));

            $wp_customize->add_control(new WP_Customize_Color_Control( //Instantiate the color control class
                $wp_customize, //Pass the $wp_customize object (required)
                'whiteLabel_nav_text_hover_color', //Set a unique ID for the control
                array(
                    'label'      => __('Couleur du texte au survol / lien actif', 'whiteLabel'), //Admin-visible name of the control
                    'settings'   => 'nav_text_hover_color', //Which setting to load and manipulate (serialized is okay)
                    'priority'   => 10, //Determines the order this control appears in for the specified section
                    'section'    => 'layout_section', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
                )
            ));


            $wp_customize->add_control(
                'menu_size',
                array(
                'label' => __('Taille des textes du menu'),
                'description' => esc_html__('Taille des textes du menu du site'),
                'section' => 'layout_section',
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





    /* PANEL CONTENT */

        //1. Define a new panel (if desired) to the Theme Customizer

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

            /* SECTION DECORATION */

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

        //3. Register new settings to the WP database...

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
        
        //4. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...

            /* SECTION DECO */

            $wp_customize->add_control(
                new WP_Customize_Image_Control(
                    $wp_customize,
                    'section_before',
                    array(
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
                    $wp_customize,
                    'section_after',
                    array(
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


    /* PANEL FOOTER */

        //1. Define a new panel (if desired) to the Theme Customizer

        $wp_customize->add_panel(
            'footer_panel',
            array(
                'title'           => __('Pied de page'),
                'description'     => esc_html__('Permet de modifier le contenu du pied de page du site'), // Include html tags such as 
                'priority'        => 162, // Not typically needed. Default is 160
                'capability'      => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
                'theme_supports'  => '', // Rarely needed
                'active_callback' => '', // Rarely needed
            )
        );

        //2. Register new Sections

            /* FOOTER SECTION */

            $wp_customize->add_section(
                'footer_layout',
                array(
                   'title'        => __('Mise en page du footer'),
                   'panel'        => 'footer_panel',
                   'description'  => esc_html__('Permet de modifier la mise en page du footer'),
                   'priority'     => 160, // Not typically needed. Default is 160
                   'capability'   => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
                )
             );

        //3. Register new settings to the WP database...

            /* FOOTER */

            $wp_customize->add_setting(
                'right_footer_content', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
                array(
                    'default'            => 'hello world', //Default setting/value to save
                    'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                    'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                    'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
                    'sanitize_callback'  => 'wp_kses_post',
                )
            );
            $wp_customize->add_setting(
                'bottom_footer_content', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
                array(
                    'default'            => 'Réalisation : <a href="https://www.ateliers-art-strong.fr" target="_blank" title="Ateliers Art-Strong">Ateliers Art-Strong</a>', //Default setting/value to save
                    'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                    'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                    'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
                    'sanitize_callback'  => 'wp_kses_post',
                )
            );

            $wp_customize->add_setting(
                'footer_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
                array(
                    'default'    => '#000000', //Default setting/value to save
                    'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                    'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                    'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
                )
            );
            
            $wp_customize->add_setting(
                'footer_text_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
                array(
                    'default'    => '#000000', //Default setting/value to save
                    'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                    'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                    'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
                )
            );




        //4. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...

            /* FOOTER */

            $wp_customize->add_control(
                'right_footer_content',
                array(
                    'label' => __('Contenu de la section droite'),
                    'description' => esc_html__('Le contenu qui sera affiché dans la section droite du footer'),
                    'section' => 'footer_layout',
                    'priority' => 10, // Optional. Order priority to load the control. Default: 10
                    'type' => 'text', // Can be either text, email, url, number, hidden, or date
                    'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
                    'input_attrs' => array( // Optional.
                        'class' => 'admin-fontsize',
                        'style' => 'border: 1px solid rebeccapurple',
                        'placeholder' => __('Ex : Hello World'),
                    ),
                )
            );
            $wp_customize->add_control(
                'bottom_footer_content',
                array(
                    'label' => __('Contenu de la section basse'),
                    'description' => esc_html__('Le contenu qui sera affiché dans la section basse du footer'),
                    'section' => 'footer_layout',
                    'priority' => 11, // Optional. Order priority to load the control. Default: 10
                    'type' => 'text', // Can be either text, email, url, number, hidden, or date
                    'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
                    'input_attrs' => array( // Optional.
                        'class' => 'admin-fontsize',
                        'style' => 'border: 1px solid rebeccapurple',
                        'placeholder' => __('Ex : Réalisation : <a href="https://www.ateliers-art-strong.fr" target="_blank" title="Ateliers Art-Strong">Ateliers Art-Strong</a>'),
                    ),
                )
            );
 
            $wp_customize->add_control(new WP_Customize_Color_Control( //Instantiate the color control class
                $wp_customize, //Pass the $wp_customize object (required)
                'whiteLabel_footer_color', //Set a unique ID for the control
                array(
                    'label'      => __('Couleur du footer', 'whiteLabel'), //Admin-visible name of the control
                    'settings'   => 'footer_color', //Which setting to load and manipulate (serialized is okay)
                    'priority'   => 10, //Determines the order this control appears in for the specified section
                    'section'    => 'footer_layout', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
                )
            ));

            $wp_customize->add_control(new WP_Customize_Color_Control( //Instantiate the color control class
                $wp_customize, //Pass the $wp_customize object (required)
                'whiteLabel_footer_text_color', //Set a unique ID for the control
                array(
                    'label'      => __('Couleur du texte', 'whiteLabel'), //Admin-visible name of the control
                    'settings'   => 'footer_text_color', //Which setting to load and manipulate (serialized is okay)
                    'priority'   => 10, //Determines the order this control appears in for the specified section
                    'section'    => 'footer_layout', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
                )
            ));





    /* PANEL COORDINATES */

        //1. Define a new panel (if desired) to the Theme Customizer

            $wp_customize->add_panel(
                'coordinates_panel',
                array(
                    'title'           => __('Carte et coordonnées'),
                    'description'     => esc_html__('Permet de modifier le contenu du pied de page du site'), // Include html tags such as 
                    'priority'        => 162, // Not typically needed. Default is 160
                    'capability'      => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
                    'theme_supports'  => '', // Rarely needed
                    'active_callback' => '', // Rarely needed
                )
            );

        //2. Register new Sections

            /* SECTION COORDINATES */

            $wp_customize->add_section(
                'coordinates_section',
                array(
                    'title'        => __('Coordonnées'),
                    'panel'        => 'coordinates_panel',
                    'description'  => esc_html__('Modifier les coordonées'),
                    'priority'     => 2, // Not typically needed. Default is 160
                    'capability'   => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
                )
            );

            $wp_customize->add_section(
                'map_section',
                array(
                    'title'        => __('Options de la carte'),
                    'panel'        => 'coordinates_panel',
                    'description'  => esc_html__('Modifier la carte'),
                    'priority'     => 1, // Not typically needed. Default is 160
                    'capability'   => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
                )
            );


        //3. Register new settings to the WP database...

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
                'hq_address', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
                array(
                   'default'            => '1 Bd des Cités Unies, 59800 LILLE', //Default setting/value to save
                   'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                   'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                   'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
                   'sanitize_callback'  => 'wp_filter_nohtml_kses',
                )
             );
       
             $wp_customize->add_setting(
                'phone_number', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
                array(
                   'default'            => '+33 (0)1 23 45 67 89', //Default setting/value to save
                   'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                   'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                   'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
                   'sanitize_callback'  => 'wp_filter_nohtml_kses',
                )
             );

             $wp_customize->add_setting(
                'enable_map', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
                array(
                    'default'            =>  true, //Default setting/value to save
                    'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
                    'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
                    'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
                    'sanitize_callback'  => 'wp_filter_nohtml_kses',
                )
            );


       
        //4. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...

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
                'hq_address',
                array(
                'label' => __('Adresse'),
                'description' => esc_html__('L\'adresse du siège social'),
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
                'phone_number',
                array(
                'label' => __('Téléphone'),
                'description' => esc_html__('Le numéro de téléphone du siège social'),
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
                'enable_map',
                array(
                    'label'      => __( 'Activer la carte en pied de page ?' ),
                    'section'    => 'map_section',
                    'type'       => 'checkbox',
                    'std'        => '1'
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








    //4. We can also change built-in settings by modifying properties. For instance, let's make some stuff use live preview JS...
    $wp_customize->get_setting( 'primary_color' )                   ->transport = 'postMessage';
    $wp_customize->get_setting( 'secondary_color' )                 ->transport = 'postMessage';
    $wp_customize->get_setting( 'tertiary_color' )                  ->transport = 'postMessage';
    $wp_customize->get_setting( 'fourth_color' )                    ->transport = 'postMessage';
    $wp_customize->get_setting( 'fifth_color' )                     ->transport = 'postMessage';
    $wp_customize->get_setting( 'text_color' )                      ->transport = 'postMessage';
    $wp_customize->get_setting( 'h1_color' )                        ->transport = 'postMessage';
    $wp_customize->get_setting( 'h2_color' )                        ->transport = 'postMessage';
    $wp_customize->get_setting( 'h3_color' )                        ->transport = 'postMessage';
    $wp_customize->get_setting( 'h4_color' )                        ->transport = 'postMessage';
    $wp_customize->get_setting( 'nav_text_color' )                       ->transport = 'postMessage';
    $wp_customize->get_setting( 'footer_text_color' )                    ->transport = 'postMessage';
    $wp_customize->get_setting( 'h1_size' )                         ->transport = 'postMessage';
    $wp_customize->get_setting( 'h2_size' )                         ->transport = 'postMessage';
    $wp_customize->get_setting( 'h3_size' )                         ->transport = 'postMessage';
    $wp_customize->get_setting( 'h4_size' )                         ->transport = 'postMessage';
    $wp_customize->get_setting( 'text_size' )                       ->transport = 'postMessage';
    $wp_customize->get_setting( 'btn_size' )                        ->transport = 'postMessage';
    $wp_customize->get_setting( 'big_btn_size' )                    ->transport = 'postMessage';
    $wp_customize->get_setting( 'menu_size' )                       ->transport = 'postMessage';
    $wp_customize->get_setting( 'right_footer_content' )            ->transport = 'postMessage';
    $wp_customize->get_setting( 'bottom_footer_content' )           ->transport = 'postMessage';
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
            --color-primary-darker:  color-mix(in srgb,var(--color-primary),#000 30%);
            --color-primary-lighter: color-mix(in srgb,var(--color-primary),#FFF 30%);
            --color-secondary: <?php echo get_theme_mod('secondary_color', '#000000'); ?>;
            --color-secondary-darker:  color-mix(in srgb,var(--color-secondary),#000 30%);
            --color-secondary-lighter: color-mix(in srgb,var(--color-secondary),#FFF 30%);
            --color-tertiary: <?php echo get_theme_mod('tertiary_color', '#000000'); ?>;
            --color-tertiary-darker:  color-mix(in srgb,var(--color-tertiary),#000 30%);
            --color-tertiary-lighter: color-mix(in srgb,var(--color-tertiary),#FFF 30%);
            --color-fourth: <?php echo get_theme_mod('fourth_color', '#000000'); ?>;
            --color-fourth-darker:  color-mix(in srgb,var(--color-fourth),#000 30%);
            --color-fourth-lighter: color-mix(in srgb,var(--color-fourth),#FFF 30%);
            --color-fifth: <?php echo get_theme_mod('fifth_color', '#000000'); ?>;
            --color-fifth-darker:  color-mix(in srgb,var(--color-fifth),#000 30%);
            --color-fifth-lighter: color-mix(in srgb,var(--color-fifth),#FFF 30%);
            --color-text: <?php echo get_theme_mod('text_color', '#000000'); ?>;
            --color-h1: <?php echo get_theme_mod('h1_color', get_theme_mod('text_color', '#000000')); ?>;
            --color-h2: <?php echo get_theme_mod('h2_color', get_theme_mod('text_color', '#000000')); ?>;
            --color-h3: <?php echo get_theme_mod('h3_color', get_theme_mod('text_color', '#000000')); ?>;
            --color-h4: <?php echo get_theme_mod('h4_color', get_theme_mod('text_color', '#000000')); ?>;
            --color-nav-text: <?php echo get_theme_mod('nav_text_color', get_theme_mod('text_color', '#000000')); ?>;
            --color-nav-text-hover: <?php echo get_theme_mod('nav_text_hover_color', get_theme_mod('text_color', '#000000')); ?>;
            --color-footer-text: <?php echo get_theme_mod('footer_text_color', get_theme_mod('text_color', '#000000')); ?>;
            --color-nav: <?php echo get_theme_mod('nav_color', get_theme_mod('text_color', '#000000')); ?>;
            --color-footer: <?php echo get_theme_mod('footer_color', get_theme_mod('text_color', '#000000')); ?>;
            --h1-size: <?php echo get_theme_mod('h1_size', '82') / 10; ?>rem;
            --h2-size: <?php echo get_theme_mod('h2_size', '62') / 10; ?>rem;
            --h3-size: <?php echo get_theme_mod('h3_size', '27') / 10; ?>rem;
            --h4-size: <?php echo get_theme_mod('h4_size', '20') / 10; ?>rem;
            --text-size: <?php echo get_theme_mod('text_size', '16') / 10; ?>rem;
            --btn-size: <?php echo get_theme_mod('btn_size', '16') / 10; ?>rem;
            --big-btn-size: <?php echo get_theme_mod('btn_size', '16') / 10; ?>rem;
            --nav-size: <?php echo get_theme_mod('menu_size', '16') / 10; ?>rem;
            --before-image: url(<?php echo get_theme_mod('section_before', '""'); ?>);
            --after-image: url(<?php echo get_theme_mod('section_after', '""'); ?>);
            --title-font: url(<?php echo get_theme_mod('title_font', 'Arial, sans-serif'); ?>) format('truetype');
            --text-font: url(<?php echo get_theme_mod('text_font', 'Arial, sans-serif'); ?>) format('truetype');
            --logo-width: <?php echo get_theme_mod('logo_width', '250') / 10; ?>rem;
            --logo-height: <?php echo get_theme_mod('logo_height', '100') / 10; ?>rem;

        }
        @font-face {
            font-family: "Title";
            src: url(<?php echo get_theme_mod('title_font', 'Arial, sans-serif'); ?>) format('truetype');
            font-display: swap;
        }

        @font-face {
            font-family: "Text";
            src: url(<?php echo get_theme_mod('text_font', 'Arial, sans-serif'); ?>) format('truetype');
            font-display: swap;
        }
    </style>
    <!--/Customizer CSS -->

    <!--Customizer MAP -->

    <script>
        var mapLattitude = <?php echo get_theme_mod('map_lattitude', 50.6323447); ?>;
        var mapLongitude = <?php echo get_theme_mod('map_longitude', 3.0920238); ?>;
        var mapPopupTitle = "<?php echo get_theme_mod('hq_address', ''); ?>";
        var mapPopupText = "<?php echo get_theme_mod('phone_number', ''); ?>";
    </script>

    <!--/Customizer MAP -->

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

// Custom Sanitizers 

function themeslug_sanitize_select( $input, $setting ) {

    // Ensure input is a slug.
    $input = sanitize_key( $input );
  
    // Get list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control( $setting->id )->choices;
  
    // If the input is a valid key, return it; otherwise, return the default.
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

// Setup the Theme Customizer settings and controls...
add_action('customize_register', array('whiteLabel_Customize', 'register'));

// Output custom CSS to live site
add_action('wp_head', array('whiteLabel_Customize', 'header_output'));

// Enqueue live preview javascript in Theme Customizer admin screen
add_action('customize_preview_init', array('whiteLabel_Customize', 'live_preview'));
