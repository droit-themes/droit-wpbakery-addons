<?php

$image_url  = wp_get_attachment_url($dt_hero_image, 'full');

$url_attrs = vc_build_link($dt_button_link_hero);

$link_beofre = '';
$link_after ='';

$button_wrapper_class_generate[] = 'education_learn_btn';

if($dt_hero_btn_icon_hero == '' ) {
    $button_wrapper_class_generate[] = 'dt-d-flex-row-reverse';
 }
 

$button_wrapper_class = join(' ', $button_wrapper_class_generate);


if(!empty($url_attrs)){
    foreach ($url_attrs as $key => $attr){
       
        if($key != 'title'){
            if($key == 'url'){
                $key = 'href';
            }
            if($attr != ''){

                $link_attr .= $key.'='.$attr.' ';
            }

        }
    }
    $link_beofre = '<a '.esc_attr( $link_attr ).' class="'.esc_attr( $button_wrapper_class ).'">';  
    $link_after = '</a>';
 }


 
 if($dt_button_icon_hero != '') {
    $icon_class_generate[] = $dt_button_icon_hero;
 }else{
    $icon_class_generate []= 'icon-arrow-double';
 }

 if($dt_button_icon_hero != '') {
    $icon_class_generate[] = 'dt-d-flex align-a';
 }


 $icon_class = join(' ', $icon_class_generate);

//  Wrapper unique class 

$wrapper_uniquue_id  = wp_unique_id('hero-banner2-');

$banner_class_g[] = $wrapper_uniquue_id;
$banner_class_g[] = 'corporate_banner_area education_banner_area parallaxie d-flex align-items-center';
$banner_class = join(' ', $banner_class_g);

?>


<div class="<?php echo esc_attr( $banner_class ); ?>">
            
    <div class="triangle_img"></div>
    <div class="container">
        <div class="corporate_banner_text">
            <h2 data-animation="wow fadeIn" data-splitting><?php echo dt_extention_wp_kses($dt_hero_title); ?></h2>
            <p class="wow fadeInUp" data-wow-delay="0.4s" data-animation-duration="0.7s">
            <?php echo dt_extention_wp_kses($dt_hero_description); ?>
            </p>
            <div class="d-flex align-items-center">
                <?php echo  dt_return($link_beofre). esc_html($dt_button_hero); ?> 
                   <?php if($dt_button_icon_used_hero == 'yes') : ?>
                     <i class="<?php echo esc_attr(  $icon_class ); ?>"></i>
                   <?php endif; ?>  
                <?php echo dt_return($link_after); ?>
            </div>
        </div>
    </div>
</div>


<?php

$hero_css_2 = [];
$hero_tab_css = [];
$hero_mobile_css = [];

// heading 

if($dt_font_color_hero_title != ''){

    $hero_css_2[$wrapper_uniquue_id.' h2']['color'] = $dt_font_color_hero_title;     
}


if($dt_font_size_hero_title != ''){

    $hero_css_2[$wrapper_uniquue_id.' h2']['font-size'] = $dt_font_size_hero_title;     
}
if($dt_line_height_hero_title != ''){

    $hero_css_2[$wrapper_uniquue_id.' h2']['line-height'] = $dt_line_height_hero_title;     
}

if($dt_font_weight_hero_title != ''){

    $hero_css_2[$wrapper_uniquue_id.' h2']['font-weight'] = $dt_font_weight_hero_title;     
}

//  description 

if($dt_font_color_hero_description != ''){

    $hero_css_2[$wrapper_uniquue_id.' p']['color'] = $dt_font_color_hero_description;     
}

if($dt_font_size_hero_description != ''){

    $hero_css_2[$wrapper_uniquue_id.' p']['font-size'] = $dt_font_size_hero_description;     
}
if($dt_line_height_hero_description != ''){

    $hero_css_2[$wrapper_uniquue_id.' p']['line-height'] = $dt_line_height_hero_description;     
}

if($dt_font_weight_hero_description != ''){

    $hero_css_2[$wrapper_uniquue_id.' p']['font-weight'] = $dt_font_weight_hero_description;     
}

//  Button


if($dt_btn_font_size_hero != ''){

    $hero_css_2[$wrapper_uniquue_id.' .education_learn_btn']['font-size'] = $dt_btn_font_size_hero;     
}


if($dt_button_color_hero != ''){

    $hero_css_2[$wrapper_uniquue_id.' .education_learn_btn']['color'] = $dt_button_color_hero;     
}

//  Button Hover color 

if($dt_button_hover_color_hero != ''){

    $hero_css_2[$wrapper_uniquue_id.' .education_learn_btn:hover']['color'] = $dt_button_hover_color_hero;     
}

