<?php
include 'includes/config.php';
include 'includes/header.php';

// fetch the page title
include 'page_titles.php';
$current_file = basename($_SERVER['PHP_SELF']);
$page_title = isset($page_titles[$current_file]) ? $page_titles[$current_file] : 'Add Work Step';


$id = $_GET['id'] ?? '';
$step_number = $title = $description = '';

if ($id) {
    $result = mysqli_query($con, "SELECT * FROM work_process WHERE id=$id");
    if ($row = mysqli_fetch_assoc($result)) {
        $step_number = $row['step_number'];
        $title = $row['title'];
        $description = $row['description'];
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $step_number = $_POST['step_number'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    if ($id) {
        $query = "UPDATE work_process SET step_number='$step_number', title='$title', description='$description' WHERE id=$id";
    } else {
        $query = "INSERT INTO work_process (step_number, title, description) VALUES ('$step_number', '$title', '$description')";
    }
    mysqli_query($con, $query);
    header("Location: work_process.php");
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


<form method="POST">
    <label>Step Number:</label><br>
    <input type="number" name="step_number" value="<?= htmlspecialchars($step_number) ?>" required><br><br>

    <label>Title:</label><br>
    <input type="text" name="title" value="<?= htmlspecialchars($title) ?>" required><br><br>

    <label>Description:</label><br>
    <textarea name="description" required><?= htmlspecialchars($description) ?></textarea><br><br>

    <button type="submit">Save</button>
</form>

</div>

<!--end::App Content-->
      </main>
<!--end::App Main-->
<!--begin::Footer-->

<?php include 'includes/footer.php'; ?>