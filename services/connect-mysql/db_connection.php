<?php
    $servername = "localhost";
    $database = "khamphadisan";
    $username = "root";
    $password = "123456";
    $port = 3307;

    // create connection

    $conn = mysqli_connect($servername, $username, $password, $database, $port);

    //Check Connection

    if(!$conn){
        die("Connection failed:" . mysqli_connect_error());
    }else{
    }
?>