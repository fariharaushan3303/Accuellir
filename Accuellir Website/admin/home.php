<?php
	session_start();
	include 'db.php';
	if((isset($_SESSION['adminuser'])) || (isset($_COOKIE["adminuser"])))
	{
		require 'header.php';

?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Dashboard</title>
		<style type="text/css">
		tr
		{
			width:800;
		}
		th
		{
			text-align:center;
			background-color: #CFD8DC;
			padding: 10px;
			width:250px;
			font-size:20px;
		}
		td
		{
			padding: 15px;
			width:250px;
			text-align: center;
			font-size:20px;
		}
		</style>
	</head>
	<body >
		<div style="width: 75%;margin: 0 auto;"><br>
			<h2><a href="home.php">Homepage / </a>Dashboard</h2><br>
			<table border="0" cellpadding="0" style="width: 75%; background-color: white;margin: 0 auto; ">

				<th>Total products</th>
				<th>Total Orders</th>
				<th>Total Sales</th>
				<th>Total Customers</th>
				<th>Total Revenue</th>


				<tr>
				<?php

				if(!$conn){
					echo "DB Error: ".mysqli_connect_error();
				}else{

					$sql1= "SELECT * from order_info ";
					//mysqli_num_rows($result1);

					//$sq2= "SELECT * from orderinfo where status='accepted' ";
					
					$sql4= mysqli_query($conn,"SELECT sum(total_price) as price from order_info ");
					$rowsales = mysqli_fetch_array($sql4);
					$sumtotal = $rowsales['price'];

					$result1 = mysqli_query($conn, $sql1);
					$rowcount1=mysqli_num_rows($result1);

					//$result4 = mysqli_query($conn, $sql4);
					/*$row = mysql_fetch_assoc($sql4); 
					$sum = $row['o'];
					echo $sum;
					*/

					$sql = mysqli_query($conn,"SELECT SUM(quantity) as total FROM product_info");
					$row = mysqli_fetch_array($sql);
					$sum = $row['total'];

					

					//$rowcount4 = mysqli_num_rows($result4);
					

					/*$result2 = mysqli_query($conn, $sql2);
					$rowcount2=mysqli_num_rows($result1);*/

					$sql3= "SELECT * from user where type='customer' ";
					$result3 = mysqli_query($conn, $sql3);
					$rowcount3=mysqli_num_rows($result3);

//Revenue
					$sql5 = mysqli_query($conn,"SELECT SUM(revenue) as total FROM order_info");
					$row2 = mysqli_fetch_array($sql5);
					$sum_revenue = $row2['total'];

					//echo $rowcount;
					echo '<tr><center>
									<td style="background-color:#dbd2d0;">'.$sum.'</td>
									<td style="background-color:#d2dbd0;">'.$rowcount1.'</td>
									<td style="background-color:#d4d0db;">'.$sumtotal. ' BDT</td>
									<td style="background-color:#dadbd0;">'.$rowcount3.'</td>
									<td style="background-color:#dadbd0;">'.$sum_revenue.' BDT</td>
								</center></tr>';
					/*while($row = mysqli_fetch_assoc($result)){
						
						
					}	*/

				}
				
				
		?>

				
					
				</tr>
		  	</table>
			<br><br><h2 style="text-align: center;">Latest Orders</h2><br><br>
		  	<table id="customers" border="1" style="width: 75%; background-color: white;margin: 0 auto;text-align: center;">
			<tr>
				<th><center><font>Order ID</font></center></th>
				<th><center><font>Customer ID</font></center></th>
				<th><center><font>Total Price</font></center></th>
				<th><center><font>Date</font></center></th>
				
			</tr>

		<tr>	
	<?php
			//SELECT * FROM Emp ORDER BY salary DESC;
			

			if(!$conn){
				echo "DB Error: ".mysqli_connect_error();
			}else{
				$sql= "SELECT * from order_info  ORDER BY oid DESC LIMIT 4";

				$result = mysqli_query($conn, $sql);

				while($row = mysqli_fetch_assoc($result)){
					
					echo '<tr><center>
					            <td>'.$row['oid'].'</td>
								<td>'.$row['uid'].'</td>
								<td>'.$row['total_price'].'</td>
								<td>'.$row['date'].'</td>
								
							</center></tr>';
				}	

			}
			
			
	?>		
		
		</tr>
	</table>
	  	</div>
	  	<?php 

	  	require 'footer.php';
	  	 ?>



	</body>
	</html>
<?php		
	}
	else{
		header("location: ../login.php");
	}

?>