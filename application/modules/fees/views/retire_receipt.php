<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.css'); ?>" type="text/css" />
<meta charset="utf-8">
	<title></title>
	<style type="text/css">
	#munic{
		margin-top: 80px;
		margin-left: 65px;
		font-size: 9px;
	}
	#payment_date{
		margin-top: 35px;
		margin-left: 35px;
	}
	#payor{
		margin-top: 30px;
		font-size: 12px;
		margin-left: 35px;
	}
	#breakdown_header{
		margin-top: 77px;
	}
	#breakdown_header{
		font-size: 14px;
		margin-left: 60px;
		margin-bottom: -30px;
	}
	#breakdown_amount{
		font-size: 14px;
		margin-left: 150px;
	}
	#total{
		margin-top: -63px;
		padding-left: 18em;
		font-weight: bold;
		font-size: 14px;
		
	}
	#designation{
		margin-top: 310px;
		margin-left: 60px;
		text-align: center;
		font-size: 14px;
	}
	#totalsy{
		font-size: 10px;
		margin-left: 0px;
		
	}
	
	#tabstyle{
		padding-bottom: 7em;
	}
	input{
		border:none;
		width:200px;
	}
@media print{
	.btn{
		display:none;
	}
	#totalsy{
		font-size: 10px;
		margin-left: 0px;
		margin-top:-8px;
		display:block;
	}
}
	</style>
</head>
<body>
 <div class="panel-body">

	<div id="munic" style="font-size:14px;">Municipality of Compostela</div>
	<div id="payment_date">
		<br><br>
		<?php echo $details['tfos']['payment_date'];?>
	
		</div>

	<div id="payor">
		<b><?php if($info->firstname!="N/A"){echo $info->firstname. ' '.$info->middlename. ' '.$info->lastname;} else{echo $info->permitee;}?></b>
	</div>
	<div id="breakdown_header"></div>
	<table>
	<tr>
	<td width="5%">
	<p style="font-size:10px;"> <br>

<?php 
$counting = 0;
$busstaxlgu=0;
$total1=0;
$total2=0;
$total3=0;
$total11=0;
$total22=0;
$total33=0;

$counts=json_decode(json_encode($details['count']),true);

foreach($counts as $cc){
	$countt=$cc;

	
}

	
	$tfos = json_decode(json_encode($details['paid_tfo']),true);
	


foreach ($tfos as $value) {

		if($value['tfo']=="Business Tax"){
			if(stripos($value['nature'],'(Additional)')!==false){
				$counting++;
				echo "<input type='text' readonly value='Business Tax ".str_replace('(Additional)','',$value['nature'])."' id='item".$counting."'>";				
			}
			else {
				$counting++;
				echo "<input type='text' readonly value='Business Tax ".$value['nature']."' id='item".$counting."'>";	
														
			}
		}
	
		


}
$counting++;
echo "<input type='text' readonly value='Certification Fee'  id='item".$counting."'>";	
$counting++;
echo "<input type='text' readonly value='Documentary Stamp' id='item".$counting."'>";	

	?>
	 
	

 
<?php 

	 $payment_mode=json_decode(json_encode($details['payment']),true);
	 
		 if($payment_mode['payment']=="Annual"){
	 
			 $busstaxlgu = $busstaxlgu;
			 $total1 = $total1;
		 } 
		 else if($payment_mode['payment']=="Bi-Annual"){
			 $busstaxlgu = $busstaxlgu/2;
			 $total1 = $total1-($busstaxlgu*1);
		 }
		 else if($payment_mode['payment']=="Quarterly"){
			 $busstaxlgu = $busstaxlgu/4;
			 $total1 = $total1-($busstaxlgu*3);
		 }
?>
 <?php $v=array();foreach($tfos as $tfo){$v[]=$tfo;}?>
			<?php 
				
					$sur_here =json_decode(json_encode($details['surcharge']),true);
					if($sur_here['surcharge']==0){}else{
						$counting++;
						echo "<input type='text' readonly value='Surcharge' id='item".$counting."'>";	
					}
				?>	
</p>
</td>

<td width="5%" >
<p style="margin-left:50%; font-size:10px;margin-top:10px;">

