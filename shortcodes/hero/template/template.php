<?php 
 
 $wrapper_uniqe_class = wp_unique_id( 'hero-statup-' );

 $wrapper_class[] = 'stratup_bg';
 $wrapper_class[] = $wrapper_uniqe_class;
 $wrapper_class = join(' ', $wrapper_class);

 $btn_class_unique = wp_unique_id( 'hero-statup-btn-' );
 $btn_class[] = $btn_class_unique;
 $btn_class[] = 'startup_btn wow fadeInUp';
 $btn_class[] = $dt_hero_btn_icon_hero == 'rgiht' ? 'icon-right' : '';
 $btn_class[] = 'dd-inline-flex dd-align-item-center';
 $btn_class = join(' ', $btn_class);

 //  subtitle class 

 $subtitle_class_uniq = wp_unique_id( 'hero-subtitle-' );
 $subtitle_class[] = $subtitle_class_uniq;
 $subtitle_class[] = 'wow fadeInUp';
 $subtitle_class = join(' ', $subtitle_class);

 // title 

 $title_class_uniq = wp_unique_id( 'hero-title-' );
 $title_class[] = $title_class_uniq;
 $title_class[] = 'wow fadeInUp';
 $title_class = join(' ', $title_class);

 //  description class generator 

 $description_class_uniq = wp_unique_id( 'hero-description-' );
 $description_class[] = $description_class_uniq;
 $description_class[] = 'wow fadeInUp';
 $description_class = join(' ', $description_class);
 
 $img_class_uniq = wp_unique_id( 'hero-img-' );
 $img_class[] = $img_class_uniq;
 $img_class[] = 'wow fadeInRight';
 $img_class = join(' ', $img_class);

 $url_attrs = array_filter(vc_build_link($dt_button_link_hero));
 $link_attr = '';
 $link_html = '';
 if(!empty($url_attrs)){

  foreach ($url_attrs as $key => $attr){
     
      if($key != 'title'){
          if($key == 'url'){
              $key = 'href';
          }
          $link_attr .= $key.'='.$attr.' ';

      }
  }
  $icon_before = '';
  $icon_after  = '';
  if($dt_button_icon_used_hero == 'yes' && $dt_button_icon_hero != '') {
   
     if($dt_hero_btn_icon_hero == ''){
      $dt_hero_btn_icon_hero = 'left';
     }

    if($dt_hero_btn_icon_hero == 'left') {
      $icon_before = '<i class="'.$dt_button_icon_hero.'"></i>';
    } 

    if($dt_hero_btn_icon_hero == 'rgiht') {
      $icon_after = '<i class="'.$dt_button_icon_hero.'"></i>';
    } 
  }
  $link_beofre = '<a '.esc_attr( $link_attr ).' class="'.esc_attr( $btn_class ).'" data-wow-delay="0.6s" >';  
  $link_after = '</a>';
  $link_html =  $link_beofre;
  $link_html .=  $icon_before. $dt_button_hero .$icon_after;
  $link_html .=  $link_after;
}

?>
<section class="stratup_banner_area site_padding">
      <div class="<?php echo esc_attr( $wrapper_class ); ?>">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-5">
              <div class="startup_banner_content">
                <?php if($dt_hero_subtitle != '') : ?>
                  <h5 class="<?php echo esc_attr( $subtitle_class ); ?>"><?php echo dt_extention_wp_kses($dt_hero_subtitle); ?></h5>
                <?php endif; 
                 if($dt_hero_title != '') : ?>
                  <h2 class="<?php echo esc_attr( $title_class ); ?>"><?php echo dt_extention_wp_kses($dt_hero_title); ?></h2>
                <?php endif; ?>
                <?php if($dt_hero_title != '') : ?>
                  <p class="<?php echo esc_attr( $description_class ); ?>" data-wow-delay="0.4s">
                      <?php echo dt_extention_wp_kses($dt_hero_description); ?>
                  </p>
                <?php endif; 
                
                echo dt_return($link_html);
                
                ?>
              </div>
            </div>
            <div class="col-lg-7">
              <div class="startup_banner_img">
                <div class="shape">
                  <?php if($dt_hero_animate_image != ''){
                    echo  wp_get_attachment_image($dt_hero_animate_image, 'full', null, array('class'=> 'layer layer2', 'data-depth'=> '0.3'));
                   }
                  ?>
                </div>
               
                  <?php
                  
                    if($dt_hero_image != '') {
                        echo wp_get_attachment_image( $dt_hero_image, 'full', null, array('class'=> $img_class, 'data-wow-delay'=>'0.6s') );
                    }
                  
                  ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php 

wp_enqueue_style('dt_extend_style');
        
$template_css = [];

