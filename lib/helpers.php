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
	function dt_template_part( $shortcode, $style = null, $params = array(), $content = null ) {
		
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
            'span'   => array(),
			'sub'    => array(), 
			'sup'    => array(), 
        );

      return  wp_kses($data, $allow_html);
    }
}

if ( ! function_exists( 'droit_vc_get_custom_link_attributes' ) ) {
	/**
	 * Get custom link attributes
	 *
	 * @param $custom_link array - link parameters value
	 * @param $custom_classes string - custom class value
	 *
	 * @return array
	 */
	function droit_vc_get_custom_link_attributes( $custom_link = array(), $custom_classes = '' ) {
		$attributes = array();
		
		if ( ! empty( $custom_link ) ) {
			$link = function_exists( 'vc_build_link' ) ? vc_build_link( $custom_link ) : array();
			
			if ( ! empty( $link ) && ! empty( $link['url'] ) ) {
				if ( ! empty( $custom_classes ) ) {
					$attributes[] = 'class="' . esc_attr( $custom_classes ) . '"';
				}
				
				$attributes[] = 'href="' . esc_url( trim( $link['url'] ) ) . '"';
				
				if ( ! empty( $link['target'] ) ) {
					$attributes[] = 'target="' . esc_attr( trim( $link['target'] ) ) . '"';
				}
				
				if ( ! empty( $link['title'] ) ) {
					$attributes[] = 'title="' . esc_attr( trim( $link['title'] ) ) . '"';
				}
				
				if ( ! empty( $link['rel'] ) ) {
					$attributes[] = 'rel="' . esc_attr( trim( $link['rel'] ) ) . '"';
				}
			}
		}
		
		return $attributes;
	}
}

// css generator 

if(!function_exists('droit_css')) {
	function droit_css( $css_rander = array()) {
		$css_output = '';
		if(!empty($css_rander)) {
			
			foreach($css_rander as $key => $css) {
				$css_data = '';
				if( empty($css) ){
					continue;
				}
				foreach( $css as $property=>$value){
					if( empty($value) ){
						continue;
					}
                   $css_data .= $property.':'.$value." !important;";
				}
				$css_output .=  '.'.$key.'{'.$css_data.'}'."\n";
			}
		}
      return $css_output;
	}
}

if(!function_exists('droit_css_responsive')) {
	function droit_css_responsive( $css_rander = array(), $media_width = 'max-width' , $divice = '767') {
		
		$css_output = '';
		if(!empty($css_rander)) {
			
			foreach($css_rander as $key => $css) {
				$css_data = '';
				if( empty($css) ){
					continue;
				}
				foreach( $css as $property=>$value){
					if( empty($value) ){
						continue;
					}
                   $css_data .= $property.':'.$value." !important;";
				}
				$css_output .=  '@media only screen and ('.$media_width.': '.$divice.'px){ .'.$key.'{'.$css_data.'}'."\n".'}'."\n";
			}
		}
		
      return $css_output;
	}
}

if(!function_exists('droit_getCSSAnimation')) {

	function droit_getCSSAnimation( $css_animation ) {
		$output = '';
		if ( '' !== $css_animation && 'none' !== $css_animation ) {
			wp_enqueue_script( 'vc_waypoints' );
			wp_enqueue_style( 'vc_animate-css' );
			$output = ' wpb_animate_when_almost_visible wpb_' . $css_animation . ' ' . $css_animation;
		}

		return $output;
	}

}

if(!function_exists('dt_get_attachment_image')) {
	
	function dt_get_attachment_image($id, $size = 'thumbnail', $attr = []) {
		
		return wp_get_attachment_image($id, $size, null , $attr);
	}

}

if(!function_exists('dt_return')) {
	
	function dt_return( $data ) {
		
		return $data;
	}

}

// link before after 

if(!function_exists('dt_link_before_after')) {

	function dt_link_before_after( $id = array(), $before_after="", $class="",  $data_text=[]) {
		/**
		 * Get link data
		 * generate before after link with link attr 
		 * Retun link before value with condition 
		 * if faild all condition return empty 
		 * @param 3, 
		 */

       
        $link_attr_custom = '';

		if(!empty($data_text)) {
			foreach($data_text as $key=>$text) {
				$link_attr_custom .= $key.' = '.$text.' ';
			}
		}

		$url_attrs = vc_build_link($id);
		$link_beofre = '';
		$link_after = '';
		$link_attr = '';
                 
		if(!empty($url_attrs)){
			foreach ($url_attrs as $key => $attr){
			
				if($key != 'title' && $attr != ''){

					if($key == 'url'){
						$key = 'href';
					}

					$link_attr .= $key.'='.$attr.' ';
		
				}
			}

			if($url_attrs['url'] != ''){

				$link_beofre = '<a '.esc_attr( $link_attr.' '.$link_attr_custom ).'class="'.$class.'">';  
				$link_after = '</a>';

			}
		
		}

        if($before_after == 'before') {
			return $link_beofre;
		}

		if($before_after == 'after') {
			return $link_after;
		}

		return '';
		
	}

}

