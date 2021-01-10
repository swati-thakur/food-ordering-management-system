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
        <title>Food Ordering management System</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">   
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
        <section class="home_banner_area">
           	<div class="box_1620">
           		<div class="banner_inner d-flex align-items-center">
					<div class="container">
						<div class="banner_content text-center">
							<h3>Food <br />Ordering Management System</h3>
							
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Home Blog Area =================-->
        <section class="home_blog_area pad_top">
        	<div class="container">
        		<div class="home_blog_inner">
        			<div class="row h_blog_item">
        				<div class="col-lg-6">
							<div class="h_blog_img">
								<img class="img-fluid" src="img/home-blog/h-blog-1.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="h_blog_text">
								<div class="h_blog_text_inner left">
									<h4>Italian Food</h4>
									<p>Italian cuisine is a Mediterranean cuisine consisting of the ingredients, recipes and cooking techniques developed across the Italian Peninsula since the antiquity, and later spread around the world together with waves of Italian diaspora.</p>
									<a class="btn btn-danger" href="food_order.php">Order now</a>
								</div>
							</div>
						</div>
        			</div>
        			<div class="row h_blog_item">
						<div class="col-lg-6">
							<div class="h_blog_text">
								<div class="h_blog_text_inner right">
									<h4>Beverages</h4>
									<p>A drink is a liquid intended for human consumption. In addition to their basic function of satisfying thirst, drinks play important roles in human culture. Common types of drinks include plain drinking water, milk, coffee, tea, hot chocolate, juice and soft drinks.</p>
									<a class="btn btn-danger" href="food_order.php">Order now</a>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="h_blog_img">
								<img class="img-fluid" src="img/home-blog/h-blog-2.jpg" alt="">
							</div>
						</div>
        			</div>
        			<div class="row h_blog_item">
        				<div class="col-lg-6">
							<div class="h_blog_img">
								<img class="img-fluid" src="img/home-blog/h-blog-3.jpg" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="h_blog_text">
								<div class="h_blog_text_inner left">
									<h4>Indian Food</h4>
									<p>Indian cuisine consists of a variety of regional and traditional cuisines native to the Indian subcontinent. Given the diversity in soil, climate, culture, ethnic groups, and occupations, these cuisines vary substantially and use locally available spices, herbs, vegetables, and fruits.</p>
									<a class="btn btn-danger" href="food_order.php">Order now</a>
								</div>
							</div>
						</div>
        			</div>
        			<div class="row h_blog_item">
						<div class="col-lg-6">
							<div class="h_blog_text">
								<div class="h_blog_text_inner right">
									<h4>Non-Veg Food</h4>
									<p>A non-vegetarian diet includes chicken, meat, eggs and fish. A non-vegetarian diet also has several health benefits because this type of food is rich in protein and vitamin B. Non-vegetarian food strengthens our muscles and helps them grow faster. It also helps to maintain body stamina and hemoglobin.</p>
									<a class="btn btn-danger" href="food_order.php">Order now</a>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="h_blog_img">
								<img class="img-fluid" src="img/home-blog/h-blog-4.jpg" alt="">
							</div>
						</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Home Blog Area =================-->
     

        
        
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
		
		
    </body>
</html>