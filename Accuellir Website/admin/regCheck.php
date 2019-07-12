<?php
	session_start();
	include 'db.php';

if((isset($_SESSION['adminuser'])) || (isset($_COOKIE["adminuser"])))

	{
	
	error_reporting(0);

	if(isset($_POST['submit'])){

		$username = $_POST['username'];
		$password = $_POST['password'];
		$gender   = $_POST['gender'];

		if($username == "" || $password == ""){
			header("location: reg.php?status=nullvalue");
		}
		else if(!isset($_POST['gender']))
		{
					echo " <font color='red'>#gender invalid<br/></font>";		
		}


		else
		{

			if(!$conn){
				echo "DB Error: ".mysqli_connect_error();
			}else{
				$sql="Insert into user values('','$username','$password','$gender')";
				
				if(mysqli_query($conn, $sql)){
				header("location: login.php");
				}else{
					header("location: reg.php?status=error");
				}

				mysqli_close($conn);
			}

			
		}

	}
	else{
		echo "invalid Reguest!";
		}

}else{
		header("location: ../login.php");
	}	
?>
	
