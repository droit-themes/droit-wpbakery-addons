<?php 

    $wrapper_unique_class = wp_unique_id('dt-icon-box-');
    $wrapper_class[] = $wrapper_unique_class;
    $wrapper_class[] = isset($dt_image_frame_animation_name) ? $dt_image_frame_animation_name : '';
    $wrapper_class[] = isset($dt_list_icon_wrapper_class) ? $dt_list_icon_wrapper_class : '';
    $wrapper_class[] = 'arch_service_item wow';
    $wrapper_class = join(' ', $wrapper_class);

    $animation_delay = '';

    if(isset($dt_image_frame_animation_delay) && $dt_image_frame_animation_delay != '') {
        $animation_delay = 'data-wow-delay='.$dt_image_frame_animation_delay;
    }

    $animation_duration = '';
    if(isset($dt_image_frame_animation_duration) && $dt_image_frame_animation_duration != '') {
        $animation_duration = 'data-wow-duration='.$dt_image_frame_animation_duration;
    }


$icon_html = '<i class="icon-Millions-of-Songs"></i>';

$icon_id = 'icon_picker_'.$icon_type;

if($icon_type != 'image') {

    $icon_html = '<i class="'.$$icon_id.'"></i>';

}elseif($icon_type == 'image') {

    $icon_html = wp_get_attachment_image($$icon_id, 'thumbnail');

}
//  title 

$box_title = '';
if(isset($dt_icon_box_title)) {
  $box_title = $dt_icon_box_title;
}
//  descrption 

$box_descrption = '';

if(isset($dt_icon_box_description)) {
    $box_descrption = $dt_icon_box_description;
  }

// link tile  
$box_link_title = '';
if(isset($dt_icon_box_link_title)) {
  $box_link_title = $dt_icon_box_link_title;
}

// link  

$box_link = '';
if(isset($dt_icon_box_link_title)) {
  $box_link = $dt_icon_box_link;
}

?>

<div class="<?php echo esc_attr( $wrapper_class ); ?>" <?php echo esc_attr($animation_delay).' '.esc_attr($animation_duration); ?>>
  <div class="icon-size"> 
    <?php echo dt_return($icon_html); ?>
  </div>
   <?php echo  dt_return(dt_link_before_after($box_link, 'before')); ?>
        <h3 class="dt-icon-box-style-2"><?php echo dt_extention_wp_kses( $box_title ); ?></h3>
   <?php echo dt_return(dt_link_before_after($box_link, 'after')); ?>
    <p class="dt-icon-box-description"><?php echo   dt_extention_wp_kses($box_descrption); ?></p>
   
    <?php echo dt_return(dt_link_before_after($box_link, 'before', 'agency_learn_btn arch_learn_btn', $box_link_title)); ?>
       <?php echo dt_extention_wp_kses($box_link_title); ?>
        <i class="icon-arrow-right-2"></i>
        <?php echo dt_return(dt_link_before_after($box_link, 'after')); ?>
</div>

<?php 

$icon_box_css = [];


if(isset($dt_list_icon_font_size) && $dt_list_icon_font_size != ''){
    
    $icon_box_css[$wrapper_unique_class.' .icon-size i']['font-size'] = $dt_list_icon_font_size;       
}

if(isset($dt_icon_box_icon_color) && $dt_icon_box_icon_color != ''){
    
    $icon_box_css[$wrapper_unique_class.' .icon-size i']['color'] = $dt_icon_box_icon_color;       
}

if(isset($dt_icon_box_icon_bg_color) && $dt_icon_box_icon_bg_color != ''){
    
    $icon_box_css[$wrapper_unique_class.' .icon-size i']['background'] = $dt_icon_box_icon_bg_color;       
}

//  Heading 

if(isset($dt_font_size_dt_icon_box_title) && $dt_font_size_dt_icon_box_title != ''){
    
    $icon_box_css[$wrapper_unique_class.' .dt-icon-box-style-2']['font-size'] = $dt_font_size_dt_icon_box_title;       
}

if(isset($dt_line_height_dt_icon_box_title) && $dt_line_height_dt_icon_box_title != ''){
    
    $icon_box_css[$wrapper_unique_class.' .dt-icon-box-style-2']['line-height'] = $dt_font_size_dt_icon_box_title;       
}

if(isset($dt_font_color_dt_icon_box_title) && $dt_font_color_dt_icon_box_title != ''){
    
    $icon_box_css[$wrapper_unique_class.' .dt-icon-box-style-2']['color'] = $dt_font_color_dt_icon_box_title;       
}
//  description 
if(isset($dt_font_size_dt_icon_box_dec) && $dt_font_size_dt_icon_box_dec != ''){
    
    $icon_box_css[$wrapper_unique_class.' .dt-icon-box-description']['font-size'] = $dt_font_size_dt_icon_box_dec;       
}

if(isset($dt_line_height_dt_icon_box_dec) && $dt_line_height_dt_icon_box_dec != ''){
    
    $icon_box_css[$wrapper_unique_class.' .dt-icon-box-description']['line-height'] = $dt_line_height_dt_icon_box_dec;       
}

if(isset($dt_font_color_dt_icon_box_dec) && $dt_font_color_dt_icon_box_dec != ''){
    
    $icon_box_css[$wrapper_unique_class.' .dt-icon-box-description']['color'] = $dt_font_color_dt_icon_box_dec;       
}


$render_css =  droit_css( $icon_box_css );

wp_enqueue_style('dt_icon_box_style');
wp_add_inline_style( 'dt_extend_style', $render_css );

