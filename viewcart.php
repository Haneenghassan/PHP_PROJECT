<?php 
include './AdminLTE_master/config/connect.php';
session_start ();

if($_SERVER["REQUEST_METHOD"] == "POST"){ 
    $_SESSION['cart'][$_POST['pro_id']]['qty'] = $_POST['qty'];
        if($_POST['qty'] == 0){ 
        unset($_SESSION['cart'][$_POST['pro_id']]);
            if(count($_SESSION['cart']) <= 0){
                header("location: index.php");
            }
            // echo "<pre>";
            // print_r($products);
            // echo "</pre>";
            // echo "<pre>";
            // print_r($_SESSION['cart']);
            // echo "</pre>";
        }
    }
if (isset($_SESSION['cart']) && count($_SESSION['cart']) >0){
$keys = array_keys($_SESSION['cart']);
$whereIn = implode(',', $keys);
$query = "SELECT * FROM products WHERE id IN ($whereIn)";
$stmt= $db->prepare($query);
$stmt->execute();
$products=$stmt->fetchAll(PDO::FETCH_ASSOC);
}else{
    header("location: index.php");
}


// if (isset($_GET['id'])) {
//     $proid = $_GET['id'];
  
//     unset($_SESSION['cart'][$proid]);
//     header("location: viewcart.php");
//   };
// echo "<pre>";
// // echo 
// echo "</pre>";
?>



    
    <!DOCTYPE html>
    <html lang="en">
        
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content=" Smart Home specialized processing IP & software tools for the development of smart home devices. Develop scalable and energy-efficient home automation and connectivity system on smart home. ">
            <meta name="author" content=" Team 4">
            <meta name=" Keyword " content=" control , e-commerce , system , Smart , new ">
            <meta name="Copyright" content=" Orange Coding Academy . Designed by Team 4  ">
            <meta name="refresh" content=" 3 ">
            <link rel="stylesheet" href="./viewcss.css">
  <title> Power Home  </title>


    <!--
    - BOOTSTRAP
  -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


  <!--
    - favicon
  -->
  <link rel="shortcut icon" href="./assets/images/logo/logo.png" type="image/x-icon">

  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style-prefix.css">

  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

</head>

<body>

  <!--
    - HEADER
  -->

  <header>



    <div class="header-main">
      <div class="container">
        <a href="#" class="header-logo">
          <img src="./assets/images/logo/logo.png" alt="power home logo" width="55" height="55">
        </a>
        <div>
          <nav class="desktop-navigation-menu">
            <div class="container">
              <ul class="desktop-menu-category-list">
      
                <li class="menu-category">
                  <a href="http://localhost/PHP_PROJECT/index.php" class="menu-title">Home</a>
                </li>
      
                <li class="menu-category">
                  <a href="#Cat" class="menu-title">Categories</a>
      
                  <div class="dropdown-panel">
                    <ul class="dropdown-panel-list">
                      <li class="menu-title">
                        <a href="http://localhost/PHP_PROJECT/display.php?category=light"> Light</a>
                      </li>
                      <li class="menu-title">
                        <a href="http://localhost/PHP_PROJECT/display.php?category=security"> Security</a>
                      </li>
                      <li class="menu-title">
                        <a href="http://localhost/PHP_PROJECT/display.php?category=kitchen"> Kitchen</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="menu-category">
                  <a href="./aboutUs/abouttt.html" class="menu-title">About Us </a>
                </li>
                <li class="menu-category">
                  <a href="./contactUs/conta.html" class="menu-title">Contact Us</a>
                </li>
                <li class="menu-category">
                  <a href="./all_product.php" class="menu-title">Shop</a>
                </li>
        <?php if(isset($_SESSION['user_id'])){ 
          $query='SELECT * FROM users where id = :id';
          $stmt= $db->prepare($query) ;
          $stmt->bindValue(':id', $_SESSION['user_id']);
          $stmt->execute();
          $user=$stmt->fetch(PDO::FETCH_ASSOC);
            if($user['is_admin'] == 1){
          ?>
                <li class="menu-category">
                  <a href="http://localhost/PHP_PROJECT/AdminLTE_master/admindashboard/users/users.php" class="menu-title">dashboard</a>
                </li>
      <?php }} ?>
                
              </ul>
            </div>
          </nav>
        </div>

        <div class="header-user-actions">
    <?php if(isset($_SESSION['user_id'])){ ?>
      <a href="http://localhost/PHP_PROJECT/AdminLTE_master/admindashboard/users/profile.php?id=<?php echo $_SESSION['user_id'] ?>">
        <button class="action-btn">
          <ion-icon name="person-outline"></ion-icon>
        </button>
      </a>
          <?php }else{ ?>
            <button class="action-btn">
              <ion-icon style="color:black;" name="person-outline"></ion-icon>
            </button>
            <?php } ?>

        </div>
      </div>


          </header>



