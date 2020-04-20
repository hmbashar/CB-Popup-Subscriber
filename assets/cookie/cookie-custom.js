(function($) {


	var CbPopupSubClose = Cookies.get('cb_popup_sub_close') // => 'value'	
	if(CbPopupSubClose == 'cb-popup-closed') {
		$('.jcb-popup-start').hide();
	}else {

		window.onload = function() {
		    setTimeout(function() {
		        document.getElementById('jcb-popup-start').style.display = 'block';
		    }, cb_popup_dynamic_script.popup_show);
		}

		$('.jcb-popup-close, .cb-popup-close').on('click',function() {
			Cookies.set('cb_popup_sub_close', 'cb-popup-closed', { expires: cb_popup_dynamic_script.cookie_expired });
			$('.jcb-popup-start').hide();
		});

	}




})(jQuery);
