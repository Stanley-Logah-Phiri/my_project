<?php
	include ('dbcon.php');
	if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
		header('location: ../login.php');
	} 
	
	$sql = "SELECT * FROM users WHERE user_id = '".$_SESSION['admin']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
		
?>