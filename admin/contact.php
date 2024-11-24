<?php

include __DIR__ . "/services/func.php";

if (!check_auth()) {
   header("location:../login.php");
}

$config = get_contact_config($mysqli);

include __DIR__ . "/layouts/head.php";

?>

<main class="app-main">
   <?php
   $breadcrumb_title = "Kontak";
   $breadcrumb_active_page = "Kontak";
   $breadcrumb_pre_title = "Kontak";
   include __DIR__ . "/layouts/breadcrumb.php";
   ?>
   <div class="app-content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="card mb-4">
                  <div class="card-header">
                     <h3 class="card-title">Konfigurasi halaman kontak</h3>
                  </div>
                  <div class="card-body">
                     <form class="row gap-3" id="form-update-config">
                        <input type="text" name="id" id="id" value="<?= $config['id'] ?>" hidden>
                        <div class="form-group">
                           <label for="page_title">Judul halaman</label>
                           <input type="text" name="page_title" id="page_title" placeholder="Judul halaman ..." class="form-control" value="<?= $config['page_title'] ?>">
                        </div>
                        <div class="form-group">
                           <label for="page_button_text">Teks tombol halaman </label>
                           <input type="text" name="page_button_text" id="page_button_text" placeholder="Teks tombol ..." class="form-control" value="<?= $config['page_button_text'] ?>">
                        </div>
                        <div class="form-group">
                           <label for="section_title">Judul header konten</label>
                           <input type="text" name="section_title" id="section_title" placeholder="Judul header konten ..." class="form-control" value="<?= $config['section_title'] ?>">
                        </div>
                        <div class="form-group">
                           <label for="section_input_title">Judul input konten</label>
                           <textarea name="section_input_title" id="section_input_title" class="form-control" rows="3"><?= $config['section_input_title'] ?></textarea>
                        </div>
                        <div class="form-group">
                           <label for="map_latitude">Latitude untuk map</label>
                           <input type="text" name="map_latitude" id="map_latitude" placeholder="-1.12378" class="form-control" value="<?= $config['map_latitude'] ?>">
                        </div>
                        <div class="form-group">
                           <label for="map_longitude">Longitude untuk map</label>
                           <input type="text" name="map_longitude" id="map_longitude" placeholder="100.1234 ..." class="form-control" value="<?= $config['map_longitude'] ?>">
                        </div>
                        <div class="form-group">
                           <label for="map_place_name">Nama tempat di map</label>
                           <input type="text" name="map_place_name" id="map_place_name" placeholder="Cilegon ..." class="form-control" value="<?= $config['map_place_name'] ?>">
                        </div>
                        <div class="form-group">
                           <label for="map_place_address">Alamat pada map</label>
                           <input type="text" name="map_place_address" id="map_place_address" placeholder="Kota cilegon ..." class="form-control" value="<?= $config['map_place_address'] ?>">
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
      fetch("action/update_contact_config.php", {
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