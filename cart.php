<?php
include "inc/header.php";
//include "inc/slider.php";
?>
<?php 
	if(isset($_GET["cartid"])){
		$id = $_GET['cartid'];
		$del_product_cart = $ct->del_product_cart($id);
	}
	 if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['submit'])){
		$cartid = $_POST['cartid']; 
		$quantity = $_POST['quantity'];
		$update_quantity_cart = $ct->update_quantity_cart($quantity,$cartid);
		if($quantity<=0){
			$del_product_cart = $ct->del_product_cart($cartid);
		}
	}
?>
<?php
	if(!isset($_GET['id'])){
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
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
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>


 <div class="main">
     <div class="container">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
  						<?php
							if(isset($update_quantity_cart)){
								echo $update_quantity_cart;
							}	
						?> 
						<?php
							if(isset($del_product_cart)){
								echo $del_product_cart;
							}	
						?> 
						<table class="tblone">
							<tr>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
                            <?php
                                $get_product_cart = $ct->get_product_cart();
                                if($get_product_cart){
                                   $subtotal=0;
                                    while($result = $get_product_cart->fetch_assoc()){
                                                                    ?>
							<tr>
								<td><?php echo $result['product_name']?></td>
								<td><img src="admin/uploads/<?php echo $result['c_image'] ?>" alt="" /> </td>
								<td><?php echo $result['price']?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartid" value="<?php echo $result['cart_id']?>"/>
										<input type="number" name="quantity" min="0" value="<?php echo $result['quantity']?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td><?php 
                                $total = $result['price'] * $result['quantity'] ;
                                echo $total;
                                ?>
                                </td>
								<td><a href="?cartid=<?php echo $result['cart_id']?>">Xóa</a></td>
							</tr>
                            <?php
                                    $subtotal += $total;
                                    }
                                }
                            ?>
						</table>
						<?php
							$check_cart = $ct->check_cart();
							if($check_cart){

						?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>
                                    <?php
                                    echo $subtotal;
									Session::set('sum',$subtotal);
                                    ?>
                                </td>
							</tr>
							<tr>
								<th>SHIP : </th>
								<td>40000</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php 
                                $g_total = $subtotal + 40000;
                                echo $g_total;
                                ?></td>
							</tr>
					   </table>
					   <?php
							}else{
								echo "Your cart is empty!!! Please shopping now!!!";
							}
					   ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="thucdon.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
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
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
include "inc/footer.php";
?>
