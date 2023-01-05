<?php
$host="mysql:host=localhost;dbname=home_power;";
$username="root";
$password="";


try
{
    $db=new PDO($host,$username,$password);

}
catch(PDOException $e){
    $error_message="database error:";
    $error_message= $e->getMessage();
    echo $error_message;
}


class crud {

    public static function connect(){
        try{

        $con=new PDO('mysql:localhost=localhost;dbname=home_power','root','');

        return $con;

    } catch(PDOException $e){

        echo 'database error: ' . $e->getMessage();


    }

    
   
}

    public static function selectProductt(){
        $data = array();
        $con=crud::connect()->prepare("SELECT * FROM products");
        $con->execute();
        $data= $con->fetchAll(PDO::FETCH_ASSOC);
        return    $data;
    }

    public static function selectorder(){
        $data = array();
        $con=crud::connect()->prepare("SELECT * FROM order_list 
        INNER JOIN order_detials od ON order_list.id = od.order_id 
        INNER JOIN products p ON od.`product_id` = p.id 
        INNER JOIN users u ON order_list.user_id = u.id 
        WHERE order_list.id = 19;");
        $con->execute();
        $data= $con->fetchAll(PDO::FETCH_ASSOC);
        return  $data;
    }

}

?>