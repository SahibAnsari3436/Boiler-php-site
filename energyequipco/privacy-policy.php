<?php 

include ('admin/includes/config.php');
$pageTitle = "Privacy Policy";


// Fetch Site Information
$setting = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM settings WHERE id = 1"));

$result = mysqli_query($con, "SELECT * FROM privacy_policy ORDER BY id DESC LIMIT 1");
$row = mysqli_fetch_assoc($result);

include('inc/head.php');

?>

<body id="bg">

<?php include('inc/header.php');?>


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
								<li class="breadcrumb-item"><?= isset($pageTitle) ? $pageTitle : '' ?></li>
							</ul>
						</nav>
						<!-- Breadcrumb Row End -->
					</div>
				</div>
			</div>
		</div>
		<!-- Banner End -->


   <!-- Product Details  -->

    <section class="content-inner-2">
        <div class="container">
             <div class="row ">
				<div class="col-lg-12 align-self-center aos-item" data-aos="fade-up" 
                data-aos-duration="800" data-aos-delay="200">
                  <?php echo $row['content']; ?>
			</div>

			 </div>
        
        </div>

    </section>



   <!-- Product Details End -->




<!-- Footer -->
    
	<?php include('inc/footer.php');?>

</body>
</html>