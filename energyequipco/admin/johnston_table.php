<?php
include 'includes/config.php';
include 'includes/header.php';

// fetch the page title
include 'page_titles.php';
$current_file = basename($_SERVER['PHP_SELF']);
$page_title = isset($page_titles[$current_file]) ? $page_titles[$current_file] : 'johnston Table';


// Delete record
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($con, "DELETE FROM johnston_table WHERE item_number='$id'");
    header("Location: johnston_table.php");
    exit;
}

// Fetch all records
$result = mysqli_query($con, "SELECT * FROM johnston_table ORDER BY created_at ASC");
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

        
<a href="johnston_table_edit.php" class="btn btn-primary mb-3">+ Add New Entry</a>
<table class="table table-bordered">
    <tr>
        <th>Item #</th>
        <th>Year</th>
        <th>Horsepower</th>
        <th>Manufacturer</th>
        <th>Pressure</th>
        <th>Steam or Hot Water</th>
        <th>Burner</th>
        <th>Fuel(s)</th>
        <th>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= htmlspecialchars($row['item_number']) ?></td>
            <td><?= $row['year'] ?></td>
            <td><?= $row['horsepower'] ?></td>
            <td><?= $row['manufacturer'] ?></td>
            <td><?= $row['pressure'] ?></td>
            <td><?= $row['steam_or_hot_water'] ?></td>
            <td><?= $row['burner'] ?></td>
            <td><?= $row['fuel'] ?></td>
            <td>
                <a href="johnston_table_edit.php?id=<?= $row['item_number'] ?>"  class="btn btn-sm btn-info my-2"><i class="bi bi-pencil-square"></i></a>
                <a href="?delete=<?= $row['item_number'] ?>" onclick="return confirm('Delete this entry?')" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
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
