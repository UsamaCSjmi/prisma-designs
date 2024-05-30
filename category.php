<?php
include_once("includes/header.php");
$isSubcategory=false;
if(isset($pageSubcategory)){
	$isSubcategory = true;
}
?>
<section class="home-slider js-fullheight owl-carousel">
	<div class="slider-item js-fullheight" style="background-image:url(<?php echo SITE_PATH ?>/images/categories/<?php
	 if($isSubcategory==true){
		echo $pageSubcategory['image'] ;
	}
	else{
		echo $pageCategory['image'] ;
	 }
	 ?>);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">

				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread"><?php 
					if($isSubcategory==true){
						echo $pageSubcategory['sub_categories'] ;
					}
					else{
						echo $pageCategory['categories'] ;
					}
					?></h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="<?php echo SITE_PATH ?>">Home</a></span> <span><?php
					if($isSubcategory){
						echo $pageSubcategory['sub_categories'] ;
					}
					else{
						echo $pageCategory['categories'] ;
					}
					?></span></p>
				</div>

			</div>
		</div>
	</div>
</section>
<?php 
if(!$isSubcategory){
	$pageSubcategories = $subcategoryObj->getSubcatByCatId($pageCategory['id']);
	if($pageSubcategories){
		while($subcat = mysqli_fetch_array($pageSubcategories)){
			?>
			<section class="home-slider js-fullheight owl-carousel" style="background-image:url(<?php echo SITE_PATH?>/images/sub-categories/<?php echo $subcat['image']?>);background-attachment: fixed;background-size: cover;background-repeat: no-repeat;background-position: center center;">
				<div class="slider-item js-fullheight" >
					<div class="overlay"></div>
					<div class="container">
						<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
							<div class="col-md-7 text ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
								<h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><?php echo $subcat['sub_categories']?></h1>
								<p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><?php echo $subcat['description']?></p>
								<p><a href="<?php echo SITE_PATH."/".$pageCategory['slug']."/".$subcat['slug']?>" class="btn btn-white btn-outline-white px-4 py-3 mt-3">View <?php echo $subcat['sub_categories']?></a></p>
								
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php
		}
	}
}
?>

<section class="ftco-section">
	<div class="container-fluid">
		<div class="row no-gutters">
			<?php
			if($isSubcategory){
				$products = $productObj -> getProBySubCatId($pageSubcategory['id']);
			}
			else{
				$products = $productObj -> getProByCatId($pageCategory['id']);
			}
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
			else{
				?>
				<p class="text-dark w-100 text-center">No products found!</p>
				<?php
			}
			?>
		</div>
		<!-- <div class="row mt-5">
			<div class="col text-center">
				<div class="block-27">
					<ul>
						<li><a href="#">&lt;</a></li>
						<li class="active"><span>1</span></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#">&gt;</a></li>
					</ul>
				</div>
			</div>
		</div> -->
	</div>
</section>

<?php include_once("includes/footer.php"); ?>