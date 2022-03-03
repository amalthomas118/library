<?php

require '../class/function.php';

//adding session
if(isset($_SESSION["id"])){
    header("Location:listing.php");
}

$register = new register();

if(isset($_POST["submit"])){
$result = $register->registration($_POST["name"], $_POST["username"], $_POST["email"], $_POST["password"], $_POST["confirmpassword"]);

// code for alert
if($result == 1){
    echo
    "<script>alert('Registration Successful')</script>";
}
if($result == 10){
    echo
    "<script>alert('Username or Email already exist')</script>";
}
if($result == 100){
    echo
    "<script>alert('Password Does Not Match')</script>";
}
}
?>

<!-- html -->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/style.css">

</head>

<body>

<!-- Header-->
<div class="main-body">
<!-- header -->
        <header class="header">
            <div class="title">Library</div>
        </header>


                <!-- Form -->

    <form class="form" action="" method="post" autocomplete="off">

        <div class="input-group">
            <label>Username or Email</label>
            <input type="text" name="name" required value=""><br />
        </div>

        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" required value=""><br />
        </div>

        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" required value=""><br />
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" required value=""><br />
        </div>

        <div class="input-group">
            <label>Confirm Password</label>
            <input type="password" name="confirmpassword" required value=""><br />
        </div>

        <input class="btn" type="submit" name="submit" value="Sign IN">
    
        <div class="click_here_to_login">
        <p class="loguser" >Already a User?  
    <a href="login.php"> Login</a> </p>
    </div>
    </form>

</body>

</html>