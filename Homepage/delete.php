<?php

    if($connection=@mysqli_connect('localhost', 'wlucas1', 'wlucas1', 'AlumniDB')){
        ;
    }
    else{
        print '<p>ERROR: connecting to MySQL.</p>';
    }

   
        if(isset($_POST["but_delete"]) ) {
            $usersCount = count($_POST["delete"]);
            echo $usersCount;
            for($i=0;$i<$usersCount;$i++) {
                $delete = $_POST['delete'][$i];
                $birthdate = $_POST['birthday'][$i];
                // echo $delete . " ". $birthdate . " ";
                $sql = " DELETE FROM Alumni WHERE alumniID =$delete  AND birthdate = '$birthdate' ";
                // echo $sql;
                $resuli = mysqli_query($connection, $sql);

                
            }
        }
    mysqli_close($connection);
    header( "refresh:5;url=https://lamp.salisbury.edu/~cvancory1/Homepage/test.php" );

?>