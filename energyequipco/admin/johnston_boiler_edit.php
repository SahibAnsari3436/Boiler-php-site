<?php
include 'includes/config.php';
include 'includes/header.php';

// fetch the page title
include 'page_titles.php';
$current_file = basename($_SERVER['PHP_SELF']);
$page_title = isset($page_titles[$current_file]) ? $page_titles[$current_file] : 'Edit Details';

$message = "";
$id = 1; // fixed single record

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $description = mysqli_real_escape_string($con, $_POST['description']);

    $targetDir = "images/product/";
    $image1Path = $image2Path = "";

    // Handle image 1
    if (!empty($_FILES["image1"]["name"])) {
        $image1Path = $targetDir . time() . '_1_' . basename($_FILES["image1"]["name"]);
        move_uploaded_file($_FILES["image1"]["tmp_name"], $image1Path);
    }

    // Handle image 2
    if (!empty($_FILES["image2"]["name"])) {
        $image2Path = $targetDir . time() . '_2_' . basename($_FILES["image2"]["name"]);
        move_uploaded_file($_FILES["image2"]["tmp_name"], $image2Path);
    }

    // Check if data exists
    $check = mysqli_query($con, "SELECT * FROM johnston_boiler WHERE id = $id");
    if (mysqli_num_rows($check) > 0) {
        // Update
        $updateSQL = "UPDATE johnston_boiler SET description='$description'";
        if ($image1Path) $updateSQL .= ", image1='$image1Path'";
        if ($image2Path) $updateSQL .= ", image2='$image2Path'";
        $updateSQL .= " WHERE id = $id";

        $update = mysqli_query($con, $updateSQL);
        if ($update) {
            header("Location: johnston_boiler.php?success=1");
            exit;
        } else {
            $message = "❌ Update failed.";
        }
    } else {
        // Insert
        $insert = mysqli_query($con, "INSERT INTO johnston_boiler (id, image1, image2, description) VALUES ($id, '$image1Path', '$image2Path', '$description')");
        if ($insert) {
            header("Location: johnston_boiler.php?success=1");
            exit;
        } else {
            $message = "❌ Insert failed.";
        }
    }
}

// Fetch existing data
$data = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM johnston_boiler WHERE id = $id"));
?>


<style>
    form{
        width: 100%;
    }
</style>

<!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
     <?php include('includes/topbar.php')?>
      <!--end::Header-->
      <!--begin::Sidebar-->
      <?php include('includes/sidebar.php') ?>
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <!-- <div class="col-sm-6"><h3 class="mb-0">Dashboard</h3></div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                  </ol>
                </div>
            </div> -->
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->

<div class="container mt-4">
    
    <?php if ($message): ?>
        <div class="alert alert-warning"><?php echo $message; ?></div>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Image 1</label><br>
            <?php if (!empty($data['image1'])): ?>
                <img src="../<?php echo $data['image1']; ?>" width="150" class="mb-2"><br>
            <?php endif; ?>
            <input type="file" name="image1" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Image 2</label><br>
            <?php if (!empty($data['image2'])): ?>
                <img src="../<?php echo $data['image2']; ?>" width="150" class="mb-2"><br>
            <?php endif; ?>
            <input type="file" name="image2" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="6"><?php echo htmlspecialchars($data['description'] ?? ''); ?></textarea>
        </div>

        <button type="submit" class="btn btn-success my-0">Save</button>
        <a href="johnston_boiler.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>



<!--end::App Content-->
      </main>
<!--end::App Main-->
<!--begin::Footer-->

<?php include 'includes/footer.php'; ?>
