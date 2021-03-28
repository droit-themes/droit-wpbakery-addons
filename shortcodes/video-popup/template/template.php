<?php 

 wp_enqueue_style('dt_video_popup_css');
 wp_enqueue_script( 'dt_video_popup_js' );



 $video_link = $dt_vidoe_popup_video_link;
 $video_id = end(explode('/', $video_link));


?>

<div class="pop-up-content">
 <?php 
 
 $video_url = 'https://www.youtube.com/embed/'. $video_id;
 
 ?>
<a href="" class="show-video-pupup" data-video ="<?php echo esc_url( $video_url); ?>">display icon</a>

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

