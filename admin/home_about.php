<?php

include __DIR__ . "/services/func.php";

if (!check_auth()) {
   header("location:../login.php");
}

$about_config = get_home_about($mysqli);
$about_items = get_home_about_items($mysqli);

include __DIR__ . "/layouts/head.php";

?>

<main class="app-main">
   <?php
   $breadcrumb_title = "Home";
   $breadcrumb_active_page = "Home";
   include __DIR__ . "/layouts/breadcrumb.php";
   ?>
   <div class="app-content">
      <div class="container-fluid">
         <div class="row" id="slide">
            <div class="col-12 col-md-8">
               <div class="card mb-4">
                  <div class="card-header">
                     <h3 class="card-title">Simple Full Width Table</h3>
                     <!-- PAGINATION -->
                     <div class="card-tools">
                        <ul class="pagination pagination-sm float-end">
                           <li class="page-item"> <a class="page-link" href="#">&laquo;</a> </li>
                           <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                           <li class="page-item"> <a class="page-link" href="#">2</a> </li>
                           <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                           <li class="page-item"> <a class="page-link" href="#">&raquo;</a> </li>
                        </ul>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="row row-gap-3">
                        <?php
                        $index = 0;
                        foreach ($slides as $slide):
                           $index++;
                        ?>
                           <div class="col-12 col-md-4 pointer">
                              <img src="/<?= $slide['img_path'] ?>" alt="" width="100%" height="200px" class="object-fit-contain">
                              <button type="button" class="btn btn-danger btn-sm mt-1 button-delete-slide" data-id="<?= $slide['id'] ?>">Delete</button>
                           </div>
                        <?php endforeach; ?>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-12 col-md-4">
               <div class="card mb-4">
                  <div class="card-header">
                     <h3 class="card-title">Input slide</h3>
                  </div>
                  <form method="post" action="action/create_slide.php" enctype="multipart/form-data">
                     <div class="card-body">
                        <div class="mb-2">
                           <label for="slide" class="form-label">Gambar slide</label>
                           <input type="file" name="file" class="form-control" id="slide" aria-describedby="slide" accept="image/*">
                           <div id="slide" class="form-text">
                              Image slide 16:8 rasio or landscape
                           </div>
                           <div id="preview-image">
                              <img src="" alt="" width="100%">
                           </div>
                        </div>
                        <div>
                           <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>

<script>
   const inptFile = document.querySelector("#slide form input[type='file']")
   inptFile.addEventListener("change", (e) => {
      e.preventDefault()
      const previewEl = document.querySelector("#slide #preview-image img")
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

   const buttonDelete = document.querySelectorAll(".button-delete-slide")

   buttonDelete.forEach(item => {
      item.addEventListener("click", e => {
         e.preventDefault()
         const id = e.target.getAttribute("data-id")
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
               fetch("action/delete_slide.php", {
                  method: 'POST',
                  body: form
               }).then(async res => {
                  if (res.status >= 400) throw res
                  const data = await res.json()

                  const elParent = e.target.parentNode
                  elParent.remove()

                  Swal.fire({
                     title: "Berhasil dihapus!",
                     text: "File gambar telah dihapus",
                     icon: "success"
                  })
               }).catch(err => {
                  console.log(err)

                  Swal.fire({
                     title: "Gagal dihapus!",
                     text: "File gambar gagal dihapus",
                     icon: "error"
                  })
               })
            }
         })
      })
   })
</script>

<?php

include __DIR__ . "/layouts/footer.php";

?>