<?php
    require 'conexion.php';
    require 'encuestaDAO.php';
    $conn = getConnection();
    if ($conn->connect_error) {
        echo "error de conexion";
    }
    $encuestaId = 1;
    
    $encuesta = getEncuestaById($encuestaId, $conn);
    if($encuesta){
        $cierra = date("Y-m-d H:i:s", strtotime($encuesta['cierra']));
        date_default_timezone_set('America/Mexico_City');
        $hoy = date("Y-m-d H:i:s", strtotime("now"));
        if($cierra < $hoy){
            echo "cierra < hoy";
            var_dump($cierra);
            var_dump($hoy);
            // header("location: resultadosController.php?encuestaId=$encuestaId");
        }
    }
    $conn->close();
?>