<?php 
namespace shortcodes\dt_icon_box;

class dt_icon_box {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_icon_box' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_icon_box', array( $this, 'dt_icon_box_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_icon_box_loadCssAndJs' ) );
    }
 
    public function dt_icon_box() {
      
        vc_map( array(
            "name" => esc_html__("Droit Icon Box", 'droit-wbpakery-addons'),
            "description" => esc_html__("Droi Icon Box", 'droit-wbpakery-addons'),
            "base" => "dt_icon_box",
            "class" => "",
            "controls" => "full",
            "icon" => DROIT_WPBAKERY_ADDONS_ASSETS_URL_PATH.'/img/icon.png', // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array_merge(vc_iconfont_selections(),  array(
              array(
                'type' => 'dropdown',
                'heading' => __( 'Testimonial Style',  "droit-wbpakery-addons" ),
                'param_name' => 'dt_icon_box_style',
                'default' => '1',
                'value' => array(
                  esc_html__( 'Style 1',  "droit-wbpakery-addons"  ) => '1',
                  esc_html__( 'Style 2',  "droit-wbpakery-addons"  ) => '2',
                ),
              ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "heading" => esc_html__("Wrapper class ", 'droit-wbpakery-addons'),
                    "param_name" => "dt_list_icon_wrapper_class",
                    'group' => esc_html__( 'Design Option', 'droit-wbpakery-addons' ),
                    'edit_field_class' => 'vc_col-sm-6',

                  ),
                  array(
                    "type" => "textfield",
                    "holder" => "div",
                    "heading" => esc_html__("Icon size", 'droit-wbpakery-addons'),
                    "param_name" => "dt_list_icon_font_size",
                    'group' => esc_html__( 'Design Option', 'droit-wbpakery-addons' ),
                    'edit_field_class' => 'vc_col-sm-6',
                  ),
                  array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Icon Color', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_icon_box_icon_color',
                    'description' => esc_html__( 'Font Color.', 'droit-wbpakery-addons' ),
                    'edit_field_class' => 'vc_col-sm-6',
                    'group' => esc_html__( 'Design Option', 'droit-wbpakery-addons' ),
                            'description' => esc_html__( 'Font color', 'droit-wbpakery-addons' ),
                  ),
                  array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Icon Background Color', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_icon_box_icon_bg_color',
                    'description' => esc_html__( 'Font Color.', 'droit-wbpakery-addons' ),
                    'edit_field_class' => 'vc_col-sm-6',
                    'group' => esc_html__( 'Design Option', 'droit-wbpakery-addons' ),
                            'description' => esc_html__( 'Icon Background Color', 'droit-wbpakery-addons' ),
                  ),
                  array(
                    "type" => "textarea",
                    "holder" => "div",
                    "heading" => esc_html__("Title ", 'droit-wbpakery-addons'),
                    "param_name" => "dt_icon_box_title",

                  ),
                  array(
                    "type" => "textarea",
                    "holder" => "div",
                    "heading" => esc_html__("Description ", 'droit-wbpakery-addons'),
                    "param_name" => "dt_icon_box_description",

                  ),
                  array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'URL (Link)', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_icon_box_link',
                    'description' => esc_html__( 'Add link to button.', 'droit-wbpakery-addons' ),
                ),
                
                array(
                  "type" => "textfield",
                  "holder" => "div",
                  "heading" => esc_html__("Link Title ", 'droit-wbpakery-addons'),
                  "param_name" => "dt_icon_box_link_title",
                  'dependency' => array(
                        'element' => 'dt_icon_box_style',
                        'value' => '2',
                      ),

                ),
              
               ), dt_animation('iconboxanimation'),vc_typography_selections('Icon Box Title', 'dt_icon_box_title'),vc_typography_selections('Icon Box Description', 'dt_icon_box_dec'))
        ) );
    }
    
    /*
     Header randaraing 
    */
    public function dt_icon_box_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_list_icon_wrapper_class' => '',
        'icon_type' => 'droit_icon',
        'dt_icon_box' => ''
      ), $atts, $content ) );

    
      $tempalte_style = 1;

      if(!empty($atts['dt_icon_box_style'])) {

        $tempalte_style = $atts['dt_icon_box_style'];

      }

      $output = dt_template_part('icon-box', $tempalte_style , $atts);
     
      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_icon_box_loadCssAndJs() {
      wp_register_style( 'dt_icon_box_style', plugins_url('assets/css/icon-box.css', __FILE__) );
    }
}
// Finally initialize code
