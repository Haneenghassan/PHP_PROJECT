<?php
require_once('./connect.php');
$query='SELECT * FROM products';
$stmt= $db->prepare($query) ;
$stmt->execute();
$products=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table class="table table-bordered mt-3">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      </thead>
                  <tbody>
                  <?php
        foreach($products as $product) { ?>
                    <tr>
                    <td><?PHP echo $product['id'] ?></td>
                    </tr>
                    <td>
                      <a href="singleproduct.php?id=<?php echo $product['id'] ?>" class="btn btn-success">more info</a>
        <?php }?>
        <button><button>
</table>
</body>
</html>
