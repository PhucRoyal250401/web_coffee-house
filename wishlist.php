<?php
include "inc/header.php";
//include "inc/slider.php";
?>
<?php 
    $customer_id=Session::get('customer_id');
	if(isset($_GET["proid"])){
		$proid = $_GET['proid'];
		$del_wishlist = $product->del_wishlist($proid,$customer_id);
	}
	//  if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['submit'])){
	// 	$cartid = $_POST['cartid']; 
	// 	$quantity = $_POST['quantity'];
	// 	$update_quantity_cart = $ct->update_quantity_cart($quantity,$cartid);
	// 	if($quantity<=0){
	// 		$del_product_cart = $ct->del_product_cart($cartid);
	// 	}
	//}
?>
<?php
	// if(isset($_GET['id'])){
    //     echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
    // }
 
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
<style>

</style>
</head>
<body>


 <div class="main">
     <div class="container">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2 style="width:400px;border-bottom:hidden;">Wishlist</h2>
  						 
						<table class="tblone">
							<tr>
                                <th width="10%">ID Wishlist</th>
								<th width="20%">Product Name</th>
								<th width="20%">Image</th>
								<th width="15%">Price</th>
								<th width="15%">Action</th>
							</tr>
                            <?php
                                $customer_id=Session::get('customer_id');
                                $get_wishlist = $product->get_wishlist($customer_id);
                                if($get_wishlist){
                                    $i=0;
                                    while($result = $get_wishlist->fetch_assoc()){
                                        $i++;
                                                                    ?>
							<tr>
                                <td><?php echo $i ?></td>
								<td><?php echo $result['product_name']?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /> </td>
								<td><?php echo $result['price']." "."VND"?></td>
								
								<td>
                                    <a href="?proid=<?php echo $result['product_id'] ?>">Remove</a> ||
                                    <a href="preview.php?proid=<?php echo $result['product_id'] ?>">Buy Now</a>
                                </td>
								
                                
									
	
							</tr>
                            <?php
                                    
                                    }
                                }
                            ?>
						</table>
						
						
					   
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
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

<?php
include "inc/footer.php";
?>
