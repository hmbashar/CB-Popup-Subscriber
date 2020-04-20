<?php
/**
 * @package CB_POPUP_Subscriber
 * @version 1.0
 */
/*
Plugin Name: CB Popup Subscriber
Plugin URI: http://wordpress.org/plugins/cb-popup-subscriber
Description: popup Email Subscription plugin
Author: Md Abul Bashar
Version: 1.0
Author URI: https://facebook.com/hmbashar
*/


// Don't call the file directly
if ( !defined( 'ABSPATH' ) ) exit;

//define url
define('CB_POPUP_SUB_URL', plugin_dir_url( __FILE__ ));
define('CB_POPUP_SUB_PATH', plugin_dir_path(__FILE__));


//Basic Setting
function cb_pop_sub_basic_settings() {

	load_plugin_textdomain( 'cbpopup', false, CB_NEWS_TICKER_PATH .'lang' );

}
add_action('after_setup_theme', 'cb_pop_sub_basic_settings');

function cb_pop_sub_enqueue() {

	wp_enqueue_style( 'cb-popup-sub', CB_POPUP_SUB_URL.'assets/css/style.css');
	wp_enqueue_style( 'cb-popup-sub-responsive', CB_POPUP_SUB_URL.'assets/css/responsive.css');

	wp_enqueue_script( 'cookie', CB_POPUP_SUB_URL. 'assets/cookie/js.cookie.min.js', array('jquery'), 3.0, true );

	wp_enqueue_script( 'cb-popup-sub-cookie', CB_POPUP_SUB_URL.'assets/cookie/cookie-custom.js', array('jquery'), 3.0, true );
	

	// jQuery Localize script
	$popup_show = esc_attr(get_option('cb_popup_sub_popup_show'));
	$popup_show = $popup_show ? $popup_show : 10000;

	$popup_cookie = esc_attr(get_option('cb_popup_sub_cookie_expired'));
	$popup_cookie_expired = $popup_cookie ? $popup_cookie : 7 ;
	wp_localize_script( 'cb-popup-sub-cookie', 'cb_popup_dynamic_script', array(
		'popup_show'			=> $popup_show,
		'cookie_expired'	=> $popup_cookie_expired,
	));

}
add_action('wp_enqueue_scripts', 'cb_pop_sub_enqueue');


// CB Popup Sub admin script
function cb_popup_sub_admin_script() {

	wp_enqueue_style( 'cb-pop-admin-style', CB_POPUP_SUB_URL.'assets/css/admin-style.css');
	wp_enqueue_script( 'cb-popup-sub-script', CB_POPUP_SUB_URL.'assets/js/admin-custom.js', array('jquery'), 1.0, true );

}
add_action( 'admin_enqueue_scripts', 'cb_popup_sub_admin_script' );



//add field and section
function cb_popup_subscriber_field_add() {
	//Add Setting Section
	add_settings_section( 'cb_popup_sub_section', __('CB Popup Subscriber', 'cbpopup'), 'cb_popup_sub_section', 'cb_popup_sub.php' );

	// Add Field for logo uploader
	add_settings_field( 'cb_popup_sub_logo', __('Logo', 'cbpopup'), 'cb_popup_sub_logo_fun', 'cb_popup_sub.php', 'cb_popup_sub_section' );

	// Add Fields
	add_settings_field( 'cb_popup_sub_first_text', __('First Text', 'cbpopup'), 'cb_popup_sub_first_text', 'cb_popup_sub.php', 'cb_popup_sub_section' );

	// Add Field for second text
	add_settings_field( 'cb_popup_sub_second_text', __('Second Text', 'cbpopup'), 'cb_popup_sub_second_text', 'cb_popup_sub.php', 'cb_popup_sub_section' );

	// Add Field for footer text
	add_settings_field( 'cb_popup_sub_footer_text', __('Footer Text', 'cbpopup'), 'cb_popup_sub_footer_text', 'cb_popup_sub.php', 'cb_popup_sub_section' );

	// Add Field for footer link text
	add_settings_field( 'cb_popup_sub_footer_link_text', __('Link Label', 'cbpopup'), 'cb_popup_sub_footer_link_text', 'cb_popup_sub.php', 'cb_popup_sub_section' );

	// Add Field for footer link url
	add_settings_field( 'cb_popup_sub_footer_link_url', __('Link URL', 'cbpopup'), 'cb_popup_sub_footer_link_url', 'cb_popup_sub.php', 'cb_popup_sub_section' );

	// Add Field for popup width
	add_settings_field( 'cb_popup_sub_popup_width', __('Popup Width', 'cbpopup'), 'cb_popup_sub_popup_width', 'cb_popup_sub.php', 'cb_popup_sub_section' );

	// Add Field for popup width
	add_settings_field( 'cb_popup_sub_submit_button', __('Submit Label', 'cbpopup'), 'cb_popup_sub_submit_button', 'cb_popup_sub.php', 'cb_popup_sub_section' );

	// Add Field for popup width
	add_settings_field( 'cb_popup_sub_no_thanks', __('No Thanks Label', 'cbpopup'), 'cb_popup_sub_no_thanks', 'cb_popup_sub.php', 'cb_popup_sub_section' );

	// Add Field for popup width
	add_settings_field( 'cb_popup_sub_popup_show', __('Show Popup', 'cbpopup'), 'cb_popup_sub_popup_show', 'cb_popup_sub.php', 'cb_popup_sub_section' );

	// Add Field for popup width
	add_settings_field( 'cb_popup_sub_cookie_expired', __('Cookie Expired', 'cbpopup'), 'cb_popup_sub_cookie_expired', 'cb_popup_sub.php', 'cb_popup_sub_section' );


}

