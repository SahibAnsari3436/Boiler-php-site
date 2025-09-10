<?php
include 'includes/config.php';
include 'includes/header.php';


// fetch the page title
include 'page_titles.php';
$current_file = basename($_SERVER['PHP_SELF']);
$page_title = isset($page_titles[$current_file]) ? $page_titles[$current_file] : 'Counter Section';



$row = ['heading' => '', 'subheading' => '', 'description' => '', 'image' => ''];
$res = mysqli_query($con, "SELECT * FROM strategy_section LIMIT 1");
if (mysqli_num_rows($res)) {
    $row = mysqli_fetch_assoc($res);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $heading = mysqli_real_escape_string($con, $_POST['heading']);
    $subheading = mysqli_real_escape_string($con, $_POST['subheading']);
    $des = mysqli_real_escape_string($con, $_POST['description']);
    $image = $row['image'];

     // Image upload
    $image = '';
if (!empty($_FILES['image']['name'])) {
    $original_name = $_FILES['image']['name'];

    // Sanitize filename (remove special characters)
    $safe_name = strtolower(preg_replace('/[^a-zA-Z0-9\-_\.]/', '', $original_name));

    // Final path
    $image = 'images/video/' . $safe_name;

    // Move file to destination
    move_uploaded_file($_FILES['image']['tmp_name'], $image);
}

    if ($row['id']) {
        mysqli_query($con, "UPDATE strategy_section SET heading='$heading', subheading='$subheading', description='$des', image='$image' WHERE id=" . $row['id']);
    } else {
        mysqli_query($con, "INSERT INTO strategy_section (heading, subheading, description, image) VALUES ('$heading', '$subheading', '$des', '$image')");
    }

    header('Location: strategy.php');
    exit;
}
?>

<style>
form{
        width: 100%;
    }

</style>


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
    <h2>Edit Strategy Section</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Heading</label>
            <input type="text" name="heading" class="form-control" value="<?= $row['heading'] ?>">
        </div>
        <div class="form-group">
            <label>Subheading</label>
            <textarea name="subheading" class="form-control"><?= $row['subheading'] ?></textarea>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control"><?= $row['description'] ?></textarea>
        </div>
        <div class="form-group">
            <label>Image</label><br>
            <?php if ($row['image']): ?>
                <img src="uploads/<?= $row['image'] ?>" width="120"><br>
            <?php endif; ?>
            <input type="file" name="image">
        </div>
        <button class="btn btn-primary mt-3">Save</button>
        <a href="strategy.php" class="btn btn-secondary mt-3">Back</a>
    </form>
</div>



<!--end::App Content-->
      </main>
<!--end::App Main-->
<!--begin::Footer-->

<?php include 'includes/footer.php'; ?>
