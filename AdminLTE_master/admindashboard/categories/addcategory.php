<?php
require_once "../../config/connect.php";

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"]) && isset($_POST["categories_img"])){
    $name=$_POST['name'];
    $categories_img=$_POST['categories_img'];

$query = 'INSERT INTO categories SET name = :name,categories_img = :categories_img';
$statement=$db->prepare($query);
$statement->bindValue(':name', $name);
$statement->bindValue(':categories_img', $categories_img);
$statement->execute();
header("Location: http://localhost/AdminLTE-master/pages/tables/catogerytable.php");

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

</head>
<body>
  <?php


if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"])){
    $name=$_POST['name'];
    $categories_img=$_POST['categories_img'];

$query = 'INSERT INTO categories SET name = :name,categories_img = :categories_img';
$statement=$db->prepare($query);
$statement->bindValue(':name', $name);
$statement->bindValue(':categories_img', $categories_img);
$statement->execute();
header("Location: http://localhost/AdminLTE-master/pages/tables/catogerytable.php");

}
?>
    <h1>Manage The categories</h1>
<form method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">catogery Name:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">categories img:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="categories_img">
  </div>
  
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

</body>
</html>