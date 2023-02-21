<?php
session_start();
require_once 'db.php';
/*if(!isset($_SESSION['usertable'])){
    header('location:index.php');
}*/
$query = "select * from tblproduct";
$d = $conn->query($query);


?>

<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Home Page </title>
<link rel="stylesheet" href="Stylesheet/StyleAC.css">
</head>
<body>

    
    <div class="containter">
        <div class="navbar">
        <div class="logo">
        <a href="index.php"><img src="Stylesheet/Images/logo2.png" width="125px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="index.php" class="gif2">Home |</a></li>
                    <?php if(!isset($_SESSION['usertable'])){?>
                        <li><a href="loginCart.php" class="gif2">Products |</a></li>
                        <?php
  }else{
?>
                    <li><a href="CategoryList.php" class="gif2">Products |</a></li>
                    <?php
  }
?>
                    <li><a href="about.php" class="gif2">About |</a></li>
                    <li><a href="contact.php" class="gif2">Contact |</a></li>
                    
                    <?php if(!isset($_SESSION['usertable'])){?>
                        <li><a href="login.php" class="gif2">Log In</a></li>
                        <?php
  }else{
?>
                    <li><a href="logout.php" class="gif2">Sign Out</a></li>
                    <?php
  }
?>
                </ul>
            </nav>
            <?php if(!isset($_SESSION['usertable'])){?>
                <a href="login.php">  <img src="Stylesheet/Images/cart.png" width="30px" height="30px"></a> 
                        <?php
  }else{
?>
                     <a href="orderSucc.php">  <img src="Stylesheet/Images/cart.png" width="30px" height="30px"></a> 
                    <?php
  }
?>
            <img src="Stylesheet/Images/menu.png" class="menu-icon" onclick="menutoggle()">
            
        </div>
        
    </div>
  

<!-------- doporucene kategorie ----------->
<div class="small-container single-product" >
<div class="container">
    <div class="row">
    <div class="col-2">

<img src="Stylesheet/Images/tophatboii.jpg" alt="" height="400px" width="300px">
</div>
        <div class="col-2">
            <H1>About us</H1>
            <p>Since little i as a creator of this website have admider magician tricks and always loved how they were dressed.
                <br>
                That's why i happened to choose this theme of top hats.
                <br>
                You can expect to find quite a good quantity of top hats, but don't be discouraged, because there are other products
                <br>
                that could fill you needs and i hope that you will happen to find what you are looking for.
            </p>
        </div>
    </div>
</div>
</div>
   <!-------- Footer ----------->
   <div class="footer">
       <div class="container">
           <div class="row">
               <div class="footer-col-1">
                   <h3>Gentleshats</h3>
                   <p>Gentleshats is a project thats going to evolve with time</p>
               </div>
               <div class="footer-col-2">
                <img src="Stylesheet/Images/logo2.png" alt="">
                <p>Copyrights 2022 - David Koukol.</p>
                </div>
                <div class="footer-col-3">
                    <h3>Looking for a Tophat or a suit?</h3>
                    <p>Then the footer is not made for that. Enjoy your browsing</p>
                    </div>
                    <div class="footer-col-4">
                        <h3>Follow Us At</h3>
                        <ul>
                            <li> <a href="facebook.com"> Facebook</a></li>
                            <li><a href="twitter.com"> Twitter</a></li>
                            <li> <a href="instagram.com"> Instagram</a></li>
                            <li> <a href="youtube.com"> Youtube</a></li>
                        </ul>
                        </div>
           </div>
       </div>
   </div>
   <script>
       
       var MenuItems = document.getElementById("MenuItems");

       MenuItems.style.maxHeight = "0px";
       
       function menutoggle() {
           if (MenuItems.style.maxHeight == "0px") {
            MenuItems.style.maxHeight = "200px"
           }
           else{
            MenuItems.style.maxHeight = "0px"
           }
       }
   
   </script>
</body>

</html>