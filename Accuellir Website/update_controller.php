<?php 
	session_start();
	$id = $_SESSION['pid'];
	$pprice = $_POST['price1'];
	$sprice = $_POST['price2'];
	$qty = $_POST['qty'];
	//echo $id." ".$address." ".$phone;
	$conn = mysqli_connect('localhost', 'root', '', 'project');
	$sql = "UPDATE `product_info` SET `quantity` = '$qty', `purchaseprice` = '$pprice', `sellingprice` = '$sprice' WHERE product_info.pid = '$id'";
	//$sql =""DELETE FROM `product_info` WHERE `product_info`.`pid` = 0"";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn); 
    header('location:update_product.php?id='.$id);
?>