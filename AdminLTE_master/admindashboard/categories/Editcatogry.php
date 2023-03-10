<?php 
  require_once "../../config/connect.php";
  
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["category_name"]) && isset($_POST['submit']) && isset($_FILES['file'])){
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    // echo "<pre>";
    // print_r($_FILES['file']);
    // echo "</pre>";
    $category_name=$_POST['category_name'];
    // upload Image
    $file = $_FILES['file'];
    // get id from url
    $id = $_GET['id'];
    $fileName = $file['name'];
    $fileSize = $file['size'];
    $fileType = $file['type'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];
    if($fileSize == 0){
      $query = "UPDATE categories SET category_name = :category_name WHERE id = :id";
      $statement= $db->prepare($query);
      $statement->bindValue(':category_name', $category_name);
      $statement->bindValue(':id', $id);
      if($statement->execute()){
        header("location: category.php");
      }
    }else{
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 10000000){
                $fileNameNew = uniqid('IMG-', true). "." . $fileActualExt;
                $fileDestination = '../../upload/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $msg = "uploadsuccess";
                $query = "UPDATE categories SET category_img = :category_img, category_name = :category_name WHERE id = :id";
                $statement= $db->prepare($query);
                $statement->bindValue(':category_img', $fileNameNew);
                $statement->bindValue(':category_name', $category_name);
                $statement->bindValue(':id', $id);
                
                if($statement->execute()){
                  header("location: category.php");
                }
            }else{
                echo "your file is too big!";
            }
        }else{
            echo "there was an error uploading your file!";
        }
    }else{
        echo "You can not upload files of this type!";
    }
  }
  }

$query='SELECT * FROM categories ORDER BY id DESC';
$stmt= $db->prepare($query) ;
$stmt->execute();
$categories=$stmt->fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>";
// print_r($categories);
// echo "</pre>";
// foreach($categories as $i => $category){
//   echo $category['category_img'] ? $category['category_img'] : '../../upload/IMG-63afcc3a25fe13.93785975.png' . $i . "<br>";
//   echo "<br>";
//   echo "<br>";
//   echo "<br>";
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Users</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini vh-100">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost/PHP_PROJECT/index.php" class="nav-link">Home</a>
      </li>
    
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

        <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>



  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Home Power</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        
          <img src='../../dist/img/user2-160x160.jpg' class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"></a>
        </div>
      </div> -->

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="http://localhost/PHP_PROJECT/AdminLTE_master/admindashboard/users/users.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="http://localhost/PHP_PROJECT/AdminLTE_master/admindashboard/categories/category.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="http://localhost/PHP_PROJECT/AdminLTE_master/admindashboard/products/product.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Products</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="http://localhost/PHP_PROJECT/AdminLTE_master/admindashboard/users/static.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
              Populer Products
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="http://localhost/PHP_PROJECT/AdminLTE_master/admindashboard/users/static1.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
              Populer Orders
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="http://localhost/PHP_PROJECT/AdminLTE_master/admindashboard/users/static2.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
              Populer Custemors
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>


            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  


      








                <!-- Main content -->
    <section class="content "  style="margin-left: 10%;">
      <div class="container-fluid me-4">
        <div class="row w-75 m-auto">
        <div class="col-md-12 mt-3">
         <h1>Edit Category</h1>
        </div>
          <!-- col start -->
          
          <div class="col-md-12 mt-5 ">
            <!-- start -->
              <!-- general form elements -->
      <div class="card card-primary ">
              <div class="card-header">
                <h3 class="card-title">Add category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="category_name" placeholder="Enter Category">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Category Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            <!-- end -->
          </div>
          <!-- col end -->
            <!-- /.card -->
        </div>
      </div><!-- /.container-fluid -->
    
    </section>
    <!-- /.content -->




  <!-- /.content-wrapper -->
  <footer class="main-footer" style="margin-top: 7%;">
    <div class="float-right d-none d-sm-block">
     
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