// estimation reading time count 
if(!function_exists('dt_estimation_reading_count')) {
   
	function dt_estimation_reading_count ( $content ) {
      
		$word = str_word_count(strip_tags($content));
	
		$m = floor($word / 200);
		$s = floor($word % 200 / (200 / 60));
		$m_cont = $m>0 ? $m.' '.__('minute', 'droit-wbpakery-addons').($m == 1 ? ' ' : 's ') : '';
		return $est = $m_cont . $s.' '. __('second', 'droit-wbpakery-addons') . ($s == 1 ? '' : 's').' '.__('read', 'droit-wbpakery-addons');

	}
}

// get post content 
if(!function_exists('dt_get_post_content')) {
   
	function dt_get_post_content ( $id ) {
      
		$content_post = get_post($id);
		$content = $content_post->post_content;
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);
        return $content;
	}
}



if(!function_exists('get_animation_attr')) {
	
	function get_animation_attr($animation_delay = null, $animation_duration = null)  {
		
		$delay = '';
        $duration = ''; 

		if('' != $animation_delay) {
			$delay = 'data-wow-delay='.$animation_delay;
		}

		if('' != $animation_duration) {
			
			$duration = 'data-wow-duration='.$animation_duration;
		}

	
		$animation_attr = $delay.' '.$duration ;
		
		return $animation_attr;
	}
}

vc_add_shortcode_param('dymation', 'dt_dymation_setting');

function dt_dymation_setting($settings, $value) {
	echo '<pre>';
	print_r($value);
	echo '</pre>';
	return '<div class="my_param_block"><input name="joybangla" value="ji"/>'
	.'<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .
	esc_attr( $settings['param_name'] ) . ' ' .
	esc_attr( $settings['type'] ) . '_field" type="text" value="' . esc_attr( $value ) . '" />' .
	'</div>'; // This is html markup that will be outputted in content elements edit form
}

//  get woocommerce sale 

function dt_sale_percentage_loop() {
    global $product;
    $max_percentage = 0;
    $percentage = 0;
    if ( ! $product->is_on_sale() ) return;
    if ( $product->is_type( 'simple' ) ) {
        $max_percentage = ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100;
    }
    elseif ( $product->is_type( 'variable' ) ) {
        foreach ( $product->get_children() as $child_id ) {
            $variation = wc_get_product( $child_id );
            $price = $variation->get_regular_price();
            $sale = $variation->get_sale_price();
            if ( $price != 0 && ! empty( $sale ) ) $percentage = ( $price - $sale ) / $price * 100;
            if ( $percentage > $max_percentage ) {
                $max_percentage = $percentage;
            }
        }
    }
    if ( $max_percentage > 0 ) echo "<div class='offer_badge sale-perc'>-" . round($max_percentage) . "%</div>";
}


if(!function_exists('dt_google_font_style')) {

	function dt_google_font_style( $google_fonts) {

	$googleFontsParam = new \Vc_Google_Fonts();
	$fieldSettings = array();
	
	$fontsData = strlen( $google_fonts  ) > 0 ? $googleFontsParam->_vc_google_fonts_parse_attributes( $fieldSettings, $google_fonts  ) : '';
	
	
	$fontFamily = explode( ':', $fontsData['values']['font_family'] );
	$styles[] = 'font-family:' . $fontFamily[0];
	$fontStyles = explode( ':', $fontsData['values']['font_style'] );
	$styles[] = 'font-weight:' . $fontStyles[1];
	$styles[] = 'font-style:' . $fontStyles[2];

	$settings = get_option( 'wpb_js_google_fonts_subsets' );
	if ( is_array( $settings ) && ! empty( $settings ) ) {
		$subsets = '&subset=' . implode( ',', $settings );
	} else {
		$subsets = '';
	}


	if ( isset( $fontsData['values']['font_family'] ) ) {
		wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $fontsData['values']['font_family'] ), '//fonts.googleapis.com/css?family=' . $fontsData['values']['font_family'] . $subsets );
	}
	
	return join(';', $styles);

	}

}
