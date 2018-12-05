<?php
    require 'conexion.php';
    require 'encuestaDAO.php';

    $conn = getConnection();

    if ($conn->connect_error) {
        echo "Error de conexion";
    }
    
    // $opciones = ["opcion1", "opcion2"];

    $result = crearEncuesta("titulo", "descripcion", $opciones, "2018-11-27 14:02", "2018-11-28 14:02", $conn);
    var_dump($result);
    
    $conn->close();
?>