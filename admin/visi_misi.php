<?php

include __DIR__ . "/services/func.php";

if (!check_auth()) {
   header("location:../login.php");
}

$visi = get_visi($mysqli);
$misi = get_misi($mysqli);
$misi_items = get_misi_items($mysqli);

include __DIR__ . "/layouts/head.php";

?>

<main class="app-main">
   <?php
   $breadcrumb_title = "Visi Misi";
   $breadcrumb_active_page = "Visi Misi";
   include __DIR__ . "/layouts/breadcrumb.php";
   ?>
   <div class="app-content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="card mb-4">
                  <div class="card-header">
                     <h3 class="card-title">Konfigurasi halaman home visi</h3>
                  </div>
                  <div class="card-body">
                     <form class="row gap-3" id="form-update-visi">
                        <input type="text" name="id" id="id" value="<?= $visi['id'] ?>" hidden>
                        <div class="form-group">
                           <label for="visi_title">Judul visi</label>
                           <input type="text" name="visi_title" id="visi_title" placeholder="Judul visi ..." class="form-control" value="<?= $visi['visi_title'] ?>">
                        </div>
                        <div class="form-group">
                           <label for="visi">Isi visi</label>
                           <textarea name="visi" id="visi" class="form-control" rows="3"><?= $visi['visi'] ?></textarea>
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
            <div class="col-12">
               <div class="card mb-4">
                  <div class="card-header">
                     <h3 class="card-title">Konfigurasi halaman home misi</h3>
                  </div>
                  <div class="card-body">
                     <form class="row gap-3" id="form-update-misi">
                        <input type="text" name="id" id="id" value="<?= $misi['id'] ?>" hidden>
                        <div class="form-group">
                           <label for="misi_title">Judul misi</label>
                           <input type="text" name="misi_title" id="misi_title" placeholder="Judul misi ..." class="form-control" value="<?= $misi['misi_title'] ?>">
                        </div>
                        <div class="form-group">
                           <label for="misi">Isi misi</label>
                           <textarea name="misi" id="misi" class="form-control" rows="2"><?= $misi['misi'] ?></textarea>
                           <small>(boleh kosong)</small>
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
                     <h3 class="card-title">Misi</h3>
                  </div>
                  <div class="card-body">
                     <div class="row">
                        <div class="col-12">
                           <table class="table table-hover table-striped table-responsive">
                              <thead>
                                 <tr>
                                    <th>urutan</th>
                                    <th>Misi</th>
                                    <th>#</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php foreach ($misi_items as $key => $d): ?>
                                    <tr>
                                       <td><?= $d['order_number'] ?></td>
                                       <td><?= $d['misi'] ?></td>
                                       <td>
                                          <div class="d-flex justify-content-center align-items-center gap-1">
                                             <button class="btn btn-success btn-sm">Edit</button>
                                             <button class="btn btn-danger btn-sm">Hapus</button>
                                          </div>
                                       </td>
                                    </tr>
                                 <?php endforeach; ?>
                              </tbody>
                           </table>
                        </div>
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
   const formVisi = document.querySelector("#form-update-visi")
   formVisi.addEventListener("submit", (e) => {
      e.preventDefault()
      const form = get_form_body("form-update-visi")
      fetch("action/visi_misi/update_visi.php", {
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

   const formMisi = document.querySelector("#form-update-misi")
   formMisi.addEventListener("submit", (e) => {
      e.preventDefault()
      const form = get_form_body("form-update-misi")
      fetch("action/visi_misi/update_misi.php", {
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
      const url = e.target.getAttribute("state") == "add" ? "action/create_product_item.php" : "action/update_product_item.php"
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
         fetch("action/get_product_by_id.php?id=" + id).then(async res => {
            if (res.status >= 400) throw res
            const result = await res.json()
            formUpdateItem.querySelector("#id").value = result.data.id
            formUpdateItem.querySelector("#title").value = result.data.title
            formUpdateItem.querySelector("#description").value = result.data.description
            formUpdateItem.querySelector("#preview-image img").src = result.data.img_path ? "/" + result.data.img_path : ""
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
               fetch("action/delete_product_item.php", {
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
                  })
               })
            }
         })
      }
   })
</script>
<?php

include __DIR__ . "/layouts/footer.php";

?>