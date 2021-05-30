<?php 
namespace shortcodes\dt_nav_menu;

class dt_nav_menu {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_nav_menu' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_nav_menu', array( $this, 'dt_nav_menu_rander' ) );

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
                'heading' => __( 'Portfolio Style',  "droit-wbpakery-addons" ),
                'param_name' => 'dt_nav_menu_style',
                'default' => '1',
                'value' => array(
                  esc_html__( 'Style 01',  "droit-wbpakery-addons"  ) => '1',
                  esc_html__( 'Style 02 (Agency boxed)',  "droit-wbpakery-addons"  ) => '2',
                  esc_html__( 'Style 03 (Minimal boxed)',  "droit-wbpakery-addons"  ) => '3',
                  esc_html__( 'Style 04 (Classic boxed)',  "droit-wbpakery-addons"  ) => '4',
                  esc_html__( 'Style 05 (Creative boxed)',  "droit-wbpakery-addons"  ) => '5',
                  esc_html__( 'Style 06 (Classic Fullwidth)',  "droit-wbpakery-addons"  ) => '6',
                ),
              ),
              array(
                "type" => "textfield",
                "holder" => "div",
                "heading" => __("Title", 'droit-wbpakery-addons'),
                "param_name" => "dt_nav_menu_title",
                'default' => __("Our Work", 'droit-wbpakery-addons'),
              ),
              array(
                "type" => "textfield",
                "holder" => "div",
                "heading" => __("Sub Title", 'droit-wbpakery-addons'),
                "param_name" => "dt_nav_menu_sub_title",
                'default' => __("Risus commodo viverra maecenas<br> accumsan lacus ven dacises.", 'droit-wbpakery-addons'),
              ),
              array(
                "type" => "textfield",
                "holder" => "div",
                "heading" => __("Button Title", 'droit-wbpakery-addons'),
                "param_name" => "dt_nav_menu_button",
                'default' => __("Work with us", 'droit-wbpakery-addons'),
              ),
              array(
                "type" => "checkbox",
                "heading" => __( "Select Category", "droit-wbpakery-addons" ),
                "param_name" => "dt_category_dispaly",
                "value" => array(esc_html__('Yes', 'droit-wbpakery-addons') => 'yes'),
              ),   
              array(
                'type' => 'dropdown',
                'heading' => __( 'Select Category',  "droit-wbpakery-addons" ),
                'param_name' => 'dt_select_catagory',
                'default' => '',
                'value' => $this->getCategories(),
                'dependency'    => array(
                  'element'   => 'dt_category_dispaly',
                  'value'     => 'yes'
                  )              
              ),

              array(
                'type' => 'dropdown',
                'heading' => __( 'Order',  "droit-wbpakery-addons" ),
                'param_name' => 'dt_select_protflow_order',
                'default' => 'DESC',
                'value' => array(
                  esc_html__( 'ASC',  "droit-wbpakery-addons" ) => 'ASC',
                  esc_html__( 'DESC',  "droit-wbpakery-addons" )  => 'DESC',
                ),
              ),
              array(
                'type' => 'dropdown',
                'heading' => __( 'Order By',  "droit-wbpakery-addons" ),
                'param_name' => 'dt_select_protflow_orderby',
                'default' => 'none',
                'value' => array(
                   esc_html__( 'None',  "droit-wbpakery-addons" ) => 'none',
                   esc_html__( 'ID',  "droit-wbpakery-addons" ) =>  'ID',
                   esc_html__( 'Author',  "droit-wbpakery-addons" ) => 'author',
                   esc_html__( 'Title',  "droit-wbpakery-addons" ) => 'title',
                   esc_html__( 'Name',  "droit-wbpakery-addons" ) => 'name',
                   esc_html__( 'Type',  "droit-wbpakery-addons" ) => 'type',
                   esc_html__( 'Date',  "droit-wbpakery-addons" ) => 'date',
                   esc_html__( 'Modified',  "droit-wbpakery-addons" )=> 'modified',
                   esc_html__( 'Parent',  "droit-wbpakery-addons" )=>  'parent',
                   esc_html__( 'Rand',  "droit-wbpakery-addons" )  => 'rand',
                   esc_html__( 'Comment count',  "droit-wbpakery-addons" ) => 'comment_count',
                   esc_html__( 'Relevance',  "droit-wbpakery-addons" ) => 'relevance',
                   esc_html__( 'Menu order',  "droit-wbpakery-addons" ) => 'menu_order',
                ),
              ),
              array(
                "type" => "textfield",
                "holder" => "div",
                "heading" => __("Number Of Posts", 'droit-wbpakery-addons'),
                "param_name" => "dt_nav_menu_show_post",
                'default' => __("5", 'droit-wbpakery-addons'),
              ),

            ), vc_typography_selections('Title', 'title')),
        ) );
    }
    
    public function getCategories() {
      $terms = get_terms( array(
        'taxonomy'    => 'portfolio_cat',
        'hide_empty'  => false,
    ) );


    $cat_list = [];
    if(is_array($terms) && '' != $terms) :
    foreach($terms as $post) {

      //  remove Uncategorized from the list 

        if($post->name == 'Uncategorized') {

          continue;
        }

        $cat_list[$post->term_id]  = $post->name;
    
    }
   endif;
    return array_flip($cat_list);
    }

    /*
     Header randaraing 
    */
    public function dt_nav_menu_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_select_protflow_orderby' => '',
      ), $atts ) );
     
    
      $portfolio_style = vc_param_group_parse_atts($dt_nav_menu_style);

      if(!empty($atts['dt_nav_menu_style'])) {
        $portfolio_style = $atts['dt_nav_menu_style'];
      }

      $output = dt_template_part('portfolio', $portfolio_style , $atts);
     
      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_nav_menu_loadCssAndJs() {
      wp_register_style( 'dt_extend_style', plugins_url('assets/droit-wbpakery-addons.css', __FILE__) );
      wp_enqueue_script('slick');
      wp_enqueue_script('droit-wpbakery-addons-script');
    }
}
// Finally initialize code
