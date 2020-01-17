<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.css'); ?>" type="text/css" />
<meta charset="utf-8">
	<title></title>
	<style type="text/css">

	#munic{
		margin-top: 50px;
		margin-left: 150px;
		font-size: 9px;
	}
	#payment_date{
		margin-top: 60px;
		margin-left: 35px;
	}
	#payor{
		margin-top: 30px;
		font-size: 9px;
		margin-left: 35px;
	}
	#breakdown_header{
		margin-top: 80px;
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
		/*margin-top: 130px;*/
		padding-left: 19em;
		font-weight: bold;
		font-size: 14px;
		padding-bottom: 2em;
	}
	#designation{
		margin-top: 310px;
		margin-left: 60px;
		text-align: center;
		font-size: 14px;
	}
	#amwords{
		font-size: 10px;
		margin-left: 30px;
	}
	#tabstyle{
		padding-bottom: 7em;
	}
	
	@media print {
		#munic{
		margin-top: 125px;
		margin-left: 150px;
		font-size: 9px;
	}
	#breakdown_header{
		margin-top: 110px;
	}

	}

	</style>
</head>
<body>
 <div class="panel-body">

	<div id="munic">Alegria</div>
	<div id="payment_date">
		<?php echo $details['tfos']['payment_date'];?>
	
		</div>

	<div id="payor">
		<?php echo $info->firstname. ' '.$info->middlename. ' '.$info->lastname?>
	</div>
	<div id="breakdown_header"></div>
	<table>
	<tr>
<?php 
$counts=json_decode(json_encode($details['count']),true);

foreach($counts as $cc){
	$countt=$cc;
}

