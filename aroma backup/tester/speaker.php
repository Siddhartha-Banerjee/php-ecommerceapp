<?php include('config.php');
if(!isset($_SESSION['web12']))
{ ?> <script type="text/javascript">window.location.href="login1.php"</script>
<?php } ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aroma Shop - Home</title>
  <link rel="icon" href="img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">

  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <!--================ Start Header Menu Area =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="index.php"><img src="img/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
             
              <li class="nav-item"><a class="nav-link" href="tracking-order.php">Track</a></li>
              <li class="nav-item"><a class="nav-link" href="contact1.php">Contact us/About</a></li>
            </ul>
            <ul class="nav-shop">
              <form method="POST" action="search.php">
                 <li class="nav-item"><input type="text" name="product" placeholder="Search Product"></li>
              <button><i class="ti-search"></i></button>
              </form>
              <?php $id=$_SESSION['web12']['id']; 
                $q=mysqli_query($connection,"SELECT * FROM cart$id");
                $count=mysqli_num_rows($q); ?>
              <br>
              <a href="cart.php"><li class="nav-item"><button><i class="ti-shopping-cart"></i><span class="nav-shop__circle"><?php echo $count ?></span></button> </li></a>
                   <?php if(isset($_SESSION['web12'])) {  ?>
               <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
               <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false"><h5><i class="fa fa-user fa-2x"></i>  <?php echo $_SESSION['web12']['username'] ?></h5></a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                  <li class="nav-item"><a class="nav-link" href="cpass.php">Change Password</a></li>
                </ul>

              </li>
            </ul>
         <?php   } ?>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <!--================ End Header Menu Area =================-->

  <main class="site-main">
    
    <!--================ Hero banner start =================-->
    <!-- <section class="hero-banner">
      <div class="container">
        <div class="row no-gutters align-items-center pt-60px">
          <div class="col-5 d-none d-sm-block">
            <div class="hero-banner__img">
              <img class="img-fluid" src="img/home/hero-banner.png" alt="">
            </div>
          </div>
          <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
            <div class="hero-banner__content">
              <h4>Shopping is fun</h4>
              <h1>Browse Our Premium Product</h1>
              <h5> <p>Choose from our wide range of affordable speakers</p></h5>
               
            </div>
          </div>
        </div>
      </div>
    </section>
     --><!--================ Hero banner start =================-->

    <!--================ Hero Carousel start =================-->
    <section class="section-margin mt-0">
      <div class="owl-carousel owl-theme hero-carousel">
        <div class="hero-carousel__slide">
          <img src="img/home/hero-slide1.jpg" alt="" class="img-fluid">
          <a href="phone.php" class="hero-carousel__slideOverlay">
            <h3>Phones</h3>
          </a>
        </div>
        <div class="hero-carousel__slide">
          <img src="img/home/hero-slide2.png" alt="" class="img-fluid">
          <a href="#" class="hero-carousel__slideOverlay">
            <h3>Speakers</h3>
            <h3>Headphones</h3>
          </a>
        </div>
        <div class="hero-carousel__slide">
          <img src="img/home/hero-slide3.png" alt="" class="img-fluid">
          <a href="power-bank.php" class="hero-carousel__slideOverlay">
            <h3>Accessories items</h3>
          </a>
        </div>
      </div>
    </section>
    <!--================ Hero Carousel end =================-->

    <!-- ================ trending product section start ================= -->  
    <section class="section-margin calc-60px">
      <div class="container">
        <div class="section-intro pb-60px">
          <h2>Speakers</h2>
        </div>
        <div class="row">
          <?php $q=mysqli_query($connection,"SELECT * FROM products WHERE pfile LIKE 's%'");
          $count=mysqli_num_rows($q);
          
          if($count>=1)
            { while($row=mysqli_fetch_array($q))
              { ?>
          <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="card text-center card-product">
              <div class="card-product__img">
               <a href="s1.php?id=<?php echo $row[0] ?>"><img class="card-img" src="<?php echo $row[3] ?>" height=250px alt=""></a>
                <ul class="card-product__imgOverlay">
                  <li><a href="s1.php?id=<?php echo $row[0] ?>"><button><i class="ti-search"></i></button></a></li>
                  <li><a href="s1.php?id=<?php echo $row[0] ?>"><button><i class="ti-shopping-cart"></i></button></a></li>
                  <li><a href="s1.php?id=<?php echo $row[0] ?>"><button><i class="ti-heart"></i></button></li>
                </ul>
              </div>
              <div class="card-body">
                 
                <h4 class="card-product__title"><a href="s1.php?id=<?php echo $row[0] ?>"><?php echo $row[1] ?></a></h4>
                <p class="card-product__price">₹ <?php echo $row[4] ?></p>
              </div>
            </div>
          </div>
          <?php } } ?>          
      </div>
    </section>
    <!-- ================ trending product section end ================= -->  


    <!-- ================ offer section start ================= --> 
    <section class="offer" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 20px 30px" data-top-bottom="background-position: 0 20px">
      <div class="container">
        <div class="row">
          <div class="col-xl-5">
            <div class="offer__content text-center">
              <h3>Up To 50% Off</h3>
              <h4>Winter Sale</h4>
              <p>Him she'd let them sixth saw light</p>
              <a class="button button--active mt-3 mt-xl-4" href="#">Shop Now</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ offer section end ================= --> 

   
    
    <!-- ================ Subscribe section start ================= --> 
    <section class="subscribe-position">
      <div class="container">
        <div class="subscribe text-center">
          <h3 class="subscribe__title">Get Update From Anywhere</h3>
          <p>Bearing Void gathering light light his eavening unto dont afraid</p>
          <div id="mc_embed_signup">
            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe-form form-inline mt-5 pt-1">
              <div class="form-group ml-sm-auto">
                <input class="form-control mb-1" type="email" name="EMAIL" placeholder="Enter your email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '" >
                <div class="info"></div>
              </div>
              <button class="button button-subscribe mr-auto mb-1" type="submit">Subscribe Now</button>
              <div style="position: absolute; left: -5000px;">
                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
              </div>

            </form>
          </div>
          
        </div>
      </div>
    </section>
    <!-- ================ Subscribe section end ================= --> 

    

  </main>


  <!--================ Start footer Area  =================-->  
  <footer class="footer">
    <div class="footer-area">
      <div class="container">
        <div class="row section_gap">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="single-footer-widget tp_widgets">
              <h4 class="footer_title large_title">Our Mission</h4>
              <p>
                So seed seed green that winged cattle in. Gathering thing made fly you're no 
                divided deep moved us lan Gathering thing us land years living.
              </p>
              <p>
                So seed seed green that winged cattle in. Gathering thing made fly you're no divided deep moved 
              </p>
            </div>
          </div>
          <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
            <div class="single-footer-widget tp_widgets">
              <h4 class="footer_title">Quick Links</h4>
              <ul class="list">
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php">Product</a></li>
                <li><a href="contact1.php">Contact</a></li>
              </ul>
            </div>
          </div>
          
          <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
            <div class="single-footer-widget tp_widgets">
              <h4 class="footer_title">Contact Us</h4>
              <div class="ml-40">
                <p class="sm-head">
                  <span class="fa fa-location-arrow"></span>
                  Head Office
                </p>
                <p>123, SDF Block , Secter V , Saltlake</p>
  
                <p class="sm-head">
                  <span class="fa fa-phone"></span>
                  Phone Number
                </p>
                <p>
                 8017411872 <br>
                 9330103639 <br>
                 9748449538
                </p>
  
                <p class="sm-head">
                  <span class="fa fa-envelope"></span>
                  Email
                </p>
                <p>
                  sisban1999@gmail.com <br>
                  puja.banik.2709@gmail.com <br>
                  sohom138@gmail.com
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">
        <div class="row d-flex">
          <p class="col-lg-12 footer-text text-center">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div>
      </div>
    </div>
  </footer>
  <!--================ End footer Area  =================-->



  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="vendors/skrollr.min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="vendors/nice-select/jquery.nice-select.min.js"></script>
  <script src="vendors/jquery.ajaxchimp.min.js"></script>
  <script src="vendors/mail-script.js"></script>
  <script src="js/main.js"></script>
</body>
</html>