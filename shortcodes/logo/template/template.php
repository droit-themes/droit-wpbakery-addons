<?php
$main_logo       = isset( $dt_main_logo ) ? wp_get_attachment_image_url( $dt_main_logo ) : '';
$main_retina_logo= isset( $dt_logo_retina ) ? wp_get_attachment_image_url( $dt_logo_retina ) : '';
$sticky_logo     = isset( $dt_sticky_logo ) ? wp_get_attachment_image_url( $dt_sticky_logo ) : '';
$sticky_retina_logo = isset( $dt_sticky_logo_retina ) ? wp_get_attachment_image_url( $dt_sticky_logo_retina ) : '';

$logo_margin     = isset( $dt_logo_margin ) ? $dt_logo_margin : '';
$logo_padding    = isset( $dt_logo_padding ) ? $dt_logo_padding : '';

if( !empty( $main_logo ) ){

    $retina_logo = !empty( $main_retina_logo ) ? "srcset= $main_retina_logo ".' 2x' : '';
    $sticky_retina_srcset = !empty( $sticky_retina_logo ) ? "srcset= $sticky_retina_logo ".' 2x' : '';


    ?>
    <a class="navbar-brand <?php echo !empty( $sticky_logo ) ? esc_attr__('sticky_logo', 'droit-wbpakery-addons') : ''; ?>" href="<?php echo esc_url(home_url('/')); ?>">
        <?php
        if ( !empty( $main_logo ) ) { ?>
            <img src="<?php echo esc_url($main_logo) ?>" alt="<?php bloginfo('name'); ?>" <?php echo wp_kses_post($retina_logo) ?>>
            <?php
            if( !empty( $sticky_logo ) ){
                echo '<img src="'. esc_url( $sticky_logo ) .'" alt="'. get_bloginfo('name') .'" '. wp_kses_post( $sticky_retina_srcset ) .'>';
            }
        }
        else{ ?>
            <h3> <?php echo get_bloginfo( 'name' ) ?> </h3>
            <?php
        }
    echo '</a>';
}
elseif( class_exists( 'Rave_Helper_Class' ) ){
    Rave_helper()->logo();
}




wp_enqueue_style('dt_extend_style');
$nav_menu_inline_style = '';

if( !empty( $logo_margin ) ){
    $nav_menu_inline_style .= "
        .navbar-brand{
            margin: $logo_margin
        }
    ";
}
if( !empty( $logo_padding ) ){
    $nav_menu_inline_style .= "
        .navbar-brand{
            padding: $logo_padding
        }
    ";
}

wp_add_inline_style( 'dt_extend_style', $nav_menu_inline_style );