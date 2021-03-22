<?php

$frame_image = vc_param_group_parse_atts($dt_image_frame_group);

$image_class []=  'img_dashboard d-block';
$image_class []=  'image-'.$dt_frame_aligment;
$image_class []=  'z-index-9';

$image_class =  join(' ', $image_class);


?>

<div class="dashboard_img">
    <?php echo wp_get_attachment_image( $dt_image_frame_img_main, 'full', null, array('class'=>$image_class) ); ?>
    <?php  if($frame_image) : 
         foreach($frame_image as $key=>$image) {

            echo '<pre>';
            print_r($image);
            echo '</pre>';
            
            $image_class = '';
            $dt_image_frame_animation_delay = '';
            $dt_image_frame_animation_duration = ''; 

            if($image['dt_image_frame_animation_name'] != '') {
                $image_class = ' '.$image['dt_image_frame_animation_name'].' wow';
            }
            
            if($image['dt_image_frame_animation_delay'] != '') {
               $dt_image_frame_animation_delay = $image['dt_image_frame_animation_delay'];
            }

            if($image['dt_image_frame_animation_duration'] != '') {
               $dt_image_frame_animation_duration = $image['dt_image_frame_animation_duration '];
            }

             if($key > 0) {
                 $img_class = 'pattern_two';
             }else{
                $img_class = 'pattern_one'; 
             }

             $style = '';

             if($image['dt_image_frame_top'] != '' || $image['dt_image_frame_left'] != '' || $image['dt_image_frame_z_index']) {
               
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
        echo wp_get_attachment_image($image['dt_image_frame_image'], 'full', null, array('class'=>$img_class.$image_class, 'style'=> $style, 'data-wow-delay' => $dt_image_frame_animation_delay, 'data-wow-duration' => $dt_image_frame_animation_duration ));
         ?>
    <?php } endif; ?>
</div>