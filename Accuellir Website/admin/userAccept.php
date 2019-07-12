<?php
	session_start();


	if((isset($_SESSION['adminuser'])) || (isset($_COOKIE["adminuser"])))

	{

		require 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>userAccept</title>
</head>
<body>

		<fieldset>
		    <legend><b>Pending User List</b></legend>

<?php
if(isset($_POST['accept'])){
	echo " <font color='green'><center>User Accepted!</center><br/></font>";
}
?>

		    
			<form method="post" action="userAccept.php">
				<br/>
					<table border="1" style="width: 50%">
				<tr>
					
					<th><center><font color="blue">Name</font></center></th>
					<th><center><font color="blue">ID</font></center></th>			
					<th><center><font color="blue">Address</font></center></th>
					<th><center><font color="blue">Action</font></center></th>
					
					
				</tr>

				<tr>
					
					<td><center><font color="black">Shuvo</font></center></td>
					<td><center><font color="black">1111</font></center></td>			
					<td><center><font color="black">Nikunja-2,Dhaka</font></center></td>
					<td><center><font color="black"><input type="submit" name="accept" value="accept"></font></center></td>
					
					
				</tr>

				<tr>
					
					<td><center><font color="black">Nirjhor</font></center></td>
					<td><center><font color="black">2222</font></center></td>			
					<td><center><font color="black">Mirpur 10,Dhaka</font></center></td>
					<td><center><font color="black"><input type="submit" name="accept" value="accept"></font></center></td>
					
					
				</tr>

				<tr>
					
					<td><center><font color="black">Shariar</font></center></td>
					<td><center><font color="black">3333</font></center></td>			
					<td><center><font color="black">Adabor,Dhaka</font></center></td>
					<td><center><font color="black"><input type="submit" name="accept" value="accept"></font></center></td>
					
					
				</tr>
			</table>

				
			</form>
		</fieldset>


</body>
</html>
		

<?php
}else{
		header("location: ../login.php");
		}	
?>