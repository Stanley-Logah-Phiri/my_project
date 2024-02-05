<?php
	include ('dbcon.php');
	if(!isset($_SESSION['HRM']) || trim($_SESSION['HRM']) == ''){
		header('location: ../login.php');
	} 
	
	$sql = "SELECT * FROM users WHERE user_id = '".$_SESSION['HRM']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
		
?>