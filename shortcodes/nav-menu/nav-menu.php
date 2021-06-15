<?php 
namespace shortcodes\dt_nav_menu;

class dt_nav_menu {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_nav_menu' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_nav_menu', array( $this, 'dt_nav_menu_render' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_nav_menu_loadCssAndJs' ) );
        add_action( 'front_enqueue_js', array( $this, 'dt_nav_menu_loadCssAndJs' ) );
    }
 
    public function dt_nav_menu() {
      
        vc_map( array(
            "name" => __("Droit Nav Menu", 'droit-wbpakery-addons'),
            "description" => __("Droit Nav Menu spacial button for your section", 'droit-wbpakery-addons'),
            "base" => "dt_nav_menu",
            "controls" => "full",
            "icon" => DROIT_WPBAKERY_ADDONS_ASSETS_URL_PATH.'/img/icon.png', // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array_merge(array(
                array(
                    'type' => 'dropdown',
                    'heading' => __( 'Select Menu',  "droit-wbpakery-addons" ),
                    'param_name' => 'dt_nav_menu_style',
                    'default' => '',
                    'value' => $this->get_nav_menus(),
                ),

                array(
                    'type' => 'dropdown',
                    'heading' => __( 'Menu Alignment',  "droit-wbpakery-addons" ),
                    'param_name' => 'dt_menu_alignment',
                    'default' => '',
                    'value' => array(
                        __( 'Left', 'droit-wbpakery-addons' )   => 'start',
                        __( 'Center', 'droit-wbpakery-addons' ) => 'center',
                        __( 'Right', 'droit-wbpakery-addons' )  => 'end',
                    ),
                ),

                array(
                    'type' => 'dropdown',
                    'heading' => __( 'Menu Style',  "droit-wbpakery-addons" ),
                    'param_name' => 'dt_menu_style',
                    'default' => 'menu_horizontal',
                    'value' => array(
                        __( 'Vertical Menu', 'droit-wbpakery-addons' )   => 'menu_vertical',
                        __( 'Horizontal Menu', 'droit-wbpakery-addons' ) => 'menu_horizontal',
                    ),
                ),
                 array(
                     "type" => "colorpicker",
                     "holder" => "div",
                     "class" => "",
                     "heading" => esc_html__("Menu Color", 'droit-wbpakery-addons'),
                     "param_name" => "dt_menu_color",
                     "value" => '',
                     "description" => esc_html__("Choose Menu color", 'droit-wbpakery-addons'),
                     'group' => esc_html__( 'Style', 'droit-wbpakery-addons' ),
                 ),
                array(
                     "type" => "colorpicker",
                     "holder" => "div",
                     "class" => "",
                     "heading" => esc_html__("Menu Hover Color", 'droit-wbpakery-addons'),
                     "param_name" => "dt_menu_hover_color",
                     "value" => '',
                     "description" => esc_html__("Choose Menu Hover color", 'droit-wbpakery-addons'),
                     'group' => esc_html__( 'Style', 'droit-wbpakery-addons' ),
                 ),
                array(
                     "type" => "colorpicker",
                     "holder" => "div",
                     "class" => "",
                     "heading" => esc_html__("Sticky Menu Color", 'droit-wbpakery-addons'),
                     "param_name" => "dt_st_menu_color",
                     "value" => '',
                     "description" => esc_html__("Choose Sticky Menu color", 'droit-wbpakery-addons'),
                     'group' => esc_html__( 'Style', 'droit-wbpakery-addons' ),
                 ),
                array(
                     "type" => "colorpicker",
                     "holder" => "div",
                     "class" => "",
                     "heading" => esc_html__("Sticky Menu Hover Color", 'droit-wbpakery-addons'),
                     "param_name" => "dt_st_menu_hover_color",
                     "value" => '',
                     "description" => esc_html__("Choose Sticky Menu Hover color", 'droit-wbpakery-addons'),
                     'group' => esc_html__( 'Style', 'droit-wbpakery-addons' ),
                 ),
                array(
                    "type"     => "textfield",
                    "holder"   => "div",
                    "class"    => "",
                    "heading"  => esc_html__("Menu Item Margin", 'droit-wbpakery-addons'),
                    "param_name" => "dt_menu_item_margin",
                    "value"    => '',
                    "description" => esc_html__("Menu item margin support 4 value (top right bottom left)", 'droit-wbpakery-addons'),
                    "group"    => esc_html__( 'Style', 'droit-wbpakery-addons' )
                ),
                array(
                    "type"     => "textfield",
                    "holder"   => "div",
                    "class"    => "",
                    "heading"  => esc_html__("Menu Item Padding", 'droit-wbpakery-addons'),
                    "param_name" => "dt_menu_item_padding",
                    "value"    => '',
                    "description" => esc_html__("Menu item padding support 4 value (top right bottom left)", 'droit-wbpakery-addons'),
                    "group"    => esc_html__( 'Style', 'droit-wbpakery-addons' )
                ),

                // Sub Menu style ============================
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_html__("Submenu Color", 'droit-wbpakery-addons'),
                    "param_name" => "dt_submenu_color",
                    "value" => '',
                    "description" => esc_html__("Choose Submenu color", 'droit-wbpakery-addons'),
                    'group' => esc_html__( 'Submenu Style', 'droit-wbpakery-addons' ),
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_html__("Submenu Background Color", 'droit-wbpakery-addons'),
                    "param_name" => "dt_submenu_bg_color",
                    "value" => '',
                    "description" => esc_html__("Choose Submenu Background color", 'droit-wbpakery-addons'),
                    'group' => esc_html__( 'Submenu Style', 'droit-wbpakery-addons' ),
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_html__("Submenu Hover Color", 'droit-wbpakery-addons'),
                    "param_name" => "dt_submenu_hover_color",
                    "value" => '',
                    "description" => esc_html__("Choose Submenu Hover color", 'droit-wbpakery-addons'),
                    'group' => esc_html__( 'Submenu Style', 'droit-wbpakery-addons' ),
                ),
                array(
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_html__("Submenu Hover Background Color", 'droit-wbpakery-addons'),
                    "param_name" => "dt_submenu_hover_bg_color",
                    "value" => '',
                    "description" => esc_html__("Choose Submenu Hover Background color", 'droit-wbpakery-addons'),
                    'group' => esc_html__( 'Submenu Style', 'droit-wbpakery-addons' ),
                ),
                array(
                    "type"     => "textfield",
                    "holder"   => "div",
                    "class"    => "",
                    "heading"  => esc_html__("Submenu Item Margin", 'droit-wbpakery-addons'),
                    "param_name" => "dt_submenu_item_margin",
                    "value"    => '',
                    "description" => esc_html__("Submenu item margin support 4 value (top right bottom left)", 'droit-wbpakery-addons'),
                    "group"    => esc_html__( 'Submenu Style', 'droit-wbpakery-addons' )
                ),
                array(
                    "type"     => "textfield",
                    "holder"   => "div",
                    "class"    => "",
                    "heading"  => esc_html__("Submenu Item Padding", 'droit-wbpakery-addons'),
                    "param_name" => "dt_submenu_item_padding",
                    "value"    => '',
                    "description" => esc_html__("Menu item padding support 4 value (top right bottom left)", 'droit-wbpakery-addons'),
                    "group"    => esc_html__( 'Submenu Style', 'droit-wbpakery-addons' )
                ),


            ), vc_typography_selections('Menu Item', 'menu_color')),
        ) );
    }
    
    public function get_nav_menus() {
        $nav_menus = wp_get_nav_menus();
        $navMenu = [];
        if (is_array($nav_menus) && '' != $nav_menus) {

            foreach ( $nav_menus as $nav_menu) {

                $navMenu[$nav_menu->term_id] = $nav_menu->name;

            }
            return array_flip($navMenu);
        }
        return ['0' => __('Create Nav Menu', 'droit-wbpakery-addons' ) ];
    }

    /*
     *  Menu Render
     */
    public function dt_nav_menu_render( $atts, $content = null ) {

        extract( shortcode_atts( array(
            'dt_nav_menu_style'         => '',
            'dt_menu_alignment'         => '',
            'dt_menu_style'             => '',
            'dt_menu_color'             => '',
            'dt_menu_hover_color'       => '',
            'dt_st_menu_color'          => '',
            'dt_st_menu_hover_color'    => '',
            'dt_menu_item_margin'       => '',
            'dt_menu_item_padding'      => '',
            'dt_submenu_color'          => '',
            'dt_submenu_bg_color'       => '',
            'dt_submenu_hover_color'    => '',
            'dt_submenu_hover_bg_color' => '',
            'dt_submenu_item_margin'    => '',
            'dt_submenu_item_padding'   => '',

        ), $atts ) );


        $output = dt_template_part('nav-menu', null , $atts);
        return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_nav_menu_loadCssAndJs() {
      wp_register_style( 'dt_extend_style', plugins_url('assets/droit-wbpakery-addons.css', __FILE__) );
      wp_enqueue_script('droit-wpbakery-addons-script');
    }
}
// Finally initialize code
