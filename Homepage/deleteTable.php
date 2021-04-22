<!-- Holds the code which displays the username and privelege of all users in the database 
    - calls updatePrivelege.php if the superuser wants to update priveleges
    - is #included in other files  -->

    <!DOCTYPE html>
<html lang = "en">

    <header>
        <title> Alumni Database</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" href="dat.css" type="text/css" />
    </header>


    <form method='post' action='updatePrivilege.php'>
    <input type='submit'class= 'submitButton'  value='Update' name='submit_button'>

      
</form>
<!-- as -->



</html>