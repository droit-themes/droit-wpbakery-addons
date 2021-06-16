<?php
$nav_menu       = isset( $dt_nav_menu_style ) ? $dt_nav_menu_style : '';
$nav_align      = isset( $dt_menu_alignment ) ? $dt_menu_alignment : 'start';
$nav_vh         = isset( $dt_menu_style ) ? $dt_menu_style : '';
$dt_menu_margin = isset( $dt_menu_item_margin ) ? $dt_menu_item_margin : '0';
$dt_menu_padding= isset( $dt_menu_item_padding ) ? $dt_menu_item_padding : '0';

$menu_font_size = isset( $dt_font_size_menu_color ) ? $dt_font_size_menu_color : '';
$menu_line_height = isset( $dt_line_height_menu_color ) ? $dt_line_height_menu_color : '';
$menu_font_weight = isset( $dt_font_weight_menu_color ) ? $dt_font_weight_menu_color : '';
$menu_font_color = isset( $dt_font_color_menu_color ) ? $dt_font_color_menu_color : '';


if( !empty( $nav_menu ) ) { ?>
    <nav class="navbar navbar-expand-lg">
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span></span><span></span><span></span><span></span><span></span><span></span>
        </button>
        <div class="collapse navbar-collapse justify-content-<?php echo esc_attr( $nav_align )?>" id="navbarSupportedContent">
            <?php
            wp_nav_menu(array(
                'menu'      => $nav_menu,
                'menu_class'=> 'navbar-nav menu rave-custom-menu',
                'container' => false,
                'walker'    => class_exists('Rave_Nav_Walker') ? new Rave_Nav_Walker() : '',
                'depth'     => 3
            ));
    echo '</div></nav>';
}

wp_enqueue_style('dt_extend_style');
$nav_menu_inline_style = '';

if( !empty( $dt_menu_color ) ){
    $nav_menu_inline_style .= "
        .navbar-nav.menu.rave-custom-menu.menu.rave-custom-menu > li > a{
            color: $dt_menu_color
        }
    ";
}
if( !empty( $dt_menu_hover_color ) ){
    $nav_menu_inline_style .= "
        .navbar-nav.menu.rave-custom-menu > li > a:hover{
            color: $dt_menu_hover_color
        }
    ";
}
if( !empty( $dt_st_menu_color ) ){
    $nav_menu_inline_style .= "
        .navbar-nav.menu.rave-custom-menu > li > a{
            color: $dt_st_menu_color
        }
    ";
}
if( !empty( $dt_st_menu_hover_color ) ){
    $nav_menu_inline_style .= "
        .navbar-nav.menu.rave-custom-menu > li > a:hover{
            color: $dt_st_menu_hover_color
        }
    ";
}

if( isset( $nav_vh ) ){
    $menu_class = $nav_vh == 'menu_horizontal' ? 'initial' : 'column';
    $nav_menu_inline_style .= "
    @media (min-width: 992px){
        .navbar-nav.menu.rave-custom-menu {
            flex-direction : $menu_class;
        }
    }
    ";
}
if( !empty( $dt_menu_margin ) ){
    $nav_menu_inline_style .= "
        .navbar-nav.menu.rave-custom-menu > li > a {
            margin : $dt_menu_margin;
        }
    ";
}
if( !empty( $dt_menu_padding ) ){
    $nav_menu_inline_style .= "
        .navbar-nav.menu.rave-custom-menu > li > a {
            padding : $dt_menu_padding;
        }
    ";
}

// Sub menu style ==========================
if( !empty( $dt_submenu_color ) ){
    $nav_menu_inline_style .= "
        .navbar-nav.menu.rave-custom-menu > li .submenu_dropdown .nav-item .nav-link {
            color : $dt_submenu_color
        }
    ";
}
if( !empty( $dt_submenu_bg_color ) ){
    $nav_menu_inline_style .= "
        .navbar-nav.menu.rave-custom-menu > li .submenu_dropdown .nav-item .nav-link {
            background : $dt_submenu_bg_color
        }
    ";
}
if( !empty( $dt_submenu_hover_color ) ){
    $nav_menu_inline_style .= "
        .navbar-nav.menu.rave-custom-menu > li .submenu_dropdown .nav-item .nav-link:hover {
            color : $dt_submenu_hover_color
        }
    ";
}
if( !empty( $dt_submenu_hover_bg_color ) ){
    $nav_menu_inline_style .= "
        .navbar-nav.menu.rave-custom-menu > li .submenu_dropdown .nav-item .nav-link:hover {
            background : $dt_submenu_hover_bg_color
        }
    ";
}
if( !empty( $dt_submenu_item_margin ) ){
    $nav_menu_inline_style .= "
        .navbar-nav.menu.rave-custom-menu > li .submenu_dropdown .nav-item .nav-link {
            margin : $dt_submenu_item_margin
        }
    ";
}
if( !empty( $dt_submenu_item_padding ) ){
    $nav_menu_inline_style .= "
        .navbar-nav.menu.rave-custom-menu > li .submenu_dropdown .nav-item .nav-link {
            padding : $dt_submenu_item_padding
        }
    ";
}
if( !empty( $menu_font_size ) ){
    $nav_menu_inline_style .= "
        .navbar-nav.menu.rave-custom-menu > li > .nav-link {
            font-size : $menu_font_size
        }
    ";
}
if( !empty( $menu_line_height ) ){
    $nav_menu_inline_style .= "
        .navbar-nav.menu.rave-custom-menu > li > .nav-link {
            line-height : $menu_line_height
        }
    ";
}
if( !empty( $menu_font_weight ) ){
    $nav_menu_inline_style .= "
        .navbar-nav.menu.rave-custom-menu > li > .nav-link {
            font-weight : $menu_font_weight
        }
    ";
}
if( !empty( $menu_font_color ) ){
    $nav_menu_inline_style .= "
        .navbar-nav.menu.rave-custom-menu.menu.rave-custom-menu > li > a {
            color : $menu_font_color
        }
    ";
}


wp_add_inline_style( 'dt_extend_style', $nav_menu_inline_style );