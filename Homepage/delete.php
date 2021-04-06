<?php

    if($connection=@mysqli_connect('localhost', 'wlucas1', 'wlucas1', 'AlumniDB')){
        ;
    }
    else{
        print '<p>ERROR: connecting to MySQL.</p>';
    }

    echo "here1";

    // if the form deleteRows was submitted 
    // if(isset($_POST['deleteRows'])){
    echo "here2";
        
        if(isset($_POST['delete'])){ // if checkboxs are checked
          foreach($_POST['delete'] as $deleteid){
            // echo "here3";
      
            $deleteUser = "DELETE from Alumni WHERE id='$deleteid' ";
            echo $deleteUser;
            echo"";
            mysqli_query($connection,$deleteUser);
          }
        }
       
    // }

    mysqli_close($connection);

?>