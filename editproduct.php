<?php session_start();
if(!isset($_SESSION['userName'])){
	$_SESSION['error'] = "Please login to access this page";
	header("location:login.php");
}
include("connection.php");
	$conn = connect();
	
   if(isset($_POST['submit'])){
	$productName = $_POST['pname'];
	$price = $_POST['price'];
	$pid = $_POST['pid'];
	$query = "UPDATE product set pname='$productName' ,price =$price WHERE pid =$pid";
	if(mysqli_query($conn,$query)){
		$_SESSION['message'] = "Product updated Successfully";
		header("location:dashboard.php");
	}else{
		$_SESSION['error'] = "OPeration failed";
		header("location:editproduct.php?id=$pid");
	}
	
	
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>UPDATE Product</title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
	</head>
	<body>
		<?php
			if(isset($_SESSION['userName'])){
		     ?>
		<h4>Welcome <?php echo $_SESSION['userName'];?> | 
			<a href="logout.php">LOg Out</a>
		</h4>
			<?php } 
		?>
		<a href="dashboard.php">Back to list</a>
		
		<!--code for existing data for given id -->
		<?php
		if(isset($_GET['id']) && is_numeric($_GET['id'])){
			$productId =$_GET['id'];
			$getDataQuery ="SELECT * FROM product WHERE pid=$productId";
			$dataResult=mysqli_query($conn,$getDataQuery);
			$productData=mysqli_fetch_assoc($dataResult);
		   
		?>
		<h2>update Product</h2>
		<form action="" method="post">
		<input type="hidden" name="pid" value="<?php echo $productData['pid']; ?>"/>

		<label>Product name</label>
	    <input type="text" name="pname" value="<?php echo $productData['pname']; ?>"/>
			<br/><br/>
			<label>Product Price</label>
	    <input type="text" name="price" value="<?php echo $productData['price']; ?>"/>
			<br/>
			<input type="submit" name="submit" value="UPDATE"/>
       </form>
			<?php
		}	
		else{
			 echo "Invalid request";
	   	}
       ?>
		</body>
</html>