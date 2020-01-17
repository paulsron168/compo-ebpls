<style>
.title{
	font-size: 10px;
}
</style>
<div id="page-wrapper">
	<div class="row">
	<h2>CTC Individual</h2> <br>

<?php echo form_open('', array('class' => 'form-horizontal ', 'role' => 'form','id'=>'add_users_form')); ?>
	<table class="table table-bordered" style="width:60%;text-align:center;">
		<tr>
			<td colspan="2">COMMUNITY TAX CERTIFICATE</td>
			<td style="background-color:gray;">INDIVIDUAL</td>
			<td colspan="2"></td>
		</tr>
		<tr>
			<td><p class="title">YEAR</p><input type="text"></td>
			<td><p class="title">PLACE OF ISSUE(CITY/MUN/PROV)</p><input type="text"></td>
			<td><p class="title">DATE ISSUED</p><input type="text"></td>
			<td><p class="title">TAX PAYER'S COPY</p><input type="text"></td>
		</tr>
		<tr>
			<td colspan="3"><p class="title">NAME</p><input type="text"></td>
			<td rowspan="2"><p class="title">asd</p><input type="text"></td>
		</tr>
		<tr>
			<td colspan="2"><p class="title">ADDRESS</p><input type="text"></td>
			<td><p class="title">TAXPAYER'S COPY</p><input type="text"></td>
		</tr>
		<tr>
			<td><p class="title">CITIZENSHIP</p><input type="text"></td>
			<td><p class="title">ICR NO. (If an alien)</p><input type="text"></td>
			<td><p class="title">PLACE OF BIRTH</p><input type="text"></td>
			<td><p class="title">HEIGHT</p><input type="text"></td>
		</tr>
		<tr>
			<td colspan="2"><p class="title">CIVIL STATUS</p><input type="text"></td>
			<td><p class="title">DATE OF BIRTH</p><input type="text"></td>
			<td><p class="title">WEIGHT</p><input type="text"></td>
		</tr>
		<tr>
			<td><?php echo form_submit(array('value' => 'Save', 'class' => 'btn btn-primary')); ?></td>
		</tr>
	</table>
<?php echo form_close(); ?>
	</div>
</div>
