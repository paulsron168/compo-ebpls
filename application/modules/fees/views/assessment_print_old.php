<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.css'); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/mayor_permit.css'); ?>" type="text/css" />
<meta charset="utf-8">
 <title></title>
</head>
<style>
@media print{
	body{
		zoom:78%;
	}
	@page {
        size: A4 portrait;
        margin: 0.5cm;
    }
}
</style>
<style>

  .collage_bg{
    margin-left: 100px;
  }
  .tfo{float:left; margin-left: 250px; margin-top: 10px; display : block;}
  .number{float:left; margin-left: 510px; margin-top: -18%; display : block;}
  .number1{float:left; margin-left: 260px;  display : block;}
  .charges{margin-left:550px; font-size: 20px;}
  .miclass{margin-left: 240px;}
  .total{margin-left:240px;}
  .front{margin-left:-170px;}
   @media print{
      .churva2{float:right;display : block;margin-top:-80px;}
       .col-sm-4 {width: 33.33333333%;}
       .data{font-size:8px;}
       @page{size: 8.5in 5.5in;size: portrait;}
      .col-md-12{width:90%}
      .col-md-4{width:60.33333333%; margin-left:0px;}
      .col-sm-6{width:50%}
      .col-sm-8{width:66.66666667%}
      .col-sm-2{width:20.66666667%}
      .tfo{float:left; margin-left: 150px; margin-top: 5px; display : block;}
      .number{float:left; margin-left: 390px; margin-top:-30% ;display : block;}
      .number1{float:left; margin-left: 390px; margin-top:-10% ;display : block;}
      .miclass{margin-left: 150px;}
      .total{float:left;margin-left:150px;}
      .amount{margin-top:-25px;margin-left:250px;}
      .charges{margin-left:350px; font-size: 20px;}
      .front{margin-left:-50px;}
  }
</style>

<body class="collage_bg">

   <div class="row">
         <div class="col-md-12">
           <div class="col-md-4">
             <!--<div class="col-md-4" id="lgo">-->
               <img src="<?php echo base_url('assets/img/logos/logo2.png'); ?>" width="100" heigth="100" style="position:absolute;margin-top:25px;">
             <!--</div>-->
           </div>
           <div class="col-md-2 front" align="center">
             <h5><br>
             <span style="font-family: Arial; font-size: 18px; " class='header'>Republic of the Philippines</span><br>
             <span style="font-family: Arial; font-size: 18px;" class='header'>Province of Cebu</span><br>
             <span style="font-family: Arial; font-size: 18px;" class="header">Municipality of Compostela</span><br><br>
             <span style="font-family: Arial; font-size: 20px; font-weight: bold;" class="header">OFFICE OF THE MAYOR</span><br>
             <span style="font-family: Arial; font-size: 20px; font-weight: bold;" class="header">BUSINESS PERMIT AND LICENSING OFFICE</span><br>
             </h5>
             <h3 style="font-family: Arial; font-size:16px; " class='' ><b>ASSESSMENT FORM</b></h3>
           </div>
         </div>
         <div style="margin-top:30px; data">
             <div class="print_body">
                 <div class="col-sm-6 churva">
                 
                 <?php
                      foreach($info as $m){
                        $barangay = $m->brgy;
                     }
                 ?>

                     <span style="font-size:18px;">OWNER: <b><?php echo $m->firstname. ' '.$m->middlename. ' '.$m->lastname?></b> <br>
                     BUSINESS: <b><?php echo $m->business_name?></b> <br>
                     PAYMENT MODE: <b><?php echo $m->types; ?> </b></span>
                 </div>
                 <div class="col-sm-6 churva2">
                     <span style="font-size:18px;">TYPE OF BUSINESS: <?php
                     foreach($info as $k){
                         echo '<b>'.$k->business_nature.'</b>, ';
                     }
                     ?> </b> <br>
                     DATE OF ASSESSMENT: <b> <?php
                     echo date('M d, Y ',strtotime($k->assessment_date)); ?> </b><br>
                     
                     BUSINESS ADDRESS: <strong><?php echo $barangay; ?></strong></span><b></b>
                 </div>
                 <h4><b class="charges"><u>CHARGES</u></b></h4>
                 <!-- <p> -->
                   <?php
                       $total=0;
                       $tfos = json_decode(json_encode($details['paid_tfo']),true);
                       $additional_tfo = json_decode($details['addtltfo'],true);

                   ?>
                   
                  
       
                
                   <?php
                   $garbage=0;$non=0;$zone=0;$sanitary=0;$annual=0;$occupation=0;$signage=0;$cert=0;$docu=0;
                   $mayorsari=0;$mayorcigar=0;$mayorliquor=0;$mayorwine=0;$mayorgrain=0;$police=0;$health=0;
                   $busstax=0;$permit=0;
                 
                   foreach ($tfos as $value) {$total+=$value['amount']; ?>
                       <b><?php //echo $value['tfo'] . (empty($value['nature']) ? '' : '-'.$value['nature'].'( '.$value['gross'].')');?></b> 
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
              
                 <?php }   ?>
                
               <?php 
                    foreach($info as $i){
                 
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
                        if($d['tfo']=="Health/Medical Certificate"){$health+=$d['addttfoamount']; }
                        if($d['tfo']=='Business Tax'){$busstax+=$d['addttfoamount']; }
                        if($d['tfo']=='Permit Fee-Others'){$permit+=$d['addttfoamount']; }
                      }
                    }
                   
               ?>
         
                  <table style="margin-left:20%;" width="50%" border=0>
                     <center>
                     <th style="font-size:24px"><b>TFO NAME</b></th>
                     <th style="font-size:24px"><b>AMOUNT</b></th>
                     <center>
                     <tbody>
                     <tr>
                      <td style="font-size:16px">
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
                          <?php if($police!=0){echo 'Police Certification'.'<br>';}?>
                          <?php if($health!=0){echo 'Health / Medical Certificate'.'<br>';}?>
                          <?php if($busstax!=0){echo 'Business Tax'.'<br>';}?>
                          <?php if($permit!=0){echo 'Permit Fee-Others'.'<br>';}?>
                          <?php foreach($info as $j){$dec=json_decode($j->interest_n_surcharge,true);if($dec!=null){foreach($dec as $cd){ if($cd['interest']!=0||$cd['surcharge']!=0){echo 'Interest  <br>'; echo 'Surcharge  <br>';}else{echo "";}  }}}?>
                      </td>
                      <td style="font-size:16px">
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
                          <?php foreach($info as $j){$dec=json_decode($j->interest_n_surcharge,true);if($dec!=null){foreach($dec as $cd){ if($cd['interest']!=0||$cd['surcharge']!=0){$total+=$cd['interest'];$total+=$cd['surcharge'];echo '&#8369;&nbsp;'.number_format($cd['interest'],2).'<br>'; echo '&#8369;&nbsp;'.number_format($cd['surcharge'],2).'<br>';}else{echo "";}  }}}?>
                      </td>
                     </tr>
                     <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                     <?php $v=array();foreach($tfos as $tfo){$v[]=$tfo;}?>
                     <tr>
                      <td style="font-size:20px">
                        <b><?php echo 'Total Amount';?></b>
                      </td>                     
                      <td style="font-size:20px">
                        <b><?php echo '&#8369;&nbsp;'.number_format($total,2);?></b>
                      </td>
                     </tr>
                     </tbody>
                   </table>
                 
  

                   
             </div>
       </div>
   
 </div>
</body>
</html>
