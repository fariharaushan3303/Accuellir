<?php
	session_start();
	include 'db.php';
	if((isset($_SESSION['adminuser'])))
	{
		require 'header.php';
?>
	<html>
		<form method="post" action="customer_search.php">
			
			<body>		
				<table style="width: 75%; background-color: white;margin: 0 auto;" >
					<tr>
						<td style="width:100px"></td>
						<td>
							<input style="height:30px; width:75%;" type="text" id='search' name="" onkeyup="loadData()">
					   		<input style="height:30px" type="button"  name="" value="Search" >

							<div id="result">
							
						    </div>
						</td>
						<td></td>
					</tr>
												

				</table>
				

	<script type="text/javascript">
		
		function loadData(){

			var xmlHttp = new XMLHttpRequest();
			var v=document.getElementById('search').value;
			if(v.length==0) 
			{
				document.getElementById('result').innerHTML = "";
					return;
			}
			xmlHttp.open('POST', 'customer_search.php', true);
			xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			var abc = "key="+v;
			xmlHttp.send(abc);

			xmlHttp.onreadystatechange = function(){

				if(this.readyState == 4 && this.status==200)
				{
					//alert(this.responseText);
					document.getElementById('result').innerHTML = this.responseText;
					//alert(this.responseText);
				}
			}

		}

		function abc(data){

			document.getElementById('search').value=data;
			document.getElementById('result').innerHTML="";
		}

	</script>

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
		<table id="customers" border="1" style="width: 75%; background-color: white;margin: 0 auto;text-align: center;">
			<tr>
				<th><center><font>Name</font></center></th>
				<th><center><font>Email</font></center></th>
				<th><center><font>Contact no</font></center></th>
				<th><center><font>Gender</font></center></th>
				<th><center><font>Address</font></center></th>
			</tr>

		<tr>	
	<?php
			
			

			if(!$conn){
				echo "DB Error: ".mysqli_connect_error();
			}else{
				$sql= "SELECT * from user where type='customer' ";

				$result = mysqli_query($conn, $sql);

				while($row = mysqli_fetch_assoc($result)){
					
					echo '<tr><center>
								<td>'.$row['name'].'</td>
								<td>'.$row['email'].'</td>
								<td>'.$row['contact_number'].'</td>
								<td>'.$row['gender'].'</td>
								<td>'.$row['address'].'</td>
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