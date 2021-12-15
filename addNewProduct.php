<?php session_start();
if(!isset($_SESSION['userName'])){
	$_SESSION['error'] = "Please login to access this page";
	header("location:login.php");
}

if(isset($_POST['submit'])){
	$productName = $_POST['pname'];
	$price = $_POST['price'];
	include("connection.php");
	$conn = connect();
	$query = "INSERT INTO product(pname,price) VALUES('$productName',$price)";
	if(mysqli_query($conn,$query)){
		$_SESSION['message'] = "Product Added Successfully";
		header("location:dashboard.php");
	}else{
		$_SESSION['error'] = "OPeration failed";
		header("location:addNewProduct.php");
	}
	
	
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Add New Product</title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
	</head>
	<body>
		<?php
			if(isset($_SESSION['userName'])){
		?>
		<h4>Welcome <?php echo $_SESSION['userName'];?> | 
			<a href="logout.php">LOg Out</a>
		</h4>
			<?php } ?>
		<a href="dashboard.php">Back to list</a>
		<h2>Add New Product</h2>
		
		<form action="" method="post">
			<label>Product name</label>
			<input type="text" name="pname"/>
			<br/><br/>
			<label>Product Price</label>
			<input type="text" name="price"/>
			<br/>
			<input type="submit" name="submit" value="Add"/>
			
		</form>
	</body>
</html>