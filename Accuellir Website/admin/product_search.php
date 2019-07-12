<?php
	include 'db.php';
	$key 	= $_POST['key'];

	$sql = "select pname,quantity from product_info where pname like '".$key."%'";
	$result = mysqli_query($conn,$sql);
	
	$data ="";
	while($row = mysqli_fetch_assoc($result)){
		$data .="<div onclick='abc(this.innerHTML)' style='background-color: #ff1;text-align: center; vertical-align: middle;width:290px;border: 1px solid #000;margin:2px'>".$row['pname']."----------".$row['quantity']."(quantity)"."</div>";
	}
	echo $data;

?>