<?php 
namespace shortcodes\dt_greadent_button;

class dt_greadent_button {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_greadent_button' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_greadent_button', array( $this, 'dt_greadent_button_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_greadent_button_loadCssAndJs' ) );
    }
 
    public function dt_greadent_button() {
      
        vc_map( array(
            "name" => __("Droit Greadent button", 'droit-wbpakery-addons'),
            "description" => __("Droi droit Greadent button for your section", 'droit-wbpakery-addons'),
            "base" => "dt_greadent_button",
            "class" => "",
            "controls" => "full",
            "icon" => DROIT_WPBAKERY_ADDONS_ASSETS_URL_PATH.'/img/icon.png', // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array(
                array(
                    "type" => "textarea",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Button Text", 'droit-wbpakery-addons'),
                    "param_name" => "dt_button",
                    "description" => __("Enter your Button Text Here.", 'droit-wbpakery-addons'),
                    'group' => esc_html__( 'Button', 'droit-wbpakery-addons' ),
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'URL (Link)', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_button_link',
                    'description' => esc_html__( 'Add link to button.', 'droit-wbpakery-addons' ),
                    'group' => esc_html__( 'Button', 'droit-wbpakery-addons' ),
                ),
                array(
                    "type" => "checkbox",
                    "heading" => __( "Add Icon?", "droit-wbpakery-addons" ),
                    "param_name" => "dt_button_icon_used",
                    "value" => array(esc_html__('Yes', 'droit-wbpakery-addons') => 'yes'),
                    "std"   => 'yes',
                    'group' => esc_html__( 'Button', 'droit-wbpakery-addons' ),
                  ), 
                  array(
                    'type' => 'dropdown',
                    'heading' => __( 'Style',  "droit-wbpakery-addons" ),
                    'param_name' => 'icon_type_gd_button',
                    'default' => 'droit_icon',
                    'value' => array(
                        esc_html__( 'Select Icon Type',  "droit-wbpakery-addons"  ) => '',
                        esc_html__( 'Droit',  "droit-wbpakery-addons"  ) => 'droit_icon',
                        esc_html__( 'Font Awesome 5', 'js_composer' ) => 'fontawesome',
                        esc_html__( 'Open Iconic', 'js_composer' ) => 'openiconic',                        
                    ),
                    'group' => esc_html__( 'Button', 'droit-wbpakery-addons' ),
                    'dependency' => array(
                        'element' => 'dt_button_icon_used',
                        'value' => 'yes',
                      ),
                  ),    
                array(
                    "type" => "iconpicker",
                    "holder" => "div",
                    "class" => "",
                    "settings" => array(
                        'emptyIcon' => false,
                        'type' => 'droit_icon',
                        'iconsPerPage' => 200,
                    ),
                    "heading" => __("Button icon", 'droit-wbpakery-addons'),
                    "param_name" => "dt_button_icon__droit_icon",
                    'group' => esc_html__( 'Button', 'droit-wbpakery-addons' ),
                     'dependency' => array(
                      'element' => 'icon_type_gd_button',
                      'value' => 'droit_icon',
                    ),
                ),
                array(
                    "type" => "iconpicker",
                    "holder" => "div",
                    "class" => "",
                    "settings" => array(
                        'emptyIcon' => false,
                        'type' => 'openiconic',
                        'iconsPerPage' => 200,
                    ),
                    "heading" => __("Button icon", 'droit-wbpakery-addons'),
                    "param_name" => "dt_button_icon__openiconic",
                    'group' => esc_html__( 'Button', 'droit-wbpakery-addons' ),
                     'dependency' => array(
                      'element' => 'icon_type_gd_button',
                      'value' => 'openiconic',
                    ),
                ),
                array(
                    "type" => "iconpicker",
                    "holder" => "div",
                    "class" => "",
                    "settings" => array(
                        'emptyIcon' => false,
                        'type' => 'fontawesome',
                        'iconsPerPage' => 200,
                    ),
                    "heading" => __("Button icon", 'droit-wbpakery-addons'),
                    "param_name" => "dt_button_icon__fontawesome",
                    'group' => esc_html__( 'Button', 'droit-wbpakery-addons' ),
                     'dependency' => array(
                      'element' => 'icon_type_gd_button',
                      'value' => 'fontawesome',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => __( 'Icon Position',  "droit-wbpakery-addons" ),
                    'param_name' => 'dt_gd_icon_pos',
                    'default' => 'left',
                    'value' => array(
                      esc_html__( 'Left',  "droit-wbpakery-addons"  ) => 'left',
                      esc_html__( 'Right',  "droit-wbpakery-addons"  ) => 'rgiht',
                    ),
                    'group' => esc_html__( 'Button', 'droit-wbpakery-addons' ),
                    'dependency' => array(
                        'element' => 'dt_button_icon_used',
                        'not_empty' => TRUE
                      ),
                  ),
                  array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Icon left Margin', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_btn_left_margin',
                    'group' => esc_html__( 'Button', 'droit-wbpakery-addons' ),
                    'edit_field_class' => 'vc_col-sm-6',
                    'dependency' => array(
                        'element' => 'dt_button_icon_used',
                        'not_empty' => TRUE
                      ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Icon Right Margin', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_btn_right_margin',
                    'group' => esc_html__( 'Button', 'droit-wbpakery-addons' ),
                    'edit_field_class' => 'vc_col-sm-6',
                    'dependency' => array(
                        'element' => 'dt_button_icon_used',
                        'not_empty' => TRUE
                      ),
                ),
                
                //  Button Typography 
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Font Size', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_btn_font_size',
                    'group' => esc_html__( 'Button typography', 'droit-wbpakery-addons' ),
                    'edit_field_class' => 'vc_col-sm-4',
                ),
    
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Line Height', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_btn_font_line_height',
                    'group' => esc_html__( 'Button typography', 'droit-wbpakery-addons' ),
                    'edit_field_class' => 'vc_col-sm-4',
                ),
    
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Font Weight', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_btn_font_weight',
                    'group' => esc_html__( 'Button typography', 'droit-wbpakery-addons' ),
                    'edit_field_class' => 'vc_col-sm-4',
                ),
    
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Border', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_btn_border_width',
                    'group' => esc_html__( 'Button typography', 'droit-wbpakery-addons' ),
                    'edit_field_class' => 'vc_col-sm-4',
                ),
    
                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __( "Border color", "droit-wbpakery-addons" ),
                    "param_name" => "dt_button_border_color",
                    "value" => '', //Default Red color
                    'group' => esc_html__( 'Button typography', 'droit-wbpakery-addons' ),
                    'dependency' => array(
                        'element' => 'dt_btn_border_width',
                        'not_empty' => TRUE
                      ),
                      'edit_field_class' => 'vc_col-sm-4',
                ),
    
                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __( "Border hover color", "droit-wbpakery-addons" ),
                    "param_name" => "dt_button_border_color_hover",
                    "value" => '', //Default Red color
                    'group' => esc_html__( 'Button typography', 'droit-wbpakery-addons' ),
                    'dependency' => array(
                        'element' => 'dt_btn_border_width',
                        'not_empty' => TRUE
                      ),
                      'edit_field_class' => 'vc_col-sm-4',
                ),
               
                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __( "Text color", "droit-wbpakery-addons" ),
                    "param_name" => "dt_button_color",
                    "value" => '', //Default Red color
                    'group' => esc_html__( 'Button typography', 'droit-wbpakery-addons' ),
                     'edit_field_class' => 'vc_col-sm-4',
                ),
    
                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __( "Text hover color", "droit-wbpakery-addons" ),
                    "param_name" => "dt_button_hover_color",
                    "value" => '', //Default Red color
                    'group' => esc_html__( 'Button typography', 'droit-wbpakery-addons' ),
                   
                    'edit_field_class' => 'vc_col-sm-4',
                ),
                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __( "Backgroud Greadent Color 1", "droit-wbpakery-addons" ),
                    "param_name" => "dt_button_bg_color_1",
                    "value" => '', //Default Red color
                    'group' => esc_html__( 'Button typography', 'droit-wbpakery-addons' ),
                     'edit_field_class' => 'vc_col-sm-4',
                ),

                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __( "Backgroud Greadent Color 2", "droit-wbpakery-addons" ),
                    "param_name" => "dt_button_bg_color_2",
                    "value" => '', //Default Red color
                    'group' => esc_html__( 'Button typography', 'droit-wbpakery-addons' ),
                     'edit_field_class' => 'vc_col-sm-4',
                ),

                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __( "Backgroud Greadent Color 3", "droit-wbpakery-addons" ),
                    "param_name" => "dt_button_bg_color_3",
                    "value" => '', //Default Red color
                    'group' => esc_html__( 'Button typography', 'droit-wbpakery-addons' ),
                     'edit_field_class' => 'vc_col-sm-4',
                ),
    
                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __( "Background Greadent hover color 1", "droit-wbpakery-addons" ),
                    "param_name" => "dt_button_bg_hover_color_1",
                    "value" => '', //Default Red color
                    'group' => esc_html__( 'Button typography', 'droit-wbpakery-addons' ),
                   
                    'edit_field_class' => 'vc_col-sm-4',
                ),

                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __( "Background Greadent hover color 2", "droit-wbpakery-addons" ),
                    "param_name" => "dt_button_bg_hover_color_2",
                    "value" => '', //Default Red color
                    'group' => esc_html__( 'Button typography', 'droit-wbpakery-addons' ),
                   
                    'edit_field_class' => 'vc_col-sm-4',
                ),

                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __( "Background Greadent hover color 3", "droit-wbpakery-addons" ),
                    "param_name" => "dt_button_bg_hover_color_3",
                    "value" => '', //Default Red color
                    'group' => esc_html__( 'Button typography', 'droit-wbpakery-addons' ),
                   
                    'edit_field_class' => 'vc_col-sm-4',
                ),
            )
        ) );
    }
    
    /*
     Header randaraing 
    */
    public function dt_greadent_button_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_btn_text' => 'Download For Free',
      ), $atts ) );
     
      $output = dt_template_part('greadent-button', null , $atts);
    
      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_greadent_button_loadCssAndJs() {

      wp_register_style( 'dt_greadent_button_style', plugins_url('assets/css/greadent-button.css', __FILE__) );
    }
}
// Finally initialize code
