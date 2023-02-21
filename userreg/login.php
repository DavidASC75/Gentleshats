<?php
    session_start();
    $error = false;


    if (isset($_POST['email'],$_POST['password'])){
        require_once 'db.php';

        $sql='SELECT * FROM usertable WHERE email=:email';
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':email' => $_POST['email'],

         ]);
        $user=$stmt->fetch();
              
        if($user === false) {
            $error=true;
        }
    
        if(password_verify($_POST['password'],$user['password'])&& $user['usertype']==1){
            
            $_SESSION['usertable'] = $user;
                session_regenerate_id();
                unset($user['password']);
                unset($user[2]);
                header('location:admin.php');
            }else{
            $_SESSION['usertable'] = $user;
            session_regenerate_id();
            unset($user['password']);
            unset($user[2]);
            header('location:index.php');
        }  
    
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
                <div class="col-md-20 login-left">
                    <h2> Login</h2>
                    <form  method="POST">
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
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                    <div class="mt-4 text-center">
									Don't have an account? <a href="login2.php">Create One</a>
								</div>
                </div>
                
            </div>
        </div>
    </div>
</body>

</html>