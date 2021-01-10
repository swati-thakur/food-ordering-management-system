<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Admin Dashbaord</title>

  
  
  <!-- Custom styles for this template -->
  <link href="css/style1.css" rel="stylesheet">
  <link href="css/style3.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
  <link href="css/style-responsive.css" rel="stylesheet">
  <!--external css-->
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
	<div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
	<!--logo start-->
<a href="dashboard.php" class="logo"><b>Enjoy Food_<span>Restro</span></b></a>

    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          
          <li class="mt">
            <a class="active" href="dashboard.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="food_items.php">
              <i class="fa fa-desktop"></i>
              <span>View Food Items</span>
              </a>
            
          </li>
          
		  <li class="sub-menu">
            <a href="edit_items.php">
              <i class="fa fa-cogs"></i>
              <span>Edit Food Items</span>
              </a>
            
          </li>
		  
		  <li class="sub-menu">
            <a href="deliver_boys.php">
              <i class="fa fa-cogs"></i>
              <span>Delivery Boys</span>
              </a>
            
          </li>
          
        </ul>
		</div>
		
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
   
  
   <div class="container">
   <br><br><br>
  <h2>DELIVERY BOYS</h2>
              
  <table class="table">
    <thead>
      <tr>
        
        <th>Name</th>
		<th>Contact</th>
		<th>Action</th>
		
      </tr>
    </thead>
    
  </table>
</div>

  
</section>  

 
</body>

</html>



