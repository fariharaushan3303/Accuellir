<?php
	error_reporting(0);
	session_start();
	if($_SESSION['script_validation']!=true) header("Location: eshopping.php");
	$type = $_POST['type'];
	$typevalid=true;
	
?>