<?php
include ('admin/includes/config.php'); // adjust path if needed

// Fetch Site Information
$setting = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM settings WHERE id = 1"));

// Fetch FQAs Details
$faq_result = mysqli_query($con, "SELECT * FROM faqs ORDER BY id ASC");


// Fetch Top Banner Details
$banner_result = mysqli_query($con, "SELECT * FROM banners ORDER BY id ASC");

// Fetch Counter Details
$counters = mysqli_query($con, "SELECT * FROM counter_section");

?>



<?php include ('inc/head.php'); ?>

<body id="bg">


<?php include('inc/header.php');?>
	
		
	<div class="page-content bg-white">
		
		<!-- Slider -->
		<div class="slidearea">
			<div class="side-contact-info">
				<ul>
					<li><i class="fas fa-phone-alt"></i><a href="tel:864.316.4028"> <?=$setting['phone']?></a></li>
					<li><i class="fas fa-envelope"></i><a href="mailto:dave@energyequipco.com"><?= $setting['email'] ?></li>
				</ul>
			</div>
			<div class="silder-one">
				<div class="swiper-container main-silder-swiper">
					<div class="swiper-wrapper">

					  	<?php while ($row = mysqli_fetch_assoc($banner_result)): ?>
							<div class="swiper-slide">
								<div class="silder-img overlay-black-light">
									<img src="<?= htmlspecialchars($row['image']) ?>" data-swiper-parallax="30%" alt="">
								</div>
								<div class="silder-content" data-swiper-parallax="-40%">
									<div class="inner-content">
										<h6 class="sub-title"><?= htmlspecialchars($row['sub_heading']) ?></h6>
										<h1 class="title"><?= htmlspecialchars($row['heading']) ?></h1>
										<h3 class="title-small"><?= nl2br(htmlspecialchars($row['description'])) ?></h3>
										<?php if (!empty($row['button_text']) && !empty($row['button_link'])): ?>
											<a href="<?= htmlspecialchars($row['button_link']) ?>" class="btn shadow-primary btn-light btn-rounded btn-ov-secondary">
												<?= htmlspecialchars($row['button_text']) ?> <i class="m-l10 fas fa-caret-right"></i>
											</a>
										<?php endif; ?>
									</div>
									<div class="overlay-slide" data-swiper-parallax="100%"></div>
								</div>
							</div>
        				<?php endwhile; ?>

       				   
						
					</div>
					<div class="slider-one-pagination">
						<!-- Add Navigation -->
						<div class="btn-prev swiper-button-prev1 swiper-button-white"><i class="las la-long-arrow-alt-left"></i>PREV</div>
						<div class="swiper-pagination swiper-pagination-white"></div>
						<div class="btn-next swiper-button-next1 swiper-button-white">NEXT<i class="las la-long-arrow-alt-right"></i></div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- About US -->

        <?php
			// Fetch About section
			$about = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM about_section LIMIT 1"));

			// Fetch About Features
			$features = mysqli_query($con, "SELECT * FROM about_features ORDER BY sort_order, id");
			?>

		<section class="section-full content-inner about-bx2" style="background-image:url(images/background/bg2.png); background-position:right bottom; background-size:100%; background-repeat:no-repeat;">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="ic-media">

							<?php if (!empty($about['image1'])): ?>
								<div class="img1 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200"><img src="admin/<?= htmlspecialchars($about['image1']) ?>" alt=""></div>
							<?php endif; ?>

							<?php if (!empty($about['image2'])): ?>
								<div class="img2 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400"><img src="admin/<?= htmlspecialchars($about['image2']) ?>" alt=""></div>
							<?php endif; ?>

					        <?php if (!empty($about['image3'])): ?>	
								<div class="img3 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="600"><img src="admin/<?= htmlspecialchars($about['image3']) ?>" alt=""></div>
							<?php endif; ?>

						</div>
					</div>
					<div class="col-lg-6 align-self-center">
						<div class="year-exp">
							<h2 class="year aos-item counter" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400"><?= intval($about['years_experience']) ?></h2>
							<h4 class="text aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600"><?= htmlspecialchars($about['title']) ?></h4>
						</div>
						<p class="m-b30 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400"><?= nl2br(htmlspecialchars($about['description'])) ?></p>

						<div class="accordion ic-accordion about-faq" id="aboutFaq">
                              <?php $i = 0; while ($row = mysqli_fetch_assoc($features)): 
									$collapseId = "aboutItem$i";
									$isFirst = ($i === 0);
								?> 

							<div class="accordion-item">
								<h4 class="accordion-header" >
								<a href="#" class="accordion-button <?= $isFirst ? '' : 'collapsed' ?>" 
							   data-bs-toggle="collapse" 
							   data-bs-target="#<?= $collapseId ?>" 
							   aria-expanded="<?= $isFirst ? 'true' : 'false' ?>" 
							   aria-controls="<?= $collapseId ?>">
								<i class="flaticon-infrastructure"></i>
								<?= htmlspecialchars($row['title']) ?>
								<span class="toggle-close"></span>
								</a>
								</h4>
								<div id="<?= $collapseId ?>" class="accordion-collapse collapse <?= $isFirst ? 'show' : '' ?>" aria-labelledby="<?= $collapseId ?>" data-bs-parent="#aboutFaq">
									<div class="accordion-body">
									<p class="m-b0"><?= nl2br(htmlspecialchars($row['content'])) ?></p>
									</div>
								</div>
							</div>
							
							<?php $i++; endwhile; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<!-- Counter And  Video -->
		<section class="ic-content-bx style-3">
			<div class="ic-content-inner">
				<div class="row">
					<div class="col-xl-10 col-lg-12 counter-info aos-item" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="200">
						<div class="row">
							<?php while($row = mysqli_fetch_assoc($counters)) { ?>
							<div class="col-lg-3 col-sm-6 m-b30 aos-item" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">
								<div class="counter-bx">
									<h2 class="counter text-primary"><?= $row['number'] ?></h2>
									<h3 class="m-b0"><?= $row['title1'] ?> <br><?= $row['title2'] ?></h3>
								</div>
							</div>
							<?php } ?>
							
							
							
						</div>
					</div>
				</div>
				<div class="row spno">
					<div class="col-lg-12">
						<div class="video-bx content-media style-2 overlay-black-light">
							<img src="images/video/pic2-2.jpg" alt="">
							<div class="video-btn aos-item" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="400">
								<a href="https://www.youtube.com/watch?v=UilNeBnfSkU" class="popup-youtube"><i class="fas fa-play"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<!-- Feature Products -->
		<section class="content-inner-2"  style="background-image:url(images/background/bg1.png); background-position:left top; background-size:100%; background-repeat:no-repeat;">
			<div class="container">
				<div class="section-head style-1 text-center">
					<h6 class="sub-title text-primary">POPULAR PRODUCTS</h6>
					<h2 class="title">Our Featured Products</h2>
				</div>
				<div class="row">
                     <?php 
					 
					 $feature_products = mysqli_query($con, "SELECT * FROM feature_products ORDER BY id ASC LIMIT 3");
					 while ($row = mysqli_fetch_assoc($feature_products)): ?>

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
								<?php endif; ?>
							</div>
						</div>
					</div>
					<?php endwhile; ?>					
				</div>
			</div>
		</section>
		
		<section>
			<!-- <div class="container">
				<div class="row section-head-bx align-items-center">
					<div class="col-md-8">
						<div class="section-head style-1">
							<h6 class="sub-title text-primary">OUR PORTFOLIOS</h6>
							<h2 class="title">Our Latest Projects</h2>
						</div>
					</div>
					<div class="col-md-4 text-start text-md-end mb-4 mb-md-0">
						<a href="portfolio.html" class="btn-link">See All Projects <i class="fas fa-plus scale08"></i></a>
					</div>
				</div>
			</div> -->
			<!-- <div class="container-fluid">
				<div class="swiper-container swiper-portfolio lightgallery aos-item" data-aos="fade-in" data-aos-duration="1000" data-aos-delay="400">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<div class="ic-box overlay style-1 mt-5">
								<div class="ic-media">
									<img src="images/work/work-1/pic-1.jpg" alt="">
								</div>
								<div class="ic-info">
									<span data-exthumbimage="images/work/work-1/pic-1.jpg" data-src="images/work/work-1/pic-1.jpg" class="view-btn lightimg" title="INDUSTRY"></span>
									<h6 class="sub-title">INDUSTRY</h6>
									<h4 class="title m-b15"><a href="portfolio-details.html">Florida Chemical Factory</a></h4>
								</div>
							</div>
						</div>	
						<div class="swiper-slide">
							<div class="ic-box overlay style-1">
								<div class="ic-media">
									<img src="images/work/work-1/pic-2.jpg" alt="">
								</div>
								<div class="ic-info">
									<span data-exthumbimage="images/work/work-1/pic-2.jpg" data-src="images/work/work-1/pic-2.jpg" class="view-btn lightimg" title="OIL INDUSTRY"></span>
									<h6 class="sub-title">OIL INDUSTRY</h6>
									<h4 class="title m-b15"><a href="portfolio-details.html">Oil & Gas Industry</a></h4>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="ic-box overlay style-1 mt-5">
								<div class="ic-media">
									<img src="images/work/work-1/pic-3.jpg" alt="">
								</div>
								<div class="ic-info">
									<span data-exthumbimage="images/work/work-1/pic-3.jpg" data-src="images/work/work-1/pic-3.jpg" class="view-btn lightimg" title="RULES OF BUSINESS"></span>
									<h6 class="sub-title">RULES OF BUSINESS</h6>
									<h4 class="title m-b15"><a href="portfolio-details.html">Maintenance Service</a></h4>
								</div>
							</div>
						</div>	
						<div class="swiper-slide">
							<div class="ic-box overlay style-1">
								<div class="ic-media">
									<img src="images/work/work-1/pic-4.jpg" alt="">
								</div>
								<div class="ic-info">
									<span data-exthumbimage="images/work/work-1/pic-4.jpg" data-src="images/work/work-1/pic-4.jpg" class="view-btn lightimg" title="INDUSTRY"></span>
									<h6 class="sub-title">INDUSTRY</h6>
									<h4 class="title m-b15"><a href="portfolio-details.html">Material Engineering</a></h4>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>	 -->
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
						<?php if (mysqli_num_rows($faq_result) > 0): ?>
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
		
		<!-- Our Strategy -->

		<?php
		$strategy = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM strategy_section LIMIT 1"));
		$progress = mysqli_query($con, "SELECT * FROM strategy_progress");
		?>
		<section class="section-full ic-content-bx style-2 text-white" >
			<div class="ic-content-inner bg-secondary" style="background-image: url(images/background/bg2-1.png); background-position: center;">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 content-inner-1 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
							<div class="section-head style-1">
								<h6 class="sub-title text-primary"><?= nl2br($strategy['subheading']) ?></h6>
								<h2 class="title text-white m-b20"><?= $strategy['heading'] ?></h2>
								<p><?= $strategy['description'] ?></p>
							</div>
							<div class="progress-bx style-2 m-b40">
								<div class="progress-info">
									<h4 class="title text-white">Quality Products</h4>
									<h4 class="progress-value text-white">90%</h4>
								</div>
								<div class="progress">
									<div class="progress-bar" style="width: 90%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
							<div class="progress-bx style-2 m-b40">
								<div class="progress-info">
									<h4 class="title text-white">Affordable Cost</h4>
									<h4 class="progress-value text-white">80%</h4>
								</div>
								<div class="progress">
									<div class="progress-bar" style="width: 80%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
							<div class="progress-bx style-2">
								<div class="progress-info">
									<h4 class="title text-white">Business Analytics</h4>
									<h4 class="progress-value text-white">95%</h4>
								</div>
								<div class="progress">
									<div class="progress-bar" style="width: 95%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
							<div class="content-media right">
								<img src="<?= $strategy['image'] ?>" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<!-- Blog
		<section class="content-inner bg-gray line-img" style="background-image:url(images/background/bg2.png); background-position:right bottom; background-size:100%; background-repeat:no-repeat;">
			<div class="container">
				<div class="section-head style-1 text-center">
					<h6 class="sub-title text-primary">OUR BLOG</h6>
					<h2 class="title">Latest News Feed</h2>
				</div> 
				<div class="blog-area">
					<div class="row">
						<div class="col-lg-4 col-md-12 m-b30">
							<div class="ic-card blog-grid style-1 aos-item h-100 overlay-post" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="200">
								<div class="ic-media">
									<a href="blog-details.html"><img src="images/blog/pic1.jpg" alt=""></a>
								</div>
								<div class="ic-info">
									<div class="ic-meta">
										<ul>
											<li class="post-date"><strong>20</strong><span>March</span></li>
											<li class="post-category"><a href="javascript:void(0);">Factory</a></li>
											<li class="post-user">By <a href="javascript:void(0);">John Doe</a></li>
										</ul>
									</div>
									<h5 class="ic-title"><a href="blog-details.html">Seven Outrageous Ideas Industry.</a></h5>
									<div class="read-more">
										<a href="blog-details.html" class="btn btn-primary btn-rounded btn-sm hover-icon">
											<span>Read More</span>
											<i class="fas fa-arrow-right"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 m-b30">
							<div class="ic-card blog-grid style-1 aos-item h-100" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="500">
								<div class="ic-media">
									<a href="blog-details.html"><img src="images/blog/blog-grid/pic2.jpg" alt=""></a>
								</div>
								<div class="ic-info">
									<div class="ic-meta">
										<ul>
											<li class="post-date"><strong>15</strong><span>March</span></li>
											<li class="post-category"><a href="javascript:void(0);">Industry</a></li>
											<li class="post-user">By <a href="javascript:void(0);">John Doe</a></li>
										</ul>
									</div>
									<h5 class="ic-title"><a href="blog-details.html">How To Get People To Like Industry.</a></h5>
									<div class="read-more">
										<a href="blog-details.html" class="btn btn-primary btn-rounded btn-sm hover-icon">
											<span>Read More</span>
											<i class="fas fa-arrow-right"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 m-b30">
							<div class="ic-card blog-grid style-1 aos-item h-100" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="800">
								<div class="ic-media">
									<a href="blog-details.html"><img src="images/blog/blog-grid/pic3.jpg" alt=""></a>
								</div>
								<div class="ic-info">
									<div class="ic-meta">
										<ul>
											<li class="post-date"><strong>05</strong><span>March</span></li>
											<li class="post-category"><a href="javascript:void(0);">Business</a></li>
											<li class="post-user">By <a href="javascript:void(0);">John Doe</a></li>
										</ul>
									</div>
									<h5 class="ic-title"><a href="blog-details.html">Why You Cannot Learn Construction Well.</a></h5>
									<div class="read-more">
										<a href="blog-details.html" class="btn btn-primary btn-rounded btn-sm hover-icon">
											<span>Read More</span>
											<i class="fas fa-arrow-right"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> -->
	
	</div>
	

	

	<?php include('inc/footer.php');?>
</body>
</html>