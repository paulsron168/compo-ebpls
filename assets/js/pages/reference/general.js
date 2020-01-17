(function($) {

	/* -------------------
	 * Barangay Form Popup
	 * ------------------- */
	 $('.add-new-barangay').on('click',  function(e) {
		e.preventDefault();
		var modal = $('#add-barangay');
		modal.modal('show');
	});

	/* -------------------
	 * Saving New Barangay
	 * ------------------- */
	$('#barangay-form').on('submit', function(e) {
		e.preventDefault();

		var inputs = $(this).serialize(),
			table = $('table.barangay-list tbody'),
			modal = $('#add-barangay');
			modal.modal('show');
		//alert(inputs);


		$.post(baseurl + 'reference/api/barangay/save', inputs, function(result) {
			if(result.error === 0) {
				modal.find('button.close-modal').trigger('click');
				//$(this).refreshBarangay();
				location.reload();
			} else {
				show_message(modal.find('.messages'), result.message, 'Oops!', 'danger');
			}
		}, 'json');
	});

	/* -------------------
	 * Edit Barangay Form Popup
	 * ------------------- */
	$('table.thistable tbody').on('click', 'tr td a.edit-barangay', function(e) {
		e.preventDefault();
		var data = $(this).data(),
		    modal = $('#edit-barangay');
		//alert(data.bid);
		modal.modal('show');

		$.ajax({
			url: baseurl + 'reference/api/barangay/get_barangay/' + data.bid,
			type: 'get',
			dataType: 'json',
			beforeSend: function() {
				modal.find('.loaders').hide().fadeIn();

			},
			success: function(result) {
				if(result.error === 0){
					//alert(result.data.code);
						modal.find('#edit-barangay-form').fadeIn(function() {
						modal.find('div.loader').fadeOut();

						var bar = result.data;

						modal.find('input[name="brgy"]').val(bar.brgy);
						modal.find('input[name="code"]').val(bar.code);
						modal.find('select[name="garbage"]').val(bar.garbage);
						modal.find('input[name="brgy_id"]').val(bar.brgy_id);
					});
					//show_message($('.messages'), result.message, 'Oops!', 'danger');

				} else {
					show_message($('.messages'), result.message, 'Oops!', 'danger');
					//alert('wala');
				}
			}
		});
	});
	$('#edit-barangay-form').on('submit', function(e) {
		e.preventDefault();
		var inputs = $(this).serialize();
		$.post(baseurl + 'reference/api/barangay/update_brgy', inputs, function(result) {
			if(result.error === 0) {
				show_message($('.messages'), result.message, 'Successful', 'success');
				$('button.close-modal').trigger('click').fadeIn(1000);
			} else {
				show_message($('.messages'), result.message, 'Oops!', 'danger');
			}
			$('#edit-business-details').find('button.close-modal').trigger('click');
		}, 'json');
	});

	$('.add-new-duedate').on('click',  function(e) {
		e.preventDefault();
		var modal = $('#new-duedate');
		modal.modal('show');
	});

	$('#add-form-duedate').on('submit',function(e){
		e.preventDefault();
		//alert('duka walk away');
		var addingduedate= $('#duedate_content');
		var inputs = $(this).serialize(),
			form = $(this);
		$.post(baseurl + 'reference/api/barangay/save_new_duedate', inputs, function(result) {
			if (result.error === 0){
				//location.reload();
				show_message(form.find('.messages'), result.message, '', 'danger');
				$('button.close-modal').trigger('click');
				addingduedate.load(baseurl + 'reference/general #list-duedate');
			} else {
				show_message(form.find('.messages'), result.message, 'Oops!', 'danger');
			}
			console.log(result);
			//alert(result);
		}, 'json');
	});

	$('.edit-duedate').on('click',  function(e) {
		e.preventDefault();
		var data = $(this).data();
		var modal = $('#edit-duedate');
		modal.modal('show');
		//alert(data.ddid);

		$.ajax({
			url: baseurl + 'reference/api/barangay/get_duedate/' + data.ddid,
			type: 'get',
			dataType: 'json',
			beforeSend: function() {
				modal.find('.loaders').hide().fadeIn();
			},
			success: function(result) {
				if(result.error === 0){
					modal.find('#edit-form-duedate').fadeIn(function() {
						modal.find('div.loader').fadeOut();

						var dd = result.data;
						modal.find('input[name="setting_id"]').val(data.ddid);
						modal.find('input[name="field"]').val(dd.field);
						modal.find('input[name="value"]').val(dd.value);

					});
				} else {
					show_message($('.owner-message'), result.message, 'Oops!', 'danger');
					//alert('wala');
				}
			}
		});
	});

	$('#edit-form-duedate').on('submit', function(e) {
		e.preventDefault();
		var contentedit=$('#list-duedate');
		var inputs = $(this).serialize();
		$.post(baseurl + 'reference/api/barangay/update_duedate', inputs, function(result) {
			if(result.error === 0) {
				show_message($('.owner-message'), result.message, 'Success!', 'success');
				$('button.close-modal').trigger('click');
				contentedit.load(baseurl + 'reference/general #list-duedate').on('click',  function(e) {
				e.preventDefault();
				var data = $(this).data();
				var modal = $('#edit-duedate');
				modal.modal('show');
				//alert(data.ddid);

					$.ajax({
						url: baseurl + 'reference/api/barangay/get_duedate/' + data.ddid,
						type: 'get',
						dataType: 'json',
						beforeSend: function() {
							modal.find('.loaders').hide().fadeIn();
						},
						success: function(result) {
							if(result.error === 0){
								modal.find('#edit-form-duedate').fadeIn(function() {
									modal.find('div.loader').fadeOut();

									var dd = result.data;
									modal.find('input[name="setting_id"]').val(data.ddid);
									modal.find('input[name="field"]').val(dd.field);
									modal.find('input[name="value"]').val(dd.value);

								});
							} else {
								show_message($('.owner-message'), result.message, 'Oops!', 'danger');
								//alert('wala');
							}
						}
					});
				});
			} else {
				show_message($('.owner-message'), result.message, 'Oops!', 'danger');
			}
			$('#edit-business-details').find('button.close-modal').trigger('click');
		}, 'json');
	});

	/* -------------------
	 * Barangay Plugin
	 * ------------------- */
	$.fn.refreshBarangay = function() {
		return this.each(function() {
			var table = $(this);
			$.getJSON(baseurl + 'reference/api/barangay/get', function(result) {
				if(result.error === 0) {
					table.html('');

					for(i in result.data) {
						var data = result.data[i],
							tr = $('<tr />', {
								'data-brgyid': data.brgy_id
							}).appendTo(table);

						$('<td />', { text: data.brgy }).appendTo(tr);
						$('<td />', { text: data.code }).appendTo(tr);
						$('<td />', {
							html: '<a href="#" class="btn btn-warning btn-xs edit"><i class="fa fa-edit edit-barangay"></i> Edit</a>' +
									' <a href="#" class="btn btn-danger btn-xs remove"><i class="fa fa-times"></i> Remove</a>'
						}).appendTo(tr);

					}
				} else {

				}
			})
		})
	};

	$('.add_new_announcement').on('click',  function(e) {
		e.preventDefault();
		var modal = $('#add_announcement');
		modal.modal('show');
	});

	$('.adding_announcement').on('submit',function(e){
		e.preventDefault();
		var addannouncement = $("#announcement_content");
		var inputs = $(this).serialize(),
			form = $(this);
		$.post(baseurl + 'reference/api/barangay/newAnnouncement', inputs, function(result) {
			if (result.error === 0){
				//location.reload();
				show_message(form.find('.messages'), result.message, '', 'danger');
				$('button.close-modal').trigger('click');
				addannouncement.load(baseurl + 'reference/general #announcement_list').on('click', 'a.edit_announcement', function(e) {
			e.preventDefault();
			var data = $(this).data();
			var modal = $('#edit_announcement');
			modal.modal('show');

			$.ajax({
				url: baseurl + 'reference/api/barangay/get_announcement/' + data.announceid,
				type: 'get',
				dataType: 'json',
				beforeSend: function() {
					modal.find('.loaders').hide().fadeIn();
				},
				success: function(result) {
					if(result.error === 0){
						modal.find('#edit_form_announcement').fadeIn(function() {
							modal.find('div.loader').fadeOut();

							var announce = result.data;
							if(announce.all == 1){
								var beh = 'Optional';
							}else{
								var beh = 'Applied to all';
							}
							modal.find('input[name="announce_id"]').val(data.announceid);
							modal.find('input[name="title"]').val(announce.title);
							modal.find('input[name="announce_content"]').val(announce.announce_content);
							modal.find('input[name="created_at"]').val(announce.created_at);
							modal.find('input[name="added_by"]').val(announce.added_by);
							modal.find('input[name="modified_at"]').val(announce.modified_at);
								//alert( data.surchargeid);
						});

					} else {
						show_message($('.owner-message'), result.message, 'Oops!', 'danger');
						//alert('wala');
					}
				}
			});

		});

			} else {
				show_message(form.find('.messages'), result.message, 'Oops!', 'danger');
			}
			console.log(result);
			//alert(result);
		}, 'json');
	});

	/*EDIT ANNOUNCEMENT*/

	$('#announcement_list tbody').on('click', 'a.edit_announcement', function(e) {
			e.preventDefault();
			var data = $(this).data();
			var modal = $('#edit_announcement');
			modal.modal('show');

			$.ajax({
				url: baseurl + 'reference/api/barangay/get_announcement/' + data.announceid,
				type: 'get',
				dataType: 'json',
				beforeSend: function() {
					modal.find('.loaders').hide().fadeIn();
				},
				success: function(result) {
					if(result.error === 0){
						modal.find('#edit_form_announcement').fadeIn(function() {
							modal.find('div.loader').fadeOut();

							var announce = result.data;
							if(announce.all == 1){
								var beh = 'Optional';
							}else{
								var beh = 'Applied to all';
							}
							modal.find('input[name="announce_id"]').val(data.announceid);
							modal.find('input[name="title"]').val(announce.title);
							modal.find('input[name="announce_content"]').val(announce.announce_content);
							modal.find('input[name="created_at"]').val(announce.created_at);
							modal.find('input[name="added_by"]').val(announce.added_by);
							modal.find('input[name="modified_at"]').val(announce.modified_at);
								//alert( data.surchargeid);
						});

					} else {
						show_message($('.owner-message'), result.message, 'Oops!', 'danger');
						//alert('wala');
					}
				}
			});

		});

	$('#edit_form_announcement').on('submit', function(e) {
		e.preventDefault();
		var contentedit=$('#announcement_content');
		var inputs = $(this).serialize();
		$.post(baseurl + 'reference/api/barangay/update_announcement', inputs, function(result) {
			if(result.error === 0) {
				//location.reload();
			show_message($('.owner-message'), result.message, 'Success!', 'success');
				$('button.close-modal').trigger('click');
					contentedit.load(baseurl + 'reference/general #announcement_list').on('click', 'a.edit_announcement', function(e) {
			e.preventDefault();
			var data = $(this).data();
			var modal = $('#edit_announcement');
			modal.modal('show');

			$.ajax({
				url: baseurl + 'reference/api/barangay/get_announcement/' + data.announceid,
				type: 'get',
				dataType: 'json',
				beforeSend: function() {
					modal.find('.loaders').hide().fadeIn();
				},
				success: function(result) {
					if(result.error === 0){
						modal.find('#edit_form_announcement').fadeIn(function() {
							modal.find('div.loader').fadeOut();

							var announce = result.data;
							if(announce.all == 1){
								var beh = 'Optional';
							}else{
								var beh = 'Applied to all';
							}
							modal.find('input[name="announce_id"]').val(data.announceid);
							modal.find('input[name="title"]').val(announce.title);
							modal.find('input[name="announce_content"]').val(announce.announce_content);
							modal.find('input[name="created_at"]').val(announce.created_at);
							modal.find('input[name="added_by"]').val(announce.added_by);
							modal.find('input[name="modified_at"]').val(announce.modified_at);
								//alert( data.surchargeid);
						});

					} else {
						show_message($('.owner-message'), result.message, 'Oops!', 'danger');
						//alert('wala');
					}
				}
			});

		});

			} else {
				show_message($('.owner-message'), result.message, 'Oops!', 'danger');
			}
			$('#edit-business-details').find('button.close-modal').trigger('click');

		}, 'json');
	});

// DELETE ANNOUNCMENT

$('#announcement_list').on('click','a.remove_announcement', function (e) {
		e.preventDefault();

			var data = $(this).data(),
			requirements = $('#announcement_list tbody');

		$('#popup-notification').find('.modal-title').text('Delete User');
		$('#popup-notification').find('img.notif').attr('src', baseurl + 'assets/img/icon-warning.gif');
		$('#popup-notification').find('h4.message-header').text('You are about to delete a record from the database.');
		$('#popup-notification').find('p.message-body').text('Are you sure you want to remove this user data?');
		$('#popup-notification').find('input[name="field"]').val(data.announceid);
		$('#popup-notification').find('img.loader').fadeOut();
		$('#popup-notification').find('.actions a').text('Delete');
		$('#popup-notification').modal('show');
	});

	$('#popup-notification').on('click', '.actions a', function() {

		var data = $(this).data();
		var announceid = $('#popup-notification').find('input[name="field"]').val();

	//alert('delete daw ?');
	//alert(req_id);
		$.ajax(
		{
			url: baseurl + 'reference/api/barangay/delete_announcement/' + announceid,
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
})(jQuery);
