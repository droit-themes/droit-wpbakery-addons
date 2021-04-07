<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$subtitle_class = vc_shortcode_custom_css_class($subtitle_css);

$wrapper_class[] = 'text-'.$dt_title_aligment;
$wrapper_class[] = 'banner_text_intro';
$wrapper_class[] = droit_getCSSAnimation($css_animation);
$wrapper_class[] = ($element_custon_class != '' ) ? $element_custon_class : '';
$wrapper_class =  join(' ', $wrapper_class);

$subtitle_unique_class = wp_unique_id('dt-subtitle-');
$title_unique_class = wp_unique_id('dt-title-');
$title_desc_unique_class = wp_unique_id('dt-title-description-');

//  Sub heading 

$subheadingtag = 'span';

if($dt_heading_subtitle_tag_style != '') {

     $subheadingtag = $dt_heading_subtitle_tag_style;
}

// heading tag 

$heading_tag = 'h2';

if($dt_heading_title_tag != '') {

     $heading_tag = $dt_heading_title_tag;
}

$description_tag = 'p';

if($dt_heading_description_tag != '') {

     $description_tag = $dt_heading_description_tag;
}

?>

<div class="<?php echo esc_attr($wrapper_class); ?>">

     <?php if('' !=$dt_subtitle ) :  ?>

        <<?php echo dt_return($subheadingtag); ?> class="dt-subtitle brand_name <?php echo esc_attr($subtitle_unique_class.' '.$subtitle_class ); ?>">
        <?php if($dt_subtitle_tag != '') :  ?>  
          <span class="b_tag_vc"><?php echo esc_html($dt_subtitle_tag); ?></span>
        <?php endif; ?>  
        <?php echo esc_html($dt_subtitle); ?> 
       </<?php echo dt_return($subheadingtag); ?>>
      <?php endif; ?>

     <?php if('' !=$dt_title ) :  ?>
     <<?php echo dt_return($heading_tag); ?> class="dt-ttile title <?php echo esc_attr( $title_unique_class ); ?>"><?php echo dt_extention_wp_kses($dt_title); ?></<?php echo dt_return($heading_tag); ?>>
      <?php endif; ?>

     <?php if('' !=$dt_title_description ) :  ?>
     <<?php echo dt_return($description_tag); ?> class="dt-title-description subtitle <?php echo esc_attr( $title_desc_unique_class ); ?>"><?php echo dt_extention_wp_kses($dt_title_description); ?></<?php echo dt_return($description_tag); ?>>
      <?php endif; ?>

</div>
<?php 

   wp_enqueue_style('dt_extend_style');
        
   $template_css = [];

   // sub title color 
if($dt_sub_title_batch_bg_color != ''){

     $template_css[$subtitle_unique_class.' '.'span']['background-color'] = $dt_sub_title_batch_bg_color;     
}

if($dt_subtitle_batch_font_size != ''){

     $template_css[$subtitle_unique_class.' '.'span']['font-size'] = $dt_subtitle_batch_font_size;     
}

if($dt_sub_title_color != ''){

     $template_css[$subtitle_unique_class]['color'] = $dt_sub_title_color;     
}

if($dt_subtitle_font_size != ''){
     
     $template_css[$subtitle_unique_class]['font-size'] =  $dt_subtitle_font_size;      
}

if($dt_subtitle_line_height != ''){
     
     $template_css[$subtitle_unique_class]['line-height'] =  $dt_subtitle_line_height;      
}

if($dt_subtitle_font_weight != ''){
     
     $template_css[$subtitle_unique_class]['font-weight'] =  $dt_subtitle_font_weight;      
}

   //  title 

if($dt_title_color != ''){

     $template_css[$title_unique_class]['color'] = $dt_title_color;     
}

if($dt_title_font_size != ''){
     
     $template_css[$title_unique_class]['font-size'] =  $dt_title_font_size;      
}

if($dt_title_line_height != ''){
     
     $template_css[$title_unique_class]['line-height'] =  $dt_title_line_height;      
}

if($dt_title_margin_top != ''){
     
     $template_css[$title_unique_class]['margin-top'] =  $dt_title_margin_top;      
}

if($dt_title_margin_bottom != ''){
     
     $template_css[$title_unique_class]['margin-bottom'] =  $dt_title_margin_bottom;      
}

if($dt_title_font_wegiht != ''){
     
     $template_css[$title_unique_class]['font-weight'] =  $dt_title_font_wegiht;      
}

   // Title Description 

if($dt_title_description_color != ''){

     $template_css[$title_desc_unique_class]['color'] = $dt_title_description_color;     
}

if($dt_title_description_font_size != ''){
     
     $template_css[$title_desc_unique_class]['font-size'] =  $dt_title_description_font_size;      
}

if($dt_title_description_line_height != ''){
     
     $template_css[$title_desc_unique_class]['line-height'] =  $dt_title_description_line_height;      
}

$custom_css =  droit_css( $template_css );

 wp_add_inline_style( 'dt_extend_style', $custom_css );

