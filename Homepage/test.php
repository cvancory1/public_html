<?php
    session_start();

?>


        <!-- the operations for superUser and Edit Users -->
        <?php   
        if ($_SESSION["privilege"] == "superUser") {
        
            echo "<div class='crud >
            <a href='animalsRemove.php'>Delete</a>
            <a href='animalsUpdate1.php'>Update</a>
            <a href='animalsAdd.php'>Add</a>
            </div>";
        }else if ($_SESSION["privilege"] == "editUser"){

        }
        ?>

           
</html>
