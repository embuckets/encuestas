<?php
    require 'conexion.php';
    require 'encuestaDAO.php';
    $conn = getConnection();
    $result = getEncuestasEntre(10,1,$conn);
    var_dump($result);
    $conn->close();
?>