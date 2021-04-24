<?php
$wrapper_unique_class = wp_unique_id( 'simple-button-' );

$wrapper_class_list[] = $wrapper_unique_class;
$wrapper_class_list[] = 'construction_btn';
$wrapper_class_list[] = isset($dt_simple_button_class) ? $dt_simple_button_class : '';

$wrapper_class = join(' ', $wrapper_class_list);
$url_attrs = '';

if(isset($dt_simple_button_link)) {

    $url_attrs = vc_build_link($dt_simple_button_link);
}

$link_attr = '';

if(!empty($url_attrs)) {

foreach ($url_attrs as $key => $attr){
			
    if($key != 'title' && $attr != ''){

        if($key == 'url'){
            $key = 'href';
        }

        $link_attr .= $key.'='.$attr.' ';

    }
}
}
$button_text = '';
if(isset($dt_simple_button)) {
  $button_text = $dt_simple_button; 
}
?>

<a <?php echo esc_attr($link_attr); ?> class="<?php echo esc_attr( $wrapper_class ); ?>">
 <?php echo esc_html($button_text); ?> 
 <i class="icon-arrow-right-2"></i>
 </a>