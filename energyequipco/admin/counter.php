<?php
include 'includes/config.php';
include 'includes/header.php';


// fetch the page title
include 'page_titles.php';
$current_file = basename($_SERVER['PHP_SELF']);
$page_title = isset($page_titles[$current_file]) ? $page_titles[$current_file] : 'Counter Section';

// Delete logic
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($con, "DELETE FROM counter_section WHERE id=$id");
    header("Location: counter.php");
}

// Fetch counters
$counters = mysqli_query($con, "SELECT * FROM counter_section");
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


<a href="counter_edit.php" class="btn btn-success my-3">+ Add New Counter</a>
<table class="table table-bordered">

    <tr>
        <th>#</th>
        <th>Number</th>
        <th>Title 1</th>
        <th>Title 2</th>
        <th>Action</th>
    </tr>
    <?php $i=1; while($row = mysqli_fetch_assoc($counters)) { ?>
    <tr>
        <td><?= $i++ ?></td>
        <td><?= $row['number'] ?></td>
        <td><?= $row['title1'] ?></td>
        <td><?= $row['title2'] ?></td>
        <td>
            <a href="counter_edit.php?id=<?= $row['id'] ?> " class="btn btn-sm btn-warning my-1"><i class="bi bi-pencil-square"></i></a> 
            <a href="counter.php?delete=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this counter?')"><i class="bi bi-trash"></i></a>
        </td>
    </tr>
    <?php } ?>
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
