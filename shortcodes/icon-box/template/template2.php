<?php 

    $wrapper_unique_class = wp_unique_id('dt-icon-box-');
    $wrapper_class[] = $wrapper_unique_class;
    $wrapper_class[] = $dt_image_frame_animation_name;
    $wrapper_class[] = $dt_list_icon_wrapper_class;
    $wrapper_class[] = 'arch_service_item wow';
    $wrapper_class = join(' ', $wrapper_class);

    $animation_delay = '';

    if($dt_image_frame_animation_delay != '') {
        $animation_delay = 'data-wow-delay='.$dt_image_frame_animation_delay;
    }

    $animation_duration = '';
    if($dt_image_frame_animation_duration != '') {
        $animation_duration = 'data-wow-duration='.$dt_image_frame_animation_duration;
    }


$icon_html = '<i class="icon-Millions-of-Songs"></i>';

$icon_id = 'icon_picker_'.$icon_type;

if($icon_type != 'image') {

    $icon_html = '<i class="'.$$icon_id.'"></i>';

}elseif($icon_type == 'image') {

    $icon_html = wp_get_attachment_image($$icon_id, 'thumbnail');

}

?>

<div class="<?php echo esc_attr( $wrapper_class ); ?>" <?php echo esc_attr($animation_delay).' '.esc_attr($animation_duration); ?>>
  <div class="icon-size"> 
    <?php echo dt_return($icon_html); ?>
  </div>
   <?php echo  dt_return(dt_link_before_after($dt_icon_box_link, 'before')); ?>
        <h3 class="icon-box-style-2"><?php echo dt_extention_wp_kses( $dt_icon_box_title ); ?></h3>
   <?php echo dt_return(dt_link_before_after($dt_icon_box_link, 'after')); ?>
    <p class="icon-box-description"><?php echo   dt_extention_wp_kses($dt_icon_box_description); ?></p>
   
    <?php echo dt_return(dt_link_before_after($dt_icon_box_link, 'before', 'agency_learn_btn arch_learn_btn', $dt_icon_box_link_title)); ?>
       <?php echo dt_extention_wp_kses($dt_icon_box_link_title); ?>
        <i class="icon-arrow-right-2"></i>
        <?php echo dt_return(dt_link_before_after($dt_icon_box_link, 'after')); ?>
</div>

<?php 

$icon_box_css = [];


if($dt_list_icon_font_size != ''){
    
    $icon_box_css[$wrapper_unique_class.' .icon-size i']['font-size'] = $dt_list_icon_font_size;       
}
if($dt_icon_box_icon_color != ''){
    
    $icon_box_css[$wrapper_unique_class.' .icon-size i']['color'] = $dt_icon_box_icon_color;       
}
if($dt_icon_box_icon_bg_color != ''){
    
    $icon_box_css[$wrapper_unique_class.' .icon-size i']['background'] = $dt_icon_box_icon_bg_color;       
}

//  Heading 

if($dt_font_size_dt_icon_box_title != ''){
    
    $icon_box_css[$wrapper_unique_class.' .icon-box-style-2']['font-size'] = $dt_font_size_dt_icon_box_title;       
}
if($dt_line_height_dt_icon_box_title != ''){
    
    $icon_box_css[$wrapper_unique_class.' .icon-box-style-2']['line-height'] = $dt_font_size_dt_icon_box_title;       
}

if($dt_font_color_dt_icon_box_title != ''){
    
    $icon_box_css[$wrapper_unique_class.' .icon-box-style-2']['color'] = $dt_font_color_dt_icon_box_title;       
}
//  description 
if($dt_font_size_dt_icon_box_dec != ''){
    
    $icon_box_css[$wrapper_unique_class.' .icon-box-description']['font-size'] = $dt_font_size_dt_icon_box_dec;       
}

if($dt_line_height_dt_icon_box_dec != ''){
    
    $icon_box_css[$wrapper_unique_class.' .icon-box-description']['line-height'] = $dt_line_height_dt_icon_box_dec;       
}

if($dt_font_color_dt_icon_box_dec != ''){
    
    $icon_box_css[$wrapper_unique_class.' .icon-box-description']['color'] = $dt_font_color_dt_icon_box_dec;       
}


$render_css =  droit_css( $icon_box_css );

wp_enqueue_style('dt_icon_box_style');
wp_add_inline_style( 'dt_extend_style', $render_css );

