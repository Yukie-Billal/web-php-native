<?php

include __DIR__ . "/services/func.php";

if (!check_auth()) {
   header("location:../login.php");
}

$features = get_home_feature($mysqli);

include __DIR__ . "/layouts/head.php";

?>

<main class="app-main">
   <?php
   $breadcrumb_title = "Feature";
   $breadcrumb_active_page = "Feature";
   include __DIR__ . "/layouts/breadcrumb.php";
   ?>
   <div class="app-content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12 col-md-8">
               <div class="card mb-4">
                  <div class="card-header">
                     <h3 class="card-title">Feature</h3>
                  </div>
                  <div class="card-body">
                     <div class="row row-gap-3">
                        <?php
                        $index = 0;
                        foreach ($features as $d):
                           $index++;
                        ?>
                           <div class="col-12 col-md-4 pointer card border-0">
                              <div class="card-body">
                                 <img src="/<?= $d['icon_path'] ?>" alt="" width="100%" height="200px" class="object-fit-contain">
                                 <h5 class="mt-2"><?= $d['title'] ?></h5>
                                 <p><?= $d['description'] ?></p>
                              </div>
                              <div class="card-footer border-0 pt-0">
                                 <button type="button" class="btn btn-success btn-sm mt-1 button-edit-slide" data-id="<?= $d['id'] ?>">Edit</button>
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
                     <h3 class="card-title">Edit slide</h3>
                  </div>
                  <form method="post" action="action/edit_home_feature.php" enctype="multipart/form-data">
                     <div class="card-body">
                        <div class="mb-2 d-flex flex-column gap-2">
                           <div class="form-group">
                              <label for="slide" class="form-label">Judul feature</label>
                              <input type="text" name="title" class="form-control" id="title" placeholder="Judul ...">
                           </div>
                           <div class="form-group">
                              <label for="slide" class="form-label">Deskripsi feature</label>
                              <textarea type="text" name="description" class="form-control" id="description" placeholder="Deskripsi ..."></textarea>
                           </div>
                           <div class="form-group">
                              <label for="slide" class="form-label">Icon feature</label>
                              <input type="file" name="file" class="form-control" id="icon" aria-describedby="slide" accept="image/*">
                              <div id="slide" class="form-text">
                                 Image slide 16:8 rasio or landscape
                              </div>
                              <div id="preview-image">
                                 <img src="" alt="" width="100%">
                              </div>
                           </div>
                           <span><input type="text" name="id" id="id" hidden></span>
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
   const inptFile = document.querySelector("form input[type='file']")
   inptFile.addEventListener("change", (e) => {
      e.preventDefault()
      const previewEl = document.querySelector("#preview-image img")
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

   const buttonEdit = document.querySelectorAll(".button-edit-slide")

   const setEditInput = (id) => {
      fetch("action/get_feature_by_id.php?id=" + id).then(async res => {
         const data = await res.json()
         console.log(data)

         const idInp = document.querySelector("input#id")
         const titleEl = document.querySelector("input#title")
         const descriptionEl = document.querySelector("textarea#description")
         const previewEl = document.querySelector("#preview-image img")
         idInp.value = data.data.id
         titleEl.value = data.data.title
         descriptionEl.value = data.data.description
         previewEl.src = "/" + data.data.icon_path
      }).catch(err => {
         console.error(err)
         Swal.fire({
            icon: 'error',
            title: 'Gagal mengubah data',
            showConfirmButton: false,
            timer: 1500
         })
      })
   }

   buttonEdit.forEach(item => {
      item.addEventListener("click", e => {
         e.preventDefault()
         const id = e.target.getAttribute("data-id")
         console.log(id)
         setEditInput(id)
      })
   })
</script>

<?php

include __DIR__ . "/layouts/footer.php";

?>