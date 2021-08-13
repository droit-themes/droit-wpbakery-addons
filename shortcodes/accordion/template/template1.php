<?php


$accordions = !empty( $dt_accordions) ? vc_param_group_parse_atts($dt_accordions) : '';

?>
    <section class="agency_about_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="accordion agency_accordion" id="accordionExample">
                        <?php
                        if ( $accordions ) {
                            foreach ( $accordions as $index => $item ) {
                                ?>
                                <div class="card wow fadeInUp">
                                    <div class="card-header" id="headingOne">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                                                aria-expanded="true" aria-controls="collapseOne">
                                            <span class="icon">
                                              <i class="ti-angle-down"></i>
                                            </span>
                                            <?php echo $item['tab_title'] ?>
                                        </button>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            <?php echo $item['tab_content'] ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>


                <div class="col-lg-7">
                    <div class="agency_about_img">
                        <img class="position-absolute top" src="assets/img/agency/about_round.png" alt="" />
                        <img class="wow fadeInRight" src="assets/img/agency/about_img.png" alt="" />
                    </div>
                </div>


            </div>
        </div>
    </section>

<?php 
// generate css
wp_enqueue_style('dt_extend_style');