<?php 
namespace shortcodes\testwidgtds;

class testwidgets {
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'integrateWithVC' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'bartag', array( $this, 'renderMyBartag' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'loadCssAndJs' ) );
    }
 
    public function integrateWithVC() {
        // Check if WPBakery Page Builder is installed
      
 
        /*
        Add your WPBakery Page Builder logic here.
        Lets call vc_map function to "register" our custom shortcode within WPBakery Page Builder interface.

        More info: http://kb.wpbakery.com/index.php?title=Vc_map
        */
        vc_map( array(
            "name" => __("My Bar Shortcode", 'vc_extend'),
            "description" => __("Bar tag description text", 'vc_extend'),
            "base" => "bartag",
            "class" => "",
            "controls" => "full",
            "icon" => plugins_url('assets/asterisk_yellow.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            'category' => esc_html__( 'Droit', 'vc_extend' ),
            //'admin_enqueue_js' => array(plugins_url('assets/vc_extend.js', __FILE__)), // This will load js file in the VC backend editor
            //'admin_enqueue_css' => array(plugins_url('assets/vc_extend_admin.css', __FILE__)), // This will load css file in the VC backend editor
            "params" => array(
                array(
                  "type" => "textfield",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Text", 'vc_extend'),
                  "param_name" => "foo",
                  "value" => __("Default params value", 'vc_extend'),
                  "description" => __("Description for foo param.", 'vc_extend')
              ),
              array(
                  "type" => "colorpicker",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Text color", 'vc_extend'),
                  "param_name" => "color",
                  "value" => '#FF0000', //Default Red color
                  "description" => __("Choose text color", 'vc_extend')
              ),
              array(
                  "type" => "textarea_html",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Content", 'vc_extend'),
                  "param_name" => "content",
                  "value" => __("<p>I am test text block. Click edit button to change this text.</p>", 'vc_extend'),
                  "description" => __("Enter your content.", 'vc_extend')
              ),
            )
        ) );
    }
    
    /*
    Shortcode logic how it should be rendered
    */
    public function renderMyBartag( $atts, $content = null ) {
      extract( shortcode_atts( array(
        'foo' => 'something',
        'color' => '#FF0000'
      ), $atts ) );
      $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
     
      $output = "<div style='color:{$color};' data-foo='${foo}'>{$content}</div>";
      return $output;
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function loadCssAndJs() {
      wp_register_style( 'vc_extend_style', plugins_url('assets/vc_extend.css', __FILE__) );
      wp_enqueue_style( 'vc_extend_style' );

      // If you need any javascript files on front end, here is how you can load them.
      //wp_enqueue_script( 'vc_extend_js', plugins_url('assets/vc_extend.js', __FILE__), array('jquery') );
    }
}
// Finally initialize code
