<?php
	include "../classes/adminlogin.php";
?>
<?php
	$class = new adminlogin();
	if($_SERVER['REQUEST_METHOD'] =='POST'){
		$adminuser = $_POST['adminuser'];
		$adminpass = $_POST['adminpass'];
		$login_check = $class->login_admin($adminuser, $adminpass);
	}
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<span>
				<?php
					if(isset($login_check)){
						echo $login_check;
					}
				?>
			</span>
			<div>
				<input type="text" placeholder="Username" name="adminuser"/>
			</div>
			<div>
				<input type="password" placeholder="Password"  name="adminpass"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>