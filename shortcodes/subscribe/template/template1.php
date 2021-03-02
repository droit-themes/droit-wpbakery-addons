<form class="mailchimp input-group rest_newsletter rave-subscribe" method="post" data-url="<?php echo esc_url($dt_subscribe_form_action_url); ?>" >
    <input type="text" class="form-control memail" placeholder="<?php echo esc_attr($settings['email_placeholder']) ?>">
    <button type="submit" class="restaurent_btn hover_style1"><?php echo esc_html($settings['btn_label']); ?>
        <i class="ti-arrow-right"></i>
    </button>
</form>
<p class="mchimp-errmessage text-center mt-3" style="display: none;"></p>
<p class="mchimp-sucmessage text-center mt-3" style="display: none;"></p>