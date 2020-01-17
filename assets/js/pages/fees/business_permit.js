(function($) {
	
		var inputFile = $('input[name=file]');
		var uploadURI = $('#form-upload').attr('action');
		var add_total1 = 0;
	
	$(document).ready(function() {
	$( ".datepicker" ).datepicker({format:'dd/mm/yyyy'});
	});
	/* $(document).ready(function () {
			//$('.search-owner').focus();
			$('input:text:first:visible').focus();
	});	 */
	
		$('a:disabled').after(function (e) {
		d = $("<div>");
		i = $(this);
		d.css({
			height: i.outerHeight(),
			width: i.outerWidth(),
			position: "absolute",
		})
		d.css(i.offset());
		d.attr("title", i.attr("title"));
		d.tooltip();
		return d;
		});
		$('#new-application').on('shown.bs.modal', function () {
			$('#owner-search').focus();
		});
	
	
		$('a.close-modal').on('click', function(e) {
			e.preventDefault();
			$('button.close-modal').trigger('click');
		});
	
	
			/* commented on January 26,2015 by joAnn*/
		$('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
			var target = $(e.target).attr('href'),
				tabs = target.split('#');
	
			switch(tabs[1]) {
				/* case 'payment':
					var table = $(target).find('#business-payment tbody');
					$.getJSON(baseurl + 'fees/api/payment/approval_list', function(result) {
						if(result.error === 0) {
							table.html('');
							for(i in result.data) {
								var tr = $('<tr />').appendTo(table),
									details = result.data[i];
	
								$('<td />', { html: '<strong>'+details.permit_number+'</strong>' }).appendTo(tr);
								$('<td />', { text: capitalize(details.firstname + ' ' + details.middlename + ' ' + details.lastname) }).appendTo(tr);
								$('<td />', { text: capitalize(details.business_name) }).appendTo(tr);
								$('<td />', { text: details.assessment_date}).appendTo(tr);
								$('<td />', { text: capitalize(details.application_type) }).appendTo(tr);
								$('<td />', { text: capitalize(details.status) }).appendTo(tr);
								//$('<td />', { text: '<input type = "hidden" name="payment_id" value ="'+ details.payment_id+'">' }).appendTo(tr);
									if (details.status == "unpaid"){
										$('<td />', { 'class': 'text-center', html: '<a href="#"  class="btn btn-info btn-xs selectpayer" data-assessmentid="' + details.assessment_id + '" data-ownerid="' + details.owner_id + '" data-businessid="' + details.buss_id + '"><i class="fa fa-money"></i> Pay</a>' }).appendTo(tr);
									} else {
											$('<td />', { 'class': 'text-center', html: '<a href="#"  class="btn btn-info btn-xs selectpayer"  disabled="disabled"  data-assessmentid="' + details.assessment_id + '" data-ownerid="' + details.owner_id + '" data-businessid="' + details.buss_id + '"><i class="fa fa-money"></i> Pay</a>' }).appendTo(tr);
									}
	
							}
						} else {
							table.html('');
							var tr = $('<tr />').appendTo(table);
							$('<td />', { text: 'Currently have no pending assessments.', colspan: 7 }).appendTo(tr);
						}
					});
					break; */
				/* case 'releasing':
					var table = $(target).find('#for-releasing tbody');
					$.getJSON(baseurl + 'fees/api/releasing/get', function(result) {
						if(result.error === 0) {
							table.html('');
							for(i in result.data) {
								var tr = $('<tr />').appendTo(table),
									details = result.data[i];
	
								$('<td />', { text: details.permit_number }).appendTo(tr);
								$('<td />', { text: capitalize(details.firstname + ' ' + details.middlename + ' ' + details.lastname) }).appendTo(tr);
								$('<td />', { text: capitalize(details.business_name) }).appendTo(tr);
								//$('<td />', { html: '<a class="btn btn-info btn-xs btn-block print-permit" href="' + baseurl + 'fees/release/' + details.pay_id + '" target="_blank"><i class="fa fa-print"></i> Print Permit</a>' }).appendTo(tr); //pay_id has been changed to assess_id
								if (details.is_released == 'Y'){
								$('<td />', { html: '<a class="btn btn-danger btn-xs btn-block print-permit"  data-releasingid="' + details.releasing_id + '" href="' + baseurl + 'fees/release/' + details.pay_id + '"  target="_blank"><i class="fa fa-print"></i> Print Permit</a>' }).appendTo(tr);
								} else {
									$('<td />', { html: '<a class="btn btn-info btn-xs btn-block print-permit"  data-releasingid="' + details.releasing_id + '" href="' + baseurl + 'fees/release/' + details.pay_id + '" target="_blank"><i class="fa fa-print"></i> Print Permit</a>' }).appendTo(tr);
								}
							}
							// $(target).find('#for-releasing').initDataTables();
						} else {
							table.html('');
							var tr = $('<tr />').appendTo(table);
							$('<td />', { text: 'Currently have no pending assessments.', colspan: 7 }).appendTo(tr);
	
						}
					});
					break; */
			}
	
			$('.dataTables_filter input').prop ('placeholder', 'Search...');
		});
	
		// print permit click and updates status isrealease
	
		$('table#business-application tbody').on('click','a.print-permit',function (e){
		var data = $(this).data();
			$.ajax({
				url : baseurl + 'fees/api/releasing/permit_release/' + data.releasingid+'/'+data.payid,
				type : 'get',
				dataType: 'json',
				success : function (result){
					if (result.error == 0){
						console.log('Ok');
						location.reload();
					} else {
						console.log('Not Ok');
					}
				}
	
			});
		});

		$('table#business-application tbody').on('click','a.view_docu',function (e){
			var data = $(this).data();
				$.ajax({
					url : baseurl + 'fees/view_document/' + data.businessid,
					type : 'get',
					dataType: 'json',
					success : function (result){
						if (result.error == 0){
							console.log('Ok');
							location.reload();
						} else {
							console.log('Not Ok');
						}
					}
		
				});
			});

		$('table#business-application tbody').on('click','a.view_app',function (e){
				var data = $(this).data();
					$.ajax({
						url : baseurl + 'fees/view_application/' + data.businessid,
						type : 'get',
						dataType: 'json',
						success : function (result){
							if (result.error == 0){
								console.log('Ok');
								location.reload();
							} else {
								console.log('Not Ok');
							}
						}
			
				});
			});

		$('#for-releasing').on('click','a.print_temp',function (e){
			var data = $(this).data();
				$.ajax({
					url : baseurl + 'fees/api/releasing/permit_release/' + data.releasingid+'/'+data.payid,
					type : 'get',
					dataType: 'json',
					success : function (result){
						if (result.error == 0){
							console.log('Ok');
							location.reload();
						} else {
							console.log('Not Ok');
						}
					}
		
				});
			});
		// $('#for-releasing').on('click', 'a.print-permit', function(e) {
		// 	e.preventDefault();
		// 	$('#print-mayor-permit').modal('show');
		// });
	
		// setTimeout(function() {
		// 	$('#business-application').initDataTables();
		// }, 1000);
	
		/* --------------
		 * Search Plugin
		 * -------------- */
		$.fn.lookup = function(options) {
			var defaults = {
				input: 'input.business-search',
				type: 'owners',
				step: 'one'
			}, o = $.extend(defaults, options);
	
			return this.each(function() {
				var ul = $('.form.search').find('.' + o.type + '.search-results');
	
				$.ajax({
					url: baseurl + 'fees/api/owner/get/' + o.type + '/' + $(o.input).val(),
					type: 'get',
					dataType: 'json',
					beforeSend: function() {
						ul.html('');
						$('<li />', {
							html: '<small>Searching...</small>'
						}).appendTo(ul);
					},
					success: function(result) {
						if(result.error === 0) {
							var results = result.data;
	
							$('.form.search').show();
							ul.html('');
	
							for(i in results) {
								var dataID = (o.type == 'owners') ? results[i].owner_id : results[i].buss_id,txt;
									if(results[i].firstname == 'N/A'){
										txt = (o.type == 'owners') ? results[i].permitee : results[i].business_name; console.log(txt);
									} else { console.log('makalagot');
										txt = (o.type == 'owners') ? results[i].firstname + ' ' + results[i].middlename + ' ' + results[i].lastname + results[i].permitee : results[i].business_name;
									}
									 //txt = (o.type == 'owners') ? ( (results[i].firstname == 'N/A' || results[i].middlename == 'N/A' || results[i].lastname == 'N/A') ? results[i].permitee :  results[i].firstname + ' ' + results[i].middlename + ' ' + results[i].lastname) : results[i].business_name;
	
								$('<li />', {
									'class': 'relative',
									html: txt + '<a href="javascript:void(0);" data-txt="' + txt + '" data-id="' + dataID + '" class="btn btn-outline btn-primary btn-xs absolute pos-right pull-right attach">Attach ></a>'
								}).appendTo(ul);
							}
						} else {
							ul.html('');
							$('<li />', { text: result.message }).appendTo(ul);
						}
					}
				});
			});
		};
	
		/* -------------
		 * Attach Plugin
		 * ------------- */
		$.fn.attach = function(option, callback) {
			var defaults = {
				id: '',
				ownership_id: '',
				type: 'owners',
				step: 'one',
				next: 'two'
			}, o = $.extend(defaults, option);
	
			return this.each(function() {
				//var oid=0;
				var id = (o.id == '') ? $(this).data('id') : o.id,
					//oid = (o.ownership_id == '') ? $(this).data('ownership_id') : o.ownership_id,
					oid = (o.ownership_id == '') ? '0' : o.ownership_id,
					txt = $(this).data('txt'),
					element = $(this);
				//alert(oid);
				$.getJSON(baseurl + 'fees/api/owner/set/' + o.type + '/' + id, function(result) {
					if(result.error === 0) {
						$('.owner.step-' + o.step).fadeOut(function() {
							$('.owner.step-' + o.next).hide().fadeIn(function() {
								$.getJSON(baseurl + 'fees/api/owner/get_owner2/' + result.data.id, function(owners) {
									if(owners.error === 0) {
										$('form.step-' + o.next).find('.' + o.type + '-details p.field-values').text((owners.data.firstname === 'N/A') ? owners.data.permitee : owners.data.firstname + ' ' + owners.data.lastname);
										$('form.step-' + o.next).find('input[id="business-search"]').focus();
										$('form.step-' + o.next).find('input[id="oid"]').val(oid);
									} else {
										show_message($('form.step-' + o.step).find('.messages'), owners.message, 'Oops!', 'danger');
									}
								});
							});
						});
					} else {
						show_message($('form.step-' + o.step).find('.messages'), result.message, 'Oops!', 'danger');
					}
				});
	
				if(typeof callback == 'function') {
					callback.call();
				}
			});
		}
	
		/* ------------
		 * Div Toggles
		 * ------------ */
		$('#add-new-owner').on('click', function() {
			$('#owner-searches').fadeOut(function() {
	
				$('.ownership_type').show();
				$('select[name="ownership_id"]').on('change', function (e) {
					if ($(this).val() == 1){
							$('.president').fadeOut();
							$('#owner-form').fadeIn();
							$('.ownerinfo').fadeIn();
							$('.address').fadeIn()
					} else {
						$('.address').fadeOut()
						$('#owner-form').fadeOut();
						$('.president').fadeIn();
					}
				});
	
				/**set focus*/
				$(function(){
					$("#firstname").focus();
				});
				/** end of set focus*/
			});
		});
	
		$('select[name="brgy_id"]').on('change', function (e) {
	
			if ($(this).val() == 29){
				$('.no-barangay').fadeIn();
			}
		});
	
	
		$('input.owner-search').on('focus', function() {
			$('#owner-form').fadeOut(function() {
				$('#owner-searches').hide().fadeIn();
			});
		});
	
		$('#add-new-business').on('click', function() {
			$('#business-searches').fadeOut(function() {
				$('#business-form').hide().fadeIn();
				var oid = $('input[name="oid"]').val();
				/**set focus*/
				$(function(){
					$("#permit_number").focus();
					$('select[name="ownership_id"]').val(oid);;
				});
				/** end of set focus*/
			});
		});
	
		$('input.business-search').on('focus', function() {
			$('#business-form').fadeOut(function() {
				$('#business-searches').hide().fadeIn();
			});
		});
	
		/* -------------------------
		 * Step One
		 * Saving New Business Owner
		 * ------------------------- */
		$('form.step-one').on('submit', function(e) {
			e.preventDefault();
	
			var inputs = $(this).serialize(),
				form = $(this);
	
			$.ajax({
				url: baseurl + 'fees/api/owner/save_owner',
				type: 'post',
				dataType: 'json',
				data: inputs,
				beforeSend: function() {
	
				},
				success: function(result) {
					if(result.error === 0) {
						// $('.owner.step-one').fadeOut(function() {
						// 	$('.owner.step-two').hide().fadeIn();
						// });
	
						$(this).attach({
							id: result.data.owner_id,
							ownership_id:result.data.ownership_id,
							type: 'owner',
							step: 'one',
							next: 'two'
						});
					} else {
						show_message(form.find('.messages'), result.message, 'Oops!', 'danger');
					}
				}
			});
		});
	
	
		/**-----------------------------------
		tRY LNG GD
		*/
		$('form.step-two').on('change', '.brgy select[name="brgy_id"]', function(e) {
			var barangay =$(this).find('option:selected').text(),
				street_address = $(this).parent().parent().parent().find('input[name="street_address"]').val(barangay + 'Talisay City, Cebu');
				//street_address.val(barangay);
		 alert(barangay);
	
	
		});
		/* -----------------------------------
		 * Step Two
		 * Saving Owner's Business Information
		 * ----------------------------------- */
		$('form.step-two').on('submit', function(e) {
			e.preventDefault();
	
			var inputs = $(this).serialize(),
				form = $(this);
	//alert(inputs);
			$.post(baseurl + 'fees/api/owner/save_business', inputs, function(result) {
				if(result.error === 0) {
					$('.owner.step-two').fadeOut(function() {
						$('.owner.step-three').hide().fadeIn();
						//window.reload();
						$.getJSON(baseurl + 'fees/api/owner/session', function(sessions) {
					var sess = sessions.data;
	
					$.getJSON(baseurl + 'fees/api/owner/application/' + sess.owner_id + '/' + sess.buss_id, function(result) {
						if(result.error === 0) {
							var app = result.data;
	
							$('form.step-three').find('.owner-details p.field-values').text((app.firstname === 'N/A' ||  app.lastname === 'N/A') ? app.permitee : app.firstname + ' ' + app.middlename + ' ' + app.lastname);
							$('form.step-three').find('.business-details p.field-values').text(app.business_name + ' / ' + app.trade_name);
							$('form.step-three').find('input[name="application_id"]').val(app.application_id);
						} else {
							console.log(result);
						}
					});
				})
					});
				} else {
					show_message(form.find('.messages'), result.message, 'Oops!', 'danger');
				}
			}, 'json');
			return false;
		});
	
		/* -----------------------------------
		 * Step Three
		 * Saving Application Information
		 * ----------------------------------- */
		$('form.step-three').on('submit', function(e) {
			e.preventDefault();
	
			var inputs = $(this).serialize(),
				form = $(this);console.log(inputs);
	
			$.post(baseurl + 'fees/api/owner/save_application', inputs, function(result) {
				if(result.error === 0) {
					$('button.close-modal').trigger('click');
					location.reload();
				} else {
					show_message(form.find('.messages'), result.message, 'Oops!', 'danger');
				}
			}, 'json');
			return false;
		});
	
		/* ------------------------------
		 * Step One search button clicked
		 * ------------------------------ */
		$('#search-owner').on('click', function() {
			$(this).lookup({
				input: 'input.owner-search',
				type: 'owners',
				step: 'one'
			});
		});
	
		/* ------------------------------
		 * Step One attach clicked
		 * ------------------------------ */
		$('.form.search').find('.owners.search-results').on('click', 'li a.attach', function() {
			$(this).attach({
				type: 'owner',
				step: 'one',
				next: 'two'
			});
		});
	
		/* ------------------------------
		 * Step Two search button clicked
		 * ------------------------------ */
		$('#search-business').on('click', function() {
			$(this).lookup({
				input: 'input.business-search',
				type: 'businessess',
				id: 'buss',
				step: 'two'
			});
		});
	
		/* ------------------------------
		 * Step Two attach clicked
		 * ------------------------------ */
		$('.form.search').find('.businessess.search-results').on('click', 'li a.attach', function() { //alert('ana ko dre');
			$(this).attach({
				type: 'buss',
				step: 'two',
				next: 'three'
			}, function() {
				$.getJSON(baseurl + 'fees/api/owner/session', function(sessions) {
					var sess = sessions.data;
	
					$.getJSON(baseurl + 'fees/api/owner/application/' + sess.owner_id + '/' + sess.buss_id, function(result) {
						if(result.error === 0) {
							var app = result.data;
	
							$('form.step-three').find('.owner-details p.field-values').text((app.firstname === 'N/A' || app.middlename === 'N/A' || app.lastname === 'N/A') ? app.permitee : app.firstname + ' ' + app.middlename + ' ' + app.lastname);
							$('form.step-three').find('.business-details p.field-values').text(app.business_name + ' / ' + app.trade_name);
							$('form.step-three').find('input[name="application_id"]').val(app.application_id);
							$('form.step-three').find('input[name="buss_id"]').val(app.buss_id);
						} else {
							console.log(result);
						}
					});
				})
			});
		});
	
		/* -------------
		 * Do Assessment
		 * ------------- */
		$('#assess').on('click', 'button.assess-now', function(e) {
			e.preventDefault();
			var inputs = $('#assess').find('form.assessment').serialize();
	
			$.post(baseurl + 'fees/api/payment/assess_now', inputs, function(result) {
				if(result.error === 0) {
					$('#assess').find('.messages').append('<div class="alert alert-success fade in" style="margin: 20px;">' +
						'<a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>' +
						'<p><strong>Success!</strong> ' + result.message + '. Please go to Payment tab now.</p></div>');
					$('#assess').find('a.assess-now').attr('disabled', true);
						$('button.close-modal').trigger('click');
						
					
						//location.reload();
				} else {
	
				}
			}, 'json');
		});
	
	
		/* -------------
		 * Do Re-Assessment
		 * ------------- */
		$('#reassess').on('click', 'button.reassess-now', function(e) {
			e.preventDefault();
			var inputs = $('#reassess').find('form.re-assessment').serialize();
			//alert(inputs);
			$.post(baseurl + 'fees/api/payment/re_assess_now', inputs, function(result) {
				if(result.error === 0) {
					$('#assess').find('.messages').append('<div class="alert alert-success fade in" style="margin: 20px;">' +
						'<a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>' +
						'<p><strong>Success!</strong> ' + result.message + '</p></div>');
					$('#assess').find('button.assess-now').attr('disabled', true);
				} else {
	
				}
			}, 'json');
		});
	
		$('button.close-modal').on('click', function (e) {
			location.reload();
		});
	
		/* -------------
		 * Show Clear Assessment Requirements
		 * ------------- */
		$('#assess').on('click', 'a.clear-requirements', function(e) {
			e.preventDefault();
			var ID = $(this).data();
	
			popup(
				'Clear all Requirements',
				'This will clear out the owners requirements',
				'Are you sure you want to proceed?',
				{
					appID: ID.appId,
					natureID: ID.natureId
				},
				'Clear Now',
				'applications',
				'warning'
			);
		});
	
		$('#popup-notification').find('.actions a').on('click', function(e) {
			e.preventDefault();
			var appID = $('#popup-notification').find('input[name="appID"]').val(),
				natureID = $('#popup-notification').find('input[name="natureID"]').val(),
				type = $('#popup-notification').find('input[name="type"]').val();
	
			if(type == 'applications') {
				$.getJSON(baseurl + 'fees/api/owner/clear_requirements/' + natureID + '/' + appID, function(result) {
					console.info(result);
				});
			}
		});
	
		/* -------------------------------------------------------------
		 * Populate list of Requirements based on the Nature of Business
		 * ------------------------------------------------------------- */
		$('select.business-nature').on('change', function() {
			var natureID = $(this).val(),
				list = $('.requirement-list');
	
			if(!$(this).hasClass('from-table')) {
				list.requirements({ id: natureID });
			}
		});
	
		/* ----------------------------
		 * Show Owner Form for Editing
		 * ---------------------------- */
		$('table#business-application tbody').on('click', 'a.edit-owner', function(e) {
			e.preventDefault();
			var data = $(this).data(),
				modal = $('#edit-owner-details');
			modal.modal('show');
	console.log( data.businessid);
			$.ajax({
				url: baseurl + 'fees/api/owner/get_owner/' + data.ownerid + '/' +data.businessid,
				// alert(data.ownerid);
				type: 'get',
				dataType: 'json',
				beforeSend: function() {
					modal.find('.loaders').hide().fadeIn();
				},
				success: function(result) {
					// console.log(result.error);
					if(result.error === 0) {
						modal.find('.loaders').fadeOut(function() {
							var owner = result.data; console.log(owner.ownership_id)
						if (owner.ownership_id==1){
								$('.president').hide();
								$('#edit-owner-form').show();
								console.log(owner.o_subdivision);
								modal.find('input[name="owner_id"]').val(data.ownerid);
								modal.find('input[name="ownership_id"]').val(owner.ownership_id);
								modal.find('input[name="firstname1"]').val(owner.firstname);
								modal.find('input[name="middlename1"]').val(owner.middlename);
								modal.find('input[name="lastname1"]').val(owner.lastname);
								modal.find('input[name="remarks"]').val(owner.remarks);
								// alert(owner.remarks);
								if (owner.gender=="2"){
										modal.find('input:radio[name="gender"][id="2"]').prop("checked",true);
								} else if(owner.gender=="1") {
									modal.find('input:radio[name="gender"][id="1"]').prop("checked",true);
								}
								modal.find('input[name="house_no_bldg_name"]').val(owner.house_no_bldg_name);
								modal.find('input[name="o_subdivision_street"]').val(owner.o_subdivision_street);
								modal.find('select[name="brgy_id"]').val(owner.brgy_id);
								modal.find('input[name="contact_number"]').val(owner.contact_number);
								modal.find('input[name="email"]').val(owner.email);
							} else {
								$('#edit-owner-form').hide();
								$('.president').show();
								modal.find('input[name="owner_id"]').val(data.ownerid);
								modal.find('input[name="ownership_id"]').val(owner.ownership_id);
								modal.find('input[name="firstname"]').val(owner.firstname);
								modal.find('input[name="middlename"]').val(owner.middlename);
								modal.find('input[name="lastname"]').val(owner.lastname);
								modal.find('input[name="permitee"]').val(owner.permitee);
								modal.find('input[name="remarks"]').val(owner.remarks);
							}
						});
					} else {
						show_message($('.owner-message'), result.message, 'Oops!', 'danger');
					}
				}
			});
		});
	
		$('#edit-form-owner').on('submit', function(e) {
			e.preventDefault();
			var inputs = $(this).serialize();
	
			$.post(baseurl + 'fees/api/owner/save_owner', inputs, function(result) {
				if(result.error === 0) {
					show_message($('.owner-message'), result.message, 'Success!', 'success');
				} else {
					show_message($('.owner-message'), result.message, 'Oops!', 'danger');
				}
				$('#edit-owner-details').find('button.close-modal').trigger('click');
			}, 'json');
		});
	
	
		/*-----------------------------
		*Show business-form for editing
		*------------------------------*/
		$('table#business-application tbody').on('click','a.edit-business', function(e){
			e.preventDefault();
			var data = $(this).data(),
				modal = $('#edit-business-details');
	
			modal.modal('show');
	
			$.ajax({
				url: baseurl + 'fees/api/owner/get_business/' + data.bussid + '/' + data.appid,
				//url: baseurl + 'fees/api/owner/get_business/' + data.bussid,
				type: 'get',
				dataType: 'json',
				beforeSend: function() {
					modal.find('.loaders').hide().fadeIn();
				},
				success: function(result) {
					if(result.error === 0){
						modal.find('#edit-business-form').fadeIn(function() {
							modal.find('div.loader').fadeOut();
	
							var business = result.data;
							//alert(business.rep_bookkepr_ph_no);
							if (business.assessment_id){
	
								//modal.find('select[name="payment_id"]').val(business.payment_id).attr('readonly',true);
								//modal.find('input[name="registered_date"]').val(business.registered_date).attr('disabled',true);
	
							} else {
								modal.find('select[name="payment_id"]').val(business.payment_id).attr('disabled',false);
								modal.find('input[name="registered_date"]').val(business.registered_date).attr('disabled',false);
	
							}
	
							if(business.govt_incentive == '1'){
							$('.govt-entity').show();
							modal.find('input[name="govt_incentive"]').val(data.govt_incentive);
							}else{
							$('.govt-entity').hide();
							}
	
							if(business.govt_incentive == '1'){
							$('.govt-entity').show();
							modal.find('input[name="govt_incentive"]').val(data.govt_incentive);
							} else {
							$('.govt-entity').hide();
							modal.find('input[name="govt_incentive"]').val('0');
							}
							//alert(business.occupancy_id);
							if(business.occupancy_id == '1'){
								$('.rental_info').show();
								modal.find('input[name="id"]').val(business.id);
								modal.find('input[name="rental_fee"]').val(business.rental_fee);
								modal.find('input[name="leasor_tel_no"]').val(business.leasor_tel_no);
								modal.find('input[name="leasor_first_name"]').val(business.leasor_first_name);
								modal.find('input[name="leasor_middle_name"]').val(business.leasor_middle_name);
								modal.find('input[name="leasor_last_name"]').val(business.leasor_last_name);
								modal.find('input[name="r_house_no"]').val(business.r_house_no);
								modal.find('select[name="r_brgy_id"]').val(business.r_brgy_id);
								modal.find('input[name="subdi"]').val(business.subdi);
								modal.find('input[name="city_muni"]').val(business.city_muni);
								modal.find('input[name="province"]').val(business.province);
								modal.find('input[name="email_add"]').val(business.email_add);
								modal.find('input[name="emergency_info"]').val(business.emergency_info);
							} else {
								$('.rental_info').hide();
							}

							if(business.brgy_id == '18'){
								modal.find('.rental_info123').show();
							}else{
								modal.find('.rental_info123').hide();
							}
							
								modal.find('.stall_num123').val(business.stall_num);
								modal.find('.stall_num123').text(business.stall_num);
								modal.find('input[name="stall_area"]').val(business.stall_area);
								modal.find('input[name="stall_val"]').val(business.stall_val);
								modal.find('input[name="buss_id"]').val(data.bussid);
								modal.find('input[name="app_id"]').val(business.app_id);
								modal.find('input[name="r_buss_id"]').val(business.r_buss_id);
								modal.find('input[name="owner_id"]').val(business.owner_id);
								
								modal.find('input[name="plate_no"]').val(business.plate_no);
								modal.find('input[name="units_no"]').val(business.units_no);

								modal.find('input[name="house_no"]').val(data.house_no);
								modal.find('input[name="unit_no"]').val(data.unit_no);
								modal.find('input[name="bldg_name"]').val(data.bldg_name);
								modal.find('input[name="street_address"]').val(business.street_address);
								modal.find('input[name="street_address2"]').val(business.street_address2);
								modal.find('input[name="subdivision"]').val(data.subdivision);
								modal.find('input[name="city"]').val(business.city);
								modal.find('input[name="province"]').val(business.province);
								modal.find('input[name="house_no"]').val(data.house_no);
								modal.find('input[name="registered_date"]').val(business.registered_date);
								modal.find('input[name="permit_number"]').val(business.permit_number);
								modal.find('select[name="application_id"]').val(business.application_id);
								modal.find('select[name="payment_id"]').val(business.payment_id);
								modal.find('select[name="ownership_id"]').val(business.ownership_id);
								modal.find('select[name="classification_id"]').val(business.classification_id);
								modal.find('select[name="occupancy_id"]').val(business.occupancy_id);
								modal.find('select[name="brgy_id"]').val(business.brgy_id);
								modal.find('input[name="business_name"]').val(business.business_name);
								modal.find('input[name="trade_name"]').val(business.trade_name);
								modal.find('input[name="business_area"]').val(business.business_area);
								modal.find('input[name="contact_number"]').val(business.contact_number);
								modal.find('input[name="email"]').val(business.email);
								modal.find('input[name="registrar_number"]').val(business.registrar_number);
								modal.find('input[name="date_applied"]').val(business.date_applied);
								modal.find('input[name="ctc"]').val(business.ctc);
								modal.find('input[name="contact_number"]').val(business.contact_number);
								modal.find('input[name="rep_bookkepr_ph_no"]').val(business.rep_bookkepr_ph_no);
								modal.find('input[name="tin"]').val(business.tin);
								modal.find('input[name="pin"]').val(business.pin);
								modal.find('input[name="dti_no"]').val(business.dti_no);
								modal.find('input[name="dti_expiration"]').val(business.dti_expiration);
								modal.find('input[name="sec_no"]').val(business.sec_exoiration);
								modal.find('input[name="cda_no"]').val(business.cda_no);
								modal.find('input[name="cda_expiration"]').val(business.cda_expiration);
								console.log('business.data.reference_no='+business.reference_no);
								modal.find('input[name="abled_male_emp_estab"]').val(business.abled_male_emp_estab);
								modal.find('input[name="abled_female_emp_estab"]').val(business.abled_female_emp_estab);
								modal.find('input[name="pwd_female_emp_estab"]').val(business.pwd_female_emp_estab);
								modal.find('input[name="pwd_male_emp_estab"]').val(business.pwd_male_emp_estab);
								modal.find('input[name="abled_male_emp_lgu"]').val(business.abled_male_emp_lgu);
								modal.find('input[name="abled_female_emp_lgu"]').val(business.abled_female_emp_lgu);
								modal.find('input[name="pwd_male_emp_lgu"]').val(business.pwd_male_emp_lgu);
								modal.find('input[name="pwd_female_emp_lgu"]').val(business.pwd_female_emp_lgu);
								modal.find('input[name="pwd_male_emp"]').val(business.pwd_male_emp);
								modal.find('input[name="pwd_female_emp"]').val(business.pwd_female_emp);
								modal.find('input[name="id"]').val(business.id);
								modal.find('input[name="reference_no"]').val(business.reference_no);
								modal.find('input[name="old_buss_id"]').val(business.old_buss_id);
								modal.find('input[name="old_permit_number"]').val(business.old_permit_number);


								// modal.find('textarea[name="street_address"]').text(business.street_address);
	
								//rental
	
						});
					} else {
						show_message($('.owner-message'), result.message, 'Oops!', 'danger');
					}
				}
			});
		});

		// $('.areast').on('keyup change paste', function() {
		// 	var totalstarea = $('.areast').val();
		// 	var totalvalst = totalstarea * 50;
		// 	$('.valuest').val(totalvalst);
		// });

		// $('.areast1').on('keyup change paste', function() {
		// 	var totalstarea1 = $('.areast1').val();
		// 	var totalvalst1 = totalstarea1 * 50;
		// 	$('.valuest1').val(totalvalst1);
		// });

		$('.numstall1').on('change', function(){
			var val = $(this).val();
			if(val == 'C-32,33,34'){
				var val1 = "C-32";
			}else{
				var val1 = val;
			}
			// console.log(val);console.log(val1);
			$.getJSON(baseurl + 'fees/api/payment/stall_details/' + val1, function(result) { 
				console.log(result);
				if(result.error === 0){
					var asdqwe = result.data.stall;
					console.log(asdqwe.stall_area);
					$('input[name="stall_area"]').val(asdqwe.stall_area);
					$('input[name="stall_val"]').val(asdqwe.stall_val);
				}

			});

		});

		/* ---------------
		 * Execute Payment
		 * --------------- */
		$('#form-cash').on('submit', function(e) {
			e.preventDefault();
			var form = $('#form-cash'),
				inputs = $('#form-cash').serialize();
				modal = $('#payment_ok');
	
			console.info('Saving...');
			$.post(baseurl + 'fees/api/payment/save_payment', inputs, function(result) {
				if(result.error === 0) {
					//alert('success');
					console.info('Successfully saved');
					popup(
						'Transaction',
						'Payment Successfull',
						'',
						{},
						'Ok',
						'info',
						'cheers'
					);
					location.reload();
					var table = $('#business-payment tbody');
	
					$.getJSON(baseurl + 'fees/api/payment/approval_list', function(result) {
						if(result.error === 0) {
							table.html('');
	
							for(i in result.data) {
								var tr = $('<tr />').appendTo(table),
									details = result.data[i];
	
								$('<td />', { text: details.permit_number }).appendTo(tr);
								$('<td />', { text: capitalize(details.firstname + ' ' + details.middlename + ' ' + details.lastname) }).appendTo(tr);
								$('<td />', { text: capitalize(details.business_name) }).appendTo(tr);
								$('<td />', { text: details.application_date }).appendTo(tr);
								$('<td />', { text: capitalize(details.application_type) }).appendTo(tr);
								$('<td />', { text: capitalize(details.status) }).appendTo(tr);
								$('<td />', { 'class': 'text-center', html: '<a href="#" class="btn btn-info btn-xs selectpayer" data-assessmentid="' + details.assessment_id + '" data-ownerid="' + details.owner_id + '" data-businessid="' + details.buss_id + '"><i class="fa fa-money"></i> Pay</a>' }).appendTo(tr);
							}
						} else {
							var tr = $('<tr />').appendTo(table);
							$('<td />', { text: 'Currently have no pending assessments.', colspan: 7 }).appendTo(tr);
						}
					});
				} else {
					console.info('Failed Saving');
				}
				return false;
			}, 'json');
		});
	
		$('#form-check').on('submit', function(e) {
			e.preventDefault();
			var form = $('#form-check'),
				inputs = $('#form-check').serialize();
				modal = $('#payment_ok');
	
			console.info('Saving...');
			$.post(baseurl + 'fees/api/payment/save_payment', inputs, function(result) {
				if(result.error === 0) {
					//alert('success');
					console.info('Successfully saved');
					popup(
						'Transaction',
						'Payment Successfull',
						'',
						{},
						'Ok',
						'info',
						'cheers'
					);
					location.reload();
					var table = $('#business-payment tbody');
	
					$.getJSON(baseurl + 'fees/api/payment/approval_list', function(result) {
						if(result.error === 0) {
							table.html('');
	
							for(i in result.data) {
								var tr = $('<tr />').appendTo(table),
									details = result.data[i];
	
								$('<td />', { text: details.permit_number }).appendTo(tr);
								$('<td />', { text: capitalize(details.firstname + ' ' + details.middlename + ' ' + details.lastname) }).appendTo(tr);
								$('<td />', { text: capitalize(details.business_name) }).appendTo(tr);
								$('<td />', { text: details.application_date }).appendTo(tr);
								$('<td />', { text: capitalize(details.application_type) }).appendTo(tr);
								$('<td />', { text: capitalize(details.status) }).appendTo(tr);
								$('<td />', { 'class': 'text-center', html: '<a href="#" class="btn btn-info btn-xs selectpayer" data-assessmentid="' + details.assessment_id + '" data-ownerid="' + details.owner_id + '" data-businessid="' + details.buss_id + '"><i class="fa fa-money"></i> Pay</a>' }).appendTo(tr);
							}
						} else {
							var tr = $('<tr />').appendTo(table);
							$('<td />', { text: 'Currently have no pending assessments.', colspan: 7 }).appendTo(tr);
						}
					});
				} else {
					console.info('Failed Saving');
				}
				return false;
			}, 'json');
		});
	
		/* ---------------
		 * RETIREMENT Pay
		 * --------------- */
		$('#form-cash1').on('submit', function(e) {
			e.preventDefault();
			var form = $('#form-cash'),
				inputs = $('#form-cash1').serialize();
				modal = $('#payment_ok');
			// var_dump(inputs);
			console.info('Saving...');
			$.post(baseurl + 'fees/api/payment/retire_payments', inputs, function(result) {
				if(result.error === 0) {
					//alert('success');
					console.info('Successfully saved');
					popup(
						'Transaction',
						'Payment Successfull',
						'',
						{},
						'Ok',
						'info',
						'cheers'
					);
					location.reload();
					var table = $('#business-payment tbody');
	
					$.getJSON(baseurl + 'fees/api/payment/approval_list', function(result) {
						if(result.error === 0) {
							table.html('');
	
							for(i in result.data) {
								var tr = $('<tr />').appendTo(table),
									details = result.data[i];
	
								$('<td />', { text: details.permit_number }).appendTo(tr);
								$('<td />', { text: capitalize(details.firstname + ' ' + details.middlename + ' ' + details.lastname) }).appendTo(tr);
								$('<td />', { text: capitalize(details.business_name) }).appendTo(tr);
								$('<td />', { text: details.application_date }).appendTo(tr);
								$('<td />', { text: capitalize(details.application_type) }).appendTo(tr);
								$('<td />', { text: capitalize(details.status) }).appendTo(tr);
								$('<td />', { 'class': 'text-center', html: '<a href="#" class="btn btn-info btn-xs selectpayer" data-assessmentid="' + details.assessment_id + '" data-ownerid="' + details.owner_id + '" data-businessid="' + details.buss_id + '"><i class="fa fa-money"></i> Pay</a>' }).appendTo(tr);
							}
						} else {
							var tr = $('<tr />').appendTo(table);
							$('<td />', { text: 'Currently have no pending assessments.', colspan: 7 }).appendTo(tr);
						}
					});
				} else {
					console.info('Failed Saving');
				}
				return false;
			}, 'json');
		});


		/* ---------------
		 * REASSESSMENT DELETE
		 * --------------- */
		$('#form-reassessment').on('submit', function(e) {
			e.preventDefault();
			var form = $('#form-reassessment'),
				inputs = $('#form-reassessment').serialize();
				modal = $('#reassess_ok');
	
			console.info('Saving...');
			$.post(baseurl + 'fees/api/payment/reassessments', inputs, function(result) {
				if(result.error === 0) {
					//alert('success');
					console.info('Successfully saved');
					popup(
						'Transaction',
						'Reassessment Successfully Made',
						'',
						{},
						'Ok',
						'info',
						'cheers'
					);
					location.reload();
					var table = $('#business-payment tbody');
	
					
				} else {
					console.info('Failed Saving');
				}
				return false;
			}, 'json');
		});

		$('#edit-form-business').on('submit', function(e) {
			e.preventDefault();
			var inputs = $(this).serialize();console.log(inputs);
			$.post(baseurl + 'fees/api/owner/save_business', inputs, function(result) {
				if(result.error === 0) {
					show_message($('.owner-message'), 'Business updated successfully', 'Success!', 'success');
					//$('button.close-modal').trigger('click');
					location.reload();
				} else {
					show_message($('.owner-message'), result.message, 'Oops!', 'danger');
				}
				//$('#edit-business-details').find('button.close-modal').trigger('click');
			}, 'json');
		});
	
		$('#add-business-lines').on('submit', function(e) {
			e.preventDefault();
	
			var inputs = $(this).serialize(),
				form = $(this);
	
			$.post(baseurl + 'fees/api/owner/save_application', inputs, function(result) {
				if(result.error === 0) {
					$('button.close-modal').trigger('click');
				} else {
					show_message(form.find('.messages'), result.message, 'Oops!', 'danger');
				}
			}, 'json');
			return false;
		});
	
		/* --------------------
		 * Edit Business Nature
		 * -------------------- */
		$('table#business-application tbody').on('click','a.edit-application', function(e){
			e.preventDefault();
	
			var data = $(this).data(),
				modal = $('#edit-business-nature');
	
			modal.modal('show');
			$('.new_app').show();
			$('.capital_header').show();
			$('.weights').show();
			//$('.date_application').show();
			$('.action_header').show();
			$('.buss_reqt').show();
			$('.enter_gross').hide();
			$('#nature-list tbody').business_nature({
				appid: data.appid,
				businessid: data.businessid,
				modal: modal
			});

		});
	
	
		/* -------------
		 * Save Renewal
		 * ------------- */
		$('form.renew').on('submit', function(e) {
			e.preventDefault();
			var inputs = $(this).serialize();
	
			$.post(baseurl + 'fees/api/owner/save_renew', inputs, function(result) {
				if(result.error === 0) {
					location.reload();
				} else {
					$('.msg').show();
					show_message($('.messages'), result.message , 'Oops!', 'danger');
				}
			}, 'json');
		});


		/* -------------
		 * Search
		 * ------------- */
		$('form.search').on('submit', function(e) {
			e.preventDefault();
			var inputs = $(this).serialize();
	
			$.post(baseurl + 'fees/get_applicationss', inputs, function(result) {
				if(result.error === 0) {
					
				} else {
					$('.msg').show();
					show_message($('.messages'), result.message , 'Oops!', 'danger');
				}
			}, 'json');
		});
		
	$('table#business-application tbody').on('click','a.retire', function(e){
		e.preventDefault();

		 var d  = $(this).data();
		// modal = $('#retire');
		// modal.modal('show');

		$.getJSON(baseurl + 'fees/retirement/' + d.appid, function(result) {
			// console.log(result);
		
						if(result.error === 0) {
							var  modal = $('#retire');
							modal.modal('show');
							var breakdowns_container = [],
								breakdownsJSON = "",
								fields = modal.find('.detailss'),
								info_data = result.data.info_data;
								bnarray = result.data.bnarray;
								gross = result.data.gross;
							var	breakdown1 = modal.find('table.retiree tbody');
							var count = 0;

							if(info_data.permitee==null || info_data.permitee=="N/A"){
								modal.find('input[name="owner_name"]').val(info_data.owner);
							} else{
								modal.find('input[name="owner_name"]').val(info_data.permitee);
							}
						


							modal.find('input[name="buss_id"]').val(info_data.buss_id);
							modal.find('input[name="business_name"]').val(info_data.business_name);
							modal.find('input[name="business_address"]').val(info_data.bbrgy);
					
							modal.find('input[name="employees"]').val(info_data.employees);
							modal.find('input[name="permit_no"]').val(info_data.permit_no);
							modal.find('input[name="gross"]').val(info_data.gross);
							
						
							modal.find('input[name="nature_retired"]').val(bnarray);
							for(aa in result.data.addttfo){
								var valuesss = result.data.addttfo[aa];
								
								var addtt = $('<tr />').appendTo(ztable.find('tbody'));
		
								$('<td />', { text: valuesss.tfo}).appendTo(addtt);
								$('<td />', { text: currencyFormat(parseFloat(valuesss.addttfoamount))}).appendTo(addtt);
							//TOTAL AMOUNT OF ADDITIONAL TFO ADDED
								addttfototal += parseFloat(valuesss.addttfoamount);
							}
							for(ss in result.data.gross){
								count++;
								var value5 = result.data.gross[ss];
								tr = $('<tr />').appendTo(breakdown1);
					
							//  $('<td />', { text: capitalize(value5.business_nature.replace(/_/g, ' '))}).appendTo(tr);
							$('<td />', { html: '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'}).appendTo(tr);
							$('<td />', { text: capitalize(value5.business_nature)}).appendTo(tr);
							$('<td />', { html: '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'}).appendTo(tr);
							$('<td />', { html: '<input type="text" name="gross'+count+'" class="form-control" id="gross'+count+'" value="'+value5.capital+'">'}).appendTo(tr);
							   
							}	

							$('<td />', { html: '<input type="hidden" name="gross_count" class="form-control" id="gross_count" value="'+count+'">'}).appendTo(tr);
																				

						}
						else{
							alert("Warning: Permit has not yet been assessed!");
							
							return false;
						}
					});
			
		});

	/* -------------
	 * Save Retirement
	 * ------------- */
	$('form.retire').on('submit', function(e) {
		e.preventDefault();
		var inputs = $(this).serialize();

		$.post(baseurl + 'fees/api/owner/save_retire', inputs, function(result) {
			if(result.error === 0) {
				location.reload();
			} else {
				location.reload();
			}
		}, 'json');
	});


			
		$('table#business-application tbody').on('click','a.requirements', function(e){
			e.preventDefault();
	
			var d  = $(this).data(),
				modal = $('#requirements');
				modal.modal('show');

				$.getJSON(baseurl + 'fees/info_details/' + d.appid, function(result) {
					
								if(result.error === 0) {
									var breakdowns_container = [],
										breakdownsJSON = "",
										fields = modal.find('.detailss'),
										owner = result.data.owners;
									
								
									fields.find('span.owner').text(capitalize(owner.owner));
									fields.find('span.business').text(capitalize(owner.business_name));
									fields.find('span.address').text(owner.barangay);

									modal.find('input[name="appid"]').val(d.appid);
									
									var obj = owner.requirements;
									var obj2 = owner.na_requirements;
									var myobj = obj.split(",");
									var myobj2 = obj2.split(",");

									//  console.log(obj2);
								
										if(myobj.includes("1")){
											modal.find('input[name="reqyes1"]').attr('checked', true);
										}
										if(myobj.includes("2")){
											modal.find('input[name="reqyes2"]').attr('checked', true);
										}
										if(myobj.includes("3")){
											modal.find('input[name="reqyes3"]').attr('checked', true);
										}
										if(myobj.includes("4")){
											modal.find('input[name="reqyes4"]').attr('checked', true);
										}
										if(myobj.includes("5")){
											modal.find('input[name="reqyes5"]').attr('checked', true);
										}
										if(myobj.includes("6")){
											modal.find('input[name="reqyes6"]').attr('checked', true);
										}
										if(myobj.includes("7")){
											modal.find('input[name="reqyes7"]').attr('checked', true);
										}
										if(myobj.includes("8")){
											modal.find('input[name="reqyes8"]').attr('checked', true);
										}
										if(myobj.includes("9")){
											modal.find('input[name="reqyes9"]').attr('checked', true);
										}
										if(myobj.includes("10")){
											modal.find('input[name="reqyes10"]').attr('checked', true);
										}
										if(myobj.includes("11")){
											modal.find('input[name="reqyes11"]').attr('checked', true);
										}
										if(myobj2.includes("1")){
											modal.find('input[name="reqyess1"]').attr('checked', true);
										}
										if(myobj2.includes("2")){
											modal.find('input[name="reqyess2"]').attr('checked', true);
										}
										if(myobj2.includes("3")){
											modal.find('input[name="reqyess3"]').attr('checked', true);
										}
										if(myobj2.includes("4")){
											modal.find('input[name="reqyess4"]').attr('checked', true);
										}
										if(myobj2.includes("5")){
											modal.find('input[name="reqyess5"]').attr('checked', true);
										}
										if(myobj2.includes("6")){
											modal.find('input[name="reqyess6"]').attr('checked', true);
										}
										if(myobj2.includes("7")){
											modal.find('input[name="reqyess7"]').attr('checked', true);
										}
										if(myobj2.includes("8")){
											modal.find('input[name="reqyess8"]').attr('checked', true);
										}
										if(myobj2.includes("9")){
											modal.find('input[name="reqyess9"]').attr('checked', true);
										}
										if(myobj2.includes("10")){
											modal.find('input[name="reqyess10"]').attr('checked', true);
										}
										if(myobj2.includes("11")){
											modal.find('input[name="reqyess11"]').attr('checked', true);
										}
								
								}
							});
					
				
			});


		//SUMMARY
		$('table#summary_list tbody').on('click','a.summary_list', function(e){
			e.preventDefault();
	
			var d  = $(this).data(),
			modal = $('#summary_list');
			modal.modal('show');
	
			$.getJSON(baseurl + 'fees/summary_details/' + d.businessid, function(result) {
				
				if(result.error === 0) {
					var breakdowns_container = [],
						breakdownsJSON = "",
						fields = modal.find('.detailsss'),
						owner = result.data.owners,	
						permit = result.data,
						breakdown = modal.find('table.annual tbody');
				
					fields.find('span.owner').text(capitalize(owner.owner));
					fields.find('span.business').text(capitalize(owner.business_name));
					fields.find('span.address').text(owner.barangay);



					for(pp in permit.permit) {
						
						var value = permit.permit[i],
						mode = permit.mode[i],
						countpay = permit.countpay[i],
						gross = currencyFormat(parseFloat(permit.gross[i])),
						nature = permit.nature[i],
						tr = $('<tr />').appendTo(breakdown);
						
						peso = "&#8369;";
						$('<td />', { text: value}).appendTo(tr);
						$('<td />', { html: '<span class="pull-left"></span>' +
						'<span class="pull-left">&#8369;</span>' +
						'<span class="pull-right">' + gross + '</span>' }).appendTo(tr);
						$('<td />', { text: nature}).appendTo(tr);
						$('<td />', { text: mode}).appendTo(tr);
						console.log(gross);	
						
					
						if(mode=="Annual"){
							$('<td />', { text: "Paid"}).appendTo(tr);
						} 
						if(mode=="Bi-Annual" && countpay == 1){
							$('<td />', { text: "1st Half Paid"}).appendTo(tr);
							
						} 						
						if(mode=="Bi-Annual" && countpay == 2){
							$('<td />', { text: "2nd Half Paid"}).appendTo(tr);
							
						} 
						if(mode=="Quarterly" && countpay == 1){
							$('<td />', { text: "1st Quarter Paid"}).appendTo(tr);
							
						} 
						if(mode=="Quarterly" && countpay == 2){
							$('<td />', { text: "2nd Quarter Paid"}).appendTo(tr);
							
						}
						if(mode=="Quarterly" && countpay == 3){
							$('<td />', { text: "3rd Quarter Paid"}).appendTo(tr);
							
						}
						if(mode=="Quarterly" && countpay == 4){
							$('<td />', { text: "4th Quarter Paid"}).appendTo(tr);
							
						}
					
						i++;
					}

					

					
				
						
				}
			});
	

});

	
		/* -------------
		 * Save/Update Requirements
		 * ------------- */
		$('form.requirements').on('submit', function(e) {
			e.preventDefault();
			var inputs = $(this).serialize();
	
			$.post(baseurl + 'fees/api/owner/save_reqs', inputs, function(result) {
				if(result.error == 0) {
					location.reload();
				} else {
					$('.msg').show();
					show_message($('.messages'), result.message , 'Oops!', 'danger');
				}
			}, 'json');
		});
	

		/*--------------------
		 * Reassessment Modal 
		 *--------------------*/
	
		$('table#business-payment tbody').on('click', 'a.reassessment', function(e) {
			e.preventDefault();
			var data = $(this).data(),
				modal = $('#reassessment');
				
			
			$('.save-cash').hide();
			$('.save-check').hide();
			$('#form-cash')[0].reset();
			$('#form-check')[0].reset();
	
			modal.modal('show');
	
			$.getJSON(baseurl + 'fees/api/payment/assessment/' + data.assessmentid, function(result) {
	
				if(result.error === 0) {
					var breakdowns_container = [],
						breakdownsJSON = "",
						fields = modal.find('.details'),
						owner = result.data.owner,
						// pays = result.data.payers,
						details = result.data.record,
						//breakdowns = result.data.owner.breakdown,
						breakdown = modal.find('table.annual tbody'),
						//breakdown =  $('div.row.annual1'),
						total = 0,
						is_paid = 0;
					var bustax1=0,bustax2=0,bustax3=0,bustax4=0,garbagefee=0,businesstaxx1=0,businesstaxx2=0,garbagefee1=0,garbagefee2=0;
					//console.log('test');
						//alert(owner.payment_type);
				
					fields.find('span.trans-type').text(capitalize(owner.application_type));
					fields.find('span.payment-mode').text(capitalize(owner.payment_type));
					fields.find('span.business-nature').text(capitalize(owner.business_nature));
					
					// fields.find('span.payment-status').text(capitalize(details.status));
					fields.find('span.owner').text(capitalize(owner.owner));
					fields.find('span.address').text(capitalize(owner.address));
					fields.find('span.contact-number').text(owner.contact_number);
					
	
					fields.find('input[name="assessment_id"]').val(owner.assessment_id);
					fields.find('input[name="owner_id"]').val(owner.owner_id);
					fields.find('input[name="buss_id"]').val(owner.buss_id);
					fields.find('input[name="total_amount"]').val(owner.total);
					fields.find('input[name="payment_id"]').val(owner.payment_id);

					fields.find('input[name="counting"]').val(owner.counts);
					// fields.find('span.counts').text(capitalize(owner.count));
				
					
					// fields.find('input[name="change"]').prop('disabled', true);
					
					breakdown.html('');
					$('.annual').show();
					document.getElementById('')
				
					for(ss in owner.ownership_id){
						var value5 = owner.ownership_id[ss];

					}	
				
					for(tt in owner.bustax){
						var value1 = owner.bustax[tt];

						
						if(value1.tfo==22){
							
							bustax2+=value1.amount;
							businesstaxx1 += value1.amount;
						
						}

						if(value5==5||value5==10){
							if(value1.tfo==23){
								bustax2+=value1.amount;
								businesstaxx1 += value1.amount;
							
							}
						}
					}	

					for(tt in owner.bustax2){
						var value2 = owner.bustax2[tt];

						
						if(value2.tfo=="Business Tax"){
							
							bustax4+=value2.addttfoamount;
							businesstaxx2 += value2.addttfoamount;
						
						}

						if(value5==5||value5==10){
							if(value2.tfo=="Permit Fee-Others"){
								bustax4+=value2.addttfoamount;
								businesstaxx2 += value2.addttfoamount;
							
							}
						}
					}	
			
					var businesstaxx=0,bustax=0;

					bustax = parseFloat(bustax1) + parseFloat(bustax2)+ parseFloat(bustax3)+ parseFloat(bustax4);
					
					businesstaxx = parseFloat(businesstaxx1) + parseFloat(businesstaxx2);
					// garbagefee = parseInt(garbagefee1) + parseInt(garbagefee2);

					var counts=0;
				
					for(i in owner.breakdowns) {
						counts++;
						// bustaxs = bustax;
						if(owner.application_type=="New"){
							bustaxs = 0;
						} else{
							if(counts==1){
								bustaxs = bustax;
							}
							
							else if(counts==2){
								// bustaxs = bustax/2;
								bustaxs = bustax;
							}
		
							else if(counts==4){
								// bustaxs = bustax/4;
								bustaxs = bustax;
							}
						}
					
						
					}
					fields.find('span.business-tax').text(bustax);
					var countss=0;
					
					
					for(i in owner.breakdowns) {
						countss++;
						
						//var tfo = result.data.tfos[i],
						  var value = owner.breakdowns[i],
							  tr = $('<tr />').appendTo(breakdown);
						
						$('<td />', { text: capitalize(value.label.replace(/_/g, ' '))}).appendTo(tr);
						var date1 =  new Date(value.dues);
						
						var date2 = new Date();
						var timeDiff = date2.getTime() - date1.getTime();
						var diffDays = timeDiff / (1000*3600*24); 
					
						var dd = date2.getDate();
						var mm = date2.getMonth()+1; //January is 0!
						var yyyy = date2.getFullYear();
						if(dd < 10)
						{
							dd = '0'+ dd;
						}
						if(mm < 10)
						{
							mm = '0' + mm;
						}
						var date2 = mm+'-'+dd+'-'+yyyy;

						var dd = date1.getDate();
						var mm = date1.getMonth()+1; //January is 0!
						var yyyy = date1.getFullYear();
						if(dd < 10)
						{
							dd = '0'+ dd;
						}
						if(mm < 10)
						{
							mm = '0' + mm;
						}
						var date1 = mm+'-'+dd+'-'+yyyy;
						
						//SURCHARGE and INTEREST
						if(diffDays>1){
							surcharges = bustaxs*0.25;
							interests = bustaxs*0.02;
							
							amountt = value.value + surcharges;
				
						} else{
							surcharges = 0;
							interests = 0
							amountt = value.value + surcharges;

						}

						//dues
						$('<td />', { text: date1}).appendTo(tr);
						$('<td />', { text: currencyFormat(parseFloat(bustaxs))}).appendTo(tr);
						// $('<td />', { text: currencyFormat(parseFloat(garbagefee))}).appendTo(tr);
						
						//date paid
						
						$('<td />', { text: date2 }).appendTo(tr);
					
						
						// $('<td />', { text: datess }).appendTo(tr);
						
						
						//amount
						$('<td />', { html: '<span class="pull-left"></span>' +
							'<span class="pull-left">&#8369;</span>' +
							'<span class="pull-right">' + currencyFormat(parseFloat(value.value)) + '</span>' }).appendTo(tr);
						//interest
						// $('<td />', { html: '<input type="text" class="form-control" id="interest" value="'+interests+'" readonly>'}).appendTo(tr);
						//surcharge
						$('<td />', { html: '<input type="text" class="form-control" id="surcharge" value="'+currencyFormat(parseFloat(surcharges))+'" readonly>'}).appendTo(tr);
						//total amount per quarter
						$('<td />', { html: '<span class="pull-left"></span>' +
						'<strong><span class="pull-left">&#8369;</span>' +
						'<span class="pull-right">' + currencyFormat(parseFloat(amountt)) + '</span></strong>' }).appendTo(tr);
						
						//unpaid or paid
						var paids = owner.count;
						
						var unpay = "Unpaid";
						var pay = "Paid";

						console.log(paids);
					
							if(paids.includes("1")&& countss==1)
							{
								$('<td />', { text: pay}).appendTo(tr);
								
							}
							else if(paids.includes("2")	&& countss==2)
							{
								$('<td />', { text: pay}).appendTo(tr);
							
							}
							else if(paids.includes("3")	 && countss==3)
							{
								$('<td />', { text: pay}).appendTo(tr);
								
							}
							else if(paids.includes("4")	&& countss==4)
							{
								$('<td />', { text:pay}).appendTo(tr);
							
							}
							
							else
							{
								$('<td />', { text:unpay}).appendTo(tr);
						
								
							}
							
					
					

			
							$('<td/>', { html: '<div class="payment-method">'+
												'<input type="submit" class="btn btn-danger btn-xs form-control reassessment-now" value="REASSESS NOW" />'+
												' '+'</div>' }).appendTo(tr);
											
					
							

						 breakdowns_container.push({'label': value.label,'dues' : value.dues,'value': value.value,'stat' : value.stat});
						 breakdownsJSON = JSON.stringify(breakdowns_container);
	
							total += parseFloat(value.value);
					}
					fields.find('input[name="breakdowns"]').val(breakdownsJSON);
			
			
				
				} else {
	
				}
			});
		});


		/*--------------------
		 * Renew Modal baby!!
		 *--------------------*/
	
		$('table#business-application tbody').on('click','a.renew', function(e){
			e.preventDefault();
	
			var d  = $(this).data(),
				modal = $('#renew');
	
			modal.modal('show');
			$('#checkAll').prop('checked',false);
			$.ajax({
				url: baseurl + 'fees/api/owner/get_taxpayer_info/' + d.ownerid + '/' + d.businessid + '/' + d.appid ,
				type: 'post',
				dataType: 'json',
				beforeSend: function() {
	
				},
				success: function(result) {
					if(result.error === 0) {
						var modal = $('#renew'),
							list = $('.requirement-list');
							tdate = new Date(), tdate = tdate.getFullYear(),
							list.html('');
							details = result.data.taxpayer_info,
							data = result.data.taxpayer;
							bi = modal.find('.buss_info')
							bi.html(''),
							byear=new Date(details[0].date_renewed),
							byear=byear.getFullYear(),
							date_renewed = new Date(details[0].date_renewed),
							date_renewed = date_renewed.getFullYear(),
							gr = modal.find('.business-nature-gross');
	
						modal.find('span.owner').text(details[0].firstname + ' ' + details[0].middlename + '. ' + details[0].lastname);
						modal.find('span.business').text(details[0].business_name);
						modal.find('span.payment').text(capitalize(details[0].types));
						modal.find('span.address').text(details[0].brgy);
						
						//newly added 011315
						$.ajax({
								url: baseurl + 'fees/api/owner/renew_status/' + details[0].bus_line_id,
								type: 'post',
								dataType: 'json',
								success: function(res){
									//alert(res.app_id);
								}
						});
	
						// console.log('application_id='+details[0].application_id);
	
					//	if(byear == (tdate) && details[0].application_id == 1){
						if(details[0].application_id == 1){
	
							$('.messages').show();
							$('.buss_info').show();
							$('.addtionalreqt').hide();
	
							var msg = modal.find('.messages');
	
	
								if(details[0].application_id == 1 && (details[0].assess_status==null || details[0].assess_status=="unpaid")){
									if(details[0].assess_status=="unpaid"){
										show_message(msg, 'No need to renew a freshly started business. Please proceed to Assessment tab and assess this business.', 'Information!', 'info');
									}else{
										show_message(msg, 'You have an unpaid dues for the last year. Please pay first before you renew.', 'Information!', 'info');
									}
									show_message(msg, 'No need to renew a freshly started business. Please proceed to Assessment tab and assess this business.', 'Information!', 'info');
	
										for	(info in details){
											$('<div class="form-group">' +
											'<label class="control-label col-sm-6">Capital for <span class="business-nature">'+details[info].business_nature +'</span><span class="year"> '+(tdate-1)+'</span></label>' +
											'<div class="col-sm-6"><input class="form-control" type="text" name="gross[]" value="'+parseFloat(details[info].capital)+'"><input class="form-control" type="hidden" name="year[]" value="'+(tdate-1)+'"></div>' +
											'</div>').appendTo(gr);
											$('<div class="form-group">' +
											'<label class="control-label col-sm-6">Add Percentage (in % form)<span class="add_percentage"></span></label>' +
											'<div class="col-sm-6">' +
											'<input type="text" name="percentage[]" value="'+details[info].percentage+'" class="form-control">' +
											'</div>' +
											'</div>').appendTo(gr);
											
									}
									
								}else  if(details[0].application_id == 2 && date_renewed !='null' && (date_renewed == tdate)) {
									show_message(msg, 'This Business is already renewed.', 'Information!', 'info');
									
								}else if(details[0].assess_status == "paid"){
	
									modal.find('.business-nature-gross').html('');
									for(bn in result.data.taxpayer_info) { //alert(bn);
										var gross = result.data.taxpayer_info[bn],
											gr = modal.find('.business-nature-gross');
											console.log('hahahhaah');
										//if(gross.status!="renewed"){
											if(byear!=tdate) {
											$('<div class="form-group">' +
													'<label class="control-label col-sm-6">Gross for <span class="business-nature">' + gross.business_nature + '</span>&nbsp;<span class="year">'+(tdate-1)+'</span></label>' +
													'<div class="col-sm-6">' +
														'<input type="text" name="gross[]" class="form-control" value="'+parseFloat(details[info].capital)+'"/>' +
													'</div>' +
												'</div>').appendTo(gr);
												$('<div class="form-group">' +
													'<label class="control-label col-sm-6">Add Percentage (in % form)<span class="add_percentage"></span></label>' +
													'<div class="col-sm-6">' +
													'<input type="text" name="percentage[]" class="form-control">' +
													'</div>' +
													'</div>').appendTo(gr);

	
										}
									}
								}
	
						} else {
		
							modal.find('.business-nature-gross').html('');
							for(info in details) {
									var buss_gross = $.parseJSON(details[info].gross);
	
									if(byear!=tdate) {
										$('<div class="form-group">' +
											'<label class="control-label col-sm-6">Gross for <span class="business-nature">' + details[info].business_nature + '</span>&nbsp;<span class="year">'+(tdate-1)+'</span></label>' +
											'<div class="col-sm-6">' +
												'<input type="text" name="gross[]" value="'+parseFloat(details[info].capital)+'" class="form-control" />' +
											'</div>' +
											'</div>').appendTo(gr);
										$('<div class="form-group">' +
											'<label class="control-label col-sm-6">Add Percentage (in % form)<span class="add_percentage"></span></label>' +
											'<div class="col-sm-6">' +
											'<input type="text" name="percentage[]" value="'+details[info].percentage+'" class="form-control">' +
											'</div>' +
											'</div>').appendTo(gr);
								  } else{
									// for	(info in details){
	
	
											if(buss_gross.length > 0){
												 for(y in buss_gross){
	
												 }
	
												$('<div class="form-group">' +
												'<label class="control-label col-sm-6">Gross for <span class="business-nature">'+details[info].business_nature +'</span><span class="year"> '+buss_gross[y].year+'</span></label>' +
												'<div class="col-sm-6"><input class="form-control" type="text" name="gross[]" value="'+parseFloat(details[info].capital)+'"><input class="form-control" type="hidden" name="year[]" value="'+parseFloat(buss_gross[y].year)+'"></div>' +
												'</div>').appendTo(gr);
												$('<div class="form-group">' +
												'<label class="control-label col-sm-6">Add Percentage (in % form)<span class="add_percentage"></span></label>' +
												'<div class="col-sm-6">' +
												'<input type="text" name="percentage[]" value="'+details[info].percentage+'" class="form-control">' +
												'</div>' +
												'</div>').appendTo(gr);
											} else{
												$('<div class="form-group">' +
												'<label class="control-label col-sm-6">Gross for <span class="business-nature">'+details[info].business_nature +'</span><span class="year"> '+(tdate-1)+'</span></label>' +
												'<div class="col-sm-6"><input class="form-control" type="text" name="gross[]" value="'+parseFloat(details[info].capital)+'"><input class="form-control" type="hidden" name="year[]" value="'+(tdate-1)+'"></div>' +
												'</div>').appendTo(gr);
												$('<div class="form-group">' +
												'<label class="control-label col-sm-6">Add Percentage (in % form)<span class="add_percentage"></span></label>' +
												'<div class="col-sm-6">' +
												'<input type="text" name="percentage[]" value="'+details[info].percentage+'" class="form-control">' +
												'</div>' +
												'</div>').appendTo(gr);
											}
	
								}
								$('<input />', {
									type: 'hidden', name: 'natureid[]', value: details[info].buss_nature_id
								}).appendTo(modal.find('.hidden-fields'));
							}
					}
					$('<input />', {
								type: 'hidden', name: 'app_id', value: d.appid
							}).appendTo(modal.find('.hidden-fields'));
							$('<input />', {
								type: 'hidden', name: 'buss_id', value: d.businessid
							}).appendTo(modal.find('.hidden-fields'));
					} else {
						// Display Error
					}
				}
			});
		});
	
		$("#checkAll").change(function () {
			$("input:checkbox").prop('checked', $(this).prop("checked"));
		});
		$('#nature-list tbody').on('click', 'a.edit-nature', function(e) {
			e.preventDefault();
			var data = $(this).data(),
				tr = $(this).parent().parent(),
				td = $(this).parent(),
				a = $(this);
	
			tr.find('td span.nature').fadeOut(function() {
				var nature = $('#nature-list tbody').parent().parent().find('select.business-nature'),
				delinquent_nature = $('#nature-list tbody').parent().parent().find('input[name="delinquent_year"]'),
					nature_container = $(this).parent();
	
				/* $(this).removeClass('btn-warning').addClass('btn-success');
				$(this).addClass('save-ready');
				$(this).html('<i class="fa"></i> Save'); */
				if($(this).hasClass('btn-warning')) {
	
				} else {
					nature_container.find('select').remove();
					nature_container.find('input[name="delinquent_year"]').remove();
					// Change the Edit button into save button
					a.removeClass('edit-nature')
					.removeClass('btn-warning')
					.addClass('save-ready')
					.addClass('btn-success')
					.attr('title', 'Save');
	
						nature.clone(true).addClass('from-table')
						.addClass('margin-top-10-n')
						.val(data.natureid).appendTo(nature_container);

						delinquent_nature.clone(true).addClass('from-table')
						.addClass('margin-top-10')
						.addClass('margin-bottom-10')
						.css('width', '50%')
						.val(data.delinquentyear).appendTo(nature_container);
				
					
	
					if (data.application_id == 2){
						tr.find('td input.gross').prop('readonly', false);
						tr.find('td input.capital').prop('readonly', false);
						tr.find('td input.application_date').prop('readonly', false);
					} else {
						tr.find('td input.capital').prop('readonly', false);
						tr.find('td input.application_date').prop('readonly', false);
					}
				}
			});
		});
	
		$('#nature-list tbody').on('click','a.delete-nature',function(e){
			if(window.confirm("Proceed with the deletion?")){
				var data = $(this).data();
			//alert(data.natureid);
			console.log(data);
			$.ajax({
				url: baseurl + 'fees/api/owner/delete_business_nature/'+data.appid+'/'+data.natureid+'/'+data.delinquentyear,
				type: 'post',
				dataType: 'json',
				success: function(result) {
					//alert(result.message);
					if(result.error == 0 ){
						var modal = $('#edit-business-nature');
						$('#nature-list tbody').business_nature({
							appid: data.appid,
							businessid: data.businessid,
							modal: modal
						});
					}else{
						alert(result.message);
					}
				}
			})
			}else{

			}
			
		});

		// retire business nature
		$('#nature-list tbody').on('click','a.retire',function(e){
			if(window.confirm("Retire Business Nature?")){
				var data = $(this).data();
			console.log(data);
			$.ajax({
				url: baseurl + 'fees/retirenathis/'+ data.appid +'/'+ data.businessid +'/'+ data.natureid +'/'+ data.capital,
				type: 'post',
				dataType: 'json',
				success: function(result) {
					//alert(result.message);
					console.log(result);
					if(result.error == 0 ){
						var modal = $('#edit-business-nature');
						$('#nature-list tbody').business_nature({
							appid: data.appid,
							businessid: data.businessid,
							modal: modal
						});
					}else{
						alert(result.message);
					}
				}
			})
			}else{

			}
			
		});


		$('#nature-list tbody').on('click', 'a.save-ready', function(e) {
		//$('#add-business-lines').on('submit', function(e) {
			e.preventDefault();
	
			var requirements = [];
				$('.checkbox-item:checked').each(function (){ requirements.push($(this).val()); });
			var data = $(this).data(),
				tr = $(this).parent().parent(),
				cancel = $(this).parent().find('a.delete-nature'),
				application_date = tr.find('input[name="application_date"]').val(),
				app_id = tr.find('input[name="app_id"]').val(),
				capital = tr.find('input[name="capital"]').val(),
				buss_id = tr.find('input[name="buss_id"]').val(),
				gross = tr.find('input[name="gross"]').val(),
				year = tr.find('input[name="year"]').val(),
				nature = tr.find('select').val(),
				delinquent_year = tr.find('input[name="delinquent_year"]').val(),
				application_id = tr.find('input[name="application_id"]').val(),
				modified = 1,
				requirements = $.unique(requirements),
				a = $(this);


	
			$.ajax({
				url: baseurl + 'fees/api/owner/update_business_line',
				type: 'post',
				dataType: 'json',
				data: {
					bus_line_id: data.buslineid,
					app_id: app_id,
					application_id: application_id,
					application_date : application_date,
					buss_id : buss_id,
					buss_nature_id: nature,
					modified:modified,
					gross : (gross == '') ? '0.00' : gross,
					year : (year == '') ? '' : year,
					capital: capital,
					requirements : requirements,
					delinquent_year : delinquent_year
				},
				beforeSend: function() {
	
				},
				success: function(result) {
					if(result.error === 0) {
						var modal = $('#edit-business-nature');
					
						a.removeClass('save-ready')
						.removeClass('btn-success')
						.addClass('edit-nature')
						.addClass('btn-warning')
						.attr('title', 'Edit');


					 $('#nature-list tbody').business_nature({
						appid: data.appid,
						businessid: data.businessid,
						modal: modal
					});
					} else {
						//Display Error
					}
				}
			});
		});
	
		//upload scanned documents
		$('.upload_image_owner').on('click', function(event) {
			var fileToUpload = inputFile[0].files[0];
			var fileToUpload1 = inputFile[0].files[1];
			var fileToUpload2 = inputFile[0].files[2];
			var fileToUpload3 = inputFile[0].files[3];
			var fileToUpload4 = inputFile[0].files[4];
		
			var buss_id = document.getElementById("demo").value;
			// alert(buss_id);
			// make sure there is file to upload
			if (fileToUpload != 'undefined') {
				// provide the form data
				// that would be sent to sever through ajax
				var formData = new FormData(),
					modal = $('#error');
				formData.append("file", fileToUpload);

				
	
				// now upload the file using $.ajax
				$.ajax({
					//url: uploadURI,
					url: baseurl + 'fees/api/owner/upload_image/'+ buss_id,
					type: 'post',
					data: formData, buss_id : buss_id,
					processData: false,
					contentType: false,
					success: function(result) {
						modal.modal('show');
						modal.find('.msg').text('Image Updated');
					}
				});
			}
			if (fileToUpload1 != 'undefined') {
				// provide the form data
				// that would be sent to sever through ajax
				var formData1 = new FormData(),
					modal = $('#error');
				formData1.append("file", fileToUpload1);

				
	
				// now upload the file using $.ajax
				$.ajax({
					//url: uploadURI,
					url: baseurl + 'fees/api/owner/upload_image1/'+ buss_id,
					type: 'post',
					data: formData1, buss_id : buss_id,
					processData: false,
					contentType: false,
					success: function(result) {
						
					}
				});
			}
			if (fileToUpload2 != 'undefined') {
				// provide the form data
				// that would be sent to sever through ajax
				var formData2 = new FormData(),
					modal = $('#error');
				formData2.append("file", fileToUpload2);

				
	
				// now upload the file using $.ajax
				$.ajax({
					//url: uploadURI,
					url: baseurl + 'fees/api/owner/upload_image2/'+ buss_id,
					type: 'post',
					data: formData2, buss_id : buss_id,
					processData: false,
					contentType: false,
					success: function(result) {
						
					}
				});
			}
			if (fileToUpload3 != 'undefined') {
				// provide the form data
				// that would be sent to sever through ajax
				var formData3 = new FormData(),
					modal = $('#error');
				formData3.append("file", fileToUpload3);

				
	
				// now upload the file using $.ajax
				$.ajax({
					//url: uploadURI,
					url: baseurl + 'fees/api/owner/upload_image3/'+ buss_id,
					type: 'post',
					data: formData3, buss_id : buss_id,
					processData: false,
					contentType: false,
					success: function(result) {
						
					}
				});
			}
			if (fileToUpload4 != 'undefined') {
				// provide the form data
				// that would be sent to sever through ajax
				var formData4 = new FormData(),
					modal = $('#error');
				formData4.append("file", fileToUpload4);

				
	
				// now upload the file using $.ajax
				$.ajax({
					//url: uploadURI,
					url: baseurl + 'fees/api/owner/upload_image4/'+ buss_id,
					type: 'post',
					data: formData4, buss_id : buss_id,
					processData: false,
					contentType: false,
					success: function(result) {
						
					}
				});
			}
		});


		
		$('#edit-business-nature').on('click', 'a.add-nature', function(e) {
			e.preventDefault();
			var data = $(this).data(),
				inputs = $('#add-business-lines').serialize(),
				modal = $('#edit-business-nature');
				//alert(data.businessid);
				// nature = $('select.business-nature').val(),
				// capital = $('input.add-capital').val(),
				// requirements = $('input[type="checkbox"]').val();
	
			$.ajax({
				url: baseurl + 'fees/api/owner/add_business_line',
				type: 'post',
				dataType: 'json',
				data: inputs + '&app_id=' + data.appid + '&buss_id=' + data.businessid,
				// {
				// 	app_id: data.appid,
				// 	buss_id: data.businessid,
				// 	buss_nature_id: nature,
				// 	capital: capital
				// 	// requirements:
				// },
				beforeSend: function() {},
				success: function(result) {
					if(result.error === 0) {
						// $.post(baseurl + 'fees/api/owner/update_application', inputs + '&app_id=' + data.appid, function(response) {
						// 	console.log(response);
						// });
						$('#nature-list tbody').business_nature({
							appid: data.appid,
							businessid: data.businessid,
							modal: modal
						});
					} else {
						// Error here
					}
				}
			});
	
		});	
		
		$('select[name="buss_nature_id"]').on('change keyup', function (e) {
			e.preventDefault();
			var val = $(this).val();
			var del = $('#buss_nature_id option[value="'+val+'"]').text();
			$('#delinquent').val(del);
			
			var n = del.indexOf("(Delinquent)");
			if(n >= 0){
				$("#delinquent_year").fadeIn(250);
			}else{ 
				$("#delinquent_year").fadeOut(250);
				$('#delinquent_year').val('');
			}
			//alert(del);
		});

		$('#edit-business-nature').on('click', 'a.retire1', function() { 

			var data = $(this).data(),
			tr = $(this).parent().parent(),
			td = $(this).parent(),
			a = $(this);

			// a.removeClass('edit-nature')
			// 		.removeClass('btn-warning')
			// 		.addClass('save-ready')
			// 		.addClass('btn-danger')
			// 		.attr('title', 'Save');
			// alert(data.potik);
			 a.hide();
			 $('.newCapital'+data.potik).show();
			 $('.anyong'+data.potik).show();

			 $('.newCapital'+data.potik).on('keyup', function() {
				$('.anyong'+data.potik).attr('data-capital', $('.newCapital'+data.potik).val());
			 });

			//alert($('.retire1').attr('data-potik'));

		});

		// $('#edit-business-nature').on('keyup', 'input[name="newCapital"]', function() { 
		// alert($('.newCapital').val());
		// });

		// function ambot(id)
		// {
		// 	alert(id);
		// }

		// Populate business nature table list
		$.fn.business_nature = function(option) {
			var defaults = {
				appid: 0,
				businessid: '',
				modal: ''
			}, o = $.extend(defaults, option);
	
			return this.each(function() {
				var table = $(this);
				//alert('dri'+o.businessid);
				//$('.msg').hide();
				o.modal.find('.msg').hide();
				o.modal.find('a.add-nature').attr('data-appid', o.appid);
				o.modal.find('a.add-nature').attr('data-businessid', o.businessid);
				o.modal.find('input[name="bl_buss_id"]').val(o.businessid);
				o.modal.find('input[name="app_id"]').val(o.appid);
	
				$.ajax({
					url: baseurl + 'fees/api/owner/get_business_nature/' + o.appid,
					type: 'get',
					dataType: 'json',
					beforeSend: function() {
						o.modal.find('.loader').hide().fadeIn();
					},
					success: function(result) {
						if(result.error === 0) {
							var data = result.data,
								list = $('.requirement-list');
							table.html('');
	
							o.modal.find('.loader').fadeOut(function() {
								z = 0;
								for(i in result.data.nature) {
									z++;
									var data = result.data.nature[i],
										tdate = new Date(), tdate = tdate.getFullYear(),
										natureID = data.buss_nature_id,
										tr = $('<tr />').appendTo(table),
										gr = ( $.isEmptyObject(data.gross) ? 0 : $.parseJSON(data.gross)),
										buss_gross = (data.gross==0.00) ? "" : $.parseJSON(data.gross);
										//alert(o.businessid);
			
										o.modal.find('input[name="bl_buss_id"]').val(o.businessid);
										o.modal.find('input[name="app_id"]').val(o.appid);
									if($.isEmptyObject(gr)) {
										$G = parseFloat(data.capital);
										console.log('Capital: ' + data.capital);
									} else {
										for(y in gr) {
											if(gr[y].year == tdate) {
												$G = parseFloat(gr[y].gross);
											} else {
												$G = parseFloat(gr[y].capital);
											}
										}
									}

									if(data.delinquent_year==null || data.delinquent_year==0 ){
										var delinquent_year = "";
									}else{
										var delinquent_year = data.delinquent_year;
									}
	
									if(buss_gross!=""){ //business is renew status
								
											for (ix in buss_gross){
												
												if ((tdate-1)==buss_gross[ix].year){
													$('<td />', { 'class': 'td-center-vert', html: '<span class="nature">' + data.business_nature + '&nbsp;'+delinquent_year+'</span>' }).appendTo(tr);
													$('<td />', {  html:'<div class="form-group">' +
																				'<div class="col-sm-8 input-group">' +
																				'<span class="input-group-addon">₱</span>' +
																				'<input type="text" class="form-control capital" readonly name="capital" value="' + parseFloat(data.capital) + '" />' +
																				//'<input type="text" class="form-control gross" readonly name="gross" value="' + buss_gross[ix].gross + '" />' +
																				//'<input type="hidden" class="form-control year" readonly name="year" value="' + buss_gross[ix].year + '" />' +
																				'<input type="hidden" class="form-control app_id" name="app_id" value="' + data.app_id + '" />' +
																				'<input type="hidden" class="form-control bl_buss_id" name="bl_buss_id" value="' + data.bl_buss_id + '" />' +
																				'<input type="hidden" class="form-control modified" name="modified" value="' + data.modified + '" />' +
																				'<input type="hidden" class="form-control application_id" name="application_id" value="' + data.application_id + '" />' +
																				'</div>' +
																				'</div>' }).appendTo(tr);
	
												
													$('<td />', {
														'class': 'text-center',
														html: '<a title="Update Nature"' +
															'data-businessid="' + o.businessid +
															// '" data-ownerid="' + o.ownerid +
															'" data-buslineid="' + data.bus_line_id +
															'" data-natureid="' + data.buss_nature_id +
															'" data-appid="' + data.app_id +
															'" data-application_id="' + data.application_id +
															'" data-delinquentyear="' + data.delinquent_year +
															'" class="btn btn-warning btn-xs edit-nature"' +
															'href="#"><i class="fa fa-check"></i> ' +
															'</a> <a title="Delete" data-natureid="' +
																data.buss_nature_id + '" data-appid="' + data.app_id + '" data-delinquentyear="' + data.delinquent_year +
																'" class="btn btn-danger btn-xs delete-nature" href="#">' +
																'<i class="fa fa-trash"></i></a> <a data-potik="'+z+'"  title="Retire 123" class="btn btn-success btn-xs retire1" href="#"><i class="fa fa-send-o"></i></a>'+
																' <input class = "form-control newCapital'+ z +'" style = "display:none;" type="text" value ="" placeholder="Please Input new gross" required name="newCapital" /> <a title="Retire" data-businessid="' + o.businessid +'" data-natureid="' +
																data.buss_nature_id + '" data-appid="' + data.app_id +
																'" data-capital="' + document.getElementsByClassName('newCapital'+z).value +
																'" class="btn btn-success btn-xs anyong'+z+' retire"  style = "display:none;" href="#"><i class="fa fa-send-o"></i></a>'
													}).appendTo(tr);
															if(data.unit == "kg"){
																// tr.find('input[name="kg"]').val(data.quantity);
															}else if(data.unit == "l"){
																// tr.find('input[name="l"]').val(data.quantity);
															}else if (data.unit == "m"){
																// tr.find('input[name="m"]').val(data.quantity);
															}else if(data.unit == "t"){
																// tr.find('input[name="t"]').val(data.quantity);
															}
												} else{
													$('<td />', { 'class': 'td-center-vert', html: '<span class="nature">' + data.business_nature + '&nbsp;'+delinquent_year+'</span>' }).appendTo(tr);
													$('<td />', {  html:'<div class="form-group">' +
																				'<div class="col-sm-8 input-group">' +
																				'<span class="input-group-addon">₱</span>' +
																				'<input type="text" class="form-control capital" readonly name="capital" value="' + parseFloat(data.capital) + '" />' +
																				//'<input type="text" class="form-control gross" readonly name="gross" value="' + buss_gross[ix].gross + '" />' +
																				//'<input type="hidden" class="form-control year" readonly name="year" value="' + buss_gross[ix].year + '" />' +
																				'<input type="hidden" class="form-control app_id" name="app_id" value="' + data.app_id + '" />' +
																				'<input type="hidden" class="form-control bl_buss_id" name="bl_buss_id" value="' + data.bl_buss_id + '" />' +
																				'<input type="hidden" class="form-control modified" name="modified" value="' + data.modified + '" />' +
																				'<input type="hidden" class="form-control application_id" name="application_id" value="' + data.application_id + '" />' +
																				'</div>' +
																				'</div>' }).appendTo(tr);
	
												
													$('<td />', {
														'class': 'text-center',
														html: '<a title="Update Nature"' +
															'data-businessid="' + o.businessid +
															// '" data-ownerid="' + o.ownerid +
															'" data-buslineid="' + data.bus_line_id +
															'" data-natureid="' + data.buss_nature_id +
															'" data-appid="' + data.app_id +
															'" data-application_id="' + data.application_id +
															'" data-delinquentyear="' + data.delinquent_year +
															'" class="btn btn-warning btn-xs edit-nature"' +
															'href="#"><i class="fa fa-check"></i> ' +
															'</a> <a title="Delete" data-natureid="' +
																data.buss_nature_id + '" data-appid="' + data.app_id + '" data-delinquentyear="' + data.delinquent_year +
																'" class="btn btn-danger btn-xs delete-nature" href="#">' +
																'<i class="fa fa-trash"></i></a> <a data-potik="'+z+'" title="Retire 123" class="btn btn-success btn-xs retire1" href="#"><i class="fa fa-send-o"></i></a> <input class = "form-control newCapital'+ z +'" style = "display:none;" type="text" value ="" placeholder="Please Input new gross" required name="newCapital" /> <a title="Retire" data-businessid="' + o.businessid +'" data-natureid="' +
																data.buss_nature_id + '" data-appid="' + data.app_id +
																'"  data-capital="' +  document.getElementsByClassName('newCapital'+z).value +
																'" class="btn btn-success btn-xs anyong'+z+' retire"  style = "display:none;" href="#">' +
																'<i class="fa fa-send-o"></i></a>'
													}).appendTo(tr);
															if(data.unit == "kg"){
																// tr.find('input[name="kg"]').val(data.quantity);
															}else if(data.unit == "l"){
																// tr.find('input[name="l"]').val(data.quantity);
															}else if (data.unit == "m"){
																// tr.find('input[name="m"]').val(data.quantity);
															}else if(data.unit == "t"){
																// tr.find('input[name="t"]').val(data.quantity);
															}
												}
											}
										} else { //alert('hoi');
											$('<td />', { 'class': 'td-center-vert', html: '<span class="nature">' + data.business_nature + '&nbsp;'+delinquent_year+'</span>' }).appendTo(tr);
											$('<td />', {  html:'<div class="form-group">' +
																		'<div class="col-sm-8 input-group">' +
																		'<span class="input-group-addon">₱</span>' +
																		'<input type="text" class="form-control capital" readonly name="capital" value="' + parseFloat(data.capital) + '" />' +
																		//'<input type="text" class="form-control gross" readonly name="gross" value="' + buss_gross[ix].gross + '" />' +
																		//'<input type="hidden" class="form-control year" readonly name="year" value="' + buss_gross[ix].year + '" />' +
																		'<input type="hidden" class="form-control app_id" name="app_id" value="' + data.app_id + '" />' +
																		'<input type="hidden" class="form-control bl_buss_id" name="bl_buss_id" value="' + data.bl_buss_id + '" />' +
																		'<input type="hidden" class="form-control modified" name="modified" value="' + data.modified + '" />' +
																		'<input type="hidden" class="form-control application_id" name="application_id" value="' + data.application_id + '" />' +
																		'</div>' +
																		'</div>' }).appendTo(tr);
										
											$('<td />', {
												'class': 'text-center',
												html: '<a title="Update Nature"' +
													'data-businessid="' + o.businessid +
													// '" data-ownerid="' + o.ownerid +
													'" data-buslineid="' + data.bus_line_id +
													'" data-natureid="' + data.buss_nature_id +
													'" data-appid="' + data.app_id +
													'" data-application_id="' + data.application_id +
													'" data-delinquentyear="' + data.delinquent_year +
													'" class="btn btn-warning btn-xs edit-nature"' +
													'href="#"><i class="fa fa-check"></i> ' +
													'</a> <a title="Delete" data-natureid="' +
														data.buss_nature_id + '" data-appid="' + data.app_id + '" data-delinquentyear="' + data.delinquent_year +
														'" class="btn btn-danger btn-xs delete-nature" href="#">' +
														'<i class="fa fa-trash"></i></a> <a data-potik="'+z+'"  title="Retire 123" class="btn btn-success btn-xs retire1" href="#"><i class="fa fa-send-o"></i></a> <input class = "form-control newCapital'+ z +'" style = "display:none;"  type="text" value ="" placeholder="Please Input new gross" required name="newCapital" />  <a title="Retire" data-businessid="' + o.businessid +'" data-natureid="' +
														data.buss_nature_id + '" data-appid="' + data.app_id +
														'"  data-capital="' +  document.getElementsByClassName('newCapital'+z).value +
																'"  class="btn btn-success btn-xs anyong'+z+' retire" style = "display:none;" href="#">' +
														'<i class="fa fa-send-o"></i></a>'
											}).appendTo(tr);
											if(data.unit == "kg"){
												// tr.find('input[name="kg"]').val(data.quantity);
											}else if(data.unit == "l"){
												// tr.find('input[name="l"]').val(data.quantity);
											}else if (data.unit == "m"){
												// tr.find('input[name="m"]').val(data.quantity);
											}else if (data.unit == "t"){
												// tr.find('input[name="t"]').val(data.quantity);
											}
										}
	
										if(!$(this).hasClass('from-table')) {
											list.requirements_edit({ id: natureID });
										}
									/*end of requirements*/
								}
	
							});
						} else {
							$('#nature-list').hide();
							$('.msg').show(); //alert(o.appid);
							show_message($('.messages'), result.message + ' Please choose a nature above.', 'Oops!', 'danger');
						}
					}
				});
			});
		}
	
		// $('#edit-business-nature').on('submit', function(e) {
		// 	e.preventDefault();
		// 	var inputs = $(this).serialize();
		// });
	
		$.fn.requirements = function(option) {
			var defaults = {
				id: ''
			}, o = $.extend(defaults, option);
			return this.each(function() {
				var list = $(this);
				list.html('');
	
				$.getJSON(baseurl + 'fees/api/payment/get_requirements/' + o.id, function(response) {
					if(response.error === 0) {
						//for(col in array_chunk(response.data.requirements, 3)) {
							var cols = $('<div />', { 'class': 'col-sm-6' }).appendTo(list);
							for(i in response.data.requirements) {
								var data = response.data.requirements[i],
									label = $('<label />', {
										'class': 'checkbox-inline col-sm-12'
									}).appendTo(cols),
									checkbox = $('<input />', {
										type: 'checkbox',
										'class': 'checkbox-item',
										name: 'requirements[]',
										value: data.requirement_id
									}).appendTo(label);
								$('<span />', {
									text: data.description
								}).appendTo(label);
							}
						//}
					} else {
						// Error here
						$('<p />', { text: response.message }).appendTo(list);
					}
				});
			});
		};
	
		/*plug in requirements for edit application*/
		$.fn.requirements_edit = function(option) {
			var defaults = {
				id: ''
			}, o = $.extend(defaults, option);
			return this.each(function() {
				var list = $(this);
				list.html('');
	
				$.getJSON(baseurl + 'fees/api/payment/get_requirements/' + o.id, function(response) {
					if(response.error === 0) {
						//for(col in array_chunk(response.data.requirements, 3)) {
							var cols = $('<div />', { 'class': 'col-sm-6' }).appendTo(list);
							for(i in response.data.requirements) {
								var data = response.data.requirements[i],
									label = $('<label />', {
										'class': 'checkbox-inline col-sm-12'
									}).appendTo(cols),
									checkbox = $('<input />', {
										type: 'checkbox',
										'class': 'checkbox-item',
										'checked' : 'checked',
										name: 'requirements[]',
										value: data.requirement_id
									}).appendTo(label);
								$('<span />', {
									text: data.description
								}).appendTo(label);
							}
						//}
					} else {
						// Error here
						$('<p />', { text: response.message }).appendTo(list);
					}
				});
			});
		};
		/*end of plugin*/
		/* --------------------
		 * Show Range Values
		 * -------------------- */
		$('#assess').on('click', 'p.show-range', function() {
			$(this).parent().find('.slide-range').slideToggle('slow');
		});

		/* --------------------
		 * Show Range Values
		 * -------------------- */
		$('#retire-pay').on('click', 'p.show-range', function() {
			$(this).parent().find('.slide-range').slideToggle('slow');
		});
	
		/* --------------------
		 * Show Range Values
		 * -------------------- */
		$('#reassess').on('click', 'p.show-range', function() {
			$(this).parent().find('.slide-range').slideToggle('slow');
		});
	
		/*-----------------------
		 * Show Assessment form
		  *-----------------------*/
		 

		 $('table#assess tbody').on('click', 'a.assess', function(e){
			  e.preventDefault();
			  var data = $(this).data(),value1 = '',
				  modal = $('#assess');
	
			modal.modal('show');
	
			  $.ajax({
				  url: baseurl + 'fees/api/owner/assess/' + data.appid,
				  type: 'get',
				  dataType: 'json',
				  /* beforeSend: function() {
					  modal.find();
				  }, */
				  success: function(result) {
					  if(result.error === 0) {
						  var details = result.data.business,
							recent_year = new Date(),
							recent_year = recent_year.getFullYear(),
							buss_app_date = new Date(result.data.business[0].application_date),
							assessment_year = new Date(result.data.business[0].assessment_date),
							reqs = result.data.business[0].reqs,	
							assessment_year = assessment_year.getFullYear(),
							buss_app_date =	 buss_app_date.getFullYear();
							due = result.data.due_date,
							form = $('#assess'),
							breakdowns = [],
							int_n_sur = [],
							tfos = [],
							tfosJSON = "",
							addttfoJSON = "",
							breakdownsJSON = "",
							subtotal = 0, 
							total = 0,
							given_surcharge = 0,interest = 0;
							i=0;
						    $C=0,
						//   $total_penalty,
							$capital=0,
							table = form.find('table tbody'),
							tfo_name = '',
							numaddtfo = $('div.row.numaddtfo'),
							numaddtfotable = numaddtfo.find('table'),
							addttfos = $('div.row.addttfos'),
							addttfostable = addttfos.find('table1'),
							addt_subtotal = 0,
							addtfogarbage = 0,
							bussx = 0,
							garbagex = 0,
							appendaddtfo='';
	
						 $('form.assessment div.hiddenfields').find('input[name ="breakdowns"]').val('');
						 $('form.assessment div.hiddenfields').find('input[name ="total"]').val('');
						 $('form.assessment div.totals span.total-amount').text(currencyFormat(parseFloat(0)));
						 $('form.assessment div.hiddenfields').find('input[name="addtltfo"]').val('');
						  form.find('.header-detail span.owner').text(capitalize(details[0].firstname + ' ' + details[0].middlename + ' ' + details[0].lastname === 'N/A' ? details[0].business_name : details[0].firstname + ' ' + details[0].middlename + ' ' + details[0].lastname));
						  form.find('.header-detail span.business').text(capitalize(details[0].business_name));
							form.find('.header-detail span.payment').text(capitalize(details[0].payment_type));
							
	
						$('div.ass_btns').append('<a href="' + baseurl + 'fees/printAssessment/' +data.appid + '" call target="_blank" class="btn btn-outline btn-info print-assessment disabled"><i class="fa fa-print"></i> Print</a>');
	
						  var business_natures = $('.business-natures'),
							  clone = $('.clones .clone').clone(),
							  container = $('.excesstfo');
	
						  var qtfo = 0, pquarter = 0, // Quarterly TFO
							  atfo = 0, annually = 0, // Annually TFO
							btfo = 0, biannual = 0, //Bi annually
							tax  = 0;
	
						var breakdown1 = $('div.row.addttfos'),
							ztable = breakdown1.find('table');
							ztable.find('tbody').html('');
							breakdown1.show();
							var addttfototal=0;
							for(aa in result.data.addttfo){
								var valuesss = result.data.addttfo[aa];
								
								var addtt = $('<tr />').appendTo(ztable.find('tbody'));
		
								$('<td />', { text: valuesss.tfo}).appendTo(addtt);
								$('<td />', { text: currencyFormat(parseFloat(valuesss.addttfoamount))}).appendTo(addtt);
							//TOTAL AMOUNT OF ADDITIONAL TFO ADDED
								addttfototal += parseFloat(valuesss.addttfoamount);
							}

							//requirements checking
							
							var myobj = reqs.split(",");

							// console.log(myobj);
							
							if(myobj=="1,2,3"){
								form.find('div.warning').attr('class','hidden');
							}
							else{
								form.find('div.success').attr('class','hidden');
							}	


						var dues = new Array();
	
						  business_natures.html('');
	
							for(var i in details) {
								var tdate = new Date(), tdate = tdate.getFullYear(),
									n=0,ai=i,
									total_emp =result.data.total_emp,
									buss_app_date = new Date(details[i].application_date),
									buss_app_date = buss_app_date.getFullYear(),
									date_renewed = new Date(details[0].date_renewed),
									date_renewed  =date_renewed.getFullYear(),
									gr = (details[i].gross != "[]") ? details[i].gross : "" ,
									payment_mode=details[i].payment_id;
	
									if($.isEmptyObject(gr)) {
										$C = parseFloat(details[i].capital);
									} else {
										var $Y,
											gross = $.parseJSON(details[i].gross);
										for(y in gross) {
											if(gross[y].year == tdate) {
												$C = parseFloat(gross[y].gross.replace(/\,/g,''));
												$Y =  gross[y].year;
											} else {
												//$C = parseFloat(gr[y].gross.replace(/\,/g,''));
												console.log(gross);
												$C = parseFloat(gross[y].gross);
												$Y =  gross[y].year;
											}
										}
									}
									console.log('Capitallllll: ' + $C);
									// $('form.assessment div.pena').find('span.penalty').val($C);
									// $('form.assessment div.pena span.penalty').text(currencyFormat($C));
									// alert('kalagot na');

									

									var datenew = new Date();
									
										var dd = datenew.getDate();
										var mm = datenew.getMonth()+1; //January is 0!
										var yyyy = datenew.getFullYear();
										if(dd < 10)
										{
											dd = '0'+ dd;
										}
										if(mm < 10)
										{
											mm = '0' + mm;
										}
										var datenew = mm+'-'+dd+'-'+yyyy;
					
										var datenew2 = new Date();
										
											var dd = datenew2.getDate();
											var mm = datenew2.getMonth()+1; //January is 0!
											var yyyy = datenew2.getFullYear();
											if(dd < 10)
											{
												dd = '0'+ dd;
											}
											if(mm < 10)
											{
												mm = '0' + mm;
											}
											var datenew2 = yyyy+'-'+mm+'-'+dd;
					
										form.find('.header-detail span.assess_date').text(capitalize(datenew));
										$('form.assessment div.hiddenfields').find('input[name="assessment_date"]').val(datenew2);
									$capital=$C;
									$total_penalty = 0;
									clone.clone(true).find('.business-detail').each(function() {
										/*$(this).find('span.nature').text(capitalize(details[i].business_nature));
										$(this).find('span.address').text(capitalize(details[i].street_address));
										$(this).find('span.capital').text(currencyFormat($C));*/
										if(details[i].delinquent_year > 0){
											var delinquent_year = "- "+details[i].delinquent_year;
										}else{
											var delinquent_year = "";
										}
										$(this).find('span.nature').text(details[i].business_nature);
										$(this).find('span.delinquent').text(delinquent_year);
										$(this).find('span.address').text(details[i].brgy);
										$(this).find('span.capital').text(currencyFormat($C));
										// $('form.assessment div.pena span.penalty').text(currencyFormat($C));
										// $(this).find('input[name="penalty"]').val(currencyFormat($C * 0.0245));
										
										$pen = $C * 0.0245 ;
										$total_penalty += $pen;
										// alert($total_penalty);
										// alert($total_penalty);
									}).end()
									
	
									// $('form.assessment').find('.pena').each(function() {
									// 	$(this).find('span.penalty').text(currencyFormat($C * 0.0245));
									// }).end()
	
	
									.find('table').each(function() {
										var tbl = $(this).find('tbody'),
											msg = $(this).parent().find('.messages'),
											subtotal = 0.00; 
										tbl.html('');
										var assess_btn = result.data.ignore[0];
										// console.log('testing');
										console.log(details[0].assess_status);
											if(result.data.ignore[0] === "true" && details[0].payment_id == null) {
												show_message(msg, 'This Business is already assessed. Please proceed to Payment.', 'Information!', 'info');
												form.find('button.assess-now').attr('disabled', true);
												form.find('a.print-assessment').attr('class', 'btn btn-outline btn-info print-assessment')
												form.find('div.numaddtfo').attr('class','row numaddtfo hidden');
												// form.find('div.additionaltfoss').attr('class','row additionaltfoss');
											
											} else if (details[0].assess_status == 'paid'){
												show_message(msg, 'This Business is already assessed.', 'Information!', 'info');
												form.find('button.assess-now').attr('disabled', true);
												form.find('a.print-assessment').attr('class', 'btn btn-outline btn-info print-assessment');
												form.find('div.numaddtfo').attr('class','row numaddtfo hidden');
												form.find('div.addttfos').attr('class','row addttfos');
												// form.find('div.additionaltfoss').attr('class','row additionaltfoss');
											
											}else if (details[0].assess_status == 'unpaid'){
												show_message(msg, 'This Business is already assessed. Please proceed to Payment.', 'Information!', 'info');
												form.find('button.assess-now').attr('disabled', true);
												form.find('a.print-assessment').attr('class', 'btn btn-outline btn-info print-assessment');
												form.find('div.numaddtfo').attr('class','row numaddtfo hidden');
												form.find('div.addttfos').attr('class','row addttfos');
												// form.find('div.additionaltfoss').attr('class','row additionaltfoss');
											
											} else if ((details[0].renew_id == null) && details[0].application_id == 2 && date_renewed!=tdate) {
												show_message(msg, 'Please renew your business and proceed to Assessment tab.', 'Information!', 'danger');
												form.find('a.assess-now').attr('disabled', true);
												/*}else if(details[0].payment_id != null && details[0].renew_id != null && details[0].releasing_id == null) {
												show_message(msg, 'This Business is already assessed and paid. Please proceed to Releasing.', 'Information!', 'info');
												form.find('a.assess-now').attr('disabled', true);*/
											}else if(details[0].assessment_date!=tdate && details[0].assess_status== "unpaid"){
												show_message(msg, 'Please assess the business NOW.', 'Information!', 'info');
												form.find('a.assess-now').attr('disabled', false);
											} else {
												form.find('a.assess-now').attr('disabled', false);
											}
											
										for(indx in result.data.tfos[i]) {
											var tfo_amount = 0;
											var fees = result.data.tfos[i][indx],
												tr = $('<tr />').appendTo(tbl),
												value = '', gross = 0,subtotal_tfo = 0;
												
											if(result.data.required.length > 0) {
												form.find('a.approve-now').attr('disabled', true);
												form.find('a.clear-requirements').attr('disabled', false);
												show_message(msg, 'Missing requirement: \r\n<strong>' + result.data.required[i].join(', ') + '</strong>', 'Warning!', 'danger');
											} else {
												form.find('a.approve-now').attr('disabled', false);
												form.find('a.clear-requirements').attr('disabled', true);
											}
									
											if(fees.type == 1) { // Constant

													//exemption
													if(details[0].ownership_id==5 || details[0].ownership_id==10){
														
														if(fees.tfo_id==22){
															subtotal=0;			
														}
														
													}
		
												if(details[i].percentage > 0){
													subtotal = eval(parseFloat(fees.value) * (details[i].percentage/100));
												}else{
													subtotal = eval(parseFloat(fees.value));
												}
												subtotal = eval(parseFloat(fees.value) * details[i].percentage);
												subtotal = subtotal + parseFloat(fees.value);

												// FOR DIVISION QUARTERLY or BIANNUAL
												if(fees.tfo_id==2){
													subtotal = parseFloat(fees.value);
													garbagex += subtotal;
												} 
												if(fees.tfo_id==22){
													bussx += subtotal;
												} 
											
												if(fees.tfo == 'OCCUPATION TAX'){
													subtotal = eval(parseFloat(fees.value) * total_emp);
													//subtotal = eval(parseFloat(fees.value));
												}else{
													subtotal = parseFloat(fees.value);
												}
												//alert(subtotal);
												value = '<span class="pull-left label label-info">Constant</span><span class="pull-left">&nbsp;&nbsp;&nbsp;&nbsp;&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat(subtotal)) + '</strong></span>';
	
												if(details[i].payment_id == 1) {
												/*****
													If business is Annually
													all tfos that are payable at once
												***/
	
													atfo = subtotal;
													annually = annually + atfo;
													tfo_amount = tfo_amount + annually ;
												} else if(details[i].payment_id == 2) {
	
												/*****
													If business is semi-annual
													some tfos that are payable at once
													and one semi-annual which is the business tax
												***/
	
												/* traces if tfo is set as annual-meaning they'll be paid at once*/
													if (fees.tfo_type == 1){
														btfo = subtotal / 2;
														biannual = biannual + btfo;
													} else {
														btfo = subtotal;
														annually = annually + btfo;
														tfo_amount = tfo_amount + btfo;
													}
	
												} else if(details[i].payment_id == 3) {		//Business paymentmode is of Quarterly
													if (fees.tfo_type == 1){
														qtfo = subtotal / 4;
														console.log('tfo_amount='+tfo_amount);
														pquarter = pquarter + qtfo;
														tfo_amount=tfo_amount + pquarter;
													} else {
														qtfo = subtotal;
														annually = annually + qtfo;
													}
	
												}
	
												/*****
													Checks if the business has/has no assessment for the current year
													If if no assessment has happened the current year then surcharge
													and interest should be added to the total payment
												***/
	
												if (fees.tfo_type == 1){
													//if (result.data.no_assessment == 0){
	
														surcharges = result.data.add_surcharge;
														given_surcharge = given_surcharge + parseFloat(eval(tfo_amount * surcharges[0].surcharge));
														interest = interest + parseFloat((eval(tfo_amount * surcharges[0].interest) * result.data.number_of_months));
													
													if(details[i].delinquent_year > 0){ 
														tfos.push({'tfo':fees.tfo_id,'amount': subtotal, 'nature': details[i].business_nature,'delinquent': details[i].delinquent_year,'gross': $capital});
													}else{
														tfos.push({'tfo':fees.tfo_id,'amount': subtotal, 'nature': details[i].business_nature,'gross': $capital});
													}

													// tfos.push({'tfo':fees.tfo_id,'amount': subtotal, 'nature': details[i].business_nature,'gross': $capital});
												}else{
													surcharges = result.data.add_surcharge;
													if(details[i].delinquent_year > 0){ 
														tfos.push({'tfo':fees.tfo_id,'amount': subtotal, 'nature': details[i].business_nature,'delinquent': details[i].delinquent_year});
													}else{
														tfos.push({'tfo':fees.tfo_id,'amount': subtotal, 'nature': details[i].business_nature});
													}
												//	tfos.push({'tfo':fees.tfo_id,'amount': subtotal,'nature': details[i].business_natures});
												}
	
											} else if(fees.type == 2) { /** TFO is of Formula  type */
	
												var variables = $.parseJSON(fees.variables),
													  formula = fees.value,
													default_var = fees.amount;
												$C=$capital;
												extract(variables);
												var amt = 0,
														amt1 = 0;
														//amt1 = eval(amt * (details[i].percentage/100));
													
														if(details[i].percentage > 0){
																$C = eval($C + ($C*(details[i].percentage)/100));
																amt =  eval(formula);
																//amt1 = eval(amt * (details[i].percentage/100));
														} else{
															 amt1 = eval(formula);
														}
														amt = amt + amt1;
												subtotal = parseFloat(amt);
												value = '<span class="pull-left label label-success">Formula</span><span class="pull-left">&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="pull-right"><strong>'+ '(' + fees.value + ')' + ' ' + currencyFormat(parseFloat(amt)) + '</strong></span>';
	
												//exemption
												if(details[0].ownership_id==5 || details[0].ownership_id==10){
													
													if(fees.tfo_id==22){
														subtotal=0;			
													}
													
												}
												
												// FOR DIVISION QUARTERLY or BIANNUAL
												if(fees.tfo_id==22){
													bussx += subtotal;
												} 
												
												

												if(details[i].payment_id == 1) {
												/*****
													If business is Annually
													tfos should be payable at once
												***/
	
													atfo = subtotal;
													annually = annually + atfo;
													tfo_amount	= tfo_amount + annually;
	
												} else if(details[i].payment_id == 2) {
												/*****
													If business is Semi-Annual
													there are tfos that are payable at once
													and one semi-annual tfo (business tax)
												***/
	
														/* traces if tfo is set as annual-meaning they'll be paid at once*/
	
														if (fees.tfo_type == 1){
	
																btfo = amt / 2;
																biannual = biannual + btfo;
																tfo_amount = biannual;
														} else {
															btfo = subtotal;
															annually = annually + btfo;
															tfo_amount = tfo_amount + biannual;
														}
	
												} else if(details[i].payment_id == 3) {
												/*****
													If business is Quarterly
													there are tfos that are payable at once
													and one quarterly tfo (business tax)
												***/
	
														if (fees.tfo_type == 1){
																qtfo = subtotal / 4;
																pquarter = pquarter + qtfo;
	
														} else {
															qtfo = subtotal;
															annually = annually + qtfo; /* to get the annual tfos*/
															tfo_amount = tfo_amount + pquarter;
	
														}
	
												}
												/*****
													Checks if the business has/has no assessment for the current year
													If if no assessment has happened the current year then surcharge
													and interest should be added to the total payment
												***/
	
												if (fees.tfo_type == 1 && result.data.number_of_months > 0){
	
														surcharges = result.data.add_surcharge;
														given_surcharge = given_surcharge + parseFloat(eval(subtotal * surcharges[0].surcharge));
														interest = interest + parseFloat((eval(subtotal * surcharges[0].interest) * result.data.number_of_months));
														if(details[i].delinquent_year > 0){ 
															tfos.push({'tfo':fees.tfo_id,'amount': subtotal, 'nature': details[i].business_nature,'delinquent': details[i].delinquent_year,'gross': $C});
														}else{
															tfos.push({'tfo':fees.tfo_id,'amount': subtotal, 'nature': details[i].business_nature,'gross': $C});
														}
														//tfos.push({'tfo':fees.tfo_id,'amount': subtotal, 'nature': details[i].business_nature,'gross': $C});
												}else{
													surcharges = result.data.add_surcharge;
													if(details[i].delinquent_year > 0){ 
														tfos.push({'tfo':fees.tfo_id,'amount': subtotal, 'nature': details[i].business_nature,'delinquent': details[i].delinquent_year});
													}else{
														tfos.push({'tfo':fees.tfo_id,'amount': subtotal, 'nature': details[i].business_nature});
													}
												//	tfos.push({'tfo':fees.tfo_id,'amount': subtotal,'nature': details[i].business_nature});
												}
											//tfos.push({'tfo':fees.tfo_id,'amount': subtotal});
										} else if(fees.type == 3 && (fees.subtype == 0 || fees.subtype == 1 || fees.subtype == 2)) {			// Range
											//console.log('hoi');
											
												var inrange=false, tfo_amount=0,amt1=0;
												values = $.parseJSON(fees.value);
												value = '<div class="range-list">' +
												'<p class="btn btn-xs btn-info show-range">Click to view Range <span class="caret"></span></p>' +
												'<div class="slide-range" style="display: none;">';

												
													for(index in values) {
	
														var cp = $C,
															min = parseFloat(values[index].min),
															max = parseFloat(values[index].max);
		
																
														//this starts the displaying of range,formula
														if (typeof values[index].formula == 'undefined'){ //fitted for range alone
	
															value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].min)) + '</span> - ';
															value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].max)) + '</span> = ';
															value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].value)) + '</span><br/>';
	
														} //end of fitted for range alone
	
														else if( values[index].type!= 'formula'){ // range has formula
															console.log('hahahahahha='+typeof values[index].type);
															value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].min)) + '</span> - ';
															value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].max)) + ' </span> = ';
															value += '<span class="badge badge-default">&#8369;' + values[index].formula + '</span><br/>';
															if( typeof values[index].formula == "undefined"){
																value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].max)) + '</span> = ';
																value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].value)) + '</span><br/>';
															} else if (typeof values[index].e2 == 'undefined') {
																value += '<span class="badge badge-default">' + 'up' + '</span> = ';
																value += '<span class="badge badge-default">' + values[index].formula + '</span><br />';
															}  else if (typeof values[index].e2 != 'undefined' && values[index].e2 !=0){
																value += '<span class="badge badge-default">' + 'For every &#8369;'+ currencyFormat(parseFloat(values[index].e2 ))+' in excess of &#8369;' + currencyFormat(parseFloat(values[index].min))+ '</span> = ';
																value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].valueadded))+ '</span>';
															}
	
														} else{ //alert('duh');
															value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].min)) + ' </span> = ';
															value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].max)) + ' </span> = ';
															value += '<span class="badge badge-default">' + values[index].formula + '</span><br />';
														}
														//this ends the displaying of range,formula
													
														if($capital >= min && $capital <= max && (typeof values[index].type == 'undefined')){
															console.log('capital '+$capital +' >= ' +  min +' && capital='+ $capital + '<=' + max);
														
															if(details[0].percentage > 0){
	
															}else{
	
															}
															subtotal = parseFloat(values[index].value);
															// amt1 = eval(subtotal * (details[0].percentage/100));
															// subtotal = subtotal + amt1;
															tfo_amount = subtotal; //alert('subtotal='+subtotal);
															inrange = true;
															
															//exemption
															if(details[0].ownership_id==5 || details[0].ownership_id==10){
																
																if(fees.tfo_id==22){
																	tfo_amount=0;			
																}
																
															}
																		
															// FOR DIVISION QUARTERLY or BIANNUAL
															if(fees.tfo_id==22){
																bussx += tfo_amount;
															} 
															// alert('1');	
															
														} else if(!inrange && (values[index].e2 == '0') && (typeof values[index].e2 == 'undefined')){ //not in range so we use the formula
															// alert('2');	
															
															var formula_excess = values[index].formula,
																$base = values[index].base,
																amt = eval(formula_excess);
	
																if(details[i].percentage > 0){
																	amt1 = eval(amt1 * (details[i].percentage/100));
																	amt = amt + amt1;
																}else{
																	amt1 = eval(amt1);
																	amt = amt + amt1;
																}
	
																if($C !=0){
																	if(amt < $base){
																		subtotal = eval(parseFloat($base) + parseFloat(amt));
																	} else if(amt > $base) {
																		subtotal = parseFloat(amt);
																	} else {
																		subtotal = 0;
																	}
																} else {
																	subtotal = 0.00;
																}
																tfo_amount = subtotal;

																//exemption
																if(details[0].ownership_id==5 || details[0].ownership_id==10){
																	
																	if(fees.tfo_id==22){
																		tfo_amount=0;			
																	}
																	
																}
																// FOR DIVISION QUARTERLY or BIANNUAL
																if(fees.tfo_id==22){
																	bussx += tfo_amount;
																} 
																
														} //end of not in range
														else if ( values[index].e2 != '0' && typeof values[index].e2 != 'undefined' && values[index].type != 'formula'){ // in excess
														// alert("3");
															var formula_excess = values[index].formula,
																$E1 = values[index].e1,
																$E2 = values[index].e2,
																$V = values[index].valueadded,
																$base = values[index].base,
																amt = eval(formula_excess);
																amt1 = eval(amt1 * (details[i].percentage/100));
																amt = amt + amt1;
																	if($C !=0){
																		if(amt < $base ){
																			subtotal = eval(parseFloat($base) + parseFloat(amt));
																		} else if (amt > $base){
																			subtotal = parseFloat(amt);
																		} else{
																			subtotal = 0.00;
																		}
																	} else {
																		subtotal = 0.00;
																	}
															tfo_amount = subtotal;

															//exemption
															if(details[0].ownership_id==5 || details[0].ownership_id==10){
																
																if(fees.tfo_id==22){
																	tfo_amount=0;			
																}
																
															}
															// FOR DIVISION QUARTERLY or BIANNUAL
															if(fees.tfo_id==22){
																bussx += tfo_amount;
															} 
															
														} //end of e2 not undefined
														else if(values[index].type == 'formula'  && (!inrange)){
															
																if($capital >= min && $capital <= max ) {
																	var formula = values[index].formula,
																			$C = $capital,
																			amt1; 
																			// alert(formula);
																	subtotal= eval(formula);
																	// amt1 = subtotal + ((details[i].percentage)/100);
																	// amt1 = amt1 + subtotal
																	tfo_amount = subtotal;
																	
																	//exemption
																	if(details[0].ownership_id==5 || details[0].ownership_id==10){
																		
																		if(fees.tfo_id==22){
																			tfo_amount=0;			
																		}
																		
																	}
																	// FOR DIVISION QUARTERLY or BIANNUAL

																	if(fees.tfo_id==22){
																		bussx += subtotal;
																	} 
																	
																
																}else {
	
																}
	
														}
														else {
															//console.log('min='+min+'  max='+max + ' capital='+$capital+'values[index].type='+values[index].type);
														}
														
														
														//alert('subtotal dri kai '+subtotal);
														//this ends the computation of  tfos
														if(details[i].payment_id == 1 && (!inrange)) {
	
																 atfo = subtotal;
																 annually = annually + atfo;
																 tfo_amount = subtotal;
															//exemption
															if(details[0].ownership_id==5 || details[0].ownership_id==10){
																
																if(fees.tfo_id==22){
																	tfo_amount=0;			
																}
																
															}
														
													
																 //tfo_amount = annually;console.log('tfo_amount diri='+tfo_amount);
	
													 } else if (details[i].payment_id == 2 && (!inrange)){
															 if (fees.tfo_type == 1){  //Signifies that the tfo is a business tax....
																	 btfo = subtotal / 2;
																	 biannual = biannual + btfo;
															 } else {
																	 btfo = subtotal;
																	 annually = annually + btfo;
																	 tfo_amount = tfo_amount + btfo;
															 }

															 //exemption
															 if(details[0].ownership_id==5 || details[0].ownership_id==10){
																
																if(fees.tfo_id==22){
																	tfo_amount=0;			
																}
																
															}
															
															
	
													 } else if (details[i].payment_id == 3 && (!inrange)){
													
														 pquarter=0;
															 if (fees.tfo_type == 1){  //Signifies that the tfo is a business tax....
																	 qtfo = subtotal / 4;
																	 pquarter = pquarter + qtfo;
																	 console.log('pquarter dri='+pquarter+' annually='+annually);
																	 //alert(pquarter);
															 } else {
																	 qtfo = subtotal;
																	 annually = annually + qtfo;
																	 tfo_amount = tfo_amount + qtfo;
															 }
															 tfo_amount = subtotal;
															 //exemption
															 if(details[0].ownership_id==5 || details[0].ownership_id==10){
																
																if(fees.tfo_id==22){
																	tfo_amount=0;			
																}
																
															}
															
													 }
	
													} //end of  for
													if (fees.tfo_type === '1' && result.data.number_of_months > 0){
															surcharges = result.data.add_surcharge;
															given_surcharge = given_surcharge + parseFloat(eval(tfo_amount * surcharges[0].surcharge));
															interest = interest + parseFloat((eval(tfo_amount * surcharges[0].interest) * result.data.number_of_months));
															if(details[i].delinquent_year > 0){ 
																tfos.push({'tfo':fees.tfo_id,'amount': subtotal, 'nature': details[i].business_nature,'delinquent': details[i].delinquent_year,'gross': $C});
															}else{
																tfos.push({'tfo':fees.tfo_id,'amount': subtotal, 'nature': details[i].business_nature,'gross': $C});
															}
															//	tfos.push({'tfo':fees.tfo_id,'amount': subtotal, 'nature': details[i].business_nature ,'gross': $C});
													}else{ //alert(details[i].business_nature);
															surcharges = result.data.add_surcharge;
															if(details[i].delinquent_year > 0){ 
																tfos.push({'tfo':fees.tfo_id,'amount': subtotal, 'nature': details[i].business_nature,'delinquent': details[i].delinquent_year});
															}else{
																tfos.push({'tfo':fees.tfo_id,'amount': subtotal, 'nature': details[i].business_nature});
															}
														//	 tfos.push({'tfo':fees.tfo_id,'amount': subtotal,'nature': details[i].business_nature});
													}
										
											} else if(fees.subtype == 4 && fees.type == 3){
	
												values = $.parseJSON(fees.value);
												value = '<div class="range-list">' +
												'<p class="btn btn-xs btn-info show-range">Click to view Range for meter <span class="caret"></span></p>' +
												'<div class="slide-range" style="display: none;">';
	
												for(index in values) {
													var q = details[i].quantity,
													min = parseFloat(values[index].min),
													max = parseFloat(values[index].max);
	
													value += '<span class="badge badge-default">' + (parseFloat(values[index].min)) + '-m</span> - ';
													value += '<span class="badge badge-default">' + (parseFloat(values[index].max)) + '-m</span> = ';
													value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].value)) + '</span><br/>';
	
													if(q >= min && q <= max) { //range in meter
														subtotal = parseFloat(values[index].value);
														amt1 = eval(subtotal * (details[i].percentage/100));
														subtotal = subtotal + amt1;
														tfo_amount = subtotal;
														//value = '<span class="badge badge-default">' + q+' '+details[i].unit + '</span><br/>';

															//exemption
															if(details[0].ownership_id==5 || details[0].ownership_id==10){
																
																if(fees.tfo_id==22){
																	tfo_amount=0;			
																}
																
															} 
														
														// FOR DIVISION QUARTERLY or BIANNUAL
															if(fees.tfo_id==22){
																bussx += tfo_amount;
															} 

													}
												}
											}  else if(fees.subtype == 5 && fees.type == 3){
	
												values = $.parseJSON(fees.value);
												value = '<div class="range-list">' +
												'<p class="btn btn-xs btn-info show-range">Click to view Range for kg <span class="caret"></span></p>' +
												'<div class="slide-range" style="display: none;">';
	
												for(index in values) {
													var q = details[i].quantity,
													min = parseFloat(values[index].min),
													max = parseFloat(values[index].max);
	
													value += '<span class="badge badge-default">' + (parseFloat(values[index].min)) + '-kg</span> - ';
													value += '<span class="badge badge-default">' + (parseFloat(values[index].max)) + '-kg</span> = ';
													value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].value)) + '</span><br/>';
	
													if(q >= min && q <= max) { //range in meter
														subtotal = parseFloat(values[index].value);
														amt1 = eval(subtotal * (details[i].percentage/100));
														subtotal = subtotal + amt1;
														tfo_amount = subtotal;
														 
														//exemption
														if(details[0].ownership_id==5 || details[0].ownership_id==10){
															
															if(fees.tfo_id==22){
																tfo_amount=0;			
															}
															
														}
														// FOR DIVISION QUARTERLY or BIANNUAL
														if(fees.tfo_id==22){
															bussx += tfo_amount;
														} 
														
											
														//value = '<span class="badge badge-default">' + q+' '+details[i].unit + '</span><br/>';
													}
												}
											}  else if(fees.subtype == 6 && fees.type == 3){
	
												values = $.parseJSON(fees.value);
												value = '<div class="range-list">' +
												'<p class="btn btn-xs btn-info show-range">Click to view Range for liter <span class="caret"></span></p>' +
												'<div class="slide-range" style="display: none;">';
	
												for(index in values) {
													var q = details[i].quantity,
													min = parseFloat(values[index].min),
													max = parseFloat(values[index].max);
	
													value += '<span class="badge badge-default">' + (parseFloat(values[index].min)) + '-l</span> - ';
													value += '<span class="badge badge-default">' + (parseFloat(values[index].max)) + '-l</span> = ';
													value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].value)) + '</span><br/>';
	
													if(q >= min && q <= max) { //range in meter
														subtotal = parseFloat(values[index].value);
														amt1 = eval(subtotal * (details[i].percentage/100));
														subtotal = subtotal + amt1;
														tfo_amount = subtotal;
														
														//exemption
														if(details[0].ownership_id==5 || details[0].ownership_id==10){
															
															if(fees.tfo_id==22){
																tfo_amount=0;			
															}
															
														}
														// FOR DIVISION QUARTERLY or BIANNUAL
														if(fees.tfo_id==22){
															bussx += tfo_amount;
														} 
														
														//value = '<span class="badge badge-default">' + q+' '+details[i].unit + '</span><br/>';
													}
												}
											}
	
	
											total += subtotal;
											subtotal_tfo +=tfo_amount;
											$tfo_amount = 0;
											tfosJSON = JSON.stringify(tfos);
	
											/*Display of tfos*/
	
											//alert(details[i].business_nature);
											// alert(fees.tfo_type);
											if(fees.tfo_type === '1'){
												$('<td />', { text: fees.tfo + ' ('+details[i].business_nature + ')' }).appendTo(tr);
											}else{
												$('<td />', { text: fees.tfo}).appendTo(tr);
											}
											if(details[i].payment_id == 1) {		// Annually
													$('<td />', { html: value }).appendTo(tr);
													$('<td />', { html: '<span class="pull-left">&#8369 </span><span class="pull-right">' + currencyFormat(subtotal) + '</span>' }).appendTo(tr);
													// $('<td />', { html: '<span class="penalty"></span>' }).appendTo(tr);
													// PENALTY <span class="penalty"></span>
													// alert('annually');
													// alert('MAKALAGOT JUD CYA! Annual ni cya');
													// console.log('annually');
											} else if(details[i].payment_id == 2) {		// Semi-Annual
												if(fees.payment_id == 1) {
													$('<td />', { html: value }).appendTo(tr);
													$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right">' + currencyFormat(subtotal) + '</span>' }).appendTo(tr);
													// alert('Semi-Annual');
													// console.log('Semi-Annual');
												} else if(fees.payment_id == 2){
													$('<td />', { html: value }).appendTo(tr);
													$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right">' + currencyFormat(subtotal) + '</span>' }).appendTo(tr);
												}
											} else if(details[i].payment_id == 3) {		// Quarterly
	
												if(fees.payment_id == 1) {
													$('<td />', { html: value }).appendTo(tr);
													$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right">' + currencyFormat(subtotal) + '</span>' }).appendTo(tr);
												} else if(fees.payment_id == 2) {
													$('<td />', { html: value }).appendTo(tr);
													$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right">' + currencyFormat(subtotal) + '</span>' }).appendTo(tr);
												} else if(fees.payment_id == 3) {
													$('<td />', { html: value }).appendTo(tr);
													$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right">' + currencyFormat(subtotal) + '</span>' }).appendTo(tr);
												}
											}
	
										tfo_amount = 0;
										}
	
										form.find('a.clear-requirements').data('app-id', details[i].app_id);
										form.find('a.clear-requirements').data('nature-id', details[i].buss_nature_id);
										form.find('.totals span.total-amount').text(currencyFormat(parseFloat(total )));

											
										
										$('form.assessment div.hiddenfields').find('input[name="tfos"]').val(tfosJSON);
										$('form.assessment div.hiddenfields').find('input[name="total_tax_due"]').val(total);
										$('form.assessment div.hiddenfields').find('input[name="app_id"]').val(details[i].app_id);
										$('form.assessment div.hiddenfields').find('input[name="application_id"]').val(details[i].application_id);
										$('form.assessment div.hiddenfields').find('input[name="payment_mode"]').val(details[i].payment_id);
	
									}).end()
									.find('').each(function() {
	
									}).end().appendTo(business_natures);
									n++;
	
									$('a.attachfee').on('click', function(e){
											console.log('hoi');
											var signageFee = Number ($('input[name="signagefee"]').val())
												new_total = 0;
												tfos_temp = [],
												tfosJSONTemp = "",
												new_total = eval( total + signageFee);
												tfos_temp = tfos.slice();
	
											if(signageFee > 0){
	
												form.find('.totals span.total-amount').text(currencyFormat(parseFloat(new_total)));
												tfos_temp.push({'tfo':'8','amount': signageFee});
												tfosJSONTemp = JSON.stringify(tfos_temp);
	
												$('form.assessment div.hiddenfields').find('input[name="tfos"]').val(tfosJSONTemp);
												$('form.assessment div.hiddenfields').find('input[name="total_tax_due"]').val(new_total);
	
											}else{
	
												form.find('.totals span.total-amount').text(currencyFormat(parseFloat(total)));
												$('form.assessment div.hiddenfields').find('input[name="tfos"]').val(tfosJSON);
												$('form.assessment div.hiddenfields').find('input[name="total_tax_due"]').val(total);
											}
	
										});
	
										//GET DATE FOR INTEREST
	
										var today = new Date();
										var mm1 = today.getMonth()+1; 
		
										if(dd<10) { dd = '0'+dd } 
										if(mm1<10) { mm1 = '0'+mm1 } 
		
										today = mm1;
		
										var jan = new Date();
										var dd = 1;
										var mm2 = 0; 
										var yyyy = jan.getFullYear();
		
										if(dd<10) { dd = '0'+dd } 
										if(mm2<10) { mm2 = '0'+mm2 } 
		
										jan = mm2;
		
										var answer = Math.abs(mm1-mm2);

										var totalbustax=0; 
										
								
										garbagex=0;
										// totalbustax = parseFloat(bussx) + parseFloat(garbagex);
										totalbustax = parseFloat(bussx);
									
										// for surcharge in assessment form
										var date21 = new Date();	
										var permitnumber1 = details[0].permit_number;
									var permityear1 = permitnumber1.substring(0,4);
										var date11 =  new Date('01/31/'+permityear1);
									console.log(permityear1);
									
										var timeDiff1 = date21.getTime() - date11.getTime();
										var diffDays1 = timeDiff1 / (1000*3600*24); 
									// console.log("diffdays = "+diffDays)
										var dd1 = date21.getDate();
										var mm1 = date21.getMonth()+1; //January is 0!
										var yyyy1 = date21.getFullYear();
										if(dd1 < 10)
										{
											dd1 = '0'+ dd1;
										}
										if(mm1 < 10)
										{
											mm1 = '0' + mm1;
										}
										var date21 = mm1+'-'+dd1+'-'+yyyy1;
										// console.log("date12 = "+ date2);
										var dd1 = date11.getDate();
										var mm1 = date11.getMonth()+1; //January is 0!
										var yyyy1 = date11.getFullYear();
										if(dd1 < 10)
										{
											dd1 = '0'+ dd1;
										}
										if(mm1 < 10)
										{
											mm1 = '0' + mm1;
										}
										var date11 = mm1+'-'+dd1+'-'+yyyy1;
										 //console.log("total buss tax = "+ totalbustax);
										
										//SURCHARGE and INTEREST
										if(diffDays1>1){
											
												var surcharges1 = totalbustax*0.25;
										
										} else{
											var surcharges1 = 0;
				
										}
										// console.log("total" +total);
										// console.log("surcharge = "+surcharges);

									// $('.totals span.total-amount').on('change', function (){
									// 	alert("wata tempure");
									// });
									 form.find('.totals span.surchargessamplezz').text(currencyFormat(parseFloat(surcharges1 )));
									 //var haduken = form.find('.totals span.total-amount').text().replace(",", "");
									// console.log(haduken+surcharges);
									// form.find('.totals span.total-overallzz').text(currencyFormat(parseFloat(haduken) + parseFloat(surcharges )));



									/************************* naa diri ang public market ************************************/
									if(details[0].brgy == 'Public Market Poblacion'){

										var pmstalll = $('div.row.stall'),
												stable = pmstalll.find('table');
												$('.stallnum').text(details[0].stall_num);
												$('.stallarea').text(details[0].stall_area);
												$('.stallval').text(details[0].stall_val);
												$('.stalldue').text(details[0].stall_val);
												pmstalll.show();
												stallss = '[{"label":"January","dues":"01/20/'+yyyy+'","value":'+details[0].stall_val+',"stat":"UnPaid"},{"label":"February","dues":"02/20/'+yyyy+'","value":'+details[0].stall_val+',"stat":"UnPaid"},{"label":"March","dues":"03/20/'+yyyy+'","value":'+details[0].stall_val+',"stat":"UnPaid"},{"label":"April","dues":"04/20/'+yyyy+'","value":'+details[0].stall_val+',"stat":"UnPaid"},{"label":"May","dues":"05/20/'+yyyy+'","value":'+details[0].stall_val+',"stat":"UnPaid"},{"label":"June","dues":"06/20/'+yyyy+'","value":'+details[0].stall_val+',"stat":"UnPaid"},{"label":"July","dues":"07/20/'+yyyy+'","value":'+details[0].stall_val+',"stat":"UnPaid"},{"label":"August","dues":"08/20/'+yyyy+'","value":'+details[0].stall_val+',"stat":"UnPaid"},{"label":"September","dues":"09/20/'+yyyy+'","value":'+details[0].stall_val+',"stat":"UnPaid"},{"label":"October","dues":"10/20/'+yyyy+'","value":'+details[0].stall_val+',"stat":"UnPaid"},{"label":"November","dues":"11/20/'+yyyy+'","value":'+details[0].stall_val+',"stat":"UnPaid"},{"label":"December","dues":"12/20/'+yyyy+'","value":'+details[0].stall_val+',"stat":"UnPaid"}]';
												$('form.assessment div.hiddenfields').find('input[name="stallss"]').val(stallss);

									}else{
												$('.stall').hide();
									}
									/**********************insert breakdowns heresssssssss**************************/
									if (details[0].payment_id == 1){

										if(details[0].application_id == 1 || surcharges1 == 0){
											$('.paul').css('display', 'block');
											$('.nino').css('display', 'none');
										}else{
											$('.paul').css('display', 'none');
											$('.nino').css('display', 'block');
										}

										var breakdown = $('div.row.annual'),
											atable = breakdown.find('table');
	
										atable.find('th.payment_mode').text('Payment Mode : '+capitalize(details[0].payment_type));
										atable.find('tbody').html('');
										breakdown.show();
										$('div.row.quarterly').hide();
										$('div.row.bi-annual').hide();
										var first = $('<tr />').appendTo(atable.find('tbody'));
									
										// alert(add_total1);
										if(details[0].application_id == 1 && details[0].renew_id == null && details[0].assessment_date == null){ //for freshly started business
											
											$('<td />', { text: 'First-Annual' }).appendTo(first);
											$('<td />', { text: due[0].value+'-'+tdate }).appendTo(first);
											$('<td />', { text: 'Unpaid'}).appendTo(first);
											$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right annually"><strong>' + currencyFormat(parseFloat( total  + addt_subtotal + addttfototal)) + '</strong></span>' }).appendTo(first);
	
							
											breakdowns.push({'label': "First-Annual",'dues' : due[0].value+'-'+tdate,'value': (eval(total  + addt_subtotal)),'stat' : 'UnPaid'});
											breakdownsJSON = JSON.stringify(breakdowns);

										form.find('.totals span.total-amount').text(currencyFormat(parseFloat(total + addt_subtotal + addttfototal)));
										form.find('.totals span.total-overallzz').text(currencyFormat(parseFloat(total + addt_subtotal + addttfototal + surcharges1)));
										
											
										} else if (assessment_date != tdate && date_renewed==tdate){ //recently renewed
											
									
											$('<td />', { text: 'First-Annual' }).appendTo(first);
											$('<td />', { text: due[0].value+'-'+tdate }).appendTo(first);
											$('<td />', { text: 'Unpaid'}).appendTo(first);
											$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right annually"><strong>' + currencyFormat(parseFloat( total  + addt_subtotal + addttfototal)) + '</strong></span>' }).appendTo(first);
	
											
											breakdowns.push({'label': "First-Annual",'dues' : due[0].value+'-'+tdate,'value': (eval(total  + addt_subtotal)),'stat' : 'UnPaid'});
											breakdownsJSON = JSON.stringify(breakdowns);

										form.find('.totals span.total-amount').text(currencyFormat(parseFloat(total + addt_subtotal + addttfototal)));
										form.find('.totals span.total-overallzz').text(currencyFormat(parseFloat(total + addt_subtotal + addttfototal + surcharges1)));
											
										} else if(details[0].application_id == 1 && details[0].renew_id == null && details[0].assessment_date != null){

											$('<td />', { text: result.data.breakdowns[0].label + ' Semester Payment' }).appendTo(first);
											$('<td />', { text: result.data.breakdowns[0].dues}).appendTo(first);
											$('<td />', { text: result.data.breakdowns[0].stat}).appendTo(first);
											$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right first"><strong>' + currencyFormat(parseFloat( result.data.breakdowns[0].value )) + '</strong></span>' }).appendTo(first);
										
											form.find('.totals span.total-amount').text(currencyFormat(parseFloat(result.data.breakdowns[0].value)));
											form.find('.totals span.total-overallzz').text(currencyFormat(parseFloat(result.data.breakdowns[0].value + surcharges1)));

										} else{
											
											$('<td />', { text: 'First-Annual' }).appendTo(first);
											$('<td />', { text: due[0].value+'-'+tdate }).appendTo(first);
											$('<td />', { text: 'Unpaid'}).appendTo(first);
											$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right annually"><strong>' + currencyFormat(parseFloat( total  + addt_subtotal + addttfototal)) + '</strong></span>' }).appendTo(first);
											
											
											breakdowns.push({'label': "First-Annual",'dues' : due[0].value+'-'+tdate,'value': (eval(total  + addt_subtotal )),'stat' : 'UnPaid'});
											breakdownsJSON = JSON.stringify(breakdowns);
											
											

										form.find('.totals span.total-amount').text(currencyFormat(parseFloat(total + addt_subtotal + addttfototal)));
										form.find('.totals span.total-overallzz').text(currencyFormat(parseFloat(total + addt_subtotal + addttfototal + surcharges1)));
										
										}
	
										if(result.data.number_of_months > 0){
	
											// given_surcharge= (($C*0.0245)*0.25 );
											// interest=((($C*0.0245)*answer)*0.02 );

											// var sc = $('<tr />').appendTo(atable.find('tbody'));
											// $('<td />', { text: 'Surcharge: '+ (surcharges[0].surcharge * 100) + '%' }).css({'color': 'red','font-weight': 'bold'}).appendTo(sc);
											// $('<td />', { text: '' }).appendTo(sc);
											// $('<td />', { text: '' }).appendTo(sc);
											// $('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat( given_surcharge )) + '</strong></span>'}).appendTo(sc);
											// var intst = $('<tr />').appendTo(atable.find('tbody'));
											// $('<td />', { text: 'Interest: ' +result.data.number_of_months +' Months *' + (surcharges[0].interest * 100) + '%'}).css({'color': 'red','font-weight': 'bold'}).appendTo(intst);
											// $('<td />', { text: '' }).appendTo(intst);
											// $('<td />', { text: '' }).appendTo(intst);
											// $('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat( interest )) + '</strong></span>'}).appendTo(intst);
											
											

										}
										// int_n_sur.push({'interest': interest ,'surcharge' : given_surcharge});
										// intNSurJSON = JSON.stringify(int_n_sur);

									// Show Breakdown for bi-annual
								} if (details[0].payment_id == 2){
									$('.paul').css('display', 'block');
									$('.nino').css('display', 'none');
									
										var breakdown = $('div.row.annual'),
										btable = breakdown.find('table'),
										payment_date = new Date(details[0].payment_date),
										payment_date = payment_date.getFullYear(),
										assessment_date = new Date(details[0].assessment_date),
										assessment_date = assessment_date.getFullYear(),
										date_renewed = new Date(details[0].date_renewed),
										date_renewed = date_renewed.getFullYear();
									
										console.log('assessment_date='+assessment_date+ ' date_renewed='+date_renewed);
										btable.find('th.payment_mode').text('Payment Mode : '+capitalize(details[0].payment_type));
										btable.find('tbody').html('');
										breakdown.show();
									
										var first = $('<tr />').appendTo(btable.find('tbody'));
									
										if(details[0].application_id == 1 && details[0].renew_id == null && details[0].assessment_date == null){ // for freshly started businessssssssss
								
									
										$('<td />', { text: due[0].field+' Semester Payment' }).appendTo(first);
										$('<td />', { text: due[0].value+'-'+tdate }).appendTo(first);
										$('<td />', { text: 'Unpaid'}).appendTo(first);
										$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right first"><strong>' + currencyFormat(parseFloat( (total + addt_subtotal)+ addttfototal)) + '</strong></span>' }).appendTo(first);
									
										breakdowns.push({'label': 'First-Bi-Annual','dues' : due[0].value+'-'+tdate,'value': ((total + addt_subtotal)),'stat' : 'UnPaid'});
										breakdownsJSON = JSON.stringify(breakdowns);
										$('form.assessment div.hiddenfields').find('input[name="first_semi_annual"]').val(eval((total + addt_subtotal)));
									
										var second = $('<tr />').appendTo(btable.find('tbody'));
									
										$('<td />', { text: due[1].field+' Semester Payment' }).appendTo(second);
										$('<td />', { text: due[1].value+'-'+tdate }).appendTo(second);
										$('<td />', { text: 'Unpaid' }).appendTo(second);
										$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right second"><strong>' + currencyFormat(parseFloat((0))) + '</strong></span>' }).appendTo(second);
										breakdowns.push({'label': 'Second-Bi-Annual','dues' : due[1].value+'-'+tdate,'value': ((02)),'stat' : 'UnPaid'});
										breakdownsJSON = JSON.stringify(breakdowns);
										$('form.assessment div.hiddenfields').find('input[name="second_semi_annual"]').val((0));
									
										form.find('.totals span.total-amount').text(currencyFormat(parseFloat(total + addt_subtotal + addttfototal)));
										
										} else if (assessment_date != tdate && date_renewed==tdate){

										
										
											$('<td />', { text: due[0].field+' Semester Payment' }).appendTo(first);
											$('<td />', { text: due[0].value+'-'+tdate }).appendTo(first);
											$('<td />', { text: 'Unpaid'}).appendTo(first);
											$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right first"><strong>' + currencyFormat(parseFloat( (total + addt_subtotal)-(totalbustax - totalbustax/2) + addttfototal)) + '</strong></span>' }).appendTo(first);
										
											breakdowns.push({'label': 'First-Bi-Annual','dues' : due[0].value+'-'+tdate,'value': ((total + addt_subtotal)-(totalbustax - totalbustax/2)),'stat' : 'UnPaid'});
											breakdownsJSON = JSON.stringify(breakdowns);
											$('form.assessment div.hiddenfields').find('input[name="first_semi_annual"]').val(eval((total + addt_subtotal)-(totalbustax - totalbustax/2)));
										
											var second = $('<tr />').appendTo(btable.find('tbody'));
										
											$('<td />', { text: due[1].field+' Semester Payment' }).appendTo(second);
											$('<td />', { text: due[1].value+'-'+tdate }).appendTo(second);
											$('<td />', { text: 'Unpaid' }).appendTo(second);
											$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right second"><strong>' + currencyFormat(parseFloat((totalbustax/2))) + '</strong></span>' }).appendTo(second);
											breakdowns.push({'label': 'Second-Bi-Annual','dues' : due[1].value+'-'+tdate,'value': ((totalbustax/2)),'stat' : 'UnPaid'});
											breakdownsJSON = JSON.stringify(breakdowns);
											$('form.assessment div.hiddenfields').find('input[name="second_semi_annual"]').val((totalbustax/2));
										
											form.find('.totals span.total-amount').text(currencyFormat(parseFloat(total + addt_subtotal + addttfototal)));
											
										// form.find('.totals span.total-amount').text(currencyFormat(parseFloat(result.data.breakdowns[1].value+result.data.breakdowns[0].value)));
																			
									} else if(details[0].application_id == 1 && details[0].renew_id == null && details[0].assessment_date != null){ //alert('lagot='+result.data.breakdowns[k].stat);
									
										$('<td />', { text: result.data.breakdowns[0].label + ' Semester Payment' }).appendTo(first);
										$('<td />', { text: result.data.breakdowns[0].dues}).appendTo(first);
										$('<td />', { text: result.data.breakdowns[0].stat}).appendTo(first);
										$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right first"><strong>' + currencyFormat(parseFloat( result.data.breakdowns[0].value )) + '</strong></span>' }).appendTo(first);
									
										var second = $('<tr />').appendTo(btable.find('tbody'));
									
										$('<td />', { text: result.data.breakdowns[1].label + ' Semester Payment'}).appendTo(second);
										$('<td />', { text: result.data.breakdowns[1].dues}).appendTo(second);
										$('<td />', { text: result.data.breakdowns[1].stat}).appendTo(second);
										$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right first"><strong>' + currencyFormat(parseFloat( result.data.breakdowns[1].value )) + '</strong></span>' }).appendTo(second);
				
										form.find('.totals span.total-amount').text(currencyFormat(parseFloat(result.data.breakdowns[1].value+result.data.breakdowns[0].value )));
									
		
									}else {
									
										
										$('<td />', { text: due[0].field+' Semester Payment' }).appendTo(first);
										$('<td />', { text: due[0].value+'-'+tdate }).appendTo(first);
										$('<td />', { text: 'Unpaid'}).appendTo(first);
										$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right first"><strong>' + currencyFormat(parseFloat( (total + addt_subtotal)-(totalbustax - totalbustax/2) + addttfototal)) + '</strong></span>' }).appendTo(first);
									
										breakdowns.push({'label': 'First-Bi-Annual','dues' : due[0].value+'-'+tdate,'value': ((total + addt_subtotal)-(totalbustax - totalbustax/2)),'stat' : 'UnPaid'});
										breakdownsJSON = JSON.stringify(breakdowns);
										$('form.assessment div.hiddenfields').find('input[name="first_semi_annual"]').val(eval((total + addt_subtotal)-(totalbustax - totalbustax/2)));
									
										var second = $('<tr />').appendTo(btable.find('tbody'));
									
										$('<td />', { text: due[1].field+' Semester Payment' }).appendTo(second);
										$('<td />', { text: due[1].value+'-'+tdate }).appendTo(second);
										$('<td />', { text: 'Unpaid' }).appendTo(second);
										$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right second"><strong>' + currencyFormat(parseFloat((totalbustax/2))) + '</strong></span>' }).appendTo(second);
										breakdowns.push({'label': 'Second-Bi-Annual','dues' : due[1].value+'-'+tdate,'value': ((totalbustax/2)),'stat' : 'UnPaid'});
										breakdownsJSON = JSON.stringify(breakdowns);
										$('form.assessment div.hiddenfields').find('input[name="second_semi_annual"]').val((totalbustax/2));
									
										form.find('.totals span.total-amount').text(currencyFormat(parseFloat(total + addt_subtotal + addttfototal)));
										
										}
										if(result.data.number_of_months > 0){ //alert('lagot na dis');
									
										// var sc = $('<tr />').appendTo(btable.find('tbody'));
										// $('<td />', { text: 'Surcharge: ' + (surcharges[0].surcharge * 100) + '%'}).css({'color': 'red','font-weight': 'bold'}).appendTo(sc);
										// $('<td />', { text: '' }).appendTo(sc);
										// $('<td />', { text: '' }).appendTo(sc);
										// $('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat( given_surcharge )) + '</strong></span>'}).appendTo(sc);
										// var intst = $('<tr />').appendTo(btable.find('tbody'));
										// $('<td />', { text: 'Interest: ' +result.data.number_of_months +' Months * ' + (surcharges[0].interest * 100) + '%'}).css({'color': 'red','font-weight': 'bold'}).appendTo(intst);
										// $('<td />', { text: '' }).appendTo(intst);
										// $('<td />', { text: '' }).appendTo(intst);
										// $('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat( interest )) + '</strong></span>'}).appendTo(intst);
																				
																				
										}
										// int_n_sur.push({'interest': interest ,'surcharge' : given_surcharge});
										// intNSurJSON = JSON.stringify(int_n_sur);
										}
										
					// Show Breakdown for quarterly
					if(details[0].payment_id == 3) { // Quarterly
						$('.paul').css('display', 'block');
						$('.nino').css('display', 'none');
						
						var breakdown = $('div.row.annual'),
						qtable = breakdown.find('table');
						
						qtable.find('th.payment_mode').text('Payment Mode : '+capitalize(details[0].payment_type));
						qtable.find('tbody').html('');
						breakdown.show();
						
						
						for ( k in due){
						var first = $('<tr />').appendTo(qtable.find('tbody'));
						if (k==0){
							if(details[0].application_id == 1 && details[0].renew_id == null && details[0].assessment_date == null){ // for freshly started business
					
								$('<td />', { text: due[0].field + ' Payment' }).appendTo(first);
								$('<td />', { text: due[0].value+'-'+tdate }).appendTo(first);
								$('<td />', { text:'Unpaid' }).appendTo(first);
								$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right quarterly first"><strong>' + currencyFormat(parseFloat((total + addt_subtotal)+ addttfototal)) + '</strong></span>' }).appendTo(first);
								breakdowns.push({'label': due[0].field.replace(/ /g,"_"),'dues' : due[0].value+'-'+tdate,'value': (eval((total + addt_subtotal) + addttfototal)),'stat' : 'UnPaid'});
								breakdownsJSON = JSON.stringify(breakdowns);
								$('form.assessment div.hiddenfields').find('input[name="quarterly first"]').val(eval((total + addt_subtotal)+ addttfototal));
																		
								var second = $('<tr />').appendTo(qtable.find('tbody'));

								$('<td />', { text: due[1].field + ' Payment' }).appendTo(second);
								$('<td />', { text: due[1].value+'-'+tdate }).appendTo(second);
								$('<td />', { text:'Unpaid' }).appendTo(second);
								$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right quarterly second"><strong>' + currencyFormat(parseFloat(0)) + '</strong></span>' }).appendTo(second);
								breakdowns.push({'label': due[1].field.replace(/ /g,"_"),'dues' : due[1].value+'-'+tdate,'value': (eval(0)),'stat' : 'UnPaid'});
								breakdownsJSON = JSON.stringify(breakdowns);
								$('form.assessment div.hiddenfields').find('input[name="quarterly second"]').val(eval(0));

								var third = $('<tr />').appendTo(qtable.find('tbody'));

								$('<td />', { text: due[2].field + ' Payment' }).appendTo(third);
								$('<td />', { text: due[2].value+'-'+tdate }).appendTo(third);
								$('<td />', { text:'Unpaid' }).appendTo(third);
								$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right quarterly second"><strong>' + currencyFormat(parseFloat(0)) + '</strong></span>' }).appendTo(third);
								breakdowns.push({'label': due[2].field.replace(/ /g,"_"),'dues' : due[2].value+'-'+tdate,'value': (eval(0)),'stat' : 'UnPaid'});
								breakdownsJSON = JSON.stringify(breakdowns);
								$('form.assessment div.hiddenfields').find('input[name="quarterly third"]').val(eval(0));

								var fourth = $('<tr />').appendTo(qtable.find('tbody'));

								$('<td />', { text: due[3].field + ' Payment' }).appendTo(fourth);
								$('<td />', { text: due[3].value+'-'+tdate }).appendTo(fourth);
								$('<td />', { text:'Unpaid' }).appendTo(fourth);
								$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right quarterly second"><strong>' + currencyFormat(parseFloat(0)) + '</strong></span>' }).appendTo(fourth);
								breakdowns.push({'label': due[3].field.replace(/ /g,"_"),'dues' : due[3].value+'-'+tdate,'value': (eval(0)),'stat' : 'UnPaid'});
								breakdownsJSON = JSON.stringify(breakdowns);
								$('form.assessment div.hiddenfields').find('input[name="quarterly fourth"]').val(eval(0));

								form.find('.totals span.total-amount').text(currencyFormat(parseFloat(total + addt_subtotal + addttfototal)));
								
						
								}else if (assessment_date != tdate && date_renewed==tdate){//existing business
					
						
									$('<td />', { text: due[0].field + ' Payment' }).appendTo(first);
									$('<td />', { text: due[0].value+'-'+tdate }).appendTo(first);
									$('<td />', { text:'Unpaid' }).appendTo(first);
									$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right quarterly first"><strong>' + currencyFormat(parseFloat((total + addt_subtotal)-(totalbustax - totalbustax/4)  + addttfototal)) + '</strong></span>' }).appendTo(first);
									breakdowns.push({'label': due[0].field.replace(/ /g,"_"),'dues' : due[0].value+'-'+tdate,'value': (eval((total + addt_subtotal)-(totalbustax - totalbustax/4) + addttfototal)),'stat' : 'UnPaid'});
									breakdownsJSON = JSON.stringify(breakdowns);
									$('form.assessment div.hiddenfields').find('input[name="quarterly first"]').val(eval((total + addt_subtotal)-(totalbustax - totalbustax/4)  + addttfototal));
																			
									var second = $('<tr />').appendTo(qtable.find('tbody'));

									$('<td />', { text: due[1].field + ' Payment' }).appendTo(second);
									$('<td />', { text: due[1].value+'-'+tdate }).appendTo(second);
									$('<td />', { text:'Unpaid' }).appendTo(second);
									$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right quarterly second"><strong>' + currencyFormat(parseFloat(totalbustax/4)) + '</strong></span>' }).appendTo(second);
									breakdowns.push({'label': due[1].field.replace(/ /g,"_"),'dues' : due[1].value+'-'+tdate,'value': (eval(totalbustax/4)),'stat' : 'UnPaid'});
									breakdownsJSON = JSON.stringify(breakdowns);
									$('form.assessment div.hiddenfields').find('input[name="quarterly second"]').val(eval(totalbustax/4));

									var third = $('<tr />').appendTo(qtable.find('tbody'));

									$('<td />', { text: due[2].field + ' Payment' }).appendTo(third);
									$('<td />', { text: due[2].value+'-'+tdate }).appendTo(third);
									$('<td />', { text:'Unpaid' }).appendTo(third);
									$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right quarterly second"><strong>' + currencyFormat(parseFloat(totalbustax/4)) + '</strong></span>' }).appendTo(third);
									breakdowns.push({'label': due[2].field.replace(/ /g,"_"),'dues' : due[2].value+'-'+tdate,'value': (eval(totalbustax/4)),'stat' : 'UnPaid'});
									breakdownsJSON = JSON.stringify(breakdowns);
									$('form.assessment div.hiddenfields').find('input[name="quarterly third"]').val(eval(totalbustax/4));

									var fourth = $('<tr />').appendTo(qtable.find('tbody'));

									$('<td />', { text: due[3].field + ' Payment' }).appendTo(fourth);
									$('<td />', { text: due[3].value+'-'+tdate }).appendTo(fourth);
									$('<td />', { text:'Unpaid' }).appendTo(fourth);
									$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right quarterly second"><strong>' + currencyFormat(parseFloat(totalbustax/4)) + '</strong></span>' }).appendTo(fourth);
									breakdowns.push({'label': due[3].field.replace(/ /g,"_"),'dues' : due[3].value+'-'+tdate,'value': (eval(totalbustax/4)),'stat' : 'UnPaid'});
									breakdownsJSON = JSON.stringify(breakdowns);
									$('form.assessment div.hiddenfields').find('input[name="quarterly fourth"]').val(eval(totalbustax/4));
							
								} else if(details[0].application_id == 1 && details[0].renew_id == null && details[0].assessment_date != null){ //alert('lagot='+result.data.breakdowns[k].stat);
					
						
									$('<td />', { text: due[0].field + ' Payment' }).appendTo(first);
									$('<td />', { text: result.data.breakdowns[0].dues }).appendTo(first);
									$('<td />', { text: result.data.breakdowns[0].stat}).appendTo(first);
									$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right first"><strong>' + currencyFormat(parseFloat(result.data.breakdowns[0].value )) + '</strong></span>' }).appendTo(first);
									
									var second = $('<tr />').appendTo(qtable.find('tbody'));
									$('<td />', { text: due[1].field + ' Payment' }).appendTo(second);
									$('<td />', { text: result.data.breakdowns[1].dues }).appendTo(second);
									$('<td />', { text: result.data.breakdowns[1].stat}).appendTo(second);
									$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right first"><strong>' + currencyFormat(parseFloat(result.data.breakdowns[1].value)) + '</strong></span>' }).appendTo(second);
									
									var third = $('<tr />').appendTo(qtable.find('tbody'));
									$('<td />', { text: due[2].field + ' Payment' }).appendTo(third);
									$('<td />', { text: result.data.breakdowns[2].dues }).appendTo(third);
									$('<td />', { text: result.data.breakdowns[2].stat}).appendTo(third);
									$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right first"><strong>' + currencyFormat(parseFloat(result.data.breakdowns[2].value)) + '</strong></span>' }).appendTo(third);
									
									var fourth = $('<tr />').appendTo(qtable.find('tbody'));
									$('<td />', { text: due[3].field + ' Payment' }).appendTo(fourth);
									$('<td />', { text: result.data.breakdowns[3].dues }).appendTo(fourth);
									$('<td />', { text: result.data.breakdowns[3].stat}).appendTo(fourth);
									$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right first"><strong>' + currencyFormat(parseFloat(result.data.breakdowns[3].value)) + '</strong></span>' }).appendTo(fourth);
									
									form.find('.totals span.total-amount').text(currencyFormat(parseFloat(result.data.breakdowns[0].value+result.data.breakdowns[1].value+result.data.breakdowns[2].value+result.data.breakdowns[3].value)));
								
								} else { 
								
									$('<td />', { text: due[0].field + ' Payment' }).appendTo(first);
									$('<td />', { text: due[0].value+'-'+tdate }).appendTo(first);
									$('<td />', { text:'Unpaid' }).appendTo(first);
									$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right quarterly first"><strong>' + currencyFormat(parseFloat((total + addt_subtotal)-(totalbustax - totalbustax/4)  + addttfototal)) + '</strong></span>' }).appendTo(first);
									breakdowns.push({'label': due[0].field.replace(/ /g,"_"),'dues' : due[0].value+'-'+tdate,'value': (eval((total + addt_subtotal)-(totalbustax - totalbustax/4) + addttfototal)),'stat' : 'UnPaid'});
									breakdownsJSON = JSON.stringify(breakdowns);
									$('form.assessment div.hiddenfields').find('input[name="quarterly first"]').val(eval((total + addt_subtotal) - (totalbustax - totalbustax/4) + addttfototal));
																			
									var second = $('<tr />').appendTo(qtable.find('tbody'));
	
									$('<td />', { text: due[1].field + ' Payment' }).appendTo(second);
									$('<td />', { text: due[1].value+'-'+tdate }).appendTo(second);
									$('<td />', { text:'Unpaid' }).appendTo(second);
									$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right quarterly second"><strong>' + currencyFormat(parseFloat(totalbustax/4)) + '</strong></span>' }).appendTo(second);
									breakdowns.push({'label': due[1].field.replace(/ /g,"_"),'dues' : due[1].value+'-'+tdate,'value': (eval(totalbustax/4)),'stat' : 'UnPaid'});
									breakdownsJSON = JSON.stringify(breakdowns);
									$('form.assessment div.hiddenfields').find('input[name="quarterly second"]').val(eval(totalbustax/4));
	
									var third = $('<tr />').appendTo(qtable.find('tbody'));
	
									$('<td />', { text: due[2].field + ' Payment' }).appendTo(third);
									$('<td />', { text: due[2].value+'-'+tdate }).appendTo(third);
									$('<td />', { text:'Unpaid' }).appendTo(third);
									$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right quarterly second"><strong>' + currencyFormat(parseFloat(totalbustax/4)) + '</strong></span>' }).appendTo(third);
									breakdowns.push({'label': due[2].field.replace(/ /g,"_"),'dues' : due[2].value+'-'+tdate,'value': (eval(totalbustax/4)),'stat' : 'UnPaid'});
									breakdownsJSON = JSON.stringify(breakdowns);
									$('form.assessment div.hiddenfields').find('input[name="quarterly third"]').val(eval(totalbustax/4));
	
									var fourth = $('<tr />').appendTo(qtable.find('tbody'));
	
									$('<td />', { text: due[3].field + ' Payment' }).appendTo(fourth);
									$('<td />', { text: due[3].value+'-'+tdate }).appendTo(fourth);
									$('<td />', { text:'Unpaid' }).appendTo(fourth);
									$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right quarterly second"><strong>' + currencyFormat(parseFloat(totalbustax/4)) + '</strong></span>' }).appendTo(fourth);
									breakdowns.push({'label': due[3].field.replace(/ /g,"_"),'dues' : due[3].value+'-'+tdate,'value': (eval(totalbustax/4)),'stat' : 'UnPaid'});
									breakdownsJSON = JSON.stringify(breakdowns);
									$('form.assessment div.hiddenfields').find('input[name="quarterly fourth"]').val(eval(totalbustax/4));
	
									form.find('.totals span.total-amount').text(currencyFormat(parseFloat(total + addt_subtotal + addttfototal)));
									
									console.log('totalbustax='+totalbustax+' total ='+total);
									
							}		
						
							} 
						}
															
								if(result.data.number_of_months > 0){
						
									// var sc = $('<tr />').appendTo(qtable.find('tbody'));
									// $('<td />', { text: 'Surcharge: ' + (surcharges[0].surcharge * 100) + '%' }).css({'color': 'red','font-weight': 'bold'}).appendTo(sc);
									// $('<td />', { text: '' }).appendTo(sc);
									// $('<td />', { text: '' }).appendTo(sc);
									// $('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat( given_surcharge )) + '</strong></span>'}).appendTo(sc);
									// var intst = $('<tr />').appendTo(qtable.find('tbody'));
									// $('<td />', { text: 'Interest: ' +result.data.number_of_months +' Months * ' + (surcharges[0].interest * 100) + '%'}).css({'color': 'red','font-weight': 'bold'}).appendTo(intst);
									// $('<td />', { text: '' }).appendTo(intst);
									// $('<td />', { text: '' }).appendTo(intst);
									// $('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat( interest )) + '</strong></span>'}).appendTo(intst);
								}
									// int_n_sur.push({'interest': interest ,'surcharge' : given_surcharge});
									// intNSurJSON = JSON.stringify(int_n_sur);
									//breakdownsJSON = JSON.stringify(breakdowns);
								}
						
								if(details[0].application_id == 1 && details[0].renew_id == null && details[0].assessment_date == null){ // for freshly started businessssssssss								
									$('form.assessment div.totals span.total-amount').text(currencyFormat(parseFloat(addt_subtotal + total)));	
								}	else if (assessment_date != tdate && date_renewed==tdate){
									$('form.assessment div.totals span.total-amount').text(currencyFormat(parseFloat(addt_subtotal + total)));	
								}

								$('form.assessment div.hiddenfields').append('<input type="hidden" name ="breakdowns" value='+breakdownsJSON+'>');
								// $('form.assessment div.hiddenfields').append('<input type="hidden" name ="interest_n_surcharge"  	 	 	 	 	value='+intNSurJSON+'>');
								$('form.assessment div.hiddenfields').append('<input type="hidden" name ="total" value='+total+'>');

								// form.find('.totals span.total-amount').text(currencyFormat(parseFloat(total + given_surcharge + interest)));
								ai++;
										/**********************end of breakdown insertion**********************/
	
										$(document).ready(function() {
											

											var addttfo = [],
													additionaltfo = [],
													tfo_name ='';
	
										$('.col_bot').on('click', function(e) {
											
											$('form.assessment .addtfos').find('a.addmoretfos').attr('disabled', true);
											var a = parseInt(document.getElementById("nochapter").value),
													ch = document.getElementById("ch"),
													HTML = '<table width=90% id="eg_form">';
											var numtfo = $('input[name=""]')
													 addttfo = [];
											
											var tfoss=document.getElementById("tfodb").innerHTML;
										  
										  if(a > 0){
											 $('form.assessment div.hiddenfields').find('input[name="addtltfo"]').val('');
											 var cx=1;
											 for (i = 0; i < a; i++) {
												
												 HTML += '<tr><td align="center"  style="width:1%">';
												 HTML += '<input type="number" class="form-control ccc" min="0" name="ccc[]" id="ccc'+cx+'" style="width:50px;" value="1">';
												 HTML += '<td align="center"  style="width:1%">x';
												 HTML += '<td align="center"  style="width:1%">';
												 HTML += '<td align="center"  style="width:35%">';
												 HTML += '<select class="form-control aaa" name="aaa[]" id="aaa'+cx+'">'+tfoss+'</select>';
												 HTML += '<td align="center"  style="width:35%">';
												 HTML += '<input type="number" class="form-control bbb" min="0" name="bbb[]" id="bbb'+cx+'"  placeholder="Amount of the certain TFO" ></td></td></tr>';
												 cx++;
												}
											 HTML += '<tr><td><a class="btn btn-outline btn-success addmoretfos" style="display:none"/>Add TFO</a></td></tr>';
										 document.getElementById("ch").innerHTML = HTML;
											 $('.addmoretfos').show();
											
											 $('#aaa1').on('change', function(e){
												
												var tfo_id1 = $(this).find('option:selected').attr('vid');
												console.log(tfo_id1);
												
												$.ajax({
													url: baseurl + 'fees/fees/getamt/'+tfo_id1,
													type: 'get',
													dataType: 'json',
													success: function(data){
														$('#bbb1').val(data.data.amount);
														
													}
												})
											 })
											 $('#aaa2').on('change', function(e){
												
												var tfo_id1 = $(this).find('option:selected').attr('vid');
												console.log(tfo_id1);
												
												$.ajax({
													url: baseurl + 'fees/fees/getamt/'+tfo_id1,
													type: 'get',
													dataType: 'json',
													success: function(data){
														$('#bbb2').val(data.data.amount);
														
													}
												})
											 })
											 $('#aaa3').on('change', function(e){
												
												var tfo_id1 = $(this).find('option:selected').attr('vid');
												console.log(tfo_id1);
												
												$.ajax({
													url: baseurl + 'fees/fees/getamt/'+tfo_id1,
													type: 'get',
													dataType: 'json',
													success: function(data){
														$('#bbb3').val(data.data.amount);
														
													}
												})
											 })
											 $('#aaa4').on('change', function(e){
												
												var tfo_id1 = $(this).find('option:selected').attr('vid');
												console.log(tfo_id1);
												
												$.ajax({
													url: baseurl + 'fees/fees/getamt/'+tfo_id1,
													type: 'get',
													dataType: 'json',
													success: function(data){
														$('#bbb4').val(data.data.amount);
														
													}
												})
											 })
											 $('#aaa5').on('change', function(e){
												
												var tfo_id1 = $(this).find('option:selected').attr('vid');
												console.log(tfo_id1);
												
												$.ajax({
													url: baseurl + 'fees/fees/getamt/'+tfo_id1,
													type: 'get',
													dataType: 'json',
													success: function(data){
														$('#bbb5').val(data.data.amount);
														
													}
												})
											 })
											 $('#aaa6').on('change', function(e){
												
												var tfo_id1 = $(this).find('option:selected').attr('vid');
												console.log(tfo_id1);
												
												$.ajax({
													url: baseurl + 'fees/fees/getamt/'+tfo_id1,
													type: 'get',
													dataType: 'json',
													success: function(data){
														$('#bbb6').val(data.data.amount);
														
													}
												})
											 })
											 $('#aaa7').on('change', function(e){
												
												var tfo_id1 = $(this).find('option:selected').attr('vid');
												console.log(tfo_id1);
												
												$.ajax({
													url: baseurl + 'fees/fees/getamt/'+tfo_id1,
													type: 'get',
													dataType: 'json',
													success: function(data){
														$('#bbb7').val(data.data.amount);
														
													}
												})
											 })
											 $('#aaa8').on('change', function(e){
												
												var tfo_id1 = $(this).find('option:selected').attr('vid');
												console.log(tfo_id1);
												
												$.ajax({
													url: baseurl + 'fees/fees/getamt/'+tfo_id1,
													type: 'get',
													dataType: 'json',
													success: function(data){
														$('#bbb8').val(data.data.amount);
														
													}
												})
											 })
											 $('#aaa9').on('change', function(e){
												
												var tfo_id1 = $(this).find('option:selected').attr('vid');
												console.log(tfo_id1);
												
												$.ajax({
													url: baseurl + 'fees/fees/getamt/'+tfo_id1,
													type: 'get',
													dataType: 'json',
													success: function(data){
														$('#bbb9').val(data.data.amount);
														
													}
												})
											 })
											 $('#aaa10').on('change', function(e){
												
												var tfo_id1 = $(this).find('option:selected').attr('vid');
												console.log(tfo_id1);
												
												$.ajax({
													url: baseurl + 'fees/fees/getamt/'+tfo_id1,
													type: 'get',
													dataType: 'json',
													success: function(data){
														$('#bbb10').val(data.data.amount);
														
													}
												})
											 })

											 $('#ccc1').on('change', function(e){
												
												var tfo_id1 = $('#aaa1').find('option:selected').attr('vid');
												
												
												$.ajax({
													url: baseurl + 'fees/fees/getamt/'+tfo_id1,
													type: 'get',
													dataType: 'json',
													success: function(data){
														var q1 = $('#ccc1').val();
														var amt2 = data.data.amount;
														var tot = parseFloat(q1) * parseFloat(amt2);
														
														$('#bbb1').val(tot);
														
													}
												})
											 }),


											 $('#ccc2').on('change', function(e){
												
												var tfo_id1 = $('#aaa2').find('option:selected').attr('vid');
												
												
												$.ajax({
													url: baseurl + 'fees/fees/getamt/'+tfo_id1,
													type: 'get',
													dataType: 'json',
													success: function(data){
														var q1 = $('#ccc2').val();
														var amt2 = data.data.amount;
														var tot = parseFloat(q1) * parseFloat(amt2);
														
														$('#bbb2').val(tot);
														
													}
												})
											 }),

											 $('#ccc3').on('change', function(e){
												
												var tfo_id1 = $('#aaa3').find('option:selected').attr('vid');
												
												
												$.ajax({
													url: baseurl + 'fees/fees/getamt/'+tfo_id1,
													type: 'get',
													dataType: 'json',
													success: function(data){
														var q1 = $('#ccc3').val();
														var amt2 = data.data.amount;
														var tot = parseFloat(q1) * parseFloat(amt2);
														
														$('#bbb3').val(tot);
														
													}
												})
											 }),

											 $('#ccc4').on('change', function(e){
												
												var tfo_id1 = $('#aaa4').find('option:selected').attr('vid');
												
												
												$.ajax({
													url: baseurl + 'fees/fees/getamt/'+tfo_id1,
													type: 'get',
													dataType: 'json',
													success: function(data){
														var q1 = $('#ccc4').val();
														var amt2 = data.data.amount;
														var tot = parseFloat(q1) * parseFloat(amt2);
														
														$('#bbb4').val(tot);
														
													}
												})
											 }),

											 $('#ccc5').on('change', function(e){
												
												var tfo_id1 = $('#aaa5').find('option:selected').attr('vid');
												
												
												$.ajax({
													url: baseurl + 'fees/fees/getamt/'+tfo_id1,
													type: 'get',
													dataType: 'json',
													success: function(data){
														var q1 = $('#ccc5').val();
														var amt2 = data.data.amount;
														var tot = parseFloat(q1) * parseFloat(amt2);
														
														$('#bbb5').val(tot);
														
													}
												})
											 }),

											 $('#ccc6').on('change', function(e){
												
												var tfo_id1 = $('#aaa6').find('option:selected').attr('vid');
												
												
												$.ajax({
													url: baseurl + 'fees/fees/getamt/'+tfo_id1,
													type: 'get',
													dataType: 'json',
													success: function(data){
														var q1 = $('#ccc6').val();
														var amt2 = data.data.amount;
														var tot = parseFloat(q1) * parseFloat(amt2);
														
														$('#bbb6').val(tot);
														
													}
												})
											 }),

											 $('#ccc7').on('change', function(e){
												
												var tfo_id1 = $('#aaa7').find('option:selected').attr('vid');
												
												
												$.ajax({
													url: baseurl + 'fees/fees/getamt/'+tfo_id1,
													type: 'get',
													dataType: 'json',
													success: function(data){
														var q1 = $('#ccc7').val();
														var amt2 = data.data.amount;
														var tot = parseFloat(q1) * parseFloat(amt2);
														
														$('#bbb7').val(tot);
														
													}
												})
											 }),

											 $('#ccc8').on('change', function(e){
												
												var tfo_id1 = $('#aaa8').find('option:selected').attr('vid');
												
												
												$.ajax({
													url: baseurl + 'fees/fees/getamt/'+tfo_id1,
													type: 'get',
													dataType: 'json',
													success: function(data){
														var q1 = $('#ccc8').val();
														var amt2 = data.data.amount;
														var tot = parseFloat(q1) * parseFloat(amt2);
														
														$('#bbb8').val(tot);
														
													}
												})
											 }),

											 $('#ccc9').on('change', function(e){
												
												var tfo_id1 = $('#aaa9').find('option:selected').attr('vid');
												
												
												$.ajax({
													url: baseurl + 'fees/fees/getamt/'+tfo_id1,
													type: 'get',
													dataType: 'json',
													success: function(data){
														var q1 = $('#ccc9').val();
														var amt2 = data.data.amount;
														var tot = parseFloat(q1) * parseFloat(amt2);
														
														$('#bbb9').val(tot);
														
													}
												})
											 }),

											 $('#ccc10').on('change', function(e){
												
												var tfo_id1 = $('#aaa10').find('option:selected').attr('vid');
												
												
												$.ajax({
													url: baseurl + 'fees/fees/getamt/'+tfo_id1,
													type: 'get',
													dataType: 'json',
													success: function(data){
														var q1 = $('#ccc10').val();
														var amt2 = data.data.amount;
														var tot = parseFloat(q1) * parseFloat(amt2);
														
														$('#bbb10').val(tot);
														
													}
												})
											 })
											//ADDITIONAL TFO NUMBER ONLY
											$(document).ready(function(){
												$('.numeric').numeric();
											});
											 $('.abab').on('click','a.addmoretfos', function(){
											//	alert(total);
												var addttfo = [],
	
														addt_total = 0,
														add_total1 = 0,
														addt_subtotal = 0,
														additionaltfo = $('div.row.addtfos'),
														atabletfo = additionaltfo.find('table');
	
														atabletfo.find('tbody').html('');
														breakdowns = [];
														addt_total = total;
														add_total1 = total;
														
	
												$('form.assessment div.hiddenfields').find('input[name ="total"]').val('');
												$('form.assessment div.totals span.total-amount').text(currencyFormat(parseFloat(0)));
												$('form.assessment div.hiddenfields').find('input[name="addtltfo"]').val('');
											
													$('select[name^="aaa"]').each(function(index,value) {
	
															var	tfo_name=($(this).val()),
																	indx=0;
																	
																indx = index;
																append = $('<tr />').appendTo(atabletfo.find('tbody'));
																$('<td />', { text: ($(this).val())}).appendTo(append);
																$('<td />', { html: '<span class="pull-left label label-info">Constant</span>' }).appendTo(append);
																$('.addtfos').show();
																
																$('input[name^="ccc"]').each(function(index2,value2) {
																	if(indx === index2){
																		var q2 = $(this).val();
																		console.log(q2)
																	}
																	 $('input[name^="bbb"]').each(function(index1,value1) {
																		
																		
																			if(indx === index1 && indx === index2){

																				addt_subtotal+=parseFloat($(this).val());
																				var addttfoamount = $(this).val();
																				
																				
																				addttfo.push({'tfo':tfo_name,'addttfoamount': addttfoamount, 'quant': q2 });
																				$('<td />', { html: '<span class="pull-left">&#8369 </span><span class="pull-right">' + addttfoamount + '</span>' }).appendTo(append);
																
																				// if(tfo_name=="Garbage Fee"){
																				// 	addtfogarbage=parseFloat($(this).val());
																				// 	alert('elel');
																				// }
																				// alert('cleo');
																				
																				
																			}
																		
																	
																	 });
																		
																	});

																	
														});
													// for surcharge in assessment form
										var date21 = new Date();	
										var permitnumber1 = details[0].permit_number;
									var permityear1 = permitnumber1.substring(0,4);
										var date11 =  new Date('01/31/'+permityear1);
									console.log(permityear1);
									
										var timeDiff1 = date21.getTime() - date11.getTime();
										var diffDays1 = timeDiff1 / (1000*3600*24); 
									// console.log("diffdays = "+diffDays)
										var dd1 = date21.getDate();
										var mm1 = date21.getMonth()+1; //January is 0!
										var yyyy1 = date21.getFullYear();
										if(dd1 < 10)
										{
											dd1 = '0'+ dd1;
										}
										if(mm1 < 10)
										{
											mm1 = '0' + mm1;
										}
										var date21 = mm1+'-'+dd1+'-'+yyyy1;
										// console.log("date12 = "+ date2);
										var dd1 = date11.getDate();
										var mm1 = date11.getMonth()+1; //January is 0!
										var yyyy1 = date11.getFullYear();
										if(dd1 < 10)
										{
											dd1 = '0'+ dd1;
										}
										if(mm1 < 10)
										{
											mm1 = '0' + mm1;
										}
										var date11 = mm1+'-'+dd1+'-'+yyyy1;
										// console.log("date1 = "+ date1);
										
										//SURCHARGE and INTEREST
										if(diffDays1>1){
											
												var surcharges1 = totalbustax*0.25;
										
										} else{
											var surcharges1 = 0;
				
										}
														// $('form.assessment div.hiddenfields').find('input[name="annual"]').val(eval(total+ given_surcharge + interest+ addt_subtotal));
														
														// int_n_sur.push({'interest': interest ,'surcharge' : given_surcharge});
														// intNSurJSON = JSON.stringify(int_n_sur);	
														
														if (details[0].payment_id == 1){
															if(details[0].application_id == 1 && details[0].renew_id == null && details[0].assessment_date == null){ //for freshly started business
																
																breakdowns.push({'label': "First-Annual",'dues' : due[0].value+'/'+tdate,'value': eval(total + addt_subtotal),'stat' : 'UnPaid'});
																breakdownsJSON = JSON.stringify(breakdowns);

																form.find('.totals span.total-amount').text(currencyFormat(parseFloat(total+addt_subtotal)));

															} else if (assessment_date != tdate && date_renewed==tdate){
																breakdowns.push({'label': "First-Annual",'dues' : due[0].value+'/'+tdate,'value': eval(total +addt_subtotal),'stat' : 'UnPaid'});
																breakdownsJSON = JSON.stringify(breakdowns);
																
																form.find('.totals span.total-amount').text(currencyFormat(parseFloat(total+addt_subtotal)));
																
															} else {
																breakdowns.push({'label': "First-Annual",'dues' : due[0].value+'/'+tdate,'value': eval(total +addt_subtotal),'stat' : 'UnPaid'});
																breakdownsJSON = JSON.stringify(breakdowns);
																
																form.find('.totals span.total-amount').text(currencyFormat(parseFloat(total+addt_subtotal)));
															}
														}
														if (details[0].payment_id == 2){
															if(details[0].application_id == 1 && details[0].renew_id == null && details[0].assessment_date == null){ //for freshly started business
																
																breakdowns.push({'label': 'First-Bi-Annual','dues' : due[0].value+'-'+tdate,'value': ((total + addt_subtotal)-totalbustax +(totalbustax/2)-(addtfogarbage/2)),'stat' : 'UnPaid'});
																breakdownsJSON = JSON.stringify(breakdowns);
															
																breakdowns.push({'label': 'Second-Bi-Annual','dues' : due[1].value+'-'+tdate,'value': ((totalbustax/2)+(addtfogarbage/2)),'stat' : 'UnPaid'});
																breakdownsJSON = JSON.stringify(breakdowns);

																form.find('.totals span.total-amount').text(currencyFormat(parseFloat(total+addt_subtotal)));
															
															} else if (assessment_date != tdate && date_renewed==tdate){
																breakdowns.push({'label': 'First-Bi-Annual','dues' : due[0].value+'-'+tdate,'value': ((total + addt_subtotal)-totalbustax +(totalbustax/2)-(addtfogarbage/2)),'stat' : 'UnPaid'});
																breakdownsJSON = JSON.stringify(breakdowns);
															
																breakdowns.push({'label': 'Second-Bi-Annual','dues' : due[1].value+'-'+tdate,'value': ((totalbustax/2)+(addtfogarbage/2)),'stat' : 'UnPaid'});
																breakdownsJSON = JSON.stringify(breakdowns);

																form.find('.totals span.total-amount').text(currencyFormat(parseFloat(total+addt_subtotal)));
															
															} 
															else{
																
																breakdowns.push({'label': 'First-Bi-Annual','dues' : due[0].value+'-'+tdate,'value': ((total + addt_subtotal)-totalbustax +(totalbustax/2)-(addtfogarbage/2)),'stat' : 'UnPaid'});
																breakdownsJSON = JSON.stringify(breakdowns);
															
																breakdowns.push({'label': 'Second-Bi-Annual','dues' : due[1].value+'-'+tdate,'value': ((totalbustax/2)+(addtfogarbage/2)),'stat' : 'UnPaid'});
																breakdownsJSON = JSON.stringify(breakdowns);

																form.find('.totals span.total-amount').text(currencyFormat(parseFloat(total+addt_subtotal)));
																

															}
														}
														if (details[0].payment_id == 3){
															if(details[0].application_id == 1 && details[0].renew_id == null && details[0].assessment_date == null){ //for freshly started business
																
																breakdowns.push({'label': 'First','dues' : due[0].value+'/'+tdate,'value': ((total + addt_subtotal)- totalbustax + (totalbustax/4)  + addttfototal),'stat' : 'UnPaid'});
																breakdownsJSON = JSON.stringify(breakdowns);
																
																breakdowns.push({'label': 'Second','dues' : due[1].value+'/'+tdate,'value': ((totalbustax/4)),'stat' : 'UnPaid'});
																breakdownsJSON = JSON.stringify(breakdowns);

																breakdowns.push({'label': 'Third','dues' : due[2].value+'/'+tdate,'value': ((totalbustax/4)),'stat' : 'UnPaid'});
																breakdownsJSON = JSON.stringify(breakdowns);
																
																breakdowns.push({'label': 'Fourth','dues' : due[3].value+'/'+tdate,'value': ((totalbustax/4)),'stat' : 'UnPaid'});
																breakdownsJSON = JSON.stringify(breakdowns);

																form.find('.totals span.total-amount').text(currencyFormat(parseFloat(total+addt_subtotal)));

																
															} else if (assessment_date != tdate && date_renewed==tdate){
																breakdowns.push({'label': 'First','dues' : due[0].value+'/'+tdate,'value': ((total + addt_subtotal)- totalbustax + (totalbustax/4)  + addttfototal),'stat' : 'UnPaid'});
																breakdownsJSON = JSON.stringify(breakdowns);
																
																breakdowns.push({'label': 'Second','dues' : due[1].value+'/'+tdate,'value': ((totalbustax/4)),'stat' : 'UnPaid'});
																breakdownsJSON = JSON.stringify(breakdowns);

																breakdowns.push({'label': 'Third','dues' : due[2].value+'/'+tdate,'value': ((totalbustax/4)),'stat' : 'UnPaid'});
																breakdownsJSON = JSON.stringify(breakdowns);
																
																breakdowns.push({'label': 'Fourth','dues' : due[3].value+'/'+tdate,'value': ((totalbustax/4)),'stat' : 'UnPaid'});
																breakdownsJSON = JSON.stringify(breakdowns);
															
																form.find('.totals span.total-amount').text(currencyFormat(parseFloat(total+addt_subtotal)));
																
															} else{
																breakdowns.push({'label': 'First','dues' : due[0].value+'/'+tdate,'value': ((total + addt_subtotal)- totalbustax + (totalbustax/4)  + addttfototal),'stat' : 'UnPaid'});
																breakdownsJSON = JSON.stringify(breakdowns);
																
																breakdowns.push({'label': 'Second','dues' : due[1].value+'/'+tdate,'value': ((totalbustax/4)),'stat' : 'UnPaid'});
																breakdownsJSON = JSON.stringify(breakdowns);

																breakdowns.push({'label': 'Third','dues' : due[2].value+'/'+tdate,'value': ((totalbustax/4)),'stat' : 'UnPaid'});
																breakdownsJSON = JSON.stringify(breakdowns);
																
																breakdowns.push({'label': 'Fourth','dues' : due[3].value+'/'+tdate,'value': ((totalbustax/4)),'stat' : 'UnPaid'});
																breakdownsJSON = JSON.stringify(breakdowns);
															
																form.find('.totals span.total-amount').text(currencyFormat(parseFloat(total+addt_subtotal)));
																
															}
														}
														

														
														
													if(details[0].payment_id == '1'){
														if(details[0].application_id == 1 && details[0].renew_id == null && details[0].assessment_date == null){
															$('form.assessment div.row.annual').find('span.annually').text(currencyFormat(parseFloat(add_total1 + addt_subtotal))).css({'font-weight':'bold'});
															$('form.assessment div.hiddenfields').find('input[name ="annually"]').val(add_total1 + addt_subtotal);
															$('form.assessment div.hiddenfields').find('input[name ="total_tax_due"]').val(add_total1 + addt_subtotal);
															$('form.assessment div.hiddenfields').find('input[name ="breakdowns"]').val(breakdownsJSON);
															form.find('.totals span.total-amount').text(currencyFormat(parseFloat(total+addt_subtotal)));
															form.find('.totals span.total-overallzz').text(currencyFormat(parseFloat(total + addt_subtotal + addttfototal + surcharges1)));
															form.find('.totals span.surchargessamplezz').text(currencyFormat(parseFloat(surcharges1 )));
															
														}
									
														else if (assessment_date != tdate && date_renewed==tdate){
															$('form.assessment div.row.annual').find('span.annually').text(currencyFormat(parseFloat(add_total1 + addt_subtotal))).css({'font-weight':'bold'});
															$('form.assessment div.hiddenfields').find('input[name ="annually"]').val(add_total1 + addt_subtotal);
															$('form.assessment div.hiddenfields').find('input[name ="total_tax_due"]').val(add_total1 + addt_subtotal);
															$('form.assessment div.hiddenfields').find('input[name ="breakdowns"]').val(breakdownsJSON);
															form.find('.totals span.total-amount').text(currencyFormat(parseFloat(total+addt_subtotal)));
															form.find('.totals span.total-overallzz').text(currencyFormat(parseFloat(total + addt_subtotal + addttfototal + surcharges1)));
															form.find('.totals span.surchargessamplezz').text(currencyFormat(parseFloat(surcharges1 )));
															
														}
														else{
															$('form.assessment div.row.annual').find('span.annually').text(currencyFormat(parseFloat(add_total1 + addt_subtotal))).css({'font-weight':'bold'});
															$('form.assessment div.hiddenfields').find('input[name ="annually"]').val(add_total1 + addt_subtotal);
															$('form.assessment div.hiddenfields').find('input[name ="total_tax_due"]').val(add_total1 + addt_subtotal);
															$('form.assessment div.hiddenfields').find('input[name ="breakdowns"]').val(breakdownsJSON);
															
															form.find('.totals span.total-amount').text(currencyFormat(parseFloat(total+addt_subtotal)));
															form.find('.totals span.total-overallzz').text(currencyFormat(parseFloat(total + addt_subtotal + addttfototal + surcharges1)));
															form.find('.totals span.surchargessamplezz').text(currencyFormat(parseFloat(surcharges1 )));
															

														}
													}else if(details[0].payment_id == '2'){
														
														if(details[0].application_id == 1 && details[0].renew_id == null && details[0].assessment_date == null){ // for freshly started businessssssssss
															$('form.assessment div.row.annual').find('span.first').text(currencyFormat(parseFloat((total + addt_subtotal)-(totalbustax/2)-(addtfogarbage/2)))).css({'font-weight':'bold'});
														    $('form.assessment div.hiddenfields').find('input[name ="first_semi_annual"]').val((total + addt_subtotal)-(totalbustax/2)-(addtfogarbage/2));
															
															$('form.assessment div.row.annual').find('span.second').text(currencyFormat(parseFloat((totalbustax/2)+(addtfogarbage/2)))).css({'font-weight':'bold'});
															$('form.assessment div.hiddenfields').find('input[name ="second_semi_annual"]').val((totalbustax/2)+(addtfogarbage/2));
															
															$('form.assessment div.hiddenfields').find('input[name ="total_tax_due"]').val(total + addt_subtotal);
															$('form.assessment div.hiddenfields').find('input[name ="breakdowns"]').val(breakdownsJSON);
														
														} else if (assessment_date != tdate && date_renewed==tdate){

															$('form.assessment div.row.annual').find('span.first').text(currencyFormat(parseFloat((total + addt_subtotal)-(totalbustax/2)-(addtfogarbage/2)))).css({'font-weight':'bold'});
														    $('form.assessment div.hiddenfields').find('input[name ="first_semi_annual"]').val((total + addt_subtotal)-(totalbustax/2)-(addtfogarbage/2));
															
															$('form.assessment div.row.annual').find('span.second').text(currencyFormat(parseFloat((totalbustax/2)+(addtfogarbage/2)))).css({'font-weight':'bold'});
															$('form.assessment div.hiddenfields').find('input[name ="second_semi_annual"]').val((totalbustax/2)+(addtfogarbage/2));
															
															$('form.assessment div.hiddenfields').find('input[name ="total_tax_due"]').val(total + addt_subtotal);
															$('form.assessment div.hiddenfields').find('input[name ="breakdowns"]').val(breakdownsJSON);
														} else{
															$('form.assessment div.row.annual').find('span.first').text(currencyFormat(parseFloat((total + addt_subtotal)-(totalbustax/2)-(addtfogarbage/2)))).css({'font-weight':'bold'});
														    $('form.assessment div.hiddenfields').find('input[name ="first_semi_annual"]').val((total + addt_subtotal)-(totalbustax/2)-(addtfogarbage/2));
															
															$('form.assessment div.row.annual').find('span.second').text(currencyFormat(parseFloat((totalbustax/2)+(addtfogarbage/2)))).css({'font-weight':'bold'});
															$('form.assessment div.hiddenfields').find('input[name ="second_semi_annual"]').val((totalbustax/2)+(addtfogarbage/2));
															
															$('form.assessment div.hiddenfields').find('input[name ="total_tax_due"]').val(total + addt_subtotal);
															$('form.assessment div.hiddenfields').find('input[name ="breakdowns"]').val(breakdownsJSON);
														}
														
													} else if(details[0].payment_id == '3'){
														
														if(details[0].application_id == 1 && details[0].renew_id == null && details[0].assessment_date == null){ // for freshly started businessssssssss	
															// $('form.assessment div.row.annual').find('span.quarterly').text(currencyFormat(parseFloat((total + addt_subtotal)- totalbustax + (totalbustax/4)  + addttfototal))).css({'font-weight':'bold'});
															$('form.assessment div.hiddenfields').find('input[name ="first_quarter"]').val((total + addt_subtotal)-totalbustax+(totalbustax/4)-(addtfogarbage/4));
															$('form.assessment div.row.annual').find('span.first').text(currencyFormat(parseFloat((total + addt_subtotal)-totalbustax+(totalbustax/4)-(addtfogarbage/4)))).css({'font-weight':'bold'});
															
															$('form.assessment div.hiddenfields').find('input[name ="second_quarter"]').val((totalbustax/4)+(addtfogarbage/4));
															$('form.assessment div.row.annual').find('span.second').text(currencyFormat(parseFloat((totalbustax/4)+(addtfogarbage/4)))).css({'font-weight':'bold'});
																																																								
															$('form.assessment div.hiddenfields').find('input[name ="third_quarter"]').val((totalbustax/4)+(addtfogarbage/4));
															$('form.assessment div.row.annual').find('span.third').text(currencyFormat(parseFloat((totalbustax/4)+(addtfogarbage/4)))).css({'font-weight':'bold'});
																														
															$('form.assessment div.hiddenfields').find('input[name ="fourth_quarter"]').val((totalbustax/4)+(addtfogarbage/4));
															$('form.assessment div.row.annual').find('span.fourth').text(currencyFormat(parseFloat((totalbustax/4)+(addtfogarbage/4)))).css({'font-weight':'bold'});
												
															$('form.assessment div.hiddenfields').find('input[name ="total_tax_due"]').val(total + addt_subtotal);
															$('form.assessment div.hiddenfields').find('input[name ="breakdowns"]').val(breakdownsJSON);
														}  else if (assessment_date != tdate && date_renewed==tdate){
															$('form.assessment div.hiddenfields').find('input[name ="first_quarter"]').val((total + addt_subtotal)-totalbustax+(totalbustax/4)-(addtfogarbage/4));
															$('form.assessment div.row.annual').find('span.first').text(currencyFormat(parseFloat((total + addt_subtotal)-totalbustax+(totalbustax/4)-(addtfogarbage/4)))).css({'font-weight':'bold'});
															
															$('form.assessment div.hiddenfields').find('input[name ="second_quarter"]').val((totalbustax/4)+(addtfogarbage/4));
															$('form.assessment div.row.annual').find('span.second').text(currencyFormat(parseFloat((totalbustax/4)+(addtfogarbage/4)))).css({'font-weight':'bold'});
																																																								
															$('form.assessment div.hiddenfields').find('input[name ="third_quarter"]').val((totalbustax/4)+(addtfogarbage/4));
															$('form.assessment div.row.annual').find('span.third').text(currencyFormat(parseFloat((totalbustax/4)+(addtfogarbage/4)))).css({'font-weight':'bold'});
																														
															$('form.assessment div.hiddenfields').find('input[name ="fourth_quarter"]').val((totalbustax/4)+(addtfogarbage/4));
															$('form.assessment div.row.annual').find('span.fourth').text(currencyFormat(parseFloat((totalbustax/4)+(addtfogarbage/4)))).css({'font-weight':'bold'});
												
															$('form.assessment div.hiddenfields').find('input[name ="total_tax_due"]').val(total + addt_subtotal);
															$('form.assessment div.hiddenfields').find('input[name ="breakdowns"]').val(breakdownsJSON);
														
														}
														else {
															$('form.assessment div.hiddenfields').find('input[name ="first_quarter"]').val((total + addt_subtotal)-totalbustax+(totalbustax/4)-(addtfogarbage/4));
															$('form.assessment div.row.annual').find('span.first').text(currencyFormat(parseFloat((total + addt_subtotal)-totalbustax+(totalbustax/4)-(addtfogarbage/4)))).css({'font-weight':'bold'});
															
															$('form.assessment div.hiddenfields').find('input[name ="second_quarter"]').val((totalbustax/4)+(addtfogarbage/4));
															$('form.assessment div.row.annual').find('span.second').text(currencyFormat(parseFloat((totalbustax/4)+(addtfogarbage/4)))).css({'font-weight':'bold'});
																																																								
															$('form.assessment div.hiddenfields').find('input[name ="third_quarter"]').val((totalbustax/4)+(addtfogarbage/4));
															$('form.assessment div.row.annual').find('span.third').text(currencyFormat(parseFloat((totalbustax/4)+(addtfogarbage/4)))).css({'font-weight':'bold'});
																														
															$('form.assessment div.hiddenfields').find('input[name ="fourth_quarter"]').val((totalbustax/4)+(addtfogarbage/4));
															$('form.assessment div.row.annual').find('span.fourth').text(currencyFormat(parseFloat((totalbustax/4)+(addtfogarbage/4)))).css({'font-weight':'bold'});
												
															$('form.assessment div.hiddenfields').find('input[name ="total_tax_due"]').val(total + addt_subtotal);
															$('form.assessment div.hiddenfields').find('input[name ="breakdowns"]').val(breakdownsJSON);
														}														
													}
													addttfoJSON = JSON.stringify(addttfo);
													
													if(details[0].application_id == 1 && details[0].renew_id == null && details[0].assessment_date == null){ // for freshly started businessssssssss								
														$('form.assessment div.totals span.total-amount').text(currencyFormat(parseFloat(addt_subtotal + total)));	
													}	else if (assessment_date != tdate && date_renewed==tdate){
														$('form.assessment div.totals span.total-amount').text(currencyFormat(parseFloat(addt_subtotal + total)));	
													}
													
													$('form.assessment div.hiddenfields').find('input[name="addtltfo"]').val(addttfoJSON);
	
												});
												
										 } else {
	
										 }
	
									 }); //end of col_bot
									});
									/**End of additional tfos*/
							} //end of for
	
							appendaddtfo = $('<tr />').appendTo(numaddtfotable.find('tbody'));
								$('<td />', { html: '<input type="number" id="nochapter" min="0" max="50" placeholder="Number of TFOs to be added" class="form-control"/>' }).appendTo(appendaddtfo); console.log('lagot na dis');
								$('<td />', { html: '<input type="button" id="display" value="Click to Add input" class="btn btn-outline btn-info col_bot"/>' }).appendTo(appendaddtfo);
								

							$('form.assessment div.hiddenfields').append('<input type="hidden" name ="breakdowns" value='+breakdownsJSON+'>');						
							$('form.assessment div.hiddenfields').append('<input type="hidden" name ="interest_n_surcharge" value='+intNSurJSON+'>');
							$('form.assessment div.hiddenfields').append('<input type="hidden" name ="total" value='+total+'>');
							ai++;
	
	
								
							
										/**********************end of breakdown insertion**********************/
	

	
										if(details[0].payment_id == 1) {
											if(details[0].application_id == 1 && details[0].renew_id == null && details[0].assessment_date == null){ // for freshly started businessssssssss								
												form.find('form.assessment input[name="payment"]').val('Annual');
												form.find('form.assessment input[name="annually"]').val(parseFloat(total + addt_subtotal));
												form.find('form.assessment input[name="quarterly"]').val(0);
												form.find('form.assessment input[name="semi_annually"]').val(0);
											} else if (assessment_date != tdate && date_renewed==tdate){
												form.find('form.assessment input[name="payment"]').val('Annual');
												form.find('form.assessment input[name="annually"]').val(parseFloat(total + addt_subtotal));
												form.find('form.assessment input[name="quarterly"]').val(0);
												form.find('form.assessment input[name="semi_annually"]').val(0);
											}
												
										  } 
										  
										  else if(details[0].payment_id == 2) {
				
											if(details[0].application_id == 1 && details[0].renew_id == null && details[0].assessment_date == null){ // for freshly started businessssssssss								
												form.find('form.assessment input[name="payment"]').val('Semi_annual');
												form.find('form.assessment input[name="first_quarter"]').val(parseFloat(0));
												form.find('form.assessment input[name="second_quarter"]').val(parseFloat(0));
												form.find('form.assessment input[name="third_quarter"]').val(parseFloat(0));
												form.find('form.assessment input[name="fourth_quarter"]').val(parseFloat(0));
												form.find('form.assessment input[name="quarterly"]').val(0);
												form.find('form.assessment input[name="annually"]').val(0);
												form.find('form.assessment input[name="first_semi_annual"]').val(parseFloat((total/2) + (addt_subtotal/2)));
												form.find('form.assessment input[name="second_semi_annual"]').val(parseFloat((total/2) + (addt_subtotal/2)));
											} else if (assessment_date != tdate && date_renewed==tdate){
												form.find('form.assessment input[name="payment"]').val('Semi_annual');
												form.find('form.assessment input[name="first_quarter"]').val(parseFloat(0));
												form.find('form.assessment input[name="second_quarter"]').val(parseFloat(0));
												form.find('form.assessment input[name="third_quarter"]').val(parseFloat(0));
												form.find('form.assessment input[name="fourth_quarter"]').val(parseFloat(0));
												form.find('form.assessment input[name="quarterly"]').val(0);
												form.find('form.assessment input[name="annually"]').val(0);
												form.find('form.assessment input[name="first_semi_annual"]').val(parseFloat((total/2) + (addt_subtotal/2)));
												form.find('form.assessment input[name="second_semi_annual"]').val(parseFloat((total/2) + (addt_subtotal/2)));
											}
												  
												
										  } 
										  else if(details[0].payment_id == 3) { // Quarterly Payment
											if(details[0].application_id == 1 && details[0].renew_id == null && details[0].assessment_date == null){ // for freshly started businessssssssss								
												form.find('form.assessment input[name="payment"]').val('first_quarter');
												form.find('form.assessment input[name="first_semi_annual"]').val(parseFloat(0));
												form.find('form.assessment input[name="second_semi_annual"]').val(parseFloat(0));
					
												form.find('form.assessment input[name="annually"]').val(parseFloat(0));
												form.find('form.assessment input[name="semi_annually"]').val(0);
												form.find('form.assessment input[name="first_quarter"]').val(parseFloat((total/4) + (addt_subtotal/4)));
												form.find('form.assessment input[name="second_quarter"]').val(parseFloat((total/4) + (addt_subtotal/4)));
												form.find('form.assessment input[name="third_quarter"]').val(parseFloat((total/4) + (addt_subtotal/4)));
												form.find('form.assessment input[name="fourth_quarter"]').val(parseFloat((total/4) + (addt_subtotal/4)));
											} else if (assessment_date != tdate && date_renewed==tdate){
												form.find('form.assessment input[name="payment"]').val('first_quarter');
												form.find('form.assessment input[name="first_semi_annual"]').val(parseFloat(0));
												form.find('form.assessment input[name="second_semi_annual"]').val(parseFloat(0));
					
												form.find('form.assessment input[name="annually"]').val(parseFloat(0));
												form.find('form.assessment input[name="semi_annually"]').val(0);
												form.find('form.assessment input[name="first_quarter"]').val(parseFloat((total/4) + (addt_subtotal/4)));
												form.find('form.assessment input[name="second_quarter"]').val(parseFloat((total/4) + (addt_subtotal/4)));
												form.find('form.assessment input[name="third_quarter"]').val(parseFloat((total/4) + (addt_subtotal/4)));
												form.find('form.assessment input[name="fourth_quarter"]').val(parseFloat((total/4) + (addt_subtotal/4)));
											}
													
											
											
										  }
	
						  // // form.find('.totals span.total-amount').text(currencyFormat(parseFloat(total)));
						  // // form.find('.totals span.total-amount').text(incrementor());
						  // // incrementor(form.find('.totals span.total-amount'), total);
						  // form.find('.totals span.total-amount').text(currencyFormat(parseFloat(total)));
					  } else {
	
						  var modal = $('#assess'),
							  form = $('#assess'),
							  msg = modal.find('.business-natures');
							  modal.modal('show');
						  show_message(msg, result.message+'. Please check if this business has been renewed', 'Information!', 'info');
						form.find('button.assess-now').attr('disabled', true);
						  //alert('Please check Required TFO for this business nature or Check if the business nature exists');
					  }
				  }
			  });
		 });

		 $('#edit-business-nature').on('click','a.add-gross' ,function (e) {
			var gross =$('input[name^="gross"]').map(function(){
	
						return $(this).val();
						}).get().join(':'),
				year = $('input[name^="year"]').map(function(){
	
						return $(this).val();
						}).get().join(':'),
				bus_line_id = $('#edit-business-nature').find('input[name="bus_line_id"]').val(),
				app_id = $('#edit-business-nature').find('input[name="app_id"]').val();
	
	
	
			$.ajax ({
				url: baseurl + 'fees/api/owner/add_gross/' + bus_line_id + '/' + year +  '/'  + gross,
				type: 'get',
				dataType: 'json',
				  success: function(result) {
					if (result.error ===0){
						$('#edit-business-nature').hide();
						modal = $('#assess');
						modal.modal('show');
	
						$.ajax({
						url: baseurl + 'fees/api/owner/assess/' + app_id,
						type: 'get',
						dataType: 'json',
						beforeSend: function() {
							modal.find();
						},
						success: function(result) {
							if(result.error === 0) {
								var details = result.data.business,
									due = result.data.due_date,
									form = $('#assess'),
									breakdowns = [],
									breakdownsJSON = "",
									subtotal = 0, total = 0,
									given_surcharge = 0,interest = 0;
	
									table = form.find('table tbody');
	
								form.find('.header-detail span.owner').text(capitalize(details[0].firstname + ' ' + details[0].middlename + ' ' + details[0].lastname));
								form.find('.header-detail span.business').text(capitalize(details[0].business_name));
								form.find('.header-detail span.payment').text(capitalize(details[0].payment_type));
	
								$('div.row.quarterly').hide();
								var business_natures = $('.business-natures'),
									clone = $('.clones .clone').clone(),
									container = $('.excesstfo');
	
								var qtfo = 0, pquarter = 0, // Quarterly TFO
									atfo = 0, annually = 0, // Annually TFO
									btfo = 0, biannual = 0; //Bi annually
									tax  = 0;
	
								var dues = new Array();
	
								business_natures.html('');
	
								for(var i in details) {
									var tdate = new Date(), tdate = tdate.getFullYear(),
										n=0,tfo_amount = 0,
										buss_app_date = new Date(details[i].application_date),
										buss_app_date = buss_app_date.getFullYear();
										$C = 0, gr = $.parseJSON(details[i].gross),
										//new_gross = JSON.stringify(gr),
										payment_mode=details[i].payment_id;
	
	
									if($.isEmptyObject(gr)) {
										$C = parseFloat(details[i].capital);
										console.log('Capital: ' + details[i].capital);
									} else {
										for(y in gr) {
											//if(gr[y].year == tdate) {
												$C = gr[y].gross;
											//}
										}	//alert($C);
									}
	
									clone.clone(true).find('.business-detail').each(function() {
									 //alert($C);
									 if(details[i].delinquent_year > 0){
										var delinquent_year = "- "+details[i].delinquent_year;
									}else{
										var delinquent_year = "";
									}
									$(this).find('span.nature').text(details[i].business_nature);
									$(this).find('span.delinquent').text(delinquent_year);
										$(this).find('span.address').text(capitalize(details[i].street_address));
										$(this).find('span.capital').text(currencyFormat(parseFloat($C)));
										//$(this).find('span.year').text();
									}).end()
									.find('table').each(function() {
										var tbl = $(this).find('tbody'),
											msg = $(this).parent().find('.messages'),
											subtotal = 0,store_surcharge=0;
										tbl.html('');
										var assess_btn = result.data.ignore[0];
											for(indx in result.data.tfos[i]) {
												var fees = result.data.tfos[i][indx],
													//yearget = grossto * .02,
													tr = $('<tr />').appendTo(tbl),
													value = '', gross = 0,subtotal_tfo = 0;
												if(result.data.required.length > 0) {
													form.find('a.approve-now').attr('disabled', true);
													form.find('a.clear-requirements').attr('disabled', false);
													show_message(msg, 'Missing requirement: \r\n<strong>' + result.data.required[i].join(', ') + '</strong>', 'Warning!', 'danger');
												} else {
													form.find('a.approve-now').attr('disabled', false);
													form.find('a.clear-requirements').attr('disabled', true);
												}
												if(result.data.ignore[i][indx] === true) {
													//form.find('a.assess-now').removeClass('disabled');
													form.find('button.assess-now').attr('disabled', true);
													show_message(msg, 'This Business is already assessed. Please proceed to Payment.', 'Information!', 'info');
												} else {
													//form.find('a.assess-now').attr('disabled', false);
													$('button.assess-now').removeClass('disabled');
												}
												if(fees.type == 1) { // Formula
													var variables = $.parseJSON(fees.variables),
														formula = fees.value;
													extract(variables);
													var amt = eval(formula);
													subtotal = parseFloat(amt);
														if(details[i].payment_id == 1) { // Business paymentmode is Annually
														value = '<span class="pull-left label label-success">Formula Type</span><span class="pull-left">&nbsp;&nbsp;&nbsp;&nbsp;&#8369;</span><span class="pull-right"><strong>'+ '(' + fees.value + ')' + ' ' + currencyFormat(parseFloat(amt)) + '</strong></span>';
																	annually = amt;
																	atfo = annually;
																	annually = annually + atfo;
																		if (result.data.renewed == 1){
																			surcharges = result.data.add_surcharge;
																			given_surcharge = given_surcharge + parseFloat(eval(amt * surcharges[i].surcharge));
																			interest = interest + parseFloat((eval(amt * surcharges[i].interest) * result.data.number_of_months));
																		}
														} else if(details[i].payment_id == 2) { 	// Business paymentmode is Semi-Annual
														value = '<span class="pull-left label label-success">Formula Type</span><span class="pull-left">&nbsp;&nbsp;&nbsp;&nbsp;&#8369;</span><span class="pull-right"><strong>' + '(' + fees.value + ')' +' ' + currencyFormat(parseFloat(amt)) + '</strong></span>';
																	if (fees.tfo_type == 1){
																		btfo = amt / 2;
																		biannual = biannual + btfo;
																		console.log('Formula Bi-Annual: ' + btfo + ' = ' + subtotal + ' Quarterly First Payment for ' + fees.tfo + ' Annually Total: ' + biannual);
																			if (result.data.renewed == 1){
																				surcharges = result.data.add_surcharge;
																				given_surcharge = given_surcharge + parseFloat(eval(amt * surcharges[i].surcharge));
																				interest = interest + parseFloat((eval(amt * surcharges[i].interest) * result.data.number_of_months));
																			}
																	} else {
																		btfo = subtotal;
																		biannual = biannual + btfo;
																	}
															//tfo_amount	+= biannual;
															//alert(given_surcharge);
														} else if(details[i].payment_id == 3) {		// Business paymentmode is Quarterly
																value = '<span class="pull-left label label-warning">Formula Type</span><span class="pull-left">&nbsp;&nbsp;&nbsp;&nbsp;&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat(amt)) + '</strong></span>';
	
																if (fees.tfo_type == 1){
																		qtfo = subtotal / 4;
																		pquarter = pquarter + qtfo;
																		annually+=pquarter;
	
																		if (result.data.renewed == 1){
																			surcharges = result.data.add_surcharge;
																			given_surcharge = given_surcharge + parseFloat(eval(amt * surcharges[i].surcharge));
																			interest = interest + parseFloat((eval(amt * surcharges[i].interest) * result.data.number_of_months));
																		}
	
																} else {
																	qtfo = subtotal;
																	pquarter = pquarter + qtfo;
																	annually = pquarter;
																	console.log('Formula Quarterlyfd: ' + qtfo + ' = ' + subtotal + ' Quarterly First Payment for ' + fees.tfo + ' Quarterly Total: ' + pquarter);
																}
															tfo_amount += pquarter;
														}
												}//end of Formula
												else if(fees.type == 2) { // TFO is of Constant type
													value = '<span class="pull-left label label-success">Constant</span><span class="pull-left">&nbsp;&nbsp;&nbsp;&nbsp;&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat(fees.value)) + '</strong></span>';
													if(details[i].payment_id == 1) {  // Business paymentmode is Annually
													subtotal = parseFloat(fees.value);
	
															atfo = subtotal;
															annually = annually + atfo;
																if (result.data.renewed == 1){
																	surcharges = result.data.add_surcharge;
																	given_surcharge = given_surcharge + parseFloat(eval(amt * surcharges[i].surcharge));
																	interest = interest + parseFloat((eval(amt * surcharges[i].interest) * result.data.number_of_months));
																}
													} else if(details[i].payment_id == 2) { //Business paymentmode is Semi-Annual
	
													if(fees.payment_id == 1) {	// TFO paymentmode is Annual
													subtotal = parseFloat(fees.value);
	
														atfo = subtotal;
														annually = annually + atfo;
														tfo_amount += annually;
													} else if(fees.payment_id == 2) { //TFO paymentmode is Bi-Annual
	
															if (fees.tfo_type == 1){
																btfo = subtotal / 2;
																biannual = biannual + btfo;
	
																//tax + surcharges if not payed on time
																if (result.data.renewed == 1){
																	surcharges = result.data.add_surcharge;
																	given_surcharge = given_surcharge + parseFloat(eval(subtotal * surcharges[i].surcharge));
																	interest = interest + parseFloat((eval(subtotal * surcharges[i].interest) * result.data.number_of_months));
																}
																console.log('Formula Bi-Annual: ' + btfo + ' = ' + subtotal + '  First Payment for ' + fees.tfo + ' Annually Total: ' + biannual);
															} else {
																btfo = subtotal;
																biannual = biannual + btfo;
																console.log('Formula Bi-Annual: ' + btfo + ' = ' + subtotal + '  First Payment for ' + fees.tfo + ' Annually Total: ' + biannual);
															}
													}
	
													} else if(details[i].payment_id == 3 ){ //Business paymentmode is Quarterly
														subtotal = parseFloat(fees.value);
															value = '<span class="pull-left label label-success">Constant Value</span><span class="pull-left">&nbsp;&nbsp;&nbsp;&nbsp;&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat(fees.value)) + '</strong></span>';
															subtotal = parseFloat(fees.value);
															atfo = subtotal;
															annually = annually + atfo;
	
																if (fees.tfo_type == 1){
																	qtfo = subtotal / 4;
																	pquarter = pquarter + qtfo;
	
																	//tax + surcharges if not payed on time
																	if (result.data.renewed == 1){
																		surcharges = result.data.add_surcharge;
																		given_surcharge = given_surcharge + parseFloat(eval(subtotal * surcharges[i].surcharge));
																		interest = interest + parseFloat((eval(subtotal * surcharges[i].interest) * result.data.number_of_months));
																	}
																} else {
																	qtfo = subtotal;
																	pquarter = pquarter + qtfo;
																}
													}else if(details[i].payment_id == 3) {		//Business paymentmode is of Quarterly
														if(fees.payment_id == 1) {	// TFO paymentmode is Annual
															value = '<span class="pull-left label label-success">Constant Value</span><span class="pull-left">&nbsp;&nbsp;&nbsp;&nbsp;&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat(fees.value)) + '</strong></span>';
															subtotal = parseFloat(fees.value);
															atfo = subtotal;
															annually = annually + atfo;
															tfo_amount += pquarter;
														} else if (fees.payment_id == 3) { //TFO paymentmode is Quarterly
															value = '<span class="pull-left label label-warning">Constant Value</span><span class="pull-left">&nbsp;&nbsp;&nbsp;&nbsp;&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat(fees.value)) + '</strong></span>';
																if (fees.tfo_type == 1){
																	subtotal = parseFloat(fees.value);
																	qtfo = subtotal / 4;
																	pquarter = pquarter + atfo;
	
																	//tax + surcharges if not payed on time
																	if (result.data.renewed == 1){
																		surcharges = result.data.add_surcharge;
																		given_surcharge = given_surcharge + parseFloat(eval(amt * surcharges[i].surcharge));
																		interest = interest + parseFloat((eval(amt * surcharges[i].interest) * result.data.number_of_months));
																	}
																} else {
																	subtotal = parseFloat(fees.value);
																	qtfo = subtotal;
																	pquarter = pquarter + atfo;
																}
														}
													}
												} //end of Constant
												else if(fees.type == 3) {		// Range
													if(details[i].payment_id == 1) {			// Annually	ang business
														if(fees.payment_id == 1) {				// Annually ang tfo
															values = $.parseJSON(fees.value);
															value = '<div class="range-list">' +
																'<p class="btn btn-xs btn-info show-range">Click to view Range <span class="caret"></span></p>' +
																'<div class="slide-range" style="display: none;">';
	
															for(index in values) {
																value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].min)) + '</span> - ';
																value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].max)) + '</span> = ';
																value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].value)) + '</span><br />';
																var cp = parseFloat(details[i].capital),
																	min = parseFloat(values[index].min),
																	max = parseFloat(values[index].max);
																//alert(cp);
																// console.info(cp + ' >=' + min + ' = ');
																// console.info(cp >= min);
																// console.log('-------------------------------')
																// console.info(cp + ' <=' + max + ' = ');
																// console.info(cp <= max);
																if(cp >= min && cp <= max) {
																	subtotal = parseFloat(values[index].value);
																	atfo = subtotal;
																	// console.log(atfo);
																}else {
																	subtotal = 0;
																	atfo = 0;
																}
															}
	
															value += '</div></div>';
															annually = annually + atfo;
															// console.log('Formula Annual: ' + atfo + ' = ' + subtotal + ' Annual Payment for ' + fees.tfo);
														} else if (fees.payment_id == 2){ //Bi-annuall ang tfo
														//alert('Bi-annuall ang tfo');
															values = $.parseJSON(fees.value);
															value = '<div class="range-list">' +
																'<p class="btn btn-xs btn-info show-range">Click to view Range <span class="caret"></span></p>' +
																'<div class="slide-range" style="display: none;">';
	
															for(index in values) {
																value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].min)) + '</span> - ';
																value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].max)) + '</span> = ';
																value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].value)) + '</span><br />';
																var cp = parseFloat(details[i].capital),
																	min = parseFloat(values[index].min),
																	max = parseFloat(values[index].max);
																//alert(cp);
																// console.info(cp + ' >=' + min + ' = ');
																// console.info(cp >= min);
																// console.log('-------------------------------')
																// console.info(cp + ' <=' + max + ' = ');
																// console.info(cp <= max);
																if(cp >= min && cp <= max) {
																	subtotal = parseFloat(values[index].value);
																	btfo = subtotal / 2;
																	// console.log(atfo);
																}else {
																	subtotal = 0;
																	btfo = 0;
																}
															}
	
															value += '</div></div>';
															//annually = annually + atfo;
															biannual = biannual + btfo;
														}
													} else if(details[i].payment_id == 2) {		// Semi-Annual ang business
													//alert('bi -annual');
														if(fees.payment_id == 1) {// alert('annual tfo');
															values = $.parseJSON(fees.value);
															value = '<div class="range-list">' +
																'<p class="btn btn-xs btn-info show-range">Click to view Range <span class="caret"></span></p>' +
																'<div class="slide-range" style="display: none;">';
	
															for(index in values) {
																value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].min)) + '</span> - ';
																value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].max)) + '</span> = ';
																value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].value)) + '</span><br />';
																var cp = parseFloat(details[i].capital),
																	min = parseFloat(values[index].min),
																	max = parseFloat(values[index].max);
																//alert(cp);
																// console.info(cp + ' >=' + min + ' = ');
																// console.info(cp >= min);
																// console.log('-------------------------------')
																// console.info(cp + ' <=' + max + ' = ');
																// console.info(cp <= max);
																if(cp >= min && cp <= max) {
																	subtotal = parseFloat(values[index].value);
																	atfo = subtotal;
																	// console.log(atfo);
																}else {
																	subtotal = 0;
																	atfo = 0;
																}
															}
	
															value += '</div></div>';
															annually = annually + atfo;
															//biannual = biannual + btfo;
														} else if(fees.payment_id == 2) {
															//alert('bi annual ang tfo');
														} else if (fees.payment_id == 3){
															//alert('quarterly ang tfo');
														}
													} else if(details[i].payment_id == 3) {		// Quarterly
														if(fees.payment_id == 1) {
															values = $.parseJSON(fees.value);
															value = '<div class="range-list">' +
																'<p class="btn btn-xs btn-info show-range">Click to view Range <span class="caret"></span></p>' +
																'<div class="slide-range" style="display: none;">';
	
															for(index in values) {
																value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].min)) + '</span> - ';
																value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].max)) + '</span> = ';
																value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].value)) + '</span><br />';
																var cp = parseFloat(details[i].capital),
																	min = parseFloat(values[index].min),
																	max = parseFloat(values[index].max);
	
																// console.info(cp + ' >=' + min + ' = ');
																// console.info(cp >= min);
																// console.log('-------------------------------')
																// console.info(cp + ' <=' + max + ' = ');
																// console.info(cp <= max);
																if(cp >= min && cp <= max) {
																	subtotal = parseFloat(values[index].value);
																	atfo = subtotal;
																} else {
																	subtotal = 0;
																	atfo = 0;
																}
															}
	
															value += '</div></div>';
															annually = annually + atfo;
															// console.log('Formula Annual: ' + atfo + ' = ' + subtotal + ' Quarterly First Payment for ' + fees.tfo + ' Annually Total: ' + annually);
														} else if(fees.payment_id == 3) {
															values = $.parseJSON(fees.value);
															value = '<div class="range-list">' +
																'<p class="btn btn-xs btn-info show-range">Click to view Range <span class="caret"></span></p>' +
																'<div class="slide-range" style="display: none;">';
	
															for(index in values) {
																value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].min)) + '</span> - ';
																value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].max)) + '</span> = ';
																value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].value)) + '</span><br />';
																var cp = parseFloat(details[i].capital),
																	min = parseFloat(values[index].min),
																	max = parseFloat(values[index].max);
	
																// console.info(cp + ' >=' + min + ' = ');
																// console.info(cp >= min);
																// console.log('-------------------------------')
																// console.info(cp + ' <=' + max + ' = ');
																// console.info(cp <= max);
																if(cp >= min && cp <= max) {
																	subtotal = parseFloat(values[index].value);
																	qtfo = subtotal / 4;
																} else {
																	subtotal = 0;
																	qtfo = 0;
																}
					 										}
	
															value += '</div></div>';
															pquarter = pquarter + qtfo;
															// console.log('Formula Quarterly: ' + qtfo + ' = ' + subtotal + ' / 4 Quarterly Payment for ' + fees.tfo + ' Quarter Total: ' + pquarter);
														}
													}
												}
												total += subtotal;
												subtotal_tfo +=tfo_amount;
												$tfo_amount = 0;
												if(details[i].payment_id == 1) {		// Annually
	
														$('<td />', { text: fees.tfo }).appendTo(tr);
														$('<td />', { html: value }).appendTo(tr);
														$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right">' + currencyFormat(subtotal) + '</span>' }).appendTo(tr);
	
												} else if(details[i].payment_id == 2) {		// Semi-Annual
													if(fees.payment_id == 1) {
														$('<td />', { text: fees.tfo }).appendTo(tr);
														$('<td />', { html: value }).appendTo(tr);
														$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right">' + currencyFormat(subtotal) + '</span>' }).appendTo(tr);
													} else if(fees.payment_id == 2){ //alert(fees.payment_id);
														$('<td />', { text: fees.tfo }).appendTo(tr);
														$('<td />', { html: value }).appendTo(tr);
														$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right">' + currencyFormat(subtotal) + '</span>' }).appendTo(tr);
	
													}
												} else if(details[i].payment_id == 3) {		// Quarterly
	
													if(fees.payment_id == 1) {
														$('<td />', { text: fees.tfo }).appendTo(tr);
														$('<td />', { html: value }).appendTo(tr);
														$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right">' + currencyFormat(subtotal) + '</span>' }).appendTo(tr);
													} else if(fees.payment_id == 2) {
														$('<td />', { text: fees.tfo }).appendTo(tr);
														$('<td />', { html: value }).appendTo(tr);
														$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right">' + currencyFormat(subtotal) + '</span>' }).appendTo(tr);
													} else if(fees.payment_id == 3) {
														$('<td />', { text: fees.tfo }).appendTo(tr);
														$('<td />', { html: value }).appendTo(tr);
														$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right">' + currencyFormat(subtotal) + '</span>' }).appendTo(tr);
													}
												}
											}
											/*dri ang te*/
											//container.append();
											form.find('a.clear-requirements').data('app-id', details[i].app_id);
											form.find('a.clear-requirements').data('nature-id', details[i].buss_nature_id);
											form.find('.totals span.total-amount').text(currencyFormat(parseFloat(total)));
	
											$('form.assessment div.hiddenfields').find('input[name="app_id"]').val(details[i].app_id);
											$('form.assessment div.hiddenfields').find('input[name="total_tax_due"]').val(total);
											$('form.assessment div.hiddenfields').find('input[name="application_id"]').val(details[i].application_id);
											$('form.assessment div.hiddenfields').find('input[name="payment_mode"]').val(details[i].payment_id);
											/* $('form.assessment div.hiddenfields').append('<input type="hidden" name ="app_id[]" value='+details[i].app_id+'>');
											$('form.assessment div.hiddenfields').append('<input type="hidden" name ="total_tax_due[]" value='+total+'>');
											$('form.assessment div.hiddenfields').append('<input type="hidden" name ="application_id[]" value='+details[i].application_id+'>'); */
	
										}).end()
										.find('').each(function() {
	
										}).end().appendTo(business_natures);
										n++;
	
											//});
				//});
	
										/**********************insert breakdowns here**************************/
												if (details[0].payment_id == 1){
													var breakdown = $('div.row.annual'),
														atable = breakdown.find('table');
	
													atable.find('th.payment_mode').text('Payment Mode : '+capitalize(details[0].payment_type));
													atable.find('tbody').html('');
													breakdown.show();
													$('div.row.quarterly').hide();
													$('div.row.bi-annual').hide();
													var first = $('<tr />').appendTo(atable.find('tbody'));
	
													$('<td />', { text: 'First' }).appendTo(first);
													$('<td />', { text: due[0].value }).appendTo(first);
													$('<td />', { text: (details[0].assess_status === null) ? 'Unpaid' : result.data.breakdowns[0].stat}).appendTo(first);
													$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat( total )) + '</strong></span>' }).appendTo(first);
													
													// breakdowns.push({'label': 'First','dues' : due[0].value,'value': (total),'stat' : 'UnPaid'});
													// breakdownsJSON = JSON.stringify(breakdowns);
	
													if(result.data.no_assessment==0){
															var second = $('<tr />').appendTo(btable.find('tbody'));
	
															$('<td />', { text: 'Surcharges' }).css({'font-weight':'bold', 'color' :'red'}).appendTo(second);
															$('<td />', { text: due[0].value }).appendTo(second);
															$('<td />', { text: 'Unpaid'}).appendTo(second);
															$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat(given_surcharge)) + '</strong></span>' }).appendTo(second);
	
															var third = $('<tr />').appendTo(btable.find('tbody'));
	
															$('<td />', { text: 'Penalties' }).css({'font-weight':'bold', 'color' :'red'}).appendTo(third);
															$('<td />', { text: due[0].value }).appendTo(third);
															$('<td />', { text: (details[0].assess_status === null) ? 'Unpaid' : result.data.breakdowns[0].stat}).appendTo(third);
															$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat(interest)) + '</strong></span>' }).appendTo(third);
													}
													//$('form.assessment div.hiddenfields').find('input[name="annually]').val(total);
													//$('form.assessment div.hiddenfields').append('<input type="hidden" name ="breakdowns[]" value='+breakdownsJSON+'>');
												}
												// Show Breakdown for bi-annual
												if (details[0].payment_id == 2){
												$('div.row.annual').hide();
													var breakdown = $('div.row.bi-annual'),
														btable = breakdown.find('table');
	
													btable.find('th.payment_mode').text('Payment Mode : '+capitalize(details[0].payment_type));
													btable.find('tbody').html('');
													breakdown.show();
													$('div.row.annual').hide();
													$('div.row.quarterly').hide();
													var first = $('<tr />').appendTo(btable.find('tbody'));
	
													$('<td />', { text: 'First Bi-Annual Payment' }).appendTo(first);
													$('<td />', { text: due[0].value }).appendTo(first);
													$('<td />', { text:'Unpaid'}).appendTo(first);
													$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right first"><strong>' + currencyFormat(parseFloat( annually + biannual )) + '</strong></span>' }).appendTo(first);
	
													breakdowns.push({'label': 'First','dues' : due[0].value,'value': (annually + biannual),'stat' : 'UnPaid'});
													breakdownsJSON = JSON.stringify(breakdowns);
													$('form.assessment div.hiddenfields').find('input[name="biannual"]').val(annually + biannual);
	
	
													if(result.data.no_assessment==0){
														var third = $('<tr />').appendTo(btable.find('tbody'));
	
														$('<td />', { text: 'Surcharges' }).css({'font-weight':'bold', 'color' :'red'}).appendTo(third);
														$('<td />', { text: due[0].value }).appendTo(third);
														$('<td />', { text: 'Unpaid'}).appendTo(third);
														$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat(given_surcharge)) + '</strong></span>' }).appendTo(third);
	
														var fourth = $('<tr />').appendTo(btable.find('tbody'));
	
														$('<td />', { text: 'Penalties' }).css({'font-weight':'bold', 'color' :'red'}).appendTo(fourth);
														$('<td />', { text: due[0].value }).appendTo(fourth);
														$('<td />', { text: 'Unpaid'}).appendTo(fourth);
														$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat(interest)) + '</strong></span>' }).appendTo(fourth);
													}
	
													var second = $('<tr />').appendTo(btable.find('tbody'));
	
													$('<td />', { text: 'Second Bi-Annual Payment' }).appendTo(second);
													$('<td />', { text: due[1].value }).appendTo(second);
													$('<td />', { text: 'Unpaid' }).appendTo(second);
													$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat(biannual)) + '</strong></span>' }).appendTo(second);
	
													breakdowns.push({'label': 'Second','dues' : due[1].value,'value': (biannual),'stat' : 'UnPaid'});
													//$('form.assessment div.hiddenfields').find('input[name="biannual"]').val(biannual);
													breakdownsJSON = JSON.stringify(breakdowns);
	
												}
	
	
												// Show Breakdown for quarterly
												if(details[0].payment_id == 3) { // Quarterly
												$('div.row.bi-annual').hide();
													var breakdown = $('div.row.quarterly'),
														qtable = breakdown.find('table');
	
													qtable.find('th.payment_mode').text('Payment Mode : '+capitalize(details[0].payment_type));
													qtable.find('tbody').html('');
													breakdown.show();
													$('div.row.bi-annual').hide();
													$('div.row.annual').hide();
													for ( k in due){
													var first = $('<tr />').appendTo(qtable.find('tbody'));
														if (k==0){
															$('<td />', { text: due[k].field + ' Payment' }).appendTo(first);
															$('<td />', { text: due[k].value }).appendTo(first);
															//$('<td />', { text: (details[0].assess_status === null) ? 'Unpaid' : details[0].assess_status }).appendTo(first);
															$('<td />', { text: (details[0].assess_status === null) ? 'Unpaid' : result.data.breakdowns[k].stat }).appendTo(first);
															$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat(annually + pquarter)) + '</strong></span>' }).appendTo(first);
															breakdowns.push({'label': due[k].field.replace(/ /g,"_"),'dues' : due[k].value,'value': (annually + pquarter),'stat' : 'UnPaid'});
															$('form.assessment div.hiddenfields').find('input[name="quarterly"]').val(annually + pquarter);
	
															if(result.data.renewed === 1){
																var second = $('<tr />').appendTo(btable.find('tbody'));
	
																$('<td />', { text: 'Surcharges' }).css({'font-weight':'bold', 'color' :'red'}).appendTo(second);
																$('<td />', { text: due[0].value }).appendTo(second);
																$('<td />', { text:  'Unpaid'}).appendTo(second);
																$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat(given_surcharge)) + '</strong></span>' }).appendTo(second);
	
																var third = $('<tr />').appendTo(btable.find('tbody'));
	
																$('<td />', { text: 'Penalties' }).css({'font-weight':'bold', 'color' :'red'}).appendTo(third);
																$('<td />', { text: due[0].value }).appendTo(third);
																$('<td />', { text: (details[0].assess_status === null) ? 'Unpaid' : result.data.breakdowns[0].stat}).appendTo(third);
																$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat(interest)) + '</strong></span>' }).appendTo(third);
															}
														} else {
															$('<td />', { text: due[k].field + ' Payment ' }).appendTo(first);
															$('<td />', { text: due[k].value+'/'+tdate }).appendTo(first);
															$('<td />', { text:  'Unpaid'}).appendTo(first);
															$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat( pquarter )) + '</strong></span>' }).appendTo(first);
															breakdowns.push({'label': due[k].field.replace(/ /g,"_"),'dues' : due[k].value,'value': (pquarter),'stat' : 'UnPaid'});
															breakdownsJSON = JSON.stringify(breakdowns);
														}
													}
													if(result.data.no_assessment==0){
														// var third = $('<tr />').appendTo(btable.find('tbody'));
	
														// $('<td />', { text: 'Surcharges' }).css({'font-weight':'bold', 'color' :'red'}).appendTo(third);
														// $('<td />', { text: due[0].value }).appendTo(third);
														// $('<td />', { text: 'Unpaid'}).appendTo(third);
														// $('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat(given_surcharge)) + '</strong></span>' }).appendTo(third);
	
														// var fourth = $('<tr />').appendTo(btable.find('tbody'));
	
														// $('<td />', { text: 'Penalties' }).css({'font-weight':'bold', 'color' :'red'}).appendTo(fourth);
														// $('<td />', { text: due[0].value }).appendTo(fourth);
														// $('<td />', { text: 'Unpaid'}).appendTo(fourth);
														// $('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat(interest)) + '</strong></span>' }).appendTo(fourth);
													}
												}
											$('form.assessment div.hiddenfields').append('<input type="hidden" name ="breakdowns" value='+breakdownsJSON+'>');
											$('form.assessment div.hiddenfields').append('<input type="hidden" name ="total" value='+total+'>');
											/**********************end of breakdown insertion**********************/
								}//end of for
								//}	//end of else
	
								if(details[0].payment_id == 1) {
									form.find('form.assessment input[name="payment"]').val('Annual');
									form.find('form.assessment input[name="annually"]').val(parseFloat(annually));
									form.find('form.assessment input[name="quarterly"]').val(0);
									form.find('form.assessment input[name="semi_annually"]').val(0);
								} else if(details[0].payment_id == 2) {
									form.find('form.assessment input[name="payment"]').val('Semi_annual');
									form.find('form.assessment input[name="first_quarter"]').val(parseFloat(0));
									form.find('form.assessment input[name="second_quarter"]').val(parseFloat(0));
									form.find('form.assessment input[name="third_quarter"]').val(parseFloat(0));
									form.find('form.assessment input[name="fourth_quarter"]').val(parseFloat(0));
	
									form.find('form.assessment input[name="annually"]').val(0);
									form.find('form.assessment input[name="first_semi_annual"]').val(parseFloat(annually + biannual));
									form.find('form.assessment input[name="second_semi_annual"]').val(parseFloat(biannual));
									form.find('form.assessment input[name="quarterly"]').val(0);
								} else if(details[0].payment_id == 3) { // Quarterly Payment
									form.find('form.assessment input[name="payment"]').val('first_quarter');
									form.find('form.assessment input[name="first_semi_annual"]').val(parseFloat(0));
									form.find('form.assessment input[name="second_semi_annual"]').val(parseFloat(0));
	
									form.find('form.assessment input[name="annually"]').val(parseFloat(0));
									form.find('form.assessment input[name="semi_annually"]').val(0);
									form.find('form.assessment input[name="first_quarter"]').val(parseFloat(annually + pquarter));
									form.find('form.assessment input[name="second_quarter"]').val(parseFloat(pquarter));
									form.find('form.assessment input[name="third_quarter"]').val(parseFloat(pquarter));
									form.find('form.assessment input[name="fourth_quarter"]').val(parseFloat(pquarter));
								}
	
							} else {
								alert('Please check Required TFO for this business nature');
							}
						}
					});
					}else {
						alert('error');
					}
				  }
			//});
	
		});
		/**************end of adding gross into table*****************/
	
		 /***********assessment form close button clicked*************/
	
		$('#assess').on('click','button.close-modal',function (e) {
			//location.reload();
			var activeIndex = $('li').index($('li.active')[0]);
	
			$('a[data-toggle="tab"]').on('shown', function (e) {
				//save the latest tab; use cookies if you like 'em better:
				//localStorage.setItem('lastTab', $(e.target).attr('href'));
				localStorage.setItem('lastTab',$(this).attr('href'));
				});
	
			//go to the latest tab, if it exists:
			var lastTab = localStorage.getItem('lastTab');alert('page refresh');
				if (lastTab) {
					$('#'+lastTab).tab('show');
				}
	
		 });
		 /***********end************/
		 /*------------------------------------
		 *
		 *
		 *------------------------------------*/
	
	
		$('table#reassess tbody').on('click', 'a.re-assess', function(e){ //alert('hahah');
			  e.preventDefault();
			  var data = $(this).data(),value1 = '',
				  modal = $('#reassess');
	
			  modal.modal('show');
	
			  $.ajax({
				  url: baseurl + 'fees/api/owner/re_assess/' + data.appid,
				  type: 'get',
				  dataType: 'json',
				  beforeSend: function() {
					  modal.find();
				  },
				  success: function(result) {
					  if(result.error === 0) {
						  var details = result.data.business,
							due = result.data.due_date,
							  form = $('#reassess'),
							breakdowns = [],
							breakdownsJSON = "",
							  subtotal = 0, //total = 0;
							  table = form.find('table tbody');
	
						  form.find('.header-detail span.owner').text(capitalize(details[0].firstname + ' ' + details[0].middlename + ' ' + details[0].lastname));
						  form.find('.header-detail span.business').text(capitalize(details[0].business_name));
						  form.find('.header-detail span.payment').text(capitalize(details[0].payment_type));
	
						
						  $('div.row.re-quarterly').hide();
						  var business_natures = $('.business-nature'),
							  clone = $('.clones1 .clone1').clone();
	
						  var qtfo = 0, pquarter = 0, // Quarterly TFO
							  atfo = 0, annually = 0, // Annually TFO
							btfo = 0, biannual = 0; //Bi annually
	
						var dues = new Array();
	
						  business_natures.html('');
	
						//Get due date
						for (var j in due){
							dues.push(due[j].value);
							console.log(due[j].value);
						}
	
						  for(var i in details) { //alert(details[i].app_id);
							var tdate = new Date(),
								$C = 0, gr = $.parseJSON(details[i].gross);
	
							console.log($.isEmptyObject(gr));
							if($.isEmptyObject(gr)) {
								$C = parseFloat(details[i].capital);
								console.log('Capital: ' + details[i].capital);
							} else {
								for(y in gr) {
									if(gr[y].year == tdate.getFullYear()) {
										$C = gr[y].gross;
									}
								}
							}
							  clone.clone(true).find('.business-detail').each(function() {
									if(details[i].delinquent_year > 0){
										var delinquent_year = "- "+details[i].delinquent_year;
									}else{
										var delinquent_year = "";
									}
								  $(this).find('span.nature').text(details[i].business_nature);
										$(this).find('span.delinquent').text(delinquent_year);
								  $(this).find('span.address').text(capitalize(details[i].street_address));
								  $(this).find('span.capital').text(currencyFormat(parseFloat($C)));
							  }).end()
							  .find('table').each(function() {
								  var tbl = $(this).find('tbody'),
									  msg = $(this).parent().find('.messages'),
									subtotal = 0;
								  tbl.html('');
								  var assess_btn = result.data.ignore[0];
								  for(indx in result.data.tfos[i]) {
									  var fees = result.data.tfos[i][indx],
										  tr = $('<tr />').appendTo(tbl),
										  value = '', gross = 0,total=0;
	
									  if(result.data.required.length > 0) {
										 form.find('a.approve-now').attr('disabled', true);
										 form.find('a.clear-requirements').attr('disabled', false);
										 show_message(msg, 'Missing requirement: \r\n<strong>' + result.data.required[i].join(', ') + '</strong>', 'Warning!', 'danger');
									 } else {
										 form.find('a.approve-now').attr('disabled', false);
										 form.find('a.clear-requirements').attr('disabled', true);
									 }
	
									 if(result.data.ignore[i][indx] === true) { //alert('true');
	
										 show_message(msg, 'This Business is already assessed. Please proceed to Approval.', 'Information!', 'info');
										//form.find('a.assess-now').addClass('disabled');
										 form.find('a.assess-now').attr('disabled', true);
									 } else { //alert(result.data.ignore[i][indx]); alert('false');
										 form.find('a.assess-now').attr('disabled', false);
										//form.find('a.assess-now').removeClass('disabled');
									 }
	
									 if(fees.type == 1) { // Formula
	
										  var variables = $.parseJSON(fees.variables),
											  formula = fees.value;
	
										  extract(variables);
	
										  var amt = eval(formula); //parseFloat(eval(formula));
										value = '<span class="pull-left label label-warning">Formula Type</span><span class="pull-left">&nbsp;&nbsp;&nbsp;&nbsp;&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat(amt)) + '</strong></span>';
	
										  if(details[i].payment_id == 1) {		// Annually
											  if(fees.payment_id == 1) {				// Annually
	
												  subtotal = parseFloat(amt);
												  atfo = subtotal;
												  annually = annually + atfo;
											}
										  } else if(details[i].payment_id == 2) {		// Semi-Annual
	
											  if(fees.payment_id == 1) {
	
												subtotal = parseFloat(amt);
												  btfo = amt;
												biannual = biannual + btfo;
	
											 } else if(fees.payment_id == 2) {
												  subtotal = parseFloat(amt);
												  btfo = subtotal / 2;
												  biannual = biannual + btfo;
	
											 } else if(fees.payment_id == 3){
	
												  subtotal = parseFloat(amt);
												  btfo = subtotal / 4;
												biannual = biannual + btfo;
												  //annually = annually + btfo;
											}
										  } else if(details[i].payment_id == 3) {		// Quarterly
											  if(fees.payment_id == 1) {
	
												  subtotal = parseFloat(amt);
												  atfo = subtotal;
												  annually = annually + atfo;
	
											  } else if(fees.payment_id == 3) {
												  subtotal = parseFloat(amt);
												  qtfo = subtotal / 4;
												  pquarter = pquarter + qtfo;
											 }
										  }
									  } else if(fees.type == 2) { // Constant
	
										  if(details[i].payment_id == 1) { // Annually
	
											  if(fees.payment_id == 1) {	// Annually
												  value = '<span class="pull-left label label-success">Constant Value</span><span class="pull-left">&nbsp;&nbsp;&nbsp;&nbsp;&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat(fees.value)) + '</strong></span>';
												  subtotal = parseFloat(fees.value);
												  btfo = subtotal;
												  annually = annually + btfo;
	
											  }  else if(fees.payment_id == 2) {
												value = '<span class="pull-left label label-warning">Constant Value</span><span class="pull-left">&nbsp;&nbsp;&nbsp;&nbsp;&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat(fees.value)) + '</strong></span>';
												  subtotal = parseFloat(fees.value);
												  btfo = subtotal / 2;
												  biannual = biannual + btfo;
											 }
	
										  } else if(details[i].payment_id == 2) {		// Semi-Annual /*ari dri tan aw dae*/
	
											  if(fees.payment_id == 1) {
												value = '<span class="pull-left label label-success">Constant Value</span><span class="pull-left">&nbsp;&nbsp;&nbsp;&nbsp;&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat(fees.value)) + '</strong></span>';
												  subtotal = parseFloat(fees.value);
												  btfo = subtotal;
												  annually = annually + btfo;
	
											 } else if(fees.payment_id == 2) {
											value = '<span class="pull-left label label-success">Constant Value</span><span class="pull-left">&nbsp;&nbsp;&nbsp;&nbsp;&#8369;</span><span class="pull-right"><strong>' + currencyFormat(
												parseFloat(fees.value)) + '</strong></span>';
												  subtotal = parseFloat(fees.value);
												  btfo = subtotal / 2;
												  biannual = biannual + btfo;
											 }
										  } else if(details[i].payment_id == 3) {		// Quarterly
											  if(fees.payment_id == 1) {
												  value = '<span class="pull-left label label-success">Constant Value</span><span class="pull-left">&nbsp;&nbsp;&nbsp;&nbsp;&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat(fees.value)) + '</strong></span>';
												  subtotal = parseFloat(fees.value);
												  atfo = subtotal;
												  annually = annually + atfo;
												  // console.log('Formula Annual: ' + atfo + ' = ' + subtotal + ' Quarterly First Payment for ' + fees.tfo + ' Annually Total: ' + annually);
											  } else if(fees.payment_id == 3) {
												  value = '<span class="pull-left label label-success">Constant Value</span><span class="pull-left">&nbsp;&nbsp;&nbsp;&nbsp;&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat(fees.value)) + '</strong></span>';
												  subtotal = parseFloat(fees.value);
												  qtfo = subtotal / 4;
												  pquarter = pquarter + qtfo;
												  // console.log('Formula Quarterly: ' + qtfo + ' = ' + subtotal + ' / 4 Quarterly Payment for ' + fees.tfo + ' Quarter Total: ' + pquarter);
											 }
	
										  } //alert(subtotal);
									  } else if(fees.type == 3) {		// Range
										  if(details[i].payment_id == 1) {			// Annually
											  if(fees.payment_id == 1) {				// Annually
												  values = $.parseJSON(fees.value);
												  value = '<div class="range-list">' +
													'<p class="btn btn-xs btn-info show-range">Click to view Range <span class="caret"></span></p>' +
													'<div class="slide-range" style="display: none;">';
	
												for(index in values) {
													value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].min)) + '</span> - ';
													value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].max)) + '</span> = ';
													value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].value)) + '</span><br />';
													var cp = parseFloat(details[i].capital),
														min = parseFloat(values[index].min),
														max = parseFloat(values[index].max);
													//alert(cp);
													// console.info(cp + ' >=' + min + ' = ');
													// console.info(cp >= min);
													// console.log('-------------------------------')
													// console.info(cp + ' <=' + max + ' = ');
													// console.info(cp <= max);
													if(cp >= min && cp <= max) {
														subtotal = parseFloat(values[index].value);
														atfo = subtotal;
														// console.log(atfo);
													}else {
														subtotal = 0;
														atfo = 0;
													}
												}
	
												value += '</div></div>';
												annually = annually + atfo;
												// console.log('Formula Annual: ' + atfo + ' = ' + subtotal + ' Annual Payment for ' + fees.tfo);
											 }
										  } else if(details[i].payment_id == 2) {		// Semi-Annual
											  if(fees.payment_id == 1) {
	
											 } else if(fees.payment_id == 2) {
	
											 }
										  } else if(details[i].payment_id == 3) {		// Quarterly
											  if(fees.payment_id == 1) {
												  values = $.parseJSON(fees.value);
												  value = '<div class="range-list">' +
													'<p class="btn btn-xs btn-info show-range">Click to view Range <span class="caret"></span></p>' +
													'<div class="slide-range" style="display: none;">';
	
												for(index in values) {
													value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].min)) + '</span> - ';
													value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].max)) + '</span> = ';
													value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].value)) + '</span><br />';
													var cp = parseFloat(details[i].capital),
														min = parseFloat(values[index].min),
														max = parseFloat(values[index].max);
	
													// console.info(cp + ' >=' + min + ' = ');
													// console.info(cp >= min);
													// console.log('-------------------------------')
													// console.info(cp + ' <=' + max + ' = ');
													// console.info(cp <= max);
													if(cp >= min && cp <= max) {
														subtotal = parseFloat(values[index].value);
														atfo = subtotal;
													} else {
														subtotal = 0;
														atfo = 0;
													}
												}
	
												value += '</div></div>';
												annually = annually + atfo;
												// console.log('Formula Annual: ' + atfo + ' = ' + subtotal + ' Quarterly First Payment for ' + fees.tfo + ' Annually Total: ' + annually);
											  } else if(fees.payment_id == 3) {
												  values = $.parseJSON(fees.value);
												  value = '<div class="range-list">' +
													'<p class="btn btn-xs btn-info show-range">Click to view Range <span class="caret"></span></p>' +
													'<div class="slide-range" style="display: none;">';
	
												for(index in values) {
													value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].min)) + '</span> - ';
													value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].max)) + '</span> = ';
													value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].value)) + '</span><br />';
													var cp = parseFloat(details[i].capital),
														min = parseFloat(values[index].min),
														max = parseFloat(values[index].max);
	
													// console.info(cp + ' >=' + min + ' = ');
													// console.info(cp >= min);
													// console.log('-------------------------------')
													// console.info(cp + ' <=' + max + ' = ');
													// console.info(cp <= max);
													if(cp >= min && cp <= max) {
														subtotal = parseFloat(values[index].value);
														qtfo = subtotal / 4;
													} else {
														subtotal = 0;
														qtfo = 0;
													}
												}
	
												value += '</div></div>';
												pquarter = pquarter + qtfo;
												// console.log('Formula Quarterly: ' + qtfo + ' = ' + subtotal + ' / 4 Quarterly Payment for ' + fees.tfo + ' Quarter Total: ' + pquarter);
											 }
										  }
									  }
									  total += subtotal;
	
									  if(details[i].payment_id == 1) {		// Annually
										  if(fees.payment_id == 1) {				// Annually
											  $('<td />', { text: fees.tfo }).appendTo(tr);
											  $('<td />', { html: value }).appendTo(tr);
											  $('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right">' + currencyFormat(subtotal) + '</span>' }).appendTo(tr);
										 }
									  } else if(details[i].payment_id == 2) {		// Semi-Annual
										  if(fees.payment_id == 1) {
											  $('<td />', { text: fees.tfo }).appendTo(tr);
											  $('<td />', { html: value }).appendTo(tr);
											  $('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right">' + currencyFormat(subtotal) + '</span>' }).appendTo(tr);
										 } else if(fees.payment_id == 2){ //alert(fees.payment_id);
											$('<td />', { text: fees.tfo }).appendTo(tr);
											  $('<td />', { html: value }).appendTo(tr);
											  $('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right">' + currencyFormat(subtotal) + '</span>' }).appendTo(tr);
	
										}
									  } else if(details[i].payment_id == 3) {		// Quarterly
										  if(fees.payment_id == 1) {
											  $('<td />', { text: fees.tfo }).appendTo(tr);
											  $('<td />', { html: value }).appendTo(tr);
											  $('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right">' + currencyFormat(subtotal) + '</span>' }).appendTo(tr);
										  } else if(fees.payment_id == 3) {
											  $('<td />', { text: fees.tfo }).appendTo(tr);
											  $('<td />', { html: value }).appendTo(tr);
											  $('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right">' + currencyFormat(subtotal) + '</span>' }).appendTo(tr);
										 }
									  }
	
								  }
	
								  form.find('a.clear-requirements').data('app-id', details[i].app_id);
								  form.find('a.clear-requirements').data('nature-id', details[i].buss_nature_id);
								  form.find('.totals span.total-amount').text(currencyFormat(parseFloat(total)));
	
								/*******************for breakdown*********************/
	
									// Show Breakdown for annual
								if (details[0].payment_id == 1){
									var breakdown = $('div.row.annual'),
										atable = breakdown.find('table');
	
									atable.find('th.payment_mode').text('Payment Mode : '+capitalize(details[0].payment_type));
									atable.find('tbody').html('');
									breakdown.show();
									$('div.row.quarterly').hide();
									$('div.row.bi-annual').hide();
									var first = $('<tr />').appendTo(atable.find('tbody'));
	
									$('<td />', { text: 'First' }).appendTo(first);
									$('<td />', { text: 'ASAP' }).appendTo(first);
									$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat( total )) + '</strong></span>' }).appendTo(first);
									breakdowns.push({'label': 'First','dues' : dues[0],'value': (total),'stat' : 'UnPaid'});
									breakdownsJSON = JSON.stringify(breakdowns);
								}
								// Show Breakdown for bi-annual
								if (details[0].payment_id == 2){
									$('div.row.annual').hide();
									var breakdown = $('div.row.bi-annual'),
										btable = breakdown.find('table');
	
									btable.find('th.payment_mode').text('Payment Mode : '+capitalize(details[0].payment_type));
									btable.find('tbody').html('');
									breakdown.show();
									$('div.row.annual').hide();
									$('div.row.quarterly').hide();
									var first = $('<tr />').appendTo(btable.find('tbody'));
	
									$('<td />', { text: 'First Bi-Annual Payment' }).appendTo(first);
									$('<td />', { text: dues[0] }).appendTo(first);
									$('<td />', { text: ''}).appendTo(first);
									$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat( annually + biannual )) + '</strong></span>' }).appendTo(first);
									//alert('biannual='+biannual + 'annually='+annually);
									breakdowns.push({'label': 'First Bi-Annual Payment','Dues' : dues[0],'value': (annually + biannual),'stat' : 'UnPaid'});
									var second = $('<tr />').appendTo(btable.find('tbody'));
	
									$('<td />', { text: 'Second Bi-Annual Payment' }).appendTo(second);
									$('<td />', { text: dues[1] }).appendTo(second);
									$('<td />', { text: ''}).appendTo(second);
									$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat(biannual)) + '</strong></span>' }).appendTo(second);
									breakdowns.push({'label': 'First Bi-Annual Payment','Dues' : dues[1],'value': (biannual),'stat' : 'UnPaid'});
									breakdownsJSON = JSON.stringify(breakdowns);
								}
								// Show Breakdown for quarterly
								if(details[0].payment_id == 3) { // Quarterly
									$('div.row.bi-annual').hide();
	
									var breakdown = $('div.row.quarterly'),
										qtable = breakdown.find('table');
	
									qtable.find('th.payment_mode').text('Payment Mode : '+capitalize(details[0].payment_type));
									qtable.find('tbody').html('');
									breakdown.show();
									$('div.row.bi-annual').hide();
									$('div.row.annual').hide();
									for ( k in due){
									//alert(k);
									var first = $('<tr />').appendTo(qtable.find('tbody'));
										if (k==0){ //alert(due[k].value);
											$('<td />', { text: due[k].field + ' Payment' }).appendTo(first);
											$('<td />', { text: due[k].value }).appendTo(first);
											$('<td />', { text: ''}).appendTo(first);
											$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat(annually + pquarter)) + '</strong></span>' }).appendTo(first);
											breakdowns.push({'label': due[k].field + ' Payment','dues' : due[k].value,'value': (annually + pquarter),'stat' : 'UnPaid'});
										 } else {
											$('<td />', { text: due[k].field + ' Payment' }).appendTo(first);
											$('<td />', { text: due[k].value }).appendTo(first);
											$('<td />', { text: ''}).appendTo(first);
											$('<td />', { html: '<span class="pull-left">&#8369;</span><span class="pull-right"><strong>' + currencyFormat(parseFloat( pquarter )) + '</strong></span>' }).appendTo(first);
											breakdowns.push({'label': due[k].field + ' Payment ','dues' : due[k].value,'value': (total),'stat' : 'UnPaid'});
											breakdownsJSON = JSON.stringify(breakdowns);
										}
									}
								}
								//alert('duh');
								breakdownsJSON = JSON.stringify({breakdowns:breakdowns}); //alert(breakdownsJSON);
								console.log('jajaja='+breakdownsJSON);
								form.find('form.re-assessment input[name="app_id"]').val(details[i].app_id);
								form.find('form.re-assessment input[name="total_tax_due"]').val(total);
								form.find('form.re-assessment input[name="application_id"]').val(details[i].application_id);
								/*******************end of breakdown***/
	
	
	
								if(details[0].payment_id == 1) { //Annually Payment
									if(details[0].application_id == 1 && details[0].renew_id == null && details[0].assessment_date == null){
										form.find('form.re-assessment input[name="payment"]').val('annual');
										form.find('form.re-assessment input[name="annually"]').val(parseFloat(total+addt_subtotal));
										form.find('form.re-assessment input[name="quarterly"]').val(0);
										form.find('form.re-assessment input[name="semi_annually"]').val(0);
									}
									else if (assessment_date != tdate && date_renewed==tdate){
										form.find('form.re-assessment input[name="payment"]').val('annual');
										form.find('form.re-assessment input[name="annually"]').val(parseFloat(total+addt_subtotal));
										form.find('form.re-assessment input[name="quarterly"]').val(0);
										form.find('form.re-assessment input[name="semi_annually"]').val(0);
									}
									
								} else if(details[0].payment_id == 2) { //Semi-Annual Payment
									if(details[0].application_id == 1 && details[0].renew_id == null && details[0].assessment_date == null){
										form.find('form.re-assessment input[name="payment"]').val('first_bi_annual');
										form.find('form.re-assessment input[name="annually"]').val(0);
										form.find('form.re-assessment input[name="semi_annually"]').val(parseFloat(total+addt_subtotal));
										form.find('form.re-assessment input[name="quarterly"]').val(0);
									}
									else if (assessment_date != tdate && date_renewed==tdate){
										form.find('form.re-assessment input[name="payment"]').val('first_bi_annual');
										form.find('form.re-assessment input[name="annually"]').val(0);
										form.find('form.re-assessment input[name="semi_annually"]').val(parseFloat(total+addt_subtotal));
										form.find('form.re-assessment input[name="quarterly"]').val(0);
									}
									
								} else if(details[0].payment_id == 3) { // Quarterly Payment
									if(details[0].application_id == 1 && details[0].renew_id == null && details[0].assessment_date == null){
										form.find('form.re-assessment input[name="payment"]').val(parseFloat(total));
										form.find('form.re-assessment input[name="first_quarter"]').val(parseFloat(total+addt_subtotal));
										form.find('form.re-assessment input[name="rem_quarter"]').val(parseFloat(total+addt_subtotal));
										form.find('form.re-assessment input[name="semi_annually"]').val(0);
									}
									else if (assessment_date != tdate && date_renewed==tdate){
										form.find('form.re-assessment input[name="payment"]').val(parseFloat(total));
										form.find('form.re-assessment input[name="first_quarter"]').val(parseFloat(total+addt_subtotal));
										form.find('form.re-assessment input[name="rem_quarter"]').val(parseFloat(total+addt_subtotal));
										form.find('form.re-assessment input[name="semi_annually"]').val(0);
									}
									
								}
	
							  }).end()
							  .find('').each(function() {
	
							  }).end().appendTo(business_natures);
						  }
							
						  // // form.find('.totals span.total-amount').text(currencyFormat(parseFloat(total)));
						  // // form.find('.totals span.total-amount').text(incrementor());
						  // // incrementor(form.find('.totals span.total-amount'), total);
						  // form.find('.totals span.total-amount').text(currencyFormat(parseFloat(total)));
					  } else {
						  alert('error');
					  }
				  }
			  });
		});
		  });
		 /*------------------------------------
		* Adding and editing lines of business
		*------------------------------------*/
	
		$('#payment-form').on('keyup', '.method-cash input[name="cash_tendered"]', function(e) {
			var total = parseFloat($('#payment-form').find('input[name="paid_tax"]').val()),
				change = $(this).parent().parent().parent().find('input[name="change"]'),
				value = parseFloat($(this).val()),
				temp = 0;
	
			//temp = value - total;
			temp = value - total
			if(value < total){
				//alert('dire');
				$('.oops').show();
				$('.pay-cash-now').attr('disabled','disabled');
			}else{
				$('.oops').hide();
				$('.pay-cash-now').removeAttr('disabled');
				if(temp != NaN && temp > 0) {
					change.val(temp);
				} else {
					change.val(0);
				}
			}
	
		});

		
		$('#retire-pay').on('keyup', '.method-cash input[name="cash_tendered"]', function(e) {
			var total = parseFloat($('#payment-form').find('input[name="paid_tax"]').val()),
				change = $(this).parent().parent().parent().find('input[name="change"]'),
				value = parseFloat($(this).val()),
				temp = 0;
	
			//temp = value - total;
			temp = value - total
			if(value < total){
				//alert('dire');
				$('.oops').show();
				$('.pay-cash-now').attr('disabled','disabled');
			}else{
				$('.oops').hide();
				$('.pay-cash-now').removeAttr('disabled');
				if(temp != NaN && temp > 0) {
					change.val(temp);
				} else {
					change.val(0);
				}
			}
	
		});

		$('#form_cancel').on('keyup', '.method-cash input[name="cash_tendered"]', function(e) {
			var total = parseFloat($('#payment-form').find('input[name="paid_tax"]').val()),
				change = $(this).parent().parent().parent().find('input[name="change"]'),
				value = parseFloat($(this).val()),
				temp = 0;
	
			//temp = value - total;
			temp = value - total
			if(value < total){
				//alert('dire');
				$('.oops').show();
				$('.pay-cash-now').attr('disabled','disabled');
			}else{
				$('.oops').hide();
				$('.pay-cash-now').removeAttr('disabled');
				if(temp != NaN && temp > 0) {
					change.val(temp);
				} else {
					change.val(0);
				}
			}
	
		});



		
		/*------------------------------------
		*Payment mode
		*------------------------------------*/
		/*-----------------------------------
		*
		*-----------------------------------*/
		$('table#business-payment tbody').on('click', 'a.selectpayer', function(e) {
			e.preventDefault();
			var data = $(this).data(),
				modal = $('#payment-form');
				
			
			$('.save-cash').hide();
			$('.save-check').hide();
			$('#form-cash')[0].reset();
			$('#form-check')[0].reset();
	
			modal.modal('show');
	
			$.getJSON(baseurl + 'fees/api/payment/assessment/' + data.assessmentid, function(result) {
	
				if(result.error === 0) {
					var breakdowns_container = [],
						breakdownsJSON = "",
						fields = modal.find('.details'),
						owner = result.data.owner,
						// pays = result.data.payers,
						details = result.data.record,
						//breakdowns = result.data.owner.breakdown,
						breakdown = modal.find('table.annual tbody'),
						//breakdown =  $('div.row.annual1'),
						total = 0,
						is_paid = 0;
					var bustax1=0,bustax2=0,bustax3=0,bustax4=0,garbagefee=0,businesstaxx1=0,businesstaxx2=0,garbagefee1=0,garbagefee2=0;
					//console.log('test');
						//alert(owner.payment_type);
				
					fields.find('span.trans-type').text(capitalize(owner.application_type));
					fields.find('span.payment-mode').text(capitalize(owner.payment_type));
					fields.find('span.business-nature').text(capitalize(owner.business_nature));
					
					// fields.find('span.payment-status').text(capitalize(details.status));
					fields.find('span.owner').text(capitalize(owner.owner));
					fields.find('span.address').text(capitalize(owner.address));
					fields.find('span.contact-number').text(owner.contact_number);
					
	
					fields.find('input[name="assessment_id"]').val(owner.assessment_id);
					fields.find('input[name="owner_id"]').val(owner.owner_id);
					fields.find('input[name="buss_id"]').val(owner.buss_id);
					fields.find('input[name="total_amount"]').val(owner.total);
					fields.find('input[name="payment_id"]').val(owner.payment_id);

					fields.find('input[name="counting"]').val(owner.counts);
					// fields.find('span.counts').text(capitalize(owner.count));
				
					
					// fields.find('input[name="change"]').prop('disabled', true);
					
					breakdown.html('');
					$('.annual').show();
					document.getElementById('')
				
					for(ss in owner.ownership_id){
						var value5 = owner.ownership_id[ss];

					}	
				
					for(tt in owner.bustax){
						var value1 = owner.bustax[tt];

						
						if(value1.tfo==22){
							
							bustax2+=value1.amount;
							businesstaxx1 += value1.amount;
						
						}

						if(value5==5||value5==10){
							if(value1.tfo==23){
								bustax2+=value1.amount;
								businesstaxx1 += value1.amount;
							
							}
						}
					}	

					for(tt in owner.bustax2){
						var value2 = owner.bustax2[tt];

						
						if(value2.tfo=="Business Tax"){
							
							bustax4+=value2.addttfoamount;
							businesstaxx2 += value2.addttfoamount;
						
						}

						if(value5==5||value5==10){
							if(value2.tfo=="Permit Fee-Others"){
								bustax4+=value2.addttfoamount;
								businesstaxx2 += value2.addttfoamount;
							
							}
						}
					}	
			
					var businesstaxx=0,bustax=0;

					bustax = parseFloat(bustax1) + parseFloat(bustax2)+ parseFloat(bustax3)+ parseFloat(bustax4);
					
					businesstaxx = parseFloat(businesstaxx1) + parseFloat(businesstaxx2);
					// garbagefee = parseInt(garbagefee1) + parseInt(garbagefee2);

					var counts=0;
				
					for(i in owner.breakdowns) {
						counts++;
						// bustaxs = bustax;
						if(owner.application_type=="New"){
							bustaxs = 0;
						} else{
							if(counts==1){
								bustaxs = bustax;
							}
							
							else if(counts==2){
								// bustaxs = bustax/2;
								bustaxs = bustax;
							}
		
							else if(counts==4){
								// bustaxs = bustax/4;
								bustaxs = bustax;
							}
						}
					
						
					}
					fields.find('span.business-tax').text(bustax);
					var countss=0;
					
					
					for(i in owner.breakdowns) {
						countss++;
						
						//var tfo = result.data.tfos[i],
						  var value = owner.breakdowns[i],
							  tr = $('<tr />').appendTo(breakdown);
						
						$('<td />', { text: capitalize(value.label.replace(/_/g, ' '))}).appendTo(tr);
						var date1 =  new Date(value.dues);
						
						var date2 = new Date();
						var timeDiff = date2.getTime() - date1.getTime();
						var diffDays = timeDiff / (1000*3600*24); 
					
						var dd = date2.getDate();
						var mm = date2.getMonth()+1; //January is 0!
						var yyyy = date2.getFullYear();
						if(dd < 10)
						{
							dd = '0'+ dd;
						}
						if(mm < 10)
						{
							mm = '0' + mm;
						}
						var date2 = mm+'-'+dd+'-'+yyyy;

						var dd = date1.getDate();
						var mm = date1.getMonth()+1; //January is 0!
						var yyyy = date1.getFullYear();
						if(dd < 10)
						{
							dd = '0'+ dd;
						}
						if(mm < 10)
						{
							mm = '0' + mm;
						}
						var date1 = mm+'-'+dd+'-'+yyyy;
						
						//SURCHARGE and INTEREST
						if(diffDays>1){
							
							if(countss==2 || countss==3 || countss==4){
								surcharges = value.value*0.25;
							}else{
								surcharges = bustaxs*0.25;
								interests = bustaxs*0.02;
							}
							
							amountt = value.value + surcharges;
				
						} else{
							surcharges = 0;
							interests = 0
							amountt = value.value + surcharges;

						}

						//dues
						$('<td />', { text: date1}).appendTo(tr);
						$('<td />', { text: currencyFormat(parseFloat(bustaxs))}).appendTo(tr);
						// $('<td />', { text: currencyFormat(parseFloat(garbagefee))}).appendTo(tr);
						
						//date paid
						
						$('<td />', { text: date2 }).appendTo(tr);
					
						
						// $('<td />', { text: datess }).appendTo(tr);
						
						
						//amount
						$('<td />', { html: '<span class="pull-left"></span>' +
							'<span class="pull-left">&#8369;</span>' +
							'<span class="pull-right">' + currencyFormat(parseFloat(value.value)) + '</span>' }).appendTo(tr);
						//interest
						// $('<td />', { html: '<input type="text" class="form-control" id="interest" value="'+interests+'" readonly>'}).appendTo(tr);
						//surcharge
						$('<td />', { html: '<input type="text" class="form-control" id="surcharge" value="'+currencyFormat(parseFloat(surcharges))+'" readonly>'}).appendTo(tr);
						//total amount per quarter
						$('<td />', { html: '<span class="pull-left"></span>' +
						'<strong><span class="pull-left">&#8369;</span>' +
						'<span class="pull-right">' + currencyFormat(parseFloat(amountt)) + '</span></strong>' }).appendTo(tr);
						
						//unpaid or paid
						var paids = owner.count;
						
						var unpay = "Unpaid";
						var pay = "Paid";

						console.log(paids);
					
							if(paids.includes("1")&& countss==1)
							{
								$('<td />', { text: pay}).appendTo(tr);
								
							}
							else if(paids.includes("2")	&& countss==2)
							{
								$('<td />', { text: pay}).appendTo(tr);
							
							}
							else if(paids.includes("3")	 && countss==3)
							{
								$('<td />', { text: pay}).appendTo(tr);
								
							}
							else if(paids.includes("4")	&& countss==4)
							{
								$('<td />', { text:pay}).appendTo(tr);
							
							}
							
							else
							{
								$('<td />', { text:unpay}).appendTo(tr);
						
								
							}
							
					
					

			
							$('<td/>', { html: '<div class="payment-method">'+
												'<a href="#" class=" method cash btn btn-primary btn-xs method-cash" data-paidall="0" data-surcharge = "'+surcharges+'" data-interest = "'+interests+'" data-tfo_amount = "'+amountt+'" data-dues= "'+value.dues+'"  data-status ="'+value.stat+'"data-label = "'+value.label+'" data-payment_mode = "'+owner.payment_id+'" '+
												' ><i class="fa fa-money"></i> CASH ☺</a><a href="#" class=" method check btn btn-danger btn-xs method-check" data-paidall="0" data-surcharge = "'+surcharges+'" data-interest = "'+interests+'" data-tfo_amount = "'+amountt+'" data-dues= "'+value.dues+'"  data-status ="'+value.stat+'"data-label = "'+value.label+'" data-payment_mode = "'+owner.payment_id+'" '+
												' ><i class="fa fa-credit-card"></i> CHEQUE</a>'+							
												'</div>' }).appendTo(tr);
												$('<td/>', { html: '<div class="payment-method">'+
												'<a  href="' + baseurl + 'fees/print_receipt/' + owner.pay_id+'/'+owner.assessment_id   +'/'+countss  +'" target="_blank" class="method check btn btn-warning btn-xs feed_receipt"><i class="fa fa-print"></i> FEED RECEIPT</a>'+
												'</div>'}).appendTo(tr);
					
							

						 breakdowns_container.push({'label': value.label,'dues' : value.dues,'value': value.value,'stat' : value.stat});
						 breakdownsJSON = JSON.stringify(breakdowns_container);
	
							total += parseFloat(value.value);
					}
					fields.find('input[name="breakdowns"]').val(breakdownsJSON);
					// var tr2 = $('<tr />').appendTo(breakdown);
					// 	//$('<tr />', {}).appendTo(tr);
					// 	$('<td />', { text: '' }).appendTo(tr2);
					// 	$('<td />', { text: '' }).appendTo(tr2);
					// 	$('<td />', { text: '' }).appendTo(tr2);
						
					// 	$('<td />', { text: 'Total Php'}).css({'color': 'red','font-weight': 'bold'}).appendTo(tr2);
					// 	$('<td />', { html: '<span class="pull-left"></span>' +
					// 				 '<span class="pull-left">&#8369;</span>' +
					// 				 '<span class="pull-right">' + currencyFormat(parseFloat(total)) + '</span>' +
					// 				 '<input type="hidden" name="total" id="total" value="'+total+'"/>'
					// 				 }).appendTo(tr2);
					// 	$('<td />', { text: '' }).appendTo(tr2);
					// 	$('<td />', { text: '' }).appendTo(tr2);
					// 	$('<td />', { text: '' }).appendTo(tr2);
					// 	$('<td />', { text: '' }).appendTo(tr2);
					// 	$('<td />', { text: '' }).appendTo(tr2);
			
				
				} else {
	
				}
			});
		});


		$('table#business-application tbody').on('click', 'a.retire_pay', function(e) {
			e.preventDefault();
			var data = $(this).data(), 
				modal = $('#retire-pay');
				
			
			$('.save-cash').hide();
			$('.save-check').hide();
			$('#form-cash')[0].reset();
			$('#form-check')[0].reset();
	
			modal.modal('show');
	
			$.getJSON(baseurl + 'fees/api/payment/retirement_assess/' + data.appid, function(result) {
	
				if(result.error === 0) {
					var breakdowns_container = [],
						breakdownsJSON = "",
						fields = modal.find('.detailretire'),
						owner = result.data.owner,
						details = result.data.record,
						breakdown = modal.find('table.annual tbody'),
						total = 0,
						is_paid = 0;
					var bustax1=0,bustax2=0,bustax3=0,bustax4=0,garbagefee=0,businesstaxx1=0,businesstaxx2=0,garbagefee1=0,garbagefee2=0;

				
					fields.find('span.trans-type').text(capitalize(owner.application_type));
					fields.find('span.payment-mode').text(capitalize(owner.payment_type));
					fields.find('span.business-nature').text(capitalize(owner.business_nature));

					fields.find('span.owner').text(capitalize(owner.owner));
					fields.find('span.address').text(capitalize(owner.address));
					fields.find('span.contact-number').text(owner.contact_number);
					
	
					fields.find('input[name="assessment_id"]').val(owner.assessment_id);
					fields.find('input[name="owner_id"]').val(owner.owner_id);
					fields.find('input[name="buss_id"]').val(owner.buss_id);
					fields.find('input[name="total_amount"]').val(owner.total);
					fields.find('input[name="payment_id"]').val(owner.payment_id);

					fields.find('input[name="counting"]').val(owner.counts);

					

				
					var amount = 0,valuex;
	
					
					var gross = 0;
					var grossy69=0;
					
					for(bb in owner.gross){
						var gross = owner.gross[bb];
						grossy69 += parseFloat(gross.grossy);	
					}
					for(ii in owner.rtfo){
						var rtfo =  owner.rtfo[ii];
						var gross1 = owner.gross[ii];
						var gross = gross1.grossy;
						// console.log(gross);
					//amount change
					if(rtfo.type == 1) { // Constant
						amount += rtfo.value;
						value = '<span class="pull-right"><strong>Constant</strong></span>';						
						console.log(rtfo.value);
					} else if(rtfo.type == 2) { /** TFO is of Formula  type */
	
						var formula = rtfo.value,
						default_var = gross;
						$C=gross;
						var amt = 0,amt1 = 0;
						amt = eval(formula);
						value = '<span class="pull-left label label-success">Formula</span><span class="pull-left">&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="pull-right"><strong>'+ '(' + formula + ')' + ' ' + currencyFormat(parseFloat(amt)) + '</strong></span>';						
						console.log(amt);
						amount += amt;								
					
					} else if(rtfo.type == 3 && (rtfo.subtype == 0 || rtfo.subtype == 1 || rtfo.subtype == 2)) {			// Range

						var inrange=false, tfo_amount=0,amt1=0,$capital=gross,$C=gross;
						values = $.parseJSON(rtfo.value);
						value = '<div class="range-list">' +
						'<p class="btn btn-xs btn-info show-range">Click to view Range <span class="caret"></span></p>' +
						'<div class="slide-range" style="display: none;">';

						
							for(index in values) {

								var cp = $C,
									min = parseFloat(values[index].min),
									max = parseFloat(values[index].max);

										
								//this starts the displaying of range,formula
								if (typeof values[index].formula == 'undefined'){ //fitted for range alone

									value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].min)) + '</span> - ';
									value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].max)) + '</span> = ';
									value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].value)) + '</span><br/>';

								} //end of fitted for range alone

								else if( values[index].type!= 'formula'){ // range has formula
									console.log('hahahahahha='+typeof values[index].type);
									value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].min)) + '</span> - ';
									value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].max)) + ' </span> = ';
									value += '<span class="badge badge-default">&#8369;' + values[index].formula + '</span><br/>';
									if( typeof values[index].formula == "undefined"){
										value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].max)) + '</span> = ';
										value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].value)) + '</span><br/>';
									} else if (typeof values[index].e2 == 'undefined') {
										value += '<span class="badge badge-default">' + 'up' + '</span> = ';
										value += '<span class="badge badge-default">' + values[index].formula + '</span><br />';
									}  else if (typeof values[index].e2 != 'undefined' && values[index].e2 !=0){
										value += '<span class="badge badge-default">' + 'For every &#8369;'+ currencyFormat(parseFloat(values[index].e2 ))+' in excess of &#8369;' + currencyFormat(parseFloat(values[index].min))+ '</span> = ';
										value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].valueadded))+ '</span>';
									}

								} else{ //alert('duh');
									value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].min)) + ' </span> = ';
									value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].max)) + ' </span> = ';
									value += '<span class="badge badge-default">' + values[index].formula + '</span><br />';
								}
														
														if(gross >= min && gross <= max && (typeof values[index].type == 'undefined')){
															console.log('capital '+$capital +' >= ' +  min +' && capital='+ $capital + '<=' + max);
														
															
															amount = parseFloat(values[index].value);
													
															tfo_amount = amount;
															inrange = true;
														
															console.log(amount);
														} else if(!inrange && (values[index].e2 == '0') && (typeof values[index].e2 == 'undefined')){ //not in range so we use the formula
														
															var formula_excess = values[index].formula,
																$base = values[index].base,
																amt = eval(formula_excess);
	
																if($C !=0){
																	if(amt < $base){
																		amount = eval(parseFloat($base) + parseFloat(amt));
																	} else if(amt > $base) {
																		amount = parseFloat(amt);
																	} else {
																		amount = 0;
																	}
																} else {
																	amount = 0.00;
																}
																tfo_amount = amount;

															
														} //end of not in range
														else if ( values[index].e2 != '0' && typeof values[index].e2 != 'undefined' && values[index].type != 'formula'){ // in excess

															var formula_excess = values[index].formula,
																$E1 = values[index].e1,
																$E2 = values[index].e2,
																$V = values[index].valueadded,
																$base = values[index].base,
																amt = eval(formula_excess);
																amt1 = eval(amt1 * (details[i].percentage/100));
																amt = amt + amt1;
																	if($C !=0){
																		if(amt < $base ){
																			amount = eval(parseFloat($base) + parseFloat(amt));
																		} else if (amt > $base){
																			amount = parseFloat(amt);
																		} else{
																			amount = 0.00;
																		}
																	} else {
																		amount = 0.00;
																	}
															tfo_amount = amount;

														
														} //end of e2 not undefined
														else if(values[index].type == 'formula'  && (!inrange)){
															
																if($C >= min && $C <= max ) {
																	var formula = values[index].formula,
																			$C = $C,
																			amt1; 
													
																	amount= eval(formula);
																	
																	tfo_amount = amount;
																}
	
														}
														else {
															//console.log('min='+min+'  max='+max + ' capital='+$capital+'values[index].type='+values[index].type);
														}
														
														
													
													
													
																 //tfo_amount = annually;console.log('tfo_amount diri='+tfo_amount);
	
													 
												
											} 
										
											value += '</div></div>';
											total += subtotal;
											display = value;
											console.log(display);
											$tfo_amount = 0;
											tfosJSON = JSON.stringify(tfos);
										}

									
					}
				
				

					
					breakdown.html('');
					$('.annual').show();
					document.getElementById('')
				
					for(ss in owner.ownership_id){
						var value5 = owner.ownership_id[ss];

					}	
				
					for(tt in owner.bustax){
						var value1 = owner.bustax[tt];

						
						if(value1.tfo==22){
							bustax2+=value1.amount;
							businesstaxx1 += value1.amount;
						
						}

						if(value5==5||value5==10){
							if(value1.tfo==23){
								bustax2+=value1.amount;
								businesstaxx1 += value1.amount;
							
							}
						}
					}	

					for(tt in owner.bustax2){
						var value2 = owner.bustax2[tt];

						
						if(value2.tfo=="Business Tax"){
							
							bustax4+=value2.addttfoamount;
							businesstaxx2 += value2.addttfoamount;
						
						}

						if(value5==5||value5==10){
							if(value2.tfo=="Permit Fee-Others"){
								bustax4+=value2.addttfoamount;
								businesstaxx2 += value2.addttfoamount;
							
							}
						}
					}	
			
					var businesstaxx=0,bustax=0;

					bustax = parseFloat(bustax1) + parseFloat(bustax2)+ parseFloat(bustax3)+ parseFloat(bustax4);
					
					businesstaxx = parseFloat(businesstaxx1) + parseFloat(businesstaxx2);
					// garbagefee = parseInt(garbagefee1) + parseInt(garbagefee2);

					var counts=0;
				
					for(i in owner.breakdowns) {
						counts++;
						// bustaxs = bustax;
						if(owner.application_type=="New"){
							bustaxs = 0;
						} else{
							if(counts==1){
								bustaxs = bustax;
							}
							
							else if(counts==2){
								// bustaxs = bustax/2;
								bustaxs = bustax;
							}
		
							else if(counts==4){
								// bustaxs = bustax/4;
								bustaxs = bustax;
							}
						}
					
						
					}
					fields.find('span.business-tax').text(bustax);
					var countss=0;
					
					
					for(i in owner.breakdowns) {
						countss++;
						
						//var tfo = result.data.tfos[i],
						  var value = owner.breakdowns[i],
							  tr = $('<tr />').appendTo(breakdown);

						var documentaryStamp = 30;
						var certification = 75;
						

						$('<td />', { text: capitalize(value.label.replace(/_/g, ' '))}).appendTo(tr);
						var date1 =  new Date(new Date().getFullYear(),0,31);
						
						var date2 = new Date();
						var timeDiff = date2.getTime() - date1.getTime();
						var diffDays = timeDiff / (1000*3600*24); 
						var datediff = date2.getFullYear() - date1.getFullYear();
					
						var dd = date2.getDate();
						var mm = date2.getMonth()+1; //January is 0!
						var yyyy = date2.getFullYear();
						if(dd < 10)
						{
							dd = '0'+ dd;
						}
						if(mm < 10)
						{
							mm = '0' + mm;
						}
						var date2 = mm+'-'+dd+'-'+yyyy;

						var dd = date1.getDate();
						var mm = date1.getMonth()+1; //January is 0!
						var yyyy = date1.getFullYear();
						if(dd < 10)
						{
							dd = '0'+ dd;
						}
						if(mm < 10)
						{
							mm = '0' + mm;
						}
						var date1 = mm+'-'+dd+'-'+yyyy;
			
						//SURCHARGE and INTEREST
						if(datediff>0){
							surcharges = (bustaxs*0.25)*datediff;
							interests = bustaxs*0.02;
							
							amountt = parseFloat(amount) + parseFloat(surcharges) + parseFloat(certification) + parseFloat(documentaryStamp);
				
						} else{
							surcharges = 0;
							interests = 0
							amountt = parseFloat(amount) + parseFloat(surcharges) + parseFloat(certification) + parseFloat(documentaryStamp);
				

						}

						//dues
						$('<td />', { text: date1}).appendTo(tr);
					
						//date paid
						
						$('<td />', { text: date2 }).appendTo(tr);
					
						$('<td />', { html: '<span class="pull-left"></span>' +
						'<span class="pull-left">&#8369;</span>' +
						'<span class="pull-right">' + currencyFormat(parseFloat(grossy69)) + '</span>'}).appendTo(tr);
				
						$('<td />', { html: '<span class="pull-left"></span>' +
						'<span class="pull-left">&#8369;</span>' +
						'<span class="pull-right">' + currencyFormat(parseFloat(amount)) + '</span>'}).appendTo(tr);
						//amount
						$('<td />', { html: '<span class="pull-left"></span>' +
						'<span class="pull-left">&#8369;</span>' +
						'<span class="pull-right">' + currencyFormat(parseFloat(certification)) + '</span>'}).appendTo(tr);
						$('<td />', { html: '<span class="pull-left"></span>' +
						'<span class="pull-left">&#8369;</span>' +
						'<span class="pull-right">' + currencyFormat(parseFloat(documentaryStamp)) + '</span>'}).appendTo(tr);
				
						

						//interest
						// $('<td />', { html: '<input type="text" class="form-control" id="interest" value="'+interests+'" readonly>'}).appendTo(tr);
						//surcharge
						$('<td />', { html: '<input type="text" class="form-control" id="surcharge" value="'+currencyFormat(parseFloat(surcharges))+'" readonly>'}).appendTo(tr);
						//total amount per quarter
						$('<td />', { html: '<span class="pull-left"></span>' +
						'<strong><span class="pull-left">&#8369;</span>' +
						'<span class="pull-right">' + currencyFormat(parseFloat(amountt)) + '</span></strong>' }).appendTo(tr);
						
					
							
					
					

			
							$('<td/>', { html: '<div class="payment-method">'+
												'<a href="#" class=" method cash btn btn-info btn-xs method-cash" data-paidall="0" data-surcharge = "'+surcharges+'" data-interest = "'+amount+'" data-tfo_amount = "'+amountt+'" data-dues= "'+value.dues+'"  data-status ="'+value.stat+'"data-label = "'+value.label+'" data-payment_mode = "'+owner.payment_id+'" '+
												' ><i class="fa fa-credit-card"></i> CASH</a>'+							
												'</div>' }).appendTo(tr);
												$('<td/>', { html: '<div class="payment-method">'+
												'<a  href="' + baseurl + 'fees/retire_receipt/' + owner.pay_id+'/'+owner.assessment_id   +'/'+countss  +'" target="_blank" class="method check btn btn-warning btn-xs feed_receipt"><i class="fa fa-print"></i> FEED RECEIPT</a>'+
												'</div>'}).appendTo(tr);
					
							

						 breakdowns_container.push({'label': value.label,'dues' : value.dues,'value': value.value,'stat' : value.stat});
						 breakdownsJSON = JSON.stringify(breakdowns_container);
	
							total += parseFloat(value.value);
					}
					fields.find('input[name="breakdowns"]').val(breakdownsJSON);
					// var tr2 = $('<tr />').appendTo(breakdown);
					// 	//$('<tr />', {}).appendTo(tr);
					// 	$('<td />', { text: '' }).appendTo(tr2);
					// 	$('<td />', { text: '' }).appendTo(tr2);
					// 	$('<td />', { text: '' }).appendTo(tr2);
						
					// 	$('<td />', { text: 'Total Php'}).css({'color': 'red','font-weight': 'bold'}).appendTo(tr2);
					// 	$('<td />', { html: '<span class="pull-left"></span>' +
					// 				 '<span class="pull-left">&#8369;</span>' +
					// 				 '<span class="pull-right">' + currencyFormat(parseFloat(total)) + '</span>' +
					// 				 '<input type="hidden" name="total" id="total" value="'+total+'"/>'
					// 				 }).appendTo(tr2);
					// 	$('<td />', { text: '' }).appendTo(tr2);
					// 	$('<td />', { text: '' }).appendTo(tr2);
					// 	$('<td />', { text: '' }).appendTo(tr2);
					// 	$('<td />', { text: '' }).appendTo(tr2);
					// 	$('<td />', { text: '' }).appendTo(tr2);
			
				
				} else {
	
				}
			});
		});

		/* business-payment retire_pay */

		$('table#business-payment tbody').on('click', 'a.retire_pay', function(e) {
			e.preventDefault();
			var data = $(this).data(), 
				modal = $('#retire-pay');
				
			
			$('.save-cash').hide();
			$('.save-check').hide();
			$('#form-cash')[0].reset();
			$('#form-check')[0].reset();
	
			modal.modal('show');
	
			$.getJSON(baseurl + 'fees/api/payment/retirement_assess/' + data.appid, function(result) {
	
				if(result.error === 0) {
					var breakdowns_container = [],
						breakdownsJSON = "",
						fields = modal.find('.detailretire'),
						owner = result.data.owner,
						details = result.data.record,
						breakdown = modal.find('table.annual tbody'),
						total = 0,
						is_paid = 0;
					var bustax1=0,bustax2=0,bustax3=0,bustax4=0,garbagefee=0,businesstaxx1=0,businesstaxx2=0,garbagefee1=0,garbagefee2=0;

				
					fields.find('span.trans-type').text(capitalize(owner.application_type));
					fields.find('span.payment-mode').text(capitalize(owner.payment_type));
					fields.find('span.business-nature').text(capitalize(owner.business_nature));

					fields.find('span.owner').text(capitalize(owner.owner));
					fields.find('span.address').text(capitalize(owner.address));
					fields.find('span.contact-number').text(owner.contact_number);
					
	
					fields.find('input[name="assessment_id"]').val(owner.assessment_id);
					fields.find('input[name="owner_id"]').val(owner.owner_id);
					fields.find('input[name="buss_id"]').val(owner.buss_id);
					fields.find('input[name="total_amount"]').val(owner.total);
					fields.find('input[name="payment_id"]').val(owner.payment_id);

					fields.find('input[name="counting"]').val(owner.counts);

					

				
					var amount = 0,valuex;
	
					
					var gross = 0;
					var grossy69=0;
					
					for(bb in owner.gross){
						var gross = owner.gross[bb];
						grossy69 += parseFloat(gross.grossy);	
					}
					for(ii in owner.rtfo){
						var rtfo =  owner.rtfo[ii];
						var gross1 = owner.gross[ii];
						var gross = gross1.grossy;
					
					//amount change
					if(rtfo.type == 1) { // Constant
						amount += rtfo.value;
						value = '<span class="pull-right"><strong>Constant</strong></span>';						
						console.log(amount);
					} else if(rtfo.type == 2) { /** TFO is of Formula  type */
	
						var formula = rtfo.value,
						default_var = gross;
						$C=gross;
						var amt = 0,amt1 = 0;
						amt = eval(formula);
						value = '<span class="pull-left label label-success">Formula</span><span class="pull-left">&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="pull-right"><strong>'+ '(' + formula + ')' + ' ' + currencyFormat(parseFloat(amt)) + '</strong></span>';						
						amount += amt;								
						console.log(amt);
					} else if(rtfo.type == 3 && (rtfo.subtype == 0 || rtfo.subtype == 1 || rtfo.subtype == 2)) {			// Range

						var inrange=false, tfo_amount=0,amt1=0,$capital=gross,$C=gross;
						values = $.parseJSON(rtfo.value);
						value = '<div class="range-list">' +
						'<p class="btn btn-xs btn-info show-range">Click to view Range <span class="caret"></span></p>' +
						'<div class="slide-range" style="display: none;">';

						
							for(index in values) {

								var cp = $C,
									min = parseFloat(values[index].min),
									max = parseFloat(values[index].max);

										
								//this starts the displaying of range,formula
								if (typeof values[index].formula == 'undefined'){ //fitted for range alone

									value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].min)) + '</span> - ';
									value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].max)) + '</span> = ';
									value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].value)) + '</span><br/>';

								} //end of fitted for range alone

								else if( values[index].type!= 'formula'){ // range has formula
									console.log('hahahahahha='+typeof values[index].type);
									value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].min)) + '</span> - ';
									value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].max)) + ' </span> = ';
									value += '<span class="badge badge-default">&#8369;' + values[index].formula + '</span><br/>';
									if( typeof values[index].formula == "undefined"){
										value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].max)) + '</span> = ';
										value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].value)) + '</span><br/>';
									} else if (typeof values[index].e2 == 'undefined') {
										value += '<span class="badge badge-default">' + 'up' + '</span> = ';
										value += '<span class="badge badge-default">' + values[index].formula + '</span><br />';
									}  else if (typeof values[index].e2 != 'undefined' && values[index].e2 !=0){
										value += '<span class="badge badge-default">' + 'For every &#8369;'+ currencyFormat(parseFloat(values[index].e2 ))+' in excess of &#8369;' + currencyFormat(parseFloat(values[index].min))+ '</span> = ';
										value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].valueadded))+ '</span>';
									}

								} else{ //alert('duh');
									value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].min)) + ' </span> = ';
									value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].max)) + ' </span> = ';
									value += '<span class="badge badge-default">' + values[index].formula + '</span><br />';
								}
														
														if(gross >= min && gross <= max && (typeof values[index].type == 'undefined')){
															console.log('capital '+$capital +' >= ' +  min +' && capital='+ $capital + '<=' + max);
														
															
															amount = parseFloat(values[index].value);
													
															amount = amount;
															inrange = true;
														
															console.log(amount);
														} else if(!inrange && (values[index].e2 == '0') && (typeof values[index].e2 == 'undefined')){ //not in range so we use the formula
														
															var formula_excess = values[index].formula,
																$base = values[index].base,
																amt = eval(formula_excess);
	
																if($C !=0){
																	if(amt < $base){
																		amount = eval(parseFloat($base) + parseFloat(amt));
																	} else if(amt > $base) {
																		amount = parseFloat(amt);
																	} else {
																		amount = 0;
																	}
																} else {
																	amount = 0.00;
																}
																amount = amount;

															
														} //end of not in range
														else if ( values[index].e2 != '0' && typeof values[index].e2 != 'undefined' && values[index].type != 'formula'){ // in excess

															var formula_excess = values[index].formula,
																$E1 = values[index].e1,
																$E2 = values[index].e2,
																$V = values[index].valueadded,
																$base = values[index].base,
																amt = eval(formula_excess);
																amt1 = eval(amt1 * (details[i].percentage/100));
																amt = amt + amt1;
																	if($C !=0){
																		if(amt < $base ){
																			amount = eval(parseFloat($base) + parseFloat(amt));
																		} else if (amt > $base){
																			amount = parseFloat(amt);
																		} else{
																			amount = 0.00;
																		}
																	} else {
																		amount = 0.00;
																	}
																	amount = amount;

														
														} //end of e2 not undefined
														else if(values[index].type == 'formula'  && (!inrange)){
															
																if($C >= min && $C <= max ) {
																	var formula = values[index].formula,
																			$C = $C,
																			amt1; 
													
																	amount= eval(formula);
																	
																	amount = amount;
																}
	
														}
														else {
															//console.log('min='+min+'  max='+max + ' capital='+$capital+'values[index].type='+values[index].type);
														}
														
														
													
													
													
																 //tfo_amount = annually;console.log('tfo_amount diri='+tfo_amount);
	
													 
												
											} 
										
											value += '</div></div>';
											total += amount;
											display = value;
											console.log(display);
											$tfo_amount = 0;
											tfosJSON = JSON.stringify(tfos);
										}

									
					}
				
				

					
					breakdown.html('');
					$('.annual').show();
					document.getElementById('')
				
					for(ss in owner.ownership_id){
						var value5 = owner.ownership_id[ss];

					}	
				
					for(tt in owner.bustax){
						var value1 = owner.bustax[tt];

						
						if(value1.tfo==22){
							
							bustax2+=value1.amount;
							businesstaxx1 += value1.amount;
						
						}

						if(value5==5||value5==10){
							if(value1.tfo==23){
								bustax2+=value1.amount;
								businesstaxx1 += value1.amount;
							
							}
						}
					}	

					for(tt in owner.bustax2){
						var value2 = owner.bustax2[tt];

						
						if(value2.tfo=="Business Tax"){
							
							bustax4+=value2.addttfoamount;
							businesstaxx2 += value2.addttfoamount;
						
						}

						if(value5==5||value5==10){
							if(value2.tfo=="Permit Fee-Others"){
								bustax4+=value2.addttfoamount;
								businesstaxx2 += value2.addttfoamount;
							
							}
						}
					}	
			
					var businesstaxx=0,bustax=0;

					bustax = parseFloat(bustax1) + parseFloat(bustax2)+ parseFloat(bustax3)+ parseFloat(bustax4);
					
					businesstaxx = parseFloat(businesstaxx1) + parseFloat(businesstaxx2);
					// garbagefee = parseInt(garbagefee1) + parseInt(garbagefee2);

					var counts=0;
				
					for(i in owner.breakdowns) {
						counts++;
						// bustaxs = bustax;
						if(owner.application_type=="New"){
							bustaxs = 0;
						} else{
							if(counts==1){
								bustaxs = bustax;
							}
							
							else if(counts==2){
								// bustaxs = bustax/2;
								bustaxs = bustax;
							}
		
							else if(counts==4){
								// bustaxs = bustax/4;
								bustaxs = bustax;
							}
						}
					
						
					}
					fields.find('span.business-tax').text(bustax);
					var countss=0;
					
					
					for(i in owner.breakdowns) {}
						countss++;
						
						//var tfo = result.data.tfos[i],
						  var value = owner.breakdowns[i],
							  tr = $('<tr />').appendTo(breakdown);

						var documentaryStamp = 30;
						var certification = 75;
						

						$('<td />', { text: capitalize(value.label.replace(/_/g, ' '))}).appendTo(tr);
						var date1 =  new Date(new Date().getFullYear(),0,31);
						
						var date2 = new Date();
						var timeDiff = date2.getTime() - date1.getTime();
						var diffDays = timeDiff / (1000*3600*24); 
						var datediff = date2.getFullYear() - date1.getFullYear();
					
						var dd = date2.getDate();
						var mm = date2.getMonth()+1; //January is 0!
						var yyyy = date2.getFullYear();
						if(dd < 10)
						{
							dd = '0'+ dd;
						}
						if(mm < 10)
						{
							mm = '0' + mm;
						}
						var date2 = mm+'-'+dd+'-'+yyyy;

						var dd = date1.getDate();
						var mm = date1.getMonth()+1; //January is 0!
						var yyyy = date1.getFullYear();
						if(dd < 10)
						{
							dd = '0'+ dd;
						}
						if(mm < 10)
						{
							mm = '0' + mm;
						}
						var date1 = mm+'-'+dd+'-'+yyyy;
			
						//SURCHARGE and INTEREST
						if(datediff>0){
							surcharges = (bustaxs*0.25)*datediff;
							interests = bustaxs*0.02;
							
							amountt = parseFloat(amount) + parseFloat(surcharges) + parseFloat(certification) + parseFloat(documentaryStamp);
				
						} else{
							surcharges = 0;
							interests = 0
							amountt = parseFloat(amount) + parseFloat(surcharges) + parseFloat(certification) + parseFloat(documentaryStamp);
				

						}

						//dues
						$('<td />', { text: date1}).appendTo(tr);
					
						//date paid
						
						$('<td />', { text: date2 }).appendTo(tr);
					
						$('<td />', { html: '<span class="pull-left"></span>' +
						'<span class="pull-left">&#8369;</span>' +
						'<span class="pull-right">' + currencyFormat(parseFloat(grossy69)) + '</span>'}).appendTo(tr);
				
						$('<td />', { html: '<span class="pull-left"></span>' +
						'<span class="pull-left">&#8369;</span>' +
						'<span class="pull-right">' + currencyFormat(parseFloat(amount)) + '</span>'}).appendTo(tr);
						//amount
						$('<td />', { html: '<span class="pull-left"></span>' +
						'<span class="pull-left">&#8369;</span>' +
						'<span class="pull-right">' + currencyFormat(parseFloat(certification)) + '</span>'}).appendTo(tr);
						$('<td />', { html: '<span class="pull-left"></span>' +
						'<span class="pull-left">&#8369;</span>' +
						'<span class="pull-right">' + currencyFormat(parseFloat(documentaryStamp)) + '</span>'}).appendTo(tr);
				
						

						//interest
						// $('<td />', { html: '<input type="text" class="form-control" id="interest" value="'+interests+'" readonly>'}).appendTo(tr);
						//surcharge
						$('<td />', { html: '<input type="text" class="form-control" id="surcharge" value="'+currencyFormat(parseFloat(surcharges))+'" readonly>'}).appendTo(tr);
						//total amount per quarter
						$('<td />', { html: '<span class="pull-left"></span>' +
						'<strong><span class="pull-left">&#8369;</span>' +
						'<span class="pull-right">' + currencyFormat(parseFloat(amountt)) + '</span></strong>' }).appendTo(tr);
						
					
							
					
					

			
							$('<td/>', { html: '<div class="payment-method">'+
												'<a href="#" class=" method cash btn btn-info btn-xs method-cash" data-paidall="0" data-surcharge = "'+surcharges+'" data-interest = "'+amount+'" data-tfo_amount = "'+amountt+'" data-dues= "'+value.dues+'"  data-status ="'+value.stat+'"data-label = "'+value.label+'" data-payment_mode = "'+owner.payment_id+'" '+
												' ><i class="fa fa-credit-card"></i> CASH</a>'+							
												'</div>' }).appendTo(tr);
												$('<td/>', { html: '<div class="payment-method">'+
												'<a  href="' + baseurl + 'fees/retire_receipt/' + owner.pay_id+'/'+owner.assessment_id   +'/'+countss  +'" target="_blank" class="method check btn btn-warning btn-xs feed_receipt"><i class="fa fa-print"></i> FEED RECEIPT</a>'+
												'</div>'}).appendTo(tr);
					
							

						 breakdowns_container.push({'label': value.label,'dues' : value.dues,'value': value.value,'stat' : value.stat});
						 breakdownsJSON = JSON.stringify(breakdowns_container);
	
							total += parseFloat(value.value);
					
					fields.find('input[name="breakdowns"]').val(breakdownsJSON);
					// var tr2 = $('<tr />').appendTo(breakdown);
					// 	//$('<tr />', {}).appendTo(tr);
					// 	$('<td />', { text: '' }).appendTo(tr2);
					// 	$('<td />', { text: '' }).appendTo(tr2);
					// 	$('<td />', { text: '' }).appendTo(tr2);
						
					// 	$('<td />', { text: 'Total Php'}).css({'color': 'red','font-weight': 'bold'}).appendTo(tr2);
					// 	$('<td />', { html: '<span class="pull-left"></span>' +
					// 				 '<span class="pull-left">&#8369;</span>' +
					// 				 '<span class="pull-right">' + currencyFormat(parseFloat(total)) + '</span>' +
					// 				 '<input type="hidden" name="total" id="total" value="'+total+'"/>'
					// 				 }).appendTo(tr2);
					// 	$('<td />', { text: '' }).appendTo(tr2);
					// 	$('<td />', { text: '' }).appendTo(tr2);
					// 	$('<td />', { text: '' }).appendTo(tr2);
					// 	$('<td />', { text: '' }).appendTo(tr2);
					// 	$('<td />', { text: '' }).appendTo(tr2);
			
				
				} else {
	
				}
			});
		});




		$('#payment-form').on('click','a.method-cash', function(e) {
		//$('a.method-cash').on('click', function(e) {
			e.preventDefault();
			var d = $(this).data(),
				breakdowns = [],
				method = $(this);
	
	
			if(method.hasClass('cash')) {
				$('.method-check').fadeOut(function() {
					$('.method-cash').find('input[name="or_number"]').val('');
					$('.method-cash').find('input[name="cash_tendered"]').val('');
					$('.method-cash').find('input[name="change"]').val(0);
					$('.method-cash').find('input[name="paid_tax"]').val('');
					//$('.method-cash').find('input[name="total_amount"]').val('');
					$('.method-cash').find('input[name="balance"]').val('');
					$('.method-cash').find('input[name="paid_breakdowns"]').val('');
					var balance = 0,
						breakdowns = [],
						breakdownsJSON = "",
						total_amount = $('#payment-form').find('input[name="total_amount"]').val(),
						paid_tax = $('table.cash-click').find('input[name="paid_tax"]').val(d.tfo_amount);
	
					balance = parseFloat((total_amount) - (d.tfo_amount));
					$('.method-cash').hide().fadeIn();
					$('.method-cash').find('input[name="payall"]').val(d.paidall);
					$('.method-cash').find('input[name="paid_tax"]').val(d.tfo_amount);
					$('.method-cash').find('input[name="total_amount"]').val(total_amount);
					$('.method-cash').find('input[name="balance"]').val(balance);
					$('.method-cash').find('input[name="payment_mode"]').val(d.payment_mode);
	
				  breakdowns.push({'label': d.label,'dues' : d.dues,'value': d.tfo_amount,'stat' : 'Paid'}); //moa ni xa ang gi click sa user...gi assume nga pay na xa....
					breakdownsJSON = JSON.stringify(breakdowns);
					$('.method-cash').find('input[name="paid_breakdowns"]').val(breakdownsJSON);


					if(d.label=='First'){
						$('.method-cash').find('input[name="count"]').val(1);
						$('.method-cash').find('input[name="payment_modes"]').val('Quarterly');
						$('.method-cash').find('input[name="interest"]').val(d.interest);
						$('.method-cash').find('input[name="surcharge"]').val(d.surcharge);
					}
					else if(d.label=='Second'){
						$('.method-cash').find('input[name="count"]').val(2);
						$('.method-cash').find('input[name="payment_modes"]').val('Quarterly');
						$('.method-cash').find('input[name="interest"]').val(d.interest);
						$('.method-cash').find('input[name="surcharge"]').val(d.surcharge);
					}
					else if(d.label=='Third'){
						$('.method-cash').find('input[name="count"]').val(3);
						$('.method-cash').find('input[name="payment_modes"]').val('Quarterly');
						$('.method-cash').find('input[name="interest"]').val(d.interest);
						$('.method-cash').find('input[name="surcharge"]').val(d.surcharge);
					}
					else if(d.label=='Fourth'){
						$('.method-cash').find('input[name="count"]').val(4);
						$('.method-cash').find('input[name="payment_modes"]').val('Quarterly');
						$('.method-cash').find('input[name="interest"]').val(d.interest);
						$('.method-cash').find('input[name="surcharge"]').val(d.surcharge);
					}
					else if(d.label=='First-Annual'){
						$('.method-cash').find('input[name="count"]').val(1);
						$('.method-cash').find('input[name="payment_modes"]').val('Annual');
						$('.method-cash').find('input[name="interest"]').val(d.interest);
						$('.method-cash').find('input[name="surcharge"]').val(d.surcharge);
					}
					else if(d.label=='First-Bi-Annual'){
						$('.method-cash').find('input[name="count"]').val(1);
						$('.method-cash').find('input[name="payment_modes"]').val('Bi-Annual');
						$('.method-cash').find('input[name="interest"]').val(d.interest);
						$('.method-cash').find('input[name="surcharge"]').val(d.surcharge);
					}
					else if(d.label=='Second-Bi-Annual'){
						$('.method-cash').find('input[name="count"]').val(2);
						$('.method-cash').find('input[name="payment_modes"]').val('Bi-Annual');
						$('.method-cash').find('input[name="interest"]').val(d.interest);
						$('.method-cash').find('input[name="surcharge"]').val(d.surcharge);
					}
				});
			} else if(method.hasClass('check')) {
				$('.method-cash').fadeOut(function() {
					$('.method-check').hide().fadeIn();
				});
			}
		});

		$('#payment-form').on('click','a.method-check', function(e) {
			//$('a.method-cash').on('click', function(e) {
				e.preventDefault();
				var d = $(this).data(),
					breakdowns = [],
					method = $(this);
		
		
				if(method.hasClass('check')) {
					$('.method-cash').fadeOut(function() {
						$('.method-check').find('input[name="or_number"]').val('');
						$('.method-check').find('input[name="cash_tendered"]').val('');
						$('.method-check').find('input[name="change"]').val(0);
						$('.method-check').find('input[name="paid_tax"]').val('');
						//$('.method-cash').find('input[name="total_amount"]').val('');
						$('.method-check').find('input[name="balance"]').val('');
						$('.method-check').find('input[name="paid_breakdowns"]').val('');
						var balance = 0,
							breakdowns = [],
							breakdownsJSON = "",
							total_amount = $('#payment-form').find('input[name="total_amount"]').val(),
							paid_tax = $('table.cash-click').find('input[name="paid_tax"]').val(d.tfo_amount);
		
						balance = parseFloat((total_amount) - (d.tfo_amount));
						$('.method-check').hide().fadeIn();
						$('.method-check').find('input[name="payall"]').val(d.paidall);
						$('.method-check').find('input[name="paid_tax"]').val(d.tfo_amount);
						$('.method-check').find('input[name="total_amount"]').val(total_amount);
						$('.method-check').find('input[name="balance"]').val(balance);
						$('.method-check').find('input[name="payment_mode"]').val(d.payment_mode);
		
					  breakdowns.push({'label': d.label,'dues' : d.dues,'value': d.tfo_amount,'stat' : 'Paid'}); //moa ni xa ang gi click sa user...gi assume nga pay na xa....
						breakdownsJSON = JSON.stringify(breakdowns);
						$('.method-cash').find('input[name="paid_breakdowns"]').val(breakdownsJSON);
	
	
						if(d.label=='First'){
							$('.method-check').find('input[name="count"]').val(1);
							$('.method-check').find('input[name="payment_modes"]').val('Quarterly');
							$('.method-check').find('input[name="interest"]').val(d.interest);
							$('.method-check').find('input[name="surcharge"]').val(d.surcharge);
						}
						else if(d.label=='Second'){
							$('.method-check').find('input[name="count"]').val(2);
							$('.method-check').find('input[name="payment_modes"]').val('Quarterly');
							$('.method-check').find('input[name="interest"]').val(d.interest);
							$('.method-check').find('input[name="surcharge"]').val(d.surcharge);
						}
						else if(d.label=='Third'){
							$('.method-check').find('input[name="count"]').val(3);
							$('.method-check').find('input[name="payment_modes"]').val('Quarterly');
							$('.method-check').find('input[name="interest"]').val(d.interest);
							$('.method-check').find('input[name="surcharge"]').val(d.surcharge);
						}
						else if(d.label=='Fourth'){
							$('.method-check').find('input[name="count"]').val(4);
							$('.method-check').find('input[name="payment_modes"]').val('Quarterly');
							$('.method-check').find('input[name="interest"]').val(d.interest);
							$('.method-check').find('input[name="surcharge"]').val(d.surcharge);
						}
						else if(d.label=='First-Annual'){
							$('.method-check').find('input[name="count"]').val(1);
							$('.method-check').find('input[name="payment_modes"]').val('Annual');
							$('.method-check').find('input[name="interest"]').val(d.interest);
							$('.method-check').find('input[name="surcharge"]').val(d.surcharge);
						}
						else if(d.label=='First-Bi-Annual'){
							$('.method-check').find('input[name="count"]').val(1);
							$('.method-check').find('input[name="payment_modes"]').val('Bi-Annual');
							$('.method-check').find('input[name="interest"]').val(d.interest);
							$('.method-check').find('input[name="surcharge"]').val(d.surcharge);
						}
						else if(d.label=='Second-Bi-Annual'){
							$('.method-check').find('input[name="count"]').val(2);
							$('.method-check').find('input[name="payment_modes"]').val('Bi-Annual');
							$('.method-check').find('input[name="interest"]').val(d.interest);
							$('.method-check').find('input[name="surcharge"]').val(d.surcharge);
						}
					});
				} else if(method.hasClass('cash')) {
					$('.method-check').fadeOut(function() {
						$('.method-cash').hide().fadeIn();
					});
				}
			});


			$('#form_cancel').on('click','a.method-cash', function(e) {
				//$('a.method-cash').on('click', function(e) {
					e.preventDefault();
					var d = $(this).data(),
						breakdowns = [],
						method = $(this);
			
			
					if(method.hasClass('cash')) {
						$('.method-check').fadeOut(function() {
							$('.method-cash').find('input[name="or_number"]').val('');
							$('.method-cash').find('input[name="cash_tendered"]').val('');
							$('.method-cash').find('input[name="change"]').val(0);
							$('.method-cash').find('input[name="paid_tax"]').val('');
							//$('.method-cash').find('input[name="total_amount"]').val('');
							$('.method-cash').find('input[name="balance"]').val('');
							$('.method-cash').find('input[name="paid_breakdowns"]').val('');
							var balance = 0,
								breakdowns = [],
								breakdownsJSON = "",
								total_amount = $('#payment-form').find('input[name="total_amount"]').val(),
								paid_tax = $('table.cash-click').find('input[name="paid_tax"]').val(d.tfo_amount);
			
							balance = parseFloat((total_amount) - (d.tfo_amount));
							$('.method-cash').hide().fadeIn();
							$('.method-cash').find('input[name="payall"]').val(d.paidall);
							$('.method-cash').find('input[name="paid_tax"]').val(d.tfo_amount);
							$('.method-cash').find('input[name="total_amount"]').val(total_amount);
							$('.method-cash').find('input[name="balance"]').val(balance);
							$('.method-cash').find('input[name="payment_mode"]').val(d.payment_mode);
			
							breakdowns.push({'label': d.label,'dues' : d.dues,'value': d.tfo_amount,'stat' : 'Paid'}); //moa ni xa ang gi click sa user...gi assume nga pay na xa....
							breakdownsJSON = JSON.stringify(breakdowns);
							$('.method-cash').find('input[name="paid_breakdowns"]').val(breakdownsJSON);
		
		
							if(d.label=='First'){
								$('.method-cash').find('input[name="count"]').val(1);
								$('.method-cash').find('input[name="payment_modes"]').val('Quarterly');
								$('.method-cash').find('input[name="interest"]').val(d.interest);
								$('.method-cash').find('input[name="surcharge"]').val(d.surcharge);
							}
							else if(d.label=='Second'){
								$('.method-cash').find('input[name="count"]').val(2);
								$('.method-cash').find('input[name="payment_modes"]').val('Quarterly');
								$('.method-cash').find('input[name="interest"]').val(d.interest);
								$('.method-cash').find('input[name="surcharge"]').val(d.surcharge);
							}
							else if(d.label=='Third'){
								$('.method-cash').find('input[name="count"]').val(3);
								$('.method-cash').find('input[name="payment_modes"]').val('Quarterly');
								$('.method-cash').find('input[name="interest"]').val(d.interest);
								$('.method-cash').find('input[name="surcharge"]').val(d.surcharge);
							}
							else if(d.label=='Fourth'){
								$('.method-cash').find('input[name="count"]').val(4);
								$('.method-cash').find('input[name="payment_modes"]').val('Quarterly');
								$('.method-cash').find('input[name="interest"]').val(d.interest);
								$('.method-cash').find('input[name="surcharge"]').val(d.surcharge);
							}
							else if(d.label=='First-Annual'){
								$('.method-cash').find('input[name="count"]').val(1);
								$('.method-cash').find('input[name="payment_modes"]').val('Annual');
								$('.method-cash').find('input[name="interest"]').val(d.interest);
								$('.method-cash').find('input[name="surcharge"]').val(d.surcharge);
							}
							else if(d.label=='First-Bi-Annual'){
								$('.method-cash').find('input[name="count"]').val(1);
								$('.method-cash').find('input[name="payment_modes"]').val('Bi-Annual');
								$('.method-cash').find('input[name="interest"]').val(d.interest);
								$('.method-cash').find('input[name="surcharge"]').val(d.surcharge);
							}
							else if(d.label=='Second-Bi-Annual'){
								$('.method-cash').find('input[name="count"]').val(2);
								$('.method-cash').find('input[name="payment_modes"]').val('Bi-Annual');
								$('.method-cash').find('input[name="interest"]').val(d.interest);
								$('.method-cash').find('input[name="surcharge"]').val(d.surcharge);
							}
						});
					} else if(method.hasClass('check')) {
						$('.method-cash').fadeOut(function() {
							$('.method-check').hide().fadeIn();
						});
					}
				});
	

		$('#retire-pay').on('click','a.method-cash', function(e) {
			//$('a.method-cash').on('click', function(e) {
				e.preventDefault();
				var d = $(this).data(),
					breakdowns = [],
					method = $(this);
		
		
				if(method.hasClass('cash')) {
					$('.method-check').fadeOut(function() {
						$('.method-cash').find('input[name="or_number"]').val('');
						$('.method-cash').find('input[name="cash_tendered"]').val('');
						$('.method-cash').find('input[name="change"]').val(0);
						$('.method-cash').find('input[name="paid_tax"]').val('');
						//$('.method-cash').find('input[name="total_amount"]').val('');
						$('.method-cash').find('input[name="balance"]').val('');
						$('.method-cash').find('input[name="paid_breakdowns"]').val('');
						var balance = 0,
							breakdowns = [],
							breakdownsJSON = "",
							total_amount = $('#payment-form').find('input[name="total_amount"]').val(),
							paid_tax = $('table.cash-click').find('input[name="paid_tax"]').val(d.tfo_amount);
		
						balance = parseFloat((total_amount) - (d.tfo_amount));
						$('.method-cash').hide().fadeIn();
						$('.method-cash').find('input[name="payall"]').val(d.paidall);
						$('.method-cash').find('input[name="paid_tax"]').val(d.tfo_amount);
						$('.method-cash').find('input[name="total_amount"]').val(total_amount);
						$('.method-cash').find('input[name="balance"]').val(balance);
						$('.method-cash').find('input[name="payment_mode"]').val(d.payment_mode);
		
					  breakdowns.push({'label': d.label,'dues' : d.dues,'value': d.tfo_amount,'stat' : 'Paid'}); //moa ni xa ang gi click sa user...gi assume nga pay na xa....
						breakdownsJSON = JSON.stringify(breakdowns);
						$('.method-cash').find('input[name="paid_breakdowns"]').val(breakdownsJSON);
	
	
						if(d.label=='First'){
							$('.method-cash').find('input[name="count"]').val(1);
							$('.method-cash').find('input[name="payment_modes"]').val('Quarterly');
							$('.method-cash').find('input[name="interest"]').val(d.interest);
							$('.method-cash').find('input[name="surcharge"]').val(d.surcharge);
						}
						else if(d.label=='Second'){
							$('.method-cash').find('input[name="count"]').val(2);
							$('.method-cash').find('input[name="payment_modes"]').val('Quarterly');
							$('.method-cash').find('input[name="interest"]').val(d.interest);
							$('.method-cash').find('input[name="surcharge"]').val(d.surcharge);
						}
						else if(d.label=='Third'){
							$('.method-cash').find('input[name="count"]').val(3);
							$('.method-cash').find('input[name="payment_modes"]').val('Quarterly');
							$('.method-cash').find('input[name="interest"]').val(d.interest);
							$('.method-cash').find('input[name="surcharge"]').val(d.surcharge);
						}
						else if(d.label=='Fourth'){
							$('.method-cash').find('input[name="count"]').val(4);
							$('.method-cash').find('input[name="payment_modes"]').val('Quarterly');
							$('.method-cash').find('input[name="interest"]').val(d.interest);
							$('.method-cash').find('input[name="surcharge"]').val(d.surcharge);
						}
						else if(d.label=='First-Annual'){
							$('.method-cash').find('input[name="count"]').val(1);
							$('.method-cash').find('input[name="payment_modes"]').val('Annual');
							$('.method-cash').find('input[name="interest"]').val(d.interest);
							$('.method-cash').find('input[name="surcharge"]').val(d.surcharge);
						}
						else if(d.label=='First-Bi-Annual'){
							$('.method-cash').find('input[name="count"]').val(1);
							$('.method-cash').find('input[name="payment_modes"]').val('Bi-Annual');
							$('.method-cash').find('input[name="interest"]').val(d.interest);
							$('.method-cash').find('input[name="surcharge"]').val(d.surcharge);
						}
						else if(d.label=='Second-Bi-Annual'){
							$('.method-cash').find('input[name="count"]').val(2);
							$('.method-cash').find('input[name="payment_modes"]').val('Bi-Annual');
							$('.method-cash').find('input[name="interest"]').val(d.interest);
							$('.method-cash').find('input[name="surcharge"]').val(d.surcharge);
						}
					});
				} else if(method.hasClass('check')) {
					$('.method-cash').fadeOut(function() {
						$('.method-check').hide().fadeIn();
					});
				}
			});
		
	
		$('select[name="occupancy_id"]').on('change keyup', function (e) {
			var val = $(this).val();
			 if(val == '1'){
				 $('.property_info').show();
				$('.rental_info').show();
				$('input[name="leasor_first_name"]').focus();
			} else {
				$('.rental_info').hide();
			}
		});
	
		$('select[name="brgy_id"]').on('change keyup', function (e) {
			var val = $(this).val();
			 if(val == '18'){
				 $('.rental_info123').slideDown(500);
			
			} else {
				$('.rental_info123').slideUp(500);
			}
		});

		$('input:radio[name=govt_incentive]').click( function () {
		  var value = $(this).val();
		//   alert('value = '+value);
			   if (value === '1') {
					$('.govt-entity').show();
					$('input[name="govt_entity"]').focus();
			   } else {
					$('.govt-entity').hide();
				}
		});
	
		$('#registered_date').on('click',function (e) {
		   $('#registered_date').datepicker();
		});
	
		$('a.delete_bus').on('click',function(e){
			var data = $(this).data();
				modal = $('#error');
				//modal.modal('show');
	
			modal.find('input[name="app_id"]').val(data.appid);
			modal.find('input[name="business_id"]').val(data.businessid);
			modal.find('input[name="bus_line_id"]').val(data.buslineid);
			$('#popup-notification').find('.modal-title').text('Delete a BUSINESS');
			$('#popup-notification').find('img.notif').attr('src', baseurl + 'assets/img/icon-warning.gif');
			$('#popup-notification').find('h4.message-header').text('You are about to delete a record from the database.');
			$('#popup-notification').find('p.message-body').text('Are you sure you want to remove this business?');
			$('#popup-notification').find('input[name="field"]').val(data.tfoid);
			$('#popup-notification').find('img.loader').fadeOut();
			$('#popup-notification').find('.actions a').text('Delete');
			$('#popup-notification').modal('show');
	
		});
	
		//$('a.ok').on('click',function(e){
		$('#popup-notification').on('click','.actions a', function (e) {
	
			var appid = $('input[name="app_id"]').val(),
				buslineid  = $('input[name=bus_line_id]').val(),
				bussid = $('input[name=business_id]').val();
				console.log('appid='+appid+ ' bus_line_id='+buslineid+ ' bussid='+bussid);
			$.ajax({
				url: baseurl + 'fees/api/owner/delete_business/'+appid+'/'+buslineid+'/'+bussid,
				type: 'get',
				dataType: 'json',
				success: function(result){
	
					if(result.error===0){
						location.reload();
					} else {
						alert('Can not delete business')
					}
				}
			});
		});
	
		$('a.cancel').on('click',function(e){
			$('button.close-modal').trigger('click');
			//$(this).button()
		});
	
		$('.abled_male_estab_field').bind('keypress',function(e){
	
			if(e.which==13){
				e.preventDefault();
				var size=$(this).find('input[name="abled_male_emp_estab"]').val(),
					container = $('div.abled_male_estab_field');
				// alert(size);
				if(($('input[name="amale_emp_name_estab[]"]')).length){
					/*alert('hello');*/
					$('.abled_male_append').remove();
					$('.abled_male_input').remove();
					/*$('.button_class').remove();*/
				}
	
	
				for(i=1;i<=size;i++){
	
					container.append('<div class="col-sm-6 abled_male_append"><div class="form-group"><input name="amale_emp_name_estab[]" class="form-control" placeholder="Name"></div></div>');
					container.append('<div class="col-sm-3 abled_male_input"><div class="form-group"><input name="amale_emp_name_estab[]" class="form-control" placeholder="CTC#"></div></div>');
					container.append('<div class="col-sm-3 abled_male_input"><div class="form-group"><input name="amale_emp_name_estab[]" class="form-control" placeholder="PTR/OR#"></div></div>');
	
					/*container.append('<div class="col-sm-6 abled_male_append"><div class="form-group"><input name="amale_emp_name_estab['+'name'+']['+i+']" class="form-control" placeholder="Name"></div></div>');
					container.append('<div class="col-sm-3 abled_male_input"><div class="form-group"><input name="amale_emp_name_estab['+'ctc'+']['+i+']" class="form-control" placeholder="CTC#"></div></div>');
					container.append('<div class="col-sm-3 abled_male_input"><div class="form-group"><input name="amale_emp_name_estab[]" class="form-control" placeholder="PTR/OR#"></div></div>');*/
				}
				return false;
			}
		});
	
		$('.abled_female_estab_field').bind('keypress',function(e){
	
			if(e.which==13){
				e.preventDefault();
				var size=$(this).find('input[name="abled_female_emp_estab"]').val(),
					container = $('div.abled_female_estab_field');
	
			/*	if(($('input[name="afemale_emp_name_estab['+'name'+'][]"]')).length){*/
				if(($('input[name="afemale_emp_name_estab[]"]')).length){
	
					$('.abled_female_append').remove();
					$('.abled_female_input').remove();
				}
	
				for(i=1;i<=size;i++){
	
					/*container.append('<div class="col-sm-7 abled_female_append"><div class="form-group"><input name="afemale_emp_name_estab[]" class="form-control" placeholder="Name"></div></div>');
					container.append('<div class="col-sm-3 abled_female_input"><div class="form-group"><input name="afemale_emp_name_estab[]" class="form-control" placeholder="CTC#"></div></div>');*/
					container.append('<div class="col-sm-6 abled_female_append"><div class="form-group"><input name="afemale_emp_name_estab['+'name'+']['+i+']" class="form-control" placeholder="Name"></div></div>');
					container.append('<div class="col-sm-3 abled_female_input"><div class="form-group"><input name="afemale_emp_name_estab['+'ctc'+']['+i+']" class="form-control" placeholder="CTC#"></div></div>');
					container.append('<div class="col-sm-3 abled_female_estab_ptr"><div class="form-group"><input name="afemale_emp_name_estab['+'ptr'+']['+i+']" class="form-control" placeholder="PTR/OR#"></div></div>');
				}
				return false;
			}
		});
	
		$('.disabled_male_emp_estab_field').bind('keypress',function(e){
	
			if(e.which==13){
				e.preventDefault();
				var size=$(this).find('input[name="pwd_male_emp_estab"]').val(),
					container = $('div.disabled_male_emp_estab_field');
	
				if(($('input[name="dmale_emp_name_estab['+'name'+'][]"')).length){
					/*if(($('input[name="dmale_emp_name_estab[]"')).length){*/
	
					$('.disabled_male_append').remove();
					$('.disabled_male_input').remove();
				}
	
				for(i=1;i<=size;i++){
	
					/*container.append('<div class="col-sm-7 disabled_male_append"><div class="form-group"><input name="dmale_emp_name_estab[]" class="form-control" placeholder="Name"></div></div>');
					container.append('<div class="col-sm-3 disabled_male_input"><div class="form-group"><input name="dmale_emp_name_estab[]" class="form-control" placeholder="CTC#"></div></div>');*/
					container.append('<div class="col-sm-6 disabled_male_append"><div class="form-group"><input name="dmale_emp_name_estab['+'name'+']['+i+']" class="form-control" placeholder="Name"></div></div>');
					container.append('<div class="col-sm-3 disabled_male_input"><div class="form-group"><input name="dmale_emp_name_estab['+'ctc'+']['+i+']" class="form-control" placeholder="CTC#"></div></div>');
					container.append('<div class="col-sm-3 disabled_male_estab_ptr"><div class="form-group"><input name="dmale_emp_name_estab['+'ptr'+']['+i+']" class="form-control" placeholder="PTR/OR#"></div></div>');
				}
				return false;
			}
		});
	
		$('.disabled_female_emp_estab_field').bind('keypress',function(e){
	
			if(e.which==13){
				e.preventDefault();
				var size=$(this).find('input[name="pwd_female_emp_estab"]').val(),
					container = $('div.disabled_female_emp_estab_field');
	
				if(($('input[name="dfemale_emp_name_estab['+'name'+'][]"')).length){
				/*if(($('input[name="dfemale_emp_name_estab[]"')).length){*/
	
					$('.disabled_female_estab_append').remove();
					$('.disabled_female__estab_input').remove();
				}
	
				for(i=1;i<=size;i++){
	
					/*container.append('<div class="col-sm-7 disabled_female_estab_append"><div class="form-group"><input name="dfemale_emp_name_estab[]" class="form-control" placeholder="Name"></div></div>');
					container.append('<div class="col-sm-3 disabled_female__estab_input"><div class="form-group"><input name="dfemale_emp_name_estab[]" class="form-control" placeholder="CTC#"></div></div>');*/
					container.append('<div class="col-sm-6 disabled_female_estab_append"><div class="form-group"><input name="dfemale_emp_name_estab['+'name'+']['+i+']" class="form-control" placeholder="Name"></div></div>');
					container.append('<div class="col-sm-3 disabled_female_estab_input"><div class="form-group"><input name="dfemale_emp_name_estab['+'ctc'+']['+i+']" class="form-control" placeholder="CTC#"></div></div>');
					container.append('<div class="col-sm-3 disabled_female_estab_ptr"><div class="form-group"><input name="dfemale_emp_name_estab['+'ptr'+']['+i+']" class="form-control" placeholder="PTR/OR#"></div></div>');
				}
				return false;
			}
		});
	
		$('.abled_male_emp_lgu_field').bind('keypress',function(e){
	
			if(e.which==13){
				e.preventDefault();
				var size=$(this).find('input[name="abled_male_emp_lgu"]').val(),
					container = $('div.abled_male_emp_lgu_field');
	
				if(($('input[name="amale_emp_name_lgu['+'name'+'][]"]')).length){
				/*if(($('input[name="amale_emp_name_lgu[]"]')).length){*/
	
					$('.abled_female_estab_append').remove();
					$('.abled_female__estab_input').remove();
				}
	
				for(i=1;i<=size;i++){
	
					/*container.append('<div class="col-sm-7 abled_female_estab_append"><div class="form-group"><input name="amale_emp_name_lgu[]" class="form-control" placeholder="Name"></div></div>');
					container.append('<div class="col-sm-3 abled_female__estab_input"><div class="form-group"><input name="amale_emp_name_lgu[]" class="form-control" placeholder="CTC#"></div></div>');*/
					container.append('<div class="col-sm-6 abled_female_estab_append"><div class="form-group"><input name="amale_emp_name_lgu['+'name'+']['+i+']" class="form-control" placeholder="Name"></div></div>');
					container.append('<div class="col-sm-3 abled_female_estab_input"><div class="form-group"><input name="amale_emp_name_lgu['+'ctc'+']['+i+']" class="form-control" placeholder="CTC#"></div></div>');
					container.append('<div class="col-sm-3 abled_female_estab_ptr"><div class="form-group"><input name="amale_emp_name_lgu['+'ptr'+']['+i+']" class="form-control" placeholder="PTR/OR#"></div></div>');
				}
				return false;
			}
		});
	
		$('.abled_female_emp_lgu_field').bind('keypress',function(e){
	
			if(e.which==13){
				e.preventDefault();
				var size=$(this).find('input[name="abled_female_emp_lgu"]').val(),
					container = $('div.abled_female_emp_lgu_field');
	
				if(($('input[name="afemale_emp_name_lgu['+'name'+'][]"]')).length){
				/*if(($('input[name="afemale_emp_name_lgu[]"]')).length){*/
	
					$('.abled_female_lgu_append').remove();
					$('.abled_female__lgu_input').remove();
				}
	
				for(i=1;i<=size;i++){
	
					/*container.append('<div class="col-sm-7 abled_female_lgu_append"><div class="form-group"><input name="afemale_emp_name_lgu[]" class="form-control" placeholder="Name"></div></div>');
					container.append('<div class="col-sm-3 abled_female__lgu_input"><div class="form-group"><input name="afemale_emp_name_lgu[]" class="form-control" placeholder="CTC#"></div></div>');*/
					container.append('<div class="col-sm-6 abled_female_lgu_append"><div class="form-group"><input name="afemale_emp_name_lgu['+'name'+']['+i+']" class="form-control" placeholder="Name"></div></div>');
					container.append('<div class="col-sm-3 abled_female_lgu_input"><div class="form-group"><input name="afemale_emp_name_lgu['+'ctc'+']['+i+']" class="form-control" placeholder="CTC#"></div></div>');
					container.append('<div class="col-sm-3 abled_female_estab_ptr"><div class="form-group"><input name="afemale_emp_name_lgu['+'ptr'+']['+i+']" class="form-control" placeholder="PTR/OR#"></div></div>');
				}
				return false;
			}
		});
	
	
		$('.disabled_male_emp_lgu_field').bind('keypress',function(e){
	
			if(e.which==13){
				e.preventDefault();
				var size=$(this).find('input[name="pwd_male_emp_lgu"]').val(),
					container = $('div.disabled_male_emp_lgu_field');
	
				if(($('input[name="dmale_emp_name_lgu['+'name'+'][]"]')).length){
				/*if(($('input[name="dmale_emp_name_lgu[]"]')).length){*/
	
					$('.disabled_male_lgu_append').remove();
					$('.disabled_male__lgu_input').remove();
				}
	
				for(i=1;i<=size;i++){
	
					/*container.append('<div class="col-sm-7 disabled_male_lgu_append"><div class="form-group"><input name="dmale_emp_name_lgu[]" class="form-control" placeholder="Name"></div></div>');
					container.append('<div class="col-sm-3 disabled_male__lgu_input"><div class="form-group"><input name="dmale_emp_name_lgu[]" class="form-control" placeholder="CTC#"></div></div>');*/
					container.append('<div class="col-sm-6 disabled_male_lgu_append"><div class="form-group"><input name="dmale_emp_name_lgu['+'name'+']['+i+']" class="form-control" placeholder="Name"></div></div>');
					container.append('<div class="col-sm-3 disabled_male__lgu_input"><div class="form-group"><input name="dmale_emp_name_lgu['+'ctc'+']['+i+']" class="form-control" placeholder="CTC#"></div></div>');
					container.append('<div class="col-sm-3 disabled_male_estab_ptr"><div class="form-group"><input name="dmale_emp_name_lgu['+'ptr'+']['+i+']" class="form-control" placeholder="PTR/OR#"></div></div>');
				}
				return false;
			}
		});
	
	
		$('.disabled_female_emp_lgu_field').bind('keypress',function(e){
			if(e.which==13){
				e.preventDefault();
				var size=$(this).find('input[name="pwd_female_emp_lgu"]').val(),
					container = $('div.disabled_female_emp_lgu_field');
	
				if(($('input[name="dfemale_emp_name_lgu['+'name'+'][]"]')).length){
				/*if(($('input[name="dfemale_emp_name_lgu[]"]')).length){*/
	
					$('.disabled_female_lgu_append').remove();
					$('.disabled_female__lgu_input').remove();
				}
	
				for(i=1;i<=size;i++){
	
					/*container.append('<div class="col-sm-7 disabled_female_lgu_append"><div class="form-group"><input name="dfemale_emp_name_lgu[]" class="form-control" placeholder="Name"></div></div>');
					container.append('<div class="col-sm-3 disabled_female__lgu_input"><div class="form-group"><input name="dfemale_emp_name_lgu[]" class="form-control" placeholder="CTC#"></div></div>');*/
					container.append('<div class="col-sm-6 disabled_female_lgu_append"><div class="form-group"><input name="dfemale_emp_name_lgu['+'name'+']['+i+']" class="form-control" placeholder="Name"></div></div>');
					container.append('<div class="col-sm-3 disabled_female__lgu_input"><div class="form-group"><input name="dfemale_emp_name_lgu['+'ctc'+']['+i+']" class="form-control" placeholder="CTC#"></div></div>');
					container.append('<div class="col-sm-3 disabled_female_estab_ptr"><div class="form-group"><input name="dfemale_emp_name_lgu['+'ptr'+']['+i+']" class="form-control" placeholder="PTR/OR#"></div></div>');
				}
				return false;
			}
		});
	
		$('input[name=signageFee]:radio').on('click',function () {
	
			if($(this).val() == 1){
				$('.excess').show();
			}else{
				$('.excess').hide();
			}
	
		});
	
		$('#upload-btn').on('click', function(event) {
			var fileToUpload = inputFile[0].files[0];
			// make sure there is file to upload
			if (fileToUpload != 'undefined') {
				// provide the form data
				// that would be sent to sever through ajax
				var formData = new FormData(),
					modal = $('#error');
				formData.append("file", fileToUpload);
	
				// now upload the file using $.ajax
				$.ajax({
					//url: uploadURI,
					url: baseurl + 'fees/api/owner/upload_image/',
					type: 'post',
					data: formData,
					processData: false,
					contentType: false,
					success: function(result) {
						modal.modal('show');
						modal.find('.msg').text('Image Updated');
					}
				});
			}
		});
		function listFilesOnServer () {
			var items = [];
	
			$.getJSON(uploadURI, function(data) {
				$.each(data, function(index, element) {
					items.push('<li class="list-group-item">' + element  + '<div class="pull-right"><a href="#"><i class="glyphicon glyphicon-remove"></i></a></div></li>');
				});
				$('.list-group').html("").html(items.join(""));
			});
		} 
	
		$('#error').on('click','a.ok',function (e){
			$('button.close-modal').trigger('click');
		});
	
		$('form.sample4').on('submit', function(e) {
			// alert('asdasdada');
			var firstname = $('input[name="firstname"]').val();
			var middlename = $('input[name="middlename"]').val();
			var lastname = $('input[name="lastname"]').val();
			// alert(firstname + middlename + lastname);
	
			e.preventDefault();
	
			var inputs = $(this).serialize(),
				form = $(this);console.log(inputs),
				modal = $('#payment_ok');
			$.post(baseurl + 'ctc/ctc/save_ctc_indi', inputs, function(result) {
				if(result.error === 0) {
					popup(
						'Transaction',
						'CTC Successfully made',
						'',
						{},
						'Ok',
						'info',
						'cheers'
					);
					
				} else {
					show_message(form.find('.messages'), result.message, 'Oops!', 'danger');
				}
			}, 'json');
			return false;
	
		});
		$('form.sample5').on('submit', function(e) {
			// alert('asdasdada');
			// var firstname = $('input[name="firstname"]').val();
			// var middlename = $('input[name="middlename"]').val();
			// var lastname = $('input[name="lastname"]').val();
			// alert(firstname + middlename + lastname);
	
			e.preventDefault();
	
			var inputs = $(this).serialize(),
				form = $(this);console.log(inputs),
				modal = $('#payment_ok');
			$.post(baseurl + 'ctc/ctc/save_ctc_corp', inputs, function(result) {
				if(result.error === 0) {
					popup(
						'Transaction',
						'CTC Successfully made',
						'',
						{},
						'Ok',
						'info',
						'cheers'
					);
					
				} else {
					show_message(form.find('.messages'), result.message, 'Oops!', 'danger');
				}
			}, 'json');
			return false;
	
		});
	
	
		$('#print').on('click', function(e) {
			e.preventDefault();
	
			var inputs = $(this).serialize(),
				form = $(this);console.log(inputs);
	
				// alert(inputs);
	
			$.post(baseurl + 'ctc/ctc/print_ctc', inputs, function(result) {
				if(result.error === 0) {
					// location.reload();
					// $(':input[type="button"]').prop('disabled', false);
					// $(':input[type="submit"]').prop('disabled', true);
				} else {
					show_message(form.find('.messages'), result.message, 'Oops!', 'danger');
				}
			}, 'json');
			return false;
		});
	
		$('#print_assessment').on('click', function(e) {
			form = $('#assess');
			var app_id = form.find('#app_id').val(),
					div = form.find('div.ass_btns');
					div.html(''); console.log('div'+div);
					$('', {
						'class': 'relative',
						html:  '<a href="' + baseurl + 'fees/printAssessment/' +app_id + '" target="_blank" class="method check btn btn-info btn-xs" disabled><i class="fa fa-print"></i> Print</a>'
					}).appendTo(div);
			//alert(app_id);
	
		});
	
		$('.add').on('click',function (e){
		var d = $(this).data(),
				modal = $('#add_announcement');
				modal.modal('show');
				//modal.find('.modal-title').text('Add New Announcement');
		//alert('add='+d.aid);
	
		});
		$('.reset_corp').on('click',function (e){
			var d = $(this).data(),
					modal = $('#new-corporate');
					modal.modal('hide');
					//modal.find('.modal-title').text('Add New Announcement');
			//alert('add='+d.aid);
		
			});
			$('.reset_indi').on('click',function (e){
				var d = $(this).data(),
						modal = $('#new-ctc');
						modal.modal('hide');
						//modal.find('.modal-title').text('Add New Announcement');
				//alert('add='+d.aid);
			
				});
	
		$('.delete').on('click',function (e){
			var d = $(this).data();
			modal = $('#success');
			modal.modal('show');
			modal.find('.modal-title').text('Delete an Announcement');
			modal.find('.msg').text('Are you sure you want to delete this announcement?');
	
			$('#success').on('click','a.yes',function (e){
	
				$.ajax({
					url: baseurl + 'home/delete_announcement/'+d.aid,
					type: 'get',
					dataType: 'json',
					success: function(result){
	
						if(result.error===0){
							location.reload();
						} else {
							alert('D man gud pede i delete dzae');
						}
					}
				});
			});
			//alert('delete='+d.aid);
		});
	
		$('.add_new_announcement').on('click',  function(e) {
			e.preventDefault();
			var modal = $('#add_announcement'),
					d = $(this).data();
			modal.modal('show');
		});
	
		$('.adding_announcement').on('submit',function(e){
			e.preventDefault();
			var addannouncement = $("#announcement_content");
			var inputs = $(this).serialize(),
				  form = $(this); console.log('inputs='+inputs);
				//baseurl + 'reference/api/barangay/newAnnouncement', inputs,
			$.ajax({
				url: baseurl + 'home/newAnnouncement',
				type: 'post',
				dataType: 'json',
				data: inputs,
				success: function (result){
					if(result.error === 0){
						location.reload();
					}else{
						alert('Wa na add dzae basin naai kuwang');
					}
				}
			});
		});
		$('.edit').on('click',  function(e) {
			e.preventDefault();
			var modal = $('#add_announcement'),
					d = $(this).data();
			modal.modal('show');
			$.ajax({
				url: baseurl + 'home/get_announcement_edit/'+d.aid,
				type: 'post',
				dataType: 'json',
				success: function (result){
					if(result.error === 0){
						modal.find('input[name="announce_id"]').val(result.data.announce_id);
						modal.find('input[name="title"]').val(result.data.title);
						modal.find('textarea[name="announce_content"]').val(result.data.announce_content);
						modal.find('input[name="created_at"]').val(result.data.created_at);
						modal.find('input[name="added_by"]').val(result.data.added_by);
					}else{
						alert('An error has occured');
					}
				}
			});
		});

	// var dropdown = document.getElementById("brgy_id");
  //   dropdown.onchange = function(event){
	// 	alert('asd');
  //   //    if(dropdown.value=="Yes"){
  //   //      alert("Your message")
  //   //    }
  //   }



		$("#brgy_id").change(function(){  
			alert('testing');
        // var munid = $(this).find('option:selected').attr('munid');
		// var disid = $(this).find('option:selected').attr('disid');	
	  	// $("#add_muniz").val(munid); 
	  	// $("#add_disz").val(disid); 
	  	
		//   	if($(this).val()==10){
		// 		$('#add_brgyz_editz_div').show();
		// 		$('#add_muniz').val(2);
		// 		$('#add_provz').val(1);
		// 		$('#add_disz').val(0);
		// 		$('#add_muni_editz_div').show();
		// 	}else{ 
		// 		$('#add_brgyz_editz_div').hide();

		// 		$.ajax  
		//            	({  
		//             	type: "POST",  
		//             	url: 'admins/get_files.php',
		//             	data: {'ids' : munid, 'func' : 'get_muni'},
		//             	dataType: 'json', 
		//             	success: function(result)  
		//             	{  
		//              		$("#add_provz").val(result.provinceID);  
		//             	}  
		//            	});  
		// 	}
           
    });
	
	
		$('#gross_tax').on('keyup', function(e) {
			// alert('testing');
			
			var textone;
			var texttwo;
			textone = parseFloat($('#gross_tax').val());
			texttwo = 1000
			var result = textone / texttwo;

			if (result > 0) {
				$('#earnings').val(result.toFixed(2));
			} else {
				$('#earnings').val(0);
			}

		
	
	
			});
	
		$('#salary_tax').on('keyup', function(e) {
			// alert('testing');
	
			var textone;
			var texttwo;
			textone = parseFloat($('#salary_tax').val());
			texttwo = 1000
			var result = textone / texttwo;
			if (result > 0) {
				$('#salaries').val(result.toFixed(2));
			} else {
				$('#salaries').val(0);
			}
			});
	
		$('#income_tax').on('keyup', function(e) {
			// alert('testing');
	
			var textone;
			var texttwo;
			textone = parseFloat($('#income_tax').val());
			texttwo = 1000
			var result = textone / texttwo;
			if (result > 0) {
				$('#income').val(result.toFixed(2));
			} else {
				$('#income').val(0);
			}

			});

			$('#assessed_tax_amt').on('keyup', function(e) {
				// alert('testing');
		
				var textone;
				var texttwo;
				textone = parseFloat($('#assessed_tax_amt').val());
				texttwo = 2500
				var result = textone / texttwo;
				if (result > 0) {
					$('#assessed_tax_due').val(result.toFixed(2));
					print_r(textone);
				} else {
					$('#assessed_tax_due').val(0);
				}
	
				});

				$('#gross_tax_amt').on('keyup', function(e) {
					// alert('testing');
			
					var textone;
					var texttwo;
					textone = parseFloat($('#gross_tax_amt').val());
					texttwo = 2500
					var result = textone / texttwo;
					if (result > 0) {
						$('#gross_tax_due').val(result.toFixed(2));
					} else {
						$('#gross_tax_due').val(0);
					}
		
					});


			
			$('.add-new-ctc').on('click',  function(e) {
				e.preventDefault();
				var modal = $('#new-ctc');
				modal.modal('show');
			});

			
			$('.add-corporate').on('click',  function(e) {
				e.preventDefault();
				var modal = $('#new-corporate');
				modal.modal('show');
			});
		
	
			$('table#cancelled tbody').on('click', 'a.reviewcancel', function(e){
				e.preventDefault();
					var data = $(this).data();
					var modal = $('#form_cancel');
				  // var fields = modal.find('.details');
				 	
				  $('.save-cash').hide();
				  $('.save-check').hide();
				  $('#form-cash')[0].reset();
				  $('#form-check')[0].reset();
				  
					 modal.modal('show');

					 $.getJSON(baseurl + 'fees/api/payment/cancelled/' + data.cancelledid, function(result) {
						 //console.log(result);
						if(result.error === 0) {
							var datanibai = result.data.returnies;
							var breakdowns_container = [],
							breakdownsJSON = "",
							breakdown = modal.find('table.annual tbody'),
							fields = modal.find('.detailcancel'),
						//breakdown =  $('div.row.annual1'),
						total = 0,
						is_paid = 0;
					var bustax1=0,bustax2=0,bustax3=0,bustax4=0,garbagefee=0,businesstaxx1=0,businesstaxx2=0,garbagefee1=0,garbagefee2=0;

						//	modal.find('span.owner').text(capitalize(datanibai.owner));
						fields.find('span.owner').text(capitalize(datanibai.owner));
						fields.find('span.business-nature').text(data.nature);
						fields.find('span.contact-number').text(datanibai.contact);
						
						fields.find('span.address').text(datanibai.address);
						fields.find('span.trans-type').text(capitalize(datanibai.application_type));
						fields.find('span.payment-mode').text(capitalize(datanibai.payment_type));

						fields.find('input[name="cancelled_id"]').val(data.cancelledid);
						fields.find('input[name="owner_id"]').val(datanibai.owner_id);
						fields.find('input[name="buss_id"]').val(datanibai.buss_id);
						fields.find('input[name="total_amount"]').val(datanibai.total);
						fields.find('input[name="payment_id"]').val(datanibai.payment_id);

						fields.find('input[name="counting"]').val(datanibai.counts);
							// $('.annual').show();
							console.log(datanibai.gross);
						var gross = datanibai.gross;
						var subtotal = datanibai.rtfo;
						var rtype = datanibai.rtfo_type;
						var rsubtype = datanibai.rtfo_subtype;
						var amount = 0,valuex;
			
					//amount change

					if(rtype == 1) { // Constant
						amount = subtotal;
						value = '<span class="pull-right"><strong>Constant</strong></span>';						
						
					} else if(rtype == 2) { /** TFO is of Formula  type */
	
						var formula = subtotal,
						default_var = gross;
						$C=gross;
						var amt = 0,amt1 = 0;
						amt = eval(formula);
						value = '<span class="pull-left label label-success">Formula</span><span class="pull-left">&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="pull-right"><strong>'+ '(' + formula + ')' + ' ' + currencyFormat(parseFloat(amt)) + '</strong></span>';						
						amount = amt;								
				
					} else if(rtype == 3 && (rsubtype == 0 || rsubtype == 1 || rsubtype == 2)) {			// Range

						var inrange=false, tfo_amount=0,amt1=0,$capital=gross,$C=gross;
						values = $.parseJSON(subtotal);
						value = '<div class="range-list">' +
						'<p class="btn btn-xs btn-info show-range">Click to view Range <span class="caret"></span></p>' +
						'<div class="slide-range" style="display: none;">';

						
							for(index in values) {

								var cp = $C,
									min = parseFloat(values[index].min),
									max = parseFloat(values[index].max);

										
								//this starts the displaying of range,formula
								if (typeof values[index].formula == 'undefined'){ //fitted for range alone

									value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].min)) + '</span> - ';
									value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].max)) + '</span> = ';
									value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].value)) + '</span><br/>';

								} //end of fitted for range alone

								else if( values[index].type!= 'formula'){ // range has formula
									console.log('hahahahahha='+typeof values[index].type);
									value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].min)) + '</span> - ';
									value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].max)) + ' </span> = ';
									value += '<span class="badge badge-default">&#8369;' + values[index].formula + '</span><br/>';
									if( typeof values[index].formula == "undefined"){
										value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].max)) + '</span> = ';
										value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].value)) + '</span><br/>';
									} else if (typeof values[index].e2 == 'undefined') {
										value += '<span class="badge badge-default">' + 'up' + '</span> = ';
										value += '<span class="badge badge-default">' + values[index].formula + '</span><br />';
									}  else if (typeof values[index].e2 != 'undefined' && values[index].e2 !=0){
										value += '<span class="badge badge-default">' + 'For every &#8369;'+ currencyFormat(parseFloat(values[index].e2 ))+' in excess of &#8369;' + currencyFormat(parseFloat(values[index].min))+ '</span> = ';
										value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].valueadded))+ '</span>';
									}

								} else{ //alert('duh');
									value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].min)) + ' </span> = ';
									value += '<span class="badge badge-default">&#8369;' + currencyFormat(parseFloat(values[index].max)) + ' </span> = ';
									value += '<span class="badge badge-default">' + values[index].formula + '</span><br />';
								}
														
														if(gross >= min && gross <= max && (typeof values[index].type == 'undefined')){
															console.log('capital '+$capital +' >= ' +  min +' && capital='+ $capital + '<=' + max);
														
															
															amount = parseFloat(values[index].value);
													
															tfo_amount = amount;
															inrange = true;
														
															console.log(amount);
														} else if(!inrange && (values[index].e2 == '0') && (typeof values[index].e2 == 'undefined')){ //not in range so we use the formula
														
															var formula_excess = values[index].formula,
																$base = values[index].base,
																amt = eval(formula_excess);
	
																if($C !=0){
																	if(amt < $base){
																		amount = eval(parseFloat($base) + parseFloat(amt));
																	} else if(amt > $base) {
																		amount = parseFloat(amt);
																	} else {
																		amount = 0;
																	}
																} else {
																	amount = 0.00;
																}
																tfo_amount = amount;

															
														} //end of not in range
														else if ( values[index].e2 != '0' && typeof values[index].e2 != 'undefined' && values[index].type != 'formula'){ // in excess

															var formula_excess = values[index].formula,
																$E1 = values[index].e1,
																$E2 = values[index].e2,
																$V = values[index].valueadded,
																$base = values[index].base,
																amt = eval(formula_excess);
																amt1 = eval(amt1 * (details[i].percentage/100));
																amt = amt + amt1;
																	if($C !=0){
																		if(amt < $base ){
																			amount = eval(parseFloat($base) + parseFloat(amt));
																		} else if (amt > $base){
																			amount = parseFloat(amt);
																		} else{
																			amount = 0.00;
																		}
																	} else {
																		amount = 0.00;
																	}
															tfo_amount = amount;

														
														} //end of e2 not undefined
														else if(values[index].type == 'formula'  && (!inrange)){
															
																if($C >= min && $C <= max ) {
																	var formula = values[index].formula,
																			$C = $C,
																			amt1; 
													
																	amount= eval(formula);
																	
																	tfo_amount = amount;
																}
	
														}
														else {
															//console.log('min='+min+'  max='+max + ' capital='+$capital+'values[index].type='+values[index].type);
														}
														
														
													
													
													
																 //tfo_amount = annually;console.log('tfo_amount diri='+tfo_amount);
	
													 
												
											} 
										
											value += '</div></div>';
											total += subtotal;
											display = value;
											console.log(display);
											$tfo_amount = 0;
											tfosJSON = JSON.stringify(tfos);
										}
	
					breakdown.html('');
					$('.annual').show();
					document.getElementById('')
				
					for(ss in datanibai.ownership_id){
						var value5 = datanibai.ownership_id[ss];

					}	
				
					for(tt in datanibai.bustax){
						var value1 = datanibai.bustax[tt];

						
						if(value1.tfo==22){
							
							bustax2+=value1.amount;
							businesstaxx1 += value1.amount;
						
						}

						if(value5==5||value5==10){
							if(value1.tfo==23){
								bustax2+=value1.amount;
								businesstaxx1 += value1.amount;
							
							}
						}
					}	

					for(tt in datanibai.bustax2){
						var value2 = datanibai.bustax2[tt];

						
						if(value2.tfo=="Business Tax"){
							
							bustax4+=value2.addttfoamount;
							businesstaxx2 += value2.addttfoamount;
						
						}

						if(value5==5||value5==10){
							if(value2.tfo=="Permit Fee-Others"){
								bustax4+=value2.addttfoamount;
								businesstaxx2 += value2.addttfoamount;
							
							}
						}
					}	
			
					var businesstaxx=0,bustax=0;

					bustax = parseFloat(bustax1) + parseFloat(bustax2)+ parseFloat(bustax3)+ parseFloat(bustax4);
					
					businesstaxx = parseFloat(businesstaxx1) + parseFloat(businesstaxx2);
					// garbagefee = parseInt(garbagefee1) + parseInt(garbagefee2);

					var counts=0;
				
					for(i in datanibai.breakdowns) {
						counts++;
						// bustaxs = bustax;
						if(datanibai.application_type=="New"){
							bustaxs = 0;
						} else{
							if(counts==1){
								bustaxs = bustax;
							}
							
							else if(counts==2){
								// bustaxs = bustax/2;
								bustaxs = bustax;
							}
		
							else if(counts==4){
								// bustaxs = bustax/4;
								bustaxs = bustax;
							}
						}
					
						
					}
					modal.find('span.business-tax').text(bustax);
					var countss=0;
					
					
					for(i in datanibai.breakdowns) {
						countss++;
						
						//var tfo = result.data.tfos[i],
						  var value = datanibai.breakdowns[i],
							  tr = $('<tr />').appendTo(breakdown);

						var documentaryStamp = 30;
						var certification = 75;
						

						$('<td />', { text: capitalize(value.label.replace(/_/g, ' '))}).appendTo(tr);
						var date1 =  new Date(new Date().getFullYear(),0,31);
						
						var date2 = new Date();
						var timeDiff = date2.getTime() - date1.getTime();
						var samplezzz = timeDiff / (1000*3600*24); 
						
					
						var dd = date2.getDate();
						var mm = date2.getMonth()+1; //January is 0!
						var yyyy = date2.getFullYear();
						if(dd < 10)
						{
							dd = '0'+ dd;
						}
						if(mm < 10)
						{
							mm = '0' + mm;
						}
						var date2 = mm+'-'+dd+'-'+yyyy;

						var dd = date1.getDate();
						var mm = date1.getMonth()+1; //January is 0!
						var yyyy = date1.getFullYear();
						if(dd < 10)
						{
							dd = '0'+ dd;
						}
						if(mm < 10)
						{
							mm = '0' + mm;
						}
						var date1 = mm+'-'+dd+'-'+yyyy;
						
						//SURCHARGE and INTEREST
						if(samplezzz>0){
							surcharges = (amount*0.25)*samplezzz;
							interests = amount*0.02;
							
							amountt = amount + surcharges + certification + documentaryStamp;
				
						} else{
							surcharges = 0;
							interests = 0
							amountt = amount + surcharges + certification + documentaryStamp;
				

						}
						// console.log(amountt);
						// console.log(date1);
						//dues
						$('<td />', { text: date1}).appendTo(tr);
					
						//date paid
						
					
					
						$('<td />', { html: '<span class="pull-left"></span>' +
						'<span class="pull-left">&#8369;</span>' +
						'<span class="pull-right">' + currencyFormat(parseFloat(gross)) + '</span>'}).appendTo(tr);

						$('<td />', { text: date2 }).appendTo(tr);
				
						$('<td />', { html: '<span class="pull-left"></span>' +
						'<span class="pull-left">&#8369;</span>' +
						'<span class="pull-right">' + currencyFormat(parseFloat(amount)) + '</span>'}).appendTo(tr);
						//amount
						$('<td />', { html: '<span class="pull-left"></span>' +
						'<span class="pull-left">&#8369;</span>' +
						'<span class="pull-right">' + currencyFormat(parseFloat(certification)) + '</span>'}).appendTo(tr);
						$('<td />', { html: '<span class="pull-left"></span>' +
						'<span class="pull-left">&#8369;</span>' +
						'<span class="pull-right">' + currencyFormat(parseFloat(documentaryStamp)) + '</span>'}).appendTo(tr);
				
						

						//interest
						// $('<td />', { html: '<input type="text" class="form-control" id="interest" value="'+interests+'" readonly>'}).appendTo(tr);
						//surcharge
						$('<td />', { html: '<input type="text" class="form-control" id="surcharge" value="'+currencyFormat(parseFloat(surcharges))+'" readonly>'}).appendTo(tr);
						//total amount per quarter
						$('<td />', { html: '<span class="pull-left"></span>' +
						'<strong><span class="pull-left">&#8369;</span>' +
						'<span class="pull-right">' + currencyFormat(parseFloat(amountt)) + '</span></strong>' }).appendTo(tr);
						$('<td />', { html: '<span class="pull-center">'+ datanibai.status +'</span>' }).appendTo(tr);
						
						if (datanibai.status == 'Unpaid') {
							$('<td/>', { html: '<div class="payment-method">'+
							'<a href="#" class=" method cash btn btn-info btn-xs method-cash" data-paidall="0" data-surcharge = "'+surcharges+'" data-interest = "'+amount+'" data-tfo_amount = "'+amountt+'" data-dues= "'+value.dues+'"  data-status ="'+value.stat+'"data-label = "'+value.label+'" data-payment_mode = "'+datanibai.payment_id+'" '+
							' ><i class="fa fa-credit-card"></i> CASH</a>'+							
							'</div>' }).appendTo(tr);
						$('<td/>', { html: '<div class="payment-method">'+
							'<a  href="' + baseurl + 'fees/retire_receipt/' + datanibai.pay_id+'/'+datanibai.assessment_id   +'/'+countss  +'" target="_blank" class="method check btn btn-warning btn-xs feed_receipt"><i class="fa fa-print"></i> FEED RECEIPT</a>'+
							'</div>'}).appendTo(tr);
						} else {
							// $('<td/>', { html: '<div class="payment-method">'+
							// '<a href="#" class="btn btn-warning btn-xs"'+
							// ' ><i class="fa fa-credit-card"></i> CASH</a>'+							
							// '</div>' }).appendTo(tr);
						$('<td/>', { html: '<div class="payment-method">'+
							'<a  href="' + baseurl + 'fees/retire_receipt/' + datanibai.pay_id+'/'+datanibai.assessment_id   +'/'+countss  +'" target="_blank" class="method check btn btn-warning btn-xs feed_receipt"><i class="fa fa-print"></i> FEED RECEIPT</a>'+
							'</div>'}).appendTo(tr);
						}
						 breakdowns_container.push({'label': value.label,'dues' : value.dues,'value': value.value,'stat' : value.stat});
						 breakdownsJSON = JSON.stringify(breakdowns_container);
	
							total += parseFloat(value.value);
					}
					modal.find('input[name="breakdowns"]').val(breakdownsJSON);
					// var tr2 = $('<tr />').appendTo(breakdown);
					// 	//$('<tr />', {}).appendTo(tr);
					// 	$('<td />', { text: '' }).appendTo(tr2);
					// 	$('<td />', { text: '' }).appendTo(tr2);
					// 	$('<td />', { text: '' }).appendTo(tr2);
						
					// 	$('<td />', { text: 'Total Php'}).css({'color': 'red','font-weight': 'bold'}).appendTo(tr2);
					// 	$('<td />', { html: '<span class="pull-left"></span>' +
					// 				 '<span class="pull-left">&#8369;</span>' +
					// 				 '<span class="pull-right">' + currencyFormat(parseFloat(total)) + '</span>' +
					// 				 '<input type="hidden" name="total" id="total" value="'+total+'"/>'
					// 				 }).appendTo(tr2);
					// 	$('<td />', { text: '' }).appendTo(tr2);
					// 	$('<td />', { text: '' }).appendTo(tr2);
					// 	$('<td />', { text: '' }).appendTo(tr2);
					// 	$('<td />', { text: '' }).appendTo(tr2);
					// 	$('<td />', { text: '' }).appendTo(tr2);
			
				
				} else {
	
				}

					 });
			});

			$('#form-cash-cancel').on('submit', function(e) {
				e.preventDefault();
				var form = $('#form-cash-cancel'),
					inputs = $('#form-cash-cancel').serialize();
					modal = $('#payment_ok');
		
				console.info('Saving...');
				$.post(baseurl + 'fees/api/payment/save_cancel_payment', inputs, function(result) {
					if(result.error === 0) {
						//alert('success');
						console.info('Successfully saved');
						popup(
							'Transaction',
							'Payment Successfull',
							'',
							{},
							'Ok',
							'info',
							'cheers'
						);
						location.reload();
						var table = $('#business-payment tbody');
		
						// $.getJSON(baseurl + 'fees/api/payment/approval_list', function(result) {
						// 	if(result.error === 0) {
						// 		table.html('');
		
						// 		for(i in result.data) {
						// 			var tr = $('<tr />').appendTo(table),
						// 				details = result.data[i];
		
						// 			$('<td />', { text: details.permit_number }).appendTo(tr);
						// 			$('<td />', { text: capitalize(details.firstname + ' ' + details.middlename + ' ' + details.lastname) }).appendTo(tr);
						// 			$('<td />', { text: capitalize(details.business_name) }).appendTo(tr);
						// 			$('<td />', { text: details.application_date }).appendTo(tr);
						// 			$('<td />', { text: capitalize(details.application_type) }).appendTo(tr);
						// 			$('<td />', { text: capitalize(details.status) }).appendTo(tr);
						// 			$('<td />', { 'class': 'text-center', html: '<a href="#" class="btn btn-info btn-xs selectpayer" data-assessmentid="' + details.assessment_id + '" data-ownerid="' + details.owner_id + '" data-businessid="' + details.buss_id + '"><i class="fa fa-money"></i> Pay</a>' }).appendTo(tr);
						// 		}
						// 	} else {
						// 		var tr = $('<tr />').appendTo(table);
						// 		$('<td />', { text: 'Currently have no pending assessments.', colspan: 7 }).appendTo(tr);
						// 	}
						// });
					} else {
						console.info('Failed Saving');
					}
					return false;
				}, 'json');
			});

			$('.annualstall').on('click', 'a.method-cash', function(e) {
				e.preventDefault();
				var d = $(this).data();
				$('.cash-stall').show();
				$('input[name=total_amount]').val(d.tfo_amount);
				$('input[name=count]').val(d.count);
				$('input[name=interest]').val(d.interest);
				$('input[name=surcharge]').val(d.surcharge);
				$('input[name=appidni]').val(d.appid);
			});


			$('.cash-click').on('keyup', 'input[name=cash_tendered]', function(e) {
				e.preventDefault();
				var value = parseFloat($(this).val()),
						change = $(this).parent().parent().parent().find('input[name="change"]'),
						total = parseFloat($('.cash-stall').find('input[name="total_amount"]').val()),
						 temp = 0;
			//temp = value - total;
			temp = value - total
			if(value < total){
				//alert('dire');
				$('.oops').show();
				$('.pay-cash-now').attr('disabled','disabled');
			}else{
				$('.oops').hide();
				$('.pay-cash-now').removeAttr('disabled');
				if(temp != NaN && temp > 0) {
					change.val(temp);
				} else {
					change.val(0);
				}
			}


			});


			$('table#business-payment tbody').on('click', 'a.pay_stall', function(e) { 
				e.preventDefault();
				var data = $(this).data(), 
				modal = $('#stalls-pay');
				modal.modal('show');
			
				$.getJSON(baseurl + 'fees/api/payment/stall_pay/' + data.appid, function(result) { 
				
				if(result){
					var owner = result.data.owner,
					breakdown = modal.find('table.annualstall tbody'),
					fields = modal.find('.detailstally');

					fields.find('span.trans-type').text(capitalize("NEW"));
					fields.find('span.payment-mode').text(capitalize("MONTHLY"));
					fields.find('span.business-nature').text(capitalize(owner.business_nature));
	
					fields.find('span.owner').text(capitalize(owner.owner));
					fields.find('span.address').text(capitalize(owner.address));
					fields.find('span.contact-number').text(owner.contact_number);
	
					fields.find('span.mon').text(currencyFormat(parseFloat(owner.stall_val)));

					fields.find('input[name=assessment_id]').val(owner.assessment_id);
					fields.find('input[name=owner_id]').val(owner.owner_id);
					fields.find('input[name=buss_id]').val(owner.buss_id);

					breakdown.html('');
					$('.annualstall').show();
					document.getElementById('')
					var countss=0,amount=owner.stall_val;
					console.log(owner.stpay_id);
					for(i in owner.stall_info) {
						countss++;
						console.log(owner.stall_info);
						//var tfo = result.data.tfos[i],
						  var value = owner.stall_info[i],
							  tr = $('<tr />').appendTo(breakdown);

						var documentaryStamp = 30;
						var certification = 75;
						

						$('<td />', { text: capitalize(value.label.replace(/_/g, ' '))}).appendTo(tr);
						var date1 =  new Date(value.dues);
						
						var date2 = new Date();
						var timeDiff = date2.getTime() - date1.getTime();
						var diffDays = timeDiff / (1000*3600*24); 
					
						var dd = date2.getDate();
						var mm = date2.getMonth()+1; //January is 0!
						var yyyy = date2.getFullYear();
						if(dd < 10)
						{
							dd = '0'+ dd;
						}
						if(mm < 10)
						{
							mm = '0' + mm;
						}
						var date2 = mm+'-'+dd+'-'+yyyy;

						var dd = date1.getDate();
						var mm = date1.getMonth()+1; //January is 0!
						var yyyy = date1.getFullYear();
						if(dd < 10)
						{
							dd = '0'+ dd;
						}
						if(mm < 10)
						{
							mm = '0' + mm;
						}
						var date1 = mm+'-'+dd+'-'+yyyy;
						
						//SURCHARGE and INTEREST
						if(diffDays>1){
							
							if(countss==2 || countss==3 || countss==4){
								surcharges = parseFloat(amount)*0.25;
							}else{
								surcharges = parseFloat(amount)*0.25;
								interests = parseFloat(amount)*0.02;
							}
							
							amountt = parseFloat(amount) + parseFloat(surcharges);
				
						} else{
							surcharges = 0;
							interests = 0
							amountt = parseFloat(amount) + parseFloat(surcharges);

						}
						// console.log(amountt);
						// console.log(date1);
						//dues
						$('<td />', { text: date1}).appendTo(tr);
					
						//date paid
						
					
					
						// $('<td />', { html: '<span class="pull-left"></span>' +
						// '<span class="pull-left">&#8369;</span>' +
						// '<span class="pull-right">' + currencyFormat(parseFloat(gross)) + '</span>'}).appendTo(tr);

						$('<td />', { text: date2 }).appendTo(tr);
				
						$('<td />', { html: '<span class="pull-left"></span>' +
						'<span class="pull-left">&#8369;</span>' +
						'<span class="pull-right">' + currencyFormat(parseFloat(amount)) + '</span>'}).appendTo(tr);
						
						$('<td />', { text: currencyFormat(parseFloat(surcharges)) }).appendTo(tr);
						
						// $('<td />', { html: '<input type="text" class="form-control" id="interest" value="'+interests+'" readonly>'}).appendTo(tr);
						//surcharge
						// $('<td />', { html: '<input type="text" class="form-control" id="surcharge" value="'+currencyFormat(parseFloat(surcharges))+'" readonly>'}).appendTo(tr);
						//total amount per quarter
						$('<td />', { html: '<span class="pull-left"></span>' +
						'<strong><span class="pull-left">&#8369;</span>' +
						'<span class="pull-right">' + currencyFormat(parseFloat(amountt)) + '</span></strong>' }).appendTo(tr);
						// $('<td />', { text: "unpaid" }).appendTo(tr);
						var ow = owner.counts.toString();
						if(ow.includes(countss)!==false){
								$('<td />', { text: "paid" }).appendTo(tr);
								$('<td/>', { html: '<div class="payment-method">'+
								'<a href="' + baseurl + 'fees/print_receipt_stall/'+owner.assessment_id   +'/'+countss+'/'+ owner.buss_id +'" target = "_blank" class=" method cash btn btn-danger btn-xs method-print" disabled="disabled" data-appid = "'+owner.app_id+'" data-appid = "'+owner.asssessment_id+'"><i class="fa fa-print"></i> PRINT</a>'+							
								'</div>' }).appendTo(tr);
						}else{
							$('<td />', { text: "unpaid" }).appendTo(tr);
							$('<td/>', { html: '<div class="payment-method">'+
						'<a href="#" class=" method cash btn btn-info btn-xs method-cash" data-appid = "'+owner.app_id+'" data-count = "'+countss+'"  data-interest = "'+interests+'" data-surcharge = "'+surcharges+'" data-tfo_amount = "'+amountt+'"  '+
						'><i class="fa fa-credit-card"></i> CASH</a>'+							
						'</div>' }).appendTo(tr);
						

						}
					

					}
				
				
				} else {
	
				}

					 });
			});

			$('#form-cash-stalls').on('submit', function(e) {
				e.preventDefault();
				var form = $('#form-cash-stalls'),
					inputs = $('#form-cash-stalls').serialize();
					modal = $('#payment_ok');
		
				console.info('Saving stall payment...');
				$.post(baseurl + 'fees/api/payment/save_stall_payment', inputs, function(result) {
					if(result.error === 0) {
						//alert('success');
						console.info('Successfully saved');
						popup(
							'Transaction',
							'Payment Successfull',
							'',
							{},
							'Ok',
							'info',
							'cheers'
						);
						location.reload();

						
					
					} else {
						console.info('Failed Saving');
					}
					return false;
				}, 'json');
			});


	})(jQuery);
	