<?php 

include './AdminLTE_master/config/connect.php';
session_start ();


$query='SELECT * FROM products ';
$stmt= $db->prepare($query) ;
$stmt->execute();
$products=$stmt->fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>";
// print_r($products);
// echo "</pre>";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $cate = $_POST['category'];
  if($cate == "All products"){
    // all_product.php
    header("location: http://localhost/PHP_PROJECT/all_product.php");
  }else{
    header("location: http://localhost/PHP_PROJECT/display.php?category=$cate");
  }
  // print_r($_POST);
}

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
  <title> All Product </title>

  <link rel="stylesheet" href="./assets/css/style-prefix.css">
  <link rel="stylesheet" href="./assets/css/style.css">
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
      
                      <!-- <li class="menu-title">
                        <a href="#">Electronics</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Desktop</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Laptop</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Camera</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Tablet</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Headphone</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">
                          <img src="./assets/images/electronics-banner-1.jpg" alt="headphone collection" width="250"
                            height="119">
                        </a>
                      </li>
      
                    </ul> -->
      
                    <ul class="dropdown-panel-list">
      
                      <li class="menu-title">
                        <a href="#">Cat 1</a>
                      </li>
      <!-- 
                      <li class="panel-list-item">
                        <a href="#">Formal</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Casual</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Sports</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Jacket</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Sunglasses</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">
                          <img src="./assets/images/mens-banner.jpg" alt="men's fashion" width="250" height="119">
                        </a>
                      </li> -->
      
                    </ul>
      
                    <ul class="dropdown-panel-list">
      
                      <li class="menu-title">
                        <a href="#"> Cat 2</a>
                      </li>
      
                      <!-- <li class="panel-list-item">
                        <a href="#">Formal</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Casual</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Perfume</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Cosmetics</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Bags</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">
                          <img src="./assets/images/womens-banner.jpg" alt="women's fashion" width="250" height="119">
                        </a>
                      </li> -->
      
                    </ul>
      
                    <ul class="dropdown-panel-list">
      
                      <li class="menu-title">
                        <a href="#">Cat 3</a>
                      </li>
      
                      <!-- <li class="panel-list-item">
                        <a href="#">Smart Watch</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Smart TV</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Keyboard</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Mouse</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">Microphone</a>
                      </li>
      
                      <li class="panel-list-item">
                        <a href="#">
                          <img src="./assets/images/electronics-banner-2.jpg" alt="mouse collection" width="250" height="119">
                        </a>
                      </li> -->
      
                    </ul>
      
                  </div>
                </li>
      
                <!-- <li class="menu-category">
                  <a href="#" class="menu-title">kitchen</a>
      
                  <ul class="dropdown-list">
      
                    <li class="dropdown-item">
                      <a href="#">Shirt</a>
                    </li>
      
                    <li class="dropdown-item">
                      <a href="#">Shorts & Jeans</a>
                    </li>
      
                    <li class="dropdown-item">
                      <a href="#">Safety Shoes</a>
                    </li>
      
                    <li class="dropdown-item">
                      <a href="#">Wallet</a>
                    </li>
      
                  </ul>
                </li> -->
      
        
      
                <li class="menu-category">
                  <a href="./aboutUs/abouttt.html" class="menu-title">About Us </a>
                </li>
      
      
                <li class="menu-category">
                  <a href="./contactUs/conta.html" class="menu-title">Contact Us</a>
                </li>
      
      
              </ul>
      
            </div>
      
          </nav>


        </div>

        <div class="header-user-actions">

          <button class="action-btn">
            <ion-icon name="person-outline"></ion-icon>
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

  <main>

<!--
  - BANNER
-->
<form action="" method="post" style="margin-left: 70px; display:flex;">
<select name="category" id="cars">
<!-- <a href="./all_product.php" class="menu-title">All products</a> -->
<!-- <a href="http://localhost/PHP_PROJECT/display.php?category=security"> Security</a> -->
  <option value="All products">All products</option>
  <option value="light"> Light</option>
  <option value="Security">Security</option>
  <option value="Kitchen">Kitchen</option>
</select>
<input type="submit" style="width: 60px" value="go">
</form>



<div class="product-container">

<div class="container">

  <div class="product-box">

            <!--
            - PRODUCT GRID
          -->
          <div class="product-main">

            <h2 class="title"> All Products</h2>

            <div class="product-grid">



<?php
foreach ($products as $product):
?>

              <div class="showcase">
              
                <div class="showcase-banner">
                  <img src="./AdminLTE_master/upload/<?php echo $product['product_img']; ?>" alt="Better Basics French Terry Sweatshorts"
                    class="product-img default" width="300">
                  <img src="./AdminLTE_master/upload/<?php echo $product['product_img']; ?>" alt="Better Basics French Terry Sweatshorts" class="product-img hover" width="300">
              
                  
              
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
              
                   <a href="addtocart.php"> <button class="btn-action">
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
                    <p class="price">$78.00</p>
                    
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
        <a href="#" class="footer-nav-link">Product 1 </a>
      </li>
    
      <li class="footer-nav-item">
        <a href="#" class="footer-nav-link">Product 2 </a>
      </li>
    
      <li class="footer-nav-item">
        <a href="#" class="footer-nav-link">Product 3 </a>
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

