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
            echo "<a class='button' href='logout.php' > <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='36' height='36'><path fill='none' d='M0 0h24v24H0z'/><path d='M5 22a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v3h-2V4H6v16h12v-2h2v3a1 1 0 0 1-1 1H5zm13-6v-3h-7v-2h7V8l5 4-5 4z'/></svg>
            <div class='logout'> LOGOUT</div>
              </a>" ;
           
            if ($_SESSION["privilege"] == "superUser" ||  $_SESSION["privilege"] == "editUser" ){

                echo "<div class='crud_button' >
                <a href='delete.php' id = add  >add</a>
                <a href='animalsUpdate1.php' id= update>Update</a>
                <button class=''  onclick='showDeleteTable()' > Delete </button>
                </div>";
            }

            // todo: add button class to lines above

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
                    <button class='placeholder' title='Email Alumni'> <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24'><path fill='none' d='M0 0h24v24H0z'/><path d='M22 20.007a1 1 0 0 1-.992.993H2.992A.993.993 0 0 1 2 20.007V19h18V7.3l-8 7.2-10-9V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v16.007zM4.434 5L12 11.81 19.566 5H4.434zM0 15h8v2H0v-2zm0-5h5v2H0v-2z' fill='rgba(255,255,255,1)'/></svg></i></button>
                    <button class='placeholder'  title='Delete Data'>  <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24'><path fill='none' d='M0 0h24v24H0z'/><path d='M17 6h5v2h-2v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8H2V6h5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3zm1 2H6v12h12V8zm-9 3h2v6H9v-6zm4 0h2v6h-2v-6zM9 4v2h6V4H9z' fill='rgba(255,255,255,1)'/></svg></button>
                    <button class='placeholder' title='Add Data'> <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24'><path fill='none' d='M0 0h24v24H0z'/><path d='M4 3h16a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm1 2v14h14V5H5zm6 6V7h2v4h4v2h-4v4h-2v-4H7v-2h4z' fill='rgba(255,255,255,1)'/></svg></button>
                    <button class='placeholder'  title='Display Data Charts'> <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24'><path fill='none' d='M0 0H24V24H0z'/><path d='M5 3v16h16v2H3V3h2zm15.293 3.293l1.414 1.414L16 13.414l-3-2.999-4.293 4.292-1.414-1.414L13 7.586l3 2.999 4.293-4.292z' fill='rgba(255,255,255,1)'/></svg></button>
                    
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

    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft= "200px";

    }

    function showDeleteTable() {
        var x = document.getElementById("mainTable");
        var y = document.getElementById("deleteTable");


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


</script>
     


    </body> 


</html>
