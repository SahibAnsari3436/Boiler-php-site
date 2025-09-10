<?php
include 'includes/config.php';
include 'includes/header.php';

// fetch the page title
include 'page_titles.php';
$current_file = basename($_SERVER['PHP_SELF']);
$page_title = isset($page_titles[$current_file]) ? $page_titles[$current_file] : 'Add Content';

$type = $_GET['type'] ?? '';
$id = intval($_GET['id'] ?? 0);

// Feature edit
if ($type == 'feature') {
    $row = ['title' => '', 'content' => ''];
    if ($id) {
        $res = mysqli_query($con, "SELECT * FROM about_features WHERE id=$id");
        $row = mysqli_fetch_assoc($res);
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


<h3><?= $id ? 'Edit' : 'Add' ?> Feature</h3>
<form method="post" action="about.php">
    <input type="hidden" name="add_feature" value="1">
    <input type="hidden" name="id" value="<?= $id ?>">
    <label>Title:</label>
    <input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?>" class="form-control" required>
    <label>Content:</label>
    <textarea name="content" class="form-control"><?= htmlspecialchars($row['content']) ?></textarea>
    <button type="submit" class="btn btn-success">Save</button>
</form>

<?php } else {
    // Main About Section
    
    $res = mysqli_query($con, "SELECT * FROM about_section LIMIT 1");
$row = mysqli_fetch_assoc($res) ?: [
    'years_experience' => '',
    'title' => '',
    'description' => '',
    'image1' => '',
    'image2' => '',
    'image3' => ''
];
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


<h3>Edit About Section</h3>
<form method="post" enctype="multipart/form-data" action="about.php">
    <input type="hidden" name="update_about" value="1">
    <label>Years of Experience:</label>
    <input type="number" name="years_experience" class="form-control" value="<?= $row['years_experience'] ?>" required>
    <label>Title:</label>
    <input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?>" class="form-control" required>
    <label>Description:</label>
    <textarea name="description" class="form-control"><?= htmlspecialchars($row['description']) ?></textarea>
    <label>Image 1:</label>
<?php if (!empty($row['image1'])): ?>
    <div><img src="<?= $row['image1'] ?>" width="100" alt="Current Image 1"></div>
<?php endif; ?>
<input type="file" name="image1" class="form-control">

<label>Image 2:</label>
<?php if (!empty($row['image2'])): ?>
    <div><img src="<?= $row['image2'] ?>" width="100" alt="Current Image 2"></div>
<?php endif; ?>
<input type="file" name="image2" class="form-control">

<label>Image 3:</label>
<?php if (!empty($row['image3'])): ?>
    <div><img src="<?= $row['image3'] ?>" width="100" alt="Current Image 3"></div>
<?php endif; ?>
<input type="file" name="image3" class="form-control">
    <button type="submit" class="btn btn-success mt-3">Save</button>
    <a href="about.php" class="btn btn-secondary mt-3">Back</a>
</form>
<?php } ?>



<!--end::App Content-->
      </main>
<!--end::App Main-->
<!--begin::Footer-->

<?php include 'includes/footer.php'; ?>
