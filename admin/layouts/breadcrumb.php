<?php

if (!isset($breadcrumb_title)) {
   $breadcrumb_title = "Dashboard";
}

if (!isset($breadcrumb_active_page)) {
   $breadcrumb_active_page = "Dashboard";
}

?>

<div class="app-content-header">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-6">
            <h3 class="mb-0"><?= $breadcrumb_title ?></h3>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
               <li class="breadcrumb-item"><a href="/admin/dashboard.php">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">
                  <?= $breadcrumb_active_page ?>
               </li>
            </ol>
         </div>
      </div> <!--end::Row-->
   </div>
</div>