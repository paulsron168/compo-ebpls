<meta charset="UTF-8">
<style>

.title{
	width:200px;
	
}

.el{
	padding-right:1000px;
}


#gen{
	position:fixed;
	left: 50%;
	top: 9%;
}
#tin{
	position:fixed;
	left: 62%;
	top: 68px;
	
}
#height{
	position:fixed;
	left: 85%;
	top: 13%;
}
#weight{
	font-size: 18px;
	position:fixed;
	left: 58%;
	top: 13%;
}
#placeofbirth{
	font-size: 18px;
	position:fixed;
	left: 35%;
	top: 13%;
}

#dob{
	margin-top: -20px;
	left: 58%;
	
}
#basic{
	position:fixed;
	left: 60%;
	top: 17%;
}
#gross{
	position:fixed;
	left: 45%;
	top: 22%;
}
#salary{
	position:fixed;
	left: 45%;
	top: 24.2%;
}
#rpt{
	position:fixed;
	left: 45%;
	top: 24.5%;
}
#totalx{
	position:fixed;
	left: 60%;
	top: 26.5%;
}
#penalty{
	position:fixed;
	left: 60%;
	top: 28.5%;
}
#totalall{
	position:fixed;
	left: 60%;
	top: 31%;
}
#amwords{
	position:fixed;
	left: 46%;
	top: 32%;
	font-size:12px;
}

#treasurer{
	position:fixed;
	left: 15%;
	top: 33.5%;
	font-size:18px;
	font-weight: bold;
}
#test{
	position:fixed;
	left: 2%;
	top: 5.5%;
	font-size:18px;
}
#namess{
	position:fixed;
	left: 4.9%;
	top: 8%;
	font-size: 18px;
}
#address{
	position:fixed;
	left: 4.9%;
	top: 10.5%;
	font-size: 18px;
}
#citizenship{
	position:fixed;
	left: 4.9%;
	top: 15.5%;
	font-size: 18px;
}
#civil{
	position:fixed;
	left: 6.5%;
	top: 12.8%;
	font-size: 18px;
}
.checkcorpo{
	position:fixed;
	left: 60px;
	top: 90px;
	font-size:18px;
}
.checkasso{
	position:fixed;
	left: 132px;
	top: 80px;
	font-size:18px;
}
.checkpart{
	position:fixed;
	left: 132px;
	top: 90px;
	font-size:18px;
}


.asstax{
	position:fixed;
	top: 338px;
	left: 735px;
}

.grosstax{
position:fixed;
top: 373px;
left: 735px;
}

@media print {
  html, body{
    width: 1366px;
	height: 768px;
	
  }

}



</style>

