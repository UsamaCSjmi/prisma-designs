<?php include_once("includes/header.php"); 
$categories = $categoryObj->getAllCat();
while($category = mysqli_fetch_array($categories)){

	?>
	<section class="home-slider js-fullheight owl-carousel" style="background-image:url(<?php echo SITE_PATH?>/images/categories/<?php echo $category['image']?>);background-attachment: fixed;background-size: cover;background-repeat: no-repeat;background-position: center center;">
		<div class="slider-item js-fullheight" >
			<div class="overlay"></div>
			<div class="container">
				<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
					<div class="col-md-7 text ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
						<h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><?php echo $category['categories']?></h1>
						<p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><?php echo $category['description']?></p>
						<?php
						$subcategories = $subcategoryObj->getSubcatByCatId($category['id']);
						if($subcategories){
							?>
							<p><button type="button" class="btn btn-white btn-outline-white px-4 py-3 mt-3" data-toggle="modal" data-target="#category-<?php echo $category['id']?>">View <?php echo $category['categories']?></button></p>
							<?php
						}
						else{
							?>
							<p><a href="<?php echo SITE_PATH."/".$category['slug']?>" class="btn btn-white btn-outline-white px-4 py-3 mt-3">View <?php echo $category['categories']?></a></p>
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
}
$categories = $categoryObj->getAllCat();
while($category = mysqli_fetch_array($categories)){
	$subcategories = $subcategoryObj->getSubcatByCatId($category['id']);
	if($subcategories){
	?>
	<!-- Modal -->
	<div class="modal category-modal" id="category-<?php echo $category['id']?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $category['categories']?>" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title text-center w-100 text-light"><?php echo $category['categories']?></h5>
			<button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<div class="container-wrap">
				<div class="row no-gutters">
					<?php
					while($subcategory = mysqli_fetch_array($subcategories)){
						?>
						<div class="col-md-6 col-lg-6 ftco-animate">
							<div class="project">
								<img src="<?php echo SITE_PATH?>/images/sub-categories/<?php echo $subcategory['image']?>" class="img-fluid" alt="<?php echo $subcategory['sub_categories']?>">
								<div class="text">
									<h3><?php echo $subcategory['sub_categories']?></h3>
								</div>
								<a href="<?php echo SITE_PATH."/".$category['slug']."/".$subcategory['slug']?>" class="icon d-flex justify-content-center align-items-center">
									<span class="icon-expand"></span>
								</a>
							</div>
						</div>
						<?php
					}
					?>

				</div>
			</div>
		  </div>
		  <!-- <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<a href="categories.php?catid=1" class="btn btn-secondary">Proceed to Board Games</a>
		  </div> -->
		</div>
	  </div>
	</div>
	<?php
	}
}
?>



<section class="ftco-services bg-light">
	<div class="container">
		<div class="row">
			<div class="col-md-4 d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services d-block">
					<div class="icon d-flex justify-content-center align-items-center">
						<span class="flaticon-idea"></span>
					</div>
					<div class="media-body p-2 mt-3">
						<h3 class="heading">Perfectly Design</h3>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services d-block">
					<div class="icon d-flex justify-content-center align-items-center">
						<span class="flaticon-compass-symbol"></span>
					</div>
					<div class="media-body p-2 mt-3">
						<h3 class="heading">Carefully Planned</h3>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services d-block">
					<div class="icon d-flex justify-content-center align-items-center">
						<span class="flaticon-layers"></span>
					</div>
					<div class="media-body p-2 mt-3">
						<h3 class="heading">Smartly Execute</h3>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftc-no-pb">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-md-5 p-md-5 img img-2" style="background-image: url(<?php echo SITE_PATH?>/images/about.jpg);">
			</div>
			<div class="col-md-7 wrap-about pb-md-5 ftco-animate">
				<div class="heading-section mb-5 pl-md-5 heading-section-with-line">
					<div class="pl-md-5 ml-md-5">
						<span class="subheading">About</span>
						<h2 class="mb-4">We are the best interior &amp; Architect Consultant in Italy</h2>
					</div>
				</div>
				<div class="pl-md-5 ml-md-5 mb-5">
					<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
					<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
					<p><a href="#" class="btn-custom">Learn More <span class="ion-ios-arrow-forward"></span></a></p>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(<?php echo SITE_PATH?>/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
	<div class="container">
		<div class="row d-md-flex align-items-center justify-content-center">
			<div class="col-lg-4">
				<div class="heading-section pl-md-5 heading-section-white">
					<div class="pl-md-5 ml-md-5 ftco-animate">
						<span class="subheading">Some</span>
						<h2 class="mb-4">Interesting Facts</h2>
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="row d-md-flex align-items-center">
					<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<strong class="number" data-number="18">0</strong>
								<span>Years of Experienced</span>
							</div>
						</div>
					</div>
					<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<strong class="number" data-number="351">0</strong>
								<span>Happy Clients</span>
							</div>
						</div>
					</div>
					<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<strong class="number" data-number="564">0</strong>
								<span>Finished Projects</span>
							</div>
						</div>
					</div>
					<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<strong class="number" data-number="300">0</strong>
								<span>Working Days</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-2">
			<div class="col-md-7 heading-section ftco-animate">
				<h2 class="mb-4">Our Latest Releases</h2>
				<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences</p>
			</div>
		</div>
	</div>
	<div class="container-wrap">
		<div class="row no-gutters">
			<?php
			$products = $productObj -> getNewProducts(4);
			if($products){
				while($product = mysqli_fetch_array($products)){
					?>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="project">
							<img src="<?php echo SITE_PATH ?>/images/product/<?php echo $product['image'];?>" class="img-fluid" alt="<?php echo $product['name'];?>">
							<div class="text">
								<h3><?php echo $product['name'];?></h3>
							</div>
							<a href="<?php echo SITE_PATH ?>/images/product/<?php echo $product['image'];?>" class="icon image-popup d-flex justify-content-center align-items-center">
								<span class="icon-expand"></span>
							</a>
						</div>
					</div>
					<?php
				}
			}
			?>
		</div>
	</div>
</section>

<section class="ftco-section testimony-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate">
				<h2 class="mb-4">Our satisfied customer says</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
			</div>
		</div>
		<div class="row ftco-animate">
			<div class="col-md-12">
				<div class="carousel-testimony owl-carousel">
					<div class="item">
						<div class="testimony-wrap p-4 pb-5">
							<div class="user-img mb-5" style="background-image: url(<?php echo SITE_PATH?>/images/person_1.jpg)">
								<span class="quote d-flex align-items-center justify-content-center">
									<i class="icon-quote-left"></i>
								</span>
							</div>
							<div class="text">
								<p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
								<p class="name">Garreth Smith</p>
								<span class="position">Marketing Manager</span>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="testimony-wrap p-4 pb-5">
							<div class="user-img mb-5" style="background-image: url(<?php echo SITE_PATH?>/images/person_2.jpg)">
								<span class="quote d-flex align-items-center justify-content-center">
									<i class="icon-quote-left"></i>
								</span>
							</div>
							<div class="text">
								<p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
								<p class="name">Garreth Smith</p>
								<span class="position">Interface Designer</span>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="testimony-wrap p-4 pb-5">
							<div class="user-img mb-5" style="background-image: url(<?php echo SITE_PATH?>/images/person_3.jpg)">
								<span class="quote d-flex align-items-center justify-content-center">
									<i class="icon-quote-left"></i>
								</span>
							</div>
							<div class="text">
								<p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
								<p class="name">Garreth Smith</p>
								<span class="position">UI Designer</span>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="testimony-wrap p-4 pb-5">
							<div class="user-img mb-5" style="background-image: url(<?php echo SITE_PATH?>/images/person_1.jpg)">
								<span class="quote d-flex align-items-center justify-content-center">
									<i class="icon-quote-left"></i>
								</span>
							</div>
							<div class="text">
								<p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
								<p class="name">Garreth Smith</p>
								<span class="position">Web Developer</span>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="testimony-wrap p-4 pb-5">
							<div class="user-img mb-5" style="background-image: url(<?php echo SITE_PATH?>/images/person_1.jpg)">
								<span class="quote d-flex align-items-center justify-content-center">
									<i class="icon-quote-left"></i>
								</span>
							</div>
							<div class="text">
								<p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
								<p class="name">Garreth Smith</p>
								<span class="position">System Analyst</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include_once("./includes/team.php")?>


<section class="ftco-section ftc-no-pb">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-md-5 p-md-5 img img-2 order-md-last" style="background-image: url(<?php echo SITE_PATH?>/images/img.jpg);">
			</div>
			<div class="col-md-7 wrap-about pb-md-5 ftco-animate">
				<div class="heading-section mb-md-5 pl-md-5 heading-section-with-line">
					<div class="pr-md-5 mr-md-5">
						<span class="subheading">Perfect</span>
						<h2 class="mb-4">We Make Perfection</h2>
					</div>
				</div>
				<div class="pr-md-5 mr-md-5">
					<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
					<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
					<p><a href="#" class="btn-custom">Learn More <span class="ion-ios-arrow-forward"></span></a></p>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include_once("includes/footer.php"); ?>