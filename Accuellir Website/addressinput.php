<?php
	error_reporting(0);
	session_start();
	if($_SESSION["customerlogin"]!="valid") header("Location: eshopping.php");
	$_SESSION["script_call"]="valid"; //header only be requested from script
	require "header.php";
	
	$con=mysqli_connect('localhost','root','','project');
	//echo "connection done<br/>";
	if ($con->connect_error) 
	{
		die("Connection failed: " . $con->connect_error);
	}
	$sql = "SELECT address FROM user where uid='".$_SESSION["user_id"]."'";
	$result=$con->query($sql);
	$row=$result->fetch_assoc();
				
	if($row['address']!="") 
	{
		header("location:checkout.php");
	}
	else
	{
?>
		<html>
			<style>
				tr
				{
					width:800;
				}
				th
				{
					text-align:right;
					width:200px;
				}
				td
				{
					padding: 5px;
					width:250px;
				}
			</style>
			<head>
					<title>Address & contactno</title>
			</head>
			<body>
				<br/><br/><br/><br/>
				<center>
					<table>
						<tr >
							<th><font color='red'>*</font>Contect No.</th>
							<td >
								<input autofocus id="contactno" type="text"  name="email" style="width: 240px;" onkeyup="validateContactNo()" onblur="validateContactNo()"/>
								<b title="0183779995">i</b>
							</td>
							<td id="contactnonotice"></td>
						</tr>
						
						<tr>
							<th><font color='red'>*</font>Addtrss:</th>
							<td>
								<textarea id="address" style="resize:none; width:250px; height:100px;" onkeyup="validateAddress()" onblur="validateAddress()" ></textarea>
							</td>
							<td id="addressnotice"></td>
						</tr>
						<tr>
							<th/>
							<td align="left">
								<input type="button" id="submitaddress" name="submitaddress" value="submit" onclick="submitaddress()">
							</td>	
							<td></td>
						</tr>
					</table>
				</center>
					
				
			</body>
		</html>
		<script>
			var addressvalid=false,contactnovalid=false;
			document.getElementById("submitaddress").disabled=true;
			
			
			function check_submit()
			{
				if(addressvalid && contactnovalid)
				{
					document.getElementById("submitaddress").disabled=false;
				}
				else
				{
					document.getElementById("submitaddress").disabled=true;
				}
			}
			function validateContactNo()
			{
				contactnovalid=false;
				check_submit();
				//window.alert("in validateContactNo");
				var contactno=document.getElementById('contactno').value.trim();
				//window.alert(contactno);
				document.getElementById('contactnonotice').innerHTML="";
				if(contactno.length==0)
				{
					//window.alert("empty");
					document.getElementById('contactnonotice').innerHTML="<font color='red'>contactno can't be empty </font>";
					return;
				}
				if(contactno.length<=11)
				{
					for(var i=0;i<contactno.length;i++)
					{
						if(!(contactno[i]>='0' && contactno[i]<='9') )
						{
							document.getElementById('contactnonotice').innerHTML="<font color='red'>contactno only numeric</font>";
							return;
						}
					}
					if(contactno.length<11)
					{
						document.getElementById('contactnonotice').innerHTML="<font color='red'>contactno 11 character</font>";
						return;
					}
				}
				if(contactno.length>11)
				{
					document.getElementById('contactnonotice').innerHTML="<font color='red'>contactno 11 character</font>";
					return;
				}
				contactnovalid=true;
				check_submit();
				
			}
			function validateAddress()
			{
				addressvalid=false;
				check_submit();
				
				
				var address=document.getElementById('address').value.trim();
				document.getElementById('addressnotice').innerHTML="";
				if(address.length==0)
				{
					//window.alert("empty");
					document.getElementById('addressnotice').innerHTML="<font color='red'>address can't be empty </font>";
					return;
				}
				if(address.split(' ').length<2)
				{
					document.getElementById('addressnotice').innerHTML="<font color='red'>address at least 2 word</font>";
					return;
				}
				
				
				
				addressvalid=true;;
				check_submit();
				
			}
			function submitaddress()
			{
				var c=document.getElementById("contactno").value;
				
				var add=document.getElementById("address").value;
				
				
				var xmlHttp = new XMLHttpRequest();

				xmlHttp.open('POST', 'ajaxpostaddress.php', true);
				xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				var abc = "address="+add+"&contactno="+c;
				xmlHttp.send(abc);
				
				xmlHttp.onreadystatechange = function(){

					if(this.readyState == 4 && this.status==200)
					{
						//window.alert(this.responseText);
						if(this.responseText=="done")
						{
							window.location.replace("checkout.php");
						}							
			
					}
				}
			}
		</script>
		
<?php

	}
?>