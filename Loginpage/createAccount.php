<!DOCTYPE html> 
<html lang = "en"> 

    <link rel="stylesheet" href="login.css" type="text/css" />
   
    <body> 


        <div class="loginMain">
             <p class="topBar"  id="top_header"> Alumni Database </p>

            <p class="loginBox" id="login"> Create Your Alumni Account </p>
            
            <!-- <form name="add_name" id="add_name" action="createAccount.php" method="post"  onsubmit="return checkForm(this);">   -->
            <form name="add_name" id="add_name"action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
                <input type="text" id="username"  name = "username" placeholder="SU Email" required> 
        
                <br>
                <input type="password" Class="createPassword" id="password"  name = "password" placeholder="Password" minlength = "8" required>
                <input type="password" Class="createPassword" id="confirmPassword"  name = "confirmPassword" placeholder="Confirm Password" minength = "8" required>
                <p class = "descriptiveText">Use 8 or more charachters with at least 1 digit, 1 uppercase and 1 special charachter</p>
                <input type="checkbox" onclick="showPassword()">Show Password
                <br /> <input type="submit"  class = "button" /> 
                <br> <p>
                            <a href= "loginP.html">Back To Sign In</a>

                    </p> 
    
        </div>
    
    
    </body> 
  

</html>
<script>  

function showPassword() {
    var x = document.getElementById("password");
    var y = document.getElementById("confirmPassword");
    
    if (x.type === "password" && y.type === "password" ) {
      x.type = "text";
      y.type = "text";

    } else {
      x.type = "password";
      y.type = "password";

    }
  }

 </script>  



<?php
session_start();
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