<?php 
namespace shortcodes\dt_slider;

class dt_slider {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_slider' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_slider', array( $this, 'dt_slider_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_slider_loadCssAndJs' ) );
    }
 
    public function dt_slider() {
      
        vc_map( array(
            "name" => __("Droit Slider", 'droit-wbpakery-addons'),
            "description" => __("Droit spacial Slider for your section", 'droit-wbpakery-addons'),
            "base" => "dt_slider",
            "class" => "",
            "controls" => "full",
            "icon" => DROIT_WPBAKERY_ADDONS_ASSETS_URL_PATH.'/img/icon.png', // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array(
              array(
                "type" => "textarea",
                "holder" => "div",
                "heading" => __("Title", 'droit-wbpakery-addons'),
                "param_name" => "dt_slider_title",
              ),
              array(
                'type' => 'param_group',
                'value' => '',
                "heading" => __("Droit Slider", 'droit-wbpakery-addons'),
                'param_name' => 'droit_slider_content',
                // Note params is mapped inside param-group:
                'params' => array(
                    array(
                        "type" => "attach_image",
                        "holder" => "div",
                        "heading" => __("Image", 'droit-wbpakery-addons'),
                        "param_name" => "dt_slider_img",
                    ),
            )),
            )
        ) );
    }
    
    /*
     Header randaraing 
    */
    public function dt_slider_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_slider_title' => '',
      ), $atts ) );
     

      $output = dt_template_part('slider', null , $atts);
     
      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_slider_loadCssAndJs() {
    //   wp_register_style( 'dt_extend_style', plugins_url('assets/droit-wbpakery-addons.css', __FILE__) );
    //   wp_enqueue_style( 'dt_extend_style' );

      // If you need any javascript files on front end, here is how you can load them.
      //wp_enqueue_script( 'droit-wbpakery-addons_js', plugins_url('assets/droit-wbpakery-addons.js', __FILE__), array('jquery') );
    }
}
// Finally initialize code
