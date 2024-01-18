<?php
    include_once '../controller/tag.contr.php';
    include_once '../controller/count.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tags</title>

    
    
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
                <a class="nav-link" href="admin_category.php">
                    <span>Categories </span></a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="admin_tag.php">
                    <span> Tags</span></a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="admin_wiki.php">
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


                    <?php
                    if (isset($_SESSION['error'])) {
                        echo '<div class="alert alert-danger" role="alert">';
                        echo $_SESSION['error'];
                        echo '</div>';

                        // Clear the error message to prevent displaying it again on page reload
                        unset($_SESSION['error']);
                    }
                    ?>
                    <div class="row mb-5">
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Categories</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $categoryCount  ; ?></div>
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
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $tagCount?></div>
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
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $wikiCount?></div>
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
                    

                    <div class="container w-75 m-auto">
                    


                    <div class="container m-auto">

                    <form method="post" action="../controller/tag.contr.php" enctype="multipart/form-data" onsubmit="return validateForm()">
                        <?php
                        $tag_id = isset($_GET['tag_id']) ? $_GET['tag_id'] : null;
                        $tag = $tagsOBJ->getTagById($tag_id);
                        ?>

                        <input type="hidden" name="tag_id" value="<?= $tag['tag_id']; ?>">

                        <div class="form-outline mb-4">
                            <label class="form-label" for="tagName">Tag name</label>
                            <input type="text" id="tagName" class="form-control" name="tagName" value="<?= $tag['tag_name']; ?>" required>
                            <div id="tagNameError" class="text-danger"></div> <!-- Error message container -->
                        </div>

                        <button type="submit" class="btn btn-success btn-block w-25 mb-4" name="update">Modify Tag</button>
                    </form>

                   


                </div>


 
                </div>
            </div>
            
            <footer class="sticky-footer bg-white mt-5">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; wikizone 2024</span>
                    </div>
                </div>
            </footer>


        </div>


    </div>
        
    <script>
        function validateForm() {
            var tagNameInput = document.getElementById('tagName');
            var tagNameValue = tagNameInput.value.trim();
            var tagNameError = document.getElementById('tagNameError');

            var regex = /^#/;

            if (!regex.test(tagNameValue)) {

                tagNameError.innerText = 'Tag name must begin with #';
                return false; 
            } else {
                tagNameError.innerText = '';
            }

            return true;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>