<?php 


$email = esc_html__('Email Address*', 'droit-wbpakery-addons');

if(isset($dt_subscribe_placeholder_email)) {
    $email = $dt_subscribe_placeholder_email;
}

$button_label = esc_html__('Give me Fun', 'droit-wbpakery-addons');


if(isset($dt_subscribe_button_lable)) {
    $button_label = $dt_subscribe_button_lable;
}

$action_link = '';

if(isset($dt_subscribe_form_action_url)) {
    $action_link = $dt_subscribe_form_action_url;
}


$button_icon_html = '<i class="icon-mail"></i>';

if(isset($icon_type)) {

$icon_id = 'icon_picker_'.$icon_type;

if($icon_type != 'image') {

    $button_icon_html = '<i class="'.$$icon_id.'"></i>';

}elseif($icon_type == 'image') {

    $button_icon_html = wp_get_attachment_image($$icon_id, 'thumbnail');
}
}

?>

<form class="mailchimp blog_subscribe_form shop_subscribe_form" data-url="<?php echo esc_url($action_link); ?>">
    <input type="text" id="input" class="form-control" name="email">
    <label class="icon"> <?php echo dt_return($button_icon_html.$email); ?></label>
    <button type="submit" class="agency_learn_btn" data-text="<?php echo esc_attr( $button_label ); ?>"><?php echo esc_html( $button_label ); ?></button>
</form>

<p class="mchimp-errmessage text-center mt-3" style="display: none;"></p>
<p class="mchimp-sucmessage text-center mt-3" style="display: none;"></p>