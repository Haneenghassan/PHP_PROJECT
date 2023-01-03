<?php 
include './AdminLTE_master/config/connect.php';
echo "hey";


$query = "select user_id,count(*) as Total from order_list group by user_id order by Total desc;";



// 3 biggest quantity order

// $query = "select order_id, sum(quantity) 
// from order_detials 
// group by order_id 
// order by sum(quantity) desc 
// limit 3";



$stmt= $db->prepare($query);
$stmt->execute();
$products=$stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($products);
echo "</pre>";


?>