<?php
    require 'conexion.php';
    require 'votacionDAO.php';
    require 'encuestaDAO.php';

    session_start();
    $conn = getConnection();
    if ($conn->connect_error) {
        $error = "Por el momento la Base de Datos no funciona<br>";
        $error += $conn->connect_error;
        $conn->close();
        header('location: ../../index.php');
        exit();
    }
    // echo var_dump($_REQUEST);
    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $encuestaId = $_SESSION['encuestaId'];
        
    
        $encuesta = getEncuestaById($encuestaId, $conn);
        if ($encuesta){
            $id_encuesta = $encuesta['id_encuesta'];
            $titulo = $encuesta['titulo'];
            $descripcion = $encuesta['descripcion'];
            $abre = $encuesta['abre'];
            $cierra = $encuesta['cierra'];
            $opciones = getOpcionesDeEncuesta($encuestaId, $conn);
            $result = ["id_encuesta"=>$id_encuesta, "titulo"=>$titulo, "desc"=>$descripcion, "abre"=>$abre, "cierra"=>$cierra, "opciones"=>$opciones];
            echo json_encode($result);
        }
        
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        //guardar la votacion
        $encuestaId = $_SESSION['encuestaId'];
        $opcionId = $_POST['opciones'];
        $matricula = $_SESSION['matricula'];
        if (crearVotacion($encuestaId, $opcionId, $matricula, $conn)){
            header("location: ../../home.php");
        } else {

        }


    }
    $conn->close();
    
?>