<?php
require_once('./connect.php');

$id = $_GET['id'];

$query='SELECT * FROM categories WHERE id= :id';
$stmt=$db->prepare($query);
$stmt->bindValue(':id', $id);
$stmt->execute();
$categories=$stmt->fetch(PDO::FETCH_ASSOC);

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"]) && isset($_POST["categories_img"])){
    $name=$_POST['name'];
    $categories_img=$_POST['categories_img'];

    $query = 'UPDATE categories SET name = :name,categories_img = :categories_img WHERE id= :id';
$statement=$db->prepare($query);
$statement->bindValue(':id', $id);
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
  <div class="container">
  <div class="container-fluid text-center"  style="margin-top:9%">
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header " style="background-color:#adb5bd">
                <h1 class="card-title " style="margin-left: 40% ; font-size:2.2rem">Edit Categories </h1>
              </div>
<form method="POST" enctype="multipart/form-data">
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">catogery Name:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">categories img:</label>
    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="categories_img">
  </div>
  
  <button type="submit" class="btn btn-primary" value="Upload">Submit</button>
</form>


</div>

<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>