<?php
    session_start();

?>

<!DOCTYPE html>
<!-- TODO : padding because it interferes with tables -->
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

        <!-- features : email  -->
        <div class="menu">
            <button class="openbtn" onclick="openNav()">☰</button>
            <button class="placeholder">X</button> 
            <button class="placeholder">X</button>
            <button class="placeholder">X</button>
            <button class="placeholder">X</button>
        </div>

        <!-- Top right profile button -->
        <div class="profile">
            <!-- <button class="button">  </button> -->
             <a href='logout.php'>Logs Out</a>

        </div>

        
<!--  area between top and table main -->
        <br>
        <br>
        <br>
        <br>
        <div id="main">
            <script type="text/javascript">
                function filterTable(ele) {
                    var id = ele.id;
                    let input = document.getElementById(id);
                    let filter = input.value.toUpperCase();
                    let table = document.getElementById("alumniTable");
                    let tr = table.getElementsByTagName("tr");

                    var index;
                    if (id == "alumniIDInput"){
                        index = 0;
                    }
                    else if (id == "birthdateInput"){
                        index = 1;
                    }
                    else if (id == "statusInput"){
                        index = 2;
                    }
                    else if (id == "emailInput"){
                        index = 3;
                    }
                    else if (id == "phoneNumberInput"){
                        index = 4;
                    }
                    else if (id == "firstNameInput"){
                        index = 5;
                    }
                    else if (id == "middleNameInput"){
                        index = 6;
                    }
                    else if (id == "lastNameInput"){
                        index = 7;
                    }
                    else if (id == "streetNameInput"){
                        index = 8;
                    }
                    else if (id == "cityInput"){
                        index = 9;
                    }
                    else if (id == "stateInput"){
                        index = 10;
                    }
                    else if (id == "countryRegionInput"){
                        index = 11;
                    }
                    else if (id == "zipcodeInput"){
                        index = 12;
                    }

                    for (let i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[index];
                        if (td) {
                            let txt = td.textContent || td.innerText;
                            if (txt.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            }
                            else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                }
            </script>


            <!-- the operations for superUser and Edit Users -->
            <?php   
            if ($_SESSION["privilege"] == "superUser") {
            
                echo "<div class='crud >
                <a href='animalsRemove.php'>Delete</a>
                <a href='animalsUpdate1.php'>Update</a>
                <a href='animalsAdd.php'>Add</a>
                </div>";
            }
            ?>

           
          

            <?php
                // Connect to MySQL Database
                if($connection=@mysqli_connect('localhost', 'wlucas1', 'wlucas1', 'AlumniDB')){
                    ;
                }
                else{
                    print '<p>ERROR: connecting to MySQL.</p>';
                }

                //Query to return contents of table Alumni
                $query="SELECT * FROM Alumni group by firstName";
                $r=mysqli_query($connection, $query);
                    echo "<table id='alumniTable' class='styled-table'>
                        <thead>
                            <tr>

                                <th> Name </th>
                                <th> Alumni ID </th>
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

                        // echo "<td>" . $row['alumniID'] . "</td>";
                        // echo "<td>" . $row['birthdate'] . "</td>";
                        // echo "<td>" . $row['status'] . "</td>";
                        // echo "<td>" . $row['email'] . "</td>";
                        // echo "<td>" . $row['phoneNumber'] . "</td>";
                        // echo "<td>" . $row['firstName'] . "</td>";
                        // echo "<td>" . $row['middleName'] . "</td>";
                        // echo "<td>" . $row['lastName'] . "</td>";
                        // echo "<td>" . $row['streetName'] . "</td>";
                        // echo "<td>" . $row['city'] . "</td>";
                        // echo "<td>" . $row['state'] . "</td>";
                        // echo "<td>" . $row['countryRegion'] . "</td>";
                        // echo "<td>" . $row['zipcode'] . "</td>";

                        // name, email, phoneNumber ,addressLine , birthday, status

                        
                        echo "<td>" . $row['alumniID'] . "</td>";
                        echo "<td>" . $row['firstName'] . "</td>";
                        echo "<td>" . $row['middleName'] . "</td>";
                        echo "<td>" . $row['lastName'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['phoneNumber'] . "</td>";
                        echo "<td>" . $row['streetName'] . "</td>";
                        echo "<td>" . $row['streetName'] . "</td>";
                        echo "<td>" . $row['city'] . "</td>";
                        echo "<td>" . $row['state'] . "</td>";
                        echo "<td>" . $row['countryRegion'] . "</td>";
                        echo "<td>" . $row['zipcode'] . "</td>";
                        echo "<td>" . $row['birthdate'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";


                        

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
