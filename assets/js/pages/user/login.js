(function($) {
	$('#login-form').on('submit', function(e) {
		e.preventDefault();
		var username = $('input[name="username"]').val(),
			password = $('input[name="password"]').val(),
			modal = $('#login-container');
       //alert(username + ' and  '+password);
			$.getJSON(baseurl + 'user/api/users/get_Login/' + username + '/' + password, function(result) {
				if(result.error === 0) {
					show_message(modal.find('.messages'), result.message, '', 'danger');
					window.location.href = baseurl + 'home/dashboard';
				} else {
					show_message(modal.find('.messages'), result.message, '', 'danger');
				}
			});

	});

		// ADDING NEW USER
$('#signup-btn').on('click', function(e) {
		e.preventDefault();
		var modal = $('#add_new_user_modal');
		modal.modal('show');
	});

$('#add_users_form').on('submit',function(e){
		e.preventDefault();
		var inputs = $(this).serialize(),
			modal = $('#add_new_user_modal');
			$.post(baseurl + 'user/api/users/save_new_users	', inputs, function(result){
				if (result.error === 0) {
					//show_message(modal.find('.messages'), result.message, '', 'danger');
					$('button.close-modal').trigger('click');
					//location.reload();
				} else {
					show_message(modal.find('.messages'), result.message, 'Oops!', 'danger');
				}
			},'json');
	});

// EDIT USER
$('#users_table_list').on('click', 'a.edit_user_btn', function(e)
{
			e.preventDefault();
			var data = $(this).data();
			var modal = $('#edit_user_modal');
			modal.modal('show');
			$.ajax(
			{
				url: baseurl + 'user/api/users/get_users_control/' + data.userid,
				type: 'get',
				dataType: 'json',
					beforeSend: function()
					{
						modal.find('.loaders').hide().fadeIn();
					},
					success: function(result)
					{
						if(result.error === 0)
						{
							modal.find('#edit_user_form').fadeIn(function()
							{
								modal.find('div.loader').fadeOut();
								var users = result.data;
								modal.find('input[name="user_id"]').val(data.userid);
								modal.find('input[name="firstname"]').val(users.firstname);
								modal.find('input[name="lastname"]').val(users.lastname);
								modal.find('input[name="username"]').val(users.username);
								modal.find('input[name="password"]').val(users.password);
										//alert( data.surchargeid);
							});

						}
						else
						{
								show_message($('.owner-message'), result.message, 'Oops!', 'danger');
								//alert('wala');
						}
					}
			});
});
$('#edit_user_form').on('submit', function(e) {
		e.preventDefault();
		var inputs = $(this).serialize();
		$.post(baseurl + 'user/api/users/c_updateusers', inputs, function(result) {
			if(result.error === 0) {
				show_message($('.owner-message'), result.message, 'Success!', 'success');
				$('button.close-modal').trigger('click');
					location.reload();
			} else {
				show_message($('.owner-message'), result.message, 'Oops!', 'danger');
			}
			$('#edit-business-details').find('button.close-modal').trigger('click');
		}, 'json');
	});


//DELETE USER
$('#users_table_list').on('click','a.delete_user_btn', function (e) {
		e.preventDefault();

			var data = $(this).data(),
			requirements = $('#users_table_list tbody');

		$('#popup-notification').find('.modal-title').text('Delete User');
		$('#popup-notification').find('img.notif').attr('src', baseurl + 'assets/img/icon-warning.gif');
		$('#popup-notification').find('h4.message-header').text('You are about to delete a record from the database.');
		$('#popup-notification').find('p.message-body').text('Are you sure you want to remove this user data?');
		$('#popup-notification').find('input[name="field"]').val(data.userid);
		$('#popup-notification').find('img.loader').fadeOut();
		$('#popup-notification').find('.actions a').text('Delete');
		$('#popup-notification').modal('show');
	});

	$('#popup-notification').on('click', '.actions a', function() {

		var data = $(this).data();
		var userid = $('#popup-notification').find('input[name="field"]').val();

	//alert('delete daw ?');
	//alert(req_id);
		$.ajax(
		{
			url: baseurl + 'user/api/users/delete_users/' + userid,
			type: 'get',
			dataType: 'json',
			beforeSend: function()
			{

				$('#popup-notification').find('img.loader').hide().fadeIn();
			},
			success: function(result)
			{
				if(result.error === 0)
				{
							$('button.close-modal').trigger('click');
							location.reload();
							//show_message($('.reference-message'), result.message, 'Success!', 'success');
				} else
				{
					show_message($('.reference-message'), result.message, 'Oops!', 'danger');
				}
			}
		});
	});


//LOGOUT USER
$('#users_table_list').on('click', 'a.logout_user_btn', function(e)
{
			e.preventDefault();
			var data = $(this).data();
			var modal = $('#logout_user_modal');
			modal.modal('show');
			$.ajax(
			{
				url: baseurl + 'user/api/users/logoff/' + data.userid,
				type: 'get',
				dataType: 'json',
					beforeSend: function()
					{
						modal.find('.loaders').hide().fadeIn();
					},
					success: function(result)
					{
						if(result.error === 0)
						{
										location.reload();
						}
						else
						{
								show_message($('.owner-message'), result.message, 'Oops!', 'danger');
								//alert('wala');
						}
					}
			});
});

$('.admin').on('submit', function(e){

	e.preventDefault();
		var inputs = $(this).serialize();

		$.post(baseurl + 'user/api/users/update_admin', inputs, function(result) {
			if(result.error === 0) {
				location.reload();
				/*popup(
					'Transaction',
					result.message,
					'',
					{},
					'OK',
					'info',
					'cheers'
				);*/

			} else {
				alert('naai error dae!');
			}

		}, 'json');
});

$('.yes').on('click', function(e){
//alert( baseurl + 'user/api/users/update_permit_number');
	$.ajax({
		url: baseurl + 'user/api/users/update_business_permit',
		type: 'get',
		dataType: 'json',
		/* beforeSend: function() {
			modal.find();
		}, */
		success: function(result) {
			if(result.error === 0) {
				// alert(result.error);
				show_message($('.foot'), result.message, 'Yehey!', 'success');
			}else{

			}
		}
	})
});

$('.backup').on('click',function(e){
	$.ajax({
		url: baseurl + 'user/api/users/backup_database',
		type: 'get',
		dataType: 'json',
		/* beforeSend: function() {
			modal.find();
		}, */
		success: function(result) {
			if(result.error === 0) {
				show_message($('.foot'), result.message, 'Yehey!', 'success');
			}else{

			}
		},
		error: function(result){
			show_message($('.foot'), 'Successfully downloaded.', 'Yehey!', 'success');
		}
	})
});

$('.restore').on('click', function(e){
//alert('kaloka');
$('#container').show();
	$.ajax({
		url: baseurl + 'user/api/users/import',
		type: 'get',
		dataType: 'json',
		/* beforeSend: function() {
			modal.find();
		}, */
		success: function(result) {
			if(result.error === 0) {
				show_message($('.foot'), result.message, 'Yehey!', 'success');
			}else{

			}
		}
	});
	
});
})(jQuery);
