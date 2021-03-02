<?php 
namespace shortcodes\dt_subscribe;

class dt_subscribe {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_subscribe' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_subscribe', array( $this, 'dt_subscribe_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_subscribe_loadCssAndJs' ) );
    }
 
    public function dt_subscribe() {
      
        vc_map( array(
            "name" => __("Droit Subscribe Form", 'droit-wbpakery-addons'),
            "description" => __("Droi droit spacial subscribe form for your section", 'droit-wbpakery-addons'),
            "base" => "dt_subscribe",
            "class" => "",
            "controls" => "full",
            "icon" => plugins_url('assets/asterisk_yellow.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array(
           
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Select Style',  "droit-wbpakery-addons" ),
                    'param_name' => 'dt_subscribe_form_style',
                    'default' => '1',
                    'value' => array(
                      esc_html__( 'Style 1',  "droit-wbpakery-addons" ) => '1',
                      esc_html__( 'Style 2',  "droit-wbpakery-addons" )  => '2',
                      esc_html__( 'Style 3',  "droit-wbpakery-addons" )  => '3',
                    ),
                  ),
              
              array(
                "type" => "textfield",
                "holder" => "div",
                "heading" => __("Action URL", 'droit-wbpakery-addons'),
                "param_name" => "dt_subscribe_form_action_url",
                "description" => __('Enter here your MailChimp action URL. <a href="https://goo.gl/k5a2tA" target="_blank"> How to </a>', 'droit-wbpakery-addons'),
              ),
             
            )
        ) );
    }
    
    /*
     Header randaraing 
    */
    public function dt_subscribe_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_subscribe_form_style' => 1,
      ), $atts ) );
    
      $output = dt_template_part('subscribe', $dt_subscribe_form_style , $atts);
     
      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_subscribe_loadCssAndJs() {
      wp_enqueue_script('ajax-chimp');

      // If you need any javascript files on front end, here is how you can load them.
      //wp_enqueue_script( 'droit-wbpakery-addons_js', plugins_url('assets/droit-wbpakery-addons.js', __FILE__), array('jquery') );
    }
}
// Finally initialize code
