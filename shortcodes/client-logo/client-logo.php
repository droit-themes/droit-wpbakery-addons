<?php 
namespace shortcodes\dt_clinet_logo;

class dt_clinet_logo {
    
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
                'type' => 'param_group',
                'value' => '',
                "heading" => __("Droit Carousel", 'droit-wbpakery-addons'),
                'param_name' => 'droit_client_logo',
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
        'dt_carosuel_title'     => ''
      ), $atts ) );
     
      $output = dt_template_part('client-logo', null , $atts);
     
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
