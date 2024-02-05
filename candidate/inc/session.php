<?php
	include ('dbcon.php');
	if(!isset($_SESSION['candidate']) || trim($_SESSION['candidate']) == ''){
		header('location: ../login.php');
	} 
	
	$sql = "SELECT * FROM users WHERE user_id = '".$_SESSION['candidate']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
		
?>