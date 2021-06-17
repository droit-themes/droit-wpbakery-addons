<?php 
$uniqueue_id =  wp_unique_id('one-page-footer-');
$wrapper_css_class[] = $uniqueue_id;
$wrapper_css_class[] = 'd-flex';
$wrapper_class = join(' ', $wrapper_css_class);

$subtitle = $footer_email = $footer_content = $address = $footer_icon = $footer_image = '';

// get sub ttilte 

 if(isset($dt_one_page_footer_sub_title)) {
    $subtitle =  $dt_one_page_footer_sub_title;
 }

 if(isset($dt_one_page_footer_email)) {
    $footer_email =  $dt_one_page_footer_email;
 }

 if(isset($dt_one_page_footer_content)) {
    $footer_content =  $dt_one_page_footer_content;
 }

 if(isset($dt_one_page_footer_address)) {
    $address =  $dt_one_page_footer_address;
 }

 if(isset($dt_one_page_fotoer_icon) && '' != $dt_one_page_fotoer_icon) { 
    $footer_icon =  $dt_one_page_fotoer_icon;
 }
 if(isset($dt_one_page_fotoer_image) && '' != $dt_one_page_fotoer_image) { 
    $footer_image =  $dt_one_page_fotoer_image;
 }



?>

<div class="<?php echo esc_attr( $wrapper_class ); ?>">
    <div class="agency_container_left">
        <div class="content">
            <h6><?php echo esc_html($subtitle); ?></h6>
            <a href="mailto:<?php echo esc_attr( $dt_one_page_footer_email ); ?>" class="email"><?php echo dt_return($dt_one_page_footer_email); ?></a>
            <?php echo dt_extention_wp_kses($footer_content); ?>
        </div>
    </div>
    <div class="agency_container_right">
        <div class="media align-items-center">
            <div class="media-body">
            <?php
              if('' != $footer_icon) {
                   echo   wp_get_attachment_image($footer_icon, 'thumbnail');
                 } 
            ?>
                <?php echo dt_extention_wp_kses($address); ?>
            </div>
            <?php if('' != $footer_icon) { ?>
                <div class="contact_img">
                   <?php echo wp_get_attachment_image($footer_image, 'full'); ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>