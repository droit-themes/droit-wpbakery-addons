<?php
namespace shortcodes\dt_accordion;

class dt_accordion {

    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_accordion' ) );

        // Use this when creating a shortcode addon
        add_shortcode( 'dt_accordion', array( $this, 'dt_accordion_render' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_accordion_loadCssAndJs' ) );
        add_action( 'front_enqueue_js', array( $this, 'dt_accordion_loadCssAndJs' ) );
    }

    public function dt_accordion() {

        vc_map( array(
            'name' => __('Droit Accordion', 'droit-wbpakery-addons'),
            'base' => 'dt_accordion',
            'controls' => 'full',
            'icon' => DROIT_WPBAKERY_ADDONS_ASSETS_URL_PATH.'/img/icon.png', // or css class name which you can reffer in your css file later. Example: 'droit-wbpakery-addons_my_class'
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            'params' => array_merge(array(

                //============================= Select Style ===========================//
                array(
                    'type' => 'dropdown',
                    'heading' => __( 'Style',  'droit-wbpakery-addons' ),
                    'param_name' => 'style',
                    'default' => '1',
                    'value' => array(
                        esc_html__( 'Accordion with Featured Image',  'droit-wbpakery-addons'  ) => '1',
                    ),
                ), //End Style


                //=================== Accordion =========================//
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'heading' => __( 'Accordion', 'droit-wbpakery-addons'),
                    'param_name' => 'accordions',
                    'params' => array_merge( array(

                        //========================== Group Fields ======================= //
                        array(
                            'type' => 'textfield',
                            'heading' => __( 'Date', 'droit-wbpakery-addons' ),
                            'param_name' => 'date',
                        ),

                    ))
                ), //End Style 02


                //================= Featured Image ====================//
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Featured Image', 'droit-wbpakery-addons' ),
                    'param_name' => 'f_image',
                    'dependency' => array(
                        'element' => 'style',
                        'value' => '2'
                    )
                ), //End Featured Image


            ), vc_typography_selections('Title', 'title'), vc_typography_selections('Designation', 'designation')),
        ) );
    }

    /*
     Header randaraing 
    */
    public function dt_accordion_render( $atts, $content = null ) {

        extract( shortcode_atts( array(
            'upper_title' => 'Work with us',
            'title' => 'Grow your business with instant results',
            'contents' => '',
            'btn_link' => 'Work with me',
            'f_image' => '',
            'bg_img' => '',
        ), $atts, $content ) );

        $template_style = 1;

        if ( !empty($atts['style']) ) {

            $template_style = $atts['style'];

        }

        $output = dt_template_part('accordion', $template_style, $atts);

        return $output;

    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_accordion_loadCssAndJs() {
        wp_register_style( 'dt_extend_style', plugins_url('assets/droit-wbpakery-addons.css', __FILE__) );
        wp_enqueue_script('droit-wpbakery-addons-script');
    }
}
// Finally initialize code
