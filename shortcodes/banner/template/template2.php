<?php
$wrapper_unique_class  = wp_unique_id('doit-banner-wrapper-');
?>

<section class="about_banner_area_three">
    <div class="container">
        <div class="about_banner_intro">
            <div class="section_title">
                <?php
                if ( !empty($dt_banner_title) ) { ?>
                    <h2><?php echo esc_html($dt_banner_title) ?></h2>
                    <?php
                }
                if ( !empty($dt_banner_sub_title) ) { ?>
                    <p><?php echo dt_extention_wp_kses($dt_banner_sub_title) ?></p>
                    <?php
                }
                ?>
            </div>
            <ul class="list-unstyled about_dot">
                <li data-parallax='{"x": 0, "y": 100}'></li>
                <li data-parallax='{"x": 0, "y": 40}'></li>
                <li data-parallax='{"x": 10, "y": -40}'></li>
            </ul>
        </div>
    </div>
</section>

<?php
// generate css

wp_enqueue_style('dt_extend_style');


$banner_css = [];

if ( isset ($dt_banner_title_color) && $dt_banner_title_color != '' ) {
    $banner_css[$wrapper_unique_class.' .section_title h2']['color'] = $dt_banner_title_color;

}

if ( isset ($dt_banner_title_font_size) && $dt_banner_title_font_size != '' ) {
    $banner_css['.section_title h2']['font-size'] = $dt_banner_title_font_size;
}

if ( isset($dt_banner_subtitle_font_size) && $dt_banner_subtitle_font_size != '' ){
    $banner_css[$wrapper_unique_class.' .section_title p']['font-size'] = $dt_banner_subtitle_font_size;
}

if ( isset($dt_banner_sub_title_color) && $dt_banner_sub_title_color != ''){
    $banner_css[$wrapper_unique_class.' .section_title p']['color'] = $dt_banner_sub_title_color;
}

$banner_css =  droit_css( $banner_css );

wp_add_inline_style( 'dt_extend_style', $banner_css );
