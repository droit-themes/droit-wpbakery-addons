<?php 

$wrapper_uniquue_cls = wp_unique_id('dt-simple-testimonial-simple-');
$wrapper_class_arr[] = vc_shortcode_custom_css_class($dt_testimonial_s_wrapper_setting);
$wrapper_class_arr[] = $dt_testimonial_simple_element_class;
$wrapper_class_arr[] = $wrapper_uniquue_cls;
$wrapper_class_arr[] = 'education_clients_info';
$wrapper_class = join(' ', $wrapper_class_arr);

?>

<div class="<?php echo esc_attr( $wrapper_class ); ?>">
    <div class="education_clients_content">
        <?php echo dt_extention_wp_kses($dt_testimonial_s_comments); ?>
    </div>
    <div class="education_clients_profile">
    <?php if($dt_testimonial_s_autheor_img != '') { ?>

        <div class="profile_img">
           <?php  echo  dt_get_attachment_image($dt_testimonial_s_autheor_img, ['120', '120']); ?>
        </div>

        <?php } ?>

        <h5><?php echo dt_extention_wp_kses($dt_testimonial_s_autheor_name); ?></h5>
        <p><?php echo dt_extention_wp_kses($dt_testimonial_s_autheor_designation); ?></p>
    </div>
</div>

<?php 

wp_enqueue_style('dt_extend_style');
$tsl = [];

if($dt_testimonial_s_icon_color != ''){

    $tsl[$wrapper_uniquue_cls.'.education_clients_info .education_clients_content:before']['color'] = $dt_testimonial_s_icon_color;   
}


$css_generated =  droit_css( $tsl );



wp_add_inline_style( 'dt_extend_style', $css_generated );