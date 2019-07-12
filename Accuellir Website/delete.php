<?php 
	session_start();
	$id = $_SESSION['pid'];
	$conn = mysqli_connect('localhost', 'root', '', 'project');
	$sql ="DELETE FROM `product_info` WHERE `product_info`.`pid` = '$id'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn); 
    header('location:product_list.php');
?>