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
          foreach($_POST['delete'] as $deleteid){
      
            $sql = "DELETE FROM Alumni WHERE alumniID = $id";
            echo $sql;
            mysqli_query($connection,$sql);
          }
        }
       
      }

    // $number = count ($_POST)["delete"];
    // echo "$number";

    // echo "here";
    // // echo $_POST['checkbox'] ;
    // // echo $_POST['delete'];
    // // echo $_POST['delete'][0];

    // echo $_POST['delete[]'] ;

    // echo $_POST['submit'];


    // if(isset($_POST['submit'])){
    //     echo "here1";

    //     if(!empty($_POST['delete'])) {
    //         echo "here2";
    //         echo $_POST['delete'];
            
    //         foreach($_POST['delete'] as $value){
    //             echo "value : ".$value.'<br/>';
    //         }
    
    //     }
    
    // }

    // // // if the form deleteRows was submitted  a
	// if (isset($_POST['submit']) && isset($_POST['delete[]'])){

    // echo "here2";
   

	// 	foreach($_POST['delete'] as $id)
	// 	{
	// 		$id = (int)$id;
    //         echo $id;
	// 		$sql = "DELETE FROM Alumni WHERE alumniID = $id";
    //         echo $sql;

    //         mysqli_query($connection, $sql);

	// 	}
	// }

    mysqli_close($connection);

?>