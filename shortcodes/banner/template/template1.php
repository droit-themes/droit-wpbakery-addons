<?php 

$banner_image_id = $banner_title =  $banner_sub_title = '';
if(isset($dt_banner_image) && $dt_banner_image != '') {
    $banner_image_id = $dt_banner_image;
}

if(isset($dt_banner_title) && $dt_banner_title != '') {
    $banner_title = $dt_banner_title;
}
if(isset($dt_banner_sub_title) && $dt_banner_sub_title != '') {
    $banner_sub_title = $dt_banner_sub_title;
}

$wrapper_unique_class  = wp_unique_id('doit-banner-wrapper-');
$wrapper_class_list[]  = 'about_banner_area';
if(isset($dt_banner_wrapper_custom_class)) {
   $wrapper_class_list[]  = $dt_banner_wrapper_custom_class;
}

$wrapper_class_list[]  = $wrapper_unique_class;
$wrapper_class = join(' ', $wrapper_class_list);

?>

<div class="<?php echo esc_attr( $wrapper_class ); ?>">
    <div class="about_banner_left">
    <?php if('' != $banner_image_id){
        echo  wp_get_attachment_image( $banner_image_id, array('1170', '863') );
    } ?>    
    </div>
    <div class="about_banner_right">
        <div class="about_banner_content">
        <?php if('' != $banner_title) { ?>
            <h2><?php echo dt_extention_wp_kses($banner_title) ?></h2>
        <?php } 
        
            if('' != $banner_sub_title) {
        
        ?>    
            <p><?php echo dt_extention_wp_kses($banner_sub_title); ?></p>
            <?php } ?>        
        </div>
    </div>
</div>

<?php 
// generate css 

wp_enqueue_style('dt_extend_style');


$banner_css = [];

if(isset($dt_banner_content_bg) && $dt_banner_content_bg != ''){
    $banner_css[$wrapper_unique_class.' .about_banner_right .about_banner_content']['background'] = $dt_banner_content_bg;     
}

if(isset($dt_banner_bg_pattern_image) && $dt_banner_bg_pattern_image != ''){
    $url = wp_get_attachment_image_url( $dt_banner_bg_pattern_image, 'full' );
    $banner_css[$wrapper_unique_class.' .about_banner_right .about_banner_content:before']['background'] = 'url('.$url.')';     
    $banner_css[$wrapper_unique_class.' .about_banner_right .about_banner_content:before']['background-repeat'] = 'no-repeat';     
    $banner_css[$wrapper_unique_class.' .about_banner_right .about_banner_content:before']['background-position-x'] = 'right';     
}

if(isset($dt_banner_title_color) && $dt_banner_title_color != ''){
    $banner_css[$wrapper_unique_class.' .about_banner_right .about_banner_content h2']['color'] = $dt_banner_title_color;     
}

if(isset($dt_banner_title_font_size) && $dt_banner_title_font_size != ''){
    $banner_css[$wrapper_unique_class.' .about_banner_right .about_banner_content h2']['font-size'] = $dt_banner_title_font_size;     
}

if(isset($dt_banner_subtitle_font_size) && $dt_banner_subtitle_font_size != ''){
    $banner_css[$wrapper_unique_class.' .about_banner_right .about_banner_content p']['font-size'] = $dt_banner_subtitle_font_size;     
}

if(isset($dt_banner_sub_title_color) && $dt_banner_sub_title_color != ''){
    $banner_css[$wrapper_unique_class.' .about_banner_right .about_banner_content p']['color'] = $dt_banner_sub_title_color;     
}


$banner_css =  droit_css( $banner_css );


wp_add_inline_style( 'dt_extend_style', $banner_css );