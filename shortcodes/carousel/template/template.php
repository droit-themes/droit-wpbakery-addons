<?php 

$carousel_data = vc_param_group_parse_atts($droit_gallery_content);

$item_unique_class = wp_unique_id('dt-carousel-');
$wrapper_class[] = $item_unique_class;
$wrapper_class[] = 'home_features_area';

$wrapper_class = join('', $wrapper_class);

?>

<section class="<?php echo esc_attr( $wrapper_class ); ?>">
    <div class="h_features_left"></div>
    <div class="h_features_right">
        <div class="h_features_right_title">
            <div class="section_title">
                <h2 data-animation="wow fadeIn" data-splitting><?php echo  dt_extention_wp_kses($dt_carousel_section_title); ?></h2>
            </div>
            <div class="custome_nav">
                <button class="prev"><i class="icon-arrow-left"></i></button>
                <button class="next"><i class="icon-arrow-right"></i></button>
            </div>
        </div>
        <div class="home_features_slider">

        <?php if(!empty($carousel_data)): 
            
             foreach($carousel_data as $data){
                $url_attrs = '';

                if( isset($data['dt_carosuel_link'])) {
                    $url_attrs = $data['dt_carosuel_link'];
                }
                 
            ?>
            <div class="item">
                <?php  echo  dt_link_before_after($url_attrs, 'before'); ?>
                    <div class="agency_features_item">
                        <?php if($data['dt_use_icon_or_image'] == 'img') : 

                        if($data['dt_gallery_img'] != '') {
                            echo  dt_get_attachment_image($data['dt_gallery_img'], 'thumbnail');
                        }else{
                            echo esc_html__( 'Insert Image Please','droit-wbpakery-addons' );
                        }
                        endif;

                        if($data['dt_use_icon_or_image'] == 'icon') :

                            if($data['dt_gallery_img'] != '') {

                              $icon_color =  $data['dt_carousel_icon_color'];
                              $icon_font_size = $data['dt_carosuel_icon_font_size'];
                              $icon_style = '';

                              if(($icon_color !='') || ($icon_font_size != '')) {

                                $icon_style = 'style=';

                                  if($icon_color !='') {
                                    $icon_style .= 'color:'.$icon_color.';';
                                  }

                                  if($icon_font_size !='') {
                                    $icon_style .= 'font-size:'.$icon_font_size;
                                  }

                              }
                            ?>
                                <i class="<?php echo esc_attr($data['dt_btn_icon_selector']); ?>" <?php echo esc_attr($icon_style); ?>></i>
                            <?php 
                            }else{
                                echo esc_html__( 'Insert Icon Please','droit-wbpakery-addons' );
                            }

                        endif;

                        ?>
                        <?php if('' != $data['dt_carosuel_title']){?> 
                            <h3><?php echo esc_html( $data['dt_carosuel_title'] ); ?></h3>
                        <?php } ?> 
                        <?php if('' != $data['dt_carousel_description']){?> 
                            <p><?php echo esc_html( $data['dt_carousel_description'] ); ?></p>
                        <?php } ?> 
                    </div>
                <?php echo  dt_link_before_after($url_attrs, 'after'); ?>
            </div>
        <?php } else: echo esc_html__( 'Enter Your Repeter Data', 'droit-wbpakery-addons' ); endif ?>    
        </div>
    </div>
</section>
<?php 			
wp_enqueue_script('droit-wpbakery-addons-script', DROIT_WPBAKERY_JS_URL.'/droit-wpbakery-addons-script.js', [ 'jquery' ], DROIT_WPBAKERY_ADDONS, 'true');
