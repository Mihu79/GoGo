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
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="stylesheet" href="css/style1.css" />
	<!-- Demo CSS (No need to include it into your project) -->
	<link rel="stylesheet" href="css/demo1.css">

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
  <header class="header_section">
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

  <!-- slider section -->
  <section class="slider_section position-relative">
    <div class="slider_bg_box">
      <img src="images/slider-bg.jpg" alt="">
    </div>
    <div class="slider_bg"></div>
    <div class="container">
      <div class="col-md-9 col-lg-8">
        <div class="detail-box">
          <h1>
            Gogoșerie
            
          </h1>
          <p>
            Gogoșile sunt deserturi delicioase, prăjite în ulei și acoperite cu zahăr sau glazură. Ele sunt populare în întreaga lume pentru gustul lor dulce și textura pufoasă.
          </p>
          <div>
            <a href="shop.php" class="slider-link">
              Cumpără Acum
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end slider section -->

  <!-- shop section -->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Produsele noastre
        </h2>
      </div>
      <div class="row">
        <div class="col-sm-3 col-md-3 col-lg-4">

        
          
          <div class="img-box card">
            <img class="product-image" src="images/p1.png" alt="">
            
                <span class="product-price">9 Ron</span>
            <div class="detail-box">
              <h6>
                Gogoașă cu căpșuni
              </h6>
              
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-4">

        
          
          <div class="img-box card">
            <img class="product-image" src="images/p2.png" alt="">
            
                <span class="product-price">9 Ron</span>
            <div class="detail-box">
              <h6>
                Gogoașă cu vanilie
              </h6>
              
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-4">

        
          
          <div class="img-box card">
            <img class="product-image" src="images/p3.png" alt="">
            
                <span class="product-price">9 Ron</span>
            <div class="detail-box">
              <h6>
                Gogoașă cu oreo
              </h6>
              
            </div>
          </div>
        </div>
        

        
          
         
  <div class="container">   
    <div class="btn-box">
        <a href="shop.php">
          Vezi toate produsele
        </a>
    </div>
  </div>   
      </div>
  </section>

  <!-- end shop section -->

  <!-- about section -->

  <section class="about_section  ">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/about-img.jpg" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Despre Gogoși
              </h2>
            </div>
            <p>
              Gogoșile, sau "doughnuts" în limba engleză, sunt deserturi coapte sau prăjite, preparate din aluat dospit, iar apoi acoperite cu diverse arome, precum ciocolată, vanilie sau scortisoară. Aceste delicii sunt adorate în special la micul dejun sau în pauzele dulci.
            </p>
            
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->


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
       
        
        <div class="col-md-7 col-lg-3">
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

</body>

</html>