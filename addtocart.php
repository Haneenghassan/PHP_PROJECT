<?php 
session_start();

// Check if product is coming or not
if (isset($_GET['pro_id'])) {

  $proid = $_GET['pro_id'];

  // If session cart is not empty
  if (!empty($_SESSION['cart'])) {

    // Using "array_column() function" we get the product id existing in session cart array
    $acol = array_column($_SESSION['cart'], 'pro_id');

    // now we compare whther id already exist with "in_array() function"
    if (in_array($proid, $acol)) {

      // Updating quantity if item already exist
      $_SESSION['cart'][$proid]['qty'] += 1;
      header("Location: index.php");
    } else {
      // If item doesn't exist in session cart array, we add a new item
      $item = [
        'pro_id' => $_GET['pro_id'],
        'qty' => 1
      ];

      $_SESSION['cart'][$proid] = $item;
      header("Location: index.php");
    }
  } else {
    // If cart is completely empty, then store item in session cart
    $item = [
      'pro_id' => $_GET['pro_id'],
      'qty' => 1
    ];

    $_SESSION['cart'][$proid] = $item;
    header("Location: index.php");
  }
}
// unset($_SESSION['cart'])
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
?>