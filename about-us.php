<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>About Us</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="main_menu">
            	<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" href="index.php"><img src="img/logo.png" alt="" height="80px"></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
								<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li> 
								<li class="nav-item"><a class="nav-link" href="about-us.php">About</a></li>
                                  <li class="nav-item"><a class="nav-link" href="offers.php">Offers</a></li>	
                                    <li class="nav-item"><a class="nav-link" href="reservation.php">Reservation</a></li> 
									<li class="nav-item"><a class="nav-link" href="login.php">LogIn</a></li> 
								<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
								<li class="nav-item"><b><br><br><?php echo htmlspecialchars($_SESSION["name"]); ?></b></li>
								<li class="nav-item"><h1><br>
        <a href="reset_password.php" class="btn btn-warning">Reset Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out</a>
    </h1></li >
							</ul>
						</div> 
					</div>
            	</nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->
        
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="box_1620">
				<div class="banner_inner d-flex align-items-center">
					<div class="container">
						<div class="banner_content text-center">
							<h2>About Us</h2>
							<div class="page_link">
								<a href="index.php">Home</a>
								<a href="about-us.php">About Us</a>
							</div>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================About Area =================-->
        <section class="about_area pad_top">
        	<div class="container">
        		<div class="about_inner row">
        			<div class="col-lg-6">
        				<div class="about_text">
        					<p>“We want to ensure we give all of our customers the best service all of the time.”</p>
        			
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "We deliver Quality. Try us and then buy us!" &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </p></div>
        			</div>
        			<div class="col-lg-6">
        				<div class="about_img"><img class="img-fluid" src="img/about-1.jpg" alt=""></div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End About Area =================-->
        
     
        <!--================Service Area =================-->
        <section class="service_area p_120">
        	<div class="container box_1620">
        		<div class="main_title">
        			<h2>Services Offered by Us</h2>
        			
        		</div>
        		<div class="row m0 service_inner">
        			<div class="col-lg-3 col-md-6 p0">
        				<div class="service_img">
        					<img class="img-fluid" src="img/service/service-1.jpg" alt="">
        				</div>
        			</div>
        			<div class="col-lg-3 col-md-6 p0">
        				<div class="service_text">
        					<h4>8am to 11pm Food Delivery</h4>
        					<p>Providing a food delivery.</p>
        				</div>
        			</div>
        			<div class="col-lg-3 col-md-6 p0">
        				<div class="service_img">
        					<img class="img-fluid" src="img/service/service-2.jpg" alt="">
        				</div>
        			</div>
        			<div class="col-lg-3 col-md-6 p0">
        				<div class="service_text">
        					<h4>Advance Table Booking</h4>
        					<p>A advance table booking is an arrangement made in advance to have a table available at a restaurant.</p>
        				</div>
        			</div>
        			<div class="col-lg-3 col-md-6 p0">
        				<div class="service_text">
        					<h4>Customer Feedback</h4>
        					<p>Happy customers mean repeat visits and a healthy revenue stream for your restaurant. And collecting restaurant feedback from your customers is always a great idea to understand what keeps them happy.</p>
        				</div>
        			</div>
        			<div class="col-lg-3 col-md-6 p0">
        				<div class="service_img">
        					<img class="img-fluid" src="img/service/service-3.jpg" alt="">
        				</div>
        			</div>
        			<div class="col-lg-3 col-md-6 p0">
        				<div class="service_text">
        					<h4>Advance Food Ordering</h4>
        					<p>Customers are able to choose when they want their food while still placing an order at any time. Customers can specify if they want the order now or later on.</p>
        				</div>
        			</div>
        			<div class="col-lg-3 col-md-6 p0">
        				<div class="service_img">
        					<img class="img-fluid" src="img/service/service-4.jpg" alt="">
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Service Area =================-->
        
             <!--================Feedback Area =================-->
        <section class="feedback_area pad_bt">
        	<div class="container">
        		<div class="feedback_inner p_100">
        			<div class="row">
        				<div class="col-lg-5">
        					<div class="feedback_text">
        						<h3>Client’s Feedback</h3>
        						<p>Happy customers mean repeat visits and a healthy revenue stream for your restaurant. And collecting restaurant feedback from your customers is always a great idea to understand what keeps them happy.</p>
        					</div>
        				</div>
        				<div class="col-lg-7">
							<div class="testi_slider_inner">
								<div class="testi_slider owl-carousel">
									<div class="item">
										<div class="media">
											<div class="d-flex">
												<img src="img/testimonials/testi-1.jpg" alt="">
											</div>
											<div class="media-body">
												<p>“Amazing service as well as nice food.”</p>
												<h4>Swati Thakur</h4>
												
											</div>
										</div>
									</div>
									<div class="item">
										<div class="media">
											<div class="d-flex">
												<img src="img/testimonials/testi-1.jpg" alt="">
											</div>
											<div class="media-body">
												<p>“Lovely Food”</p>
												<h4>Samira</h4>
												
											</div>
										</div>
									</div>
									<div class="item">
										<div class="media">
											<div class="d-flex">
												<img src="img/testimonials/testi-1.jpg" alt="">
											</div>
											<div class="media-body">
												<p>“Nyc food.”</p>
												<h4>Kamira</h4>
												
											</div>
										</div>
									</div>
								</div>
							</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Feedback Area =================-->
        
        <!--================Instagram Area =================-->
        <section class="instagram_area">
        	<div class="container box_1620">
        		<div class="insta_btn">
        			<a class="btn theme_btn" href="http://instagram.com">Follow us on instagram</a>
        		</div>
        		<div class="instagram_image row m0">
        			<a href="#"><img src="img/instagram/ins-1.jpg" alt=""></a>
        			<a href="#"><img src="img/instagram/ins-2.jpg" alt=""></a>
        			<a href="#"><img src="img/instagram/ins-3.jpg" alt=""></a>
        			<a href="#"><img src="img/instagram/ins-4.jpg" alt=""></a>
        			<a href="#"><img src="img/instagram/ins-5.jpg" alt=""></a>
        			<a href="#"><img src="img/instagram/ins-6.jpg" alt=""></a>
        		</div>
        	</div>
        </section>
        <!--================End Instagram Area =================-->
        
        <!--================Footer Area =================-->
        <footer class="footer_area">
        
        </footer>
        <!--================End Footer Area =================-->
        
        
        
        
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/theme.js"></script>
</html>