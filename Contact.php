<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    /*$mail->SMTPDebug = SMTP::DEBUG_SERVER;*/                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   //Enable SMTP authentication
    $mail->Username = 'tempforphpcselpu@gmail.com';                     //SMTP username
    $mail->Password = 'Zn4qwTZTHk25Ht';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('tempforphpcselpu@gmail.com', 'Urban Sports Club');
    $mail->addAddress(strtolower($_GET['email']), 'Love from USC');     //Add a recipient
    /*    $mail->addAddress('anjaygyan@gmail.com', 'Joe User');     //Add a recipient*/
    /* $mail->addAddress('ellen@example.com');               //Name is optional
     $mail->addReplyTo('info@example.com', 'Information');
     $mail->addCC('cc@example.com');
     $mail->addBCC('bcc@example.com');*/

    //Attachments
    /*$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name*/

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Sports Club Confirmation!';
    $mail->Body = '<b>Thank You!</b> This email confirms your email. <br> Welcome to the family.';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<h1>Confirmation has been sent to registered Email!</h1>';
    echo '<h2>Thank You!</h2>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}