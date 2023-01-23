<?php
/**
 * Contains methods for customizing the theme customization screen.
 * 
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since whiteLabel 1.0
 */
class whiteLabel_Customize {
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
   public static function register ( $wp_customize ) {
      //1. Define a new section (if desired) to the Theme Customizer
      $wp_customize->add_panel( 'fonts_panel',
         array(
            'title'           => __( 'Typographie' ),
            'description'     => esc_html__( 'Modifier la taille des différents blocs de texte' ), // Include html tags such as 
            'priority'        => 160, // Not typically needed. Default is 160
            'capability'      => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
            'theme_supports'  => '', // Rarely needed
            'active_callback' => '', // Rarely needed
         )
      );

      //2. Register new Sections

      $wp_customize->add_section( 'font_size_section',
         array(
            'title'        => __( 'Taille des caractères' ),
            'panel'        => 'fonts_panel',
            'description'  => esc_html__( 'Modifier la taille des différents blocs de texte' ),
            'priority'     => 160, // Not typically needed. Default is 160
            'capability'   => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
         )
      );
      
      //2. Register new settings to the WP database...

      /* THEME COLORS */

      $wp_customize->add_setting( 'primary_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'    => '#000000', //Default setting/value to save
            'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         ) 
      );      
      $wp_customize->add_setting( 'secondary_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'    => '#000000', //Default setting/value to save
            'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         ) 
      );   
      $wp_customize->add_setting( 'tertiary_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'    => '#000000', //Default setting/value to save
            'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         ) 
      );      
      $wp_customize->add_setting( 'fourth_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'    => '#000000', //Default setting/value to save
            'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         ) 
      );      
      $wp_customize->add_setting( 'fifth_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'    => '#000000', //Default setting/value to save
            'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         ) 
      );      
      $wp_customize->add_setting( 'text_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'    => '#000000', //Default setting/value to save
            'type'       => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'  => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         ) 
      );   

      /* FONT SIZES */

      $wp_customize->add_setting( 'h1_size', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'            => '82', //Default setting/value to save
            'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
            'sanitize_callback'  => 'wp_filter_nohtml_kses',
         ) 
      );   
      $wp_customize->add_setting( 'h2_size', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'            => '60', //Default setting/value to save
            'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
            'sanitize_callback'  => 'wp_filter_nohtml_kses',
         ) 
      );   
      $wp_customize->add_setting( 'h3_size', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'            => '18', //Default setting/value to save
            'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
            'sanitize_callback'  => 'wp_filter_nohtml_kses',
         ) 
      );   
      $wp_customize->add_setting( 'text_size', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'            => '14', //Default setting/value to save
            'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
            'sanitize_callback'  => 'wp_filter_nohtml_kses',
         ) 
      );   
      $wp_customize->add_setting( 'btn_size', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default'            => '14', //Default setting/value to save
            'type'               => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability'         => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport'          => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
            'sanitize_callback'  => 'wp_filter_nohtml_kses',
         ) 
      );   
      
      
      //3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
      
      /* THEME COLORS */
      
      $wp_customize->add_control( new WP_Customize_Color_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'whiteLabel_primary_color', //Set a unique ID for the control
         array(
            'label'      => __( 'Couleur principale', 'whiteLabel' ), //Admin-visible name of the control
            'settings'   => 'primary_color', //Which setting to load and manipulate (serialized is okay)
            'priority'   => 10, //Determines the order this control appears in for the specified section
            'section'    => 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
         ) 
      ) );

      $wp_customize->add_control( new WP_Customize_Color_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'whiteLabel_secondary_color', //Set a unique ID for the control
         array(
            'label'      => __( 'Couleur Secondaire', 'whiteLabel' ), //Admin-visible name of the control
            'settings'   => 'secondary_color', //Which setting to load and manipulate (serialized is okay)
            'priority'   => 10, //Determines the order this control appears in for the specified section
            'section'    => 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
         ) 
      ) );

      $wp_customize->add_control( new WP_Customize_Color_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'whiteLabel_tertiary_color', //Set a unique ID for the control
         array(
            'label'      => __( 'Troisième Couleur', 'whiteLabel' ), //Admin-visible name of the control
            'settings'   => 'tertiary_color', //Which setting to load and manipulate (serialized is okay)
            'priority'   => 10, //Determines the order this control appears in for the specified section
            'section'    => 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
         ) 
      ) );

      $wp_customize->add_control( new WP_Customize_Color_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'whiteLabel_fourth_color', //Set a unique ID for the control
         array(
            'label'      => __( 'Quatrième Couleur', 'whiteLabel' ), //Admin-visible name of the control
            'settings'   => 'fourth_color', //Which setting to load and manipulate (serialized is okay)
            'priority'   => 10, //Determines the order this control appears in for the specified section
            'section'    => 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
         ) 
      ) );

      $wp_customize->add_control( new WP_Customize_Color_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'whiteLabel_fifth_color', //Set a unique ID for the control
         array(
            'label'      => __( 'Cinquième Couleur', 'whiteLabel' ), //Admin-visible name of the control
            'settings'   => 'fifth_color', //Which setting to load and manipulate (serialized is okay)
            'priority'   => 10, //Determines the order this control appears in for the specified section
            'section'    => 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
         ) 
      ) );

      $wp_customize->add_control( new WP_Customize_Color_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'whiteLabel_text_color', //Set a unique ID for the control
         array(
            'label'      => __( 'Couleur du texte', 'whiteLabel' ), //Admin-visible name of the control
            'settings'   => 'text_color', //Which setting to load and manipulate (serialized is okay)
            'priority'   => 10, //Determines the order this control appears in for the specified section
            'section'    => 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
         ) 
      ) );

      /* FONT SIZES */

      $wp_customize->add_control( 'h1_size',
         array(
            'label' => __( 'Taille des Titre 1' ),
            'description' => esc_html__( 'Taille des gros titres du site (dans le jumbotron)' ),
            'section' => 'font_size_section',
            'priority' => 10, // Optional. Order priority to load the control. Default: 10
            'type' => 'number', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
               'class' => 'admin-fontsize',
               'style' => 'border: 1px solid rebeccapurple',
               'placeholder' => __( 'Ex : 82px' ),
            ),
         )
      );
      $wp_customize->add_control( 'h2_size',
         array(
            'label' => __( 'Taille des Titre 2' ),
            'description' => esc_html__( 'Taille des titres de section' ),
            'section' => 'font_size_section',
            'priority' => 10, // Optional. Order priority to load the control. Default: 10
            'type' => 'number', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
               'class' => 'admin-fontsize',
               'style' => 'border: 1px solid rebeccapurple',
               'placeholder' => __( 'Ex : 82px' ),
            ),
         )
      );
      $wp_customize->add_control( 'h3_size',
         array(
            'label' => __( 'Taille des Titre 3' ),
            'description' => esc_html__( 'Taille des sous-titres du sit' ),
            'section' => 'font_size_section',
            'priority' => 10, // Optional. Order priority to load the control. Default: 10
            'type' => 'number', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
               'class' => 'admin-fontsize',
               'style' => 'border: 1px solid rebeccapurple',
               'placeholder' => __( 'Ex : 82px' ),
            ),
         )
      );
      $wp_customize->add_control( 'h4_size',
         array(
            'label' => __( 'Taille des Titre 4' ),
            'description' => esc_html__( 'Taille des petits titres du site' ),
            'section' => 'font_size_section',
            'priority' => 10, // Optional. Order priority to load the control. Default: 10
            'type' => 'number', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
               'class' => 'admin-fontsize',
               'style' => 'border: 1px solid rebeccapurple',
               'placeholder' => __( 'Ex : 82px' ),
            ),
         )
      );
      $wp_customize->add_control( 'text_size',
         array(
            'label' => __( 'Taille des textes' ),
            'description' => esc_html__( 'Taille des textes du site' ),
            'section' => 'font_size_section',
            'priority' => 10, // Optional. Order priority to load the control. Default: 10
            'type' => 'number', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
               'class' => 'admin-fontsize',
               'style' => 'border: 1px solid rebeccapurple',
               'placeholder' => __( 'Ex : 82px' ),
            ),
         )
      );
      $wp_customize->add_control( 'btn_size',
         array(
            'label' => __( 'Taille des textes des boutons' ),
            'description' => esc_html__( 'Taille des textes des boutons du site' ),
            'section' => 'font_size_section',
            'priority' => 10, // Optional. Order priority to load the control. Default: 10
            'type' => 'number', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
               'class' => 'admin-fontsize',
               'style' => 'border: 1px solid rebeccapurple',
               'placeholder' => __( 'Ex : 82px' ),
            ),
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
   public static function header_output() {
      ?>
      <!--Customizer CSS--> 
      <style type="text/css">
         html{    /* COLOR VARIABLES */
            --color-primary: <?php echo get_theme_mod('primary_color', '#000000'); ?>;
            --color-secondary: <?php echo get_theme_mod('secondary_color', '#000000'); ?>;
            --color-tertiary: <?php echo get_theme_mod('tertiary_color', '#000000'); ?>;
            --color-fourth: <?php echo get_theme_mod('fourth_color', '#000000'); ?>;
            --color-fifth: <?php echo get_theme_mod('fifth_color', '#000000'); ?>;
            --color-text: <?php echo get_theme_mod('text_color', '#000000'); ?>;
         }

         h1 {
            font-size: <?php echo get_theme_mod('h1_size', '82')/10; ?>rem;
         }
         h2 {
            font-size: <?php echo get_theme_mod('h2_size', '82')/10; ?>rem;
         }
         h3 {
            font-size: <?php echo get_theme_mod('h3_size', '82')/10; ?>rem;
         }
         h4 {
            font-size: <?php echo get_theme_mod('h4_size', '82')/10; ?>rem;
         }
         body, .btn {
            font-size: <?php echo get_theme_mod('text_size', '82')/10; ?>rem;
         }
         .btn {
            font-size: <?php echo get_theme_mod('btn_size', '82')/10; ?>rem;
         }
      </style> 
      <!--/Customizer CSS-->
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
   public static function live_preview() {
      wp_enqueue_script( 
           'whiteLabel-themecustomizer', // Give the script a unique ID
           get_template_directory_uri() . '/assets/public/js/theme-customizer.js', // Define the path to the JS file
           array(  'jquery', 'customize-preview' ), // Define dependencies
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
    public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
      $return = '';
      $mod = get_theme_mod($mod_name);
      if ( ! empty( $mod ) ) {
         $return = sprintf('%s { %s:%s; }',
            $selector,
            $style,
            $prefix.$mod.$postfix
         );
         if ( $echo ) {
            echo $return;
         }
      }
      return $return;
    }
}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'whiteLabel_Customize' , 'register' ) );

// Output custom CSS to live site
add_action( 'wp_head' , array( 'whiteLabel_Customize' , 'header_output' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'whiteLabel_Customize' , 'live_preview' ) );