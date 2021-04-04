<?php 
namespace shortcodes\dt_card;

class dt_card {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_card' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_card', array( $this, 'dt_card_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_card_loadCssAndJs' ) );
    }
 
    public function dt_card() {
      
        vc_map( array(
            "name" => __("Droit Card", 'droit-wbpakery-addons'),
            "description" => __("Droi Card spacial card for your section", 'droit-wbpakery-addons'),
            "base" => "dt_card",
            "class" => "",
            "controls" => "full",
            "icon" => DROIT_WPBAKERY_ADDONS_ASSETS_URL_PATH.'/img/icon.png', // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array_merge(array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_card_title',
                    'edit_field_class' => 'vc_col-sm-6',
                ),
               
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Sub Title', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_card_subtitle_title',
                    'edit_field_class' => 'vc_col-sm-6',
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'URL (Link)', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_card_link',
                    'description' => esc_html__( 'Add link.', 'droit-wbpakery-addons' ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__( 'Hover Color', 'droit-wbpakery-addons' ),
                    'param_name' => 'dt_card_color',
                    'description' => esc_html__( 'Color.', 'droit-wbpakery-addons' ),
                    'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
                    'edit_field_class' => 'vc_col-sm-2',
                ),

            ), vc_iconfont_selections('dt_card'), vc_typography_selections('Card Title', 'dt_card_title'), vc_typography_selections('Card Sub Title', 'dt_card_sub_title')
            )) );
    }
    
    /*
     Header randaraing 
    */
    public function dt_card_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_card_title' => 'Title',
      ), $atts ) );
     

      $output = dt_template_part('card', null , $atts);
     
      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_card_loadCssAndJs() {

        wp_register_style( 'dt-card-css', plugins_url('assets/css/card.css', __FILE__) );
    }
}
// Finally initialize code
