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
                     <h3 class="card-title">Data bagian home - service</h3>
                  </div>
                  <div class="card-body">
                     <form class="row gap-3" id="form-update-config">
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
         <div class="row">
            <div class="col-12 col-md-8">
               <div class="card mb-4">
                  <div class="card-header">
                     <h3 class="card-title">Data bagian home - service item</h3>
                  </div>
                  <div class="card-body">
                     <div class="row">
                        <?php foreach ($service_items as $key => $d): ?>
                           <div class="col-12 col-md-4">
                              <div class="card border-0 shadow-none">
                                 <img src="/<?= $d['icon_path'] ?>" alt="" width="100%" height="200px" class="object-fit-contain">
                                 <h5 class="mt-2"><?= $d['title'] ?></h5>
                                 <p><?= $d['description'] ?></p>
                                 <div class="card-footer m-0 px-0 shadow-none bg-transparent">
                                    <button class="btn btn-success btn-sm button-edit" data-id="<?= $d['id'] ?>">Edit</button>
                                    <button class="btn btn-danger btn-sm button-delete" data-id="<?= $d['id'] ?>">Hapus</button>
                                 </div>
                              </div>
                           </div>
                        <?php endforeach; ?>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-12 col-md-4">
               <div class="card mb-4">
                  <div class="card-header">
                     <h3 class="card-title">Form item</h3>
                  </div>
                  <div class="card-body">
                     <form class="row gap-3" id="form-update-item" state="add">
                        <input type="text" name="id" id="id" hidden>
                        <div class="form-group">
                           <label for="title">Judul </label>
                           <input type="text" name="title" id="title" placeholder="Judul ..." class="form-control">
                        </div>
                        <div class="form-group">
                           <label for="description">Deskripsi </label>
                           <input type="text" name="description" id="description" placeholder="Deskripsi ..." class="form-control">
                        </div>
                        <div class="form-group">
                           <label for="file">File Service </label>
                           <input type="file" name="file" id="file" class="form-control" accept="image/*">
                           <div id="preview-image">
                              <img src="" alt="" width="100%">
                           </div>
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
   const inptFile = document.querySelector("#form-update-item input[type='file']")
   inptFile.addEventListener("change", (e) => {
      e.preventDefault()
      const previewEl = document.querySelector("#form-update-item #preview-image img")
      const file = inptFile.files[0]
      if (file) {
         const reader = new FileReader()

         reader.onload = (upload) => {
            previewEl.src = upload.target.result
         }

         reader.readAsDataURL(file)
      } else {
         previewEl.src = ""
      }
   })


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

   const formItem = document.querySelector("#form-update-item")
   formItem.addEventListener("submit", e => {
      e.preventDefault()
      const form = get_form_body("form-update-item")
      const url = e.target.getAttribute("state") == "add" ? "action/create_service_item.php" : "action/update_service_item.php"
      fetch(url, {
         method: "POST",
         body: form
      }).then(async res => {
         if (res.status >= 400) throw res
         const result = await res.json()
         Swal.fire({
            icon: 'success',
            title: "Berhasil menyimpan data",
            showConfirmButton: false,
            timer: 1500
         }).then(() => window.location.reload())
      }).catch(err => {
         console.log(err)
         Swal.fire({
            icon: 'error',
            title: err.message || "Gagal menyimpan data",
            showConfirmButton: false,
            timer: 1500
         })
      })
      document.querySelector("#form-update-item")?.setAttribute("state", "add")
   })

   document.addEventListener("click", (e) => {
      const clickedEl = e.target
      if (clickedEl.className.includes("button-edit")) {
         const id = clickedEl.getAttribute("data-id")
         const formUpdateItem = document.querySelector("#form-update-item")
         formUpdateItem.setAttribute("state", "edit")
         fetch("action/get_service_by_id.php?id=" + id).then(async res => {
            if (res.status >= 400) throw res
            const result = await res.json()
            formUpdateItem.querySelector("#id").value = result.data.id
            formUpdateItem.querySelector("#title").value = result.data.title
            formUpdateItem.querySelector("#description").value = result.data.description
            formUpdateItem.querySelector("#preview-image img").src = result.data.icon_path ? "/" + result.data.icon_path : ""
         }).catch(err => console.error(err))
      }
      if (clickedEl.className.includes("button-delete")) {
         const id = clickedEl.getAttribute("data-id")
         Swal.fire({
            title: "Yakin untuk hapus?",
            text: "Tidak dapat dikembalikan",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus!"
         }).then((result) => {
            if (result.isConfirmed) {
               const form = new FormData()
               form.append("id", id)
               fetch("action/delete_service_item.php", {
                  method: 'POST',
                  body: form
               }).then(async res => {
                  if (res.status >= 400) throw res
                  Swal.fire({
                     icon: "success",
                     title: "Berhasil dihapus!",
                     text: "File gambar telah dihapus",
                     showConfirmButton: false,
                     timer: 1500
                  }).then(() => window.location.reload())
               }).catch(err => {
                  console.log(err)

                  Swal.fire({
                     title: "Gagal dihapus!",
                     text: "File gambar gagal dihapus",
                     icon: "error",
                     showConfirmButton: false,
                     timer: 1500
                  }).then(() => window.location.reload())
               })
            }
         })
      }
   })
</script>
<?php

include __DIR__ . "/layouts/footer.php";

?>