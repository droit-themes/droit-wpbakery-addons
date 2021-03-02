<form class="mailchimp form-row justify-content-center blog_comments event_subscribes" data-url="<?php echo esc_url($dt_subscribe_form_action_url); ?>">
    <div class="form-group">
        <input class="form-control" type="text" id="name" name="name" placeholder="">
        <label for="name"><?php echo $settings['name_placeholder'] ?></label>
    </div>
    <div class="form-group">
        <input class="form-control" type="email" id="email" name="email" placeholder="">
        <label for="email"><?php echo $settings['email_placeholder'] ?></label>
    </div>
    <div class="form-group wow fadeInDown" data-wow-delay=".7s">
        <button type="submit" class="education_learn_btn hover_style1"><?php echo esc_html($settings['btn_label']); ?>
            <i class="icon-arrow-double"></i>
        </button>
    </div>
</form>
<p class="mchimp-errmessage text-center mt-3" style="display: none;"></p>
<p class="mchimp-sucmessage text-center mt-3" style="display: none;"></p>