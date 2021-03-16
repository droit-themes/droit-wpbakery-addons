<?php 

 $carousel_data = vc_param_group_parse_atts($droit_service_content);

?>

<div class="container">
<div class="row">
    <?php if(!empty($carousel_data)  && is_array($carousel_data)){
         
         foreach($carousel_data as $key=>$data) {
            
             $wrapper_class = 'startup_service_item text-center wow fadeInUp animated';
             if($key == 1) {
                $wrapper_class .= ' two';
             }
             if($key == 2) {
                $wrapper_class .= ' three';
             }

             $style = '';
             if($data['dt_service_background_color'] != ''){
                $style = 'style=background:'.$data['dt_service_background_color'];
             }

             $data_delay = 'data-wow-delay="0.'.($key+1).'s"';
             
             $url_attrs = vc_build_link($data['dt_service_link']);
            
             foreach ($url_attrs as $key => $attr){
			
				if($key != 'title' && $attr != ''){

					if($key == 'url'){
						$key = 'href';
					}

					$link_attr .= $key.'='.$attr.' ';
		
				}
			}

            ?>
             <div class="col-lg-4 col-sm-6">
                <div class="<?php echo esc_attr( $wrapper_class ); ?>"  <?php echo esc_attr($style).' '.$data_delay ?>>
                 <?php if($data['dt_gallery_img'] !=''){
                     echo dt_get_attachment_image($data['dt_gallery_img'], 'full', array('class'=> 'dt-service'));
                 } 
                  if($data['dt_service_title'] != '') {
                      ?>
                        <h5><?php echo dt_extention_wp_kses($data['dt_service_title']); ?></h5>
                      <?php  } 
                      
                      if($data['dt_service_description'] != '') {
                          ?>
                         <p> <?php echo dt_extention_wp_kses($data['dt_service_description']); ?></p>
                          <?php  } ?>    
        
                    <a <?php echo esc_attr($link_attr); ?> class="s_service_btn"> <?php echo dt_extention_wp_kses($data['dt_service_button_text']); ?></a>
                </div>
            </div>
             <?php } ?> 
    <?php } ?>
</div>
</div>