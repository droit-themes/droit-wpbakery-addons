<?php 
namespace shortcodes\dt_one_page_footer;

class dt_one_page_footer {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_one_page_footer' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_one_page_footer', array( $this, 'dt_one_page_footer_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_one_page_footer_loadCssAndJs' ) );
        add_action( 'front_enqueue_js', array( $this, 'dt_one_page_footer_loadCssAndJs' ) );
    }
 
    public function dt_one_page_footer() {
      
        vc_map( array(
            "name" => __("Droit one page Footer", 'droit-wbpakery-addons'),
            "description" => __("Droit one page Footer for your section", 'droit-wbpakery-addons'),
            "base" => "dt_one_page_footer",
            "controls" => "full",
            "icon" => DROIT_WPBAKERY_ADDONS_ASSETS_URL_PATH.'/img/icon.png', // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Sub Title', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_one_page_footer_sub_title',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Email', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_one_page_footer_email',
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__( 'Content', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_one_page_footer_content',
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__( 'Address', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_one_page_footer_address',
                ),
                array(
                    "type" => "attach_image",
                    "heading" => __("Icon", 'droit-wbpakery-addons'),
                    "param_name" => "dt_one_page_fotoer_icon",
                ),
                array(
                    "type" => "attach_image",
                    "heading" => __("Image", 'droit-wbpakery-addons'),
                    "param_name" => "dt_one_page_fotoer_image",
                ),

            ),
        ) );
    }
    

    /*
     Header randaraing 
    */
    public function dt_one_page_footer_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_one_page_footer_title' => '',
        'dt_one_page_button_text' => '',
      ), $atts ) );


      $output = dt_template_part('one-page-footer', null , $atts);
     
      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_one_page_footer_loadCssAndJs() {
      wp_register_style( 'dt_extend_style', plugins_url('assets/droit-wbpakery-addons.css', __FILE__) );
    }
}
// Finally initialize code
