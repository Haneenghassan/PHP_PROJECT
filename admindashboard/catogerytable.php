

<?php 
require_once('./connect.php');
$query='SELECT * FROM categories';
$stmt= $db->prepare($query) ;
$stmt->execute();
$categories=$stmt->fetchAll(PDO::FETCH_ASSOC);

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
<div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Bordered Table</h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
              <a href="./add.php"  type="button" class="btn btn-outline-warning">+ ADD CATEGORY</a>
             
                <table class="table table-bordered mt-3">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Catogery Name</th>
                      <th>Catogery image</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
        foreach($categories as $category) { ?>
                    <tr>
                    <td><?PHP echo $category['id'] ?></td>
                    <td><?PHP echo $category['name']?></td>
                      <td>
                      <img src="..." class="rounded mx-auto d-block" alt="...">
                      </td>
                      <td>
                      <a href="update.php?id=<?php echo $category['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>

                     <form method="post" action="delete.php" style="display: inline-block">
                     <input  type="hidden" name="id" value="<?php echo $category['id'] ?>"/>
                     <a href="delete.php?id=<?php echo $category['id'] ?>" class="btn btn-sm btn-outline-primary">Delete</a>
                    </td>
        </tr>
        <?php }?>
                    </form>
                  </tbody>
                </table>
              </div>
            
            </div>
            <!-- /.card -->

           
          <script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>