<?php
    // CONNECTING TO THE DATA BASE
    $servername = "127.0.0.1" ;
    $username = "root";
    $password = "";
    $database = "my_reference";

    // CREATE A CONNECTION
    $connect = mysqli_connect($servername, $username,$password, $database);
     
?>