<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<title>LOgin FOrm</title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
	</head>
	<body>
		<?php if(isset($_SESSION['error'])){ ?>
		<div class="errorMessage">
			<?php echo $_SESSION['error'];?>
		</div>
		<?php } unset($_SESSION['error']); ?>
		<form action="loginAction.php" method="post">
			<label>Login Id</label>
			<input type="text" name="lid"/>
			<label>Password<label>
			<input type="password" name="pwd"/>
			<input type="submit" name="submit" value="Log In"/>
		</form>
	
	</body>
	
</html>