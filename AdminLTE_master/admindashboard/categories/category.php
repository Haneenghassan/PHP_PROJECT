<?php 
  include "../../config/connect.php";
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["category_name"]) && isset($_POST['submit']) && isset($_FILES['file'])){
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    // echo "<pre>";
    // print_r($_FILES['file']);
    // echo "</pre>";
    $category_name=$_POST['category_name'];
    // upload Image
    $file = $_FILES['file'];
    
    $fileName = $file['name'];
    $fileSize = $file['size'];
    $fileType = $file['type'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];
    if($fileSize == 0){
      $query = "INSERT INTO categories SET category_name = :category_name";
      $statement= $db->prepare($query);
      $statement->bindValue(':category_name', $category_name);
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
                $query = "INSERT INTO categories SET category_img = :category_img, category_name = :category_name";
                $statement= $db->prepare($query);
                $statement->bindValue(':category_img', $fileNameNew);
                $statement->bindValue(':category_name', $category_name);
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

$query='SELECT * FROM categories ORDER BY id DESC';
$stmt= $db->prepare($query) ;
$stmt->execute();
$categories=$stmt->fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>";
// print_r($categories);
// echo "</pre>";
// foreach($categories as $i => $category){
//   echo $category['category_img'] ? $category['category_img'] : '../../upload/IMG-63afcc3a25fe13.93785975.png' . $i . "<br>";
//   echo "<br>";
//   echo "<br>";
//   echo "<br>";
// }
?>
<?php include "../../components/header.php" ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 w-75 m-auto">
          <div class="col-sm-6">
            <h1>Categories</h1>
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
              <div class="card-header">
                <h3 class="card-title">Add category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="category_name" placeholder="Enter Category">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Category Image</label>
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








          <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row w-75 m-auto">
          <!-- col start -->
          <?php foreach($categories as $category){ 
              $image = $category['category_img'];
              if($category['is_deleted'] == 1){
                continue;
              }
            ?>
          <div class="col-md-4">
            <!-- start -->
            <div class="card" style="">
              <img src="<?php echo $category['category_img'] ? "../../upload/$image" : '../../upload/IMG-63afcc3a25fe13.93785975.png';?>" height="200" class="card-img-top" alt="...">
              <div class="card-body">
                <h2 class="card-title" style="font-size: 1.6rem;"><?php echo $category['category_name'] ?></h2>
                <p class="card-text"></p>
                <div class="">
                <a href="http://localhost/PHP_PROJECT/AdminLTE_master/admindashboard/categories/Editcatogry.php?id=<?php echo $category['id'] ?>" class="btn btn-primary">Edit</a>
                <a href="http://localhost/PHP_PROJECT/AdminLTE_master/admindashboard/categories/deletecatecory.php?id=<?php echo $category['id'] ?>" class="btn btn-danger">Delete</a>
                </div>
              </div>
            </div>
            <!-- end -->
          </div>
          <?php } ?>
          <!-- col end -->
            <!-- /.card -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include  "../../components/footer.php" ?>
