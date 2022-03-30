<?php
    $severname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "registration_system";

    $conn= mysqli_connect($severname, $username, $password, $dbname);

    if(!$conn){
        die("connection failed" .mysqli_connect_error());

    } else {
        echo "conected successfully";
    }

?>