<?php 

 wp_enqueue_style('dt_video_popup_css');
 wp_enqueue_script( 'dt_video_popup_js' );

$unique_class = wp_unique_id( 'video-popup-' );

$wrapper_class[] = $unique_class;
$wrapper_class[] = 'pop-up-content';

$get_wrapper_class = join(' ', $wrapper_class);

 $video_link = $dt_vidoe_popup_video_link;
 $video_id = end(explode('/', $video_link));

 //  Icon selector 

 $icon = 'fa fa-play';

 $icon_id = 'icon_picker_'.$icon_type;

 if($$icon_id != '') {
    $icon = $$icon_id;
 }

?>

<div class="<?php echo esc_attr( $get_wrapper_class ); ?>">
 <?php 
 
 $video_url = 'https://www.youtube.com/embed/'. $video_id;

 
 ?>
<a href="" class="show-video-pupup" data-video ="<?php echo esc_url( $video_url); ?>">
  <i class="<?php echo esc_attr(  $icon ); ?>"></i>
</a>

 <div class="vidoe-pop-up-wrapper pop-up">
        <div class="container">
            <div class="vidoe-content">
              
                <a href="#" class="close-vidoe-modal">×</a>
            <div class="embed-responsive embed-responsive-16by9 video-wrapper">
            <?php if($video_id == '') {
                    echo esc_html__('Please use a video url to dispaly it', 'droit-wbpakery-addons');
                } ?>
                    <iframe src  title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 

$video_css = [];

if($dt_pop_up_icon_color!= ''){
    $video_css[$unique_class.' .show-video-pupup i']['color'] = $dt_pop_up_icon_color;     
 }
//  Icon hover color  
if($dt_pop_up_icon_hv_color!= ''){
    $video_css[$unique_class.' .show-video-pupup:hover i']['color'] = $dt_pop_up_icon_hv_color;     
 }
if($dt_pop_up_icon_background_color!= ''){
    $video_css[$unique_class.' .show-video-pupup']['background'] = $dt_pop_up_icon_background_color;     
 }
if($dt_vidoe_popup_icon_padding!= ''){
    $video_css[$unique_class.' .show-video-pupup']['padding'] = $dt_vidoe_popup_icon_padding;     
 }
if($dt_vidoe_popup_icon_margin!= ''){
    $video_css[$unique_class.' .show-video-pupup']['margin'] = $dt_vidoe_popup_icon_margin;     
 }

 if($dt_pop_up_icon_hv_background_color!= ''){
    $video_css[$unique_class.' .show-video-pupup:hover']['background'] = $dt_pop_up_icon_hv_background_color;     
 }
 if($dt_vidoe_popup_video_icon_font_size!= ''){
    $video_css[$unique_class.' .show-video-pupup i']['font-size'] = $dt_vidoe_popup_video_icon_font_size;     
 }

 //  responsive divice 

 $resposive_tab = [];

 if($dt_vidoe_popup_icon_tab_margin!= ''){
    $resposive_tab[$unique_class.' .show-video-pupup']['margin'] = $dt_vidoe_popup_icon_tab_margin;     
 }

$resposive_mobile  = [];

if($dt_vidoe_popup_icon_mobile_margin!= ''){
    $resposive_mobile[$unique_class.' .show-video-pupup']['margin'] = $dt_vidoe_popup_icon_mobile_margin;     
 }



$custom_css =  droit_css( $video_css );
$custom_css .=  droit_css_responsive( $resposive_tab, 'max-width', '1024' );
$custom_css .=  droit_css_responsive( $resposive_mobile );



wp_add_inline_style( 'dt_video_popup_css', $custom_css );