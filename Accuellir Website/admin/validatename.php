<?php
	error_reporting(0);
	session_start();
	if($_SESSION['script_validation']!=true) header("Location: eshopping.php");
	$valid_rule=0;
	$name=trim($_POST['name']);
	//echo "name : ".$name." ";
	$namevalid=false;
	if(!empty($name))
	{
		$valid_rule++;
		//echo "not empty<br/>";
	}
	else 
	{
		//echo "empty<br/>";
	}
	$space=0;
	$characters=true;
	$a='a';
	$z='z';
	$A='A';
	$Z='Z';
	for ($i = 0; $i < strlen($name); $i++){
		if($name[$i]==' ')
		{
			$space++;
		}
		else if( !( ($name[$i]>=$a && $name[$i]<=$z) || ($name[$i]>=$A && $name[$i]<=$Z) || $name[$i]=='.' ||  $name[$i]=='-'  ) )
		{
			$characters=false;
			//echo "character found<br/>";
		}
			
	}
	if($space>0) 
	{
		//echo "multiple word found <br/>";
		$valid_rule++;
	}
	if($characters==true)
	{
		//echo "characters ok<br/>";
		$valid_rule++;
	}
	if(($name[0]>=$a && $name[0]<=$z) || ($name[0]>=$A && $name[0]<=$Z))
	{
		//echo "1st character ok<br/>";
		$valid_rule++;
	}
	if($valid_rule==4)
	{
		//echo " <font color='green'>#valid<br/></font>";
		$namevalid=true;
	}
	else
	{
		//echo " <font color='red'>#name invalid<br/></font>";
	}
?>
