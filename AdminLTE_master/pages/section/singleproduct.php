<?php require_once('./connect.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
$id = $_GET['id'];


$query='SELECT * FROM products WHERE id= :id';
$stmt= $db->prepare($query) ;
$stmt->bindValue(':id', $id);
$stmt->execute();
$products=$stmt->fetchAll(PDO::FETCH_ASSOC);




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
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">

<style>
  body{background-color: white}
  .card{border:none}
  .product{background-color: #eee}.brand{font-size: 13px}.act-price{color:red;font-weight: 700}.dis-price{text-decoration: line-through}.about{font-size: 14px}.color{margin-bottom:10px}label.radio{cursor: pointer}label.radio input{position: absolute;top: 0;left: 0;visibility: hidden;pointer-events: none}label.radio span{padding: 2px 9px;border: 2px solid #ff0000;display: inline-block;color: #ff0000;border-radius: 3px;text-transform: uppercase}label.radio input:checked+span{border-color: #ff0000;background-color: #ff0000;color: #fff}.btn-danger{background-color: #ff0000 !important;border-color: #ff0000 !important}.btn-danger:hover{background-color: #da0606 !important;border-color: #da0606 !important}.btn-danger:focus{box-shadow: none}.cart i{margin-right: 10px}
  </style>

</head>
<body>

<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                    <?php
      foreach($products as $product) { ?>
                        <div class="images p-3">
                            <div class="text-center p-4"> <img id="main-image" src="./AdminLTE_master/upload/<?php echo $product['product_img']; ?>" width="250" /> </div>
                            <div class="thumbnail text-center"> <img onclick="change_image(this)" src="./AdminLTE_master/upload/<?php echo $product['product_img']; ?>" width="70"> <img onclick="change_image(this)" src="./AdminLTE_master/upload/<?php echo $product['product_img']; ?>" width="70"> </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i> <span class="ml-1">Back</span> </div> <i class="fa fa-shopping-cart text-muted"></i>
                            </div>
                            <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">
                              category name
                          </span>
                                <h5 class="text-uppercase"><?PHP echo $product['product_name']?></h5>
                                <div class="price d-flex flex-row align-items-center"> <span class="act-price"><?PHP echo $product['price'] ?></span>
                                    <div class="ml-2"> <small class="dis-price">20</small> <span>40% OFF</span> </div>
                                </div>
                            </div>
                            <p class="about"><?PHP echo $product['product_desc'] ?></p>
                            <div class="sizes mt-5">
                                <h6 class="text-uppercase">Size</h6> <label class="radio"> <input type="radio" name="size" value="S" checked> <span>S</span> </label> <label class="radio"> <input type="radio" name="size" value="M"> <span>M</span> </label> <label class="radio"> <input type="radio" name="size" value="L"> <span>L</span> </label> <label class="radio"> <input type="radio" name="size" value="XL"> <span>XL</span> </label> <label class="radio"> <input type="radio" name="size" value="XXL"> <span>XXL</span> </label>
                            </div>
                            <div class="cart mt-4 align-items-center"> <button class="btn btn-danger text-uppercase mr-2 px-4">Add to cart</button> <i class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }?>

<!-- code for acount how much order in our website -->

<div>
   
   
    <p >order number of products </p>
    <?php
    $stmt =$db->prepare('SELECT COUNT(id) AS totalRows FROM order_list '); 
    $stmt->execute(); 
    $row = $stmt->fetch(PDO::FETCH_ASSOC); 
    $totalRows = $row['totalRows'];
    
   echo $totalRows;
    ?>
      </div>

      <!-- code for acount how much users in our website -->
      <div>
   
   
    <p > number of users  </p>
    <?php
    $stmt =$db->prepare('SELECT COUNT(id) AS totalRows FROM users '); 
    $stmt->execute(); 
    $row = $stmt->fetch(PDO::FETCH_ASSOC); 
    $totalRows = $row['totalRows'];
    
   echo $totalRows;
    ?>
      </div>

      <!-- code for acount how much products in our website -->
      <div>
   
   
    <p > number of products  </p>
    <?php
    $stmt =$db->prepare('SELECT COUNT(id) AS totalRows FROM products '); 
    $stmt->execute(); 
    $row = $stmt->fetch(PDO::FETCH_ASSOC); 
    $totalRows = $row['totalRows'];
    
   echo $totalRows;
    ?>

     <!-- code for acount how much price after account -->
      </div>

      <p >discount </p>
    <?php
    $stmt =$db->prepare('SELECT price FROM products WHERE id= :id'); 
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $products= $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo $product['price'] - ($product['price'] * (50/100));
    
    
    ?>
      </div>
     

</body>
</html>