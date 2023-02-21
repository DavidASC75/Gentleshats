<?php 
session_start();

require_once 'db.php';
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link rel="stylesheet" href="Stylesheet/style3.css">
</head>
<body>
<div class="header">
    
    <div class="containter">
        <div class="navbar">
            <div class="logo">
            <a href="admin.php">        <img src="Stylesheet/Images/logo.jpg" width="125px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="admin.php" class="gif2">Home</a></li>
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
  <article>
    <div class="container">
      <div class="products">
        
      </div>
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div>
            <h1>Edit Product</h1>
          </div>          
          <div>
<table border="5" cellpadding="5" align="center" class="table table-bordered text-center">
  <tr>
    <th>Title</th>
    <th>Text</th>
    <th>Kategory</th>
    <th>Price</th>
    <th>Buttons</th>
  </tr>
  <?php foreach($d as $data){?>
    <div class="container">
      
    <tr>
      <td><img src="Stylesheet/Images/<?php echo $data['idata']?>" alt="" width="100" height="150"></td>
      <td><?php echo $data['title'];?></td>
      <td><?php echo $data['text'];?></td>
      <td><?php echo $data['kategory'];?></td>
      <td><?php echo $data['price'];?></td>
      <th><button><a href="productEdit.php?id=<?= $data['id'] ?>">Edit</a></button>&nbsp<button><a href="product_del.php?id=<?= $data['id'] ?>">Delete</a></button></th>

    </tr>
    </div>
<?php
  }
?>

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