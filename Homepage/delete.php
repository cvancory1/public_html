<?php

    if($connection=@mysqli_connect('localhost', 'wlucas1', 'wlucas1', 'AlumniDB')){
        ;
    }
    else{
        print '<p>ERROR: connecting to MySQL.</p>';
    }

    echo "here1";

    // if the form deleteRows was submitted 
	if (isset($_POST['submit']) && isset($_POST['delete'])){

    echo "here2";
    echo $delete[i];

		foreach($_POST['delete'] as $id)
		{
			$id = (int)$id;
            echo $id;
			$sql = "DELETE FROM Alumni WHERE alumniID = $id";
            echo $sql;

            mysqli_query($connection, $sql);

		}
	}
    mysqli_close($connection);

?>