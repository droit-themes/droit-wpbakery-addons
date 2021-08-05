<?php
wp_enqueue_style('dt_video_popup_css');
wp_enqueue_script( 'dt_video_popup_js' );
?>


<section class="about_video_area">
    <div class="container">
        <div class="about_video_info parallaxie">
            <?php
            if ( !empty($f_image) ) {
                echo dt_get_attachment_image( $f_image, 'full' );
            }
            if ( !empty($shape_img1) ) {
                echo dt_get_attachment_image( $shape_img1, 'full', array( 'class' => 'pattern_one' ) );
            }
            if ( !empty($shape_img2) ) {
                echo dt_get_attachment_image( $shape_img2, 'full', array( 'class' => 'pattern_two' ) );
            }
            ?>
            <div class="video_content">
                <?php
                if ( !empty($dt_title) ) { ?>
                    <h2><?php echo dt_extention_wp_kses($dt_title) ?></h2>
                    <?php
                }
                ?>
                <div class="corporate_video_icon">

                    <a href="<?php echo esc_url($dt_vidoe_popup_video_link) ?>" class="icon">
                        <i class="icon-play"></i>
                    </a>
                    <?php
                    if ( !empty($dt_vidoe_popup_button_text) ) { ?>
                        <p><?php echo esc_html($dt_vidoe_popup_button_text) ?></p>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>