<?php



$icon_selector = '';

if(isset($icon_type)){
    vc_icon_element_fonts_enqueue($icon_type);

    $icon_selector = 'icon_picker_'.$icon_type;
}


$icon_class = ( isset($$icon_selector) && '' != $$icon_selector) ? $$icon_selector : 'icon-arrow-double';
$url_attrs = '';

if(isset($dt_card_link)) {

    $url_attrs = array_filter(vc_build_link($dt_card_link));
}
$link_beofre = '';
$link_after = '';
if(!empty($url_attrs)){
    foreach ($url_attrs as $key => $attr){
       
        if($key != 'title'){
            if($key == 'url'){
                $key = 'href';
            }
            $link_attr .= $key.'='.$attr.' ';

        }
    }
    $link_beofre = '<a '.esc_attr( $link_attr ).' class="'.esc_attr( 'education_link' ).'">';  
    $link_after = '</a>';
 }
$wrapper_unique_class = wp_unique_id('dt-cart-');
$wrapper_class[] = $wrapper_unique_class;
$wrapper_class[] = 'education_link_item';

$wrapper_class_g = join(' ', $wrapper_class);

$subtitle = '';
if(isset($dt_card_subtitle_title)) {
    $subtitle  = $dt_card_subtitle_title;
}

$cart_title = '';

if(isset($dt_card_title)) {
  $cart_title = $dt_card_title;
}

?>


<div class="<?php echo esc_attr( $wrapper_class_g ); ?>">
    <p><?php echo dt_extention_wp_kses($subtitle); ?></p>
    <?php echo dt_return($link_beofre); ?> <?php echo dt_extention_wp_kses($cart_title); ?> <i class="<?php echo esc_attr( $icon_class ) ?>"></i><?php echo dt_return( $link_after); ?>
</div>

<?php 

wp_enqueue_style('dt-card-css');

$card_css = [];

if(isset($dt_card_color) && $dt_card_color != ''){
    $card_css[$wrapper_unique_class.'.education_link_item:before']['background'] = $dt_card_color;       
}
if(isset($dt_card_color) && $dt_card_color != ''){
    $card_css[$wrapper_unique_class.'.education_link_item:hover .education_link']['color'] = $dt_card_color;       
}

//  title font size 
if(isset($dt_font_color_dt_card_title) && $dt_font_color_dt_card_title != ''){
    $card_css[$wrapper_unique_class.'.education_link_item .education_link']['color'] = $dt_font_color_dt_card_title;       
}
if(isset($dt_font_size_dt_card_title) && $dt_font_size_dt_card_title != ''){
    $card_css[$wrapper_unique_class.'.education_link_item .education_link']['font-size'] = $dt_font_size_dt_card_title;       
}
//  title font size 
if(isset($dt_line_height_dt_card_title) && $dt_line_height_dt_card_title != ''){
    $card_css[$wrapper_unique_class.'.education_link_item .education_link']['line-height'] = $dt_line_height_dt_card_title;       
}
if(isset($dt_font_weight_dt_card_title) && $dt_font_weight_dt_card_title != ''){
    $card_css[$wrapper_unique_class.'.education_link_item .education_link']['font-weight'] = $dt_font_weight_dt_card_title;       
}
//  Subtitle 
if(isset($dt_font_size_dt_card_sub_title) && $dt_font_size_dt_card_sub_title != ''){
    $card_css[$wrapper_unique_class.'.education_link_item p']['font-size'] = $dt_font_size_dt_card_sub_title;       
}
if(isset($dt_line_height_dt_card_sub_title) && $dt_line_height_dt_card_sub_title != ''){
    $card_css[$wrapper_unique_class.'.education_link_item p']['line-height'] = $dt_line_height_dt_card_sub_title;       
}
if(isset($dt_font_weight_dt_card_sub_title) && $dt_font_weight_dt_card_sub_title != ''){
    $card_css[$wrapper_unique_class.'.education_link_item p']['font-weight'] = $dt_font_weight_dt_card_sub_title;       
}
if(isset($dt_font_color_dt_card_sub_title) && $dt_font_color_dt_card_sub_title != ''){
    $card_css[$wrapper_unique_class.'.education_link_item p']['color'] = $dt_font_color_dt_card_sub_title;       
}

$card_css_tab = [];
//  tab 

if(isset($dt_tab_font_sizedt_card_title) && $dt_tab_font_sizedt_card_title != ''){
    $card_css_tab[$wrapper_unique_class.'.education_link_item .education_link']['font-size'] = $dt_tab_font_sizedt_card_title;       
}
//  title font size 
if(isset($dt_tab_line_heightdt_card_title) && $dt_tab_line_heightdt_card_title != ''){
    $card_css_tab[$wrapper_unique_class.'.education_link_item .education_link']['line-height'] = $dt_tab_line_heightdt_card_title;       
}

if(isset($dt_tab_font_sizedt_card_sub_title) && $dt_tab_font_sizedt_card_sub_title != ''){
    $card_css_tab[$wrapper_unique_class.'.education_link_item p']['font-size'] = $dt_tab_font_sizedt_card_sub_title;       
}
//  title font size 
if(isset($dt_tab_line_heightdt_card_sub_title) && $dt_tab_line_heightdt_card_sub_title != ''){
    $card_css_tab[$wrapper_unique_class.'.education_link_item p']['line-height'] = $dt_tab_line_heightdt_card_sub_title;       
}

//  Mobile 

$card_css_mobile = '';

if(isset($dt_mobile_font_size_dt_card_title) && $dt_mobile_font_size_dt_card_title != ''){
    $card_css_mobile[$wrapper_unique_class.'.education_link_item .education_link']['font-size'] = $dt_mobile_font_size_dt_card_title;       
}
//  title font size 
if(isset($dt_mobile_line_height_dt_card_title) && $dt_mobile_line_height_dt_card_title != ''){
    $card_css_mobile[$wrapper_unique_class.'.education_link_item .education_link']['line-height'] = $dt_mobile_line_height_dt_card_title;       
}

if(isset($dt_mobile_font_size_dt_card_sub_title) && $dt_mobile_font_size_dt_card_sub_title != ''){
    $card_css_mobile[$wrapper_unique_class.'.education_link_item p']['font-size'] = $dt_mobile_font_size_dt_card_sub_title;       
}
//  title font size 
if(isset($dt_mobile_line_height_dt_card_sub_title) && $dt_mobile_line_height_dt_card_sub_title != ''){
    $card_css_mobile[$wrapper_unique_class.'.education_link_item p']['line-height'] = $dt_mobile_line_height_dt_card_sub_title;       
}


$card_css_generated =  droit_css( $card_css );
$card_css_generated .=  droit_css_responsive( $card_css_tab, 'max-width', '1024' );
$card_css_generated .=  droit_css_responsive( $card_css_mobile, 'max-width', '767' );

wp_add_inline_style( 'dt-card-css', $card_css_generated );

