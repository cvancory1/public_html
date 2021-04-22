<?php
    $servername = "localhost";
    $username = "wlucas1";
    $password = "wlucas1";
    $dbname = "AlumniDB";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $number = count($_POST["AlumniID"]);

    if($number > 0) { 
        for($i=0; $i<$number; $i++) {  
            $output1 = $_POST["AlumniID"][$i];
            $output2 = $_POST["Birthdate"][$i];
            $output3 = $_POST["Status"][$i];
            $output4 = $_POST["Email"][$i];
            $output5 = $_POST["PhoneNumber"][$i];
            $output6 = $_POST["FirstName"][$i];
            $output7 = $_POST["MiddleName"][$i];
            $output8 = $_POST["LastName"][$i];
            $output9 = $_POST["Address"][$i];

            $adrArray = explode(";",$output9);

            $data = "'$output1', '$output2', '$output3', '$output4', '$output5', '$output6', '$output7', '$output8', '$adrArray[0]', '$adrArray[1]', '$adrArray[2]', '$adrArray[3]', '$adrArray[4]'";

            $sql = "INSERT INTO Alumni (alumniID, birthdate, status, email, phoneNumber, firstName, middleName, lastName, streetName, city, state, countryRegion, zipcode) VALUES ($data)";

            if (mysqli_query($conn, $sql)) {
                //echo "New record $i created successfully\n";
                ;
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }

    mysqli_close($conn);
?>