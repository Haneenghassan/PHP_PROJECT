<?php
include './connect.php';
?>

<?php
//   DELETE PRODUCTS

if(isset($_GET['delete'])){
$delete_id = $_GET['delete'];
$delete_product_image = $db->prepare("SELECT * FROM `products` WHERE id = ?");
$delete_product_image->execute([$delete_id]);
$fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);

unlink('./upload_img'.$fetch_delete_image['image']);
$delete_product = $db->prepare("DELETE FROM `products` WHERE id = ?");
$delete_product->execute([$delete_id]);
header('location:product.php');
}
?>