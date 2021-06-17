<?php 

 wp_enqueue_style('dt_video_popup_css');
 wp_enqueue_script( 'dt_video_popup_js' );

$unique_class = wp_unique_id( 'video-popup-' );

$wrapper_class[] = $unique_class;
$wrapper_class[] = 'pop-up-content';

$get_wrapper_class = join(' ', $wrapper_class);

 $video_link = $dt_vidoe_popup_video_link;
 $video_id = '';

 if(isset($video_link) && !empty($video_link)) {

  $video_id_explode = explode('/', $video_link);

  if(is_array($video_id_explode)) {
    $video_id = end($video_id_explode);
  }

 }

 //  Icon selector 

 $icon = 'fa fa-play';

 $icon_id = 'icon_picker_'.$icon_type;

 if(isset($$icon_id) && $$icon_id != '') {
    $icon = $$icon_id;
 }

?>

<div class="<?php echo esc_attr( $get_wrapper_class ); ?>">
 <?php 
 
 $video_url = 'https://www.youtube.com/embed/'. $video_id;

 if(isset($dt_video_button_style) && $dt_video_button_style == 2){
 ?>

<div class="corporate_video_icon">
    <a href="" class="icon popup-youtube show-video-popup-2" data-video ="<?php echo esc_url( $video_url); ?>">
        <i class="icon-play"></i>
    </a>
    <?php if(isset($dt_vidoe_popup_button_text)){ ?>
       <p><?php echo esc_html($dt_vidoe_popup_button_text); ?></p>
    <?php } ?>
</div>
<?php }elseif(isset($dt_video_button_style) && $dt_video_button_style == 3){
  
    ?>
    <div class="shop_video">
       <?php echo wp_get_attachment_image( $dt_video_pupop_bg_image, 'fulll'); ?>
        <div class="travel_video">
            <a href="<?php echo esc_url( $video_url); ?>"
                class="travel_video_icon popup-youtube show-video-pupup svp-3"><i class="<?php echo esc_attr(  $icon ); ?>"></i></a>
            <span>Watch the film</span>
            <?php if(isset($dt_vidoe_popup_button_text)){ ?>
            <span><?php echo esc_html($dt_vidoe_popup_button_text); ?></span>
       <?php } ?>
        </div>
    </div>
    <?php 
}else { ?>
<a href="" class="show-video-pupup" data-video ="<?php echo esc_url( $video_url); ?>">
  <i class="<?php echo esc_attr(  $icon ); ?>"></i>
</a>
<?php } ?>
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

if(isset($dt_pop_up_icon_color) && $dt_pop_up_icon_color != ''){
    $video_css[$unique_class.' .show-video-pupup i']['color'] = $dt_pop_up_icon_color;     
 }
//  Icon hover color  
if(isset($dt_pop_up_icon_hv_color) && $dt_pop_up_icon_hv_color!= ''){
    $video_css[$unique_class.' .show-video-pupup:hover i']['color'] = $dt_pop_up_icon_hv_color;     
 }

if(isset($dt_pop_up_icon_background_color) && $dt_pop_up_icon_background_color!= ''){
    $video_css[$unique_class.' .show-video-pupup']['background'] = $dt_pop_up_icon_background_color;     
 }

if(isset($dt_vidoe_popup_icon_padding) && $dt_vidoe_popup_icon_padding!= ''){
    $video_css[$unique_class.' .show-video-pupup']['padding'] = $dt_vidoe_popup_icon_padding;     
 }
if(isset($dt_vidoe_popup_icon_margin) && $dt_vidoe_popup_icon_margin != ''){
    $video_css[$unique_class.' .show-video-pupup']['margin'] = $dt_vidoe_popup_icon_margin;     
 }

 if(isset($dt_pop_up_icon_hv_background_color) && $dt_pop_up_icon_hv_background_color != ''){
    $video_css[$unique_class.' .show-video-pupup:hover']['background'] = $dt_pop_up_icon_hv_background_color;     
 }
// style 2 hover 
 if(isset($dt_pop_up_icon_hv_background_color) && $dt_pop_up_icon_hv_background_color != ''){
    $video_css[$unique_class.' .corporate_video_icon .icon:hover']['background'] = $dt_pop_up_icon_hv_background_color;     
 }
 if(isset($dt_pop_up_icon_hv_background_color) && $dt_pop_up_icon_hv_background_color != ''){
    $video_css[$unique_class.' .corporate_video_icon .icon:hover']['border-color'] = $dt_pop_up_icon_hv_background_color;     
 }

 if(isset($dt_vidoe_popup_video_icon_font_size) && $dt_vidoe_popup_video_icon_font_size!= ''){
    $video_css[$unique_class.' .show-video-pupup i']['font-size'] = $dt_vidoe_popup_video_icon_font_size;     
 }

 //  responsive divice 

 $resposive_tab = [];

 if(isset($dt_vidoe_popup_icon_tab_margin) && $dt_vidoe_popup_icon_tab_margin != ''){
    $resposive_tab[$unique_class.' .show-video-pupup']['margin'] = $dt_vidoe_popup_icon_tab_margin;     
 }

$resposive_mobile  = [];

if(isset($dt_vidoe_popup_icon_mobile_margin) && $dt_vidoe_popup_icon_mobile_margin != ''){
    $resposive_mobile[$unique_class.' .show-video-pupup']['margin'] = $dt_vidoe_popup_icon_mobile_margin;     
 }



$custom_css =  droit_css( $video_css );
$custom_css .=  droit_css_responsive( $resposive_tab, 'max-width', '1024' );
$custom_css .=  droit_css_responsive( $resposive_mobile );



wp_add_inline_style( 'dt_video_popup_css', $custom_css );