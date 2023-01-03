<?php 
include './AdminLTE_master/config/connect.php';
echo "hey";

// most product selling in many orders
// $query = "select product_id, count(quantity) 
// from order_detials 
// group by product_id 
// order by count(quantity) desc 
// limit 3";

// 3 most selling products
// $query = "select product_id, sum(quantity) 
// from order_detials 
// group by product_id 
// order by sum(quantity) desc 
// limit 3";

// 3 biggest quantity order
// $query = "select order_id, sum(quantity) 
// from order_detials 
// group by order_id 
// order by sum(quantity) desc 
// limit 3";


// $query = "select user_id,count(*) as Total from order_list group by user_id order by Total desc;";

$stmt= $db->prepare($query) ;
$stmt->execute();
$products=$stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($products);
echo "</pre>";


?>