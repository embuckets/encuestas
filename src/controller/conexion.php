<?php

// require '../config.php';
function getConnection() {
   
   $host = "localhost";
   $username = "equipo";
   $password = "equipo";
   $dbName = "encuestas";
   $conn = new mysqli($host, $username, $password, $dbName);
   return $conn;

}
   
?>