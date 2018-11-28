<?php
    require 'conexion.php';
    require 'encuestaDAO.php';

    // if($_SERVER["REQUEST_METHOD"] == "GET") {
    //     $diasAtras = $_GET['diasAtras'];
    //     $diasAdelante = $_GET['diasAdelante'];

        if ((!isset($diasAdelante)) and (!isset($diasAtras))){
            //valores por default
            $diasAtras = 7;
            $diasAdelante = 1;
        }
        //llamar encuestaDAO convertir el resultado en json y hacer echo
        $conn = getConnection();
        if ($conn->connect_error) {
            echo null;
            exit();
        }

        $result = getEncuestasEntre($diasAtras, $diasAdelante, $conn);
        echo json_encode($result);
    // }
?>