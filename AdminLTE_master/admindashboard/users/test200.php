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
    
    $fileName = $file['name'];
    $fileSize = $file['size'];
    $fileType = $file['type'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];
    if($fileSize == 0){
      $query = "INSERT INTO categories SET category_name = :category_name";
      $statement= $db->prepare($query);
      $statement->bindValue(':category_name', $category_name);
      $statement->execute();
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
                $statement->execute();
                // header("location: users.php");
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
  <nav class=" navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
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
  <!-- /.navbar -->



  <!-- Content Wrapper. Contains page content -->
  


      








                <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row w-75 m-auto">
        <div class="col-md-12 mt-3">
         <h1>Edit Category</h1>
        </div>
          <!-- col start -->
          
          <div class="col-md-12 mt-5">
            <!-- start -->
              <!-- general form elements -->
      <div class="card card-primary">
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
                  <button type="submit" name="submit" class="btn btn-primary">Add</button>
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
  <footer class="" style="position: absolute; bottom:5%;">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
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
