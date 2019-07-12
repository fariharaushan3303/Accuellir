<?php
	session_start();
	if(isset($_POST['submit'])){
		$name  = trim($_POST['name']);
		$email  = trim($_POST['email']);
		$type = trim($_POST['contact']);
		$message = trim($_POST['message']);
		if($type == 'issue') $type = 1;
		else if($type == 'help') $type = 2;
		else $type = 3;
		echo $name." ".$email." ".$type." ".$message."<br>";
		$conn = mysqli_connect('localhost', 'root', '', 'project');
		$sql = "INSERT INTO response (rid, name, type, email, message) VALUES (NULL, '$name', '$type', '$email', '$message')";
		$retval = mysqli_query($conn, $sql);
        if(! $retval ) echo "Could not enter data\n";
        else echo "Entered data successfully\n";
		mysqli_close($conn);
		header('location: contact.php?s=1');
	}else{
		header('location: contact.php');
	}
?>