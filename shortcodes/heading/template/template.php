<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$wrapper_class = vc_shortcode_custom_css_class($css2);

?>
<div class="banner_text_intro text-center <?php echo esc_attr($wrapper_class); ?>">

     <?php if('' !=$dt_subtitle ) :  ?>
        <span class="dt-subtitle brand_name"><?php echo esc_html($dt_subtitle); ?> </span>
      <?php endif; ?>

     <?php if('' !=$dt_title ) :  ?>
     <h2 class="dt-ttile title"><?php echo dt_extention_wp_kses($dt_title); ?></h2>
      <?php endif; ?>

     <?php if('' !=$dt_title_description ) :  ?>
     <p class="dt-title-description subtitle"><?php echo dt_extention_wp_kses($dt_title_description); ?></p>
      <?php endif; ?>

</div>