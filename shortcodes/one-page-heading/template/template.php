<?php

$uniqueue_id =  wp_unique_id('one-page-section-');
$wrapper_css_class[] = $uniqueue_id;
$wrapper_css_class[] = 'd-flex';
$wrapper_class = join(' ', $wrapper_css_class);

//  link 
$url_attrs = vc_build_link($dt_one_page_button_link);

if(!empty($url_attrs)){
    foreach ($url_attrs as $key => $attr){
    
        if($key != 'title' && $attr != ''){

            if($key == 'url'){
                $key = 'href';
            }

            $link_attr .= $key.'='.$attr.' ';

        }
    }

    if($url_attrs['url'] != ''){

        $link_beofre = '<a '.esc_attr( $link_attr ).' class="h_text_btn" data-splitting>';  
        $link_after = '</a>';

    }

}


?>

<div class="<?php echo esc_attr( $wrapper_class ); ?>">
    <div class="agency_container_left">
        <div class="content">
            <h2 data-splitting><?php echo dt_extention_wp_kses($dt_one_page_heading_title); ?></h2>
              <?php echo dt_return($link_beofre). dt_extention_wp_kses($dt_one_page_button_text).dt_return($link_after); ?>  
        </div>
    </div>
</div>
