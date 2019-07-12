<?php
	error_reporting(0);
	session_start();
	$_SESSION["script_call"]="valid"; //header only be requested from script
	require "header.php";
	require "dropdown.php";
	$con=mysqli_connect('localhost','root','','project');
	if ($con->connect_error) 
	{
		die("Connection failed: " . $con->connect_error);
	}
	$sql="select * from product where pid='".$_REQUEST['id']."'";
	$pid=$_REQUEST['id'];
	//echo $sql."<br/>";
	$result = $con->query($sql);
	if($result->num_rows == 0)
	{
		echo "<h1>not found</h1>";
	}
	else
	{
		$row=$result->fetch_assoc();
?>
		<html>
			<head>
				<link rel="stylesheet" href="customermystyle.css">
					
				<style>
					tr
					{
						width:1200px;
					}

					th
					{	
						width:200px;
					}
					td
					{
						padding: 5px;
						width:1000px;
					}
					.rate {
					
						height: 46px;
						
					}
					.rate:not(:checked) > input {
						position:absolute;
						top:-9999px;
					}
					.rate:not(:checked) > label {
						float:left;
						width:1em;
						overflow:hidden;
						white-space:nowrap;
						cursor:pointer;
						font-size:20px;
						color:#ccc;
					}
					.rate:not(:checked) > label:before {
						content: '★ ';
					}
					.rate > input:checked ~ label {
						color: #ffc700;    
					}
					.rate:not(:checked) > label:hover,
					.rate:not(:checked) > label:hover ~ label {
						color: #deb217;  
					}
					.rate > input:checked + label:hover,
					.rate > input:checked + label:hover ~ label,
					.rate > input:checked ~ label:hover,
					.rate > input:checked ~ label:hover ~ label,
					.rate > label:hover ~ input:checked ~ label {
						color: #c59b08;
					}

				</style>
			<head>
			<body style="height:3000px;">
				<hr style="margin-top:100px;"/> 
				<div class="cartalert" id="mycart">
					<h2>added to cart<h2>
					<input type="button" value="checkout now" onclick="window.location.href='addressinput.php'">
					
				</div>
				
				<div class="showproduct">
					<div class="picture">
						<img src=<?php echo "shopkeeper/uploads/".$row['pid'].".jpg"; ?> alt=<?php echo "shopkeeper/uploads/".$row['pid'].".jpg"; ?> >
					</div>
					<div class="info" >
						<div class="name">
							<h1><?php echo $row['name']; ?></h1>
							<hr/>
						</div>
						<div style="height:300px";>
							<h3>raging:
								<div style="color:#ffc700; ">
		<?php 
									for($i=0;$i<$row['rating'];$i++)
									{
		?>
										★
		<?php
									}	
		?>
									 
								</div>
							
							
							
							
		<?php
							if($_SESSION["customerlogin"]=="valid")
							{
		?>					
								<span> <a href= <?php echo "'commentinput.php?id=$pid'"; ?> >(write review)</a></span>						
		<?php
							}
		?>
								
							</h3>
							<hr/>
							<h3>Feature:</h3>
		<?php
								$features=explode("\n",$row['specification']);
								foreach($features as $data)
								{
									echo "<p>>$data</p>";
								}		
		?>
					</div>
						<hr/>
						<div style="width:500px; height:100px; border:0px solid black;";>
							<div style="float:left; height:inherit; width:200px;border:0px solid blue; ">
		<?php
								if($row['discount']>0)
								{
		?>
									<h3>৳ <?php echo $row['price']-($row['discount']/100)*$row['price']; ?></h3>
									<h3><s>৳<?php echo $row['price']; ?></s></h3> <span> <h3> - <?php echo $row['discount'];?>% off </h3 ></span>	
		<?php
								}
								else
								{
									echo '<h3>৳ '.$row['price'].'</h3>';
								}
		?>
							</div>
							<div style="float:right; height:inherit; width:200px;border:0px solid blue; ">
		<?php
							if($_SESSION["customerlogin"]=="valid")
							{
		?>
								<p>quantity:<select  id="quantity">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											
										</select></p>
								<input style="float:right"; type="button" value="add to cart" class="button" onclick="addtocart('<?php echo $_REQUEST['id']; ?>')">
		<?php
							}
		?>
							</div>
						</div>
					</div>
				</div>
				<h1 align="center" style="border:1px solid black;">review</h1>
				<div align="center">
				
		<?php
				if ($con->connect_error) 
				{
					die("Connection failed: " . $con->connect_error);
				}
				$sql="select * from comment_rating where productid='".$_REQUEST['id']."'";
				$result = $con->query($sql);
				while($row=$result->fetch_assoc())
				{
					
		?>			
					<table  >
						<tr>
							<th rowspan="2">
								<?php echo "<h1>".$row['username']."</h1>"; ?>
							</th>
							<td>
								<div style="color:#ffc700; ">
		<?php 
									for($i=0;$i<$row['rating'];$i++)
									{
		?>
										★
		<?php
									}	
		?>
									 
								</div>
							</td>
							</td>
									
							</td>
						</tr>
						<tr>
							<td><?php echo $row['comment'];?>
							</td>
						</tr>
					</table>
					<hr/>
				
				
					
		<?php
				}
		?>
				</div>
				
				
			</body>
		</html>
<?php
	}
?>		
<script>
	function addtocart(pid)
	{
		var quantity=document.getElementById("quantity").value;
		
		var xmlHttp = new XMLHttpRequest();

		xmlHttp.open('POST', 'ajaxaddtocart.php', true);
		xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		var abc = "quantity="+quantity+"&pid="+pid;
		//var abc = "key="+document.getElementById('commentbox').value;
		//var abc="key="+id;
		xmlHttp.send(abc);
		//window.alert("sending");
		xmlHttp.onreadystatechange = function(){

			if(this.readyState == 4 && this.status==200)
			{
				
				//window.alert(this.responseText);
				if(this.responseText=='done')
				{
					document.getElementById("mycart").style.display="block";
				}
				else
				{
					//window.alert("not done");
				}	
			}
		}
	}
	
</script>

