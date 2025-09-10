<?php
include 'includes/config.php';
include 'includes/header.php';

// fetch the page title
include 'page_titles.php';
$current_file = basename($_SERVER['PHP_SELF']);
$page_title = isset($page_titles[$current_file]) ? $page_titles[$current_file] : 'FAQs';

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($con, "DELETE FROM faqs WHERE id=$id");
    header("Location: faq.php?deleted=1");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $question = mysqli_real_escape_string($con, $_POST['question']);
    $answer = mysqli_real_escape_string($con, $_POST['answer']);

    if ($id) {
        mysqli_query($con, "UPDATE faqs SET question='$question', answer='$answer' WHERE id=$id");
    } else {
        mysqli_query($con, "INSERT INTO faqs (question, answer) VALUES ('$question', '$answer')");
    }

    header("Location: faq.php?success=1");
    exit;
}

$result = mysqli_query($con, "SELECT * FROM faqs ORDER BY id ASC");
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


<div class="container mt-4">
  <?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success">✅ Saved successfully!</div>
  <?php elseif (isset($_GET['deleted'])): ?>
    <div class="alert alert-danger">❌ Deleted successfully!</div>
  <?php endif; ?>

  <a href="faq_edit.php" class="btn btn-primary mb-3">Add FAQ</a>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Question</th>
        <th>Answer</th>
        <th>Date-Time</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1; while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?= $i++ ?></td>
          <td><?= htmlspecialchars($row['question']) ?></td>
          <td><?= htmlspecialchars($row['answer']) ?></td>
          <td><?= $row['date_time'] ?></td>
          <td>
            <a href="faq_edit.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm my-1"><i class="bi bi-pencil-square"></i></a>
            <a href="faq.php?delete=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<!--end::App Content-->
      </main>
<!--end::App Main-->
<!--begin::Footer-->

<script>
  setTimeout(function () {
    var alert = document.querySelector('.alert');
    if (alert) {
      var bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
      bsAlert.close();
    }
  }, 3000); // Hide after 3 seconds
</script>

<?php include 'includes/footer.php'; ?>
