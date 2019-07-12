<?php
	session_start();
	include 'db.php';

	if((isset($_SESSION['adminuser'])) || (isset($_COOKIE["adminuser"])))

	{	
		
		require 'header.php';
?>


<?php
if(isset($_POST['block'])){
	echo " <font color='red'><center>User Status!</center><br/></font>";
}
?>
	<form method="post" action="block.php">
		<br/>
		<head>
				<style>
				#customers {
				    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
				    border-collapse: collapse;
				    width: 100%;
				}

				#customers td, #customers th {
				    border: 1px solid #ddd;
				    padding: 8px;
				}

				#customers tr:nth-child(even){background-color: #f2f2f2;}

				#customers tr:hover {background-color: #ddd;}

				#customers th {
				    padding-top: 12px;
				    padding-bottom: 12px;
				    text-align: left;
				    background-color: #788296;
				    color: white;
				}
				</style>
				</head>
			<table id="customers" border="1" style="width:50%; text-align: center;width: 75%;margin: 0 auto;">
		<tr>
			<th><center><font>ID</font></center></th>
			<th><center><font>Name</font></center></th>		
			<th><center><font>Address</font></center></th>
			<th><center><font>User Type</font></center></th>
			<th><center><font>Action</font></center></th>
			
			
		</tr>

		<tr>
		
	<?php

		if(!$conn){
			echo "DB Error: ".mysqli_connect_error();
		}else{
			$sql= "SELECT * from user";
			$result = mysqli_query($conn, $sql);

			while($row = mysqli_fetch_assoc($result)){

				if ($row['approval']=="approve") {

						if ($row['status']=="0"){
							echo '<tr><center>
							<td>'.$row['uid'].'</td>
							<td>'.$row['name'].'</td>
							<td>'.$row['address'].'</td>
							<td>'.$row['type'].'</td>
							<td>
							<input style="background-color: green; color:white;"  type="button" name="block" value="'.$row['approval'].'" >
							<input style="background-color: #f44336; color:white;" type="button" name="block" value="unblock" onclick="loadData('.$row['uid'].',this.value)""></td>	
						</center></tr>';
							
						}

						elseif ($row['status']=="1"){

							echo '<tr><center>
							<td>'.$row['uid'].'</td>
							<td>'.$row['name'].'</td>
							<td>'.$row['address'].'</td>
							<td>'.$row['type'].'</td>
							<td>
							<input style="background-color: green; color:white;"  type="button" name="block" value="'.$row['approval'].'" disabled >
							<input style="background-color: #f44336; color:white;" type="button" name="block" value="block" onclick="loadData('.$row['uid'].',this.value)" ></td>	
						</center></tr>';


							
						}

				}
				elseif ($row['approval']=="deny") 	
				{
						//$approved="approved";
						//$denied="denied";


					echo '<tr><center>
							<td>'.$row['uid'].'</td>
							<td>'.$row['name'].'</td>
							<td>'.$row['address'].'</td>
							<td>'.$row['type'].'</td>
							<td>
							<input style="background-color: green;   color:white;" type="button" name="block" value="denied"  disabled />
							<input style="background-color: #f44336; color:white;" type="button" name="block" value="approve" onclick="loadApprovalData('.$row['uid'].',this.value)" />
							</td>
						</center></tr>';

				
				}
				elseif ($row['approval']=="request") 	
				{
					//$approved="approved";
					//$denied="denied";



					echo '<tr><center>
							<td>'.$row['uid'].'</td>
							<td>'.$row['name'].'</td>
							<td>'.$row['address'].'</td>
							<td>'.$row['type'].'</td>
							<td>
							<input style="background-color: green;   color:white;" type="button" name="block" value="approve" onclick="loadApprovalData('.$row['uid'].',this.value)"  />
							<input style="background-color: #f44336; color:white;" type="button" name="block" value="deny" onclick="loadApprovalData('.$row['uid'].',this.value)" />
							</td>
						</center></tr>';

				
				}
				
			

			}	

		}
		
			
	?>		
		
		</tr>
	</table>


		
	</form>
</fieldset>
<?php 

	  	require 'footer.php';
	  	 ?>
		
<?php
}else{
		header("location: ../login.php");
		}	
?>

<script type="text/javascript">
		
		function loadData(uid,unblock){

			var xmlHttp = new XMLHttpRequest();
			xmlHttp.open('POST', 'block.php', true);
			xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			var abc = "uid="+uid+"&unblock="+unblock;
			xmlHttp.send(abc);
			xmlHttp.onreadystatechange = function(){

				if(this.readyState == 4 && this.status==200)
				{
					alert(this.responseText);
					window.location = '';
				}
			}

		}

		function loadApprovalData(uid,approval){



			var xmlHttp = new XMLHttpRequest();
			xmlHttp.open('POST', 'approval.php', true);
			xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			var abc = "uid="+uid+"&approval="+approval;
			xmlHttp.send(abc);
			xmlHttp.onreadystatechange = function(){

				if(this.readyState == 4 && this.status==200)
				{
					alert(this.responseText);
				}
			}

		}


		function abc(data){

			document.getElementById('block').value=data;
			document.getElementById('result').innerHTML="";
		}

	</script>
