<!DOCTYPE html>
<html lang = "en">
    <header>
        <title> Test UI </title>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" href="dat.css" type="text/css" />
    </header>

    <body>
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

    <form action="emailTest.php" method="post">
        <!-- <input type="button" value="Click" id="btntest" />
         -->
    <div class="wrapper">
  <button class="" id ="btntest" >
    <span>Submit</span>
    <div class="success">
    <svg xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"  viewBox="0 0 29.756 29.756" style="enable-background:new 0 0 29.756 29.756;" xml:space="preserve">
      
	<path d="M29.049,5.009L28.19,4.151c-0.943-0.945-2.488-0.945-3.434,0L10.172,18.737l-5.175-5.173   c-0.943-0.944-2.489-0.944-3.432,0.001l-0.858,0.857c-0.943,0.944-0.943,2.489,0,3.433l7.744,7.752   c0.944,0.943,2.489,0.943,3.433,0L29.049,8.442C29.991,7.498,29.991,5.953,29.049,5.009z"/>
 </svg>
      </div>
  </button>
</div>
    </form>

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


        let btn = document.querySelector("button");

        btn.addEventListener("click", active);

        function active() {
        btn.classList.toggle("is_active");
        }
    </script>

    </body>
</html>