<?php 
    require_once "../../config/connect.php";
    session_start();
    $password = $_POST["password"] ?? null;
    $user_email = $_POST["user_email"] ?? null;
    $query='SELECT * FROM users WHERE password= :password and user_email = :user_email';
    $stmt=$db->prepare($query);
    $stmt->bindValue(':password', $password);
    $stmt->bindValue(':user_email', $user_email);
    $stmt->execute();
    $user=$stmt->fetch(PDO::FETCH_ASSOC);
    
    // Shaima1234
    // shaima.alshlouh@gmail.com
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";
    
    // echo "<pre>";
    // var_dump($user);
    // echo "</pre>";
    // echo "<pre>";
    // echo is_array($user) . "16";
    
    if(is_array($user) && !empty($_POST)){
        $d = date("Y-m-d");
    
        // $query = "UPDATE users SET datelastLogin = :d WHERE password = :password";
        // $stmt=$db->prepare($query);
        // $stmt->bindValue(':d', $d);
        // $stmt->bindValue(':password', $password);
        // $stmt->execute();
        $_SESSION['user_id'] = $user['id'];
        if($user["is_admin"] == 1){
            header("Location:http://localhost/PHP_PROJECT/AdminLTE_master/admindashboard/users/users.php");
        }else{
            // echo "hello " . $user["user_name"] . "<br>";
            header("Location:http://localhost/PHP_PROJECT/index.php");
            
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Sign</b>in</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="user_email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="social-auth-links text-center">
          <input type="submit" class="btn btn-block btn-primary" value="Login">
        </div>
      </form>

        <p class="text-center">- OR -</p>


        <p class="mb-0">
        <a href="./signup.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
