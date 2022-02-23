

<?php
include "inc/header.php";
//include "inc/slider.php";
?>
<?php 
	if(isset($_GET["orderid"]) && $_GET["orderid"] == 'order'){
        $customer_id = Session::get('customer_id');
        $insertorder = $ct->insertOrder($customer_id);
        $delcart=$ct->del_all_data_cart();
        header('Location:success.php');
    }
	//  if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['submit'])){
	// 	$quantity = $_POST['quantity'];
	// 	$addtocart = $ct->add_to_cart($quantity,$id);
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
	.buysubmit{
		background-color: rgb(240, 173, 78);
	}
    .box_left{
        width:50%;
        border:1px solid #666;
        float:left;
        padding:10px;
    }
    .box_right{
        width: 47%;
        border:1px solid #666;
        float:right;
        padding:10px;
    }
    .main{
        margin-bottom: 20px;
    }
    .submit_order{
        padding:10px 70px;
        border:none;
        background: #f0ad4e;
        font-size: 20px;
        color:black;
        border-radius: 0.3rem;
        margin-top: 20px;
        cursor: pointer;
    }
    .a_order{
        background-color:  #f0ad4e;
        color:black;
        border:none;
        cursor: pointer;
        font-size: 20px;
        padding:10px 70px;
        border-radius: 0.3rem;
    }
</style>
</head>
<body>
    <form action="" method="POST">
 <div class="main">
    
	<div class="container">
    	<div class="section group">
			<div class="heading">
                <h3>Offline Payment</h3>
            </div>
			<div class="clear"></div>	
            <div class="box_left">
            <div class="cartpage">
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
                                <th width="5%">ID</th>
								<th width="25%">Product Name</th>
								<th width="30%">Price</th>
								<th width="5%">Quantity</th>
								<th width="35%">Total Price</th>
							</tr>
                            <?php
                                $get_product_cart = $ct->get_product_cart();
                                if($get_product_cart){
                                   $subtotal=0;
                                   $i=0;
                                    while($result = $get_product_cart->fetch_assoc()){
                                        $i++;
                                                                    ?>
							<tr>
                                <td><?php echo $i?></td>
								<td><?php echo $result['product_name']?></td>
								<td><?php echo $result['price']." "."VND"?></td>
								<td>
									
										<?php echo $result['quantity']?>
					
								</td>
								<td><?php 
                                $total = $result['price'] * $result['quantity'] ;
                                echo $total." "."VND";
                                ?>
                                </td>
						
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
                                    echo $subtotal." "."VND";
									Session::set('sum',$subtotal);
                                    ?>
                                </td>
							</tr>
							<tr>
								<th>SHIP : </th>
								<td>40000 VND</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php 
                                $g_total = $subtotal + 40000;
                                echo $g_total." "."VND";
                                ?></td>
							</tr>
					   </table>
					   <?php
							}else{
								echo "Your cart is empty!!! Please shopping now!!!";
							}
					   ?>
					</div>
            </div>
            <div class="box_right">
            <div class="cartpage">
            <table class="tblone">
                <?php
                    $id = Session::get('customer_id');
                    $get_customer = $cus->show_customer($id);
                    if($get_customer){
                        while($result=$get_customer->fetch_assoc()){
                    
                ?>
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td><?php echo $result['name'] ?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>:</td>
                    <td><?php echo $result['city'] ?></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>:</td>
                    <td><?php echo $result['phone'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><?php echo $result['email'] ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>:</td>
                    <td><?php echo $result['address'] ?></td>
                </tr>
                <tr>
                    <td colspan="3"> <a href="editprofile.php"> Update Profile</a> </td>
                </tr>
                <?php
                        }
                    }
                ?>
            </table>
            </div>
            </div>
				
			
				
	   

				
 		</div>
         <br>
         <br>
        <center> <a href="?orderid=order" class="a_order"> Order Now</a></center>
        <br>
    </div>
		 
</div>
</form>

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

