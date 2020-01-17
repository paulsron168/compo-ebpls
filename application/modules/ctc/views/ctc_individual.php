
<style>
.title{
	font-size: 10px;
}
</style>
<div id="page-wrapper">
	<div class="row">
	<h2>CTC Individual</h2> <br>

<?php echo form_open('', array('class' => 'form-horizontal sample3', 'role' => 'form','id'=>'sample2')); ?>
	<div class="modal-body">
	<table class="table table-bordered" style="width:60%;">
		<tr>
			<td colspan="2"><b>COMMUNITY TAX CERTIFICATE</b></td>
			<td style="background-color:gray;text-align:center;"><b>INDIVIDUAL</b></td>
			<td><input type="type" name="ctc_no" id="ctc_no" placeholder="CTC Number"></td>
		</tr>
		<tr>
			<td><p class="title">YEAR</p><input type="text" value="<?php echo date('Y'); ?>" name="year"></td>
			<td><p class="title">PLACE OF ISSUE(CITY/MUN/PROV)</p><input type="text" name="place_issued" value="Compostela, Cebu"></td>
			<td><p class="title">DATE ISSUED</p><input type="text" name="date_issueds" id="date_issueds" value="<?php echo date('m/d/Y');?>" readonly></td>
			<td><p class="title">TAX PAYER'S COPY</p></td>
		</tr>
		<tr>
			<td colspan="3"><p class="title">NAME</p><input type="text" name="firstname" placeholder="firstname"> <input type="text" name="middlename" placeholder="middlename"> <input type="text" name="lastname" placeholder="lastname"></td>
			<td rowspan="2"><p class="title">TIN(If any)</p><input type="text" name="tin"></td>
		</tr>
		<tr>
			<td colspan="2"><p class="title">ADDRESS</p><input type="text" name="address"></td>
			<td><p class="title">GENDER</p>
				<select name="gender">
					<option></option>
					<option value="male">Male</option>
					<option value="female">Female</option>
				</select></td>
		</tr>
		<tr>
			<td><p class="title">CITIZENSHIP</p><input type="text" name="citizenship"></td>
			<td><p class="title">ICR NO. (If an alien)</p><input type="text" name="icr"></td>
			<td><p class="title">PLACE OF BIRTH</p><input type="text" name="place_of_birth"></td>
			<td><p class="title">HEIGHT</p><input type="text" name="height"></td>
		</tr>
		<tr>
			<td colspan="2"><p class="title">CIVIL STATUS</p>
				<select name="status">
					<option></option>
					<option value="single">Single</option>
					<option value="married">Married</option>
					<option value="widowed">Widowed</option>
					<option value="divorced">Divorced</option>
				</select></td>
			<td><p class="title">DATE OF BIRTH</p><input type="text" name="date_of_birth" id="date_of_birth"></td>
			<td><p class="title">WEIGHT</p><input type="text" name="weight"></td>
		</tr>
		<tr>
			<td colspan="2">PROFESSION/OCCUPATIO/BUSINESS</td>
			<td>TAXABLE AMOUNT</td>
			<td>COMMUNITY TAX DUE</td>
		</tr>
		<tr>
			<td colspan="2">BASIC COMMUNITY TAX (P5.00) Voluntary or Exempted (P1.00)</td>
			<td></p><input type="text" name=""></td>
			<td></p><input type="text" name="basic_tax" value="5"></td>
		</tr>
		<tr>
			<td colspan="2">ADDITIONAL COMMUNITY TAX(ex not to exceed P5,000.00)</td>
			<td></p><input type="text" name=""></td>
			<td></p><input type="text" name="additional_tax" ></td>
		</tr>
		<tr>
			<td colspan="2">GROSS RECEIPTS OR EARNINGS DERIVED FROM BUSINESS DURING THE PRECEDING YEAR (P1.00 FOR EVERY P1,000.00)</td>
			<td></p><input type="text" name="gross_tax" id="gross_tax" ></td>
			<td></p><input type="text" name="earnings" id="earnings"></td>
		</tr>
		<tr>
			<td colspan="2">SALARIES OR GROSS RECEIPT OR EARNINGS DERIVED FROM EXERCISE OF PROFESSION OR PURSUIT OF ANY OCCUPATION (P1.00 FOR EVERY P1,000.00)</td>
			<td></p><input type="text" name="salary_tax" id="salary_tax"></td>
			<td></p><input type="text" name="salaries" id="salaries"></td>
		</tr>
		<tr>
			<td colspan="2">INCOME FROM REAL PROPERTY (P1.00 FOR EVERY P1,000.00)</td>
			<td></p><input type="text" name="income_tax" id="income_tax"></td>
			<td></p><input type="text" name="income" id="income"></td>
		</tr>

		<tr>
			<td colspan="4" style="text-align:center;"><?php echo form_submit(array('value' => 'SUBMIT', 'class' => 'btn btn-primary', 'id' => 'testing')); ?> <button class="btn btn-warning"> RESET </button>
			 <!--<input type="button" value="PRINT" id="print" class="btn btn-success" disabled>-->
            <!--<div class="forprint" style="display:none;">-->
                <a href="<?php echo site_url('ctc/print_ctc'); ?>" class="btn btn-success forprint" id="print" style="display:none;"> PRINT </a>
            <!--</div>-->
            <a href="<?php echo site_url('ctc/print_ctc'); ?>" class="btn btn-success forprint1" id="print" style="display:none;"> PRINT </a>
            </td>
		</tr>
	</table>
	<?php echo form_close(); ?>
	</div>
</div>


