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

// Title
$subscribe_title = esc_html__('Never miss an article', 'droit-wbpakery-addons');

if(isset($dt_subscribe_title_text)) {
    $subscribe_title = $dt_subscribe_title_text;
}

// sub Title
$subscribe_sub_title = esc_html__('Here should be a nice subscribe form huh?', 'droit-wbpakery-addons');

if(isset($dt_subscribe_sub_title)) {
    $subscribe_sub_title = $dt_subscribe_sub_title;
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
<section class="home_subscribe_area text-center sec_pad">
    <div class="pattern_bg parallaxie"></div>
    <ul class="list-unstyled dot">
        <li data-parallax='{"x": 0, "y": 100}'></li>
        <li data-parallax='{"x": 0, "y": 40}'></li>
        <li data-parallax='{"x": 10, "y": -40}'></li>
        <li data-parallax='{"x": 0, "y": -40}'></li>
        <li data-parallax='{"x": -40, "y": 0}'></li>
        <li data-parallax='{"x": -40, "y": 20}'></li>
    </ul>
    <div class="container">
        <div class="section_title text-center">
            <h5><?php echo esc_attr( $subscribe_sub_title ); ?></h5>
            <h2><?php echo esc_attr( $subscribe_title ); ?></h2>
        </div>
        <form data-url="<?php echo esc_url($action_link); ?>" class="form-row justify-content-center home_subscribe_inner">
            <div class="col-xl-3 col-md-6 wow fadeInDown" data-wow-delay=".3s">
                <input type="text" class="form-control" placeholder="<?php echo esc_attr( $name_placeholder ); ?>">
            </div>
            <div class="col-xl-3 col-md-6 wow fadeInDown" data-wow-delay=".3s">
                <input type="email" class="form-control" placeholder="<?php echo esc_attr( $email ); ?>">
            </div>
            <div class="col-xl-2 col-md-12 wow fadeInDown" data-wow-delay=".7s">
                <button type="submit" class="home_btn_hover hover_style1"><?php echo esc_attr( $button_label ); ?>
                    <i class="ti-arrow-right"></i>
                </button>
            </div>
        </form>
        <p class="mchimp-errmessage text-center mt-3" style="display: none;"></p>
        <p class="mchimp-sucmessage text-center mt-3" style="display: none;"></p>
    </div>
</section>