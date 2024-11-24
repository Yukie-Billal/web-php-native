<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
   <div class="sidebar-brand">
      <a href="/admin/index.html" class="brand-link">
         <img src="/admin/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow">

         <span class="brand-text fw-light">AdminLTE 4</span>

      </a>
   </div>
   <div class="sidebar-wrapper">
      <nav class="mt-2">
         <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
            <li class="nav-item <?= in_array($active_page, ["dashboard", "slides", "features", "abouts", "services"]) ? "menu-open" : "" ?>">
               <a href="#" class="nav-link <?= in_array($active_page, ["dashboard", "slides", "features", "abouts", "services"]) ? "active" : "" ?>">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                     Home
                     <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="/admin/dashboard.php" class="nav-link <?= is_active_page("dashboard", $active_page) ?>">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Dashboard</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="/admin/slides.php" class="nav-link <?= is_active_page("slides", $active_page) ?>">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Slides</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="/admin/home_feature.php" class="nav-link <?= is_active_page("features", $active_page) ?>">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Features</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="/admin/home_about.php" class="nav-link <?= is_active_page("abouts", $active_page) ?>">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Abouts</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="/admin/home_services.php" class="nav-link <?= is_active_page("services", $active_page) ?>">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Service</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item <?= $active_page == "product" ? "menu-open" : "" ?>">
               <a href=" /admin/product.php" class="nav-link">
                  <i class="nav-icon bi bi-clipboard-fill"></i>
                  <p>Produk</p>
               </a>
            </li>
            <li class="nav-item <?= $active_page == "documentations" ? "menu-open" : "" ?>">
               <a href=" /admin/documentation.php" class="nav-link">
                  <i class="nav-icon bi bi-clipboard-fill"></i>
                  <p>Dokumentasi</p>
               </a>
            </li>
         </ul> <!--end::Sidebar Menu-->
      </nav>
   </div> <!--end::Sidebar Wrapper-->
</aside> <!--end::Sidebar--> <!--begin::App Main-->