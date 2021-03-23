<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //SMPT Server config
    $mail->SMTPDebug = SMTP::DEBUG_CONNECTION;                  //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'sualumnidatabase@gmail.com';           //SMTP username
    $mail->Password   = 'SUAlumniDB1243!';                      //SMTP password
    $mail->SMTPSecure = 'tls';                                  //Enable TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('sualumnidatabase@gmail.com', 'SU Alumni Database');
    $mail->addAddress('wlucas1@gulls.salisbury.edu');     //Add a recipient
    $mail->addReplyTo('sualumnidatabase@gmail.com');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'SU Alumni Database Password Reset';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>