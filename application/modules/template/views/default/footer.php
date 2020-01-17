</div> <!-- #wrapper -->

<?php if(!empty($page) && $page != 'login') { ?>
	<footer id="footer">
		<ul class="nav pull-right">
			<li>
				Copyright &copy; <?php echo date('Y');?>, JCIT | All Rights Reserved.
			</li>
		</ul>
	</footer>
<?php } ?>

<!-- Popup Modal -->
<div id="popup-notification" class="modal modal-styled fade">
	<div class="modal-dialog width-600-important">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title"></h3>
			</div>

				<div class="modal-body">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="notification-image-left">
									<img class="margin-lr-10 notif" src="" />
								</div>
								<h4 class="message-header"></h4>
								<p class="message-body"></p>
							</div>
						</div>
					</div> <!-- End of Container -->
				</div> <!-- End of Modal Body -->

				<div class="modal-footer">
					<div class="action-block">
						<div class="submit-btn inline-block actions">
							<img class="loader margin-lr-10" style="display: none;" src="<?php echo base_url('assets/img/ajax-loader.gif'); ?>">
							<!--a href="javascript:void(0);" class="btn btn-primary close-modal"></a-->
							<a href="javascript:void(0);" class="btn btn-primary actions"></a>
						</div>
					</div>
				</div>

				<input type="hidden" name="field" value="" />
				<input type="hidden" name="type" value="" />

		</div> <!-- End of Modal Content -->
	</div> <!-- End of Modal Dialog -->
</div> <!-- End of New Application -->


<script src="<?php echo base_url('assets/js/libs/jquery.js'); ?>"></script>
<!--script src="<?php echo base_url('assets/js/libs/jquery-1.12.3.js'); ?>"></script-->
<script src="<?php echo base_url('assets/js/libs/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/libs/dataTables.jqueryui.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/libs/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/libs/sb-admin-2.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/libs/jqueryui.js') ?>"></script>
<script src="<?php echo base_url('assets/js/libs/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/fileupload/jasny-bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/libs/metisMenu.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/libs/jquery-idleTimeout.js') ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/datepicker/bootstrap-datepicker.js') ?>"></script>




<!--added 112614 -->
<!-- <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> -->

<script type="text/javascript">
$(document).ready(function() {
    $('table.thistable').DataTable();

} );
//jQuery.noConflict()

$("#date_applied,#payment_date,#date_accomp,#registered_date,#date_filed,#date_terminated,#cancel_date,#date_,#date_end,#date_accomplished,#cda_expiration,#sec_expiration,#dti_expiration,#date_of_birth,#date_issued,#date_of_birth").datepicker({"autoclose": true});
</script>
<!-- Common Helper -->
<script type="text/javascript">
	/* -----------------
	 * Helper functions
	 * ----------------- */
	function show_message(elem, message, title, type) {
		elem.html('<div class="alert alert-' + type + ' fade in" style="margin: 20px;">' +
			'<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>' +
			'<p><strong>' + title + '</strong> ' + message + '</p></div>');
	}

	function success(elem, message, title, type) {
		elem.html('<div class="alert alert-' + type + ' fade in" style="margin: 20px;">' +
			'<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>' +
			'<p><strong>' + title + '</strong> ' + message + '</p></div>');
	}

	function popup(title, message1, message2, fieldID, buttonlabel, type, icon) {
		$('#popup-notification').find('.modal-title').text(title);
		$('#popup-notification').find('img.notif').attr('src', baseurl + 'assets/img/icon-' + icon + '.gif');
		$('#popup-notification').find('h4.message-header').text(message1);
		$('#popup-notification').find('p.message-body').text(message2);

		for(i in fieldID) {
			$('<input />', {
				type: 'hidden',
				name: i,
				value: fieldID[i]
			}).appendTo('#popup-notification');
			// $('#popup-notification').find('input[name="field"]').val(fieldID);
		}
		$('#popup-notification').find('input[name="type"]').val(type);

		$('#popup-notification').find('img.loader').fadeOut();

		$('#popup-notification').find('.actions a').text(buttonlabel);
		$('#popup-notification').modal('show');
	}

	function capitalize(str) {
		var words = str.split(" ");
		var arr = Array();

		if(str!=null){

			for (i in words) {
				temp = words[i].toLowerCase();
				temp = temp.charAt(0).toUpperCase() + temp.substring(1);
				arr.push(temp);
			}
			return arr.join(" ");
		} else {
			return str;
		}
	}

	function incrementor(elem, value) {
		$({ number: 20 }).animate({ number: value }, {
			duration: 1000,
			easing: 'swing',
			step: function() {
				$(elem).text(currencyFormat(parseFloat(Math.ceil(this.number))));
				// $(elem).text(currencyFormat(parseFloat(Math.round(this.number))));
			}
		});
		// $(elem).text(value);
	}

	function currencyFormat (num) {
	    return num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
	}

	function initials(str) {
		var matches = str.match(/\b(\w)/g);
		return matches.join('');
	}

	function array_chunk(input, size, preserve_keys) {
	  //  discuss at: http://phpjs.org/functions/array_chunk/
	  // original by: Carlos R. L. Rodrigues (http://www.jsfromhell.com)
	  // improved by: Brett Zamir (http://brett-zamir.me)
	  //        note: Important note: Per the ECMAScript specification, objects may not always iterate in a predictable order
	  //   example 1: array_chunk(['Kevin', 'van', 'Zonneveld'], 2);
	  //   returns 1: [['Kevin', 'van'], ['Zonneveld']]
	  //   example 2: array_chunk(['Kevin', 'van', 'Zonneveld'], 2, true);
	  //   returns 2: [{0:'Kevin', 1:'van'}, {2: 'Zonneveld'}]
	  //   example 3: array_chunk({1:'Kevin', 2:'van', 3:'Zonneveld'}, 2);
	  //   returns 3: [['Kevin', 'van'], ['Zonneveld']]
	  //   example 4: array_chunk({1:'Kevin', 2:'van', 3:'Zonneveld'}, 2, true);
	  //   returns 4: [{1: 'Kevin', 2: 'van'}, {3: 'Zonneveld'}]

	  var x, p = '',
	    i = 0,
	    c = -1,
	    l = input.length || 0,
	    n = [];

	  if (size < 1) {
	    return null;
	  }

	  if (Object.prototype.toString.call(input) === '[object Array]') {
	    if (preserve_keys) {
	      while (i < l) {
	        (x = i % size) ? n[c][i] = input[i] : n[++c] = {}, n[c][i] = input[i];
	        i++;
	      }
	    } else {
	      while (i < l) {
	        (x = i % size) ? n[c][x] = input[i] : n[++c] = [input[i]];
	        i++;
	      }
	    }
	  } else {
	    if (preserve_keys) {
	      for (p in input) {
	        if (input.hasOwnProperty(p)) {
	          (x = i % size) ? n[c][p] = input[p] : n[++c] = {}, n[c][p] = input[p];
	          i++;
	        }
	      }
	    } else {
	      for (p in input) {
	        if (input.hasOwnProperty(p)) {
	          (x = i % size) ? n[c][x] = input[p] : n[++c] = [input[p]];
	          i++;
	        }
	      }
	    }
	  }
	  return n;
	}

	function extract(variable) {
		for (var key in variable) {
			window['$' + key] = parseFloat(variable[key]);
		}
	}

	var trim = (function () {
	    "use strict";

	    function escapeRegex(string) {
	        return string.replace(/[\[\](){}?*+\^$\\.|\-]/g, "\\$&");
	    }

	    return function trim(str, characters, flags) {
	        flags = flags || "g";
	        if (typeof str !== "string" || typeof characters !== "string" || typeof flags !== "string") {
	            throw new TypeError("argument must be string");
	        }

	        if (!/^[gi]*$/.test(flags)) {
	            throw new TypeError("Invalid flags supplied '" + flags.match(new RegExp("[^gi]*")) + "'");
	        }

	        characters = escapeRegex(characters);

	        return str.replace(new RegExp("^[" + characters + "]+|[" + characters + "]+$", flags), '');
	    };
	}());

