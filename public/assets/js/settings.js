$('.change_password').submit(function() {
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	$.ajax({
		url: '/settings/change/password',
		type: 'POST',
		data: $(this).serialize(),
		success: function(data) {
			

			if (data.error) {
				alertify.error(data.error);
			}

			if (data.success) {
				alertify.success(data.success);
			}
		},
		error: function(data) {

			if (data.responseJSON.errors.password_current) {
				alertify.error(data.responseJSON.errors.password_current);
			}

			if (data.responseJSON.errors.password) {
				alertify.error(data.responseJSON.errors.password);
			}

			if (data.error) {
				alertify.error(data.error);
			}
			
			//console.log(data);
		}
	});
	return false;
});