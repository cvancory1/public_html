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

               // since password is already verfied and username exists
               $sql = "select privilege from Login where username='$username'";
               $r=mysqli_query($conn, $sql);
               $row=mysqli_fetch_array($r);
          
             
               
               if($row['privilege'] == 'viewUser'){
                    $_SESSION['privilege'] = 'viewUser';// valid pasword


               }else if($row['privilege'] == 'editUser'){
                    $_SESSION['privilege'] = 'editUser';// valid pasword


               }else if($row['privilege'] == 'superUser'){
                    $_SESSION['privilege'] = 'superUser';// valid pasword


               }

               // TODO: UNCOMMENT when finished twith the table views or change names
               // header( "refresh:1;url=https://lamp.salisbury.edu/~cvancory1/Homepage/UITest.php" );
               header( "refresh:1;url=https://lamp.salisbury.edu/~cvancory1/Homepage/test.php" );


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

