<?php 
namespace shortcodes\dt_button;

class dt_button {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_button' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_button', array( $this, 'dt_button_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_button_loadCssAndJs' ) );
    }
 
    public function dt_button() {
      
        vc_map( array(
            "name" => __("Droit button", 'droit-wbpakery-addons'),
            "description" => __("Droi droit spacial button for your section", 'droit-wbpakery-addons'),
            "base" => "dt_button",
            "class" => "",
            "controls" => "full",
            "icon" => plugins_url('assets/asterisk_yellow.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Text', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_btn_text',
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'URL (Link)', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_button_link',
                    'description' => esc_html__( 'Add link to button.', 'droit-wbpakery-addons' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Color', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_button_color',
                    'description' => esc_html__( 'Color.', 'droit-wbpakery-addons' ),
                    'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
                    'edit_field_class' => 'vc_col-sm-2',
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Hover Color', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_btn_hover_color_with_border',
                    'description' => esc_html__( 'Hover Color.', 'droit-wbpakery-addons' ),
                    'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
                    'edit_field_class' => 'vc_col-sm-2',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Font Size', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_btn_font_size',
                    'edit_field_class' => 'vc_col-sm-4',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Font Size icon', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_btn_icon_font_size',
                    'edit_field_class' => 'vc_col-sm-4',
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__( 'Select Icon  ', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_btn_icon_selector',
                ),
            )
        ) );
    }
    
    /*
     Header randaraing 
    */
    public function dt_button_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_btn_text' => 'Discover more about Rave',
      ), $atts ) );
     
      $output = dt_template_part('button', null , $atts);
     
      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_button_loadCssAndJs() {
      wp_register_style( 'dt_extend_style', plugins_url('assets/droit-wbpakery-addons.css', __FILE__) );

      // If you need any javascript files on front end, here is how you can load them.
      //wp_enqueue_script( 'droit-wbpakery-addons_js', plugins_url('assets/droit-wbpakery-addons.js', __FILE__), array('jquery') );
    }
}
// Finally initialize code
