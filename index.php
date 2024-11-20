<?php

include __DIR__ . "/config/database.php";
include __DIR__ . "/services/home.php";
include "./header.php";

$slides = get_slides($connection);
$features = get_features($connection);
$about = get_about($connection);
$about_items = get_about_items($connection);
$service = get_service_config($connection);
$service_items = get_service_items($connection);

?>

<body>
   <div class="container-fluid p-0">

      <?php

      include "./navbar.php";

      ?>

      <div class="carousel-wrapper" style="height: 600px; overflow: hidden;">
         <div id="carouselExample" class="carousel slide h-100" data-bs-ride="carousel">
            <div class="carousel-inner">
               <?php
               foreach ($slides as $key => $slide) {
                  $html = '<div class="carousel-item active">';
                  $html .= '<img src="' . $slide['img_path'] . '" class="d-block w-100" alt="...">';
                  $html .= '</div>';

                  echo $html;
               }
               ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="visually-hidden">Next</span>
            </button>
         </div>
      </div>
      <div style="height: 300px;" class="d-flex justify-content-center align-items-center gap-5 px-5">
         <?php
         foreach ($features as $key => $feature) {
            $html = "<div class='item d-flex justify-content-center align-items-center flex-column' data-aos='fade-up' data-aos-delay='0' data-aos-duration='1000'>";
            $html .= "<img src='/" . $feature['icon_path'] . "' alt='ICON'>";
            $html .= "<h6>" . $feature['title'] . "</h6>";
            $html .= "<p>" . $feature['description'] . "</p>";
            $html .= "</div>";

            echo $html;
         }
         ?>
      </div>
   </div>
   <div id="about-section" class="py-4">
      <div class="container px-5">
         <div id="about-title" class="d-flex justify-content-center mb-5">
            <h5 class="fs-3 border-1 border-bottom border-black pb-3 px-4 fw-medium" data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000"><?= $about['about_title'] ?></h5>
         </div>
         <div id="about-content" class="row px-5 mt-5 pt-5">
            <div id="text-panel" class="col-6">
               <h5 class="fs-2 fw-medium text-center mb-3" data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000"><?= $about['about_text_title'] ?></h5>
               <p style="text-align: justify;" data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000"><?= $about['about_text_paragraf_1'] ?></p>

               <p style="text-align: justify;" data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000"><?= $about['about_text_paragraf_2'] ?></p>

            </div>
            <div id="img-panel" class="col-6 px-5 py-2 rounded-circle">
               <img src="/<?= $about['about_image_path'] ?>" alt="" class="w-100 rounded-circle object-fit-cover" style="height: 380px;" data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000">
            </div>
         </div>
      </div>
   </div>
   <div id="visi-misi-section" class="py-4">
      <div class="container-fluid" id="visi">
         <div class="container">
            <div class="row pb-4 pt-2">
               <div class="container">
                  <div class="col-12 d-flex justify-content-center">
                     <h5 class="fs-2 text-center pb-2 px-4 fw-medium border-1 border-bottom border-black" data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000">Visi Kami</h5>
                  </div>
                  <p class="fs-6 text-center">Menjadi Perusahaan Agri Bisnis yang Terintegrasi</p>
               </div>
            </div>
         </div>
      </div>
      <div class="container-fluid" id="misi">
         <div class="container">
            <div class="row pb-4 pt-2">
               <div class="col-12 d-flex justify-content-center">
                  <h5 class="fs-2 text-center pb-2 px-4 fw-medium border-1 border-bottom border-black" data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000">Misi Kami</h5>
               </div>
               <div class="col-12 row row-gap-4 justify-content-center">
                  <div class="col-4">
                     <h5 class="text-center fw-medium">1</h5>
                     <p class="text-center">Meningkatkan Kapasitas SDM yang berkualitas</p>
                  </div>
                  <div class="col-4">
                     <h5 class="text-center fw-medium">2</h5>
                     <p class="text-center">Meningkatkan Produktivitas untuk membuka peluang diberbagai sektor Agri Bisnis</p>
                  </div>
                  <div class="col-4">
                     <h5 class="text-center fw-medium">3</h5>
                     <p class="text-center">Memperluas area pemasaran</p>
                  </div>
                  <div class="col-4">
                     <h5 class="text-center fw-medium">4</h5>
                     <p class="text-center">Memberikan Harga yang Kompetitif untuk semua customer</p>
                  </div>
                  <div class="col-4">
                     <h5 class="text-center fw-medium">5</h5>
                     <p class="text-center">5. Meningkatkan Pelayanan untuk memberikan Kepuasan Pelanggan</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div id="service-section" class="py-4">
      <div class="container px-5">
         <div id="service-title" class="row">
            <div class="col-12 d-flex justify-content-center mb-5">
               <h5 class="fs-3 border-1 border-bottom border-black pb-3 px-4 fw-medium" data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000"><?= $service['title'] ?></h5>
            </div>
         </div>
         <div class="row px-5">
            <div class="col-12">
               <p class="text-center" data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000"><?= $service['subtitle'] ?></p>
            </div>
         </div>
         <div class="row px-5">
            <?php
            foreach ($service_items as $key => $item) {
               $html = '<div class="col-4" data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000">';
               $html .= '<img src="/' . $item['icon_path'] . '" alt="" class="w-100" height="160px">';
               $html .= '<h6 class="fs-4 text-center mb-4 mt-1">' . $item['title'] . '</h6>';
               $html .= '<p class="text-center">' . $item['description'] . '</p>';
               $html .= '</div>';
               echo $html;
            }
            ?>
         </div>
      </div>
   </div>
   <?php
   include "./footer.php"
   ?>
</body>

</html>