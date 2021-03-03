<?php 
namespace shortcodes\dt_portfolio;

class dt_portfolio {
    
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'dt_portfolio' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'dt_portfolio', array( $this, 'dt_portfolio_rander' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'dt_portfolio_loadCssAndJs' ) );
        add_action( 'front_enqueue_js', array( $this, 'dt_portfolio_loadCssAndJs' ) );
    }
 
    public function dt_portfolio() {
      
        vc_map( array(
            "name" => __("Droit Portfolio", 'droit-wbpakery-addons'),
            "description" => __("Droit Portfolio spacial button for your section", 'droit-wbpakery-addons'),
            "base" => "dt_portfolio",
            "controls" => "full",
            "icon" => plugins_url('assets/asterisk_yellow.png', __FILE__), // or css class name which you can reffer in your css file later. Example: "droit-wbpakery-addons_my_class"
            'category' => esc_html__( 'Droit', 'droit-wbpakery-addons' ),
            "params" => array_merge(array(
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
    public function dt_portfolio_rander( $atts, $content = null ) {

      extract( shortcode_atts( array(
        'dt_select_protflow_orderby' => '',
      ), $atts ) );
     
      $output = dt_template_part('portfolio', null , $atts);
     
      return $output;
      
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function dt_portfolio_loadCssAndJs() {
      wp_register_style( 'dt_extend_style', plugins_url('assets/droit-wbpakery-addons.css', __FILE__) );
      wp_enqueue_script('slick');
      wp_enqueue_script('droit-wpbakery-addons-script');
    }
}
// Finally initialize code
