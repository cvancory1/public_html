<?php

//check if username exists
session_start();
$servername = "localhost";
$username = "wlucas1";
$password = "wlucas1";
$dbname = "AlumniDB";

$userExists = 'false';

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['username']) ) {
    $username = $_POST['username'];

    $sql = "select * from Login where username="."'$username'";

    if ($r=mysqli_query($conn, $sql)) {
        $amount = mysqli_num_rows($r);
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    //make sure username exists
    if ($amount == 0) {
        header( "refresh:1;url=https://lamp.salisbury.edu/~cvancory1/Loginpage/forgotPassword.html" );
        $message = "Username Already Exists";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    else {
        $userExists = 'true';
    }

}

mysqli_close($conn);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if($userExists == 'true'){
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //SMPT Server config
        $mail->SMTPDebug = 3;                                       //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'sualumnidatabase@gmail.com';           //SMTP username
        $mail->Password   = 'SUAlumniDB1243!';                      //SMTP password
        $mail->SMTPSecure = 'ssl';                                  //Enable SSL encryption
        $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('sualumnidatabase@gmail.com', 'SU Alumni Database');
        $mail->addAddress($username);     //Add a recipient
        $mail->addReplyTo('sualumnidatabase@gmail.com');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'SU Alumni Database Password Reset';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

        if($mail->send()){
            echo 'Message has been sent';
            header( "refresh:1;url=https://lamp.salisbury.edu/~cvancory1/Loginpage/loginP.html" );
            $message = "Password Reset Has Been Sent";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>