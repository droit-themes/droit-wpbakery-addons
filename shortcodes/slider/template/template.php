<?php

$slider_items = vc_param_group_parse_atts($droit_slider_content);
wp_enqueue_script( 'dt_slider_js' );
?>

<div class="architecture_hero_area">
    <div class="architecture_text">
        <?php if('' != $dt_slider_title) {

             $title_html =  str_replace(['((', '))'], ['<span>', '</span>'], $dt_slider_title);
             
            ?>
         <h2><?php echo dt_return( $title_html);  ?></h2>
        <?php } ?>
    </div>
    <div class="hero_img">
        <div class="resturent_img_slider dt-architecture">
            <?php if(!empty($slider_items) ) { 
                foreach($slider_items as $key=>$items) {  ?>
                <div class="item <?php echo esc_attr( 'item-number-'.($key+1) ); ?>">
                    <?php echo wp_get_attachment_image( $items['dt_slider_img'], 'full' );  ?>
                </div>
            <?php } } ?>
        </div>
    </div>
</div>