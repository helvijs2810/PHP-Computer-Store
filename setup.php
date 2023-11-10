<?php

function establishConnection($dbPresent){
    $host = "localhost";
    $username = "root";
    $password = "root";
    $database = "acetraining";

    if($dbPresent) $conn = mysqli_connect($host, $username, $password, $database);
    else $conn = mysqli_connect($host, $username, $password);

    return $conn;
}

?>