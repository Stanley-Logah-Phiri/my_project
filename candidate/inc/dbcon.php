<?php
	error_reporting(0);
	//Database Connection
	$DB_HOST    = 'localhost';
	$DB_USER    = 'root';
	$DB_PASS    = '';
	$DB_NAME    = 'tnm_portal';

	//Create Connection
	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	// Check connection
	if($conn->connect_error){
		die("Fatal Error: Connection Failed!". $conn->connect_error);
			
			
	}
?>