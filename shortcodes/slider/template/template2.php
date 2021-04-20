<?php

$slider_items = vc_param_group_parse_atts($droit_slider_content_style_2);

?>
<div class="corporate_banner_area">
            <div class="main_slider">
                <?php if(!empty($slider_items) && is_array($slider_items)){
                    
                    foreach($slider_items as $key=>$item){ ?>

                    <div class="slider_item">
                        <div class="overlay_bg" style="background: linear-gradient(
                                rgba(0, 0, 0, 0.2), 
                                rgba(0, 0, 0, 0.2)
                            ), url('<?php echo esc_url(wp_get_attachment_image_url($item['dt_slider_img'], 'full')); ?>') no-repeat scroll center 0 / cover;">
                        </div>
                        <div class="container">
                            <div class="corporate_banner_text">

                               <?php if($key == 0){
                                   ?>
                                   <h2><?php echo esc_html($item['dt_slider_title_style_2']); ?></h2>
                                   <p><?php echo esc_html($item['dt_slider_sub_title_style_2']); ?></p>
                                   <?php 
                               }else{
                                    ?>
                                <h2 data-animation="wow fadeInUp"><?php echo esc_html($item['dt_slider_title_style_2']); ?></h2>
                                <p data-animation="wow fadeInUp" data-wow-delay="0.7s"><?php echo esc_html($item['dt_slider_sub_title_style_2']); ?></p>
                                <?php } ?>
                                <div class="d-flex align-items-center">
                                  <?php 
                                  
                                  //  link 1
                                  
                                   echo dt_return(dt_link_before_after($item['dt_slider_button_link_1'], 'before',  'corporate_btn hover_style1', array('data-wow-delay' => '0.4s', 'data-animation-duration'=> '0.9s'))). 
                                  
                                    esc_html($item['dt_slider_button_style_2']).  dt_return(dt_link_before_after($item['dt_slider_button_link_1'], 'after')); ?>
                                    
                                 

                                        <?php 
                                         // Link 2  
                                        echo dt_return(dt_link_before_after($item['dt_slider_button_link_2'], 'before',  'text_btn', array('data-animation' => 'fadeInRight', 'data-animation-duration'=> '1s','data-wow-delay'=> '1s'))).
                                        esc_html($item['dt_slider_button_style_2']).
                                        dt_return(dt_link_before_after($item['dt_slider_button_link_2'], 'after'));

                                        ?>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }} ?>
            </div>
            <div class="main_slider_nav">
                <i class="icon-arrow-left left_arrow"></i>
                <i class=" icon-arrow-right right_arrow"></i>
            </div>
        </div>

 <?php 
 
 wp_enqueue_script('dt_slider_js');