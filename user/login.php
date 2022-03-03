<?php
require '../class/function.php';

if(isset($_SESSION["id"])){
    header("Location:listing.php");
}

$login = new login();

// checking the credentials
if(isset($_POST["submit"])){
    $result = $login->login($_POST["usernameemail"], $_POST["password"]);

// returns 1 if its true
if($result == 1){
    $_SESSION["login"] = true;
    $_SESSION[$id] = $login->idUser();
    header("location:listing.php");

}
// worng credential
elseif($result == 10){
    echo
    "<script> alert('Wrong Password'); </script>";
}
// not registered
elseif($result == 100){
echo
"<script> alert('User Not Registered'); </script>";
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,100&display=swap" rel="stylesheet">

</head>

<body>
    <div class="main-body">
<!-- header -->
        <header class="header">
            <div class="title">Library</div>
        </header>
<!-- form -->
        <form class="form" action="" method="post" autocomplete="off">

            <div class="input-group">
                <label>Username or Email</label>
                <input type="text" name="usernameemail" required value=""><br />
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required value=""><br />
            </div>

            <input class="btn" type="submit" name="submit" value="Login">
            <div class="click_here_to_reg">
                <p class="newuser">New User?
                    <a href="registration.php">Click Here to Register</a>
                </p>
            </div>
        </form>

    </div>
</body>

</html>