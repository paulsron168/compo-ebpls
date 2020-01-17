<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('assets/js/plugins/datepicker/datepicker.css'); ?>" type="text/css" />

<style type="text/css">
  .btaxverticaltext {
    transform: rotate(-90deg);
    transform-origin: left;, top;
    -ms-transform: rotate(-90deg);
    -ms-transform-origin:left, top;
    -webkit-transform: rotate(-90deg);
    -webkit-transform-origin:left, top;

    position: absolute; bottom: 0%; left: 0%;
  }
  #for_p{
    font-size:10px; 
    padding:10 10 10 10; 
    margin:20 20 20 20; 
    width:20px;  
    
    transform: rotate(-90deg); 
    transform-origin: 60%  20%; 
    -ms-transform: rotate(-90deg); 
    -ms-transform-origin: 60%  20%; 
    -webkit-transform: rotate(-90deg); 
    -webkit-transform-origin: 150%  131% 2px;                     
  }
</style>



<div id="page-wrapper">
	<div class="row">
	    <div class="col-lg-12">
	    	<br>
	    	<div class="panel panel-success">
          	<div class="panel-body">
    				<?php echo form_open('', array(
						'class' => 'form-horizontal',
						'id' => 'diyreport',
						'role' => 'form'
					)); ?>
		    	<div class="portlet">
	            <div id="blgf-leftside" class="verticaltext">BUREAU OF LOCAL GOVERNMENT FINANCE</div>	    				
	            <div class="portlet-header" style="margin-left: 40px"> 
					<p style="line-height: 100%" >LGU:
					<br>RECORD OF GENERAL COLLECTION
					<br> Period Covered:<?php echo $details['quarter'] . ' to '.$details['quarter1'];?></p>
				</div>

                <div id=businesstax  style="margin-left: 40px;overflow-x:auto;"> 
                  	<table id="businesstaxtable" class="table table-striped table-bordered table-hover" style="width:100%;height:100%">
                    	<thead>                      
	                  	<tr>
		                  <th style="font-size:9px"  align="center" >Date</th>
		                  <th style="font-size:9px"  align="center">O.R No.</th>
		                  <th style="font-size:9px"  align="center">Name of Taxpayer</th>
		                  <th style="font-size:9px; text-align:center;" colspan="17" align="center">Tax on Business</th>                  
	                  	</tr>
                  		<tr>
		                    <th  style="font-size:9px; padding: 0px;" colspan="3" width="5" height="5" >account code</th>
		                    <td  style="font-size:9px"><p align="center" id="for_p">Amusement Tax</p></td>  
		                    <td  style="font-size:9px">Manufacturers Assemblers, etc.</td> 
		                    <td  style="font-size:9px">Wholesalers, Distributors, etc.</td> 
		                    <td  style="font-size:9px">Exporter on Manufacturers Dealers or Retailers of Essential Commmodities</td>
		                    <td  style="font-size:9px"><p align="center" id="for_p">Retailers</p></td>
		                    <td  style="font-size:9px">Contractors and other independent Contractors</td>
		                    <td  style="font-size:9px">bank and other financial institutions</td>
		                    <td  style="font-size:9px"><p align="center" id="for_p">Peddlers</p></td>
		                    <td  style="font-size:9px">Tax on Amusement place</td>
		                    <td  style="font-size:9px">Printing and Publication Tax</td>
		                    <td  style="font-size:9px">Other Business tax canteens,Restaurant, Refreshment,food Caterers,etc.(6 10-10)</td>
		                    <td  style="font-size:9px">Other Business Tax</td>
		                    <td  style="font-size:9px">Franchise Tax</td>
		                    <td  style="font-size:9px">Tax on delivery trucks and vans</td>
		                    <td  style="font-size:9px">Tax on gravel & sand & other quary Resources(Net share of the City)</td>
		                    <td  style="font-size:9px">Tax on gravel & sand & other quary Resources(Share of Barangay)</td>
		                    <td  style="font-size:9px">Fines and Penalties Buiness Tax</td>
                  		</tr>                
		                <tr>
							<td colspan="3" style="font-size:9px; font-weight:bold; line-height: 1px" >income target</td>
							<td> </td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
		                </tr>
		                 <tr>
		                  <td colspan="7" style="font-size:9px; font-weight:bold; line-height: 1px">CUMULATIVE TOTAL as of last quarter</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
		                </tr>
		                <tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
		                </tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
		                </tr>
		 				<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
		                </tr>
		 				<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td> 
		                </tr>
		 				<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
		                </tr>
		 				<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
		                </tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td> 
		                </tr>
		 				<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td> 
		                </tr>
		 				<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
		                </tr>
		 				<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
		                </tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
		                </tr>
		 				<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
		                </tr>
		 				<tr>                  
							<td colspan="3" style="font-size:9px; font-weight:bold; line-height: 1px">Total This Quarter</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
		                </tr>
		 				<tr>                  
							<td colspan="3" style="font-size:9px;font-weight:bold;line-height: 1px">Cumulative total to Date</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
		                </tr>
                    </thead>
            	</table>
            </div><!--end of class="businesstax"-->
</div><!--end of class="portlet"-->

	    		</div><!--end of class="tbody"-->
	    		<div class="panel-footer"><br>
	    		</div>
	    	</div>
	    </div>
	</div>
	
		<div class="row">
			 <div class="col-lg-12">
		    	<br>
		    	<div class="panel panel-sucess">1
		    		<div class="panel-heading">2</div>
		    		<div class="panel-body">3
		    			<div class="portlet-header"></div>
		    			<div class="portlet-content"> 

		    				<table id="diy-report" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline thistable"
								data-display-rows="10"
								data-info="true"
								data-search="true"
								data-length-change="true"
								data-paginate="true"
							>
							<?php ?>
						</table>
		    			</div>
		    		</div>
		    	</div>
		    </div>
	</div>
</div>
