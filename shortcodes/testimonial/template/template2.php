<!-- <section class="saas_testimonial_area">
       <?php $group_data = vc_param_group_parse_atts($droit_testimonial_content); ?>
        <div class="slider_nav">
          <i class="icon-arrow-right-3 next"></i>
        </div>
      </div>
      <div class="saas_testimonial_inner">
        <div class="testimonial_slider">
         <?php foreach($group_data as $data) :   ?>   
          <div class="item">
            <div class="saas_testimonial_item">
              <p>
               <?php echo dt_extention_wp_kses($data['dt_ttm_auther_comment']); ?>
              </p>
              <div class="media">
                <div class="round_img">
                  <?php echo wp_get_attachment_image($data['dt_ttm_img'], array(64, 64), "", array( "class" => "item_img" ) );  ?>
                </div>
                <div class="media-body">
                  <div class="name"><?php echo dt_extention_wp_kses($data['dt_ttm_author_name']); ?></div>
                  <div class="position"><?php echo dt_extention_wp_kses($data['dt_ttm_author_designation']); ?></div>
                </div>
              </div>
            </div>
          </div>
         <?php endforeach; ?> 
        </div>
</section> -->

<?php $group_data = vc_param_group_parse_atts($droit_testimonial_content);


if(is_array($group_data) && !empty($group_data)) {

?>
<div class="startup_testimonial_area">
      <div class="container">
        <div class="row align-items-center">
          <div class=" col-lg-6">
            <div class="startup_slider_info wow fadeInLeft">
              <?php foreach($group_data as $data){   ?>
                <div class="item">
                  <h6><?php echo esc_html($dt_testimonial_title); ?></h6>
                  <h2><?php echo dt_extention_wp_kses($data['dt_ttm_auther_comment']); ?></h2>
                  <div class="author">
                    <h5><?php echo dt_extention_wp_kses($data['dt_ttm_author_name']); ?></h5>
                    <div class="position"><?php echo dt_extention_wp_kses($data['dt_ttm_author_designation']); ?></div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="slider_thumnill">
              <?php $i = 8;  foreach($group_data as $key=>$data){
                
                $data_delay = '';
                if($key) {
                  $data_delay = 'data-wow-delay="0.'.$key.'s"';
                }

                $data_duration = 'data-wow-duration="0.'.$i.'s"';

                if($i>9 ){
                  $data_duration = 'data-wow-duration="1s"';
                }
                if($i>10 ){
                  $data_duration = 'data-wow-duration="1.'.$key.'s"';
                }
                ?>
                <div class="thumnill_item wow zoomIn" <?php echo esc_attr($data_delay.' '.$data_duration); ?> >
                  <?php echo dt_get_attachment_image($data['dt_ttm_img'], 'full'); ?>
                </div>
               <?php $i++; } ?>
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php } ?>  