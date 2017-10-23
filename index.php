<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Chat Client</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <?php

    //Scripts for runnning popup boxes
    if(isset($_SESSION['popup']) && $_SESSION['popup']){
        $_SESSION['popup'] = False;
        $message = $_SESSION['popup-message'];
        echo "<script> window.alert('$message')</script>";
    }

    ?>
</head>
<body>

<div class = "page-body">
    <div class = "page-wrapper">
        <form action = "includes/login.inc.php" method = "post">
            <p class = "indexLogo">Chat Client // Admin</p>
            <input type = "text" name = "username" placeholder = "Username / E-mail"  autocomplete="off" required><br>
            <input type = "password"  name = "password" placeholder = "Password" autocomplete="off" required><br>
            <button class="submitButton" type = "submit" name = "submit">Login</button>
        </form>

        <span class="link-left">Not registered? <a href = "signup.php">Create an account</a></span>
        <span class="link-right">Forgot your password? <a href = index.php>Click here to reset</a></span>
    </div>
</div>





</body>
</html>