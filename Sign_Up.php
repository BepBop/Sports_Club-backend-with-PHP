<?php


$number = null;
$email = null;
$name = null;

if (!empty($_POST['name'])) {

    $name = trim(htmlspecialchars($_POST['name']));

    if (strlen($name) < 3) {
        die('<h1>Name should be at least 3letters!</h1>');
    }

    if (!preg_match("/^[A-z ]*$/", $name)) {
        die ('<h1>Only alphabets and whitespace are allowed!</h1>');
    }

    $name = strtoupper($name);

} else die('<h1> Name left empty!</h1>');

if (!empty($_POST['email'])) {

    $email = trim(htmlspecialchars($_POST['email']));

    $email = filter_var($email, FILTER_VALIDATE_EMAIL);

    if ($email === false) {

        die('<h1>Invalid Email!</h1>');
    }

    $email = strtoupper($email);

} else die('<h1> Email left empty!</h1>');

if (!empty($_POST['number'])) {

    $number = trim(htmlspecialchars($_POST['number']));

    if (strlen($_POST['number']) != 10) {
        die('<h1>Invalid Phone Number!</h1>');
    }

    $number = filter_var($number, FILTER_VALIDATE_INT);

    if ($number === false) {

        die('<h1>Invalid Phone Number!</h1>');
    }

} else die(' <h1>Phone Number left empty!</h1>');

if (empty($_POST['password'])) die('<h1>Password left empty!</h1>');

$pass = hash('sha512', $email . $_POST['password'] . 'salt');

$conn = null;

try {
    $conn = new mysqli("127.0.0.1", "root", "", "Sports_Club");

} catch (Exception $e) {
    die("<h1> Connection Error! </h1>" . $e->getMessage());
}

$query = "INSERT INTO Sports_Club.CUSTOMER (EMAIL,PASSWORD,NAME,PHONE) VALUES ('$email','$pass','$name','$number')";
$sql = $conn->prepare($query);

try {
    $sql->execute();
    if ($sql->error) throw new Exception($sql->error);
    header("Location: Login_HTML.php");

} catch (Exception $e) {
    die("<h1>   Email already registered! </h1>" . $e->getMessage());
}
