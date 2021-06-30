<?php

$frame_image = vc_param_group_parse_atts($dt_image_frame_group);

$image_class []=  'img_dashboard d-block';
$image_class []=  'image-'.$dt_frame_aligment;
$image_class []=  'z-index-9';

$image_class =  join(' ', $image_class);

$style = '';
if(isset($dt_image_frame_border_radious) && $dt_image_frame_border_radious != '') {
   $style = 'border-radius:'.$dt_image_frame_border_radious;
}

$wrapper_class_list[] = 'dashboard_img about_member_item';
if(isset($dt_image_frame_custom_class)) {
   $wrapper_class_list[] = $dt_image_frame_custom_class;
}
$wrapper_class_list[] = wp_unique_id( 'dashboard-img-' );

$wrapper_class = join(' ', $wrapper_class_list);

?>

<div class="<?php echo esc_attr( $wrapper_class ); ?>">
    <?php echo wp_get_attachment_image( $dt_image_frame_img_main, 'full', null, array('class'=>$image_class, 'style' => $style ) ); ?>
    <?php  if($frame_image) : 
    
         foreach($frame_image as $key=>$image) {

            $parallex = '';

            if(isset($image['dt_enable_parallex'])) {

               $paralexX = $image['dt_image_frame_parallex_x'];
               $paralxY = $image['dt_image_frame_parallex_y'];

               if($paralexX != '' && $paralxY != '') {
                  $parallex =  '{"y": '.$paralexX.', "x": '.$paralxY.'}';
               }

               if($paralexX != '' && $paralxY == '') {
                  $parallex =  '{ "x": '.$paralexX.'}';
               }
               if($paralxY != '' && $paralexX == '') {
                  $parallex =  '{ "y": '.$paralxY.'}';
               }
            }
            
            $image_class = '';
            $dt_image_frame_animation_delay = '';
            $dt_image_frame_animation_duration = ''; 

            if(isset($image['dt_image_frame_animation_name']) && $image['dt_image_frame_animation_name'] != '') {
                $image_class = ' '.$image['dt_image_frame_animation_name'].' wow';
            }
            
            if(isset($image['dt_image_frame_animation_delay']) && $image['dt_image_frame_animation_delay'] != '') {
               $dt_image_frame_animation_delay = $image['dt_image_frame_animation_delay'];
            }

            if(isset($image['dt_image_frame_animation_duration']) && $image['dt_image_frame_animation_duration'] != '') {
               $dt_image_frame_animation_duration = $image['dt_image_frame_animation_duration '];
            }

             if($key > 0) {
                 $img_class = 'pattern_two';
             }else{
                $img_class = 'pattern_one'; 
             }

             $style = '';

             if((isset($image['dt_image_frame_top']) && $image['dt_image_frame_top'] != '') || (isset($image['dt_image_frame_left']) && $image['dt_image_frame_left'] != '') || isset($image['dt_image_frame_z_index'])) {
               
               if($image['dt_image_frame_top'] != '') {
                $style = 'top:'.$image['dt_image_frame_top'].';';
               } 
               if($image['dt_image_frame_left'] != '') {
                $style .='left:'.$image['dt_image_frame_left'];
               } 
               if($image['dt_image_frame_z_index'] != '') {
                $style .='z-index:'.$image['dt_image_frame_z_index'];
               } 

             }
        ?>
        <?php 
        echo wp_get_attachment_image($image['dt_image_frame_image'], 'full', null, array('class'=>$img_class.$image_class, 'style'=> $style, 'data-wow-delay' => $dt_image_frame_animation_delay, 'data-wow-duration' => $dt_image_frame_animation_duration, 'data-parallax' => $parallex ));
         ?>
    <?php } endif; ?>
</div>