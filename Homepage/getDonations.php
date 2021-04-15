<?php 

        if($connection=@mysqli_connect('localhost', 'wlucas1', 'wlucas1', 'AlumniDB')){
            ;
        }
        else{
            print '<p>ERROR: connecting to MySQL.</p>';
        }

        $query = "select schoolName, sum(amount) from Donated natural join (select distinct alumniID, schoolName from MajoredIn natural join Program)Major group by schoolName;";
        $r=mysqli_query($connection, $query);

// //f
//         echo "{\"cols\": [{\"id\":\"\",\"label\":\"School Name\",\"pattern\":\"\",\"type\":\"string\"}, {\"id\":\"\",\"label\":\"Dollars Donated\",\"pattern\":\"\",\"type\":\"number\"}],\"rows\": [";
     
            
//         $amount = mysqli_num_rows($r);
//         for( $i=0; $i< $amount-1 ; $i++){
//             $row = mysqli_fetch_assoc($r);

//             echo "{\"c\":[{\"v\":\"";
//             echo $row['schoolName'];
//             echo "\",\"f\":null},{\"v\":";
//             echo $row['sum(amount)'];
//             echo",\"f\":null}]},";

//         }
// //
//         $row = mysqli_fetch_assoc($r);
//         echo "{\"c\":[{\"v\":\"";
//         echo $row['schoolName'];
//         echo "\",\"f\":null},{\"v\":";
//         echo $row['sum(amount)'];
//         echo ",\"f\":null}]}] }";

echo "{c: [{v: '2015'}, {v: 1170}, {v: 460}, {v: 250}], p: undefined}";
echo "{c: [{v: '2015'}, {v: 1170}, {v: 460}, {v: 250}], p: undefined}";
echo "{c: [{v: '2015'}, {v: 1170}, {v: 460}, {v: 250}], p: undefined}";
echo "{c: [{v: '2015'}, {v: 1170}, {v: 460}, {v: 250}], p: undefined}";


       
         mysqli_close($connection);
?>