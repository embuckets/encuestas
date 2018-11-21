<?php
   $servername = "localhost";
   $username = "root";
   $password = "1234";
   $dbName = "encuestas";
   $conn = new mysqli($servername, $username, $password, $dbName);

   if ($conn->connect_error) {
      die("Connection failed: ".$conn->connect_error);
   }
   echo "Conectado!\n";
?>