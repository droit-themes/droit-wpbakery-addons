<?php 
namespace shortcodes\dt_infobox;

class dt_infobox {

    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_infobox' ) );

        // Use this when creating a shortcode addon
        add_shortcode( 'dt_infobox', array( $this, 'dt_infobox_render' ) );

    }

    public function dt_infobox() {

        vc_map( array(
            "name" => esc_html__("Droit InfoBox", 'droit-wbpakery-addons'),
            "description" => esc_html__("Rave spacal infobox for your section", 'droit-wbpakery-addons'),
            "base" => "dt_infobox",
            "controls" => "full",
            "icon" => DROIT_WPBAKERY_ADDONS_ASSETS_URL_PATH.'/img/icon.png', // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array_merge(array(
                array(
                    "type"     => "textfield",
                    "holder"   => "div",
                    "class"    => "",
                    "heading"  => esc_html__("Cunter", 'droit-wbpakery-addons'),
                    "param_name" => "dt_infobox_counter",
                    "description" => esc_html__("Eg: 1", 'droit-wbpakery-addons'),
                ),
                array(
                    "type"     => "textarea",
                    "holder"   => "div",
                    "class"    => "",
                    "heading"  => esc_html__("Title", 'droit-wbpakery-addons'),
                    "param_name" => "dt_infobox_title",
                ),
                array(
                    "type"     => "textarea",
                    "heading"  => esc_html__("Content", 'droit-wbpakery-addons'),
                    "param_name" => "dt_infobox_content",
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    "heading" => esc_html__("Infobox List", 'droit-wbpakery-addons'),
                    'param_name' => 'dt_info_box_list',
                    'params' => array(

                      array(
                        "type" => "textfield",
                        "heading" => esc_html__("Title ", 'droit-wbpakery-addons'),
                        "param_name" => "dt_infobox_link_title",
                      ),
                    array(
                        "type" => "vc_link",
                        "heading" => esc_html__("link", 'droit-wbpakery-addons'),
                        "param_name" => "dt_infobox_link",
                    ),  
                )),
                array(
                    "type"     => "textfield",
                    "heading"  => esc_html__("Custom Class", 'droit-wbpakery-addons'),
                    "param_name" => "dt_infobox_custom_wrapper_class",
                ),
            ) ),
        ) );
    }


    /*
     *  Menu Render
     */
    public function dt_infobox_render( $atts, $content = null ) {

        extract( shortcode_atts( array(
            'dt_infobox_counter'  => '',
            'dt_infobox_title'    => '',
            'dt_infobox_content'    => '',
            'dt_info_box_list'    => '',
            'dt_infobox_custom_wrapper_class' => ''

        ), $atts ) );


        $output = dt_template_part('infobox', null , $atts);
        return $output;

    }


}
// Finally initialize code
