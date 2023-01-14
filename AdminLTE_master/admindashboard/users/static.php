<?php 

require_once "../../config/connect.php";


// 3 most selling products

$query = "select product_id,sum(quantity) 
from order_detials 
group by product_id 
order by sum(quantity) desc 
limit 3";

$stmt= $db->prepare($query) ;
$stmt->execute();
$most_selling=$stmt->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// print_r($most_selling);
// echo '</pre>';
?>

<?php include "../../components/header.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>3 most selling products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
              <li class="breadcrumb-item active"></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">products Info</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0"> 
              <table class="table table-sm">
                <thead>
                  <tr>
                  <!-- <th scope="col">ID</th> -->
                  <th scope="col">Product image</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Product price</th>
                    <th scope="col">category name</th>
                    <th scope="col">Quantity</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($most_selling as $sell){
                      $id = $sell['product_id'];
                      $query='SELECT * FROM products inner join categories on category_id = categories.id WHERE products.id = :id';
                      $stmt=$db->prepare($query);
                      $stmt->bindValue(':id', $id);
                      $stmt->execute();
                      $product=$stmt->fetch(PDO::FETCH_ASSOC);
                    ?>

                    <tr>
                    
                        <!-- <th scope="row"><?PHP echo $user['id']?></th> -->
                        <td><img width="100" src="../../upload/<?PHP echo  $product['product_img'] ?>" alt=""></td>
                        <td style="line-height: 100px"><?PHP echo  $product['product_name'] ?></td>
                        <td style="line-height: 100px">$ <?PHP echo  $product['price_after'] ?></td>
                        <td style="line-height: 100px"><?PHP echo  $product['category_name'] ?></td>
                        <td style="line-height: 100px"><?PHP echo $sell['sum(quantity)']?></td>
                    </tr>
                    <?php }?>
                
                
                
                </tbody>
              </table>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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
