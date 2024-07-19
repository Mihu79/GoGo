<?php
session_start();
include("connect.php");
?>


<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/favicon.png" type="image/gif" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="stylesheet" href="css/style1.css" />
	<!-- Demo CSS (No need to include it into your project) -->
	<link rel="stylesheet" href="css/demo1.css">
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>GoGo</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  

</head>


<body>

  <!-- header section strats -->
  <header class="header_section innerpage_header">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container">
        <a class="navbar-brand" href="homepage.php">
          <span>
            GoGo
          </span>
        </a>
        <div class="" id="">

          <div class="custom_menu-btn">
            <button onclick="openNav()">
              <span class="s-1"> </span>
              <span class="s-2"> </span>
              <span class="s-3"> </span>
            </button>
            <div id="myNav" class="overlay">
              <div class="overlay-content">
              <h1 style="color: aliceblue;">Salutare <?php 
                                              if(isset($_SESSION['email'])){
                                                  $email=$_SESSION['email'];
                                                  $query=mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
                                                  while($row=mysqli_fetch_array($query)){
                                                  echo $row['firstName'].' '.$row['lastName'];
                                                  }
                                              }
                                              ?>
                  </h1>
                <br><br>
                <a href="homepage.php">Acasă</a>
                <a href="about.php">Despre Noi</a>
                <a href="shop.php">Magazin</a>
                <br><br>
                <a href="logout.php">Logout</a>
                
              </div>
            </div>
          </div>

        </div>
      </nav>
    </div>
  </header>
  <!-- end header section -->

  <!-- shop section -->
<main>
    <!-- Start DEMO HTML (Use the following code into your project)-->    
<div class="cart-modal-overlay">
   <div class="cart-modal">
    <br> <br> <br> <br> <br>
     <i id="close-btn" class="fas fa-times"></i>
       
        
       <div class="product-rows">
       </div>
       <div class="total">
         <h1 class="cart-total">TOTAL</h1>
           <span class="total-price">0 Ron</span>
             <button class="purchase-btn">Cumpară</button>
       </div>
     </div>
</div>
     
<!--   end of cart modal -->
 <div class="cart-btn">
   <i id="cart" class="fas fa-shopping-cart"></i>
     <span class ="cart-quantity">0</span>
 </div>
    <!-- Sort Button -->
    <button class="sort-btn" id="openPopup">Sortează După Preț</button>

    <!-- Popup for Sorting -->
    <div id="popup" class="popup" style="display:none">
        <div>
            <button class="sort-btn" id="closePopup">Închide</button>
            <button class="sort-btn" id="sort-low-to-high">Sortează de la mic la mare</button>
            <button class="sort-btn" id="sort-high-to-low">Sortează de la mare la mic</button>
        </div>
    </div>

