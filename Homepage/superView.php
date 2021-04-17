<!DOCTYPE html>
<html lang = "en">

    <header>
        <title> Test UI </title>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" href="dat.css" type="text/css" />
    </header>

    <body>
        <div id="mySidebar" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
            <a href="#">Address</a>
            <a href="#">Alumni</a>
            <a href="#">Donated</a>
            <a href="#">Donation</a>
            <a href="#">Employer</a>
            <a href="#">Majored In</a>
            <a href="#">Minored In</a>
            <a href="#">Program</a>
            <a href="#">School</a>
            <a href="#">Works At</a>
        </div>

        <div class="menu">
            <button class="openbtn" onclick="openNav()">☰</button>
            <button class="placeholder">X</button>
            <button class="placeholder">X</button>
            <button class="placeholder">X</button>
            <button class="placeholder">X</button>
        </div>

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
        

        <script>
            function openNav() {
                document.getElementById("mySidebar").style.width = "250px";
                document.getElementById("main").style.marginLeft = "250px";
            }

            function closeNav() {
                document.getElementById("mySidebar").style.width = "0";
                document.getElementById("main").style.marginLeft= "0";
            }
        </script>

        </body>

</html>