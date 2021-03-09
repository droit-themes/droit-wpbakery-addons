<?php

$client_logo = vc_param_group_parse_atts($droit_client_logo);

?>
<div class="clients_logo_info">
    <?php if($dt_client_logo_title != '') : 
        $data =  preg_replace(array('/\(\(/', '/\)\)/'), array('<span>', '</span>'), $dt_client_logo_title);
        ?>
    <div class="clients_title">
         <?php  echo dt_extention_wp_kses($data); ?>
    </div>
    <?php endif; ?>
    <div class="clients_logo">
        <?php if($client_logo != '') : 
            foreach($client_logo as $logo){
                $url_attrs = vc_build_link($logo['dt_client_link_link']);
                $link_attr = '';

          
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
            <a <?php echo esc_attr(  $link_attr ); ?>>
             <?php echo dt_get_attachment_image($logo['dt_client_logo'], 'full'); ?>
           </a>
        <?php } endif; ?>
    </div>
</div>