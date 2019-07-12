<?php
	if((isset($_SESSION['adminuser'])) || (isset($_COOKIE["adminuser"])))

	{
?>
<html>
<style type="text/css">
	tr
		{
			width:800;
		}
		th
		{
			text-align:center;
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

		.dropdown-content {
			  display: none;
			  position: absolute;
			  background-color: #2f4454;
			  min-width: 164px;
			  box-shadow: 0px 8px 15px 0px rgba(0,0,0,0.2);
			  z-index: 1;
			}
			
			.dropdown-content a {
			  float: none;
			  color: white;
			  padding: 12px 12px;
			  text-decoration: none;
			  display: block;
			  text-align: left;
			}
			
			.dropdown-content a:hover {
			  background-color: #17252a;
			  color : #ffffff;
			}
			
			.dropdown:hover .dropdown-content {
			  display: block;
			}
</style>

			<form method="post" action="home.php">
				<br/>
					<table border="0" cellpadding="0" style="width: 75%; background-color: #D3D3D3;margin: 0 auto; ">
				<tr>
					<tr bgcolor="#474e5d">
					<STYLE>A {text-decoration: none;} </STYLE>
					<td height="50" style="text-align: center; vertical-align: middle;"><a href='home.php'><b><font color="white">Home</font></b></a></td>
					<td style="text-align: center; vertical-align: middle;"><a href='reg.php'><b><font color="white">Add Admin</font></b></a></td>
					<td style="text-align: center; vertical-align: middle;"><a href='UserStatus.php'><b><font color="white">User Status</font></b></a></td>
					<td style="text-align: center; vertical-align: middle;"><a href='product.php'><b><font color="white">Product</font></b></a></td>
					




					<td style="text-align: center; vertical-align: middle;">


						<!-- <a href='customer.php'><b><font color="white">Customer Info</font></b></a> -->
						

					<span class="dropdown" style="float:right" width = "10%">
			  		  <a style="color: white;text-align: center;font:bold;margin-left: -80px;">Orders
			  		  </a>
			  			<div class="dropdown-content">
			        		<a href="orderinfo.php">Order Info</a>		
			        		<a href="revenue.php">Sales and Revenue</a>
			        			
			    		</div>
			  		</span> 
					</td>
					<td style="text-align: center; vertical-align: middle;">


						<!-- <a href='customer.php'><b><font color="white">Customer Info</font></b></a> -->


					<span class="dropdown" style="float:right" width = "10%">
			  		  <a style="color: white;text-align: center;font:bold;margin-left: -80px;">Users
			  		  </a>
			  			<div class="dropdown-content">
			        		<a href="customer.php">Customer Info</a>		
			        		<a href="response.php">User response</a>
			        		<a href="seller.php">Sales personnel Info</a>	
			    		</div>
			  		</span> 
					</td>
					<!-- <td style="text-align: center; vertical-align: middle;"><a href='seller.php'><b><font color="white">Sales personnel Info</font></b></a></td> -->
					<td style="text-align: center; vertical-align: middle;"><a href='logout.php'><b><font color="white">Logout</font></b></a></td>
							
				</tr>
				
			</table>	
			</form>

</html>

<?php
}else{
		header("location: ../login.php");
		}	
?>