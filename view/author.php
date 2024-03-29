<?php
require_once '../controller/category.contr.php';

?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title>author</title>

    <meta name="theme-color" content="#ffffff">


    <link href="assets/css/theme.css" rel="stylesheet" />
    
  </head>


  <body>


    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light sticky-top" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.php">wikizone</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item"><a class="nav-link" aria-current="page" href="author_wiki.php">Write wiki</a></li>

            </ul>
            <div class="d-flex ms-lg-4">

            <form action="../controller/logout.contr.php" method="post">
                <button type="submit" class="btn btn-secondary-outline" name="logout">Sign out</button>
            </form>

            </div>
          </div>
        </div>
      </nav>
      
      <section class="pt-7">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 text-md-start text-center py-6">
              <h1 class="mb-4 fs-9 fw-bold">Sparking brilliance.</h1>
              <p class="mb-6 lead text-secondary">"Information: the catalyst that transforms the obscure<br class="d-none d-xl-block" />into the enlightened, paving the way for the curious<br class="d-none d-xl-block" />to navigate the intricate web of knowledge.</p>
            </div>
            <div class="col-md-6 text-end"><img class="pt-7 pt-md-0 img-fluid" src="assets\img\hero\hero-img.jpg" alt="" /></div>
          </div>
        </div>
      </section>



     
      <section class="pt-5" id="marketing">
        <div class="container">
            <h1 class="fw-bold fs-6 mb-3">Discover new wiki</h1>
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




   
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    
    <script src="assets\js\theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap" rel="stylesheet">

    <script src="ajax/affiche_wikis.js"></script>

  </body>

</html>