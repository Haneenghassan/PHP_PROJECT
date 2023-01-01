<?php 
require_once "../../config/connect.php";
    $id = $_GET['id'];
    $query='SELECT * FROM users WHERE id= :id';
    $stmt=$db->prepare($query);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $user=$stmt->fetch(PDO::FETCH_ASSOC);
   
    $image = $user['image_url'];
    if($image){
        $image = "../../upload/$image";
    }else{
        $image = "../../dist/img/user4-128x128.jpg";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profile</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini" style="background-color: #eee;">

    <nav class="navbar navbar-expand navbar-white navbar-light">
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

<section class="content">
    <div class="container-fluid">
      <div class="row mt-3">
        <div class="col-md-6 m-auto">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img width="200px" class="profile-user-img img-fluid img-circle"
                     src="<?php echo $image ?>"
                     
                     alt="User profile picture">
              </div>

              <h3 class="profile-username text-center"><?php echo $user['user_name'] ?></h3>

              <p class="text-muted text-center"><?php echo $user['is_admin'] ? 'super user' : 'user' ?></p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Orders</b> <a class="float-right">14</a>
                </li>
                <li class="list-group-item">
                  <b>Reviews</b> <a class="float-right">5</a>
                </li>
              </ul>

              <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">About Me</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <strong><i class="fas fa-envelope"></i>  Email</strong>

              <p class="text-muted"><?php echo $user['user_email'] ?></p>

              <hr>

              <strong><i class="fas fa-lg fa-building"></i>  Address</strong>

              <p class="text-muted"><?php echo $user['address'] ?></p>

              <hr>

              <strong><i class="fas fa-lg fa-phone"></i>  Phone</strong>

              <p class="text-muted"><?php echo $user['phone'] ?></p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

  <footer class="main-footer" style="margin-left: 0;">
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