<?php
    session_start( );
    require 'conexion.php';
    require 'encuestaDAO.php';

    $conn = getConnection();

    if ($conn->connect_error) {
        $error = "Por el momento la Base de Datos no funciona<br>";
        $error += $conn->connect_error;
        $conn->close();
        header('location: ../../index.php');
        exit();
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        echo var_dump($_REQUEST);

        $titulo = mysqli_real_escape_string($conn, $_POST['titulo']);
        $descripcion = mysqli_real_escape_string($conn, $_POST['desc']); 
        $abreDate = $_POST['abre-date'];
        $abreTime = $_POST['abre-time'];
        $cierraDate = $_POST['cierra-date'];
        $cierraTime = $_POST['cierra-time'];
        $opciones = array();
        if(!isset($_POST['options'])){
            exit();
        }

        foreach ($_POST['options'] as $opcion){
            $opciones[] = $opcion;
        }
        

        $abreDateObj = date("Y-m-d H:i", strtotime($abreDate . $abreTime));
        $cierraDateObj = date("Y-m-d H:i", strtotime($cierraDate . $cierraTime));

        $result = crearEncuesta($titulo, $descripcion, $opciones, $abreDateObj, $cierraDateObj, $conn);
        if ($result){
            header('location: ../../home-admin.php');
        }
    }
    $conn->close();

?>