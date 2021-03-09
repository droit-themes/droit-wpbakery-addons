<section class="stratup_price_area">
  
  <?php 
  $pricing_data_1 = vc_param_group_parse_atts($droit_pricing_content);
  $pricing_data_2 = vc_param_group_parse_atts($droit_pricing_content_2);

  echo '<pre>';
  print_r($dt_show_pricing_tab);
  echo '</pre>';

  if($dt_show_pricing_tab == 'yes') : ?>
        <div class="pricing_tab">
          <span class="tab_btn month_tab">Pay yearly</span>
          <span class="tab_switcher on"></span>
          <span class="tab_btn year_tab">Pay monthly</span>
        </div> 
   <?php endif; ?>     
        <div class="startup_tabcontent">
          <div class="row align-items-center" id="yearly">
            <div class="col-lg-4 col-sm-6 startup_price_item">
              <div class="price_head">
                <h5>Starter</h5>
                <p>Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                <div class="price"><sup>$</sup>9<sup>.90</sup> </div>
                <div class="year">per month</div>
              </div>
              <ul class="list-unstyled">
                <li>3 Advertising Campaigns</li>
                <li>5 Seo Friendly Articles</li>
                <li>10 Keywords Analytics</li>
                <li>200 Backlinks on 40 Websites</li>
              </ul>
              <a href="#" class="price_btn">Get Started</a>
            </div>
            <div class="col-lg-4 col-sm-6 startup_price_item">
              <div class="price_head">
                <div class="p_tag">Best Value</div>
                <h5>Premium</h5>
                <p>Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                <div class="price"><sup>$</sup>59<sup>.90</sup> </div>
                <div class="year">per month</div>
              </div>
              <ul class="list-unstyled">
                <li>10 Advertising Campaigns</li>
                <li>15 Seo Friendly Articles</li>
                <li>30 Keywords Analytics</li>
                <li>500 Backlinks on 40 Websites</li>
              </ul>
              <a href="#" class="price_btn">Get Started</a>
              <!-- <div class="recommend"><i class="fas fa-star"></i>Recommended</div> -->
            </div>
            <div class="col-lg-4 col-sm-6 startup_price_item">
              <div class="price_head">
                <h5>Enterprise</h5>
                <p>Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                <div class="price"><sup>$</sup>29<sup>.90</sup> </div>
                <div class="year">per month</div>
              </div>
              <ul class="list-unstyled">
                <li>3 Advertising Campaigns</li>
                <li>5 Seo Friendly Articles</li>
                <li>10 Keywords Analytics</li>
                <li>200 Backlinks on 40 Websites</li>
              </ul>
              <a href="#" class="price_btn">Get Started</a>
            </div>
          </div>
          <div class="row align-items-center" id="monthly">
            <div class="col-lg-4 col-sm-6 startup_price_item">
              <div class="price_head">
                <h5>Starter</h5>
                <p>Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                <div class="price"><sup>$</sup>29<sup>.90</sup> </div>
                <div class="year">per month</div>
              </div>
              <ul class="list-unstyled">
                <li>3 Advertising Campaigns</li>
                <li>5 Seo Friendly Articles</li>
                <li>10 Keywords Analytics</li>
                <li>200 Backlinks on 40 Websites</li>
              </ul>
              <a href="#" class="price_btn">Get Started</a>
            </div>
            <div class="col-lg-4 col-sm-6 startup_price_item">
              <div class="price_head">
                <div class="p_tag">Best Value</div>
                <h5>Premium</h5>
                <p>Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                <div class="price"><sup>$</sup>359<sup>.90</sup> </div>
                <div class="year">per month</div>
              </div>
              <ul class="list-unstyled">
                <li>10 Advertising Campaigns</li>
                <li>15 Seo Friendly Articles</li>
                <li>30 Keywords Analytics</li>
                <li>500 Backlinks on 40 Websites</li>
              </ul>
              <a href="#" class="price_btn">Get Started</a>
              <!-- <div class="recommend"><i class="fas fa-star"></i>Recommended</div> -->
            </div>
            <div class="col-lg-4 col-sm-6 startup_price_item">
              <div class="price_head">
                <h5>Enterprise</h5>
                <p>Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                <div class="price"><sup>$</sup>900<sup>.90</sup> </div>
                <div class="year">per month</div>
              </div>
              <ul class="list-unstyled">
                <li>3 Advertising Campaigns</li>
                <li>5 Seo Friendly Articles</li>
                <li>10 Keywords Analytics</li>
                <li>200 Backlinks on 40 Websites</li>
              </ul>
              <a href="#" class="price_btn">Get Started</a>
            </div>
          </div>
        </div>
</section>