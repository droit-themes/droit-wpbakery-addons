<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $columns_placement
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $parallax_speed_bg
 * @var $parallax_speed_video
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var WPBakeryShortCode_Vc_Row $this
 */
$el_class = $full_height = $parallax_speed_bg = $parallax_speed_video = $full_width = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = $css_animation = '';
$disable_element = '';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
if($dt_one_page_section == 'yes') {
	$css_classes = array(
		$el_class,
		vc_shortcode_custom_css_class( $css ),
	);
}else{
	$css_classes = array(
		'vc_section',
		$el_class,
		vc_shortcode_custom_css_class( $css ),
	);
}


if ( 'yes' === $disable_element ) {
	if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
}

if ( vc_shortcode_custom_css_has_property( $css, array(
	'border',
	'background',
) ) || $video_bg || $parallax
) {
	$css_classes[] = 'vc_section-has-fill';
}

//  one page sectrion enable 


if($dt_one_page_section == 'yes') {

	$css_classes[] = 'section';
}

//  is active section 

if($dt_one_page_active_section == 'active') {

	$css_classes[] = 'active';
}

$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
if ( ! empty( $full_width ) ) {
	$wrapper_attributes[] = 'data-vc-full-width="true"';
	$wrapper_attributes[] = 'data-vc-full-width-init="false"';
	if ( 'stretch_row_content' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
	}
	$after_output .= '<div class="vc_row-full-width vc_clearfix"></div>';
}

if ( ! empty( $full_height ) ) {
	$css_classes[] = 'vc_row-o-full-height';
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_section-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
	$css_classes[] = 'vc_section-flex';
}

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

$parallax_speed = $parallax_speed_bg;
if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_speed = $parallax_speed_video;
	$parallax_image = $video_bg_url;
	$css_classes[] = 'vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

$pulse_content = '';
if($pulse_effect){
	$css_classes[] = 'banner_area';
	$pulse_content = '<ul class="list-unstyled banner_dot_two"> <li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li></ul><ul class="list-unstyled banner_dot"> <li></li> <li></li> <li></li> <li></li> <li></li> <li></li> <li></li> <li></li></ul>';
}
$overly_html = '';
if(isset($dt_enable_background_overly) && $dt_enable_background_overly == 'yes' && isset($dt_section_overly_color) && !empty($dt_section_overly_color)) {
	$css_classes[] = 'background-overly-enable';
	$overly_html = '<div style="background-color:'.esc_attr( $dt_section_overly_color ).';position:absolute;top: ; left:0; right:0;bottom:0;z-index:0"></div>';
}

$dt_section_unique_class = wp_unique_id( 'vc-section-' );

if($dt_gection_greading_bg) {
	$css_classes[] = $dt_section_unique_class;
	wp_enqueue_style('dt_wp_inline_style');
	
		$dt_greadent_bg = "
				.{$dt_section_unique_class}{
					background-image: linear-gradient(90deg, {$dt_section_background_color_1} 0%, {$dt_section_background_color_2} 100%);
				}";
	wp_add_inline_style( 'dt_wp_inline_style', $dt_greadent_bg );		
}

$dont_content = '';
if($dt_enable_dot_shap) {
	$dont_content = '<div class="dot_shap blue position-absulate"></div><div class="dot_shap purple position-absulate"></div><div class="dot_shap red position-absulate"></div>';
}

if ( ! empty( $parallax ) ) {
	wp_enqueue_script( 'vc_jquery_skrollr_js' );
	$wrapper_attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
	$css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
	if ( false !== strpos( $parallax, 'fade' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fade';
		$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
	} elseif ( false !== strpos( $parallax, 'fixed' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fixed';
	}
}

if ( ! empty( $parallax_image ) ) {
	if ( $has_video_bg ) {
		$parallax_image_src = $parallax_image;
	} else {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	}
	$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
	$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
$data_name_nav = '';
if($dt_one_page_section == 'yes' && $dt_onepage_paralax_nav_data != '') {
	$data_name_nav = 'data-name="'.$dt_onepage_paralax_nav_data.'"';
}

$outss = "<ul class='list-unstyled dot'>
<li data-parallax='{\"x\": 0, \"y\": 100}'></li>
<li data-parallax='{\"x\": 0, \"y\": 40}'></li>
<li data-parallax='{\"x\": 10, \"y\": -40}'></li>
<li data-parallax='{\"x\": 0, \"y\": -40}'></li>
<li data-parallax='{\"x\": -40, \"y\": 0}'></li>
<li data-parallax='{\"x\": -40, \"y\": 20}'></li>
</ul>
";

$output .= '<section ' . implode( ' ', $wrapper_attributes ) .$data_name_nav. '>';
$output .= $outss;
$output .= $overly_html;
$output .= $dont_content;
$output .= $pulse_content;
$output .= wpb_js_remove_wpautop( $content );
$output .= '</section>';
$output .= $after_output;

return $output;
?>