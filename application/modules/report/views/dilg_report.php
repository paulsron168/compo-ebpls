<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('assets/js/plugins/datepicker/datepicker.css'); ?>" type="text/css" />

<style type="text/css">
	#box{
			position: absolute;
	    top: 10px;
	    width: auto;
	    height: auto;
	    border: 2px solid black;
	    /* right: -75px; */
			margin: auto;
	}

	p{
	height: 1px;
	 padding: 0 0 4 0;
	 margin:0 0 4 0;">
	}
	h5{
		font-style: italic;
	}
	th{
    font-weight: normal;
}

</style>

<div id="page-wrapper">
	<div class="row">
	    <div class="col-lg-12">
	    	<br>
	    	<div id="box">
	    		<div class="panel panel-success">
	    		<!-- <div class="panel-heading"><h1>DILG REPORT</h1></div> -->
	    		<div class="panel-body">
	    			<div class="portlet">
	    				<div class="portlet-header">
	    					<div class="text-center">
	    						<p style="font-size:12px">Nationwide BPLS Streamlining Program<br>
	    						<b style="font-size:14px">LGU Quarterly Progress Report</b></p>
		    					<br><p style="padding-top:8px; padding-bottom:30px;">Period Covered: <?php echo $details['quarter']. ' '.$details['year']?></p>
	    					</div>
	    					<div class="row">
		    					<div class="col-sm-9">
		    						Name of LGU: Compostela Province: Cebu Region: VII  &nbsp;Date accomplished:

		    					</div>
		    					<div class="col-sm-3">
		    						<input type="text" class="form-control date_accomp" required="" name="date_accomp" id="date_accomplished" value="">
		    					</div>
	    					</div>
	    				</div>
	    				<div class="portlet-content" id=compliance>
	  							<div class="portlet-header">
	    					<h5 style="margin-bottom: 2px;font-weight: bold">I. Compliance to BPLS Standards</h5>
	    				</div>

						<table style="margin-bottom: 0px;" id="business_report_dti" class="table table-striped table-bordered table-hover" >
							<thead>
								<tr>
									<th style="font-size:11px" rowspan="2"><p align="center" >Parameter</p></th>
									<th style="font-size:11px" colspan="2" ><p align="center" >New Business Permit Application</p></th>
									<th style="font-size:11px" colspan="2"><p align="center">Business Permit Renewal</p></th>
								</tr>
								<tr>
									<td style="font-size:11px; padding: 3 0 5 0 ;" rowspan="1"><p align="center">Standard</p></td>
									<td style="font-size:11px; padding: 3 0 5 0 ;" rowspan="1"  ><p align="center" >Actual</p></td>
									<td style="font-size:11px; padding: 3 0 5 0 ;"  ><p align="center" >Standard</p></td>
									<td style="font-size:11px; padding: 3 0 5 0 ;"   ><p align="center" >Actual</p></td>
								</tr>
								<tr>
									<td style="font-size:9px; padding: 3 0 5 0 ;"align="left" >A. Use of Unified Form</td>
									<td style="font-size:9px; padding: 3 0 5 0 ;" rowspan="1" >
										<p align="center"><input name="form" id="form" value="1" size="5"/></p>
									</td>
									<td style="font-size:9px; padding: 3 0 5 0 ;" rowspan="1" >
										<p align="center"><input name="form" id="form" value="1" size="5"/></p>
									</td>
									<td style="font-size:9px; padding: 3 0 5 0 ;" rowspan="1" >
										<p align="center"><input name="form" id="form" value="1" size="5"/></p>
									</td>
									<td style="font-size:9px; padding: 3 0 5 0 ;" rowspan="1" >
										<p align="center"><input name="form" id="form" value="1" size="5"/></p>
									</td>
								</tr>
								<tr>
									<td style="font-size:9px; padding: 3 0 5 0 ;"  align="left" >B. Number of Steps</td>
									<td style="font-size:9px; padding: 3 0 5 0 ;x" rowspan="1" align="center" ><p align="center"><input name="form" id="steps" value="2" size="5"/> </p></td>
									<td style="font-size:9px; padding: 3 0 5 0 ;" rowspan="1" align="center" ><p align="center"><input name="form" id="steps" value="2" size="5"/></p></td>
									<td style="font-size:9px; padding: 3 0 5 0 ;" rowspan="1" align="center" ><p align="center"><input name="form" id="steps" value="2" size="5"/></p></td>
									<td style="font-size:9px; padding: 3 0 5 0 ;" rowspan="1" align="center" ><p align="center"><input name="form" id="steps" value="2" size="5"/></p></td>
								</tr>
								<tr>
									<td style="font-size:9px; padding: 3 0 5 0 ;"  align="left" >C. Number of Signatories</td>
									<td style="font-size:9px; padding: 3 0 5 0 ;" rowspan="1" align="center" ><p align="center"><input name="form" id="Signatories" value="3" size="5"/></p></td>
									<td style="font-size:9px; padding: 3 0 5 0 ;" rowspan="1" align="center" ><p align="center"><input name="form" id="Signatories" value="3" size="5"/></p></td>
									<td style="font-size:9px; padding: 3 0 5 0 ;" rowspan="1" align="center" ><p align="center"><input name="form" id="Signatories" value="3" size="5"/></p></td>
									<td style="font-size:9px; padding: 3 0 5 0 ;" rowspan="1" align="center" ><p align="center"><input name="form" id="Signatories" value="3" size="5"/></p></td>
								</tr>
								<tr>
									<td style="font-size:9px ; padding: 3 0 5 0 ;"  align="left" >D. Processing Time(in days)</td>
									<td style="font-size:9px ; padding: 3 0 5 0 ;" rowspan="1" align="center" ><p align="center"><input name="form" id="terms" value="4" size="5"/></p></td>
									<td style="font-size:9px ; padding: 3 0 5 0 ;" rowspan="1" align="center" ><p align="center"><input name="form" id="terms" value="4" size="5"/></p></td>
									<td style="font-size:9px ; padding: 3 0 5 0 ;" rowspan="1" align="center" ><p align="center"><input name="form" id="terms" value="4" size="5"/></p></td>
									<td style="font-size:9px ; padding: 3 0 5 0 ;" rowspan="1" align="center" ><p align="center"><input name="form" id="terms" value="4" size="5"/></p></td>
								</tr>
								<tr>
									<td style="font-size:11px; font-style: italic;" colspan="5"><p align="left">Remarks: If non-compliant to any of the above standards, please cite reasons</p></td>
								</tr>
						</table>
  						<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
							<tr>
								<td style="font-size:11px;"><p> Type of legal Instrument<br>issued in support of<br> BPLS streamlining:</p></td>
								<td style="font-size:11px;"> Executive Order Number:<br>
										Ordinance Number:<br>
										Council Resolution Number:<br>
										No instrument Issued:</td>
										<td>
											<input type="checkbox" name="bpls" value="Executive"><br>
											<input type="checkbox" name="bpls" value="ordinance"><br>
											<input type="checkbox" name="bpls" value="council"><br>
											<input type="checkbox" name="bpls" value="NoInstrument">
										</td>
										<td style="font-size:11px;">
											Date Issued:<br>
											Date Issued:____________<br>
											Date Issued:____________
										</td>

							</tr>

							<tr>
								<td colspan="5" style="font-size:11px;">
											<p style="font-style: italic;">Remarks: If no legal instrument was issued, please cite reason for non-issuance</p>
									</td>
							</tr>
							</table>


    				</div> <!--end of portlet-content id="compliance"-->

    					<div class="portlet-content">
	  						<div class="portlet-header">
	    					<b>II. Number of Registered Business Establishments</b>
	    						*refers only to Single Proprietorship owned by women
	    					</div>
							<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px;">
    							<tr>
	    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p align="center" style="height: 18px">Category</p></td>
	    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p align="center" >Total Current <br>Quarter</p></td>
	    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p align="center" >% Owner by <br>Women(SP)*</p></td>
	    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p align="center" >Cumulative Total <br>for Current Year</p></td>
	    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p align="center" >% Owned By <br>Women</p></td>
    							</tr>
    							<tr>
	    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p>A. New</p></td>
	    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p align = "center"><b><?php echo $details['total_for_current_quarter_new']?></p></td>
	    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p align = "center"><b><?php echo $details['owned_by_woman_sp_new'];?> %</p></td>
		    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p align = "center"><b><?php echo $details['percent_owned_by_woman_new'];?></p></td>
	    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p align = "center"><b><?php echo $details['percent_owned_by_woman_new'];?> %</p></td>
    							</tr>
    							<tr>
	    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p>B. Renewal</p></td>
	    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p align = "center"><b><?php echo $details['total_for_current_quarter_renew'];?></p></td>
	    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p align = "center"><b><?php echo $details['owned_by_woman_sp_renew'];?> %</p></td>
	    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p align = "center"><b><?php echo $details['cumulative_total_for_current_year_renew'];?></p></td>
	    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p align = "center"><b><?php echo $details['percent_owned_by_woman_renew'];?> %</p></td>
    							</tr>
    							<tr>
	    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p>C. Closed</p></td>
	    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p></p></td>
	    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p></p></td>
	    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p></p></td>
	    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p></p></td>
    							</tr>
	    						</table>
	    					</div> <!--end of portlet-content id="Establihsments"-->

	    					<div class="portlet-content" id="Revenue">
		  						<div class="portlet-header">
		    						<h5 style="margin-top: 2px; margin-bottom: 2px; font-weight: bold">III. Revenue Generated From New Business Registered and Business Renewals, in pesos</h5>
		    					</div>

								<table class="table table-striped table-bordered table-hover" style="margin-bottom: 2px;">
	    							<tr>
		    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p align="center" >Item</p></td>
		    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p align="center" >Total for current quarter</p></td>
		    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p align="center" >cumulative total for current year</p></td>
	    							</tr>
	    							<tr>
		    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p>A. Mayor's Permit Fees</p></td>
		    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p>&#8369; <?php echo number_format($details['mayors_permit'],2);?></p></td>
		    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p>&#8369; <?php echo number_format($details['cummulative_mayors_permit'],2);?></p></td>
	    							</tr>
	    							<tr>
		    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p>B. Regulatory fees</p></td>
		    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p>&#8369; <?php echo number_format($details['fees'],2);?></p></td>
		    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p>&#8369; <?php echo number_format($details['cummulative_business_tax'],2);?></p></td>
	    							</tr>
	    							<tr>
		    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p>C. Business Taxes</p></td>
		    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p>&#8369; <?php echo number_format($details['business_tax'],2)?></p></td>
		    							<td style="font-size:11px; padding: 3 0 5 0 ;"><p>&#8369; <?php echo number_format($details['cummulative_fees'],2)?></p></td>
	    							</tr>
	    						</table>
	    					</div> <!--end of portlet-content id="Revenue"-->

	    					<div class="portlet-content" id="External">
		  						<div class="portlet-header">
		    						<h5 style="margin-top: 2px; margin-bottom: 2px; font-weight: bold">IV. External Assistance Related to BPLS Streamlining Received this Quarter</h5>
		    					</div>
		    					<table class="table table-striped table-bordered table-hover" style="margin-bottom: 2px;">
		    							<tr>
		    								<td style="width: 215px; font-size:11px; padding: 3 0 5 0 ; "><p align="center" >External Assistance Received This Quarter</p></td>
		    								<td style="width: 180px; font-size:11px; padding: 3 0 5 0 ;"><p align="center" >Source Provider</p></td>
		    							</tr>
		    							<tr>
		    								<td style="font-size:11px; height: 22px; padding: 0 0 0 0 ;"><p >A. <input style="border: 0px;" name="form" size="50"/></p></td>
		    								<td style="font-size:11px; height: 22px; padding: 0 0 0 0 ;"><p >A. <input style="border: 0px;" name="form" size="50"/></p></td>
		    							</tr>
		    							<tr>
		    								<td style="font-size:11px; height: 22px; padding: 0 0 0 0 ;"> <p >B. <input style="border: 0px;" name="form" size="50"/></p></td>
		    								<td style="font-size:11px; height: 22px; padding: 0 0 0 0 ;"><p >B. <input style="border: 0px;" name="form" size="50"/></p></td>
		    							</tr>
		    							<tr>
		    								<td style="font-size:11px; height: 22px; padding: 3 0 5 0 ;"> <p >C. <input style="border: 0px;" name="form" size="50"/></p></td>
		    								<td style="font-size:11px; height: 22px; padding: 3 0 5 0 ;"> <p >C. <input style="border: 0px;" name="form" size="50"/></p></td>
		    							</tr>
		    					</table>

	    					</div> <!--end of portlet-content id="External"-->

	    					<div class="portlet-content" id="Problems">
		  						<div class="portlet-header">
		    						<h5 style="margin-top: 2px; margin-bottom: 2px; font-weight: bold">V. Problems and Issues Encountered this Quarter</h5>
		    					</div>
		    						<table class="table table-striped table-bordered table-hover">
		    							<tr>
		    								<td style="width: 215px; font-size:11px; padding: 3 0 5 0 ;"><p align="center" >Problems/Issues Encountered this Quarter</p></td>
		    								<td style="width: 180px; font-size:11px; padding: 3 0 5 0 ;"><p align="center" >Actions Taken</p></td>
		    							</tr>
		    							<tr>
		    								<td style="font-size:11px; height: 22px; padding: 0 0 0 0 ;"><p >A. <input style="border: 0px;" name="form" size="50"/></p></td>
		    								<td style="font-size:11px; height: 22px; padding: 0 0 0 0 ;"><p >A. <input style="border: 0px;" name="form" size="50"/></p></td>
		    							</tr>
		    							<tr>
		    								<td style="font-size:11px; height: 22px;  padding: 3 0 5 0 ;"><p >B. <input style="border: 0px;" name="form" size="50"/></p></td>
		    								<td style="font-size:11px; height: 22px; padding: 3 0 5 0 ;"><p >B. <input style="border: 0px;" name="form" size="50"/></p></td>
		    							</tr>
		    							<tr>
		    								<td style="font-size:11px; height: 22px; padding: 3 0 5 0 ;"><p>C. <input style="border: 0px;" name="form" size="50"/></p></td>
		    								<td style="font-size:11px; height: 22px; padding: 3 0 5 0 ;	"><p>C. <input style="border: 0px;" name="form" size="50"/></p></td>
		    							</tr>
		    						</table>
	    					</div> <!--end of portlet-content id="Problems"-->
	    			</div><!--end of class="portlet"-->
	    		</div>
	    	</div>
	    		<div class="panel-footer"><br>
	    		</div>
	    	</div>
	    </div>
	</div>

</div>
<script src="<?php echo base_url('assets/js/libs/jquery.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/datepicker/bootstrap-datepicker.js') ?>"></script>
