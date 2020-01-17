<meta charset="UTF-8">
<style>
body{
		width: 1366px;
		height: 768px;
	}
.title{
	width:200px;
	
}
.el{
	padding-right:1000px;
}

.fixed{
	position: fixed;
}

#gen{
	font-size: 18px;
	position:fixed;
	left: 51.3%;
	top: 9.5%;
}
#tin{
	font-size: 18px;
	position:fixed;
	left: 62%;
	top: 7.8%;
	
}
#height{
	font-size: 18px;
	position:fixed;
	left: 73%;
	top: 11.8%;
}
#weight{
	font-size: 18px;
	position:fixed;
	left: 73%;
	top: 14%;
}
#placeofbirth{
	font-size: 18px;
	position:fixed;
	left: 55%;
	top: 11.4%;
}
#dob{
	font-size: 18px;
	position:fixed;
	left: 54%;
	top: 14.5%;
}
#basic{
	position:fixed;
	left: 62.5%;
	top: 16.1%;
	font-size: 18px;
}
#gross{
	font-size: 18px;
	position:fixed;
	right: 34%;
	top: 21%;
}
#salary{
	font-size: 18px;
	position:fixed;
	right: 34%;
	top: 23%;
}
#rpt{
	font-size: 18px;
	position:fixed;
	right: 34%;
	top: 25%;
}
#totalx{
	font-size: 18px;
	position:fixed;
	left: 61%;
	top: 27%;
}
#penalty{
	font-size: 18px;
	position:fixed;
	left: 61%;
	top: 29%;
}
#totalall{
	font-size: 18px;
	position:fixed;
	left: 61%;
	top: 31.7%;
}
#amwords{
	position:fixed;
	left: 47%;
	top: 31.1%;
	font-size: 13px;
}
#treasurer{
	position:fixed;
	left: 24%;
	top: 33%;
	font-size: 18px;
	font-weight: bold;
}
#test{
	position:fixed;
	left: 2%;
	top: 5.5%;
	font-size: 18px;
}
#namess{
	position:fixed;
	left: 4.9%;
	top: 7.6%;
	font-size: 18px;
}
#address{
	position:fixed;
	left: 4.9%;
	top: 9.6%;
	font-size: 18px;
}
#citizenship{
	position:fixed;
	left: 4.9%;
	top: 11.6%;
	font-size: 18px;
}
#civil{
	position:fixed;
	left: 6.5%;
	top: 12.8%;
	font-size: 18px;
}

@media print {
	body{
		width: 1366px;
		height: 768px;

	}
}



</style>

