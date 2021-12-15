<?php session_start();

if(!isset($_SESSION['userName'])){
	$_SESSION['error'] = "Please login to access this page";
	header("location:login.php");
}
include("connection.php");
$conn = connect();

if(isset($_GET['action']) && $_GET['action'] == "del" && isset($_GET['id']) && is_numeric($_GET['id'])){
	$productId = $_GET['id'];
	$delQuery="DELETE FROM product WHERE pid =$productId";
	if(mysqli_query($conn,$delQuery)){
		$_SESSION['message'] = "Product deleted";
	    header("location:dashboard.php");
	}
	else{
		$_SESSION['error'] = "not deleted";
	    header("location:dashboard.php?id=$pid");
	}
}
?>
   
<!DOCTYPE html>
<html>
	<head>
		<title>LOgin FOrm</title>
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
		<a href="addNewProduct.php">Add New Product</a>
		<h2>Product List</h2>
		<?php if(isset($_SESSION['message'])){?>
		<div class="message">
			<?php echo $_SESSION['message'];?>
		</div>
		<?php unset($_SESSION['message']); } ?>
		
		<!-- Code to display the list of products-->
		<?php
			
			
			$query = "SELECT * FROM product";
			$result = mysqli_query($conn, $query);
		
		?>
		
		<table width="100%">
			<tr>
				<th>Product Id</th>
				<th>Product Name</th>
				<th>Product Price</th>
				<th>Action</th>
			</tr>
			
		<?php 
			while($data = mysqli_fetch_assoc($result)){ 
		
		?>
		<tr>
			<td><?php echo $data['pid'];?></td>
			<td><?php echo $data['pname'];?></td>
			<td><?php echo $data['price'];?></td>
			<td><a href="editproduct.php?id=<?php echo $data['pid'];?>"> Edit </a>
			   <a href="?action=del&id=<?php echo $data['pid'];?>" > Delete </a>
                <a onclick="return Confirm('Do you really want to delete this record')" > </a>
			   </td>
		</tr>
		
			<?php } ?>
		
		
		</table>
		
	</body>
</html>