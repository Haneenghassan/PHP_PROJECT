


<?php

echo " hello world";

session_start();

$id = $_GET['id'];

$cart_item = ['id'=> $id,'name' => $name, 'qty' => 1, 'price' => $price];

if(in_array($id, $_SESSION['cart_item']['id'])){
    $_SESSION['cart_item']['qty'] += 1;
}else{
    $_SESSION['cart_item'] = array_push($cart_item, $_SESSION['cart_item']);
}