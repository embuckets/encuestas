<?php
   $servername = "localhost";
   $username = "equipo";
   $password = "equipo";
   $dbName = "encuestas";
   $conn = new mysqli($servername, $username, $password, $dbName);

   if ($conn->connect_error) {
      die("Connection failed: ".$conn->connect_error);
   }
?>