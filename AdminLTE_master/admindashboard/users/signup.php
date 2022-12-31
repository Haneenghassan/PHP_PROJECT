<?php 
require_once "../../config/connect.php";
$erorrs = [];
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["user_name"]) && isset($_POST["user_email"]) && isset($_POST["address"])&& isset($_POST["password"]) && isset($_POST["confirm"])){
    $user_name=$_POST['user_name'];
    $user_email=$_POST['user_email'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $confpassword=$_POST['confirm'];

        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$user_name)) {
          $erorrs["user_name"] = "Enter Your first name";
        }
          if (!preg_match("/^(\+?){1}\d{14}$/",$phone)) {
          $erorrs["phone"] = "Enter Your mobile number";
          }

        // check if e-mail address is well-formed
        if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
            $erorrs["user_email"] = "Enter Your email";
        }

        if (!preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/",$password)) {
            $erorrs["password"] = "Enter Your password";
          }
        if($password != $confpassword){
            $erorrs["confirm"] = "your password didn't match";
        }
    //   print_r($erorrs);
        // exit;
      if(empty($erorrs)){
        $query = 'INSERT INTO users SET user_name = :user_name, user_email = :user_email, phone = :phone, password = :password, address = :address';
$statement=$db->prepare($query);
$statement->bindValue(':user_name', $user_name);
$statement->bindValue(':user_email', $user_email);
$statement->bindValue(':phone', $phone);
$statement->bindValue(':password', $password);
$statement->bindValue(':address', $address);


$statement->execute();

header("Location:http://localhost/PHP_PROJECT/AdminLTE_master/admindashboard/users/login.php");

}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>sign up</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>sign</b>up</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full name" name="user_name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <p class="text-danger"><?php echo $erorrs['user_name'] ?? null;?></p>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="user_email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <p class="text-danger"><?php echo $erorrs['user_email'] ?? null;?></p>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Phone" name="phone">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <p class="text-danger"><?php echo $erorrs['phone'] ?? null;?></p>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="address" name="address">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-home"></span>
              <!-- <i class="fa-sharp fa-solid fa-location-dot"></i> -->
            </div>
          </div>
        </div>
        <p class="text-danger"><?php echo $erorrs['address'] ?? null;?></p>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <p class="text-danger"><?php echo $erorrs['password'] ?? null;?></p>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password" name="confirm">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <p class="text-danger"><?php echo $erorrs['confirm'] ?? null;?></p>
        <div class="social-auth-links text-center">
          <input type="submit" class="btn btn-block btn-primary" value="register">
        </div>
       
      </form>

      
        <p class="text-center">- OR -</p>

      <a href="login.html" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
