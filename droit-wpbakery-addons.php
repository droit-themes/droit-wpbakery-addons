<?php 
/**
 * Plugin Name: Droit WPBakery Addons
 * Plugin URI: https://droitthemes.com/
 * Description: WordPress plugin which allows you to add Custom, flexible and fully responsive shortcodes. It is an addon for premium plugin WPBakery page builder. 
 * Version: 1.0
 * Author: DroitThemes
 * Author URI: https://themeforest.net/user/droitthemes/portfolio
 * Text domain: droit-wbpakery-addons  
 *License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if(!class_exists( 'Droit_WPBakery_Addons' )) {
	class Droit_WPBakery_Addons 
	{
		/**
		 * Singleton class
		 */
		private static $instance;
		
		/**
		 * Get the instance of Extensive_VC_Addon
		 *
		 * @return self
		 */
		public static function getInstance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}
			
			return self::$instance;
		}
		/**
		 * Constructor
		 */
		public function __construct () {

            include_once "core.php";
			add_action( 'plugins_loaded', [$this, 'init'] );
			add_action( 'plugins_loaded', [$this, 'shortcode_init'] );
			add_action( 'wp_enqueue_scripts', array( $this, 'droit_wpbakery_scripts' ) );
			add_action( 'vc_frontend_editor_enqueue_js_css', array( $this, 'droit_wpbakery_scripts' ) );

		}

		//  init plugin 

		function init() {
			
			if ( ( is_multisite() && is_network_admin() ) || ! is_multisite() ) {
				add_action( 'admin_init', array( $this, 'droit_display_admin_notice' ) );
			}
			$attributes = array(
				array(
					'type' => 'checkbox',
					'heading' => "Enable Dot Shap",
					'param_name' => 'dt_enable_dot_shap',
					'value' => array( 'Dot Shap' => 'Yes' ),
					'description' => __( "It will be apper section left side", "droit-wbpakery-addons" )
					),

				array(
				'type' => 'checkbox',
				'heading' => "Pulse Effect",
				'param_name' => 'pulse_effect',
				'value' => array( 'pulse' => 'Yes' ),
				'description' => __( "Enable Pulse Effect On Your Section", "droit-wbpakery-addons" )
				),

				array(
					'type' => 'checkbox',
					'heading' => "Use Greadent Background ?",
					'param_name' => 'dt_gection_greading_bg',
					'value' => array( 'Greadent' => 'yes' ),
					'description' => __( "Enable Greadent Background On Your Section", "droit-wbpakery-addons" )
					),
				array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __( "Backgroud Greadent Color 1", "droit-wbpakery-addons" ),
                    "param_name" => "dt_section_background_color_1",
                    "value" => '', //Default Red color
                     'edit_field_class' => 'vc_col-sm-6',
					 'dependency' => array(
                        'element' => 'dt_gection_greading_bg',
                        'value' => 'yes'
                      ),
                ),

                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __( "Backgroud Greadent Color 2", "droit-wbpakery-addons" ),
                    "param_name" => "dt_section_background_color_2",
                    "value" => '', //Default Red color
                    'edit_field_class' => 'vc_col-sm-6',
					'dependency' => array(
                        'element' => 'dt_gection_greading_bg',
                        'value' => 'yes'
                      ),
                ),

    
			  );
			  vc_add_params( 'vc_section', $attributes ); // Note: 'vc_message' was used as a base for "Message box" element
			  
            //  Overwriting VC default tempalte 
			$dir = DROIT_WPBAKERY_ADDONS_ABS_PATH. '/vc_droit_templates_dir';
			vc_set_shortcodes_templates_dir( $dir );
			require_once( DROIT_WPBAKERY_ADDONS_ABS_PATH. '/lib/helpers.php');
			require_once( DROIT_WPBAKERY_ADDONS_ABS_PATH. '/lib/controls.php');
			require_once( DROIT_WPBAKERY_ADDONS_ABS_PATH. '/lib/droit-icon.php');
		}
		
		//  load droit wpbakery css and js

		public function droit_wpbakery_scripts () {

			 wp_register_style( 'pulse', DROIT_WPBAKERY_CSS_URL.'/pulse.css', '', DROIT_WPBAKERY_ADDONS );
			 wp_register_style( 'dt_wp_inline_style', DROIT_WPBAKERY_CSS_URL.'/section.css', '', DROIT_WPBAKERY_ADDONS );
			 wp_register_style( 'dt-vc-main', DROIT_WPBAKERY_CSS_URL.'/main.css', '', DROIT_WPBAKERY_ADDONS );
			 wp_register_style( 'slick', DROIT_WPBAKERY_VENDORS_URL.'/slick/slick.css', '', DROIT_WPBAKERY_ADDONS );
			 wp_register_style( 'slick-theme', DROIT_WPBAKERY_VENDORS_URL.'/slick/slick-theme.css', '', DROIT_WPBAKERY_ADDONS );
			 wp_register_style( 'odometer', DROIT_WPBAKERY_VENDORS_URL.'/odometer/odometer.css', '', DROIT_WPBAKERY_ADDONS );
			 wp_register_style( 'animate', DROIT_WPBAKERY_CSS_URL.'/animate.css', '', DROIT_WPBAKERY_ADDONS );
			 wp_register_style( 'droit-wbpakery-addons', DROIT_WPBAKERY_CSS_URL.'/droit-wbpakery-addons.css', '', DROIT_WPBAKERY_ADDONS );
			
			 wp_enqueue_style( 'animate' );
			 wp_enqueue_style( 'pulse' );
			 wp_enqueue_style( 'slick' );
			 wp_enqueue_style( 'slick-theme' );
			 wp_enqueue_style( 'odometer' );
			 wp_enqueue_style( 'droit-wbpakery-addons' );

			 //  counter up
	
			 wp_enqueue_script('viewport', DROIT_WPBAKERY_VENDORS_URL.'/odometer/viewport.jquery.js', [ 'jquery' ], DROIT_WPBAKERY_ADDONS, 'true');
			wp_enqueue_script('odometer', DROIT_WPBAKERY_VENDORS_URL.'/odometer/odometer.min.js', [ 'jquery' ], DROIT_WPBAKERY_ADDONS, 'true');
			wp_enqueue_script('parallax', DROIT_WPBAKERY_JS_URL.'/parallax.js', [ 'jquery' ], DROIT_WPBAKERY_ADDONS, 'true');
			wp_enqueue_script('parallaxie', DROIT_WPBAKERY_JS_URL.'/parallaxie.js', [ 'jquery' ], DROIT_WPBAKERY_ADDONS, 'true');
			wp_enqueue_script('parallax-scroll', DROIT_WPBAKERY_JS_URL.'/jquery.parallax-scroll.js', [ 'jquery' ], DROIT_WPBAKERY_ADDONS, 'true');
			
			wp_register_script('slick', DROIT_WPBAKERY_VENDORS_URL.'/slick/slick.min.js', [ 'jquery' ], DROIT_WPBAKERY_ADDONS, 'true');
			wp_register_script('ajax-chimp', DROIT_WPBAKERY_JS_URL.'/ajax-chimp.js', [ 'jquery' ], DROIT_WPBAKERY_ADDONS, 'true');
			wp_register_script('droit-wpbakery-addons-script', DROIT_WPBAKERY_JS_URL.'/droit-wpbakery-addons-script.js', [ 'jquery' ], DROIT_WPBAKERY_ADDONS, 'true');
			wp_register_script('wow', DROIT_WPBAKERY_JS_URL.'/wow.min.js', [ 'jquery' ], DROIT_WPBAKERY_ADDONS, 'true');
			wp_enqueue_script('wow');
			wp_enqueue_script('slick');
			wp_enqueue_script('droit-wpbakery-addons-script');
		}

		// Load shortcode 

		public function shortcode_init() {

			if($this->droit_is_wpbakery_installed()) {

				require_once (DROIT_WPBAKERY_ADDONS_SHORTCODES_ABS_PATH.'/testwidgets/testwidgets.php');
				new shortcodes\testwidgtds\testwidgets;
				
				// Heading   
				require_once (DROIT_WPBAKERY_ADDONS_SHORTCODES_ABS_PATH.'/heading/heading.php');
				new shortcodes\dt_heading\dt_heading;

				// Scroll section 

				require_once (DROIT_WPBAKERY_ADDONS_SHORTCODES_ABS_PATH.'/scroll-to-section/scroll-to-section.php');
				new shortcodes\dt_scroll_to_section\dt_scroll_to_section;

				
			//	 Gallery 

				require_once (DROIT_WPBAKERY_ADDONS_SHORTCODES_ABS_PATH.'/gallery/gallery.php');
				new shortcodes\dt_gallery\dt_gallery;

				//  Image Box 

				require_once (DROIT_WPBAKERY_ADDONS_SHORTCODES_ABS_PATH.'/image-box/image-box.php');
				new shortcodes\dt_image_box\dt_image_box;

				// Button

				require_once (DROIT_WPBAKERY_ADDONS_SHORTCODES_ABS_PATH.'/button/button.php');
				new shortcodes\dt_button\dt_button;

				//  greadent button 

				require_once (DROIT_WPBAKERY_ADDONS_SHORTCODES_ABS_PATH.'/greadent-button/greadent-button.php');
				new shortcodes\dt_greadent_button\dt_greadent_button;

				// Carousel

				require_once (DROIT_WPBAKERY_ADDONS_SHORTCODES_ABS_PATH.'/carousel/carousel.php');
				new shortcodes\dt_carousel\dt_carousel;
				
				// Counter Up

				require_once (DROIT_WPBAKERY_ADDONS_SHORTCODES_ABS_PATH.'/counter-up/counter-up.php');
				new shortcodes\dt_counter_up\dt_counter_up;

				// Testimonial 

				require_once (DROIT_WPBAKERY_ADDONS_SHORTCODES_ABS_PATH.'/testimonial/testimonial.php');
				new shortcodes\dt_testimonial\dt_testimonial;

				// Testimonial simple 

				require_once (DROIT_WPBAKERY_ADDONS_SHORTCODES_ABS_PATH.'/testimonial-simple/testimonial-simple.php');
				new shortcodes\dt_testimonial_simple\dt_testimonial_simple;
				
				// Portfolio 

				require_once (DROIT_WPBAKERY_ADDONS_SHORTCODES_ABS_PATH.'/portfolio/portfolio.php');
				new shortcodes\dt_portfolio\dt_portfolio;
				
				// Client Logo 

				require_once (DROIT_WPBAKERY_ADDONS_SHORTCODES_ABS_PATH.'/client-logo/client-logo.php');
				new shortcodes\dt_clinet_logo\dt_clinet_logo;

				//  Team 

				require_once (DROIT_WPBAKERY_ADDONS_SHORTCODES_ABS_PATH.'/team/team.php');
				new shortcodes\dt_team\dt_team;
				
				//  post 

				require_once (DROIT_WPBAKERY_ADDONS_SHORTCODES_ABS_PATH.'/post/post.php');
				new shortcodes\dt_post\dt_post;

				//  Subscribe form 

				require_once (DROIT_WPBAKERY_ADDONS_SHORTCODES_ABS_PATH.'/subscribe/subscribe.php');
				new shortcodes\dt_subscribe\dt_subscribe;

				// image freame

				require_once (DROIT_WPBAKERY_ADDONS_SHORTCODES_ABS_PATH.'/image-frame/image-frame.php');
				new shortcodes\dt_image_frame\dt_image_frame;
				
				// pricing
				require_once (DROIT_WPBAKERY_ADDONS_SHORTCODES_ABS_PATH.'/pricing/pricing.php');
				new shortcodes\dt_pricing\dt_pricing;
				
				// hero
				require_once (DROIT_WPBAKERY_ADDONS_SHORTCODES_ABS_PATH.'/hero/hero.php');
				new shortcodes\dt_hero\dt_hero;

				// service 

				require_once (DROIT_WPBAKERY_ADDONS_SHORTCODES_ABS_PATH.'/service/service.php');
				new shortcodes\dt_service\dt_service;

				//  Icon list 

				require_once (DROIT_WPBAKERY_ADDONS_SHORTCODES_ABS_PATH.'/icon-box/icon-box.php');
				new shortcodes\dt_icon_box\dt_icon_box;
				//  Icon list 

				require_once (DROIT_WPBAKERY_ADDONS_SHORTCODES_ABS_PATH.'/iconlist/iconlist.php');
				new shortcodes\dt_icon_list\dt_icon_list;

				//  video popup 

				require_once (DROIT_WPBAKERY_ADDONS_SHORTCODES_ABS_PATH.'/video-popup/video-popup.php');
				new shortcodes\dt_vidoe_popup\dt_vidoe_popup;	

				//  card 

				require_once (DROIT_WPBAKERY_ADDONS_SHORTCODES_ABS_PATH.'/card/card.php');
				new shortcodes\dt_card\dt_card;	
			}
			
		}

		/**
		 * Check WPBakery installed or not 
		 */
		public function droit_is_wpbakery_installed() {

			return class_exists( 'WPBakeryVisualComposerAbstract' );
		}

		/**
		 * damin notic 
		*/

		public function droit_admin_notice_vc_not_intalled () {

			echo sprintf( '<div class="notice notice-error droit-notic-error"><p>%s<strong>%s</strong>%s</p></div>',
				esc_html__( 'The', 'droit-vc-extention' ),
				esc_html__( ' Droit VC Extention', 'droit-vc-extention' ),
				esc_html__( ' plugin requires WPBakery page builder plugin. Please installed and activated it.', 'droit-vc-extention' )
			);

		}
 
		/** 
		 * Display admin notice is wpbakery not installed 
		*/
        public function droit_display_admin_notice () {
			
			if(!$this->droit_is_wpbakery_installed()) {
				add_action( 'admin_notices', array( $this, 'droit_admin_notice_vc_not_intalled' ) );
			}
		}
		
	}

	Droit_WPBakery_Addons::getInstance();
}

