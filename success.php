

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
    h1.successor{
        text-align: center;
        color:green;
        font-weight: bold;
        font-size: 30px;
    }
    .success_note{
        text-align: center;
        padding:5px;
    }
</style>
</head>
<body>
    <form action="" method="POST">
 <div class="main">
    
	<div class="container">
    	<div class="section group">
            <h1 class="successor">Success Order</h1>
            <?php
            $customer_id=Session::get('customer_id');
            $get_amount = $ct->get_amount_price($customer_id);
            if($get_amount){
                $amount =0;
                while($result=$get_amount->fetch_assoc()){
                    $price = $result['price'];
                    $amount += $price;
                }
            }
            ?>
            <p class="success_note">Total price You have bought From my website: <?php $total = $amount + 40000; echo $total;?> VND</p>
            <p class="success_note">We will contact as soon as possiable.Please see your order details here <a href="orderdetails.php">Click here</a> </P>
        </div>
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