</script>

<script type="text/javascript">

function PrintAssess(id) {
           var divToPrint = document.getElementById(id);
           var popupWin = window.open('', '_blank', 'width=700,height=800');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()" style="background-color:gray!important;font-size:8px;">' + divToPrint.innerHTML + '</html>');
		   //popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
           popupWin.document.close();
 }

 function PrintTerminate(id) {
           var divToPrint = document.getElementById(id);
           var popupWin = window.open('', '_blank', 'width=1100,height=800');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
		   //popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
           popupWin.document.close();
 }
</script>

<script type="text/javascript">

function PrintDivDti() {
            var divToPrint = document.getElementById('business_report_dti');
		   var htmlToPrint = '' +
					'<style type="text/css">' +
					'table th, table td {' +
					'border:1px solid #ddd;' +
					'padding;0.5em;' +
					'}' +
					'</style>';
			htmlToPrint += divToPrint.outerHTML;
			newWin = window.open("");
			newWin.document.write(htmlToPrint);
			newWin.print();
			newWin.close();
                }
</script>
<script type="text/javascript">
function PrintDivBir() {
            var divToPrint = document.getElementById('business_report');
		   var htmlToPrint = '' +
					'<style type="text/css">' +
					'table th, table td {' +
					'border:1px solid #000;' +
					'padding;0.5em;' +
					'}' +
					'</style>';
			htmlToPrint += divToPrint.outerHTML;
			newWin = window.open("");
			newWin.document.write(htmlToPrint);
			newWin.print();
			newWin.close();
                }
</script>
	<script src="<?php echo base_url('assets/js/plugins/icheck/jquery.icheck.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/plugins/select2/select2.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/plugins/tableCheckable/jquery.tableCheckable.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/libs/jquery-idleTimeout.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/core.js'); ?>"></script>


	<script src="<?php echo base_url('assets/js/libs/raphael-2.1.2.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/plugins/morris/morris.min.js'); ?>"></script>

	<script src="<?php echo base_url('assets/js/demos/charts/morris/area.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/demos/charts/morris/donut.js'); ?>"></script>

	<script src="<?php echo base_url('assets/js/plugins/sparkline/jquery.sparkline.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/plugins/fullcalendar/fullcalendar.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/demos/calendar.js'); ?>"></script>

	<script src="<?php echo base_url('assets/js/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/plugins/datatables/DT_bootstrap.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/demos/dashboard.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/libs/jquery.printElement.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/plugins/fileupload/bootstrap-fileupload.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/app/ctc.js'); ?>"></script>
	<?php if(!empty($script)){ ?>
		<script type="text/javascript" src="<?php echo base_url('assets/js/pages/'.$script.'.js'); ?>"></script>
	<?php } ?>


</body>
</html>
