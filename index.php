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

<form action = "includes\login.inc.php" method = "post">
    Login:
    <br><input type = "text" name = "username" placeholder = "Username/email" required><br>
    <br><input type = "password"  name = "password" placeholder = "Password" required><br>
    <br><button type = "submit" name = "submit">Login</button>
</form>

<br><a href = "signup.php">Create a new account!</a>

</body>
</html>