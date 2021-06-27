<?php 
if(!function_exists('dt_full_page_scroll')){
    function dt_full_page_scroll( $atts, $content = null ) {
        extract(shortcode_atts(array(
			'dt_single_page_scroll_footer_copyright_text' => '© 2021 Rave',
            'droit_slider_content' => [],
            'icon_type' => '',
		), $atts));
        ob_start();
        ?>
        <div class="vartical_parallax_banner fullscreen_slider">
        <div class="vartical_parallax_banner fullscreen_slider">
            <div class="swiper-container main-slider vartical_parallax_banner" id="vartical_parallax_banner">
                <div class="swiper-wrapper">
                        <?php echo do_shortcode($content); ?>
                </div>
                <div class="swiper_navigation">
                <div class="swiper_prev">
                    <i class="icon-arrow-left"></i>
                </div>
                <div class="swiper_next">
                    <i class="icon-arrow-right"></i>
                </div>
                </div>
            </div>
        </div>
        <div class="footer_content">
                <p class="text"><?php echo dt_extention_wp_kses($dt_single_page_scroll_footer_copyright_text); ?></p>
                <div class="swiper-pagination"></div>
                <ul class="footer_social_icon list-unstyled">
                    <?php $lists = vc_param_group_parse_atts($droit_slider_content);
                    foreach($lists as $item) {

                         $icon_id = '';
                         if(isset($item['icon_type'])) {
                            $icon_id = 'icon_picker_'.$item['icon_type'];
                         }
                        ?>
                    <li>
                        <a href="<?php echo esc_url($item['dt_single_page_scroll_footer_social_link']); ?>">
                            <i class="<?php echo esc_attr( $item[$icon_id] ); ?>"></i>
                            <i class="<?php echo esc_attr( $item[$icon_id] ); ?>"></i>
                        </a>
                    </li>
                        <?php 
                    }
                    ?>
                </ul>
            </div>
          </div> 
        <?php 
           wp_enqueue_style( 'swiper' );
           wp_enqueue_style( 'mCustomScrollbar' );
           wp_enqueue_script('swiper');
           wp_enqueue_script('TweenMax');
           wp_enqueue_script('splitting');
           wp_enqueue_script('three');
           wp_enqueue_script('hover');
           wp_enqueue_script('mcustomscrollbar');
           wp_enqueue_script('imagesloaded');
           wp_enqueue_script('isotope-pkgd');
           wp_enqueue_script('fullpage-activation');
       return ob_get_clean();
    }
    add_shortcode('dt_full_page_scroll', 'dt_full_page_scroll');
}

if(!function_exists('single_dt_full_page_scroll')) {
	function single_dt_full_page_scroll( $atts, $content =  null) {
		extract(shortcode_atts(array(
			'dt_single_page_scroll_bg_color' => '#1b219d',
			'dt_single_page_scroll_title' => 'Chameleon',
			'dt_single_page_scroll_button_lable' => 'Discover',
			'dt_single_page_scroll_description' => 'There are so many different walks of life, so many different personalities in the world.',
			'dt_single_page_scroll_button_url' => '',
			'dt_single_page_scroll_effect_image' => '',
			'dt_single_page_scroll_image' => '',
            'dt_single_page_scroll_child_num'=> ''
		), $atts));
        
        ob_start(); ?>
        <div class="swiper-slide" style="background: <?php echo esc_attr( $dt_single_page_scroll_bg_color ); ?>;">
            <div class="container ">
                <div class="slider_content slide-inner">
                    <div class="fullscreen_slider_info">
                        <div class="slider_img">
                           <?php 
                            
                            $data_image_url = '';
                            if('' != $dt_single_page_scroll_effect_image) {
                                $data_image_url = wp_get_attachment_image_url( $dt_single_page_scroll_effect_image, 'full' );
                            }

                           ?>
                            <span  class="fullscreen_slider_img img  matrix3d_1"
                                data-appear-top-offset="-500"
                                data-displacement="<?php echo esc_url($data_image_url); ?>"
                                data-intensity="-0.1" data-easing="none" data-speedin="0.6"
                                data-speedout="0.6" data-loaded="true">

                                <?php if('' != $dt_single_page_scroll_effect_image){
                                    echo wp_get_attachment_image( $dt_single_page_scroll_image, 'full' );
                                    echo wp_get_attachment_image( $dt_single_page_scroll_image, 'full' );
                                } ?>
                            </span>
                        </div>
                        <div class="slider_title">

                            <?php if( $dt_single_page_scroll_child_num != ''): ?>
                              <div class="number" data-splitting><?php echo esc_html( $dt_single_page_scroll_child_num ); ?></div>
                            <?php endif; ?>
                            <h2 data-splitting><?php echo dt_return($dt_single_page_scroll_title); ?></h2>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="text">
                                <p data-splitting><?php echo dt_return( $dt_single_page_scroll_description ); ?></p>
                            </div>
                          
                            <?php echo dt_link_before_after($dt_single_page_scroll_button_url, 'before', 'discover_btn').esc_html($dt_single_page_scroll_button_lable).dt_link_before_after($dt_single_page_scroll_button_url,'after'); ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
                    
        <?php 
     
        return ob_get_clean();
	}
	add_shortcode('single_dt_full_page_scroll', 'single_dt_full_page_scroll');		
}


