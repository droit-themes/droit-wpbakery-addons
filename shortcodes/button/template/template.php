<?php 

$url_attrs = array_filter(vc_build_link($dt_button_link));
$button_wapper_uniqueue_class = wp_unique_id('doit-button-wrapper-');
$button_wrapper_class[]=  $button_wapper_uniqueue_class;
$button_wrapper_class[]=  'discover_button';
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
$button_icon_class[] = ($dt_btn_icon_selector != '') ? $dt_btn_icon_selector : 'ti-arrow-right';
$button_icon_class[] = $button_uniqueue_class_icon;

$button_icon_class = join(' ', $button_icon_class);

echo dt_return($link_beofre);
?>
 
    <span class="<?php echo esc_attr( $button_class ); ?>" data-text="<?php echo esc_attr( $dt_btn_text ); ?>">
        <?php echo esc_html($dt_btn_text); ?>
        <i class="<?php echo esc_attr( $button_icon_class ); ?>"></i>
    </span>
<?php echo dt_return($link_after);

wp_enqueue_style('dt_extend_style');
$button_css = [];

if($dt_button_color != ''){

    $button_css[$button_unique_class]['color'] = $dt_button_color;     
}
if($dt_button_color != ''){

    $button_css[$button_wapper_uniqueue_class]['border-color'] = $dt_button_color;     
}
//  Hover color
if($dt_btn_hover_color_with_border != ''){

    $button_css[$button_unique_class.':before']['color'] = $dt_btn_hover_color_with_border;   
}
if($dt_btn_hover_color_with_border != ''){

    $button_css[$button_wapper_uniqueue_class.':before']['background'] = $dt_btn_hover_color_with_border;       
}
// Icon hover color
if($dt_btn_hover_color_with_border != ''){
    
    $button_css[$button_unique_class.':hover i']['color'] = $dt_btn_hover_color_with_border;       
}

if($dt_button_color != ''){

    $button_css[$button_wapper_uniqueue_class]['border-color'] = $dt_button_color;     
}

//  font size 

if($dt_btn_font_size != ''){
    
    $button_css[$button_unique_class]['font-size'] = $dt_btn_font_size;       
}
if($dt_btn_icon_font_size != ''){
    
    $button_css[$button_uniqueue_class_icon]['font-size'] = $dt_btn_icon_font_size;       
}

$button_css =  droit_css( $button_css );


wp_add_inline_style( 'dt_extend_style', $button_css );