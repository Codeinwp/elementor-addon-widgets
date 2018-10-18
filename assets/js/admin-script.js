jQuery(document).ready(function(){
	jQuery('.dashicons-dismiss').click(function(){
		jQuery.ajax({
			url: sizzifyajax.ajax_url,
			data: {
				action: 'eaw_update_dismissed'
			},
			success: function(data) {
				jQuery('.theme-promote').fadeOut();
			},
			error: function(errorThrown){
				console.log(errorThrown);
			}
		})
	})
})
