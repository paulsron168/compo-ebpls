<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title></title>
</head>
<body>

	<table>
		<tr>
			<td>Permit No.</td>
			<td><?php echo $pre_print->permit_number?></td>
			<td>&nbsp;</td>
			<td>Plate No.</td>
			<td></td>
		</tr>
		<tr>
			<td>Status:</td>
			<td><?php echo $pre_print->application_status ?></td>
		</tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr>
			<td><b>Name of Owner/Operator</b></td>
			<td><?php echo ($pre_print->permitee=="N/A" ? $pre_print->firstname . ' '.$pre_print->middlename.' '.$pre_print->lastname : $pre_print->permitee)?></td>
		</tr>
		<tr>
			<td><b>Business Name:</b></td>
			<td><?php echo $pre_print->business_name;?></td>
		</tr>
		<tr>
			<td><b>Location of Business:</b></td>
			<td><?php echo $pre_print->bldg_name.' '.$pre_print->street_address.' ' .$pre_print->bbrgy.' , '.'City of Talisay, Cebu'?></td>
		</tr>
		<tr>
			<td><b>Specific business or trade activity being permitted:</b></td>
			<td><?php echo wordwrap($pre_print->business_nature,60,'<br>')?></td>
		</tr>
	</table>
</body>
</html>