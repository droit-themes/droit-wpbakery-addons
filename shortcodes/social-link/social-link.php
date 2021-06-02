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
            "name" => __("Droit Social link", 'droit-wbpakery-addons'),
            "description" => __("Droit spacial Socila link for your Menu or Section", 'droit-wbpakery-addons'),
            "base" => "dt_social_link",
            "class" => "",
            "controls" => "full",
            "icon" => plugins_url('assets/asterisk_yellow.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array(
              
              array(
                'type' => 'param_group',
                'value' => '',
                "heading" => __("Droit Gallery", 'droit-wbpakery-addons'),
                'param_name' => 'droit_gallery_content',
                // Note params is mapped inside param-group:
                'params' => array(
                   
                    array(
                        "type" => "vc_link",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __("Title Description", 'droit-wbpakery-addons'),
                        "param_name" => "dt_social_link_link",
                        "description" => __("Enter your description.", 'droit-wbpakery-addons')
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => __( 'Select icon type',  "droit-wbpakery-addons" ),
                        'param_name' => 'icon_type',
                        'default' => 'droit_icon',
                        'value' => array(
                            esc_html__( 'Select Icon Type',  "droit-wbpakery-addons"  ) => '',
                            esc_html__( 'Droit',  "droit-wbpakery-addons"  ) => 'droit_icon',
                            esc_html__( 'Font Awesome 5', 'js_composer' ) => 'fontawesome',
                            esc_html__( 'Open Iconic', 'js_composer' ) => 'openiconic',
                            esc_html__( 'Typicons', 'js_composer' ) => 'typicons',
                            esc_html__( 'Entypo', 'js_composer' ) => 'entypo',
                            esc_html__( 'Linecons', 'js_composer' ) => 'linecons',
                            esc_html__( 'Mono Social', 'js_composer' ) => 'monosocial',
                        ),
                      ),
                    array(
                        "type" => "iconpicker",
                        'param_name' => 'icon_picker_droit_icon',
                        "holder" => "div",
                        "heading" => __("Icon ", 'droit-wbpakery-addons'),
                        "settings" => array(
                            'emptyIcon' => false,
                            'type' => 'droit_icon',
                            'iconsPerPage' => 200,
                        ),
                        'dependency' => array(
                          'element' => 'icon_type',
                          'value' => 'droit_icon',
                        ),
                      ),
                      array(
                        "type" => "iconpicker",
                        'param_name' => 'icon_picker_fontawesome',
                        "holder" => "div",
                        "heading" => __("Icon ", 'droit-wbpakery-addons'),
                        "settings" => array(
                            'emptyIcon' => false,
                            'type' => 'fontawesome',
                            'iconsPerPage' => 200,
                        ),
                        'dependency' => array(
                          'element' => 'icon_type',
                          'value' => 'fontawesome',
                        ),
                      ),
                      array(
                        "type" => "iconpicker",
                        'param_name' => 'icon_picker_openiconic',
                        "holder" => "div",
                        "heading" => __("Icon ", 'droit-wbpakery-addons'),
                        "settings" => array(
                            'emptyIcon' => false,
                            'type' => 'openiconic',
                            'iconsPerPage' => 200,
                        ),
                        'dependency' => array(
                          'element' => 'icon_type',
                          'value' => 'openiconic',
                        ),
                      ),  
                      array(
                        "type" => "iconpicker",
                        'param_name' => 'icon_picker_typicons',
                        "holder" => "div",
                        "heading" => __("Icon ", 'droit-wbpakery-addons'),
                        "settings" => array(
                            'emptyIcon' => false,
                            'type' => 'typicons',
                            'iconsPerPage' => 200,
                        ),
                        'dependency' => array(
                          'element' => 'icon_type',
                          'value' => 'typicons',
                        ),
                      ),  
                      array(
                        "type" => "iconpicker",
                        'param_name' => 'icon_picker_entypo',
                        "holder" => "div",
                        "heading" => __("Icon ", 'droit-wbpakery-addons'),
                        "settings" => array(
                            'emptyIcon' => false,
                            'type' => 'entypo',
                            'iconsPerPage' => 200,
                        ),
                        'dependency' => array(
                          'element' => 'icon_type',
                          'value' => 'entypo',
                        ),
                      ),  
                      array(
                        "type" => "iconpicker",
                        'param_name' => 'icon_picker_linecons',
                        "holder" => "div",
                        "heading" => __("Icon ", 'droit-wbpakery-addons'),
                        "settings" => array(
                            'emptyIcon' => false,
                            'type' => 'linecons',
                            'iconsPerPage' => 200,
                        ),
                        'dependency' => array(
                          'element' => 'icon_type',
                          'value' => 'linecons',
                        ),
                      ),  
                      array(
                        "type" => "iconpicker",
                        'param_name' => 'icon_picker_monosocial',
                        "holder" => "div",
                        "heading" => __("Icon ", 'droit-wbpakery-addons'),
                        "settings" => array(
                            'emptyIcon' => false,
                            'type' => 'monosocial',
                            'iconsPerPage' => 200,
                        ),
                        'dependency' => array(
                          'element' => 'icon_type',
                          'value' => 'monosocial',
                        ),
                      ),
            )),
            array(
              "type" => "colorpicker",
              "holder" => "div",
              "heading" => __("Icon color ", 'droit-wbpakery-addons'),
              "param_name" => "dt_social_icon_color",
              'group' => __( 'Design Option', 'droit-wbpakery-addons' ),
              'edit_field_class' => 'vc_col-sm-12',

            ),
            array(
              "type" => "colorpicker",
              "holder" => "div",
              "heading" => __("Icon Hover color ", 'droit-wbpakery-addons'),
              "param_name" => "dt_social_icon_color",
              'group' => __( 'Design Option', 'droit-wbpakery-addons' ),
              'edit_field_class' => 'vc_col-sm-12',

            ),
            )
        ) );
    }
    
    /*
     Header randaraing 
    */
    public function dt_social_link_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
       
      ), $atts ) );
     
      $output = dt_template_part('social-link', null , $atts);
     
      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_social_link_loadCssAndJs() {
    //   wp_register_style( 'dt_extend_style', plugins_url('assets/droit-wbpakery-addons.css', __FILE__) );
    //   wp_enqueue_style( 'dt_extend_style' );

      // If you need any javascript files on front end, here is how you can load them.
      //wp_enqueue_script( 'droit-wbpakery-addons_js', plugins_url('assets/droit-wbpakery-addons.js', __FILE__), array('jquery') );
    }
}
// Finally initialize code
