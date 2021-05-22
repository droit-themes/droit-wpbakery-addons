<?php 
namespace shortcodes\dt_social_link;

class dt_social_link {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_social_link' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_social_link', array( $this, 'dt_social_link_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_social_link_loadCssAndJs' ) );
    }
 
    public function dt_social_link() {
      
        vc_map( array(
            "name" => __("Droit Socila link", 'droit-wbpakery-addons'),
            "description" => __("Droit spacial Socila link for your section", 'droit-wbpakery-addons'),
            "base" => "dt_social_link",
            "class" => "",
            "controls" => "full",
            "icon" => DROIT_WPBAKERY_ADDONS_ASSETS_URL_PATH.'/img/icon.png', // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array(
              array(
                'type' => 'dropdown',
                'heading' => __( 'Socila link Style',  "droit-wbpakery-addons" ),
                'param_name' => 'dt_social_link_style',
                'default' => 'yes',
                'value' => array(
                  esc_html__( 'Style 1',  "droit-wbpakery-addons"  ) => '1',
                  esc_html__( 'Style 2',  "droit-wbpakery-addons"  ) => '2',
                ),
              ),
              array(
                "type" => "textarea",
                "holder" => "div",
                "heading" => __("Title", 'droit-wbpakery-addons'),
                "param_name" => "dt_social_link_title",
                 'dependency' => array(
                  'element' => 'dt_social_link_style',
                  'value' => '1',
                ),
              ),
              array(
                'type' => 'param_group',
                'value' => '',
                "heading" => __("Droit Socila link", 'droit-wbpakery-addons'),
                'param_name' => 'droit_Socila link_content',
                'dependency' => array(
                  'element' => 'dt_social_link_style',
                  'value' => '1',
                ),
                // Note params is mapped inside param-group:
                'params' => array(
                    array(
                        "type" => "attach_image",
                        "holder" => "div",
                        "heading" => __("Image", 'droit-wbpakery-addons'),
                        "param_name" => "dt_social_link_img",
                    ),
            )),
              array(
                'type' => 'param_group',
                'value' => '',
                "heading" => __("Droit Socila link", 'droit-wbpakery-addons'),
                'param_name' => 'droit_Socila link_content_style_2',
                'dependency' => array(
                  'element' => 'dt_social_link_style',
                  'value' => '2',
                ),
                // Note params is mapped inside param-group:
                'params' => array(
                    array(
                        "type" => "attach_image",
                        "holder" => "div",
                        "heading" => __("Image", 'droit-wbpakery-addons'),
                        "param_name" => "dt_social_link_img",
                    ),
                    array(
                      "type" => "textarea",
                      "heading" => __("Title ", 'droit-wbpakery-addons'),
                      "param_name" => "dt_social_link_title_style_2",
                    ),
                    array(
                      "type" => "textarea",
                      "heading" => __("Subtitle ", 'droit-wbpakery-addons'),
                      "param_name" => "dt_social_link_sub_title_style_2",
                    ),
                    array(
                      "type" => "textfield",
                      "heading" => __("Button 1 Text ", 'droit-wbpakery-addons'),
                      "param_name" => "dt_social_link_button_style_2",
                    ),
                    array(
                      'type' => 'vc_link',
                      'heading' => esc_html__( 'URL (Button 1 link)', 'droit-wbpakery-addons' ),
                      'param_name' => 'dt_social_link_button_link_1',
                      'description' => esc_html__( 'Add link to button.', 'droit-wbpakery-addons' ),
                      'group' => esc_html__( 'Button', 'droit-wbpakery-addons' ),
                  ),
                    array(
                      "type" => "textfield",
                      "heading" => __("Button 2 Text ", 'droit-wbpakery-addons'),
                      "param_name" => "dt_social_link_button_2_style_2",
                    ),
                    array(
                      'type' => 'vc_link',
                      'heading' => esc_html__( 'URL (Button 2 link)', 'droit-wbpakery-addons' ),
                      'param_name' => 'dt_social_link_button_link_2',
                      'description' => esc_html__( 'Add link to button.', 'droit-wbpakery-addons' ),
                      'group' => esc_html__( 'Button', 'droit-wbpakery-addons' ),
                  ),
            )),
            )
        ) );
    }
    
    /*
     Header randaraing 
    */
    public function dt_social_link_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_social_link_title' => '',
      ), $atts ) );
     

      $output = dt_template_part('Socila link', $atts['dt_social_link_style'] , $atts);

     
      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_social_link_loadCssAndJs() {
     // wp_register_style( 'dt_social_link_css', DROIT_WPBAKERY_ADDONS_SHORTCODES_URL_PATH.'/video-popup/assets/css/video-popu.css' );
      wp_register_script( 'dt_social_link_js', DROIT_WPBAKERY_ADDONS_SHORTCODES_URL_PATH.'/Socila link/assets/js/Socila link.js',  array('jquery'), DROIT_WPBAKERY_ADDONS);
  }
}
// Finally initialize code
