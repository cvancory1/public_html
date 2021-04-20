<!-- Holds the code which displays the Alumni table in the database 
    - calls deleteTable.php if the superuser wants to delete Alumni 
    - is #included in other files  -->

<html>
<!DOCTYPE html>
<html lang = "en">


 <form method='post' action='delete.php'>
    <input type='submit' value='Delete' name='but_delete'><br><br>

<?php

        if($connection = @mysqli_connect('localhost', 'wlucas1', 'wlucas1', 'AlumniDB')){
                ;
            }
            else{
                print '<p>ERROR: connecting to MySQL.</p>';
            }

            // echo"<form name='deleteRows' id='deleteRows' method='post'  action='delete.php' "; 

                //Query to return contents of table Alumni here 
                $query="SELECT * FROM Alumni";
                $r=mysqli_query($connection, $query);
                echo "<table id='alumniDelete' class='styled-table'>
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
                $bday = $row['birthdate'];
                echo "<td><input type='checkbox' name='delete[]' value='$id' ></td>";
                echo "<input type='hidden' name='birthday[]' value= $bday >";
 
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

            mysqli_close($connection);

?>

</form>

</html>

