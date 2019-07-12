<?php
	error_reporting(0);
	session_start();
	$_SESSION["script_call"]="valid"; //header only be requested from script
	
	//echo "header done<br/>";
	if($_SESSION["customerlogin"]=="valid" ) 
	{
		header("Location: index.php");
		//echo "valid found<br/>";
	}
	else if((isset($_SESSION['abc'])))
	{
		header('location: profile.php');
	}
	else if($_SESSION['adminuser']=="valid" )
	{
		header('location: admin/home.php');
	}
	else
	{
		//echo "summit login value: ".$_REQUEST['submitlogin']."<br/>";
		if(isset($_REQUEST['submitlogin']))
		{
			$_SESSION['invalidloginNotice']="";
			//echo "submit clicied<br/>";
			$email=$_REQUEST["email"];
			$password=$_REQUEST["password"];
			$con=mysqli_connect('localhost','root','','project');
			//echo "connection done<br/>";
			if ($con->connect_error) 
			{
				die("Connection failed: " . $con->connect_error);
			}
			$sql = "SELECT * FROM user where email='$email' and status='1'  " ;
			//echo $sql.'<br/>';
			$result = $con->query($sql);
			$validuser=false;
			//echo "query done<br/>";
			if ($result->num_rows > 0)
			{
				// output data of each row
				$row = $result->fetch_assoc();
				if($password == $row["password"] && $row["approval"]=='approve' )
				{
					
					if($row['type']=='customer')
					{
						if(isset($_POST["remember_me"]))
						{
							setcookie("remember_me","valid",time()+86400);
							setcookie("user_name",$row['name'],time()+86400);
							setcookie("user_id",$row['uid'],time()+86400);
							setcookie("user_type",$row['type'],time()+86400);
						}

						$_SESSION["customerlogin"]="valid";
						$_SESSION["user_name"]=$row['name'];
						$_SESSION["user_id"]=$row['uid'];
						$_SESSION["user_type"]=$row['type'];
						header('location: index.php');
					}
					else if($row['type']=='saler')
					{
						if(($_POST['remember'])=="on")
						{
							$_SESSION['abc'] = "validuser";
							//$_SESSION['display'] = $row["id"];
							setcookie("display",$row['uid'],time()+8000,"/");
							setcookie("tick","valid",time()+8000,"/");
							
						}
						else
						{
							//$_SESSION['display'] = $row["uid"];
							setcookie("display",$row['uid'],time()+8000,"/");
							$_SESSION['abc'] = "validuser";
							
						}
						$_SESSION["user_name"]=$row['name'];
						$_SESSION["user_id"]=$row['uid'];
						$_SESSION["user_type"]=$row['type'];
						header('location: profile.php?id='.$row['uid']);
					}
					else if($row['type']=='admin')
					{
						if(isset($_POST["remember_me"]))
						{
							$_SESSION['adminuser']="valid";
							setcookie("adminuser","valid",time()+60,"/");
							
						}
						$_SESSION['adminuser']="valid";
						header('location: admin/home.php');

					}
					
					
					
					$validuser=true;
					
				}
			}
			if(!$validuser)
			{
				$invalidloginNotice="invalid login";
				//header('location: login.php?status=error');
				//echo "summit login value: ".$_REQUEST['submitlogin']."<br/>";
			}

		}
		else
		{
			//echo "submitlogin not clicked<br/>";
			
		}
?>
		<html>
		
			
			<head>
					<title>LogIn</title>
					<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  width: 24%;
  margin-left: 38%;
}

form {border: 3px solid #f1f1f1; }

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #2f4454;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.9;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #2f4454;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 50%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

</style>
			</head>
			<body>
				<br/><br/><br/><br/>
				<center>
					<form action="#" method="post">
						<div class="imgcontainer">
						    <a href="index.php">
						    <img src="images/web_logo.png"  class="avatar">
						    </a>
						  </div>



						  <div class="container">

						    <label for="email"><b>Email</b></label>
						    <input type="text"  name="email" value="<?=$email; ?>" placeholder="Enter Email"  required>

						

						    <label for="password"><b>Password</b></label>

						    <input type="password" name="password"  placeholder="Enter Password"  required>

						    <span id="invalid notice"><?php echo " <font color='red'>".$invalidloginNotice."</font>"; ?></span> 

						        
						    <button name="submitlogin">Login</button>

						    <label>
						      <input type="checkbox" name="remember_me" value="" />remember me
						    </label>
						  </div>


						  <div class="container" style="background-color:#f1f1f1">
						    <a href="index.php">
						    <button type="button" class="cancelbtn">Cancel</button>
						    </a>
						    <span class="psw"> <a href="registration.php">new here?</a></span>
						  </div>







						<!-- <table>
							<tr >
								<th>Email:</th>
								<td>
									<input type="text"  name="email" value="" style="width: 300px;"  />
								</td>
								<td/>
							</tr>
							
							<tr>
								<th>Password:</th>
								<td>
									<input type="password" name="password" style="width: 300px;" />
								</td>
								<td id="invalid notice">?></td> 
							</tr>
							<tr >
								<th/>
								<td align="left">
									<input type="checkbox" name="remember_me" value="" />remember me
									<input type="submit" name="submitlogin" value="Login">
								</td>	
							</tr>
							<tr >
								<th/>
								<td align="left">
									<a href="registration.php">new here?</a>
								</td>
							</tr>
						</table> -->
						
					</form>
				</center>
					
				
			</body>
		</html>
		
<?php
	}
?>
<script>
	
</script>





