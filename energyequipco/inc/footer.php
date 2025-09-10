<?php 

?>

<!-- Footer -->
    <footer class="site-footer style-1" id="footer">
		
		<div class="container">
			<div class="row">
				<div class="col-lg-5 aos-item" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
					<div class="footer-bg" style=" background-image: url(images/footer-bg.webp);"></div>
				</div>
				<div class="col-lg-7">
					<div class="footer-top">
						<div class="row">
							<div class="col-md-12 aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
								<!-- <div class="footer-logo logo-light">
									<a href="index.html"><img src="images/eec-logo.webp" alt="Footer Logo"></a>
								</div> -->
							</div>	
							<div class="col-md-5 col-sm-6 aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
								<div class="widget widget_services">
									<h4 class="footer-title">Our Links</h4>
									<ul>
										<li><a href="index.php">Home</a></li>
										<li><a href="about-us.php">About Us</a></li>
										<li><a href="boilers.php">Boilers</a></li>
										<li><a href="manufacturers.php">Manufacturers</a></li>
										<li><a href="sell-your-boiler.php">Sell Your Boiler</a></li>
										<li><a href="contact-us.php">Contact Us</a></li>
										<li><a href="request.php">Request Imformation</a></li>
									</ul>
								</div>
							</div>
							<div class="col-md-7 col-sm-6 aos-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
								<div class="widget widget_about">
									<h4 class="footer-title">About Us</h4>
									<p>Energy Equipment Co., Inc., founded in 1981, specializes in the sale of new and used packaged boilers, burners, deaerators, feedwater systems, economizers, water softeners, condensate return systems, and blowdown separators manufactured by Cleaver Brooks.</p>
									<ul class="social-list style-1">
										<li><a href="<?= $setting['facebook']?>" target="_blank" ><i class="fab fa-facebook-f"></i></a></li>
										<li><a href="<?= $setting['instagram']?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
										<li><a href="<?= $setting['twitter']?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
										<li><a href="<?= $setting['linkedin'] ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <!-- footer bottom part -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
					<div class="col-md-8 text-center text-md-start"> 
						<span class="copyright-text">Copyright © 2025 <a href="javascript:void0;" class="text-primary">Energy Equipment Co. Inc.</a> All rights reserved. | Designed By <a href="https://webzent.com/" target="_blank" class="text-primary">Webzent Technologies</a></span>
					</div>
					<div class="col-md-4 text-center text-md-end"> 
						<ul class="footer-link d-inline-block">
							<li><a href="privacy-policy.php">Privacy Policy</a></li>
							<li><a href="terms-of-service.php">Terms Of Service</a></li>
						</ul>
					</div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->
	<button class="scroltop icon-up" type="button"><i class="fa fa-arrow-up"></i></button>
</div>

<!-- JAVASCRIPT FILES ========================================= -->
<script src="js/jquery.min.js"></script><!-- JQUERY.MIN JS -->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="vendor/counter/waypoints-min.js"></script><!-- WAYPOINTS JS -->
<script src="vendor/counter/counterup.min.js"></script><!-- COUNTERUP JS -->
<script src="vendor/magnific-popup/magnific-popup.js"></script><!-- MAGNIFIC POPUP JS -->
<script src="vendor/lightgallery/js/lightgallery-all.min.js"></script><!-- LIGHTGALLERY -->
<script src="vendor/twentytwenty-master/js/jquery.event.move.js"></script>
<script src="vendor/twentytwenty-master/js/jquery.twentytwenty.js"></script>
<script src="vendor/swiper/swiper-bundle.min.js"></script><!-- OWL-CAROUSEL -->
<script src="vendor/aos/aos.js"></script><!-- AOS -->
<script src="js/ic.carousel.js"></script><!-- OWL-CAROUSEL -->
<script src="js/ic.ajax.js"></script><!-- AJAX -->
<script src="js/custom.js"></script><!-- CUSTOM JS -->
<!-- <script src="js/custom.min.js"></script>CUSTOM JS -->
 <script src="js/compare.js"></script>


<script>
  document.querySelectorAll('#accordionFaq .accordion-button').forEach(button => {
    button.addEventListener('click', () => {
      const allButtons = document.querySelectorAll('#accordionFaq .accordion-button .toggle-close');
      allButtons.forEach(el => el.textContent = '+'); // reset all

      setTimeout(() => {
        document.querySelectorAll('#accordionFaq .accordion-collapse').forEach((collapse, index) => {
          const icon = collapse.previousElementSibling.querySelector('.toggle-close');
          if (collapse.classList.contains('show')) {
            icon.textContent = '×';
          }
        });
      }, 300); // wait for collapse animation
    });
  });
</script>
