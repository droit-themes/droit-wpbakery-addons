<?php 
namespace shortcodes\dt_timeline;

class dt_timeline {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_timeline' ) );
 
        // Use this when creating a shortdcode addon
        add_shortcode( 'dt_timeline', array( $this, 'dt_timeline_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_timeline_loadCssAndJs' ) );
        add_action( 'front_enqueue_js', array( $this, 'dt_timeline_loadCssAndJs' ) );
    }
 
    public function dt_timeline() {
      
        vc_map( array(
            "name" => __("Droit timeline", 'droit-wbpakery-addons'),
            "description" => __("Droit time line spacial  for your section", 'droit-wbpakery-addons'),
            "base" => "dt_timeline",
            "controls" => "full",
            "icon" => DROIT_WPBAKERY_ADDONS_ASSETS_URL_PATH.'/img/icon.png', // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array(
      
                array(
                    'type' => 'param_group',
                    'value' => '',
                    "heading" => __("Droit Testimonial", 'droit-wbpakery-addons'),
                    'param_name' => 'droit_timeline_content',
                    // Note params is mapped inside param-group:
                    'params' => array(
                        array(
                            "type" => "textfield",
                            "holder" => "div",
                            "heading" => __("Title", 'droit-wbpakery-addons'),
                            "param_name" => "dt_timeline_title",
                          ),
                          array(
                            "type" => "textfield",
                            "holder" => "div",
                            "class" => "dt-title-font",
                            "heading" => __("Descrption", 'droit-wbpakery-addons'),
                            "param_name" => "dt_timeline_description",
                          ),
                          array(
                            'type' => 'vc_link',
                            'heading' => esc_html__( 'URL (Link)', 'droit-wbpakery-addons' ),
                            'param_name' => 'dt_timeline_link',
                            'description' => esc_html__( 'Add link.', 'droit-wbpakery-addons' ),
                        ),
                )),
            ),
        ) );
    }
    
    /*
     Header randaraing 
    */
    public function dt_timeline_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_cunter_up_title' => 'Discover more about Rave',
        'dt_cunter_up_number' => '30295',
      ), $atts ) );
     
      $output = dt_template_part('timeline', null , $atts);
     
      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_timeline_loadCssAndJs() {
      wp_register_style( 'dt_extend_style', plugins_url('assets/droit-wbpakery-addons.css', __FILE__) );
    }
}
// Finally initialize code
