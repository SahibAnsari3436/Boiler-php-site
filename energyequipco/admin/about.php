<?php
include 'includes/config.php';
include 'includes/header.php';


// fetch the page title
include 'page_titles.php';
$current_file = basename($_SERVER['PHP_SELF']);
$page_title = isset($page_titles[$current_file]) ? $page_titles[$current_file] : 'About us';

// Delete a feature if needed
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($con, "DELETE FROM about_features WHERE id=$id");
    header("Location: about.php?deleted=1");
    exit;
}


// Save About Section
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_about'])) {
    $years = intval($_POST['years_experience']);
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $desc = mysqli_real_escape_string($con, $_POST['description']);

    // Handle image uploads
    function uploadImage($field) {
    if (!empty($_FILES[$field]['name'])) {
        $originalName = $_FILES[$field]['name'];
        $safeName = preg_replace('/[^A-Za-z0-9.\-_]/', '', strtolower($originalName)); // sanitize
        $targetPath = 'uploads/' . $safeName;

        // Ensure uploads/ directory exists
        if (!is_dir('uploads')) {
            mkdir('uploads', 0777, true);
        }

        if (move_uploaded_file($_FILES[$field]['tmp_name'], $targetPath)) {
            return $targetPath; // Save full path to DB
        }
    }
    return '';
}

    $image1 = uploadImage('image1');
    $image2 = uploadImage('image2');
    $image3 = uploadImage('image3');

    // Update or Insert (Assume only 1 record exists)
    $existing = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM about_section LIMIT 1"));
    if ($existing) {
        $set = "years_experience=$years, title='$title', description='$desc'";
        if ($image1) $set .= ", image1='$image1'";
        if ($image2) $set .= ", image2='$image2'";
        if ($image3) $set .= ", image3='$image3'";
        mysqli_query($con, "UPDATE about_section SET $set WHERE id=" . $existing['id']);
    } else {
        mysqli_query($con, "INSERT INTO about_section (years_experience, title, description, image1, image2, image3) 
            VALUES ($years, '$title', $desc', '$image1', '$image2', '$image3')");
    }

    header("Location: about.php?success=1");
    exit;
}

// Save Feature
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_feature'])) {
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $content = mysqli_real_escape_string($con, $_POST['content']);

    if ($id) {
        mysqli_query($con, "UPDATE about_features SET title='$title', content='$content' WHERE id=$feature_id");
    } else {
        // INSERT new
        mysqli_query($con, "INSERT INTO about_features (title, content) VALUES ('$title', '$content')");
    }

    header("Location: about.php?success=1");
    exit;
}

// Fetch About Us data
$about = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM about_section LIMIT 1"));
$features = mysqli_query($con, "SELECT * FROM about_features ORDER BY sort_order, id");
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
<a href="about_edit.php" class="btn btn-primary">Edit About Section</a>
<a href="about_edit.php?type=feature" class="btn btn-success">Add Feature</a>


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
            <th>#</th><th>Years</th><th>Title</th><th>Description</th><th>Image 1</th><th>Image 2</th><th>Image 3</th><th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($about): ?>
        <tr>
            <td>1</td>
            <td><?= htmlspecialchars($about['years_experience']) ?></td>
            <td><?= htmlspecialchars($about['title']) ?></td>
            <td><?= htmlspecialchars($about['description']) ?></td>
            <td><img src="<?= htmlspecialchars($about['image1']) ?>" width="80"></td>
            <td><img src="<?= htmlspecialchars($about['image2']) ?>" width="80"></td>
            <td><img src="<?= htmlspecialchars($about['image3']) ?>" width="80"></td>
            <td>
                <a href="about_edit.php?id=<?= $about['id'] ?>" class="btn btn-sm btn-warning my-1">
                    <i class="bi bi-pencil-square"></i>
                </a>
                
            </td>
        </tr>
        <?php else: ?>
        <tr><td colspan="7" class="text-center text-danger">No about section data found.</td></tr>
        <?php endif; ?>
    </tbody>
</table>







<h3 class="mt-3">Features</h3>
<table class="table table-bordered">
    <thead><tr><th>#</th><th>Title</th><th>Content</th><th>Action</th></tr></thead>
    <tbody>
        <?php $i=1; while($row = mysqli_fetch_assoc($features)): ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= htmlspecialchars($row['content']) ?></td>
            <td>
                <a href="about_edit.php?id=<?= $row['id'] ?>&type=feature" class="btn btn-sm btn-warning my-1"><i class="bi bi-pencil-square"></i></a>
                <a href="about.php?delete=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')"><i class="bi bi-trash"></i></a>
            </td>
        </tr>
        <?php endwhile; ?>
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
