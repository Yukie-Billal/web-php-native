<?php

include __DIR__ . "/header.php";
include __DIR__ . "/config/database.php";
include __DIR__ . "/services/product.php";

$config = get_product_config($connection);
$items = get_product_items($connection);
$performance = get_product_performance($connection);
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
      <div id="product-section" class="container-fluid">
         <div class="row mt-5">
            <div class="col-12 py-5">
               <h6 class="text-center fs-2 fw-semibold"><?= $config['section_title'] ?></h6>
               <h6 class="text-center fs-5 fw-medium"><?= $config['section_description'] ?></h6>
            </div>
         </div>
         <div class="row">
            <div class="col-12">
               <div class="owl-carousel owl-theme">
                  <?php foreach ($items as $key => $item): ?>
                     <div class="item position-relative">
                        <div class="img-wrapper">
                           <img src="<?= $item['img_path'] ?>" alt="..">
                        </div>
                        <div class="text-wrapper mt-3">
                           <h6><?= $item['title'] ?></h6>
                           <p><?= $item['description'] ?></p>
                        </div>
                     </div>
                  <?php endforeach; ?>

               </div>
               <div class="col-12 d-flex justify-content-between mt-4 px-5">
                  <button class="btn btn-primary btn-lg btn-owl-prev">Sebelumnya</button>
                  <button class="btn btn-primary btn-lg btn-owl-next">Selanjutnya</button>
               </div>
            </div>
         </div>
      </div>
      <div id="performance-section" class="container-fluid">
         <div class="row mt-5">
            <div class="col-12 py-5">
               <div class="text-center fs-2 fw-semibold">Performa Farm GKA</div>
            </div>
         </div>
         <div class="row justify-content-center">
            <div class="col-12 col-md-8">
               <table class="table table-hover table-bordered table-striped table-primary">
                  <thead>
                     <tr>
                        <th class="text-center">Item</th>
                        <th class="text-center">Performance</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr class="table-info">
                        <td class="text-center">Mortalitas</td>
                        <td class="text-center fw-medium"><?= $performance['mortalitas'] ?></td>
                     </tr>
                     <tr class="table-info">
                        <td class="text-center">Body Weight</td>
                        <td class="text-center fw-medium"><?= $performance['body_weight'] ?></td>
                     </tr>
                     <tr class="table-info">
                        <td class="text-center">Fcr</td>
                        <td class="text-center fw-medium"><?= $performance['fcr'] ?></td>
                     </tr>
                     <tr class="table-info">
                        <td class="text-center">Umur Panen</td>
                        <td class="text-center fw-medium"><?= $performance['umur_panen'] ?></td>
                     </tr>
                     <tr class="table-info">
                        <td class="text-center">Index Performance</td>
                        <td class="text-center fw-medium"><?= $performance['index_performance'] ?></td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <?php
      include "./footer.php";
      ?>
      <script>
         const owl = $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
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