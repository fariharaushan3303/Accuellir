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
	


	<div>
		<ul class="container_body">
			<?php  
			$conn = mysqli_connect('localhost', 'root', '', 'project');
			$sql = "select * from product_info";
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
				//printing products 
				if($type == 1 || $type == 2 || $type == 3 || $type == 4 || $type == 5) {
					echo 
					"<li class=\"item_body\">
  						<a href=\"product.php?id=$pid\">
  						<img src=".$image1." class = \"image\">
  						<span class=\"overlay\">
							 <img src=".$image2." class = \"image\">
						</span>
						<p>".$name."</p>
						<p>".$price." BDT</p> 
						</a> 
					</li>";
				}
			}
			mysqli_close($conn);
    	?>
		</ul>
	</div>




 	</div> <hr  style="color:#2f4454"> 
 </div>
<?php 

	  	require 'userfooter.php';
	  	 ?>
</body>
</html>