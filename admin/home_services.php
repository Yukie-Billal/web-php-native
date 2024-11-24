<?php

include __DIR__ . "/services/func.php";

if (!check_auth()) {
   header("location:../login.php");
}

$service_config = get_home_service_config($mysqli);
$service_items = get_home_service_items($mysqli);

include __DIR__ . "/layouts/head.php";

?>

<main class="app-main">
   <?php
   $breadcrumb_title = "Service";
   $breadcrumb_active_page = "Service";
   include __DIR__ . "/layouts/breadcrumb.php";
   ?>
   <div class="app-content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="card mb-4">
                  <div class="card-header">
                     <h3 class="card-title">Data bagian home - about</h3>
                     <!-- PAGINATION -->
                     <!-- <div class="card-tools">
                        <ul class="pagination pagination-sm float-end">
                           <li class="page-item"> <a class="page-link" href="#">&laquo;</a> </li>
                           <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                           <li class="page-item"> <a class="page-link" href="#">2</a> </li>
                           <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                           <li class="page-item"> <a class="page-link" href="#">&raquo;</a> </li>
                        </ul>
                     </div> -->
                  </div>
                  <div class="card-body">
                     <form class="row gap-3" id="form-update-config" action="action/update_about_config.php" method="post" enctype="multipart/form-data">
                        <input type="text" name="id" id="id" value="<?= $service_config['id'] ?>" hidden>
                        <div class="form-group">
                           <label for="title">Judul </label>
                           <input type="text" name="title" id="title" placeholder="Judul ..." class="form-control" value="<?= $service_config['title'] ?>">
                        </div>
                        <div class="form-group">
                           <label for="subtitle">Subjudul </label>
                           <input type="text" name="subtitle" id="subtitle" placeholder="Subjudul ..." class="form-control" value="<?= $service_config['subtitle'] ?>">
                        </div>
                        <div>
                           <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>

<script>
   const formElement = document.querySelector("#form-update-config")
   formElement.addEventListener("submit", (e) => {
      e.preventDefault()
      const form = get_form_body("form-update-config")
      fetch("action/update_service.php", {
         method: "POST",
         body: form
      }).then(async res => {
         if (res.status >= 400) throw res
         const result = await res.json()
         console.log(result)
         Swal.fire({
            icon: 'success',
            title: "Berhasil menyimpan perubahan",
            showConfirmButton: false,
            timer: 1500
         })
      }).catch(err => {
         console.error(err)
         Swal.fire({
            icon: 'succes',
            title: err.message || "Berhasil menyimpan perubahan",
            showConfirmButton: false,
            timer: 1500
         })
      })
   })
</script>
<?php

include __DIR__ . "/layouts/footer.php";

?>