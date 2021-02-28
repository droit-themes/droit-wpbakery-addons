<?php 
namespace shortcodes\dt_gallery;

class dt_gallery {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_gallery' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'gallery', array( $this, 'dt_gallery_rander' ) );
        add_shortcode( 'gallery_innter', array( $this, 'dt_gallery_rander_inner' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_gallery_loadCssAndJs' ) );
    }
 
    public function dt_gallery() {
      
        vc_map( array(
            "name" => __("Droit Gallery", 'droit-wbpakery-addons'),
            "description" => __("Droi droit spacial heading for your section", 'droit-wbpakery-addons'),
            "base" => "gallery",
            "as_parent" => array('only' => 'gallery_innter'),
            "class" => "",
            "controls" => "full",
            "is_container" => false,
            "icon" => plugins_url('assets/asterisk_yellow.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array(
               
              array(
                  "type" => "vc_link",
                  "holder" => "div",
                  "class" => "",
                  "heading" => __("Title Description", 'droit-wbpakery-addons'),
                  "param_name" => "dt_img_link",
                  "description" => __("Enter your description.", 'droit-wbpakery-addons')
              ),
              vc_map_add_css_animation(true),
            ),
            "js_view" => 'VcColumnView'
        ) );

        vc_map( array(
            "name" => __("Gallery Image", "my-text-domain"),
            "base" => "gallery_innter",
            "content_element" => false,
            "as_child" => array('only' => 'gallery'), // Use only|except attributes to limit parent (separate multiple values with comma)
            "params" => array(
            // add params same as with any other content element
                array(
                    "type" => "attach_image",
                    "holder" => "div",
                    "heading" => __("Image", 'droit-wbpakery-addons'),
                    "param_name" => "dt_gallery_img",
                ),
            )
          ) );

          
    }
    
    /*
     Header randaraing 
    */
    public function dt_gallery_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'el_class' => '',
        'dt_gallery_title' => '',
        'dt_title' => '',
        'dt_title_description' => '',
        'dt_img_link'=> '',
      ), $atts, $content ) );
     
       $output = dt_template_part('gallery', null , $atts, $content);
     
      return $output;
      
    }

    //  Image rander    

    public function dt_gallery_rander_inner( $atts, $content = null ) {

        extract( shortcode_atts( array(
          'dt_gallery_img' => '',
          'dt_gallery_title' => '',
          'dt_title' => '',
          'dt_title_description' => '',
          'dt_img_link'=> '',
        ), $atts, $content ) );
       
  
        $output = dt_template_part('gallery', '_innter' , $atts);
       // $output = "<h1>Hello</h1>";
       
        return $output;
        
      }
    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_gallery_loadCssAndJs() {
    //   wp_register_style( 'dt_extend_style', plugins_url('assets/droit-wbpakery-addons.css', __FILE__) );
    //   wp_enqueue_style( 'dt_extend_style' );

      // If you need any javascript files on front end, here is how you can load them.
      //wp_enqueue_script( 'droit-wbpakery-addons_js', plugins_url('assets/droit-wbpakery-addons.js', __FILE__), array('jquery') );
    }
}
