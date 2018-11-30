<?php
    require 'conexion.php';
    require 'encuestaDAO.php';
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $diasAtras = $_GET['diasAtras'];
        $diasAdelante = $_GET['diasAdelante'];
        
        if ((!isset($diasAdelante)) and (!isset($diasAtras))){
            //valores por default
            $diasAtras = 7;
            $diasAdelante = 1;
        }
        $conn = getConnection();
        if ($conn->connect_error) {
            echo null;
            $conn->close();
            exit();
        }
        
        //llamar encuestaDAO convertir el resultado en json y hacer echo
        $result = getEncuestasEntre($diasAtras, $diasAdelante, $conn);
        echo json_encode($result);
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $conn = getConnection();
        if ($conn->connect_error) {
            echo "error de conexion";
            $conn->close();
            exit();
        }
        
        $encuestaId = $_POST['encuestaId'];
        $_SESSION['encuestaId'] = $encuestaId;
        $encuesta = getEncuestaById($encuestaId, $conn);
        if($encuesta){
            $cierra = date("Y-m-d H:i:s", strtotime($encuesta['cierra']));
            $hoy = date("Y-m-d H:i:s", strtotime("now"));
            if($cierra < $hoy){
                header("location: ../../resultados.php");
                // header("location: resultadosController.php?encuestaId=$encuestaId");
            }
        }
    }
    $conn->close();
?>