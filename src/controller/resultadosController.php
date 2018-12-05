<?php
    require 'conexion.php';
    require 'votacionDAO.php';
    require 'encuestaDAO.php';

    session_start();
    // echo var_dump($_REQUEST);

    $encuestaId = $_SESSION['encuestaId'];
    
    $conn = getConnection();
    if ($conn->connect_error) {
        $error = "Por el momento la Base de Datos no funciona<br>";
        $error += $conn->connect_error;
        $conn->close();
        header('location: ../../index.php');
        exit();
    }

    $encuesta = getEncuestaById($encuestaId, $conn);
    if ($encuesta){
        $titulo = $encuesta['titulo'];
        $descripcion = $encuesta['descripcion'];
        $abre = $encuesta['abre'];
        $cierra = $encuesta['cierra'];
        $opciones = getResultadosDeEncuesta($encuestaId, $conn);
        $result = ["titulo"=>$titulo, "desc"=>$descripcion, "abre"=>$abre, "cierra"=>$cierra, "opciones"=>$opciones];
        echo json_encode($result);
        $conn->close();
    }


    
?>