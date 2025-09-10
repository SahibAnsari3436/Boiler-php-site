<?php
include 'includes/config.php';
include 'includes/header.php';

// fetch the page title
include 'page_titles.php';
$current_file = basename($_SERVER['PHP_SELF']);
$page_title = isset($page_titles[$current_file]) ? $page_titles[$current_file] : 'Terms Of  Service';

// Fetch the latest terms of service
$result = mysqli_query($con, "SELECT * FROM terms_of_service ORDER BY id DESC LIMIT 1");
$row = mysqli_fetch_assoc($result);
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


<a href="terms_of_service_edit.php" class="btn btn-primary">Edit Content</a>

       <div class="container mt-4">

<?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success">✅ Saved successfully!</div>
    <?php elseif (isset($_GET['deleted'])): ?>
        <div class="alert alert-danger">❌ Deleted successfully!</div>
    <?php endif; ?>


<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th><th>Content</th><th>Date-Time</th><th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($row) { ?>
        <tr>
            <td>1</td>
            <td><?php echo $row['content']; ?></td>
            <td><?= $row['created_at'] ?></td>
            <td>
                <a href="terms_of_service_edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning my-1">
                    <i class="bi bi-pencil-square"></i>
                </a>
                
            </td>
        </tr>
        <?php } else ?>

    </tbody>
</table>



       </div>

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

<?php include 'includes/footer.php'; ?>