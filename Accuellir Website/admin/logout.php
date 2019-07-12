<?php
	session_start();

	session_destroy();


	setcookie("adminuser","valid",time()-60,"/");

	header("location: ../login.php");

?>