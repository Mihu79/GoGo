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

  <title>GoGo</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <link href="css/review.css" rel="stylesheet" />
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

  <!-- about section -->

  <section class="about_section  layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/p7.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
              Gogoașă cu cireșe
              </h2>
            </div>
            <div class="rating-ystem">
        <div class="stars">
            <span class="star" data-value="1">&#9733;</span>
            <span class="star" data-value="2">&#9733;</span>
            <span class="star" data-value="3">&#9733;</span>
            <span class="star" data-value="4">&#9733;</span>
            <span class="star" data-value="5">&#9733;</span>
        </div>
        <textarea id="review" placeholder="Spune-ne părerea ta despre această gogoșă aici..."></textarea>
        <button id="postBtn">Post</button>
        <div class="reviews-container">
            <ul id="reviewsList"></ul>
        </div>
    </div>

            
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->
  <br>
  <br>
  <br>
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
  <script src="js/review/review7.js"></script>

</body>

</html>