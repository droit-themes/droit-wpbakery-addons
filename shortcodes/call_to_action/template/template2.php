<?php

$btn = $btn = !empty($btn_link) ? vc_build_link($btn_link) : '';
$target = !empty($btn['target']) ? $btn['target'] : '_self';

?>

    <section class="about_action_area about_action_area_two">
        <div class="pattern_bg parallaxie" data-background="img/bg.jpg"
             style="<?php echo wp_get_attachment_image_url('bg_img', 'full' )  ?> no-repeat scroll;">
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
// generate css
wp_enqueue_style('dt_extend_style');