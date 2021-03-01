<?php 
namespace shortcodes\dt_team;

class dt_team {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_team' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_team', array( $this, 'dt_team_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_team_loadCssAndJs' ) );
        add_action( 'front_enqueue_js', array( $this, 'dt_team_loadCssAndJs' ) );
    }
 
    public function dt_team() {
      
        vc_map( array(
            "name" => __("Droit Team", 'droit-wbpakery-addons'),
            "description" => __("Droit Team spacial button for your section", 'droit-wbpakery-addons'),
            "base" => "dt_team",
            "controls" => "full",
            "icon" => plugins_url('assets/asterisk_yellow.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array(
      
                array(
                    'type' => 'param_group',
                    'value' => '',
                    "heading" => __("Droit Testimonial", 'droit-wbpakery-addons'),
                    'param_name' => 'droit_team_content',
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
                            "class" => "dt-title-font",
                            "heading" => __("Image Top Bottom Position", 'droit-wbpakery-addons'),
                            "param_name" => "dt_team_image_top_pos",
                          ),
                          array(
                            "type" => "textfield",
                            "holder" => "div",
                            "class" => "dt-title-font",
                            "heading" => __("Image Let Right Position", 'droit-wbpakery-addons'),
                            "param_name" => "dt_team_image_left_pos",
                          ),
                )),
            ),
        ) );
    }
    
    /*
     Header randaraing 
    */
    public function dt_team_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_cunter_up_title' => 'Discover more about Rave',
        'dt_cunter_up_number' => '30295',
      ), $atts ) );
     
      $output = dt_template_part('team', null , $atts);
     
      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_team_loadCssAndJs() {
      wp_register_style( 'dt_extend_style', plugins_url('assets/droit-wbpakery-addons.css', __FILE__) );
      wp_enqueue_script('slick');
      wp_enqueue_script('droit-wpbakery-addons-script');
    }
}
// Finally initialize code
