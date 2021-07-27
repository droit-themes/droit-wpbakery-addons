<?php 
namespace shortcodes\dt_faq;

class dt_faq {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_faq' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_faq', array( $this, 'dt_faq_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_faq_loadCssAndJs' ) );
        add_action( 'front_enqueue_js', array( $this, 'dt_faq_loadCssAndJs' ) );
    }
 
    public function dt_faq() {
      
        vc_map( array(
            "name" => __("Droit faq", 'droit-wbpakery-addons'),
            "description" => __("Droit faq spacial button for your section", 'droit-wbpakery-addons'),
            "base" => "dt_faq",
            "controls" => "full",
            "icon" => DROIT_WPBAKERY_ADDONS_ASSETS_URL_PATH.'/img/icon.png', // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array_merge(array(
                array(
                  'type' => 'dropdown',
                  'heading' => __( 'faq Style',  "droit-wbpakery-addons" ),
                  'param_name' => 'dt_faq_style',
                  'default' => 'yes',
                  'value' => array(
                    esc_html__( 'Style 1',  "droit-wbpakery-addons"  ) => '1',
                    esc_html__( 'Style 2',  "droit-wbpakery-addons"  ) => '2',
                  ),
                ),
                array(
                  'type' => 'textfield',
                  'heading' => esc_html__( 'faq Title ', 'droit-wbpakery-addons' ),
                  'param_name' => 'dt_faq_title',
                  'value'      => 'faq'
              ),
                
                array(
                  'type' => 'param_group',
                  'value' => '',
                  "heading" => __("Droit faq", 'droit-wbpakery-addons'),
                  'param_name' => 'droit_faq_content',
                  // Note params is mapped inside param-group:
                  'params' => array(
                    array(
                      "type" => "textfield",
                      "holder" => "div",
                      "heading" => __("Title", 'droit-wbpakery-addons'),
                      "param_name" => "dt_faq_title",
                    ),
                    
                    array(
                      "type" => "textfield",
                      "holder" => "div",
                      "heading" => __("Content", 'droit-wbpakery-addons'),
                      "param_name" => "dt_faq_comments",
                    ),
                    array(
                      'type' => 'dropdown',
                      'heading' => __( 'Set Default',  "droit-wbpakery-addons" ),
                      'param_name' => 'dt_faq_default',
                      'default' => 'no',
                      'value' => array(
                        esc_html__( 'Yes',  "droit-wbpakery-addons"  ) => 'yes',
                        esc_html__( 'No',  "droit-wbpakery-addons"  ) => 'no',
                      ),
                    ),
                )),
            ), vc_typography_selections('Title', 'title'), vc_typography_selections('Review', 'review'), vc_typography_selections('Author Name', 'authoer'), vc_typography_selections('Designation', 'designation')),
        ) );
    }
    
    /*
     Header randaraing 
    */
    public function dt_faq_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_cunter_up_title' => 'Discover more about Rave',
        'dt_cunter_up_number' => '30295',
      ), $atts ) );
     
      $output = dt_template_part('faq', null , $atts);
     
      return $output;
      
    }
    
    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_faq_loadCssAndJs() {
      wp_register_style( 'dt_extend_style', plugins_url('assets/droit-wbpakery-addons.css', __FILE__) );
      wp_enqueue_script('slick');
      wp_enqueue_script('droit-wpbakery-addons-script');
    }
}
// Finally initialize code
