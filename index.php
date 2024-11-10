<?php

include __DIR__ . "/config/database.php";
include __DIR__ . "/services/home.php";
include "./header.php";

$features = get_features($connection);
$about = get_about($connection);
?>

<body>
   <div class="container-fluid p-0">

      <?php

      include "./navbar.php";

      ?>

      <div class="carousel-wrapper" style="height: 600px; overflow: hidden;">
         <div id="carouselExample" class="carousel slide h-100" data-bs-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img src="./background.jpg" class="d-block w-100" alt="...">
               </div>
               <div class="carousel-item">
                  <img src="./background.jpg" class="d-block w-100" alt="...">
               </div>
               <div class="carousel-item">
                  <img src="./background.jpg" class="d-block w-100" alt="...">
               </div>
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
            $html .= "<img src='...' alt='ICON'>";
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

               <ul data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000">
                  <li>Power Plant</li>
                  <li>Oil and Gas</li>
                  <li>Petrochemical</li>
                  <li>Refinery Industry</li>
                  <li>Material Handling</li>
                  <li>Food Industry, Paper Industry etc</li>
               </ul>
            </div>
            <div id="img-panel" class="col-6 px-5 py-2 rounded-circle">
               <img src="./background.jpg" alt="" class="w-100 h-100 rounded-circle" data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000">
            </div>
         </div>
      </div>
   </div>
   <div id="service-section" class="py-4">
      <div class="container px-5">
         <div id="service-title" class="row">
            <div class="col-12 d-flex justify-content-center mb-5">
               <h5 class="fs-3 border-1 border-bottom border-black pb-3 px-4 fw-medium" data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000">WHAT WE OFFER</h5>
            </div>
         </div>
         <div class="row px-5">
            <div class="col-12">
               <p class="text-center" data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000">WE CAN OFFER OUR CAPABILITY, TEAM WORK AND EXPERIENCES TO MANAGE ANY CONSTRUCTION WORKS FOR CIVIL, STRUCTURE, MECHANICAL, PIPING, TANK AND SOME ELECTRICAL WORKS</p>
            </div>
         </div>
         <div class="row px-5">
            <div class="col-4" data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000">
               <img src="./background.jpg" alt="" class="w-100" height="160px">
               <h6 class="fs-4 text-center mb-4 mt-1">Fabrication</h6>
               <p class="text-center">We have a workshop for fabrication with best production capacity. We can work on steel fabrication, plates and tanks</p>
            </div>
            <div class="col-4" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
               <img src="./background.jpg" alt="" class="w-100" height="160px">
               <h6 class="fs-4 text-center mb-4 mt-1">Fabrication</h6>
               <p class="text-center">We have a workshop for fabrication with best production capacity. We can work on steel fabrication, plates and tanks</p>
            </div>
            <div class="col-4" data-aos="fade-up" data-aos-delay="250" data-aos-duration="1000">
               <img src="./background.jpg" alt="" class="w-100" height="160px">
               <h6 class="fs-4 text-center mb-4 mt-1">Fabrication</h6>
               <p class="text-center">We have a workshop for fabrication with best production capacity. We can work on steel fabrication, plates and tanks</p>
            </div>
         </div>
      </div>
   </div>
   <?php
   include "./footer.php"
   ?>
</body>

</html>