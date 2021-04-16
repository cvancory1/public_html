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


   
    // logout button TODO move into the session variable if stmt
    //  echo "<div class='profile'>
    //     <!-- <button class='button'>  </button> -->
    //     <a href='logout.php'>Log Out</a>
    //     </div>";

        echo "<div id='main'>";


        print_r($_SESSION['privilege']);
        
        if ($_SESSION["privilege"] == "superUser" ||  $_SESSION["privilege"] == "editUser" || $_SESSION["privilege"] == "viewUser") {
           
            echo "<div class='navigation'>
                <a class='button' href=' >
              <div class='logout'>LOGOUT</div>
                </a>
              </div>";
           
            if ($_SESSION["privilege"] == "superUser" ||  $_SESSION["privilege"] == "editUser" ){
                echo "<div class='crud_button' >
                <a href='delete.php' id = add  >add</a>
                <a href='animalsUpdate1.php' id= update>Update</a>
                <button class=''  onclick='showDeleteTable()' > Delete </button>
                </div>";
            }

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


                    <br> <br> <br> <br>
                
                
                ";
            echo "<div id='mainTable' >";
                include 'AlumniTable.php';
                    
            echo "</div>"; // end of mainTable k


    

            echo "<div id='deleteTable'  style='display:none;' >";
            include 'testingdelete.php';
            
            echo "</div>"; // end of table shown for deleting  class
            


    echo "</div>"; // end of webpage class


        // }
    }//end "if" privlege

 

?>

<script type="text/javascript">

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
        // document.getElementById("deleteTable").style.marginLeft = "250px";

    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
        // document.getElementById("deleteTable").style.marginLeft= "0";

    }

    function showDeleteTable() {
        var x = document.getElementById("mainTable");
        var y = document.getElementById("deleteTable");
        // var z = document.getElementById("mySidebar")


        if (x.style.display === "none") { 
            x.style.display = "block";
            y.style.display = "none";
            // z.style.display = "block";
        } else {
            x.style.display = "none";
            y.style.display = "block";
            // z.style.display = "none";

        }



    }

    // $(document).ready(function(){
    //     $('#submit').click(function(){            
    //        $.ajax({  
    //             url:"delete.php",  
    //             method:"POST",  
    //             data:$('#alumniDelete').serialize(),  
    //             success:function(data)  
    //             {  
    //                  alert(data);  
    //                  $('#alumniDelete')[0].reset();
    //             }  
    //        });  
    //   });
    // });

</script>
     


    </body> 


</html>
