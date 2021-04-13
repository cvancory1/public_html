<?php 

        if($connection=@mysqli_connect('localhost', 'wlucas1', 'wlucas1', 'AlumniDB')){
            ;
        }
        else{
            print '<p>ERROR: connecting to MySQL.</p>';
        }

        $query = "select programName from Program where schoolName = 'Hensen'";
        $r=mysqli_query($connection, $query);

        $json_array = array();  
        while($row = mysqli_fetch_assoc($r))  
        {  
            $json_array[] = $row;  
            

        }  

        $temp= json_encode($json_array);
        echo $temp;
        
        mysqli_close($connection);

?>