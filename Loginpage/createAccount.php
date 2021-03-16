<?php
session_start();
//TODO: hash password, 
//TODO: if unable to create account ECHO print why to the screen

$servername = "localhost";
$username = "wlucas1";
$password = "wlucas1";
$dbname = "AlumniDB";

$acceptedDamain = "@salisbury.edu";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
} 

if (isset($_POST['username']) and isset($_POST['password']) and isset($_POST['confirmPassword'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    
    //make sure substring of last 14 chars of username is @salisbury.edu
    $sub = substr($username, -14);
    if($sub != $acceptedDamain){
          header( "refresh:1;url=https://lamp.salisbury.edu/~cvancory1/Loginpage/createAccount.html" );
          $message = "Username Must Be an SU Faculty Email Address";
          echo "<script type='text/javascript'>alert('$message');</script>";
    }

    else{
          //make sure username does not already exist
          $sql = "select * from Login where username="."'$username'";

          if ($r=mysqli_query($conn, $sql)) {
               $amount = mysqli_num_rows($r);
          }
          else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          
          //make sure username does not already exist
          if ($amount != 0) {
               header( "refresh:1;url=https://lamp.salisbury.edu/~cvancory1/Loginpage/createAccount.html" );
               $message = "Username Already Exists";
               echo "<script type='text/javascript'>alert('$message');</script>";
          }

          else{
               //make sure passwords match... if not links back to the createAccount page
               if($password != $confirmPassword){
                    header( "refresh:1;url=https://lamp.salisbury.edu/~cvancory1/Loginpage/createAccount.html" );
                    $message = "Password and Confirm Password Must Match";
                    echo "<script type='text/javascript'>alert('$message');</script>";
               }

               else{
                    //add new account to Login
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    $sql = "insert into Login (username, password, privilege) values ('$username', '$hashed_password', 'viewUser')";

                    if ($r=mysqli_query($conn, $sql)) {
                         header( "refresh:1;url=https://lamp.salisbury.edu/~cvancory1/Loginpage/loginP.html" );
                    }
                    else {
                         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
               }
          }
    }
}

mysqli_close($conn);

?>