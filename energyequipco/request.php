<?php 

include('inc/head.php');
$pageTitle = "Request Information";


?>

<body id="bg">

<?php include('inc/header.php');?>

<?php
// Get selected IDs from query string
$ids = isset($_GET['ids']) ? $_GET['ids'] : '';

if ($ids) {
    // Split into parts
    $parts = explode('-', $ids, 2);
    $table = $parts[0]; // table name
    $idString = $parts[1] ?? '';

    // Convert to array of integers
    $idArray = array_filter(array_map('intval', explode('+', $idString)));

    // Allowed tables (security)
    $allowedTables = [
        'cleaver_table',
        'hurst_table',
        'johnston_table',
        'other_table',
        'superior_table'
    ];

    $selectedBoilers = [];

    if (in_array($table, $allowedTables, true) && !empty($idArray)) {
        $idList = implode(',', $idArray);
        $query = "SELECT * FROM `$table` WHERE id IN ($idList)";
        if ($result = mysqli_query($con, $query)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $row['source_table'] = $table;
                $selectedBoilers[] = $row;
            }
            mysqli_free_result($result);
        } else {
            echo "<p style='color:red;'>Error fetching data from $table: " .
                 htmlspecialchars(mysqli_error($con)) . "</p>";
        }
    }
}


?>


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
								<li class="breadcrumb-item"><a href="index.html">Home</a></li>
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

<?php if (!empty($selectedBoilers)) { ?>
                <h3>Selected Boilers</h3>
                <table border="1" cellpadding="8" cellspacing="0" width="100%" style="margin-bottom: 20px;">
                    <thead>
                        <tr>
                            <th>Item #</th>
                            <th>Year</th>
                            <th>Horsepower</th>
                            <th>Manufacturer</th>
                            <th>Pressure</th>
                            <th>Steam/Hot Water</th>
                            <th>Burner</th>
                            <th>Fuel(s)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($selectedBoilers as $boiler) { ?>
                            <tr>
                                <td><?= htmlspecialchars($boiler['item_number']) ?></td>
                                <td><?= htmlspecialchars($boiler['year']) ?></td>
                                <td><?= htmlspecialchars($boiler['horsepower']) ?></td>
                                <td><?= htmlspecialchars($boiler['manufacturer']) ?></td>
                                <td><?= htmlspecialchars($boiler['pressure']) ?></td>
                                <td><?= htmlspecialchars($boiler['steam_or_hot_water']) ?></td>
                                <td><?= htmlspecialchars($boiler['burner']) ?></td>
                                <td><?= htmlspecialchars($boiler['fuel']) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
    <p>No boilers selected or found.</p>
<?php } ?>

         
            <div class="form">
                <p><strong>Enter your comments/questions and click Submit to send us an email.</strong></p>

            <form id="requestForm" method="POST" action="send_request.php" enctype="multipart/form-data">
            <input type="hidden" name="selected_ids" value="<?= htmlspecialchars($ids) ?>">

            <div class="form-section">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" value="Used Firetube, Watertube, & Vertical Boilers">

            <p><strong>Attach files</strong> | Up to 5 files for a total size limit of 10MB.</p>
            <div class="file-upload">
            <label class="upload-btn" for="fileInput">Attach File</label>
            <input type="file" id="fileInput" name="attachments[]" multiple>
            <span class="file-name" id="fileName">No files selected</span>
            </div>
            </div>

            <div class="form-section">
            <p><strong>Your Information</strong></p>
            <p><em>Required Fields <span class="required">*</span></em></p>

            <div class="form-grid">
            <div class="form-group">
            <label>Name <span class="required">*</span></label>
            <input type="text" name="name" required>
            </div>
            <div class="form-group">
            <label>Title</label>
            <input type="text" name="title">
            </div>

            <div class="form-group">
            <label>Company</label>
            <input type="text" name="company">
            </div>
            <div class="form-group">
            <label>Address Line 1</label>
            <input type="text" name="address1">
            </div>

            <div class="form-group">
            <label>Address Line 2</label>
            <input type="text" name="address2">
            </div>
            <div class="form-group">
            <label>City</label>
            <input type="text" name="city">
            </div>

            <div class="form-group">
            <label>State</label>
            <input type="text" name="state">
            </div>
            <div class="form-group">
            <label>Zip/Postal Code</label>
            <input type="text" name="zip">
            </div>

            <div class="form-group">
            <label>Country</label>
            <input type="text" name="country">
            </div>
            <div class="form-group">
            <label>Phone Number</label>
            <input type="text" name="phone">
            </div>

            <div class="form-group">
            <label>Fax Number</label>
            <input type="text" name="fax">
            </div>
            <div class="form-group">
            <label>Email <span class="required">*</span></label>
            <input type="email" name="email" required>
            </div>

            <div class="form-group checkbox-label full">
            <input type="checkbox" id="copyToSelf" name="copy_to_self">
            <label for="copyToSelf">Send Copy to Self</label>
            </div>

            <div class="form-group checkbox-label full">
            <input type="checkbox" id="rememberInfo" name="remember_info">
            <label for="rememberInfo">Remember my Information</label>
            </div>

            <div class="form-group full">
            <label>Comments</label>
             <textarea name="comments"></textarea>
            </div>

            <div class="form-group full">
            <label>reCAPTCHA <span class="required">*</span></label>
            <div class="recaptcha-placeholder">[reCAPTCHA here]</div>
            </div>
            </div>
            </div>

                <div class="actions">
                <button type="reset">Cancel</button>
                <button type="submit">Submit</button>
                </div>
            </form>
            </div>


        </div>
    </section>


<!-- Footer -->
    
	<?php include('inc/footer.php');?>

</body>
</html>