<?php
$btn = !empty($dt_hero_btn_link) ? vc_build_link($dt_hero_btn_link) : '';
$btn_target = !empty($btn['target']) ? $btn['target'] : '_self';

?>

<section class="agency_banner_area" id="apps_craft_animation">
    <div class="decore">
        <?php echo dt_get_attachment_image( $obj_image1, 'full', array( 'class' => 'layer layer2', 'data-depth' => '0.5' ) ) ?>
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="agency_content">
                    <?php
                    if ( !empty( $dt_hero_subtitle) ) {  ?>
                        <h6 class="wow fadeInLeft"><?php echo esc_html($dt_hero_subtitle) ?></h6>
                        <?php
                    }
                    if ( !empty( $dt_hero_title ) ) {  ?>
                        <h2 class="wow fadeInLeft" data-wow-delay="0.2s"><?php echo dt_extention_wp_kses($dt_hero_title) ?></h2>
                        <?php
                    }
                    if ( !empty( $dt_hero_description ) ) {  ?>
                        <p class="wow fadeInLeft" data-wow-delay="0.4s"><?php echo esc_html($dt_hero_description) ?></p>
                        <?php
                    }
                    if ( !empty( $btn['title'] ) ) {  ?>
                        <a href="<?php echo esc_url($btn['url']) ?>" class="agency_btn wow fadeInLeft" data-wow-delay="0.6s" target="<?php echo esc_attr($btn_target) ?>">
                            <?php echo esc_html($btn['title']) ?>
                            <i class="ti-arrow-right"></i>
                        </a>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="agency_banner_img wow fadeInRight">
                    <?php
                    if ( !empty($obj_image2) ) { ?>
                        <div class="layer layer2" data-depth="0.1">
                            <?php echo dt_get_attachment_image( $obj_image2, 'full' ) ?>
                        </div>
                        <?php
                    }
                    if ( !empty($obj_image3) ) { ?>
                        <div class="shap one">
                            <?php echo dt_get_attachment_image( $obj_image3, 'full' ) ?>
                        </div>
                        <?php
                    }
                    if ( !empty($obj_image4) ) { ?>
                        <div class="shap two">
                            <div class="layer layer2" data-depth="0.2">
                                <?php echo dt_get_attachment_image( $obj_image4, 'full' ) ?>
                            </div>
                        </div>
                        <?php
                    }
                    if ( !empty($obj_image5) ) { ?>
                        <?php echo dt_get_attachment_image( $obj_image5, 'full', array( 'class' => 'shap three' ) ) ?>
                        <?php
                    }
                    if ( !empty($obj_image6) ) { ?>
                        <?php echo dt_get_attachment_image( $obj_image6, 'full', array( 'class' => 'shap four' ) ) ?>
                        <?php
                    }
                    if ( !empty($obj_image7) ) { ?>
                        <?php echo dt_get_attachment_image( $obj_image7, 'full', array( 'class' => 'shap five' ) ) ?>
                        <?php
                    }
                    if ( !empty($obj_image8) ) { ?>
                        <?php echo dt_get_attachment_image( $obj_image8, 'full', array( 'class' => 'shap six' ) ) ?>
                        <?php
                    }
                    if ( !empty($obj_image9) ) { ?>
                        <?php echo dt_get_attachment_image( $obj_image9, 'full', array( 'class' => 'shap seven' ) ) ?>
                        <?php
                    }
                    if ( !empty($obj_image10) ) { ?>
                        <?php echo dt_get_attachment_image( $obj_image10, 'full', array( 'class' => 'shap eight' ) ) ?>
                        <?php
                    }
                    if ( !empty($obj_image11) ) { ?>
                        <?php echo dt_get_attachment_image( $obj_image11, 'full', array( 'class' => 'shap nine' ) ) ?>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>


        <div class="banner_quote wow fadeInUp" data-wow-delay="0.2s">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-8">
                    <div class="quote_text">
                        <h3>We believe that</h3>
                        <p>
                            Designing products and services in close partnership with
                            our clients is the only way to have a real impact on their
                            business.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="quote_img">
                            <img src="assets/img/agency/man_img2.png" alt="" />
                        </div>
                        <div class="media-body">
                            <h6>Randall Perez</h6>
                            <p>Rave’s Founder</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
