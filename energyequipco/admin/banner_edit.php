<?php
include 'includes/config.php';
include 'includes/header.php';

// fetch the page title
include 'page_titles.php';
$current_file = basename($_SERVER['PHP_SELF']);
$page_title = isset($page_titles[$current_file]) ? $page_titles[$current_file] : 'Add Banner';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$row = ['heading'=>'', 'sub_heading'=>'', 'description'=>'', 'button_text'=>'', 'button_link'=>'', 'image'=>''];

if ($id) {
    $res = mysqli_query($con, "SELECT * FROM banners WHERE id=$id");
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
    

    <form method="post" action="banner.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id ?>">

        <div class="mb-3">
            <label>Heading:</label>
            <input type="text" name="heading" class="form-control" value="<?= htmlspecialchars($row['heading']) ?>" required>
        </div>

        <div class="mb-3">
            <label>Sub Heading:</label>
            <input type="text" name="sub_heading" class="form-control" value="<?= htmlspecialchars($row['sub_heading']) ?>">
        </div>

        <div class="mb-3">
            <label>Description:</label>
            <textarea name="description" class="form-control" rows="4"><?= htmlspecialchars($row['description']) ?></textarea>
        </div>

        <div class="mb-3">
            <label>Button Text:</label>
            <input type="text" name="button_text" class="form-control" value="<?= htmlspecialchars($row['button_text']) ?>">
        </div>

        <div class="mb-3">
            <label>Button Link:</label>
            <input type="url" name="button_link" class="form-control" value="<?= htmlspecialchars($row['button_link']) ?>">
        </div>

        <div class="mb-3">
            <label>Image:</label>
            <input type="file" name="image" class="form-control">
            <?php if ($row['image']): ?>
                <img src="../<?= $row['image'] ?>" width="120" class="mt-2">
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-success my-0">Save</button>
        <a href="banner.php" class="btn btn-secondary">Back</a>
    </form>
</div>



<!--end::App Content-->
      </main>
<!--end::App Main-->
<!--begin::Footer-->

<?php include 'includes/footer.php'; ?>
