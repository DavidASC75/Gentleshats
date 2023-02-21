<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
require_once 'db.php';
$sql = 'SELECT * FROM orders WHERE id = :id';
$stmt = $conn->prepare($sql);
$stmt->execute([
    ':id' => $_GET['id']
]);
$user = $stmt->fetch();
$m = $user['email'];

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.seznam.cz';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'gentleshats@seznam.cz';                     //SMTP username
    $mail->Password   = 'Puf123456';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('gentleshats@seznam.cz', 'MR Gentles');
    $mail->addAddress($m);     //Add a recipient



    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Gentleshats order no.'.$user['id'];
    $mail->Body    = 'Your order'.$user['title'].' is being taken care off and it will be delivered to this address'.$user['city'].', '.$user['street'].' located in: '.$user['state'].' with the cost of: '.$user['price'];
    $mail->AltBody = 'Your order'.$user['title'].' is being taken care off and it will be delivered to this address'.$user['city'].', '.$user['street'].' located in: '.$user['state'].' with the cost of: '.$user['price'];

    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


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
            <img src="Stylesheet/Images/cart.png" width="30px" height="30px">
            <img src="Stylesheet/Images/menu.png" class="menu-icon" onclick="menutoggle()">
            
        </div>
        
    </div>
    <div class="container center">
        <div class="row">
        <div class="col-2">
        <h1 class="order">YOUR ORDER IS FINISHED</h1>
        <a href="product_delete.php?id=<?= $user['id'] ?>"><button class="btn center">Back to cart</button></a>
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