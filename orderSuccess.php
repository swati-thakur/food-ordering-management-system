<?php 
if(!isset($_REQUEST['id'])){ 
    header("Location: food_order.php"); 
} 
 
// Include the database config file 
require_once 'config.php'; 
 
// Fetch order details from database 
$result = $mysqli->query("SELECT r.*, c.first_name, c.last_name, c.email, c.phone FROM orders as r LEFT JOIN customers as c ON c.id = r.customer_id WHERE r.id = ".$_REQUEST['id']); 
 
if($result->num_rows > 0){ 
    $orderInfo = $result->fetch_assoc(); 
}else{ 
    header("Location: food_order.php"); 
} 
?>





<!DOCTYPE html>
<html>
<!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Order Information Form</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
		
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/style3.css">
        <link rel="stylesheet" href="css/responsive.css">
		

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
							
							<h1 style="background-color:white;">ORDER INFORMATION</h1>
							
						</div>
					</div>	
				</div>
            </div>
        </section>
        <!--================End Offers Banner Area =================-->
		
		
		<!--================Main Area =================-->
		
<div class="container" style="margin-top:10%; margin-bottom:10%;">
    <div class="col-12">
        <?php if(!empty($orderInfo)){ ?>
            <div class="col-md-12" style="margin-bottom:10%;">
                <div class="alert alert-success">Your order has been placed successfully.</div>
            </div>
			
            <!-- Order status & shipping info -->
          <div style="margin-bottom:10%; margin-top:10%;">
                <center><div class="hdr"><b><u>ORDER INFORMATION</b></u></div></center>
                <H3><b>Reference ID:</b> #<?php echo $orderInfo['id']; ?></H3>
                <H3><b>Total:</b> <?php echo '$'.$orderInfo['grand_total'].' &#8377;'; ?></H3>
                <H3><b>Placed On:</b> <?php echo $orderInfo['created']; ?></H3>
                <H3><b>Buyer Name:</b> <?php echo $orderInfo['first_name'].' '.$orderInfo['last_name']; ?></H3>
                <H3><b>Email:</b> <?php echo $orderInfo['email']; ?></H3>
                <H3><b>Phone:</b> <?php echo $orderInfo['phone']; ?></H3>
            
			</div>
            <!-- Order items -->
            <div class="row col-lg-12" style="margin-bottom:10%; ">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>QTY</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Get order items from the database 
                        $result = $mysqli->query("SELECT i.*, p.name, p.price FROM order_items as i LEFT JOIN indian_food as p ON p.id = i.product_id WHERE i.order_id = ".$orderInfo['id']); 
                        if($result && $result->num_rows){  
                            while($item = $result->fetch_assoc()){ 
                                $price = $item["price"]; 
                                $quantity = $item["quantity"]; 
                                $sub_total = ($price*$quantity); 
                        ?>
						
                        <tr>
                            <td><b>Indian</b>&nbsp;<?php echo $item["name"]; ?></td>
                            <td><?php echo '$'.$price.' &#8377;'; ?></td>
                            <td><?php echo $quantity; ?></td>
                            <td><?php echo '$'.$sub_total.' &#8377;'; ?></td>
                        </tr>
                        <?php } 
                        }  } else{ ?>
        <div class="col-md-12">
            <div class="alert alert-danger">Your order submission failed.</div>
        </div>
        <?php } ?>
		
		<?php 
                        // Get order items from the database 
                        $result = $mysqli->query("SELECT i.*, p.name, p.price FROM order_items as i LEFT JOIN italian_food as p ON p.id = i.product_id WHERE i.order_id = ".$orderInfo['id']); 
                        if($result && $result->num_rows){  
                            while($item = $result->fetch_assoc()){ 
                                $price = $item["price"]; 
                                $quantity = $item["quantity"]; 
                                $sub_total = ($price*$quantity); 
                        ?>
						
                        <tr>
                            <td><b>Italian</b>&nbsp;<?php echo $item["name"]; ?></td>
                            <td><?php echo '$'.$price.' &#8377;'; ?></td>
                            <td><?php echo $quantity; ?></td>
                            <td><?php echo '$'.$sub_total.' &#8377;'; ?></td>
                        </tr>
                        <?php } 
                          } else{ ?>
        <div class="col-md-12">
            <div class="alert alert-danger">Your order submission failed.</div>
        </div>
        <?php } ?>
		
		<?php 
                        // Get order items from the database 
                        $result = $mysqli->query("SELECT i.*, p.name, p.price FROM order_items as i LEFT JOIN beverages as p ON p.id = i.product_id WHERE i.order_id = ".$orderInfo['id']); 
                        if($result && $result->num_rows){  
                            while($item = $result->fetch_assoc()){ 
                                $price = $item["price"]; 
                                $quantity = $item["quantity"]; 
                                $sub_total = ($price*$quantity); 
                        ?>
						
                        <tr>
                            <td><b>Beverages</b>&nbsp;<?php echo $item["name"]; ?></td>
                            <td><?php echo '$'.$price.' &#8377;'; ?></td>
                            <td><?php echo $quantity; ?></td>
                            <td><?php echo '$'.$sub_total.' &#8377;'; ?></td>
                        </tr>
                        <?php } 
                         } 
						else
						{ ?>
        <div class="col-md-12">
            <div class="alert alert-danger">Your order submission failed.</div>
        </div>
        <?php }
		
		
                        // Get order items from the database 
                        $result = $mysqli->query("SELECT i.*, p.name, p.price FROM order_items as i LEFT JOIN non_veg_food as p ON p.id = i.product_id WHERE i.order_id = ".$orderInfo['id']); 
                        if($result && $result->num_rows){  
                            while($item = $result->fetch_assoc()){ 
                                $price = $item["price"]; 
                                $quantity = $item["quantity"]; 
                                $sub_total = ($price*$quantity); 
                        ?>
						
                        <tr>
						
                            <td><b>NON VEG</b> &nbsp;<?php echo $item["name"]; ?></td>
                            <td><?php echo '$'.$price.' &#8377;'; ?></td>
                            <td><?php echo $quantity; ?></td>
                            <td><?php echo '$'.$sub_total.' &#8377;'; ?></td>
                        </tr>
                        <?php } 
                          } else{ ?>
        <div class="col-md-12">
            <div class="alert alert-danger">Your order submission failed.</div>
        </div>
        <?php } ?>
                    </tbody>
                </table>
            </div>
        
    </div>
</div>
 
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