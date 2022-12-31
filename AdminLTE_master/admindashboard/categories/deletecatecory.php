<?php

require_once "../../config/connect.php";
$id = $_GET['id'];
echo $id;

$sql = " UPDATE categories
SET is_deleted = '1'
WHERE id=:id";

$stmt=$db->prepare($sql);
if($stmt->execute([':id'=>$id])) {
  header("Location: category.php");
} 