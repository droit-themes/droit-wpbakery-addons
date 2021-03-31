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
            "params" => array_merge(array(
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "dt-title-font",
                    "heading" => esc_html__("Video Link here", 'droit-wbpakery-addons'),
                    "param_name" => "dt_vidoe_popup_video_link",
                  ),
                  array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "dt-title-font",
                    "heading" => esc_html__("Video icon padding", 'droit-wbpakery-addons'),
                    "param_name" => "dt_vidoe_popup_icon_padding",
                  ),
                  array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "dt-title-font",
                    "heading" => esc_html__("Video icon margin", 'droit-wbpakery-addons'),
                    "param_name" => "dt_vidoe_popup_icon_margin",
                  ),

                  array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "dt-title-font",
                    "heading" => esc_html__("Video icon margin tab", 'droit-wbpakery-addons'),
                    "param_name" => "dt_vidoe_popup_icon_tab_margin",
                    "group"      => esc_html__( 'Responsive', 'droit-wbpakery-addons' )
                  ),
                  array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "dt-title-font",
                    "heading" => esc_html__("Video icon margin mobile", 'droit-wbpakery-addons'),
                    "param_name" => "dt_vidoe_popup_icon_mobile_margin",
                    "group"      => esc_html__( 'Responsive', 'droit-wbpakery-addons' )
                  ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "dt-title-font",
                    "heading" => esc_html__("Icon size", 'droit-wbpakery-addons'),
                    "param_name" => "dt_vidoe_popup_video_icon_font_size",
                    'edit_field_class' => 'vc_col-sm-4',
                    'group' => esc_html__( 'Icon typography', 'droit-wbpakery-addons' ),
                  ),
                  array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __( "Icon  Color", "droit-wbpakery-addons" ),
                    "param_name" => "dt_pop_up_icon_color",
                    "value" => '', //Default Red color
                    'group' => esc_html__( 'Icon typography', 'droit-wbpakery-addons' ),
                     'edit_field_class' => 'vc_col-sm-4',
                ),
                  array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __( "Icon  hover color", "droit-wbpakery-addons" ),
                    "param_name" => "dt_pop_up_icon_hv_color",
                    "value" => '', //Default Red color
                    'group' => esc_html__( 'Icon typography', 'droit-wbpakery-addons' ),
                     'edit_field_class' => 'vc_col-sm-4',
                ),
                  array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __( "Icon backgroud Color", "droit-wbpakery-addons" ),
                    "param_name" => "dt_pop_up_icon_background_color",
                    "value" => '', //Default Red color
                    'group' => esc_html__( 'Icon typography', 'droit-wbpakery-addons' ),
                     'edit_field_class' => 'vc_col-sm-4',
                ),
                  array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __( "Icon hover backgroud Color", "droit-wbpakery-addons" ),
                    "param_name" => "dt_pop_up_icon_hv_background_color",
                    "value" => '', //Default Red color
                    'group' => esc_html__( 'Icon typography', 'droit-wbpakery-addons' ),
                     'edit_field_class' => 'vc_col-sm-4',
                ),
            ), vc_iconfont_selections('vidoe_popup')),
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
