<?php 

require_once "../../config/connect.php";

$query='SELECT * FROM users';
$stmt= $db->prepare($query) ;
$stmt->execute();
$users=$stmt->fetchAll(PDO::FETCH_ASSOC);

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
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">address</th>
                    <th scope="col">phone</th>
                    <th scope="col">password</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($users as $user){
                        if($user['is_deleted'] == 1){
                            continue;
                        }
                    ?>

                    <tr>
                    
                        <!-- <th scope="row"><?PHP echo $user['id']?></th> -->
                        <td><?PHP echo $user['user_name'] ?></td>
                        <td><?PHP echo $user['user_email']?></td>
                        <td><?PHP echo $user['address'] ?></td>
                        <td><?PHP echo $user['phone'] ?></td>
                        <td><?PHP echo $user['password']?></td>
                        <td><?PHP echo $user['is_admin'] ?></td>

                        <td>
                            <a href="http://localhost/PHP_PROJECT/AdminLTE_master/admindashboard/users/profile.php?id=<?php echo $user['id']?>" class="btn btn-sm text-center"><i class="fas fa-user"></i></a>
                            <?php 
                                if($user['is_admin'] == 0){ 
                            ?>
                        <a href="http://localhost/PHP_PROJECT/AdminLTE_master/admindashboard/users/update_user.php?id=<?php echo $user['id'] ?>" class="btn btn-sm"><i class="fas fa-pencil-alt mr-1"></i></a>
                        <a href="http://localhost/PHP_PROJECT/AdminLTE_master/admindashboard/users/delete_user.php?id=<?php echo $user['id']?>" class="btn btn-sm text-danger"><i class="fas fa-trash"></i></a>
                            <?php }?>
                    
                    </td>
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
