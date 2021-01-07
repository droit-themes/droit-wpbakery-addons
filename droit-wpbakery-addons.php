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

		}

		//  init plugin 

		function init() {
			
			if ( ( is_multisite() && is_network_admin() ) || ! is_multisite() ) {
				add_action( 'admin_init', array( $this, 'droit_display_admin_notice' ) );
			}
			$attributes = array(
				array(
				'type' => 'checkbox',
				'heading' => "Style",
				'param_name' => 'aroro_effect',
				'value' => array( 'key' => 'value' ),
				'description' => __( "New style attribute", "my-text-domain" )
				),
			  );
			  vc_add_params( 'vc_section', $attributes ); // Note: 'vc_message' was used as a base for "Message box" element
			  
            //  Overwriting VC default tempalte 
			$dir = DROIT_WPBAKERY_ADDONS_ABS_PATH. '/vc_droit_templates_dir';
			vc_set_shortcodes_templates_dir( $dir );
		}
		
		//  load droit wpbakery css and js

		public function droit_wpbakery_scripts () {
			// wp_register_style( 'pulse', DROIT_WPBAKERY_CSS_URL.'/pulse.css', '', DROIT_WPBAKERY_ADDONS );
			// wp_enqueue_style( 'pulse' );

			// Register script 
			wp_enqueue_script('parallax', DROIT_WPBAKERY_JS_URL.'/parallax.js', [ 'jquery' ], DROIT_WPBAKERY_ADDONS, 'true');
			wp_enqueue_script('parallaxie', DROIT_WPBAKERY_JS_URL.'/parallaxie.js', [ 'jquery' ], DROIT_WPBAKERY_ADDONS, 'true');
			// Main plugin script
			wp_enqueue_script('droit-wpbakery-addons-script', DROIT_WPBAKERY_JS_URL.'/droit-wpbakery-addons-script.js', [ 'jquery' ], DROIT_WPBAKERY_ADDONS, 'true');

		}

		// Load shortcode 

		public function shortcode_init() {

			if($this->droit_is_wpbakery_installed()) {

				require_once (DROIT_WPBAKERY_ADDONS_SHORTCODES_ABS_PATH.'/testwidgets/testwidgets.php');
				new shortcodes\testwidgtds\testwidgets;

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



