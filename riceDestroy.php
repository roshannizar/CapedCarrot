<?php
session_start();
if(session_destroy())
{
    header("Location: CC Online Rice.php");
}
else
{
    echo '<script type="text/javascript">';
    echo 'alert("Error... $)$ Not Found")';
    echo '</script>';
}
?>
