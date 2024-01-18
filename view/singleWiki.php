<?php
require_once '../controller/wiki.contr.php';
// require_once '../controller/wiki.contr.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Single Wiki</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/css/styles.css" rel="stylesheet" />
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!">WIKIZONE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <!-- Add your navigation items here if needed -->
            </ul>
            <a class="nav-link active" aria-current="page" href="wikis.php">Go Back</a>
        </div>
    </div>
</nav>

<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <?php if (isset($wikiBywiki_id)): ?>
                <div class="col-md-6">
                    <?php
                    if (!empty($wikiBywiki_id['image'])) {
                        $imageContent = base64_encode($wikiBywiki_id['image']);
                        echo '<img class="card-img-top" src="data:image/jpeg;base64,' . $imageContent . '" alt="Wiki Image">';
                    } else {
                        echo '<img class="card-img-top" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="Default Image">';
                    }
                    ?>
                </div>  
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder"><?= $wikiBywiki_id['titre'] ?></h1>
                    <div class="fs-5 mb-3">
                        <?php
                        if (isset($wikiBywiki_id['tags']) && is_array($wikiBywiki_id['tags']) && count($wikiBywiki_id['tags']) > 0) {
                            echo '<strong>Tags:</strong>';
                            echo '<ul class="list-unstyled">';
                            foreach ($wikiBywiki_id['tags'] as $tag) {
                                echo '<li>' . htmlspecialchars($tag) . '</li>';
                            }
                            echo '</ul>';
                        } else {
                            echo '<p>No tags available.</p>';
                        }
                        ?>
                    </div>
                    
                    <p class="lead"><?= $wikiBywiki_id['contenu'] ?? 'No content available'; ?></p>
                </div>
            <?php else: ?>
                <div class="col-md-12">
                    <p>No wiki found.</p>
                </div>
            <?php endif; ?>
            
        </div>
    </div>
</section>






<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; wickizone 2024</p></div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>
