<?php 
namespace shortcodes\dt_iconlist;

class dt_iconlist {
    
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
            "icon" => DROIT_WPBAKERY_ADDONS_ASSETS_URL_PATH.'/img/icon.png', // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array_merge(array(

                // ================ Select Style ==================== //
                array(
                    'type' => 'dropdown',
                    'heading' => __( 'Style',  "droit-wbpakery-addons" ),
                    'param_name' => 'style',
                    'default' => '1',
                    'value' => array(
                        esc_html__( 'Style 1',  "droit-wbpakery-addons"  ) => '1',
                        esc_html__( 'Style 2',  "droit-wbpakery-addons"  ) => '2',
                        esc_html__( 'Style 3',  "droit-wbpakery-addons"  ) => '3',
                    ),
                ), // End Style

                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "heading" => __("Wrapper class ", 'droit-wbpakery-addons'),
                    "param_name" => "dt_list_icon_wrapper_class",
                    'dependency' => array(
                        'element' => 'style',
                        'value_not_equal_to' => [ '2', '3']
                    ),
                ),

                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "heading" => __("Icon margin right ", 'droit-wbpakery-addons'),
                    "param_name" => "dt_list_icon_mr",
                    'group' => __( 'Design Option', 'droit-wbpakery-addons' ),
                    'edit_field_class' => 'vc_col-sm-4',
                    'dependency' => array(
                        'element' => 'style',
                        'value_not_equal_to' => [ '2', '3']
                    ),
                ),

                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "heading" => __("Icon Font size ", 'droit-wbpakery-addons'),
                    "param_name" => "dt_list_icon_font_size",
                    'group' => __( 'Design Option', 'droit-wbpakery-addons' ),
                    'edit_field_class' => 'vc_col-sm-4',
                    'dependency' => array(
                        'element' => 'style',
                        'value_not_equal_to' => [ '2', '3']
                    ),
                ),

                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "heading" => __("Icon color ", 'droit-wbpakery-addons'),
                    "param_name" => "dt_list_icon_color",
                    'group' => __( 'Design Option', 'droit-wbpakery-addons' ),
                    'edit_field_class' => 'vc_col-sm-4',
                    'dependency' => array(
                        'element' => 'style',
                        'value_not_equal_to' => [ '2', '3']
                    ),
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
                    'dependency' => array(
                        'element' => 'style',
                        'value_not_equal_to' => [ '2', '3']
                    ),
                ),

                // ================ Style 01 ======================== //
                array(
                    'type' => 'param_group',
                    'value' => '',
                    "heading" => __("Droit list with icon ", 'droit-wbpakery-addons'),
                    'param_name' => 'droit_iconlist',
                    'dependency' => array(
                          'element' => 'style',
                          'value_not_equal_to' => [ '2', '3' ],
                    ),
                    'params' => array_merge(vc_iconfont_selections(), array(
                        array(
                            "type" => "textfield",
                            "holder" => "div",
                            "heading" => __("Text ", 'droit-wbpakery-addons'),
                            "param_name" => "dt_list_icon_text",
                        ),
                    )),
                ), //End Style 02

                // ================ Style 02 ======================== //
                array(
                    'type' => 'param_group',
                    'value' => '',
                    "heading" => __("Droit list Item ", 'droit-wbpakery-addons'),
                    'param_name' => 'droit_list_items',
                    'dependency' => array(
                        'element' => 'style',
                        'value_not_equal_to' =>  [ '1', '3' ]
                    ),
                    'params' => array_merge( array(
                        array(
                            "type" => "textfield",
                            "holder" => "div",
                            "heading" => __("Text ", 'droit-wbpakery-addons'),
                            "param_name" => "list_item",
                        ),
                    ))
                ), //End Style 02

                // ================ Style 03 ======================== //
                array(
                    'type' => 'param_group',
                    'value' => '',
                    "heading" => __( 'list Item 02', 'droit-wbpakery-addons'),
                    'param_name' => 'droit_list_items2',
                    'dependency' => array(
                        'element' => 'style',
                        'value_not_equal_to' =>  [ '1', '2' ]
                    ),
                    'params' => array_merge( array(

                        //========================== Group Fields ======================= //
                        array(
                            'type' => 'textfield',
                            'heading' => __( 'Date', 'droit-wbpakery-addons' ),
                            'param_name' => 'date',
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => __( 'Title', 'droit-wbpakery-addons' ),
                            'param_name' => 'title',
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => __( 'Website Title', 'droit-wbpakery-addons' ),
                            'param_name' => 'website_title',
                        ),
                        array(
                            'type' => 'vc_link',
                            'heading' => __( 'Link', 'droit-wbpakery-addons' ),
                            'param_name' => 'link',
                        ),

                    ))
                ) //End Style 02


                
            ), vc_typography_selections('Icon Box Text', 'dt_list_icon'))
        ));
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

        $template_style = 1;

        if($atts['style'] != '') {
            $template_style = $atts['style'];
        }

        $output = dt_template_part('iconlist', $template_style , $atts);

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
