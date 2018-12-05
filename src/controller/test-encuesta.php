<?php
    require 'conexion.php';
    require 'encuestaDAO.php';
    $conn = getConnection();
    $result = getEncuestasEntre('2018-12-06','2018-12-12',$conn);
    var_dump($result);
    $conn->close();
?>