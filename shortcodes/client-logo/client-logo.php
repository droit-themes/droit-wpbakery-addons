<?php 
namespace shortcodes\dt_client_logo;

class dt_client_logo {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_clinet_logo' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_clinet_logo', array( $this, 'dt_clinet_logo_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_clinet_logo_loadCssAndJs' ) );
    }
 
    public function dt_clinet_logo() {
      
        vc_map( array(
            "name" => __("Droit Client Logo", 'droit-wbpakery-addons'),
            "description" => __("Droi Client Logo", 'droit-wbpakery-addons'),
            "base" => "dt_clinet_logo",
            "class" => "",
            "controls" => "full",
            "icon" => plugins_url('assets/asterisk_yellow.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array(

              array(
                'type' => 'dropdown',
                'heading' => __( 'Style',  "droit-wbpakery-addons" ),
                'param_name' => 'dt_client_logo_style_list',
                'default' => '1',
                'value' => array(
                  esc_html__( 'Style 1',  "droit-wbpakery-addons"  ) => '1',
                  esc_html__( 'Style 2',  "droit-wbpakery-addons"  ) => '2',
                  esc_html__( 'Style 3',  "droit-wbpakery-addons"  ) => '3',
                ),
              ),
              array(
                "type" => "textfield",
                "heading" => __("Element Class", 'droit-wbpakery-addons'),
                "param_name" => "dt_client_logo_wrapper_class",
                'dependency' => array(
                  'element' => 'dt_client_logo_style_list',
                  'value_not_equal_to' => array('1', '2'),
                ),
                'group' => 'Style',
                'default' => 'justify-content-around'
              ),
              array(
                "type" => "textarea",
                "holder" => "div",
                "heading" => __("Title ", 'droit-wbpakery-addons'),
                "param_name" => "dt_client_logo_title",
                "description" => __('Highlight with (()), Eg: ((10,030+))'),
                'dependency' => array(
                  'element' => 'dt_client_logo_style_list',
                  'value_not_equal_to' => array('1', '3'),
                ),
              ),
              array(
                'type' => 'param_group',
                'value' => '',
                "heading" => __("Droit Client Logo", 'droit-wbpakery-addons'),
                'param_name' => 'droit_client_logo',
                'dependency' => array(
                  'element' => 'dt_client_logo_style_list',
                  'value_not_equal_to' => array('3'),
                ),
                // Note params is mapped inside param-group:
                'params' => array(
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "heading" => __("Title ", 'droit-wbpakery-addons'),
                        "param_name" => "dt_client_logo_title",

                      ),
                    array(
                        "type" => "attach_image",
                        "holder" => "div",
                        "heading" => __("Image", 'droit-wbpakery-addons'),
                        "param_name" => "dt_client_logo",
                    ),
                   
                    array(
                        "type" => "vc_link",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __("Link", 'droit-wbpakery-addons'),
                        "param_name" => "dt_client_link_link",
                    ),
                   
                  )),
                  array(
                    'type' => 'param_group',
                    'value' => '',
                    "heading" => __("Droit Client Logo", 'droit-wbpakery-addons'),
                    'param_name' => 'droit_client_logo_style3',
                    'dependency' => array(
                      'element' => 'dt_client_logo_style_list',
                      'value_not_equal_to' => array('1', '2'),
                    ),
                    // Note params is mapped inside param-group:
                    'params' => array(
                      
                        array(
                            "type" => "attach_image",
                            "holder" => "div",
                            "heading" => __("Image", 'droit-wbpakery-addons'),
                            "param_name" => "dt_client_logo_style3",
                        ),
                        array(
                            "type" => "attach_image",
                            "holder" => "div",
                            "heading" => __("Image hover", 'droit-wbpakery-addons'),
                            "param_name" => "dt_client_logo_hover_style3",
                        ),
    
                        array(
                            "type" => "vc_link",
                            "holder" => "div",
                            "class" => "",
                            "heading" => __("Link", 'droit-wbpakery-addons'),
                            "param_name" => "dt_client_link_link_style3",
                        ),
                       
                ))
            )
        ) );
    }
    
    /*
     Header randaraing 
    */
    public function dt_clinet_logo_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_clinet_logo_section_title' => '',
        'dt_carosuel_title'     => '',
        'dt_client_logo_style_list' => 1,
        'dt_client_logo_wrapper_class' => ''
      ), $atts ) );
    
      $output = dt_template_part('client-logo', $dt_client_logo_style_list , $atts);
     
      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_clinet_logo_loadCssAndJs() {
      wp_register_style( 'dt_extend_style', plugins_url('assets/droit-wbpakery-addons.css', __FILE__) );
      wp_enqueue_style( 'slick' );
      wp_enqueue_style( 'slick-theme' );

      // If you need any javascript files on front end, here is how you can load them.
      //wp_enqueue_script( 'droit-wbpakery-addons_js', plugins_url('assets/droit-wbpakery-addons.js', __FILE__), array('jquery') );
    }
}
// Finally initialize code
