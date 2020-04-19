(function($) {


	// var GetSugaBreakingClose = Cookies.get('suga_breaking_ticker_close') // => 'value'

	// if(GetSugaBreakingClose == 'ticker-closed') {
	// 	$('.suga-breaking-news-ticker-area').hide();		
	// }else {
	// 	$('.suga-breaking-news-close').on('click', function() {
	// 		Cookies.set('suga_breaking_ticker_close', 'ticker-closed', { expires: 2 });
	// 		$('.suga-breaking-news-ticker-area').fadeOut(500);			
			
	// 	});
	// }
	// $('.suga-breaking-news-ticker-area').next('.wpb_text_column.wpb_content_element ').addClass('breaking-news-content-junk-mb');

	$('.jcb-popup-close, .cb-popup-close').on('click',function() {
		$('.jcb-popup-start').hide();
	});

	window.onload = function() {
	    setTimeout(function() {
	        document.getElementById('jcb-popup-start').style.display = 'block';
	    }, 1000);
	}


})(jQuery);
