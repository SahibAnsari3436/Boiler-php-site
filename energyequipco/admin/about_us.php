<?php
include 'includes/config.php';
include 'includes/header.php';


// fetch the page title
include 'page_titles.php';
$current_file = basename($_SERVER['PHP_SELF']);
$page_title = isset($page_titles[$current_file]) ? $page_titles[$current_file] : 'About us';


// Fetch about us data (only 1 record expected)
$aboutus = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM about_us LIMIT 1"));

// Save About Section
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save_about'])) {
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $years = intval($_POST['years_experience']);

    // Upload handler
    function uploadImage($field) {
        if (!empty($_FILES[$field]['name'])) {
            $safeName = preg_replace('/[^A-Za-z0-9.\-_]/', '', strtolower($_FILES[$field]['name']));
            $target = 'uploads/' . $safeName;
            if (!is_dir('uploads')) mkdir('uploads', 0777, true);
            if (move_uploaded_file($_FILES[$field]['tmp_name'], $target)) return $target;
        }
        return '';
    }

    $img1 = uploadImage('image1');
    $img2 = uploadImage('image2');
    $img3 = uploadImage('image3');

    if ($aboutus) {
        $set = "title='$title', description='$description', years_experience=$years";
        if ($img1) $set .= ", image1='$img1'";
        if ($img2) $set .= ", image2='$img2'";
        if ($img3) $set .= ", image3='$img3'";
        mysqli_query($con, "UPDATE about_us SET $set WHERE id={$aboutus['id']}");
    } else {
        mysqli_query($con, "INSERT INTO about_us (title, description, years_experience, image1, image2, image3) 
        VALUES ('$title', '$description', $years, '$img1', '$img2', '$img3')");
    }

    header("Location: about_us.php?success=1");
    exit;
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


        <!-- Output HTML: Show about + add/edit feature buttons -->
<a href="about_us_edit.php" class="btn btn-primary">Edit About Us</a>

<div class="container mt-4">

<?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success">✅ Saved successfully!</div>
    <?php elseif (isset($_GET['deleted'])): ?>
        <div class="alert alert-danger">❌ Deleted successfully!</div>
    <?php endif; ?>

<h3 class="mt-3">About</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Years</th><th>Title</th><th>Description</th><th>Image 1</th><th>Image 2</th><th>Image 3</th><th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($aboutus): ?>
        <tr>
            
            <td><?= $aboutus['years_experience'] ?></td>
                <td><?= htmlspecialchars($aboutus['title']) ?></td>
                <td><?= nl2br(htmlspecialchars($aboutus['description'])) ?></td>
                <td><img src="<?= $aboutus['image1'] ?>" width="80"></td>
                <td><img src="<?= $aboutus['image2'] ?>" width="80"></td>
                <td><img src="<?= $aboutus['image3'] ?>" width="80"></td>
            <td>
                <a href="about_us_edit.php?id=<?= $aboutus['id'] ?>" class="btn btn-sm btn-warning my-1">
                    <i class="bi bi-pencil-square"></i>
                </a>
                
            </td>
        </tr>
        <?php else: ?>
        <tr><td colspan="7" class="text-center text-danger">No about section data found.</td></tr>
        <?php endif; ?>
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

