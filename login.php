<?php

// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
 
// Include config file
include('config.php');
 
// Define variables and initialize with empty values
$name ="";
$password = "";
$name_err ="";
$password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter username.";
    } else{
        $name = trim($_POST["name"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $mysqli->prepare('SELECT id, password FROM user WHERE name = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['name']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	if ($_POST['password'] === $password) {
		// Verification success! User has loggedin!
		// Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
		session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["name"] = $name;                            
                            
                            // Redirect user to welcome page
                            header("location: index.php");
	} else {
		// Incorrect password
		$password_err = "The password you entered was not valid.";
	}
} else {
	// Incorrect username
	$username_err = "No account found with that username.";
}


	$stmt->close();
}


        }
    
    
    // Close connection
    mysqli_close($mysqli);

?>

           


<!DOCTYPE html>
<html>
<head>
<!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login Form</title>
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

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: black;
  color:white;
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
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 30%;
  border-radius: 50%;
}

.container1 {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}



.loginbtn{
   background-color:#fcab63;
  color: black;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: auto;
}

.loginbtn:hover {
  opacity: 1;
}
form{
margin-bottom:10%;
}
</style>
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
    <h3 align="center">LogIn</h3>
	<div class="imgcontainer">
    <img src="img/testimonials/testi-2.jpg" alt="Avatar" class="avatar">
  </div>
	<div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
	<label for="user_name"> Name</label>
    <input type="text" placeholder="Enter you name" name="name" required>
<span class="help-block"><?php echo $name_err; ?></span>
</div>
    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
    <label for="psw">Password</label>
    <input type="password" placeholder="Enter Password" name="password" required>
	<span class="help-block"><?php echo $password_err; ?></span>
            </div>
    
     
      <input type="Submit" class="loginbtn" value="LogIn" name="login">
	  
	  
	  <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>
	
	<label><a href="signin.php">SignIn </a></label>
    
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
