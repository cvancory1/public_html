<!-- TODO: the last error check is the account is already valid but we dont want to go to a new page n 
sucessfull inputs so we need to handle the sucessful inputs so have all the php needed there  -->
<!-- TODO nest everything in the php tag -->



<!DOCTYPE html> 
<html lang = "en"> 

    <link rel="stylesheet" href="login.css" type="text/css" />
     
     <!-- TODO: see if you can have two submits one that runs the functions and one that sumbits from the funciton correcrlt  -->
<script type="text/javascript">

     function checkPassword(str){
          // at least one number, one lowercase and one uppercase letter
          // at least 8 characters
          var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,32}$/;

          return re.test(str);
     }

     function checkForm(form){

          re = /@salisbury.edu$/;

          if(!re.test(form.username.value)) {
               alert("Error: Username must use SU Email!");
               form.username.focus();
               return false;
          }
          if(form.password.value != "" && form.password.value == form.confirmPassword.value) {
               if(!checkPassword(form.password.value)) {
                    alert("The password you have entered is not valid!");
                    form.password.focus();
                    return false;
               }
          } else {
               alert("Error: Please check that you've entered and confirmed your password!");
               form.password.focus();
               return false;
          }

     
     }


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

<body> 


     <div class="loginMain">
          <p class="topBar"  id="top_header"> Alumni Database </p>

          <p class="loginBox" id="login"> Create Your Alumni Account </p>
          
          <form name="add_name" id="add_name" action="createAccount.php" method="post"  onsubmit="return checkForm(this);">  

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



<?php

session_start();

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
//     $sub = substr($username, -14);
//     if($sub != $acceptedDamain){
//           header( "refresh:1;url=https://lamp.salisbury.edu/~cvancory1/Loginpage/createAccount.html" );
//           $message = "Username Must Be an SU Faculty Email Address";
//           echo "<script type='text/javascript'>alert('$message');</script>";
//     }
//     else{

          // //make sure username does not already exist
          $sql = "select * from Login where username="."'$username'";
          if ($r=mysqli_query($conn, $sql)) {
               $amount = mysqli_num_rows($r);
          }
          else {
               echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          
          //make sure username does not already exist
          if ($amount != 0) {
               header( "refresh:1;url=https://lamp.salisbury.edu/~cvancory1/Loginpage/createAccount.php" );
               $message = "Username Already Exists";
               echo "<script type='text/javascript'>alert('$message');</script>";
          }
          // else{
               //make sure passwords match... if not links back to the createAccount page
               // if($password != $confirmPassword){
               //      header( "refresh:1;url=https://lamp.salisbury.edu/~cvancory1/Loginpage/createAccount.html" );
               //      $message = "Password and Confirm Password Must Match";
               //      echo "<script type='text/javascript'>alert('$message');</script>";
               // }

               else{
                    // add new account to Login

                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    $sql = "insert into Login (username, password, privilege) values ('$username', '$hashed_password', 'viewUser')";

                    if ($r=mysqli_query($conn, $sql)) {
                         $message = "Account was sucessfully created! Redirecting to Login";
                         echo "<script type='text/javascript'>alert('$message');</script>";
                         header( "refresh:1;url=https://lamp.salisbury.edu/~cvancory1/Loginpage/loginP.html" );
                    
                    }
                    else {
                         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
//                }
//           }
           }
}

mysqli_close($conn);

?>