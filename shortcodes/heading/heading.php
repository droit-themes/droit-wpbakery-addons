<?php 
namespace shortcodes\dt_heading;

class dt_heading {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_heading' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_heading', array( $this, 'dt_heading_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_heading_loadCssAndJs' ) );
    }
 
    public function dt_heading() {
      
        vc_map( array(
            "name" => __("Droit Heading", 'droit-wbpakery-addons'),
            "description" => __("Droi droit spacial heading for your section", 'droit-wbpakery-addons'),
            "base" => "dt_heading",
            "class" => "",
            "controls" => "full",
            "icon" => plugins_url('assets/asterisk_yellow.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array(
                array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Sub title", 'droit-wbpakery-addons'),
                  "param_name" => "dt_subtitle",
                  "value" => __("Sub title", 'droit-wbpakery-addons'),
                  "description" => __("Sub title .", 'droit-wbpakery-addons')
              ),
              array(
                  "type" => "colorpicker",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Sub title Color", 'droit-wbpakery-addons'),
                  "param_name" => "dt_sub_title_color",
                  "value" => '#FF0000', 
                  "description" => __("Choose text color", 'droit-wbpakery-addons'),
                  'group' => __( 'Design options', 'droit-wbpakery-addons' ),

              ),
              array(
                  "type" => "css_editor",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Sub title Color", 'droit-wbpakery-addons'),
                  "param_name" => "css",
                  "value" => '#FF0000', 
                  "description" => __("Choose text color", 'droit-wbpakery-addons'),
                  'group' => __( 'Design options', 'droit-wbpakery-addons' ),

              ),
              array(
                "type" => "css_editor",
                "holder" => "div",
                "class" => "",
                "heading" => __("Sub title Color", 'droit-wbpakery-addons'),
                "param_name" => "css2",
                "value" => '#FF0000', 
                "description" => __("Choose text color", 'droit-wbpakery-addons'),
                'group' => __( 'Design options', 'droit-wbpakery-addons' ),

            ),
              array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Title", 'droit-wbpakery-addons'),
                  "param_name" => "dt_title",
                  "value" => __("<p>I am test text block. Click edit button to change this text.</p>", 'droit-wbpakery-addons'),
                  "description" => __("Enter your content.", 'droit-wbpakery-addons')
              ),
              array(
                  "type" => "textarea_html",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Title Description", 'droit-wbpakery-addons'),
                  "param_name" => "dt_title_description",
                  "value" => __("<p>I am test text block. Click edit button to change this text.</p>", 'droit-wbpakery-addons'),
                  "description" => __("Enter your description.", 'droit-wbpakery-addons')
              ),
            )
        ) );
    }
    
    /*
     Header randaraing 
    */
    public function dt_heading_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_subtitle' => '',
        'dt_title_description' => '',
        'dt_title' => '',
        'css' => '',
        'dt_sub_title_color'=> '',
      ), $atts ) );
     
      $output = dt_template_part('heading', null , $atts);
     
      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_heading_loadCssAndJs() {
      wp_register_style( 'dt_extend_style', plugins_url('assets/droit-wbpakery-addons.css', __FILE__) );
      wp_enqueue_style( 'dt_extend_style' );

      // If you need any javascript files on front end, here is how you can load them.
      //wp_enqueue_script( 'droit-wbpakery-addons_js', plugins_url('assets/droit-wbpakery-addons.js', __FILE__), array('jquery') );
    }
}
// Finally initialize code
