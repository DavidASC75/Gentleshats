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
<link rel="stylesheet" href="Stylesheet/style.css">
</head>
<body>
<div class="header">
    
    <div class="containter">
        <div class="navbar">
        <div class="logo">
        <a href="index.php"><img src="Stylesheet/Images/logo.jpg" width="125px"></a>
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
  
</div> 
<!-------- doporucene kategorie ----------->
<div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <img src="Stylesheet/Images/Thatboii.jpg" class="offer-img">
                </div>
                <div class="col-2 white">
                    <p class="white">EXCLUSIVE OFFER</p>
                    <h1 class="white">FULL SET</h1>
                    <small class="white">This is the best clothing set you could possibly dream of</small>
                        <a href="loginCart.php" class="btn">Explore more &#8594</a> <a href="#" class="btn">Go back up</a>
                </div>
            </div>
        </div>
    </div>
<div class="categories">
        <div class="small-container"> 
        <h2 class="title">Categories</h2>       
        <div class="row">
            <div class="col-3">
                <a href="CategoryList.php">
                <img src="Stylesheet/Images/black-fur-felt-bowler-hat-christys-with-hunting-pad-christys-devon-size-63-2474-p.png" alt="top hats" height="300px">
                </a>
            </div>
            <div class="col-3">
            <a href="CategoryList.php">
                <img src="Stylesheet/Images/Screenshot_6.png" height="300px">
                </a>
            </div>
            <div class="col-3">
            <a href="CategoryList.php">
                <img src="Stylesheet/Images/Screenshot_1.png" height="300px">
                </a>
            </div>
        </div>  
        </div>
    </div>
<!-------- doporuceny produkt ----------->
    <div class="small-container">
        <h2 class="title">Recommended product</h2>
        <div class="row">
            <div class="col-4">
            <a href="CategoryList.php"> <img src="Stylesheet/Images/Screenshot_pink.png"> </a>
                <h4>Pink Wool Felt Fashion Bowler Hat</h4>
                <div class="rating">

                </div>
                <p>100€</p>
            </div>
        </div>
        <h2 class="title">OTHER PRODUCTS</h2>
        <div class="row">
            <div class="col-4">
            <a href="CategoryList.php">  <img src="Stylesheet/Images/black-fur-felt-melusine-taller-top-hat-christys-76-p.jpg" height="150px"></a>
                <h4>TOP HAT</h4>
                <div class="rating">

                </div>
                <p>100€</p>
            </div>
            <div class="col-4">
            <a href="CategoryList.php">  <img src="Stylesheet/Images/Screenshot_3.png" height="150px"></a>
                <h4>SUIT</h4>
                <div class="rating">

                </div>
                <p>100€</p>
            </div>
            <div class="col-4">
              <a href="CategoryList.php">  <img src="Stylesheet/Images/red.jpg"></a>
                <h4>BOOTS</h4>
                <div class="rating">

                </div>
                <p>100€</p>
            </div>
            <div class="col-4">
            <a href="CategoryList.php">  <img src="Stylesheet/Images/Screenshot_5.png" height="150px"></a>
                <h4>SUIT</h4>
                <div class="rating">

                </div>
                <p>100€</p>
            </div>
        </div>
    </div>
    <!-------- Nabídka ----------->
 
   <!-------- testimonial ----------->
   <div class="testimonial">
       <div class="small-container">
           <div class="row">
               <div class="col-3">
                   <p>I've been apart of Gentleshats since the beginning of the creation and i have to admit
                       its pretty awesome!.</p>
                       <img src="Stylesheet/Images/tophatgrillllll.jpg">
                       <h3>Eylmao</h3>
                    </div>
                    <div class="col-3">
                        <p>I've been invited to play part in Gentleshats as an administrator and i have to say.
                            This site is pretty good.</p>
                            <img src="Stylesheet/Images/wierdboii.jpg">
                            <h3>Rose</h3>
                         </div>
                         <div class="col-3">
                            <p>I've been introduced to this website pretty recently by a good friend of mine
                                and i am liking this website so far keep it up!!
                            </p>
                                <img src="Stylesheet/Images/axi-aimee-tgigiWtLgio-unsplash.jpg">
                                <h3>Tophatboii</h3>
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