<?php 

$client_logo = vc_param_group_parse_atts($droit_client_logo);

?>
<div class="intrigration_inner">
<?php foreach($client_logo as $key=>$logo){ 

      $url_attrs = vc_build_link($logo['dt_client_link_link']);
      $link_attr = '';
      $data_delay = '';
      if($key) {
         $data_delay =  'data-wow-delay="0.'.$key.'s"';
      }

      if(!empty($url_attrs)){
        foreach ($url_attrs as $key => $attr){
        
            if($key != 'title' && $attr != ''){

                if($key == 'url'){
                    $key = 'href';
                }

                $link_attr .= $key.'='.$attr.' ';
    
            }
        }

    }

    ?>
    <a <?php echo esc_attr(  $link_attr ); ?> class="intrigration_item wow fadeInDown" <?php echo esc_attr($data_delay); ?>>
        <div class="intrigration_img">
            <?php echo dt_get_attachment_image($logo['dt_client_logo'], 'full'); ?>
            <p><?php echo  dt_extention_wp_kses($logo['dt_client_logo_title']); ?></p>
        </div>
    </a>
  <?php } ?>
 </div>