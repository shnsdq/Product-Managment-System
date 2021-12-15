<?php 

function connect(){
	$hostname = "localhost";
	$username = "root";
	$password = "Anjali@45604";
	$dbname = "lamp";

	$conn = mysqli_connect($hostname,$username,$password,$dbname);
	return $conn;
}

?>