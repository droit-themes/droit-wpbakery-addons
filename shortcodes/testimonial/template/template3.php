<?php 

$group_data = vc_param_group_parse_atts($droit_testimonial_content);

?>
<div class="app_testimonial_slider text-center">
    <?php foreach($group_data as $data){   ?>
        <div class="item">
            <ul class="list-unstyled">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <div class="author_img"> <?php echo dt_get_attachment_image($data['dt_ttm_img'], 'full'); ?></div>
            <h3><?php echo dt_extention_wp_kses($data['dt_ttm_auther_comment']); ?></h3>
            <div class="name"><?php echo dt_extention_wp_kses($data['dt_ttm_author_name']); ?></div>
            <div class="position"><?php echo dt_extention_wp_kses($data['dt_ttm_author_designation']); ?></div>
        </div>
    <?php } ?>    
</div>
<div class="slider_arrow">
    <button class="prev"><i class="icon-arrow-left"></i></button>
    <button class="next"><i class="icon-arrow-right"></i></button>
</div>
