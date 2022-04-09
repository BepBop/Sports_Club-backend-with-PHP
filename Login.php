<?php

if (session_status() == PHP_SESSION_ACTIVE) {
    session_unset();
    session_destroy();
    setcookie("Login", "", time() - 3600);
}

session_start();

$email = null;
$password = null;

if (!empty($_POST['email'])) {

    $email = trim(htmlspecialchars($_POST['email']));

    $email = filter_var($email, FILTER_VALIDATE_EMAIL);

    if ($email === false) {

        die('<h1>Invalid Email!</h1>');
    }

    $email = strtoupper($email);

} else die('<h1> Email left empty!</h1>');

if (empty($_POST['password'])) die('<h1>Password left empty!</h1>');

$pass = hash('sha512', $email . $_POST['password'] . 'salt');

$conn = null;

try {
    $conn = new mysqli("127.0.0.1", "root", "", "Sports_Club");
} catch (Exception $e) {
    die("<h1> Connection Error! </h1>" . $e->getMessage());
}

$query = "SELECT * FROM Sports_Club.CUSTOMER WHERE EMAIL = '$email'";
$sql = $conn->prepare($query);

try {
    $sql->execute();
    $result = $sql->get_result();
    $row = $result->fetch_assoc();
    if ($row['PASSWORD'] == $pass) {
        $_SESSION['name'] = $row['NAME'];
        $_SESSION['phone'] = $row['PHONE'];
        $_SESSION['email'] = $row['EMAIL'];
        $_SESSION['logged'] = true;
        setcookie('Login', $pass, time() + (3600 * 10), "/", false, false);
        header('Location: http://localhost/Sports_Club/About.php');
    } else throw new Exception();

} catch (Exception $e) {
    die("<h1>   Email Password Combination Wrong! </h1>" . $e->getMessage());
}