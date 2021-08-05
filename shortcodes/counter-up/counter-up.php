<?php 
namespace shortcodes\dt_counter_up;

class dt_counter_up {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_counter_up' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_counter_up', array( $this, 'dt_counter_up_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_counter_up_loadCssAndJs' ) );
    }
 
    public function dt_counter_up() {
      
        vc_map( array(
            'name' => __('Droit Counter Up', 'droit-wbpakery-addons'),
            'description' => __('Droit Counter Up spacial button for your section', 'droit-wbpakery-addons'),
            'base' => 'dt_counter_up',
            'class' => "",
            'controls' => 'full',
            'icon' => DROIT_WPBAKERY_ADDONS_ASSETS_URL_PATH.'/img/icon.png', // or css class name which you can reffer in your css file later. Example: 'droit-wbpakery-addons_my_class'
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            'params' => array_merge(array(
      
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title ', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_cunter_up_title',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Counter Number', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_cunter_up_number',
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__( 'Suffix', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_cunter_up_suffix',
                ),
            ), vc_typography_selections('Title', 'title'), vc_typography_selections('Counter Number', 'number')),
        ) );
    }
    
    /*
     Header randaraing 
    */
    public function dt_counter_up_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_cunter_up_title' => 'Discover more about Rave',
        'dt_cunter_up_number' => '30295',
        'dt_cunter_up_suffix' => '',
      ), $atts, $content ) );
     
      $output = dt_template_part('counter-up', null , $atts);
     
      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_counter_up_loadCssAndJs() {
      wp_register_style( 'dt_extend_style', plugins_url('assets/droit-wbpakery-addons.css', __FILE__) );
    }
}
// Finally initialize code
