<?php
include 'includes/config.php';
include 'includes/header.php';

// fetch the page title
include 'page_titles.php';
$current_file = basename($_SERVER['PHP_SELF']);
$page_title = isset($page_titles[$current_file]) ? $page_titles[$current_file] : 'Edit Terms Of Service';


// Fetch existing privacy policy
$result = mysqli_query($con, "SELECT * FROM terms_of_service ORDER BY id DESC LIMIT 1");
$row = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = mysqli_real_escape_string($con, $_POST['content']);

    if ($row) {
        // Update
        $id = $row['id'];
        $query = "UPDATE terms_of_service SET content='$content' WHERE id=$id";
    } else {
        // Insert
        $query = "INSERT INTO terms_of_service
        
        
         (content) VALUES ('$content')";
    }

    if (mysqli_query($con, $query)) {
    // redirect with success parameter
    header("Location: terms_of_service.php?success=1");
    exit;
} else {
    echo "Error: " . mysqli_error($con);
}
}
?>

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

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
        <textarea name="content" id="editor"><?php echo isset($row['content']) ? $row['content'] : ''; ?></textarea>
        <br>
        <button type="submit" class="btn btn-success mt-3">Save</button>
        <a href="terms_of_service.php" class="btn btn-secondary mt-3">Back</a>
    </form>

    <script>
    CKEDITOR.replace('editor', {
        height: 300,
        removeButtons: 'Source'
    });
</script>


</div>

<!--end::App Content-->
      </main>
<!--end::App Main-->
<!--begin::Footer-->

<?php include 'includes/footer.php'; ?>