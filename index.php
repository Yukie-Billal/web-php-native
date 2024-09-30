<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
   <div class="container-fluid p-0">
      <nav class="navbar navbar-expand-lg bg-primary">
         <div class="container-fluid px-4 py-1">
            <h1 class="navbar-brand fs-4" href="#">LOGO</h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">About Us</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">Project</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">Career</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">Contact</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>

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
      <div style="height: 300px;" class="d-flex justify-content-center align-items-center gap-5">
         <div class="item d-flex justify-content-center align-items-center flex-column">
            <img src="..." alt="ICON">
            <h6>Professional Team</h6>
            <p>We have our professional team to manage our project</p>
         </div>
         <div class="item d-flex justify-content-center align-items-center flex-column">
            <img src="..." alt="ICON">
            <h6>We deliver Quality</h6>
            <p>Quality is our services priority</p>
         </div>
         <div class="item d-flex justify-content-center align-items-center flex-column">
            <img src="..." alt="ICON">
            <h6>Competitive</h6>
            <p>We provide competitive price, schedule and method</p>
         </div>
      </div>
   </div>
   <div id="about-section" style="height: 80dvh;">
      <div class="container">
         <div id="about-title" class="d-flex justify-content-center mb-5">
            <h5 class="fs-3 border-1 border-bottom border-black pb-3 px-4 fw-medium">ABOUT US</h5>
         </div>
         <div id="about-content" class="row px-5 mt-5 pt-5">
            <div id="text-panel" class="col-6">
               <h5 class="fs-2 fw-medium text-center mb-3">Who we are</h5>
               <p style="text-align: justify;">We are a construction company established in 2003. Our company able to manage and executed any project and to be your reliable partner in the Engineering, Procurement and Construction with committed to customer satisfaction oriented.</p>

               <p style="text-align: justify;">We have many experiences to manage any construction works for civil, structure, mechanical, piping, tank work and some electrical work at any industry such as :</p>

               <ul>
                  <li>Power Plant</li>
                  <li>Oil and Gas</li>
                  <li>Petrochemical</li>
                  <li>Refinery Industry</li>
                  <li>Material Handling</li>
                  <li>Food Industry, Paper Industry etc</li>
               </ul>
            </div>
            <div id="img-panel" class="col-6 px-5 py-2 rounded-circle">
               <img src="./background.jpg" alt="" class="w-100 h-100 rounded-circle">
            </div>
         </div>
      </div>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>