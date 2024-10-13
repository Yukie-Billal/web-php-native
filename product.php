<?php
include "./header.php";
?>

<body>
   <div class="container-fluid p-0">
      <?php

      include "./navbar.php"

      ?>
      <div id="hero-section" class="w-100 d-flex justify-content-center align-items-center" style="height: 100vh;">
         <img src="./background.jpg" alt="" width="100%" style="height: 100%;" class="position-absolute">
         <div class="position-relative w-25 d-flex justify-content-center align-items-center flex-column">
            <h2 class="border-bottom border-white text-center text-white fs-1 w-100 fw-semibold" style="text-shadow: 1px 1px 1px #1a1a1a;">Produk Kami</h2>
            <a class="btn btn-primary" style="width: fit-content;" href="#product-section">SELENGKAPNYA</a>
         </div>
      </div>
      <div id="product-section">
         <div class="container-fluid">
            <div class="row justify-content-center my-5 py-5">
               <div class="col-12 col-lg-6">
                  <h1 class="text-center">Memberikan Produk Terbaik</h1>
                  <p class="text-center fs-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt alias architecto est. Quis incidunt quibusdam, ullam vitae fugiat officia sapiente quas voluptatibus. Delectus fugit illum, autem a magni, error laudantium deserunt nam tempora vero alias. Dolores cum et optio quas.</p>
               </div>
            </div>
            <div class="row" id="product-list-wrapper">
               <div class="col-12 col-md-6 col-lg-4 col-xl-3 p-0 overflow-hidden position-relative d-flex justify-content-center align-items-center" style="height: 300px;">
                  <img src="./background.jpg" alt="..." width="100%" height="100%" class="position-absolute">
                  <h2 class="text-center text-white position-relative">TEXT</h2>
               </div>
               <div class="col-12 col-md-6 col-lg-4 col-xl-3 p-0 overflow-hidden position-relative d-flex justify-content-center align-items-center" style="height: 300px;">
                  <img src="./background.jpg" alt="..." width="100%" height="100%" class="position-absolute">
                  <h2 class="text-center text-white position-relative">TEXT</h2>
               </div>
               <div class="col-12 col-md-6 col-lg-4 col-xl-3 p-0 overflow-hidden position-relative d-flex justify-content-center align-items-center" style="height: 300px;">
                  <img src="./background.jpg" alt="..." width="100%" height="100%" class="position-absolute">
                  <h2 class="text-center text-white position-relative">TEXT</h2>
               </div>
               <div class="col-12 col-md-6 col-lg-4 col-xl-3 p-0 overflow-hidden position-relative d-flex justify-content-center align-items-center" style="height: 300px;">
                  <img src="./background.jpg" alt="..." width="100%" height="100%" class="position-absolute">
                  <h2 class="text-center text-white position-relative">TEXT</h2>
               </div>
               <div class="col-12 col-md-6 col-lg-4 col-xl-3 p-0 overflow-hidden position-relative d-flex justify-content-center align-items-center" style="height: 300px;">
                  <img src="./background.jpg" alt="..." width="100%" height="100%" class="position-absolute">
                  <h2 class="text-center text-white position-relative">TEXT</h2>
               </div>
            </div>
         </div>
      </div>
   </div>
</body>

</html>