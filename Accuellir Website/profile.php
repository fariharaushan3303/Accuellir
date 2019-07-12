<?php  
  error_reporting(0);
  session_start();

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
      .field {
        font-size: 1em;
        font-color: #1a1a1a;
      }
      </style>

</head>
  
</html>
<body>
  <div>
    <center><a href="index.php"><img src="images/web_logo.png" height="50px" width="150px"></a></center>
  </div>
  <div class="navbar">
      <a href="profile.php?id=<?=$_GET['id']?>">About</a>
      <?php  
      $id = $_GET['id'];
      $conn = mysqli_connect('localhost', 'root', '', 'project');
      $sql = "select * from user where uid=$id";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)){
        $name = $row['name'];
        $type = $row['type'];
        if($type == 'saler') echo "<a href=\"product_list.php\">Inventory</a>";
      }
      ?>
      <div style="float:right">
        <button class="dropbtn_icon2"><a href="cart.php"><img src="images/cart.png" width="55%"></a></button>
      </div> 

      <span class="dropdown" style="float:right" width = "10%">
        <button class="dropbtn_icon"><img src="images/profile_logo.jpg" width="30%">
        </button>
        <div class="dropdown-content">
            <?php 
              if(isset($_SESSION['abc']) || isset($_SESSION['def']) || isset($_SESSION['customerlogin'])) {
                if(isset($_SESSION['def'])){
                  ?>
            <a href="admin.php">My Profile</a>
            <?php
                }
                else{
                  ?>
            <a href="profile.php">My Profile</a>
            <?php
                }
            ?>
            <a href="logout.php">Logout</a>   
            <?php
              }
              else {
            ?>
            <a href="login.php">Sign In</a>
            <a href="register.php">Create Account</a>
            <?php  
              }
          ?>  
        </div>
      </span> 
  </div>

 <div>
   <?php 
      $id = $_GET['id'];
      $conn = mysqli_connect('localhost', 'root', '', 'project');
      $sql = "select * from user where uid=$id";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)){
        $name = $row['name'];
        $type = $row['type'];
        $phone = $row['contact_number'];
        $gender = $row['gender'];
        $address = $row['address'];
        $_SESSION['id'] = $GLOBALS['id'];
        echo "
          <fieldset>
          <div style>
          <p> Name : $name </p>
          <p> Gender : $gender </p>
          <p> Phone : $phone </p>
          <p> Address : $address </p>
          </div>
          </fieldset>
        ";     
        echo "
          <fieldset>
          <legend>Update address and phone number</legend>
          <div>
           <form  method = \"post\" action = \"update_profile.php\">
              Adress : <input type=\"text\" name=\"address\"> <br>
              Phone Number : <input type=\"text\" name=\"phone\"> <br>
              <input type=\"submit\" name=\"Update\" value=\"Update\">          
           </form>
          </div>
          </fieldset>
        ";
      }
      mysqli_close($conn); 
      ?>
 </div>
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
          Hello! follow us! <br>
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