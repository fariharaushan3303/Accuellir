<?php
	error_reporting(0);
	session_start();
	require "userheader.php";
?>

<!DOCTYPE html>
<html>
<head>	
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

			
			
			
			.container_div2 {
    		width: 70%;
    		height: 680px;
    		background-color: #17252a;
    		margin: auto;
			}
			
			.one {
    			width: 50%;
    			height: 100px;
    			float: left;
    		}

			.two {
				font-family: calibri;
			  	margin-left:53%;
			  	padding: 20px;
			  	height: 100%;
			  	font-family: "calibri", sans;
				color : white;
			}

			.product_images {display:none;}

			.button {
  				background-color: #17252a;
  				border: none;
  				padding: 16px 100px;
  				margin: 5px 6px;
  				text-align: center;
  				font-size: 16px;
  				opacity: 0.8;
  				transition: 0.3s;
  				display: inline-block;
  				text-decoration: none;
  				cursor: pointer;
			}

			.button:hover {opacity: 1; background-color: #2f4454;}

			input[type=text], input[type=email], select, textarea {
			  width: 100%;
			  padding: 12px;
			  border: 1px solid #222;
			  box-sizing: border-box;
			  margin-top: 6px;
			  margin-bottom: 16px;
			  resize: vertical;
			}
			
			input[type=submit] {
			  background-color: #17252a;
			  color: white;
			  padding: 12px 20px;
			  border: none;
			  cursor: pointer;
			}
			
			input[type=submit]:hover {
			  background-color: #1a1a1a;
			}
			
			.container {
			  background-color: #17252a;
			  padding: 10px;
			}



			.body_font_1 {
				font-family: "calibri", sans;
				font-size: 22px;
				color : #2f4454;
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


			.container_body {
			  padding: 0;
			  margin:0;
			  list-style: none;
  			  display: -webkit-box;
  			  display: -moz-box;
  			  display: -ms-flexbox;
  			  display: -webkit-flex;
  			  display: flex; 			  
  			  -webkit-flex-flow: row wrap;
  			  justify-content: space-around;
			}

			.item_body {
			  background: #f7f9fb;
			  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2);
			  padding: 2px;
			  max-width: 250px;
			  max-height: 500px;
			  margin-top: 15px;
			  margin-bottom: 15px;
			  color: #1a1a1a;
			  text-align: center;
			  position: relative;
			  text-decoration: none;
			}

			.item_body a{
			  color: #1a1a1a;
			  text-decoration: none;
			  font-size: 18px;
			  font-family: "helvetica";
			}


			.image {
			  display: block;
			  width: 100%;
			  height: auto;
			}

			.overlay {
			  max-width: 300px;
			  position: absolute;
			  top: 0;
			  bottom: 0;
			  left: 0;
			  right: 0;
			  height: 70%;
			  width: 100%;
			  opacity: 0;
			  padding: 2px;
			  transition: .3s ease;
			  background-color: #f7f9fb;
			}

			.item_body:hover .overlay {
			  opacity: 1;
			}
			</style>

</head>
<body>
	

		<!-- <div class="cartalert" id="mycart">
			<h2>added to cart<h2>
			<input type="button" value="checkout now" onclick="window.location.href='addressinput.php'">
			
		</div> -->

	<div class = "container_div2">

		<?php
			$id = 1;
			
			$id = $_GET['id'];
			$conn = mysqli_connect('localhost', 'root', '', 'project'); 
			$sql = "select * from product_info where pid=$id";
			$result = mysqli_query($conn, $sql);
			while($row = mysqli_fetch_assoc($result)){
				$pid = $row['pid'];
				$name = $row['pname'];
				$price = $row['sellingprice'];
				$type = $row['type'];
				$info = $row['info'];
				$xml=simplexml_load_string($info);
				$image1 = $xml -> location[0];
				$image2 = $xml -> location[1];	
 				echo "
 				<p></p>
 				<div class = \"one\">	
 					<img class=\"product_images\" src=".$image1." style=\"width:100%\">
  					<img class=\"product_images\" src=".$image2." style=\"width:100%\">
		  			<center>
		  			<button class=\"button\" onclick=\"plusDivs(-1)\">&#10094;</button>
		  			<button class=\"button\" onclick=\"plusDivs(1)\">&#10095;</button>
		 			</center>	 
		 		</div>
		 		<div class = \"two\">
		 			<div style=\"font-size: 1.8em; margin-top: 20px;\"><strong>".$name."</strong></div>
		 			<div style=\"font-size: 1em; margin-top: 20px;\">".$price." BDT</div>
		 			<hr>";	
		 	}
		 ?>
		 			<!-- <div>
		 				<p></p>
		 				<p>Size</p>
		 				<select id="size" name="size">
			    		  <option value="1">XS</option>
			    		  <option value="2">S</option>
			    		  <option value="3">M</option>
			    		  <option value="4">L</option>
			    		  <option value="5">XL</option>
			    		  <option value="6">XXL</option>
			    		  <option value="7">XXXL</option>
			    		</select>
			    		<a href="size_guide.php" style="color: white; font-size: .8em;">Size and Fit Guide</a>
		 			</div> -->
		 			<?php 

		 			if($_SESSION["customerlogin"]=="valid")
								{
									echo '<p>quantity:<select  id="quantity'.$id.'">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											
										</select></p>';
									echo '<input type="button" value="add to cart" class="buttonshowsearch" onclick="addtocart('.$id.')">';
								}


		 			 ?>
		 		</div>

				
		 		";
		 	
 		?>

 	</div>



 	<script>
 		//image slider function 
		let slideIndex = 1;
		showDivs(slideIndex);
		function plusDivs(n) {
		  showDivs(slideIndex += n);
		}		
		function showDivs(n) {
		  let i;
		  let x = document.getElementsByClassName("product_images");
		  if (n > x.length) {slideIndex = 1}
		  if (n < 1) {slideIndex = x.length}
		  for (i = 0; i < x.length; i++) {
		    x[i].style.display = "none";  
		  }
		  x[slideIndex-1].style.display = "block";  
		}
	</script>




 	</div> <hr  style="color:#2f4454"> </div>
 	<div class="row_follow">
	  <div class="column_follow">
	  	<img src="images/web_logo.png" style="width:100%; margin-top: 20px">
	  </div>
	  <div class="column_follow">
	  </div>
	  <div class="column_follow">
	  </div>
	  <div class="column_follow">
	  </div>
	  <div class="column_follow" style="margin-top: 20px;" >
	  	<div>
	  		<span class = "footer_font">
	  			Hello! follow us! <br>/
	  		</span>
	  	</div>
	    <img src="images/fb.svg" style="width:25%">
	  	<img src="images/insta.svg" style="width:25%">
	    <img src="images/yt.svg" style="width:25%">
	  </div>
	</div>
	<div class="footer_font">
		<center>
			<span style="font-size: 10px">
				Rights Reserved. Powered by ACCUELLIR.INC.
			</span>
		</center>
	</div>
	</div> <hr  style="color:#2f4454"> </div>
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
		
		console.log(tag+quantity+pid);
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
					//document.getElementById("mycart").style.display="block";
				}
				else
				{
					//window.alert("not done");
				}	
			}
		}
	}
</script>