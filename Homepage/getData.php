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

        {"cols": [{"id":"","label":"Program Name","pattern":"","type":"string"}, {"id":"","label":"Major","pattern":"","type":"number"}],"rows": [{"c":[{"v":"Accounting","f":null},{"v":1,"f":null}]},{"c":[{"v":"Communication","f":null},{"v":1,"f":null}]},{"c":[{"v":"Computer Science","f":null},{"v":2,"f":null}]},{"c":[{"v":"Data Science","f":null},{"v":1,"f":null}]},{"c":[{"v":"Middle East Studies","f":null},{"v":1,"f":null}]},{"c":[{"v":"Social Work","f":null},{"v":1,"f":null}]}] }
        {"cols": [{"id":"","label":"Program Name","pattern":"","type":"string"}, {"id":"","label":"Major","pattern":"","type":"number"}],"rows": [{"c":[{"v":"Fulton","f":null},{"v":10000,"f":null}]},{"c":[{"v":"Health and Human Services","f":null},{"v":7000,"f":null}]},{"c":[{"v":"Hensen","f":null},{"v":11000,"f":null}]},{"c":[{"v":"","f":null},{"v":8000,"f":null}]}] }
         mysqli_close($connection);
?>