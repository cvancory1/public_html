<?php

    if($connection=@mysqli_connect('localhost', 'wlucas1', 'wlucas1', 'AlumniDB')){
        ;
    }
    else{
        print '<p>ERROR: connecting to MySQL.</p>';
    }

    // echo " here";
    if(isset($_POST["submit_button"]) ) {
        $usersCount = count($_POST["username"]);
        // echo $usersCount;
        for($i=0; $i < $usersCount; $i++) {

            $username = $_POST['username'][$i];
            $privilege = $_POST['Privilege'][$i];

            $sql = "UPDATE Login SET privilege= '$privilege' WHERE username= '$username' ";
            // echo $sql;
            mysqli_query($connection, $sql);

        }
    }

    mysqli_close($connection);
    header( "refresh:1;url=https://lamp.salisbury.edu/~cvancory1/Homepage/test.php" );


?>


