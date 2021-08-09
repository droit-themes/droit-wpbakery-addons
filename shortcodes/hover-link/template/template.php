<?php 
$url_attrs = '';
if(isset($dt_button_link)) {
    $url_attrs = array_filter(vc_build_link($dt_button_link));
}
$button_wapper_uniqueue_class = wp_unique_id('doit-button-wrapper-');
$button_wrapper_class[]=  $button_wapper_uniqueue_class;
$button_wrapper_class[]= (isset($dt_show_border_dispaly_yes) && $dt_show_border_dispaly_yes == 'yes') ?  'discover_button' : '';
$button_wrapper_class[]= isset( $dt_btn_class ) ? $dt_btn_class : '';
$button_wrapper_class[]= isset( $dt_button_alignment ) ? 'd-flex justify-content-'.$dt_button_alignment : 'd-flex justify-content-start';

$button_wrapper_class = join(' ', $button_wrapper_class);
$link_beofre = '';
$link_after = '';
$link_attr = '';

if(!empty($url_attrs)){
    foreach ($url_attrs as $key => $attr){
       
        if($key != 'title'){
            if($key == 'url'){
                $key = 'href';
            }
            $link_attr .= $key.'='.$attr.' ';

        }
    }
    $link_beofre = '<a '.esc_attr( $link_attr ).' class="'.esc_attr( $button_wrapper_class ).'">';
    $link_after = '</a>';
 }
$button_unique_class =  wp_unique_id('doit-button-');

$button_class[] = $button_unique_class;
$button_class[] = 'agency_learn_btn h_text_btn';

$button_class = join(' ', $button_class);

$button_uniqueue_class_icon =  wp_unique_id('doit-button-icon-');


$icon_html = '<i class="icon-Millions-of-Songs '.$button_uniqueue_class_icon.'"></i>';

$icon_id = 'icon_picker_'.$icon_type;

if($icon_type != 'image') {

    $icon_html = '<i class="'.$$icon_id.' '.$button_uniqueue_class_icon.'"></i>';

}elseif($icon_type == 'image') {

    $icon_html = wp_get_attachment_image($$icon_id, 'thumbnail');

}

$btn_text_get = '';
if(isset($dt_btn_text)) {
    $btn_text_get =  $dt_btn_text;
}

echo dt_return($link_beofre);
?>
 
    <span class="<?php echo esc_attr( $button_class ); ?>" data-text="<?php echo esc_attr( $btn_text_get ); ?>">
        <?php echo esc_html($btn_text_get); ?>
        <?php echo dt_return($icon_html); ?>
    </span>
<?php echo dt_return($link_after);

wp_enqueue_style('dt_extend_style');
$button_css = [];

if(isset($dt_button_color) && $dt_button_color != ''){

    $button_css[$button_unique_class]['color'] = $dt_button_color;     
}
if(isset($dt_button_color) && $dt_button_color != ''){

    $button_css[$button_wapper_uniqueue_class]['border-color'] = $dt_button_color;     
}
//  Hover color
if(isset($dt_btn_hover_color_with_border) && $dt_btn_hover_color_with_border != ''){

    $button_css[$button_unique_class.':before']['color'] = $dt_btn_hover_color_with_border;   
}
if(isset($dt_btn_hover_color_with_border) && $dt_btn_hover_color_with_border != ''){

    $button_css[$button_wapper_uniqueue_class.':before']['background'] = $dt_btn_hover_color_with_border;       
}
// Icon hover color
if(isset($dt_btn_hover_color_with_border) && $dt_btn_hover_color_with_border != ''){
    
    $button_css[$button_unique_class.':hover i']['color'] = $dt_btn_hover_color_with_border;       
}

if(isset($dt_button_color) && $dt_button_color != ''){

    $button_css[$button_wapper_uniqueue_class]['border-color'] = $dt_button_color;     
}

//  font size 

if(isset($dt_btn_font_size) && $dt_btn_font_size != ''){
    
    $button_css[$button_unique_class]['font-size'] = $dt_btn_font_size;       
}
if(isset($dt_btn_icon_font_size) && $dt_btn_icon_font_size != ''){
    
    $button_css[$button_uniqueue_class_icon]['font-size'] = $dt_btn_icon_font_size;       
}

$button_css =  droit_css( $button_css );


wp_add_inline_style( 'dt_extend_style', $button_css );