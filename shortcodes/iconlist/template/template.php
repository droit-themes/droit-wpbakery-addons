<?php 

$group_data = vc_param_group_parse_atts($droit_iconlist);

$wrapper_uniq_class = wp_unique_id('dt-icon-list-');
$wrapper_class []= vc_shortcode_custom_css_class($dt_wrapper_css);
$wrapper_class []= $wrapper_uniq_class;
$wrapper_class []= 'dt-icon-list';
$wrapper_class []= 'app_features_content';
$wrapper_class []= $dt_list_icon_wrapper_class;
$wrapper_class = join(' ', $wrapper_class);


?>
<div class="<?php echo esc_attr( $wrapper_class ); ?>">
   <?php if(is_array($group_data) && !empty($group_data)) : ?>

        <ul class="list-unstyled">
            <?php foreach($group_data as $key=>$data){ 
                
                   $icon_id = 'icon_picker_'.$data['icon_type'];
                  
                   if($icon_id !='icon_picker_image'){

                     $icon_html = '<i class="'.$data[$icon_id].'"></i>';

                   }elseif($icon_id =='icon_picker_image'){

                    $image_url = wp_get_attachment_image_src($data['icon_picker_image'])[0];
                    $icon_html = '<img src="'.$image_url.'" alt="'.$data['dt_list_icon_text'].'">';

                   }else{

                    $icon_html = '';   

                   }
                
                ?>
               <li><?php echo  dt_return($icon_html); ?> <span><?php echo esc_html($data['dt_list_icon_text']); ?></span></li>
            <?php } ?>
        </ul>

    <?php endif; ?>
</div>
<?php 

wp_enqueue_style('dt_extend_style');

// icon

if($dt_list_icon_mr != ''){
    
    $icon_list[$wrapper_uniq_class.' '.'ul li span']['margin-left'] = $dt_list_icon_mr;       
}

if($dt_list_icon_color != ''){
    
    $icon_list[$wrapper_uniq_class.' '.'ul li i']['color'] = $dt_list_icon_color;       
}

if($dt_list_icon_font_size != ''){
    
    $icon_list[$wrapper_uniq_class.' '.'ul li i']['font-size'] = $dt_list_icon_font_size;       
}

// text 

if($dt_font_size_dt_list_icon!= ''){
    $icon_list[$wrapper_uniq_class.' '.'ul li']['font-size'] = $dt_font_size_dt_list_icon;     
 }
 
 // dt_list_icon line height 
 if($dt_line_height_dt_list_icon!= ''){
    $icon_list[$wrapper_uniq_class.' '.'ul li']['line-height'] = $dt_line_height_dt_list_icon;     
 }
 // dt_list_icon font-weight
 if($dt_font_weight_dt_list_icon!= ''){
    $icon_list[$wrapper_uniq_class.' '.'ul li']['font-weight'] = $dt_font_weight_dt_list_icon ;     
 }
 
 if($dt_font_color_dt_list_icon!= ''){
   $icon_list[$wrapper_uniq_class.' '.'ul li']['color'] = $dt_font_color_dt_list_icon ;     
 }
 
$icon_list =  droit_css( $icon_list );


wp_add_inline_style( 'dt_extend_style', $icon_list );