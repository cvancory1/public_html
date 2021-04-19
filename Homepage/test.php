<html>
<!DOCTYPE html>
<html lang = "en">


    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" href="dat.css" type="text/css" >
        
    </head>


<body> 

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>



<?php
session_start();

// checks if the user has logged in else directly redirect
if (! isset($_SESSION['privilege'])){
    header( "refresh:1;url=https://lamp.salisbury.edu/~cvancory1/Loginpage/loginP.html" );
    // $_SESSION['LAST_ACTIVITY'] = time();// TODO: deelte 
}




$time = time();
$timeout_duration = 30*60; // 30 min
// $timeout_duration = 600; // 10 sec


/**
* Here we look for the user's LAST_ACTIVITY timestamp. If
* it's set and indicates our $timeout_duration has passed,
* blow away any previous $_SESSION data and start a new one.
 */
if (isset($_SESSION['LAST_ACTIVITY']) && 
   ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    // $message = " Timing out";
    // echo "<script type='text/javascript'>alert('$message');</script>";
    // echo "<script type='text/javascript'>test();</script>";

    session_unset();
    session_destroy();
    session_start();
    header( "refresh:1;url=https://lamp.salisbury.edu/~cvancory1/Loginpage/loginP.html" );

} 
if(isset($_SESSION['LAST_ACTIVITY']) && ($time - $_SESSION['LAST_ACTIVITY']) > ($timeout_duration) -10 ){// on minute before hand warn the user
   
    echo "<script type='text/javascript'>var x = document.getElementByClass('warning');
    x.style.display = 'block'; </script>";


    echo" <div id='warning' style='display:block;'>
    <p >Are you still there? </p>
    <p >Click 'Still Here' to stay logged in</p>
    <button class='button'  onclick='stillHere()' >Still Here </button>
    </div>";


}
$_SESSION['LAST_ACTIVITY'] = $time;

   
    echo "<div id='main'>";


    print_r($_SESSION['privilege']);
    
    if ($_SESSION["privilege"] == "superUser" ||  $_SESSION["privilege"] == "editUser" || $_SESSION["privilege"] == "viewUser") {
        

        echo "
            <div id= 'mySidebar' class= 'sidebar'>
            <a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>×</a>
            <a href='#'>Address</a>
            <a href='#'>Alumni</a>
            <a href='#'>Donated</a>
            <a href='#'>Donation</a>
            <a href='#'>Employer</a>
            <a href='#'>Majored In</a>
            <a href='#'>Minored In</a>
            <a href='#'>Program</a>
            <a href='#'>School</a>
            <a href='#'>Works At</a>
            </div>
        
            <div class='menu'>
            <button class='openbtn' onclick='openNav()'>☰</button>
            <button class='openbtn'  onclick='openNav()' title='Open Sidebar'> <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24'><path fill='none' d='M0 0h24v24H0z'/><path d='M3 3h18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm5 2H4v14h4V5zm2 0v14h10V5H10z' fill='rgba(255,255,255,1)'/>  </svg>  </button>
            <button class='placeholder'onclick='getEmails()'  title='Email Alumni'> <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24'><path fill='none' d='M0 0h24v24H0z'/><path d='M22 20.007a1 1 0 0 1-.992.993H2.992A.993.993 0 0 1 2 20.007V19h18V7.3l-8 7.2-10-9V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v16.007zM4.434 5L12 11.81 19.566 5H4.434zM0 15h8v2H0v-2zm0-5h5v2H0v-2z' fill='rgba(255,255,255,1)'/></svg></i></button>
            <button class='placeholder' onclick='showCharts()' title='Display Data Charts'> <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24'><path fill='none' d='M0 0H24V24H0z'/><path d='M5 3v16h16v2H3V3h2zm15.293 3.293l1.414 1.414L16 13.414l-3-2.999-4.293 4.292-1.414-1.414L13 7.586l3 2.999 4.293-4.292z' fill='rgba(255,255,255,1)'/></svg></button>
            
            
        
        ";
        
            // if the person has access to add delete and update the database 
        if ($_SESSION["privilege"] == "superUser" ||  $_SESSION["privilege"] == "editUser" ){

            echo"
            <button class='placeholder' title='Add Data'> <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24'><path fill='none' d='M0 0h24v24H0z'/><path d='M4 3h16a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm1 2v14h14V5H5zm6 6V7h2v4h4v2h-4v4h-2v-4H7v-2h4z' fill='rgba(255,255,255,1)'/></svg></button>
            <button class='placeholder' onclick='showDeleteTable()' title='Delete Data'>  <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24'><path fill='none' d='M0 0h24v24H0z'/><path d='M17 6h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3zm1 2H6v12h12V8zm-9 3h2v6H9v-6zm4 0h2v6h-2v-6zM9 4v2h6V4H9z' fill='rgba(255,255,255,1)'/></svg></button>
            <button class='placeholder'  title='Edit Data'>  <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24'><path fill='none' d='M0 0h24v24H0z'/><path d='M12.9 6.858l4.242 4.243L7.242 21H3v-4.243l9.9-9.9zm1.414-1.414l2.121-2.122a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414l-2.122 2.121-4.242-4.242z' fill='rgba(255,250,250,1)'/></svg></button>
           
            ";
        }

         // Superuser can add edit users to the database
         if($_SESSION["privilege"] == "superUser"){
            echo "<button class='placeholder'  onclick= 'showUsers()' title='Add Edit Users'>  <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24'><path fill='none' d='M0 0h24v24H0z'/><path d='M14 14.252v2.09A6 6 0 0 0 6 22l-2-.001a8 8 0 0 1 10-7.748zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm6 6v-3h2v3h3v2h-3v3h-2v-3h-3v-2h3z' fill='rgba(255,255,255,1)'/></svg></button>";

         }


        echo " <button class='placeholder' id='signout'  title='Sign Out' onclick='logout()'> <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24'><path fill='none' d='M0 0h24v24H0z'/><path d='M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2a9.985 9.985 0 0 1 8 4h-2.71a8 8 0 1 0 .001 12h2.71A9.985 9.985 0 0 1 12 22zm7-6v-3h-8v-2h8V8l5 4-5 4z' fill='rgba(255,255,255,1)'/></svg> </button>
                </div>
                <br> <br> <br> <br>";
        ?>
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

            <!-- <div align="center"> -->
                <table>
                    <tr>
                        <td>
                            <select class="inputTable" data-target=".tableSelect"  name="inputTable">
                                <option value="alumniID" data-show=".alumniID" selected>Alumni ID</option>
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
                        </td>
                        
                        <td>
                            <div class="tableSelect">
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
                        </td>
                    </tr>
                </table>
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
                    var show = $("option:selected", this).data('show');
                    $(show).removeClass('hide');
                });
            </script>

            <style>
                .hide {
                    display: none;
                }
            </style>

    <?php


        echo "<div id='mainTable' >";
        include 'emailTest.php';
        echo "</div>"; // end of mainTable k

        echo "<div id='totalMajors' style='display:none;' >";
        include 'pie.php';
        echo "</div>"; // shows the pie chart


        echo "<div id='deleteTable'  style='display:none;' >";
        include 'deleteTable.php';
        echo "</div>"; // end of table shown for deleting  class

        echo "<div id='superView'  style='display:none;' >";
        include 'superView.php';
        echo "</div>"; // end of superview div

    echo "</div>"; // end of webpage class


        // }
    }//end "if" privlege


 

