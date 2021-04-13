<?php 

        if($connection=@mysqli_connect('localhost', 'wlucas1', 'wlucas1', 'AlumniDB')){
            ;
        }
        else{
            print '<p>ERROR: connecting to MySQL.</p>';
        }

        // $query = "select programName from Program where schoolName = 'Hensen'";
        // $r=mysqli_query($connection, $query);

        // echo "{ \"cols\": [ {\"id\":\"\", \" ";
            
        // $amount = mysqli_num_rows($r);
        // for( $i=0; $i< $amount-1 ; $i++){
        //     $row = mysqli_fetch_assoc($r);
        //     echo "['$row[programName]', 5],";

        // }
        // $row = mysqli_fetch_assoc($r);
        
        // echo "['$row[programName]', 5]]";

        echo  "{\"cols\": [{\"id\":\"\",\"label\":\"Topping\",\"pattern\":\"\",\"type\":\"string\"}, {\"id\":\"\",\"label\":\"Slices\",\"pattern\":\"\",\"type\":\"number\"}],\"rows\": [{\"c\":[{\"v\":\"Mushrooms\",\"f\":null},{\"v\":3,\"f\":null}]},{\"c\":[{\"v\":\"Onions\",\"f\":null},{\"v\":1,\"f\":null}]},{\"c\":[{\"v\":\"Olives\",\"f\":null},{\"v\":1,\"f\":null}]},{\"c\":[{\"v\":\"Zucchini\",\"f\":null},{\"v\":1,\"f\":null}]}, {\"c\":[{\"v\":\"Pepperoni\",\"f\":null},{\"v\":2,\"f\":null}]}] }";
        
       
         mysqli_close($connection);

    

?>