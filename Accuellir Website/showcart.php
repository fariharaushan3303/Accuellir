<?php
	error_reporting(0);
	session_start();
	
	$_SESSION["script_call"]="valid"; //header only be requested from script
	require "userheader.php";
	//require "dropdown.php";
	if($_SESSION["customerlogin"]=="valid")
	{
		$con=mysqli_connect('localhost','root','','project');
		if ($con->connect_error) 
		{
			die("Connection failed: " . $con->connect_error);
		}
		//$sql="select * from cart where status='incart'";
		$sql="select * from cart where customerid='".$_SESSION["user_id"]."' and status='incart'";
		//$sql="select * from cart where customerid='".$_SESSION["user_id"]."'";
		//echo $sql."<br/>";
		//echo $query;
		$result = $con->query($sql);
		if ($result->num_rows > 0)
		{
?>	
			<style>
				.button 
				{
					background-color: #2f4454;
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
					<th style="width:100px;">unit price</th>
					<th style="width:150px;">total</th>
					<th style="width:200px;">action</th>
					
				</tr>
<?php
				//echo "in php<br/>";
				$net=0;
				$i=1;
				//echo "before while<br/>";
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
					$net+=$total;
					echo '<tr>
							<td>'.$rw["pname"].'</td>
							<td>'.$quantity.'</td>
							<td>'.$price.'</td>
							<td>'.$total.'</td>
							<td><input type="button" value="remove" onclick="removeitem('.$cartid.')"></td>
						</tr>';
						$i++;
				}
				echo
					'<tr> 
						<td colspan="2"></td>	
						<td >net:</td>
						<td colspan="2">'.$net.'</td>
					</tr>';
					
?>
			<tr> 
				<td align="center" colspan="5">
					<input class="button" align="center" type="button" onclick="window.location.href='addressinput.php'" value="checkout">
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
	function removeitem(cartid)
	{
		//window.alert("in remove "+cartid);
		
		var xmlHttp = new XMLHttpRequest();

		xmlHttp.open('POST', 'ajaxremovefromcart.php', true);
		xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		var abc ="cartid="+cartid;
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
