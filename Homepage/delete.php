<?php

    if($connection=@mysqli_connect('localhost', 'wlucas1', 'wlucas1', 'AlumniDB')){
        ;
    }
    else{
        print '<p>ERROR: connecting to MySQL.</p>';
    }


    // if the form deleteRows was submitted 
    if(isset($_POST['deleteRows'])){
        echo"here2";

        if(isset($_POST['delete'])){ // if checkboxs are checked
          foreach($_POST['delete'] as $deleteid){
      
            $deleteUser = "DELETE from Alumni WHERE id='.$deleteid'";
            mysqli_query($con,$deleteUser);
          }
        }
       
    }

    mysqli_close($connection);

?>