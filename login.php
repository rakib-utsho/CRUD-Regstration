<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Agdasima:wght@400;700&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/signUP.css">
    <title>login page</title>
    <style>
        .form{
            width: 300px;
            height:280px;
        }
    </style>
</head>
<body>

<?php
    require('./conection.php');
        if(isset($_POST['login_button'])) {
            $_SESSION['validate']=false;
            $email=$_POST['email'];
            $password=$_POST['password'];
            $p=crud::conect()->prepare('SELECT *FROM crudtable WHERE email=:e AND pass=:p');
            $p->bindValue(':e', $email);
            $p->bindValue(':p', $password);
            $p->execute();
            $p->fetchAll(PDO::FETCH_ASSOC);
            if($p->rowCount()>0){
                $_SESSION['email']=$email;
                $_SESSION['pass']=$password;
                $_SESSION['validate']=true;
                header('location:user.php');
            }else{
                echo 'Make sure that you are registered!';
            }
            
        }

?>


<div class="form">
    <div class="title">
        <p>Login</p>
    </div>
    <form action="" method="post">
        <input type="email" name="email" placeholder="Enter Your Email">
        <input type="password" name="password" placeholder="Enter Password">
        <input type="submit" value="Login" name="login_button" id="login">
    </form>
</div>
</body>
</html>
