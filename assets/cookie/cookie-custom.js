(function($) {


	var CbPopupSubClose = Cookies.get('cb_popup_sub_close') // => 'value'	
	if(CbPopupSubClose == 'cb-popup-closed') {
		$('.jcb-popup-start').hide();
	}else {

		window.onload = function() {
		    setTimeout(function() {
		        document.getElementById('jcb-popup-start').style.display = 'block';
		    }, 100);
		}

		$('.jcb-popup-close, .cb-popup-close').on('click',function() {
			Cookies.set('cb_popup_sub_close', 'cb-popup-closed', { expires: 7 });
			$('.jcb-popup-start').hide();
		});

	}




})(jQuery);