add_action('admin_init', 'cb_popup_subscriber_field_add');


//Register fields
function cb_popup_subscriber_field_registred() {

	// Register field for image upload
	register_setting( 'cb_popup_sub_section', 'cb_popup_sub_logo', array('sanitize_callback' => 'esc_attr'));

	//Register field setting for first text
	register_setting( 'cb_popup_sub_section', 'cb_popup_sub_first_text', array('sanitize_callback' => 'esc_html') );

	//Register field setting for second text
	register_setting( 'cb_popup_sub_section', 'cb_popup_sub_second_text', array('sanitize_callback' => 'esc_html') );

	//Register field setting for footer text
	register_setting( 'cb_popup_sub_section', 'cb_popup_sub_footer_text', array('sanitize_callback' => 'esc_html') );


	//Register field setting for link text
	register_setting( 'cb_popup_sub_section', 'cb_popup_sub_footer_link_text', array('sanitize_callback' => 'esc_html') );


	//Register field setting for link url
	register_setting( 'cb_popup_sub_section', 'cb_popup_sub_footer_link_url', array('sanitize_callback' => 'esc_url') );


	//Register field setting popup width
	register_setting( 'cb_popup_sub_section', 'cb_popup_sub_popup_width', array('sanitize_callback' => 'esc_attr') );


	//Register field setting popup width
	register_setting( 'cb_popup_sub_section', 'cb_popup_sub_submit_button', array('sanitize_callback' => 'esc_attr') );


	//Register field setting popup width
	register_setting( 'cb_popup_sub_section', 'cb_popup_sub_no_thanks', array('sanitize_callback' => 'esc_html') );

	//Register field setting popup show
	register_setting( 'cb_popup_sub_section', 'cb_popup_sub_popup_show', array('sanitize_callback' => 'esc_html') );


	//Register field setting cookie expired
	register_setting( 'cb_popup_sub_section', 'cb_popup_sub_cookie_expired', array('sanitize_callback' => 'esc_html') );



}

add_action('admin_init', 'cb_popup_subscriber_field_registred');

function cb_popup_sub_section() {
	printf('%s You can manage your popup subscriber settings %s', '<p class="description">', '</p>' );
}


// Create Admin Menu
function cb_popup_sub_admin_menu() {
	// Add Sub menu
	add_submenu_page( 'options-general.php', __('CB Popup Sub Page Title', 'cbpopup'), __('CB Popup', 'cbpopup'), 'manage_options', 'cb_popup_sub.php', 'cb_popup_sub_admin_fun' );

}

add_action( 'admin_menu','cb_popup_sub_admin_menu');


// Admin Menu register
function cb_popup_sub_admin_fun() {
	?>
	
	<form action="options.php" method="POST">
		<?php 
			do_settings_sections( 'cb_popup_sub.php' );
			settings_fields( 'cb_popup_sub_section' );
			submit_button(); 
		?>
	</form>

<?php 
}


// Get Register Fields Functions
require_once(CB_POPUP_SUB_PATH . 'inc/fields.php');
//Get HTML Output
require_once(CB_POPUP_SUB_PATH . 'inc/html.php');
//Get Dynamic CSS
require_once(CB_POPUP_SUB_PATH . 'inc/css.php');