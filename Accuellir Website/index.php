<?php
	error_reporting(0);
	session_start();
	$_SESSION["script_call"]="valid"; //header only be requested from script
	require "userheader.php";
	/*include "dropdown.php";*/
	//echo "in eshopping<br/>";


	
	if(isset($_REQUEST['searchsubmit']))
	{
		$_SESSION['product_searched']=$_REQUEST['search_textbox'];
		$con=mysqli_connect('localhost','root','','project');
		
	}
?>
<html>
	<head>
		<title>ACCUELLIR.INC</title>
		<style>
			body {
			  font-size: 18px;
			  font-family: "monospace", roboto, sans;
			}

			.navbar {
			  overflow: hidden;
			  background-color: #2f4454;
			  opacity: 1;
			}
			
			.navbar a {
			  float: left;
			  font-size: 16px;
			  color: white;
			  text-align: center;
			  padding: 14px 16px;
			  text-decoration: none;
			}
			
			.dropdown {
			  float: left;
			  overflow: hidden;
			}
			
			.dropdown .dropbtn_icon {
			  width: 82px;
			  height: 20px;
			  font-size: 16px;  
			  border: none;
			  outline: none;
			  color: white;
			  padding: 10px 0px;
			  background-color: inherit;
			  font-family: inherit;
			}
			.dropbtn_icon2 {
			  width: 82px;
			  height: 20px;
			  border: none;
			  outline: none;
			  color: white;
			  background-color: inherit;
			  font-family: inherit;
			}
			
			.navbar a:hover, .dropdown:hover .dropbtn {
			  background-color: #17252a;
			  color: #eee2dc;
			  opacity: 1;
			}
			
			.dropdown-content {
			  display: none;
			  position: absolute;
			  background-color: #2f4454;
			  min-width: 164px;
			  box-shadow: 0px 8px 15px 0px rgba(0,0,0,0.2);
			  z-index: 1;
			}
			
			.dropdown-content a {
			  float: none;
			  color: white;
			  padding: 12px 12px;
			  text-decoration: none;
			  display: block;
			  text-align: left;
			}
			
			.dropdown-content a:hover {
			  background-color: #17252a;
			  color : #ffffff;
			}
			
			.dropdown:hover .dropdown-content {
			  display: block;
			}

			.body_font_1 {
				font-family: "calibri", sans;
				font-size: 22px;
				color : #2f4454;
			}

			.body_font_2 {
				font-family: "calibri", sans;
				font-size: 32px;
				color : #2f4454;
			}

			.container_div2 {
    		width: 70%;
    		height: 400px;
    		background: #eee2dc;
    		margin: auto;
			}
			.one {
    		width: 50%;
    		height: 100px;
    		float: left;
    		font-family: "calibri", sans;
				font-size: 28px;
				color : #2f4454;
			}
			.two {
			  margin-left: 50%;
			  height: 100px;
			  font-family: "calibri", sans;
				font-size: 28px;
				color : #2f4454;
			}

			.button {
  			background-color: #2f4454;
  			border: none;
  			color: #e3e2df;
  			padding: 16px 150px;
  			text-align: center;
  			font-size: 16px;
  			margin: 4px 2px;
  			opacity: 0.8;
  			transition: 0.3s;
  			display: inline-block;
  			text-decoration: none;
  			cursor: pointer;
			}

			.button:hover {opacity: 1}

			.sign_up_font1 {
				font-family: "roboto", calibri, sans;
				font-size: 18px;
				color : #2e151b;
			}
			.sign_up_font2 {
				font-family: "arial", calibri, sans;
				font-size: 24px;
				color : #2e151b;
			}

			.button_signup {
  			background-color: #2e151b;
  			border: none;
  			color: #e3e2df;
  			padding: 16px 100px;
  			text-align: center;
  			font-size: 16px;
  			margin: 4px 2px;
  			opacity: 0.8;
  			transition: 0.3s;
  			display: inline-block;
  			text-decoration: none;
  			cursor: pointer;
			}
			.button_signup:hover {opacity: 1}
			.container_div3 {
    		width: 40%;
    		margin: auto;
			}
			.p_font1 {
				width: 90%;
				margin-left: 67px;
				font-family: "roboto", calibri, sans;
				font-size: 16px;
				color : #2e151b;
			}

			.row_follow {
			  display: flex;
			}

			.column_follow {
			  flex: 20%;
			  align-items: center;
			  margin-left: 70px;
			}
			.logo_font{
				font-family: "roboto", calibri, sans;
				font-size: 18px;
				color : #2e151b;
				margin-left: 25px;
			}
			.footer_font{
				font-family: "roboto", calibri, sans;
				font-size: 16px;
				color : #2f4454;
				margin-left : 14px;
				line-height: .9;
			}
			.follow_us{	
				font-family: "roboto", calibri, sans;
				color : #2e151b;
				margin-top: 10%;
				margin-left: 25px;
				margin-bottom: 8%;
    			text-align: center;
    			padding: 3%;
    			box-sizing: border-box;
    			height: 12vw;
    			flex-direction: column;
    			align-items: center;
    			justify-content: center;
    			text-transform: uppercase;
    			font-size: 1.5em;
    			line-height: .9;
			}
			.footer{
				font-family: "calibri", sans;
				color : #2e151b;
				margin-top: 10%;
				margin-left: 25px;
				margin-bottom: 8%;
    			text-align: center;
    			padding: 3%;
    			box-sizing: border-box;
    			height: 12vw;
    			flex-direction: column;
    			align-items: center;
    			justify-content: center;
    			text-transform: uppercase;
    			font-size: 1.0em;
    			line-height: .9;
			}
			</style>

	</head>	
	<body>
		
	

 	<div>
 		<img src="images/front.webp" width = "100%">
 	</div>
 	<div class = "body_font_1">
 		<p></p>
 		<center>
 			<b>NEW & NOW:</b> <br>
 		</center>
 	</div>
 	<div class = "body_font_2">
 		<center>
 			THE TREND EDIT <br>
 		</center>
 	</div>
 	<div class = "container_div2">
 		<p></p>
 		<div class = "one">
 			<a href="mens.php"><img src="images/men_front.jpg"></a> <br>
 			<a href="mens.php"><center> <button class="button">BESTSELLER FOR HIM</button> </center></a>
 		</div>
 		<div class = "two">
 			<a href="womens.php"><img src="images/women_front.jpg"></a> <br>
 			<a href="womens.php"><center> <button class="button">BESTSELLER FOR HER</button> </center></a>
 		</div>
 	</div>

 	<div style="margin-top: 350px;">
 		<a href="kids.php"><img src="images/kids_front.jpg" width="100%"></a> <br>
 	</div>
 	

 	<div class="row_follow">
	  	<div class="column_follow">
	  		<div class = "footer">
	  			<span>
	  				<b>Hello!</b> 
	  				<br><br>
	  				follow us
	  				<br><br>
	  				>>>
	  			</span>
	  		</div>
	  	</div>
	  	<div class="column_follow">
	  	  <img src="images/fb.svg" style="width:70%">
	  	  <div class="logo_font"> Facebook </div>
	  	</div>
	  	<div class="column_follow">
	  	  <img src="images/insta.svg" style="width:70%">
	  	  <div class="logo_font"> Instagram </div>
	  	</div>
	  	<div class="column_follow">
	  	  <img src="images/yt.svg" style="width:70%">
	  	  <div class="logo_font"> YouTube </div>
	  	</div>
	  	<div class="column_follow">
	  	  <img src="images/sklepy.svg" style="width:70%">
	  	  <div class="logo_font"> Locate Us </div>
	  	</div>

 	</div>

 	<div id="about" style="margin-top: 20px"><center><img src="images/aliens.jpg"></center></div>

 	<div class = "p_font1">
 		<P> <strong>
 			ACCUELLIR.INC is a versatile fashion brand with an authentic and creative approach to the latest trends for young people. 
 		</strong> </p>
		<p>
			We blend street style trends with our own unique designs, creating original and versatile outfits for every occasion. House offers inspiring outfits, bold combinations and expressive accessories inspired by pop culture, social media trends and the essence of youth. 
		</p>

		<P>
			Our new male & female collection reflects the top Spring/Summer 2018 trends. Opt for both classic and unique cuts for special occasions. This season`s collection is all about patterns. Stripes, polka dots and romantic florals make an updated comeback. Combine them with oriental graphics, tropical prints, on-trend slogans and fruit prints. Don’t miss this season`s ultimate must-haves. Denim jackets, distressed vests, embroidered shorts, midi pencil skirts, shirt dresses, check shirts, high-waisted pants or classic bum bags – these elements will dominate the streets and summer festivals. 
		</P>
		<p>
			Get ready to impress, shine and turn heads. Play with fashion, accentuate your style and create your unique look. We are here to help you become the best version of yourself every single day!
 		</P>

 	</div> 
 	<hr  style="color:#2f4454"> 
 </div>
 	<?php 

	  	require 'userfooter.php';
	  	 ?>
		






			
	</body>

</html>
<script>
	
</script>