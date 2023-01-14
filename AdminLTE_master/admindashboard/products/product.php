<?php 
  require_once "../../config/connect.php";
  // echo "price" . $price . "<br>";
  // echo "discount " . $discount . "<br>";
  // echo "price after" . $price_after . "<br>";
  // echo "<pre>";
  // print_r($_POST);
  // echo "</pre>";
  $display = true;
  if(isset($_POST["display"])){
    $display = false;
  }
  if(isset($_GET["display"])){
    $display = $_GET["display"];
  }

  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["product_name"]) && isset($_POST['submit']) && isset($_FILES['file'])){
    // echo "<pre>";
      // print_r($_POST);
      // echo "</pre>";
      // var_dump($display);

    //   echo "<pre>";
    //   print_r($_FILES['file']);
    //   echo "</pre>";
      $price = $_POST['price'];
      $discount = $_POST['discount'];
      if($discount){
        $discount = substr($discount, -3, 2);
        $price_after = $price - (($discount / 100) * $price);
      }else{
        $price_after = $price;
        $discount = null;
      }
      
    $product_name=$_POST['product_name'];
    $product_desc=$_POST['product_desc'];
    $category_id=$_POST['category_id'];
    $query='SELECT * FROM categories WHERE category_name = :category_name';
    $stmt= $db->prepare($query) ;
    $stmt->bindValue(':category_name', $category_id);
    $stmt->execute();
    $category_id=$stmt->fetch(PDO::FETCH_ASSOC)['id'];
    
    // upload Image
    $file = $_FILES['file'];
    
    $fileName = $file['name'];
    $fileSize = $file['size'];
    $fileType = $file['type'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];
    if($fileSize == 0){
      $query = "INSERT INTO products SET product_name = :product_name, product_desc = :product_desc, category_id = :category_id, price = :price, discount = :discount, price_after = :price_after";
      $statement= $db->prepare($query);
      $statement->bindValue(':product_name', $product_name);
      $statement->bindValue(':product_desc', $product_desc);
      $statement->bindValue(':category_id', $category_id);
      $statement->bindValue(':discount', $discount);
      $statement->bindValue(':price_after', $price_after);
      $statement->bindValue(':price', $price);
      // $statement->bindValue(':category_name', $category_name);
      $statement->execute();
    }else{
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 10000000){
                $fileNameNew = uniqid('IMG-', true). "." . $fileActualExt;
                $fileDestination = '../../upload/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $msg = "uploadsuccess";
                $query = "INSERT INTO products SET product_img = :product_img, product_name = :product_name, product_desc = :product_desc, category_id = :category_id, price = :price, discount = :discount, price_after = :price_after";
                $statement= $db->prepare($query);
                $statement->bindValue(':product_img', $fileNameNew);
                $statement->bindValue(':product_name', $product_name);
                $statement->bindValue(':product_desc', $product_desc);
                $statement->bindValue(':category_id', $category_id);
                $statement->bindValue(':discount', $discount);
                $statement->bindValue(':price_after', $price_after);
                $statement->bindValue(':price', $price);
                $statement->execute();
                // header("location: users.php");
            }else{
                echo "your file is too big!";
            }
        }else{
            echo "there was an error uploading your file!";
        }
    }else{
        echo "You can not upload files of this type!";
    }
  }
  }



// echo "<pre>";
// print_r($categories);
// echo "</pre>";

