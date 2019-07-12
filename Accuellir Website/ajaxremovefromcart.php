<?php
	session_start();
	error_reporting(0);
	$cartid 	=$_POST['cartid'];
	
	$con = mysqli_connect('localhost', 'root', '', 'project');
	$sql="delete from cart where id='$cartid' and customerid='".$_SESSION['user_id']."'";
	// Check connection
	if ($con->connect_error) {
		die("Connection failed: ". $con->connect_error);
	} 

	if ($con->query($sql) === TRUE) 
	{
		echo "done";
		
	}
	else 
	{
		echo "Error: " . $sql . "<br/>".$con->error;
	}

	//echo $_SESSION['user_name']." placed order of product id : $pid quantity is : $quantity";		
?>