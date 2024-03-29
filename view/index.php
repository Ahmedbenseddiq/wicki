<?php require_once '../controller/category.contr.php'; 
session_start();?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title>home</title>

    <meta name="theme-color" content="#ffffff">


    <link href="assets/css/theme.css" rel="stylesheet" />

  </head>


  <body>


    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light sticky-top" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.html">wikizone</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
              <!-- <li class="nav-item"><a class="nav-link" aria-current="page" href="#">Home</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#">Wikis</a></li>
               <li class="nav-item"><a class="nav-link" aria-current="page" href="#">Authors</a></li> -->
             <!-- <li class="nav-item"><a class="nav-link" aria-current="page" href="#marketing">Resources</a></li> -->
            </ul>
            <div class="d-flex ms-lg-4"><a class="btn btn-secondary-outline" href="login.php">Sign In</a></div>
          </div>
        </div>
      </nav>
      <section class="pt-7">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 text-md-start text-center py-6">
              <h1 class="mb-4 fs-9 fw-bold">Sharing information sparks brighter ideas.</h1>
              <p class="mb-6 lead text-secondary">Empowering growth through shared wisdom,<br class="d-none d-xl-block" />fostering collaboration, and expanding<br class="d-none d-xl-block" />horizons for a brighter tomorrow.</p>
              <div class="text-center text-md-start"><a class="btn btn-dark me-3 btn-lg" href="#!" role="button">Get started</a></div>
            </div>
            <div class="col-md-6 text-end"><img class="pt-7 pt-md-0 img-fluid" src="assets\img\hero\hero-img.jpg" alt="" /></div>
          </div>
        </div>
      </section>



      <section class="pt-5 pt-md-9 mb-6" id="feature">

        <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block" style="background-image:url(assets\img\services\shape.png);opacity:.5;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <h1 class="fs-9 fw-bold mb-4 text-center">Enriching minds, we embody<br class="d-none d-xl-block" /> excellence by sharing knowledge.</h1>
          <div class="row">
            <div class="col-lg-3 col-sm-6 mb-2"> <img class="mb-3 ms-n3" src="assets\img\services\icon1.png" width="75" alt="Feature" />
              <h4 class="mb-3">First click tests</h4>
              <p class="mb-0 fw-medium text-secondary">akin to exploring a vast knowledge realm</p>
            </div>
            <div class="col-lg-3 col-sm-6 mb-2"> <img class="mb-3 ms-n3" src="assets\img\services\icon2.png" width="75" alt="Feature" />
              <h4 class="mb-3">Design surveys</h4>
              <p class="mb-0 fw-medium text-secondary">Sports betting,lottery and bingo playing for the fun</p>
            </div>
            <div class="col-lg-3 col-sm-6 mb-2"> <img class="mb-3 ms-n3" src="assets\img\services\icon3.png" width="75" alt="Feature" />
              <h4 class="mb-3">Preference tests</h4>
              <p class="mb-0 fw-medium text-secondary">The Myspace page defines the individual.</p>
            </div>
            <div class="col-lg-3 col-sm-6 mb-2"> <img class="mb-3 ms-n3" src="assets\img\services\icon4.png" width="75" alt="Feature" />
              <h4 class="mb-3">Five second tests</h4>
              <p class="mb-0 fw-medium text-secondary">Personal choices and the overall personality of the person.</p>
            </div>
          </div>
          
        </div>

      </section>





      <section class="pt-5" id="marketing">
    <div class="container">
        <h1 class="fw-bold fs-6 mb-3">Discover new categories</h1>
        <p class="mb-6 text-secondary">Explore a diverse spectrum of categories, offering a wide array of information to discover.</p>
        <div class="row">
            <?php foreach ($categories as $category): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body ps-0">
                            <?php
                            // Check if the image data is not null
                            if (!empty($category['image'])) {
                                $imageType = 'image/jpeg';  // Change this based on your image type
                                $base64Image = base64_encode($category['image']);
                                echo '<img src="data:' . $imageType . ';base64,' . $base64Image . '" class="card-img-top" alt="Category Image">';
                            } else {
                                echo '<img src="assets/img/category/default_image.png" class="card-img-top" alt="Default Image">';
                            }
                            ?>
                            <h5 class="fw-bold"><?php echo $category['cat_name']; ?></h5>
                            <!-- Append the category ID as a query parameter to the URL -->
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<section class="pt-5" id="marketing">
        <div class="container">
            <h1 class="fw-bold fs-6 mb-3">Discover our latest wikis</h1>
                <p class="mb-6 text-secondary">Explore a diverse spectrum of categories, offering a wide array of information to discover.</p>
                <div class="col-sm-5 mb-5 " >
                  <input type="search" class="form-control" id="keywordInput" placeholder="search blog">
                </div>
                <div class="row" id="data">
                   
                
                  
                </div>

                <nav aria-label="..." class=" d-flex  justify-content-center mt-4  w-100 ">
                  <ul class="pagination " id="paginate">
            
                  
                  </ul>
                </nav>
     
        </div>
    </section>







    </main>

    <footer class="text-center py-0">

      <div class="container">
        <div class="container border-top py-3">
          <div class="row justify-content-between">
            <div class="col-12 col-md-auto mb-1 mb-md-0">
              <p class="mt-5">&copy; 2024 Wikizone Inc </p>
            </div>
            <div class="col-12 col-md-auto">
              <div class="col-lg-3 col-md-6 mb-4 mb-md-6 mb-lg-0 mb-sm-2 order-1 order-md-1 order-lg-1"><img class="mb-4" src="assets\img\logo1.png" width="184" alt="" /></div>
            </div>
          </div>
        </div>
      </div>

    </footer>




    <script src="ajax/affiche_wikis.js"></script>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    
    <script src="assets\js\theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap" rel="stylesheet">
  </body>

</html>