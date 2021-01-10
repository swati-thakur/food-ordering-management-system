<?php 
	
	session_start();
	include('config.php');
	// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
	$msg = "";
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		if(isset($_POST['submit'])) {
			$name=$_POST['name'];
			$guest = preg_replace("#[^0-9]#", "", $_POST['no_of_guest']);
			$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
			$phone = preg_replace("#[^0-9]#", "", $_POST['phone']);
			$date_res = htmlentities($_POST['date_res'], ENT_QUOTES, 'UTF-8');
			$time = htmlentities($_POST['time'], ENT_QUOTES, 'UTF-8');
			
			if($guest != "" && $email && $phone != "" && $date_res != "" && $time != "" && $name != "") {
				
				$check = $mysqli->query("SELECT * FROM reservation WHERE name='".$name."' AND no_of_guest='".$guest."' AND email='".$email."' AND phone='".$phone."' AND date_res='".$date_res."' AND time='".$time."' LIMIT 1");
				
				if($check->num_rows) {
					
					$msg = "<p style='padding: 15px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>You have already placed a reservation with the same information</p>";
					
				}
				else
				{
					
					$insert = $mysqli->query("INSERT INTO reservation(name,no_of_guest, email, phone, date_res, time) VALUES('".$name."','".$guest."', '".$email."', '".$phone."', '".$date_res."', '".$time."')");
					
					if($insert) {
						
						$ins_id = $mysqli->insert_id;
						
						$reserve_code = "UNIQUE_$ins_id".substr($phone, 3, 8);
						
						$msg = "<p style='padding: 15px; color: green; background: #eeffee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Reservation placed successfully. Your reservation code is $reserve_code. Please Note that reservation expires after one hour</p>";
						
					}else{
						
						$msg = "<p style='padding: 15px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Could not place reservation. Please try again</p>";
						
					}
					
				}
				
			}else{
				
				$msg = "<p style='padding: 15px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Incomplete form data or Invalid data type</p>";
				
				print_r($_POST);
				
			}
			
		}
		
	}
	
?>
<!DOCTYPE html>
<html>
<!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Reservation Form</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
		
		
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/style3.css">
        <link rel="stylesheet" href="css/responsive.css">
		
		

<body>
<!--================Header Menu Area =================-->
        <header class="header_area" >
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
								<li class="nav-item"><p><br><br>
        <a href="reset_password.php" class="btn btn-warning">Reset Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out</a>
    </p></li >
							</ul>
						</div>
					</div>
            	</nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->
		
 <!--================offers Banner Area =================-->
 <!-- Backgound Image -->
        <section class="banner_area" >
            <div class="box_1622">
				<div class="banner_inner d-flex align-items-center">
					
				</div>
            </div>
        </section>
		<!-- /Backgound Image -->
        <!--================End Offers Banner Area =================-->
		
		
		<!--================Main Area =================-->
<!-- Reservation -->
		<div id="reservation" class="section">

		
			<div>
								<?php echo "<br/>".$msg; ?>
								</div>

			<!-- container -->
			<section class="contact_area p_120">
            <div class="container">

				<!-- row -->
				<div class="row">

					<!-- reservation form -->
					<div class="col-md-6 col-md-offset-1 col-sm-10 col-sm-offset-1">
						<form class="reserve-form row" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
							<div class="section-header text-center">
								<h4 class="sub-title">Reservation</h4>
								<h2 class="title white-text">Book Your Table</h2>
								
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Name:</label>
									<input class="input" type="text" name="name" placeholder="Name" id="name" required>
								</div>
								<div class="form-group">
									<label for="phone">Phone:</label>
									<input class="input" type="tel" name="phone" placeholder="Phone" id="phone" required>
								</div>
								<div class="form-group">
									<label for="date">Date:</label>
									<input class="input" type="date" name="date_res" placeholder="Select date for booking" required>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="email">Email:</label>
									<input class="input" type="email" name="email" placeholder="Email" id="email" required>
								</div>
								<div class="form-group">
									<label for="number">Number of Guests:</label>
									<select class="input" id="number" name="no_of_guest">
										<option>1 Person</option>
										<option>2 People</option>
										<option>3 People</option>
										<option>4 People</option>
										<option>5 People</option>
										<option>6 People</option>
									</select>
								</div>
								<div class="form-group">
								  <label for="time">Time:</label>
								  <input  class="input" type="time" name="time" placeholder="Select time for booking" required>
								</div>
							</div>

							<div class="col-md-12 text-center">
								<button class="main-button" name="submit">Book Now</button>
							</div>

						</form>
					</div>
					<!-- /reservation form -->

					<!-- opening time -->
					<div class="col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1">
						<div class="opening-time row">
							<div class="section-header text-center">
								<h2 class="title white-text">Opening Time</h2>
							</div>
							<ul>
								<li>
									<h4 class="day"><span style="color:orange;">Sunday</span> 8:00 am – 11:00 pm</h4>
									
								</li>
								<li>
									<h4 class="day"><span style="color:orange;">Monday</span>  8:00 am – 11:00 pm</h4>
									
								</li>
								<li>
									<h4 class="day"><span style="color:orange;">Tuesday</span> 8:00 am – 11:00 pm</h4>
									
								</li>
								<li>
									<h4 class="day"><span style="color:orange;">Wednesday</span> 8:00 am – 11:00 pm</h4>
									
								</li>
								<li>
									<h4 class="day"><span style="color:orange;">Thursday</span> 8:00 am – 11:00 pm</h4>
									
								</li>
								<li>
									<h4 class="day"><span style="color:orange;">Friday</span> Closed</h4>
									
								</li>
								<li>
									<h4 class="day"><span style="color:orange;">Saturday</span> Closed</h4>
									
								</li>
							</ul>
						</div>
					</div>
					<!-- /opening time -->

				</div>
				<!-- /row -->

			</div>
        </section>
			<!-- /container -->

		</div>
		<!-- /Reservation -->

 
<!--================Main Area =================-->

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