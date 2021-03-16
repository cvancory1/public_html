?php
    session_start();
    session_destroy();
    header( "refresh:1;url=https://lamp.salisbury.edu/~cvancory1/Homepage/loginP/html" );
?>