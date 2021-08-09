<?php 

$client_logo = vc_param_group_parse_atts($droit_client_logo_style3);
$wrapper_uniqueu_class = wp_unique_id('dt-counter-up-');
$wrapper_class[] = $wrapper_uniqueu_class;
$wrapper_class[] = 'startup_clients_logo_inner';

if(isset($dt_client_logo_wrapper_class)){
    $wrapper_class[] = $dt_client_logo_wrapper_class;
} 

$wrapper_class_generate = join(' ', $wrapper_class);

?>
<div class="<?php echo esc_attr($wrapper_class_generate); ?>" style="margin-bottom: 0">
<?php if($client_logo != '') { 
    foreach($client_logo as $logo){
        $url_attrs = '';
        if(isset($logo['dt_client_link_link_style3'])){
         $url_attrs = vc_build_link($logo['dt_client_link_link_style3']);
        }
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
        <?php echo dt_get_attachment_image($logo['dt_client_logo_style3'], 'full', array('class' => 'mb-0')); ?>
        <?php echo dt_get_attachment_image($logo['dt_client_logo_hover_style3'], 'full', array( "class" => "mb-0" )); ?>
    </a>
    
   <?php }} ?> 
</div>