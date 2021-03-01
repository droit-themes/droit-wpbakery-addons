<?php 
namespace shortcodes\dt_testimonial;

class dt_testimonial {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_testimonial' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_testimonial', array( $this, 'dt_testimonial_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_testimonial_loadCssAndJs' ) );
        add_action( 'front_enqueue_js', array( $this, 'dt_testimonial_loadCssAndJs' ) );
    }
 
    public function dt_testimonial() {
      
        vc_map( array(
            "name" => __("Droit Testimonial", 'droit-wbpakery-addons'),
            "description" => __("Droit Testimonial spacial button for your section", 'droit-wbpakery-addons'),
            "base" => "dt_testimonial",
            "controls" => "full",
            "icon" => plugins_url('assets/asterisk_yellow.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array_merge(array(
      
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title ', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_cunter_up_title',
                    'value'      => 'Testimonial'
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    "heading" => __("Droit Testimonial", 'droit-wbpakery-addons'),
                    'param_name' => 'droit_testimonial_content',
                    // Note params is mapped inside param-group:
                    'params' => array(
                        array(
                            "type" => "attach_image",
                            "holder" => "div",
                            "heading" => __("Image", 'droit-wbpakery-addons'),
                            "param_name" => "dt_ttm_img",
                        ),
                        array(
                          "type" => "textfield",
                          "holder" => "div",
                          "heading" => __("Name", 'droit-wbpakery-addons'),
                          "param_name" => "dt_ttm_author_name",
                        ),
                        array(
                            "type" => "textfield",
                            "holder" => "div",
                            "heading" => __("Designation", 'droit-wbpakery-addons'),
                            "param_name" => "dt_ttm_author_designation",
                          ),
                        array(
                          "type" => "textarea",
                          "holder" => "div",
                          "heading" => __("Comemnt", 'droit-wbpakery-addons'),
                          "param_name" => "dt_ttm_auther_comment",
                        ),
                )),
            ), vc_typography_selections('Title', 'title'), vc_typography_selections('Review', 'review'), vc_typography_selections('Author Name', 'authoer'), vc_typography_selections('Designation', 'designation')),
        ) );
    }
    
    /*
     Header randaraing 
    */
    public function dt_testimonial_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_cunter_up_title' => 'Discover more about Rave',
        'dt_cunter_up_number' => '30295',
      ), $atts ) );
     
      $output = dt_template_part('testimonial', null , $atts);
     
      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_testimonial_loadCssAndJs() {
      wp_register_style( 'dt_extend_style', plugins_url('assets/droit-wbpakery-addons.css', __FILE__) );
      wp_enqueue_script('slick');
      wp_enqueue_script('droit-wpbakery-addons-script');
    }
}
// Finally initialize code
