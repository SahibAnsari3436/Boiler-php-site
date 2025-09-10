<?php 

session_start();
if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== true) {
    header("Location: login.php");
    exit();
}
$adminName = $_SESSION['auth_user']['username'];


include('includes/config.php');
include('includes/header.php');


include 'page_titles.php';
$current_file = basename($_SERVER['PHP_SELF']);
$page_title = isset($page_titles[$current_file]) ? $page_titles[$current_file] : 'Page';



$setting = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM settings WHERE id = 1"));
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
      <main class="app-main" style="background: #fff;">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <!-- <div class="col-sm-6"><h3 class="mb-0"><?= $page_title ?></h3></div> -->
              <div class="col-sm-6">
                <!-- <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol> -->
              </div>

              <div class="row">
                <div class="d-flex justify-content-center align-items-center" style="height: 60vh;">
                  <div class="col-sm-12 text-center">
                    <img src="../images/<?= $setting['favicon']?>" width="150px;" height="auto">
                    <h1 class="mb-0">Welcome to Energy Equipment</h1>
                  </div>
                </div>
              
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->



        
        <!--end::App Content-->
      </main>

      
      <!--end::App Main-->

      
      <!--begin::Footer-->
<?php 

include('includes/footer.php');

?>