<?php
    require 'conexion.php';
    require 'votacionDAO.php';
    $conn = getConnection();
    if ($conn->connect_error) {
        echo "error de conexion";
    }
    $encuestaId = 1;
    
    $resultados = getOpcionVotada(12, "2143032439",$conn);
    var_dump($resultados);
    foreach($resultados as $key => $value){
        var_dump($key);
        var_dump($value);
    }
    $json = json_encode($resultados);
    var_dump($json);
    $conn->close();
?>