<?php
include "./header.php";
?>

<body>
   <div class="container-fluid p-0">
      <?php

      include "./navbar.php";

      ?>
      <div id="hero-section" class="w-100 d-flex justify-content-center align-items-center" style="height: 100vh;">
         <img src="./background.jpg" alt="" width="100%" style="height: 100%;" class="position-absolute">
         <div class="position-relative w-25 d-flex justify-content-center align-items-center flex-column">
            <h2 class="border-bottom border-white text-center text-white fs-1 w-100 fw-semibold" style="text-shadow: 1px 1px 1px #1a1a1a;">Dokumentasi</h2>
            <a class="btn btn-primary" style="width: fit-content;" href="#documentation-section">SELENGKAPNYA</a>
         </div>
      </div>
      <div id="documentation-section">
         <div class="row">
            <div class="col-12">
               <h6 class="text-center fs-2 fw-semibold">Dokumentasi Kegiatan</h6>
               <h6 class="text-center fs-4 fw-medium">Lihat bagaimana aktifitas kami berlangsung</h6>
            </div>
         </div>
         <div class="row">
            <div class="col-12">
               <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <img src="..." class="d-block w-100" alt="...">
                     </div>
                     <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                     </div>
                     <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                     </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="visually-hidden">Next</span>
                  </button>
               </div>
            </div>
         </div>
      </div>
      <?php
      include "./footer.php";
      ?>
   </div>
</body>

</html>