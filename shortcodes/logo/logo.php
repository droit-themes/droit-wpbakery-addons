<?php 
namespace shortcodes\dt_logo;

class dt_logo {

    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_logo' ) );

        // Use this when creating a shortcode addon
        add_shortcode( 'dt_logo', array( $this, 'dt_logo_render' ) );

    }

    public function dt_logo() {

        vc_map( array(
            "name" => __("Droit Main Logo", 'droit-wbpakery-addons'),
            "description" => __("Upload your site logo here", 'droit-wbpakery-addons'),
            "base" => "dt_logo",
            "controls" => "full",
            "icon" => DROIT_WPBAKERY_ADDONS_ASSETS_URL_PATH.'/img/icon.png', // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array_merge(array(

                 array(
                     "type" => "attach_image",
                     "holder" => "div",
                     "class" => "",
                     "heading" => esc_html__("Main Logo", 'droit-wbpakery-addons'),
                     "param_name" => "dt_main_logo",
                     "value" => '',
                     "description" => esc_html__("Upload main logo", 'droit-wbpakery-addons')
                 ),
                array(
                     "type" => "attach_image",
                     "holder" => "div",
                     "class" => "",
                     "heading" => esc_html__("Main Retina Logo", 'droit-wbpakery-addons'),
                     "param_name" => "dt_logo_retina",
                     "value" => '',
                     "description" => esc_html__("Upload main retina logo", 'droit-wbpakery-addons')
                 ),
                array(
                     "type" => "attach_image",
                     "holder" => "div",
                     "class" => "",
                     "heading" => esc_html__("Sticky Logo", 'droit-wbpakery-addons'),
                     "param_name" => "dt_sticky_logo",
                     "value" => '',
                     "description" => esc_html__("Upload sticky logo", 'droit-wbpakery-addons')
                 ),
                array(
                     "type" => "attach_image",
                     "holder" => "div",
                     "class" => "",
                     "heading" => esc_html__("Sticky Retina Logo", 'droit-wbpakery-addons'),
                     "param_name" => "dt_sticky_logo_retina",
                     "value" => '',
                     "description" => esc_html__("Upload sticky retina logo", 'droit-wbpakery-addons')
                ),
                array(
                    "type"     => "textfield",
                    "holder"   => "div",
                    "class"    => "",
                    "heading"  => esc_html__("Logo Margin", 'droit-wbpakery-addons'),
                    "param_name" => "dt_logo_margin",
                    "value"    => '',
                    "description" => esc_html__("Logo image margin support 4 value (0px 0px 0px 0px)", 'droit-wbpakery-addons'),
                    "group"    => esc_html__( 'Style', 'droit-wbpakery-addons' )
                ),
                array(
                    "type"     => "textfield",
                    "holder"   => "div",
                    "class"    => "",
                    "heading"  => esc_html__("Logo Padding", 'droit-wbpakery-addons'),
                    "param_name" => "dt_logo_padding",
                    "value"    => '',
                    "description" => esc_html__("Logo image padding support 4 value (0px 0px 0px 0px)", 'droit-wbpakery-addons'),
                    "group"    => esc_html__( 'Style', 'droit-wbpakery-addons' )
                )

            ) ),
        ) );
    }


    /*
     *  Menu Render
     */
    public function dt_logo_render( $atts, $content = null ) {

        extract( shortcode_atts( array(
            'dt_main_logo'        => '',
            'dt_logo_retina'      => '',
            'dt_sticky_logo'      => '',
            'dt_sticky_logo_retina'=> '',
            'dt_logo_margin'      => '',
            'dt_logo_padding'     => '',
        ), $atts ) );


        $output = dt_template_part('logo', null , $atts);
        return $output;

    }


}
// Finally initialize code
