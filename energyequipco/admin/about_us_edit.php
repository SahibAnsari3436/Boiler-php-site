<?php
include 'includes/config.php';
include 'includes/header.php';

// fetch the page title
include 'page_titles.php';
$current_file = basename($_SERVER['PHP_SELF']);
$page_title = isset($page_titles[$current_file]) ? $page_titles[$current_file] : 'Add About Content';

$data = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM about_us LIMIT 1"));
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



        
<form method="POST" action="about_us.php" enctype="multipart/form-data">
        <input type="hidden" name="save_about" value="1">

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($data['title'] ?? '') ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="5" required><?= htmlspecialchars($data['description'] ?? '') ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Years of Experience</label>
            <input type="number" name="years_experience" class="form-control" value="<?= $data['years_experience'] ?? '' ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Image 1</label><br>
            <?php if (!empty($data['image1'])): ?>
                <img src="<?= $data['image1'] ?>" width="80" class="mb-2"><br>
            <?php endif; ?>
            <input type="file" name="image1" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Image 2</label><br>
            <?php if (!empty($data['image2'])): ?>
                <img src="<?= $data['image2'] ?>" width="80" class="mb-2"><br>
            <?php endif; ?>
            <input type="file" name="image2" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Image 3</label><br>
            <?php if (!empty($data['image3'])): ?>
                <img src="<?= $data['image3'] ?>" width="80" class="mb-2"><br>
            <?php endif; ?>
            <input type="file" name="image3" class="form-control">
        </div>

        <button type="submit" class="btn btn-success my-0">Save</button>
        <a href="about_us.php" class="btn btn-secondary">Back</a>
    </form>



<!--end::App Content-->
      </main>
<!--end::App Main-->
<!--begin::Footer-->

<?php include 'includes/footer.php'; ?>