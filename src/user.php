<?php
   session_start( );
   $userName = $_SESSION['login_user'];
   echo "<p>".$userName."</p>";
?>