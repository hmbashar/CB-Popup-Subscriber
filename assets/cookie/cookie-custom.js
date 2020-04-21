(function($) {


	var CbPopupSubClose = Cookies.get('cb_popup_sub_close') // => 'value'	
	//convert string to integer
	var CbCookieExpired = parseInt(cb_popup_dynamic_script.cookie_expired);

	if(CbPopupSubClose == 'cb-popup-closed') {
		$('.jcb-popup-start').hide();
	}else {

		window.onload = function() {
		    setTimeout(function() {
		        document.getElementById('jcb-popup-start').style.display = 'block';
		    }, cb_popup_dynamic_script.popup_show);
		}

		$('.jcb-popup-close, .cb-popup-close').on('click',function() {
			Cookies.set('cb_popup_sub_close', 'cb-popup-closed', { expires:CbCookieExpired});
			$('.jcb-popup-start').hide();
		});

	}




})(jQuery);
