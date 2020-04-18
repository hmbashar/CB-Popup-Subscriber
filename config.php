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

	load_plugin_textdomain( 'CBNT', false, CB_NEWS_TICKER_PATH .'lang' );

}
add_action('after_setup_theme', 'cb_pop_sub_basic_settings');

function cb_pop_sub_enqueue() {

	wp_enqueue_style( 'cb-news-ticker', CB_POPUP_SUB_URL.'assets/css/style.css');
	wp_enqueue_style( 'cb-news-ticker-responsive', CB_POPUP_SUB_URL.'assets/css/responsive.css');

	wp_enqueue_script( 'cookie', CB_POPUP_SUB_URL. 'jassets/s/cookie/js.cookie.min.js', array('jquery'), 3.0, true );

	wp_enqueue_script( 'cb-news-ticker-cookie', CB_POPUP_SUB_URL.'assets/js/cookie/cookie-custom.js', array('jquery'), 3.0, true );
	
}
add_action('wp_enqueue_scripts', 'cb_pop_sub_enqueue');



function cb_popup_subscriber_html() {
	?>

    <!-- CB popup style start -->
    
    <div class="jcb-popup-start">
        <div class="jcb-popup-container">
            <div class="jcb-popup-close">
                <a href=""><i class="fa fa-times"></i></a>
            </div>
            <div class="jcb-popup-left">
                <div class="jcb-popup-left-text">
                    <h2>WHAT MATTERS</h2>
                </div>
                <div class="jcb-popup-left-logo">
                    <img src="<?php echo CB_POPUP_SUB_URL; ?>assets/img/popup-logo.jpg" alt="">
                </div>
            </div>
            <div class="jcb-popup-right">
                <div class="jcb-popup-right-content">
                    <p>Sing up for CNN <strong> What Matters</strong> Newsletter</p>
                    <p>Every day we summarize What matters and deliver it straight to your inbox</p>
                </div>
                <div class="jcb-popup-subscribe-form">
                    <form action="">
                        <input type="email" placeholder="Email address">
                        <input type="submit" value="Sign Me Up">
                    </form>
                   <h4><a href=""> No Thanks </a></h4>
                    <p>By subscribing you agree to our <a href="">privacy policy.</a></p>
                </div>
            </div>

        </div>
    </div>


	<?php 
}

add_action('wp_head', 'cb_popup_subscriber_html');