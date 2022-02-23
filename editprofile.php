

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
    
    $id = Session::get('customer_id');
	 if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['save'])){
		$updateCustomer = $cus->update_customer($_POST,$id);
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
        <form action="" method="post">
            <table class="tblone">
                
                    <tr>
                    <td>
                    <?php
                    if(isset($updateCustomer)){
                        echo $updateCustomer;
                    }
                    ?>
                    </td>
                    </tr>
               
                <?php
                    $id = Session::get('customer_id');
                    $get_customer = $cus->show_customer($id);
                    if($get_customer){
                        while($result=$get_customer->fetch_assoc()){
                    
                ?>
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td> <input type="text" name="name" value="<?php echo $result['name'] ?>"> </td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>:</td>
                    <td> <input type="text" name="city" value="<?php echo $result['city'] ?>"> </td>
  
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>:</td>
                    <td> <input type="text" name="phone" value="<?php echo $result['phone'] ?>"> </td>
              
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td> <input type="text" name="email" value="<?php echo $result['email'] ?>"> </td>
            
                </tr>
                <tr>
                    <td>Address</td>
                    <td>:</td>
                    <td> <input type="text" name="address" value="<?php echo $result['address'] ?>"> </td>
            
                </tr>
                <tr>
                    <td colspan="3"> <input type="submit" name="save" value="Save" > </td>
                </tr>
                <?php
                        }
                    }
                ?>
            </table>
			</form>
					
				

	
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

