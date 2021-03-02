<form class="mailchimp f_subscribe_widget" method="post" data-url="<?php echo esc_url($dt_subscribe_form_action_url); ?>">
    <input type="email" class="form-control memail" id="name" placeholder="<?php echo esc_attr($settings['email_placeholder']) ?>">
    <button type="submit" class="subscribe_btn">
        <i class="icon-arrow-right-2"></i>
    </button>
</form>
<p class="mchimp-errmessage text-center mt-3" style="display: none;"></p>
<p class="mchimp-sucmessage text-center mt-3" style="display: none;"></p>