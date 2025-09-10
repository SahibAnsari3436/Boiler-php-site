<?php
include 'includes/config.php';
include 'includes/header.php';


// fetch the page title
include 'page_titles.php';
$current_file = basename($_SERVER['PHP_SELF']);
$page_title = isset($page_titles[$current_file]) ? $page_titles[$current_file] : 'Brands';


// Delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($con, "DELETE FROM brands WHERE id = $id");
    header("Location: brands.php?deleted=1");
    exit;
}


  // Image upload
    $image = '';
if (!empty($_FILES['image']['name'])) {
    $original_name = $_FILES['image']['name'];

    // Sanitize filename (remove special characters)
    $safe_name = strtolower(preg_replace('/[^a-zA-Z0-9\-_\.]/', '', $original_name));

    // Final path
    $image = 'images/logo/' . $safe_name;

    // Move file to destination
    move_uploaded_file($_FILES['image']['tmp_name'], $image);
    mysqli_query($con, "INSERT INTO brands (image) VALUES ('$image')");
    header("Location: brands.php");
}
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

    <a href="brands_edit.php" class="btn btn-primary mb-3">Add Brands Logo</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
       <?php
    $result = mysqli_query($con, "SELECT * FROM brands ORDER BY id ASC");
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td><img src='../{$row['image']}' width='100' style='height:auto;'></td>
                    <td>
                        <a href='brands_edit.php?id={$row['id']}' class='btn btn-sm btn-info'><i class='bi bi-pencil-square'> </i></a>
                        <a href='brands.php?delete={$row['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Delete this brand?\")'>
                            <i class='bi bi-trash'></i>
                        </a>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Error loading brands: " . mysqli_error($con) . "</td></tr>";
    }
?>
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
