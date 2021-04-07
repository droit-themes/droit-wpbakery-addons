<?php
$wrapper_unique_class = wp_unique_id( 'simple-button-' );

$wrapper_class_list[] = $wrapper_unique_class;
$wrapper_class_list[] = 'architecture_btn_border hover_style1';
$wrapper_class_list[] = $dt_simple_button_class;

$wrapper_class = join(' ', $wrapper_class_list);

$url_attrs = vc_build_link($dt_simple_button_link);

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

?>

<a <?php echo esc_attr($link_attr); ?> class="<?php echo esc_attr( $wrapper_class ); ?>">
   <?php echo esc_html($dt_simple_button); ?>
</a>