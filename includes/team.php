<?php include_once("./backend/classes/Team.php");
$teamObj = new Team();
$team = $teamObj->get();
?>
<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate">
				<h2 class="mb-4">Our Architect Team</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
			</div>
		</div>
		<div class="row">
			<?php
			while($member = mysqli_fetch_array($team)){
				?>
			<div class="col-md-6 col-lg-3 ftco-animate">
				<div class="staff">
					<div class="img" style="background-image: url(images/team/<?php echo $member['image']?>);"></div>
					<div class="text pt-4">
						<h3><?php echo $member['name']?></h3>
						<span class="position mb-2"><?php echo $member['post']?></span>
						<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
						<ul class="ftco-social d-flex">
							<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
						</ul>
					</div>
				</div>
			</div>
				<?php
			}
			?>
		</div>
	</div>
</section>