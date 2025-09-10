<?php
include 'includes/config.php';
include 'includes/header.php';


// fetch the page title

include 'page_titles.php';
$current_file = basename($_SERVER['PHP_SELF']);
$page_title = isset($page_titles[$current_file]) ? $page_titles[$current_file] : 'Add Testimonial';


$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$row = ['name'=>'', 'role'=>'', 'message'=>''];

if ($id) {
    $res = mysqli_query($con, "SELECT * FROM testimonials WHERE id=$id");
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


        <div class="container mt-4">
  <!-- <h3><?= $id ? "Edit" : "Add" ?> Testimonial</h3> -->

  <form method="post" action="testimonial.php">
    <input type="hidden" name="id" value="<?= $id ?>">

    <div class="mb-3">
      <label>Name:</label>
      <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($row['name']) ?>" required>
    </div>

    <div class="mb-3">
      <label>Role:</label>
      <input type="text" name="role" class="form-control" value="<?= htmlspecialchars($row['role']) ?>" required>
    </div>

    <div class="mb-3">
      <label>Message:</label>
      <textarea name="message" class="form-control" rows="4" required><?= htmlspecialchars($row['message']) ?></textarea>
    </div>

    <button type="submit" class="btn btn-success my-0">Save</button>
    <a href="testimonial.php" class="btn btn-secondary">Back</a>
  </form>
</div>


<!--end::App Content-->
      </main>

      
      <!--end::App Main-->

      
      <!--begin::Footer-->
      
<?php 

include('includes/footer.php');

?>