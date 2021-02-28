<?php 
namespace shortcodes\dt_scroll_to_section;

class dt_scroll_to_section {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_scroll_to_section' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_scroll_to_section', array( $this, 'dt_scroll_to_section_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_scroll_to_section_loadCssAndJs' ) );
    }
 
    public function dt_scroll_to_section() {
      
        vc_map( array(
            "name" => __("Droit Scroll To Section", 'droit-wbpakery-addons'),
            "description" => __("Droi scroll to section", 'droit-wbpakery-addons'),
            "base" => "dt_scroll_to_section",
            "class" => "",
            "controls" => "full",
            "icon" => plugins_url('assets/asterisk_yellow.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array(
           
              array(
                  "type" => "textfield",
                  "holder" => "span",
                  "heading" => __("Button Text", 'droit-wbpakery-addons'),
                  "param_name" => "dt_scroll_to_section_btn",
                  "description" => __("Scroll to section button text.", 'droit-wbpakery-addons')
              ),
              array(
                "type" => "textfield",
                "holder" => "span",
                "heading" => __("Scroll Section Id", 'droit-wbpakery-addons'),
                "param_name" => "dt_scroll_to_section_id",
                "description" => __("Section Id  to scroll.", 'droit-wbpakery-addons')
            ),
              array(
                  "type" => "iconpicker",
                  "holder" => "div",
                  "class" => "dt-icon",
                  "heading" => __("Select Icon", 'droit-wbpakery-addons'),
                  "param_name" => "dt__scroll_to_section_icon",
              ),
              
              array(
                  "type" => "colorpicker",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Color", 'droit-wbpakery-addons'),
                  "param_name" => "dt_scroll_to_sction_color",
                  "description" => __("Choose text color", 'droit-wbpakery-addons'),
                  'group' => __( 'Design Options', 'droit-wbpakery-addons' ),

              ),
              array(
                "type" => "textfield",
                "holder" => "div",
                "heading" => __("Font Size", 'droit-wbpakery-addons'),
                "param_name" => "dt_scroll_to_font_size",
                "description" => __("font size eg: 24px .", 'droit-wbpakery-addons'),
                'group' => __( 'Design Options', 'droit-wbpakery-addons' ),
              ),
              array(
                "type" => "textfield",
                "holder" => "div",
                "heading" => __("Icon Font Size", 'droit-wbpakery-addons'),
                "param_name" => "dt_scroll_to_icon_size",
                "description" => __("Icon size eg: 24px .", 'droit-wbpakery-addons'),
                'group' => __( 'Design Options', 'droit-wbpakery-addons' ),
              ),
              array(
                "type" => "css_editor",
                "holder" => "div",
                "class" => "",
                "heading" => __("CSS Setting", 'droit-wbpakery-addons'),
                "param_name" => "scroll_to_section_css",
                "value" => '#FF0000', 
                'group' => __( 'Design Options', 'droit-wbpakery-addons' ),
            ),
              array(
                "type" => "textfield",
                "holder" => "div",
                "heading" => __("Element Class", 'droit-wbpakery-addons'),
                "param_name" => "dt_scroll_to_section_custon_class",
                "description" => __("Add a Custom Class", 'droit-wbpakery-addons'),
              ),


            )
        ) );
    }
    
    /*
     Header randaraing 
    */
    public function dt_scroll_to_section_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_scroll_to_section_text' => '',
        'css' => '',
        'dt_scroll_section_color'=> '',
      ), $atts ) );
     
      $output = dt_template_part('scroll-to-section', null , $atts);
     
      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_scroll_to_section_loadCssAndJs() {
      wp_register_style( 'dt_extend_style', plugins_url('assets/droit-wbpakery-addons.css', __FILE__) );

      // If you need any javascript files on front end, here is how you can load them.
      //wp_enqueue_script( 'droit-wbpakery-addons_js', plugins_url('assets/droit-wbpakery-addons.js', __FILE__), array('jquery') );
    }
}
// Finally initialize code
