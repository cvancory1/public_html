<?php 

        if($connection=@mysqli_connect('localhost', 'wlucas1', 'wlucas1', 'AlumniDB')){
            ;
        }
        else{
            print '<p>ERROR: connecting to MySQL.</p>';
        }

        $query = "select programName from Program where schoolName = 'Hensen'";
        $r=mysqli_query($connection, $query);

        echo "[['ProgramName', 'Number'],";

        $amount = mysqli_num_rows($r);
        for( $i=0; $i< $amount-1 ; $i++){
            $row = mysqli_fetch_assoc($r);
            echo "['$row[programName]' , 5], ";

        }
        $row = mysqli_fetch_assoc($r);
        
        echo "['$row[programName]' , 5]]";
       

        // $temp= json_encode($json_array);
        // echo $temp;
        //here
        
        mysqli_close($connection);


        // [['ProgramName', 'Number'],['Biology' , 5], ['Chemistry' , 5], ['Computer Science' , 5], ['Data Science' , 5]
        // var data = google.visualization.arrayToDataTable([
        //     ['Task', 'Hours per Day'],
        //     ['Work',     11],
        //     ['Eat',      2],
        //     ['Commute',  2],
        //     ['Watch TV', 2],
        //     ['Sleep',    7]
        //   ]);
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