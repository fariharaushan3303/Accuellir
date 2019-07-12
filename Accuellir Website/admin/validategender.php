<?php
	error_reporting(0);
	session_start();
	if($_SESSION['script_validation']!=true) header("Location: eshopping.php");
	$gender= $_POST['gender'];
	//echo "gender : ".$gender." ";
	$gendervalid=false;
	if(isset($_POST['gender'])) 
	{
		$gendervalid=true;
		//echo " <font color='green'>#valid<br/></font>";
	}
	else
	{
		echo " <font color='red'>#gender invalid<br/></font>";
	}	
	
?>