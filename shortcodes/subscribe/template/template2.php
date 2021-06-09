<?php 


$email = esc_html__('Email Address*', 'droit-wbpakery-addons');

if(isset($dt_subscribe_placeholder_email)) {
    $email = $dt_subscribe_placeholder_email;
}


$action_link = '';

if(isset($dt_subscribe_form_action_url)) {
    $action_link = $dt_subscribe_form_action_url;
}

$button_icon_html = '<i class="icon-arrow-double"></i>';

if(isset($icon_type)) {

$icon_id = 'icon_picker_'.$icon_type;

if($icon_type != 'image') {

    $button_icon_html = '<i class="'.$$icon_id.'"></i>';

}elseif($icon_type == 'image') {

    $button_icon_html = wp_get_attachment_image($$icon_id, 'thumbnail');

}
}

?>


<form class="mailchimp f_subscribe_widget" method="post" data-url="<?php echo esc_url($action_link); ?>">
    <input type="email" class="form-control memail" name="email" placeholder="<?php echo esc_attr($email) ?>">
    <button type="submit" class="subscribe_btn">
    <?php echo dt_return($button_icon_html); ?>
    </button>
</form>
<p class="mchimp-errmessage text-center mt-3" style="display: none;"></p>
<p class="mchimp-sucmessage text-center mt-3" style="display: none;"></p>