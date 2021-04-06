<?php

    if($connection=@mysqli_connect('localhost', 'wlucas1', 'wlucas1', 'AlumniDB')){
        ;
    }
    else{
        print '<p>ERROR: connecting to MySQL.</p>';
    }

    echo "here2";
    echo "here1";

    // if the form deleteRows was submitted 
    // if(isset($_POST['deleteRows'])){

        // if(isset($_POST['delete'])){ // if checkboxs are checked
        //   foreach($_POST['delete'] as $deleteid){
      
        //     $deleteUser = "DELETE from Alumni WHERE id='.$deleteid'";
        //     echo $deleteUser;
        //     mysqli_query($con,$deleteUser);
        //   }
        // }
       
    // }

    mysqli_close($connection);

?>