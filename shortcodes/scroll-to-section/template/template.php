<?php
 
$uniqueu_class = wp_unique_id('scroll-to-section-');

$btn_class[] = $uniqueu_class;

if(isset($scroll_to_section_css)) {
     $btn_class[] = vc_shortcode_custom_css_class($scroll_to_section_css);;
}

$btn_class[] = 'bottom_btn scroll-t vc-scroll-to-section';

if(isset($dt_scroll_to_section_custon_class)) {
     $btn_class[] = $dt_scroll_to_section_custon_class;
}


$btn_generated_class = join( ' ', $btn_class);
$icon_unique_class = wp_unique_id('scroll-to-section-icon-');

$dt__scroll_to_icon[] = $icon_unique_class ;
$dt__scroll_to_icon[] = (isset($dt__scroll_to_section_icon) !='') ? $dt__scroll_to_section_icon: 'icon-arrow-down-2';
$dt__scroll_to_section_icon = join( ' ', $dt__scroll_to_icon);

$scroll_id = '';

if(isset($dt_scroll_to_section_id)){
     $scroll_id =   $dt_scroll_to_section_id;
}

$btn_text = '';
if(isset($dt_scroll_to_section_btn)) {
     $btn_text =  $dt_scroll_to_section_btn;
}


?>
<a href="<?php echo esc_attr( $dt_scroll_to_section_id ); ?>" class="<?php echo esc_attr( $btn_generated_class ); ?>">
<?php echo esc_html( $dt_scroll_to_section_btn ); ?> <i class="<?php echo esc_attr( $dt__scroll_to_section_icon ); ?>"></i>
</a>

<?php 

wp_enqueue_style('dt_extend_style');

$template_css_scroll = [];

// sub title color 
if(isset($dt_scroll_to_sction_color) && $dt_scroll_to_sction_color != ''){

     $template_css_scroll[$uniqueu_class]['color'] = $dt_scroll_to_sction_color;     
}

if(isset($dt_scroll_to_font_size) && $dt_scroll_to_font_size != ''){

     $template_css_scroll[$uniqueu_class]['font-size'] = $dt_scroll_to_font_size;     
}

if(isset($dt_scroll_to_icon_size) && $dt_scroll_to_icon_size != ''){

    $template_css_scroll[$icon_unique_class]['font-size'] = $dt_scroll_to_icon_size;     
}

$template_css_scroll['html']['scroll-behavior'] = 'smooth';  

$custom_css_scroll =  droit_css( $template_css_scroll );

wp_add_inline_style( 'dt_extend_style', $custom_css_scroll );
