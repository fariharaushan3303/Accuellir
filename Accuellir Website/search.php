<?php
	error_reporting(0);
	session_start();
	$_SESSION["script_call"]="valid"; //header only be requested from script
	require "header.php";
	require "dropdown.php";
	$_SESSION['product_searched']=$_GET['search_textbox'];
	$q=$_GET['search_textbox'];
	$uid=$_SESSION['user_id'];
	
	//echo $q."<br/>";
	if(!empty($q))
	{
		$con=mysqli_connect('localhost','root','','project');
		if ($con->connect_error) 
		{
			die("Connection failed: " . $con->connect_error);
		}
		$sql = "insert into search (value,userid) values('$q','$uid')";
		$result = $con->query($sql);
	}
	//echo $q."<br/>";
	$myarray=array();
	
	$con=mysqli_connect('localhost','root','','project');
	if ($con->connect_error) 
	{
		die("Connection failed: " . $con->connect_error);
	}
	$sql = "SELECT  DISTINCT catagory FROM product where catagory like '$q%'";
	$result = $con->query($sql);
	//echo $sql."<br/>";
	$c=0;
	if($result->num_rows > 0)
	{
		//echo "found<br/>";
		$row=$result->fetch_assoc();
		//echo $row['catagory']."<br/>";
		$sql="select pid from product where catagory='".$row['catagory']."'";
		//echo $sql."<br/>";
		$result = $con->query($sql);
		while($row=$result->fetch_assoc())
		{
			array_push($myarray,$row['pid']);
			$c++;
		}
	}
	//echo $c."<br/>";
	
	
	$sql = "SELECT  DISTINCT type FROM product where type like '%$q%'";
	$result = $con->query($sql);
	//echo $sql."<br/>";
	
	if($result->num_rows > 0)
	{
		while($row=$result->fetch_assoc())
		{
			$sql="select pid from product where type='".$row['type']."'";
			$res = $con->query($sql);
			while($r=$res->fetch_assoc())
			{
				array_push($myarray,$r['pid']);
				$c++;
			}
		}
	}
	//echo $c."<br/>";
	
	
	
	$sql = "SELECT  pid FROM product where name like '%$q%'";
	$result = $con->query($sql);
	//echo $sql."<br/>";
	if($result->num_rows > 0)
	{
		while($row=$result->fetch_assoc())
		{
			array_push($myarray,$row['pid']);
			$c++;
		}
	}
	//echo $c."<br/>";
	
	$data=array_unique($myarray);
	
	$product=array();
	foreach($data as $value)
	{
		array_push($product,$value);
	}
	for($i=0;$i<sizeof($product);$i++)
	{
		//echo $product[$i]." ";
	}
?>
<html>
	<head>
	
		<style>
			.area{
				
				width:1000px;
				margin-left:250px;
			}
			.product{
				border:5px solid black;
				height:400px;
				width:300px;
				margin:10px;
				float:left;
			}
			.buttonshowsearch
			{
				background-color: #4CAF50; /* Green */
				border: none;
				color: white;
				padding: 10px 32px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				margin: 4px 2px;
				cursor: pointer;
				
			}
			div>img
			{
				width:100%;
				height:100%;
			}
			.picture
			{
				border:1px solid black;
				height:200px;
				width:300px;
				cursor: pointer;
			}
			.description
			{
				border:1px solid black;
				height:200px;
				width:300px;
				text-align:center;
			}
			div.cartalert
			{
				display:none;
				height:100px;
				border:2px solid black;
				text-align:center;
			}
		</style>
	</head>
	<body>
		<div class="cartalert" id="mycart">
			<h2>added to cart<h2>
			<input type="button" value="checkout now" onclick="window.location.href='addressinput.php'">
			
		</div>
		<div class="area">
		<?php
				$i=-1;
				while($i<sizeof($product))
				{	
		//echo $i;
		?>
					<div >
						<!-- ................1st....................-->
						<?php
							$i++;
							if($i==sizeof($product)) break;
							$sql="select * from product where pid='".$product[$i]."'";
							$result = $con->query($sql);
							$row=$result->fetch_assoc();
							
						?>

						<div class='product'>
							
							<div class='description'>
								<h3><?php echo $row['name']; ?></h3>
								<?php
								if($row['discount']>0)
								{
								?>
									<h3>৳ <?php echo $row['price']-($row['discount']/100)*$row['price']; ?>
									 <?php echo "   ".$row['discount'];?>% off </h3 >	
								<?php
								}
								else
								{
									echo '<h3>৳ '.$row['price'].'</h3>';
								}
						
								if($_SESSION["customerlogin"]=="valid")
								{
									echo '<p>quantity:<select  id="quantity'.$product[$i].'">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											
										</select></p>';
									echo '<input type="button" value="add to cart" class="buttonshowsearch" onclick="addtocart('.$product[$i].')">';
								}
								?>
							</div>
						</div>	
						
						
						<?php
							$i++;
							if($i==sizeof($product)) break;
							$sql="select name,pid,price,discount from product where pid='".$product[$i]."'";
							$result = $con->query($sql);
							$row=$result->fetch_assoc();
						?>
											
					</div>
		<?php
				}
		?>
		</div>
	</body>
</html>

<script>
	function addtocart(pid)
	{
		var tag="quantity"+pid;
		var quantity=document.getElementById(tag).value;
		var xmlHttp = new XMLHttpRequest();

		xmlHttp.open('POST', 'ajaxaddtocart.php', true);
		xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		var abc = "quantity="+quantity+"&pid="+pid;
		//console.log(tag+quantity+pid);
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