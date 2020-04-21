<?php 


// Don't call the file directly
if ( !defined( 'ABSPATH' ) ) exit;

function cb_popup_sub_logo_fun() {	
		$logo_url = esc_attr(get_option('cb_popup_sub_logo'));
	?>		
	<div id="cb_popup_sub_logo_upload">Upload Logo</div>
	<input type="hidden" name="cb_popup_sub_logo" id="cb_popup_sub_logo" value="<?php echo $logo_url; ?>">
	
	<div id="cb_pop_sub_logo_preview"></div>

	<?php
}

// Text Field for first text
function cb_popup_sub_first_text() {
	$first_id = 'cb_popup_sub_first_text';
	$first_text = esc_attr(get_option($first_id));

	printf('<input type="text" id="%s" class="regular-text" name="%s" value="%s" placeholder="Write First Text">', $first_id, $first_id, $first_text);

}


// text field for second text
function cb_popup_sub_second_text() {
	$second_id = 'cb_popup_sub_second_text';
	$second_text = esc_attr(get_option($second_id));

	printf('<input type="text" id="%s" class="regular-text" name="%s" value="%s" placeholder="Write Second Text">', $second_id, $second_id, $second_text);
}


// text field for footer text
function cb_popup_sub_footer_text() {
	$footer_id = 'cb_popup_sub_footer_text';
	$footer_text = esc_attr(get_option($footer_id));

	printf('<input type="text" id="%s" class="regular-text" name="%s" value="%s" placeholder="Write Footer Text">', $footer_id, $footer_id, $footer_text);
}


// text field for link text
function cb_popup_sub_footer_link_text() {
	$link_label_id = 'cb_popup_sub_footer_link_text';
	$link_label = esc_attr(get_option($link_label_id));

	printf('<input type="text" id="%s" class="regular-text" name="%s" value="%s" placeholder="Write Link Label">', $link_label_id, $link_label_id, $link_label);
}



// text field for link url
function cb_popup_sub_footer_link_url() {
	$link_url_id = 'cb_popup_sub_footer_link_url';
	$link_url = esc_attr(get_option($link_url_id));

	printf('<input type="text" id="%s" class="regular-text" name="%s" value="%s" placeholder="Input URL">', $link_url_id, $link_url_id, $link_url);
}



// text field for popup width
function cb_popup_sub_popup_width() {
	$id = 'cb_popup_sub_popup_width';
	$value = esc_attr(get_option($id));

	$value = $value ? $value : '75%';

	printf('<input type="text" id="%s" class="regular-text" name="%s" value="%s" placeholder="Input width">', $id, $id, $value);

	printf('%s You can change your popup width, current value %s %s', '<p class="description">', $value,'</p>' );
}


// text field for submit button
function cb_popup_sub_submit_button() {
	$id = 'cb_popup_sub_submit_button';
	$value = esc_attr(get_option($id));	
	
	$value = $value ? $value : 'Subscribe';
	printf('<input type="text" id="%s" class="regular-text" name="%s" value="%s" placeholder="button label">', $id, $id, $value);
	
}



// text field for no thanks
function cb_popup_sub_no_thanks() {
	$id = 'cb_popup_sub_no_thanks';
	$value = esc_attr(get_option($id));	
	
	$value = $value ? $value : 'No Thanks';
	printf('<input type="text" id="%s" class="regular-text" name="%s" value="%s" placeholder="button label">', $id, $id, $value);
	
}


// text field for show popup
function cb_popup_sub_popup_show() {
	$id = 'cb_popup_sub_popup_show';
	$value = esc_attr(get_option($id));	
	
	$value = $value ? $value : 10000;
	printf('<input type="text" id="%s" class="regular-text" name="%s" value="%s" placeholder="Millisecond">', $id, $id, $value);
	
	// convert millisecond to minutes
	$value = $value / 1000;
	

	printf('%s Input millisecond, How long after the website loads a pop up show? currently show after %s %s %s', '<p class="description">', $value, __('Seconds', 'cbpopup'),'</p>' );
}



// text field for show popup
function cb_popup_sub_cookie_expired() {
	$id = 'cb_popup_sub_cookie_expired';
	$value = esc_html(get_option($id));	
	
	$value = $value ? $value : 7;
	printf('<input type="text" id="%s" class="regular-text" name="%s" value="%s" placeholder="button label">', $id, $id, $value);
	
	printf('%s Input number for how many days save cookie after click close the popup, currently save for %s days  %s', '<p class="description">', $value,'</p>' );
}

