<?php
$wrapper_unique_class = wp_unique_id( 'simple-button-' );

$wrapper_class_list[] = $wrapper_unique_class;
$wrapper_class_list[] = 'construction_btn';
$wrapper_class_list[] = isset($dt_simple_button_class) ? $dt_simple_button_class : '';

$wrapper_class = join(' ', $wrapper_class_list);
$url_attrs = '';

if(isset($dt_simple_button_link)) {

    $url_attrs = vc_build_link($dt_simple_button_link);
}

$link_attr = '';

if(!empty($url_attrs)) {

foreach ($url_attrs as $key => $attr){
			
    if($key != 'title' && $attr != ''){

        if($key == 'url'){
            $key = 'href';
        }

        $link_attr .= $key.'='.$attr.' ';

    }
}
}
$button_text = '';
if(isset($dt_simple_button)) {
  $button_text = $dt_simple_button; 
}

$icon_html = '<i class="icon-arrow-right-2"></i>';

$get_icon_class = '';
if(isset($icon_type) && $icon_type != '' && 'image' != $icon_type) {
    $get_icon_class =  'icon_picker_'.$icon_type;
}
if('' != $get_icon_class && isset($$get_icon_class) ) {
    $icon_html = '<i class="'.esc_attr($$get_icon_class).'"></i>';   
}

if(isset($icon_type) && $icon_type != '' && 'image' == $icon_type) {
    $get_icon_class =  'icon_picker_'.$icon_type;
    $icon_html =  wp_get_attachment_image($$get_icon_class, 'thumbnail');;
}

?>

<a <?php echo esc_attr($link_attr); ?> class="<?php echo esc_attr( $wrapper_class ); ?>">
 <?php echo esc_html($button_text).dt_return($icon_html); ?> 
 </a>

 <?php 
wp_enqueue_style('dt_extend_style');
//  font size  

if(isset($dt_font_size__simple)){
    $icon_box_css[$wrapper_unique_class]['font-size'] = $dt_font_size__simple;       
}
if(isset($dt_line_height__simple)){
    $icon_box_css[$wrapper_unique_class]['line-height'] = $dt_line_height__simple;       
}

if(isset($dt_font_weight__simple)){
    $icon_box_css[$wrapper_unique_class]['font-weight'] = $dt_font_weight__simple;       
}

//  Button Color 

if(isset($dt_font_color__simple)){
    $icon_box_css[$wrapper_unique_class]['color'] = $dt_font_color__simple;       
}
// button hover color 
if(isset($dt_simple_button_hover_color)){
    $icon_box_css[$wrapper_unique_class.':hover']['color'] = $dt_simple_button_hover_color;       
}

//  Button background color 

if(isset($dt_simple_button_bg_color)){
    $icon_box_css[$wrapper_unique_class]['background'] = $dt_simple_button_bg_color;       
}

//  Button background hover color 
if(isset($dt_simple_button_bg_hover_color)){
    $icon_box_css[$wrapper_unique_class.':after']['background'] = $dt_simple_button_bg_hover_color;       
}
//  Button background hover color 
if(isset($dt_simple_button_bg_hover_color)){
    $icon_box_css[$wrapper_unique_class.':hover']['background'] = $dt_simple_button_bg_hover_color;       
}

//  padding 
if(isset($dt_simple_btn_padding)){
    $icon_box_css[$wrapper_unique_class]['padding'] = $dt_simple_btn_padding;       
}

//  Border Radius  
if(isset($dt_simple_btn_radius)){
    $icon_box_css[$wrapper_unique_class]['border-radius'] = $dt_simple_btn_radius;       
}

//  Border setting 

if(isset($dt_simple_btn_border_width)){
    $icon_box_css[$wrapper_unique_class]['border'] = $dt_simple_btn_border_width.' solid';       
}
if(isset($dt_simple_button_border_color)){
    $icon_box_css[$wrapper_unique_class]['border-color'] = $dt_simple_button_border_color;       
}

if(isset($dt_simple_button_border_color_hover)){
    $icon_box_css[$wrapper_unique_class.':hover']['border-color'] = $dt_simple_button_border_color_hover;       
}


//  Icon margin 
if(isset($dt_simple_btn_icon_margin)){
    $icon_box_css[$wrapper_unique_class.' i']['margin'] = $dt_simple_btn_icon_margin;       
}

if(isset($dt_simple_btn_icon_size)){
    $icon_box_css[$wrapper_unique_class.' i']['font-size'] = $dt_simple_btn_icon_size;       
}

//  Responsive option 

$resposive_tab = [];
//  Tab 
if(isset($dt_tab_font_size_simple)){
    $resposive_tab[$wrapper_unique_class]['font-size'] = $dt_tab_font_size_simple;       
}
if(isset($dt_tab_line_height_simple)){
    $resposive_tab[$wrapper_unique_class]['line-height'] = $dt_tab_line_height_simple;       
}
//  Mobile 
$resposive_mobile  = [];
if(isset($dt_tab_font_size_simple)){
    $resposive_mobile[$wrapper_unique_class]['font-size'] = $dt_tab_font_size_simple;       
}
if(isset($dt_tab_line_height_simple)){
    $resposive_mobile[$wrapper_unique_class]['line-height'] = $dt_tab_line_height_simple;       
}


$render_css =  droit_css( $icon_box_css );
$render_css .=  droit_css_responsive( $resposive_tab, 'max-width', '1024' );
$render_css .=  droit_css_responsive( $resposive_mobile );

wp_add_inline_style( 'dt_extend_style', $render_css );
