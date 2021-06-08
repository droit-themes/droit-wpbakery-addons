<?php 

$name_placeholder = 'Full name*';
$label = '';
$email = 'Email Address*';
$button_label = '';

?>


<form class="mailchimp form-row justify-content-center blog_comments event_subscribes" data-url="<?php echo esc_url($dt_subscribe_form_action_url); ?>">
    <div class="form-group">
        <input class="form-control" type="text" id="name" name="name">
        <label for="name"><?php echo esc_html($name_placeholder); ?></label>
    </div>
    <div class="form-group">
        <input class="form-control" type="email" id="email" name="email" placeholder="">
        <label for="email"><?php echo $email; ?></label>
    </div>
    <div class="form-group wow fadeInDown" data-wow-delay=".7s">
        <button type="submit" class="education_learn_btn hover_style1"><?php echo esc_html($button_label); ?>
            <i class="icon-arrow-double"></i>
        </button>
    </div>
</form>
<p class="mchimp-errmessage text-center mt-3" style="display: none;"></p>
<p class="mchimp-sucmessage text-center mt-3" style="display: none;"></p>