<?php
foreach ($ctc1 as $c){
	$a = $c->basic_tax;
	$e = $c->earnings;
	$test = $c->salaries;
	$test2 = $c->income;
	$total = $a + $e + $test +$test2;

//} ?>

<body>
<div class="container">
  <!--<div class="row">
    <div class="col-sm">
      One of three columns
    </div>
    <div class="col-sm">
      One of three columns
    </div>
    <div class="col-sm">
      One of three columns
    </div>
  </div>
</div>-->

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
			<td colspan="3"><p class="title"  ></p><b style="text-transform:uppercase;" id="namess"><?php echo $c->lastname.'&nbsp;&nbsp;&nbsp;'.$c->firstname.'&nbsp;&nbsp;&nbsp;'.$c->middlename; ?></b>  </td>
			<td colspan="2"><p class="title"></p><b style="text-transform:uppercase;margin-left:-100px;" id="tin"><?php echo $c->tin; ?></b></td>
		</tr>
		<tr>
			<td colspan="4"><b style="text-transform:uppercase;"  id="address"><?php echo $c->address; ?></b></td>
			<td>
				<b style="text-transform:uppercase;" id="gen">
				<?php 
				if($c->gender == "male"){
					echo '&#10004';
				}elseif($c->gender == "female"){
					echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#10004';
				}else{}
				?></b>

		</tr>
		<tr>
			<td><b style="text-transform:uppercase;" id="citizenship"><?php echo $c->citizenship; ?></b></td>
			<td><p class="title"></p><b style="text-transform:uppercase;" ><?php echo $c->icr_no; ?></b></td>
			<td colspan="2"><b style="text-transform:uppercase;margin-left:-150px;" id="placeofbirth"><?php echo $c->place_of_birth; ?></b></td>
			<td><b style="text-transform:uppercase;margin-left:-130px;margin-top:-5px;"  id="height"><?php echo $c->height; ?></b></td>
		</tr>
		<tr id="civil">
			<td colspan="2"><p class="title"></p>
				<p style="text-transform:uppercase;margin-left:15px;" >
				<?php 
				 if($c->civil_status == 'married'){ ?>
				 	<p style="font-weight:bold;text-transform:uppercase;margin-left:44px;height:20px;margin-top: -16px;">&#10004;</p>
				<?php }else if($c->civil_status == 'single'){?>
					<p style="font-weight:bold;text-transform:uppercase;margin-left:44px;height:20px;margin-top: -30px;">&#10004;</p>	
				<?php }else if($c->civil_status == 'divorced'){?>
					<p style="font-weight:bold;text-transform:uppercase;margin-left:159px;height:20px;margin-top: -16px;">&#10004;</p>
				<?php }else if($c->civil_status == 'widowed'){?>
					<p style="font-weight:bold;text-transform:uppercase;margin-left:159px;height:20px;margin-top: -30px;">&#10004;</p>
				<?php } ?>
				</p></td>
			<td colspan="2"><p class="title"></p><p style="font-weight: bold;text-transform:uppercase;margin-left:-60px;margin-top:-15px" class="words"  id="dob" ><?php echo $c->date_of_birth; ?></p></td>
			<td><p class="title"></p><p style="font-weight: bold;text-transform:uppercase;margin-left:-130px;margin-top: -10px;" class="words" id="weight" ><?php echo $c->weight; ?></p></td>
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
			<?php echo number_format($c->basic_tax,2);?></p></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td colspan="1"><p><b style="text-transform:uppercase;" class="words" id="amt"><br>
		</p></b></td>
		</tr>
		<tr id="gross">
			<td></td>
			<td colspan="1"><p style="font-weight:bold;text-transform:uppercase;" >
			<?php if($c->gross_tax){echo number_format($c->gross_tax,2); }else{}?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td colspan="1"><p><p style="font-weight:bold;text-transform:uppercase;" >
			<?php if($e==null){}else{echo number_format($e,2);} ?></p></p></td>
		</tr>
		<tr id="salary">
			<td></td>
			<td colspan="1"><p><p style="font-weight:bold;text-transform:uppercase;" >
			<?php if($c->salary_tax){echo number_format($c->salary_tax,2);}else{} ?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td colspan="1"><p><p style="font-weight:bold;text-transform:uppercase;">
			<?php if($test==null){}else{echo number_format($test,2);} ?></p></p></td>
		</tr>
		<tr id="rpt">
			<td></td>
			<td colspan="1"><p><p style="font-weight:bold;text-transform:uppercase;" >
			<?php if($c->income_tax){echo number_format($c->income_tax,2);}else{}?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>			
			<td colspan="1"><p><p style="font-weight:bold;text-transform:uppercase;">
			<?php if($test2==null){}else{echo number_format($test2,2);} ?></p></p></td>
		</tr>
        <tr id="totalx">
			<td rowspan="2"></td>
            <td><p style="font-weight:bold;text-transform:uppercase;" >
			<?php echo number_format($total,2);	?></p></td>
		</tr>
        <tr id="penalty">
			<td></td>
            <td><p></p><div></div><p style="font-weight:bold;text-transform:uppercase;" >
			<?php 		
			if(empty($c->interest)){
				echo "0.00";
			}
			else{echo number_format($c->interest,2);}
			?></p></td>
		</tr>
        <tr id="totalall">
			<td rowspan="2"></td>
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
								$this->words = " $this->major <br> and  $this->pence  $this->minor";
							 }
				             
				             if ($this->pesos==0)
				                 $this->words = "Zero $this->words";
				             else {
				                 $groups = explode(',',$this->pesos);
				                 $groups = array_reverse($groups);
				                 for ($this->magind=0; $this->magind<count($groups); $this->magind++) {
				                      if (($this->magind==1)&&(strpos($this->words,'hundred') === false)&&($groups[0]!='000'))
				                           $this->words = 'and ' . $this->words;
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
				             $res .= $res==''? '' : ' ';
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
	// window.close();
}

printni();

</script>
