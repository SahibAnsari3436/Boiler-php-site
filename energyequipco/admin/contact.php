<?php
include 'includes/config.php';
include 'includes/header.php';

// fetch the page title
include 'page_titles.php';
$current_file = basename($_SERVER['PHP_SELF']);
$page_title = isset($page_titles[$current_file]) ? $page_titles[$current_file] : 'Form Entries';


// Handle delete
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    mysqli_query($con, "DELETE FROM contact_enquiry WHERE id = $id");
    echo "<script>alert('Deleted successfully'); window.location.href='contact.php';</script>";
    exit;
}


// Handle CSV Export
if (isset($_GET['export']) && $_GET['export'] == 'csv') {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="contact_messages.csv"');
    $output = fopen("php://output", "w");
    fputcsv($output, ['Full Name', 'Email', 'Phone', 'Subject', 'Message', 'Created At']);

    $query = "SELECT * FROM contact_enquiry";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output, [
            $row['first_name'] . ' ' . $row['last_name'],
            $row['email'],
            $row['phone_number'],
            $row['subject'],
            $row['message'],
            $row['created_at']
        ]);
    }
    fclose($output);
    exit;
}


// Search & Pagination
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

// Build WHERE clause for search
$where = '';
if ($search !== '') {
    $search = mysqli_real_escape_string($con, $search);
    $where = "WHERE 
        first_name LIKE '%$search%' OR 
        last_name LIKE '%$search%' OR 
        email LIKE '%$search%' OR 
        phone_number LIKE '%$search%' OR 
        subject LIKE '%$search%'";
}

// Fetch data
$query = "SELECT * FROM contact_enquiry $where ORDER BY id DESC LIMIT $offset, $limit";
$result = mysqli_query($con, $query);

// Count total for pagination
$totalQuery = "SELECT COUNT(*) AS total FROM contact_enquiry $where";
$totalResult = mysqli_query($con, $totalQuery);
$totalRow = mysqli_fetch_assoc($totalResult);
$totalPages = ceil($totalRow['total'] / $limit);
?>

<style>
form{
    width: 87%;
    margin: 0px;
    padding: 15px 15px;
}

form button {
    margin-top:0px;

    
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
    <div class="d-flex justify-content-between mb-3">
        <form class="d-flex" method="GET" action="">
            <input type="text" name="search" class="form-control me-2" placeholder="Search..." value="<?= htmlspecialchars($search) ?>">
            <button class="btn btn-primary">Search</button>
        </form>
        <div class="mt-4">
        <a href="export_contact_messages.php" class="btn btn-success">Export to CSV</a>
        </div>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Submitted At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php $i = $offset + 1; while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= htmlspecialchars($row['first_name'] . ' ' . $row['last_name']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['phone_number']) ?></td>
                        <td><?= htmlspecialchars($row['subject']) ?></td>
                        <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
                        <td><?= $row['created_at'] ?></td>
                        <td>
                            <a class="btn btn-sm btn-danger" href="?id=<?= $row['id'] ?>" onclick="return confirm('Delete this message?');"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="8" class="text-center">No records found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <?php if ($totalPages > 1): ?>
        <nav>
            <ul class="pagination gap-2">
                <?php for ($p = 1; $p <= $totalPages; $p++): ?>
                    <li class="page-item <?= $p == $page ? 'active' : '' ?>">
                        <a class="page-link" href="?search=<?= urlencode($search) ?>&page=<?= $p ?>"><?= $p ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    <?php endif; ?>
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
