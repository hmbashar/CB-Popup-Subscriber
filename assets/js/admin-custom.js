var frame;
;(function($) {

	var logo_url = $('#cb_popup_sub_logo').val();
	// check val if already save logo then show to previwer
	if(logo_url) {
		$('#cb_pop_sub_logo_preview').html(`<img src='${logo_url}' />`);
	}
		

	$('#cb_popup_sub_logo_upload').on('click', function() {

		// condition for open uploader 
		if(frame) {
			frame.open();
			return false
		}

		// configuration upload
		frame = wp.media({
			title: 'Upload Logo',
			button:{
				text:'Inset Logo'
			},
			multiple: false,
		});

		// set previwer
		frame.on('select', function() {
			var attachment=frame.state().get('selection').first().toJSON();
			
			//$('#cb_popup_logo_id').val(attachment.id);
			$('#cb_popup_sub_logo').val(attachment.sizes.full.url);			
			$('#cb_pop_sub_logo_preview').html(`<img src='${attachment.sizes.full.url}' />`);
		});

		// open uploader
		frame.open();


		return false;
	});

})(jQuery);
