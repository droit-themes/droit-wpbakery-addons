<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! defined( 'DROIT_WPBAKERY_ADDONS' ) ) {
	define( 'DROIT_WPBAKERY_ADDONS', '1.0' );
}

if ( ! defined( 'DROIT_WPBAKERY_ADDONS_ABS_PATH' ) ) {
	define( 'DROIT_WPBAKERY_ADDONS_ABS_PATH', dirname( __FILE__ ) );
}

if ( ! defined( 'DROIT_WPBAKERY_ADDONS_REL_PATH' ) ) {
	define( 'DROIT_WPBAKERY_ADDONS_REL_PATH', dirname( plugin_basename( __FILE__ ) ) );
}

if ( ! defined( 'DROIT_WPBAKERY_ADDONS_URL_PATH' ) ) {
	define( 'DROIT_WPBAKERY_ADDONS_URL_PATH', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'DROIT_WPBAKERY_ADDONS_ASSETS_ABS_PATH' ) ) {
	define( 'DROIT_WPBAKERY_ADDONS_ASSETS_ABS_PATH', DROIT_WPBAKERY_ADDONS_ABS_PATH . '/assets' );
}

if ( ! defined( 'DROIT_WPBAKERY_ADDONS_ASSETS_URL_PATH' ) ) {
	define( 'DROIT_WPBAKERY_ADDONS_ASSETS_URL_PATH', DROIT_WPBAKERY_ADDONS_URL_PATH . 'assets' );
}

if ( ! defined( 'DROIT_WPBAKERY_CSS_URL' ) ) {
	define( 'DROIT_WPBAKERY_CSS_URL', DROIT_WPBAKERY_ADDONS_ASSETS_URL_PATH . '/css' );
}

if ( ! defined( 'DROIT_WPBAKERY_JS_URL' ) ) {
	define( 'DROIT_WPBAKERY_JS_URL', DROIT_WPBAKERY_ADDONS_ASSETS_URL_PATH . '/js' );
}
if ( ! defined( 'DROIT_WPBAKERY_VENDORS_URL' ) ) {
	define( 'DROIT_WPBAKERY_VENDORS_URL', DROIT_WPBAKERY_ADDONS_ASSETS_URL_PATH . '/vendors' );
}

if ( ! defined( 'DROIT_WPBAKERY_ADDONS_SHORTCODES_ABS_PATH' ) ) {
	define( 'DROIT_WPBAKERY_ADDONS_SHORTCODES_ABS_PATH', DROIT_WPBAKERY_ADDONS_ABS_PATH . '/shortcodes' );
}

if ( ! defined( 'DROIT_WPBAKERY_ADDONS_SHORTCODES_URL_PATH' ) ) {
	define( 'DROIT_WPBAKERY_ADDONS_SHORTCODES_URL_PATH', DROIT_WPBAKERY_ADDONS_URL_PATH . 'shortcodes' );
}
