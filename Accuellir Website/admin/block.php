<?php

		$key 	= $_POST['uid'];
		$unblock 	= $_POST['unblock'];
		if ($_POST['unblock']=="unblock") {
			$unblock=1;
		}
		elseif ($_POST['unblock']=="block") {
			$unblock=0;
		}

		$con = mysqli_connect('localhost', 'root', '', 'project');
		$sql = "update user set status='$unblock' where uid='$key'";
		//echo $sql;
		
		if(mysqli_query($con, $sql))
		{
				echo 'user updated successfully ';
		}

				mysqli_close($con);
			
	
			
?>
