<?php
include 'includes/config.php';
include 'includes/header.php';

// fetch the page title
include 'page_titles.php';
$current_file = basename($_SERVER['PHP_SELF']);
$page_title = isset($page_titles[$current_file]) ? $page_titles[$current_file] : 'Add Content';

$image = '';
$description = '';
$id = null;

// Load data if editing
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $con->prepare("SELECT * FROM superior_boiler WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $data = $stmt->get_result()->fetch_assoc();
    if ($data) {
        $image = $data['image'];
        $description = $data['description'];
    }
}

// Handle form submission
if (isset($_POST['submit'])) {
    $id = $_POST['id'] ?? null;
    $description = $_POST['description'];
    $uploadDir = 'uploads/boiler_details/';

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (!empty($_FILES['image']['name'])) {
        $originalName = basename($_FILES['image']['name']);
        $targetPath = $uploadDir . $originalName;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
            $image = 'images/product/' . $originalName;
        }
    }

    if (!empty($id)) {
        // Update
        $stmt = $con->prepare("UPDATE superior_boiler SET image = ?, description = ? WHERE id = ?");
        $stmt->bind_param("ssi", $image, $description, $id);
    } else {
        // Insert
        $stmt = $con->prepare("INSERT INTO superior_boiler (image, description) VALUES (?, ?)");
        $stmt->bind_param("ss", $image, $description);
    }

    if ($stmt->execute()) {
        header("Location: superior_boiler.php");
        exit;
    } else {
        echo "<p style='color:red;'>Failed to save data.</p>";
    }
}
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
    
<h2><?php echo $id ? 'Edit' : 'Add'; ?> Boiler Details</h2>
<form method="post" enctype="multipart/form-data">
    <label>Image:</label><br>
    <?php if ($image) { ?>
        <img src="../<?php echo $image; ?>" width="120"><br>
    <?php } ?>
    <input type="file" name="image"><br><br>

    <label>Description:</label><br>
    <textarea name="description" rows="8" cols="80"><?php echo htmlspecialchars($description); ?></textarea><br><br>

    <input type="submit" name="submit" value="Save" class="btn btn-success">
</form>
</div>



<!--end::App Content-->
      </main>
<!--end::App Main-->
<!--begin::Footer-->

<?php include 'includes/footer.php'; ?>
