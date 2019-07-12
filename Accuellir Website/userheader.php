<?php 




 ?>

<style type="text/css">
  
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
</style>

<div>
		<center><a href="index.php"><img src="images/web_logo.png" height="150px" width="450px"></a></center>
	</div>
	<div class="navbar">
  		<a href="mens.php">Mens</a>
  		<a href="womens.php">Womens</a>
  		<a href="kids.php">Kids</a>
  		<!-- <a href="lookbook.php">Lookbook</a> -->
  		<a href="contact.php">Contact Us</a>
  		<div style="float:right">

            <?php 
            if (isset($_SESSION['customerlogin'])) {
              
            ?>

  		  <button class="dropbtn_icon2"><a href="showcart.php"><img src="images/cart.png" width="55%"></a></button>

  		</div> 

  		<span class="dropdown" style="float:right" width = "10%">
  		  <button class="dropbtn_icon"><img src="images/profile_logo.jpg" width="30%">
  		  </button>
  			<div class="dropdown-content">
  				


             
            <a href="profile.php?id=27">My Profile</a>
            
            <a href="logout.php">Logout</a>


            <?php }else{ ?>
            <a href="registration.php">Create Account</a>
            <a href="login.php">Sign In</a>
        		
        				
        		
        			<?php } ?>
  		  		
  		  		
  		  		
  		  		
    		</div>
  		</span> 
	</div>


