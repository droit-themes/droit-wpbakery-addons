<section class="stratup_price_area">
  
  <?php 
  $pricing_data_1 = vc_param_group_parse_atts($droit_pricing_content);
  $pricing_data_2 = vc_param_group_parse_atts($droit_pricing_content_2);


  if($dt_show_pricing_tab == 'yes') : ?>
        <div class="pricing_tab">
          <span class="tab_btn month_tab"><?php echo esc_html($dt_pricing_tab_title); ?></span>
          <span class="tab_switcher on"></span>
          <span class="tab_btn year_tab"><?php echo esc_html($dt_pricing_tab_title_2); ?></span>
        </div> 
   <?php endif; ?>     
        <div class="startup_tabcontent">
        <?php 

           $pricing_id = 'yearly';
           if($dt_show_pricing_tab != 'yes'){
               $pricing_id = 'monthly';
         } ?>
          <div class="row align-items-center monthly" id="<?php echo esc_attr( $pricing_id ); ?>">
             <?php foreach($pricing_data_1 as $data ) { 
                $url_attrs = $data['dt_pricing_link'];
               ?>
              <div class="col-lg-4 col-sm-6 startup_price_item">
                <div class="price_head">
                  <?php if($data['dt_pricing_tag'] != '') : ?>
                    <div class="p_tag"><?php echo esc_html($data['dt_pricing_tag']); ?></div>
                  <?php endif;
                  
                   if($data['dt_pricing_title'] != '') : ?>
                 
                    <h5><?php echo esc_html($data['dt_pricing_title']); ?></h5>

                  <?php endif; 
                  
                    if($data['dt_pricing_sub_title'] != '') :
                  
                  ?>

                   <p><?php echo esc_html($data['dt_pricing_sub_title']) ?></p>

                  <?php endif; ?>

                  <div class="price">
                    <?php if($data['dt_pricing_price_symble'] != '') : ?>
                      <sup><?php echo dt_extention_wp_kses($data['dt_pricing_price_symble']); ?></sup>
                    <?php endif; 
                     if($data['dt_pricing_price'] != '') : 
                      echo esc_html( $data['dt_pricing_price'] );
                     endif;
                     if($data['dt_pricing_price_after'] != '') :
                    ?>
                    <sup><?php echo dt_extention_wp_kses($data['dt_pricing_price_after']); ?></sup> 
                    <?php endif; ?>
                  </div>
                  <?php if($data['dt_pricing_price_type']) : ?>
                     <div class="year"><?php echo dt_extention_wp_kses($data['dt_pricing_price_type']); ?></div>
                  <?php endif; ?>
                </div>
                <?php if($data['dt_pricing_feature_list'] != '') : ?>
                  <ul class="list-unstyled">
                     <?php 
                        
                        $listdata = explode("\n", $data['dt_pricing_feature_list']);
                        foreach($listdata as $list) {
                         ?>
                          <li><?php echo $list; ?></li>
                         <?php 
                        }
                     ?>
                  </ul>
                <?php endif; ?>
                <?php  
                     echo   dt_link_before_after($url_attrs, 'before', 'price_btn').
                       esc_html($data['dt_pricing_button_text']). 
                       dt_link_before_after($url_attrs, 'after'); 
                 ?>
                <!-- <div class="recommend"><i class="fas fa-star"></i>Recommended</div> -->
              </div>
            <?php } ?>
          </div>
         <?php if($dt_show_pricing_tab == 'yes') : ?>
          <div class="row align-items-center" id="monthly">
             <?php if($pricing_data_2 != '') {
               
               foreach($pricing_data_2 as $data_2) {
                $url_attrs2 = $data_2['dt_pricing_link_2'];
               ?>  
           <div class="col-lg-4 col-sm-6 startup_price_item">
                <div class="price_head">
                  <?php if($data_2['dt_pricing_tag_2'] != '') : ?>
                    <div class="p_tag"><?php echo esc_html($data_2['dt_pricing_tag_2']); ?></div>
                  <?php endif;
                  
                   if($data_2['dt_pricing_title_2'] != '') : ?>
                 
                    <h5><?php echo esc_html($data_2['dt_pricing_title_2']); ?></h5>

                  <?php endif; 
                  
                    if($data_2['dt_pricing_sub_title_2'] != '') :
                  
                  ?>

                   <p><?php echo esc_html($data_2['dt_pricing_sub_title_2']) ?></p>

                  <?php endif; ?>

                  <div class="price">
                    <?php if($data_2['dt_pricing_price_symble_2'] != '') : ?>
                      <sup><?php echo dt_extention_wp_kses($data_2['dt_pricing_price_symble_2']); ?></sup>
                    <?php endif; 
                     if($data_2['dt_pricing_price_2'] != '') : 
                      echo esc_html( $data_2['dt_pricing_price_2'] );
                     endif;
                     if($data['dt_pricing_price_after_2'] != '') :
                    ?>
                    <sup><?php echo dt_extention_wp_kses($data_2['dt_pricing_price_after_2']); ?></sup> 
                    <?php endif; ?>
                  </div>
                  <?php 
                
                   if($data_2['dt_pricing_price_type_2']) : ?>
                     <div class="year"><?php echo dt_extention_wp_kses($data_2['dt_pricing_price_type_2']); ?></div>
                  <?php endif; ?>
                </div>
                <?php if($data_2['dt_pricing_feature_list_2'] != '') : ?>
                  <ul class="list-unstyled">
  
                     <?php 
                        
                        $listdata2 = explode("\n", $data_2['dt_pricing_feature_list_2']);
                       
                        foreach($listdata2 as $list2) {
                        
                         ?>
                          <li><?php echo $list2; ?></li>
                         <?php 
                        }
                     ?>
                  </ul>
                <?php endif; ?>
                <?php  
                     echo   dt_link_before_after($url_attrs2, 'before', 'price_btn').
                       esc_html($data_2['dt_pricing_button_text_2']). 
                       dt_link_before_after($url_attrs2, 'after'); 
                 ?>
                <!-- <div class="recommend"><i class="fas fa-star"></i>Recommended</div> -->
              </div>
           <?php }}else{echo esc_html__( 'Please insert pricing data', 'droit-wbpakery-addons' ); } ?>
          </div>
         <?php endif; ?>
        </div>
</section>