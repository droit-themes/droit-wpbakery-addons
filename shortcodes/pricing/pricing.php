<?php 
namespace shortcodes\dt_pricing;

class dt_pricing {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_pricing' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_pricing', array( $this, 'dt_pricing_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_pricing_loadCssAndJs' ) );
    }
 
    public function dt_pricing() {
      
        vc_map( array(
            "name" => esc_html__("Droit Pricing", 'droit-wbpakery-addons'),
            "description" => esc_html__("Droi pricing for your section", 'droit-wbpakery-addons'),
            "base" => "dt_pricing",
            "class" => "",
            "controls" => "full",
            "icon" => plugins_url('assets/asterisk_yellow.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array(
              
              array(
                'type' => 'dropdown',
                'heading' => __( 'Tab or simple pricing',  "droit-wbpakery-addons" ),
                'param_name' => 'dt_show_pricing_tab',
                'default' => 'yes',
                'value' => array(
                  esc_html__( 'Simple',  "droit-wbpakery-addons"  ) => 'simple',
                  esc_html__( 'Tabs',  "droit-wbpakery-addons"  ) => 'yes',
                ),
              ),
              array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("First Tab Title", 'droit-wbpakery-addons'),
                "param_name" => "dt_pricing_tab_title",
                'dependency' => array(
                  'element' => 'dt_show_pricing_tab',
                  'value_not_equal_to' => 'simple',
                ),
              ),
              array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("2nd Tab Title", 'droit-wbpakery-addons'),
                "param_name" => "dt_pricing_tab_title_2",
                'dependency' => array(
                  'element' => 'dt_show_pricing_tab',
                  'value_not_equal_to' => 'simple',
                ),
               ),
               array(
                'type' => 'param_group',
                'value' => '',
                "heading" => esc_html__("Droit Pricing Content", 'droit-wbpakery-addons'),
                'param_name' => 'droit_pricing_content',
                'params' => array(
                  array(
                    "type" => "textfield",
                    "holder" => "div",
                    "heading" => esc_html__("Tag ", 'droit-wbpakery-addons'),
                    "param_name" => "dt_pricing_tag",

                  ),
                  array(
                    "type" => "textarea",
                    "holder" => "div",
                    "heading" => esc_html__("Title", 'droit-wbpakery-addons'),
                    "param_name" => "dt_pricing_title",

                  ),

                  array(
                    "type" => "textarea",
                    "holder" => "div",
                    "heading" => esc_html__("Sub Title", 'droit-wbpakery-addons'),
                    "param_name" => "dt_pricing_sub_title",

                  ),
                  array(
                    "type" => "textfield",
                    "holder" => "div",
                    "heading" => esc_html__("Price Symble", 'droit-wbpakery-addons'),
                    "param_name" => "dt_pricing_price_symble",

                  ),

                  array(
                    "type" => "textfield",
                    "holder" => "div",
                    "heading" => esc_html__("Price", 'droit-wbpakery-addons'),
                    "param_name" => "dt_pricing_price",

                  ),

                  array(
                    "type" => "textfield",
                    "holder" => "div",
                    "heading" => esc_html__("Price after", 'droit-wbpakery-addons'),
                    "param_name" => "dt_pricing_price_after",

                  ),

                  array(
                    "type" => "textfield",
                    "holder" => "div",
                    "heading" => esc_html__("Price type", 'droit-wbpakery-addons'),
                    "param_name" => "dt_pricing_price_type",

                  ),
                  array(
                    "type" => "textarea",
                    "holder" => "div",
                    "heading" => esc_html__("Price content", 'droit-wbpakery-addons'),
                    "param_name" => "dt_pricing_feature_list",

                  ),
                  array(
                    "type" => "textfield",
                    "holder" => "div",
                    "heading" => esc_html__("Button Text", 'droit-wbpakery-addons'),
                    "param_name" => "dt_pricing_button_text",
                  ),
                  array(
                    "type" => "vc_link",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_html__("Link", 'droit-wbpakery-addons'),
                    "param_name" => "dt_pricing_link",
                ),
                     
                ),
               ),
               array(
                'type' => 'param_group',
                'value' => '',
                "heading" => esc_html__("Droit Pricing Content 2", 'droit-wbpakery-addons'),
                'param_name' => 'droit_pricing_content_2',
                'dependency' => array(
                  'element' => 'dt_show_pricing_tab',
                  'value_not_equal_to' => 'simple',
                ),
                // Note params is mapped inside param-group:
                'params' => array(
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "heading" => esc_html__("Tag ", 'droit-wbpakery-addons'),
                        "param_name" => "dt_pricing_tag_2",

                      ),
                      array(
                        "type" => "textarea",
                        "holder" => "div",
                        "heading" => esc_html__("Title", 'droit-wbpakery-addons'),
                        "param_name" => "dt_pricing_title_2",

                      ),

                      array(
                        "type" => "textarea",
                        "holder" => "div",
                        "heading" => esc_html__("Sub Title", 'droit-wbpakery-addons'),
                        "param_name" => "dt_pricing_sub_title_2",

                      ),
                      array(
                        "type" => "textfield",
                        "holder" => "div",
                        "heading" => esc_html__("Price Symble", 'droit-wbpakery-addons'),
                        "param_name" => "dt_pricing_price_symble_2",

                      ),

                      array(
                        "type" => "textfield",
                        "holder" => "div",
                        "heading" => esc_html__("Price", 'droit-wbpakery-addons'),
                        "param_name" => "dt_pricing_price_2",

                      ),

                      array(
                        "type" => "textfield",
                        "holder" => "div",
                        "heading" => esc_html__("Price after", 'droit-wbpakery-addons'),
                        "param_name" => "dt_pricing_price_after_2",

                      ),

                      array(
                        "type" => "textfield",
                        "holder" => "div",
                        "heading" => esc_html__("Price type", 'droit-wbpakery-addons'),
                        "param_name" => "dt_pricing_price_type_2",

                      ),
                      array(
                        "type" => "textarea",
                        "holder" => "div",
                        "heading" => esc_html__("Price content", 'droit-wbpakery-addons'),
                        "param_name" => "dt_pricing_feature_list_2",

                      ),
                      array(
                        "type" => "textfield",
                        "holder" => "div",
                        "heading" => esc_html__("Button Text", 'droit-wbpakery-addons'),
                        "param_name" => "dt_pricing_button_text_2",
                      ),
                      array(
                        "type" => "vc_link",
                        "holder" => "div",
                        "class" => "",
                        "heading" => esc_html__("Link", 'droit-wbpakery-addons'),
                        "param_name" => "dt_pricing_link_2",
                    ),
                         
                  )),
                ),
        ) );
    }
    
    /*
     Header randaraing 
    */
    public function dt_pricing_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_show_pricing_tab' => '',
        'dt_pricing_tab_title' => '',
      ), $atts ) );
    

      $output = dt_template_part('pricing', null , $atts);
     
      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_pricing_loadCssAndJs() {
    //   wp_register_style( 'dt_extend_style', plugins_url('assets/droit-wbpakery-addons.css', __FILEesc_) );
    //   wp_enqueue_style( 'dt_extend_style' );

      // If you need any javascript files on front end, here is how you can load them.
      //wp_enqueue_script( 'droit-wbpakery-addons_js', plugins_url('assets/droit-wbpakery-addons.js', __FILE__), array('jquery') );
    }
}
// Finally initialize code
