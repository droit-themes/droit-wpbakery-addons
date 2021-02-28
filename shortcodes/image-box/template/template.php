<?php  

$url_attrs = array_filter(vc_build_link($dt_img_link));
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

?>

<div class="build_item text-center">
    <?php if($dt_image_box_img != ''){
        echo dt_get_attachment_image($dt_image_box_img, [170, 140]);
    } 
     if($dt_image_box_title):  echo  dt_return($link_beofre); ?>
       <h3 class="agency_learn_btn"><?php echo dt_extention_wp_kses($dt_image_box_title); ?></h3>
    <?php echo  dt_return($link_after); endif; ?>

    <?php if($dt_title_description):  ?>
       <p><?php echo dt_extention_wp_kses($dt_title_description); ?></p>
    <?php endif; ?>
</div>


