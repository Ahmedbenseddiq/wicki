<?php
    include_once '../controller/displaywiki.php';
    include_once '../controller/displaytags.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Wickis</title>

    
    
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
                <a class="nav-link" href="add<iki.php">
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
                            <label class="form-label" for="categoryName">Wiki name</label>
                            <input type="text" id="categoryName" class="form-control" name="catName" required>
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="categoryName">Content</label>
                            <textarea type="text" id="categoryName" class="form-control" name="catName" required></textarea>
                        </div>
                        <label>Tags:</label><br>

                        <ul>
                            <?php foreach ($tags as $tag): ?>
                                <input type="checkbox" id="tag<?= $tag['tag_id']; ?>" name="existing_tags[]" value="<?= $tag['tag_id']; ?>">
                                <label class="btn btn-outline-primary" for="tag<?= $tag['tag_id']; ?>"><?= $tag['tag_name']; ?></label>
                            <?php endforeach; ?>
                        </ul>


                            php
                            Copy code
                            <?php
                            include_once '../controller/displaywiki.php';
                            include_once '../controller/displaytags.php';
                        ?>
                            <label for="category_id">Select Category:</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category['cat_id']; ?>"><?= $category['cat_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        <div class="mb-3">  
                            <label for="uploadedFile" class="form-label">Upload Image</label>
                            <input class="form-control" type="file" id="uploadedFile" name="catImg" required accept="image/*">
                        </div>
                        

                        <button type="submit" class="btn btn-primary btn-block w-25 mb-4" name="add">Add Category</button>
                    </form>

                    <table class="table m-auto w-75">
                        <thead>
                            <div class="d-flex justify-content-center" style="width: 45rem; margin-top: 65px;">
                                <h3 class="mb-3">Wiki list</h3>
                            </div>
                            <tr>
                                <!-- <th scope="col">#</th> -->
                                <th scope="col">Wiki Title</th>
                                <th scope="col">Content</th>
                                <th scope="col">category</th>
                                <th scope="col">Management</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($wikis as $wiki): ?>
                                <tr>
                                    <!-- <th scope="row"><?= $wiki['wiki_id']; ?></th> -->
                                    <td><?= $wiki['titre']; ?></td>
                                    <td><?= $wiki['contenu']; ?></td>
                                    <td>
                                        <?php
                                        // Assuming you have a CategoryDAO class with a getCategoryById method
                                        $categoryDAO = new CategoryDAO();
                                        $category = $categoryDAO->getCatById($wiki['cat_id']);

                                        // Display category name if found, otherwise display 'Unknown' or handle it as needed
                                        echo $category ? $category['cat_name'] : 'Unknown';
                                        ?>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <form method="post" action="../controller/deleteWiki.php" class="mr-2">
                                                <input type="hidden" name="wiki_id" value="<?= $wiki['wiki_id']; ?>">
                                                <button type="submit" name="delete_wiki" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this wiki?')">Delete</button>
                                            </form>
                                            <a href="../view/modifyWiki.php?wiki_id=<?= $wiki['wiki_id']; ?>" class="btn btn-success">Modify</a>
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