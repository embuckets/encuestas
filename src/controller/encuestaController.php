<?php
    require 'conexion.php';
    require 'encuestaDAO.php';
    require 'votacionDAO.php';
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $abre = $_GET['abre'];
        $cierra = $_GET['cierra'];
        $matricula = $_SESSION['matricula'];
        
        if ((!isset($cierra)) and (!isset($abre))){
            //valores por default
            $abre = date('Y-m-d', strtotime("-7 day"));
            $cierra = date('Y-m-d', strtotime("+7 day"));
        }
        $conn = getConnection();
        if ($conn->connect_error) {
            echo null;
            $conn->close();
            exit();
        }
        
        $result = getEncuestasEntre($abre, $cierra, $conn);
        for ($i = 0 ; $i < count($result); $i++){
            $encuesta = $result[$i];
            if ($opcion = getOpcionVotada($encuesta['id_encuesta'], "2143032439", $conn)){
                $encuesta['votado'] = $opcion['opcion'];
                $result[$i] = $encuesta;
            }
        }
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
            }
        }
    }
    $conn->close();
?>