<?php

$frame_image = vc_param_group_parse_atts($dt_image_frame_group);

?>

<div class="dashboard_img">
    <?php echo wp_get_attachment_image( $dt_image_frame_img_main, 'full', null, array('class'=>'img_dashboard') ); ?>
    <?php  if($frame_image) : 
         foreach($frame_image as $key=>$image) {
            
             if($key > 0) {
                 $img_class = 'pattern_two';
             }else{
                $img_class = 'pattern_one'; 
             }

             $style = '';

             if($image['dt_image_frame_top'] != '' || $image['dt_image_frame_left'] != '') {
               
               if($image['dt_image_frame_top'] != '') {
                $style = 'top:'.$image['dt_image_frame_top'].';';
               } 
               if($image['dt_image_frame_left'] != '') {
                $style .='left:'.$image['dt_image_frame_left'];
               } 

             }
        ?>
        <?php 
        echo wp_get_attachment_image($image['dt_image_frame_image'], 'full', null, array('class'=>$img_class, 'style'=> $style));
         ?>
    <?php } endif; ?>
</div>