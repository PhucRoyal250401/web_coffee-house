

<?php
include "inc/header.php";
//include "inc/slider.php";
?>
<?php
     
    $login_check = Session::get('customer_login');
    if($login_check == false){
        header('Location:login.php');
    }
    else{
        
    }

?>
<?php 
	// if(!isset($_GET["proid"]) || $_GET["proid"] == NULL){
	// 	echo "<script> window.location = '404.php' </script>";
	//  }
	//  else{
	// 	 $id = $_GET['proid'];
	//  }
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
</style>
</head>
<body>
 <div class="main">
    
	<div class="container">
    	<div class="section group">
        <div class="content_top">
    		<div class="heading">
    		<h3>Profile Customer</h3>
    		</div>
    		<div class="clear"></div>
    	</div>  
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
                <tr>
                    <td colspan="3"> <a href="changepassword.php"> Change Password</a> </td>
                </tr>
                <?php 
                     $customer_id=Session::get('customer_id');
                    $check_order = $ct->check_order($customer_id);
                    if($check_order){
                        echo '<tr>
                        <td colspan="3"> <a href="orderdetails.php"> My Order</a> </td>
                    </tr>';
                    }
                    else {
                        echo '';
                    }
                ?>
                <?php 
                     
                    $login_check = Session::get('customer_id');
                    if($login_check){
                        echo '<tr>
                        <td colspan="3"> <a href="wishlist.php"> My Wishlist</a> </td>
                    </tr>';
                    }
                    else {
                        echo '';
                    }
                ?>
                <?php
                        }
                    }
                ?>
            </table>
			
					
				

	
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

