<?php 
namespace shortcodes\dt_hero;

class dt_hero {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_hero' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_hero', array( $this, 'dt_hero_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_hero_loadCssAndJs' ) );
    }
 
    public function dt_hero() {
      
        vc_map( array(
            "name" => __("Droit Hero Section", 'droit-wbpakery-addons'),
            "description" => __("Droi Hero Section", 'droit-wbpakery-addons'),
            "base" => "dt_hero",
            "class" => "",
            "controls" => "full",
            "icon" => DROIT_WPBAKERY_ADDONS_ASSETS_URL_PATH.'/img/icon.png', // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array_merge(array(
                array(
                    'type' => 'dropdown',
                    'heading' => __( 'Testimonial Style',  "droit-wbpakery-addons" ),
                    'param_name' => 'dt_hero_style',
                    'default' => '1',
                    'value' => array(
                      esc_html__( 'Select Style',  "droit-wbpakery-addons"  ) => '',
                      esc_html__( 'Style 1',  "droit-wbpakery-addons"  ) => '1',
                      esc_html__( 'Style 2',  "droit-wbpakery-addons"  ) => '2',
                    ),
                  ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__( 'Sub title ', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_hero_subtitle',
                    'css' => 'csstyle',
                    'dependency' => array(
                        'element' => 'dt_hero_style',
                        'value' => '1',
                      ),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__( 'Title', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_hero_title',
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__( 'Description', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_hero_description',
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Image', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_hero_image',
                    'edit_field_class' => 'vc_col-sm-6',
                  ),
                  array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Triangle overly Color 1', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_te_overly_color_1',
                    'description' => esc_html__( 'Triangle overly Color.', 'droit-wbpakery-addons' ),
                    'edit_field_class' => 'vc_col-sm-7',
                    'dependency' => array(
                        'element' => 'dt_hero_style',
                        'value' => '2',
                      ),
                ),  
                  array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Triangle overly Color 2', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_te_overly_color_2',
                    'description' => esc_html__( 'Triangle overly Color.', 'droit-wbpakery-addons' ),
                    'edit_field_class' => 'vc_col-sm-5',
                    'dependency' => array(
                        'element' => 'dt_hero_style',
                        'value' => '2',
                      ),
                ),  
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Image Vertical Postion', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_hero_img_pos',
                    'edit_field_class' => 'vc_col-sm-6',
                    'dependency' => array(
                        'element' => 'dt_hero_style',
                        'value' => '1',
                      ),
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Animated image', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_hero_animate_image',
                    'edit_field_class' => 'vc_col-sm-6',
                    'dependency' => array(
                        'element' => 'dt_hero_style',
                        'value' => '1',
                      ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Backgroud Color', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_backgroud_color',
                    'description' => esc_html__( 'Font Color.', 'droit-wbpakery-addons' ),
                    'edit_field_class' => 'vc_col-sm-3',
                    'dependency' => array(
                        'element' => 'dt_hero_style',
                        'value' => '1',
                      ),
                ),
            ), dt_button_control('hero'), vc_typography_selections('Hero title', 'hero_title'), vc_typography_selections('Hero Sub Title', 'hero_subtitle'), vc_typography_selections('Hero description', 'hero_description')),
         
        ));
    }
    
    /*
     Header randaraing 
    */
    public function dt_hero_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_backgroud_color' => '',
        'dt_carosuel_title'     => '',
        'dt_client_logo_style_list' => 1
      ), $atts ) );

      
    $template_style = 1;

    if($atts['dt_hero_style'] != '') {
      $template_style = $atts['dt_hero_style'];
    }
    
      $output = dt_template_part('hero', $template_style , $atts);
     
      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_hero_loadCssAndJs() {
      wp_register_style( 'dt_extend_style', plugins_url('assets/droit-wbpakery-addons.css', __FILE__) );
      wp_enqueue_style( 'slick' );
      wp_enqueue_style( 'slick-theme' );

      // If you need any javascript files on front end, here is how you can load them.
      //wp_enqueue_script( 'droit-wbpakery-addons_js', plugins_url('assets/droit-wbpakery-addons.js', __FILE__), array('jquery') );
    }
}
// Finally initialize code
