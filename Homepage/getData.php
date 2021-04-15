<?php 

        if($connection=@mysqli_connect('localhost', 'wlucas1', 'wlucas1', 'AlumniDB')){
            ;
        }
        else{
            print '<p>ERROR: connecting to MySQL.</p>';
        }

        $query = "select programName , count(programName) from MajoredIn group by programName";
        $r=mysqli_query($connection, $query);


        
        echo "{\"cols\": [{\"id\":\"\",\"label\":\"Program Name\",\"pattern\":\"\",\"type\":\"string\"}, {\"id\":\"\",\"label\":\"Major\",\"pattern\":\"\",\"type\":\"number\"}],\"rows\": [";
     
            
        $amount = mysqli_num_rows($r);
        for( $i=0; $i< $amount-1 ; $i++){
            $row = mysqli_fetch_assoc($r);

            echo "{\"c\":[{\"v\":\"";
            echo $row['programName'];
            echo "\",\"f\":null},{\"v\":";
            echo $row['count(programName)'];
            echo",\"f\":null}]},";

        }

        $row = mysqli_fetch_assoc($r);
        echo "{\"c\":[{\"v\":\"";
        echo $row['programName'];
        echo "\",\"f\":null},{\"v\":";
        echo $row['count(programName)'];
        echo ",\"f\":null}]}] }";

        
        mysqli_close($connection);
?>