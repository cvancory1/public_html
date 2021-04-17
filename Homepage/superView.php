<!DOCTYPE html>
<html lang = "en">

    <header>
        <title> Test UI </title>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" href="dat.css" type="text/css" />
    </header>

    
    <!-- <?php
            // Connect to MySQL Database
            if($connection=@mysqli_connect('localhost', 'wlucas1', 'wlucas1', 'AlumniDB')){
                ;
            }
            else{
                print '<p>ERROR: connecting to MySQL.</p>';
            }

            //Query to return contents of table Alumni
            $query="SELECT username, privilege FROM Login";
            $r=mysqli_query($connection, $query);
                echo "<table id='alumniTable' class='styled-table'>
                    <thead>
                        <tr>
                            <th> Username </th>
                            <th> Privilege </th>
                        </tr>
                    </thead>";

                while($row=mysqli_fetch_array($r)){
                    echo "<tr>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['privilege'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";

                mysqli_close($connection);
        ?> -->

        <?php
            // Connect to MySQL Database
            if($connection=@mysqli_connect('localhost', 'wlucas1', 'wlucas1', 'AlumniDB')){
                ;
            }
            else{
                print '<p>ERROR: connecting to MySQL.</p>';
            }

            //Query to return contents of table Alumni
            $query="SELECT username, privilege FROM Login";
            $r=mysqli_query($connection, $query);
                echo "<table id='alumniTable' class='styled-table'>
                    <thead>
                        <tr>
                            <th> Username </th>
                            <th> Privilege </th>
                        </tr>
                    </thead>";

                while($row=mysqli_fetch_array($r)){
                    echo "<tr>";
                    echo "<td>" . $row['username'] . "</td>";

                    if($row['privilege'] == 'viewUser'){
                        echo "<td><select name='Privilege[]' class='form-control Privilege_list'><option value='viewUser' selected>viewUser</option><option value='editUser'>editUser</option><option value='superUser'>superUser</option></select></td>";
                    }
                    else if($row['privilege'] == 'editUser'){
                        echo "<td><select name='Privilege[]' class='form-control Privilege_list'><option value='viewUser'>viewUser</option><option value='editUser' selected>editUser</option><option value='superUser'>superUser</option></select></td>";
                    }
                    else if($row['privilege'] == 'superUser'){
                        echo "<td><select name='Privilege[]' class='form-control Privilege_list'><option value='viewUser'>viewUser</option><option value='editUser'>editUser</option><option value='superUser' selected>superUser</option></select></td>"; 
                    }
                    echo "</tr>";
                }

                echo "</table>";

                mysqli_close($connection);
        ?>

        </div>
        

        </body>

</html>