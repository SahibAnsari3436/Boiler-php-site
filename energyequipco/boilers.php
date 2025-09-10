 <?php 
 
 include ('admin/includes/config.php'); 
 include('inc/head.php');

 $pageTitle = "Boilers";
 $base_url = "http://localhost/energyequipco/";
 
 ?>


<body id="bg">

<?php include('inc/header.php'); ?>
	
	
	<div class="page-content bg-white">
		<!-- Banner  -->
		<div class="slidearea bannerside">
			<div class="side-contact-info">
				<ul>
					<li><i class="fas fa-envelope"></i><?= $setting['email']?></li>
				</ul>
			</div>
			<div class="ic-bnr-inr ic-bnr-inr-sm style-1 overlay-black-light overlay-left" style="background-image: url(images/video/pic2-2.jpg);">
				<div class="container-fluid">
					<div class="ic-bnr-inr-entry">
						<h1><?= isset($pageTitle) ? $pageTitle : '' ?></h1>
						<!-- Breadcrumb Row -->
						<nav aria-label="breadcrumb" class="breadcrumb-row">
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item">Boilers</li>
							</ul>
						</nav>
						<!-- Breadcrumb Row End -->
					</div>
				</div>
			</div>
		</div>
		<!-- Banner End -->

		<!-- About US -->
		<section class="content-inner-2"  style="background-image:url(images/background/bg1.png); background-position:left top; background-size:100%; background-repeat:no-repeat;">
			<div class="container">
				<div class="section-head style-1 text-center">
					<h6 class="sub-title text-primary">Used Firetube, Watertube, & Vertical Boilers</h6>
					<h2 class="title">Used Firetube, Watertube, & Vertical Boilers</h2>
				</div>
				<div class="row">
                     <?php 
					 
					 $boilers = mysqli_query($con, "SELECT * FROM our_boilers ORDER BY id ASC LIMIT 4");
					 while ($row = mysqli_fetch_assoc($boilers)): ?>

					<div class="col-lg-4 col-sm-6 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
						<div class="icon-bx-wraper style-3  m-b30" style="background-image:url(<?= htmlspecialchars($row['image']) ?>); background-position:left top; background-size:cover; background-repeat:no-repeat; height: 400px;">
							<div class="icon-content">
							<h4 class="title m-b10"><a href="services-details.html"><?= htmlspecialchars($row['title']) ?></a></h4>
								<!-- <p class="m-b30">Phasellus facilisis urna at ultrices egestas. Nulla mi arcu, finibus non lectus non, mollis tempus enim.</p> -->
								 <?php if (!empty($row['button_text']) && !empty($row['button_link'])): ?>
								<a href="<?= htmlspecialchars($row['button_link'])?>" class="btn btn-primary btn-rounded btn-sm hover-icon">
									<span><?= htmlspecialchars($row['button_text'])?></span>
									<i class="fas fa-arrow-right"></i>
								</a>

								<?php endif ?>
							</div>
						</div>
					</div>
					<?php endwhile; ?>	
										
				</div>
			</div>
		</section>
		
   
<!-- Clients Logo -->
		<section class="content-inner-1">
			<div class="container">
				<div class="section-head style-1 text-center">
					<h6 class="sub-title text-primary">Brands</h6>
					<h2 class="title">Our Top Partners</h2>
				</div>
				<div class="swiper-container clients-swiper">
					<div class="swiper-wrapper">
						
						<?php
							// Connect to DB and fetch brand logos
							$result = mysqli_query($con, "SELECT * FROM brands ORDER BY id ASC");
							$delay = 100;
							while ($row = mysqli_fetch_assoc($result)) {
								echo "
								<div class='swiper-slide'>
									<div class='clients-logo aos-item' data-aos='fade-in' data-aos-duration='1000' data-aos-delay='{$delay}'>
										<img class='logo-main' src='{$base_url}/{$row['image']}' alt=''>
									</div>
								</div>";
								$delay += 100;
							}
							?>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- Footer -->
    
	<?php include('inc/footer.php');?>

</body>
</html>