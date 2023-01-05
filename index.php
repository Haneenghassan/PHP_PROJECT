<?php 

include './AdminLTE_master/config/connect.php';

session_start ();
// session_destroy();
// print_r($_SESSION);

$query='SELECT * FROM categories LIMIT 3';
$stmt= $db->prepare($query) ;
$stmt->execute();
$categories=$stmt->fetchAll(PDO::FETCH_ASSOC);


$query='SELECT * FROM products WHERE price != price_after LIMIT 8';
$stmt= $db->prepare($query) ;
$stmt->execute();
$products=$stmt->fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>";
// print_r($products);
// echo "</pre>";

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
  <title> Power Home  </title>


    <!--
    - BOOTSTRAP
  -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


  <!--
    - favicon
  -->
  <link rel="shortcut icon" href="./assets/images/logo/logo.png" type="image/x-icon">

  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style-prefix.css">

  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

</head>

<body>

  <!--
    - HEADER
  -->

  <header>



    <div class="header-main">


      <div class="container">

        <a href="#" class="header-logo">
          <img src="./assets/images/logo/logo.png" alt="power home logo" width="55" height="55">
        </a>





        <div>

          <nav class="desktop-navigation-menu">



      
            <div class="container">
      
              <ul class="desktop-menu-category-list">
      
                <li class="menu-category">
                  <a href="#" class="menu-title">Home</a>
                </li>
      
                <li class="menu-category">
                  <a href="#Cat" class="menu-title">Categories</a>
      
                  <div class="dropdown-panel">
                    <ul class="dropdown-panel-list">
                      <li class="menu-title">
                        <a href="http://localhost/PHP_PROJECT/display.php?category=light"> Light</a>
                      </li>
                      <li class="menu-title">
                        <a href="http://localhost/PHP_PROJECT/display.php?category=security"> Security</a>
                      </li>
                      <li class="menu-title">
                        <a href="http://localhost/PHP_PROJECT/display.php?category=kitchen"> Kitchen</a>
                      </li>
                    </ul>
                  </div>
                </li>
      
                <li class="menu-category">
                  <a href="./aboutUs/abouttt.html" class="menu-title">About Us </a>
                </li>
      
      
                <li class="menu-category">
                  <a href="./contactUs/conta.html" class="menu-title">Contact Us</a>
                </li>
                <li class="menu-category">
                  <a href="./all_product.php" class="menu-title">Shop</a>
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

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Women's</p>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>

          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Dress & Frock</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Earrings</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Necklace</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Makeup Kit</a>
            </li>

          </ul>

        </li>

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Jewelry</p>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>

          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Earrings</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Couple Rings</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Necklace</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Bracelets</a>
            </li>

          </ul>

        </li>

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Perfume</p>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>

          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Clothes Perfume</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Deodorant</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Flower Fragrance</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Air Freshener</a>
            </li>

          </ul>

        </li>

        <li class="menu-category">
          <a href="#" class="menu-title">Blog</a>
        </li>

        <li class="menu-category">
          <a href="#" class="menu-title">Hot Offers</a>
        </li>

      </ul>

      <div class="menu-bottom">

        <ul class="menu-category-list">

          <li class="menu-category">

            <button class="accordion-menu" data-accordion-btn>
              <p class="menu-title">Language</p>

              <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
            </button>

            <ul class="submenu-category-list" data-accordion>

              <li class="submenu-category">
                <a href="#" class="submenu-title">English</a>
              </li>

              <li class="submenu-category">
                <a href="#" class="submenu-title">Espa&ntilde;ol</a>
              </li>

              <li class="submenu-category">
                <a href="#" class="submenu-title">Fren&ccedil;h</a>
              </li>

            </ul>

          </li>

          <li class="menu-category">
            <button class="accordion-menu" data-accordion-btn>
              <p class="menu-title">Currency</p>
              <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
            </button>

            <ul class="submenu-category-list" data-accordion>
              <li class="submenu-category">
                <a href="#" class="submenu-title">USD &dollar;</a>
              </li>

              <li class="submenu-category">
                <a href="#" class="submenu-title">EUR &euro;</a>
              </li>
            </ul>
          </li>

        </ul>

        <ul class="menu-social-container">

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-linkedin"></ion-icon>
            </a>
          </li>

        </ul>

      </div>

    </nav>

  </header>





  <!--
    - MAIN
  -->

  <main>

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item  slider-item">
      <img src="./images/smart-home-system-mobile-phone-screen.jpg" class="d-block w-100 banner-img" alt="...">
      <div class="banner-content">

              <p class="banner-subtitle"></p>

              <h2 class="banner-title">Modern sunglasses</h2>

              <p class="banner-text">

                starting at JOD <b>50</b>.00

              </p>

              <a href="#" class="banner-btn">Shop now</a>

            </div>
    </div>
    <div class="carousel-item slider-item">
      <img src="./images/person-holding-mobile-phone-with-high-tech-application-smart-house-features-controlling-lights-with-wireless-device.jpg" class="d-block w-100 banner-img" alt="...">
      <div class="banner-content">

              <p class="banner-subtitle"></p>

              <h2 class="banner-title">Modern sunglasses</h2>

              <p class="banner-text">
              starting at JOD <b>15</b>.00
              </p>

              <a href="#" class="banner-btn">Shop now</a>

            </div>
    </div>
    <div class="carousel-item active slider-item">
      <img src="./images/smart-speaker-house-control-innovative-technology.jpg" class="d-block w-100 banner-img" alt="...">
      <div class="banner-content">

              <p class="banner-subtitle"></p>

              <h2 class="banner-title">Modern sunglasses</h2>

              <p class="banner-text">

              starting at JOD <b>29</b>.99

              </p>

              <a href="#" class="banner-btn">Shop now</a>

            </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>



    <!--
      - PRODUCT
    -->

    <div class="product-container">

      <div class="container">

        <div class="product-box">




          <!--
            - PRODUCT FEATURED
          -->

  





          <div class="product-box">

                      <!--
                        - PRODUCT MINIMAL
                      -->
            
                      <div class="product-minimal ">
            
                        <div class="product-showcase ">
            
                          <h2 class="title " style=" text-align: center;font-size: 2.5rem;">Categories</h2>
            
                          <div class="showcase-wrapper has-scrollbar">
            
                            <div class="showcase-container">
            


                              <div class="row row-cols-1 row-cols-md-3 g-4">

