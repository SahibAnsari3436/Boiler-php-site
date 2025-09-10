<?php 

include ('admin/includes/config.php'); 
include('inc/head.php');

$pageTitle = "Sell Your Equipment";


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


<div class="container py-4">
  
  <a href="#" class="btn-request">Request Information</a>

    <!-- Item 1 -->

    <?php
$query = mysqli_query($con, "SELECT * FROM equipment_cards ORDER BY id DESC");
while ($row = mysqli_fetch_assoc($query)) {
?>
  <div class="equipment-card">
    <?php if (!empty($row['link'])) { ?>
      <a href="<?php echo $row['link']; ?>" class="card-img" target="_blank">
        <img src="http://localhost/energyequipco/<?php echo $row['image']; ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
      </a>
    <?php } else { ?>
      <div class="card-img">
        <img src="http://localhost/energyequipco/<?php echo $row['image']; ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
      </div>
    <?php } ?>

    <div>
      <h3>
        <?php if (!empty($row['link'])) { ?>
          <a href="<?php echo $row['link']; ?>" target="_blank"><?php echo htmlspecialchars($row['title']); ?></a>
        <?php } else { ?>
          <?php echo htmlspecialchars($row['title']); ?>
        <?php } ?>
      </h3>
      <p><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>

      <div class="more-content">
        <p><?php echo nl2br(htmlspecialchars($row['more_des'])); ?></p>
      </div>

      <span class="toggle-more" onclick="toggleMore(this)">+ More</span>
    </div>
  </div>
<?php
}
?>
    
  </div>

</div>


<!-- Footer -->
    
	<?php include('inc/footer.php');?>

</body>
</html>