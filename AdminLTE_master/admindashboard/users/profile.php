<?php 
require_once "../../config/connect.php";

session_start();
// print_r($_SESSION);
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

<?php include "../../components/header.php" ?>




             



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



<div class="container">

    <!-- <nav class="navbar navbar-expand navbar-white navbar-light"> -->
        <!-- Left navbar links -->
          <!-- About Me Box -->
          <div class="card card-primary d-flex justify-content-center" style="margin: 15%;">
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

  </div>


  <!-- FOOTER -->








  <!-- /.content-wrapper -->
  <footer class="main-footer" style="text-align: center;">
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