<?php 
namespace shortcodes\dt_banner;

class dt_banner {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_banner' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_banner', array( $this, 'dt_banner_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_banner_loadCssAndJs' ) );
    }
 
    public function dt_banner() {
      
        vc_map( array(
            "name" => __("Droit Banner", 'droit-wbpakery-addons'),
            "description" => __("Droi droit spacial Banner for your section", 'droit-wbpakery-addons'),
            "base" => "dt_banner",
            "class" => "",
            "controls" => "full",
            "icon" => DROIT_WPBAKERY_ADDONS_ASSETS_URL_PATH.'/img/icon.png', // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array(

                array(
                    "type" => "attach_image",
                    "heading" => __("Banner Image", 'droit-wbpakery-addons'),
                    "param_name" => "dt_banner_image",
                ),

                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_banner_title',
                    'value' => 'Here at Rave, we work with stories & purpose.'
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Sub tile', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_banner_sub_title',
                    'value'   => 'As a leading digital agency in Paris, we look to engage with our clients beyond the conventional design and development agency relationship.'
                ),
                // array(
                //     'type' => 'dropdown',
                //     'heading' => __( 'Button Alignment',  "droit-wbpakery-addons" ),
                //     'param_name' => 'dt_banner_alignment',
                //     'default' => '',
                //     'value' => array(
                //         __( 'Left', 'droit-wbpakery-addons' )   => 'start',
                //         __( 'Center', 'droit-wbpakery-addons' ) => 'center',
                //         __( 'Right', 'droit-wbpakery-addons' )  => 'end',
                //     ),
                // ),

                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Title Color', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_banner_title_color',
                    'description' => esc_html__( 'Hover Color.', 'droit-wbpakery-addons' ),
                    'edit_field_class' => 'vc_col-sm-6',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title Font Size', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_banner_title_font_size',
                    'edit_field_class' => 'vc_col-sm-4',
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Sub title color', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_banner_sub_title_color',
                    'description' => esc_html__( 'Sub title color.', 'droit-wbpakery-addons' ),
                    'edit_field_class' => 'vc_col-sm-6',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Sub Title Font Size', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_banner_subtitle_font_size',
                    'edit_field_class' => 'vc_col-sm-4',
                ), 
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Content Background', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_banner_content_bg',
                    'description' => esc_html__( 'Content Background Color.', 'droit-wbpakery-addons' ),
                    'edit_field_class' => 'vc_col-sm-6',
                ),
                array(
                    "type" => "attach_image",
                    "heading" => __("Upload backgound Pattern", 'droit-wbpakery-addons'),
                    "param_name" => "dt_banner_bg_pattern_image",
                    'edit_field_class' => 'vc_col-sm-6',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Wrapper Custom Class', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_banner_wrapper_custom_class',
                ),
            )
        ) );
    }
    
    /*
     Header randaraing 
    */
    public function dt_banner_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_banner_image' => '',
        'dt_banner_title' =>  esc_html__('Here at Rave, we work with stories & purpose.', 'droit-wbpakery-addons'),
        'dt_banner_sub_title' => esc_html__( 'As a leading digital agency in Paris, we look to engage with our clients beyond the conventional design and development agency relationship.', 'droit-wbpakery-addons' ),
       'dt_banner_bg_pattern_image' => '',
       'dt_banner_content_bg' => '',
       'dt_banner_title_color' => '',
       'dt_banner_title_font_size' => '',
       'dt_banner_sub_title' => '',
       'dt_banner_subtitle_font_size' => '',
       'dt_banner_bg_pattern_image' => '',
       'dt_banner_wrapper_custom_class' => '',
    ), $atts ) );
     
      $output = dt_template_part('banner', null , $atts);
     
      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_banner_loadCssAndJs() {
      wp_register_style( 'dt_extend_style', plugins_url('assets/droit-wbpakery-addons.css', __FILE__) );

    }
}
// Finally initialize code
