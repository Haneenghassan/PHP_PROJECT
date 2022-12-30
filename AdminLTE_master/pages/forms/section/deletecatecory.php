<?php

require_once('./connect.php');
$id = $_GET['id'];

$sql = " UPDATE categories
SET is_deleted = '1'
WHERE id=:id";

$stmt=$db->prepare($sql);
if($stmt->execute([':id'=>$id])) {
  header("Location: http://localhost/AdminLTE-master/pages/tables/catogerytable.php");
} 