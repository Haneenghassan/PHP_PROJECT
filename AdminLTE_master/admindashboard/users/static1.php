<?php 

require_once "../../config/connect.php";

// most product selling in many orders
$query = "select product_id, count(quantity) 
from order_detials 
group by product_id 
order by count(quantity) desc 
limit 3";

$stmt= $db->prepare($query) ;
$stmt->execute();
$most_selling=$stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include "../../components/header.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
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
                <h3 class="card-title">Users Info</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0"> 
              <table class="table table-sm">
                <thead>
                  <tr>
                  <!-- <th scope="col">ID</th> -->
                    <th scope="col">Product ID</th>
                    <th scope="col">Quantity</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($most_selling as $sell){
                        
                    ?>

                    <tr>
                    
                        <!-- <th scope="row"><?PHP echo $user['id']?></th> -->
                        <td><?PHP echo $sell['product_id'] ?></td>
                        <td><?PHP echo $sell['count(quantity)']?></td>

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