//  Background color 
if($dt_button_bg_color_hero != ''){

    $hero_css_2[$wrapper_uniquue_id.' .education_learn_btn']['background'] = $dt_button_bg_color_hero;     
}

if($dt_button_bg_hover_color_hero != ''){

    $hero_css_2[$wrapper_uniquue_id.' .education_learn_btn:hover']['background'] = $dt_button_bg_hover_color_hero;     
}

// Button border  
$border_color = 'transparent';

if($dt_button_border_color_hero != '') {
  $border_color = $dt_button_border_color_hero;
}

if($dt_btn_border_width_hero != ''){

    $hero_css_2[$wrapper_uniquue_id.' .education_learn_btn']['border'] = $dt_btn_border_width_hero .' solid'.' '.$border_color;     
}

if($dt_btn_border_width_hero != ''){

    $hero_css_2[$wrapper_uniquue_id.' .education_learn_btn:hover']['border-color'] = $dt_button_border_color_hover_hero;     
}

//  icon post 
if($dt_btn_left_margin_hero != ''){

    $hero_css_2[$wrapper_uniquue_id.' .education_learn_btn i']['margin-left'] = $dt_btn_left_margin_hero;     
}

if($dt_btn_right_margin_hero != ''){

    $hero_css_2[$wrapper_uniquue_id.' .education_learn_btn i']['margin-right'] = $dt_btn_right_margin_hero;     
}



if($dt_btn_font_size_hero != ''){

    $hero_css_2[$wrapper_uniquue_id.' .education_learn_btn']['font-size'] = $dt_btn_font_size_hero;     
}
if($dt_line_height_hero_description != ''){

    $hero_css_2[$wrapper_uniquue_id.' .education_learn_btn']['line-height'] = $dt_line_height_hero_description;     
}

if($dt_font_weight_hero_description != ''){

    $hero_css_2[$wrapper_uniquue_id.' .education_learn_btn']['font-weight'] = $dt_font_weight_hero_description;     
}


// tab  title 

if($dt_tab_font_sizehero_title != ''){

    $hero_tab_css[$wrapper_uniquue_id.' h2']['font-size'] = $dt_tab_font_sizehero_title;     
}

if($dt_tab_line_heighthero_title != ''){

    $hero_tab_css[$wrapper_uniquue_id.' h2']['line-height'] = $dt_tab_line_heighthero_title;     
}

//  mobile font size 
if($dt_mobile_font_size_hero_title != ''){

    $hero_mobile_css[$wrapper_uniquue_id.' h2']['font-size'] = $dt_mobile_font_size_hero_title;     
}

if($dt_mobile_line_height_hero_title != ''){

    $hero_tab_css[$wrapper_uniquue_id.' h2']['line-height'] = $dt_mobile_line_height_hero_title;     
}

// tab  description  

if($dt_tab_font_sizehero_description != ''){

    $hero_tab_css[$wrapper_uniquue_id.' h2']['font-size'] = $dt_tab_font_sizehero_description;     
}

if($dt_tab_line_heighthero_description != ''){

    $hero_tab_css[$wrapper_uniquue_id.' h2']['line-height'] = $dt_tab_line_heighthero_description;     
}

//  mobile font size  description 
if($dt_mobile_font_size_hero_description != ''){

    $hero_mobile_css[$wrapper_uniquue_id.' h2']['font-size'] = $dt_mobile_font_size_hero_description;     
}

if($dt_mobile_line_height_hero_description != ''){

    $hero_mobile_css[$wrapper_uniquue_id.' h2']['line-height'] = $dt_mobile_line_height_hero_description;     
}

$custom_css =  droit_css( $hero_css_2 );
//  tab 
$custom_css .=  droit_css_responsive( $hero_tab_css, 'max-width', '1024' );
//  mobile 
$custom_css .=  droit_css_responsive( $hero_mobile_css, 'max-width', '767' );

if(($image_url != '') || ($dt_te_overly_color_1 != '') || ($dt_te_overly_color_2 != '')) {

    $c1= $dt_te_overly_color_1 != '' ? $dt_te_overly_color_1 : 'rgba(98, 133, 54, 0.9)';
    $c2= $dt_te_overly_color_2 != '' ? $dt_te_overly_color_2 : 'rgba(98, 133, 54, 0.9)';

    $custom_css .= '
    .education_banner_area .triangle_img{
        background: linear-gradient(0deg, '.$c1.', '.$c2.'), url("'.$image_url.'") no-repeat scroll right 0/cover
    }';
}



 wp_add_inline_style( 'dt_extend_style', $custom_css );