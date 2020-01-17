
<style>
.title{
	font-size: 10px;
}
</style>
<div id="new-corporate" class="modal modal-styled fade in">
<div class="modal-dialog" style="width:820px;">
		<div class="modal-content">

		<div class="modal-header">
    		<h2>CTC Corporate</h2>
        </div>


		<div id="page-wrapper" style = 'margin:0px;'>
	<div class="row">
	<br>

<?php echo form_open('', array('class' => 'form-horizontal sample5', 'role' => 'form','id'=>'corporate2')); ?>
	<div class="modal-body">
	<table class="table table-bordered" style="width:60%;">
		<tr>
			<td colspan="2"><b>COMMUNITY TAX CERTIFICATE</b></td>
			<td style="background-color:gray;text-align:center;"><b>CORPORATE</b></td>
			<td></td>
		</tr>
		<tr>
			<td><p class="title">YEAR</p><input type="text" value="<?php echo date('Y'); ?>" name="year"></td>
			<td><p class="title">PLACE OF ISSUE(CITY/MUN/PROV)</p><input type="text" name="place_issued"  value="Compostela, Cebu"></td>
			<td><p class="title">DATE ISSUED</p><input type="text" name="date_issued" id="date_issued" value="<?php echo date('m/d/Y');?>" readonly></td>
			<td><p class="title">TAX PAYER'S COPY</p></td>
		</tr>
		<tr>
			<td colspan="3"><p class="title">NAME</p><input style = 'width: 100%' type="text" name="companyname" placeholder="Companyname"> </td>
			<td><p class="title">TIN(If any)</p><input type="text" name="tin"></td>
		</tr>
		<tr>
			<td colspan="3"><p class="title">ADDRESS</p>
			<select style ='width:100%;' name = 'address'>
                        <option></option>
                   	    <?php foreach ($ctc as $c){ ?>
							<option value = "<?php echo $c->brgy  ?>"><?php echo $c->brgy.', Compostela, Cebu'; ?></option>
                        <?php } ?>
                       </select>
			</td>
			
				<td rowspan='2'><p class="title">DATE OF REG / INCORPORATION</p><input type="text" name="date_of_reg" id="date_of_birth"></td>
		</tr>
		<tr>
		<td colspan = '2'><p class="title">PLACE OF INCORPORATION</p><input style = 'width:100%;' type="text" name="place_of_inc"></td>
		<td colspan="1"><p class="title">KIND OF ORGANIZATION</p>
				<select name="organization_type">
					<option> </option>
					<option value="corporation">corporation</option>
					<option value="association">association</option>
					<option value="partnership">partnership</option>
				</select></td>
		
		</tr>

		<tr>
		<td colspan = '2'><p class="title">KIND/NATURE OF BUSINESS</p><input style = 'width:100%;' type="text" name="nature_of_business"></td>
			<td>TAXABLE AMOUNT</td>
			<td>COMMUNITY TAX DUE</td>
		</tr>
		<tr>
			<td colspan="2">BASIC COMMUNITY TAX (P500.00)</td>
			<td></td>
			<td></p><input type="text" name="basic_tax" value = '500'></td>
		</tr>
		<tr>
			<td colspan="2">ADDITIONAL COMMUNITY TAX(tax not to exceed P10,000.00)</td>
			
			<td colspan ='2'></td>
		</tr>
		<tr>
		<td colspan="2">ASSESSED VALUE OF REAL PROPERTY OWNED IN THE PHILIPPINES (P2.000 for every P5000.00)</td>
    	<td></p><input type="text" name="assessed_tax_amt" id="assessed_tax_amt" ></td>
        <td></p><input type="text" name="assessed_tax_due" id="assessed_tax_due"></td>
		</tr>
		<tr>
			<td colspan="2">GROSS RECIEPTS, INCLUDING DIVIDENS / EARNINGS DERIVED FROM BUSINESS IN THE PHIL., DURING THE PRECEDING YEAR (P2.00 for every P5000 .00)</td>
			<td></p><input type="text" name="gross_tax_amt" id="gross_tax_amt" ></td>
        <td></p><input type="text" name="gross_tax_due" id="gross_tax_due"></td>
		</tr>
		


		<tr>
			<td colspan="4" style="text-align:center;"><?php echo form_submit(array('value' => 'submit', 'class' => 'btn btn-primary', 'id' => 'testing')); ?>  
			<span class="btn btn-warning reset_corp"> CANCEL </span>
            <!--<input type="button" value="PRINT" id="print" class="btn btn-success" disabled>-->
            <!--<div class="forprint" style="display:none;">-->
             
            </td>
		</tr>
	</table>
	<?php echo form_close(); ?>
	</div>
</div>
	</div> <!-- End of Modal Content -->
</div> <!-- End of Modal Dialog -->
</div> <!-- End of New Application -->

