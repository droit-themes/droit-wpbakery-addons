<?php 
namespace shortcodes\dt_subscribe;

class dt_subscribe {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_subscribe' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_subscribe', array( $this, 'dt_subscribe_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_subscribe_loadCssAndJs' ) );
    }
 
    public function dt_subscribe() {
      
        vc_map( array(
            "name" => __("Droit Subscribe Form", 'droit-wbpakery-addons'),
            "description" => __("Droi droit spacial subscribe form for your section", 'droit-wbpakery-addons'),
            "base" => "dt_subscribe",
            "class" => "",
            "controls" => "full",
            "icon" => DROIT_WPBAKERY_ADDONS_ASSETS_URL_PATH.'/img/icon.png', // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array_merge(array(
           
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Select Style',  "droit-wbpakery-addons" ),
                    'param_name' => 'dt_subscribe_form_style',
                    'default' => '4',
                    'value' => array(
                      esc_html__( 'Style 1',  "droit-wbpakery-addons" ) => '1',
                      esc_html__( 'Style 2',  "droit-wbpakery-addons" )  => '2',
                      esc_html__( 'Style 3',  "droit-wbpakery-addons" )  => '3',
                      esc_html__( 'Style 4',  "droit-wbpakery-addons" )  => '4',
                      esc_html__( 'Style 5',  "droit-wbpakery-addons" )  => '5',
                    ),
                    'edit_field_class' => 'vc_col-sm-6',
                  ),
              
              array(
                "type" => "textfield",
                'edit_field_class' => 'vc_col-sm-6',
                "heading" => esc_html__("Action URL", 'droit-wbpakery-addons'),
                "param_name" => "dt_subscribe_form_action_url",
                "description" => __('Enter here your MailChimp action URL. <a href="https://goo.gl/k5a2tA" target="_blank"> How to </a>', 'droit-wbpakery-addons'),
              ),

              array(
                "type" => "textfield",
                "heading" => esc_html__("Placeholder Name", 'droit-wbpakery-addons'),
                "param_name" => "dt_subscribe_placeholder_name",
                'edit_field_class' => 'vc_col-sm-6',
                'value' => esc_html__('Full name*', 'droit-wbpakery-addons'),
                'dependency' => array(
                  'element' => 'dt_subscribe_form_style',
                  'value_not_equal_to' => array('1', '2', '5'),
                ),
              ),

              array(
                "type" => "textfield",
                "heading" => esc_html__("Placeholder Email", 'droit-wbpakery-addons'),
                "param_name" => "dt_subscribe_placeholder_email",
                'edit_field_class' => 'vc_col-sm-6',
                'value' => esc_html__('Email Address*', 'droit-wbpakery-addons'),
              ),

              array(
                "type" => "textfield",
                "heading" => esc_html__("Button Label", 'droit-wbpakery-addons'),
                "param_name" => "dt_subscribe_button_lable",
                'edit_field_class' => 'vc_col-sm-6',
                'value' => esc_html__('Give me Fun', 'droit-wbpakery-addons'),
                'dependency' => array(
                  'element' => 'dt_subscribe_form_style',
                  'value_not_equal_to' => array('2'),
                ),

              ),

            ), vc_iconfont_selections('subscribe'))
        ) );
    }
    
    /*
     Header randaraing 
    */
    public function dt_subscribe_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_subscribe_form_style' => 1,
        'dt_subscribe_form_action_url' => '',
        'dt_subscribe_placeholder_name' => 'Full name*',
        'dt_subscribe_placeholder_email' => 'Email Address*',
        'dt_subscribe_button_lable' => 'Give me Fun',
      ), $atts ) );

      $output = dt_template_part('subscribe', $dt_subscribe_form_style , $atts);
     
      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_subscribe_loadCssAndJs() {
      wp_enqueue_script('ajax-chimp');

      // If you need any javascript files on front end, here is how you can load them.
      //wp_enqueue_script( 'droit-wbpakery-addons_js', plugins_url('assets/droit-wbpakery-addons.js', __FILE__), array('jquery') );
    }
}
// Finally initialize code
