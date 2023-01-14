
<?php session_start();?>


<?php require('./AdminLTE_master/config/connect.php');?>

<?php

// if(!isset($_SESSION['name'])){
//     echo "<script>window.location='./logtest.php'</script>";
//  };
 

$dd=crud::selectProductt();

if(isset($_SESSION['cart'])){
    $item_array_id = array_column($_SESSION['cart'], 'product_id');

};

// session_unset();
?>


<?php 
    if(isset($_POST['submit'])) {
    $xx = $_SESSION['totalPrice'];
    $sql="INSERT INTO order_list (id, user_id, total_price ,order_date) VALUES (NULL, 1, '$xx' , now());";
    $con=crud::connect()->prepare($sql);
    $con->execute();
    $conn=crud::connect()->prepare("SELECT * FROM order_list  ORDER BY id DESC");
    $conn->execute();
    $data=$conn->fetch(PDO::FETCH_ASSOC);
    $last_id = $data['id'];
    echo $last_id;

     foreach($dd as $value){

            if(in_array($value['id'],$item_array_id)){
                $x=$value['id'];
                $y=$value['price'];
            $sql="INSERT INTO order_details (id, product_id, quantity, price) 
            VALUES ('$last_id', '$x', '1', '$y')";
            $insert=crud::connect()->prepare($sql);
            $insert->execute();
            
            }
    }           
        unset($_SESSION['cart']);
        unset($_SESSION['totalPrice']);
        }
    // }

?>


<?php include('./AdminLTE_master/components/footer.php'); ?>