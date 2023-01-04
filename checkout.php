<?php 
include './AdminLTE_master/config/connect.php';
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: http://localhost/PHP_PROJECT/AdminLTE_master/admindashboard/users/login.php");
}

if (isset($_SESSION['cart']) && count($_SESSION['cart']) >0){
    $keys = array_keys($_SESSION['cart']);
    $whereIn = implode(',', $keys);
    $query = "SELECT * FROM products WHERE id IN ($whereIn)";
    $stmt= $db->prepare($query) ;
    $stmt->execute();
    $products=$stmt->fetchAll(PDO::FETCH_ASSOC);
}else{
    header("location: viewcart.php");
}


$user_id = $_SESSION['user_id'];
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
// echo "<pre>";
// print_r($products[0]['id']);
// echo "</pre>";
$total = $_GET['total'];
$query = "INSERT INTO order_list SET user_id = :user_id, total_price = :total_price";
$stmt= $db->prepare($query) ;
$stmt->bindValue(':user_id', $user_id);
$stmt->bindValue(':total_price', $total);
$stmt->execute();
$query = "SELECT id FROM order_list ORDER BY id DESC LIMIT 1";
$stmt= $db->prepare($query) ;
$stmt->execute();
$order_id=$stmt->fetch(PDO::FETCH_ASSOC);
$order_id = $order_id['id'];
echo $order_id . "<br>";
$sql = "INSERT INTO `order_detials` (`id`, `order_id`, `product_id`, `quantity`, `price`, `after_discount`) VALUES";

foreach($products as $product){
    extract($product);
    $quantity =  $_SESSION['cart'][$id]['qty'];
 $sql .= "(NULL, $order_id, $id, $quantity, $price, $price_after),";
}
$sql = substr($sql, 0, -1);
$sql = "$sql;";
echo $sql;
$stmt= $db->prepare($sql);
$stmt->execute();
// exit;
unset($_SESSION['cart']);

header("location: viewcart.php");

?>