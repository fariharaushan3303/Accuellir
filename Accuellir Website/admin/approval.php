<?php
		include 'db.php';
		$key 	= $_POST['uid'];
		$approval  = $_POST['approval'];

		

	
		$sql = "update user set approval='$approval' where uid='$key'";
		//echo $sql;
		
		if(mysqli_query($conn, $sql))
		{
				echo 'user status updated successfully ';
		}

				mysqli_close($con);
			
	
			
?>
