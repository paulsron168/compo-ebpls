(function($) {

	//get tfo amount
	$(".tfoid").on('change', function(e){
		var tfo_ID = $(this).val();
		// alert(tfo_ID);
		$.ajax({
			url: baseurl + 'reference/api/requirements/gettfo_amt/'+tfo_ID,
			type: 'get',
			
			dataType: 'json',
			success: function(data)
			{

				$('#value').val(data.data.amount);
			
			}

		})
	})

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
			//alert(inputs);

			$.post(baseurl + 'reference/api/requirements/save_nature', inputs, function(result){
				if (result.error === 0) {
					location.reload();
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
				//alert(result);
				if(result.error === 0){
					modal.find('.edit-nature-form').fadeIn(function() {
						modal.find('div.loader').fadeOut();

						var business = result.data;
						//alert(business.application_id);

						modal.find('select[name="application_id"]').val(business.application_id);
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


	/*---------------------------------------------
	 diane
	*/
	$('select[name="buss_nature_id"]').on('change',function(e){
			if($(this).val() == '0'){
				$('.new-bnature').show()
			} else { $('.new-bnature').hide() }
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
			form = $(this),
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
				form[0].reset();
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
console.log(inputs);
//alert('lagot oi');
		$.post(baseurl + 'reference/api/requirements/add_requirement', inputs, function(result) {
			if(result.error === 0) {
				location.reload();
				var id = $('#business-nature').find('a.add-new-requirements').data('natureid'),
					nature = $('#business-nature-list');

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
			url: baseurl + 'reference/api/requirements/get_business_nature/' + data.natureid + '/' + data.applid,
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
						modal.find('select[name="application_id"]').val(business.application_id);
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
						modal.find('select[name="application_id"]').val(business.application_id);
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

		if(value == 1) {			// Constant

			$('div.type').hide();
			options.find('.formula-form').hide('slow');
			options.find('.range-form').hide('slow');
			options.find('.range-formula-form').hide('slow');
			options.find('.range-meter-form').hide('slow');
			options.find('.tfo-value').show('slow');


		} else if(value == 2) {	// Formula

			$('.type').hide();
			options.find('.tfo-value').hide('slow');
			options.find('.range-form').hide('slow');
			options.find('.range-formula-form').hide('slow');
			options.find('.range-meter-form').hide('slow');
			options.find('.formula-form').show('slow');

		} else if(value == 3) {	// Range

			options.find('.formula-form').hide('slow');
			options.find('.tfo-value').hide('slow');
			options.find('.range-formula-form').hide('slow');
			options.find('.range-meter-form').hide('slow');
			$('.type').show();
			$('input:radio').change(function() {
				if ($(this).val() === '1') { //Range
					options.find('.range-formula-form').hide('slow');
					options.find('.range-meter-form').hide('slow');
					options.find('.range-form').show('slow');
					options.find('.range-meter-form').hide('slow');
				  options.find('.range-kg-form').hide('slow');
				  options.find('.range-liter-form').hide('slow');
				} else if ($(this).val() === '2') { //Formula
				  options.find('.range-formula-form').show('slow');
				  options.find('.range-form').hide('slow');
				  options.find('.range-meter-form').hide('slow');
				  options.find('.range-kg-form').hide('slow');
				 // options.find('.range-liter-form').hide('slow');
				}else if ($(this).val() === '4') { //Meter

				  options.find('.range-formula-form').hide('slow');
				  options.find('.range-form').hide('slow');
				  options.find('.range-meter-form').show('slow');
				  options.find('.range-kg-form').hide('slow');
				 // options.find('.range-liter-form').hide('slow');
				}else if ($(this).val() === '5') { //Kg

				  options.find('.range-formula-form').hide('slow');
				  options.find('.range-form').hide('slow');
				  options.find('.range-meter-form').hide('slow');
				  options.find('.range-kg-form').show('slow');
				 // options.find('.range-liter-form').hide('slow');
				}else if ($(this).val() === '6') { //Liter

				  options.find('.range-formula-form').hide('slow');
				  options.find('.range-form').hide('slow');
				  options.find('.range-meter-form').hide('slow');
				  options.find('.range-kg-form').hide('slow');
				  options.find('.range-lit-form').show('slow');
				}

			  });

		}
	});

	/* ------------------
	 * Show Range in List
	 * ------------------ */
	$('#required-tfo-list').on('click', 'p.show-range', function() {
		$(this).parent().find('.slide-range').slideToggle('slow');
	});

	/* --------------------
	 * Add Range by Formula
	 * ------------------ */

	var rangeCount2 = 0;
	$('#add_tfo .tfo-options').on('click', 'a.add-formula', function(e) {
		e.preventDefault();
		// alert('asdf'); return false;
		var min = $('input.minimum[type="text"]').val(),
			max = $('input.maximum[type="text"]').val(),
			base = $('input.base[type="text"]').val(),
			type= $('input.type[type="hidden"]').val(),
			formula = $('input.formulab[type="text"]').val(),
			e1 = $('input.excess1[type="text"]').val(),
			e2 = $('input.excess2[type="text"]').val(),
			valueadded = $('input.valueadded[type="text"]').val(),
			rangeForm = $('.range-formula-form'),
			range = rangeForm.find('.row.ranges-formula');

		console.log('min='+min+ ' base='+base+' type='+type+' formula='+formula);
			range.append('<div class="range">' +
							'<span class="badge">max = &#8369;' + currencyFormat(parseFloat(max)) + '</span>  ' +
							'<span class="badge">min = &#8369;' + currencyFormat(parseFloat(min)) + '</span>  ' +
							'<span class="badge"> e1 = &#8369;' + e1 + '</span> ' +
							'<span class="badge"> e2 = &#8369;' + e2 + '</span> ' +
							'<span class="badge"> valueadded = &#8369;' + valueadded + '</span> ' +
							'<span class="badge"> base = &#8369;' + base + '</span> = ' +
							'<span class="badge">' + formula + '</span> ' +
							'<span class="btn badge badge-primary remove-range-formula">&times;</span>' +
							'<input type="hidden" name="range[' + rangeCount2 + '][type]" value="' + type + '" />' +
							'<input type="hidden" name="range[' + rangeCount2 + '][max]" value="' + max + '" />' +
							'<input type="hidden" name="range[' + rangeCount2 + '][min]" value="' + min + '" />' +
							'<input type="hidden" name="range[' + rangeCount2 + '][e1]" value="' + e1 + '" />' +
							'<input type="hidden" name="range[' + rangeCount2 + '][e2]" value="' + e2 + '" />' +
							'<input type="hidden" name="range[' + rangeCount2 + '][valueadded]" value="' + valueadded + '" />' +
							'<input type="hidden" name="range[' + rangeCount2 + '][base]" value="' + base + '" />' +
							'<input type="hidden" name="range[' + rangeCount2 + '][formula]" value="' + formula + '" />' +
						'</div>');

			$('input.minimum').val('');
			$('input.maximum').val('');
			$('input.excess1').val('');
			$('input.excess2').val('');
			$('input.valueadded').val('');
			$('input.base').val('');
			$('input.formulab').val('');

			rangeCount2++;
	});

	var rangeCount2 = 0;
	$('#edit_tfo .tfo-options').on('click', 'a.add-formula', function(e) {
		e.preventDefault();
		//alert('asdf');
		var min = $('input#edminimum').val(),
			max = $('input#edmaximum').val(),
			base = $('input#edbase[type="text"]').val(),
			type= $('input#edtype[type="hidden"]').val(),
			formula = $('input#edformulab[type="text"]').val(),
			e1 = $('input#edexcess1[type="text"]').val(),
			e2 = $('input#edexcess2[type="text"]').val(),
			valueadded = $('input#edvalueadded[type="text"]').val(),
			rangeForm = $('.range-formula-form'),
			range = rangeForm.find('.row.ranges-formula');

		console.log('min='+min+ ' base='+base+' type='+type+' formula='+formula);
			range.append('<div class="range">' +
							'<span class="badge">max = &#8369;' + currencyFormat(parseFloat(max)) + '</span>  ' +
							'<span class="badge">min = &#8369;' + currencyFormat(parseFloat(min)) + '</span>  ' +
							'<span class="badge"> e1 = &#8369;' + e1 + '</span> ' +
							'<span class="badge"> e2 = &#8369;' + e2 + '</span> ' +
							'<span class="badge"> valueadded = &#8369;' + valueadded + '</span> ' +
							'<span class="badge"> base = &#8369;' + base + '</span> = ' +
							'<span class="badge">&#8369;' + formula + '</span> ' +
							'<span class="btn badge badge-primary remove-range-formula">&times;</span>' +
							'<input type="hidden" name="range[' + rangeCount2 + '][type]" value="' + type + '" />' +
							'<input type="hidden" name="range[' + rangeCount2 + '][max]" value="' + max + '" />' +
							'<input type="hidden" name="range[' + rangeCount2 + '][min]" value="' + min + '" />' +
							'<input type="hidden" name="range[' + rangeCount2 + '][e1]" value="' + e1 + '" />' +
							'<input type="hidden" name="range[' + rangeCount2 + '][e2]" value="' + e2 + '" />' +
							'<input type="hidden" name="range[' + rangeCount2 + '][valueadded]" value="' + valueadded + '" />' +
							'<input type="hidden" name="range[' + rangeCount2 + '][base]" value="' + base + '" />' +
							'<input type="hidden" name="range[' + rangeCount2 + '][formula]" value="' + formula + '" />' +
						'</div>');

			$('input.minimum').val('');
			$('input.maximum').val('');
			$('input.excess1').val('');
			$('input.excess2').val('');
			$('input.valueadded').val('');
			$('input.base').val('');
			$('input.formulab').val('');

			rangeCount2++;
	});

	/* --------------------
	 * Remove Range-Formula
	 * -------------------- */
	$('.tfo-options .range-formula-form').on('click', 'span.remove-range-formula', function(e) {
		e.preventDefault();
		$(this).parent().fadeOut(function() {
			this.remove();
			rangeCount2--;
		});
	});



	/* ----------
	 * Add Range
	 * ---------- */
	var rangeCount = 0;
	$('#add_tfo .tfo-options').on('click', 'a.add-range', function(e) {
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

	$('#edit_tfo').on('click', 'a.add-range', function(e) {
		e.preventDefault();
		// alert('asdf'); return false;
		var min = $('input#edmin[type="text"]').val(),
			max = $('input#edmax[type="text"]').val(),
			val = $('input#edval[type="text"]').val(),

			rangeForm = $('.range-form'),
			range = rangeForm.find('.row.ranges');

			range.append('<div class="range">' +
							'<span class="badge">&#8369;' + currencyFormat(parseFloat(min)) + '</span> - ' +
							'<span class="badge">&#8369;' + currencyFormat(parseFloat(max)) + '</span> = ' +
							'<span class="badge">&#8369;' + currencyFormat(parseFloat(val)) + '</span> ' +
							'<span class="btn badge badge-primary remove-range">&times;</span>' +
							'<input type="hidden" name="range[' + rangeCount + '][min]" value="' + min + '" />' +
							'<input type="hidden" name="range[' + rangeCount + '][max]" value="' + max + '" />' +
							'<input type="hidden" name="range[' + rangeCount + '][value]" value="' + val + '" />' +
						'</div>');

			$('input#edmin').val('');
			$('input#edmax').val('');
			$('input#edval').val('');


			rangeCount++;
	});

	var rangeCountGF = 0;
	$('.range-garbage-fee').on('click', 'a.add-garbage-fee', function(e) { console.log("naa");
		e.preventDefault();
		// alert('asdf'); return false;

		var min = $('input.mins[type="text"]').val(),
			max = $('input.maxs[type="text"]').val(),
			val = $('input.vals[type="text"]').val(),
			countGF = $('input.ids').val(),
			label = $('input.sub-descs').val(),
			rangeForm = $('.range-garbage-fee-form'),
			range = rangeForm.find('.row.garbage-fee');


		// if(parseFloat(min) >= parseFloat(max) || parseFloat(min) >= parseFloat(val) || parseFloat(max) >= parseFloat(val)
		// 	|| min == '' || max == '' || val == '') {

		// } else {
		// }
			range.append('<div class="range">' +
							'<span class="badge">&#8369;' + currencyFormat(parseFloat(min)) + '</span> - ' +
							'<span class="badge">&#8369;' + currencyFormat(parseFloat(max)) + '</span> = ' +
							'<span class="badge">&#8369;' + currencyFormat(parseFloat(val)) + '</span> ' +
							'<span class="btn badge badge-primary remove-range">&times;</span>' +
							'<input type="hidden" name="range[' + rangeCountGF + '][id]" value="' + countGF + '" />' +
							'<input type="hidden" name="range[' + rangeCountGF + '][label]" value="' + label + '" />' +
							'<input type="hidden" name="range[' + rangeCountGF + '][min]" value="' + min + '" />' +
							'<input type="hidden" name="range[' + rangeCountGF + '][max]" value="' + max + '" />' +
							'<input type="hidden" name="range[' + rangeCountGF + '][value]" value="' + val + '" />' +
						'</div>');

			$('input.mins').val('');
			$('input.maxs').val('');
			$('input.vals').val('');
			count-GF++
			rangeCountGF++;
	});

	/* ------------------------------------
	 * Getting sub-label for mayor's permit
	 * -----------------------------------*/

	$('#new-range select[name="classification"]').on('click',function (e){
	var s = $(this).val(); console.log(s);
		if(s!="0"  && s!=0){
			var class_selected = $("select[name='classification'] option:selected").text();
			console.log(class_selected);
			$('div #new-range input.sub-desc').val(class_selected);
		}
	});

	/* ------------------------------------
	 * Getting sub-label for garbage fee
	 * -----------------------------------*/

	$('#new-garbage_fee select[name="classification"]').on('click',function (e){
	var s = $(this).val(); console.log(s);
		if(s!="0"  && s!=0){
			var class_selected = $("select[name='classification'] option:selected").text();
			console.log(class_selected);
			$('div #new-garbage_fee input.sub-descs').val(class_selected);
		}
	});



	/* -------------------------------------------------
	 * Saving New Mayor's Permit from Mayor's Permit tab
	 * ------------------------------------------------- */
	$('.add-ranges-form').on('submit', function(e) {
		e.preventDefault();
		var inputs = $(this).serialize(),
			form = $(this);

	$.post(baseurl + 'reference/api/tfo/add_ranges', inputs, function(result) {
			console.log(result);
			if(result.error === 0) {
				form[0].reset();
				$('button.close-modal').trigger('click');
				$.getJSON(baseurl + 'reference/api/tfo/get_ranges', function(response) {
					if(response.error === 0) {
						$('table #range-list tbody').refreshRange(response.data);
					} else {

					}
				});
			} else {
				alert('failed');
			}
		}, 'json');
	});


	/* -------------------------------------
	 * Saving New Garbage Fee from Garbage Fee tab
	 * ------------------------------------- */
	$('.add-garbage-fee-form').on('submit', function(e) {
		e.preventDefault();
		var inputs = $(this).serialize(),
			form = $(this);

	$.post(baseurl + 'reference/api/tfo/add_garbage_fee', inputs, function(result) {
			console.log(result);
			if(result.error === 0) {
				form[0].reset();
				$('button.close-modal').trigger('click');
				$.getJSON(baseurl + 'reference/api/tfo/get_garbage_fee', function(response) {
					if(response.error === 0) {
						$('table #range-list tbody').refreshRange(response.data);
					} else {

					}
				});
			} else {
				alert('failed');
			}
		}, 'json');
	});

	$('#range').on('click', '.editsubrange', function(e) {
		var modal = $('#new-range'),data = $(this).data();
			modal.modal('show');

			modal.find('select[name="classification"]').val(data.classification);
			modal.find('input[name="description"]').val(data.description);
			modal.find('input[name="sub-desc"]').val(data.label);
			modal.find('.minimums').val(data.min);
			modal.find('.maximums').val(data.max);
			modal.find('.value').val(data.equivalent);
			modal.find('select[name="business_nature"]').val(data.clas);
			modal.find('input[name="rid"]').val((data.rid));
			modal.find('input[name="id"]').val((data.req_id));
	});

	/*edit garbage range*/
	$('#garbage_fee').on('click', '.editgarbagerange', function(e) {
		var modal = $('#new-garbage_fee'),data = $(this).data();
			modal.modal('show');

			modal.find('select[name="classification"]').val(data.classification);
			modal.find('input[name="description"]').val(data.description);
			modal.find('input[name="sub-desc"]').val(data.label);
			modal.find('.mins').val(data.min);
			modal.find('.maxs').val(data.max);
			modal.find('.vals').val(data.equivalent);
			modal.find('select[name="business_nature"]').val(data.clas);
			modal.find('input[name="gid"]').val((data.rid));
			modal.find('input[name="id"]').val((data.req_id));
	});

	/*---------------------
	*Add Range in Range tab
	*---------------------*/
	var rangesCount = 0;
	$('.range-options2').on('click', 'a.add-range2', function(e) {
		e.preventDefault();

		var label = $('input.sub-desc').val();
			minimum = $('input.minimums').val(),
			maximum = $('input.maximums').val(),
			value = $('input.value').val(),
			count = $('input.id').val(),
			rangeForm = $('.range-form2'),
			range = rangeForm.find('.row.ranges2');
			console.log(maximum+minimum+value);
			console.log('pataka lng kag kuha :P');
		// if(parseFloat(min) >= parseFloat(max) || parseFloat(min) >= parseFloat(val) || parseFloat(max) >= parseFloat(val)
		// 	|| min == '' || max == '' || val == '') {

		// } else {
		// }
			range.append('<div class="range">' +
							'<span>' + label + '</span> - ' +
							'<span class="badge">&#8369;' + currencyFormat(parseFloat(minimum)) + '</span> - ' +
							'<span class="badge">&#8369;' + currencyFormat(parseFloat(maximum)) + '</span> = ' +
							'<span class="badge">&#8369;' + currencyFormat(parseFloat(value)) + '</span> ' +
							'<span class="btn badge badge-primary remove-range2">&times;</span>' +
							'<input type="hidden" name="value[' + rangesCount + '][id]" value="' + (count) + '" />' +
							'<input type="hidden" name="value[' + rangesCount + '][label]" value="' + label + '" />' +
							'<input type="hidden" name="value[' + rangesCount + '][min]" value="' + minimum + '" />' +
							'<input type="hidden" name="value[' + rangesCount + '][max]" value="' + maximum + '" />' +
							'<input type="hidden" name="value[' + rangesCount + '][value]" value="' + value + '" />' +
						'</div>');

			label = $('input.sub-desc').val(label);
			minimum = $('input.minimums').val(''),
			maximum = $('input.maximums').val(''),
			value = $('input.value').val('')
			count++;
			rangesCount++;
	});

    $('.range-options2 .range-form2').on('click', 'span.remove-range2', function(e) {
		e.preventDefault();
		$(this).parent().fadeOut(function() {
			this.remove();
			rangesCount--;
		});
	});

	/* ----------
	 * Add Meter
	 * ---------- */
	var rangeCount3 = 0;
	$('#add_tfo .tfo-options').on('click', 'a.add-meter', function(e) {
		e.preventDefault();

		var min = $('input#metmin[type="text"]').val(),
			max = $('input#metmax[type="text"]').val(),
			val = $('input#metval[type="text"]').val(),
			type = $('input#mettype[type="hidden"]').val(),

			rangeForm = $('.range-meter-form'),
			range = rangeForm.find('.meter');

			range.append('<div class="range">' +
							'<span class="badge">' + currencyFormat(parseFloat(min)) + ' meter </span> - ' +
							'<span class="badge">' + currencyFormat(parseFloat(max)) + ' meter </span> = ' +
							'<span class="badge">&#8369;' + currencyFormat(parseFloat(val)) + '</span> ' +
							'<span class="btn badge badge-primary remove-range">&times;</span>' +
							'<input type="hidden" name="range[' + rangeCount3 + '][min]" value="' + min + '" />' +
							'<input type="hidden" name="range[' + rangeCount3 + '][max]" value="' + max + '" />' +
							'<input type="hidden" name="range[' + rangeCount3 + '][value]" value="' + val + '" />' +
						'</div>');

			$('input#metmin').val('');
			$('input#metmax').val('');
			$('input#metval').val('');

			rangeCount3++;
	});

	/* ----------
	 * Remove  Meter Range
	 * ---------- */
	$('.tfo-options .range-meter-form').on('click', 'span.remove-range', function(e) {
		e.preventDefault();
		$(this).parent().fadeOut(function() {
			this.remove();
			rangeCount3--;
		});
	});

	/* ----------
	 * Add Kg
	 * ---------- */
	var rangeCount4 = 0;
	$('#add_tfo .tfo-options').on('click', 'a.add-kg', function(e) {
		e.preventDefault();

		var min = $('input#kgmin[type="text"]').val(),
			max = $('input#kgmax[type="text"]').val(),
			val = $('input#kgval[type="text"]').val(),
			type = $('input#kgtype[type="hidden"]').val(),

			rangeForm = $('.range-kg-form'),
			range = rangeForm.find('.kg');

			range.append('<div class="range">' +
							'<span class="badge">' + currencyFormat(parseFloat(min)) + ' Kg/s </span> - ' +
							'<span class="badge">' + currencyFormat(parseFloat(max)) + ' Kg/s </span> = ' +
							'<span class="badge">&#8369;' + currencyFormat(parseFloat(val)) + '</span> ' +
							'<span class="btn badge badge-primary remove-range">&times;</span>' +
							'<input type="hidden" name="range[' + rangeCount4 + '][min]" value="' + min + '" />' +
							'<input type="hidden" name="range[' + rangeCount4 + '][max]" value="' + max + '" />' +
							'<input type="hidden" name="range[' + rangeCount4 + '][value]" value="' + val + '" />' +
						'</div>');

			$('input#kgmin').val('');
			$('input#kgmax').val('');
			$('input#kgval').val('');

			rangeCount4++;
	});

	/* ----------
	 * Remove  Kg Range
	 * ---------- */
	$('.tfo-options .range-kg-form').on('click', 'span.remove-range', function(e) {
		e.preventDefault();
		$(this).parent().fadeOut(function() {
			this.remove();
			rangeCount4--;
		});
	});

	/* ----------
	 * Add Liter
	 * ---------- */
	var rangeCount5 = 0;
	$('#add_tfo .tfo-options').on('click', 'a.add-lit', function(e) {
		e.preventDefault();

		var min = $('input#litmin[type="text"]').val(),
			max = $('input#litmax[type="text"]').val(),
			val = $('input#litval[type="text"]').val(),
			type = $('input#llittype[type="hidden"]').val(),

			rangeForm = $('.range-lit-form'),
			range = rangeForm.find('.lit');

			range.append('<div class="range">' +
							'<span class="badge">' + currencyFormat(parseFloat(min)) + ' L/s </span> - ' +
							'<span class="badge">' + currencyFormat(parseFloat(max)) + ' L/s </span> = ' +
							'<span class="badge">&#8369;' + currencyFormat(parseFloat(val)) + '</span> ' +
							'<span class="btn badge badge-primary remove-range">&times;</span>' +
							'<input type="hidden" name="range[' + rangeCount5 + '][min]" value="' + min + '" />' +
							'<input type="hidden" name="range[' + rangeCount5 + '][max]" value="' + max + '" />' +
							'<input type="hidden" name="range[' + rangeCount5 + '][value]" value="' + val + '" />' +
						'</div>');

			$('input#litmin').val('');
			$('input#litmax').val('');
			$('input#litval').val('');

			rangeCount5++;
	});


	/* ----------
	 * Add tfo-options
	 * ---------- */
	var rangeCount6 = 0;
	$('#add_tfo .tfo-options').on('click', 'a.add-ton', function(e) {
		e.preventDefault();

		var min = $('input#tonmin[type="text"]').val(),
			max = $('input#tonmax[type="text"]').val(),
			val = $('input#tonval[type="text"]').val(),
			type = $('input#tontype[type="hidden"]').val(),

			rangeForm = $('.range-ton-form'),
			range = rangeForm.find('.ton');

			range.append('<div class="range">' +
							'<span class="badge">' + currencyFormat(parseFloat(min)) + ' Tons/s </span> - ' +
							'<span class="badge">' + currencyFormat(parseFloat(max)) + ' Tons/s </span> = ' +
							'<span class="badge">&#8369;' + currencyFormat(parseFloat(val)) + '</span> ' +
							'<span class="btn badge badge-primary remove-range">&times;</span>' +
							'<input type="hidden" name="range[' + rangeCount6 + '][min]" value="' + min + '" />' +
							'<input type="hidden" name="range[' + rangeCount6 + '][max]" value="' + max + '" />' +
							'<input type="hidden" name="range[' + rangeCount6 + '][value]" value="' + val + '" />' +
						'</div>');

			$('input#tonmin').val('');
			$('input#tonmax').val('');
			$('input#tonval').val('');

			rangeCount6++;
	});
	/* ----------------
	 * Remove  Kg Range
	 * ---------------- */
	$('.tfo-options .range-lit-form').on('click', 'span.remove-range', function(e) {
		e.preventDefault();
		$(this).parent().fadeOut(function() {
			this.remove();
			rangeCount5--;
		});
	});

	$('#edit_tfo').on('click', 'a.add-hectare', function(e) {
		e.preventDefault();
		var min = $('input#edhecmin[type="text"]').val(),
			max = $('input#edhecmax[type="text"]').val(),
			val = $('input#edhecval[type="text"]').val(),
			type = $('input#edhectype[type="hidden"]').val(),

			rangeForm = $('.range-hectare-form'),
			range = rangeForm.find('.hectare');

			range.append('<div class="range">' +
							'<span class="badge">&#8369;' + currencyFormat(parseFloat(min)) + '</span> - ' +
							'<span class="badge">&#8369;' + currencyFormat(parseFloat(max)) + '</span> = ' +
							'<span class="badge">&#8369;' + currencyFormat(parseFloat(val)) + '</span> ' +
							'<span class="btn badge badge-primary remove-range">&times;</span>' +
							'<input type="hidden" name="range[' + rangeCount + '][type]" value="' + type + '" />' +
							'<input type="hidden" name="range[' + rangeCount + '][min]" value="' + min + '" />' +
							'<input type="hidden" name="range[' + rangeCount + '][max]" value="' + max + '" />' +
							'<input type="hidden" name="range[' + rangeCount + '][value]" value="' + val + '" />' +
						'</div>');

			$('input#edhecmin').val('');
			$('input#edhecmax').val('');
			$('input#edhecval').val('');


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

	$('#mayors_permit').on('click', '#add-range', function(e) {
		$('#new-range').modal('show');
	});

	$('#garbage_fee').on('click', '#add-garbage_fee', function(e) {console.log("hi");
		$('#new-garbage_fee').modal('show');
	});

	$('#range').on('click','#add-range-buss-nature', function (e) {
		var modal = $('#new-range'),data = $(this).data();
			modal.modal('show');

			modal.find('select[name="classification"]').val(data.classification);
			modal.find('input[name="description"]').val(data.description);
			modal.find('input[name="sub-desc"]').val(data.label);
			modal.find('input[name="id"]').val((data.last_class_id + 1));
			modal.find('input[name="rid"]').val((data.rid));
			modal.find('select[name="business_nature"]').val(data.clas);
	});

	//TRy edit subrange
	$('#mayors_permit').on('click', '.editsubrange', function(e) {
		var modal = $('#new-range'),data = $(this).data();
			modal.modal('show');
			console.log(data.classification);
			//console.log(data.description);
			console.log(data.label);
			console.log(data.min);
			console.log(data.max);
			console.log(data.equivalent);
			modal.find('select[name="classification"]').val(data.classification);
			//modal.find('input[name="description"]').val(data.description);
			modal.find('input[name="sub-desc"]').val(data.label);
			modal.find('.minimums').val(data.min);
			modal.find('.maximums').val(data.max);
			modal.find('.value').val(data.equivalent);
			modal.find('select[name="business_nature"]').val(data.clas);
			modal.find('input[name="rid"]').val((data.rid));
			modal.find('input[name="id"]').val((data.req_id));
	});
	/* -----------------------------------------------
	 * Show Form for adding new requirements
	 * ----------------------------------------------- */
	$('#business-nature').on('click', 'a.add-new-requirements', function(e) {
		e.preventDefault();
		var id = $(this).data('natureid'),
			appid = $(this).data('appid'),
			list = $('.requirement-list');
		$('#new-requirement').find('form input[name="buss_nature_id"]').val(id);
		$('#new-requirement').find('form input[name="application_id"]').val(appid);
		list.add_requirements({ id: id, appid: appid });
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
			id: '',
			appid: ''
		}, o = $.extend(defaults, option);
		return this.each(function() {
			var list = $(this);
			list.html('');

			$.getJSON(baseurl + 'reference/api/requirements/get_requirements/' + o.id + '/' + o.appid, function(response) {
				if(response.error === 0 && response.data.all_requirements!='') {
					$('div.check-all').show();
					$('div.modal-footer').show();
					$('div.no-reqt').find('p.msg').text('');
						for(col in array_chunk(response.data.all_requirements)) {
							var data = response.data.all_requirements[col].req,
								cols = $('<div />', { 'class': 'col-sm-8' }).appendTo(list),
								label = '';
						//alert(response.data.all_requirements[0].req);
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
		//alert('me');
		var id = $(this).data('natureid');

		$('#add_tfo').find('input[name="buss_nature_id"]').val(id);
		$('#add_tfo').find('select[name="tfo_id"]').val(0);
		$('#add_tfo').find('select[name="application_id"]').val($(this).data('application_id'));
		$('#add_tfo').find('input[name="application_id"]').val($(this).data('application_id'));
		$('#add_tfo').find('select[name="type"]').val('');
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

		$('#popup-notification').find('.modal-title').text('Delete a Requirement');
		$('#popup-notification').find('img.notif').attr('src', baseurl + 'assets/img/icon-warning.gif');
		$('#popup-notification').find('h4.message-header').text('You are about to delete a record from the database.');
		$('#popup-notification').find('p.message-body').text('Are you sure you want to remove this REQUIREMENT data?');
		$('#popup-notification').find('input[name="field"]').val(data.req_id);
		$('#popup-notification').find('input[name="type"]').val(data.req_id);

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
		//alert('nature_id='+nature_id);
	//alert('delete daw ?');
	//alert(req_id);
		$.ajax({
			url: baseurl + 'reference/api/requirements/remove_req_gen/' + req_id,
			type: 'get',
			dataType: 'json',
			beforeSend: function() {
				$('#popup-notification').find('img.loader').hide().fadeIn();
			},
			success: function(result) {
				if(result.error === 0) {
					//location.reload();
					$.getJSON(baseurl + 'reference/api/requirements/get_all_reqts' , function(result) {
						if(result.error === 0) {
							$('#requirement-list tbody').refreshList({
							//$('#business-nature-list').refreshRequirements({
								table: '#requirements-list',
								data: result.data,
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

		$('#popup-notification').on('click','.actions a',function(){
			$.ajax({
				url: baseurl + 'reference/api/requirements/remove/' + req_id,
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
		var idd = $('#ambot').val();
		var app_id = $('#ambot2').val();
			
		$.post(baseurl + 'reference/api/tfo/add_tfo', inputs, function(result) {
			
			if(result.error === 0) {
				// location.reload();
				
				form[0].reset();
				$('button.close-modal').trigger('click');

				$.getJSON(baseurl + 'reference/api/requirements/get_required_tfo/' + idd +'/' +app_id, function(response) {

					if(response.error === 0) {
						var table = $('#required-tfo-list');
						
									nature.refreshTFOList({
										table: table,
										data: response.data,
										natureid: idd,
										app_id : app_id
									});
						console.log(response.data);
					} else {

					}
				});
			
			} else {
				//alert('failed');
			}
		}, 'json');
	});

	/* ------------------------------
	 * Updating  Required TFO
	 * ------------------------------ */

	$('#edit_required_tfo_form').on('submit', function(e) {
		e.preventDefault();
		var inputs = $(this).serialize();
		//alert(inputs);
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


	/* ---------------------------------------
	 * View Required TFO by Nature of Business
	 * --------------------------------------- */
	$('#business-nature-list tbody').on('click', 'a.required-tfos', function(e) {
		e.preventDefault();

		var id = $(this).data('natureid'),app_id= $(this).data('appid');
			nature = $('#business-nature-list');
		$.getJSON(baseurl + "reference/api/requirements/get_required_tfo/" + id +'/' +app_id, function(result) {
			//$.getJSON(baseurl + 'reference/api/requirements/get_required_tfo/' + id, function(result) {
			var table = $('#required-tfo-list');

			nature.refreshTFOList({
				table: table,
				data: result.data,
				natureid: id,
				app_id : app_id
			});

		});
	});

	/* ---------------------------------------
	 * View Requirements by Nature of Business
	 * --------------------------------------- */
	$('#business-nature-list tbody').on('click', 'a.requirements', function(e) {
		e.preventDefault();
		var id = $(this).data('natureid'),
		 	application_id = $(this).data('appid'),
			nature = $('#business-nature-list');

		$.getJSON(baseurl + 'reference/api/requirements/get_requirements/' + id+'/'+application_id, function(result) {
			var collection = null;
			if(result.data != undefined) {
				collection = result.data.reqt.requirements;
			} console.log(collection);
			//alert(collection[0].nature);
			nature.refreshRequirements({
				table: '#requirements-list',
				data: collection,
				natureid: id,
				appid: application_id,
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
			buttonLabl: 'Add New Business Nature'
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

			for(i in o.data) { //alert(req.id);
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

	/*---------------------------------------
	 *edit subrange
	 ----------------------------------------*/
	 $('#business-nature').on('click', '.editsubrange', function(e) {
	 	e.preventDefault();
		var modal = $('#edit_tfo'),
		data = $(this).data();
		modal.modal('show');
		var i =0;

			$.ajax({
			url: baseurl + 'reference/api/tfo/get_required_tfo_by_nature/' + data.tfoid+'/'+data.natureid,
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
							options.find('.range-formula-form').hide('slow');
							options.find('.range-hectare-form').hide('slow');
							modal.find('select[name="application_id"]').val(data.appid);
							modal.find('input[name="buss_nature_id"]').val(required_tfo.buss_nature_id);
							modal.find('input[name="req_tfo_id"]').val(required_tfo.req_tfo_id);
							modal.find('select[name="type"]').val(required_tfo.behavior);
							modal.find('input[name="formula"]').val(required_tfo.value);
							modal.find('select[name="tfo_id"]').val(required_tfo.tfo_id);

						} else if(required_tfo.behavior == 2){ //Constant
							//alert(required_tfo.app_type);
							options = $('.tfo-options');
							options.find('.tfo-value').show('slow');
							options.find('.range-form').hide('slow');
							options.find('.formula-form').hide('slow');
							options.find('.range-formula-form').hide('slow');
							options.find('.range-hectare-form').hide('slow');
							modal.find('select[name="application_id"]').val(data.appid);
							modal.find('input[name="buss_nature_id"]').val(required_tfo.buss_nature_id);
							modal.find('input[name="req_tfo_id"]').val(required_tfo.req_tfo_id);
							modal.find('select[name="type"]').val(required_tfo.behavior);
							modal.find('input[name="value"]').val(required_tfo.value);
							modal.find('select[name="tfo_id"]').val(required_tfo.tfo_id);



						} else  if(required_tfo.behavior == 3){ //Range
							values = $.parseJSON(required_tfo.value);
						    options = $('.tfo-options');
							var u=0;

							for(i=0; i<values.length; i++){
								if(values[i].id == data.req_id){
									if(values[i].type == "formula"){
										//alert('formula exist');
										options.find('.tfo-value').hide('slow');
										options.find('.range-form').hide('slow');
										options.find('.range-formula-form').show('slow');
										options.find('.range-hectare-form').hide('slow');
										modal.find('select[name="application_id"]').val(required_tfo.application_id);
										modal.find('input[name="buss_nature_id"]').val(required_tfo.buss_nature_id);
										modal.find('input[name="req_tfo_id"]').val(required_tfo.req_tfo_id);
										modal.find('select[name="type"]').val(required_tfo.behavior);
										modal.find('select[name="tfo_id"]').val(required_tfo.tfo_id);
										var min = parseFloat(values[i].min),
										max = parseFloat(values[i].max),
										e1 = parseFloat(values[i].e1),
										e2 = parseFloat(values[i].e2),
										valueadded = parseFloat(values[i].valueadded),
										base = parseFloat(values[i].base),
										formula = String(values[i].formula);
										modal.find('input#edmaximum').val(max);
										modal.find('input#edminimum').val(min);
										modal.find('input#edexcess1').val(e1);
										modal.find('input#edexcess2').val(e2);
										modal.find('input#edvalueadded').val(valueadded);
										modal.find('input#edbase').val(base);
										modal.find('input#edformulab').val(formula);
										modal.find('input[name="id"]').val((data.req_id));
									}else if(values[i].type == "hectare"){

										options.find('.tfo-value').hide('slow');
										options.find('.range-form').hide('slow');
										options.find('.range-formula-form').hide('slow');
										options.find('.range-hectare-form').show('slow');
										//$('.type').show();
										//modal.find('input[name="chosentype"]').attr('checked',true);
										modal.find('select[name="application_id"]').val(required_tfo.application_id);
										modal.find('input[name="buss_nature_id"]').val(required_tfo.buss_nature_id);
										modal.find('input[name="req_tfo_id"]').val(required_tfo.req_tfo_id);
										modal.find('select[name="type"]').val(required_tfo.behavior);
										modal.find('select[name="tfo_id"]').val(required_tfo.tfo_id);

										var min = parseFloat(values[i].min),
										max = parseFloat(values[i].max),
										value = parseFloat(values[i].value);
										modal.find('input#edhecmin').val(min);
										modal.find('input#edhecmax').val(max);
										modal.find('input#edhecval').val(value);
										modal.find('input[name="id"]').val((data.req_id));
									}
									else{

										options.find('.tfo-value').hide('slow');
										options.find('.range-form').show('slow');
										options.find('.range-formula-form').hide('slow');
										options.find('.range-hectare-form').hide('slow');
										modal.find('select[name="application_id"]').val(required_tfo.application_id);
										modal.find('input[name="buss_nature_id"]').val(required_tfo.buss_nature_id);
										modal.find('input[name="req_tfo_id"]').val(required_tfo.req_tfo_id);
										modal.find('select[name="type"]').val(required_tfo.behavior);
										modal.find('select[name="tfo_id"]').val(required_tfo.tfo_id);

										// alert(values[i].min);
										var min = parseFloat(values[i].min),
										max = parseFloat(values[i].max),
										value = parseFloat(values[i].value);
										//$('.type').show();
										//modal.find('input[name="chosentype"]').attr('checked',true);
										modal.find('input#edmin').val(min);
										modal.find('input#edmax').val(max);
										modal.find('input#edval').val(value);
										modal.find('input[name="id"]').val((data.req_id));
									}
								}
							}
							//alert('min = ' +min);alert('max ='+max);

						}
					});
				} else {
					show_message($('.owner-message'), result.message, 'Oops!', 'danger');
					//alert('wala');
				}
			}
		});
	});

	/* ---------------------------------------
	 * Plugin to refresh the TFO List Version 2
	 * --------------------------------------- */
	$.fn.refreshTFOList = function(option) {
		var defaults = {
			table: '',
			data: null,
			natureid: null,
			app_id: null
		}, o = $.extend(defaults, option);

		return this.each(function() {
			$(this).fadeOut(function() {
				$(o.table).hide().fadeIn(function() {
					var list = o.table.find('tbody'),
						button = $('ul.business-nature');

						// Change the buttons for adding requirements
						button.html('');
						$('<li />', { html: '<a href="#" class="btn btn-sm btn-outline btn-default back-to-nature">' +
									'<i class="fa fa-plus-circle"></i> Back' +
								'</a>' +
								' <a data-application_id = "'+o.app_id+'" data-natureid="' + o.natureid + '" href="#" class="btn btn-outline btn-sm btn-primary add-new-required-tfo">' +
									'<i class="fa fa-plus-circle"></i> New Required TFO' +
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
								subtype = '';
							if(data.behavior == 1) {
								behavior = 'Constant Value';
								value = '<span class="pull-left">&#8369;</span><span class="pull-right label label-primary font-size:80%">' + currencyFormat(parseFloat(data.value)) + '</span>';
							} else if(data.behavior == 2) {
								behavior = 'Formula Type';
								value = '<span class="label label-info font-size:80%">' + data.value + '</span>';
							} else if(data.behavior == 3) {
								if(data.subtype == 4)  subtype ='m';
									else if(data.subtype == 5)  subtype = 'kg';
										else if(data.subtype == 6)  subtype ='l';
								behavior = 'Range Value';
								values = $.parseJSON(data.value); //mao ni ang value

								value = '<div class="range-list">' +
										'<p class="btn btn-xs btn-info show-range">Click to view Range <span class="caret"></span></p>' +
										'<div class="slide-range" style="display: none;">';
								if(data.subtype == 4 || data.subtype == 5 || data.subtype == 6){
									for(index in values) {

										value += '<span class="badge badge-default">&#8369;' + values[index].min +subtype+ '</span> - ';
										value += '<span class="badge badge-default">&#8369;' + values[index].max +subtype+ '</span> = ';
										value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].value)) + '</span>';
										value += '<span class="badge badge-default label-as-badge"><a href="#" data-tfoid="' + data.tfo_id + '" data-req_id="' + values[index].id +'" data-appid = "'+data.application_id+'" data-natureid="' + data.buss_nature_id + '" class="label-as-badge editsubrange"><i class="fa fa-edit"></i>Edit</a></span><br />';
									}
								}
								else { 

									for(index in values) {
										if(typeof values[index].formula == 'undefined'){
											value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].min)) + '</span> - ';
											value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].max)) + '</span> = ';
											value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].value)) + '</span>';
											value += '<span class="badge badge-default label-as-badge"><a href="#" data-tfoid="' + data.tfo_id + '" data-req_id="' + values[index].id +'" data-appid = "'+data.application_id+'" data-natureid="' + data.buss_nature_id + '" class="label-as-badge editsubrange"><i class="fa fa-edit"></i>Edit</a></span><br />';
										} else if( values[index].base == '0'){
											value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].min)) + '</span> - ';
											value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].max)) + '</span> = ';
											value += '<span class="badge badge-default">' + values[index].formula + '</span>';
											value += '<span class="badge badge-default label-as-badge"><a href="#" data-tfoid="' + data.tfo_id + '" data-req_id="' + values[index].id +'" data-appid = "'+data.application_id+'" data-natureid="' + data.buss_nature_id + '" class="label-as-badge editsubrange"><i class="fa fa-edit"></i>Edit</a></span><br />';
										} else if ( values[index].e2 !== '0'){
											value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].min)) + '</span>  ';
											value += '<span class="badge badge-default"> - </span>  ';
											value += '<span class="badge badge-default"> up</span> = ';
											value += '<span class="badge badge-default">' + values[index].formula + '</span>';
											value += '<span class="badge badge-default label-as-badge"><a href="#" data-tfoid="' + data.tfo_id + '" data-req_id="' + values[index].id +'" data-appid = "'+data.application_id+'" data-natureid="' + data.buss_nature_id + '" class="label-as-badge editsubrange"><i class="fa fa-edit"></i>Edit</a></span><br />';
										}
									}//end of for index
								}

								value += '</div></div>';
							}

							$('<td />', { text: parseInt(i) + 1 }).appendTo(tr);
							$('<td />', { text: capitalize(data.tfo) }).appendTo(tr);
							//$('<td />', { text: ''}).appendTo(tr);
							//$('<td />', { text: capitalize(data.app_type) }).appendTo(tr);
							$('<td />', { text: behavior }).appendTo(tr);
							// $('<td />', { text: capitalize(data.indicator) }).appendTo(tr);
							$('<td />', { html: value }).appendTo(tr);
								if (data.behavior == 3 ){ //alert('id'+data.tfo_id);
								$('<td />', {
									html: '<a href="#" data-natureid="' + data.buss_nature_id + '" data-tfoid="' + data.tfo_id + '" data-reqtfoid="' + data.req_tfo_id + '" data-appid = "'+data.application_id+'" data-behavior = "'+data.behavior+'" data-buss_nature_id = "'+data.buss_nature_id+'" class="btn btn-xs btn-info add-required-tfo"><i class="fa fa-plus"></i> Add</a>'
								}).appendTo(tr);
								} else {
								$('<td />', {
									html: '<a title = "Edit" href="#" data-natureid="' + data.buss_nature_id + '" data-tfoid="' + data.tfo_id + '" data-appid = "'+data.application_id+'" class="btn btn-xs btn-warning edit-required-tfo"><i class="fa fa-pencil"></i></a>'+
										  '<a title = "Delete" href="#" data-natureid="' + data.buss_nature_id + '" data-tfoid="' + data.tfo_id + '" data-appid = "'+data.application_id+'" class="btn btn-xs btn-danger delete-required-tfo"><i class="fa fa-trash"></i></a>'
								}).appendTo(tr);

							}
						}
					} else {
						var tr = $('<tr />').appendTo(list);
						$('<td />', { colspan: 7, text: 'No required tfo found for this nature of business.' }).appendTo(tr);
					}
				});
			});
		});
	};


	$('#required-tfo-list').on('click','a.add-required-tfo',function(e){
		var data   = $(this).data(),
			modal = $('#add_tfo');
			console.log('tfo-id = '+data.tfoid+ 'application-id='+data.appid+'behavior='+data.behavior);

		modal.modal('show');
		modal.find('input[name="req_tfo_id"]').val(data.reqtfoid);
		modal.find('input[name="buss_nature_id"]').val(data.buss_nature_id);
		modal.find('select[name="tfo_id"]').val(data.tfoid);
		modal.find('select[name="application_id"]').val(data.appid);
		modal.find('select[name="type"]').val(data.behavior);

		if(data.behavior == 1) {			// Constant


			$('div.type').hide();
			modal.find('.formula-form').hide('slow');
			modal.find('.range-form').hide('slow');
			modal.find('.range-formula-form').hide('slow');
			modal.find('.tfo-value').show('slow');

		} else if(data.behavior == 2) {	// Formula

			$('div.type').hide();
			modal.find('.tfo-value').hide('slow');
			modal.find('.range-form').hide('slow');
			modal.find('.range-formula-form').hide('slow');
			modal.find('.formula-form').show('slow');

		} else if(data.behavior == 3) {	// Range

			modal.find('.formula-form').hide('slow');
			modal.find('.tfo-value').hide('slow');
			modal.find('.range-formula-form').hide('slow');
			$('.type').show();
			$('input:radio').change(function() {

				if ($(this).val() === '1') { //Range
					modal.find('.range-formula-form').hide('slow');
					modal.find('.range-form').show('slow');
					modal.find('.range-hectare-form').hide('slow');
				} else if ( $(this).val() === '2' || $('input[name="chosentype"]').prop('checked')) { //Formula
					//alert('hello');
				  modal.find('.range-formula-form').show('slow');
				  modal.find('.range-form').hide('slow');
				  modal.find('.range-hectare-form').hide('slow');
				}else if ($(this).val() === '4') { //Meter
				  //alert('meter ni dae');
				  modal.find('.range-formula-form').hide('slow');
				  modal.find('.range-form').hide('slow');
				  modal.find('.range-meter-form').show('slow');
				  modal.find('.range-kg-form').hide('slow');
				  modal.find('.range-liter-form').hide('slow');
				}else if ($(this).val() === '5') { //Kg
				  //alert('kg ni dae');
				  modal.find('.range-formula-form').hide('slow');
				  modal.find('.range-form').hide('slow');
				  modal.find('.range-meter-form').hide('slow');
				  modal.find('.range-kg-form').show('slow');
				  modal.find('.range-liter-form').hide('slow');
				}else if ($(this).val() === '6') { //Liter
				 // alert('liter ni dae');
				  modal.find('.range-formula-form').hide('slow');
				  modal.find('.range-form').hide('slow');
				  modal.find('.range-meter-form').hide('slow');
				  modal.find('.range-kg-form').hide('slow');
				  modal.find('.range-liter-form').show('slow');
				}

			  });

		}


	});
	/* ---------------------------------------
	 * Plugin to refresh the Requirement List
	 * --------------------------------------- */
	$.fn.refreshRequirements = function(option) {
		var defaults = {
			table: '',
			data: null,
			natureid: null,
			appid: null,
		}, o = $.extend(defaults, option);

		return this.each(function() {
			var requirements = $(this),
				nature = '' ;
					//alert(o.data[0].nature);
			nature = ( typeof o.data[0] == 'undefined')  ? o.data[1].nature : o.data[0].nature;
			//alert(nature);
			requirements.fadeOut(function() {
				$(o.table).fadeIn(function() {
					var table = $(this).find('tbody'),
						button = $('ul.business-nature');

					// Change the buttons for adding requirements
					button.html('');
					$('.portlet-header').find('h3 span').text('Required Requirements For: ' + nature);
					$('<li />', { html: '<a href="#" class="btn btn-sm btn-default back">' +
								'<i class="fa fa-plus-circle"></i> Back' +
							'</a>' +
							' <a data-natureid="' + o.natureid + '" data-appid="' + o.appid + '" href="#" class="btn btn-sm btn-primary add-new-requirements">' +
								'<i class="ffa fa-plus-circle"></i> Add New Requirements' +
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
							  if(typeof data.description != 'undefined'){
								$('<td />', { text: data.description }).appendTo(tr);
								$('', { html: ''
									}).appendTo(tr);
							  } else {
								$('', { text: '' }).appendTo(tr);
								$('', { html: ''
									}).appendTo(tr);
							  }


						}
					} else {
						var tr = $('<tr />').appendTo(table);
						$('<td />', { colspan: 6, text: 'No requirements found in this nature of business.' }).appendTo(tr);
					}


				});
			});
		});
	}

	$('table.thistable tbody').on('click', 'tr td a.diane', function(e) {

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

						if(data.behavior == 1) {			// Formula
							$('.type').hide();
							modal.find('.tfo-value').hide('slow');
							modal.find('.range-form').hide('slow');
							modal.find('.range-formula-form').hide('slow');
							modal.find('.formula-form').show('slow');

						} else if(data.behavior == 2) {	// Constant
							$('div.type').hide();
							modal.find('.formula-form').hide('slow');
							modal.find('.range-form').hide('slow');
							modal.find('.range-formula-form').hide('slow');
							modal.find('.tfo-value').show('slow');

						} else if(data.behavior == 3) {	// Range

							modal.find('.formula-form').hide('slow');
							modal.find('.tfo-value').hide('slow');
							modal.find('.range-formula-form').hide('slow');
							$('.type').show();
							$('input:radio').change(function() {
								if ($(this).val() === '1') { //Range
									modal.find('.range-formula-form').hide('slow');
									modal.find('.range-form').show('slow');
									modal.find('.range-hectare-form').hide('slow');
								} else if ( $(this).val() === '2' || $('input[name="chosentype"]').prop('checked')) { //Formula

								  modal.find('.range-formula-form').show('slow');
								  modal.find('.range-form').hide('slow');
								  modal.find('.range-hectare-form').hide('slow');
								}
								else if ( $(this).val() === '3' || $('input[name="chosentype"]').prop('checked')) { //hectare

								  modal.find('.range-formula-form').hide('slow');
								  modal.find('.range-form').hide('slow');
								  modal.find('.range-hectare-form').show('slow');
								}

							  });
						}
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
			url: baseurl + 'reference/api/tfo/get_required_tfo_by_nature/' + data.tfoid + '/'+ data.natureid,
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
						if(required_tfo.behavior == 1){ //Constant
							//(required_tfo.req_tfo_id);
							options = $('.tfo-options');
							options.find('.tfo-value').show('slow');
							options.find('.range-form').hide('slow');
							options.find('.formula-form').hide('slow');
							options.find('.range-formula-form').hide('slow');
							options.find('.range-hectare-form').hide('slow');
							modal.find('select[name="application_id"]').val(data.appid);
							//modal.find('select[name="type"]').val(required_tfo.app_type);
							modal.find('input[name="buss_nature_id"]').val(required_tfo.buss_nature_id);
							modal.find('input[name="req_tfo_id"]').val(required_tfo.req_tfo_id);
							modal.find('select[name="type"]').val(required_tfo.behavior);
							modal.find('input[name="value"]').val(required_tfo.value);
							modal.find('select[name="tfo_id"]').val(required_tfo.tfo_id);



						} else if(required_tfo.behavior == 2){ //Formula

							options = $('.tfo-options');
							options.find('.tfo-value').hide('slow');
							options.find('.range-form').hide('slow');
							options.find('.formula-form').show('slow');
							options.find('.range-formula-form').hide('slow');
							options.find('.range-hectare-form').hide('slow');
							modal.find('select[name="application_id"]').val(data.appid);
							modal.find('input[name="buss_nature_id"]').val(required_tfo.buss_nature_id);
							modal.find('input[name="req_tfo_id"]').val(required_tfo.req_tfo_id);
							modal.find('select[name="type"]').val(required_tfo.behavior);
							modal.find('input[name="formula"]').val(required_tfo.value);
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
							modal.find('input[name="req_tfo_id"]').val(required_tfo.req_tfo_id);
							modal.find('select[name="type"]').val(required_tfo.behavior);
							modal.find('select[name="tfo_id"]').val(required_tfo.tfo_id);


							for(index in values){
								var min = prseFloat(values[index].min),
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

		$('#popup-notification').find('.modal-title').text('Delete a TFO');
		$('#popup-notification').find('img.notif').attr('src', baseurl + 'assets/img/icon-warning.gif');
		$('#popup-notification').find('h4.message-header').text('You are about to delete a record from the database.');
		$('#popup-notification').find('p.message-body').text('Are you sure you want to remove this TFO data?');
		$('#popup-notification').find('input[name="field"]').val(data.tfoid);
		$('#popup-notification').find('img.loader').fadeOut();
		$('#popup-notification').find('.actions a').text('Delete');
		$('#popup-notification').modal('show');


		$('#popup-notification').on('click','.actions a', function (e) {
			$.ajax({
			url: baseurl + 'reference/api/tfo/delete_required_tfo_by_nature/' + data.tfoid+'/'+data.natureid,
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
				// alert('wala');
				}
			}
		});
		})

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
				// show_message($('.owner-message'), result.message, 'Success!', 'success');
				// $('button.close-modal').trigger('click');
				table.load( baseurl + "reference #business-nature-list");
				//location.reload();
			} else {
				show_message($('.owner-message'), result.message, 'Oops!', 'danger');
			}
		
		}, 'json');
	});


		/*delete  tfo*/
	$('.tfo-list').on('click','.remove_tfo', function() {
		var modal = $('#edit_tfo'),data = $(this).data();

		$('#popup-notification').find('.modal-title').text('Delete a TFO');
		$('#popup-notification').find('img.notif').attr('src', baseurl + 'assets/img/icon-warning.gif');
		$('#popup-notification').find('h4.message-header').text('You are about to delete a record from the database.');
		$('#popup-notification').find('p.message-body').text('Are you sure you want to remove this TAX FEES AND OTHER CHARGES data?');
		$('#popup-notification').find('input[name="field"]').val(data.tfoid);
		$('#popup-notification').find('img.loader').fadeOut();
		$('#popup-notification').find('.actions a').text('Delete');
		$('#popup-notification').modal('show');


		$('#popup-notification').on('click','.actions a',function (){

			$.ajax({
				url: baseurl + 'reference/api/tfo/delete_tfo/' + data.tfoid,
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
						// alert('wala');
					}
				}
			});
		});

	});
	/*end of delete  tfo*/


		/*end of delete business nature*/
		$('.buss_nature').on('click','.remove_bussn', function() {
		var modal = $('#edit_tfo'),data = $(this).data();

		$('#popup-notification').find('.modal-title').text('Delete a Business Nature');
		$('#popup-notification').find('img.notif').attr('src', baseurl + 'assets/img/icon-warning.gif');
		$('#popup-notification').find('h4.message-header').text('You are about to delete a record from the database.');
		$('#popup-notification').find('p.message-body').text('Are you sure you want to remove this BUSINESS  NATURE data?');
		$('#popup-notification').find('input[name="field"]').val(data.natureid);
		$('#popup-notification').find('img.loader').fadeOut();
		$('#popup-notification').find('.actions a').text('Delete');
		$('#popup-notification').modal('show');

		$('#popup-notification').on('click','.actions a', function () {
			$.ajax({
				url: baseurl + 'reference/api/tfo/delete_business_nature/' + data.natureid,
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
					// alert('wala');
					}
				}
			});
		});

	});
	/*end of delete business nature*/

		/*end of delete business nature*/
		$('#surcharge-list').on('click','.remove_surcharge', function() {
		var modal = $('#edit_tfo'),data = $(this).data();

		$('#popup-notification').find('.modal-title').text('Delete a Interest/Surcharges');
		$('#popup-notification').find('img.notif').attr('src', baseurl + 'assets/img/icon-warning.gif');
		$('#popup-notification').find('h4.message-header').text('You are about to delete a record from the database.');
		$('#popup-notification').find('p.message-body').text('Are you sure you want to remove this SURCHARGE data?');
		$('#popup-notification').find('input[name="field"]').val(data.surchargeid);
		$('#popup-notification').find('img.loader').fadeOut();
		$('#popup-notification').find('.actions a').text('Delete');
		$('#popup-notification').modal('show');

		$('#popup-notification').on('click','.actions a' ,function (){
			$.ajax({
				url: baseurl + 'reference/api/tfo/delete_surcharges/' + data.surchargeid,
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
					// alert('wala');
					}
				}
			});
		});


	});
	/*end of delete business nature*/


	$('#business-nature').on('click','a.copy-tfo', function(e){
		//alert('pataka lng kag tuplok');
		var data = $(this).data();
		//Oops! null(data.natureid);
		$.ajax({
			url: baseurl + 'reference/api/tfo/copy_tfo/' + data.natureid,
			type: 'get',
			dataType: 'json',
			beforeSend: function() {
				//modal.find('.loaders').hide().fadeIn();
			},
			success: function(result) {
				if(result.error == 0){
					location.reload();
				}else {
					location.reload();
				}
			}
		});

	});

	/* ------------------------------
	 * Popup modal for adding new signage
	 * ------------------------------ */
	$('.add-signage').on('click', function(e) {
		e.preventDefault();
		var modal = $('#new-signage');
		modal.modal('show');
	});

})(jQuery);
