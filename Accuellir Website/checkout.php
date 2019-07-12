<?php
	error_reporting(0);
	session_start();
	
	$_SESSION["script_call"]="valid"; //header only be requested from script
	require "userheader.php";
	
	if($_SESSION["customerlogin"]=="valid")
	{
		$con=mysqli_connect('localhost','root','','project');
		
		if ($con->connect_error) 
		{
			die("Connection failed: " . $con->connect_error);
		}
		
		
		
		$sql="select * from cart where customerid='".$_SESSION["user_id"]."' and status='incart'";
		//echo $query;
		
		$result = $con->query($sql);
		if ($result->num_rows > 0)
		{
?>	
			<style>
				.buttonshowproduct 
				{
					background-color: #2f4454; /* Green */
					border: none;
					color: white;
					padding: 15px 32px;
					text-align: center;
					text-decoration: none;
					display: inline-block;
					margin: 4px 2px;
					cursor: pointer;
					
				}
			
			</style>
			
			<table border='1' align="center" style="margin-top:20px;">
				<caption>Purchase Information</caption>
				<tr>
					<th style="width:500px;">item</th>
					<th style="width:100px;">quantity</th>
					<th style="width:200px;">unit price</th>
					<th style="width:200px;">total</th>
				</tr>
<?php
				$net=0;
				while($row = $result->fetch_assoc())
				{
					//echo "in while<br/>";
					
					$pid=$row['productid'];
					$cartid=$row['id'];
					//echo "pid : $pid<br/>";
					//echo "status : ".$row['status']."<br/>";
				
					$quantity=$row['quantity'];
					$sq="select * from product_info where pid='$pid'";
					$res=$con->query($sq);
					$rw = $res->fetch_assoc();


					$price=$rw['sellingprice'];
					$total=$quantity*$price;

					
					$purchase=$rw['purchaseprice'];


					$revenue+=$total-($purchase*$quantity);
					$net+=$total;
					echo '<tr>
							<td>'.$rw["pname"]." cartid: ".$row['id'].'</td>
							<td>'.$quantity.'</td>
							<td>'.$price.'</td>
							<td>'.$total.'</td>
						</tr>';
						$i++;
				}
				echo
					'<tr> 
						<td colspan="2"></td>	
						<td >net:</td>
						<td>'.$net.'</td>
					</tr>';
?>
			<tr> 
				<td align="center" colspan="4">
				<input class="buttonshowproduct" align="center" type="button" onclick="checkout(<?php echo $net; ?>,<?php echo $revenue; ?>)" value="confirm checkout">
				</td>
			</tr>
			</table>
			
<?php
		}
		else
		{
			echo '<center><h1>cart empty</h1></center>';
			
		}
	}
	else
	{
		echo '<center><a href="login.php"><h1>login</h1></a></center>';
	}
	

	
	
?>
<script>
	function checkout(total,revenue)
	{
		var total=total;
		var revenue=revenue;
		var xmlHttp = new XMLHttpRequest();
		console.log(total+""+revenue);

		xmlHttp.open('POST', 'ajaxconfirmcheckout.php?total='+total+'&revenue='+revenue, true);
		//console.log(total);
		xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		var abc ="pid=6";
		xmlHttp.send(abc);
		xmlHttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status==200)
			{
				//window.alert(this.responseText);
				if(this.responseText=='done')
				{
					window.location.replace("showcart.php");
				}
				else
				{
					//window.alert("not done");
				}	
			}
		}
	}
</script>

