<?php session_start(); 
if(!isset($_SESSION['userName'])){
           $_SESSION['error'] ="please login to access this page";
		   header("location:login.php");
}

if(isset($_POST['submit'])){
	$productName = $_POST['pname'];
	include("connection.php");
	$conn = connect();
	//$query = "UPDATE product(pname,price) VALUES('$productName',$price)";
	//$query ="UPDATE product set  price=$price where pname='$productName' ";
	$query = "DELETE from product where pname='$productName'";
	if(mysqli_query($conn,$query)){
		$_SESSION['message'] = "Product Deleted Successfully";
		header("location:dashboard.php");
	}else{
		$_SESSION['error'] = "OPeration failed";
		header("location:updateProduct.php");
	}
	
	
}
?>
<!DOCTYPE HTML >
<html>
	<head>
		<title>delete product</title>
		<link rel="stylesheet" href="css/style.css" type="text/css">
	</head>
	<body>
    <?php
	if(isset($_SESSION['userName'])){
		?>

		<div class = "header" >
		<h4 id="header" > Welcome <?php echo "$_SESSION['userName'];" ?> |
		<a  class="logout" href ="logout.php" >Logout </a>
		</h4>
       <?php	
    }
    ?>	
    <a href="dashboard.php">Back to list</a>
	
	<h2> Delete Product </h2>

	<form action="" method="post" >
			<label>Product name</label>
			<input type="text" name="pname"/>
		<!--	<br/><br/>
			<label>New Price</label>
			<input type="text" name="price"/> -->
			<br/>
			<input type="submit" name="submit" value="Delete"/>
	
		</form>
		
	</body>
        

		
			
	
</html>