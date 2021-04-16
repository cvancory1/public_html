<?php

    if($connection=@mysqli_connect('localhost', 'wlucas1', 'wlucas1', 'AlumniDB')){
        ;
    }
    else{
        print '<p>ERROR: connecting to MySQL.</p>';
    }

    // if submit button was cicked 
    if(isset($_POST['but_delete'])){
        echo"here";

        // if there are checkboxes that are checked
        if(isset($_POST['delete'])){
          foreach($_POST['delete'] as $id){
            echo $_POST['delete'];
            $sql = "DELETE FROM Alumni WHERE alumniID = $id";
            echo $sql;
            mysqli_query($connection,$sql);
          }
        }
       
      }

    mysqli_close($connection);
    header( "refresh:1;url=https://lamp.salisbury.edu/~cvancory1/Homepage/test.php" );

?>