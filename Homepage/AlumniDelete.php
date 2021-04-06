
<html>
<!DOCTYPE html>
<html lang = "en">

    <header>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" href="dat.css" type="text/css" />
    </header>

<?php

    session_start();


    // echo "<div id='deleteTable>'";
    /*echo"<form name='deleteRows' id='deleteRows' method='post'  action='<?php echo $_SERVER[PHP_SELF]; ?>'>"; 
    */
    // echo"<form name='deleteRows' id='deleteRows' method='post'  action='delete.php' "; 

    if($connection=@mysqli_connect('localhost', 'wlucas1', 'wlucas1', 'AlumniDB')){
        ;
    }
    else{
        print '<p>ERROR: connecting to MySQL.</p>';
    }

    echo"<form name='deleteRows' id='deleteRows' method='post'  action='delete.php' "; 

        //Query to return contents of table Alumni here 
        $query="SELECT * FROM Alumni";
        $r=mysqli_query($connection, $query);
        echo "<table id='alumniTable' class='styled-table'>
            <thead>
                <tr>
                <th> Select </th>
                <th> Alumni ID </th>
                <th> Birthdate </th>
                <th> Status </th>
                <th> Email </th>
                <th> Phone Number </th>
                <th> First Name </th>
                <th> Middle Name </th>
                <th> Last Name </th>
                <th> Street Name </th>
                <th> City </th>
                <th> State </th>
                <th> Country/Region </th>
                <th> Zipcode </th>
            </tr>
        </thead>";

    while($row=mysqli_fetch_array($r)){
        echo "<tr>";
        $id = $row['alumniID'];
        echo "<td> <input type='checkbox' name='delete[]' value='<?php $id ?>' id='checkbox'></td>";
        echo $id;
        echo "<td>" . $row['alumniID'] . "</td>";
        echo "<td>" . $row['birthdate'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['phoneNumber'] . "</td>";
        echo "<td>" . $row['firstName'] . "</td>";
        echo "<td>" . $row['middleName'] . "</td>";
        echo "<td>" . $row['lastName'] . "</td>";
        echo "<td>" . $row['streetName'] . "</td>";
        echo "<td>" . $row['city'] . "</td>";
        echo "<td>" . $row['state'] . "</td>";
        echo "<td>" . $row['countryRegion'] . "</td>";
        echo "<td>" . $row['zipcode'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    echo "<br /> <input type='submit'  class = 'button' value='Delete Alumni'/>";
    // echo "</form>";
    // echo"here";


    mysqli_close($connection);

    // echo "</div>"; // end of mainTable 
    

?>

</html>
