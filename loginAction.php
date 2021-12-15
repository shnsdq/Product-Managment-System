<?php session_start();
	if(isset($_POST['submit'])){
		$loginId = $_POST['lid'];
		$upassword = $_POST['pwd'];
		include("connection.php");
		$conn = connect();
		
		if($conn){
			$query = "SELECT * from users where ulogin = '$loginId' AND upassword = '$upassword'";
			$result = mysqli_query($conn,$query);
			if(mysqli_num_rows($result)){
				$data = mysqli_fetch_assoc($result);
				$_SESSION['message'] = "Login Successful";
				$_SESSION['userName'] = $data['uname'];
				header("location:dashboard.php");
			}else{
				$_SESSION['error'] = "Invalid username / password";
				header("location:login.php");
			}
			/*$data = mysqli_fetch_assoc($result);
			
			if($data['upassword'] == $upassword){
				echo "Login Successful";
			}else{
				echo "Invalid username / password";
			}*/
			
		}else{
			echo "Error in database connection";
		}
	}else{
		echo "Invalid Action";
		
	}


?>