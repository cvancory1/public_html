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

        <?php
           if ($_SESSION["admin"] == "admin") {
    
                echo "<div   <a href='#'>Address</a>
                </div>";
            }


            
        ?>
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

            <!-- selector -->
            <div align="center" >
                <select class="inputTable" data-target=".tableSelect"  name="inputTable">
                    <option value="alumniID" data-show=".alumniID">Alumni ID</option>
                    <option value="birthdate" data-show=".birthdate">Birthdate</option>
                    <option value="status" data-show=".status">Status</option>
                    <option value="email" data-show=".email">Email</option>
                    <option value="phoneNumber" data-show=".phoneNumber">Phone Number</option>
                    <option value="firstName" data-show=".firstName">First Name</option>
                    <option value="middleName" data-show=".middleName">Middle Name</option>
                    <option value="lastName" data-show=".lastName">Last Name</option>
                    <option value="streetName" data-show=".streetName">Street Name</option>
                    <option value="city" data-show=".city">City</option>
                    <option value="state" data-show=".state">State</option>
                    <option value="countryRegion" data-show=".countryRegion">Country/Region</option>
                    <option value="zipcode" data-show=".zipcode">Zipcode</option>
                </select>
                
                <!-- search bar -->
                <div class="tableSelect" id = tableTest>
                    <div class="alumniID hide"><input type="text" id="alumniIDInput" class="box" onkeyup="filterTable(this);" name="alumniID" placeholder="Search for Alumni ID..."></div>
                    <div class="birthdate hide"><input type="text" id="birthdateInput" class="box" onkeyup="filterTable(this);" name="birthdate" placeholder="Search for Birthdate..."></div>
                    <div class="status hide"><input type="text" id="statusInput" class="box" onkeyup="filterTable(this);" name="status" placeholder="Search for Status..."></div>
                    <div class="email hide"><input type="text" id="emailInput" class="box" onkeyup="filterTable(this);" name="email" placeholder="Search for Email..."></div>
                    <div class="phoneNumber hide"><input type="text" id="phoneNumberInput" class="box" onkeyup="filterTable(this);" name="phoneNumber" placeholder="Search for Phone Number..."></div>
                    <div class="firstName hide"><input type="text" id="firstNameInput" class="box" onkeyup="filterTable(this);" name="firstName" placeholder="Search for First Name..."></div>
                    <div class="middleName hide"><input type="text" id="middleNameInput" class="box" onkeyup="filterTable(this);" name="middleName" placeholder="Search for Middle Name..."></div>
                    <div class="lastName hide"><input type="text" id="lastNameInput" class="box" onkeyup="filterTable(this);" name="lastName" placeholder="Search for Last Name..."></div>
                    <div class="streetName hide"><input type="text" id="streetNameInput" class="box" onkeyup="filterTable(this);" name="streetName" placeholder="Search for Street Name..."></div>
                    <div class="city hide"><input type="text" id="cityInput" class="box" onkeyup="filterTable(this);" name="city" placeholder="Search for City..."></div>
                    <div class="state hide"><input type="text" id="stateInput" class="box" onkeyup="filterTable(this);" name="state" placeholder="Search for State..."></div>
                    <div class="countryRegion hide"><input type="text" id="countryRegionInput" class="box" onkeyup="filterTable(this);" name="countryRegion" placeholder="Search for Country/Region..."></div>
                    <div class="zipcode hide"><input type="text" id="zipcodeInput" class="box" onkeyup="filterTable(this);" name="zipcode" placeholder="Search for Zipcode..."></div>
                </div>
            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
                // waits for the user to click something     
                //       event     selector    data     handler
                $(document).on('change', '.inputTable', function() { 
                    var target = $(this).data('target'); // previous thing selected
                    var show = $("option:selected", this).data('show');// new thing selected
                    $(target).children().addClass('hide');// adds the class hide so the CSS will hide it
                    $(show).removeClass('hide');// removes the hide functionality on the new thing selected
                });

                // triggers the above function before right before the user sees the page
                // without this the user would see all of the textboxs
                $(document).ready(function(){ 
                    
                });
            </script>

            <style>
                .hide {
                    display: none;
                }
            </style>

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
                    echo "<table id='alumniTable' class='styled-table'>
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
                                <th> Street Name </th>
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
