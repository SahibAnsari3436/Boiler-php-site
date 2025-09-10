<?php
include 'includes/config.php';
include 'includes/header.php';

$result = mysqli_query($con, "SELECT * FROM faqs ORDER BY id DESC LIMIT 10");
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
  <h2 class="mb-4">Get Every Answer From Here</h2>

  <div class="accordion" id="faqAccordion">
    <?php $i = 0; while($row = mysqli_fetch_assoc($result)): ?>
      <div class="accordion-item mb-3 border rounded shadow-sm">
        <h2 class="accordion-header" id="heading<?= $i ?>">
          <button class="accordion-button <?= $i > 0 ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $i ?>" aria-expanded="<?= $i == 0 ? 'true' : 'false' ?>" aria-controls="collapse<?= $i ?>">
            <?= htmlspecialchars($row['question']) ?>
          </button>
        </h2>
        <div id="collapse<?= $i ?>" class="accordion-collapse collapse <?= $i == 0 ? 'show' : '' ?>" aria-labelledby="heading<?= $i ?>" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            <?= nl2br(htmlspecialchars($row['answer'])) ?>
          </div>
        </div>
      </div>
    <?php $i++; endwhile; ?>
  </div>
</div>



<!--end::App Content-->
      </main>
<!--end::App Main-->
<!--begin::Footer-->

<?php include 'includes/footer.php'; ?>
