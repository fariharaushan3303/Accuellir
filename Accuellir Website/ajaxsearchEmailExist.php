<?php
	session_start();
	error_reporting(0);
	$email 	= $_POST['email'];
	
	//echo $email;
	$con = mysqli_connect('localhost', 'root', '', 'project');
	$sql="select email from user where email='$email'";
	//echo $sql;
	if ($con->connect_error) {
		die("Connection failed: ". $con->connect_error);
	}
	$result=$con->query($sql);
	if($result->num_rows>0)
	{
		echo "found";
	}
	else
	{
		echo "notfound";
	}

		
?>