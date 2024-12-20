<?php

$url_path = $_SERVER["REQUEST_URI"];

?>

<nav class="navbar navbar-expand-lg fixed-top">
   <div class="container-fluid px-4 py-1">
      <div class="navbar-brand-wrapper d-flex align-items-center justify-content-center">
         <img src="./assets/img/logogka-removebg-preview.png" alt=".." style="width: 100px;" class="me-2">
         <h6 class="navbar-brand-text" href="#">
            <marquee>LOGO</marquee>
         </h6>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-flex justify-content-end" id="navbar-menu">
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" aria-current="page" href="./index.php">Home</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="./index.php#about-section">About Us</a>
            </li>
            <li class="nav-item">
               <a class="nav-link <?= $url_path == "/product.php" ? "active" : "" ?>" href="./product.php">Product</a>
            </li>
            <li class="nav-item">
               <a class="nav-link <?= $url_path == "/documentation.php" ? "active" : "" ?>" href="./documentation.php">Documentation</a>
            </li>
            <li class="nav-item">
               <a class="nav-link <?= $url_path == "/product.php" ? "active" : "" ?>" href="./contact.php">Contact</a>
            </li>
         </ul>
      </div>
   </div>
</nav>