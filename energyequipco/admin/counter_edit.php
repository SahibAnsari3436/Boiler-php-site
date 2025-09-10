<?php
include 'includes/config.php';
include 'includes/header.php';

// fetch the page title
include 'page_titles.php';
$current_file = basename($_SERVER['PHP_SELF']);
$page_title = isset($page_titles[$current_file]) ? $page_titles[$current_file] : 'Add Content';

$id = $_GET['id'] ?? '';
$row = ['number'=>'', 'title1'=>'', 'title2'=>''];

if ($id) {
    $res = mysqli_query($con, "SELECT * FROM counter_section WHERE id=$id");
    $row = mysqli_fetch_assoc($res);
}

// Save
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $number = $_POST['number'];
    $title1 = $_POST['title1'];
    $title2 = $_POST['title2'];

    if ($id) {
        mysqli_query($con, "UPDATE counter_section SET number='$number', title1='$title1', title2='$title2' WHERE id=$id");
    } else {
        mysqli_query($con, "INSERT INTO counter_section (number, title1, title2) VALUES ('$number', '$title1', '$title2')");
    }
    header("Location: counter.php");
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



<h2><?= $id ? 'Edit' : 'Add' ?> Counter</h2>
<form method="post">

<div class="row mb-3">
    <div class="col-md-4">
        <label>Number</label><br>
        <input type="number" name="number" value="<?= $row['number'] ?>" required><br><br>
    </div>

    <div class="col-md-4">
        <label>Title 1</label><br>
        <input type="text" name="title1" value="<?= $row['title1'] ?>" required><br><br>
    </div>

    <div class="col-md-4">
        <label>Title 2</label><br>
        <input type="text" name="title2" value="<?= $row['title2'] ?>" required><br><br>
    </div>
</div>  

    <button type="submit" class="btn btn-success my-0">Save</button>
    <a href="testimonial.php" class="btn btn-secondary">Back</a>
    
</form>



<!--end::App Content-->
      </main>
<!--end::App Main-->
<!--begin::Footer-->

<?php include 'includes/footer.php'; ?>
