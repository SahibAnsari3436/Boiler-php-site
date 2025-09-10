 <?php 
 
 include ('admin/includes/config.php'); 
 include('inc/head.php');

 $pageTitle = "Contact Us";
 
 ?>

<body id="bg">

<?php include('inc/header.php'); ?>
	
	<div class="page-content bg-white">
		
		<!-- Banner -->
		<div class="slidearea bannerside">
			<div class="side-contact-info">
				<ul>
					<li><i class="fas fa-envelope"></i> <?=$setting['email']?></li>
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
								<li class="breadcrumb-item"><?= isset($pageTitle) ? $pageTitle : '' ?></li>
							</ul>
						</nav>
						<!-- Breadcrumb Row End -->
					</div>
				</div>
			</div>
		</div>
		<!-- Banner End -->
		
		<section class="content-inner-3">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-6 m-b30 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
						<div class="icon-bx-wraper style-8 bg-white" data-name="01">
							<div class="icon-md m-r20">
								<span class="icon-cell text-primary"><i class="flaticon-ic-phone-call"></i></span> 
							</div>
							<div class="icon-content">
								<h4 class="tilte m-b10">Call Now</h4>
								<p class="m-b0"> <?=$setting['phone']?></p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 m-b30 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
						<div class="icon-bx-wraper style-8 bg-white" data-name="02">
							<div class="icon-md m-r20">
								<span class="icon-cell text-primary"><i class="flaticon-ic-location"></i></span> 
							</div>
							<div class="icon-content">
								<h4 class="tilte m-b10">Location</h4>
								<p class="m-b0"><?= $setting['address']?></p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 m-b30 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="600">
						<div class="icon-bx-wraper style-8 bg-white" data-name="03">
							<div class="icon-md m-r20">
								<span class="icon-cell text-primary"><i class="flaticon-ic-mail"></i></span> 
							</div>
							<div class="icon-content">
								<h4 class="tilte m-b10">Email Now</h4>
								<p class="m-b0"><?= $setting['email']?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<!-- Contact Form -->
		<section class="content-inner-1 pt-0">
			<div class="map-iframe">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3271.0429939666233!2d-81.97150512520112!3d34.93045867085195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88579de970d75923%3A0x18c6581d636b62b6!2sEnergy%20Equipment%20Co%20Inc!5e0!3m2!1sen!2sin!4v1750238240888!5m2!1sen!2sin" class="align-self-stretch radius-sm" style="border:0; width:100%; min-height:100%;" allowfullscreen></iframe>
				
			</div>
			<div class="container">
				<div class="contact-area aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
					<div class="section-head style-1 text-center">
						<h6 class="sub-title text-primary">Contact Us</h6>
						<h2 class="title">Get In Touch With Us</h2>
					</div>


					<form class="ic-form icForm contact-bx" method="POST" action="script/contact_smtp.php">
						<input type="hidden" class="form-control" name="icToDo" value="Contact">
						<div class="icFormMsg"></div>						
						<div class="row sp10">
							<div class="col-sm-6 m-b20">
								<div class="input-group">
									<input type="text" class="form-control" required name="icFirstName" placeholder="First Name">
								</div>
							</div>
							<div class="col-sm-6 m-b20">
								<div class="input-group">
									<input type="text" class="form-control" required name="icLastName" placeholder="Last Name">
								</div>
							</div>
							<div class="col-sm-6 m-b20">
								<div class="input-group">
									<input type="text" class="form-control" required name="icEmail" placeholder="Email">
								</div>
							</div>
							<div class="col-sm-6 m-b20">
								<div class="input-group">
									<input type="number" class="form-control" required name="icPhoneNumber" placeholder="Phone No.">
								</div>
							</div>
							<div class="col-sm-12 m-b20">
								<div class="input-group">
									<input type="text" class="form-control" required name="icOther" placeholder="Subject">
								</div>
							</div>
							<div class="col-sm-12 m-b20">
								<div class="input-group">
									<textarea name="icMessage" rows="5" class="form-control" placeholder="Message"></textarea>
								</div>
							</div>
							<div class="col-sm-12 m-b20">
								<div class="input-recaptcha">
									<div class="g-recaptcha" data-sitekey="<!-- Put reCaptcha Site Key -->" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
									<input class="form-control d-none" style="display:none;" data-recaptcha="true" required data-error="Please complete the Captcha">
								</div>
							</div>
							<div class="col-sm-12 text-center">
								<button name="submit" type="submit" value="submit" class="btn btn-primary btn-rounded">SUBMIT <i class="m-l10 fas fa-caret-right"></i></button>
							</div>
						</div>
					</form>

					
				</div>
			</div>
		</section>
	</div>
	
	<!-- Footer -->
    <?php include('inc/footer.php'); ?>
</body>
</html>