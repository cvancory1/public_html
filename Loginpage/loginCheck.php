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
    
    $sql = "select * from Login where username="."'$username'"." and password="."'$password'";
    //echo $sql;
    //$r = mysqli_query($conn, $sql);
    
    if ($r=mysqli_query($conn, $sql)) {
        $amount = mysqli_num_rows($r);

   } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }

    if ($amount != 0) {

        $_SESSION['admin'] = 'admin';// valid pasword
         header( "refresh:1;url=https://lamp.salisbury.edu/~wlucas1/UITest.php" );
    }
    else {

         header( "refresh:1;url=https://lamp.salisbury.edu/~cvancory1/Loginpage/loginP.html" );
    }
    mysqli_close($conn);

}

?>