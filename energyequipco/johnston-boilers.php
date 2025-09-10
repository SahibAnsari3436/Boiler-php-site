<?php

include('inc/head.php');

$pageTitle = "Johnston Boiler";

?>

<body id="bg">

<?php include('inc/header.php');?>


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

            <div class="action-links style-1 text-center m-b30 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                <a href="printitems.php?type=johnston" class="action-link"><i class="fas fa-print"></i> Printable Page</a>
                <a href="download_pdf.php?type=johnston" class="action-link"><i class="fas fa-file-pdf"></i> Download PDF</a>
                <a href="#" class="action-link"><i class="fas fa-envelope"></i> Email This Page</a>
            </div>

    <div class="row">
      
      <!-- First Column: Carousel -->
     <?php
$query = "SELECT * FROM johnston_boiler WHERE id = 1";
$result = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($result);
?>
      <div class="col-lg-6 align-self-center aos-item" data-aos="fade-up">
        <div class="johnston-carousel">

          <div class="johnston-carousel-track" id="johnston-carousel-track">
                <?php if (!empty($data['image1'])): ?>
                    <img src="<?php echo $data['image1']; ?>" alt="Slide 1">
                <?php endif; ?>
                <?php if (!empty($data['image2'])): ?>
                    <img src="<?php echo $data['image2']; ?>" alt="Slide 2">
                <?php endif; ?>
            </div>
          <button class="johnston-carousel-btn prev" id="johnston-carousel-prev">&#10094;</button>
          <button class="johnston-carousel-btn next" id="johnston-carousel-next">&#10095;</button>
        </div>
      </div>

      <!-- Second Column: Text -->
      <div class="col-lg-6 align-self-center aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
        <?php if (!empty($data['description'])): ?>
            <?php
                // Optional: Split into paragraphs
                $paragraphs = explode("\n", $data['description']);
                foreach ($paragraphs as $para) {
                    echo "<p>" . nl2br(htmlspecialchars(trim($para))) . "</p>";
                }
            ?>
        <?php else: ?>
            <p>Description not available.</p>
        <?php endif; ?>
      </div>

    </div>

  </div>
</section>




   <!-- Product Details End -->


<section class="content-inner-2">
    <div class="container">


<?php
// Get per-page value (default 10)
$perPage = isset($_GET['perPage']) ? intval($_GET['perPage']) : 10;
if ($perPage <= 0) $perPage = 10;

// Get current page (default 1)
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page <= 0) $page = 1;

// Get total records
$totalResult = mysqli_query($con, "SELECT COUNT(*) as total FROM johnston_table");
$totalRow = mysqli_fetch_assoc($totalResult);
$totalRecords = $totalRow['total'];

// Calculate pagination offsets
$startFrom = ($page - 1) * $perPage;
$startDisplay = $startFrom + 1;
$endDisplay = min($startFrom + $perPage, $totalRecords);

// Fetch only current page rows
$result = mysqli_query($con, "SELECT * FROM johnston_table ORDER BY created_at ASC LIMIT $startFrom, $perPage");
?>



         <div class="list-header">
         <span><span><?= $startDisplay ?> - <?= $endDisplay ?> of <?= $totalRecords ?></span></span>
         <div>
             <label for="perPage">Results Per Page</label>
             <select id="perPage" onchange="changePerPage(this.value)">
            <option value="10" <?= $perPage==10 ? 'selected' : '' ?>>10</option>
            <option value="20" <?= $perPage==20 ? 'selected' : '' ?>>20</option>
            <option value="30" <?= $perPage==30 ? 'selected' : '' ?>>30</option>
            <option value="40" <?= $perPage==40 ? 'selected' : '' ?>>40</option>
        </select>
             <!-- <label>View</label>
             <span><a href="javascript:void(0);"><i class="fa fa-list-ul" aria-hidden="true"></i></a></span>
             <span><a href="javascript:void(0);"><i class="fa fa-th" aria-hidden="true"></i></a></span> -->
             
         </div>
    </div>

  <div class="actions">
    <button id="requestInfoBtn" type="button">Request Information</button>
    <button id="compareBtn" type="button">Compare Items</button>
  </div>

  <div id="selectedItemsBox" style="display:none; padding:10px; background:#f8f9fa; margin-bottom:15px; border:1px solid #ccc;">
				<strong>Selected Items:</strong> <span id="selectedItemsList"></span>
  </div>



  <table>
    <thead>
      <tr>
        <th class="checkbox-col"></th>
        <th>Item #</th>
        <th>Year</th>
        <th>Horsepower</th>
        <th>Manufacturer</th>
        <th>Pressure</th>
        <th>Steam or Hot Water</th>
        <th>Burner</th>
        <th>Fuel(s)</th>
      </tr>
    </thead>
    <tbody>

    <?php if ($result && mysqli_num_rows($result) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><input type="checkbox" class="itemCheckbox" data-table="johnston_table"
       value="<?= htmlspecialchars($row['id']) ?>"></td>
                                <td><?= htmlspecialchars($row['item_number']) ?></td>
                                <td><?= htmlspecialchars($row['year']) ?></td>
                                <td><?= htmlspecialchars($row['horsepower']) ?></td>
                                <td><?= htmlspecialchars($row['manufacturer']) ?></td>
                                <td><?= htmlspecialchars($row['pressure']) ?></td>
                                <td><?= htmlspecialchars($row['steam_or_hot_water']) ?></td>
                                <td><?= htmlspecialchars($row['burner']) ?></td>
                                <td><?= htmlspecialchars($row['fuel']) ?></td>
                            </tr>
                        <?php } ?>
                    <?php else: ?>
                        <tr><td colspan="9">No records found</td></tr>
                    <?php endif; ?>
    </tbody>
  </table>
  </div>

</section>





<!-- Footer -->
    
	<?php include('inc/footer.php');?>


  

</body>
</html>