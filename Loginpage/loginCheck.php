<?php
session_start();
$servername = "localhost";
$username = "wlucas1";
$password = "wlucas1";
$dbname = "AlumniDB";


$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
} 


if (isset($_POST['username']) and isset($_POST['password'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "select password from Login where username='$username'";

     if ($r=mysqli_query($conn, $sql)) {
          $amount = mysqli_num_rows($r);
     } 
     else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
     }

     //check if username exists
     if($amount == 0){
          header( "refresh:1;url=https://lamp.salisbury.edu/~cvancory1/Loginpage/loginP.html" );
          $message = "Incorrect Username";
          echo "<script type='text/javascript'>alert('$message');</script>";
     }
     else{
          $row=mysqli_fetch_array($r);

          if(password_verify($password, $row['password'])) {
               //TODO: different session variable for each permission level run another sql statement which queries select * from where username =username and then
               // read in permissionlevel and store it . then set rights based on the number

               // since password is already verfied and username exists
               $sql = "select admin from Login where username='$username'";
               echo $sql;

              $row=mysqli_fetch_array($r);
               echo $row;

               $_SESSION['privilege'] = 'superUser';// valid pasword
               
               // if($row['privilege'] == 'viewUser'){
               //      $_SESSION['privilege'] = 'viewUser';// valid pasword


               // }else if($row['privilege'] == 'editUser'){
               //      $_SESSION['privilege'] = 'editUser';// valid pasword


               // }else if($row['privilege'] == 'superUser'){
               //      $_SESSION['privilege'] = 'superUser';// valid pasword


               // }
               print_r($_SESSION);

               header( "refresh:1;url=https://lamp.salisbury.edu/~cvancory1/Homepage/UITest.php" );


          }
          else {
               header( "refresh:1;url=https://lamp.salisbury.edu/~cvancory1/Loginpage/loginP.html" );
               $message = "Incorrect Password";
               echo "<script type='text/javascript'>alert('$message');</script>";
          }
     }
}

mysqli_close($conn);

?>

