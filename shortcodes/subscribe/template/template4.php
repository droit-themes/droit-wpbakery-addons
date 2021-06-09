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

<form class="mailchimp form-row justify-content-center home_subscribe_inner" data-url="<?php echo esc_url($action_link); ?>">
   
    <div class="col-xl-3 col-md-4 wow fadeInDown animated" data-wow-delay=".3s" >
        <input type="text" class="form-control" placeholder="<?php echo esc_attr( $name_placeholder ); ?>" name="name" required>
    </div>
   
    <div class="col-xl-3 col-md-4 wow fadeInDown animated" data-wow-delay=".3s" >
        <input type="email" class="form-control" placeholder="<?php echo esc_attr( $email ); ?>" name="email" required>
    </div>

    <div class="col-xl-2 col-md-3 wow fadeInDown animated" data-wow-delay=".7s">
        <button type="submit" class="home_btn_hover hover_style1"><?php echo esc_html( $button_label ); ?>
            <?php echo dt_return($button_icon_html); ?>
        </button>
    </div>
</form>

<p class="mchimp-errmessage text-center mt-3" style="display: none;"></p>
<p class="mchimp-sucmessage text-center mt-3" style="display: none;"></p>