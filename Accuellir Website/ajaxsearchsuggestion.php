<?php
	
	error_reporting(0);
	session_start();
	$key=$_REQUEST['key'];
	$con=mysqli_connect('localhost','root','','project');
	$data;
	if ($con->connect_error) 
	{
		die("Connection failed: " . $con->connect_error);
	}
	if($key=="")
	{
		$sql = "SELECT * FROM search where userid='".$_SESSION["user_id"]."'";
		$result = $con->query($sql);
		$c=0;
		while($row=$result->fetch_assoc() )
		{
			
			$data.='<a onmouseover="mousehover(this)" href="search.php?search_textbox=this.text&searchsubmit=Search">'.$row['value'].'</a>';
			$c++;
			if($c>6) break;
		}
	}
	else
	{
		
		$sql = "SELECT * FROM search where userid='".$_SESSION["user_id"]."' and ( value like '$key%' or value like '% $key%')";
		$result = $con->query($sql);
		$c=0;
		while($row=$result->fetch_assoc() )
		{
			
			$data.='<a onmouseover="mousehover(this)"  href="search.php?search_textbox=this.text&searchsubmit=Search">'.$row['value'].'</a>';
			$c++;
			if($c>8) break;
		}
		if($c<8)
		{
			$sql="select * from product where name like '$key%'";
			$result = $con->query($sql);
			while($row=$result->fetch_assoc() )
			{
				
				$data.='<a onmouseover="mousehover(this)" href="search.php?search_textbox="this.text"&searchsubmit=Search">'.$row['name'].'</a>';
				$c++;
				if($c>8) break;
			}
		}
	}
	
	echo $data;


?>