<?php 
$countings=0;

 foreach ($tfos as $value) {
 
	 if($value['tfo']=="Business Tax"){
		 $countings++;
 
					 $total1+=$info->interest;
					 echo "<input type='text' readonly value='&#8369;&nbsp;".number_format($info->interest,2)."' id='items".$countings."'>";	
 
		
	 } 
 
 }

 $counting++;
 echo "<input type='text' readonly value='&#8369;&nbsp;75.00' id='items".$countings."'>";	
 $counting++;
 echo "<input type='text' readonly value='&#8369;&nbsp;30.00' id='items".$countings."'>";	
 
 
 $sur_here =json_decode(json_encode($details['surcharge']),true);
 if($sur_here['surcharge']==0){}else{
	 $total3+=$sur_here['surcharge'];
	 $countings++;
	 echo "<input type='text' readonly value='&#8369;&nbsp;".number_format($sur_here['surcharge'],2)."' id='items".$countings."'>";	
	 
 }
 
	 
		?>

</td>

		<td style="font-size:10px;padding-right:180px;">
			<span style="padding-left:0em;">
				
			
			</span>
		</td>
		<td style="font-size:10px;">
			<span style="padding-left:0em;">

			
		
			</span>
		</td>

			
		</tr>
	</table>
	<div id="tabstyle"></div>
	<div id="total">
		<?php 
	
			$total = $total1 + $total2 + $total3 + 75 + 30;
			echo ' &#8369;<input type="text" readonly value='.number_format($total,2).' id="totalss"> <br>'; 
		

		?>
		<input type="hidden" id="totalt" value=<?php echo number_format($total,2)?>>
	</div>


	<br>
	<span id="totalsy"> 0<span>
	


<!-- 	<div id="designation">

		<?php
			$name = (strlen($settings[1]->middleName) > 1) ? '-' : '. ';
			echo $settings[1]->firstName. ' '.$settings[1]->middleName.$name.$settings[1]->lastName;?>
		<br>
		<?php echo $settings[1]->designation;?>
	</div> -->

</div>
		


