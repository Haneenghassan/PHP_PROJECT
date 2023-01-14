<?php
require_once "../../config/connect.php";
$nameErr = "";
$emailErr = "";
$erorrs = [];

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["user_name"])  && isset($_POST["address"]) && isset($_POST["phone"]) && isset($_POST["user_email"]) && isset($_POST['submit']) && isset($_FILES['file'])){
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    // exit;
    $user_name=$_POST['user_name'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $user_email=$_POST['user_email'];
    $id = $_GET['id'];


    // upload Image
    $file = $_FILES['file'];
    
    $fileName = $file['name'];
    $fileSize = $file['size'];
    $fileType = $file['type'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
    if(in_array($fileActualExt, $allowed)){

        if($fileError === 0) {
            if($fileSize < 10000000){
                $fileNameNew = uniqid('IMG-', true). "." . $fileActualExt;
                $fileDestination = '../../upload/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $msg = "uploadsuccess";
                $query = "UPDATE users SET image_url = :image_url WHERE id = :id";
                $statement=$db->prepare($query);
                $statement->bindValue(':image_url', $fileNameNew);
                $statement->bindValue(':id', $id);
                $statement->execute();
                header("location: users.php");
            }else {
                echo "your file is too big!";
            }
        }else{
            echo "there was an error uploading your file!";
        }
    }else{
        echo "You can not upload files of this type!";
    }


        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$user_name)) {
          $nameErr = "Only letters and white space allowed";
          $erorrs["user_name"] = "Enter Your first name";
        }
          
          if (!preg_match("/^(\+?){1}\d{14}$/",$phone)) {
          $erorrs["phone"] = "Enter Your phone number";
          }

        // check if e-mail address is well-formed
        if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
            $erorrs["user_email"] = "Enter Your user_email";
        }
        

    //   print_r($erorrs);
// UPDATE USERS
if(empty($erorrs)){
    $query = 'UPDATE users SET user_name = :user_name, address = :address, phone = :phone, user_email = :user_email  WHERE id = :id';
    $statement=$db->prepare($query);
    $statement->bindValue(':user_name', $user_name);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':user_email', $user_email);
    $statement->bindValue(':id', $id);

if($statement->execute()){
    header("Location: users.php");
    echo "success";
}
}
    

}


// ^(([0-9]{2})\/)+(([0-9]{2})\/)+([0-9]{4})$
?>
  


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <style>
  .error {color: #FF0000;}
  </style>

</head>
<body class="hold-transition sidebar-mini">
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
  <!-- /.navbar -->

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
  <body>

    <div class="container">
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header  mt-3">
      <div class="container-fluid  ">
        <div class="row m-auto bg-primary">
          <div class="col-sm-6 ">
            <h1>Update</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<form action="" method="post" enctype="multipart/form-data" style="margin: 0 2%;">
<div class="mb-3">
        <input type="file" name="file">
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">First Name:</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Write the First Name" name="user_name">
  <p class="error">
    <?php echo $erorrs['user_name'] ?? null;?>
</p>
</div>



<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Address:</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Write Address" name="address">
  <p class="error"><?php echo $erorrs['address'] ?? null;?></p>

</div>


<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">phone:</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Write the phone Number" name="phone">
  <p class="error"><?php echo $erorrs['phone'] ?? null;?></p>
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email:</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Write the Email" name="user_email">
  <p class="error"><?php echo $erorrs['user_email'] ?? null;?></p>
</div>





<div class="mb-3">
  <!-- <input type="submit" class="btn btn-primary"> -->
  <button type="submit" class="btn btn-primary" name="submit">submit</button>
</div>
</form>

  </div>
    </div>
 

      <!-- /.content-wrapper -->
  <footer class="main-footer">
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