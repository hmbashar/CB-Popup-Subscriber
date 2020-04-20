<?php 

// Don't call the file directly
if ( !defined( 'ABSPATH' ) ) exit;



function cb_popup_dynamic_css() {
	$width = get_option('cb_popup_sub_popup_width');
	$dynamic_css = "
			.jcb-popup-container {
				width: $width;
			}
		";
	wp_add_inline_style( 'cb-popup-sub', $dynamic_css );
	
}
add_action('wp_enqueue_scripts', 'cb_popup_dynamic_css');
