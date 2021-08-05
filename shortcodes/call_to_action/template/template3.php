<?php

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