// Wrapper backtround 
if($dt_backgroud_color != ''){

     $template_css[$wrapper_uniqe_class]['background-color'] = $dt_backgroud_color;     
}

/**
 * Subtitle 
 * @package fontsize font weight, line height, color
 */
//  Image postion 
if($dt_hero_img_pos != ''){

     $template_css[$img_class_uniq]['margin-top'] = $dt_hero_img_pos;     
}

if($dt_font_size_hero_subtitle != ''){

     $template_css[$subtitle_class_uniq]['font-size'] = $dt_font_size_hero_subtitle;     
}
// line height
if($dt_line_height_hero_subtitle != ''){

     $template_css[$subtitle_class_uniq]['line-height'] = $dt_line_height_hero_subtitle;     
}
// font-weight 
if($dt_font_weight_hero_subtitle != ''){

     $template_css[$subtitle_class_uniq]['font-weight'] = $dt_font_weight_hero_subtitle;     
}

// color 
if($dt_font_color_hero_subtitle != ''){

     $template_css[$subtitle_class_uniq]['color'] = $dt_font_color_hero_subtitle;     
}

/**
 * title  
 * @package fontsize font weight, line height, color
 */

if($dt_font_size_hero_title != ''){

  $template_css[$title_class_uniq]['font-size'] = $dt_font_size_hero_title;     
}
// line height
if($dt_line_height_hero_title != ''){

  $template_css[$title_class_uniq]['line-height'] = $dt_line_height_hero_title;     
}
// font-weight 
if($dt_font_weight_hero_title != ''){

  $template_css[$title_class_uniq]['font-weight'] = $dt_font_weight_hero_title;     
}

// color 
if($dt_font_color_hero_title != ''){

  $template_css[$title_class_uniq]['color'] = $dt_font_color_hero_title;     
}

/**
 * Description   
 * @package fontsize font weight, line height, color
 */

if($dt_font_size_hero_description != ''){

  $template_css[$description_class_uniq]['font-size'] = $dt_font_size_hero_description;     
}
// line height
if($dt_line_height_hero_description != ''){

  $template_css[$description_class_uniq]['line-height'] = $dt_line_height_hero_description;     
}
// font-weight 
if($dt_font_weight_hero_description != ''){

  $template_css[$description_class_uniq]['font-weight'] = $dt_font_weight_hero_description;     
}

// color 
if($dt_font_color_hero_description != ''){

  $template_css[$description_class_uniq]['color'] = $dt_font_color_hero_description;     
}

// Button border 



/**
 * icon 
 */

if($dt_btn_left_margin_hero != ''){

  $template_css[$btn_class_unique.' '.'i']['margin-left'] = $dt_btn_left_margin_hero;     
}

if($dt_btn_right_margin_hero != ''){

  $template_css[$btn_class_unique.' '.'i']['margin-right'] = $dt_btn_right_margin_hero;     
}

// font 

if($dt_btn_font_size_hero != ''){

  $template_css[$btn_class_unique]['font-size'] = $dt_btn_font_size_hero;     

}

if($dt_btn_font_line_height_hero != ''){

  $template_css[$btn_class_unique]['line-height'] = $dt_btn_font_line_height_hero;     

}

if($dt_btn_font_weight_hero != ''){

  $template_css[$btn_class_unique]['font-weight'] = $dt_btn_font_weight_hero;     

}

if($dt_btn_border_width_hero != ''){

  $template_css[$btn_class_unique]['border'] = $dt_btn_border_width_hero.' '.'solid'.' '.$dt_button_border_color_hero;     

}

if($dt_button_border_color_hover_hero != '' && $dt_btn_border_width_hero){

  $template_css[$btn_class_unique.':hover']['border'] = $dt_btn_border_width_hero.' '.'solid'.' '.$dt_button_border_color_hover_hero;     

}
if($dt_button_color_hero != ''){

  $template_css[$btn_class_unique]['color'] = $dt_button_color_hero;     

}
if($dt_button_hover_color_hero != ''){

  $template_css[$btn_class_unique.':hover']['color'] = $dt_button_hover_color_hero;     

}

if($dt_button_bg_color_hero != ''){

  $template_css[$btn_class_unique]['background-color'] = $dt_button_bg_color_hero;     

}
if($dt_button_bg_color_hero != ''){

  $template_css[$btn_class_unique]['background-color'] = $dt_button_bg_color_hero;     

}
if($dt_button_bg_hover_color_hero != ''){

  $template_css[$btn_class_unique.':hover']['background-color'] = $dt_button_bg_hover_color_hero;     

}



$custom_css =  droit_css( $template_css );

 wp_add_inline_style( 'dt_extend_style', $custom_css );