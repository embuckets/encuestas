<?php 
    require 'conexion.php';
    $conn = getConnection();

    if ($conn->connect_error) {
        die("Connection failed: ".$conn->connect_error);
     } 
     echo 'Connection succesful';
     $conn->close();
?>