<?php 
// Include the database config file 
require_once 'config.php'; 
 
// Initialize shopping cart class 
include_once 'Cart.class.php'; 
$cart = new Cart; 
 
// If the cart is empty, redirect to the products page 
if($cart->total_items() <= 0){ 
    header("Location: food_order.php"); 
} 
 
// Get posted data from session 
$postData = !empty($_SESSION['postData'])?$_SESSION['postData']:array(); 
unset($_SESSION['postData']); 
 
// Get status message from session 
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:''; 
if(!empty($sessData['status']['msg'])){ 
    $statusMsg = $sessData['status']['msg']; 
    $statusMsgType = $sessData['status']['type']; 
    unset($_SESSION['sessData']['status']); 
} 
?>

<!DOCTYPE html>
<html>
<!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Checkout Form</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
		
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/style3.css">
        <link rel="stylesheet" href="css/responsive.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
<style>

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}



input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: red;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: red;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}


</style>		

<body style="background-color:#4D3836">
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
							</ul>
						</div>
					</div>
            	</nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->
		<!--================offers Banner Area =================-->
        <section class="banner_area" >
            <div class="box_1620">
				<div class="banner_inner d-flex align-items-center">
				<div class="container">
						<div class="banner_content text-center">
							
							<h1 style="background-color:white;">CHECKOUT</h1>
							
						</div>
					</div>	
				</div>
            </div>
        </section>
        <!--================End Offers Banner Area =================-->

		
		
		<!--================Main Area =================-->
		
<div class="container" style="margin-top:10%; margin-bottom:10%;">
    
    <div class="col-12">
        <div class="checkout">
            <div class="row">
                <?php if(!empty($statusMsg) && ($statusMsgType == 'success')){ ?>
                <div class="col-md-12">
                    <div class="alert alert-success"><?php echo $statusMsg; ?></div>
                </div>
				<?php } ?>
                
				
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your Cart</span>
                        <span class="badge badge-secondary badge-pill"><?php echo $cart->total_items(); ?></span>
                    </h4>
                    <ul class="list-group mb-3">
                        <?php 
                        if($cart->total_items() > 0){ 
                            //get cart items from session 
                            $cartItems = $cart->contents(); 
                            foreach($cartItems as $item){ 
                        ?>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0"><?php echo $item["name"]; ?></h6>
                                <small class="text-muted"><?php echo '&#8377;'.$item["price"]; ?>(<?php echo $item["qty"]; ?>)</small>
                            </div>
                            <span class="text-muted"><?php echo '&#8377;'.$item["subtotal"]; ?></span>
                        </li>
                        <?php } } ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (&#8377;)</span>
                            <strong><?php echo '&#8377;'.$cart->total(); ?></strong>
                        </li>
                    </ul>
                    <a href="food_order.php" class="btn btn-block btn-info">Add Items</a>
                </div>
                <div class="col-md-8 order-md-1">
                    <h3 class="mb-3">Contact Details</h3>
                    <form method="post" action="cartAction.php">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" name="first_name" value="<?php echo !empty($postData['first_name'])?$postData['first_name']:''; ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" name="last_name" value="<?php echo !empty($postData['last_name'])?$postData['last_name']:''; ?>" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo !empty($postData['email'])?$postData['email']:''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" value="<?php echo !empty($postData['phone'])?$postData['phone']:''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="last_name">Address</label>
                            <input type="text" class="form-control" name="address" value="<?php echo !empty($postData['address'])?$postData['address']:''; ?>" required>
                        </div>
                        
                    
					
					<div>
					<h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" >
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" >
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" >
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" >
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" >
              </div>
            </div>
			</div>
			<input type="hidden" name="action" value="placeOrder"/>
                        <input class=" btn-success btn btn-lg btn-block btn-primary btn-danger" type="submit" name="checkoutSubmit" value="Place Order">
			</form>
                </div>
            </div>
        </div>
    </div>
</div>
       
 
<!--================Main Area =================-->

<!--================Instagram Area =================-->
        <section class="instagram_area" style="clear: both;">
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
        <footer class="footer_area" style="clear: both;">
        	
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