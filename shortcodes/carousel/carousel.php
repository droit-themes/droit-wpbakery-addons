<?php 
namespace shortcodes\dt_carousel;

class dt_carousel {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_carousel' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_carousel', array( $this, 'dt_carousel_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_carousel_loadCssAndJs' ) );
    }
 
    public function dt_carousel() {
      
        vc_map( array(
            "name" => __("Droit Carousel", 'droit-wbpakery-addons'),
            "description" => __("Droi Carousel", 'droit-wbpakery-addons'),
            "base" => "dt_carousel",
            "class" => "",
            "controls" => "full",
            "icon" => plugins_url('assets/asterisk_yellow.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array(
           
              array(
                  "type" => "textfield",
                  "holder" => "span",
                  "heading" => __("Title", 'droit-wbpakery-addons'),
                  "param_name" => "dt_carousel_section_title",
                  "description" => __("Section Title.", 'droit-wbpakery-addons')
              ),
             
              array(
                'type' => 'param_group',
                'value' => '',
                "heading" => __("Droit Carousel", 'droit-wbpakery-addons'),
                'param_name' => 'droit_gallery_content',
                // Note params is mapped inside param-group:
                'params' => array(
                  array(
                      'type' => 'dropdown',
                      'heading' => __( 'Use Icon Or Image',  "droit-wbpakery-addons" ),
                      'param_name' => 'dt_use_icon_or_image',
                      'default' => 'img',
                      'value' => array(
                        esc_html__( 'Image',  "droit-wbpakery-addons"  ) => 'img',
                        esc_html__( 'Icon',  "droit-wbpakery-addons"  ) => 'icon',
                      ),
                    ),
                    array(
                        "type" => "attach_image",
                        "holder" => "div",
                        "heading" => __("Image", 'droit-wbpakery-addons'),
                        "param_name" => "dt_gallery_img",
                        'dependency' => array(
                              'element' => 'dt_use_icon_or_image',
                              'value_not_equal_to' => 'icon',
                            ),
                    ),
                    array(
                      'type' => 'iconpicker',
                      'heading' => esc_html__( 'Select Icon  ', 'droit-wbpakery-addons' ),
                      'param_name' => 'dt_btn_icon_selector',
                      'dependency' => array(
                          'element' => 'dt_use_icon_or_image',
                          'value_not_equal_to' => 'img',
                        ),
                  ),
                  array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Icon Color', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_carousel_icon_color',
                    'description' => esc_html__( 'Icon Color.', 'droit-wbpakery-addons' ),
                    'edit_field_class' => 'vc_col-sm-6',
                    'dependency' => array(
                      'element' => 'dt_use_icon_or_image',
                      'value_not_equal_to' => 'img',
                    ),
                ),
                array(
                  "type" => "textfield",
                  "holder" => "div",
                  "heading" => __("Icon Font Size ", 'droit-wbpakery-addons'),
                  "param_name" => "dt_carosuel_icon_font_size",
                  'edit_field_class' => 'vc_col-sm-6',
                  'dependency' => array(
                    'element' => 'dt_use_icon_or_image',
                    'value_not_equal_to' => 'img',
                  ),
                ),
                  array(
                    "type" => "textfield",
                    "holder" => "div",
                    "heading" => __("Title ", 'droit-wbpakery-addons'),
                    "param_name" => "dt_carosuel_title",
                  ),
                  array(
                    "type" => "textarea",
                    "holder" => "div",
                    "heading" => __("Description", 'droit-wbpakery-addons'),
                    "param_name" => "dt_carousel_description",
                  ),
                    array(
                        "type" => "vc_link",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __("Wrapper link", 'droit-wbpakery-addons'),
                        "param_name" => "dt_carosuel_link",
                    ),
                   
            ))

            )
        ) );
    }
    
    /*
     Header randaraing 
    */
    public function dt_carousel_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_carousel_section_title' => '',
        'dt_carosuel_title'     => ''
      ), $atts ) );
     
      $output = dt_template_part('carousel', null , $atts);
     
      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_carousel_loadCssAndJs() {
      wp_register_style( 'dt_extend_style', plugins_url('assets/droit-wbpakery-addons.css', __FILE__) );
      wp_enqueue_style( 'slick' );
      wp_enqueue_style( 'slick-theme' );

      // If you need any javascript files on front end, here is how you can load them.
     wp_enqueue_script( 'droit-wpbakery-addons-script' );
    }
}
// Finally initialize code
