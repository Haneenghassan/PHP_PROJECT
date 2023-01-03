<?php 
include './AdminLTE_master/config/connect.php';
session_start ();
if (count($_SESSION['cart']) >0){
$keys = array_keys($_SESSION['cart']);
$whereIn = implode(',', $keys);
$query = "SELECT * FROM products WHERE id IN ($whereIn)";
$stmt= $db->prepare($query) ;
$stmt->execute();
$products=$stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="./viewcss.css">
    <title>cart</title>
</head>
<body>
    





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
                                     <div class="cart_item_quantity cart_info_col">
                                         <div class="cart_item_title">Quantity</div>
                                         <div class="cart_item_text"><?php echo $_SESSION['cart'][$product['id']]['qty'] ?></div>
                                     </div>
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
                        $res = 0;
                     foreach($products as $product){
                            $res += $_SESSION['cart'][$product['id']]['qty'] * $product['price_after'];
                    }} ?>
                     <div class="order_total">
                         <div class="order_total_content text-md-right">
                             <div class="order_total_title">Order Total:</div>
                             <div class="order_total_amount">$<?php echo $res ?? 0 ?></div>
                         </div>
                     </div>
                     <div class="cart_buttons"><a href="http://localhost/PHP_PROJECT/index.php"><button type="button" class="button cart_button_clear">Continue Shopping</button></a>  <button type="button" class="button cart_button_checkout">Checkout</button> </div>
                 </div>
             </div>
         </div>
     </div>
 </div>





</body>
</html>