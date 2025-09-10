<?php
include 'includes/config.php';
include 'includes/header.php';

// fetch the page title
include 'page_titles.php';
$current_file = basename($_SERVER['PHP_SELF']);
$page_title = isset($page_titles[$current_file]) ? $page_titles[$current_file] : 'Cleaver Brooks Boilers';


// Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $con->prepare("DELETE FROM boiler_details WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: cleaver_brooks.php");
    exit;
}

// Fetch latest entry
$result = $con->query("SELECT * FROM boiler_details LIMIT 1");
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

    <a href="cleaver_brooks_edit.php<?php echo ($result->num_rows > 0) ? '?id=' . $result->fetch_assoc()['id'] : ''; ?>" class="btn btn-primary mb-3">
    <?php echo ($result->num_rows > 0) ? 'Edit Details' : 'Add Details'; ?>
    </a>

    <table class="table table-bordered">
      <thead>
        <tr>
            <th>Image</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result = $con->query("SELECT * FROM boiler_details LIMIT 1");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc(); ?>
            <tr>
                <td><img src="../<?php echo $row['image']; ?>" width="150"></td>
                <td><?php echo nl2br($row['description']); ?></td>
                <td>
                    <a href="cleaver_brooks_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-info my-2"><i class="bi bi-pencil-square"></i></a> 
                    <a href="cleaver_brooks.php?delete=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this item?')"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
        <?php } else { ?>
            <tr><td colspan="3" class="text-center">No details found.</td></tr>
        <?php } ?>
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
