<?php
require '../class/function.php';

if(isset($_SESSION["id"])){
    header("Location:listing.php");
}

$login = new login();


if(isset($_POST["submit"])){
    $result = $login->login($_POST["usernameemail"], $_POST["password"]);


if($result == 1){
    $_SESSION["login"] = true;
    $_SESSION[$id] = $login->idUser();
    header("location:listing.php");

}
elseif($result == 10){
    echo
    "<script> alert('Wrong Password'); </script>";
}
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

</head>

<body>
    <h2>Login</h2>

    <form class="" action="" method="post" autocomplete="off">
    
    <div class="input-group">
            <label>Name</label>
            <input type="text" name="usernameemail" required value=""><br />
    </div>
    <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" required value=""><br />
    </div>
    <input class="btn" type="submit" name="submit" value="Login">
    </form>
    <br>
    <a href="registration.php">Click Here to Registor</a>
</body>

</html>