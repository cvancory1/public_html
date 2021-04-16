<?php

    if($connection=@mysqli_connect('localhost', 'wlucas1', 'wlucas1', 'AlumniDB')){
        ;
    }
    else{
        print '<p>ERROR: connecting to MySQL.</p>';
    }

    // if submit button was cicked 
    // if(isset($_POST['but_delete'])){

        // if there are checkboxes that are checked
        // if(isset($_POST['delete'])){
        //   foreach($_POST['delete'] as $id and $_POST['birthday'] as $birthday){
        //     //   $birthday = $_POST['birthday'];


        //     $sql = "DELETE FROM Alumni WHERE alumniID = $id AND birthday =  $birthday ";
        //     echo $sql;
        //     mysqli_query($connection,$sql);
        //   }
        // }
    // }

        if(isset($_POST["but_delete"]) ) {
            $usersCount = count($_POST["delete"]);
            echo $usersCount;
            for($i=0;$i<$usersCount;$i++) {
                $delete = $_POST['delete'][$i];
                $birthdate = $_POST['birthday'][$i];
                echo $delete . " ". $birthdate . " ";
                $sql = " DELETE FROM Alumni WHERE alumniID =$delete  AND birthdate = $birthdate ";

                mysqli_query($connection, $sql);
            }
        }
    mysqli_close($connection);
    header( "refresh:5;url=https://lamp.salisbury.edu/~cvancory1/Homepage/test.php" );

?>