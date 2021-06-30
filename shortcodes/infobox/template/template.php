<?php

$dt_link_list = [];

if(isset($dt_info_box_list)) {
    $dt_link_list = vc_param_group_parse_atts($dt_info_box_list); 
}

$wrapper_unique_class = wp_unique_id( 'dt-infobox-' );
$wrapper_class_list[]= 'about_service_item'; 
$wrapper_class_list[]= isset($dt_infobox_custom_wrapper_class) ? $dt_infobox_custom_wrapper_class : '' ; 
$wrapper_class_list[]= $wrapper_unique_class; 
$wrapper_class = join(' ', $wrapper_class_list);

?>

<div class="<?php echo esc_attr( $wrapper_class ); ?>" >
    <?php if(isset($dt_infobox_counter)){ ?>
    <div class="number"><?php echo esc_html($dt_infobox_counter); ?></div>
    <?php } 
      if(isset($dt_infobox_title)) {
    ?>
    <h3><?php echo dt_extention_wp_kses($dt_infobox_title); ?></h3>
    <?php } 
     if(isset($dt_infobox_content)) {
    ?>
    <p><?php echo dt_extention_wp_kses($dt_infobox_content); ?></p>
  <?php }  if(!empty($dt_link_list)) {  ?>
    <ul class="list-unstyled sevice_list">
         <?php foreach($dt_link_list as $list){ 
              echo '<li>'.dt_link_before_after($list['dt_infobox_link'], 'before').esc_html($list['dt_infobox_link_title']).dt_link_before_after($list['dt_infobox_link'], 'after').'</li>';   } 
          ?>
    </ul>
   <?php  } ?>
   
</div>