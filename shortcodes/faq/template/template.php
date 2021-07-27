<?php
$faqs        = vc_param_group_parse_atts($droit_faq_content);
$dt_faq_style = vc_param_group_parse_atts($dt_faq_style);
//$dt_faq_title = vc_param_group_parse_atts($dt_faq_title);

if($faqs != '') {
?>
<?php if($dt_faq_style =='1'){ ?> 
    sfsdfsfdsdf

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
                        <?php foreach($faqs as $key => $faq){  ?>
                            <div class="card">
                                <div class="card-header" id="faqOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block" type="button" data-toggle="collapse"
                                            data-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            How do I install Rave Theme?
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="faqOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        Rave is a creative, professional multi-purpose website template with
                                        pixel-perfect designed to make awesome website for any business.
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="card">
                                <div class="card-header" id="faqTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block collapsed" type="button"
                                            data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            What does Rave Theme do?
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="faqTwo"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        Rave is a creative, professional multi-purpose website template with
                                        pixel-perfect designed to make awesome website for any business.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="faqThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block collapsed" type="button"
                                            data-toggle="collapse" data-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            Where can I disscus Tips and Techniques?
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="faqThree"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        Rave is a creative, professional multi-purpose website template with
                                        pixel-perfect designed to make awesome website for any business.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php }else{ } ?>

<?php } ?>              