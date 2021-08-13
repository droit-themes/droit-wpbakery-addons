<section class="rave-card">
    <div class="container">
        <div class="banner_quote wow fadeInUp" data-wow-delay="0.2s">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-8">
                    <div class="quote_text">
                        <?php
                        if ( !empty($dt_card_title) ) { ?>
                            <h3><?php echo esc_html($dt_card_title) ?></h3>
                            <?php
                        }
                        if ( !empty($dt_card_subtitle_title) ) { ?>
                            <p><?php echo esc_html($dt_card_subtitle_title) ?></p>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <?php
                        if ( !empty($dt_author_image) ) { ?>
                            <div class="quote_img">
                                <?php echo dt_get_attachment_image( $dt_author_image, 'full' ) ?>
                            </div>
                            <?php
                        }
                        echo '<div class="media-body">';
                        if ( !empty($dt_author_name) ) { ?>
                            <h6><?php echo esc_html($dt_author_name) ?></h6>
                            <?php
                        }
                        if ( !empty($dt_author_designation) ) { ?>
                            <p><?php echo esc_html($dt_author_designation) ?></p>
                            <?php
                        }
                        echo '</div>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
