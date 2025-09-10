<?php 

 
include ('admin/includes/config.php');
$pageTitle = "About Us";


// Fetch Site Information
$setting = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM settings WHERE id = 1"));


include('inc/head.php');

?>
<?php include('inc/header.php');?>
<body id="bg">


	
		<div class="page-content bg-white">
		<!-- Banner  -->
		<div class="slidearea bannerside">
			<div class="side-contact-info">
				<ul>
					<li><i class="fas fa-envelope"></i> <?= $setting['email']?></li>
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
								<li class="breadcrumb-item">About Us</li>
							</ul>
						</nav>
						<!-- Breadcrumb Row End -->
					</div>
				</div>
			</div>
		</div>
		<!-- Banner End -->
		
		<!-- About US -->


		<?php
			// Fetch About section
			$aboutus = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM about_us LIMIT 1"));
			?>
		<section class="section-full content-inner about-bx2" style="background-image:url(images/background/bg2.png); background-position:right bottom; background-size:100%; background-repeat:no-repeat;">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="ic-media">

							<?php if (!empty($aboutus['image1'])): ?>
								<div class="img1 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
									<img src="admin/<?= htmlspecialchars($aboutus['image1']) ?>" alt="">
								</div>
							<?php endif; ?>

							<?php if (!empty($aboutus['image2'])): ?>
								<div class="img2 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
									<img src="admin/<?= htmlspecialchars($aboutus['image2']) ?>" alt="">
								</div>
							<?php endif; ?>

							<?php if (!empty($aboutus['image3'])): ?>
								<div class="img3 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="600">
									<img src="admin/<?= htmlspecialchars($aboutus['image3']) ?>" alt="">
								</div>
							<?php endif; ?>


						</div>
					</div>
					<div class="col-lg-6 align-self-center">
						<div class="year-exp">
							<h2 class="year aos-item counter" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400"><?= intval($aboutus['years_experience']) ?></h2>
							<h4 class="text aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600"><?= htmlspecialchars($aboutus['title'])?></h4>
						</div>
						<p class="m-b10 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400"><?= nl2br(htmlspecialchars($aboutus['description']))?></p>
						
						<p class="m-b10 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">Click to <a href="request.php"> request </a> additional information.</p>

						
					</div>
				</div>
			</div>
		</section>
		