?>



       

<script type="text/javascript">

    function logout() {
        window.location="logout.php";
    }

    function test(){
        // var x = document.getElementById("myDIV");
        var x = document.getElementById("warning");
        x.style.display = "block";

        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }

    }

    function stillHere(){
        var x = document.getElementById("warning");
        x.style.display = "none";

        location.reload(); // TODO:reloades the page and resets the session?

      }

    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("main").style.marginLeft= "250";

    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft= "200px";

    }


    function showDeleteTable() {
        var x = document.getElementById("mainTable");
        var y = document.getElementById("deleteTable");
        var z = document.getElementById("superView");
        var d= document.getElementById("totalMajors");

        if (x.style.display === "none") { 
            x.style.display = "block";
            y.style.display = "none";
            superView.style.display = "none";
            d.style.display = "none";

        } else {
            x.style.display = "none";
            y.style.display = "block";
            z.style.display = "none";
            d.style.display = "none";

        }



    }

    // shows the view for SuperUsers only where they can promote users to editUsers or superUsers
    function showUsers() {
        var x = document.getElementById("mainTable");
        var y = document.getElementById("deleteTable");
        var z = document.getElementById("superView");
        var d= document.getElementById("totalMajors");


        if (z.style.display === "none") { 
            x.style.display = "none";
            y.style.display = "none";
            z.style.display = "block";
            d.style.display = "none";
        } else {
            x.style.display = "block";
            y.style.display = "none";
            z.style.display = "none";
            d.style.display = "none";

        }

    }

    function showCharts() {
        var a = document.getElementById("mainTable");
        var b = document.getElementById("deleteTable");
        var c = document.getElementById("superView");
        var d= document.getElementById("totalMajors");


        if (d.style.display === "none") { 
            a.style.display = "none";
            b.style.display = "none";
            c.style.display = "none";
            d.style.display = "block";
        } else {
            a.style.display = "block";
            b.style.display = "none";
            c.style.display = "none";
            d.style.display = "none";

        }

    }

    function getEmails() {
        var myTab = document.getElementById('alumniTable');
        var dummy = document.createElement("textarea");
        document.body.appendChild(dummy);

        //loop through each table row
        for (i=1; i < myTab.rows.length; i++){

            // GET THE CELLS COLLECTION OF THE CURRENT ROW.
            var objCells = myTab.rows.item(i).cells;

            dummy.value = dummy.value + ' ' + objCells.item(3).innerHTML + ';';
        }

        dummy.select();
        document.execCommand("copy");
        document.body.removeChild(dummy);

        alert("All of the emails displayed were copied to your clipboard");
    }

   

 </script>
</body> 


</html>
