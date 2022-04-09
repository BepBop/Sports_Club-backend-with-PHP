<?php session_start();
if (session_status() == PHP_SESSION_ACTIVE) {
    session_unset();
    session_destroy();
    setcookie("Login", "", time() - 3600);
} ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <link href="Sign_Up.css" rel="stylesheet" type="text/css"/>

</head>
<body>
<div id="fullbox">
    <div id="title">
        WELCOME TO URBAN SPORTS CLUB!
    </div>
    <form action="Login.php" method="post">
        <label> E-mail </label>
        <input type="email" name="email"><br>
        <label> Password </label>
        <input type="password" name="password"><br>
        <br><br><br>
        <input type="submit" value="Submit!"
               style="background: white;border: 2px solid darkblue;width: 12vw;cursor:pointer">
    </form>
</div>
</body>
</html>

