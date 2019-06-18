<?php
    session_start();
    if(session_destroy())
    {
        header("Location: CCSigninAdmin.php");
    }
    else
    {
        echo '<script type="text/javascript">';
        echo 'alert("Error... $)$ Not Found")';
        echo '</script>';
    }
?>
