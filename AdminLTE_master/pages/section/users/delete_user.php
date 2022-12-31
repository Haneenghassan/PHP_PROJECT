<?php
require_once "../connect.php";
$id = $_GET['id'];

$sql = "UPDATE users
SET is_deleted = '1'
WHERE id=:id";

$stmt=$db->prepare($sql);
if($stmt->execute([':id'=>$id])) {
  header("Location: http://localhost/PHP_PROJECT/AdminLTE_master/pages/section/users/users.php");
}