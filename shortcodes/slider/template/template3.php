<?php 

// template for display slider style 3

//  get slider data 


$slider_items = vc_param_group_parse_atts($droit_slider_content_3);
wp_enqueue_script( 'dt_slider_js' );

?>

<div class="shop_slider_area">
            <div class="shop_slider">
                <?php if( null !== $slider_items){
                     foreach($slider_items as $slide) {


                         if(!empty($slide['dt_slider_img_3'])) {

                            $bg = wp_get_attachment_image_url($slide['dt_slider_img_3'], 'full');
                         }
                    ?>
                    <div class="slider_item parallaxie" style="
                    background-image: url('<?php echo esc_url($bg); ?>'); ">
                        <div class="container">
                            <div class="shop_slider_text text-center">
                            <?php if(!empty($slide['dt_slider_sub_title_style_3'])){ ?>
                                <h6 data-animation="fadeInUp" data-delay="0.1s">
                                   <?php echo dt_extention_wp_kses($slide['dt_slider_sub_title_style_3']); ?>
                                </h6>
                            <?php } ?>    
                                <h2 data-animation="fadeInUp" data-delay="0.3s">
                                <?php echo dt_extention_wp_kses($slide['dt_slider_title_style_3']); ?>
                                </h2>
                                <?php 
                                         // Link 2  
                                    echo dt_return(dt_link_before_after($slide['dt_slider_button_link_3'], 'before',  'shop_btn hover_style1', array('data-animation' => 'fadeInUp', 'data-delay'=> '0.5s'))).
                                    dt_extention_wp_kses($slide['dt_slider_button_style_3']).
                                    dt_return(dt_link_before_after($slide['dt_slider_button_link_3'], 'after'));

                                ?>
        
                            </div>
                        </div>
                    </div>
                <?php }} ?>
            </div>

            <div class="slider_nav main_slider_nav">
                <i class="icon-arrow-left left_arrow"></i>
                <i class="icon-arrow-right right_arrow"></i>
            </div>
        </div>