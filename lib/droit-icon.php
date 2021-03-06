<?php

// Add new custom font to Font Family selection in icon box module
function droit_add_new_icon_set_to_iconbox( ) {
	$param = WPBMap::getParam( 'vc_icon', 'type' );
	$param['value'][__( 'Droit Icon', 'total' )] = 'droit_icon';
	vc_update_shortcode_param( 'vc_icon', $param );
}
add_filter( 'init', 'droit_add_new_icon_set_to_iconbox', 40 );

// Add font picker setting to icon box module when you select your font family from the dropdown
function droit_add_font_picker() {
	vc_add_param( 'vc_icon', array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Droit Icon', 'total' ),
			'param_name' => 'icon_droit_icon',
			'settings' => array(
				'emptyIcon' => true,
				'type' => 'droit_icon',
				'iconsPerPage' => 200,
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'droit_icon',
			),
		)
	);
}
add_filter( 'vc_after_init', 'droit_add_font_picker', 40 );

// Add array of your fonts so they can be displayed in the font selector
function droit_icon_array() {
	return array(
        array('ti-wand' => esc_html__('Wand', 'droit-wbpakery-addons')),
        array('ti-volume' => esc_html__('Volume', 'droit-wbpakery-addons')),
        array('ti-user' => esc_html__('User', 'droit-wbpakery-addons')),
        array('ti-unlock' => esc_html__('Unlock', 'droit-wbpakery-addons')),
        array('ti-unlink' => esc_html__('Unlink', 'droit-wbpakery-addons')),
        array('ti-trash' => esc_html__('Trash', 'droit-wbpakery-addons')),
        array('ti-thought' => esc_html__('Thought', 'droit-wbpakery-addons')),
        array('ti-target' => esc_html__('Target', 'droit-wbpakery-addons')),
        array('ti-tag' => esc_html__('Tag', 'droit-wbpakery-addons')),
        array('ti-tablet' => esc_html__('Tablet', 'droit-wbpakery-addons')),
        array('ti-star' => esc_html__('Star', 'droit-wbpakery-addons')),
        array('ti-spray' => esc_html__('Spray', 'droit-wbpakery-addons')),
        array('ti-shopping-cart-full' => esc_html__('Shopping Cart Full', 'droit-wbpakery-addons')),
        array('ti-shopping-cart' => esc_html__('Shopping Cart', 'droit-wbpakery-addons')),
        array('ti-settings' => esc_html__('Settings', 'droit-wbpakery-addons')),
        array('ti-search' => esc_html__('Search', 'droit-wbpakery-addons')),
        array('ti-zoom-in' => esc_html__('Zoom In', 'droit-wbpakery-addons')),
        array('ti-zoom-out' => esc_html__('Zoom Out', 'droit-wbpakery-addons')),
        array('ti-cut' => esc_html__('Cut', 'droit-wbpakery-addons')),
        array('ti-ruler' => esc_html__('Ruler', 'droit-wbpakery-addons')),
        array('ti-ruler-pencil' => esc_html__('Ruler Pencil', 'droit-wbpakery-addons')),
        array('ti-ruler-alt' => esc_html__('Ruler alt', 'droit-wbpakery-addons')),
        array('ti-bookmark' => esc_html__('Bookmark', 'droit-wbpakery-addons')),
        array('ti-bookmark-alt' => esc_html__('Bookmark Alt', 'droit-wbpakery-addons')),
        array('ti-reload' => esc_html__('Reload', 'droit-wbpakery-addons')),
        array('ti-plus' => esc_html__('Plus', 'droit-wbpakery-addons')),
        array('ti-pin' => esc_html__('Pin', 'droit-wbpakery-addons')),
        array('ti-pencil' => esc_html__('Pencil', 'droit-wbpakery-addons')),
        array('ti-pencil-alt' => esc_html__('Pencil Alt', 'droit-wbpakery-addons')),
        array('ti-paint-roller' => esc_html__('Paint Roller', 'droit-wbpakery-addons')),
        array('ti-paint-bucket' => esc_html__('Paint Bucket', 'droit-wbpakery-addons')),
        array('ti-na' => esc_html__('Na', 'droit-wbpakery-addons')),
        array('ti-mobile' => esc_html__('Mobile', 'droit-wbpakery-addons')),
        array('ti-minus' => esc_html__('Minus', 'droit-wbpakery-addons')),
        array('ti-medall' => esc_html__('Medall', 'droit-wbpakery-addons')),
        array('ti-medall-alt' => esc_html__('Medall Alt', 'droit-wbpakery-addons')),
        array('ti-marker' => esc_html__('Marker', 'droit-wbpakery-addons')),
        array('ti-marker-alt' => esc_html__('Marker Alt', 'droit-wbpakery-addons')),
        array('ti-arrow-up' => esc_html__('Arrow Up', 'droit-wbpakery-addons')),
        array('ti-arrow-right' => esc_html__('Arrow Right', 'droit-wbpakery-addons')),
        array('ti-arrow-left' => esc_html__('Arrow Left', 'droit-wbpakery-addons')),
        array('ti-arrow-down' => esc_html__('Arrow Down', 'droit-wbpakery-addons')),
        array('ti-lock' => esc_html__('Lock', 'droit-wbpakery-addons')),
        array('ti-location-arrow' => esc_html__('Location Arrow', 'droit-wbpakery-addons')),
        array('ti-link' => esc_html__('Link', 'droit-wbpakery-addons')),
        array('ti-layout' => esc_html__('Layout', 'droit-wbpakery-addons')),
        array('ti-layers' => esc_html__('Layers', 'droit-wbpakery-addons')),
        array('ti-layers-alt' => esc_html__('Layers Alt', 'droit-wbpakery-addons')),
        array('ti-key' => esc_html__('Key', 'droit-wbpakery-addons')),
        array('ti-import' => esc_html__('Import', 'droit-wbpakery-addons')),
        array('ti-image' => esc_html__('Image', 'droit-wbpakery-addons')),
        array('ti-heart' => esc_html__('Heart', 'droit-wbpakery-addons')),
        array('ti-heart-broken' => esc_html__('Heart Broken', 'droit-wbpakery-addons')),
        array('ti-hand-stop' => esc_html__('Hand Stop', 'droit-wbpakery-addons')),
        array('ti-hand-open' => esc_html__('Hand Open', 'droit-wbpakery-addons')),
        array('ti-hand-drag' => esc_html__('Hand Drag', 'droit-wbpakery-addons')),
        array('ti-folder' => esc_html__('Folder', 'droit-wbpakery-addons')),
        array('ti-flag' => esc_html__('Flag', 'droit-wbpakery-addons')),
        array('ti-flag-alt' => esc_html__('Flag Alt', 'droit-wbpakery-addons')),
        array('ti-flag-alt-2' => esc_html__('Flag Alt 2', 'droit-wbpakery-addons')),
        array('ti-eye' => esc_html__('Eye', 'droit-wbpakery-addons')),
        array('ti-export' => esc_html__('Export', 'droit-wbpakery-addons')),
        array('ti-exchange-vertical' => esc_html__('Exchange Vertical', 'droit-wbpakery-addons')),
        array('ti-desktop' => esc_html__('Desktop', 'droit-wbpakery-addons')),
        array('ti-cup' => esc_html__('Cup', 'droit-wbpakery-addons')),
        array('ti-crown' => esc_html__('Crown', 'droit-wbpakery-addons')),
        array('ti-comments' => esc_html__('Comments', 'droit-wbpakery-addons')),
        array('ti-comment' => esc_html__('Comment', 'droit-wbpakery-addons')),
        array('ti-comment-alt' => esc_html__('Comment Alt', 'droit-wbpakery-addons')),
        array('ti-close' => esc_html__('Close', 'droit-wbpakery-addons')),
        array('ti-clip' => esc_html__('Clip', 'droit-wbpakery-addons')),
        array('ti-angle-up' => esc_html__('Angle Up', 'droit-wbpakery-addons')),
        array('ti-angle-right' => esc_html__('Angle Right', 'droit-wbpakery-addons')),
        array('ti-angle-left' => esc_html__('Angle Left', 'droit-wbpakery-addons')),
        array('ti-angle-down' => esc_html__('Angle Down', 'droit-wbpakery-addons')),
        array('ti-check' => esc_html__('Check', 'droit-wbpakery-addons')),
        array('ti-check-box' => esc_html__('Check Box', 'droit-wbpakery-addons')),
        array('ti-camera' => esc_html__('Camera', 'droit-wbpakery-addons')),
        array('ti-announcement' => esc_html__('Announcement', 'droit-wbpakery-addons')),
        array('ti-brush' => esc_html__('Brush', 'droit-wbpakery-addons')),
        array('ti-briefcase' => esc_html__('Briefcase', 'droit-wbpakery-addons')),
        array('ti-bolt' => esc_html__('Bolt', 'droit-wbpakery-addons')),
        array('ti-bolt-alt' => esc_html__('Bolt Alt', 'droit-wbpakery-addons')),
        array('ti-blackboard' => esc_html__('Blackboard', 'droit-wbpakery-addons')),
        array('ti-bag' => esc_html__('Bag', 'droit-wbpakery-addons')),
        array('ti-move' => esc_html__('Move', 'droit-wbpakery-addons')),
        array('ti-arrows-vertical' => esc_html__('Arrows Vertical', 'droit-wbpakery-addons')),
        array('ti-arrows-horizontal' => esc_html__('Arrows Horizontal', 'droit-wbpakery-addons')),
        array('ti-fullscreen' => esc_html__('Fullscreen', 'droit-wbpakery-addons')),
        array('ti-arrow-top-right' => esc_html__('Arrow Top Right', 'droit-wbpakery-addons')),
        array('ti-arrow-top-left' => esc_html__('Arrow Top Left', 'droit-wbpakery-addons')),
        array('ti-arrow-circle-up' => esc_html__('Arrow Circle Up', 'droit-wbpakery-addons')),
        array('ti-arrow-circle-right' => esc_html__('Arrow Circle Right', 'droit-wbpakery-addons')),
        array('ti-arrow-circle-left' => esc_html__('Arrow Circle Left', 'droit-wbpakery-addons')),
        array('ti-arrow-circle-down' => esc_html__('Arrow Circle Down', 'droit-wbpakery-addons')),
        array('ti-angle-double-up' => esc_html__('Angle Double Up', 'droit-wbpakery-addons')),
        array('ti-angle-double-right' => esc_html__('Angle Double Right', 'droit-wbpakery-addons')),
        array('ti-angle-double-left' => esc_html__('Angle Double Left', 'droit-wbpakery-addons')),
        array('ti-angle-double-down' => esc_html__('Angle Double Down', 'droit-wbpakery-addons')),
        array('ti-zip' => esc_html__('Zip', 'droit-wbpakery-addons')),
        array('ti-world' => esc_html__('World', 'droit-wbpakery-addons')),
        array('ti-wheelchair' => esc_html__('Wheelchair', 'droit-wbpakery-addons')),
        array('ti-view-list' => esc_html__('View List', 'droit-wbpakery-addons')),
        array('ti-view-list-alt' => esc_html__('View List Alt', 'droit-wbpakery-addons')),
        array('ti-view-grid' => esc_html__('View Grid', 'droit-wbpakery-addons')),
        array('ti-uppercase' => esc_html__('Uppercase', 'droit-wbpakery-addons')),
        array('ti-upload' => esc_html__('Upload', 'droit-wbpakery-addons')),
        array('ti-underline' => esc_html__('Underline', 'droit-wbpakery-addons')),
        array('ti-truck' => esc_html__('Truck', 'droit-wbpakery-addons')),
        array('ti-timer' => esc_html__('Timer', 'droit-wbpakery-addons')),
        array('ti-ticket' => esc_html__('Ticket', 'droit-wbpakery-addons')),
        array('ti-thumb-up' => esc_html__('Thumb Up', 'droit-wbpakery-addons')),
        array('ti-thumb-down' => esc_html__('Thumb Down', 'droit-wbpakery-addons')),
        array('ti-text' => esc_html__('Text', 'droit-wbpakery-addons')),
        array('ti-stats-up' => esc_html__('Stats Up', 'droit-wbpakery-addons')),
        array('ti-stats-down' => esc_html__('Stats Down', 'droit-wbpakery-addons')),
        array('ti-split-v' => esc_html__('Split V', 'droit-wbpakery-addons')),
        array('ti-split-h' => esc_html__('Split-h', 'droit-wbpakery-addons')),
        array('ti-smallcap' => esc_html__('Smallcap', 'droit-wbpakery-addons')),
        array('ti-shine' => esc_html__('Shine', 'droit-wbpakery-addons')),
        array('ti-shift-right' => esc_html__('Shift Right', 'droit-wbpakery-addons')),
        array('ti-shift-left' => esc_html__('Shift Left', 'droit-wbpakery-addons')),
        array('ti-shield' => esc_html__('Shield', 'droit-wbpakery-addons')),
        array('ti-notepad' => esc_html__('Notepad', 'droit-wbpakery-addons')),
        array('ti-server' => esc_html__('Server', 'droit-wbpakery-addons')),
        array('ti-quote-right' => esc_html__('Quote Right', 'droit-wbpakery-addons')),
        array('ti-quote-left' => esc_html__('Quote Left', 'droit-wbpakery-addons')),
        array('ti-pulse' => esc_html__('Pulse', 'droit-wbpakery-addons')),
        array('ti-printer' => esc_html__('Printer', 'droit-wbpakery-addons')),
        array('ti-power-off' => esc_html__('Power Off', 'droit-wbpakery-addons')),
        array('ti-plug' => esc_html__('Plug', 'droit-wbpakery-addons')),
        array('ti-pie-chart' => esc_html__('Pie Chart', 'droit-wbpakery-addons')),
        array('ti-paragraph' => esc_html__('Paragraph', 'droit-wbpakery-addons')),
        array('ti-panel' => esc_html__('Panel', 'droit-wbpakery-addons')),
        array('ti-package' => esc_html__('Package', 'droit-wbpakery-addons')),
        array('ti-music' => esc_html__('Music', 'droit-wbpakery-addons')),
        array('ti-music-alt' => esc_html__('Music Alt', 'droit-wbpakery-addons')),
        array('ti-mouse' => esc_html__('Mouse', 'droit-wbpakery-addons')),
        array('ti-mouse-alt' => esc_html__('Mouse Alt', 'droit-wbpakery-addons')),
        array('ti-money' => esc_html__('Money', 'droit-wbpakery-addons')),
        array('ti-microphone' => esc_html__('Microphone', 'droit-wbpakery-addons')),
        array('ti-menu' => esc_html__('Menu', 'droit-wbpakery-addons')),
        array('ti-menu-alt' => esc_html__('Menu Alt', 'droit-wbpakery-addons')),
        array('ti-map' => esc_html__('Map', 'droit-wbpakery-addons')),
        array('ti-map-alt' => esc_html__('Map Alt', 'droit-wbpakery-addons')),
        array('ti-loop' => esc_html__('Loop', 'droit-wbpakery-addons')),
        array('ti-location-pin' => esc_html__('Location Pin', 'droit-wbpakery-addons')),
        array('ti-list' => esc_html__('List', 'droit-wbpakery-addons')),
        array('ti-light-bulb' => esc_html__('Light Bulb', 'droit-wbpakery-addons')),
        array('ti-Italic' => esc_html__('Italic', 'droit-wbpakery-addons')),
        array('ti-info' => esc_html__('Info', 'droit-wbpakery-addons')),
        array('ti-infinite' => esc_html__('Infinite', 'droit-wbpakery-addons')),
        array('ti-id-badge' => esc_html__('Badge', 'droit-wbpakery-addons')),
        array('ti-hummer' => esc_html__('Hummer', 'droit-wbpakery-addons')),
        array('ti-home' => esc_html__('Home', 'droit-wbpakery-addons')),
        array('ti-help' => esc_html__('Help', 'droit-wbpakery-addons')),
        array('ti-headphone' => esc_html__('Headphone', 'droit-wbpakery-addons')),
        array('ti-harddrives' => esc_html__('Harddrives', 'droit-wbpakery-addons')),
        array('ti-harddrive' => esc_html__('Harddrive', 'droit-wbpakery-addons')),
        array('ti-gift' => esc_html__('Gift', 'droit-wbpakery-addons')),
        array('ti-game' => esc_html__('Game', 'droit-wbpakery-addons')),
        array('ti-filter' => esc_html__('Filter', 'droit-wbpakery-addons')),
        array('ti-files' => esc_html__('Files', 'droit-wbpakery-addons')),
        array('ti-file' => esc_html__('File', 'droit-wbpakery-addons')),
        array('ti-eraser' => esc_html__('Eraser', 'droit-wbpakery-addons')),
        array('ti-envelope' => esc_html__('Envelope', 'droit-wbpakery-addons')),
        array('ti-download' => esc_html__('Download', 'droit-wbpakery-addons')),
        array('ti-direction' => esc_html__('Direction', 'droit-wbpakery-addons')),
        array('ti-direction-alt' => esc_html__('Direction Alt', 'droit-wbpakery-addons')),
        array('ti-dashboard' => esc_html__('Dashboard', 'droit-wbpakery-addons')),
        array('ti-control-stop' => esc_html__('Control Stop', 'droit-wbpakery-addons')),
        array('ti-control-shuffle' => esc_html__('Control Shuffle', 'droit-wbpakery-addons')),
        array('ti-control-play' => esc_html__('Control Play', 'droit-wbpakery-addons')),
        array('ti-control-pause' => esc_html__('Control Pause', 'droit-wbpakery-addons')),
        array('ti-control-forward' => esc_html__('Control Forward', 'droit-wbpakery-addons')),
        array('ti-control-backward' => esc_html__('Control Backward', 'droit-wbpakery-addons')),
        array('ti-cloud' => esc_html__('Cloud', 'droit-wbpakery-addons')),
        array('ti-cloud-up' => esc_html__('Cloud-up', 'droit-wbpakery-addons')),
        array('ti-cloud-down' => esc_html__('Cloud Down', 'droit-wbpakery-addons')),
        array('ti-clipboard' => esc_html__('Clipboard', 'droit-wbpakery-addons')),
        array('ti-car' => esc_html__('Car', 'droit-wbpakery-addons')),
        array('ti-calendar' => esc_html__('Calendar', 'droit-wbpakery-addons')),
        array('ti-book' => esc_html__('Book', 'droit-wbpakery-addons')),
        array('ti-bell' => esc_html__('Bell', 'droit-wbpakery-addons')),
        array('ti-basketball' => esc_html__('Basketball', 'droit-wbpakery-addons')),
        array('ti-bar-chart' => esc_html__('Bar Chart', 'droit-wbpakery-addons')),
        array('ti-bar-chart-alt' => esc_html__('Bar Chart Alt', 'droit-wbpakery-addons')),
        array('ti-back-right' => esc_html__('Back Right', 'droit-wbpakery-addons')),
        array('ti-back-left' => esc_html__('Back Left', 'droit-wbpakery-addons')),
        array('ti-arrows-corner' => esc_html__('Arrows Corner', 'droit-wbpakery-addons')),
        array('ti-archive' => esc_html__('Archive', 'droit-wbpakery-addons')),
        array('ti-anchor' => esc_html__('Anchor', 'droit-wbpakery-addons')),
        array('ti-align-right' => esc_html__('Align Right', 'droit-wbpakery-addons')),
        array('ti-align-left' => esc_html__('Align Left', 'droit-wbpakery-addons')),
        array('ti-align-justify' => esc_html__('Align Justify', 'droit-wbpakery-addons')),
        array('ti-align-center' => esc_html__('Align Center', 'droit-wbpakery-addons')),
        array('ti-alert' => esc_html__('Alert', 'droit-wbpakery-addons')),
        array('ti-alarm-clock' => esc_html__('Alarm Clock', 'droit-wbpakery-addons')),
        array('ti-agenda' => esc_html__('Agenda', 'droit-wbpakery-addons')),
        array('ti-write' => esc_html__('Write', 'droit-wbpakery-addons')),
        array('ti-window' => esc_html__('Window', 'droit-wbpakery-addons')),
        array('ti-widgetized' => esc_html__('Widgetized', 'droit-wbpakery-addons')),
        array('ti-widget' => esc_html__('Widget', 'droit-wbpakery-addons')),
        array('ti-widget-alt' => esc_html__('Widget Alt', 'droit-wbpakery-addons')),
        array('ti-wallet' => esc_html__('Wallet', 'droit-wbpakery-addons')),
        array('ti-video-clapper' => esc_html__('Video Clapper', 'droit-wbpakery-addons')),
        array('ti-video-camera' => esc_html__('Video Camera', 'droit-wbpakery-addons')),
        array('ti-vector' => esc_html__('Vector', 'droit-wbpakery-addons')),
        array('ti-themify-logo' => esc_html__('Themify Logo', 'droit-wbpakery-addons')),
        array('ti-themify-favicon' => esc_html__('Themify Favicon', 'droit-wbpakery-addons')),
        array('ti-themify-favicon-alt' => esc_html__('Themify Favicon Alt', 'droit-wbpakery-addons')),
        array('ti-support' => esc_html__('Support', 'droit-wbpakery-addons')),
        array('ti-stamp' => esc_html__('Stamp', 'droit-wbpakery-addons')),
        array('ti-split-v-alt' => esc_html__('Split V Alt', 'droit-wbpakery-addons')),
        array('ti-slice' => esc_html__('Slice', 'droit-wbpakery-addons')),
        array('ti-shortcode' => esc_html__('Shortcode', 'droit-wbpakery-addons')),
        array('ti-shift-right-alt' => esc_html__('Shift Right Alt', 'droit-wbpakery-addons')),
        array('ti-shift-left-alt' => esc_html__('Shift Left Alt', 'droit-wbpakery-addons')),
        array('ti-ruler-alt-2' => esc_html__('Ruler Alt 2', 'droit-wbpakery-addons')),
        array('ti-receipt' => esc_html__('Receipt', 'droit-wbpakery-addons')),
        array('ti-pin2' => esc_html__('Pin2', 'droit-wbpakery-addons')),
        array('ti-pin-alt' => esc_html__('Pin Alt', 'droit-wbpakery-addons')),
        array('ti-pencil-alt2' => esc_html__('Pencil Alt2', 'droit-wbpakery-addons')),
        array('ti-palette' => esc_html__('Palette', 'droit-wbpakery-addons')),
        array('ti-more' => esc_html__('More', 'droit-wbpakery-addons')),
        array('ti-more-alt' => esc_html__('More Alt', 'droit-wbpakery-addons')),
        array('ti-microphone-alt' => esc_html__('Microphone Alt', 'droit-wbpakery-addons')),
        array('ti-magnet' => esc_html__('Magnet', 'droit-wbpakery-addons')),
        array('ti-line-double' => esc_html__('Line Double', 'droit-wbpakery-addons')),
        array('ti-line-dotted' => esc_html__('Line Dotted', 'droit-wbpakery-addons')),
        array('ti-line-dashed' => esc_html__('Line Dashed', 'droit-wbpakery-addons')),
        array('ti-layout-width-full' => esc_html__('Layout Width Full', 'droit-wbpakery-addons')),
        array('ti-layout-width-default' => esc_html__('Layout Width Default', 'droit-wbpakery-addons')),
        array('ti-layout-width-default-alt' => esc_html__('Layout Width Default Alt', 'droit-wbpakery-addons')),
        array('ti-layout-tab' => esc_html__('Layout Tab', 'droit-wbpakery-addons')),
        array('ti-layout-tab-window' => esc_html__('Layout Tab Window', 'droit-wbpakery-addons')),
        array('ti-layout-tab-v' => esc_html__('Layout Tab V', 'droit-wbpakery-addons')),
        array('ti-layout-tab-min' => esc_html__('Layout Tab Min', 'droit-wbpakery-addons')),
        array('ti-layout-slider' => esc_html__('Layout Slider', 'droit-wbpakery-addons')),
        array('ti-layout-slider-alt' => esc_html__('Layout Slider Alt', 'droit-wbpakery-addons')),
        array('ti-layout-sidebar-right' => esc_html__('Layout Sidebar Right', 'droit-wbpakery-addons')),
        array('ti-layout-sidebar-none' => esc_html__('Layout Sidebar None', 'droit-wbpakery-addons')),
        array('ti-layout-sidebar-left' => esc_html__('Layout Sidebar Left', 'droit-wbpakery-addons')),
        array('ti-layout-placeholder' => esc_html__('Layout Placeholder', 'droit-wbpakery-addons')),
        array('ti-layout-menu' => esc_html__('Layout Menu', 'droit-wbpakery-addons')),
        array('ti-layout-menu-v' => esc_html__('layout Menu V', 'droit-wbpakery-addons')),
        array('ti-layout-menu-separated' => esc_html__('Layout Menu Separated', 'droit-wbpakery-addons')),
        array('ti-layout-menu-full' => esc_html__('Layout Menu Full', 'droit-wbpakery-addons')),
        array('ti-layout-media-right-alt' => esc_html__('Layout Media Right Alt', 'droit-wbpakery-addons')),
        array('ti-layout-media-right' => esc_html__('Layout Media Right', 'droit-wbpakery-addons')),
        array('ti-layout-media-overlay' => esc_html__('Layout Media Overlay', 'droit-wbpakery-addons')),
        array('ti-layout-media-overlay-alt' => esc_html__('Layout Media Overlay Alt', 'droit-wbpakery-addons')),
        array('ti-layout-media-overlay-alt-2' => esc_html__('Layout Media Overlay Alt 2', 'droit-wbpakery-addons')),
        array('ti-layout-media-left-alt' => esc_html__('Layout Media Left Alt', 'droit-wbpakery-addons')),
        array('ti-layout-media-left' => esc_html__('Layout Media Left', 'droit-wbpakery-addons')),
        array('ti-layout-media-center-alt' => esc_html__('Layout Media Center Alt', 'droit-wbpakery-addons')),
        array('ti-layout-media-center' => esc_html__('Layout Media Center', 'droit-wbpakery-addons')),
        array('ti-layout-list-thumb' => esc_html__('Layout List Thumb', 'droit-wbpakery-addons')),
        array('ti-layout-list-thumb-alt' => esc_html__('Layout List Thumb Alt', 'droit-wbpakery-addons')),
        array('ti-layout-list-post' => esc_html__('Layout List Post', 'droit-wbpakery-addons')),
        array('ti-layout-list-large-image' => esc_html__('Layout List Large Image', 'droit-wbpakery-addons')),
        array('ti-layout-line-solid' => esc_html__('Layout Line Solid', 'droit-wbpakery-addons')),
        array('ti-layout-grid4' => esc_html__('Layout Grid4', 'droit-wbpakery-addons')),
        array('ti-layout-grid3' => esc_html__('Layout Grid3', 'droit-wbpakery-addons')),
        array('ti-layout-grid2' => esc_html__('Layout Grid2', 'droit-wbpakery-addons')),
        array('ti-layout-grid2-thumb' => esc_html__('Layout Grid2 Thumb', 'droit-wbpakery-addons')),
        array('ti-layout-cta-right' => esc_html__('Layout Cta Right', 'droit-wbpakery-addons')),
        array('ti-layout-cta-left' => esc_html__('Layout Cta Left', 'droit-wbpakery-addons')),
        array('ti-layout-cta-center' => esc_html__('Layout Cta Center', 'droit-wbpakery-addons')),
        array('ti-layout-cta-btn-right' => esc_html__('Layout Cta Btn Right', 'droit-wbpakery-addons')),
        array('ti-layout-cta-btn-left' => esc_html__('Layout Cta Btn Left', 'droit-wbpakery-addons')),
        array('ti-layout-column4' => esc_html__('Layout Column4', 'droit-wbpakery-addons')),
        array('ti-layout-column3' => esc_html__('Layout Column3', 'droit-wbpakery-addons')),
        array('ti-layout-column2' => esc_html__('Layout Column2', 'droit-wbpakery-addons')),
        array('ti-layout-accordion-separated' => esc_html__('Layout Accordion Separated', 'droit-wbpakery-addons')),
        array('ti-layout-accordion-merged' => esc_html__('Layout Accordion Merged', 'droit-wbpakery-addons')),
        array('ti-layout-accordion-list' => esc_html__('Layout Accordion List', 'droit-wbpakery-addons')),
        array('ti-ink-pen' => esc_html__('Ink Pen', 'droit-wbpakery-addons')),
        array('ti-info-alt' => esc_html__('Info Alt', 'droit-wbpakery-addons')),
        array('ti-help-alt' => esc_html__('Help Alt', 'droit-wbpakery-addons')),
        array('ti-headphone-alt' => esc_html__('Headphone Alt', 'droit-wbpakery-addons')),
        array('ti-hand-point-up' => esc_html__('Hand Point Up', 'droit-wbpakery-addons')),
        array('ti-hand-point-right' => esc_html__('Hand Point Right', 'droit-wbpakery-addons')),
        array('ti-hand-point-left' => esc_html__('Hand Point Left', 'droit-wbpakery-addons')),
        array('ti-hand-point-down' => esc_html__('Hand Point Down', 'droit-wbpakery-addons')),
        array('ti-gallery' => esc_html__('Gallery', 'droit-wbpakery-addons')),
        array('ti-face-smile' => esc_html__('Face Smile', 'droit-wbpakery-addons')),
        array('ti-face-sad' => esc_html__('Face Sad', 'droit-wbpakery-addons')),
        array('ti-credit-card' => esc_html__('Credit Card', 'droit-wbpakery-addons')),
        array('ti-control-skip-forward' => esc_html__('Control Skip Forward', 'droit-wbpakery-addons')),
        array('ti-control-skip-forward' => esc_html__('Control Skip Forward', 'droit-wbpakery-addons')),
        array('ti-control-skip-forward' => esc_html__('Control Skip Forward', 'droit-wbpakery-addons')),
        array('ti-control-record' => esc_html__('Control Record', 'droit-wbpakery-addons')),
        array('Control-eject' => esc_html__('Control Eject', 'droit-wbpakery-addons')),
        array('ti-comments-smiley' => esc_html__('Comments Smiley', 'droit-wbpakery-addons')),
        array('ti-brush-alt' => esc_html__('Brush Alt', 'droit-wbpakery-addons')),
        array('ti-youtube' => esc_html__('Youtube', 'droit-wbpakery-addons')),
        array('ti-vimeo' => esc_html__('Vimeo', 'droit-wbpakery-addons')),
        array('ti-twitter' => esc_html__('Twitter', 'droit-wbpakery-addons')),
        array('ti-time' => esc_html__('Time', 'droit-wbpakery-addons')),
        array('ti-tumblr' => esc_html__('Tumblr', 'droit-wbpakery-addons')),
        array('ti-skype' => esc_html__('Skype', 'droit-wbpakery-addons')),
        array('ti-share' => esc_html__('Share', 'droit-wbpakery-addons')),
        array('ti-share-alt' => esc_html__('Share Alt', 'droit-wbpakery-addons')),
        array('ti-rocket' => esc_html__('Rocket', 'droit-wbpakery-addons')),
        array('ti-pinterest' => esc_html__('Pinterest', 'droit-wbpakery-addons')),
        array('ti-new-window' => esc_html__('New Window', 'droit-wbpakery-addons')),
        array('ti-microsoft' => esc_html__('Microsoft', 'droit-wbpakery-addons')),
        array('ti-list-ol' => esc_html__('List Ol', 'droit-wbpakery-addons')),
        array('ti-linkedin' => esc_html__('Linkedin', 'droit-wbpakery-addons')),
        array('ti-layout-sidebar-2' => esc_html__('Layout Sidebar-2', 'droit-wbpakery-addons')),
        array('ti-layout-grid4-alt' => esc_html__('Layout Grid4 Alt', 'droit-wbpakery-addons')),
        array('ti-layout-grid3-alt' => esc_html__('Layout Grid3 Alt', 'droit-wbpakery-addons')),
        array('ti-layout-grid2-alt' => esc_html__('Layout Grid2 Alt', 'droit-wbpakery-addons')),
        array('ti-layout-column4-alt' => esc_html__('Layout Column4 Alt', 'droit-wbpakery-addons')),
        array('ti-layout-column3-alt' => esc_html__('Layout Column3 Alt', 'droit-wbpakery-addons')),
        array('ti-layout-column2-alt' => esc_html__('Layout Column2 Alt', 'droit-wbpakery-addons')),
        array('ti-instagram' => esc_html__('Instagram', 'droit-wbpakery-addons')),
        array('ti-google' => esc_html__('Google', 'droit-wbpakery-addons')),
        array('ti-github' => esc_html__('Github', 'droit-wbpakery-addons')),
        array('ti-flickr' => esc_html__('Flickr', 'droit-wbpakery-addons')),
        array('ti-facebook' => esc_html__('Facebook', 'droit-wbpakery-addons')),
        array('ti-dropbox' => esc_html__('Dropbox', 'droit-wbpakery-addons')),
        array('ti-dribbble' => esc_html__('Dribbble', 'droit-wbpakery-addons')),
        array('ti-apple' => esc_html__('Apple', 'droit-wbpakery-addons')),
        array('ti-android' => esc_html__('Android', 'droit-wbpakery-addons')),
        array('ti-save' => esc_html__('Save', 'droit-wbpakery-addons')),
        array('ti-save-alt' => esc_html__('Save Alt', 'droit-wbpakery-addons')),
        array('ti-yahoo' => esc_html__('Yahoo', 'droit-wbpakery-addons')),
        array('ti-wordpress' => esc_html__('Wordpress', 'droit-wbpakery-addons')),
        array('ti-vimeo-alt' => esc_html__('Vimeo Alt', 'droit-wbpakery-addons')),
        array('ti-twitter-alt' => esc_html__('Twitter Alt', 'droit-wbpakery-addons')),
        array('ti-tumblr-alt' => esc_html__('Tumblr Alt', 'droit-wbpakery-addons')),
        array('ti-trello' => esc_html__('Trello', 'droit-wbpakery-addons')),
        array('ti-stack-overflow' => esc_html__('Stack Overflow', 'droit-wbpakery-addons')),
        array('ti-soundcloud' => esc_html__('Soundcloud', 'droit-wbpakery-addons')),
        array('ti-sharethis' => esc_html__('Sharethis', 'droit-wbpakery-addons')),
        array('ti-sharethis-alt' => esc_html__('Sharethis Alt', 'droit-wbpakery-addons')),
        array('ti-reddit' => esc_html__('Reddit', 'droit-wbpakery-addons')),
        array('ti-pinterest-alt' => esc_html__('Pinterest Alt', 'droit-wbpakery-addons')),
        array('ti-microsoft-alt' => esc_html__('Microsoft Alt', 'droit-wbpakery-addons')),
        array('ti-linux' => esc_html__('Linux', 'droit-wbpakery-addons')),
        array('ti-jsfiddle' => esc_html__('Jsfiddle', 'droit-wbpakery-addons')),
        array('ti-joomla' => esc_html__('Joomla', 'droit-wbpakery-addons')),
        array('ti-html5' => esc_html__('Html5', 'droit-wbpakery-addons')),
        array('ti-flickr-alt' => esc_html__('Flickr Alt', 'droit-wbpakery-addons')),
        array('ti-email' => esc_html__('Email', 'droit-wbpakery-addons')),
        array('ti-drupal' => esc_html__('Drupal', 'droit-wbpakery-addons')),
        array('ti-dropbox-alt' => esc_html__('Dropbox Alt', 'droit-wbpakery-addons')),
        array('ti-css3' => esc_html__('Css3', 'droit-wbpakery-addons')),
        array('ti-rss' => esc_html__('Rss', 'droit-wbpakery-addons')),
        array('ti-rss-alt' => esc_html__('Rss-alt', 'droit-wbpakery-addons')),
        array('icon-question-mark' => esc_html__('Question Mark', 'droit-wbpakery-addons')),
        array('icon-youtube' => esc_html__('Youtube', 'droit-wbpakery-addons')),
        array('icon-twitter' => esc_html__('Twitter', 'droit-wbpakery-addons')),
        array('icon-facebook-2' => esc_html__('Facebook 2', 'droit-wbpakery-addons')),
        array('icon-map-marker' => esc_html__('Map Marker', 'droit-wbpakery-addons')),
        array('icon-paper-plane' => esc_html__('Paper Plane', 'droit-wbpakery-addons')),
        array('icon-support-2' => esc_html__('Support', 'droit-wbpakery-addons')),
        array('icon-seo-friendly-2' => esc_html__('Seo friendly', 'droit-wbpakery-addons')),
        array('icon-update' => esc_html__('Update', 'droit-wbpakery-addons')),
        array('icon-facebook' => esc_html__('Facebook', 'droit-wbpakery-addons')),
        array('icon-dribbble' => esc_html__('Dribbble', 'droit-wbpakery-addons')),
        array('icon-behance' => esc_html__('Behance', 'droit-wbpakery-addons')),
        array('icon-instagram' => esc_html__('Instagram', 'droit-wbpakery-addons')),
        array('icon-sopprt' => esc_html__('Sopprt', 'droit-wbpakery-addons')),
        array('icon-Seo-Friendly' => esc_html__('Seo Friendly', 'droit-wbpakery-addons')),
        array('icon-Performance' => esc_html__('Performance', 'droit-wbpakery-addons')),
        array('icon-Automatic-Updates' => esc_html__('Automatic Updates', 'droit-wbpakery-addons')),
        array('icon-cross' => esc_html__('Cross', 'droit-wbpakery-addons')),
        array('icon-plus' => esc_html__('Plus', 'droit-wbpakery-addons')),
        array('icon-minus' => esc_html__('minus', 'droit-wbpakery-addons')),
        array('icon-arrow-down-3' => esc_html__('Arrow down 3', 'droit-wbpakery-addons')),
        array('icon-heart-2' => esc_html__('Heart', 'droit-wbpakery-addons')),
        array('icon-avatar' => esc_html__('Avatar', 'droit-wbpakery-addons')),
        array('icon-arrow-up-3' => esc_html__('Arrow Up', 'droit-wbpakery-addons')),
        array('icon-mail-2' => esc_html__('Mail', 'droit-wbpakery-addons')),
        array('icon-burger-menu-3' => esc_html__('Burger Menu', 'droit-wbpakery-addons')),
        array('icon-star-2' => esc_html__('Star', 'droit-wbpakery-addons')),
        array('icon-best' => esc_html__('Best', 'droit-wbpakery-addons')),
        array('icon-Secure' => esc_html__('Secure', 'droit-wbpakery-addons')),
        array('icon-Return' => esc_html__('Return', 'droit-wbpakery-addons')),
        array('icon-Shipping' => esc_html__('Shipping', 'droit-wbpakery-addons')),
        array('icon-play' => esc_html__('play', 'droit-wbpakery-addons')),
        array('icon-list-2' => esc_html__('list', 'droit-wbpakery-addons')),
        array('icon-arrow-double' => esc_html__('Arrow Double', 'droit-wbpakery-addons')),
        array('icon-Branch-Registration' => esc_html__('Branch Registration', 'droit-wbpakery-addons')),
        array('icon-Payroll--Accounting' => esc_html__('Payroll Accounting', 'droit-wbpakery-addons')),
        array('icon-Real-Estate' => esc_html__('Real Estate', 'droit-wbpakery-addons')),
        array('icon-Mortgage-Advisor' => esc_html__('Mortgage Advisor', 'droit-wbpakery-addons')),
        array('icon-Investing' => esc_html__('Investing', 'droit-wbpakery-addons')),
        array('icon-Financial-Planning' => esc_html__('Financial Planning', 'droit-wbpakery-addons')),
        array('icon-mail' => esc_html__('Mail', 'droit-wbpakery-addons')),
        array('icon-Pay-Securely' => esc_html__('Pay-Securely', 'droit-wbpakery-addons')),
        array('icon-Flex-Deposit' => esc_html__('Flex-Deposit', 'droit-wbpakery-addons')),
        array('icon-No-Change-Fees' => esc_html__('No-Change-Fees', 'droit-wbpakery-addons')),
        array('icon-Flexible-Payment' => esc_html__('Flexible Payment', 'droit-wbpakery-addons')),
        array('icon-search' => esc_html__('Search', 'droit-wbpakery-addons')),
        array('icon-tag' => esc_html__('Tag', 'droit-wbpakery-addons')),
        array('icon-guest' => esc_html__('Guest', 'droit-wbpakery-addons')),
        array('icon-Calendar' => esc_html__('Calendar', 'droit-wbpakery-addons')),
        array('icon-Property-Services' => esc_html__('Property Services', 'droit-wbpakery-addons')),
        array('icon-Engineering-Services' => esc_html__('Engineering Services', 'droit-wbpakery-addons')),
        array('icon-Housing-Partnerships' => esc_html__('Housing Partnerships', 'droit-wbpakery-addons')),
        array('icon-Construction-Projects' => esc_html__('Construction Projects', 'droit-wbpakery-addons')),
        array('icon-Quote-2' => esc_html__('Quote', 'droit-wbpakery-addons')),
        array('icon-Urban-Design' => esc_html__('Urban Design', 'droit-wbpakery-addons')),
        array('icon-Interior-Design' => esc_html__('Interior Design', 'droit-wbpakery-addons')),
        array('icon-Architecture' => esc_html__('Architecture', 'droit-wbpakery-addons')),
        array('icon-Share' => esc_html__('Share', 'droit-wbpakery-addons')),
        array('icon-Play-list' => esc_html__('Play list', 'droit-wbpakery-addons')),
        array('icon-Sync' => esc_html__('Sync', 'droit-wbpakery-addons')),
        array('icon-list' => esc_html__('list', 'droit-wbpakery-addons')),
        array('icon-Organize-Easily' => esc_html__('Organize Easily', 'droit-wbpakery-addons')),
        array('icon-Powerful-Equalizer' => esc_html__('Powerful Equalizer', 'droit-wbpakery-addons')),
        array('icon-Millions-of-Songs' => esc_html__('Millions of Songs', 'droit-wbpakery-addons')),
        array('icon-download' => esc_html__('download', 'droit-wbpakery-addons')),
        array('icon-Star' => esc_html__('Star', 'droit-wbpakery-addons')),
        array('icon-Dedicated-Support' => esc_html__('Dedicated Support', 'droit-wbpakery-addons')),
        array('icon-Seamless-Experience' => esc_html__('Seamless Experience', 'droit-wbpakery-addons')),
        array('icon-Cost-Optimization' => esc_html__('Cost Optimization', 'droit-wbpakery-addons')),
        array('icon-Business-Focused' => esc_html__('Business Focused', 'droit-wbpakery-addons')),
        array('icon-phone' => esc_html__('phone', 'droit-wbpakery-addons')),
        array('icon-arrow-right-3' => esc_html__('Arrow Right', 'droit-wbpakery-addons')),
        array('icon-quote' => esc_html__('Quote', 'droit-wbpakery-addons')),
        array('icon-Easy-Customize' => esc_html__('Easy Customize', 'droit-wbpakery-addons')),
        array('icon-Marketing-Automation' => esc_html__('Marketing Automation', 'droit-wbpakery-addons')),
        array('icon-Dedicated-Server' => esc_html__('Dedicated Server', 'droit-wbpakery-addons')),
        array('icon-burger-menu-2' => esc_html__('Burger Menu 02', 'droit-wbpakery-addons')),
        array('icon-arrow-down' => esc_html__('Arrow Down', 'droit-wbpakery-addons')),
        array('icon-arrow-up' => esc_html__('Arrow Up', 'droit-wbpakery-addons')),
        array('icon-burger-menu-1' => esc_html__('Burger Menu 01', 'droit-wbpakery-addons')),
        array('icon-arrow-up-2' => esc_html__('Arrow-Up 2', 'droit-wbpakery-addons')),
        array('icon-heart' => esc_html__('Heart', 'droit-wbpakery-addons')),
        array('icon-arrow-left' => esc_html__('Arrow Left', 'droit-wbpakery-addons')),
        array('icon-arrow-right' => esc_html__('Arrow Right', 'droit-wbpakery-addons')),
        array('icon-arrow-right-2' => esc_html__('Arrow Right', 'droit-wbpakery-addons')),
        array('icon-arrow-down-2' => esc_html__('Arrow Down 2', 'droit-wbpakery-addons')),
	);
}
add_filter( 'vc_iconpicker-type-droit_icon', 'droit_icon_array' );


/**
 * Register Backend and Frontend CSS Styles
 */
add_action( 'vc_base_register_front_css', 'droit_vc_iconpicker_base_register_css' );
add_action( 'vc_base_register_admin_css', 'droit_vc_iconpicker_base_register_css' );
function droit_vc_iconpicker_base_register_css(){
    wp_register_style('droit_icon', DROIT_WPBAKERY_CSS_URL . '/icon/style.css');
}

/**
 * Enqueue Backend and Frontend CSS Styles
 */
add_action( 'vc_backend_editor_enqueue_js_css', 'droit_vc_iconpicker_editor_jscss' );
add_action( 'vc_frontend_editor_enqueue_js_css', 'droit_vc_iconpicker_editor_jscss' );
function droit_vc_iconpicker_editor_jscss(){
    wp_enqueue_style( 'droit_icon' );
}

/**
 * Enqueue CSS in Frontend when it's used
 */
add_action('vc_enqueue_font_icon_element', 'droit_enqueue_font_droit_icon');
function droit_enqueue_font_droit_icon($font){
    switch ( $font ) {
        case 'droit_icon': wp_enqueue_style( 'droit_icon' );
    }
}