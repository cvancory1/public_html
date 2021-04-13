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
            echo $row["programName"];
            

        }  

        $temp= json_encode($json_array);
        echo $temp;
        
        mysqli_close($connection);

            // Current
        // [{"programName":"Biology"},{"programName":"Chemistry"},{"programName":"Computer Science"},{"programName":"Data Science"}]
        // 
        
        // GOAL : 
        // {
        //     
        //     "rows": [
        //           {"c":[{"v":"Mushrooms","f":null},{"v":3,"f":null}]},
        //           {"c":[{"v":"Onions","f":null},{"v":1,"f":null}]},
        //           {"c":[{"v":"Olives","f":null},{"v":1,"f":null}]},
        //           {"c":[{"v":"Zucchini","f":null},{"v":1,"f":null}]},
        //           {"c":[{"v":"Pepperoni","f":null},{"v":2,"f":null}]}
        //         ]

        // "cols": [
        //     //           {"id":"","label":"Topping","pattern":"","type":"string"},
        //     //           {"id":"","label":"Slices","pattern":"","type":"number"}
        //     //         ],
        //   }

?>