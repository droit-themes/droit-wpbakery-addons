<?php 
namespace shortcodes\dt_simple_button;

class dt_simple_button {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_simple_button' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_simple_button', array( $this, 'dt_simple_button_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_simple_button_loadCssAndJs' ) );
    }
 
    public function dt_simple_button() {
      
        vc_map( array(
            "name" => __("Droit simple button", 'droit-wbpakery-addons'),
            "description" => __("Droi droit simple button for your section", 'droit-wbpakery-addons'),
            "base" => "dt_simple_button",
            "class" => "",
            "controls" => "full",
            "icon" => DROIT_WPBAKERY_ADDONS_ASSETS_URL_PATH.'/img/icon.png', // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array_merge(array(
                array(
                    'type' => 'dropdown',
                    'heading' => __( 'Icon Box Style',  "droit-wbpakery-addons" ),
                    'param_name' => 'dt_simple_btn_style',
                    'default' => '1',
                    'value' => array(
                      esc_html__( 'Style 1',  "droit-wbpakery-addons"  ) => '1',
                      esc_html__( 'Style 2',  "droit-wbpakery-addons"  ) => '2',
                    ),
                  ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Button text', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_simple_button',
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'URL (Link)', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_simple_button_link',
                    'description' => esc_html__( 'Add link to button.', 'droit-wbpakery-addons' ),
                ),
                //  design opton 
                array(
                  'type' => 'textfield',
                  'heading' => esc_html__( 'Border', 'droit-wbpakery-addons' ),
                  'param_name' => 'dt_simple_btn_border_width',
                  'group' => esc_html__( 'Design Option', 'droit-wbpakery-addons' ),
                  'edit_field_class' => 'vc_col-sm-4',
              ),
              array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __( "Border color", "droit-wbpakery-addons" ),
                "param_name" => "dt_simple_button_border_color",
                "value" => '', //Default Red color
                'group' => esc_html__( 'Design Option', 'droit-wbpakery-addons' ),
                'dependency' => array(
                    'element' => 'dt_simple_btn_border_width',
                    'not_empty' => TRUE
                  ),
                  'edit_field_class' => 'vc_col-sm-4',
            ),

            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __( "Border hover color", "droit-wbpakery-addons" ),
                "param_name" => "dt_simple_button_border_color_hover",
                "value" => '', //Default Red color
                'group' => esc_html__( 'Design Option', 'droit-wbpakery-addons' ),
                'dependency' => array(
                    'element' => 'dt_simple_btn_border_width',
                    'not_empty' => TRUE
                  ),
                  'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __( "Text hover color", "droit-wbpakery-addons" ),
                "param_name" => "dt_simple_button_hover_color",
                "value" => '', //Default Red color
                'group' => esc_html__( 'Design Option', 'droit-wbpakery-addons' ),
               
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __( "Backgroud Color", "droit-wbpakery-addons" ),
                "param_name" => "dt_simple_button_bg_color",
                "value" => '', //Default Red color
                'group' => esc_html__( 'Design Option', 'droit-wbpakery-addons' ),
                 'edit_field_class' => 'vc_col-sm-4',
            ),

            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __( "Background hover color", "droit-wbpakery-addons" ),
                "param_name" => "dt_simple_button_bg_hover_color",
                "value" => '', //Default Red color
                'group' => esc_html__( 'Design Option', 'droit-wbpakery-addons' ),
               
                'edit_field_class' => 'vc_col-sm-4',
            ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Custom Class', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_simple_button_class',
                    'group'      => 'Design Option',
                ),
                
              ),vc_iconfont_selections(), vc_typography_selections('Button', '_simple')),
        ) );
    }
    
    /*
     Header randaraing 
    */
    public function dt_simple_button_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_simple_button' => 'Button text',
        'dt_simple_btn_style' => ''
      ), $atts ) );

      $button_style = null; 

      if($dt_simple_btn_style != 1 ) {
        $button_style = $dt_simple_btn_style;
      }

      echo '<pre>';
      print_r($atts);
      echo '</pre>';

      $output = dt_template_part('simple-button', $button_style , $atts);
     
      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_simple_button_loadCssAndJs() {
      wp_register_style( 'dt_extend_style', plugins_url('assets/droit-wbpakery-addons.css', __FILE__) );

    }
}
// Finally initialize code
