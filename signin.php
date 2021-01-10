<?php
include('config.php');

// Define variables and initialize with empty values

$name = "";
$email = "";
$phone = "";
$password ="";
$password_err ="";
$repeat_password_err = "";


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["repeat_password"]))){
        $repeat_password_err = "Please confirm password.";     
    } 
	else
	{
        $repeat_password = trim($_POST["repeat_password"]);
        if(empty($password_err) && ($password != $repeat_password)){
            $repeat_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($password_err) && empty($repeat_password_err)){
        
        $insert_Data = "INSERT INTO user (name, email, phone_number, password)VALUES ('$name', '$email', '$phone', '$password')";

$query = mysqli_query($mysqli, $insert_Data);

if($query){
	
	
	header('Location: login.php');
	
} 
    }
    
   
}
?>
<!DOCTYPE html>
<html>
<!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>SignIn Form</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
<style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-image {
  /* The image used */
  background-image: url("img/background/login-bg.jpg");
  
  /* Add the blur effect */
  filter: blur(8px);
  -webkit-filter: blur(8px);
  
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
 
  background-repeat: no-repeat;
  background-size: cover;
}


.container1{
background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 60%;
margin-top:5%;  
}
input[type=text], input[type=password], input[type=submit]{
 width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

input[type=text]:focus, input[type=password]:focus  {
  background-color: #ddd;
  outline: none;
}


.signupbtn{
   background-color:#fcab63;
  color: black;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: auto;
}

.signupbtn:hover {
  opacity: 1;
}
form{
margin-bottom:10%;
}

</style>
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
							</ul>
						</div>
					</div>
            	</nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->
		
		
		<!--================Main Area =================-->
<div class="bg-image"></div>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
  <div class="container1">
    <h3 align="center">Sign Up</h3>
	<label for="user_name"> Name</label>
    <input type="text" placeholder="Enter you name" name="name" required>

    <label for="email">Email</label>
    <input type="text" placeholder="Enter Email" name="email" required>
	
	<label for="phone">Phone Number</label>
    <input type="text" placeholder="Enter phone number" name="phone" required>
<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
    <label for="psw">Password</label>
   
   <input type="password" placeholder="Enter Password" name="password" required>
<span class="help-block"><?php echo $password_err; ?></span></div>
<div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
    <label for="psw-repeat">Repeat Password</label>
    <input type="password" placeholder="Repeat Password" name="repeat_password" required>
    <span><?php echo $repeat_password_err; ?></span>
    </div><label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>
    
     
      <input type="Submit" class="signupbtn" value="Signup" name="signup">
   
  </div>
</form>

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