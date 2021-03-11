<section class="saas_testimonial_area">
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
</section>