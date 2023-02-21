<?php 
session_start();

if(empty($_GET['id'])) {
    header('Location: user_edit.php');
    die();
  }
  
require_once 'db.php';
if (isset($_POST['email'], $_POST['name'], $_POST['usertype'])) 
        {
  $sql = 'UPDATE usertable SET email = :email, id = :id, name = :name,
          usertype = :usertype where id = :id';

  $stmt = $conn->prepare($sql);
  $stmt->execute([
      ':email' => $_POST['email'],
      ':name' => $_POST['name'],
      ':usertype' => $_POST['usertype'],
      ':id' => $_GET['id']
    ]);
  header('Location: user_edit.php');
  die();
}
$sql = 'SELECT * FROM usertable WHERE id = :id';
$stmt = $conn->prepare($sql);
$stmt->execute([
    ':id' => $_GET['id']
]);
$user = $stmt->fetch();

if($user === false) {
    header('Location: user_edit.php');
    die();
} 
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
  <link rel="stylesheet" href="Stylesheet/styleEdit.css">

</head>
<body>
<div class="header">
    
    <div class="containter">
        <div class="navbar">
            <div class="logo">
            <a href="admin.php">      <img src="Stylesheet/Images/logo.jpg" width="125px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="home.php" class="gif2">Home |</a></li>
                    <li><a href="" class="gif2">Products |</a></li>
                    <li><a href="aboutA.php" class="gif2">About |</a></li>
                    <li><a href="contactA.php" class="gif2">Contact |</a></li>
                    <li><a href="adminpanel.php" class="gif2">Admin Panel</a></li>
                    <li><a href="logout.php" class="gif2">Sign Out</a></li>
                </ul>
            </nav>
  
            <img src="Stylesheet/Images/menu.png" class="menu-icon" onclick="menutoggle()">
        
    </div>
</div> 
    <!-- Post Content -->
  <article>
    <div class="container">
      <div class="products">
        
      </div>
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div>
          </div>          
          <div>
          <div class="container">
        <div class="login-box">
            <div class="row">
                <div class="col-md-25 login-left">
                    <h2> Edit User</h2>
                    <form method="POST">
                         <div class="form-group">
                            <label for="name">Username</label>
                            <input id="name" type="text" name="name" class="form-control" value="<?= $user['name'] ?>" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="text" name="email" class="form-control" value="<?= $user['email'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="usertype">Usertype</label>
                            <input id="usertype" type="text" name="usertype" class="form-control" value="<?= $user['usertype'] ?>" required data-eye>
                        </div>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>

</table>
          </div>
        </div>
      </div>
    </div>
  </article>

  <hr>


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