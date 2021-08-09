<?php

<<<<<<< HEAD
$btn = vc_build_link($btn_link);
$target = !empty($btn['target']) ? $btn['target'] : '_self';

?>
<section class="about_action_area">
    <ul class="list-unstyled dot">
        <li data-parallax='{"x": 0, "y": 100}'></li>
        <li data-parallax='{"x": 0, "y": 40}'></li>
        <li data-parallax='{"x": 10, "y": -40}'></li>
        <li data-parallax='{"x": 0, "y": -40}'></li>
        <li data-parallax='{"x": -40, "y": 0}'></li>
        <li data-parallax='{"x": -40, "y": 20}'></li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1">
                <div class="about_action_content">
                    <?php
                        if ( !empty($upper_title) ) { ?>
                            <h6><?php echo esc_html($upper_title) ?></h6>
                            <?php
                        }
                        if ( !empty($title) ) { ?>
                            <h2><?php echo esc_html($title) ?></h2>
                            <?php
                        }
                        if ( !empty( $btn ) ) { ?>
                            <a href="<?php echo esc_url($btn['url']) ?>" class="home_btn_hover hover_style1" target="<?php echo esc_attr($target) ?>">
                                <?php echo esc_html($btn['title']) ?>
                            </a>
                            <?php
                        }
                    ?>  
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="action_mockup">
                <?php echo wp_get_attachment_image($f_image, 'full' ) ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php

wp_enqueue_style('dt_extend_style');

$btn = !empty($btn_link) ? vc_build_link($btn_link) : '';
$target = !empty($btn['target']) ? $btn['target'] : '_self';

?>
<section class="agency_action_area" id="craft_animation">
    <?php
    if ( !empty($shape1) ) { ?>
        <div class="layer layer2" data-depth="0.1">
            <?php echo dt_get_attachment_image($shape1, 'full', array( 'class' => 'left_img' ) ) ?>
        </div>
        <?php
    }
    if ( !empty($shape2) ) { ?>
        <div class="layer layer2" data-depth="0.5">
            <?php echo dt_get_attachment_image($shape2, 'full', array( 'class' => 'right_img' ) ) ?>
        </div>
        <?php
    }
    ?>
    <div class="container">
        <div class="agency_action_content agency_title text-center">
            <?php
            if ( !empty( $upper_title ) ) { ?>
                <h5 class="wow fadeInUp"><?php echo dt_extention_wp_kses($upper_title) ?></h5>
                <?php
            }
            if ( !empty( $title ) ) { ?>
                <h2 class="wow fadeInUp" data-wow-delay="0.3s"><?php echo dt_extention_wp_kses($title) ?></h2>
                <?php
            }
            if ( !empty( $contents ) ) { ?>
                <p class="wow fadeInUp" data-wow-delay="0.5s">
                   <?php echo dt_extention_wp_kses($contents) ?>
                </p>
                <?php
            }
            if ( !empty( $btn['title'] ) ) { ?>
                <a href="<?php echo esc_url($btn['url']) ?>" class="agency_btn wow fadeInUp" data-wow-delay="0.6s" target="<?php echo esc_attr($target) ?>">
                    <?php echo dt_extention_wp_kses($btn['title']) ?>
                    <i class="ti-arrow-right"></i>
                </a>
                <?php
            }
            ?>
        </div>
    </div>
</section>
>>>>>>> development
