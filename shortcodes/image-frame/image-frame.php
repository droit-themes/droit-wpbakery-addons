<?php 
namespace shortcodes\dt_image_frame;

class dt_image_frame {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_image_frame' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_image_frame', array( $this, 'dt_image_frame_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_image_frame_loadCssAndJs' ) );
    }
 
    public function dt_image_frame() {
      
        vc_map( array(
            "name" => __("Droit Image Frame", 'droit-wbpakery-addons'),
            "description" => __("Droi droit spacial heading for your section", 'droit-wbpakery-addons'),
            "base" => "dt_image_frame",
            "class" => "",
            "controls" => "full",
            "icon" => DROIT_WPBAKERY_ADDONS_ASSETS_URL_PATH.'/img/icon.png', // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array(
                array(
                  "type" => "attach_image",
                  "holder" => "div",
                  "heading" => __("Image", 'droit-wbpakery-addons'),
                  "param_name" => "dt_image_frame_img_main",
              ),
              array(
                'type' => 'dropdown',
                'heading' => __( 'Image Aligment',  "droit-wbpakery-addons" ),
                'param_name' => 'dt_frame_aligment',
                'default' => 'left',
                'value' => array(
                  __( 'Let',  "droit-wbpakery-addons"  ) => 'left',
                  __( 'Right',  "droit-wbpakery-addons"  ) => 'right',
                  __( 'Center',  "droit-wbpakery-addons"  ) => 'center',
                ),
                "description" => __( "Text aligment", "droit-wbpakery-addons" )
            ),
            array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Border Radius", 'droit-wbpakery-addons'),
              "param_name" => "dt_image_frame_border_radious",
          ),
              array(
                'type' => 'param_group',
                'value' => '',
                "heading" => __("Frame Image", 'droit-wbpakery-addons'),
                'param_name' => 'dt_image_frame_group',
                // Note params is mapped inside param-group:
                'params' => array(
                  
                    array(
                        "type" => "attach_image",
                        "holder" => "div",
                        "heading" => __("Image", 'droit-wbpakery-addons'),
                        "param_name" => "dt_image_frame_image",
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __("Top Position", 'droit-wbpakery-addons'),
                        "param_name" => "dt_image_frame_top",
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __("Title", 'droit-wbpakery-addons'),
                        "param_name" => "dt_image_frame_left",
                    ),

                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __("Z Index", 'droit-wbpakery-addons'),
                        "param_name" => "dt_image_frame_z_index",
                    ),
                    array(
                      'type' => 'dropdown',
                      'heading' => __( 'Animation type',  "droit-wbpakery-addons" ),
                      'param_name' => 'dt_image_frame_animation_name',
                      'default' => '',
                      'value' => array(
                          esc_html__( 'Select animation type',  "droit-wbpakery-addons"  ) => '',
                          esc_html__( 'fadeInRight',  "droit-wbpakery-addons"  ) => 'fadeInRight',
                          esc_html__( 'fadeInleft',  "droit-wbpakery-addons"  ) => 'fadeInRight',
                      ),
                    ), 
                    array(
                      "type" => "textfield",
                      "holder" => "div",
                      "class" => "",
                      "heading" => esc_html__("Animation delay", 'droit-wbpakery-addons'),
                      "param_name" => "dt_image_frame_animation_delay",
                      'description'      =>     esc_html__("Eg: .1s", 'droit-wbpakery-addons'),            
                      'dependency' => array(
                        'element' => 'dt_image_frame_animation_name',
                        'not_empty' => TRUE
                      ),
                      'edit_field_class' => 'vc_col-sm-6',
                    ),
                  array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_html__("Animation duration", 'droit-wbpakery-addons'),
                    "param_name" => "dt_image_frame_animation_duration",
                    'description'      =>     esc_html__("Eg: .1s", 'droit-wbpakery-addons'),            
                    'dependency' => array(
                      'element' => 'dt_image_frame_animation_name',
                      'not_empty' => TRUE
                    ),
                    'edit_field_class' => 'vc_col-sm-6',                    
                  ),

                  array(
                    "type" => "checkbox",
                    "class" => "",
                    "heading" => esc_html__( "Enable Parallax?", "droit-wbpakery-addons" ),
                    "param_name" => "dt_enable_parallex",
                    "value" => esc_html__( "yes", "droit-wbpakery-addons" ),
                  ),
                  array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_html__("Paralle X", 'droit-wbpakery-addons'),
                    "param_name" => "dt_image_frame_parallex_x",
                    'dependency' => array(
                      'element' => 'dt_enable_parallex',
                      'not_empty' => TRUE
                    ),
                    'edit_field_class' => 'vc_col-sm-6',  
                    'description'      =>     esc_html__("Eg: 100", 'droit-wbpakery-addons'),                              
                  ),
                  array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_html__("Paralle Y", 'droit-wbpakery-addons'),
                    "param_name" => "dt_image_frame_parallex_y",
                    'dependency' => array(
                      'element' => 'dt_enable_parallex',
                      'not_empty' => TRUE
                    ),
                    'edit_field_class' => 'vc_col-sm-6', 
                    'description'      =>     esc_html__("Eg: 100", 'droit-wbpakery-addons'),            
                  ),
                )),
            )
        ) );
    }
    
    /*
     Header randaraing 
    */
    public function dt_image_frame_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_image_frame_img' => '',
        'dt_image_frame_title' => '',
        'dt_title' => '',
        'dt_title_description' => '',
        'dt_img_link'=> '',
      ), $atts ) );
     

      $output = dt_template_part('image-frame', null , $atts);
     
      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_image_frame_loadCssAndJs() {
    //   wp_register_style( 'dt_extend_style', plugins_url('assets/droit-wbpakery-addons.css', __FILE__) );
    //   wp_enqueue_style( 'dt_extend_style' );

      // If you need any javascript files on front end, here is how you can load them.
      //wp_enqueue_script( 'droit-wbpakery-addons_js', plugins_url('assets/droit-wbpakery-addons.js', __FILE__), array('jquery') );
    }
}
// Finally initialize code
