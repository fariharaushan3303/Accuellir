<?php
	session_start();
	error_reporting(0);

	$quantity 	= $_POST['quantity'];
	$pid		=$_POST['pid'];
	$uid		=$_SESSION['user_id'];

	$con = mysqli_connect('localhost', 'root', '', 'project');

	$sql = "insert into cart (productid,quantity,customerid) values('$pid','$quantity','$uid')";

	$sqlSelect="select quantity from product_info where pid='$pid' ";

	//$result= $con->query($sqlSelect);
	$sqlSelect="select quantity from product_info where pid='$pid' ";

					$res=$con->query($sqlSelect);
					$rw = $res->fetch_assoc();
	//$quantity_old = $result->fetch_assoc();




	$quantity_new=$rw['quantity']-$quantity;

	$sql2="update product_info set quantity='.$quantity_new.' where pid='$pid' ";
	
	// Check connection
	if ($con->connect_error) {
		die("Connection failed: ". $con->connect_error);
	} 

	if ($con->query($sql) === TRUE) 
	{
		if ($con->query($sql2) === TRUE) 
		{
			
			echo "done";
		
		}
		else 
		{
			echo "Error: " . $sql2 . "<br/>".$con->error;
		}

	}
	else 
	{
		echo "Error: " . $sql . "<br/>".$con->error;
	}

	//echo $_SESSION['user_name']." placed order of product id : $pid quantity is : $quantity";		
?>