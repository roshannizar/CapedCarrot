<?php

    $mysql_host="localhost:3307";
    $mysql_user="root";
    $mysql_pass="tankionline";

    $mysql_db="TCC";

    if(!mysql_connect($mysql_host,$mysql_user,$mysql_pass) || !mysql_select_db($mysql_db))
    {
        die(mysql_error());
    }

?>
