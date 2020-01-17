(function($) {

	/*-----------------------------
	*New Line of Business pop-up Form
	*-----------------------------*/
	/* $('#business-nature').on('click', 'a.add-new-business-nature', function(e) {
		e.preventDefault();
		var modal = $('#new-nature');
		//modal.modal('show');
	}); */

	/*-----------------------------
	* Saving new Business Nature
	*-----------------------------*/
	$('form.nature-form').on('submit',function(e){
		e.preventDefault();
		var contentAdd = $("#business-nature-list");
		var inputs = $(this).serialize(),
			table = $('#business-nature-list tbody');
			modal = $('#add-nature');
			

			$.post(baseurl + 'reference/api/requirements/save_nature', inputs, function(result){
				if (result.error === 0) {
					show_message(modal.find('.messages'), result.message, '', 'danger');
					$('button.close-modal').trigger('click');
		
		contentAdd.load(baseurl + "reference #business-nature-list").on('click','a.edit_bn',function(e){
		e.preventDefault();
		var data = $(this).data();
		var modal = $('#edit-nature');
		modal.modal('show');
		$.ajax({
			url: baseurl + 'reference/api/requirements/get_business_nature/' + data.natureid,
			type: 'get',
			dataType: 'json',
			beforeSend: function() {
				modal.find('.loaders').hide().fadeIn();
			},
			success: function(result) {
				if(result.error === 0){
					modal.find('.edit-nature-form').fadeIn(function() {
						modal.find('div.loader').fadeOut();

						var business = result.data;
						
						modal.find('input[name="business_nature"]').val(business.business_nature);
						modal.find('input[name="buss_nature_id"]').val(business.buss_nature_id);
													
					});
				} else {
					show_message($('.owner-message'), result.message, 'Oops!', 'danger');
					//alert('wala');
				}
			}
		});
		
	});
					
					//modal.find('button.close-modal').trigger('click');
				} else {
					show_message(modal.find('.messages'), result.message, 'Oops!', 'danger');
				}
			},'json');
	});

	/* --------------------------------------------
	 * Saving new Surcharge
	 * -------------------------------------------- */
	 $('.add_surcharge').on('click', function(e) {
		e.preventDefault();
		var modal = $('#new_surcharge');
		modal.modal('show');
	});

	 $('form#form_surcharge').on('submit',function(e){
		e.preventDefault();
		var contentAdd = $("#surcharge-list");
		var inputs = $(this).serialize(),
			//table = $('#surcharge-list tbody');
			modal = $('#new_surcharge');
			

			$.post(baseurl + 'reference/api/requirements/save_surcharge', inputs, function(result){
				if (result.error === 0) {
					show_message(modal.find('.messages'), result.message, '', 'danger');
					$('button.close-modal').trigger('click');
					contentAdd.load(baseurl + "reference #surcharge-list").on('click', 'a.edit_surcharge', function(e) {
			e.preventDefault();
			var data = $(this).data();
			var modal = $('#edit_surcharge');
			modal.modal('show');
		
			$.ajax({ 
				url: baseurl + 'reference/api/requirements/get_surcharge/' + data.surchargeid,
				type: 'get',
				dataType: 'json',
				beforeSend: function() {
					modal.find('.loaders').hide().fadeIn();
				},
				success: function(result) {
					if(result.error === 0){
						modal.find('#edit_form_surcharge').fadeIn(function() {
							modal.find('div.loader').fadeOut();

							var surcharge = result.data;
							if(surcharge.all == 1){
								var beh = 'Optional';
							}else{
								var beh = 'Applied to all';
							}
							modal.find('input[name="surcharge_id"]').val(data.surchargeid);
							modal.find('input[name="date_renew"]').val(surcharge.date_renew);
							modal.find('input[name="surcharge"]').val(surcharge.surcharge);
							modal.find('input[name="interest"]').val(surcharge.interest);
								//alert( data.surchargeid);
						});

					} else {
						show_message($('.owner-message'), result.message, 'Oops!', 'danger');
						//alert('wala');
					}
				}
			});

		});

					//location.reload();
					//modal.find('button.close-modal').trigger('click');
				} else {
					show_message(modal.find('.messages'), result.message, 'Oops!', 'danger');
				}
			},'json');
	});


/* --------------------------------------------
	 * Saving new requirements
	 * -------------------------------------------- */
	 $('.add-new-req').on('click', function(e) {
		e.preventDefault();
		var modal = $('#add-new-requirement');
		modal.modal('show');
	});

	$('form.new-requirement-form').on('submit', function(e) {
		e.preventDefault();
		var contentAdd = $("#requirement_content");
		var inputs = $(this).serialize();

		form = $(this),
		$.post(baseurl + 'reference/api/requirements/save', inputs, function(result) {
			if (result.error === 0){
				show_message(form.find('.messages'), result.message, '', 'danger');
				$('button.close-modal').trigger('click');
				contentAdd.load(baseurl + "reference #requirement-list");
				
						
			} else {
				show_message(form.find('.messages'), result.message, 'Oops!', 'danger');
			}
			
			//alert(result);
		}, 'json');
	});

	/* --------------------------------------------
	 * Saving new requirements for business nature
	 * -------------------------------------------- */
	$('form.requirement-form').on('submit', function(e) { 
		e.preventDefault();
		var inputs = $(this).serialize(),
			form = $(this),
			requirements = $('#requirement-list tbody');

		$.post(baseurl + 'reference/api/requirements/add_requirement', inputs, function(result) {
			if(result.error === 0) {
				var id = $('#business-nature').find('a.add-new-requirements').data('natureid'),
					nature = $('#business-nature-list');

				$.getJSON(baseurl + 'reference/api/requirements/get_requirements/' + id, function(result) {
					var collection = null;
					if(result.data != undefined) {
						collection = result.data.requirements;
					}

					nature.refreshRequirements({
						table: '#requirements-list',
						data: collection,
						natureid: id
					});
					
					$('#new-requirement').find('button.close-modal').trigger('click');
				});
			} else {
				show_message(form.find('.messages'), result.message, 'Oops!', 'danger');
			}
		}, 'json');
	});
	
	/*/*-----------------------------
	* Saving new Business Nature
	*-----------------------------*/
	$('table#business-nature-list').on('click','a.edit_bn',function(e){
		e.preventDefault();
		var data = $(this).data();
		var modal = $('#edit-nature');
		modal.modal('show');
		$.ajax({
			url: baseurl + 'reference/api/requirements/get_business_nature/' + data.natureid,
			type: 'get',
			dataType: 'json',
			beforeSend: function() {
				modal.find('.loaders').hide().fadeIn();
			},
			success: function(result) {
				if(result.error === 0){
					modal.find('.edit-nature-form').fadeIn(function() {
						modal.find('div.loader').fadeOut();

						var business = result.data;
						
						modal.find('input[name="business_nature"]').val(business.business_nature);
						modal.find('input[name="buss_nature_id"]').val(business.buss_nature_id);
													
					});
				} else {
					show_message($('.owner-message'), result.message, 'Oops!', 'danger');
					//alert('wala');
				}
			}
		});
		
	});
	 $('.edit-nature-form').on('submit', function(e) {
		e.preventDefault();
		var table = $('#business-nature-list');	
		var inputs = $(this).serialize();  
		$.post(baseurl + 'reference/api/requirements/update_buss_nature', inputs, function(result) {
			if(result.error === 0) {
			show_message($('.owner-message'), result.message, 'Success!', 'success');				
				table.load( baseurl + "reference #business-nature-list").on('click','a.edit_bn',function(e){
		e.preventDefault();
		var data = $(this).data();
		var modal = $('#edit-nature');
		modal.modal('show');
		$.ajax({
			url: baseurl + 'reference/api/requirements/get_business_nature/' + data.natureid,
			type: 'get',
			dataType: 'json',
			beforeSend: function() {
				modal.find('.loaders').hide().fadeIn();
			},
			success: function(result) {
				if(result.error === 0){
					modal.find('.edit-nature-form').fadeIn(function() {
						modal.find('div.loader').fadeOut();

						var business = result.data;
						
						modal.find('input[name="business_nature"]').val(business.business_nature);
						modal.find('input[name="buss_nature_id"]').val(business.buss_nature_id);
													
					});
				} else {
					show_message($('.owner-message'), result.message, 'Oops!', 'danger');
					//alert('wala');
				}
			}
		});
		
	});
				$('button.close-modal').trigger('click');
			} else {
				show_message($('.owner-message'), result.message, 'Oops!', 'danger');
			}
			$('#edit-business-details').find('button.close-modal').trigger('click');

		}, 'json');
	}); 
	 
	/* ----------------------
	 * TFO Behavior Selection
	 * ---------------------- */
	$('select.tfo-behavior').on('change', function() {
		var value = $(this).val(),
			options = $('.tfo-options');

		if(value == 1) {			// Formula
			options.find('.tfo-value').hide('slow');
			options.find('.range-form').hide('slow');
			options.find('.formula-form').show('slow');
		} else if(value == 2) {	// Constant
			options.find('.formula-form').hide('slow');
			options.find('.range-form').hide('slow');
			options.find('.tfo-value').show('slow');
		} else if(value == 3) {	// Range
			options.find('.formula-form').hide('slow');
			options.find('.tfo-value').hide('slow');
			options.find('.range-form').show('slow');
		}
	});

	/* ------------------
	 * Show Range in List
	 * ------------------ */
	$('#required-tfo-list').on('click', 'p.show-range', function() {
		$(this).parent().find('.slide-range').slideToggle('slow');
	});

	/* ----------
	 * Add Range
	 * ---------- */
	var rangeCount = 0;
	$('.tfo-options').on('click', 'a.add-range', function(e) {
		e.preventDefault();
		// alert('asdf'); return false;
		var min = $('input.min[type="text"]').val(),
			max = $('input.max[type="text"]').val(),
			val = $('input.val[type="text"]').val(),

			rangeForm = $('.range-form'),
			range = rangeForm.find('.row.ranges');
			
		
		// if(parseFloat(min) >= parseFloat(max) || parseFloat(min) >= parseFloat(val) || parseFloat(max) >= parseFloat(val)
		// 	|| min == '' || max == '' || val == '') {

		// } else {
		// }
			range.append('<div class="range">' +
							'<span class="badge">&#8369;' + currencyFormat(parseFloat(min)) + '</span> - ' +
							'<span class="badge">&#8369;' + currencyFormat(parseFloat(max)) + '</span> = ' +
							'<span class="badge">&#8369;' + currencyFormat(parseFloat(val)) + '</span> ' +
							'<span class="btn badge badge-primary remove-range">&times;</span>' +
							'<input type="hidden" name="range[' + rangeCount + '][min]" value="' + min + '" />' +
							'<input type="hidden" name="range[' + rangeCount + '][max]" value="' + max + '" />' +
							'<input type="hidden" name="range[' + rangeCount + '][value]" value="' + val + '" />' +
						'</div>');

			$('input.min').val('');
			$('input.max').val('');
			$('input.val').val('');
			
			rangeCount++;
	});

	/* ----------
	 * Remove Range
	 * ---------- */
	$('.tfo-options .range-form').on('click', 'span.remove-range', function(e) {
		e.preventDefault();
		$(this).parent().fadeOut(function() {
			this.remove();
			rangeCount--;
		});
	});
	
	/* ------------------
	 * Edit requirements
	 * ------------------*/
	$('#requirement-list tbody').on('click', 'a.edit', function(e) {
		e.preventDefault();
		var data = $(this).data(),
			form = $('form.requirement-form');

		form.find('.messages').html('');

		$.getJSON(baseurl + 'reference/api/requirements/get/' + data.req_id, function(result) {
			if(result.error === 0) {
				form.find('input[name="description"]').val(result.data.description);
				form.find('select[name="permit_id"]').val(result.data.permit_id);
			} else {
				show_message(form.find('.messages'), result.message, 'Oops!', 'danger');
			}
		});

		$('#new-requirement').modal('show');
		$('<input />', {
			type: 'hidden',
			name: 'requirement_id',
			value: data.req_id
		}).appendTo('form.requirement-form');
	});

	$('#requirement-list tbody').on('click', 'a.editreq', function(e) {
			e.preventDefault();
			var data = $(this).data();
			var modal = $('#edit-requirement');
			modal.modal('show');

			$.ajax({
				url: baseurl + 'reference/api/tfo/get_req_description/' + data.req_id,
				type: 'get',
				dataType: 'json',
				beforeSend: function() {
					modal.find('.loaders').hide().fadeIn();
				},
				success: function(result) {
					if(result.error === 0){
						modal.find('#edit-form-req').fadeIn(function() {
							modal.find('div.loader').fadeOut();

							var business = result.data;
							if(business.all == 1){
								var beh = 'Optional';
							}else{
								var beh = 'Applied to all';
							}
							modal.find('input[name="requirement_id"]').val(data.req_id);
							modal.find('input[name="description"]').val(business.description);
						});
					} else {
						show_message($('.owner-message'), result.message, 'Oops!', 'danger');
						//alert('wala');
					}
				}
			});

		});


	$('#requirements').on('click', '#add-requirement', function(e) {
		//$('#add-new-requirement').modal('show');
	});

	/* -----------------------------------------------
	 * Show Form for adding new requirements
	 * ----------------------------------------------- */
	$('#business-nature').on('click', 'a.add-new-requirements', function(e) {
		e.preventDefault();
		var id = $(this).data('natureid'),
			list = $('.requirement-list');
		$('#new-requirement').find('form input[name="buss_nature_id"]').val(id);
		list.add_requirements({ id: id });
		$('#new-requirement').modal('show');
		
	});

	/*
	$('select.business-nature').on('change', function() {
		var natureID = $(this).val(),
			list = $('.requirement-list');

		if(!$(this).hasClass('from-table')) {
			list.requirements({ id: natureID });
		}
	});**/
	
	
	$("#checkAll").change(function () {
		$("input:checkbox").prop('checked', $(this).prop("checked"));
	});
	
	/* ------------------------------------------------
	 * Plug in for add requirements
	 * -----------------------------------------------*/
	 
	 $.fn.add_requirements = function(option) {
		var defaults = {
			id: ''
		}, o = $.extend(defaults, option);
		return this.each(function() {
			var list = $(this);
			list.html('');

			$.getJSON(baseurl + 'reference/api/requirements/get_requirements/' + o.id, function(response) {
				if(response.error === 0 && response.data.all_requirements!='') {
					$('div.check-all').show();
					$('div.modal-footer').show();
					$('div.no-reqt').find('p.msg').text('');
						for(col in array_chunk(response.data.all_requirements)) {
								var data = response.data.all_requirements[col]
							var cols = $('<div />', { 'class': 'col-sm-8' }).appendTo(list),
								label = '';
						
								req = response.data.all_requirements[i] ;
								label = $('<label />', {
											'class': 'checkbox-inline col-sm-12'
										}).appendTo(cols);
									$('<input />', {
										type: 'checkbox',
										'class': 'checkbox-item',
										name: 'requirement_id[]',
										value: data.requirement_id
									}).appendTo(label);
									$('<span />', {
										text: data.description
									}).appendTo(label);						
						}
					
				} else { //alert('error');
				    $('div.no-reqt').find('p.msg').text('All requirement have been choosen. Please go to Requirements tab to add another requirement');
					
					// Error here
					//$('<p />', { text: response.message }).appendTo(list);
				}
			});
		});
	};
	
	/* -------------------------------------------------
	 *
	 * End of add reqt plug in
	 * -----------------------------------------------*/
	/* -----------------------------------------------
	 * Show Form for adding new required tfo
	 * ----------------------------------------------- */
	$('#business-nature').on('click', 'a.add-new-required-tfo', function(e) {
		e.preventDefault();
		var id = $(this).data('natureid');
		$('#add_tfo').find('input[name="buss_nature_id"]').val(id);
		$('#add_tfo').find('tfo-options tfo-value').hide();
		$('#add_tfo').find('tfo-options range-form').hide();
		$('#add_tfo').find('tfo-options formula-form').hide();
		$('#add_tfo').modal('show');
	});

	/* ------------------------------------
	 * Show popup for removing requirements
	 * ------------------------------------*/
	$('#requirement-list tbody').on('click', 'a.remove', function(e) {
		e.preventDefault();
		var data = $(this).data(),
			requirements = $('#requirement-list tbody'),
			row = $(this).parent().parent();
//alert(data.req_id);
		$('#popup-notification').find('.modal-title').text('Delete a Requirement');
		$('#popup-notification').find('img.notif').attr('src', baseurl + 'assets/img/icon-warning.gif');
		$('#popup-notification').find('h4.message-header').text('You are about to delete a record from the database.');
		$('#popup-notification').find('p.message-body').text('Are you sure you want to remove this requirement data?');
		$('#popup-notification').find('input[name="field"]').val(data.req_id);

		$('#popup-notification').find('img.loader').fadeOut();

		$('#popup-notification').find('.actions a').text('Delete');		
		$('#popup-notification').modal('show');
	});

	/* ---------------------
	 * Delete a requirement
	 * --------------------- */
	$('#popup-notification').on('click', '.actions a', function() {
		var req_id = $('#popup-notification').find('input[name="field"]').val(),
			nature_id = $('#popup-notification').find('input[name="type"]').val();
		
	alert('delete daw ?'); 
	//alert(req_id);
		$.ajax({
			url: baseurl + 'reference/api/requirements/remove/' + req_id + '/' + nature_id,
			type: 'get',
			dataType: 'json',
			beforeSend: function() {
				$('#popup-notification').find('img.loader').hide().fadeIn();
			},
			success: function(result) {
				if(result.error === 0) {					
					$.getJSON(baseurl + 'reference/api/requirements/get_requirements/' + nature_id, function(result) {
						if(result.error === 0) {
							$('#business-nature-list tbody').refreshList({
							//$('#business-nature-list').refreshRequirements({
								table: '#requirements-list',
								data: result.data.requirements,
								natureid: nature_id
							});
							$(this).find('button.close-modal').trigger('click');
							//show_message($('.reference-message'), result.message, 'Success!', 'success');
						} else {
							show_message($('.reference-message'), result.message, 'Oops!', 'danger');
						}
					});
				} else {
					show_message($('.reference-message'), result.message, 'Oops!', 'danger');
				}
			}
		});
	});

    /*deleting requirement for business nature*/
	$('#requirements-list').on('click','a.remove-req', function (e) {
		e.preventDefault();
		
			var data = $(this).data(),
			requirements = $('#requirement-list tbody');
			
		$('#popup-notification').find('.modal-title').text('Delete a Requirement');
		$('#popup-notification').find('img.notif').attr('src', baseurl + 'assets/img/icon-warning.gif');
		$('#popup-notification').find('h4.message-header').text('You are about to delete a record from the database.');
		$('#popup-notification').find('p.message-body').text('Are you sure you want to remove this requirement data?');
		$('#popup-notification').find('input[name="field"]').val(data.tfoid);
		$('#popup-notification').find('input[name="type"]').val(data.natureid);
		$('#popup-notification').find('img.loader').fadeOut();
		$('#popup-notification').find('.actions a').text('Delete');		
		$('#popup-notification').modal('show');
	});
	/*end of deletion requirement for business nature*/
	/* ------------------------------
	 * Popup modal for adding new requirement (Requirements)
	 * ------------------------------ */
	

	/* ------------------------------
	 * Popup modal for adding new tfo
	 * ------------------------------ */
	$('.add-new-tfo').on('click', function(e) {
		e.preventDefault();
		var modal = $('#add-new-tfo');
		modal.modal('show');
	});

	$('#add-form-tfo').on('submit', function(e) {
		e.preventDefault();
		//alert('duka walk away');
		var inputs = $(this).serialize(),
			form = $(this);
		$.post(baseurl + 'reference/api/tfo/save_new_tfo', inputs, function(result) {
			if (result.error === 0){
				location.reload();
				show_message(form.find('.messages'), result.message, '', 'danger');
				$('button.close-modal').trigger('click');
				location.reload();
			} else {
				show_message(form.find('.messages'), result.message, 'Oops!', 'danger');
			}
			console.log(result);
			//alert(result);
		}, 'json');
	});

	/* -------------------
	 * Adding new Variable
	 * ------------------- */
	$('a.add-variable').on('click', function(e) {
		e.preventDefault();
		var options = $('.tfo-options'),
			variables = options.find('.formula-form .variables'),
			selections = variables.find('.selections');

		selections.show();
	});

	var v = 0;
	$('.tfo-options').on('click', 'span.save-variable', function() {
		var options = $('.tfo-options'),
			variables = options.find('.formula-form .variables'),
			selections = variables.find('.selections'),
			value = selections.find('#tfo-select').val(),
			text = selections.find('#tfo-select option').filter(':selected').text();

		selections.hide();

		variables.find('.variable-items').append('<div class="block-level">' +
			'<label class="col-sm-3 control-label">$' + initials(text) + '</label>' +
			'<label class="col-sm-1 control-label"> = </label>' +
			'<label class="col-sm-8 text-left control-label">' + capitalize(text) + ' <span class="btn badge badge-primary remove-variable">&times;</span></label>' +
			'<input type="hidden" name="variables[' + initials(text) + ']" value="' + value + '" />' +
		'</div>');
		v++;
	});

	$('.tfo-options').on('click', 'span.remove-variable', function() {
		var variable = $(this).parent().parent();
		variable.remove();
		v--;
	});
	/* ------------------------------
	 * Saving New Required TFO
	 * ------------------------------ */
	$('#add-tfo-form').on('submit', function(e) {
		e.preventDefault();
		var inputs = $(this).serialize(),
			form = $(this);
		
		$.post(baseurl + 'reference/api/tfo/add_tfo', inputs, function(result) {
			console.log(result);
			if(result.error === 0) {
				form[0].reset();
				$('button.close-modal').trigger('click');
				$.getJSON(baseurl + 'reference/api/tfo/get', function(response) {
					if(response.error === 0) {
						$('table.tfo tbody').refreshTFO(response.data);

					} else {

					}
				});
			} else {
				alert('failed');
			}
		}, 'json');
	});

	/* ------------------------------
	 * Updating  Required TFO
	 * ------------------------------ */

	$('#edit_required_tfo_form').on('submit', function(e) {
		e.preventDefault();
		var inputs = $(this).serialize(); 	       
		$.post(baseurl + 'reference/api/tfo/update_req_tfo', inputs, function(result) {
			if(result.error === 0) {
				show_message($('.owner-message'), result.message, 'Success!', 'success');
				$('button.close-modal').trigger('click');
				location.reload();
			} else {
				show_message($('.owner-message'), result.message, 'Oops!', 'danger');
			}
			//$('#edit-business-details').find('button.close-modal').trigger('click');
		}, 'json');
	});

/*
		$('#edit_required_tfo_form').on('submit', function(e) {
		e.preventDefault();
		var inputs = $(this).serialize(),
			form = $(this);
		
		$.post(baseurl + 'reference/api/tfo/update_req_tfo', inputs, function(result) {
			console.log(result);
			if(result.error === 0) {
				form[0].reset();
				$('button.close-modal').trigger('click');
				$.getJSON(baseurl + 'reference/api/tfo/get', function(response) {
					if(response.error === 0) {
						$('table.tfo tbody').refreshTFO(response.data);

					} else {

					}
				});
			} else {
				alert('failed');
			}
		}, 'json');
	});
*/


	/* ---------------------------------------
	 * View Required TFO by Nature of Business
	 * --------------------------------------- */
	$('#business-nature-list tbody').on('click', 'a.required-tfo', function(e) {
		e.preventDefault();
		var id = $(this).data('natureid'),
			nature = $('#business-nature-list');

		$.getJSON(baseurl + 'reference/api/requirements/get_required_tfo/' + id, function(result) {
			var table = $('#required-tfo-list');

			nature.refreshTFOList({
				table: table,
				data: result.data,
				natureid: id
			});
			
		});
	});

	/* ---------------------------------------
	 * View Requirements by Nature of Business
	 * --------------------------------------- */
	$('#business-nature-list tbody').on('click', 'a.requirements', function(e) {
		e.preventDefault();
		var id = $(this).data('natureid'),
			nature = $('#business-nature-list');
		//alert('VS');
		$.getJSON(baseurl + 'reference/api/requirements/get_requirements/' + id, function(result) {
			var collection = null;
			if(result.data != undefined) {
				collection = result.data.reqt.requirements;
			}

			nature.refreshRequirements({
				table: '#requirements-list',
				data: collection,
				natureid: id
			});
		});
	});

	/* --------------------------------------
	 * Shows back the list of Business Nature
	 * -------------------------------------- */
	$('ul.business-nature').on('click', 'a.back', function(e) { //alert('back');
		e.preventDefault();
		var button = $('ul.business-nature');

		button.back({
			fadeOutTable: 'requirements-list',
			fadeInTable: 'business-nature-list',
			aClass: 'new-business-nature',
			buttonLabel: 'Add New Business Nature'
		});
	});

	$('ul.business-nature').on('click', 'a.back-to-nature', function(e) {
		e.preventDefault();
		$('.portlet-header').find('h3 span').text('Business Nature List');
		$('ul.business-nature').back({
			fadeOutTable: 'required-tfo-list',
			fadeInTable: 'business-nature-list',
			aClass: 'new-business-nature',
			buttonLabel: 'Add New Business Nature'
		});
	});

	$.fn.back = function(option) {
		var defaults = {
			fadeOutTable: '',		// Table to be hidden
			fadeInTable: '',		// Table to be shown
			aClass: '',				// Class tag for adding new item. Example "add-business-nature"
			buttonLabel: ''			// Label of the button
		}, o = $.extend(defaults, option);

		return this.each(function() {
			var button = $(this);
//alert('o.aClass = ' + o.aClass + ' o.buttonLabel = ' +o.buttonLabel);
			$('#' + o.fadeOutTable).fadeOut(function() {
				$('#' + o.fadeInTable).hide().fadeIn(function() {
					button
					button.html('<li>' +
						'<a class="btn btn-sm btn-primary add-' + o.aClass + '">' +
							'<i class="fa fa-plus-circle"></i> ' + o.buttonLabel +
						'</a>' +
					'</li>');
				});
			});
		});
	};

	/* ---------------------------------------
	 * Plugin to refresh the requirements list
	 * --------------------------------------- */
	$.fn.refreshList = function(option) {
		var defaults = {
			table: '',
			data: ''
		}, o = $.extend(defaults, option);

		return this.each(function() {
			var elem = $(this);

			elem.html('');

			for(i in o.data) {
				var req = o.data[i],
					tr = $('<tr />').appendTo(elem);

				$('<td />', { text: parseInt(i) + 1 }).appendTo(tr);
				$('<td />', { text: capitalize(req.description) }).appendTo(tr);
				$('<td />', {
					html: '<a href="#" data-id="' + req.id + '" class="btn btn-warning btn-xs edit"><i class="fa fa-edit"></i> Edit</a>' +
					' <a href="#" data-id="' + req.id + '" class="btn btn-danger btn-xs remove"><i class="fa fa-times"></i> Remove</a>'
				}).appendTo(tr);
			}
			$('button.close-modal').trigger('click');
		});
	};

	/* ---------------------------------------
	 * Plugin to refresh the TFO List
	 * --------------------------------------- */
	$.fn.refreshTFO = function(option) {
		return this.each(function() {
			var elem = $(this);
			
			elem.html('');

			for(i in option) {
				var data = option[i],
					tr = $('<tr />').appendTo(elem);

				$('<td />', { text: capitalize(data.tfo) }).appendTo(tr);
				$('<td />', { html: '<span class="pull-left">₱</span><span class="pull-right">' + currencyFormat(parseFloat(data.amount)) + '</span>' }).appendTo(tr);
				$('<td />', { 'class': 'text-center', text: (data.all === 0) ? 'Optional' : 'Applied To All' }).appendTo(tr);
				$('<td />', { text: capitalize(data.indicator) }).appendTo(tr);
				$('<td />', { text: capitalize(data.type) }).appendTo(tr);
				$('<td />', { html: '<a href="#" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>' +
									' <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Delete</a>' }).appendTo(tr);
			}
		});
	};

	/* ---------------------------------------
	 * Plugin to refresh the TFO List Version 2
	 * --------------------------------------- */
	$.fn.refreshTFOList = function(option) {
		var defaults = {
			table: '',
			data: null,
			natureid: null
		}, o = $.extend(defaults, option);

		return this.each(function() {
			$(this).fadeOut(function() {
				$(o.table).hide().fadeIn(function() {
					var list = o.table.find('tbody'),
						button = $('ul.business-nature');

						// Change the buttons for adding requirements
						button.html('');
						$('<li />', { html: '<a href="#" class="btn btn-sm btn-default back-to-nature">' +
									'<i class="fa fa-plus-circle"></i> Back' +
								'</a>' +
								' <a data-natureid="' + o.natureid + '" href="#" class="btn btn-sm btn-primary add-new-required-tfo">' +
									'<i class="fa fa-plus-circle"></i> Add New Required TFO' +
								'</a>'
						}).appendTo(button);

					list.html('');
					if(o.data != null) {
						$('.portlet-header').find('h3 span').text('Required TFO For: ' + o.data[0].business_nature);

						for(i in o.data) {
							var tr = $('<tr />').appendTo(list),
								data = o.data[i],
								behavior = '',
								value = '';

							if(data.behavior == 1) {
								behavior = 'Formula Type';
								value = '<span class="label label-warning font-size-14">' + data.value + '</span>';
							} else if(data.behavior == 2) {
								behavior = 'Constant Value';
								value = '<span class="pull-left">&#8369;</span><span class="pull-right label label-success font-size-14">' + currencyFormat(parseFloat(data.value)) + '</span>';
							} else if(data.behavior == 3) {
								behavior = 'Range Value';
								values = $.parseJSON(data.value);

								value = '<div class="range-list">' +
									'<p class="btn btn-xs btn-info show-range">Click to view Range <span class="caret"></span></p>' +
									'<div class="slide-range" style="display: none;">';
								
								for(index in values) {
									value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].min)) + '</span> - ';
									value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].max)) + '</span> = ';
									value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].value)) + '</span><br />';
								}

								value += '</div></div>';
							}

							$('<td />', { text: parseInt(i) + 1 }).appendTo(tr);
							$('<td />', { text: capitalize(data.tfo) }).appendTo(tr);
							$('<td />', { text: capitalize(data.app_type) }).appendTo(tr);
							$('<td />', { text: behavior }).appendTo(tr);
							// $('<td />', { text: capitalize(data.indicator) }).appendTo(tr);
							$('<td />', { html: value }).appendTo(tr);
							$('<td />', {
								html: '<a href="#" data-tfoid="' + data.tfoid + '"class="btn btn-xs btn-warning edit-required-tfo"><i class="fa fa-edit"></i> Edit</a>' +
									' <a href="#" data-tfoid="' + data.tfoid + '" class="btn btn-xs btn-danger delete-required-tfo"><i class="fa fa-times"></i> Delete</a>'
							}).appendTo(tr);
						}
					} else {
						var tr = $('<tr />').appendTo(list);
						$('<td />', { colspan: 7, text: 'No required tfo found for this nature of business.' }).appendTo(tr);
					}
				});
			});
		});
	};

	/* ---------------------------------------
	 * Plugin to refresh the Requirement List
	 * --------------------------------------- */
	$.fn.refreshRequirements = function(option) { 
		var defaults = {
			table: '#require-tfo-list',
			data: null,
			natureid: null
		}, o = $.extend(defaults, option);

		return this.each(function() {
			var requirements = $(this);

			requirements.fadeOut(function() {
				$(o.table).fadeIn(function() {
					var table = $(this).find('tbody'),
						button = $('ul.business-nature');

					// Change the buttons for adding requirements
					button.html('');
					$('.portlet-header').find('h3 span').text('Required TFO For: ' + o.data[0].nature);
					$('<li />', { html: '<a href="#" class="btn btn-sm btn-default back">' +
								'<i class="fa fa-plus-circle"></i> Back' +
							'</a>' +
							' <a data-natureid="' + o.natureid + '" href="#" class="btn btn-sm btn-primary add-new-requirements">' +
								'<i class="fa fa-plus-circle"></i> Add New Requirements' +
							'</a>'
					}).appendTo(button);

					// Clear the list of required tfo table
					table.html('');

					// Populate the list of required tfo table with data
					if(o.data !== null) {						
						for(i in o.data) {
							var data = o.data[i],
								tr = $('<tr />').appendTo(table);
															
							$('<td />', { text: parseInt(i) + 1 }).appendTo(tr);
							$('<td />', { text: capitalize(data.description) }).appendTo(tr);
							$('<td />', { html: '<a href="#"  class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>'						
												 +' <a href="#" data-tfoid="' + data.requirement_id + '"  data-natureid="' + o.natureid + '"class="btn btn-danger btn-xs remove-req"><i class="fa fa-times"></i> Delete</a>' 
									}).appendTo(tr);
							
						}
					} else {
						var tr = $('<tr />').appendTo(table);
						$('<td />', { colspan: 6, text: 'No requirements found in this nature of business.' }).appendTo(tr);
					}


				});
			});
		});
	}

	$('table.tfo-list tbody').on('click', 'tr td a.diane', function(e) {
		e.preventDefault();
		var data = $(this).data(),
		    modal = $('#edit-tfo');
		modal.modal('show');
		
		$.ajax({
			url: baseurl + 'reference/api/tfo/get_tfotest/' + data.tfoid ,
			type: 'get',
			dataType: 'json',
			beforeSend: function() {
				modal.find('.loaders').hide().fadeIn();
			},
			success: function(result) {
				if(result.error === 0){
						modal.find('#edit-tfo-form').fadeIn(function() {
						modal.find('div.loader').fadeOut();

						var business = result.data;
						if(business.all == 1){
							var beh = 'Optional';
						}else{
							var beh = 'Applied to all';
						}
						modal.find('input[name="tfo_id"]').val(data.tfoid);
						modal.find('input[name="tfo"]').val(business.tfo);
						modal.find('select[name="all"]').val(business.all);
						modal.find('input[name="amount"]').val(business.amount);
						modal.find('select[name="payment_id"]').val(business.payment_id);
						modal.find('select[name="type"]').val(business.type);
					});
				} else {
					show_message($('.owner-message'), result.message, 'Oops!', 'danger');
					//alert('wala');

				}
			}
		});

	}); 

	
	/* $('table#tfo').on('click',' a.diane',function(e){
		//alert('lami');
		e.preventDefault();
		var data = $(this).data();
		var modal = $('#edit-tfo');
		modal.modal('show');
		//alert(data.tfoid);

		$.ajax({
			url: baseurl + 'reference/api/tfo/get_tfotest/' + data.tfoid,
			type: 'get',
			dataType: 'json',
			beforeSend: function() {
				modal.find('.loaders').hide().fadeIn();
			},
			success: function(result) {
				if(result.error === 0){
					modal.find('#edit-tfo-form').fadeIn(function() {
						modal.find('div.loader').fadeOut();

						var business = result.data;
						if(business.all == 1){
							var beh = 'Optional';
						}else{
							var beh = 'Applied to all';
						}
						modal.find('input[name="tfo_id"]').val(data.tfoid);
						modal.find('input[name="tfo"]').val(business.tfo);
						modal.find('select[name="all"]').val(business.all);
						modal.find('input[name="amount"]').val(business.amount);
						modal.find('select[name="payment_id"]').val(business.payment_id);
						modal.find('select[name="type"]').val(business.type);
					});
				} else {
					show_message($('.owner-message'), result.message, 'Oops!', 'danger');
					//alert('wala');
				}
			}
		});

	}); */

	
	
	/**edit required tfo*/
	$('#business-nature').on('click','a.edit-required-tfo', function(e) {
	e.preventDefault();
		var modal = $('#edit_tfo'),
		data = $(this).data();
		modal.modal('show');
		
		$.ajax({
			url: baseurl + 'reference/api/tfo/get_required_tfo_by_nature/' + data.tfoid,
			type: 'get',
			dataType: 'json',
			beforeSend: function() {
				modal.find('.loaders').hide().fadeIn();
			},
			success: function(result) {
				if(result.error === 0){
					modal.find('#edit_required_tfo_form').fadeIn(function() {
						modal.find('div.loader').fadeOut();

						var required_tfo = result.data;
						if(required_tfo.behavior == 1){ //Formula					
							
							options = $('.tfo-options');
							options.find('.tfo-value').hide('slow');
							options.find('.range-form').hide('slow');
							options.find('.formula-form').show('slow');
							modal.find('select[name="application_id"]').val(required_tfo.app_type);
							modal.find('input[name="buss_nature_id"]').val(required_tfo.buss_nature_id);
							modal.find('input[name="req_tfo_id"]').val(data.tfoid);
							modal.find('select[name="type"]').val(required_tfo.behavior);
							modal.find('input[name="formula"]').val(required_tfo.value);
							alert(required_tfo.value);
							modal.find('select[name="tfo_id"]').val(required_tfo.tfo_id);							
						
	
							
						} else if(required_tfo.behavior == 2){ //Constant
							options = $('.tfo-options');
							options.find('.tfo-value').show('slow');
							options.find('.range-form').hide('slow');
							options.find('.formula-form').hide('slow');		
							modal.find('select[name="application_id"]').val(required_tfo.app_type);
							modal.find('input[name="buss_nature_id"]').val(required_tfo.buss_nature_id);	
							modal.find('input[name="req_tfo_id"]').val(data.tfoid);										
							modal.find('select[name="type"]').val(required_tfo.behavior);
							modal.find('input[name="value"]').val(required_tfo.value);
							modal.find('select[name="tfo_id"]').val(required_tfo.tfo_id);							
							

							
						} else  if(required_tfo.behavior == 3){ //Range	
							values = $.parseJSON(required_tfo.value);
							//alert(required_tfo.behavior);	
						    options = $('.tfo-options');
							options.find('.tfo-value').hide('slow');
							options.find('.range-form').show('slow');
							options.find('.formula-form').hide('slow');	
							modal.find('select[name="application_id"]').val(required_tfo.app_type);
							modal.find('input[name="buss_nature_id"]').val(required_tfo.buss_nature_id);	
							modal.find('input[name="req_tfo_id"]').val(data.tfoid);	
							modal.find('select[name="type"]').val(required_tfo.behavior);
							modal.find('select[name="tfo_id"]').val(required_tfo.tfo_id);							
							
							
							for(index in values){
								var min = parseFloat(values[index].min),
									max = parseFloat(values[index].max),
									value = parseFloat(values[index].value);
							//alert('min = ' +min);alert('max ='+max);
							modal.find('input[name="min"]').val(min);
							modal.find('input[name="max"]').val(max);
							modal.find('input[name="equi"]').val(value);							
							}									
						}
					});
				} else {
					show_message($('.owner-message'), result.message, 'Oops!', 'danger');
					//alert('wala');
				}
			}
		});
	});

	/*end of edit required tfo*/
	
	/*delete required tfo*/
	$('#business-nature').on('click','.delete-required-tfo', function() {
		var modal = $('#edit_tfo'),data = $(this).data();
		
		$('#popup-notification').find('.modal-title').text('Delete a Requirement');
		$('#popup-notification').find('img.notif').attr('src', baseurl + 'assets/img/icon-warning.gif');
		$('#popup-notification').find('h4.message-header').text('You are about to delete a record from the database.');
		$('#popup-notification').find('p.message-body').text('Are you sure you want to remove this requirement data?');
		$('#popup-notification').find('input[name="field"]').val(data.tfoid);
		$('#popup-notification').find('img.loader').fadeOut();
		$('#popup-notification').find('.actions a').text('Delete');		
		$('#popup-notification').modal('show');
		
		$.ajax({
			url: baseurl + 'reference/api/tfo/delete_required_tfo_by_nature/' + data.tfoid,
			type: 'get',
			dataType: 'json',
			beforeSend: function() {
				modal.find('.loaders').hide().fadeIn();
			},
			success: function(result) {
				if(result.error === 0){
				$('button.close-modal').trigger('click');
				location.reload();
				} else {
					//show_message($('.owner-message'), result.message, 'Oops!', 'danger');
				alert('wala');
				}
			}
		});
	});
	/*end of delete required tfo*/

	//second try update

	$('#edit-form-req').on('submit', function(e) {
		e.preventDefault();
		var table = $('#requirement-list');	
		var inputs = $(this).serialize();        
		$.post(baseurl + 'reference/api/tfo/update_requirements', inputs, function(result) {
			if(result.error === 0) {
				show_message($('.owner-message'), result.message, 'Success!', 'success');
				table.load( baseurl + "reference #requirement-list").on('click', 'a.editreq', function(e) {
			e.preventDefault();
			var data = $(this).data();
			var modal = $('#edit-requirement');
			modal.modal('show');

			$.ajax({
				url: baseurl + 'reference/api/tfo/get_req_description/' + data.req_id,
				type: 'get',
				dataType: 'json',
				beforeSend: function() {
					modal.find('.loaders').hide().fadeIn();
				},
				success: function(result) {
					if(result.error === 0){
						modal.find('#edit-form-req').fadeIn(function() {
							modal.find('div.loader').fadeOut();

							var business = result.data;
							if(business.all == 1){
								var beh = 'Optional';
							}else{
								var beh = 'Applied to all';
							}
							modal.find('input[name="requirement_id"]').val(data.req_id);
							modal.find('input[name="description"]').val(business.description);
						});
					} else {
						show_message($('.owner-message'), result.message, 'Oops!', 'danger');
						//alert('wala');
					}
				}
			});

		});
				$('button.close-modal').trigger('click');
				
			} else {
				show_message($('.owner-message'), result.message, 'Oops!', 'danger');
			}
			$('#edit-business-details').find('button.close-modal').trigger('click');
		}, 'json');
	});

	/*EDIT SURCHARGE*/

	$('#surcharge-list tbody').on('click', 'a.edit_surcharge', function(e) {
			e.preventDefault();
			var data = $(this).data();
			var modal = $('#edit_surcharge');
			modal.modal('show');
		
			$.ajax({ 
				url: baseurl + 'reference/api/requirements/get_surcharge/' + data.surchargeid,
				type: 'get',
				dataType: 'json',
				beforeSend: function() {
					modal.find('.loaders').hide().fadeIn();
				},
				success: function(result) {
					if(result.error === 0){
						modal.find('#edit_form_surcharge').fadeIn(function() {
							modal.find('div.loader').fadeOut();

							var surcharge = result.data;
							if(surcharge.all == 1){
								var beh = 'Optional';
							}else{
								var beh = 'Applied to all';
							}
							modal.find('input[name="surcharge_id"]').val(data.surchargeid);
							modal.find('input[name="date_renew"]').val(surcharge.date_renew);
							modal.find('input[name="surcharge"]').val(surcharge.surcharge);
							modal.find('input[name="interest"]').val(surcharge.interest);
								//alert( data.surchargeid);
						});

					} else {
						show_message($('.owner-message'), result.message, 'Oops!', 'danger');
						//alert('wala');
					}
				}
			});

		});


	$('#edit_form_surcharge').on('submit', function(e) {
		e.preventDefault();
		var inputs = $(this).serialize();
		var table = $('#surcharge-list');	
		var data = $(this).data();		
		$.post(baseurl + 'reference/api/requirements/update_surcharge', inputs, function(result) {
			if(result.error === 0) {			
			show_message($('.owner-message'), result.message, 'Success!', 'success');	
					table.load( baseurl + "reference #surcharge-list").on("click", 'a.edit_surcharge',function(e){
						e.preventDefault();
			var data = $(this).data();
			var modal = $('#edit_surcharge');
			modal.modal('show');
		
			$.ajax({ 
				url: baseurl + 'reference/api/requirements/get_surcharge/' + data.surchargeid,
				type: 'get',
				dataType: 'json',
				baseurleforeSend: function() {
					modal.find('.loaders').hide().fadeIn();
				},
				success: function(result) {
					if(result.error === 0){
						modal.find('#edit_form_surcharge').fadeIn(function() {
							modal.find('div.loader').fadeOut();

							var surcharge = result.data;
							if(surcharge.all == 1){
								var beh = 'Optional';
							}else{
								var beh = 'Applied to all';
							}
							modal.find('input[name="surcharge_id"]').val(data.surchargeid);
							modal.find('input[name="date_renew"]').val(surcharge.date_renew);
							modal.find('input[name="surcharge"]').val(surcharge.surcharge);
							modal.find('input[name="interest"]').val(surcharge.interest);
								//alert( data.surchargeid);
						});

					} else {
						show_message($('.owner-message'), result.message, 'Oops!', 'danger');
						//alert('wala');
					}
				}
			});

					});
					$('button.close-modal').trigger('click');				
					//location.reload();
			} else {
				show_message($('.owner-message'), result.message, 'Oops!', 'danger');
			}
			$('#edit-business-details').find('button.close-modal').trigger('click');
		}, 'json');
	}); 

	$('#edit-form-tfo').on('submit', function(e) {
		e.preventDefault();
		var inputs = $(this).serialize(); 
		var table = $('#business-nature-list');	       
		$.post(baseurl + 'reference/api/tfo/update_tfo', inputs, function(result) {
			if(result.error === 0) {
				show_message($('.owner-message'), result.message, 'Success!', 'success');
				$('button.close-modal').trigger('click');
				table.load( baseurl + "reference #business-nature-list");
				//location.reload();
			} else {
				show_message($('.owner-message'), result.message, 'Oops!', 'danger');
			}
			$('#edit-business-details').find('button.close-modal').trigger('click');
		}, 'json');
	});

	
})(jQuery);