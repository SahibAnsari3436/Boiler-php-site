<?php
include 'includes/config.php';
include 'includes/header.php';

// fetch the page title
include 'page_titles.php';
$current_file = basename($_SERVER['PHP_SELF']);
$page_title = isset($page_titles[$current_file]) ? $page_titles[$current_file] : 'About us';


// Handle delete actions
if (isset($_GET['del_progress'])) {
    $id = (int)$_GET['del_progress'];
    mysqli_query($con, "DELETE FROM strategy_progress WHERE id=$id");
}

$strategy = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM strategy_section LIMIT 1"));
$progress = mysqli_query($con, "SELECT * FROM strategy_progress ORDER BY id DESC");
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


<div class="container mt-4">

<?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success">✅ Saved successfully!</div>
    <?php elseif (isset($_GET['deleted'])): ?>
        <div class="alert alert-danger">❌ Deleted successfully!</div>
    <?php endif; ?>

    <a href="strategy_edit.php" class="btn btn-primary">Edit Strategy Content</a>
    <a href="strategy_progress_edit.php" class="btn btn-success">Add Progress Bar</a>

    <h2 class="mt-4">Strategy Content</h2>
    <table class="table table-bordered">
        <tr><th>Heading</th><th>Subheading</th><th>Description</th><th>Image</th><th>Action</th></tr>
        <tr>
            
            <td><?= $strategy['heading'] ?></td>
            <td><?= $strategy['subheading'] ?></td>
            <td><?= $strategy['description'] ?></td>
            <td><img src="../<?= $strategy['image'] ?>" width="100"></td>
            <td><a href="strategy_edit.php" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a></td>
        </tr>
    </table>

    <h2>Strategy Progress Bar</h2>
    <table class="table table-bordered">
        <tr><th>#</th><th>Label</th><th>Percentage</th><th>Action</th></tr>
        <?php $i = 1; while($row = mysqli_fetch_assoc($progress)): ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $row['label'] ?></td>
                <td><?= $row['percentage'] ?>%</td>
                <td>
                    <a href="strategy_progress_edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-info"><i class="bi bi-pencil-square"></i></a>
                    <a href="strategy.php?del_progress=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this item?')"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
        <?php endwhile; ?>
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
