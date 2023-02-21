<?php 
session_start();
require_once 'db.php';
if(!isset($_SESSION['usertable'])){
    header('location:loginCart.php');
}
$query = "select * from tblproduct";
$d = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Product Page</title>
    <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom fonts for this template -->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

<!-- Custom styles for this template -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="Stylesheet/StyleP.css">

</head>
<body>
<div class="header">
    
    <div class="containter">
        <div class="navbar">
            <div class="logo">
            <a href="index.php">  <img src="Stylesheet/Images/logo2.png" width="125px"></a>
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
            <a href="orderSucc.php">  <img src="Stylesheet/Images/cart.png" width="30px" height="30px"></a> 
            <img src="Stylesheet/Images/menu.png" class="menu-icon" onclick="menutoggle()">
        
    </div>
</div> 
</div>
    <!-- Post Content -->
    <div class="container">
    <div class="row">
        <div class="col-3">
        <a href="CategoryTopHat.php" class="btn">Top Hat</a>
        <a href="CategorySuit.php" class="btn">Suit</a>
      
        <a href="CategoryBoots.php" class="btn">Boots</a></div>
        </div>
                            
        </div>
    
    <div class="testimonial">
       <div class="small-container">
           <div class="row">
    <?php foreach($d as $data){?>
 
               <div class="col-4">
           
    <tr>
        <td ><a href="product.php?id=<?= $data['id'] ?>"><img src="Stylesheet/Images/<?php echo $data['image'];?>" alt="" height="225px"></a></td>
      <td ><?php echo $data['title'];?></td>
      <br>
      
      <td ><?php echo "Category: ".$data['kategory'];?></td>
      <br>
      <td ><?php echo "Price: ".$data['price'];?></td>
      <br>
      <td><a href="product.php?id=<?= $data['id'] ?>"><button class="btn2">Go To Products Page</button></a></td>
      </td>
      

    </tr>
                </div>
                    

<?php
  }
?>
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