// Mapping 
vc_map( array(
    "name" => esc_html__("FullPage  Content", "droit-wbpakery-addons"),
    "base" => "dt_full_page_scroll",
    "as_parent" => array('only' => 'single_dt_full_page_scroll'),
    "content_element" => true,
    "show_settings_on_create" => false,
    "is_container" => true,
    "js_view" => 'VcColumnView',
    "category" =>array('Droit', 'Content'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Copyright Text", "droit-wbpakery-addons"),
            "param_name" => "dt_single_page_scroll_footer_copyright_text"
        ),
        array(
            'type' => 'param_group',
            'value' => '',
            "heading" => __("Droit Slider", 'droit-wbpakery-addons'),
            'param_name' => 'droit_slider_content',
            // Note params is mapped inside param-group:
            'params' => array_merge(array(
                array(
                    "type" => "textfield",
                    "heading" => esc_html__("Social Link", "droit-wbpakery-addons"),
                    "param_name" => "dt_single_page_scroll_footer_social_link"
                ),
            ),vc_iconfont_selections()
        )),
    ),
) );

vc_map( array(
    "name" => __("Single Full Page Content", "droit-wbpakery-addons"),
    "base" => "single_dt_full_page_scroll",
    "content_element" => true,
    "as_child" => array('only' => 'dt_full_page_scroll'),
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Counter Number", "droit-wbpakery-addons"),
            "param_name" => "dt_single_page_scroll_child_num"
        ), 
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color", "droit-wbpakery-addons"),
            "param_name" => "dt_single_page_scroll_bg_color"
        ), 
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", "droit-wbpakery-addons"),
            "param_name" => "dt_single_page_scroll_title"
        ), 
        array(
            "type" => "textarea",
            "heading" => esc_html__("Description", "droit-wbpakery-addons"),
            "param_name" => "dt_single_page_scroll_description"
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Button Label", "droit-wbpakery-addons"),
            "param_name" => "dt_single_page_scroll_button_lable"
        ),
        array(
			'type' => 'vc_link',
			'heading' => esc_html__( 'Button link', 'droit-wbpakery-addons' ),
			'param_name' => 'dt_single_page_scroll_button_url',
		),
        array(
			'type' => 'attach_image',
			'heading' => esc_html__( 'Effect Image', 'droit-wbpakery-addons' ),
			'param_name' => 'dt_single_page_scroll_effect_image',
		),
        array(
			'type' => 'attach_image',
			'heading' => esc_html__( 'Image', 'droit-wbpakery-addons' ),
			'param_name' => 'dt_single_page_scroll_image',
		)
    ),
    ) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_dt_full_page_scroll extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Single_dt_full_page_scroll extends WPBakeryShortCode {
    }
}
