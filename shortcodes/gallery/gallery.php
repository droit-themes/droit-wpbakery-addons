<?php 
namespace shortcodes\dt_gallery;

class dt_gallery {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_gallery' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_gallery', array( $this, 'dt_gallery_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_gallery_loadCssAndJs' ) );
    }
 
    public function dt_gallery() {
      
        vc_map( array(
            "name" => __("Droit Gallery", 'droit-wbpakery-addons'),
            "description" => __("Droit spacial Gallery for your section", 'droit-wbpakery-addons'),
            "base" => "dt_gallery",
            "class" => "",
            "controls" => "full",
            "icon" => plugins_url('assets/asterisk_yellow.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array_merge( array(

                // ================ Select Style ==================== //
                array(
                    'type' => 'dropdown',
                    'heading' => __( 'Style',  "droit-wbpakery-addons" ),
                    'param_name' => 'style',
                    'default' => '1',
                    'value' => array(
                        esc_html__( 'Style 1',  "droit-wbpakery-addons"  ) => '1',
                        esc_html__( 'Style 2',  "droit-wbpakery-addons"  ) => '2',
                    ),
                ), // End Style

                array(
                    'type' => 'param_group',
                    'value' => '',
                    "heading" => __("Droit Gallery", 'droit-wbpakery-addons'),
                    'param_name' => 'droit_gallery_content',
                    'dependency' => array(
                        'element' => 'style',
                        'value_not_equal_to' =>  '2'
                    ),
                    // Note params is mapped inside param-group:
                    'params' => array(
                        array(
                            "type" => "attach_image",
                            "holder" => "div",
                            "heading" => __("Image", 'droit-wbpakery-addons'),
                            "param_name" => "dt_gallery_img",
                        ),
                        array(
                            "type" => "vc_link",
                            "holder" => "div",
                            "class" => "",
                            "heading" => __("Title Description", 'droit-wbpakery-addons'),
                            "param_name" => "dt_gallery_link",
                            "description" => __("Enter your description.", 'droit-wbpakery-addons')
                        ),
                        array(
                            "type" => "textfield",
                            "holder" => "div",
                            "class" => "dt-title-font",
                            "heading" => __("Image Top Bottom Position", 'droit-wbpakery-addons'),
                            "param_name" => "gallery_image_top_pos",
                        ),
                        array(
                            "type" => "textfield",
                            "holder" => "div",
                            "class" => "dt-title-font",
                            "heading" => __("Image Let Right Position", 'droit-wbpakery-addons'),
                            "param_name" => "gallery_image_left_pos",
                        ),
                    )
                ),


                array(
                    'type' => 'param_group',
                    'value' => '',
                    "heading" => __("Droit Gallery", 'droit-wbpakery-addons'),
                    'param_name' => 'droit_gallery_content2',
                    'dependency' => array(
                        'element' => 'style',
                        'value_not_equal_to' =>  '1'
                    ),
                    // Note params is mapped inside param-group:
                    'params' => array(
                        array(
                            "type" => "attach_image",
                            "holder" => "div",
                            "heading" => __("Image", 'droit-wbpakery-addons'),
                            "param_name" => "gallery_img",
                        ),
                        array(
                            "type" => "vc_link",
                            "holder" => "div",
                            "class" => "",
                            "heading" => __("Title Description", 'droit-wbpakery-addons'),
                            "param_name" => "dt_gallery_link",
                            "description" => __("Enter your description.", 'droit-wbpakery-addons')
                        ),
                    )
                ),

                vc_map_add_css_animation(true),
            )

            )
        ));

    }
    /*
     Header randaraing 
    */
    public function dt_gallery_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_gallery_img' => '',
        'dt_gallery_title' => '',
        'dt_title' => '',
        'dt_title_description' => '',
        'dt_img_link'=> '',
        'style' => 1,
      ), $atts ) );


        $template_style = 1;

        if ( isset($atts['style']) && $atts['style'] != '' ) {
            $template_style = $atts['style'];
        }

        $output = dt_template_part('gallery', $template_style , $atts);

        return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_gallery_loadCssAndJs() {
    //   wp_register_style( 'dt_extend_style', plugins_url('assets/droit-wbpakery-addons.css', __FILE__) );
    //   wp_enqueue_style( 'dt_extend_style' );

      // If you need any javascript files on front end, here is how you can load them.
      //wp_enqueue_script( 'droit-wbpakery-addons_js', plugins_url('assets/droit-wbpakery-addons.js', __FILE__), array('jquery') );
    }
}
// Finally initialize code
