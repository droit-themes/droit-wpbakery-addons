<?php 
namespace shortcodes\dt_one_page_heading;

class dt_one_page_heading {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_one_page_heading' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_one_page_heading', array( $this, 'dt_one_page_heading_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_one_page_heading_loadCssAndJs' ) );
        add_action( 'front_enqueue_js', array( $this, 'dt_one_page_heading_loadCssAndJs' ) );
    }
 
    public function dt_one_page_heading() {
      
        vc_map( array(
            "name" => __("Droit one page heading", 'droit-wbpakery-addons'),
            "description" => __("Droit one page heading for your section", 'droit-wbpakery-addons'),
            "base" => "dt_one_page_heading",
            "controls" => "full",
            "icon" => DROIT_WPBAKERY_ADDONS_ASSETS_URL_PATH.'/img/icon.png', // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array(
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__( 'Text', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_one_page_heading_title',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Button Text', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_one_page_button_text',
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'URL (Link)', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_one_page_button_link',
                    'description' => esc_html__( 'Add link to button.', 'droit-wbpakery-addons' ),
                ),

            ),
        ) );
    }
    

    /*
     Header randaraing 
    */
    public function dt_one_page_heading_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_one_page_heading_title' => '',
        'dt_one_page_button_text' => '',
      ), $atts ) );


      $output = dt_template_part('one-page-heading', null , $atts);
     
      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_one_page_heading_loadCssAndJs() {
      wp_register_style( 'dt_extend_style', plugins_url('assets/droit-wbpakery-addons.css', __FILE__) );
    }
}
// Finally initialize code
