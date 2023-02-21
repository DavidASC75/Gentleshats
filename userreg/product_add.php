<?php


if(isset($_POST['title'],$_POST['text'],$_POST['kategory'],$_POST['price'],$_FILES["pimage"]))
{
    require_once 'db.php';
    $sql = 'INSERT INTO tblproduct SET title = :title, text = :text, kategory = :kategory, price = :price, image=:pimage, idata=:pimage';
    $stmt = $conn->prepare($sql);
  $stmt->execute([
      ':title' => $_POST['title'],
      ':text' => $_POST['text'],
      ':kategory' => $_POST['kategory'],
      ':price' => $_POST['price'],
     ':pimage' => $_FILES["pimage"]["name"], file_get_contents($_FILES["pimage"]["tmp_name"]),
    ]);
 
    $lastID=$conn->lastInsertId();
    header('Location: adminpanel.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Product Page</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="Stylesheet/style.css">

</head>
<body>
  
<div class="header">
    
    <div class="containter">
        <div class="navbar">
            <div class="logo">
            <a href="admin.php">     <img src="Stylesheet/Images/logo.jpg" width="125px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="admin.php" class="gif2">Home |</a></li>
                    <li><a href="CategoryListA.php?kategory=tophat" class="gif2">Products</a></li>
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
          <div>
            <h1>Add Product</h1>
          </div>          
          <div class="form-group">
            <form  method="POST" enctype="multipart/form-data">
              <label for="title" >  Title: </label>
             
                <input id="title" type="text" name="title" class="form-control">
                </div>
              <br>
              <div class="form-group">
              <label for="text">
                Text:
                </label>
                <input id="text" type="text" name="text" class="form-control">
             
              </div>
              <br>
              <div class="form-group">
              <label>
                Cat : 
                <input id="kategory" type="text" name="kategory" class="form-control">
              </label>
              </div>
              <br>
              <div class="form-group">
              <label>
                Cost: 
                <input id="price" type="text" name="price" class="form-control">
              </label>
              </div>
              <br>
              <div class="form-group">
              Image:
              <br>
              <input id="pimage" type="file" name="pimage" required>
              </div>
              <br>
              <input type="submit" name="submit" value="Upload">
             
            </form>
           
          
        </div>
      </div>
      </div>
    </div>


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