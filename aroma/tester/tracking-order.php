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
  <title>Aroma Shop - Cart</title>
  <link rel="icon" href="img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="vendors/linericon/style.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="vendors/nouislider/nouislider.min.css">

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
             
              <li class="nav-item" active><a class="nav-link" href="tracking-order.php">Track</a></li>
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
                  <li class="nav-item"><a class="nav-link" href="cpass.php">Change Password</a></li>
                  <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                  
                </ul>
                <?php } ?>
              </li>
            </ul>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
	<!--================ End Header Menu Area =================-->
  
	<!-- ================ start banner area ================= -->	
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Products ordered</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Order Tracking</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->
  
  
  <!--================Tracking Box Area =================-->
    <section class="cart_area">
      <div class="container">
          <div class="cart_inner">
              <div class="table-responsive">
                
                  <table class="table">
                      <thead>
                          <tr>
                              <th scope="col">Product</th>
                              <th scope="col">Price</th>
                              <th scope="col">Quantity</th>
                              <th scope="col">Total</th>
                              <th scope="col">Status</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $sum=0;
                            $q1=mysqli_query($connection,"SELECT products.id,products.pname,products.price,products.pfile,products.ifile,orders.qty,orders.status FROM products,orders WHERE (products.id=orders.pid AND $id=orders.cusid)");

                            if(mysqli_num_rows($q1)>0){
                            while($row=mysqli_fetch_array($q1)){
                              ?>
                          <tr>
                              <td>
                                  <div class="media">
                                      <div class="d-flex">
                                          <?php if($row[3]=="phone")  { ?>
                                          <a href="phone1.php?id=<?php echo $row[0] ?>"><img src="<?php echo $row[4] ?>"  height= 100px alt=""></a>
                                           <?php 
                                            } elseif($row[3]=="s")  { ?>
                                          <a href="s1.php?id=<?php echo $row[0] ?>"><img src="<?php echo $row[4] ?>"  height= 100px alt=""></a>
                                           <?php 
                                           } else  { ?>
                                          <a href="p2.php?id=<?php echo $row[0] ?>"><img src="<?php echo $row[4] ?>"  height= 100px alt=""></a>
                                           <?php } ?>
                                          
                                      </div>
                                      <div class="media-body">
                                          <p><?php echo $row[1] ?></p>
                                      </div>
                                  </div>
                              </td>
                              <td>
                                  <h5>₹<?php echo $row[2] ?></h5>
                              </td>

                              <td>
                                  <?php echo $row[5] ?>
                              </td>
                              <td>
                                  <h5>₹<?php echo $row[5]*$row[2];$sum=$sum+($row[5]*$row[2]); ?></h5>
                              </td>
                              <td>
                                  <h5><?php echo $row['status'] ?> </h5>
                              </td>
                              <td>
                                <form method="POST">
                                <h5>
                                  
                                    <?php $x=$row['status'];
                                if ($x=='Delivered'){ ?> 
                                  
                                  
                                <input type="submit" name="rmv" class="button button-header" value="remove">
                                <?php } ?> </h5>
                                
                                         
                                </form>
                              </td>
                          </tr>
                          <?php } ?>
                          

                       <?php }
                          else {
                             echo mysqli_error($connection);
                           } 
                        
                          ?>         
                          
                      </tbody>
                  </table>
                
              </div>
          </div>
      </div>
  </section>
  <!--================End Tracking Box Area =================-->



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
                <p>Guru Nanak Institute of Technology</p>
  
                <p class="sm-head">
                  <span class="fa fa-phone"></span>
                  Phone Number
                </p>
                <p>
                 8017411872 <br>
                 9330103639 <br>
                 9830775655 <br>
                 8620983940 <br>
                 8945831411 <br>
                 9804601916
                </p>
  
                <p class="sm-head">
                  <span class="fa fa-envelope"></span>
                  Email
                </p>
                <p>
                  sidban1999@gmail.com <br>
                  puja.banik.2709@gmail.com <br>
                  sunneshamudi2015@gmail.com<br>
                  diyashamajumdar1998@gmail.com<br>
                  souvikdas658@gmail.com<br>
                  tatuchakraborty710@gmail.com
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