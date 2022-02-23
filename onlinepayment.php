

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

    h3.payment{
        text-align: center;
        font-size: 18px;
        font-weight: bold;
        padding: 20px;
        background: cornsilk;
    }
    .paymentclick a{
        text-align: center;

        background: cornsilk;
        
        
    }
   
    .method{
        width: 320px;
        margin:auto;
        border: 1px solid #666;
        background: cornsilk;
    }
    .method p{
        text-align: center;
        border:1px solid #666;
        margin:auto;
        padding:10px;
        background: burlywood;
        width: 250px;
        margin-bottom: 20px;
    }
    a.paymentclick{
        color:white;
    }
    .method p.click1{
        text-align: center;
        border:hidden;
        margin:auto;
        padding:10px;
        background: grey;
        width: 90px;
        margin-bottom: 20px;
    }
</style>
</head>
<body>
 <div class="main">
    
	<div class="container">
    	<div class="section group">
        <div class="content_top">
    		<div class="heading">
    		<h3>Payment Method</h3>
    		</div>
    		<div class="clear"></div>
            <div class="method">
            <h3 class="payment">We currently do not support online payment.Please choose another payment method.</h3>
            <p class="click1"> <a class="paymentclick" href="payment.php">Previous</a></p> 
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

