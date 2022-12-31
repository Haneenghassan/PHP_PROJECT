<?php
require_once "../connect.php";
$nameErr = "";
$emailErr = "";
$erorrs = [];

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["user_name"])  && isset($_POST["address"]) && isset($_POST["phone"]) && isset($_POST["user_email"]) && isset($_POST['submit']) && isset($_FILES['file'])){
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    // exit;
    $user_name=$_POST['user_name'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $user_email=$_POST['user_email'];
    $id = $_GET['id'];


    // upload Image
    $file = $_FILES['file'];
    
    $fileName = $file['name'];
    $fileSize = $file['size'];
    $fileType = $file['type'];
    $fileTmpName = $file['tmp_name'];
    $fileError = $file['error'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 10000000){
                $fileNameNew = uniqid('IMG-', true). "." . $fileActualExt;
                $fileDestination = '../upload/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $msg = "uploadsuccess";
                $query = "UPDATE users SET image_url = :image_url WHERE id = :id";
                $statement=$db->prepare($query);
                $statement->bindValue(':image_url', $fileNameNew);
                $statement->bindValue(':id', $id);
                $statement->execute();
                header("location: users.php");
            }else{
                echo "your file is too big!";
            }
        }else{
            echo "there was an error uploading your file!";
        }
    }else{
        echo "You can not upload files of this type!";
    }


        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$user_name)) {
          $nameErr = "Only letters and white space allowed";
          $erorrs["user_name"] = "Enter Your first name";
        }
          
          if (!preg_match("/^(\+?){1}\d{14}$/",$phone)) {
          $erorrs["phone"] = "Enter Your phone number";
          }

        // check if e-mail address is well-formed
        if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
            $erorrs["user_email"] = "Enter Your user_email";
        }
        

    //   print_r($erorrs);
// UPDATE USERS
if(empty($erorrs)){
    $query = 'UPDATE users SET user_name = :user_name, address = :address, phone = :phone, user_email = :user_email  WHERE id = :id';
    $statement=$db->prepare($query);
    $statement->bindValue(':user_name', $user_name);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':user_email', $user_email);
    $statement->bindValue(':id', $id);

if($statement->execute()){
    // header("Location: users.php");
    echo "success";
}
}
    

}


// ^(([0-9]{2})\/)+(([0-9]{2})\/)+([0-9]{4})$
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css" integrity="sha384-WJUUqfoMmnfkBLne5uxXj+na/c7sesSJ32gI7GfCk4zO4GthUKhSEGyvQ839BC51" crossorigin="anonymous">

    <title>Update</title>
  </head>
  <style>
.error {color: #FF0000;}
</style>
  <body>

    <div class="container">
    <h1>Update </h1>

<form action="" method="post" enctype="multipart/form-data">
<div class="mb-3">
        <input type="file" name="file">
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">First Name:</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Write the First Name" name="user_name">
  <p class="error">
    <?php echo $erorrs['user_name'] ?? null;?>
</p>
</div>



<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Address:</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Write Address" name="address">
  <p class="error"><?php echo $erorrs['address'] ?? null;?></p>

</div>


<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">phone:</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Write the phone Number" name="phone">
  <p class="error"><?php echo $erorrs['phone'] ?? null;?></p>
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email:</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Write the Email" name="user_email">
  <p class="error"><?php echo $erorrs['user_email'] ?? null;?></p>
</div>





<div class="mb-3">
  <!-- <input type="submit" class="btn btn-primary"> -->
  <button type="submit" class="btn btn-primary" name="submit">submit</button>
</div>
</form>

  </div>
  </body>
</html>