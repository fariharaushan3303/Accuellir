<?php
	session_start();
	session_unset();
	session_destroy();
	setcookie("remember_me","",time()-60);
	setcookie("user_name","",time()-86400);
	setcookie("user_id","",time()-86400);
	setcookie("user_type","",time()-86400);
	//session_destroy();
	header("location: index.php");
?>