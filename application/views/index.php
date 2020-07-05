<!DOCTYPE html>
<html>
<head>
  <title>Chibi Smoothie Art</title>
  <meta charset="UTF-8">
  <!--roboto font family-->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lobster+Two&display=swap" rel="stylesheet">
  <!--bootstrap file -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/users_assets/js/bootstrap/css/bootstrap.min.css">
  <!--font-awesome icon file-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/users_assets/font/css/font-awesome.min.css">
  <!--animate css library for animations-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
<link  href="<?php echo base_url();?>assets/users_assets/css/jquery.fancybox.css" rel="stylesheet">
  <!--custom css file-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/users_assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/users_assets/css/animate.css">

<style type="text/css">
.padDiv{
padding-bottom: 4px;
}
.txtAlign{
text-align: center;
font-size: 17px;
}
.etsyLink{
	text-decoration: none;
    color: #b8b8b8;
}
.etsyLink:hover{
text-decoration: none;
color: white;
}
</style>
</head>
<body>
<?php //echo "<pre>";print_r($artdata);return; ?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav pull-right">
        <li><a href="#">Gallery</a></li>
        <li><a href="<?=base_url()?>about">About</a></li>
        <li><a href="<?=base_url()?>contact-us">Get in Touch</a></li>
       
      </ul>

    </div>
  </div>
</nav>


<div id="image-gallery">
  <div class="gallery-container">
  <div class="text-center gallery-title">
    <h1>Chibi Smoothie Art Gallery</h1>
  </div>
<div class="row">

	<?php 
	foreach ($artdata as $key => $row) { ?>

  <div class="col-md-4">
      <a  href="<?php echo base_url();?>assets/artImage/<?=$row->art_image?>" data-fancybox="images" data-caption="<strong><?= $row->art_title ?> </strong> <br /> <?= $row->art_dimesion ?>  
<p>﻿<?= $row->art_description ?></p>
    ">
    <img src="<?php echo base_url();?>assets/artImage/<?=$row->art_image?>" class="img-responsive" />

  </a>
  </div>

	<?php }?>

 

</div>
</div>
</div>


<div class="container shopping-list">
  <div class="text-center">
    <h1>Etsy Shopping list</h1>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="pro-col padDiv">
        <img src="<?php echo base_url();?>assets/etsyshopping/7.jpg" class="img-responsive">
        <h4 class="text-center"><a href="https://www.etsy.com/uk/shop/ChibiSmoothieArt" target="_blank" class="etsyLink">Doki Doki Literature Club A4 High Quality Prints - Pre-Order</a></h4>
		<p class="txtAlign"><strong>USD 9.70</strong></p>
      </div>
    </div>
    <div class="col-md-4">
        <div class="pro-col padDiv">
        <img src="<?php echo base_url();?>assets/etsyshopping/8.jpg" class="img-responsive">
        <h4 class="text-center"><a href="https://www.etsy.com/uk/shop/ChibiSmoothieArt" target="_blank" class="etsyLink">Avatar the Last Airbender A4 High Quality Prints</a></h4>
		<p class="txtAlign"><strong>USD 9.70</strong></p>
      </div>
    </div>
    <div class="col-md-4">
            <div class="pro-col padDiv">
        <img src="<?php echo base_url();?>assets/etsyshopping/3.jpg" class="img-responsive">
        <h4 class="text-center"><a href="https://www.etsy.com/uk/shop/ChibiSmoothieArt" target="_blank" class="etsyLink">Doki Doki Literature Club A4 High Quality Prints - Pre-Order</a></h4>
		<p class="txtAlign"><strong>USD 9.70</strong></p>
      </div>
    </div>
    <div class="col-md-4"style="clear: both">
            <div class="pro-col padDiv">
        <img src="<?php echo base_url();?>assets/etsyshopping/4.jpg" class="img-responsive">
        <h4 class="text-center"><a href="https://www.etsy.com/uk/shop/ChibiSmoothieArt" target="_blank" class="etsyLink">Avatar the Last Airbender A4 High Quality Prints</a></h4>
		<p class="txtAlign"><strong>USD 9.70</strong></p>
      </div>
    </div>
    <div class="col-md-4">
            <div class="pro-col padDiv">
        <img src="<?php echo base_url();?>assets/etsyshopping/5.jpg" class="img-responsive">
        <h4 class="text-center"><a href="https://www.etsy.com/uk/shop/ChibiSmoothieArt" target="_blank" class="etsyLink">Doki Doki Literature Club A4 High Quality Prints - Pre-Order</a></h4>
		<p class="txtAlign"><strong>USD 9.70</strong></p>
      </div>
    </div>
    <div class="col-md-4">
            <div class="pro-col padDiv">
        <img src="<?php echo base_url();?>assets/etsyshopping/6.jpg" class="img-responsive">
        <h4 class="text-center"><a href="https://www.etsy.com/uk/shop/ChibiSmoothieArt" target="_blank" class="etsyLink">Avatar the Last Airbender A4 High Quality Prints</a></h4>
		<p class="txtAlign"><strong>USD 9.70</strong></p>
      </div>
    </div>
  </div>
</div>
</body>
<!-- jquery file-->
<script type="text/javascript"src="<?php echo base_url();?>assets/users_assets/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url();?>assets/users_assets/js/jquery.fancybox.js"></script>
<!-- <script src="<?php echo base_url();?>assets/users_assets/js/fancybox.min.js"></script> -->
<!-- javascript file-->
<script type="text/javascript"src="<?php echo base_url();?>assets/users_assets/js/bootstrap/js/bootstrap.min.js"></script>
<!--owl carousel file-->
<script type="text/javascript"src="<?php echo base_url();?>assets/users_assets/js/owl.carousel.min.js"></script>
<!--waypoinnts--->
<script src="<?php echo base_url();?>assets/users_assets/js/jquery.counterup.min.js"></script>
<script src="<?php echo base_url();?>assets/users_assets/js/jquery.waypoints.min.js"></script>

<!--coustem javascript file-->
<script type="text/javascript"src="<?php echo base_url();?>assets/users_assets/js/main.js"></script>
</html>