?>
<?php include "../../components/header.php" ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 w-75 m-auto">
          <div class="col-sm-6">
            <h1>products</h1>
          </div>
          <div class="col-sm-6">
            <!-- right side -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



      








                <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row w-75 m-auto">
          <!-- col start -->
          
          <div class="col-md-12 ">
            <!-- start -->
              <!-- general form elements -->
      <div class="card card-primary">
              <div class="card-header text-center">
                <a href="./show.php"><h3 class="card-title text-center" id="showPorductContainer">Add product</h3></a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="http://localhost/PHP_PROJECT/AdminLTE_master/admindashboard/products/product.php" method="post" enctype="multipart/form-data" id="porductContainer" style="<?php echo $display ? "display:block" : "display:none" ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">product Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="product_name" placeholder="Enter product">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">product Description</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="product_desc" placeholder="Enter product">
                  </div>
                  <div class="form-group">
                    <!-- <label for="exampleInputEmail1">product Description</label> -->
                    <input type="hidden" class="form-control" id="exampleInputEmail1" name="display" value="true">
                  </div>
                  
                  <div class="form-group">
                  <label>product category</label>
                  <select class="form-control select2" name="category_id" style="width: 100%;">
                    <!-- <option selected="selected">select category</option> -->
                  <?php
                    $query='SELECT * FROM categories ORDER BY id DESC';
                    $stmt= $db->prepare($query) ;
                    $stmt->execute();
                    $categories=$stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($categories as $category){
                      if($category['is_deleted'] == 1){
                        continue;
                      }
                  ?>
                    <option><?php echo $category['category_name'] ?></option>
                    
                    <?php } ?>
                  </select>
                </div>
                  <div class="form-group">
                    <label for="exampleInputFile">product Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-4">
                    <label>price</label>
                      <input type="text" class="form-control" name="price" placeholder="price">
                    </div>
                    <div class="col-4">
                    <label>Discount</label>
                  <select class="form-control select2" name="discount" style="width: 100%;">
                    <!-- <option selected="selected">select category</option> -->
                    <option selected></option>
                    <option >10%</option>
                    <option >20%</option>
                    <option >30%</option>
                    <option >40%</option>
                    <option >50%</option>
                    <option >75%</option>
                  </select>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Add</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            <!-- end -->
          </div>
          <!-- col end -->
            <!-- /.card -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


    <div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
            <?php
              $query='SELECT * FROM products ORDER BY id DESC';
              $stmt= $db->prepare($query) ;
              $stmt->execute();
              $products=$stmt->fetchAll(PDO::FETCH_ASSOC);
              foreach($products as $product){ 
                $query='SELECT category_name FROM categories WHERE id = :id';
                $stmt= $db->prepare($query) ;
                $stmt->bindValue(':id', $product['category_id']);
                $stmt->execute();
                $cate_name=$stmt->fetch(PDO::FETCH_ASSOC);
                // print_r($product);
                  $image = $product['product_img'];
                  if($product['is_deleted'] == 1){
                    continue;
                  }
            ?>
            <div class="row p-2 bg-white border rounded mt-2">
                <div class="col-md-3 mt-1"><img style="height: 150px;" class="img-fluid img-responsive rounded product-image" src="<?php echo $product['product_img'] ? "../../upload/$image" : '../../upload/IMG-63b231ba9e91b1.73564146.png';?>"></div>
                <div class="col-md-6 mt-1">
                    <h4><?php echo $product['product_name']; ?></h4>
                    <div class="d-flex flex-row">
                        <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span>110</span>
                    </div>
                    <!-- <div class="mt-1 mb-1 spec-1"><span>100% cotton</span><span class="dot"></span><span>Light weight</span><span class="dot"></span><span>Best finish<br></span></div> -->
                    <h5 class="mt-1 mb-1 spec-1"><?php echo $cate_name['category_name'] ?></h5>
                    <p class="text-justify text-truncate para mb-0"><?php echo $product['product_desc']; ?>.<br><br></p>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class="d-flex flex-row align-items-center">
                      <?php if($product['price_after'] != $product['price']){ ?>
                        <h4 class="mr-1">$<?php echo $product['price_after']?></h4><span class="strike-text" style="text-decoration: line-through">$<?php echo $product['price']?></span>
                      <?php }else{ ?>
                        <h4 class="mr-1">$<?php echo $product['price_after']?></h4>
                      <?php } ?>
                    </div>
                    <h6 class="text-success">Delviery On cash</h6>
                    <div class="d-flex flex-column mt-4"><a href="http://localhost/PHP_PROJECT/AdminLTE_master/admindashboard/products/Editproduct.php?id=<?php echo $product['id'] ?>" class="btn btn-outline-primary btn-sm" >Edit</a><a href="http://localhost/PHP_PROJECT/AdminLTE_master/admindashboard/products/deleteproduct.php?id=<?php echo $product['id'] ?>" class="btn btn-outline-danger btn-sm mt-2" >Delete</a></div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>



          <!-- Main content -->
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- /.content-wrapper -->
  <footer class="main-footer"  style="">
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
<script src="./product.js"></script>
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
