<?php require('../AdminLTE_master/config/connect.php');

session_start ();
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content=" Smart Home specialized processing IP & software tools for the development of smart home devices. Develop scalable and energy-efficient home automation and connectivity system on smart home. ">
  <meta name="author" content=" Team 4">
  <meta name=" Keyword " content=" control , e-commerce , system , Smart , new ">
  <meta name="Copyright" content=" Orange Coding Academy . Designed by Team 4  ">
  <meta name="refresh" content=" 3 ">

    <title> Contact Us </title>
    <script src="https://kit.fontawesome.com/97fe9846b5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style.css">
    
    <link rel="stylesheet" href="../assets/css/style-prefix.css">
    

     <!--
    - favicon
  -->
  <link rel="shortcut icon" href="../assets/images/logo/logo.png" type="image/x-icon">


  
    <!--
    - BOOTSTRAP
  -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


 <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  
  
  </head>
  <style>
    a {text-decoration:none ;
     }
    a:hover {
      color:#2e5cd3
    }
  </style>



<body>

  
<header>



<div class="header-main" style ="padding:11px 0 ;">


  <div class="container">

    <a href="./index.php" class="header-logo">
      <img src="../assets/images/logo/logo.png" alt="power home logo" width="55" height="55">
    </a>





    <div>

      <nav class="desktop-navigation-menu">



  
        <div class="container">

          <ul class="desktop-menu-category-list">
  
            <li class="menu-category">
              <a href="http://localhost/PHP_PROJECT/" class="menu-title">Home</a>
            </li>
  
           
  
            
  
  
  
  
            <li class="menu-category">
              <a href="http://localhost/PHP_PROJECT/abouttt.php" class="menu-title">About</a>
            </li>
  
            <li class="menu-category">
              <a href="http://localhost/PHP_PROJECT/all_product.php" class="menu-title">shop</a>
            </li>

            <?php if(isset($_SESSION['user_id'])){ 
  $query='SELECT * FROM users where id = :id';
  $stmt= $db->prepare($query) ;
  $stmt->bindValue(':id', $_SESSION['user_id']);
  $stmt->execute();
  $user=$stmt->fetch(PDO::FETCH_ASSOC);
    if($user['is_admin'] == 1){
  ?>
        <li class="menu-category">
          <a href="http://localhost/PHP_PROJECT/AdminLTE_master/admindashboard/users/users.php" class="menu-title">dashboard</a>
        </li>
<?php }} ?>



    
<?php
        if(!isset($_SESSION['user_id'])){
          echo
        '<li class="menu-category"> 
          <a href="AdminLTE_master/admindashboard/users/login.php" class="menu-title">Sign in</a>
        </li>'; 
        echo
        '<li class="menu-category">
          <a href="AdminLTE_master/admindashboard/users/signup.php" class="menu-title">Registration</a>
        </li>'; 
      }else{
        if(isset($_SESSION['user_id'])){
        echo 
        '<li class="menu-category">
          <a href="destroysession.php" class="menu-title">Logout</a>
        </li>';
      }}
      ?>
  
          </ul>
  
        </div>
  
      </nav>


    </div>

    <div class="header-user-actions">
<?php if(isset($_SESSION['user_id'])){ ?>
<a href="http://localhost/PHP_PROJECT/AdminLTE_master/admindashboard/users/profile.php?id=<?php echo $_SESSION['user_id'] ?>">
<button class="action-btn">
  <ion-icon name="person-outline"></ion-icon>
</button>
</a>
  <?php }else{ ?>
    <button class="action-btn">
      <ion-icon name="person-outline"></ion-icon>
    </button>
    <?php } ?>
      </button>

      <button class="action-btn">
    
    <?php if (isset ($_SESSION['cart'])) {?>
  <a href="http://localhost/PHP_PROJECT/viewcart.php"><ion-icon name="bag-handle-outline"></ion-icon></a>
  <span class="count"><?php echo count($_SESSION['cart']) ?></span>
   <?php } else { ?>
    <a href=""><ion-icon name="bag-handle-outline"></ion-icon></a>
<span class="count">0</span>
  <?php }  ?>
  </button>

    </div>

  </div>

</div>









<div class="mobile-bottom-navigation">

  <button class="action-btn" data-mobile-menu-open-btn>
    <ion-icon name="menu-outline"></ion-icon>
  </button>

  <button class="action-btn">
    <ion-icon name="bag-handle-outline"></ion-icon>

    <span class="count">0</span>
  </button>

  <button class="action-btn">
    <ion-icon name="home-outline"></ion-icon>
  </button>

 

  <button class="action-btn" data-mobile-menu-open-btn>
    <ion-icon name="grid-outline"></ion-icon>
  </button>

</div>

<nav class="mobile-navigation-menu  has-scrollbar" data-mobile-menu>

  <div class="menu-top">
    <h2 class="menu-title">Menu</h2>

    <button class="menu-close-btn" data-mobile-menu-close-btn>
      <ion-icon name="close-outline"></ion-icon>
    </button>
  </div>

  <ul class="mobile-menu-category-list">

    <li class="menu-category">
      <a href="#" class="menu-title">Home</a>
    </li>

    <li class="menu-category">

      <button class="accordion-menu" data-accordion-btn>
        <p class="menu-title">Men's</p>

        <div>
          <ion-icon name="add-outline" class="add-icon"></ion-icon>
          <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
        </div>
      </button>

      <ul class="submenu-category-list" data-accordion>

        <li class="submenu-category">
          <a href="#" class="submenu-title">Shirt</a>
        </li>

        <li class="submenu-category">
          <a href="#" class="submenu-title">Shorts & Jeans</a>
        </li>

        <li class="submenu-category">
          <a href="#" class="submenu-title">Safety Shoes</a>
        </li>

        <li class="submenu-category">
          <a href="#" class="submenu-title">Wallet</a>
        </li>

      </ul>

    </li>

    

