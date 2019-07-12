<?php
	session_start();
	error_reporting(0);
	$cartid 	=$_POST['cartid'];
	
	$con = mysqli_connect('localhost', 'root', '', 'project');
	//$sql = "update user set address='$address',contact_number='$contactno' where uid='".$_SESSION['user_id']."'";
	$sql ="update cart set status='canceled' where customerid='".$_SESSION['user_id']."' and id='$cartid'";
	
	
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