<div class="cart_section">
     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-10 offset-lg-1">
                 <div class="cart_container">
                     <div class="cart_title">Shopping Cart<small> (<?php echo count($_SESSION['cart']) ?> item in your cart) </small></div>
                     <div class="cart_items">
                     
                        <?php 
                        if (isset($products)){
                        foreach($products as $product){ ?>
                         <ul class="cart_list">
                             <li class="cart_item clearfix">
                                 <div class="cart_item_image"><img src="./AdminLTE_master/upload/<?php echo $product['product_img']; ?> " alt=""></div>
                                 <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                     <div class="cart_item_name cart_info_col">
                                         <div class="cart_item_title">Name</div>
                                         <div class="cart_item_text"><?php echo substr($product['product_name'], 0, 20) ?></div>
                                     </div>
                                     <div class="cart_item_price cart_info_col">
                                         <div class="cart_item_title">Price</div>
                                         <div class="cart_item_text">$<?php echo $product['price'] ?></div>
                                     </div>
                                     <div class="cart_item_color cart_info_col">
                                         <div class="cart_item_title">discount</div>
                                         <div class="cart_item_text"><?php echo $product['discount'] ?>%</div>
                                     </div>
                                     <div class="cart_item_price cart_info_col">
                                         <div class="cart_item_title">Price after Discount</div>
                                         <div class="cart_item_text">$<?php echo $product['price_after'] ?></div>
                                     </div>
                                     <form action="" method="post" class="row">
                                     <div class="cart_item_quantity cart_info_col">
                                         <div class="cart_item_title">Quantity</div>
                                         <input type="text" class="cart_item_text" name="qty" value="<?php echo $_SESSION['cart'][$product['id']]['qty'] ?>" style="width: 40px; display:block; "></input>
                                         <input type="hidden" class="cart_item_text" name="pro_id" value="<?php echo $_SESSION['cart'][$product['id']]['pro_id'] ?>" style="width: 40px"></input>
                                     </div>
                                     <div class="cart_item_quantity cart_info_col">
                                         <div class="cart_item_title">Update</div>
                                         <input type="submit"  class="cart_item_text"></input>
                                     </div>
                                     </form>
                                     <div class="cart_item_quantity cart_info_col">
                                         <div class="cart_item_title">remove</div>
                                         <div class="cart_item_text"><a href="http://localhost/PHP_PROJECT/removecart.php?id=<?php echo $product['id'] ?>">delete</a></div>
                                     </div>
                                     
                                     <div class="cart_item_total cart_info_col">
                                         <div class="cart_item_title">Total</div>
                                         <div class="cart_item_text">$<?php echo $_SESSION['cart'][$product['id']]['qty'] * $product['price_after'] ?></div>
                                     </div>
                                 </div>
                             </li>
                         </ul>
                         <?php }}?>
                     </div>
                     <?php  
                     if (isset($products)){
                        $total = 0;
                     foreach($products as $product){
                            $total += $_SESSION['cart'][$product['id']]['qty'] * $product['price_after'];
                    }} ?>
                     <div class="order_total">
                         <div class="order_total_content text-md-right">
                             <div class="order_total_title">Order Total:</div>
                             <div class="order_total_amount">$<?php echo $total ?? 0 ?></div>
                         </div>
                     </div>
                     <div class="cart_buttons row">
                        <a href="http://localhost/PHP_PROJECT/index.php" style="margin-left: 30px; margin-top: 50px"><button type="button" class="button cart_button_clear" >Continue Shopping</button></a> 
                        <a href="http://localhost/PHP_PROJECT/checkout.php?total=<?php echo $total ?? 0 ?> " style="margin-top: 40px"> <button type="button" class="button cart_button_checkout">Checkout</button></a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>







  <!--
    - custom js link
  -->
  <!-- <script src="./assets/js/script.js"></script> -->

  <!--
    - ionicon link
  -->

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</body>

</html>

