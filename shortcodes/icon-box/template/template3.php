<?php  
wp_enqueue_style('dt_icon_box_style');
$wrapper_unique_class = wp_unique_id('dt-icon-box-');
$wrapper_class[] = $wrapper_unique_class;
$wrapper_class[] = isset($dt_image_frame_animation_name) ? $dt_image_frame_animation_name : '';
$wrapper_class[] = isset($dt_list_icon_wrapper_class) ? $dt_list_icon_wrapper_class : '';
$wrapper_class[] = 'media corporate_service_item wow';
$wrapper_class = join(' ', $wrapper_class);


$icon_html = '<i class="icon-Millions-of-Songs"></i>';

$icon_id = 'icon_picker_'.$icon_type;

if($icon_type != 'image') {

    $icon_html = '<i class="'.$$icon_id.'"></i>';

}elseif($icon_type == 'image') {

    $icon_html = wp_get_attachment_image($$icon_id, 'thumbnail');
}

$link_before = '';
$link_after = '';
if(isset($dt_icon_box_link) != '') {
    $link_before = dt_link_before_after($dt_icon_box_link, 'before');
    $link_after  = dt_link_before_after($dt_icon_box_link, 'after');
}

?>

<div class="<?php echo esc_attr($wrapper_class); ?>" <?php echo esc_attr( get_animation_attr(isset($dt_image_frame_animation_delay) ? $dt_image_frame_animation_delay : '', isset($dt_image_frame_animation_duration) ? $dt_image_frame_animation_duration : '')); ?>>
  <?php echo dt_return($icon_html); ?>
    <div class="media-body">
     <?php echo dt_return($link_before); ?>
            <?php if(isset($dt_icon_box_title)){ ?>
              <h4><?php echo dt_extention_wp_kses( $dt_icon_box_title ); ?></h4>
            <?php } ?>
     <?php echo dt_return($link_after); ?>
     <?php if(isset($dt_icon_box_description)) { ?>
        <p><?php echo dt_extention_wp_kses($dt_icon_box_description); ?></p>
     <?php } ?>       
    </div>
</div>

<?php 

$icon_box_css = [];

if(isset($dt_icon_box_icon_color) != ''){
    
  $icon_box_css[$wrapper_unique_class.' i']['color'] = $dt_icon_box_icon_color;       
}

if(isset($dt_icon_box_icon_bg_color) != ''){
    
  $icon_box_css[$wrapper_unique_class.'i']['background-color'] = $dt_icon_box_icon_bg_color;       
}

if(isset($dt_list_icon_margin) != ''){
    
  $icon_box_css[$wrapper_unique_class.' i']['margin'] = $dt_list_icon_margin;       
}

//  title 
if(isset($dt_font_size_dt_icon_box_title) != ''){
    
  $icon_box_css[$wrapper_unique_class.' h4']['font-size'] = $dt_font_size_dt_icon_box_title;       
}

if(isset($dt_font_color_dt_icon_box_title) != ''){
  
  $icon_box_css[$wrapper_unique_class.' h4']['color'] = $dt_font_color_dt_icon_box_title;       
}

if(isset($dt_line_height_dt_icon_box_title) != ''){
  
  $icon_box_css[$wrapper_unique_class.' h4']['line-height'] = $dt_line_height_dt_icon_box_title;       
}

//  description 


if(isset($dt_font_size_dt_icon_box_dec) != ''){
    
  $icon_box_css[$wrapper_unique_class.' p']['font-size'] = $dt_font_size_dt_icon_box_dec;       
}

if(isset($dt_font_color_dt_icon_box_dec)){
  
  $icon_box_css[$wrapper_unique_class.' p']['color'] = $dt_font_color_dt_icon_box_dec;       
}

if(isset($dt_line_height_dt_icon_box_title)){
  
  $icon_box_css[$wrapper_unique_class.' p']['line-height'] = $dt_line_height_dt_icon_box_title;       
}


$render_css =  droit_css( $icon_box_css );


wp_add_inline_style( 'dt_icon_box_style', $render_css );