</body>
<script src="<?php echo base_url('assets/js/libs/jquery.js'); ?>"></script>
<script>
$(document).ready(function(){   
	var totalt = $("#totalt").val();
	$("#totalsy").text(toWords(totalt)); 


    $("#btnbtn1").click(function(){
	  $("#item1").show();  
      $("#item2").show();
      $("#item3").show();
	  $("#item4").show();
      $("#item5").show();
	  $("#item6").show();
      $("#item7").show();
	  $("#item8").show();
	  $("#item9").show();
	  $("#item10").show();

	  if($("#items1").val()==undefined){
		var tot1 = 0;
	} else {
		var tot1 = parseFloat($("#items1").val().replace(/[₱,]+/g,""));
	}
	
	if($("#items2").val()==undefined){
		var tot2 = 0;
	} else {
		var tot2 = parseFloat($("#items2").val().replace(/[₱,]+/g,""));
	}
	
	if($("#items3").val()==undefined){
		var tot3 = 0;
	} else {
		var tot3 = parseFloat($("#items3").val().replace(/[₱,]+/g,""));
	}
	
	if($("#items4").val()==undefined){
		var tot4 = 0;
	} else {
		var tot4 = parseFloat($("#items4").val().replace(/[₱,]+/g,""));
	}
	
	if($("#items5").val()==undefined){
		var tot5 = 0;
	} else {
		var tot5 = parseFloat($("#items5").val().replace(/[₱,]+/g,""));
	}
	
	if($("#items6").val()==undefined){
		var tot6 = 0;
	} else {
		var tot6 = parseFloat($("#items6").val().replace(/[₱,]+/g,""));
	}
	
	if($("#items7").val()==undefined){
		var tot7 = 0;
	} else {
		var tot7 = parseFloat($("#items7").val().replace(/[₱,]+/g,""));
	}
	
	if($("#items8").val()==undefined){
		var tot8 = 0;
	} else {
		var tot8 = parseFloat($("#items8").val().replace(/[₱,]+/g,""));
	}
	
	if($("#items9").val()==undefined){
		var tot9 = 0;
	} else {
		var tot9 = parseFloat($("#items9").val().replace(/[₱,]+/g,""));
	}
	
	if($("#items10").val()==undefined){
		var tot10 = 0;
	} else {
		var tot10 = parseFloat($("#items10").val().replace(/[₱,]+/g,""));
	}
	
	var total1 = tot1 + tot2 + tot3 + tot4 + tot5 + tot6 + tot7 + tot8 + tot9 + tot10;
	
	$("#totalsy").text(toWords(total1)); 
	$("#totalss").val((total1).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

	  $("#items1").show();
      $("#items2").show();
      $("#items3").show();
	  $("#items4").show();
      $("#items5").show();
	  $("#items6").show();
      $("#items7").show();
	  $("#items8").show();
	  $("#items9").show();
	  $("#items10").show();
	  

	  $("#item11").hide();
      $("#item12").hide();
      $("#item13").hide();
	  $("#item14").hide();
      $("#item15").hide();
	  $("#item16").hide();
      $("#item17").hide();
	  $("#item18").hide();
	  $("#item19").hide();
      $("#item20").hide();

	  $("#items11").hide();
      $("#items12").hide();
      $("#items13").hide();
	  $("#items14").hide();
      $("#items15").hide();
	  $("#items16").hide();
      $("#items17").hide();
	  $("#items18").hide();
	  $("#items19").hide();
      $("#items20").hide();

	  $("#item21").hide();
      $("#item22").hide();
      $("#item23").hide();
	  $("#item24").hide();
      $("#item25").hide();
	  $("#item26").hide();
      $("#item27").hide();
	  $("#item28").hide();
	  $("#item29").hide();
      $("#item30").hide();

	  $("#items21").hide();
      $("#items22").hide();
      $("#items23").hide();
	  $("#items24").hide();
      $("#items25").hide();
	  $("#items26").hide();
      $("#items27").hide();
	  $("#items28").hide();
	  $("#items29").hide();
	  $("#items30").hide();
	  
	  $("#item31").hide();
      $("#item32").hide();
      $("#item33").hide();
	  $("#item34").hide();
      $("#item35").hide();
	  $("#item36").hide();
      $("#item37").hide();
	  $("#item38").hide();
	  $("#item39").hide();
      $("#item40").hide();

	  $("#items31").hide();
      $("#items32").hide();
      $("#items33").hide();
	  $("#items34").hide();
      $("#items35").hide();
	  $("#items36").hide();
      $("#items37").hide();
	  $("#items38").hide();
	  $("#items39").hide();
	  $("#items40").hide();
	  
	  $("#item41").hide();
      $("#item42").hide();
      $("#item43").hide();
	  $("#item44").hide();
      $("#item45").hide();
	  $("#item46").hide();
      $("#item47").hide();
	  $("#item48").hide();
	  $("#item49").hide();
      $("#item50").hide();

	  $("#items41").hide();
      $("#items42").hide();
      $("#items43").hide();
	  $("#items44").hide();
      $("#items45").hide();
	  $("#items46").hide();
      $("#items47").hide();
	  $("#items48").hide();
	  $("#items49").hide();
      $("#items50").hide();
	}); 
	
	$("#btnbtn2").click(function(){
		$("#item1").hide();
		$("#item2").hide();
		$("#item3").hide();
		$("#item4").hide();
		$("#item5").hide();
		$("#item6").hide();
		$("#item7").hide();
		$("#item8").hide();
		$("#item9").hide();
		$("#item10").hide();
  
		$("#items1").hide();
		$("#items2").hide();
		$("#items3").hide();
		$("#items4").hide();
		$("#items5").hide();
		$("#items6").hide();
		$("#items7").hide();
		$("#items8").hide();
		$("#items9").hide();
		$("#items10").hide();
		
  
		$("#item11").show();
		$("#item12").show();
		$("#item13").show();
		$("#item14").show();
		$("#item15").show();
		$("#item16").show();
		$("#item17").show();
		$("#item18").show();
		$("#item19").show();
		$("#item20").show();
  
		$("#items11").show();
		$("#items12").show();
		$("#items13").show();
		$("#items14").show();
		$("#items15").show();
		$("#items16").show();
		$("#items17").show();
		$("#items18").show();
		$("#items19").show();
		$("#items20").show();
  

if($("#items11").val()==undefined){
	var tot1 = 0;
} else {
	var tot1 = parseFloat($("#items11").val().replace(/[₱,]+/g,""));
}

if($("#items12").val()==undefined){
	var tot2 = 0;
} else {
	var tot2 = parseFloat($("#items12").val().replace(/[₱,]+/g,""));
}

if($("#items13").val()==undefined){
	var tot3 = 0;
} else {
	var tot3 = parseFloat($("#items13").val().replace(/[₱,]+/g,""));
}

if($("#items14").val()==undefined){
	var tot4 = 0;
} else {
	var tot4 = parseFloat($("#items14").val().replace(/[₱,]+/g,""));
}

if($("#items15").val()==undefined){
	var tot5 = 0;
} else {
	var tot5 = parseFloat($("#items15").val().replace(/[₱,]+/g,""));
}

if($("#items16").val()==undefined){
	var tot6 = 0;
} else {
	var tot6 = parseFloat($("#items16").val().replace(/[₱,]+/g,""));
}

if($("#items17").val()==undefined){
	var tot7 = 0;
} else {
	var tot7 = parseFloat($("#items17").val().replace(/[₱,]+/g,""));
}

if($("#items18").val()==undefined){
	var tot8 = 0;
} else {
	var tot8 = parseFloat($("#items18").val().replace(/[₱,]+/g,""));
}

if($("#items19").val()==undefined){
	var tot9 = 0;
} else {
	var tot9 = parseFloat($("#items19").val().replace(/[₱,]+/g,""));
}

if($("#items20").val()==undefined){
	var tot10 = 0;
} else {
	var tot10 = parseFloat($("#items20").val().replace(/[₱,]+/g,""));
}

var total1 = tot1 + tot2 + tot3 + tot4 + tot5 + tot6 + tot7 + tot8 + tot9 + tot10;

$("#totalsy").text(toWords(total1)); 
$("#totalss").val((total1).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

                  

		$("#item21").hide();
		$("#item22").hide();
		$("#item23").hide();
		$("#item24").hide();
		$("#item25").hide();
		$("#item26").hide();
		$("#item27").hide();
		$("#item28").hide();
		$("#item29").hide();
		$("#item30").hide();
  
		$("#items21").hide();
		$("#items22").hide();
		$("#items23").hide();
		$("#items24").hide();
		$("#items25").hide();
		$("#items26").hide();
		$("#items27").hide();
		$("#items28").hide();
		$("#items29").hide();
		$("#items30").hide();
		
		$("#item31").hide();
		$("#item32").hide();
		$("#item33").hide();
		$("#item34").hide();
		$("#item35").hide();
		$("#item36").hide();
		$("#item37").hide();
		$("#item38").hide();
		$("#item39").hide();
		$("#item40").hide();
  
		$("#items31").hide();
		$("#items32").hide();
		$("#items33").hide();
		$("#items34").hide();
		$("#items35").hide();
		$("#items36").hide();
		$("#items37").hide();
		$("#items38").hide();
		$("#items39").hide();
		$("#items40").hide();
		
		$("#item41").hide();
		$("#item42").hide();
		$("#item43").hide();
		$("#item44").hide();
		$("#item45").hide();
		$("#item46").hide();
		$("#item47").hide();
		$("#item48").hide();
		$("#item49").hide();
		$("#item50").hide();
  
		$("#items41").hide();
		$("#items42").hide();
		$("#items43").hide();
		$("#items44").hide();
		$("#items45").hide();
		$("#items46").hide();
		$("#items47").hide();
		$("#items48").hide();
		$("#items49").hide();
		$("#items50").hide();

	});

	$("#btnbtn3").click(function(){
		$("#item1").hide();
		$("#item2").hide();
		$("#item3").hide();
		$("#item4").hide();
		$("#item5").hide();
		$("#item6").hide();
		$("#item7").hide();
		$("#item8").hide();
		$("#item9").hide();
		$("#item10").hide();
  
		$("#items1").hide();
		$("#items2").hide();
		$("#items3").hide();
		$("#items4").hide();
		$("#items5").hide();
		$("#items6").hide();
		$("#items7").hide();
		$("#items8").hide();
		$("#items9").hide();
		$("#items10").hide();
		
  
		$("#item11").hide();
		$("#item12").hide();
		$("#item13").hide();
		$("#item14").hide();
		$("#item15").hide();
		$("#item16").hide();
		$("#item17").hide();
		$("#item18").hide();
		$("#item19").hide();
		$("#item20").hide();
  
		$("#items11").hide();
		$("#items12").hide();
		$("#items13").hide();
		$("#items14").hide();
		$("#items15").hide();
		$("#items16").hide();
		$("#items17").hide();
		$("#items18").hide();
		$("#items19").hide();
		$("#items20").hide();
  
		$("#item21").show();
		$("#item22").show();
		$("#item23").show();
		$("#item24").show();
		$("#item25").show();
		$("#item26").show();
		$("#item27").show();
		$("#item28").show();
		$("#item29").show();
		$("#item30").show();
  
		$("#items21").show();
		$("#items22").show();
		$("#items23").show();
		$("#items24").show();
		$("#items25").show();
		$("#items26").show();
		$("#items27").show();
		$("#items28").show();
		$("#items29").show();
		$("#items30").show();
		
		if($("#items21").val()==undefined){
			var tot1 = 0;
		} else {
			var tot1 = parseFloat($("#items21").val().replace(/[₱,]+/g,""));
		}
		
		if($("#items22").val()==undefined){
			var tot2 = 0;
		} else {
			var tot2 = parseFloat($("#items22").val().replace(/[₱,]+/g,""));
		}
		
		if($("#items23").val()==undefined){
			var tot3 = 0;
		} else {
			var tot3 = parseFloat($("#items23").val().replace(/[₱,]+/g,""));
		}
		
		if($("#items24").val()==undefined){
			var tot4 = 0;
		} else {
			var tot4 = parseFloat($("#items24").val().replace(/[₱,]+/g,""));
		}
		
		if($("#items25").val()==undefined){
			var tot5 = 0;
		} else {
			var tot5 = parseFloat($("#items25").val().replace(/[₱,]+/g,""));
		}
		
		if($("#items26").val()==undefined){
			var tot6 = 0;
		} else {
			var tot6 = parseFloat($("#items26").val().replace(/[₱,]+/g,""));
		}
		
		if($("#items27").val()==undefined){
			var tot7 = 0;
		} else {
			var tot7 = parseFloat($("#items27").val().replace(/[₱,]+/g,""));
		}
		
		if($("#items28").val()==undefined){
			var tot8 = 0;
		} else {
			var tot8 = parseFloat($("#items28").val().replace(/[₱,]+/g,""));
		}
		
		if($("#items29").val()==undefined){
			var tot9 = 0;
		} else {
			var tot9 = parseFloat($("#items29").val().replace(/[₱,]+/g,""));
		}
		
		if($("#items30").val()==undefined){
			var tot10 = 0;
		} else {
			var tot10 = parseFloat($("#items30").val().replace(/[₱,]+/g,""));
		}
		
		var total1 = tot1 + tot2 + tot3 + tot4 + tot5 + tot6 + tot7 + tot8 + tot9 + tot10;
		$("#totalss").val((total1).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

		$("#item31").hide();
		$("#item32").hide();
		$("#item33").hide();
		$("#item34").hide();
		$("#item35").hide();
		$("#item36").hide();
		$("#item37").hide();
		$("#item38").hide();
		$("#item39").hide();
		$("#item40").hide();
  
		$("#items31").hide();
		$("#items32").hide();
		$("#items33").hide();
		$("#items34").hide();
		$("#items35").hide();
		$("#items36").hide();
		$("#items37").hide();
		$("#items38").hide();
		$("#items39").hide();
		$("#items40").hide();
		
		$("#item41").hide();
		$("#item42").hide();
		$("#item43").hide();
		$("#item44").hide();
		$("#item45").hide();
		$("#item46").hide();
		$("#item47").hide();
		$("#item48").hide();
		$("#item49").hide();
		$("#item50").hide();
  
		$("#items41").hide();
		$("#items42").hide();
		$("#items43").hide();
		$("#items44").hide();
		$("#items45").hide();
		$("#items46").hide();
		$("#items47").hide();
		$("#items48").hide();
		$("#items49").hide();
		$("#items50").hide();

	});
	$("#btnbtn4").click(function(){
		$("#item1").hide();
		$("#item2").hide();
		$("#item3").hide();
		$("#item4").hide();
		$("#item5").hide();
		$("#item6").hide();
		$("#item7").hide();
		$("#item8").hide();
		$("#item9").hide();
		$("#item10").hide();
  
		$("#items1").hide();
		$("#items2").hide();
		$("#items3").hide();
		$("#items4").hide();
		$("#items5").hide();
		$("#items6").hide();
		$("#items7").hide();
		$("#items8").hide();
		$("#items9").hide();
		$("#items10").hide();
		
  
		$("#item11").hide();
		$("#item12").hide();
		$("#item13").hide();
		$("#item14").hide();
		$("#item15").hide();
		$("#item16").hide();
		$("#item17").hide();
		$("#item18").hide();
		$("#item19").hide();
		$("#item20").hide();
  
		$("#items11").hide();
		$("#items12").hide();
		$("#items13").hide();
		$("#items14").hide();
		$("#items15").hide();
		$("#items16").hide();
		$("#items17").hide();
		$("#items18").hide();
		$("#items19").hide();
		$("#items20").hide();
  
		$("#item21").hide();
		$("#item22").hide();
		$("#item23").hide();
		$("#item24").hide();
		$("#item25").hide();
		$("#item26").hide();
		$("#item27").hide();
		$("#item28").hide();
		$("#item29").hide();
		$("#item30").hide();
  
		$("#items21").hide();
		$("#items22").hide();
		$("#items23").hide();
		$("#items24").hide();
		$("#items25").hide();
		$("#items26").hide();
		$("#items27").hide();
		$("#items28").hide();
		$("#items29").hide();
		$("#items30").hide();
		
		$("#item31").show();
		$("#item32").show();
		$("#item33").show();
		$("#item34").show();
		$("#item35").show();
		$("#item36").show();
		$("#item37").show();
		$("#item38").show();
		$("#item39").show();
		$("#item40").show();
  
		$("#items31").show();
		$("#items32").show();
		$("#items33").show();
		$("#items34").show();
		$("#items35").show();
		$("#items36").show();
		$("#items37").show();
		$("#items38").show();
		$("#items39").show();
		$("#items40").show();
		
		
		if($("#items31").val()==undefined){
			var tot1 = 0;
		} else {
			var tot1 = parseFloat($("#items31").val().replace(/[₱,]+/g,""));
		}
		
		if($("#items32").val()==undefined){
			var tot2 = 0;
		} else {
			var tot2 = parseFloat($("#items32").val().replace(/[₱,]+/g,""));
		}
		
		if($("#items33").val()==undefined){
			var tot3 = 0;
		} else {
			var tot3 = parseFloat($("#items33").val().replace(/[₱,]+/g,""));
		}
		
		if($("#items34").val()==undefined){
			var tot4 = 0;
		} else {
			var tot4 = parseFloat($("#items34").val().replace(/[₱,]+/g,""));
		}
		
		if($("#items35").val()==undefined){
			var tot5 = 0;
		} else {
			var tot5 = parseFloat($("#items35").val().replace(/[₱,]+/g,""));
		}
		
		if($("#items36").val()==undefined){
			var tot6 = 0;
		} else {
			var tot6 = parseFloat($("#items36").val().replace(/[₱,]+/g,""));
		}
		
		if($("#items37").val()==undefined){
			var tot7 = 0;
		} else {
			var tot7 = parseFloat($("#items37").val().replace(/[₱,]+/g,""));
		}
		
		if($("#items38").val()==undefined){
			var tot8 = 0;
		} else {
			var tot8 = parseFloat($("#items38").val().replace(/[₱,]+/g,""));
		}
		
		if($("#items39").val()==undefined){
			var tot9 = 0;
		} else {
			var tot9 = parseFloat($("#items39").val().replace(/[₱,]+/g,""));
		}
		
		if($("#items40").val()==undefined){
			var tot10 = 0;
		} else {
			var tot10 = parseFloat($("#items40").val().replace(/[₱,]+/g,""));
		}
		
		var total1 = tot1 + tot2 + tot3 + tot4 + tot5 + tot6 + tot7 + tot8 + tot9 + tot10;
		$("#totalss").val((total1).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));


		$("#item41").hide();
		$("#item42").hide();
		$("#item43").hide();
		$("#item44").hide();
		$("#item45").hide();
		$("#item46").hide();
		$("#item47").hide();
		$("#item48").hide();
		$("#item49").hide();
		$("#item50").hide();
  
		$("#items41").hide();
		$("#items42").hide();
		$("#items43").hide();
		$("#items44").hide();
		$("#items45").hide();
		$("#items46").hide();
		$("#items47").hide();
		$("#items48").hide();
		$("#items49").hide();
		$("#items50").hide();
	});
	$("#btnbtn5").click(function(){
		$("#item1").hide();
		$("#item2").hide();
		$("#item3").hide();
		$("#item4").hide();
		$("#item5").hide();
		$("#item6").hide();
		$("#item7").hide();
		$("#item8").hide();
		$("#item9").hide();
		$("#item10").hide();
  
		$("#items1").hide();
		$("#items2").hide();
		$("#items3").hide();
		$("#items4").hide();
		$("#items5").hide();
		$("#items6").hide();
		$("#items7").hide();
		$("#items8").hide();
		$("#items9").hide();
		$("#items10").hide();
		
  
		$("#item11").hide();
		$("#item12").hide();
		$("#item13").hide();
		$("#item14").hide();
		$("#item15").hide();
		$("#item16").hide();
		$("#item17").hide();
		$("#item18").hide();
		$("#item19").hide();
		$("#item20").hide();
  
		$("#items11").hide();
		$("#items12").hide();
		$("#items13").hide();
		$("#items14").hide();
		$("#items15").hide();
		$("#items16").hide();
		$("#items17").hide();
		$("#items18").hide();
		$("#items19").hide();
		$("#items20").hide();
  
		$("#item21").hide();
		$("#item22").hide();
		$("#item23").hide();
		$("#item24").hide();
		$("#item25").hide();
		$("#item26").hide();
		$("#item27").hide();
		$("#item28").hide();
		$("#item29").hide();
		$("#item30").hide();
  
		$("#items21").hide();
		$("#items22").hide();
		$("#items23").hide();
		$("#items24").hide();
		$("#items25").hide();
		$("#items26").hide();
		$("#items27").hide();
		$("#items28").hide();
		$("#items29").hide();
		$("#items30").hide();
		
		$("#item31").hide();
		$("#item32").hide();
		$("#item33").hide();
		$("#item34").hide();
		$("#item35").hide();
		$("#item36").hide();
		$("#item37").hide();
		$("#item38").hide();
		$("#item39").hide();
		$("#item40").hide();
  
		$("#items31").hide();
		$("#items32").hide();
		$("#items33").hide();
		$("#items34").hide();
		$("#items35").hide();
		$("#items36").hide();
		$("#items37").hide();
		$("#items38").hide();
		$("#items39").hide();
		$("#items40").hide();
		
		$("#item41").show();
		$("#item42").show();
		$("#item43").show();
		$("#item44").show();
		$("#item45").show();
		$("#item46").show();
		$("#item47").show();
		$("#item48").show();
		$("#item49").show();
		$("#item50").show();
  
		$("#items41").show();
		$("#items42").show();
		$("#items43").show();
		$("#items44").show();
		$("#items45").show();
		$("#items46").show();
		$("#items47").show();
		$("#items48").show();
		$("#items49").show();
		$("#items50").show();

		if($("#items41").val()==undefined){
			var tot1 = 0;
		} else {
			var tot1 = parseFloat($("#items41").val().replace(/[₱,]+/g,""));
		}
		
		if($("#items42").val()==undefined){
			var tot2 = 0;
		} else {
			var tot2 = parseFloat($("#items42").val().replace(/[₱,]+/g,""));
		}
		
		if($("#items43").val()==undefined){
			var tot3 = 0;
		} else {
			var tot3 = parseFloat($("#items43").val().replace(/[₱,]+/g,""));
		}
		
		if($("#items44").val()==undefined){
			var tot4 = 0;
		} else {
			var tot4 = parseFloat($("#items44").val().replace(/[₱,]+/g,""));
		}
		
		if($("#items45").val()==undefined){
			var tot5 = 0;
		} else {
			var tot5 = parseFloat($("#items45").val().replace(/[₱,]+/g,""));
		}
		
		if($("#items46").val()==undefined){
			var tot6 = 0;
		} else {
			var tot6 = parseFloat($("#items46").val().replace(/[₱,]+/g,""));
		}
		
		if($("#items47").val()==undefined){
			var tot7 = 0;
		} else {
			var tot7 = parseFloat($("#items47").val().replace(/[₱,]+/g,""));
		}
		
		if($("#items48").val()==undefined){
			var tot8 = 0;
		} else {
			var tot8 = parseFloat($("#items48").val().replace(/[₱,]+/g,""));
		}
		
		if($("#items49").val()==undefined){
			var tot9 = 0;
		} else {
			var tot9 = parseFloat($("#items49").val().replace(/[₱,]+/g,""));
		}
		
		if($("#items50").val()==undefined){
			var tot10 = 0;
		} else {
			var tot10 = parseFloat($("#items50").val().replace(/[₱,]+/g,""));
		}
		
		var total1 = tot1 + tot2 + tot3 + tot4 + tot5 + tot6 + tot7 + tot8 + tot9 + tot10;
		$("#totalss").val((total1).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));


    });
});
</script>

<script>
// American Numbering System
var th = ['','thousand','million', 'billion','trillion'];
var dg = ['zero','one','two','three','four', 'five','six','seven','eight','nine']; 
var tn = ['ten','eleven','twelve','thirteen', 'fourteen','fifteen','sixteen', 'seventeen','eighteen','nineteen']; 
var tw = ['twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety']; 
var ix=0;
function toWords(s){
	s = s.toString(); 
	s = s.replace(/[\, ]/g,''); 
	
	if (s != parseFloat(s)) return 'not a number'; 
	
	var x = s.indexOf('.'); 
	var n = s.split(''); 
	

	var str = ''; 
	var sk = 0; 
	
	if (x == -1) x = s.length; 
	if (x > 15) return 'too big'; 
	
	
	for (var i=0; i < x; i++) {
		if ((x-i)%3==2) {
			if (n[i] == '1') {
				str += tn[Number(n[i+1])] + ' '; 
				i++; 
				sk=1;
			} 
			else if (n[i]!=0) {
				str += tw[n[i]-2] + ' ';
				sk=1;
			}
			
		} 
		else if (n[i]!=0) {
			str += dg[n[i]] +' '; 
			if ((x-i)%3==0) 
			str += 'hundred ';sk=1;
			} 

		if ((x-i)%3==1) {
			if (sk) 
			str += th[(x-i-1)/3] + ' ';
			sk=0;
			}}
			
			str += 'pesos '; 

		if (x != s.length) {

			var y = s.length; 
		
	var t = s.split('.'); 
	var t2 = t[1].split(''); 
	
			if(tw[t2[0]-2]=='zero' && dg[t2[1]]=='zero'){

			} 
			else{
				
				if(tw[t2[0]-2]=='zero' || tw[t2[0]-2]==undefined ){//.05
					if(dg[t2[1]]=='zero' || dg[t2[1]]==undefined){
						
					}
					else if(dg[t2[1]]!='zero' || dg[t2[1]]!=undefined){
						
					
					if(ix==0){
						str +='and ';
						str += dg[t2[1]]; 
						str += ' cents '; 
						ix++;
					
					}else{
					
					}
					console.log(t2[1]);	
					
					}
				}else{

				
					if(dg[t2[1]]=='zero' || dg[t2[1]]==undefined){
						str +='and ';
						str += tw[t2[0]-2] +' '; 
					}else{
						str +='and ';
						str += tw[t2[0]-2] +' '; 
						str += dg[t2[1]] +' '; 
						
					}
					

				
					str += 'cents '; 
				}
							
				
				
			
					
			}
			

			
		} 
			
			bb=str.replace(/\s+/g,' ') + ' only '; 
			cc=bb.charAt(0).toUpperCase() + bb.substr(1);
			return cc;
		
		}
</script>

</html>
