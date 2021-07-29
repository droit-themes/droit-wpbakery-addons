<?php

$btn = vc_build_link($btn_link);
$target = !empty($btn['target']) ? $btn['target'] : '_self';

echo '<pre>';
print_r($btn);
echo '</pre>';

if ( isset( $contents ) && $contents != '' ) {
    $c2a_content = $contents;
}

?>
    <section class="about_call_action_area">
        <div class="container">
            <?php
            if ( !empty($btn) ) { ?>
                <a href="<?php echo esc_url($btn['url']) ?>" class="home_btn_hover hover_style1" target="<?php echo esc_attr($target) ?>">
                    <?php echo esc_html($btn['title']) ?>
                    <i class="icon-arrow-right-3"></i>
                </a>
                <?php
            }
            if ( !empty($c2a_content) ) { ?>
                <div class="action_text">
                    <?php echo esc_html($c2a_content) ?>
                </div>
                <?php
            }
            ?>
        </div>
    </section>

<?php 
// generate css
wp_enqueue_style('dt_extend_style');