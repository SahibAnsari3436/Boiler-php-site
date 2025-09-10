<?php
include 'includes/config.php';
include 'includes/header.php';


// fetch the page title
include 'page_titles.php';
$current_file = basename($_SERVER['PHP_SELF']);
$page_title = isset($page_titles[$current_file]) ? $page_titles[$current_file] : 'Work Process';

// Delelte
if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($con, "DELETE FROM work_process  WHERE id=$id");
    header("Location: work_process.php");
    exit;
}

// Fetch All

$work_items = mysqli_query($con, "SELECT * FROM work_process ORDER BY step_number ASC");
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


<a href="work_process_edit.php" class="btn btn-primary my-3">+ Add New</a>

<table class="table table-bordered">
    <tr>
        <th>#</th>
        <th>Step</th>
        <th>Title</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($work_items)): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= str_pad($row['step_number'], 2, '0', STR_PAD_LEFT) ?></td>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= htmlspecialchars($row['description']) ?></td>
            <td>
                <a href="work_process_edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning my-1"><i class="bi bi-pencil-square"></i></a>
                <a href="work_process.php?delete=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this?')"><i class="bi bi-trash"></i></a>
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
