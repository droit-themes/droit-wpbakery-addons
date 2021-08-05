<?php 

$title_unique_class = wp_unique_id('dt-counter-up-');
$title_class [] = $title_unique_class;
$title_class [] = 'odometer';
$title_class = join(' ', $title_class);

$p_unique_class = wp_unique_id('dt-counter-up-title-');

$cuonter_num = $cuonter_suffix = $counter_up_title = '';

if ( isset($dt_cunter_up_number) ) {
    $cuonter_num = $dt_cunter_up_number;
}

if ( isset($dt_cunter_up_suffix) ) {
    $cuonter_suffix = $dt_cunter_up_suffix;
}

if ( isset($dt_cunter_up_title) ) {
    $counter_up_title = $dt_cunter_up_title;
}
?>
<div class="counter_item text-center">
    <div class="odometer_content">
        <h3 class="<?php echo esc_attr( $title_class ); ?>" data-odometer-final="<?php echo esc_attr($cuonter_num); ?>"></h3>
        <span class="<?php echo esc_attr( $title_unique_class ); ?>"><?php echo dt_extention_wp_kses($cuonter_suffix); ?></span>
    </div>
    <p class="<?php echo esc_attr( $p_unique_class ); ?>"><?php echo dt_extention_wp_kses($counter_up_title); ?></p>
</div>
<?php   

wp_enqueue_style('dt_extend_style');

$template_css = [];

//  counter text 
if(isset($dt_font_size_number) && $dt_font_size_number!= ''){
   $template_css[$title_unique_class]['font-size'] = $dt_font_size_number;     
}

// title line height 
if(isset($dt_line_height_number) && $dt_line_height_number!= ''){
   $template_css[$title_unique_class]['line-height'] = $dt_line_height_number;     

}
// title font-weight
if(isset($dt_font_weight_number) && $dt_font_weight_number!= ''){
   $template_css[$title_unique_class]['font-weight'] = $dt_font_weight_number ;     
}

if(isset($dt_font_color_number) && $dt_font_color_number!= ''){
$template_css[$title_unique_class]['color'] = $dt_font_color_number ;     
}


  // title font Size 
  if(isset($dt_font_size_title) && $dt_font_size_title!= ''){
       $template_css[$p_unique_class]['font-size'] = $dt_font_size_title;     
  }

   // title line height 
   if(isset($dt_line_height_title) && $dt_line_height_title!= ''){
       $template_css[$p_unique_class]['line-height'] = $dt_line_height_title;     
  
   }
   // title font-weight
   if(isset($dt_font_weight_title) && $dt_font_weight_title!= ''){
       $template_css[$p_unique_class]['font-weight'] = $dt_font_weight_title ;     
  }

  if(isset($dt_font_color_title) && $dt_font_color_title!= ''){
   $template_css[$p_unique_class]['color'] = $dt_font_color_title ;     
}

$custom_css =  droit_css( $template_css );

wp_add_inline_style( 'dt_extend_style', $custom_css );
