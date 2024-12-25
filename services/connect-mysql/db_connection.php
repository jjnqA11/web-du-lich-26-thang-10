<?php
    $servername = "localhost";
    $database = "khamphadisan";
    $username = "root";
    $password = "";
    $port = 3306;

    // create connection

    $conn = mysqli_connect($servername, $username, $password, $database);

    //Check Connection

    if(!$conn){
        die("Connection failed:" . mysqli_connect_error());
    }else{
    }
?>