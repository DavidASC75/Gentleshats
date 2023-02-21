<?php 
  if (isset($_POST['email'],$_POST['password'],$_POST['name'],$_POST['usertype'])){
    require_once 'db.php';

    $sql = 'INSERT INTO usertable SET email = :email, password = :password, 
            name = :name, usertype= :usertype';
    $stmt=$conn->prepare($sql);
    $stmt->execute([
        ':email'=> $_POST['email'],
        ':password'=> password_hash($_POST['password'], PASSWORD_DEFAULT),
        ':name'=> $_POST['name'],
        ':usertype'=> $_POST['usertype'],
    ]);
    header('location:adminpanel.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>User Add</title>


  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="Stylesheet/style.css">

  <style>
    button {
      border: none;
    }
    button:hover {
      color: gray;
    }
    .cont {
      margin-left: 20px;
      display: flex;
    }
  </style>

</head>

<body>

  
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
                    <li><a href="admin.php" class="gif2">Home |</a></li>
                    <li><a href="CategoryListA.php?kategory=tophat" class="gif2">Products |</a></li>
                    <li><a href="aboutA.php" class="gif2">About |</a></li>
                    <li><a href="contactA.php" class="gif2">Contact |</a></li>
                    <li><a href="adminpanel.php" class="gif2">Admin Panel</a></li>
                    <li><a href="logout.php" class="gif2">Sign Out</a></li>
                </ul>
            </nav>
            <img src="Stylesheet/Images/menu.png" class="menu-icon" onclick="menutoggle()">
        </div>
        
    </div>
</div> 

  <!-- Post Content -->
  <div class="container">
        <div class="login-box">
            <div class="row">
                <div class="col-md-25 login-left">
                    <h2> Add a user</h2>
                    <form method="POST">
                         <div class="form-group">
                            <label for="name">Username</label>
                            <input id="name" type="text" name="name" class="form-control" placeholder="Username" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="text" name="email" class="form-control" placeholder="Example@example.com" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" name="password" class="form-control" placeholder="Password" required data-eye>
                        </div>
                        <div class="form-group">
                            <label for="usertype">Usertype</label>
                            <input id="usertype" type="text" name="usertype" class="form-control" placeholder="Usertype" required data-eye>
                        </div>
                        <button type="submit" class="btn btn-primary">Add a user</button>
                    </form>
                   
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