<?php
	session_start();
	error_reporting(0);
	include 'db.php';
	$email 	= $_POST['email'];
	
	
	
	$sql="select email from user where email='$email'";

	if ($conn->connect_error) {
		die("Connection failed: ". $conn->connect_error);
	}
	$result=$conn->query($sql);
	if($result->num_rows>0)
	{
		echo "found";
	}
	else
	{
		echo "notfound";
	}

		
?>