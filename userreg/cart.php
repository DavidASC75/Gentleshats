<?php
session_start();
require_once 'db.php';
$query = "select * from tblproduct";
$d = $conn->query($query);
if (isset($_POST['email'],$_POST['city'],$_POST['street'],$_POST['state'],$_POST['city'],$_POST['postalcode'],$_POST['title'],$_POST['kategory'],$_POST['price'])){
    require_once 'db.php';

    $sql = 'INSERT INTO orders SET email = :email, city = :city, street = :street, state = :state, postalcode = :postalcode, title = :title, kategory = :kategory, price = :price';
    $stmt=$conn->prepare($sql);
    $stmt->execute([
        ':email'=> $_POST['email'],
        ':city' => $_POST['city'],
        ':street' => $_POST['street'],
        ':state' => $_POST['state'],
        ':postalcode' => $_POST['postalcode'],
        ':title' => $_POST['title'],
        ':kategory' => $_POST['kategory'],
        ':price' => $_POST['price'],
    ]);
    unset($user);
    header('location:orderSucc.php');
}
$sql = 'SELECT * FROM tblproduct WHERE id = :id';
$stmt = $conn->prepare($sql);
$stmt->execute([
    ':id' => $_GET['id']
]);
$user = $stmt->fetch();

if($user === false) {
    header('Location: CategoryList.php');
    die();
} 
$sql = 'SELECT * FROM orders WHERE id = :id';
$stmt = $conn->prepare($sql);
$stmt->execute([
    ':id' => $_GET['id']
]);
$data = $stmt->fetch();

if($data === false) {
    header('Location: CategoryList.php');
    die();
} 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gentelshats | Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="Stylesheet/StyleP.css">
</head>
<body>
<div class="header">
    
    <div class="containter">
        <div class="navbar">
            <div class="logo">
            <a href="admin.php">       <img src="Stylesheet/Images/logo2.png" width="125px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                <li><a href="admin.php" class="gif2">Home |</a></li>
                    <li><a href="CategoryListA.php" class="gif2"> Products |</a></li>
                    <li><a href="aboutA.php" class="gif2">About |</a></li>
                    <li><a href="contactA.php" class="gif2">Contact |</a></li>
                    <li><a href="adminpanel.php" class="gif2"> Admin Panel | </a></li>
                    
                    <li><a href="logout.php" class="gif2">Sign Out</a></li>
                </ul>
            </nav>
            <img src="Stylesheet/Images/menu.png" class="menu-icon" onclick="menutoggle()">
        
    </div>
</div> 
</div>
    <!-- Post Content -->
<div class="small-container single-product" >
    <div class="row">
    <div class="col-2">

    <img src="Stylesheet/Images/<?php echo $user['idata']?>" alt="" width="200px" height="200px">
</div>
<div class="col-2">
<h1><?php echo $user['title'];?></h1>
<p><?php echo "Category: ".$user['kategory'];?></p>
<h4><?php echo "Price: ".$user['price'];?></h4>

</div>
    </div>
</div>
<div class="container">
<form action="" method="POST">
                         <div class="form-group">
                            <label for="city">City</label>
                            <input id="city" type="text" name="city" class="form-control" placeholder="city" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="street">Street</label>
                            <input id="street" type="text" name="street" class="form-control" placeholder="street" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="state">State</label>
                            <input id="state" type="text" name="state" class="form-control" placeholder="state" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="postalcode">Postal code</label>
                            <input id="postalcode" type="number" name="postalcode" class="form-control" placeholder="535 01" required autofocus>
                        </div>
                        <div class="form-group">
                            <input id="title" type="hidden" name="title" class="form-control" value="<?= $user['title'];?>" required>
                            <input id="kategory" type="hidden" name="kategory" class="form-control" value="<?= $user['kategory'];?>" required>
                            <input id="price" type="hidden" name="price" class="form-control" value="<?= $user['price'];?>" required>
                            <input id="email" type="hidden" name="email" class="form-control" value="<?= $_SESSION['usertable']['email'] ?>" required>
                        </div>
   <button type="submit" class="btn btn-primary"> <a href="confirm.php?id=<?= $data['id']?>">ORDER NOW</a></button>
                    </form>
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