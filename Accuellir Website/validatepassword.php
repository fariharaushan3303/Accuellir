<?php
	error_reporting(0);
	session_start();
	if($_SESSION['script_validation']!=true) header("Location: eshopping.php");
	$password 	= $_POST['password'];
	$cpass 	= $_POST['cpassword'];
	$passvalid=true;
	if(empty($password))
	{
		$_SESSION["passvalid"]="password can't be empty";
		$_SESSION["cpassvalid"]="";
		$passvalid=false;
	}
	else
	{
		if( strlen($password)<3)
		{
			$_SESSION["passvalid"]="password at least 3 character";
			$_SESSION["cpassvalid"]="";
			$passvalid=false;
		}
		else if($password!=$cpass)
		{
			$_SESSION["passvalid"]="";
			$_SESSION["cpassvalid"]="no matched";
			$passvalid=false;
		}
	}
?>