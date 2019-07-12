<?php
	session_start();
	error_reporting(0);


	$total= $_GET['total'];
	$revenue= $_GET['revenue'];

	$uid=$_SESSION['user_id'];


	$con = mysqli_connect('localhost', 'root', '', 'project');

	

	//INSERT INTO `order_info`(`oid`, `uid`, `date`, `total_price`) VALUES ([value-1],[value-2],[value-3],[value-4])
	
	$sql1 = "insert into order_info  (oid,uid,total_price,revenue)  values('','$uid','$total','.$revenue.')";



	

	//$sql3="delete from "

	//$sql="delete from cart where productid='$pid' and customerid='".$_SESSION['user_id']."'";
	// Check connection

	if ($con->connect_error) {
		die("Connection failed: ". $con->connect_error);
	} 

	if ($con->query($sql1) === TRUE) 
	{
		

	$sql2=mysqli_query($con,"select oid from order_info ORDER BY oid DESC LIMIT 1");
	$row= mysqli_fetch_array($sql2);
	$oid = $row['oid'];

	


	$sql3 = "update cart set status='accepted',oid='".$oid."' where customerid='".$_SESSION['user_id']."' and status='incart'";

		if ($con->query($sql3) === TRUE) {
			echo "done";
		}
		else 
	{
		echo "Error: " . $sql3 . "<br/>".$con->error;
	}
		
		//$con->query($sql1);


	}
	else 
	{
		echo "Error: " . $sql1 . "<br/>".$con->error;
	}

	//echo $_SESSION['user_name']." placed order of product id : $pid quantity is : $quantity";		
?>