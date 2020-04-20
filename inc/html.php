<?php 


// Don't call the file directly
if ( !defined( 'ABSPATH' ) ) exit;



function cb_popup_subscriber_html() {
	$first_text = get_option('cb_popup_sub_first_text'); // get first text
	$second_text = get_option('cb_popup_sub_second_text'); // get second text
	$logo_url = esc_attr(get_option('cb_popup_sub_logo')); // get logo url
	$footer_text = get_option('cb_popup_sub_footer_text'); // get footer text
	$link_label = get_option('cb_popup_sub_footer_link_text'); // get footer link label	
	$link_url = get_option('cb_popup_sub_footer_link_url'); // get footer link url
	$submit_text = get_option('cb_popup_sub_submit_button'); // get submit button label
	$no_thanks = get_option('cb_popup_sub_no_thanks'); // get submit no thanks label



	// set default value
	$submit_text = $submit_text ? $submit_text : 'Subscribe';
	$no_thanks = $no_thanks ? $no_thanks : 'No Thanks';
	?>

    <!-- CB popup style start -->
    
    <div class="jcb-popup-start" id="jcb-popup-start">
        <div class="jcb-popup-container">
            <div class="jcb-popup-close">
                <a><i class="fa fa-times"></i></a>
            </div>
            <div class="jcb-popup-left">
                <div class="jcb-popup-left-text">
                    <h2>WHAT MATTERS</h2>
                </div>
                <div class="jcb-popup-left-logo">
                	<?php if(empty($logo_url)) : ?>
                    	<img src="<?php echo CB_POPUP_SUB_URL; ?>assets/img/popup-logo.jpg" alt="">
                    <?php else : ?>
                    	<img src="<?php echo esc_attr($logo_url); ?>" alt="">
                    <?php endif; ?>
                </div>
            </div>
            <div class="jcb-popup-right">
                <div class="jcb-popup-right-content">
                	<p><?php echo esc_html($first_text); ?></p>                   
                    <p><?php echo esc_html($second_text); ?></p>
                </div>
                <div class="jcb-popup-subscribe-form">
					<!-- Begin Mailchimp Signup Form -->
					<div id="mc_embed_signup">
						<form action="https://oaklandtelegraph.us4.list-manage.com/subscribe/post?u=7ca07699c33869c9924fb8968&amp;id=7b75cc4b32" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
							<div id="mc_embed_signup_scroll">								
								<div class="mc-field-group">
									<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Enter Your Email Address">
								</div>
								<div id="mce-responses" class="clear">
									<div class="response" id="mce-error-response" style="display:none"></div>
									<div class="response" id="mce-success-response" style="display:none"></div>
								</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
								<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_7ca07699c33869c9924fb8968_7b75cc4b32" tabindex="-1" value="">
								</div>

								<div class="clear">
									<input type="submit" value="<?php echo esc_attr($submit_text); ?>" name="subscribe" id="mc-embedded-subscribe" class="button">
								</div>
							</div>
						</form>
					</div>
					<!--End mc_embed_signup-->
                   <h4 class="cb-popup-close"><a><?php echo esc_html($no_thanks); ?></a></h4>
                    <p><?php echo esc_html($footer_text); ?> 
                    	<?php if(!empty($link_label)) : ?>
                    		<a href="<?php esc_url($link_url); ?>"><?php echo esc_html($link_label); ?></a>
                    	<?php endif; ?>
                    </p>
                </div>
            </div>

        </div>
    </div>


	<?php 
}

add_action('wp_head', 'cb_popup_subscriber_html');
