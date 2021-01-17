<?php 
/*
* helper 
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! function_exists( 'dt_template_part' ) ) {
	/**
	 * Loads shortcode module template part
	 *
	 * @param $module string - name of the module to load
	 * @param $shortcode string - name of the shortcode folder
	 * @param $template_path string - name of the template to load
	 * @param $slug string - name of the template suffix to load different file
	 * @param $params array - array of parameters to pass to template
	 *
	 * @return string/html
	 */
	function dt_template_part( $shortcode, $style = null, $params = array() ) {
		
		$file_extension            = '.php';
		
		$file_path                 = DROIT_WPBAKERY_ADDONS_SHORTCODES_ABS_PATH.'/'.$shortcode.'/template/template'.$style.$file_extension;
    
		$template = '';
		
		if ( !file_exists( $file_path )) {
			return;
		}
		
		if ( is_array( $params )) {
			extract( $params );
		}
		
        ob_start();
        include( $file_path );
        return ob_get_clean();
        
	}
}

if(!function_exists('dt_extention_wp_kses')) {

    function dt_extention_wp_kses ( $data ) {

        $allow_html = array(
            'a' => array(
                'href' => array(),
                'title' => array()
            ),
            'br' => array(),
            'em' => array(),
            'strong' => array(),
            'span'   => array()
        );

      return  wp_kses($data, $allow_html);
    }
}