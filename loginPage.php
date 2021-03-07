<!-- this was originallly from glasfish DB and i altered it... have to change back or replace -->
<!-- TODO: css work - modify so theres a box aroudnthe whole thing 
    
 -->

<!DOCTYPE html> 
<html lang = "en"> 
    <link rel="stylesheet" href="dat.css" type="text/css" />

    <div class= "margin">

     <p class="topBar"> Alumni Database </p>


    </div>

    <body> 

        <div class="loginMain">
            <p class="loginBox" id="login"> Login </p>
            
            <form name="add_name" id="add_name" action="loginCheck.php" method="post">  
    
            <p class="loginBox" id="username"> Username </p>
            <input type="text" id="username"  name = "username"> 
    
    
            <p class="loginBox" id="password"> Password </p>
            <input type="password" id="password"  name = "password">
            
            <br /> <input type="submit"  class = "button"/> 

            
    
        </div>
    
    
    </body> 



</html> 

