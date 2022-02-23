

<?php
include "inc/header.php";
//include "inc/slider.php";
?>
<?php 
	if(!isset($_GET["proid"]) || $_GET["proid"] == NULL){
		echo "<script> window.location = '404.php' </script>";
	 }
	 else{
		 $id = $_GET['proid'];
	 }
	 $customer_id=Session::get('customer_id');
	 if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['submit'])){
		$quantity = $_POST['quantity'];
		$addtocart = $ct->add_to_cart($quantity,$id);
	}
	if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['wishlist'])){
		$productid = $_POST['productid'];
		$insert_wishlist=$product->insert_wishlist($productid,$customer_id);
	}
	
	if(isset($_POST['binhluan_submit'])){
		$binhluan=$cus->insert_comment();
	}
?>
<!DOCTYPE HTML>
<head>
<title>Free Smart Store Website Template</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="vendor/bootstrap.js"></script>


 	<script type="text/javascript" src="vendor/isotope.pkgd.min.js"></script>
 	<script type="text/javascript" src="vendor/imagesloaded.pkgd.min.js"></script>
 	<script type="text/javascript" src="1.js"></script>

	<link rel="stylesheet" href="vendor/bootstrap.css">
	<link rel="stylesheet" href="vendor/font-awesome.css">
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
<style>
	.buysubmit{
		background-color: rgb(240, 173, 78);
	}
</style>
</head>
<body>
 <div class="main">
    
	<div class="container">
    	<div class="section group">
			<?php
				$get_product_details=$product->get_details($id);
				if($get_product_details){
					while($result_details = $get_product_details->fetch_assoc()){	
			?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/uploads/<?php echo $result_details['product_img']?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<?php ?>
					<h2><?php echo $result_details['product_name'] ?> </h2>
					<p><?php echo $result_details['product_desc']?></p>					
					<div class="price">
						<p>Price: <span><?php echo $result_details['price']." "."VND"?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1" min="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
						
					</form>	
					<?php 
						if(isset($addtocart)){
							echo '<span style="color:red;font-size:18px;"> Product Already Added  </span> ';
						}
					?>	


				</div>

					<div class="add-cart">
						<form action="" method="POST">
							<input type="hidden" name="productid" value="<?php echo $result_details['product_id']?>"/>
							<?php
								$login_check=Session::get('customer_login');
								if($login_check){
									echo '<input type="submit" class="buysubmit" name="wishlist" value="Save to Wishlist">';
								}
							?>
							<?php
								if(isset($insert_wishlist)){
									echo $insert_wishlist;
								}
							?>
						</form>


					</div>

			</div>
			
				
	</div>

	<?php
				} 
			}
	?>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
						<?php
							$get_all_category = $cat->show_category_frontend();
							if($get_all_category){
								while($result_all_category=$get_all_category->fetch_assoc()){
			
						?>
				      <li><a href="thucdon.php"><?php echo  $result_all_category['catname']?></a></li>
					  <?php
								} 
							}
							?>
    				</ul>
    	
 				</div>
				

		 
		 </div>
		 
		<div class="binhluan">
			<div class="row">
				<div class="col-md-8">
					<p><h4>Product comments</h4></p>
					<?php
						if(isset($binhluan)){
							echo $binhluan;
						}
					?>
					<form action="" method="POST">
						<p><input type="hidden"  name ="product_id_binhluan" value="<?php echo $id ?>"></p>
			<p><input type="text" placeholder="Enter Name..." class="form-control" name="tennguoibinhluan"></p>
			<p><textarea class="form-control" placeholder="Comments..." name="binhluan" id=""  rows="5" style="resize:none"></textarea></p>
			<p><input type="submit" name="binhluan_submit" class="btn btn-success" Value="Send"></p>
			</form>
			</div>
			</div>
		</div>

 	</div>

    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>

<?php
include "inc/footer.php";
?>

