<?php ?>

<div id="loading-area" class="loading-page-1">
	<div class="loading-area">
		<p>Loading</p>
		<span></span>
	</div>
</div>
<div class="page-wraper">

	<!-- Header -->
	<header class="site-header mo-left header style-1">
		<!-- Main Header -->
		<div class="sticky-header main-bar-wraper navbar-expand-lg">
			<div class="main-bar clearfix">
				<div class="container-fluid clearfix">
					
					<!-- Website Logo -->
					<div class="logo-header mostion logo-dark">
						<a href="index.php"><img src="images/<?= $setting['logo']?>" alt="energyequipco-logo"></a>
					</div>
					
					<!-- Nav Toggle Button -->
					<button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
					
					<!-- Extra Nav -->
					<div class="extra-nav">
						<div class="extra-cell">
							<div class="extra-icon-box">
								<i class="fas fa-map-marker-alt"></i>
								<h6 class="title" style="font-size: 1rem;"><?= $setting['address']?></h6>
							</div>
							
							<!-- Quik Search -->
							<!-- <div class="search-inhead">
								<div class="ic-quik-search">
									<form action="#">
										<input name="search" value="" type="text" class="form-control" placeholder="Search">
										<span  id="quik-search-remove"><i class="ti-close"></i></span>
									</form>
								</div>
								<a class="search-link" id="quik-search-btn" href="javascript:void(0);">
									<i class="ti ti-search"></i>
								</a>
							</div> -->
							<!-- <div class="menu-btn navicon">
								<span></span>
								<span></span>
								<span></span>
							</div> -->
						</div>
					</div>
					<div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
						<div class="logo-header logo-dark">
							<a href="index.php"><img src="images/eec-logo.webp" alt="energyequipco-logo"></a>
						</div>
						<ul class="nav navbar-nav navbar navbar-left">	
							<li><a href="index.php">Home</a></li>
							<li><a href="about-us.php">About Us</a></li>
							<li><a href="boilers.php">Boilers</a></li>
							<li class="sub-menu-down"><a href="manufacturers.php">Manufacturers</a>
								<ul class="sub-menu">
									<li><a href="cleaver-brooks-boilers.php">Cleaver Brooks</a></li>
									<li><a href="johnston-boilers.php">Johnston</a></li>
									<li><a href="superior-boilers.php">Superior</a></li>
									<li><a href="hurst-boilers.php">Hurst</a></li>
									<li><a href="additional-boilers.php">Additional Manufacturers</a></li>
								</ul>
							</li>
							<li><a href="sell-your-boiler.php">Sell Your Boiler</a></li>
							<li><a href="contact-us.php">Contact Us</a></li>
						</ul>
						<div class="ic-social-icon">
							<ul>
								<li><a href="https://www.facebook.com/" target="_blank" ><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>
								<li><a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>
								<li><a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a></li>
							</ul>
						</div>	
					</div>
				</div>
			</div>
		</div>
		<!-- Main Header End -->
	</header>
	<!-- Header End -->