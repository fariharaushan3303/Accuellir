<?php
	error_reporting(0);
	session_start();
	$_SESSION["script_call"]="valid"; //header only be requested from script
	require "userheader.php";
	
	//echo "in eshopping<br/>";
	if(isset($_REQUEST['searchsubmit']))
	{
		$_SESSION['product_searched']=$_REQUEST['search_textbox'];
	}
	$_SESSION["passvalid"]="";
	$_SESSION["emailvalid"]="";
	$_SESSION["namevalid"]="";
	if(isset($_REQUEST["submit"]))
	{
		//echo "validating<br/>";
		$_SESSION['script_validation']=true;
		include 'validatename.php';
		include 'validateemail.php';
		include 'validatepassword.php';
		include 'validatetype.php';
		//include 'validategender.php';
		//include 'validateDOB.php';
		$_SESSION['script_validation']=false;
		
		
		if(!$emailvalid) $_SESSION["emailvalid"]="invalid";
		else $_SESSION["emailvalid"]="";
		
		if(!$namevalid) $_SESSION["namevalid"]="invalid";
		else $_SESSION["namevalid"]="";
		
		if($passvalid &&  $emailvalid && $namevalid && $typevalid) 
		{
			$con=mysqli_connect('localhost','root','','project');
			if(!$con)
			{
				echo "failed";
			}
			else
			{
				$name=$_REQUEST['name'];
				$email=$_REQUEST['email'];
				$password=$_REQUEST['password'];
				$type=$_REQUEST['type'];
				$approve="";
				if ($type=="customer") {
					$approve="approve";
				}
				if ($type=="saler") {
					$approve="request";
				}
				$gender=$_REQUEST['gender'];
				$sql= "INSERT into user (name,email,password,type,gender,approval) values('$name','$email','$password','$type','$gender','$approve')";
				if (mysqli_query($con, $sql)) 
				{
					//echo "New record created successfully";
					header("location: login.php");
				} 
				else 
				{
					echo "Error: " . $sql . "<br>" . mysqli_error($con);
				}
				mysqli_close($con);
			}
			//echo $sql;
		}
	}
	
?>

