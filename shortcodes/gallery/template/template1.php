<?php 
  $gallery_items = vc_param_group_parse_atts($droit_gallery_content);
  wp_enqueue_style( 'dt-vc-main' );
?>

<ul class="list-unstyled about_gallery">
    <?php
    $i = 1;
     foreach($gallery_items as $item) {
         
        $data_duration = '';
            if($i    != 1) {
            $data_duration = 'data-wow-delay=0.'.$i.'s';
            } 
        $url_attrs = [];   

        if(isset($item['dt_gallery_link'])) {
           $url_attrs = array_filter(vc_build_link($item['dt_gallery_link']));
        }

        $link_beofre = '';
        $link_after = '';
        $link_attr = '';
        
         if(!empty($url_attrs)){
            foreach ($url_attrs as $key => $attr){
               
                if($key != 'title'){
                    if($key == 'url'){
                        $key = 'href';
                    }
                    $link_attr .= $key.'='.$attr.' ';
        
                }
            }
            $link_beofre = '<a '.esc_attr( $link_attr ).'>';  
            $link_after = '</a>';
         }

         $style_attr = '';

         if(!empty($item['gallery_image_top_pos']) || !empty($item['gallery_image_left_pos']) ){
            
            $left_pos = '';
             if(!empty($item['gallery_image_top_pos'])){
                 $left_pos = 'left:'.$item['gallery_image_top_pos'].';';
             }
            $top_pos = '';
             if(!empty($item['gallery_image_left_pos'])){
                $top_pos = 'top:'.$item['gallery_image_left_pos'];
             }
             $style_attr = 'style='.$left_pos.$top_pos;
            
         }
         ?>
          <li class="wow fadeInDown" <?php echo esc_attr( $data_duration.' '.$style_attr ); ?>>
            <?php 
              echo  dt_return($link_beofre);
              echo dt_get_attachment_image($item['dt_gallery_img'], 'full');
              echo  dt_return($link_after);
             ?>
         </li>
         <?php 
       $i++;  
     }
    ?>
</ul>
