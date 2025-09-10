<?php
include 'includes/config.php';
include 'includes/header.php';


// fetch the page title
include 'page_titles.php';
$current_file = basename($_SERVER['PHP_SELF']);
$page_title = isset($page_titles[$current_file]) ? $page_titles[$current_file] : 'Add Progress Bar';

$row = ['label' => '', 'percentage' => ''];
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id) {
    $res = mysqli_query($con, "SELECT * FROM strategy_progress WHERE id=$id");
    $row = mysqli_fetch_assoc($res);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $label = mysqli_real_escape_string($con, $_POST['label']);
    $percentage = (int)$_POST['percentage'];

    if ($id) {
        mysqli_query($con, "UPDATE strategy_progress SET label='$label', percentage=$percentage WHERE id=$id");
    } else {
        mysqli_query($con, "INSERT INTO strategy_progress (label, percentage) VALUES ('$label', $percentage)");
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
    
    <form method="post">
        <div class="form-group">
            <label>Label</label>
            <input type="text" name="label" class="form-control" value="<?= $row['label'] ?>">
        </div>
        <div class="form-group">
            <label>Percentage</label>
            <input type="number" name="percentage" class="form-control" value="<?= $row['percentage'] ?>">
        </div>
        <button class="btn btn-success mt-2">Save</button>
    </form>
</div>

<!--end::App Content-->
      </main>
<!--end::App Main-->
<!--begin::Footer-->

<?php include 'includes/footer.php'; ?>
