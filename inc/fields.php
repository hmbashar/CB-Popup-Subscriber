<?php 


// Don't call the file directly
if ( !defined( 'ABSPATH' ) ) exit;

function cb_popup_sub_logo_fun() {	
		$logo_url = esc_attr(get_option('cb_popup_sub_logo'));
	?>		
	<button id="cb_popup_sub_logo_upload">Upload Logo</button>
	<input type="hidden" name="cb_popup_sub_logo" id="cb_popup_sub_logo" value="<?php echo $logo_url; ?>">		
	<div style="width:100%;height:auto;" id="cb_pop_sub_logo_preview"></div>

	<?php
}

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


// text field for footer text
function cb_popup_sub_footer_text() {
	$footer_id = 'cb_popup_sub_footer_text';
	$footer_text = get_option($footer_id);

	printf('<input type="text" id="%s" class="regular-text" name="%s" value="%s" placeholder="Write Footer Text">', $footer_id, $footer_id, $footer_text);
}


// text field for link text
function cb_popup_sub_footer_link_text() {
	$link_label_id = 'cb_popup_sub_footer_link_text';
	$link_label = get_option($link_label_id);

	printf('<input type="text" id="%s" class="regular-text" name="%s" value="%s" placeholder="Write Link Label">', $link_label_id, $link_label_id, $link_label);
}



// text field for link url
function cb_popup_sub_footer_link_url() {
	$link_url_id = 'cb_popup_sub_footer_link_url';
	$link_url = get_option($link_url_id);

	printf('<input type="text" id="%s" class="regular-text" name="%s" value="%s" placeholder="Input URL">', $link_url_id, $link_url_id, $link_url);
}

