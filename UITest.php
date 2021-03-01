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

        <div id="menu">
            <button class="openbtn" onclick="openNav()">☰</button>
        </div>

        <div id="main">
            <?php
                // Connect to MySQL Database
                if($connection=@mysqli_connect('localhost', 'wlucas1', 'wlucas1', 'AlumniDB')){
                    ;
                }
                else{
                    print '<p>ERROR: connecting to MySQL.</p>';
                }

                //Query to return contents of table Alumni
                $query="SELECT * FROM Alumni";
                $r=mysqli_query($connection, $query);
                    echo "<table class='styled-table'>
                        <thead>
                            <tr>
                                <th> Alumni ID </th>
                                <th> Birthdate </th>
                                <th> Status </th>
                                <th> Email </th>
                                <th> Phone Number </th>
                                <th> First Name </th>
                                <th> Middle Name </th>
                                <th> Last Name </th>
                                <th> Address Line 1 </th>
                                <th> City </th>
                                <th> State </th>
                                <th> Country/Region </th>
                                <th> Zipcode </th>
                            </tr>
                        </thead>";

                    while($row=mysqli_fetch_array($r)){
                        echo "<tr>";
                        echo "<td>" . $row['alumniID'] . "</td>";
                        echo "<td>" . $row['birthdate'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['phoneNumber'] . "</td>";
                        echo "<td>" . $row['firstName'] . "</td>";
                        echo "<td>" . $row['middleName'] . "</td>";
                        echo "<td>" . $row['lastName'] . "</td>";
                        echo "<td>" . $row['addressline1'] . "</td>";
                        echo "<td>" . $row['city'] . "</td>";
                        echo "<td>" . $row['state'] . "</td>";
                        echo "<td>" . $row['countryRegion'] . "</td>";
                        echo "<td>" . $row['zipcode'] . "</td>";
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



