<?php

include __DIR__ . "/header.php";
include __DIR__ . "/config/database.php";
include __DIR__ . "/services/product.php";

$config = get_product_config($connection);
$items = get_product_items($connection);

?>

<body>
   <div class="container-fluid p-0">
      <?php

      include "./navbar.php";

      ?>
      <div id="hero-section" class="w-100 d-flex justify-content-center align-items-center" style="height: 100vh;">
         <img src="./background.jpg" alt="" width="100%" style="height: 100%;" class="position-absolute">
         <div class="position-relative w-25 d-flex justify-content-center align-items-center flex-column">
            <h2 class="border-bottom border-white text-center text-white fs-1 w-100 fw-semibold" style="text-shadow: 1px 1px 1px #1a1a1a;"><?= $config['page_title'] ?></h2>
            <a class="btn btn-primary text-uppercase" style="width: fit-content;" href="#product-section"><?= $config['page_button_text'] ?></a>
         </div>
      </div>
      <div id="product-section" class="container-fluid py-5">
         <div class="row">
            <div class="col-12 py-5">
               <h6 class="text-center fs-2 fw-semibold"><?= $config['section_title'] ?></h6>
               <h6 class="text-center fs-5 fw-medium"><?= $config['section_description'] ?></h6>
            </div>
         </div>
         <div class="row">
            <div class="col-12">
               <div class="owl-carousel owl-theme">
                  <?php
                  foreach ($items as $key => $item) {
                     $html = '<div class="item position-relative">';
                     $html .= '<div class="img-wrapper">';
                     $html .= '<img src="' . $item['img_path'] . '" alt="..">';
                     $html .= '</div>';
                     $html .= '<div class="text-wrapper mt-3">';
                     $html .= '<h6>' . $item['title'] . '</h6>';
                     $html .= '<p>' . $item['description'] . '</p>';
                     $html .= '</div>';
                     $html .= '</div>';

                     echo $html;
                  }
                  ?>

               </div>
               <div class="col-12 d-flex justify-content-between mt-4 px-5">
                  <button class="btn btn-primary btn-lg btn-owl-prev">Sebelumnya</button>
                  <button class="btn btn-primary btn-lg btn-owl-next">Selanjutnya</button>
               </div>
            </div>
         </div>
         <?php
         include "./footer.php";
         ?>
      </div>
      <script>
         const owl = $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
               0: {
                  items: 1
               },
               600: {
                  items: 3
               }
            }
         })

         const buttonNextOwl = $(".btn-owl-next")
         const buttonPrevOwl = $(".btn-owl-prev")

         buttonNextOwl.click(() => owl.trigger("next.owl.carousel"))
         buttonPrevOwl.click(() => owl.trigger("prev.owl.carousel"))
      </script>
</body>

</html>