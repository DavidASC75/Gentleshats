<?php
    if (isset($_POST['email'],$_POST['password'],$_POST['name'])){
        require_once 'db.php';

        $sql = 'INSERT INTO usertable SET email = :email, password = :password, 
                name = :name';
        $stmt=$conn->prepare($sql);
        $stmt->execute([
            ':email'=> $_POST['email'],
            ':password'=> password_hash($_POST['password'], PASSWORD_DEFAULT),
            ':name'=> $_POST['name']
        ]);
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gentleshats Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="Stylesheet/Styles.css">
</head>
<body>
    <div class="container">
        <div class="login-box">
            <div class="row">
                <div class="col-md-25 login-left">
                    <h2> Register</h2>
                    <form method="POST">
                         <div class="form-group">
                            <label for="name">Username</label>
                            <input id="name" type="text" name="name" class="form-control" placeholder="Username" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" name="email" class="form-control" placeholder="Example@example.com" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" name="password" class="form-control" placeholder="Password" required data-eye>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                            <div class="mt-4 text-center">
									Already have an account? 
                                    <a href="index.php">Login</a>
							</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>