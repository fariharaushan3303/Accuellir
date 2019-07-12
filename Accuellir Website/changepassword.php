<?php
	error_reporting(0);
	session_start();
	$_SESSION["script_call"]="valid"; //header only be requested from script
	require "header.php";
	//echo "header done<br/>";
	if($_SESSION["customerlogin"]!="valid" ) 
	{
		header("Location: eshopping.php");
		//echo "valid found<br/>";
	}
	else
	{
		$con=mysqli_connect('localhost','root','','project');
		//echo "connection done<br/>";
		if ($con->connect_error) 
		{
			die("Connection failed: " . $con->connect_error);
		}
		$sql = "SELECT password FROM user where uid='".$_SESSION['user_id']."'";
		//echo $sql.'<br/>';
		$result = $con->query($sql);
		$row = $result->fetch_assoc();
		$password = $row["password"];
?>
		<html>		
			<style>
				tr
				{
					width:800;
				}
				th
				{
					text-align:right;
					width:200px;
				}
				td
				{
					padding: 5px;
					width:250px;
				}
			</style>
			<head>
					<title>ConfirmPassword</title>
			</head>
			<body>
				<br/><br/><br/><br/>
				<center>
					<table>
						<tr >
							<th>Old Password</th>
							<td>
								<input id="oldpassword" type="password"  name="oldpassword" style="width: 300px;"  />
							</td>
							<td id="oldpasswordnotice"></td>
						</tr>
						<tr>
							<th>New Password:</th>
							<td>
								<input id="newpassword" type="password" name="newpassword" style="width: 300px;" />
							</td>
							<td id="newpasswordnotice"></td>
						</tr>
						<tr >
							<th/>
							<td align="left">
								<input type="button" name="changepassword" value="Save" onclick="changepassword('<?= $password; ?>')">
							</td>	
						</tr>
		
					</table>
					<div  id="update" style="display: none;">
						<h2>password updated<h2>
						<input type="button" value="continue shopping" onclick="window.location.href='eshopping.php'">
						
					</div>
		
				</center>				
			</body>
		</html>
		
<?php
	}
?>

<script>
	function changepassword(originalpassword)
	{
		//window.alert("originalpassword : "+originalpassword);
		document.getElementById("newpasswordnotice").innerHTML="";
		document.getElementById("oldpasswordnotice").innerHTML="";
		//window.alert("clear");
		var oldpassword=document.getElementById("oldpassword").value;
		if(oldpassword!=originalpassword)
		{
			document.getElementById("oldpasswordnotice").innerHTML="<font color='red'>incorrect password</font>";
			return;
		}
		else
		{
			//window.alert("oldpassword ok");
		}
		var newpassword=document.getElementById("newpassword").value;
		if(newpassword.length<8)
		{
			document.getElementById("newpasswordnotice").innerHTML="<font color='red'>password atleast 8 character</font>";
			return;
		}
		var xmlHttp = new XMLHttpRequest();

		xmlHttp.open('POST', 'ajaxchangepassword.php', true);
		xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		var abc = "password="+newpassword;
		xmlHttp.send(abc);
		
		xmlHttp.onreadystatechange = function(){

			if(this.readyState == 4 && this.status==200)
			{
				//window.alert(this.responseText);
				if(this.responseText=="done")
				{
					document.getElementById("update").style.display="block";
					document.getElementById("oldpassword").value="";
					document.getElementById("newpassword").value="";
					
				}							
	
			}
		}
	}
</script>