<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.css'); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/mayor_permit.css'); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/w3.css'); ?>" type="text/css" />

<meta charset="utf-8">
	<title></title>
<style>
.w3-third{
	width:20%;
}
body {font-family: Arial, Helvetica, sans-serif;}

#myImg{
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}
#myImg1{
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}
#myImg2{
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}
#myImg3{
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}
#myImg4{
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}



#myImg:hover {opacity: 0.7;}
#myImg1:hover {opacity: 0.7;}
#myImg2:hover {opacity: 0.7;}
#myImg3:hover {opacity: 0.7;}
#myImg4:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
</head>

<div class="w3-container w3-teal">
  <h1>Document Preview</h1>
</div>
<?php

if(empty($details->image)){
						echo "<script>alert('No Available Data');window.close();</script>" ;
		}else{ ?>
<div class="w3-row-padding w3-margin-top">
  <div class="w3-third">
    <div class="w3-card">
      <img id="myImg" src="<?php echo base_url($details->image); ?> " style="width:100%">
      <div class="w3-container">
        <h5>Image 001</h5>
      </div>
    </div>
  </div>
  <?php } ?>

  <?php
		if(!empty($details->image1)){ ?>
  <div class="w3-third">
    <div class="w3-card">
      <img id="myImg1" src="<?php echo base_url($details->image1); ?> " style="width:100%">
      <div class="w3-container">
        <h5>Image 002</h5>
      </div>
    </div>
  </div>
  <?php } else{} ?>

<?php
		if(!empty($details->image2)){ ?>
  <div class="w3-third">
    <div class="w3-card">
      <img id="myImg2" src="<?php echo base_url($details->image2); ?> " style="width:100%">
      <div class="w3-container">
        <h5>Image 003</h5>
      </div>
    </div>
  </div>

 <?php } else{} ?>

<?php
		if(!empty($details->image3)){ ?>
  <div class="w3-third">
    <div class="w3-card">
      <img id="myImg3" src="<?php echo base_url($details->image3); ?> " style="width:100%">
      <div class="w3-container">
        <h5>Image 004</h5>
      </div>
    </div>
  </div>
  <?php } else{} ?>

<?php
	if(!empty($details->image3)){ ?>
  <div class="w3-third">
    <div class="w3-card">
      <img id="myImg4" src="<?php echo base_url($details->image4); ?> " style="width:100%">
      <div class="w3-container">
        <h5>Image 005</h5>
      </div>
    </div>
  </div>
  <?php } else{} ?>

<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img">
  <div id="caption"></div>
</div>

</body>

<script>

//IMAGE 01
var modal = document.getElementById('myModal');

var img = document.getElementById('myImg');
var modalImg = document.getElementById("img");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

var span = document.getElementsByClassName("close")[0];

span.onclick = function() { 
  modal.style.display = "none";
}

//IMAGE 02
var modal1 = document.getElementById('myModal');

var img1 = document.getElementById('myImg1');
var modalImg1 = document.getElementById("img");
var captionText1 = document.getElementById("caption");
img1.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

var span1 = document.getElementsByClassName("close")[0];

span1.onclick = function() { 
  modal.style.display = "none";
}

//IMAGE 03
var modal2 = document.getElementById('myModal');

var img2 = document.getElementById('myImg2');
var modalImg2 = document.getElementById("img");
var captionText2 = document.getElementById("caption");
img2.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

var span2 = document.getElementsByClassName("close")[0];

span2.onclick = function() { 
  modal.style.display = "none";
}

//IMAGE 04
var modal3 = document.getElementById('myModal');

var img3 = document.getElementById('myImg3');
var modalImg3 = document.getElementById("img");
var captionText3 = document.getElementById("caption");
img3.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

var span3 = document.getElementsByClassName("close")[0];

span3.onclick = function() { 
  modal.style.display = "none";
}

//IMAGE 05
var modal4 = document.getElementById('myModal');

var img4 = document.getElementById('myImg4');
var modalImg4 = document.getElementById("img");
var captionText4 = document.getElementById("caption");
img4.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

var span4 = document.getElementsByClassName("close")[0];

span4.onclick = function() { 
  modal.style.display = "none";
}
</script>


</html>
