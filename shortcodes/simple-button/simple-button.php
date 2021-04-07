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
            "params" => array(
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

                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Custom Class', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_simple_button_class',
                ),
            )
        ) );
    }
    
    /*
     Header randaraing 
    */
    public function dt_simple_button_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_simple_button' => 'Button text',
      ), $atts ) );
     
      $output = dt_template_part('simple-button', null , $atts);
     
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
