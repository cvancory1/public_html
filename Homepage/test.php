<html>
<body> 

<?php
    session_start();
    // echo $_SESSION["privilege"];
    print_r($_SESSION['privilege']);
    print_r($_SESSION["privilege"]);
    echo"<p> here</p>";
    echo"<p> <?php $_SESSION["privilege"]?> </p>";

    if ($_SESSION["privilege"] == "superUser") {
        
        echo "<div class='crud >
        <a href='animalsRemove.php'>Delete</a>
        <a href='animalsUpdate1.php'>Update</a>
        <a href='animalsAdd.php'>Add</a>
        </div>";
    }else if ($_SESSION["privilege"] == "editUser"){
        echo "editUser";

    }else if ($_SESSION["privilege"] == "viewUser"){
        echo "viewUser";

    }


?>

<p> hello</p>
        <!-- the operations for superUser and Edit Users -->
     
 <div class="profile">
            <!-- <button class="button">  </button> -->
             <a href='logout.php'>Log Out</a>


 </div>

    </body> 
           
</html>
