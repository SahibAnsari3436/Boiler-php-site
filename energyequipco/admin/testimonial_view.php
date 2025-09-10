<?php
include 'includes/config.php';
include 'includes/header.php';


// fetch the page title

include 'page_titles.php';
$current_file = basename($_SERVER['PHP_SELF']);
$page_title = isset($page_titles[$current_file]) ? $page_titles[$current_file] : 'Page';


$result = mysqli_query($con, "SELECT * FROM testimonials ORDER BY id DESC LIMIT 5");
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


        <div class="container my-5">
  <h2 class="mb-4">What Our Clients Say</h2>

  <?php while($row = mysqli_fetch_assoc($result)): ?>
    <div class="border p-4 mb-4 rounded shadow-sm">
      <p class="mb-2"><?= nl2br(htmlspecialchars($row['message'])) ?></p>
      <h5 class="mb-0"><?= htmlspecialchars($row['name']) ?></h5>
      <small class="text-muted"><?= htmlspecialchars($row['role']) ?></small>
    </div>
  <?php endwhile; ?>
</div>


<!--end::App Content-->
      </main>

      
      <!--end::App Main-->

      
      <!--begin::Footer-->
      
<?php 

include('includes/footer.php');

?>