<?php
$faqs        = vc_param_group_parse_atts($droit_faq_content);
$dt_faq_style = vc_param_group_parse_atts($dt_faq_style);
//$dt_faq_title = vc_param_group_parse_atts($dt_faq_title);

if($faqs != '') {
?>
<?php if($dt_faq_style =='1'){ ?> 
   

<?php }elseif($dt_faq_style =='2'){ ?>
    
     <section class="faq_area">
        <div class="container">
            <div class="row" id="masonry2">
                <div class="col-lg-12 col-md-12">
                    <div class="faq_inner">
                        <?php if(!empty($dt_faq_title)): ?>
                        <h2><?php echo dt_extention_wp_kses($dt_faq_title); ?></h2>
                        <?php endif; ?>
                        <div class="accordion" id="accordionExample">
                        <?php 
                        $i=1;
                         foreach($faqs as $key => $faq){ 
                          $show = $faq['dt_faq_default'];  
                        ?>
                            <div class="card">
                                <div class="card-header" id="<?php echo $i; ?>">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block <?php if($show =='yes'){  }else{  echo 'collapsed'; } ?>" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            <?php echo dt_extention_wp_kses($faq['dt_faq_title']);  ?>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse <?php if($show =='yes'){ echo 'show'; }else{ } ?>" aria-labelledby="<?php echo $i; ?>"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                    <?php echo dt_extention_wp_kses($faq['dt_faq_comments']); ?>
                                    </div>
                                </div>
                            </div>
                            <?php 
                           $i++;
                            } ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php }elseif($dt_faq_style =='3'){ ?>

<section class="faq_banner_area text-center about_action_area">
    <div class="pattern_bg parallaxie">
    </div>
    <ul class="list-unstyled dot">
        <li data-parallax='{"x": 0, "y": 100}'></li>
        <li data-parallax='{"x": 0, "y": 40}'></li>
        <li data-parallax='{"x": 10, "y": -40}'></li>
        <li data-parallax='{"x": 0, "y": -40}'></li>
        <li data-parallax='{"x": -40, "y": 0}'></li>
        <li data-parallax='{"x": -40, "y": 20}'></li>
    </ul>
    <div class="container">
        <?php if(!empty($dt_faq_title)): ?>
            <div class="section_title">
                <h2><?php echo dt_extention_wp_kses($dt_faq_title); ?></h2>
            </div>
        <?php endif; ?>
        <form action="#" class="faq_search">
            <input type="text" class="form-control" placeholder="Enter your keyword here">
            <button class="btn"><i class="icon-search"></i></button>
        </form>
        <?php if(!empty($dt_faq_sub_title)): ?>
        <p><?php echo dt_extention_wp_kses($dt_faq_sub_title); ?></p>
        <?php endif; ?>
    </div>
</section>

<?php } ?>

<?php } ?>              