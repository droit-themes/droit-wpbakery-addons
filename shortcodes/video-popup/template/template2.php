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
 $video_url = 'https://www.youtube.com/embed/'. $video_id;
?>
<div class="corporate_video_icon">
    <a href="javascript(javascript:void(0))" class="icon popup-youtubes show-video-popup-2" data-video ="<?php echo esc_url( $video_url); ?>">
        <i class="icon-play"></i>
    </a>
    <?php if(isset($dt_vidoe_popup_button_text)){ ?>
       <p><?php echo esc_html($dt_vidoe_popup_button_text); ?></p>
    <?php } ?>
</div>

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