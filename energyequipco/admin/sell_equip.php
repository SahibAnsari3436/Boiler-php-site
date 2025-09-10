<?php
include 'includes/config.php';
include 'includes/header.php';


// fetch the page title
include 'page_titles.php';
$current_file = basename($_SERVER['PHP_SELF']);
$page_title = isset($page_titles[$current_file]) ? $page_titles[$current_file] : 'Equipment Card';


// Delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($con, "DELETE FROM equipment_cards WHERE id = $id");
    header("Location: sell_equip.php?deleted=1");
    exit;
}


 // Save (Add/Edit)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $moredes = mysqli_real_escape_string($con, $_POST['more_des']);
    $link = mysqli_real_escape_string($con, $_POST['link']);
    

    
    // Image upload
    $image = '';
if (!empty($_FILES['image']['name'])) {
    $original_name = $_FILES['image']['name'];

    // Sanitize filename (remove special characters)
    $safe_name = strtolower(preg_replace('/[^a-zA-Z0-9\-_\.]/', '', $original_name));

    // Final path
    $image = 'images/product/' . $safe_name;

    // Move file to destination
    move_uploaded_file($_FILES['image']['tmp_name'], $image);
}


    if ($id) {
        // Update
        if ($image) {
            mysqli_query($con, "UPDATE equipment_cards SET title='$title', description='$description', more_des='$moredes', link='$link', image='$image' WHERE id=$id");
        } else {
            mysqli_query($con, "UPDATE equipment_cards SET title='$title', description='$description', more_des='$moredes', link='$link' WHERE id=$id");
        }
    } else {
        // Insert
        mysqli_query($con, "INSERT INTO equipment_cards (title, description, more_des, link, image) VALUES ('$title', '$description', '$moredes', '$link', '$image')");
    }

    header("Location: sell_equip.php?success=1");
    exit;
}

// Fetch data
$result = mysqli_query($con, "SELECT * FROM equipment_cards ORDER BY id DESC");
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

    <a href="sell_equip_edit.php" class="btn btn-primary mb-3">Add Equipments</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>More Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
       <?php $i=1; while ($row = mysqli_fetch_assoc($result)) { ?>
        
            <tr>
                    <td><?= $i++ ?></td>
                    <td><img src="http://localhost/energyequipco/<?= $row['image'] ?>" width="100"></td>
                    <td><?= $row['title']?></td>
                    <td><?= htmlspecialchars ($row['description'])?></td>
                    <td><?= htmlspecialchars ($row['more_des'])?></td>
                    <td>
                        <a href="sell_equip_edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-info my-2"><i class="bi bi-pencil-square"> </i></a>
                        <a href="sell_equip.php?delete=<?= $row['id']?>" class="btn btn-sm btn-danger" onclick="return confirm(\'Delete this Equipment Card?')">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                  </tr>
                 
        <?php }?>
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