<!-- Products Section -->
<section class="shop_section layout_padding">
  <div class="container" id="itemList">
    <div class="heading_container heading_center">
      <h2>Produsele noastre</h2>
    </div>
    <div class="row" id="productList">
      <div class="col-sm-3 col-md-3 col-lg-4" id="gogo">
        <div class="img-box card">
          <a href="review1.php"><img class="product-image" src="images/p1.png" alt=""></a>
          <button class="add-to-cart">Adaugă în coș</button>
          <span class="product-price" data-price="10">10 Ron</span>
          <div class="detail-box">
            <h6 class="product-name">Gogoașă cu căpșuni</h6>
          </div>
        </div>
      </div>
      <div class="col-sm-3 col-md-3 col-lg-4" id="gogo">
        <div class="img-box card">
        <a href="review2.php"><img class="product-image" src="images/p2.png" alt=""></a>
          <button class="add-to-cart">Adaugă în coș</button>
          <span class="product-price" data-price="9">9 Ron</span>
          <div class="detail-box">
            <h6 class="product-name">Gogoașă cu vanilie</h6>
          </div>
        </div>
      </div>
      <div class="col-sm-3 col-md-3 col-lg-4" id="gogo">
        <div class="img-box card">
        <a href="review3.php"><img class="product-image" src="images/p3.png" alt=""></a>
          <button class="add-to-cart">Adaugă în coș</button>
          <span class="product-price" data-price="12">12 Ron</span>
          <div class="detail-box">
            <h6 class="product-name">Gogoașă cu oreo</h6>
          </div>
        </div>
      </div>
      <div class="col-sm-3 col-md-3 col-lg-4" id="gogo">
        <div class="img-box card">
        <a href="review4.php"><img class="product-image" src="images/p4.png" alt=""></a>
          <button class="add-to-cart">Adaugă în coș</button>
          <span class="product-price" data-price="8">8 Ron</span>
          <div class="detail-box">
            <h6 class="product-name">Gogoașă cu Bezele</h6>
          </div>
        </div>
      </div>
      <div class="col-sm-3 col-md-3 col-lg-4" id="gogo">
        <div class="img-box card">
        <a href="review5.php"><img class="product-image" src="images/p5.png" alt=""></a>
          <button class="add-to-cart">Adaugă în coș</button>
          <span class="product-price" data-price="10">10 Ron</span>
          <div class="detail-box">
            <h6 class="product-name">Gogoașă cu caramel</h6>
          </div>
        </div>
      </div>
      <div class="col-sm-3 col-md-3 col-lg-4" id="gogo">
        <div class="img-box card">
        <a href="review6.php"><img class="product-image" src="images/p6.png" alt=""></a>
          <button class="add-to-cart">Adaugă în coș</button>
          <span class="product-price" data-price="10">10 Ron</span>
          <div class="detail-box">
            <h6 class="product-name">Gogoașă cu banane</h6>
          </div>
        </div>
      </div>
      <div class="col-sm-3 col-md-3 col-lg-4" id="gogo">
        <div class="img-box card">
        <a href="review7.php"><img class="product-image" src="images/p7.png" alt=""></a>
          <button class="add-to-cart">Adaugă în coș</button>
          <span class="product-price" data-price="9">9 Ron</span>
          <div class="detail-box">
            <h6 class="product-name">Gogoașă cu cireșe</h6>
          </div>
        </div>
      </div>
      <div class="col-sm-3 col-md-3 col-lg-4" id="gogo">
        <div class="img-box card">
        <a href="review8.php"><img class="product-image" src="images/p8.png" alt=""></a>
          <button class="add-to-cart">Adaugă în coș</button>
          <span class="product-price" data-price="10">10 Ron</span>
          <div class="detail-box">
            <h6 class="product-name">Gogoașă Simplă</h6>
          </div>
        </div>
      </div>
      <div class="col-sm-3 col-md-3 col-lg-4" id="gogo">
        <div class="img-box card">
        <a href="review9.php"><img class="product-image" src="images/p9.png" alt=""></a>
          <button class="add-to-cart">Adaugă în coș</button>
          <span class="product-price" data-price="9">9 Ron</span>
          <div class="detail-box">
            <h6 class="product-name">Gogoașă cu ciocolată</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</main>

<!-- end shop section -->

  <!-- info section -->
  <section class="info_section layout_padding2">
    <div class="container">
      <div class="row info_form_social_row">
        <div class="col-md-8 col-lg-9">
          <div class="info_form">
           
          </div>
        </div>
        <div class="col-md-4 col-lg-3">

          <div class="social_box">
            <a href="">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="row info_main_row">
        <div class="col-md-6 col-lg-3">
          <div class="info_links">
            <h4>
              Alte Pagini
            </h4>
            <div class="info_links_menu">
                <a href="homepage.php">Acasă</a>
                <a href="about.php">Despre Noi</a>
                <a href="shop.php">Magazin</a>
                <a href="logout.php">Logout</a>
              
            </div>
          </div>
        </div>
        
        
        <div class="col-md-6 col-lg-3">
          <h4>
            Contact 
          </h4>
          <div class="info_contact">
            <a href="https://maps.app.goo.gl/De33Sxx49nCMPuVv6">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>
                Locația
              </span>
            </a>
            <a href="">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>
                Sunați la +035177243
              </span>
            </a>
            <a href="">
              <i class="fa fa-envelope"></i>
              <span>
                gogo@gmail.com
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <script src="js/script.js"></script>
  <script src="js/popup.js"></script>

</body>

</html>