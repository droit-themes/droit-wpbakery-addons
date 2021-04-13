<?php

$url_attrs = vc_build_link($dt_one_page_section_button_link);
$link_attr = '';

if(!empty($url_attrs)){
    foreach ($url_attrs as $key => $attr){
    
        if($key != 'title' && $attr != ''){

            if($key == 'url'){
                $key = 'href';
            }

            $link_attr .= $key.'='.$attr.' ';

        }
    }

}

?>

<div class="d-flex">
    <div class="agency_container_left">
        <div class="content">
            <h6 data-splitting><?php echo dt_extention_wp_kses($dt_one_page_section_sub_title); ?></h6>
            <h2 data-splitting><?php echo dt_extention_wp_kses($dt_one_page_section_title); ?></h2>
            <a <?php echo esc_attr($link_attr); ?> class="h_text_btn" data-splitting><?php echo dt_extention_wp_kses($dt_one_page_section_button_text); ?></a>
        </div>
    </div>
    <div class="agency_container_right">
        <div class="agency_img">
            <div class="agency_text">
                <h6 data-splitting> <?php echo dt_extention_wp_kses($dt_one_page_section_vertical_text); ?></h6>
                <div class="number"><?php echo esc_html($dt_one_page_section_counter_number); ?></div>
                <a <?php echo esc_attr($link_attr); ?> class="title"><?php echo esc_html($dt_one_page_section_category); ?></a>
                <h2><?php echo dt_extention_wp_kses($dt_one_page_section_pd_name);  ?></h2>
            </div>
            <?php if($dt_one_page_section_img != ''){
                echo wp_get_attachment_image( $dt_one_page_section_img, 'full' );
            } ?>
        </div>
    </div>
</div>
