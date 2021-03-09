<?php 

$client_logo = vc_param_group_parse_atts($droit_client_logo_style3);

?>
<div class="startup_clients_logo_inner" style="margin-bottom: 0">
<?php if($client_logo != '') { 
    foreach($client_logo as $logo){
        $url_attrs = vc_build_link($logo['dt_client_link_link_style3']);
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

    <a <?php echo esc_attr(  $link_attr ); ?> class="startup_clients_logo">
        <?php echo dt_get_attachment_image($logo['dt_client_logo_style3'], 'full'); ?>
        <?php echo dt_get_attachment_image($logo['dt_client_logo_hover_style3'], 'full'); ?>
    </a>
    
   <?php }} ?> 
</div>