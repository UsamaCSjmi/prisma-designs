<?php
$categories = $categoryObj->getAllCat();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $title;?></title>
    <meta name="description" content="<?php echo $description;?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo SITE_PATH?>/images/prisma-logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo SITE_PATH?>/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo SITE_PATH?>/css/animate.css">
    
    <link rel="stylesheet" href="<?php echo SITE_PATH?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo SITE_PATH?>/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo SITE_PATH?>/css/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo SITE_PATH?>/css/aos.css">

    <link rel="stylesheet" href="<?php echo SITE_PATH?>/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo SITE_PATH?>/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo SITE_PATH?>/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="<?php echo SITE_PATH?>/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo SITE_PATH?>/css/icomoon.css">
    <link rel="stylesheet" href="<?php echo SITE_PATH?>/css/style.css">
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="<?php echo SITE_PATH?>">
          <img class="image-fluid" style="width: 226px;" src="<?php echo SITE_PATH?>/images/prisma-logo.png" alt="">
        </a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item active"><a href="<?php echo SITE_PATH?>" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="<?php echo SITE_PATH?>/about" class="nav-link">About</a></li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Products</a>
              <div class="dropdown-menu">
              <?php
                while($category = mysqli_fetch_array($categories)){
              ?>
                <a class="dropdown-item" href="<?php echo SITE_PATH."/".$category['slug']?>"><?php echo $category['categories']?></a>
                <?php
                }
                ?>
              </div>
            </li>
            <li class="nav-item"><a href="<?php echo SITE_PATH?>/services" class="nav-link">Services</a></li>
	          <li class="nav-item"><a href="<?php echo SITE_PATH?>/contact" class="nav-link">Contact</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    