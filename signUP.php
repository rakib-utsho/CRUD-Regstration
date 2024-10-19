<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Agdasima:wght@400;700&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/signUP.css">
    <title>Sign UP</title>
</head>
<body>
    <?php
        require('./conection.php');
        if (isset($_POST['signUP_button'])) {
            $firstName=$_POST['firstName'];
            $lastName=$_POST['lastName'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $confPassword=$_POST['confPassword'];
            if(!empty($_POST['firstName'])&& !empty($_POST['lastName']) && !empty($_POST['email'])&& !empty($_POST['password'])){
               if ($password==$confPassword) {
                $p=crud::conect()->prepare('INSERT INTO crudtable(firstName,lastName,email,pass) VALUES(:f,:l,:e,:p)');
                $p->bindValue(':f', $firstName);
                $p->bindValue(':l', $lastName);
                $p->bindValue(':e', $email);
                $p->bindValue(':p', $password);
                $p->execute();
                header('location:login.php');
               }else{
                 echo 'Password dose not match!';
               }
            }
        }

    ?>


<div class="form">
    <div class="title">
        <p>Sign UP Form</p>
    </div>
    <form action="" method="post">
        <input type="text" name="firstName" placeholder="First Name" required>
        <input type="text" name="lastName" placeholder="Last Name" required>
        <input type="email" name="email" placeholder="Enter Your Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <input type="password" name="confPassword" placeholder="Confirm Password" required>
        <input type="submit" value="Sign UP" name="signUP_button" id="signUP">
    </form>
</div>
</body>
</html>