<?php
foreach ($categories as $category):
?>
                                <div class="col">
                                  <div class="card">
                                    <img src="./AdminLTE_master/upload/<?php echo $category['category_img']; ?> " class="card-img-top" alt="name">
                                    <div class="card-body">
                                      <h5 class="card-title"> <?php echo $category['category_name']; ?> </h5>
                                    </div>
                                  </div>
                                </div>
<?php endforeach; ?>

                        </div>
                  







                        
          
                                </div>
                        
                              </div>
                        
                            </div>

          </div>








          <!--
            - PRODUCT GRID
          -->
          <div class="product-main">

            <h2 class="title">PRODUCT ON SALES</h2>

            <div class="product-grid">

<?php

foreach ($products as $product):
?>


              <div class="showcase">
              
                <div class="showcase-banner">
                <a href="single.php?id=<?php echo $product['id'] ?>" >
                
                  <img src="./AdminLTE_master/upload/<?php echo $product['product_img']; ?>" alt="Better Basics French Terry Sweatshorts"
                    class="product-img default" width="300">
                  <img src="./AdminLTE_master/upload/<?php echo $product['product_img']; ?>" alt="Better Basics French Terry Sweatshorts" class="product-img hover" width="300">

              
                  <p class="showcase-badge angle black" style="background-color:red !important;">sale</p>

              
                  <div class="showcase-actions">
                    <button class="btn-action">
                      <ion-icon name="heart-outline"></ion-icon>
                    </button>
              
                    <button class="btn-action">
                      <ion-icon name="eye-outline"></ion-icon>
                    </button>
              
                    <button class="btn-action">
                      <ion-icon name="repeat-outline"></ion-icon>
                    </button>
              
                   <a href="addtocart.php?pro_id=<?php echo $product['id'] ?>&action=add"> <button class="btn-action">
                      <ion-icon name="bag-add-outline"></ion-icon>
                    </button> </a> 
                  </div>
                </div>
              
                <div class="showcase-content">
                  <a href="#" class="showcase-category"><?php echo $product['product_name']; ?></a>
              
                  <h3>
                    <a href="#" class="showcase-title"><?php echo $product['product_desc']; ?></a>
                  </h3>
              
                  <div class="showcase-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                  </div>
              
                  <div class="price-box">
                    <p class="price">JOD<?php echo $product['price_after']; ?></p>
                    <del>JOD<?php echo $product['price']; ?></del>
                    <!-- <a href="./aboutus.html" class="addToCart"><button> Add to Cart </button></a> -->
                  </div>
                  

                </div>
              
              </div>

              <?php endforeach ?>
             
            </div>





          </div>















        </div>

      </div>

    </div>





    <!--
      - TESTIMONIALS, CTA & SERVICE
    -->

    <div>

      <div class="container">

        <div class="testimonials-box">

          <!--
            - SERVICE
          -->

          </div>

        </div>

      </div>

    </div>





    <!--
      - BLOG
    -->

    <!-- <div class="blog">

      <div class="container">

        <div class="blog-container has-scrollbar">

          <div class="blog-card">

            <a href="#">
              <img src="./assets/images/blog-1.jpg" alt="Clothes Retail KPIs 2021 Guide for Clothes Executives" width="300" class="blog-banner">
            </a>

            <div class="blog-content">

              <a href="#" class="blog-category">Fashion</a>

              <a href="#">
                <h3 class="blog-title">Clothes Retail KPIs 2021 Guide for Clothes Executives.</h3>
              </a>

              <p class="blog-meta">
                By <cite>Mr Admin</cite> / <time datetime="2022-04-06">Apr 06, 2022</time>
              </p>

            </div>

          </div>

          <div class="blog-card">
          
            <a href="#">
              <img src="./assets/images/blog-2.jpg" alt="Curbside fashion Trends: How to Win the Pickup Battle."
                class="blog-banner" width="300">
            </a>
          
            <div class="blog-content">
          
              <a href="#" class="blog-category">Clothes</a>
          
              <h3>
                <a href="#" class="blog-title">Curbside fashion Trends: How to Win the Pickup Battle.</a>
              </h3>
          
              <p class="blog-meta">
                By <cite>Mr Robin</cite> / <time datetime="2022-01-18">Jan 18, 2022</time>
              </p>
          
            </div>
          
          </div>

          <div class="blog-card">
          
            <a href="#">
              <img src="./assets/images/blog-3.jpg" alt="EBT vendors: Claim Your Share of SNAP Online Revenue."
                class="blog-banner" width="300">
            </a>
          
            <div class="blog-content">
          
              <a href="#" class="blog-category">Shoes</a>
          
              <h3>
                <a href="#" class="blog-title">EBT vendors: Claim Your Share of SNAP Online Revenue.</a>
              </h3>
          
              <p class="blog-meta">
                By <cite>Mr Selsa</cite> / <time datetime="2022-02-10">Feb 10, 2022</time>
              </p>
          
            </div>
          
          </div>

          <div class="blog-card">
          
            <a href="#">
              <img src="./assets/images/blog-4.jpg" alt="Curbside fashion Trends: How to Win the Pickup Battle."
                class="blog-banner" width="300">
            </a>
          
            <div class="blog-content">
          
              <a href="#" class="blog-category">Electronics</a>
          
              <h3>
                <a href="#" class="blog-title">Curbside fashion Trends: How to Win the Pickup Battle.</a>
              </h3>
          
              <p class="blog-meta">
                By <cite>Mr Pawar</cite> / <time datetime="2022-03-15">Mar 15, 2022</time>
              </p>
          
            </div>
          
          </div>

        </div>

      </div>

    </div> -->

  </main>





  <!--
    - FOOTER
  -->

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

        <!-- <ul class="footer-nav-list">
        
          <li class="footer-nav-item">
            <h2 class="nav-title">Services</h2>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Prices drop</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">New products</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Best sales</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Contact us</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Sitemap</a>
          </li>
        
        </ul> -->

        <ul class="footer-nav-list">

          <li class="footer-nav-item">
            <h2 class="nav-title">Contact</h2>
          </li>

          <li class="footer-nav-item flex">
            <div class="icon-box">
              <ion-icon name="location-outline"></ion-icon>
            </div>

            <address class="content">
              419 State 414 Rte
              Beaver Dams, New York(NY), 14812, USA
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

        <p class="copyright">
          Copyright &copy; <a href="#"> Orange Coding Academy </a> all rights reserved.
        </p>

      </div>

    </div>

  </footer>


  <!--
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!--
    - ionicon link
  -->

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</body>

</html>

