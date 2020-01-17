

<style>
.green{background-color:#16c523;color:#fff;}
.green:hover{background-color:#1d8c25;}
.span_stall{ position: absolute; cursor: pointer; box-shadow: 0px 0px 1px #000; text-align: center; background-color: #b5b1b1;border:none;border-radius: 2px 2px;}
.span:hover{background-color: #ff000094;color: #fff;}
.stalls{  margin: 10px 10px; box-shadow: 0px 0px 5px #737373; background-color: #b5b1b1; color: #fff; }
.green{ box-shadow: 0px 0px 5px #3aa25fa1;  color: #fff; background-color: #16c523; }
.container{ width: 1000px; }
.select{ padding:5px 5px; }
.con123{ margin-top: 15px; height: 600px;padding: 10px 10px;}


/* spans */
.A-28{ margin-top: 390px; margin-left: 0px; width: 50px; height: 60px; }
.A-27{ margin-top: 390px; margin-left: 50px; width: 110px; height: 60px; z-index: 1;}
.A-27p{ margin-top: 390px; margin-left: 70px; width: 110px; height: 75px; z-index: 0;}
.A-27pLabel{position: absolute; bottom: -10px;font-size: 11px;}
.A-26{ margin-top: 390px; margin-left: 205px; width: 90px; height: 60px; }
.A-25{ margin-top: 390px; margin-left: 325px; width: 60px; height: 60px; }
.A-24{ margin-top: 390px; margin-left: 385px; width: 58px; height: 60px; }
.A-23{ margin-top: 390px; margin-left: 443px; width: 57px; height: 60px; }
.A-16{ margin-top: 490px; margin-left: 0px; width: 50px; height: 20px; }
.A-1{ margin-top: 510px; margin-left: 0px; width: 50px; height: 40px; }
.A-17{ margin-top: 490px; margin-left: 70px; width: 50px; height: 20px; }
.A-18{ margin-top: 490px; margin-left: 120px; width: 50px; height: 20px; }
.A-15{ margin-top: 510px; margin-left: 70px; width: 50px; height: 20px; }
.A-14{ margin-top: 510px; margin-left: 120px; width: 50px; height: 20px; }
.A-2{ margin-top: 530px; margin-left: 70px; width: 50px; height: 20px; }
.A-3{ margin-top: 530px; margin-left: 120px; width: 50px; height: 20px; }
.A-19{ margin-top: 490px; margin-left: 200px; width: 50px; height: 20px; }
.A-20{ margin-top: 490px; margin-left: 250px; width: 50px; height: 20px; }
.A-13{ margin-top: 510px; margin-left: 200px; width: 50px; height: 20px; }
.A-12{ margin-top: 510px; margin-left: 250px; width: 50px; height: 20px; }
.A-4{ margin-top: 530px; margin-left: 200px; width: 50px; height: 20px; }
.A-5{ margin-top: 530px; margin-left: 250px; width: 50px; height: 20px; }
.A-21{ margin-top: 490px; margin-left: 325px; width: 50px; height: 20px; }
.A-22{ margin-top: 490px; margin-left: 375px; width: 50px; height: 20px; }
.A-11{ margin-top: 510px; margin-left: 325px; width: 50px; height: 20px; }
.A-10{ margin-top: 510px; margin-left: 375px; width: 50px; height: 20px; }
.A-6{ margin-top: 530px; margin-left: 325px; width: 50px; height: 20px; }
.A-7{ margin-top: 530px; margin-left: 375px; width: 50px; height: 20px; }
.A-9{ margin-top: 490px; margin-left: 450px; width: 50px; height: 40px; }
.A-8{ margin-top: 530px; margin-left: 450px; width: 50px; height: 20px; }
.A-8p{ margin-top: 530px; margin-left: 501px; width: 20px; height: 20px; }
.A-8pLabel{font-size: 9px;}
.B-1{ margin-top: 515px; margin-left: 550px; width: 55px; height: 40px; }
.B-3{ margin-top: 475px; margin-left: 550px; width: 55px; height: 40px; }
.B-5{ margin-top: 435px; margin-left: 550px; width: 55px; height: 40px; }
.B-8{ margin-top: 393px; margin-left: 550px; width: 55px; height: 42px; }
.B-9{ margin-top: 350px; margin-left: 550px; width: 55px; height: 43px; }
.B-11{ margin-top: 310px; margin-left: 550px; width: 55px; height: 40px; }
.B-13{ margin-top: 270px; margin-left: 550px; width: 55px; height: 40px; }
.B-2{ margin-top: 505px; margin-left: 630px; width: 55px; height: 50px; }
.B-4{ margin-top: 455px; margin-left: 630px; width: 55px; height: 50px; }
.B-6{ margin-top: 365px; margin-left: 630px; width: 55px; height: 90px; }
.B-7{ margin-top: 318px; margin-left: 630px; width: 55px; height: 47px; }
.B-10{ margin-top: 270px; margin-left: 630px; width: 55px; height: 48px; }
.B-14{ margin-top: 270px; margin-left: 456px; width: 44px; height: 80px; }
.B-15{ margin-top: 270px; margin-left: 413px; width: 43px; height: 80px; }
.B-16{ margin-top: 270px; margin-left: 368px; width: 45px; height: 80px; }
.B-17{ margin-top: 270px; margin-left: 325px; width: 43px; height: 80px; }
.B-18{ margin-top: 270px; margin-left: 205px; width: 90px; height: 80px; }
.B-21{ margin-top: 270px; margin-left: 0px; width: 55px; height: 80px; }
.B-20{ margin-top: 270px; margin-left: 55px; width: 55px; height: 80px; }
.B-19{ margin-top: 270px; margin-left: 110px; width: 55px; height: 80px; }
.B-22{ margin-top: 160px; margin-left: 0px; width: 55px; height: 80px; }
.B-23{ margin-top: 160px; margin-left: 55px; width: 55px; height: 80px; }
.B-24{ margin-top: 160px; margin-left: 110px; width: 55px; height: 80px; }
.B-25{ margin-top: 160px; margin-left: 205px; width: 59px; height: 80px; }
.B-26{ margin-top: 160px; margin-left: 264px; width: 59px; height: 80px; }
.B-27{ margin-top: 160px; margin-left: 323px; width: 59px; height: 80px; }
.B-28{ margin-top: 160px; margin-left: 382px; width: 59px; height: 80px; }
.B-29{ margin-top: 160px; margin-left: 441px; width: 59px; height: 80px; }
.B-30{ margin-top: 160px; margin-left: 550px; width: 50px; height: 80px; }
.B-31{ margin-top: 160px; margin-left: 630px; width: 50px; height: 40px; }
.B-12{ margin-top: 200px; margin-left: 630px; width: 50px; height: 40px; }
.C-1{ margin-top: 100px; margin-left: 0px; width: 55px; height: 20px; }
.C-2{ margin-top: 80px; margin-left: 0px; width: 55px; height: 20px; }
.C-3{ margin-top: 60px; margin-left: 0px; width: 55px; height: 20px; }
.C-4{ margin-top: 100px; margin-left: 89px; width: 55px; height: 20px; }
.C-5{ margin-top: 80px; margin-left: 89px; width: 55px; height: 20px; }
.C-6{ margin-top: 60px; margin-left: 89px; width: 55px; height: 20px; }
.C-7{ margin-top: 100px; margin-left: 178px; width: 55px; height: 20px; }
.C-8{ margin-top: 80px; margin-left: 178px; width: 55px; height: 20px; }
.C-9{ margin-top: 60px; margin-left: 178px; width: 55px; height: 20px; }
.C-10{ margin-top: 100px; margin-left: 267px; width: 55px; height: 20px; }
.C-11{ margin-top: 80px; margin-left: 267px; width: 55px; height: 20px; }
.C-12{ margin-top: 60px; margin-left: 267px; width: 55px; height: 20px; }
.C-13{ margin-top: 100px; margin-left: 356px; width: 55px; height: 20px; }
.C-14{ margin-top: 80px; margin-left: 356px; width: 55px; height: 20px; }
.C-15{ margin-top: 60px; margin-left: 356px; width: 55px; height: 20px; }
.C-16{ margin-top: 100px; margin-left: 445px; width: 55px; height: 20px; }
.C-17{ margin-top: 80px; margin-left: 445px; width: 55px; height: 20px; }
.C-18{ margin-top: 60px; margin-left: 445px; width: 55px; height: 20px; }
.C-19{ margin-top: 100px; margin-left: 550px; width: 55px; height: 20px; }
.C-20{ margin-top: 80px; margin-left: 550px; width: 55px; height: 20px; }
.C-21{ margin-top: 60px; margin-left: 550px; width: 55px; height: 20px; }
.C-22{ margin-top: 40px; margin-left: 550px; width: 55px; height: 20px; }
.C-23{ margin-top: 20px; margin-left: 550px; width: 55px; height: 20px; }
.C-24{ margin-top: 0px; margin-left: 550px; width: 55px; height: 20px; }
.C-3432{ margin-top: 0px; margin-left: 0px; width: 140px; height: 20px; }
.C-31{ margin-top: 0px; margin-left: 140px; width: 55px; height: 20px; }
.C-30{ margin-top: 0px; margin-left: 195px; width: 55px; height: 20px; }
.C-29{ margin-top: 0px; margin-left: 250px; width: 55px; height: 20px; }
.C-28{ margin-top: 0px; margin-left: 305px; width: 55px; height: 20px; }
.C-27{ margin-top: 0px; margin-left: 360px; width: 55px; height: 20px; }
.C-26{ margin-top: 0px; margin-left: 415px; width: 55px; height: 20px; }
.C-25{ margin-top: 0px; margin-left: 470px; width: 55px; height: 20px; }



/* modal */
#modal-body{ position: relative; width: 100%; height: 500px;  background-color: #fff; background-image: url("../assets/img/logos/logo1.png"); background-repeat: no-repeat; background-size: 450px 450px; background-position: center; background-color: rgba(255, 255, 255, 0.7); background-blend-mode: lighten; }
.zooming{ padding: 25px;  transition: 0.15s padding ease-out; color: white; }
#papi{ position:absolute; cursor: pointer; right: 50px; background-color: transparent; color: #636162; font-size: 50px; text-shadow: 0px 0px 3px #efeeee; }
#papi:hover{ color: #cac7c7; }
.pop_tbl{  width: calc(100% - 40px); margin: 20px 20px; background-color: transparent; font-size: 15px; letter-spacing: 2px;text-shadow: 1px 2px 1px #f7f7f7; font-weight: bold; text-align: left; color: #000; }
</style>

<div id="page-wrapper">
	<div class="row">
    
        <br/>
        <h2>Poblacion Public Market Stall</h2><br/>
        <div class = 'container' style = 'border: none;'>
            <div class="header">
            <form method="GET" action="">
                <select class="select" name = 'year'>
                <option id = '0'>Select Year</option>
                 <?php
                    // $startyear = (int)date('Y');
                    $firstYear = 2018;
                    $lastYear = (int)date('Y') + 5;
                    for($i=$firstYear;$i<=$lastYear;$i++)
                    {
                        echo '<option value='.$i.'>'.$i.'</option>';
                    }
                    echo '<option value='.$i.'>'.$i.'</option>';
                ?>
                </select>
                <button id= 'baka' class = 'btn btn-primary'>Select Year</button>
            </form>
            </div>
        </div>
            <div class = 'container con123'>
                
                <div id = 'bldg_A'>
                <span class = 'span_stall A-28 span'  ><label class = 'A-28Label'>A-28<label></span>
                    <span class = 'span_stall A-27 span'><label class = 'A-27Label'>A-27<label></span>
                    <span class = 'span_stall A-27p span'><label class = 'A-27pLabel'>A-27p<label></span>
                    <span class = 'span_stall A-26 span'><label class = 'A-26Label'>A-26<label></span>
                    <span class = 'span_stall A-25 span'><label class = 'A-25Label'>A-25<label></span>
                    <span class = 'span_stall A-24 span'><label class = 'A-24Label'>A-24<label></span>
                    <span class = 'span_stall A-23 span'><label class = 'A-23Label'>A-23<label></span>
                    <span class = 'span_stall A-16 span'><label class = 'A-16Label'>A-16<label></span>
                    <span class = 'span_stall A-1 span'><label class = 'A-1Label'>A-1<label></span>
                    <span class = 'span_stall A-17 span'><label class = 'A-17Label'>A-17<label></span>
                    <span class = 'span_stall A-18 span'><label class = 'A-18Label'>A-18<label></span>
                    <span class = 'span_stall A-15 span'><label class = 'A-15Label'>A-15<label></span>
                    <span class = 'span_stall A-14 span'><label class = 'A-14Label'>A-14<label></span>
                    <span class = 'span_stall A-2 span'><label class = 'A-2Label'>A-2<label></span>
                    <span class = 'span_stall A-3 span'><label class = 'A-3Label'>A-3<label></span>
                    <span class = 'span_stall A-19 span'><label class = 'A-19Label'>A-19<label></span>
                    <span class = 'span_stall A-20 span'><label class = 'A-20Label'>A-20<label></span>
                    <span class = 'span_stall A-13 span'><label class = 'A-13Label'>A-13<label></span>
                    <span class = 'span_stall A-12 span'><label class = 'A-12Label'>A-12<label></span>
                    <span class = 'span_stall A-4 span'><label class = 'A-4Label'>A-4<label></span>
                    <span class = 'span_stall A-5 span'><label class = 'A-5Label'>A-5<label></span>
                    <span class = 'span_stall A-21 span'><label class = 'A-21Label'>A-21<label></span>
                    <span class = 'span_stall A-22 span'><label class = 'A-22Label'>A-22<label></span>
                    <span class = 'span_stall A-11 span'><label class = 'A-11Label'>A-11<label></span>
                    <span class = 'span_stall A-10 span'><label class = 'A-10Label'>A-10<label></span>
                    <span class = 'span_stall A-6 span'><label class = 'A-6Label'>A-6<label></span>
                    <span class = 'span_stall A-7 span'><label class = 'A-7Label'>A-7<label></span>
                    <span class = 'span_stall A-9 span'><label class = 'A-9Label'>A-9<label></span>
                    <span class = 'span_stall A-8 span'><label class = 'A-8Label'>A-8<label></span>
                    <span class = 'span_stall A-8p span'><label class = 'A-8pLabel'>A-8p<label></span>
                    <!-- Building B -->
                    <span class = 'span_stall B-1 span'><label class = 'B-1Label'>B-1<label></span>
                    <span class = 'span_stall B-3 span'><label class = 'B-3Label'>B-3<label></span>
                    <span class = 'span_stall B-5 span'><label class = 'B-5Label'>B-5<label></span>
                    <span class = 'span_stall B-8 span'><label class = 'B-8Label'>B-8<label></span>
                    <span class = 'span_stall B-9 span'><label class = 'B-9Label'>B-9<label></span>
                    <span class = 'span_stall B-11 span'><label class = 'B-11Label'>B-11<label></span>
                    <span class = 'span_stall B-13 span'><label class = 'B-13Label'>B-13<label></span>
                    <span class = 'span_stall B-2 span'><label class = 'B-2Label'>B-2<label></span>
                    <span class = 'span_stall B-4 span'><label class = 'B-4Label'>B-4<label></span>
                    <span class = 'span_stall B-6 span'><label class = 'B-6Label'>B-6<label></span>
                    <span class = 'span_stall B-7 span'><label class = 'B-7Label'>B-7<label></span>
                    <span class = 'span_stall B-10 span'><label class = 'B-10Label'>B-10<label></span>
                    <span class = 'span_stall B-14 span'><label class = 'B-14Label'>B-14<label></span>
                    <span class = 'span_stall B-15 span'><label class = 'B-15Label'>B-15<label></span>
                    <span class = 'span_stall B-16 span'><label class = 'B-16Label'>B-16<label></span>
                    <span class = 'span_stall B-17 span'><label class = 'B-17Label'>B-17<label></span>
                    <span class = 'span_stall B-18 span'><label class = 'B-18Label'>B-18<label></span>
                    <span class = 'span_stall B-21 span'><label class = 'B-21Label'>B-19<label></span>
                    <span class = 'span_stall B-20 span'><label class = 'B-20Label'>B-20<label></span>
                    <span class = 'span_stall B-19 span'><label class = 'B-19Label'>B-21<label></span>
                    <span class = 'span_stall B-22 span'><label class = 'B-22Label'>B-22<label></span>
                    <span class = 'span_stall B-23 span'><label class = 'B-23Label'>B-23<label></span>
                    <span class = 'span_stall B-24 span'><label class = 'B-24Label'>B-24<label></span>
                    <span class = 'span_stall B-25 span'><label class = 'B-25Label'>B-25<label></span>
                    <span class = 'span_stall B-26 span'><label class = 'B-26Label'>B-26<label></span>
                    <span class = 'span_stall B-27 span'><label class = 'B-27Label'>B-27<label></span>
                    <span class = 'span_stall B-28 span'><label class = 'B-28Label'>B-28<label></span>
                    <span class = 'span_stall B-29 span'><label class = 'B-29Label'>B-29<label></span>
                    <span class = 'span_stall B-30 span'><label class = 'B-30Label'>B-30<label></span>
                    <span class = 'span_stall B-31 span'><label class = 'B-31Label'>B-31<label></span>
                    <span class = 'span_stall B-12 span'><label class = 'B-12Label'>B-12<label></span>
                    <!-- building C -->
                    <span class = 'span_stall C-1 span'><label class = 'C-1Label'>C-1<label></span>
                    <span class = 'span_stall C-2 span'><label class = 'C-2Label'>C-2<label></span>
                    <span class = 'span_stall C-3 span'><label class = 'C-3Label'>C-3<label></span>
                    <span class = 'span_stall C-4 span'><label class = 'C-4Label'>C-4<label></span>
                    <span class = 'span_stall C-7 span'><label class = 'C-7Label'>C-7<label></span>
                    <span class = 'span_stall C-10 span'><label class = 'C-10Label'>C-10<label></span>
                    <span class = 'span_stall C-13 span'><label class = 'C-13Label'>C-13<label></span>
                    <span class = 'span_stall C-16 span'><label class = 'C-16Label'>C-16<label></span>
                    <span class = 'span_stall C-19 span'><label class = 'C-19Label'>C-19<label></span>
                    <span class = 'span_stall C-5 span'><label class = 'C-5Label'>C-5<label></span>
                    <span class = 'span_stall C-6 span'><label class = 'C-6Label'>C-6<label></span>
                    <span class = 'span_stall C-8 span'><label class = 'C-8Label'>C-8<label></span>
                    <span class = 'span_stall C-9 span'><label class = 'C-9Label'>C-9<label></span>
                    <span class = 'span_stall C-11 span'><label class = 'C-11Label'>C-11<label></span>
                    <span class = 'span_stall C-12 span'><label class = 'C-12Label'>C-12<label></span>
                    <span class = 'span_stall C-14 span'><label class = 'C-14Label'>C-14<label></span>
                    <span class = 'span_stall C-15 span'><label class = 'C-15Label'>C-15<label></span>
                    <span class = 'span_stall C-17 span'><label class = 'C-17Label'>C-17<label></span>
                    <span class = 'span_stall C-18 span'><label class = 'C-18Label'>C-18<label></span>
                    <span class = 'span_stall C-20 span'><label class = 'C-20Label'>C-20<label></span>
                    <span class = 'span_stall C-21 span'><label class = 'C-21Label'>C-21<label></span>
                    <span class = 'span_stall C-22 span'><label class = 'C-22Label'>C-22<label></span>
                    <span class = 'span_stall C-23 span'><label class = 'C-23Label'>C-23<label></span>
                    <span class = 'span_stall C-24 span'><label class = 'C-24Label'>C-24<label></span>
                    <span class = 'span_stall C-25 span'><label class = 'C-25Label'>C-25<label></span>
                    <span class = 'span_stall C-26 span'><label class = 'C-26Label'>C-26<label></span>
                    <span class = 'span_stall C-27 span'><label class = 'C-27Label'>C-27<label></span>
                    <span class = 'span_stall C-28 span'><label class = 'C-28Label'>C-28<label></span>
                    <span class = 'span_stall C-29 span'><label class = 'C-29Label'>C-29<label></span>
                    <span class = 'span_stall C-30 span'><label class = 'C-30Label'>C-30<label></span>
                    <span class = 'span_stall C-31 span'><label class = 'C-31Label'>C-31<label></span>
                    <span class = 'span_stall C-3432 span'><label class = 'C-3432Label'>C-32,33,34<label></span>
                <?php 
                    foreach($result->result() as $res){
                        if($res->stall_num == 'C-32,33,34'){
                            echo "<span id = 'stall".$res->id."' class = 'span_stall C-3432 green ' onclick='popBig(".$res->id.")' 
                            permit='".$res->permit_number."' owner = '".$res->firstname." ".$res->middlename." ".$res->lastname."'
                            starea = '".$res->stall_area."' stval = '".$res->stall_val."'  businessName = '".$res->business_name."'
                            stnum = '".$res->stall_num."' 
                            ><label class = 'C-3432Label'>".$res->stall_num."<label></span>";
                        }else{
                            echo "<span id = 'stall".$res->id."' class = 'span_stall ".$res->stall_num." green ' onclick='popBig(".$res->id.")'
                            permit='".$res->permit_number."' owner = '".$res->firstname." ".$res->middlename." ".$res->lastname."'
                            starea = '".$res->stall_area."' stval = '".$res->stall_val."'  businessName = '".$res->business_name."'
                            stnum = '".$res->stall_num."' 
                            ><label class = '".$res->stall_num."Label'>".$res->stall_num."<label></span>";
                        }
                       
                    }
                ?>
                 
                 
                </div>

            </div>

            <div>
                <br/>
                <button class = 'btn stalls'></button><span>If unoccupied</span><br/>
                <button class = 'btn stalls green'></button><span>If occupied</span>
            </div>

            <div id="mapPop" class="modal modal-styled fade in" style = 'background-color: #00000061;'>
                <span id = 'papi' onclick="closePapi()" ><li class = 'fa fa-times'></li></span>

                <div class="modal-dialog modeliberuglongon" style="width:500px;display:none;">
                    <div class="modal-content">
                        <div class="modal-header" style= 'text-align:center;'>
                            <h2 id = 'st_no'>Stall No. </h2>
                        </div>
                        <div id="modal-body">

                            <table class = "pop_tbl">
                                <tr><br/>
                                    <td><span>Permit Number :</span><br/>
                                    <input id = 'permit_no' class = 'form-control' 
                                    style = 'color: #000;
                                            margin-top: 5px;
                                            margin-bottom: 10px;
                                            text-align: center;
                                            font-size: 25px;
                                            background-color: transparent;
                                            text-shadow: 1px 2px 1px #f7f7f7;
                                            box-shadow: inset 0 0px 0px rgba(0,0,0,.075);
                                            border:none;
                                            border-bottom: 1px solid #ccc;
                                            border-radius: 0px 0px;' 
                                    value = '' name = 'permit_no' readonly></td>
                                </tr>
                                <tr>
                                    <td><span>Name of Owner :</span><br/>
                                    <input id = 'own_nm' class = 'form-control' 
                                    style = 'color: #000;
                                            margin-top: 5px;
                                            margin-bottom: 10px;
                                            text-align: center;
                                            font-size: 25px;
                                            background-color: transparent;
                                            text-shadow: 1px 2px 1px #f7f7f7;
                                            box-shadow: inset 0 0px 0px rgba(0,0,0,.075);
                                            border:none;
                                            border-bottom: 1px solid #ccc;
                                            border-radius: 0px 0px;' 
                                    value = '' name = 'own_nm' readonly></td>
                                </tr>
                                <tr>
                                    <td><span>Name of Business :</span><br/>
                                    <textarea id = 'buss_nm' class = 'form-control' 
                                    style = 'color: #000;
                                            margin-top: 5px;
                                            margin-bottom: 10px;
                                            text-align: center;
                                            font-size: 25px;
                                            background-color: transparent;
                                            text-shadow: 1px 2px 1px #f7f7f7;
                                            border:none;
                                            border-bottom: 1px solid #ccc;
                                            box-shadow: inset 0 0px 0px rgba(0,0,0,.075);
                                            border-radius: 0px 0px;
                                            resize: vertical;' 
                                    name = 'buss_nm' readonly></textarea></td>
                                </tr>

                                <tr>
                                    <td><span>Stall Area : </span><br/>
                                    <input id = 'starea' class = 'form-control' 
                                    style = 'color: #000;
                                            margin-top: 5px;
                                            margin-bottom: 10px;
                                            text-align: center;
                                            font-size: 25px;
                                            background-color: transparent;
                                            text-shadow: 1px 2px 1px #f7f7f7;
                                            box-shadow: inset 0 0px 0px rgba(0,0,0,.075);
                                            border:none;
                                            border-bottom: 1px solid #ccc;
                                            border-radius: 0px 0px' 
                                    value = '' name = 'own_nm' readonly></td>
                                </tr>
                                <tr>
                                    <td><span>Stall Value : </span><br/>
                                    <input id = 'stvalue' class = 'form-control' 
                                    style = 'color: #000;
                                            margin-top: 5px;
                                            margin-bottom: 10px;
                                            text-align: center;
                                            font-size: 25px;
                                            background-color: transparent;
                                            text-shadow: 1px 2px 1px #f7f7f7;
                                            box-shadow: inset 0 0px 0px rgba(0,0,0,.075);
                                            border:none;
                                            border-bottom: 1px solid #ccc;
                                            border-radius: 0px 0px' 
                                    value = '' name = 'own_nm' readonly></td>
                                </tr>

                            </table>
                            
                        </div> <!--end of modal-body-->
                    </div> <!-- end of modal-content-->
                </div> <!-- end of modeliberuglongon -->
            </div> <!-- end of mapPop-->
            
	</div>
</div>
<script src="http://code.jquery.com/jquery.js"></script>
<script>

function closePapi(){

        $(".modeliberuglongon").hide();
        $("#mapPop").hide();
        $( ".stalls" ).removeClass("zooming");

}


function popBig(id){

    var per = $("#stall"+id).attr('permit');
    var own = $("#stall"+id).attr('owner');
    var buss = $("#stall"+id).attr('businessName');
    var starea = $("#stall"+id).attr('starea');
    var stnum = $("#stall"+id).attr('stnum');
    var stval = $("#stall"+id).attr('stval');
    var due = $("#stall"+id).attr('dueni');
        $("#mapPop").show();
        $("#st_no").text("Stall No. " + stnum);
        $("#permit_no").val(per);
        $("#own_nm").val(own);
        $("#buss_nm").val(buss);
        $("#stvalue").val("₱ "+stval);
        $("#starea").val(starea + " sqm.");

    if(due == 'renewed'){
        $(".modal-header").css('background-color', '#1dab4f');
    }else if(due == 'due'){
        $(".modal-header").css('background-color', '#ff000094');
    }else{
        $(".modal-header").css('background-color', '#000');
    }

    $(".modeliberuglongon").slideDown(500);
}

</script>






