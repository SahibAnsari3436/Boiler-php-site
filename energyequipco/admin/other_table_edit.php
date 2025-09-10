<?php
include 'includes/config.php';
include 'includes/header.php';

// fetch the page title
include 'page_titles.php';
$current_file = basename($_SERVER['PHP_SELF']);
$page_title = isset($page_titles[$current_file]) ? $page_titles[$current_file] : 'Add other Table Entry';


$item_number = $year = $horsepower = $manufacturer = $pressure = $steam_or_hot_water = $burner = $fuel = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = mysqli_prepare($con, "SELECT * FROM other_table WHERE item_number=?");
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        extract($row);
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);

    // If updating
    if (!empty($_POST['old_item_number'])) {
        $old_id = $_POST['old_item_number'];
        $stmt = mysqli_prepare($con, "UPDATE other_table SET item_number=?, year=?, horsepower=?, manufacturer=?, pressure=?, steam_or_hot_water=?, burner=?, fuel=? WHERE item_number=?");
        mysqli_stmt_bind_param($stmt, "sisssssss", $item_number, $year, $horsepower, $manufacturer, $pressure, $steam_or_hot_water, $burner, $fuel, $old_id);
    } else {
        // New entry
        $stmt = mysqli_prepare($con, "INSERT INTO other_table (item_number, year, horsepower, manufacturer, pressure, steam_or_hot_water, burner, fuel) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sissssss", $item_number, $year, $horsepower, $manufacturer, $pressure, $steam_or_hot_water, $burner, $fuel);
    }

    mysqli_stmt_execute($stmt);
    header("Location: other_table.php");
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



<form method="post">
    <input type="hidden" name="old_item_number" value="<?= $item_number ?>">
    <label>Item #:</label><input type="text" name="item_number" value="<?= $item_number ?>" required><br>
    <label>Year:</label><input type="number" name="year" value="<?= $year ?>" required><br>
    <label>Horsepower:</label><input type="text" name="horsepower" value="<?= $horsepower ?>" required><br>
    <label>Manufacturer:</label><input type="text" name="manufacturer" value="<?= $manufacturer ?>" required><br>
    <label>Pressure:</label><input type="text" name="pressure" value="<?= $pressure ?>" required><br>
    <label>Steam or Hot Water:</label><input type="text" name="steam_or_hot_water" value="<?= $steam_or_hot_water ?>" required><br>
    <label>Burner:</label><input type="text" name="burner" value="<?= $burner ?>" required><br>
    <label>Fuel(s):</label><input type="text" name="fuel" value="<?= $fuel ?>" required><br><br>
    <button type="submit">Save</button>
</form>

</div>

<!--end::App Content-->
      </main>
<!--end::App Main-->
<!--begin::Footer-->

<?php include 'includes/footer.php'; ?>
