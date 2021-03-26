<html>
<body> 

<?php
    session_start();
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
            <button class='placeholder'>X</button> 
            <button class='placeholder'>X</button>
            <button class='placeholder'>X</button>
            <button class='placeholder'>X</button>
            </div>

            //  Top right profile button 
            <div class='profile'>
                <!-- <button class='button'>  </button> -->
                 <a href='logout.php'>Log Out</a>
    
            </div>

            <br> <br> <br> <br>
           


        
        ";
    }

    // if ($_SESSION["privilege"] == "superUser") {
        
    //     echo "<div class='crud >
    //     <a href='animalsRemove.php'>Delete</a>
    //     <a href='animalsUpdate1.php'>Update</a>
    //     <a href='animalsAdd.php'>Add</a>
    //     </div>";
    // }else if ($_SESSION["privilege"] == "editUser"){
    //     echo "editUser";

    // }else if ($_SESSION["privilege"] == "viewUser"){
    //     echo "viewUser";

    // }


?>

     
 <div class="profile">
            <!-- <button class="button">  </button> -->
             <a href='logout.php'>Log Out</a>


 </div>

    </body> 
           
</html>
