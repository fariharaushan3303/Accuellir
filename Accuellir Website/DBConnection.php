<?php
	header("location: login.php");
	$con=mysqli_connect('localhost','root','','project');
	if(!$con)
	{
		echo "failed to connect to database";
	}
	

?>