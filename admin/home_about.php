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
   $breadcrumb_title = "About";
   $breadcrumb_active_page = "About";
   include __DIR__ . "/layouts/breadcrumb.php";
   ?>
   <div class="app-content">
      <div class="container-fluid">
         <div class="row" id="slide">
            <div class="col-12">
               <div class="card mb-4">
                  <div class="card-header">
                     <h3 class="card-title">Data bagian home - about</h3>
                  </div>
                  <div class="card-body">
                     <form class="row gap-3" id="form-update" action="action/update_about_config.php" method="post" enctype="multipart/form-data">
                        <input type="text" name="id" id="id" value="<?= $about_config['id'] ?>" hidden>
                        <div class="form-group">
                           <label for="about_title">Judul </label>
                           <input type="text" name="about_title" id="about_title" placeholder="Judul ..." class="form-control" value="<?= $about_config['about_title'] ?>">
                        </div>
                        <div class="form-group">
                           <label for="about_text_title">Subjudul </label>
                           <input type="text" name="about_text_title" id="about_text_title" placeholder="Judul ..." class="form-control" value="<?= $about_config['about_text_title'] ?>">
                        </div>
                        <div class="form-group">
                           <label for="about_text_paragraf_1">Paragraf 1 </label>
                           <textarea name="about_text_paragraf_1" id="about_text_paragraf_1" placeholder="Paragraf 1 ..." class="form-control" rows="5"><?= $about_config['about_text_paragraf_1'] ?></textarea>
                        </div>
                        <div class="form-group">
                           <label for="about_text_paragraf_2">Paragraf 2</label>
                           <textarea name="about_text_paragraf_2" id="about_text_paragraf_2" placeholder="Paragraf 2 ..." class="form-control" rows="5"><?= $about_config['about_text_paragraf_2'] ?></textarea>
                        </div>
                        <div class="form-group col-12 col-md-4">
                           <label for="about_image_path">File</label>
                           <input type="file" name="about_image_path" id="about_image_path" class="form-control" accept="image/*">
                           <div id="preview-image">
                              <img src="/<?= $about_config['about_image_path'] ?>" alt="" width="100%">
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

   const formElement = document.querySelector("#form-update")
   formElement.addEventListener("submit", (e) => {
      e.preventDefault()
      const form = get_form_body("form-update")
      fetch("action/update_about_config.php", {
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