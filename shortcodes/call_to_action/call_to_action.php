<?php
namespace shortcodes\dt_call_to_action;

class dt_call_to_action {

    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_call_to_action' ) );

        // Use this when creating a shortcode addon
        add_shortcode( 'dt_call_to_action', array( $this, 'dt_call_to_action_render' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_call_to_action_loadCssAndJs' ) );
        add_action( 'front_enqueue_js', array( $this, 'dt_call_to_action_loadCssAndJs' ) );
    }

    public function dt_call_to_action() {

        vc_map( array(
            "name" => __("Droit Call_to_action", 'droit-wbpakery-addons'),
            "description" => __("Droit Call to action section", 'droit-wbpakery-addons'),
            "base" => "dt_call_to_action",
            "controls" => "full",
            "icon" => DROIT_WPBAKERY_ADDONS_ASSETS_URL_PATH.'/img/icon.png', // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array_merge(array(

                //================= Start Content ========================//
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__( 'Content ', 'droit-wbpakery-addons' ),
                    'param_name' => 'contents',
                ),

                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'Button Label', 'droit-wbpakery-addons' ),
                    'param_name' => 'btn_link',
                ),

            ), vc_typography_selections('Title', 'title'), vc_typography_selections('Review', 'review'), vc_typography_selections('Author Name', 'authoer'), vc_typography_selections('Designation', 'designation')),
        ) );
    }

    /*
     Header randaraing 
    */
    public function dt_call_to_action_render( $atts, $content = null ) {

        extract( shortcode_atts( array(
            'contents' => '',
            'btn_link' => 'Work with me',
        ), $atts, $content ) );

        $output = dt_template_part('call_to_action', null , $atts);

        return $output;

    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_call_to_action_loadCssAndJs() {
        wp_register_style( 'dt_extend_style', plugins_url('assets/droit-wbpakery-addons.css', __FILE__) );
        wp_enqueue_script('slick');
        wp_enqueue_script('droit-wpbakery-addons-script');
    }
}
// Finally initialize code
