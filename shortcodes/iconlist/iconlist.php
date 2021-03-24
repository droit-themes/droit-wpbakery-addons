<?php 
namespace shortcodes\dt_icon_list;

class dt_icon_list {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_icon_list' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_icon_list', array( $this, 'dt_icon_list_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_icon_list_loadCssAndJs' ) );
    }
 
    public function dt_icon_list() {
      
        vc_map( array(
            "name" => __("Droit Icon list", 'droit-wbpakery-addons'),
            "description" => __("Droi Icon list", 'droit-wbpakery-addons'),
            "base" => "dt_icon_list",
            "class" => "",
            "controls" => "full",
            "icon" => plugins_url('assets/asterisk_yellow.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array_merge(array(
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "heading" => __("Wrapper class ", 'droit-wbpakery-addons'),
                    "param_name" => "dt_list_icon_wrapper_class",

                  ),
                  array(
                    "type" => "textfield",
                    "holder" => "div",
                    "heading" => __("Icon margin right ", 'droit-wbpakery-addons'),
                    "param_name" => "dt_list_icon_mr",
                    'group' => __( 'Design Option', 'droit-wbpakery-addons' ),
                    'edit_field_class' => 'vc_col-sm-4',

                  ),
                  array(
                    "type" => "textfield",
                    "holder" => "div",
                    "heading" => __("Icon Font size ", 'droit-wbpakery-addons'),
                    "param_name" => "dt_list_icon_font_size",
                    'group' => __( 'Design Option', 'droit-wbpakery-addons' ),
                    'edit_field_class' => 'vc_col-sm-4',

                  ),
                  array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "heading" => __("Icon color ", 'droit-wbpakery-addons'),
                    "param_name" => "dt_list_icon_color",
                    'group' => __( 'Design Option', 'droit-wbpakery-addons' ),
                    'edit_field_class' => 'vc_col-sm-4',

                  ),
                  array(
                    "type" => "css_editor",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Wrapper", 'droit-wbpakery-addons'),
                    "param_name" => "dt_wrapper_css",
                    "value" => '#FF0000', 
                    "description" => __("Choose text color", 'droit-wbpakery-addons'),
                    'group' => __( 'Design Option', 'droit-wbpakery-addons' ),
                ),
              array(
                'type' => 'param_group',
                'value' => '',
                "heading" => __("Droit list with icon ", 'droit-wbpakery-addons'),
                'param_name' => 'droit_iconlist',
                'params' => array_merge(vc_iconfont_selections(), array(
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "heading" => __("Text ", 'droit-wbpakery-addons'),
                        "param_name" => "dt_list_icon_text",

                      ),
                  )))
                
                    ), vc_typography_selections('Icon Box Text', 'dt_list_icon'))
        ) );
    }
    
    /*
     Header randaraing 
    */
    public function dt_icon_list_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_list_icon_wrapper_class' => '',
        'icon_type' => 'droit_icon',
        'dt_icon_list' => ''
      ), $atts, $content ) );
    
      $output = dt_template_part('iconlist', null , $atts);
     
      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_icon_list_loadCssAndJs() {
      wp_register_style( 'dt_extend_style', plugins_url('assets/droit-wbpakery-addons.css', __FILE__) );
      // If you need any javascript files on front end, here is how you can load them.
      //wp_enqueue_script( 'droit-wbpakery-addons_js', plugins_url('assets/droit-wbpakery-addons.js', __FILE__), array('jquery') );
    }
}
// Finally initialize code
