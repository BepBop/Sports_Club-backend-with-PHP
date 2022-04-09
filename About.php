<?php session_start();
if (!$_SESSION['logged'] || !isset($_COOKIE['Login'])) header('Location: http://localhost/Sports_Club/Login_HTML.php'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
          name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <link href="Logo.svg" rel="icon"
          type="image/x-icon"/>
    <title>About Us</title>
    <link href="About.css" rel="stylesheet">
    <link href="fullpage.css" rel="stylesheet" type="text/css"/>
    <style>
        @font-face {
            font-family: Gilroy-Bold;
            src: url("Gilroy-Bold.ttf");
        }

        #new {
            display: flex;
            justify-content: flex-end;
            padding: 2% 2% 0 2%;
            color: #000e8d;
            font-size: 2em;
            font-weight: bold;
            font-family: Gilroy-Bold, sans-serif;
        }

        #new a {
            text-decoration: none;
        }
    </style>
</head>
<body>

<div id="fullpage">
    <div class="section" data-anchor="1">
        <div id="new"><a href="Login_HTML.php">Log Out!</a></div>
        <div class="Intro">
            <div class="about">Welcome <?php echo $_SESSION['name'] ?></div>
        </div>
    </div>

    <div class="section" data-anchor="2">
        <div class="essay">
            <div class="e">
                What began as an opportunity to bring sports to urban masses has evolved into coaching
                athletes at professional level.
                <br> <br>
                You are registered as <?php echo $_SESSION['name'] ?> with the following details: <br>
                <?php echo $_SESSION['email'] ?> & <?php echo $_SESSION['phone'] ?>
            </div>
        </div>
    </div>

    <div class="section" data-anchor="3">
        <div class="container">
            <div class="essay2">
                <img alt="skateboard" src="1.webp">
            </div>
            <div class="essay3" data-anchor="4">
                <div class="essay4">
                    Skateboarding is popular among the youth, that is not only fun but also part of Olympics mow.
                    <br><br><br>
                    300+ hrs of training to offer, We are sure to meet your expectation of professionalism or fun.
                </div>
            </div>
        </div>
    </div>


    <div class="section" data-anchor="4">
        <div class="container">
            <div class="essay3">
                <div class="essay4">
                    Football is an extremely popular sport. Its has extreme open path to professional level.
                    <br><br><br>
                    500+ hrs of training to offer we are ready to meet any challenge.
                </div>
            </div>

            <div class="essay2">
                <img alt="skateboard" src="11.webp">
            </div>
        </div>
    </div>

    <div class="section" data-anchor="5">
        <div class="container">
            <div class="essay2">
                <img alt="skateboard" src="18.webp">
            </div>
            <div class="essay3">
                <div class="essay4">
                    Athletics is a popular way to pro sports and is a great way to meet your fitness goals.
                    <br><br><br>
                    With the best of the best coaches, we are sure to meet your expectations.
                </div>
            </div>
        </div>
    </div>

    <div class="section" data-anchor="6">
        <div class="container">
            <div class="essay3">
                <div class="essay4">
                    Basketball is a popular sport and is a great group activity.
                    <br><br><br>
                    With the best of the best coaches, we are sure to meet your expectations.
                </div>
            </div>
            <div class="essay2">
                <img alt="skateboard" src="26.webp">
            </div>
        </div>
    </div>
</div>

<script src="fullpage.js"></script>

<script>
    new fullpage('#fullpage', {
        autoScrolling: true,
        scrollingSpeed: 600,
    });
</script>
</body>
</html>