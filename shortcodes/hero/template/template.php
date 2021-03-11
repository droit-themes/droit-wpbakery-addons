<?php 

echo '<pre>';
print_r($dt_hero_subtitle);
echo '</pre>';

?>

<section class="stratup_banner_area site_padding">
      <div class="stratup_bg">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-5">
              <div class="startup_banner_content">
                <?php if($dt_hero_subtitle != '') : ?>
                  <h5 class="wow fadeInUp"><?php echo dt_extention_wp_kses($dt_hero_subtitle); ?></h5>
                <?php endif; 
                 if($dt_hero_title != '') : ?>
                  <h2 class="wow fadeInUp"><?php echo dt_extention_wp_kses($dt_hero_title); ?></h2>
                <?php endif; ?>
                <?php if($dt_hero_title != '') : ?>
                  <p class="wow fadeInUp" data-wow-delay="0.4s">
                      <?php echo dt_extention_wp_kses($dt_hero_description); ?>
                  </p>
                <?php endif; ?>
                <a href="#" class="startup_btn wow fadeInUp" data-wow-delay="0.6s">Get Started</a>
              </div>
            </div>
            <div class="col-lg-7">
              <div class="startup_banner_img">
                <div class="shape">
                  <?php if($dt_hero_animate_image != ''){
                    echo  wp_get_attachment_image($dt_hero_animate_image, 'full', null, array('class'=> 'layer layer2', 'data-depth'=> '0.3'));
                   }
                  ?>
                </div>
               
                  <?php
                  
                    if($dt_hero_image != '') {
                        echo wp_get_attachment_image( $dt_hero_image, 'full', null, array('class'=> 'wow fadeInRight', 'data-wow-delay'=>'0.6s') );
                    }
                  
                  ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>