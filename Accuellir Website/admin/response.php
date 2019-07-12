<?php
	session_start();
	include 'db.php';
	if((isset($_SESSION['adminuser'])))
	{
		require 'header.php';
?>
	<html>
		
			
			<body>		
				

	
		<br/>
		<head>
				<style>
				#responses {
				    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
				    border-collapse: collapse;
				    width: 100%;
				}

				#responses td, #responses th {
				    border: 1px solid #ddd;
				    padding: 8px;
				}

				#responses tr:nth-child(even){background-color: #f2f2f2;}

				#responses tr:hover {background-color: #ddd;}

				#responses th {
				    padding-top: 12px;
				    padding-bottom: 12px;
				    text-align: left;
				    background-color: #788296;
				    color: white;
				}
				</style>
				</head>
		<table id="responses" border="1" style="width: 75%; background-color: white;margin: 0 auto;text-align: center;">
			<tr>
				<th><center><font>Name</font></center></th>
				<th><center><font>Type</font></center></th>
				<th><center><font>Email</font></center></th>
				<th><center><font>Message</font></center></th>
				
			</tr>

		<tr>	
	<?php
			
			

			if(!$conn){
				echo "DB Error: ".mysqli_connect_error();
			}else{
				$sql= "SELECT * from RESPONSE ";

				$result = mysqli_query($conn, $sql);


				while($row = mysqli_fetch_assoc($result)){
					$type="";

					if ($row['type']=='1') {
						$type="Report issues";
					}
					if ($row['type']=='2') {
						$type="Help";
						
					}
					if ($row['type']=='3') {
						$type="Others";
						
					}
					
					echo '<tr><center>
								<td>'.$row['name'].'</td>
								<td>'.$type.'</td>
								<td>'.$row['email'].'</td>
								<td>'.$row['message'].'</td>
							</center></tr>';
				}	

			}
			
			
	?>		
		
		</tr>
	</table>
	<?php 

	  	require 'footer.php';
	  	 ?>		

	</body>
	
</html>
<?php
}else{
		header("location: login.php");
		}	
?>