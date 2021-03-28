<?php 
namespace shortcodes\dt_vidoe_popup;

class dt_vidoe_popup {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_vidoe_popup' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_vidoe_popup', array( $this, 'dt_vidoe_popup_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_vidoe_popup_loadCssAndJs' ) );
        add_action( 'front_enqueue_js', array( $this, 'dt_vidoe_popup_loadCssAndJs' ) );
    }
 
    public function dt_vidoe_popup() {
      
        vc_map( array(
            "name" => __("Droit Video Popup", 'droit-wbpakery-addons'),
            "description" => __("Droit Video Popup spacial button for your section", 'droit-wbpakery-addons'),
            "base" => "dt_vidoe_popup",
            "controls" => "full",
            "icon" => DROIT_WPBAKERY_ADDONS_ASSETS_URL_PATH.'/img/icon.png', // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array(
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "dt-title-font",
                    "heading" => esc_html__("Video Link here", 'droit-wbpakery-addons'),
                    "param_name" => "dt_vidoe_popup_video_link",
                  ),
            ),
        ) );
    }
    
    /*
     Header randaraing 
    */
    public function dt_vidoe_popup_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_cunter_up_title' => 'Discover more about Rave',
        'dt_cunter_up_number' => '30295',
      ), $atts ) );
     
      $output = dt_template_part('video-popup', null , $atts);
     

      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_vidoe_popup_loadCssAndJs() {

        wp_register_style( 'dt_video_popup_css', DROIT_WPBAKERY_ADDONS_SHORTCODES_URL_PATH.'/video-popup/assets/css/video-popu.css' );
        wp_register_script( 'dt_video_popup_js', DROIT_WPBAKERY_ADDONS_SHORTCODES_URL_PATH.'/video-popup/assets/js/video-popup.js',  array('jquery'), DROIT_WPBAKERY_ADDONS);

    }
}
// Finally initialize code