<?php
$work_steps = mysqli_query($con, "SELECT * FROM work_process ORDER BY step_number ASC LIMIT 4");
?>

		<section class="content-inner-2">
			<div class="container">
				<div class="section-head style-1 text-center">
					<h6 class="sub-title text-primary">WORK PROCESS</h6>
					<h2 class="title">How Our Work Process</h2>
				</div>
				<div class="row">

				<?php while ($row = mysqli_fetch_assoc($work_steps)): ?>
					<div class="col-lg-3 col-sm-6">
						<div class="work-process shadow text-center m-b30">
							<div class="number"><?= str_pad($row['step_number'], 2, '0', STR_PAD_LEFT) ?></div>
							<h4 class="title m-b15"><?= htmlspecialchars($row['title'])?></h4>
							<p class="m-b0"><?= htmlspecialchars($row['description'])?></p>
						</div>
					</div>
					
					
					<?php endwhile; ?>
				</div>
			</div>
		</section>
		
		<section class="content-inner-2">
			
			<div class="content-inner bg-secondary subscribe-area" style="background-image: url(images/background/bg2-1.png); background-position: center;">
				<div class="container">
					<div class="row subscribe-content">
						<div class="col-lg-6 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
							<div class="section-head style-1 mb-0">
								<h6 class="sub-title text-primary">NEWSLETTER</h6>
								<h2 class="title text-white">Stay Updated With Us !</h2>
							</div>
						</div>
						<div class="col-lg-6 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
							<form class="icSubscribe ic-subscription mt-3" action="script/mailchamp.php" method="post">
								<div class="icSubscribeMsg Msg ic-subscription-msg"></div>
								<div class="input-group">
									<input name="icEmail" required="required" class="form-control" placeholder="Enter Your Email Address..." type="email">
									<button name="submit" value="Submit" type="submit" class="btn btn-primary btn-rounded">
										<span>Subscribe Now</span>
										<i class="m-l10 fas fa-plus scale08"></i>
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<!-- Testimonial -->
		<section class="content-inner-2" style="background-image:url(images/background/bg2.png); background-position:right bottom; background-size:100%; background-repeat:no-repeat;">
			<div class="container">
				<div class="section-head style-1 text-center">
					<h6 class="sub-title text-primary">TESTIMONIAL</h6>
					<h2 class="title">What Our Clients Says</h2>
				</div>
				<div class="row">
					<div class="col-lg-6 align-self-center aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
						<div class="swiper-container swiper-client">
							<div class="swiper-wrapper">

							   	<?php
								
								$query = mysqli_query($con, "SELECT * FROM testimonials ORDER BY id DESC");
								while($row = mysqli_fetch_assoc($query)) {
								?>
								<div class="swiper-slide" data-rel="1">
									<div class="testimonial-1">
										<div class="testimonial-info">
											<div class="flaticon-right-quote quote-icon"></div>
											<div class="testimonial-text">
												<p><?= nl2br(htmlspecialchars($row['message'])) ?></p>
											</div>
											<div class="testimonial-detail">
												<h4 class="testimonial-name"><?= htmlspecialchars($row['name']) ?></h4> 
												<span class="testimonial-position text-primary"><?= htmlspecialchars($row['role']) ?></span> 
											</div>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="client-area">		
							<svg viewBox="0 0 574 511" class="client-bg aos-item" data-aos="fade-in" data-aos-duration="800" data-aos-delay="200" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"><path stroke="var(--primary)" stroke-width="3" fill="none" d="M466.253 161.575c32.408-59.804 26.317-127.495-35.817-124.214-21.983 1.159-42.258 16.216-64.265 17.762-20.248 1.425-39.152-7.801-56.128-17.686-34.373-20.017-65.685-58.278-103.358-16.906-25.654 28.169 3.163 72.215-24.694 97.514-8.698 7.905-22.479 9.509-33.89 10.987-28.345 3.671-50.444 8.129-77.333 21.075-50.333 24.214-63.016 41.712-68.009 72.376-5.411 33.246 18.459 81.167 57.923 86.892 47.337 6.875 62.6-27.975 115.202-20.21 44.397 6.545 37.678 43.589 36.73 76.523-1.791 62.123 48.901 88.979 106.445 67.392 18.747-7.036 54.435-25.45 61.781-46.766 5.929-17.204-8.925-38.223-12.682-54.363-13.218-56.766 52.37-36.554 90.575-32.547 36.51 3.834 98.693 4.263 110.935-52.659 4.2-19.531-24.295-55.633-42.521-58.503-25.786-4.051-73.433-3.538-60.894-26.667z"></path><path fill-rule="evenodd" fill="var(--rgba-primary-1)" d="M421.378 125.766c-2.044-75.742-45.622-137.651-103.734-99.88-20.562 13.364-31.734 39.18-52.103 52.929-18.739 12.652-42.114 14.28-63.996 14.201-44.308-.167-95.824-19.637-109.124 41.255-9.059 41.463 43.273 67.904 30.49 107.825-3.989 12.47-16.39 21.694-26.574 29.475-25.3 19.327-44.135 35.937-62.865 63.401-35.069 51.394-37.558 75.336-25.296 107.699 13.297 35.087 63.014 68.02 104.272 51.562 49.494-19.732 44.809-61.853 99.879-83.658 46.474-18.414 60.624 21.064 78.052 53.364 32.873 60.926 96.733 58.6 140.221 5.725 14.167-17.228 38.338-54.87 33.553-79.523-3.863-19.899-29.899-31.903-42.513-45.38-44.367-47.4 30.162-64.432 69.25-81.845 37.355-16.637 97.582-50.856 77.688-112.586-6.827-21.182-54.423-40.137-73.603-32.754-27.132 10.453-72.81 37.485-73.597 8.19z"></path></svg>
							<ul class="aos-item" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="600">
								<li data-member="1"><a href="#" class="icclient1"><img src="images/testimonials/pic1.jpg" alt=""></a></li>
								<li data-member="2"><a href="#" class="icclient2"><img src="images/testimonials/pic2.jpg" alt=""></a></li>
								<li data-member="3"><a href="#" class="icclient3"><img src="images/testimonials/pic3.jpg" alt=""></a></li>
								<li data-member="4"><a href="#" class="icclient4"><img src="images/testimonials/pic4.jpg" alt=""></a></li>
								<li data-member="5"><a href="#" class="icclient5"><img src="images/testimonials/pic5.jpg" alt=""></a></li>
								<li data-member="6"><a href="#" class="icclient6"><img src="images/testimonials/pic6.jpg" alt=""></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		

		
		<!-- Faq -->
		<section class="section-full content-inner overflow-hidden" style="background-image:url(images/background/bg1.png); background-position:left top; background-size:100%; background-repeat:no-repeat;">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6 m-b30 aos-item" data-aos="fade-right" data-aos-duration="800" data-aos-delay="300">
						<div class="twentytwenty-img-area">
							<div class="twentytwenty-container">
								<img src="images/pic2-1.webp" alt="">
								<img src="images/pic2-2.webp" alt="">
							</div>
						</div>
					</div>
					<div class="col-lg-6 aos-item" data-aos="fade-left" data-aos-duration="800" data-aos-delay="600">
						<div class="section-head style-1">
							<h6 class="sub-title text-primary">FAQ</h6>
							<h2 class="title">Get Every Answer From Here</h2>
						</div>
						<?php 
						// Fetch FQAs Details
                        $faq_result = mysqli_query($con, "SELECT * FROM faqs ORDER BY id ASC");
						if (mysqli_num_rows($faq_result) > 0): ?>
							<div class="accordion ic-accordion accordion-sm" id="accordionFaq">
								<?php $i = 0; while ($row = mysqli_fetch_assoc($faq_result)): ?>
									<?php
										$collapseId = 'collapse' . $i;
										$headingId = 'heading' . $i;
										$isFirst = ($i === 0);
									?>
									<div class="accordion-item">
										<h2 class="accordion-header" id="<?= $headingId ?>">
											<button class="accordion-button <?= $isFirst ? '' : 'collapsed' ?>" type="button"
												data-bs-toggle="collapse"
												data-bs-target="#<?= $collapseId ?>"
												aria-expanded="<?= $isFirst ? 'true' : 'false' ?>"
												aria-controls="<?= $collapseId ?>">
												<?= htmlspecialchars($row['question']) ?>
												<span class="toggle-close ms-auto"><?= $isFirst ? '×' : '+' ?></span>
											</button>
										</h2>
										<div id="<?= $collapseId ?>"
											class="accordion-collapse collapse <?= $isFirst ? 'show' : '' ?>"
											aria-labelledby="<?= $headingId ?>"
											data-bs-parent="#accordionFaq">
											<div class="accordion-body">
												<p class="m-b0"><?= nl2br(htmlspecialchars($row['answer'])) ?></p>
											</div>
										</div>
									</div>
								<?php $i++; endwhile; ?>
							</div>
						<?php else: ?>
							<div class="alert alert-warning">No FAQs found at the moment.</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
		


	<!-- Footer -->
    <?php include('inc/footer.php');?>
</body>
</html>