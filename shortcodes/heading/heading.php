<?php 
namespace shortcodes\dt_heading;

class dt_heading extends \WPBakeryShortCode{
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_heading' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_heading', array( $this, 'dt_heading_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_heading_loadCssAndJs' ) );
    }
 
    public function dt_heading() {
      
        vc_map( array(
            "name" => __("Droit Heading", 'droit-wbpakery-addons'),
            "description" => __("Droi droit spacial heading for your section", 'droit-wbpakery-addons'),
            "base" => "dt_heading",
            "class" => "",
            "controls" => "full",
            "icon" => DROIT_WPBAKERY_ADDONS_ASSETS_URL_PATH.'/img/icon.png', // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array(
              array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "dt-subtitle",
                "heading" => esc_html__("Sub title Tag", 'droit-wbpakery-addons'),
                "param_name" => "dt_subtitle_tag",
                "description" => esc_html__("Sub title tag .", 'droit-wbpakery-addons')
            ),
              array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Batch Background Color", 'droit-wbpakery-addons'),
                "param_name" => "dt_sub_title_batch_bg_color",
                "value" => '#16d895', 
                "description" => esc_html__("Choose batch background color", 'droit-wbpakery-addons'),
                'group' => esc_html__( 'Sub Title Style', 'droit-wbpakery-addons' ), 
                'dependency' => array(
                  'element' => 'dt_subtitle_tag',
                  'not_empty' => TRUE
                ),
             ),
             array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "dt-subtitle",
              "heading" => esc_html__("Batch Font size", 'droit-wbpakery-addons'),
              "param_name" => "dt_subtitle_batch_font_size",
              'group' => esc_html__( 'Sub Title Style', 'droit-wbpakery-addons' ), 
              "description" => esc_html__("Batch Font Size .", 'droit-wbpakery-addons'),
              'dependency' => array(
                'element' => 'dt_subtitle_tag',
                'not_empty' => TRUE
              ),
            ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "dt-subtitle",
                  "heading" => esc_html__("Sub title", 'droit-wbpakery-addons'),
                  "param_name" => "dt_subtitle",
                  "description" => esc_html__("Sub title .", 'droit-wbpakery-addons')
              ),
              array(
                'type' => 'dropdown',
                'heading' => __( 'Sub title tag',  "droit-wbpakery-addons" ),
                'param_name' => 'dt_heading_subtitle_tag_style',
                'default' => 'span',
                'value' => array(
                  esc_html__( 'h1',  "droit-wbpakery-addons"  ) => 'h1',
                  esc_html__( 'h2',  "droit-wbpakery-addons"  ) => 'h2',
                  esc_html__( 'h3',  "droit-wbpakery-addons"  ) => 'h3',
                  esc_html__( 'h4',  "droit-wbpakery-addons"  ) => 'h4',
                  esc_html__( 'h5',  "droit-wbpakery-addons"  ) => 'h5',
                  esc_html__( 'h6',  "droit-wbpakery-addons"  ) => 'h6',
                  esc_html__( 'div',  "droit-wbpakery-addons"  ) => 'div',
                  esc_html__( 'span',  "droit-wbpakery-addons"  ) => 'span',
                  esc_html__( 'p',  "droit-wbpakery-addons"  ) => 'p',
                ),
                'group' => esc_html__( 'Sub Title Style', 'droit-wbpakery-addons' ),
              ),
              array(
                  "type" => "colorpicker",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_html__("Sub title Color", 'droit-wbpakery-addons'),
                  "param_name" => "dt_sub_title_color",
                  "value" => '#FF0000', 
                  "description" => esc_html__("Choose text color", 'droit-wbpakery-addons'),
                  'group' => esc_html__( 'Sub Title Style', 'droit-wbpakery-addons' ),

              ),
              array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "dt-subtitle-font",
                "heading" => esc_html__("Font Size", 'droit-wbpakery-addons'),
                "param_name" => "dt_subtitle_font_size",
                "description" => esc_html__("Sub title font size eg: 24px .", 'droit-wbpakery-addons'),
                'group' => esc_html__( 'Sub Title Style', 'droit-wbpakery-addons' ),
              ),
              array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "dt-subtitle-font",
                "heading" => esc_html__("Line height", 'droit-wbpakery-addons'),
                "param_name" => "dt_subtitle_line_height",
                "description" => esc_html__("Sub title font size eg: 24px .", 'droit-wbpakery-addons'),
                'group' => esc_html__( 'Sub Title Style', 'droit-wbpakery-addons' ),
              ),
              array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "dt-subtitle-font",
                "heading" => esc_html__("Font Wegiht", 'droit-wbpakery-addons'),
                "param_name" => "dt_subtitle_font_weight",
                "description" => esc_html__("Sub title font weight eg: 500 .", 'droit-wbpakery-addons'),
                'group' => esc_html__( 'Sub Title Style', 'droit-wbpakery-addons' ),
              ),
              array(
                  "type" => "css_editor",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_html__("Sub title css setting", 'droit-wbpakery-addons'),
                  "param_name" => "subtitle_css",
                  "value" => '#FF0000', 
                  "description" => esc_html__("Choose text color", 'droit-wbpakery-addons'),
                  'group' => esc_html__( 'Sub Title Style', 'droit-wbpakery-addons' ),
              ),
              array(
                  "type" => "textarea",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_html__("Title", 'droit-wbpakery-addons'),
                  "param_name" => "dt_title",
                  "description" => esc_html__("Enter your content.", 'droit-wbpakery-addons')
              ),
              array(
                'type' => 'dropdown',
                'heading' => __( 'Sub title tag',  "droit-wbpakery-addons" ),
                'param_name' => 'dt_heading_title_tag',
                'default' => 'h2',
                'value' => array(
                  esc_html__( 'h1',  "droit-wbpakery-addons"  ) => 'h1',
                  esc_html__( 'h2',  "droit-wbpakery-addons"  ) => 'h2',
                  esc_html__( 'h3',  "droit-wbpakery-addons"  ) => 'h3',
                  esc_html__( 'h4',  "droit-wbpakery-addons"  ) => 'h4',
                  esc_html__( 'h5',  "droit-wbpakery-addons"  ) => 'h5',
                  esc_html__( 'h6',  "droit-wbpakery-addons"  ) => 'h6',
                  esc_html__( 'div',  "droit-wbpakery-addons"  ) => 'div',
                  esc_html__( 'span',  "droit-wbpakery-addons"  ) => 'span',
                  esc_html__( 'p',  "droit-wbpakery-addons"  ) => 'p',
                ),
                'group' => esc_html__( 'Title Style', 'droit-wbpakery-addons' ),
              ),
              array(
                  "type" => "colorpicker",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_html__("Title Color", 'droit-wbpakery-addons'),
                  "param_name" => "dt_title_color",
                  "description" => esc_html__("Choose text color", 'droit-wbpakery-addons'),
                  'group' => esc_html__( 'Title Style', 'droit-wbpakery-addons' ),

              ),
              array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "dt-title-font",
                "heading" => esc_html__("Font Size", 'droit-wbpakery-addons'),
                "param_name" => "dt_title_font_size",
                "description" => esc_html__("Title font size eg: 40px .", 'droit-wbpakery-addons'),
                'group' => esc_html__( 'Title Style', 'droit-wbpakery-addons' ),
              ),
              array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "dt-title-font",
                "heading" => esc_html__("Line height", 'droit-wbpakery-addons'),
                "param_name" => "dt_title_line_height",
                "description" => esc_html__("Title font size eg: 60px .", 'droit-wbpakery-addons'),
                'group' => esc_html__( 'Title Style', 'droit-wbpakery-addons' ),
              ),
              array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "dt-title-font",
                "heading" => esc_html__("Line height", 'droit-wbpakery-addons'),
                "param_name" => "dt_title_font_wegiht",
                "description" => esc_html__("Title font wight: 600 .", 'droit-wbpakery-addons'),
                'group' => esc_html__( 'Title Style', 'droit-wbpakery-addons' ),
              ),
              array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "dt-title-font",
                "heading" => esc_html__("Margin top", 'droit-wbpakery-addons'),
                "param_name" => "dt_title_margin_top",
                "description" => esc_html__("Title Margin top eg: 10px", 'droit-wbpakery-addons'),
                'group' => esc_html__( 'Title Style', 'droit-wbpakery-addons' ),
              ),
              array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "dt-title-font",
                "heading" => esc_html__("Margin Bottom", 'droit-wbpakery-addons'),
                "param_name" => "dt_title_margin_bottom",
                "description" => esc_html__("Title Margin bottom eg: 10px", 'droit-wbpakery-addons'),
                'group' => esc_html__( 'Title Style', 'droit-wbpakery-addons' ),
              ),
              array(
                  "type" => "textarea",
                  "holder" => "div",
                  "class" => "",
                  "heading" => esc_html__("Title Description", 'droit-wbpakery-addons'),
                  "param_name" => "dt_title_description",
                  "description" => esc_html__("Enter your description.", 'droit-wbpakery-addons')
              ),

              array(
                'type' => 'dropdown',
                'heading' => __( 'Sub title tag',  "droit-wbpakery-addons" ),
                'param_name' => 'dt_heading_description_tag',
                'default' => 'p',
                'value' => array(
                  esc_html__( 'h1',  "droit-wbpakery-addons"  ) => 'h1',
                  esc_html__( 'h2',  "droit-wbpakery-addons"  ) => 'h2',
                  esc_html__( 'h3',  "droit-wbpakery-addons"  ) => 'h3',
                  esc_html__( 'h4',  "droit-wbpakery-addons"  ) => 'h4',
                  esc_html__( 'h5',  "droit-wbpakery-addons"  ) => 'h5',
                  esc_html__( 'h6',  "droit-wbpakery-addons"  ) => 'h6',
                  esc_html__( 'div',  "droit-wbpakery-addons"  ) => 'div',
                  esc_html__( 'span',  "droit-wbpakery-addons"  ) => 'span',
                  esc_html__( 'p',  "droit-wbpakery-addons"  ) => 'p',
                ),
                'group' => esc_html__( 'Description Style', 'droit-wbpakery-addons' ),
              ),

              array(
                "type" => "colorpicker",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Color", 'droit-wbpakery-addons'),
                "param_name" => "dt_title_description_color",
                "description" => esc_html__("Choose text color", 'droit-wbpakery-addons'),
                'group' => esc_html__( 'Description Style', 'droit-wbpakery-addons' ),

            ),
            array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "dt-title-font",
              "heading" => esc_html__("Font Size", 'droit-wbpakery-addons'),
              "param_name" => "dt_title_description_font_size",
              "description" => esc_html__("Title font size eg: 40px .", 'droit-wbpakery-addons'),
              'group' => esc_html__( 'Description Style', 'droit-wbpakery-addons' ),
            ),
            array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "dt-title-font",
              "heading" => esc_html__("Line height", 'droit-wbpakery-addons'),
              "param_name" => "dt_title_description_line_height",
              "description" => esc_html__("Title description line height eg: 60px .", 'droit-wbpakery-addons'),
              'group' => esc_html__( 'Description Style', 'droit-wbpakery-addons' ),
            ),
            array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "dt-title-font",
              "heading" => esc_html__("Line height", 'droit-wbpakery-addons'),
              "param_name" => "dt_title_description_font_weight",
              "description" => esc_html__("Title description font weight eg: 400 .", 'droit-wbpakery-addons'),
              'group' => esc_html__( 'Description Style', 'droit-wbpakery-addons' ),
            ),

              vc_map_add_css_animation(true),

              array(
                "type" => "textfield",
                "holder" => "div",
                "heading" => esc_html__("Element Class", 'droit-wbpakery-addons'),
                "param_name" => "element_custon_class",
              ),
  
              array(
                'type' => 'dropdown',
                'heading' => __( 'Text Aligment',  "droit-wbpakery-addons" ),
                'param_name' => 'dt_title_aligment',
                'default' => 'center',
                'value' => array(
                  __( 'Let',  "droit-wbpakery-addons"  ) => 'left',
                  __( 'Right',  "droit-wbpakery-addons"  ) => 'right',
                  __( 'Center',  "droit-wbpakery-addons"  ) => 'center',
                ),
                "description" => __( "Text aligment", "droit-wbpakery-addons" )
              ),
              array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts_heading',
                'el_class' => 'banner_text_intro',
                'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
                'settings' => array(
                  'fields' => array(
                    'font_family_description' => esc_html__( 'Select font family.', 'js_composer' ),
                    'font_style_description' => esc_html__( 'Select font styling.', 'js_composer' ),
                  ),
                ),
              ),        
              

              // array(
              //   'type' => 'checkbox',
              //   'heading' => esc_html__( 'Use theme default font family?', 'js_composer' ),
              //   'param_name' => 'use_theme_fonts',
              //   'value' => array( esc_html__( 'Yes', 'js_composer' ) => 'yes' ),
              //   'description' => esc_html__( 'Use font family from the theme.', 'js_composer' ),
              // ),
              // array(
              //   'type' => 'google_fonts',
              //   'param_name' => 'google_fonts_heading',
              //   'el_class' => 'banner_text_intro',
              //   'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
              //   'settings' => array(
              //     'fields' => array(
              //       'font_family_description' => esc_html__( 'Select font family.', 'js_composer' ),
              //       'font_style_description' => esc_html__( 'Select font styling.', 'js_composer' ),
              //     ),
              //   ),
              //   'dependency' => array(
              //     'element' => 'use_theme_fonts',
              //     'value_not_equal_to' => 'yes',
              //   ),
              // ),
            )
        ) );
    }
    
    /*
     Header randaraing 
    */
    public function dt_heading_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_subtitle' => '',
        'dt_title_description' => '',
        'dt_title' => '',
        'css' => '',
        'dt_sub_title_color'=> '',
        'google_fonts_heading' => ''
      ), $atts ) );




     
      $output = dt_template_part('heading', null , $atts);
 
      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_heading_loadCssAndJs() {
      wp_register_style( 'dt_extend_style', plugins_url('assets/css/droit-wbpakery-addons.css', __FILE__) );

      // If you need any javascript files on front end, here is how you can load them.
      //wp_enqueue_script( 'droit-wbpakery-addons_js', plugins_url('assets/droit-wbpakery-addons.js', __FILE__), array('jquery') );
    }
}
// Finally initialize code
