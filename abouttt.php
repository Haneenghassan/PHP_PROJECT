<?php require('./AdminLTE_master/config/connect.php');

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
    <title>About us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="./assets/css/style-prefix.css">

    <!--
    - favicon
  -->
  <link rel="shortcut icon" href="./assets/images/logo/logo.png" type="image/x-icon">


  

 <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
</head>
<style>
    body{
        margin: 0;
        padding: 0;
        font-family: 'Montserrat', sans-serif;
    }

    *{
        box-sizing: border-box;
    }

    .About{
        display: inline-block;
        margin: 10%;
        margin-top: 5%;
        padding: 10px 20px;
    }

    .About .Details{
        float: left;
        display: table;
        padding: 15px 40px;
        font-size: 15px;
        height: 700px;
        width: 40%;
        letter-spacing: 3px;
        background-color: #fff;
    }
    .Details h1{
        font-size: 50px;
        letter-spacing: 5px;
        font-weight: bold;
        margin-bottom: 20%;
    }

    .Details p{
        margin: 20px;
        letter-spacing: 2px;
    }

    .Details .icons{
        font-weight: bold;
        margin: 20px;
        cursor: pointer;
        margin-top: 20%;
    }
    .Details .icons:hover{
        opacity: 0.7;
        
    }

    .Details h3{
        margin: 20px;
    }

    .About .image{
        float: right;
        height: 700px;
        width: 50%;
        background-color: rgb(46, 92, 211);
    }
    .image img{
        border: 30px solid white;
        margin-left: -20%;
        margin-top: 15%;
        width: 600px;
        height: 400px;
        box-shadow: 3px 3px 20px black;
    }

   
</style>
<body>




    <header>



        <div class="header-main" style ="padding:11px 0 ;">
    
    
          <div class="container">
    
            <a href="./index.php" class="header-logo">
              <img src="./assets/images/logo/logo.png" alt="power home logo" width="55" height="55">
            </a>
    
    
    
    
    
            <div>
    
              <nav class="desktop-navigation-menu">
    
    
    
          
                <div class="container">

                  <ul class="desktop-menu-category-list">
          
                    <li class="menu-category">
                      <a href="http://localhost/PHP_PROJECT/" class="menu-title">Home</a>
                    </li>
          
                   
          
                    
          
          
          
          
                    
                    <li class="menu-category">
                      <a href="http://localhost/PHP_PROJECT/abouttt.php" class="menu-title">About </a>
                    </li>
                    
                    <li class="menu-category">
                      <a href="http://localhost/PHP_PROJECT/contactUs/conta.php" class="menu-title">Contact</a>
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



      










    
    <div class="About">
        <div class="Details">
            <h1>
                About US
            </h1>
            <p> 
              With over 20 years of combined experience,
              our electricians provide the highest standard 
              of Commercial and Domestic electrical services
                and solutions. With our own full time, dedicated 
                staff, all of whom are Elecsa Part P certified, we can
                provide a fully encompassing range of services. From house 
                re-wiring, extensions and full renovations to air conditioning 
                & underfloor heating systems; all aspects of lighting, including custom
                  lighting design; we can provide for any requirements, up to the highest 
                  specification.
            </p>
        </div>
        <div class="image">
            <img src="./img/Smart-Homes-Cover-AR11072021.jpg">
        </div>
    </div>





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

    <img src="./assets/images/payment.png" alt="payment method" class="payment-img">

    
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