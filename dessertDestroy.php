<?php
session_start();
if(session_destroy())
{
    header("Location: CC Online Dessert.php");
}
else
{
    echo '<script type="text/javascript">';
    echo 'alert("Error... $)$ Not Found")';
    echo '</script>';
}
?>
