<?php


$setting = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM settings WHERE id = 1"));
?>


<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
<!--begin::Sidebar Brand-->
<div class="sidebar-brand">
<!--begin::Brand Link-->
<a href="./home.php" class="brand-link">
  <!--begin::Brand Image-->
  <img
    src="/assets/img/boiler-logo.webp"
    alt="Energy Equipment"
    class="brand-image shadow"
  />
  <!--end::Brand Image-->
  <!--begin::Brand Text-->
  <span class="brand-text fw-light">Energy Equipment</span>
  <!--end::Brand Text-->
</a>
<!--end::Brand Link-->
</div>
<!--end::Sidebar Brand-->
<!--begin::Sidebar Wrapper-->
<div class="sidebar-wrapper">
<nav class="mt-2">
  <!--begin::Sidebar Menu-->
  <ul
    class="nav sidebar-menu flex-column"
    data-lte-toggle="treeview"
    role="navigation"
    aria-label="Main navigation"
    data-accordion="false"
    id="navigation"
  >
    <li class="nav-item menu-open">
      <a href="home.php" class="nav-link active">
        <i class="nav-icon bi bi-speedometer"></i>
        <p>Dashboard</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="settings_edit.php" class="nav-link">
        <i class="nav-icon bi bi-palette"></i>
        <p>Site Information</p>
      </a>
    </li>

    <!-- Home page -->

    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon bi bi-house"></i>
        <p>Home Page</p>
        <i class="nav-arrow bi bi-chevron-right"></i>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="banner.php" class="nav-link active">
            <i class="nav-icon bi bi-circle"></i>
            <p>Banner</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="about.php" class="nav-link">
            <i class="nav-icon bi bi-circle"></i>
            <p>About Us</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="counter.php" class="nav-link">
            <i class="nav-icon bi bi-circle"></i>
            <p>Counter</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="feature_products.php" class="nav-link">
            <i class="nav-icon bi bi-circle"></i>
            <p>Feature Products</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="testimonial.php" class="nav-link">
            <i class="nav-icon bi bi-circle"></i>
            <p>Testimonials</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="faq.php" class="nav-link">
            <i class="nav-icon bi bi-circle"></i>
            <p>Faqs</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="strategy.php" class="nav-link">
            <i class="nav-icon bi bi-circle"></i>
            <p>Our Strategy</p>
          </a>
        </li>
      </ul>
    </li>

    <!-- About Us page -->

      <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon bi bi-journal-richtext"></i>
        <p>About Us Page</p>
        <i class="nav-arrow bi bi-chevron-right"></i>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="about_us.php" class="nav-link">
            <i class="nav-icon bi bi-circle"></i>
            <p>About Us</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="work_process.php" class="nav-link">
            <i class="nav-icon bi bi-circle"></i>
            <p>Work Process</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="testimonial.php" class="nav-link">
            <i class="nav-icon bi bi-circle"></i>
            <p>Testimonials</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="faq.php" class="nav-link">
            <i class="nav-icon bi bi-circle"></i>
            <p>Faqs</p>
          </a>
        </li>
      </ul>
    </li>


    <!-- Boiler page -->

      <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon bi bi-fire"></i>
        <p>Boiler</p>
        <i class="nav-arrow bi bi-chevron-right"></i>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="boiler.php" class="nav-link">
            <i class="nav-icon bi bi-circle"></i>
            <p>Our Boilers</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="brands.php" class="nav-link">
            <i class="nav-icon bi bi-circle"></i>
            <p>Brands</p>
          </a>
        </li>
     </ul>
    </li>



<!-- Manufacturers page -->

      <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon bi bi-buildings"></i>
        <p>Manufacturers</p>
        <i class="nav-arrow bi bi-chevron-right"></i>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="bi bi-arrow-return-right"></i>
            <p>Cleaver Brooks</p>
            <i class="nav-arrow bi bi-chevron-right"></i>
          </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="cleaver_brooks.php" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Product Details</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="cleaver_table.php" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Table</p>
                  </a>
                </li>
              </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="bi bi-arrow-return-right"></i>
            <p>Johnston</p>
            <i class="nav-arrow bi bi-chevron-right"></i>
          </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="johnston_boiler.php" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Product Details</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="johnston_table.php" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Table</p>
                  </a>
                </li>
              </ul>
        </li>



        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="bi bi-arrow-return-right"></i>
            <p>Superior</p>
            <i class="nav-arrow bi bi-chevron-right"></i>
          </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="superior_boiler.php" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Product Details</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="superior_table.php" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Table</p>
                  </a>
                </li>
              </ul>
        </li>


        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="bi bi-arrow-return-right"></i>
            <p>Hurst</p>
            <i class="nav-arrow bi bi-chevron-right"></i>
          </a>
             <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="hurst_boiler.php" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Product Details</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="hurst_table.php" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Table</p>
                  </a>
                </li>
              </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="bi bi-arrow-return-right"></i>
            <p>Additional Boilers</p>
            <i class="nav-arrow bi bi-chevron-right"></i>
          </a>
          <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="other_boilers.php" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Product Details</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="other_table.php" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Table</p>
                  </a>
                </li>
              </ul>
        </li>

        
      </ul>
    </li>



    <!-- Sell Your Boiler page -->

      <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon bi bi-shop"></i>
        <p>Sell Your Boiler</p>
        <i class="nav-arrow bi bi-chevron-right"></i>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="sell_equip.php" class="nav-link">
            <i class="nav-icon bi bi-circle"></i>
            <p>Our Equipment</p>
          </a>
        </li>
      </ul>
    </li>


    <!-- Contact Us page -->

      <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon bi bi-postcard"></i>
        <p>Contact Us</p>
        <i class="nav-arrow bi bi-chevron-right"></i>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="contact.php" class="nav-link">
            <i class="nav-icon bi bi-circle"></i>
            <p>Form Entries</p>
          </a>
        </li>
      </ul>
    </li>


    <!-- Privacy Policy page -->

      <li class="nav-item">
      <a href="privacy_policy.php" class="nav-link">
        <i class="nav-icon bi bi-shield-check"></i>
        <p>Privacy Policy</p>
        
      </a>
      </li>

      <!-- Privacy Policy page -->

      <li class="nav-item">
      <a href="terms_of_service.php" class="nav-link">
        <i class="nav-icon bi bi-receipt-cutoff"></i>
        <p>Terms of Service</p>
        
      </a>
      </li>
   


  </ul>
  <!--end::Sidebar Menu-->
</nav>
</div>
<!--end::Sidebar Wrapper-->
</aside>


<script src="assets/dist/js/adminlte.js"></script>