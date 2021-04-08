<?php

$group_data = vc_param_group_parse_atts($droit_testimonial_content);
$wrapper_uniqueu_class = wp_unique_id('dt-testimonial-');
$wrapper_class[] = $wrapper_uniqueu_class;
$wrapper_class[] = 'arch_testimonila_area';
$wrapper_class = join (' ', $wrapper_class);


?>
<div class="<?php echo esc_attr( $wrapper_class ); ?>">
    <div class="restaurent_testimonial_slider wow fadeInUp">
    <?php  foreach($group_data as $data){  ?> 
        <div class="item">
            <i class="icon-quote"></i>
            <h2><?php echo dt_extention_wp_kses($data['dt_ttm_auther_comment']); ?></h2>
            <div class="author_name"><?php echo dt_extention_wp_kses($data['dt_ttm_author_name']); ?></div>
            <div class="author_position"><?php echo dt_extention_wp_kses($data['dt_ttm_author_designation']); ?></div>
        </div>
    <?php } ?>    
    </div>
</div>
<?php 

wp_enqueue_script('dt_testimonial');


?>