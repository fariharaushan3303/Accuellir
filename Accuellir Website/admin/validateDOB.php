<?php
	error_reporting(0);
	session_start();
	$day 		= trim($_POST['day']);
	$month 		= trim($_POST['month']);
	$year 		= trim($_POST['year']);
	
	//echo "DOB : ".$day."/".$month."/".$year." ";
	
	$dayvalid=true;
	$monthvalid=true;
	$yearvalid=true;
	$dobvalid=true;
	if(empty($day)) 
	{
		//echo "date empty<br/>";
		$dayvalid=false;
	}
	else if(strlen($day)<3)
	{
		if(strlen($day)>1)
		{
			if( $day[0]=='3' && ($day[1]=='1' || $day[1]=='0') ) 
			{
				//echo "date first 3 ok<br/>";
				$dayvalid=true;
			}
			else if( $day[0]>='0' && $day[0]<=2 && $day[1]>='0' && $day[1]<='9' )
			{
				//echo "date first 0 1 ok<br/>";
				$dayvalid=true;
			}
			else 
			{
				//echo "not valid range<br/>";
				$dayvalid=false;
			}
						
		}
		else if(!($day[0]<='9' && $day[0]>='0') )
		{
			$dayvalid=false;
		}
	}
	else $dayvalid=false;
	if( empty($month) ) $monthvalid=false;
	else if(strlen($month)<3)
	{
		if(strlen($month)>1)
		{
			//echo "month 2 digit<br/>";
			if( $month[0]=='1' && ($month[1]=='1' || $month[1]=='2' || $month[1]=='0') )
			{
				//echo "month 1 if if ok<br/>";
				$monthvalid=true;
			}				
			else if( ($month[0]>='0' && ($month[1]>='0' && $month[1]<='9') ) )
			{
				//echo "month 1 if elif ok<br/>";
				
				$monthvalid=true;
			}				
			else $monthvalid=false;
		}
		else if(!($month[0]<='9' && $month[0]>='0') )
		{
			
			$monthvalid=false;
		}
	}
	else $monthvalid=false;
	
	if(empty($year)) $yearvalid=false;
	if(strlen($year)==4)
	{
		if( ($year[0]=='1' && $year[1]=='9' && ($year[2]>='0' && $year[2]<='9') && ($year[3]>='0' && $year[3]<='9')) ) 
		{
			//echo "year 1 if oko<br/>";
			//$yearvalid=true;
		}
		else if( ($year[0]=='2' && $year[1]=='0' && (($year[2]=='0' && $year[3]>='0' && $year[3]<='9') || ( $year[2]=='1' && ($year[3]>='0' && $year[3]<='6')) ) )) 
		{
			//echo "year 2 if ok<br/>";
			//$yearvalid=false;
		}
		else
		{
			$yearvalid=false;
			
		}
	}
	else
	{
		$yearvalid=false;
		//echo "year length problem<br/>";
	}		
	
	//if($dayvalid==false) echo "date invalid<br/>";
	//if($monthvalid==false) echo "month invalid<br/>";
	//if($yearvalid==false) echo "year invalid<br/>";
	
	if($dayvalid==true && $monthvalid==true && $yearvalid==true)
	{
		$dobvalid=true;
		//echo " <font color='green'>#valid<br/></font>";
	}
	else 
	{
		$dobvalid=false;
		echo " <font color='red'>#invalid DOB<br/></font>";
	}
	
	
?>