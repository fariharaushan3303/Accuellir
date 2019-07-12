<?php
	error_reporting(0);
	session_start();
	if($_SESSION['script_validation']!=true) header("Location: eshopping.php");
	$emailvalid=true;
	$email=trim($_POST['email']);
	$atfound=0;
	$dotfound=0;
	//echo "email : ".$email." ";
	if(empty($email))
	{
		$emailvalid=false;
		//echo "empty<br/>";
	}
	else
	{
		for ($i = 0; $i < strlen($email); $i++)
		{
			if($email[$i]==' ')
			{
				//echo "space found<br/>";
				$emailvalid=false;
			}
			else if($email[$i]=='@') 
			{
				$atfound=$i;
				break;
			}
		}
		if($atfound+3<strlen($email) )
		{
			for ($i = $atfound+1; $i < strlen($email); $i++)
			{
				if($email[$i]=='.')
				{
					$dotfound=$i;
					break;
				}
			}
			if(!($dotfound>0 && $atfound+1<$dotfound  && $dotfound+1<strlen($email)) )
			{
				$emailvalid=false;
			}
		}
		else $emailvalid=false;
			
	}
	if($emailvalid==true) 
	{
		//echo " <font color='green'>#valid<br/></font>";
	}
	else
	{	
		//echo "<font color='red'>#email invalid<br/></font>";
	}
?>