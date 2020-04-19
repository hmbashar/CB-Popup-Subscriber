<?php 


// Don't call the file directly
if ( !defined( 'ABSPATH' ) ) exit;


// Text Field for first text
function cb_popup_sub_first_text() {
	$first_id = 'cb_popup_sub_first_text';
	$first_text = get_option($first_id);

	printf('<input type="text" id="%s" class="regular-text" name="%s" value="%s" placeholder="Write First Text">', $first_id, $first_id, $first_text);

}


// text field for second text
function cb_popup_sub_second_text() {
	$second_id = 'cb_popup_sub_second_text';
	$second_text = get_option($second_id);

	printf('<input type="text" id="%s" class="regular-text" name="%s" value="%s" placeholder="Write Second Text">', $second_id, $second_id, $second_text);
}