<html>
	<style>
		header
		{
			background-color:#666;
			padding: 30px;
			text-align: center;
			font-size: 35px;
			color: white;
		}
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
			padding: 15px;
			width:250px;
		}
	</style>
	
	<head>
		<title>Create Account</title>
		
	</head>
	<body>
		
	<center>
		<form method="post" action="#">
			<table style=" margin-top:1%;">	
				<tr >
					<th><font color='red'>*</font>Name:</th>
					<td >
						<input autofocus id="nametextinput" type="text" name ="name" value="<?=$_POST['name']; ?>" style="width:230px;"  onblur="validateName()" onkeyup="validateName()"/>
					</td>
					<td id="namenotice"> <?php echo " <font color='red'>".$_SESSION["namevalid"]."</font>"; ?></td>
				</tr>
				<tr>
					<th ><font color='red'>*</font>Email:	</th>
					<td >
						<input id="emailtextinput" type="text" name ="email" value="<?=$_POST['email']; ?>" style="width:230px;" onkeyup="validateEmail()" onblur="validateEmail()" />
						<b title="Ex. somebody@example.com">i</b>
					</td>
					<td id="emailnotice"> <?php echo " <font color='red'>".$_SESSION["emailvalid"]."</font>"; ?></td>
				</tr>
				<tr>
					<th><font color='red'>*</font>Password:</th>
					<td >
						<input id="passwordtextinput"  type="password" name ="password" value="<?=$_POST['password']; ?>" style="width:230px;" onkeyup="validatePassword()" onblur="validatePassword()" />
					</td>
					<td id="passwordnotice"><?php echo " <font color='red'>".$_SESSION["passvalid"]."</font>"; ?></td>
				</tr>
				<tr>
					<th ><font color='red'>*</font>Confirm Password:</th>
					<td >
						<input id="cpasswordtextinput"  type="password" name ="cpassword" value="<?=$_POST['cpassword']; ?>" style="width:230px;" onkeyup="validateCPassword()" onblur="validateCPassword()" />
					</td>
					<td id="cpasswordnotice"> <?php echo " <font color='red'>".$_SESSION["cpassvalid"]."</font>"; ?></td>
				</tr>
			<!--<tr>
				<td >Contact No.</td>
				<td  style="text-align:left;"><input type="text" name ="contactno" value = " "/></td>
			</tr>
			-->
			<tr>
				<th><font color='red'>*</font>Type:</th>
				<td>
					<select name="type">
						<option value="customer">Customer</option>
						<option value="saler">Saler</option>
					</select> 
				</td>
			</tr>
			<tr>
				<th >Gender:</th>
				<td >
					<input type="radio" name="gender" value="male"  />Male
					<input type="radio" name="gender" value="female" />Female
					<input type="radio" name="gender" value="other" />Other
				</td>
				<td id="gendernotice"> <?php echo " <font color='red'>".$_SESSION["cpassvalid"]."</font>"; ?></td>
			</tr>
			
			<tr>
				<td colspan="3" style="text-align:center">
					<input id="submit" type="submit" name ="submit" value = "register "/>
					<a href="login.php">login</a>
				</td>
			</tr>

		</table>
		</form>
		</center>
	</body>
	<script>
		var emailvalid=false,passwordvalid=false,cpasswordvalid=false;
		var namevalid=false,gendervalid=true;
		document.getElementById("submit").disabled=true;
		function check_submit()
		{
			if(emailvalid && passwordvalid && cpasswordvalid && namevalid && gendervalid)
			{
				document.getElementById("submit").disabled=false;
			}
			else
			{
				document.getElementById("submit").disabled=true;
			}
		}
		function validateName()
		{
			namevalid=false;
			check_submit();
			document.getElementById('namenotice').innerHTML="";
			var name=document.getElementById('nametextinput').value.trim();
			//name=trim(name);
			//window.alert("length: "+name.length);
			if(name.length==0) 
			{
				document.getElementById('namenotice').innerHTML="<font color='red'>name can't be empty</font>";
				document.getElementById('nametextinput').select();
				return;
			}
			var character=true;
			var space
			for(var i=0;i<name.length;i++)
			{
				if( !( (name[i]>='a' && name[i]<='z') || (name[i]>='A' && name[i]<='Z') || name[i]=='.' || name[i]=='-' || name[i]==' ') )
				{
					
					character=false;
					break;
				}
			}
			if(character!=true)
			{
				document.getElementById('namenotice').innerHTML="<font color='red'>name can only have letters,dot(.),dash(-)</font>";
				return;
			}
			else
			{
				if(name.split(' ').length<2)
				{
					document.getElementById('namenotice').innerHTML="<font color='red'>name at least 2 word</font>";
					return;
				}
			}
			namevalid=true;
			check_submit();
		}
		function validateEmail()
		{
			emailvalid=false;
			check_submit();
			document.getElementById("emailnotice").innerHTML="";
			var email=document.getElementById("emailtextinput").value.trim();
			if(email.length==0)
			{
				document.getElementById("emailnotice").innerHTML="<font color='red'>email can't be empty</font>"
				return;
			}
			var atfound=0;
			for (var i = 0; i < email.length;i++)
			{
				if(email[i]==' ')
				{
					document.getElementById("emailnotice").innerHTML="<font color='red'>email can't have space</font>"
					return;
				}
				if(email[i]=='@') 
				{
					atfound=i;
					break;
				}
			}
			if(atfound==0)
			{
				document.getElementById("emailnotice").innerHTML="<font color='red'>invalid email</font>"
				return;
			}
			var dotfound=0;
			if(atfound+3<email.length )
			{
				for (var i = atfound+1; i < email.length; i++)
				{
					if(email[i]=='.')
					{
						dotfound=i;
						break;
					}
				}
				if(dotfound==0)
				{
					document.getElementById("emailnotice").innerHTML="<font color='red'>email invalid</font>"
					return;
				}
				if(!(atfound+1<dotfound  && dotfound+1<email.length) )
				{
					document.getElementById("emailnotice").innerHTML="<font color='red'>email invalid</font>"
					return;
				}
			}
			else 
			{
				document.getElementById("emailnotice").innerHTML="<font color='red'>email invalid</font>"
				return;
			}
			
			var xmlHttp = new XMLHttpRequest();

			xmlHttp.open('POST', 'ajaxsearchEmailExist.php', true);
			xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			var abc = "email="+email;
			xmlHttp.send(abc);
			var response="";
			xmlHttp.onreadystatechange = function(){

				if(this.readyState == 4 && this.status==200)
				{
					//window.alert(this.responseText);
					//document.getElementById("emailnotice").innerHTML="<font color='green'>"+this.responseText+"</font>"
					response=this.responseText;
					
					if(this.responseText=="found")
					{
						document.getElementById("emailnotice").innerHTML="<font color='red'>email already registered</font>"
						
					}	
					else if(this.responseText=="notfound")
					{
						//window.alert("true");
						emailvalid=true;
					}
					
				}
			}
			
			check_submit();
		}
		function validatePassword()
		{

			passwordvalid=false;
			check_submit();
			document.getElementById('passwordnotice').innerHTML="";
			var password=document.getElementById('passwordtextinput').value.trim();
			
			if(password.length==0) 
			{
				document.getElementById('passwordnotice').innerHTML="<font color='red'>password can't be empty</font>";
				
				document.getElementById('passwordtextinput').select();
				return;
			}
			if(password.length<3)
			{
				document.getElementById('passwordnotice').innerHTML="<font color='red'>password at least 3 character</font>";
				
				//document.getElementById('passwordtextinput').select();
				return;
			}
			passwordvalid=true;
			check_submit();
			//validateCPassword();
		}
		function validateCPassword()
		{
			var password=document.getElementById('passwordtextinput').value.trim();
			var cpassword=document.getElementById('cpasswordtextinput').value.trim();
			
			cpasswordvalid=false;
			check_submit();
			document.getElementById('cpasswordnotice').innerHTML="";
			
			if(password!=cpassword)
			{
				document.getElementById('cpasswordnotice').innerHTML="<font color='red'>not matched</font>";
				return;
			}
			else
			{
				document.getElementById('cpasswordnotice').innerHTML="<font color='green'>matched</font>";
			}
			cpasswordvalid=true;
			check_submit();
		}
	</script>
</html>