</nav>

</header>



  


    <section class="section_contact">
        <h1>Contact Us</h1>
        <p>Any question or remarks? Just write us a message!</p>
        <div class="container">
            <div class="row_left_side">
                <div class="semi_circle"></div>
                <div class="circle"></div>
                <h2>Contact Information</h2>
                <p>Fill up the form and our Team will get back to you within 24 hours.</p>
                <a href="tel:+012345678910"><i class="fas fa-phone-alt"><span>+962799379762</span></i></a>
                <a href="mailto:hello@flowbase.com"><i class="far fa-envelope"><span>Team 4 @smarthome.com</span></i></a>
                <a href=""><i class="fas fa-map-marker-alt"><span>Unit 3, Century Court, Westcott Venture Park, Buckinghamshire, HP18 0XP</span></i></a>
                <div class="social_icon">
                    <a href="/"><i class="fab fa-facebook-f"></i></a>
                    <a href="/"><i class="fab fa-instagram"></i></a>
                    <a href="/"><i class="fab fa-twitter"></i></a>
                    <a href="/"><i class="fab fa-linkedin-in"></i></a>
                </div>
                
            </div>
            <div class="row_right_side">
                <form action="/" autocomplete="off">
                    <label for="fname">First Name<br /><input type="text" name="fname" id="fname"
                            placeholder="Smart"/></label>
                    <label for="lname">Last Name<br /><input type="text" name="lname" id="lname"
                            placeholder="Home"/></label>
                    <label for="mail">Mail<br /><input type="email" name="email" id="email"
                            placeholder="smarthome@gmail.com" /></label>
                    <label for="phone">Phone<br /><input type="tel" name="tel" id="tel" onkeypress="telspace()" maxlength="16"
                            placeholder="+962 799 3797 62" /></label>
                    
                    <label for="message">Message</label><br />
                    <textarea name="message" id="message" placeholder="Write your Message"></textarea>
                    <button onclick="send()">Send Message</button>
                </form>
            </div>
        </div>
    </section>


    
  <footer>

<div class="footer-nav">

  <div class="container">

    <ul class="footer-nav-list">

      <li class="footer-nav-item">
        <h2 class="nav-title">Popular Categories</h2>
      </li>

      <li class="footer-nav-item">
        <a href="#" class="footer-nav-link"> light </a>
      </li>

      <li class="footer-nav-item">
        <a href="#" class="footer-nav-link"> Kitchen </a>
      </li>

      <li class="footer-nav-item">
        <a href="#" class="footer-nav-link"> Control  System</a>
      </li>

    </ul>

    <ul class="footer-nav-list">
    
      <li class="footer-nav-item">
        <h2 class="nav-title"> Best Seller Products</h2>
      </li>
    
      <li class="footer-nav-item">
        <a href="#" class="footer-nav-link"> SHARP DISH WASHER </a>
      </li>
    
      <li class="footer-nav-item">
        <a href="#" class="footer-nav-link"> LED DESK LIGHT TABLE LAMP </a>
      </li>
    
      <li class="footer-nav-item">
        <a href="#" class="footer-nav-link"> EUFY SECURITY SOLOCAM E40 </a>
      </li>
    
    </ul>

    <ul class="footer-nav-list">
    
      <li class="footer-nav-item">
        <h2 class="nav-title">Branches </h2>
      </li>
    
      <li class="footer-nav-item">
        <a href="#" class="footer-nav-link"> Aqaba - Jordan </a>
      </li>

      <li class="footer-nav-item">
        <a href="#" class="footer-nav-link"> UK - Stanford </a>
      </li>
    
      <li class="footer-nav-item">
        <a href="#" class="footer-nav-link"> USA - New Hampshier </a>
      </li>
    
    </ul>

    

    <ul class="footer-nav-list">

      <li class="footer-nav-item">
        <h2 class="nav-title">Contact</h2>
      </li>

      <li class="footer-nav-item flex">
        <div class="icon-box">
          <ion-icon name="location-outline"></ion-icon>
        </div>

        <address class="content">
          jordan,aqaba
        </address>
      </li>

      <li class="footer-nav-item flex">
        <div class="icon-box">
          <ion-icon name="call-outline"></ion-icon>
        </div>

        <a href="tel:+607936-8058" class="footer-nav-link">(607) 936-8058</a>
      </li>

      <li class="footer-nav-item flex">
        <div class="icon-box">
          <ion-icon name="mail-outline"></ion-icon>
        </div>

        <a href="mailto:example@gmail.com" class="footer-nav-link">Team4@gmail.com</a>
      </li>

    </ul>

    <ul class="footer-nav-list">

      <li class="footer-nav-item">
        <h2 class="nav-title">Follow Us</h2>
      </li>

      <li>
        <ul class="social-link">

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">
              <ion-icon name="logo-linkedin"></ion-icon>
            </a>
          </li>

          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

        </ul>
      </li>

    </ul>

  </div>

</div>

<div class="footer-bottom">

  <div class="container">

    <img src="../assets/images/payment.png" alt="payment method" class="payment-img">

    
  </div>
  <p class="copyright">
      Copyright &copy; <a href="#"> Orange Coding Academy </a> all rights reserved.
    </p>

</div>

</footer>


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>