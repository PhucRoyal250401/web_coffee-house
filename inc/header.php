<?php
	
    include "lib/session.php";
    Session::init();
?>
<?php
	include_once "lib/database.php";
	include_once "helper/format.php";

	spl_autoload_register(function($className){
		include_once "classes/".$className.".php";
	});
	$db = new Database();
	$fm = new Format();
	$ct = new cart();
	$us = new user();
	$cat = new category;
	$product = new product();
	$cus = new customer();
	$pg = new page();
?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>



<!DOCTYPE html>
<html lang="en"><head>
	<title> Coffeehouse  </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700&amp;subset=vietnamese" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet">


	<script type="text/javascript" src="vendor/bootstrap.js"></script>


 	<script type="text/javascript" src="vendor/isotope.pkgd.min.js"></script>
 	<script type="text/javascript" src="vendor/imagesloaded.pkgd.min.js"></script>
 	<script type="text/javascript" src="1.js"></script>

	<link rel="stylesheet" href="vendor/bootstrap.css">
	<link rel="stylesheet" href="vendor/font-awesome.css">
	<link rel="stylesheet" href="1.css">
 </head>
<body >

		
 	<div class="topheader">
 		<div class="container">
 			<div class="row">
 				<div class="col-sm-6 wow jello">
 					<div class="mangxh float-sm-left text-xs-center text-sm-left">
				
						
						<a href="<?php echo $pg->getfacebook();?>"><i class="fa fa-facebook"></i></a>

						
					
						<!-- 	<a href=""><i class="fa fa-twitter"></i></a> -->
						<a href="<?php echo $pg->getinstagram();?>"><i class="fa fa-instagram"></i></a>
						<!-- <a href=""><i class="fa fa-google-plus"></i></a> -->
 					 </div>
 					<div class="datban">
 						Call for reservation: 	<?php echo $pg->getphone();?>
 					 </div>
 				</div>
 				<div class="col-sm-6 ">
 					<div class="datban openingtop float-sm-right text-sm-left text-xs-center">
 						Opening Hours : <?php echo $pg->getopening();?>
 					</div>				 
 				</div>
 			</div> <!-- het row -->
 		</div> <!-- het container -->
 	</div> <!-- het topheader  -->
     
	
 	<div class="logovamenu">
	    <nav class="navbar navbar-light  fontroboto">
	    	<div class="container">    	
			      <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#mtren">
			       
			      </button>
			      <div class="collapse navbar-toggleable-xs" id="mtren">
			        <a class="navbar-brand text-xs-center text-sm-left" href="index.php"><img src="images/logo10.png" alt="" style="width:100%;height:100px"></a>

			        <ul class="nav navbar-nav float-sm-right">
			          <li class="nav-item">
			            <a class="nav-link" href="index.php">Home  </a>
			          </li>
			          <li class="nav-item">
			            <a class="nav-link" href="about.php">About</a>
			          </li>
			          <li class="nav-item">
			            <a class="nav-link" href="thucdon.php">Menu</a>
			          </li>
					  <?php 
					  $login_check = Session::get('customer_login');
					  if($login_check == false){ echo "";}
						  else{
					  ?>
					  <li class="nav-item">
			            <a class="nav-link" href="profile.php">Profile</a>
			          </li>
					  <?php 
					  }
					  ?>
			          <li class="nav-item">
			            <a class="nav-link" href="contact.php">Contact</a>
						
						
			          </li>
					  <?php if(isset($_GET['customer_id'])){
						  $delcart=$ct->del_all_data_cart();
						  Session::destroy();
					  }
					  ?>
					  <li class="nav-item">
						  
						  
			            
			          </li>
			         <li class="nav-item datbanmenu">
					 
							
							
						
						  <a class="nav-link btn btn-warning wow bounce" data-wow-iteration="3" href="cart.php" >
						 	 
								<span class="cart_title">Cart:</span>
								<span class="no_product">
									<?php
										$check_cart = $ct->check_cart();
										if($check_cart){
										$sum = Session::get("sum");
										echo $fm->format_currency($sum)." VND";
										
										}
										else{
											echo "(empty)";
										}
									?>
								
								</span>
		  

						  </a>
			          </li>
					  <li class="nav-item datbanmenu">
					 	 <?php 
							$login_check = Session::get('customer_login');
							if($login_check == false){
								echo '
								<a class="nav-link btn btn-warning wow bounce1" style="background-color: #1266f1;border-radius: 0.3rem;" data-wow-iteration="3" href="login.php" >
						 	 
								<span class="cart_title">Login</span>

		  

						  		</a>';
							}
							else{
								echo '
								<a class="nav-link btn btn-warning wow bounce1" style="background-color: grey;border-radius: 0.3rem;" data-wow-iteration="3" href="?customer_id='.Session::get('customer_id').'" >
						 	 
								<span class="cart_title">Logout</span>

		  

						  		</a>';
							}
						  ?>
			          </li>
			        </ul>
			      </div>

	      </div> <!-- het container -->
	    </nav>
 	</div> <!-- het logo va menu -->