<?php
foreach ($ctc12 as $c){
	$a = $c->basic_tax;
	$e = $c->assessed_tax_due;
	$test = $c->gross_tax_due;
	// $test2 = $c->income;
	$total = $a + $e + $test /*+$test2*/;

//} ?>

<body>
<div class="container">
    <table align="center" class="winner-table">
		<tr>
			<td colspan="2"><b></b></td>
			<td class="title_page"><b style="text-transform:uppercase;"><?php // echo $c->ctc_type; ?></b></td>
			<td colspan="2"></td>
		</tr><br>
		<tr id="test" >
			<td><p class="title"></p><b style="text-transform:uppercase;" ><?php echo $c->year; ?></b></td>
			<td><p class="title"></p><b style="text-transform:uppercase;margin-left:-125px;" ><?php echo $c->place_issued; ?></b></td>
			<td><p class="title"></p><b style="text-transform:uppercase;margin-left:-25px;" ><?php echo $c->date_issued; ?></b></td>
			<td colspan="2"><p class="title"></p></td>
		</tr>
		<tr>
			<td colspan="3"><b style="text-transform:uppercase;" id = 'namess'><?php echo $c->companyname; ?></b></td>
			<td colspan="2"><p class="title"></p><b style="text-transform:uppercase;margin-left:-100px;" id="tin">
			<?php
			
			$newtin = wordwrap($c->tin,  3 , "&nbsp;", TRUE);
			echo $newtin; ?>
			</b></td>
		</tr>
		<tr>
			<td colspan="4"><b style="text-transform:uppercase;"  id="address"><?php echo $c->address; ?></b></td>
			<td rowspan= '2' style = 'text-align:right;'><p class="title"></p><b style="text-transform:uppercase;" id = "weight" ><?php echo $c->date_of_reg; ?></b></td>
		</tr>
		<tr id = 'civil'>
			<td>
			<p style="text-transform:uppercase;margin-left:15px;" >
				<?php 
				 if($c->organization_type == 'corporation'){ ?>
				 	<p style="font-weight:bold;text-transform:uppercase;margin-left:32px;height:20px;margin-top: -14px;">&#10004;</p>
				<?php }else if($c->organization_type == 'partnership'){?>
					<p style="font-weight:bold;text-transform:uppercase;margin-left:175px;height:20px;margin-top: -14px;">&#10004;</p>
				<?php }else if($c->organization_type == 'association'){?>
					<p style="font-weight:bold;text-transform:uppercase;margin-left:175px;height:20px;margin-top: -35px;">&#10004;</p>
				<?php } ?>
				</p>
			</td>
			
				
      <td colspan="2"><b style="text-transform:uppercase;"  id="placeofbirth"><?php echo $c->place_of_inc; ?></b></td>
			
	
		</tr>
		<tr id = 'citizenship'>
			<td colspan="2">
				<b style="text-transform:uppercase;" >
				<?php echo $c->nature_of_business;  ?>
				</b>
				</td>
		</tr>
		<tr>
			<td colspan="2"></td>
			<td class="title"></td>
			<td class="title" colspan="2"><p></p></td>
		</tr>
		<tr>
			<td></td>
			<td></td>	
			<td colspan="1"><p style="font-weight: bold;text-transform:uppercase;" id="basic">
			<?php if(!empty($c->basic_tax)){echo number_format($c->basic_tax,2);}else{}?></p></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr id="gross">
			
			<td colspan="1"><p style="font-weight:bold;text-transform:uppercase;" >
			<?php if(!empty($c->assessed_tax_amt)){echo number_format($c->assessed_tax_amt,2);
			}else{} ?>
			</p></td>
			<td colspan="1"><p class = 'asstax' style="font-weight:bold;text-transform:uppercase;" >
			<?php if(!empty($e)){echo number_format($e,2);}else{} ?></p></td>
		</tr>
		<tr id="salary">
			
			<td colspan="1"><p  style="font-weight:bold;text-transform:uppercase;" >
			<?php if(!empty($c->gross_tax_amt)){echo number_format($c->gross_tax_amt,2);}else{}?>
			</p></td>
			<td colspan="1"><p class = 'grosstax' style="font-weight:bold;text-transform:uppercase;">
			<?php if(!empty($test)){echo number_format($test,2);}else{} ?></p></td>
		</tr>
		
        <tr id="totalx">
			
            <td><p style="font-weight:bold;text-transform:uppercase;" >
			<?php echo number_format($total,2);	?></p></td>
		</tr>
        <tr id="penalty">
			
            <td><p></p><div></div><p style="font-weight:bold;text-transform:uppercase;" >
			<?php 		
			if(empty($c->interest)){
				echo "0.00";
			}
			else{echo number_format($c->interest,2);}
			?></p></td>
		</tr>
        <tr id="totalall">
			
            <td><div></div><p style="font-weight:bold;text-transform:uppercase;" >
			<?php echo number_format($c->overalltotal,2); ?></p></td>
		</tr>
        <tr>
            <td><b style="text-transform:uppercase;"> <p></p>
			<div id ="amwords" class="words"><br><br><br>
		<?php
			define("MAJOR", 'Pesos');
			define("MINOR", 'Centavos');
				class toWords  {
				           var $pesos;
				           var $pence;
				           var $major;
				           var $minor;
				           var $words = '';
				           var $number;
				           var $magind;
				           var $units = array('','One','Two','Three','Four','Five','Six','Seven','Eight','Nine');
				           var $teens = array('Ten','Eleven','Twelve','Thirteen','Fourteen','Fifteen','Sixteen','Seventeen','Eighteen','Nineteen');
				           var $tens = array('','Ten','Twenty','Thirty','Forty','Fifty','Sixty','Seventy','Eighty','Ninety');
				           var $mag = array('','Thousand','Million','Billion','Trillion');
				    function toWords($amount, $major=MAJOR, $minor=MINOR) {
				             $this->major = $major;
				             $this->minor = $minor;
							//  $this->words = $words;
				             $this->number = number_format($amount,2);
							 list($this->pesos,$this->pence) = explode('.',$this->number);
							 if($this->pence==0){
								$this->words = " $this->major";
							 } else{
								$this->words = " $this->major <br>and  $this->pence  $this->minor";
							 }
				             
				             if ($this->pesos==0)
				                 $this->words = "Zero $this->words";
				             else {
				                 $groups = explode(',',$this->pesos);
				                 $groups = array_reverse($groups);
				                 for ($this->magind=0; $this->magind<count($groups); $this->magind++) {
				                      if (($this->magind==1)&&(strpos($this->words,'hundred') === false)&&($groups[0]!='000'))
				                           $this->words = ' and ' . $this->words;
				                      $this->words = $this->_build($groups[$this->magind]).$this->words;
				                 }
				             }
				    }
				    function _build($n) {
				             $res = '';
				             $na = str_pad("$n",3,"0",STR_PAD_LEFT);
				             if ($na == '000') return '';
				             if ($na{0} != 0)
				                 $res = ' '.$this->units[$na{0}] . ' hundred';
				             if (($na{1}=='0')&&($na{2}=='0'))
				                  return $res . ' ' . $this->mag[$this->magind];
				             $res .= $res==''? '' : '';
				             $t = (int)$na{1}; $u = (int)$na{2};
				             switch ($t) {
				                     case 0: $res .= ' ' . $this->units[$u]; break;
				                     case 1: $res .= ' ' . $this->teens[$u]; break;
				                     default:$res .= ' ' . $this->tens[$t] . ' ' . $this->units[$u] ; break;
				             }
				             $res .= ' ' . $this->mag[$this->magind];
				             return $res;
				    }
				}
				    $amount = $c->overalltotal;
						$obj = new toWords($amount);
				    echo $obj->words;
		?>
	</div>
			</b></td>
		</tr>
		<tr id="treasurer">
			<td><?php 
			echo strtoupper($admin[3]->firstName. ' '.$admin[3]->middleName.' '.$admin[3]->lastName);?></td>
		</tr>
<?php } ?>
	</table>
	</div>
	</body>

<script>

function printni(){
	window.print();
	//window.close();
}

printni();

</script>
