<?php
/**
 * Greadent Button 
 * Since 1.0
 */

$icon = 'dt_button_icon__'.$icon_type_gd_button;

$url_attrs = vc_build_link($dt_button_link);
$link_attr = '';

foreach ($url_attrs as $key => $attr){
			
    if($key != 'title' && $attr != ''){

        if($key == 'url'){
            $key = 'href';
        }

        $link_attr .= $key.'='.$attr.' ';

    }
}

$button_unq_class = wp_unique_id( 'greated-button-' );
$button_class []= $button_unq_class;
$button_class []= 'app_btn wow fadeInUp animated';
$button_class []= 'dt-gd-icon-pos';

if($dt_gd_icon_pos == 'rgiht'){
    $button_class []= 'dt-gd-icon-pos-'.$dt_gd_icon_pos;
}

$button_class = join(' ', $button_class);

?>



<a <?php echo esc_attr($link_attr); ?> class="<?php echo esc_attr( $button_class ); ?>" data-wow-delay="0.6s">
   
    <?php if( $$icon){ ?>
     <i class="<?php echo esc_attr( $$icon ); ?>"></i> 
    <?php } ?> 

    <span><?php echo dt_extention_wp_kses($dt_button);  ?></span>
</a> 

<?php wp_enqueue_style( 'dt_greadent_button_style' );

//  Icon 

if($dt_btn_left_margin != ''){
    
    $button_style[$button_unq_class.' '.'i']['margin-left'] = $dt_btn_left_margin;       
}

if($dt_btn_right_margin != ''){
    
    $button_style[$button_unq_class.' '.'i']['margin-right'] = $dt_btn_right_margin;       
}
// Button Font size
if($dt_btn_right_margin != ''){
    
    $button_style[$button_unq_class]['font-size'] = $dt_btn_font_size;       
}

if($dt_btn_font_line_height != ''){
    
    $button_style[$button_unq_class]['line-height'] = $dt_btn_font_line_height;       
}

if($dt_btn_font_weight != ''){
    
    $button_style[$button_unq_class]['font-weight'] = $dt_btn_font_weight;       
}

if($dt_btn_border_width != ''){
    
    $button_style[$button_unq_class]['border'] = $dt_btn_border_width.' solid '.$dt_button_border_color;       
}

if($dt_btn_border_width != ''){
    
    $button_style[$button_unq_class.':hover']['border'] = $dt_btn_border_width.' solid '.$dt_button_border_color_hover;       
}

if($dt_button_color != ''){
    
    $button_style[$button_unq_class]['color'] = $dt_button_color;       
}

if($dt_button_color != ''){
    
    $button_style[$button_unq_class.':hover']['color'] = $dt_button_hover_color;       
}

if($dt_button_bg_color_1 != ''){
    
    $button_style[$button_unq_class]['background-image'] = 'linear-gradient(to right, '.$dt_button_bg_color_1.' 0%, '.$dt_button_bg_color_2.' 51%, '.$dt_button_bg_color_3.' 100%)';       
}

if($dt_button_bg_hover_color_1 != ''){
    
    $button_style[$button_unq_class.':hover']['background-image'] = 'linear-gradient(to right, '.$dt_button_bg_hover_color_1.' 0%, '.$dt_button_bg_hover_color_2.' 51%, '.$dt_button_bg_hover_color_3.' 100%)';       
}



$button_style =  droit_css( $button_style );


wp_add_inline_style( 'dt_greadent_button_style', $button_style );