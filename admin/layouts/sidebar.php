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
            <li class="nav-item menu-open">
               <a href="#" class="nav-link active">
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
               </ul>
            </li>
            <!-- <li class="nav-item">
               <a href="/admin/home.php" class="nav-link">
                  <i class="nav-icon bi bi-palette"></i>
                  <p>Home</p>
               </a>
            </li> -->

            <li class="nav-header">MULTI LEVEL EXAMPLE</li>
            <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-circle-fill"></i>
                  <p>Level 1</p>
               </a> </li>
            <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-circle-fill"></i>
                  <p>
                     Level 1
                     <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                        <p>Level 2</p>
                     </a> </li>
                  <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                        <p>
                           Level 2
                           <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                     </a>
                     <ul class="nav nav-treeview">
                        <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-record-circle-fill"></i>
                              <p>Level 3</p>
                           </a> </li>
                        <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-record-circle-fill"></i>
                              <p>Level 3</p>
                           </a> </li>
                        <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-record-circle-fill"></i>
                              <p>Level 3</p>
                           </a> </li>
                     </ul>
                  </li>
                  <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                        <p>Level 2</p>
                     </a> </li>
               </ul>
            </li>
            <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-circle-fill"></i>
                  <p>Level 1</p>
               </a> </li>
            <li class="nav-header">LABELS</li>
            <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-circle text-danger"></i>
                  <p class="text">Important</p>
               </a> </li>
            <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-circle text-warning"></i>
                  <p>Warning</p>
               </a> </li>
            <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-circle text-info"></i>
                  <p>Informational</p>
               </a> </li>
         </ul> <!--end::Sidebar Menu-->
      </nav>
   </div> <!--end::Sidebar Wrapper-->
</aside> <!--end::Sidebar--> <!--begin::App Main-->