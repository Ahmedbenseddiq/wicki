<?php
    include_once '../controller/displaycategoriesController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Categories</title>

    
    
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body id="page-top">


    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <!-- <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div> -->
                <div class="sidebar-brand-text mx-3">wiki <sup>zone</sup></div>
            </a>

            <hr class="sidebar-divider my-0">

            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="tags.php">
                    <span>Categories </span></a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="tags.php">
                    <span> Tags</span></a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="wikis.php">
                    <span>Wickis</span></a>
            </li>

            <hr class="sidebar-divider">
        </ul>
        


        <div id="content-wrapper" class="d-flex flex-column">


            <div id="content">  
                


                <div class="container-fluid mt-5">


                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Statistics</h1>
                        
                    </div>


                    <div class="row mb-5">
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Categories</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">...</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                       
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Tags</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">...</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-secondary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                wikis</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">...</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        
                        
                    </div>


                    <div class="container m-auto">
                    <form class="m-auto w-75" method="post" action="../controller/category.contr.php" enctype="multipart/form-data">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="categoryName">Category name</label>
                            <input type="text" id="categoryName" class="form-control" name="catName" required>
                        </div>

                        <div class="mb-3">
                            <label for="uploadedFile" class="form-label">Upload Image</label>
                            <input class="form-control" type="file" id="uploadedFile" name="catImg" required accept="image/*">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block w-25 mb-4" name="add">Add Category</button>
                    </form>

                    <table class="table m-auto  w-75">
                        <thead>
                            <div class="d-flex justify-content-center" style="width: 45rem; margin-top: 65px;">
                                <h3 class="mb-3">Category list</h3>
                            </div>
                            <tr>
                                <!-- <th scope="col">#</th> -->
                                <th scope="col">Category Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Management</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $category): ?>
                                <tr>
                                    <!-- <th scope="row"><?= $category['cat_id']; ?></th> -->
                                    <td><?= $category['cat_name']; ?></td>
                                    <td>
                                        <?php
                                        
                                                    if (!empty($category['image'])) {
                                                        $imageType = 'image/jpeg';  // Change this based on your image type
                                                        $base64Image = base64_encode($category['image']);
                                                        echo '<img src="data:' . $imageType . ';base64,' . $base64Image . '" alt="Category Image" style="max-width: 100px; max-height: 100px;">';
                                                    } else {
                                                        echo 'No Image';
                                                    }
                                                    ?>
                                    </td>
                                    <td>
                                                
                                        <div class="d-flex">
                                            <form method="post" action="../controller/deleteCategory.php" class="mr-2">
                                                <input type="hidden" name="category_id" value="<?= $category['cat_id']; ?>">
                                                <button type="submit" name="delete_category" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                            </form>
                                        
                                            <a href="../view/modifyCategory.php?category_id=<?= $category['cat_id']; ?>" class="btn btn-success">Modify</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>


 
                </div>
            </div>
            
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; wikizone 2024</span>
                    </div>
                </div>
            </footer>


        </div>


    </div>
        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>