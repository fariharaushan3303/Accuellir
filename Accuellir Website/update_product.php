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


      .button_delete {
        background-color: red;
        border: none;
        color: white;
        padding: 12px 30px;
        text-align: center;
        font-size: 16px;
        margin: 4px 2px;
        opacity: 0.8;
        transition: 0.3s;
        display: inline-block;
        text-decoration: none;
        cursor: pointer;
      }

      .button_delete:hover {opacity: 1}
      </style>

</head>
<body>
  <div>
    <center><a href="index.php"><img src="images/web_logo.png" height="50px" width="150px"></a></center>
  </div>
  <div class="navbar">
      <a href="profile.php">About</a>
      <a href="product_list.php">Inventory</a>
      <div style="float:right">
        <button class="dropbtn_icon2"><a href="cart.php"><img src="images/cart.png" width="55%"></a></button>
      </div> 

      <span class="dropdown" style="float:right" width = "10%">
        <button class="dropbtn_icon"><img src="images/profile_logo.jpg" width="30%">
        </button>
        <div class="dropdown-content">
          <?php 
              if(isset($_SESSION['abc']) || isset($_SESSION['def'])) {
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
      $sql = "select * from product_info where pid=$id";
      $result = mysqli_query($conn, $sql);
      $_SESSION['pid'] = $id;
      while($row = mysqli_fetch_assoc($result)){
        $name = $row['pname'];
        $qty = $row['quantity'];
        $purchaseprice = $row['purchaseprice'];
        $sellingprice = $row['sellingprice'];
        echo "
          <fieldset>
          <legend>Product Info </legend>
          <div style>
          <p> Name : $name </p>
          <p> Quantity : $qty </p>
          <p> Purchase price : $purchaseprice </p>
          <p> Selling price : $sellingprice </p>
          </div>
          </fieldset>
        ";     
      }
      mysqli_close($conn); 
      ?>
  </div>

  <div>
    <fieldset>
      <legend>Update product</legend>
    <form method = "post" action = "update_controller.php">
        New Purchase Price: <input type="number" name="price1" value = "price"> <br>
        New Selling Price: <input type="number" name="price2" value = "price"> <br>
        New Qty: <input type = "number" name="qty" value = "qty"><br>
        <input type="submit" name="update" value = "update"> 
    </form> 
    <a href="delete.php?id=<?=$_GET['id']?>"><center> <button class="button_delete">Delete Product</button> </center></a>
    </fieldset>
  </div>



  <hr  style="color:#2f4454"> </div>
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