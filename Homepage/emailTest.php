<!DOCTYPE html>
<html lang = "en">
    <header>
        <title> Test UI </title>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" href="dat.css" type="text/css" />
    </header>

    <body>

    <form action="test.php" method="post">
        <!-- <input type="button" value="Click" id="btntest" />
         -->
         <button class= button value="Click" id="btntest">
            <span class="submit">Submit</span>
            <span class="loading"><i class="fa fa-refresh"></i></span>
            <span class="check"><i class="fa fa-check"></i></span>
        </button>
    </form>
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
                    $email = $row['email'];
                    echo "<td><input type='checkbox' value='$email'></td>";
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

 

    <script>
        function getCheckboxesValues(){
            return [].slice.apply(document.querySelectorAll("input[type=checkbox]"))
                .filter(function(c){ 
                    return c.checked; 
                })

                .map(function(c){
                    return c.value; 
                }).join(";");
        }

        document.getElementById("btntest").addEventListener("click", function(){
            var dummy = document.createElement("textarea");
            document.body.appendChild(dummy);

            var list = getCheckboxesValues()+';';
            dummy.value = list;

            dummy.select();
            document.execCommand("copy");
            document.body.removeChild(dummy);
        });

        // submit button
        const button = document.querySelector('.button');
        const submit = document.querySelector('.submit');

        function toggleClass() {
            this.classList.toggle('active');
        }

        function addClass() {
            this.classList.add('finished');
        }

        button.addEventListener('click', toggleClass);
        button.addEventListener('transitionend', toggleClass);
        button.addEventListener('transitionend', addClass);
    </script>

    </body>
</html>