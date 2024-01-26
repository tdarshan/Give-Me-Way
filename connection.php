<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "cattlehelp";

    $connection = mysqli_connect($host, $user, $pass, $db);

    if($connection)
    {
        // echo "connection Successful";
    }
    else
    {
        // echo "error in connecting database " . mysqli_connect_error($connection);
    }
?>