<?php 
namespace shortcodes\dt_service;

class dt_service {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_service' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_service', array( $this, 'dt_service_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_service_loadCssAndJs' ) );
    }
 
    public function dt_service() {
      
        vc_map( array(
            "name" => __("Droit Service Section", 'droit-wbpakery-addons'),
            "description" => __("Droit Service Section", 'droit-wbpakery-addons'),
            "base" => "dt_service",
            "class" => "",
            "controls" => "full",
            "icon" => plugins_url('assets/asterisk_yellow.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array(
      
                array(
                    'type' => 'param_group',
                    'value' => '',
                    "heading" => __("Droit service", 'droit-wbpakery-addons'),
                    'param_name' => 'droit_service_content',
                    // Note params is mapped inside param-group:
                    'params' => array(
            
                        array(
                            "type" => "attach_image",
                            "holder" => "div",
                            "heading" => __("Image", 'droit-wbpakery-addons'),
                            "param_name" => "dt_gallery_img",
                          
                        ),
                      
                      array(
                        "type" => "textfield",
                        "holder" => "div",
                        "heading" => __("Title ", 'droit-wbpakery-addons'),
                        "param_name" => "dt_service_title",
                      ),
                      array(
                        "type" => "textarea",
                        "holder" => "div",
                        "heading" => __("Description", 'droit-wbpakery-addons'),
                        "param_name" => "dt_service_description",
                      ),
                      array(
                        "type" => "textfield",
                        "holder" => "div",
                        "heading" => __("Button Text", 'droit-wbpakery-addons'),
                        "param_name" => "dt_service_button_text",
                      ),
                    array(
                        "type" => "vc_link",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __("Button link", 'droit-wbpakery-addons'),
                        "param_name" => "dt_service_link",
                    ),
                    array(
                        "type" => "colorpicker",
                        "class" => "",
                        "heading" => __( "Background color", "droit-wbpakery-addons" ),
                        "param_name" => "dt_service_background_color",
                        "value" => '', //Default Red color
                    ),    
                       
                ))
            )
         
        ));
    }
    
    /*
     Header randaraing 
    */
    public function dt_service_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_service_button_text' => '',
      ), $atts ) );
    
      $output = dt_template_part('service', null , $atts);
     
      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_service_loadCssAndJs() {
      wp_register_style( 'dt_extend_style', plugins_url('assets/droit-wbpakery-addons.css', __FILE__) );
      wp_enqueue_style( 'slick' );
      wp_enqueue_style( 'slick-theme' );

      // If you need any javascript files on front end, here is how you can load them.
      //wp_enqueue_script( 'droit-wbpakery-addons_js', plugins_url('assets/droit-wbpakery-addons.js', __FILE__), array('jquery') );
    }
}
// Finally initialize code
