<?php
   require 'conexion.php';
   session_start( );
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $myusername = mysqli_real_escape_string($conn, $_POST['uname']);
      $mypassword = mysqli_real_escape_string($conn, $_POST['psw']); 
      
      $sql = "SELECT matricula, password FROM login WHERE matricula = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);      
      $count = mysqli_num_rows($result);
		
      if ($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;

         header('location: ../../home.html');
      } else {
         $error = "Your Login Name or Password is invalid";
         header('location: ../../index.html');
      }
   }

   $conn->close( );
?>