if($countt==1){?>
	<?php
	$total=0;
	
	
	$tfos = json_decode(json_encode($details['paid_tfo']),true);

	$garbage=0;$non=0;$zone=0;$sanitary=0;$annual=0;$occupation=0;$signage=0;$cert=0;$docu=0;
	$mayorsari=0;$mayorcigar=0;$mayorliquor=0;$mayorwine=0;$mayorgrain=0;$police=0;$health=0;
	$busstax=0;$permit=0;

	foreach ($tfos as $value) {$total+=$value['amount']; ?>
			<?php 
			  if($value['tfo']=='garbage fee'){ $garbage+=$value['amount']; } 
			  if($value['tfo']=='Non-Tax'){$non+=$value['amount']; }
			  if($value['tfo']=='Zoning Clearance'){$zone+=$value['amount']; }
			  if($value['tfo']=='Sanitary Permit'){$sanitary+=$value['amount']; }
			  if($value['tfo']=='Annual Inspection Fee'){$annual+=$value['amount']; }
			  if($value['tfo']=='Occupational Permit'){$occupation+=$value['amount']; }
			  if($value['tfo']=='Signage Fee'){$signage+=$value['amount']; }
			  if($value['tfo']=='Certification Fee'){$cert+=$value['amount']; }
			  if($value['tfo']=='Documentary Stamp'){$docu+=$value['amount']; }
			  if($value['tfo']=="Mayor's Permit Fee (Sari Sari)"){$mayorsari+=$value['amount']; }
			  if($value['tfo']=="Mayor's Permit Fee (Cigarette)"){$mayorcigar+=$value['amount']; }
			  if($value['tfo']=="Mayor's Permit Fee (Liquor)"){$mayorliquor+=$value['amount']; }
			  if($value['tfo']=="Mayor's Permit Fee (Wine)"){$mayorwine+=$value['amount']; }
			  if($value['tfo']=="Mayor's Permit Fee (Grains)"){$mayorgrain+=$value['amount']; }
			  if($value['tfo']=="police certification"){$police+=$value['amount']; }
			  if($value['tfo']=="health"){$health+=$value['amount']; }
			  if($value['tfo']=='Business Tax'){$busstax+=$value['amount']; }
			  if($value['tfo']=='Permit Fee-Others'){$permit+=$value['amount']; }


			  
		?>   
							   
  <!-- </p> -->
  <?php }   ?>
 
<?php 


foreach($info1 as $i){
	$a=json_decode($i->addtltfo,true);
}
	
 if($a!=null){
	   foreach($a as $d){$total+=$d['addttfoamount'];
		 				if($d['tfo']=='garbage fee'){ $garbage+=$d['addttfoamount']; } 
                        if($d['tfo']=='Non-Tax'){$non+=$d['addttfoamount']; }
                        if($d['tfo']=='Zoning Clearance'){$zone+=$d['addttfoamount']; }
                        if($d['tfo']=='Sanitary Permit'){$sanitary+=$d['addttfoamount']; }
                        if($d['tfo']=='Annual Inspection Fee'){$annual+=$d['addttfoamount']; }
                        if($d['tfo']=='Occupational Permit'){$occupation+=$d['addttfoamount']; }
                        if($d['tfo']=='Signage Fee'){$signage+=$d['addttfoamount']; }
                        if($d['tfo']=='Certification Fee'){$cert+=$d['addttfoamount']; }
                        if($d['tfo']=='Documentary Stamp'){$docu+=$d['addttfoamount']; }
                        if($d['tfo']=="Mayor's Permit Fee (Sari Sari)"){$mayorsari+=$d['addttfoamount']; }
                        if($d['tfo']=="Mayor's Permit Fee (Cigarette)"){$mayorcigar+=$d['addttfoamount']; }
                        if($d['tfo']=="Mayor's Permit Fee (Liquor)"){$mayorliquor+=$d['addttfoamount']; }
                        if($d['tfo']=="Mayor's Permit Fee (Wine)"){$mayorwine+=$d['addttfoamount']; }
                        if($d['tfo']=="Mayor's Permit Fee (Grains)"){$mayorgrain+=$d['addttfoamount']; }
                        if($d['tfo']=="police certification"){$police+=$d['addttfoamount']; }
                        if($d['tfo']=="health"){$health+=$d['addttfoamount']; }
                        if($d['tfo']=='Business Tax'){$busstax+=$d['addttfoamount']; }
                        if($d['tfo']=='Permit Fee-Others'){$permit+=$d['addttfoamount']; }
		 
	   }
	 }
	 
	
?>

  <?php $v=array();foreach($tfos as $tfo){$v[]=$tfo;}?>

		<td style="font-size:10px;padding-right:180px;">
			<span style="padding-left:0em;">
			<?php if($garbage!=0){echo 'Garbage Fee'.'<br>';}?>
			<?php if($non!=0){echo 'Non-Tax'.'<br>';}?>
			<?php if($zone!=0){echo 'Zoning Clearance Fee'.'<br>';}?>
			<?php if($sanitary!=0){echo 'Sanitary Permit'.'<br>';}?>
			<?php if($annual!=0){echo 'Annual Inspection Fee'.'<br>';}?>
			<?php if($occupation!=0){echo 'Occupational Permit'.'<br>';}?>
			<?php if($signage!=0){echo 'Signage Fee'.'<br>';}?>
			<?php if($cert!=0){echo 'Certification Fee'.'<br>';}?>
			<?php if($docu!=0){echo 'Documentary Stamp'.'<br>';}?>
			<?php if($mayorsari!=0){echo "Mayor's Permit Fee (Sari Sari)".'<br>';}?>
			<?php if($mayorcigar!=0){echo "Mayor's Permit Fee (Cigarette)".'<br>';}?>
			<?php if($mayorliquor!=0){echo "Mayor's Permit Fee (Liquor)".'<br>';}?>
			<?php if($mayorwine!=0){echo "Mayor's Permit Fee (Wine)".'<br>';}?>
			<?php if($mayorgrain!=0){echo "Mayor's Permit Fee (Grains)".'<br>';}?>
			<?php if($police!=0){echo 'police certification'.'<br>';}?>
			<?php if($health!=0){echo 'health'.'<br>';}?>
			<?php if($busstax!=0){echo 'Business Tax'.'<br>';}?>
			<?php if($permit!=0){echo 'Permit Fee-Others'.'<br>';}?>
				<?php 
					// $int_here =json_decode(json_encode($details['interest']),true);
					// if($int_here['interest']==0){}else{echo 'Interest<br>';}
					$sur_here =json_decode(json_encode($details['surcharge']),true);
					if($sur_here['surcharge']==0){}else{echo 'Surcharge';}
				?>
			</span>
		</td>
		<td style="font-size:10px;">
			<span style="padding-left:0em;">

			
			<?php 
			$payment_mode=json_decode(json_encode($details['payment']),true);
	
			if($payment_mode['payment']=="Annual"){
				$garbage = $garbage;
				$non = $non;
				$zone = $zone;
				$sanitary = $sanitary;
				$annual = $annual;
				$occupation = $occupation;
				$signage = $signage;
				$cert = $cert;
				$docu = $docu;
				$mayorsari = $mayorsari;
				$mayorcigar = $mayorcigar;
				$mayorliquor = $mayorliquor;
				$mayorwine = $mayorwine;
				$mayorgrain = $mayorgrain;
				$police = $police;
				$health = $health;
				$busstax = $busstax;
				$permit = $permit;
				
				$total = $total;
			} 
			else if($payment_mode['payment']=="Bi-Annual"){
				$busstax = $busstax/2;
				$total = $total-($busstax*1);
			}
			else if($payment_mode['payment']=="Quarterly"){
				$busstax = $busstax/4;
				$total = $total-($busstax*3);
			}
			?>
		
		
			<?php if($garbage!=0){echo ' &#8369;&nbsp;'.number_format($garbage,2).'<br>';}?>
			<?php if($non!=0){echo ' &#8369;&nbsp;'.number_format($non,2).'<br>';}?>
			<?php if($zone!=0){echo ' &#8369;&nbsp;'.number_format($zone,2).'<br>';}?>
			<?php if($sanitary!=0){echo ' &#8369;&nbsp;'.number_format($sanitary,2).'<br>';}?>
			<?php if($annual!=0){echo ' &#8369;&nbsp;'.number_format($annual,2).'<br>';}?>
			<?php if($occupation!=0){echo ' &#8369;&nbsp;'.number_format($occupation,2).'<br>';}?>
			<?php if($signage!=0){echo ' &#8369;&nbsp;'.number_format($signage,2).'<br>';}?>
			<?php if($cert!=0){echo ' &#8369;&nbsp;'.number_format($cert,2).'<br>';}?>
			<?php if($docu!=0){echo ' &#8369;&nbsp;'.number_format($docu,2).'<br>';}?>
			<?php if($mayorsari!=0){echo ' &#8369;&nbsp;'.number_format($mayorsari,2).'<br>';}?>
			<?php if($mayorcigar!=0){echo ' &#8369;&nbsp;'.number_format($mayorcigar,2).'<br>';}?>
			<?php if($mayorliquor!=0){echo ' &#8369;&nbsp;'.number_format($mayorliquor,2).'<br>';}?>
			<?php if($mayorwine!=0){echo ' &#8369;&nbsp;'.number_format($mayorwine,2).'<br>';}?>
			<?php if($mayorgrain!=0){echo ' &#8369;&nbsp;'.number_format($mayorgrain,2).'<br>';}?>
			<?php if($police!=0){echo ' &#8369;&nbsp;'.number_format($police,2).'<br>';}?>
			<?php if($health!=0){echo ' &#8369;&nbsp;'.number_format($health,2).'<br>';}?>
			<?php if($busstax!=0){echo ' &#8369;&nbsp;'.number_format($busstax,2).'<br>';}?>
			<?php if($permit!=0){echo ' &#8369;&nbsp;'.number_format($permit,2).'<br>';}?>
				<?php 
					// $int_here =json_decode(json_encode($details['interest']),true);
					// if($int_here['interest']==0){}else{$total+=$int_here['interest'];echo ' &#8369;&nbsp;'.number_format($int_here['interest'],2).'<br>';}
					$sur_here =json_decode(json_encode($details['surcharge']),true);
					if($sur_here['surcharge']==0){}else{$total+=$sur_here['surcharge'];echo ' &#8369;&nbsp;'.number_format($sur_here['surcharge'],2).'<br>';}
				?>
			</span>
		</td>

					
		</tr>
	</table>
	<br>
	<div id="tabstyle"></div>
	<div id="total">
		<?php echo ' &#8369;&nbsp;'.number_format($total,2)?>
	</div>
	<div id ="amwords">
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
				             $this->number = number_format($amount,2);
				             list($this->pesos,$this->pence) = explode('.',$this->number);
				             $this->words = " $this->major $this->pence$this->minor";
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
				             $res .= $res==''? '' : ' and';
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
				    $amount = $total;
				    $obj = new toWords($amount);
				    echo $obj->words;
		?>
	</div>

<!-- 	<div id="designation">
		<?php
			$name = (strlen($settings[1]->middleName) > 1) ? '-' : '. ';
			echo $settings[1]->firstName. ' '.$settings[1]->middleName.$name.$settings[1]->lastName;?>
		<br>
		<?php echo $settings[1]->designation;?>
	</div> -->
</div>

<?php
} else{?>
	<?php
	$totalsx=0;
	$busstaxlgu=0;
	
	$tfos = json_decode(json_encode($details['paid_tfo']),true);

	foreach ($tfos as $value) {$totalsx+=$value['amount']; ?>
			<?php 
			  if($value['tfo']=="BUSINESS TAX LGU ALEGRIA"){$busstaxlgu+=$value['amount']; }
			  
		?>   
							   
  <!-- </p> -->
  <?php }   ?>
 
<?php 


foreach($info1 as $i){
	$a=json_decode($i->addtltfo,true);
}
	
 if($a!=null){
	   foreach($a as $d){$totalsx+=$d['addttfoamount'];
		 if($d['tfo']=='BUSINESS TAX LGU ALEGRIA'){$busstaxlgu+=$d['addttfoamount']; }
	   }
	 }
	 
	
?>

  <?php $v=array();foreach($tfos as $tfo){$v[]=$tfo;}?>

		<td style="font-size:10px;padding-right:180px;">
			<span style="padding-left:0em;">
				<?php if($busstaxlgu!=0){echo ''.substr("BUSINESS TAX LGU ALEGRIA",0,12).'<br>';}?>
				<?php 
					$int_here =json_decode(json_encode($details['interest']),true);
					if($int_here['interest']==0){}else{echo 'Interest<br>';}
					$sur_here =json_decode(json_encode($details['surcharge']),true);
					if($sur_here['surcharge']==0){}else{echo 'Surcharge';}
				?>
			</span>
		</td>
		<td style="font-size:10px;">
			<span style="padding-left:0em;">

			
			<?php 
			$payment_mode=json_decode(json_encode($details['payment']),true);
	
			if($payment_mode['payment']=="Annual"){
				
				$totalsx = $totalsx;
			} 
			else if($payment_mode['payment']=="Bi-Annual"){
				$busstaxlgu = $busstaxlgu/2;
				$totalsx = ($totalsx-($totalsx-($busstaxlgu)));
			}
			else if($payment_mode['payment']=="Quarterly"){
				$busstaxlgu = $busstaxlgu/4;
				$totalsx = ($totalsx-($totalsx-($busstaxlgu)));
			}
			?>
	
				<?php if($busstaxlgu!=0){echo ' &#8369;&nbsp;'.number_format($busstaxlgu,2).'<br>';}?>
				
				<?php foreach($info1 as $j){$dec=json_decode($j->interest_n_surcharge,true);if($dec!=null){foreach($dec as $cd){ if($cd['interest']!=0||$cd['surcharge']!=0){$totalsx+=$cd['interest'];$totalsx+=$cd['surcharge'];echo '&#8369;&nbsp;'.number_format($cd['interest'],2).'<br>'; echo '&#8369;&nbsp;'.number_format($cd['surcharge'],2).'<br>';}else{echo "";}  }}}?>
				<?php 
					$int_here =json_decode(json_encode($details['interest']),true);
					if($int_here['interest']==0){}else{$totalsx+=$int_here['interest'];echo ' &#8369;&nbsp;'.number_format($int_here['interest'],2).'<br>';}
					$sur_here =json_decode(json_encode($details['surcharge']),true);
					if($sur_here['surcharge']==0){}else{$totalsx+=$sur_here['surcharge'];echo ' &#8369;&nbsp;'.number_format($sur_here['surcharge'],2).'<br>';}
				?>
			</span>
		</td>
		
				
		</tr>
	</table>
	<br>
	<div id="tabstyle"></div>
	<div id="total">
		<?php echo ' &#8369;&nbsp;'.number_format($totalsx,2)?>
	</div>
	<div id ="amwords">
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
				             $this->number = number_format($amount,2);
				             list($this->pesos,$this->pence) = explode('.',$this->number);
				             $this->words = " $this->major $this->pence$this->minor";
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
				             $res .= $res==''? '' : ' and';
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
				    $amount = $totalsx;
				    $obj = new toWords($amount);
				    echo $obj->words;
		?>
	</div>

<!-- 	<div id="designation">
		<?php
			$name = (strlen($settings[1]->middleName) > 1) ? '-' : '. ';
			echo $settings[1]->firstName. ' '.$settings[1]->middleName.$name.$settings[1]->lastName;?>
		<br>
		<?php echo $settings[1]->designation;?>
	</div> -->
</div>
<?php
	
}
?>
		
			
			

</body>
</html>
