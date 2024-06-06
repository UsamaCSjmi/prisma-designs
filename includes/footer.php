<footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Prisma Designs</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit a temporibus alias iusto sequi harum!</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Quick Links</h2>
              <ul class="list-unstyled">
                <li><a href="<?php echo SITE_PATH?>">Home</a></li>
                <li><a href="<?php echo SITE_PATH?>/about">About</a></li>
                <li><a href="<?php echo SITE_PATH?>/services">Services</a></li>
                <li><a href="<?php echo SITE_PATH?>/contact">Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Collection</h2>
              <ul class="list-unstyled">
              <?php 
                $categories = $categoryObj->getAllCat();
                while($category = mysqli_fetch_array($categories)){
                  ?>
                <li><a href="<?php echo SITE_PATH."/".$category['slug']?>"><?php echo $category['categories']?></a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Deputy Ganj, Moradabad, Uttar Pradesh, India - 244001</span></li>
	                <li class="mb-0"><a href="tel:+919634412128"><span class="icon icon-phone"></span><span class="text">+91 96344 12128</span></a></li>
	                <li><a href="tel:+919808513181"><span class="icon icon-phone"></span><span class="text">+91 98085 13181</span></a></li>
	                <li><a href="mailto:prisma.saim@gmail.com"><span class="icon icon-envelope"></span><span class="text">prisma.saim@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p>
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
            </p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="<?php echo SITE_PATH?>/js/jquery.min.js"></script>
  <script src="<?php echo SITE_PATH?>/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo SITE_PATH?>/js/popper.min.js"></script>
  <script src="<?php echo SITE_PATH?>/js/bootstrap.min.js"></script>
  <script src="<?php echo SITE_PATH?>/js/jquery.easing.1.3.js"></script>
  <script src="<?php echo SITE_PATH?>/js/jquery.waypoints.min.js"></script>
  <script src="<?php echo SITE_PATH?>/js/jquery.stellar.min.js"></script>
  <script src="<?php echo SITE_PATH?>/js/owl.carousel.min.js"></script>
  <script src="<?php echo SITE_PATH?>/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo SITE_PATH?>/js/aos.js"></script>
  <script src="<?php echo SITE_PATH?>/js/jquery.animateNumber.min.js"></script>
  <script src="<?php echo SITE_PATH?>/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo SITE_PATH?>/js/jquery.timepicker.min.js"></script>
  <script src="<?php echo SITE_PATH?>/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?php echo SITE_PATH?>/js/google-map.js"></script>
  <script src="<?php echo SITE_PATH?>/js/main.js"></script>
    
  </body>
</html>