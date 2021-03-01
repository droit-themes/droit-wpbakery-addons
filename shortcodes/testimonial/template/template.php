<?php

$group_data = vc_param_group_parse_atts($droit_testimonial_content);
$wrapper_uniqueu_class = wp_unique_id('dt-testimonial-');
$wrapper_class[] = $wrapper_uniqueu_class;
$wrapper_class[] = 'h_testimonial_slider_inner';
$wrapper_class = join (' ', $wrapper_class);

$title_unique_class = wp_unique_id('dt-testimonial-');
$title_class[] = $title_unique_class;
$title_class[] = 'a_title text-center';
$title_class = join (' ', $title_class);

$review_class = wp_unique_id('dt-testimonial-review-');
$author_class = wp_unique_id('dt-testimonial-author-');
$designation_unique_class = wp_unique_id('dt-testimonial-designation-');

$designation_class[] = $designation_unique_class;
$designation_class[] = 'position';
$designation_class = join(' ', $designation_class);

?>

<div class="<?php echo esc_attr( $wrapper_class ); ?>">
    <div class="h_testimonial_thumb">
        <?php if('' != $group_data){ 
            foreach($group_data as $key=>$data){

               $data_attr = '';
               if($key) {
                $data_attr = 'data-wow-delay=0.'.$key.'s'; 
               }
           
            ?>
           
            <div class="item">
                <div class="wow zoomIn" <?php echo esc_attr($data_attr); ?> >
                    <?php echo wp_get_attachment_image($data['dt_ttm_img'], array(150, 150), "", array( "class" => "item_img" ) );  ?>
                </div>
            </div>
      <?php }} ?>  
        
    </div>
<h6 class="<?php echo esc_attr( $title_class ); ?>"><?php echo  esc_html($dt_cunter_up_title); ?></h6>
<div class="h_testimonial_slider">
<?php if('' != $group_data){  
     
     foreach($group_data as $data){  ?>

    <div class="item">
        <?php if($data['dt_ttm_auther_comment'] != '') : ?>
        <h2 class="<?php echo esc_attr($review_class) ?>"><?php echo dt_extention_wp_kses($data['dt_ttm_auther_comment']); ?></h2>
        <?php endif; ?>
        <?php if(($data['dt_ttm_author_name'] != '') || ($data['dt_ttm_author_designation'] != '')){ ?>
        <div class="testimonial_author">
            <?php if($data['dt_ttm_author_name'] != '') :  ?>
            <h6 class="<?php echo esc_attr( $author_class ); ?>"><?php echo dt_extention_wp_kses($data['dt_ttm_author_name']); ?></h6>
            <?php endif; 
             if($data['dt_ttm_author_designation'] != '') :
            ?>
            <div class="<?php echo esc_attr( $designation_class ); ?>"><?php echo dt_extention_wp_kses($data['dt_ttm_author_designation']); ?></div>
            <?php endif; ?>
        </div>
        <?php } ?>
    </div>
<?php }} ?>
</div>
<?php 

wp_enqueue_style('dt_extend_style');

$template_css = [];

//  Title 
if($dt_font_size_title!= ''){
   $template_css[$title_unique_class]['font-size'] = $dt_font_size_title;     
}

// title line height 
if($dt_line_height_title!= ''){
   $template_css[$title_unique_class]['line-height'] = $dt_line_height_title;     

}
// title font-weight
if($dt_font_weight_title!= ''){
   $template_css[$title_unique_class]['font-weight'] = $dt_font_weight_title ;     
}

if($dt_font_color_title!= ''){
$template_css[$title_unique_class]['color'] = $dt_font_color_title ;     
}

//  review 

if($dt_font_size_review!= ''){
    $template_css[$review_class]['font-size'] = $dt_font_size_review;     
 }
 
 // title line height 
 if($dt_line_height_review!= ''){
    $template_css[$review_class]['line-height'] = $dt_line_height_review;     
 
 }
 // title font-weight
 if($dt_font_weight_review!= ''){
    $template_css[$review_class]['font-weight'] = $dt_font_weight_review ;     
 }
 
 if($dt_font_color_review!= ''){
 $template_css[$review_class]['color'] = $dt_font_color_review ;     
 }
 
//  Authoer 

if($dt_font_size_authoer!= ''){
    $template_css[$author_class]['font-size'] = $dt_font_size_authoer;     
 }
 
 // title line height 
 if($dt_line_height_authoer!= ''){
    $template_css[$author_class]['line-height'] = $dt_line_height_authoer;     
 
 }
 // title font-weight
 if($dt_font_weight_authoer!= ''){
    $template_css[$author_class]['font-weight'] = $dt_font_weight_authoer;     
 }
 
 if($dt_font_color_authoer!= ''){
 $template_css[$author_class]['color'] = $dt_font_color_authoer;     
 }

//  designation 

if($dt_font_size_designation!= ''){
    $template_css[$designation_unique_class]['font-size'] = $dt_font_size_designation;     
 }
 
 // title line height 
 if($dt_line_height_designation!= ''){
    $template_css[$designation_unique_class]['line-height'] = $dt_line_height_designation;     
 
 }
 // title font-weight
 if($dt_font_weight_designation!= ''){
    $template_css[$designation_unique_class]['font-weight'] = $dt_font_weight_designation ;     
 }
 
 if($dt_font_color_designation!= ''){
 $template_css[$designation_unique_class]['color'] = $dt_font_color_designation ;     
 }
 

$custom_css =  droit_css( $template_css );

wp_add_inline_style( 'dt_extend_style', $custom_css );
