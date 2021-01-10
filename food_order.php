<?php 
// Initialize shopping cart class 
include_once 'Cart.class.php'; 
$cart = new Cart; 
 
// Include the database config file 
require_once 'config.php'; 
?>
<!DOCTYPE html>
<html>
<!-- Required meta tags -->
        <meta charset="utf-8">
        <meta title="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Food Order Form</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/style3.css">
        <link rel="stylesheet" href="css/responsive.css">
<style>
.cartTitle {
    color: red;
    margin-top: 3rem
}

.cartPrice {
    margin-top: 3rem
}

.removeButton {
    background: Red;
    cursor: pointer;
    color: white;
    margin-top: 3rem
}

.cartQty {
    margin-top: 3rem
}

.form-control {
    color: #000;
    background-color: #e4cece;
    font-weight: 900;
    font-size: 3rem;
    padding: 0rem 1rem
}

.totalPrice {
    margin-top: 4rem
}
.productTitle {
    color: red;
    text-align: center;
}
.headingTop {
    border-top: 1px solid black;
}

.heading {
    border-bottom: 1px solid black;
    text-align: center;
	font-size:20px;
}



.cartContainer {
    margin-top: 4rem;
    text-align: center
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
	

</li><li class="nav-item"><br><a href="add_to_cart.php" class="fa fa-shopping-cart" style="font-size:28px;color:red"></a></li>
							</ul>
						</div>
					</div>
            	</nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->
		
 <!--================offers Banner Area =================-->
        <section class="banner_area" >
            <div class="box_1623">
				<div class="banner_inner d-flex align-items-center">
				<div class="container">
						<div class="banner_content text-center">
							
							<h1 style="background-color:white;">Indian Food</h1>
							
						</div>
					</div>	
				</div>
            </div>
        </section>
        <!--================End Offers Banner Area =================-->
		
		
		<!--================Main Area =================-->
		<div class="main_container">		
        <div class="parallax pricing" style="margin:10%; border:none;">
            <!-- Cart basket -->
    <div class="cart-view">
        <a href="viewCart.php" title="View Cart"><i class="icart"></i> (<?php echo ($cart->total_items() > 0)?$cart->total_items().' Items':'Empty'; ?>)</a>
    </div>
            <div class="row">
			<?php 
        // Get products from database 
        $result = $mysqli->query("SELECT * FROM indian_food ORDER BY id DESC LIMIT 10"); 
        if($result->num_rows > 0){  
            while($row = $result->fetch_assoc()){ 
        ?>
			<div class="productContainer col-md-3 col-sm-3">
            <div class="cart-image">
                <img src="img/indian_food/<?php echo $row["image"]; ?>" class='img img-responsive img-thumbnail'>
            </div>
            <div class="card-title">
                <h3><?php echo $row["name"]; ?></h3>
            </div>
			<div class="card-text">
			<p><?php echo $row["description"]; ?></p>
			</div>
            <div class="card-subtitle mb-2 text-muted">
                <h3> <?php echo '&#8377;'.$row["price"]?></h3>
            </div>
            <div>
               <a href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>" class="btn btn-primary btn-danger" >Add to Cart</a>
            </div>
        </div>
		<?php } }else{ ?>
        <p>Product(s) not found.....</p>
        <?php } ?>
		</div>
		</div>
		</div>
		<section style="clear: both;">
		<!--================offers Banner Area =================-->
        <section class="banner_area" style="background-color:#4D3836" >
            <div class="box_1623">
				<div class="banner_inner d-flex align-items-center">
				<div class="container">
						<div class="banner_content text-center">
						    
							<h1 style="background-color:white;">Beverages </h1>
							
						</div>
					</div>	
				</div>
            </div>
        </section>
        <!--================End Offers Banner Area =================-->
		
<!--================Main Area =================-->

      		<div class="main_container">
    		
        <div class="parallax pricing" style="margin:10%; border:none;">
            <!-- Cart basket -->
    <div class="cart-view">
        <a href="viewCart.php" title="View Cart"><i class="icart"></i> (<?php echo ($cart->total_items() > 0)?$cart->total_items().' Items':'Empty'; ?>)</a>
    </div>
            <div class="row">
			<?php 
        // Get products from database 
        $result = $mysqli->query("SELECT * FROM beverages ORDER BY id DESC LIMIT 10"); 
        if($result->num_rows > 0){  
            while($row = $result->fetch_assoc()){ 
        ?>
			<div class="productContainer col-md-3 col-sm-3">
            <div class="cart-image">
                <img src="img/beverages/<?php echo $row["image"]; ?>" class='img img-responsive img-thumbnail'>
            </div>
            <div class="card-title">
                <h3><?php echo $row["name"]; ?></h3>
            </div>
			<div class="card-text">
			<p><?php echo $row["description"]; ?></p>
			</div>
            <div class="card-subtitle mb-2 text-muted">
                <h3> <?php echo '&#8377;'.$row["price"]?></h3>
            </div>
            <div>
               <a href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>" class="btn btn-primary btn-danger" >Add to Cart</a>
            </div>
        </div>
		<?php } }else{ ?>
        <p>Product(s) not found.....</p>
        <?php } ?>
		</div>
		</div>
		</div>
		
	</section>	
	<section style="clear: both;">	
		<!--================offers Banner Area =================-->
        <section class="banner_area" style="background-color:#4D3836">
            <div class="box_1623">
				<div class="banner_inner d-flex align-items-center">
					<div class="container">
						<div class="banner_content text-center">
							
							<h1 style="background-color:white;">Italian Food</h1>
							
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Offers Banner Area =================-->
		
		
		<!--================Main Area =================-->
		<div class="main_container">
    	
        <div class="parallax pricing" style="margin:10%; border:none;">
            <!-- Cart basket -->
    <div class="cart-view">
        <a href="viewCart.php" title="View Cart"><i class="icart"></i> (<?php echo ($cart->total_items() > 0)?$cart->total_items().' Items':'Empty'; ?>)</a>
    </div>
            <div class="row">
			<?php 
        // Get products from database 
        $result = $mysqli->query("SELECT * FROM italian_food ORDER BY id DESC LIMIT 10"); 
        if($result->num_rows > 0){  
            while($row = $result->fetch_assoc()){ 
        ?>
			<div class="productContainer col-md-3 col-sm-3">
            <div class="cart-image">
                <img src="img/italian_food/<?php echo $row["image"]; ?>" class='img img-responsive img-thumbnail'>
            </div>
            <div class="card-title">
                <h3><?php echo $row["name"]; ?></h3>
            </div>
			<div class="card-text">
			<p><?php echo $row["description"]; ?></p>
			</div>
            <div class="card-subtitle mb-2 text-muted">
                <h3> <?php echo '&#8377;'.$row["price"]?></h3>
            </div>
            <div>
               <a href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>" class="btn btn-primary btn-danger" >Add to Cart</a>
            </div>
        </div>
		<?php } }else{ ?>
        <p>Product(s) not found.....</p>
        <?php } ?>
		</div>
		</div>
		</div>
		
		</section>
		<section style="clear: both;">
		<!--================non veg Banner Area =================-->
        <section class="banner_area" style="background-color:#4D3836">
            <div class="box_1623">
				<div class="banner_inner d-flex align-items-center">
				<div class="container">
						<div class="banner_content text-center">
						    
							<h1 style="background-color:white;">Non-Veg Food</h1>
							
						</div>
					</div>	
				</div>
            </div>
        </section>
        <!--================End non veg Banner Area =================-->
		
		
		<!--================Main Area =================-->
		<div class="main_container">		
        <div class="parallax pricing" style="margin:10%; border:none;">
            <!-- Cart basket -->
    <div class="cart-view">
        <a href="viewCart.php" title="View Cart"><i class="icart"></i> (<?php echo ($cart->total_items() > 0)?$cart->total_items().' Items':'Empty'; ?>)</a>
    </div>
            <div class="row">
			<?php 
        // Get products from database 
        $result = $mysqli->query("SELECT * FROM non_veg_food ORDER BY id DESC LIMIT 10"); 
        if($result->num_rows > 0){  
            while($row = $result->fetch_assoc()){ 
        ?>
			<div class="productContainer col-md-3 col-sm-3">
            <div class="cart-image">
                <img src="img/non_veg_food/<?php echo $row["image"]; ?>" class='img img-responsive img-thumbnail'>
            </div>
            <div class="card-title">
                <h3><?php echo $row["name"]; ?></h3>
            </div>
			<div class="card-text">
			<p><?php echo $row["description"]; ?></p>
			</div>
            <div class="card-subtitle mb-2 text-muted">
                <h3> <?php echo '&#8377;'.$row["price"]?></h3>
            </div>
            <div>
               <a href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>" class="btn btn-primary btn-danger" >Add to Cart</a>
            </div>
        </div>
		<?php } }else{ ?>
        <p>Product(s) not found.....</p>
        <?php } ?>
		</div>
		</div>
		</div>
		
</section>

	
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
	   <script src='js/addtocart.js'></script>
</body>
</html>