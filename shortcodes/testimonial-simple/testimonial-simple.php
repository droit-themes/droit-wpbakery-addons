<?php 
namespace shortcodes\dt_testimonial_simple;

class dt_testimonial_simple {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_testimonial_simple' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_testimonial_simple', array( $this, 'dt_testimonial_simple_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_testimonial_simple_loadCssAndJs' ) );
        add_action( 'front_enqueue_js', array( $this, 'dt_testimonial_simple_loadCssAndJs' ) );
    }
 
    public function dt_testimonial_simple() {
      
        vc_map( array(
            "name" => __("Droit Testimonial Simple", 'droit-wbpakery-addons'),
            "description" => __("Droit Testimonial spacial button for your section", 'droit-wbpakery-addons'),
            "base" => "dt_testimonial_simple",
            "controls" => "full",
            "icon" => DROIT_WPBAKERY_ADDONS_ASSETS_URL_PATH.'/img/icon.png', // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Author Image ', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_testimonial_s_autheor_img',
                    'edit_field_class' => 'vc_col-sm-4',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Author Designation ', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_testimonial_s_autheor_designation',
                    'edit_field_class' => 'vc_col-sm-8',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Author Name ', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_testimonial_s_autheor_name',
                    'edit_field_class' => 'vc_col-sm-6',
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__( 'Author Comments ', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_testimonial_s_comments',
                    'edit_field_class' => 'vc_col-sm-6',
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Icon Color ', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_testimonial_s_icon_color',
                    'edit_field_class' => 'vc_col-sm-6',
                ),

                array(
                    'type' => 'css_editor',
                    'heading' => esc_html__( 'Wrapper Setting', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_testimonial_s_wrapper_setting',
                    'group' => esc_html__( 'Wrapper Setting', 'droit-wbpakery-addons' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Element Classes', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_testimonial_simple_element_class',
                    'edit_field_class' => 'vc_col-sm-6',
                ),

            ),
        ) );
    }
    
    /*
     Header randaraing 
    */
    public function dt_testimonial_simple_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_cunter_up_title' => 'Discover more about Rave',
        'dt_cunter_up_number' => '30295',
        'dt_testimonial_simple_style' => '1'
      ), $atts ) );
     
      $output = dt_template_part('testimonial-simple', null , $atts);


      return $output;
      
    }
    
    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_testimonial_simple_loadCssAndJs() {
      wp_register_style( 'dt_extend_style', plugins_url('assets/droit-wbpakery-addons.css', __FILE__) );
    }
}
// Finally initialize code
