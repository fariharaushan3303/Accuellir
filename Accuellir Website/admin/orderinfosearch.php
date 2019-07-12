<?php
	include 'db.php';
	$key 	= $_POST['key'];

	$sql = "select oid,productid,customerid from cart where customerid like '".$key."%'";
	$result = mysqli_query($conn,$sql);
	
	$data ="";
	while($row = mysqli_fetch_assoc($result)){
		$data .="<div onclick='abc(this.innerHTML)' style='background-color: #ff1;text-align: center; vertical-align: middle;width:350px;border: 1px solid #000;margin:5px;'>".$row['oid']."(orderid)----------".$row['customerid']."(customerid)"."</div>";
	}
	echo $data;

?>