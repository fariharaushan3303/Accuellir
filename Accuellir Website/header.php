<?php
	error_reporting(0);
	session_start();
	
	if($_COOKIE["remember_me"]=="valid")
	{
		//echo "remember_me clicked found in header<br/>";
		setcookie("remember_me","valid",time()+86400);
		setcookie("user_name",$_COOKIE["user_name"],time()+86400);
		setcookie("user_id",$_COOKIE["user_id"],time()+86400);
		setcookie("user_type",$_COOKIE["user_type"],time()+86400);
		
		$_SESSION["customerlogin"]="valid";
		
		$_SESSION["customerlogin"]="valid";
		$_SESSION["user_name"]=$_COOKIE["user_name"];
		$_SESSION["user_id"]=$_COOKIE["user_id"];
		$_SESSION["user_type"]=$_COOKIE["user_type"];
	}
	//echo "cookie checked<br/>";
	if(!($_SESSION["script_call"]=="valid")) 
	{
		//echo "supposed to call test<br/>";
		header("location: index.php");
	}
	else 
	{
		$_SESSION["script_call"]="invalid";
?>
<html>
	<head>
		<link rel="stylesheet" href="customermystyle.css">
	</head>
	<body>
		<div >
		<ul>
			<li style="margin-left : 10%;">
				<a href="index.php">Accuellir</a>
			</li>
			<li>
				<form method="get" action="search.php">
				<li >
					<input id="search_textbox" onkeyup="search()" onblur="removediv()" type="text" name="search_textbox" value="<?=$_GET['search_textbox']; ?>"   style="width:500px; height: 48px;">
					<div  id="divdiv"  class="dropdown-content2">
					
					</div>
				
				</li>
				<li>
					<input type="submit" value="Search" name="searchsubmit" style="width:60px; height: 48px;" >
				</li>
				</form>
			</li>
<?php
			if($_SESSION["customerlogin"]=="valid") 
			{
?>
				<li style="margin-left: 2%;" class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">My Account</a>
				<div class="dropdown-content">
				  <a href="showordered.php">My Order</a>
				  <a href="changepassword.php">Change Password</a>
				  
				  <a href="logout.php">Logout</a>
				</div>
				</li>
<?php
			}
			else
			{
				echo '<li style="margin-left: 2%;">'
?>
						<a href="login.php" style="cursor: pointer;" > Login </a>
<?php
					echo '</li >';
			}

?>
				
			
			<li style="margin-left: 2%;">
				<a href="showcart.php"> Cart </a>
			</li>
		</ul>
		</div>
		
		<div id="login-wrapper" class="login">
		<form class="login-content animate" action="/action_page.php">	
			<div class="imgcontainer">
				<span onclick="document.getElementById('login-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
				<h1 style="text-align:center">Login</h1>
			</div>
			
			<div class="container">
				<input class="logininput" type="text" placeholder="Enter Email" name="uname">
				<input class="logininput" type="password" placeholder="Enter Password" name="psw">        
				<button class="logininput" type="submit">Login</button>
				<input type="checkbox" style="margin:26px 30px;"> Remember me 
				
				<a href="registration.php">new here?</a>
			</div>
		
		</form>
	</div>

		
	</body>
		
		
		
</html>
	
	
	
	
<?php

	}
?>


<script>
	
	function removediv()
	{
		document.getElementById("divdiv").style.display="none";
	}
	function search()
	{
		
		var value=document.getElementById("search_textbox").value;
		//if(value.length==0) document.getElementById("divdiv").style.display="none";
		//else document.getElementById("divdiv").style.display="block";
		
		var xmlHttp=new XMLHttpRequest();
		xmlHttp.open("POST","ajaxsearchsuggestion.php",true);
		xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		var p="key="+value;
		xmlHttp.send(p);
		xmlHttp.onreadystatechange=function(){
			
			if(this.readyState==4 && this.status==200)
			{
				if(this.responseText=="")
				{
					document.getElementById("divdiv").style.display="none";
				}
				else
				{
					document.getElementById("divdiv").innerHTML=this.responseText;
					document.getElementById("divdiv").style.display="block";
				}
			}
		}
	}
	function mousehover(x)
	{
		//window.alert(x.innerHTML);
		document.getElementById("search_textbox").value=x.innerHTML;
		
		
	}
	var login = document.getElementById('login-wrapper');
	window.onclick = function(event) {
		if (event.target == login) {
			login.style.display = "none";
		}
	}
</script>
		