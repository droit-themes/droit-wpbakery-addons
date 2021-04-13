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
					'description' => esc_html__( "It will be apper section left side", "droit-wbpakery-addons" )
					),

				array(
				'type' => 'checkbox',
				'heading' => "Pulse Effect",
				'param_name' => 'pulse_effect',
				'value' => array( 'pulse' => 'Yes' ),
				'description' => esc_html__( "Enable Pulse Effect On Your Section", "droit-wbpakery-addons" )
				),

				array(
					'type' => 'checkbox',
					'heading' => "Use Greadent Background ?",
					'param_name' => 'dt_gection_greading_bg',
					'value' => array( 'Greadent' => 'yes' ),
					'description' => esc_html__( "Enable Greadent Background On Your Section", "droit-wbpakery-addons" )
					),
				array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => esc_html__( "Backgroud Greadent Color 1", "droit-wbpakery-addons" ),
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
                    "heading" => esc_html__( "Backgroud Greadent Color 2", "droit-wbpakery-addons" ),
                    "param_name" => "dt_section_background_color_2",
                    "value" => '', //Default Red color
                    'edit_field_class' => 'vc_col-sm-6',
					'dependency' => array(
                        'element' => 'dt_gection_greading_bg',
                        'value' => 'yes'
                      ),
                ),

				array(
					'type' => 'checkbox',
					'heading' => "Enable for one page section?",
					'param_name' => 'dt_one_page_section',
					'value' => array( 'onepage' => 'yes' ),
					'description' => esc_html__( "If you want to enable this section for one page scroll", "droit-wbpakery-addons" )
					),
					array(
						'type' => 'checkbox',
						'heading' => "Display this section on load?",
						'param_name' => 'dt_one_page_active_section',
						'value' => array( 'Active' => 'active' ),
						'description' => esc_html__( "If you want to display this section on window on load", "droit-wbpakery-addons" ),
						'dependency' => array(
							'element' => 'dt_one_page_section',
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
			 wp_register_style( 'fullpage', DROIT_WPBAKERY_VENDORS_URL.'/fullpage/fullpage.css', '', DROIT_WPBAKERY_ADDONS );
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
			wp_enqueue_script('fullpage', DROIT_WPBAKERY_VENDORS_URL.'/fullpage/fullpage.js', [ 'jquery' ], DROIT_WPBAKERY_ADDONS, 'true');
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

		public function widget_list () {
			$list = apply_filters('dt_extention_widgets_list', [
				'heading',
				'scroll-to-section',
				'gallery',
				'image-box',
				'button',
				'simple-button',
				'carousel',
				'counter-up',
				'testimonial',
				'testimonial-simple',
				'portfolio',
				'client-logo',
				'team',
				'post',
				'image-frame',
				'pricing',
				'hero',
				'service',
				'icon-box',
				'iconlist',
				'video-popup',
				'card',
				'event', 
				'slider', 
				'one-page-heading',
				'one-page-section'
			]);
			return $list;
		}

		public function shortcode_init() {

			if($this->droit_is_wpbakery_installed()) {
                   //  load widgets class 
				if(!empty($this->widget_list())) {

					foreach ($this->widget_list() as $widgets) {

                        $file_path = '/'.$widgets.'/';

						$file_name = $widgets.'.php';
						$name_space = 'dt_'.$widgets;

                        $namespace_sep = '\\';

						$class_name = str_replace('-', '_', 'shortcodes'.$namespace_sep.$name_space.$namespace_sep.$name_space);
				

						$file_full_path = DROIT_WPBAKERY_ADDONS_SHORTCODES_ABS_PATH.$file_path.$file_name;
						
						if(is_readable($file_full_path) && file_exists($file_full_path) ) {
							require_once $file_full_path;
							new $class_name;
						}
	
					 }
				}

			
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

