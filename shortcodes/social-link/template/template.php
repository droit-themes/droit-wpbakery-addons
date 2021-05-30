<?php 

$social_link_item = vc_param_group_parse_atts($droit_gallery_content);

?>

<ul class="list-unstyled h_social_icon mobile_none">
   <?php foreach($social_link_item as $item) { 

      $url_attrs = vc_build_link($item['dt_social_link_link']);
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

       $icon_enable = '';
       if(isset($item['icon_type'])) {
           $icon_enable = 'icon_picker_'.$item['icon_type'];
           ?>
        <li>
           <a <?php echo esc_attr(  $link_attr ); ?>><i class="<?php echo esc_attr( $item[$icon_enable] ); ?>"></i></a>
        </li> 
           <?php 
       }
        } ?>                      
</ul>

<?php 

wp_enqueue_style('dt_extend_style');
