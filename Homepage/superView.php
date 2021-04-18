<!-- Holds the code which displays the username and privelege of all users in the database 
    - calls updatePrivelege.php if the superuser wants to update priveleges
    - is #included in other files  -->

<!DOCTYPE html>
<html lang = "en">

    <header>
        <title> Test UI </title>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" href="dat.css" type="text/css" />
    </header>


    <form method='post' action='updatePrivilege.php'>
    <input type='submit' value='updatePrivilege' name='submit_button'><br><br>
    

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
                            <th> Select User </th>
                            <th> Username </th>
                            <th> Privilege </th>
                        </tr>
                    </thead>";

                while($row=mysqli_fetch_array($r)){
                    echo "<tr>";
                    $username = $row['username'];
                    echo "<td><input type='checkbox' name='username[]' value=$username ></td>";
                    echo "<td>" . $row['username'] . "</td>";

                    // $username = $row['username'];
                    $privilege = $row['privilege'];
                    // echo $username. " ";

                    // echo "privilege "  .$privilege. " ";
                    

                    if($row['privilege'] == 'viewUser'){
                        echo "<td><select name='Privilege[]' class='form-control Privilege_list'><option value='viewUser' selected>viewUser</option><option value='editUser'>editUser</option><option value='superUser'>superUser</option></select></td>";
                        // echo "<input type='hidden' name='Privilege[]' value= 'viewUser' >";
                    }
                    else if($row['privilege'] == 'editUser'){
                        echo "<td><select name='Privilege[]' class='form-control Privilege_list'><option value='viewUser'>viewUser</option><option value='editUser' selected>editUser</option><option value='superUser'>superUser</option></select></td>";
                        // echo "<input type='hidden' name='Privilege[]' value= 'editUser' >";
                        
                    }
                    else if($row['privilege'] == 'superUser'){
                        echo "<td><select name='Privilege[]' class='form-control Privilege_list'><option value='viewUser'>viewUser</option><option value='editUser'>editUser</option><option value='superUser' selected>superUser</option></select></td>"; 
                        // echo "<input type='hidden' name='Privilege[]' value= 'superUser' >";
                        
                    }
                    echo "</tr>";

                    echo "<input type='hidden' name='privilege[]' value= $privilege >";
                }

                echo "</table>";

                mysqli_close($connection);
        ?>

</form>


    </body>



</html>