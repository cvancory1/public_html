<!-- Holds the code which displays the username and privelege of all users in the database 
    - calls updatePrivelege.php if the superuser wants to update priveleges
    - is #included in other files  -->


    <form method='post' action='updatePrivilege.php'>
    <input type='submit'class= 'submitButton'  value='Update' name='submit_button'>
    <input type="checkbox" id="select-all"><label for="car">Select All</label>    

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
                    echo "<td> <input type='checkbox' class = 'selectUsername' name='username[]' value=$username ></td>";
                    echo "<td>" . $row['username'] . "</td>";
                    
                    if($row['privilege'] == 'viewUser'){
                        echo "<td><select name='Privilege[]' class='form-control Privilege_list'><option value='viewUser' disabled selected>viewUser</option><option value='editUser'>editUser</option><option value='superUser'>superUser</option></select></td>";
                    
                    }
                    else if($row['privilege'] == 'editUser'){
                        echo "<td><select name='Privilege[]' class='form-control Privilege_list'><option value='viewUser'>viewUser</option><option value='editUser' disabled selected>editUser</option><option value='superUser'>superUser</option></select></td>";
                        
                   
                    }
                    else if($row['privilege'] == 'superUser'){
                        echo "<td><select name='Privilege[]' class='form-control Privilege_list'><option value='viewUser'>viewUser</option><option value='editUser'>editUser</option><option value='superUser' disabled selected>superUser</option></select></td>"; 
                   
                    }
                    echo "</tr>";

                }

                echo "</table>";

                mysqli_close($connection);
        ?>
</form>
<!-- as -->

<script language="JavaScript">
        document.getElementById('select-all').onclick = function() {
            var checkboxes = document.getElementsByName('username[]');
            for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
            }
        }
		</script>

</html>