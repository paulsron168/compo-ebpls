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
                         $app_id = $k->application_id;
                         $ownership = $k->ownership_id;
                         $permit_num = $k->permit_number;
                     }
                     ?> </b> <br>
                     DATE OF ASSESSMENT: <b> <?php
                     echo date('M d, Y ',strtotime($k->assessment_date)); 
                     $date1 = date_create(date('Y-m-d',strtotime("1/30/".substr($permit_num,0,4))));
                     $date2 = date_create(date('Y-m-d',strtotime($k->assessment_date)));                      
                     $diffdate = date_diff($date1, $date2);
                     $diff = $diffdate->format('%a'); 
                     ?> </b><br>
                     
                     BUSINESS ADDRESS: <strong><?php echo $barangay; ?></strong></span><b></b>
                 </div>
                 <h4><b class="charges"><u>CHARGES</u></b></h4>
                 <!-- <p> -->
                   <?php
                       $total=0;
                       $tfos = json_decode(json_encode($details['paid_tfo']),true);
                       $additional_tfo = json_decode($details['addtltfo'],true);

                   ?>
                  
                  <table style="margin-left:20%;" width="50%" border=0>
                     <center>
                     <th style="font-size:24px"><b>TFO NAME</b></th>
                     <th style="font-size:24px"><b>AMOUNT</b></th>
                     <center>
                     <tbody>
                     <tr>
                      <td style="font-size:16px">
                      <?php $total=0;$a=0;$bustax=0;

                        foreach ($tfos as $value) { 
                          if($value['tfo']=="Business Tax"){
                            $bustax+=$value['amount']; 
                            
                        if($bustax!=0){
                          echo "Business Tax <br>";
                        }

                            if($value['amount']==0){
                               if($app_id==1){
                                  echo "Capitalization (".$value['nature'].") ".$value['gross']."<br>";
                               }
                               if($ownership==5 || $ownership==10){
                                  echo "Business Exempty (".$value['nature'].") ".$value['gross']."<br>";
                               }
                            }
                          }
                          
                          else{
                            echo $value['tfo'].'<br>';
                          }
                            
                        }
               
                        
                   
                      ?>
                        <?php 
                        foreach($info as $i){
                        $a=json_decode($i->addtltfo,true);
                        
                        }
                        $tfosame=0;
                      
                        foreach($a as $tfo){
                          
                          if($tfo['tfo']==$value['tfo']){
                            $tfosame = $tfo['addttfoamount']+$value['amount'];
                           
                          }else{
                            if(stripos($i->addtltfo, 'quant')!== false){
                              if($tfo['quant'] > 1)
                              {
                                echo $tfo['tfo'].' x '.$tfo['quant'].'<br>';
                              }else{
                                echo $tfo['tfo'].'<br>';
                              }
                            }else{
                              echo $tfo['tfo'].'<br>';
                            }
                            
                          }
                          
                         
                        }
                        if($bustax!=0 && $diff>1){
                          echo "<b style='color:red'>Surcharge<br>";
                        }
                      ?>
            
                     </td>
                      <td style="font-size:16px;text-align:right; float:left;">

                      <?php 
                    echo '<b>&#8369;</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                      $total=0;
                        foreach ($tfos as $value) { $total+=$value['amount'];
                          if($value['tfo']=="Business Tax" ){
                            if($value['amount']==0){
                              if($app_id==1){
                                echo number_format(0,2).'<br>';
                              }
                              if($ownership==5 || $ownership==10){
                                echo number_format(0,2).'<br>';
                             }
                              
                            }else{
                              echo number_format($value['amount'],2).'<br>';
                            }
                          }
                          if($tfo['tfo']==$value['tfo']){
                            echo number_format($tfosame,2).'<br>';
                            
                          }else{
                            if($value['tfo']=="Business Tax"){
                              
                              if($value['amount']==0){

                              }
                            }else{
                              echo number_format($value['amount'],2).'<br>';
                              
                            }
                           
                          }
                        
                          
                          }  
                          
                   ?>
                     <?php 
                        
                        foreach($a as $tfo){
                          $total+=$tfo['addttfoamount'];
                          if($tfo['tfo']==$value['tfo']){
                            
                            
                          }else{
                            echo number_format($tfo['addttfoamount'],2).'<br>';
                          }
                          
                        }

                        if($bustax!=0 && $diff>1){
                          $surcharge=$bustax*0.25;
                          $total+=$surcharge;
                          echo '<b style=color:red>'.number_format($surcharge,2).'<br>';
                        }
                      ?>
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
