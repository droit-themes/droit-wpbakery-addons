<?php 

$name_placeholder = esc_html__('Full name*', 'droit-wbpakery-addons') ;

if(isset($dt_subscribe_placeholder_name)) {
    $name_placeholder = $dt_subscribe_placeholder_name;
}

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

$button_icon_html = '<i class="ti-arrow-right"></i>';

if(isset($icon_type)) {

$icon_id = 'icon_picker_'.$icon_type;

if($icon_type != 'image') {

    $button_icon_html = '<i class="'.$$icon_id.'"></i>';

}elseif($icon_type == 'image') {

    $button_icon_html = wp_get_attachment_image($$icon_id, 'thumbnail');

}
}

?>

<form data-url="<?php echo esc_url($action_link); ?>" class="comingsoon_form">
    <div class="form-group">
        <i class="icon-paper-plane plane"></i>
        <input type="email" id="email" class="form-control" placeholder="<?php echo esc_attr( $email ); ?>">
        <button type="submit" class="arrow_btn"><i class="icon-arrow-right"></i></button>
    </div>
</form>
<p class="mchimp-errmessage text-center mt-3" style="display: none;"></p>
<p class="mchimp-sucmessage text-center mt-3" style="display: none;"></p>