<?php
include ('includes/config.php');
include ('includes/header.php');

$res = mysqli_query($con, "SELECT * FROM settings WHERE id=1");
$row = mysqli_fetch_assoc($res);

// fetch the page title

include 'page_titles.php';
$current_file = basename($_SERVER['PHP_SELF']);
$page_title = isset($page_titles[$current_file]) ? $page_titles[$current_file] : 'Page';
?>


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


        <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            ✅ Settings updated successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>

          <form method="post" action="settings.php" enctype="multipart/form-data" class="container mt-4">
            <input type="hidden" name="id" value="1">

            <!-- Row 1: Site Title, Email, Phone -->
            <div class="row mb-3">
              <div class="col-md-4">
                <label class="form-label">Site Title:</label>
                <input type="text" name="site_title" class="form-control" value="<?= $row['site_title'] ?>">
              </div>
              <div class="col-md-4">
                <label class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" value="<?= $row['email'] ?>">
              </div>
              <div class="col-md-4">
                <label class="form-label">Phone:</label>
                <input type="text" name="phone" class="form-control" value="<?= $row['phone'] ?>">
              </div>
            </div>

            <!-- Row 2: Address -->
            <div class="mb-3">
              <label class="form-label">Address:</label>
              <textarea name="address" class="form-control"><?= $row['address'] ?></textarea>
            </div>

            <!-- Row 3: Facebook, Twitter, Instagram -->
            <div class="row mb-3">
              <div class="col-md-4">
                <label class="form-label">Facebook:</label>
                <input type="text" name="facebook" class="form-control" value="<?= $row['facebook'] ?>">
              </div>
              <div class="col-md-4">
                <label class="form-label">Twitter:</label>
                <input type="text" name="twitter" class="form-control" value="<?= $row['twitter'] ?>">
              </div>
              <div class="col-md-4">
                <label class="form-label">Instagram:</label>
                <input type="text" name="instagram" class="form-control" value="<?= $row['instagram'] ?>">
              </div>
            </div>

            <!-- Row 4: LinkedIn -->
            <div class="mb-3">
              <label class="form-label">LinkedIn:</label>
              <input type="text" name="linkedin" class="form-control" value="<?= $row['linkedin'] ?>">
            </div>

            <!-- Row 5: Logo and Favicon -->
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Logo:</label><br>
                <?php if($row['logo']) { echo "<img src='../uploads/".$row['logo']."' width='80' class='mb-2'><br>"; } ?>
                <input type="file" name="logo" class="form-control">
              </div>
              <div class="col-md-6">
                <label class="form-label">Favicon:</label><br>
                <?php if($row['favicon']) { echo "<img src='../uploads/".$row['favicon']."' width='32' class='mb-2'><br>"; } ?>
                <input type="file" name="favicon" class="form-control">
              </div>
            </div>

  <button type="submit" name="save" class="btn btn-primary">Save Settings</button>
</form>




 <!--end::App Content-->
      </main>

      
      <!--end::App Main-->

      
      <!--begin::Footer-->
      <script>
  setTimeout(function () {
    var alert = document.querySelector('.alert');
    if (alert) {
      var bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
      bsAlert.close();
    }
  }, 3000); // Hide after 3 seconds
</script>
<?php 

include('includes/footer.php');

?>