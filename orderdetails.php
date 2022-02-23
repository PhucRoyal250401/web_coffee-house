<?php
include "inc/header.php";

//include "inc/slider.php";
?>
<?php 
	// if(isset($_GET["cartid"])){
	// 	$id = $_GET['cartid'];
	// 	$del_product_cart = $ct->del_product_cart($id);
	// }
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
	$ct = new cart();
     $login_check = Session::get('customer_login');
     if($login_check == false){
         header('Location:login.php');
     }
     
	 if(isset($_GET['confirmid'])){
		$id = $_GET['confirmid'];
		$time = $_GET['time'];
		$price = $_GET['price'];
		$shifted_confirm = $ct->shifted_confirm( $id, $time,$price);
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
<style>

</style>
</head>
<body>


 <div class="main">
     <div class="container">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2 style="width:400px;border-bottom:hidden;">Your Details Ordered</h2>
  						 
						<table class="tblone">
							<tr>
                                <th width="5%">ID</th>
								<th width="15%">Product Name</th>
								<th width="10%">Image</th>
								<th width="20%">Price</th>
								<th width="5%">Quantity</th>
                                <th width="25%">Date</th>
                                <th width="10%">Status</th>
								<th width="10%">Action</th>
							</tr>
                            <?php
                                $customer_id=Session::get('customer_id');
                                $get_cart_ordered = $ct-> get_cart_ordered($customer_id);
                                if($get_cart_ordered){
                                    $i=0;
                                    while($result = $get_cart_ordered->fetch_assoc()){
                                        $i++;
                                                                    ?>
							<tr>
                                <td><?php echo $i ?></td>
								<td><?php echo $result['product_name']?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /> </td>
								<td><?php echo $result['price']." "."VND"?></td>
								<td>
									
										
                                <?php echo $result['quantity']?>
								</td> 
                               
                                <td>         <?php echo $fm->formatDate($result['date_order']);?>                       </td>
								<td>      <?php 
                                    if($result['status']==0){
                                        echo "Pending";
                                    }
                                    elseif($result['status']==1){
										?>
										<span>Shifted</span>
									<?php
									
									}elseif($result['status']==2){
                                        echo "Received";
                                    }
                                ?>
								</td>
                                <?php 
                                    if($result['status']==0){
                                ?>
                                <td><?php echo "N/A";?></td>
                                <?php 
                                    }elseif($result['status']==1){
                                ?>
								<td><a href="?confirmid=<?php echo $customer_id ?>&price=<?php echo $result['price']?>&time=<?php echo $result['date_order']?>">Confirm</a></td>
								
                                <?php }else{ ?>
									<td>Received</td>
									<?php }?>
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
