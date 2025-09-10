<?php include('inc/head.php')?>


<body id="bg">

<?php include('inc/header.php'); ?>
	
	
	<div class="page-content bg-white">
		<!-- Banner  -->
		<div class="slidearea bannerside">
			<div class="side-contact-info">
				<ul>
					<li><i class="fas fa-envelope"></i> dave@energyequipco.com</li>
				</ul>
			</div>
			<div class="ic-bnr-inr ic-bnr-inr-sm style-1 overlay-black-light overlay-left" style="background-image: url(images/video/pic2-2.jpg);">
				<div class="container-fluid">
					<div class="ic-bnr-inr-entry">
						<h1>Manufacturers</h1>
						<!-- Breadcrumb Row -->
						<nav aria-label="breadcrumb" class="breadcrumb-row">
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Home</a></li>
								<li class="breadcrumb-item">Manufacturers</li>
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
					<h2 class="title">Used Boilers by Manufacturer</h2>
				</div>
				<div class="row">

					<?php 
					 $feature_products = mysqli_query($con, "SELECT * FROM feature_products ORDER BY id ASC");
					 while ($row = mysqli_fetch_assoc($feature_products)): ?>

					<div class="col-lg-4 col-sm-6 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
						<div class="icon-bx-wraper style-3  m-b30" style="background-image:url(<?= htmlspecialchars($row['image'])?>); background-position:left top; background-size:cover; background-repeat:no-repeat; height: 400px;">
							<div class="icon-content">
							<h4 class="title m-b10"><a href="services-details.html"><?= htmlspecialchars($row['title'])?></a></h4>
								<?php if (!empty($row['button_text']) && !empty($row['button_link'])): ?>
									<a href="<?= htmlspecialchars($row['button_link'])?>" class="btn btn-primary btn-rounded btn-sm hover-icon">
										<span><?= htmlspecialchars($row['button_text'])?></span>
										<i class="fas fa-arrow-right"></i>
									</a>
									<?php endif; ?>
							</div>
						</div>
					</div>

					<?php endwhile;?>

				</div>
			</div>
		</section>
		
		
	<!-- Footer -->
    
	<?php include('inc/footer.php');?>

</body>
</html>