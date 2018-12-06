<?php
    require 'conexion.php';
    require 'votacionDAO.php';
    require 'encuestaDAO.php';

    $conn = getConnection();
    if ($conn->connect_error) {
        echo "error de conexion";
    }
    // $encuestaId = 1;
    
    // $resultados = getResultadosDeEncuesta($encuestaId, $conn);
    // var_dump($resultados);
    // foreach($resultados as $key => $value){
    //     var_dump($key);
    //     var_dump($value);
    // }
    // $json = json_encode($resultados);
    // var_dump($json);
    
    $result = getEncuestasEntre('2018-11-29', '2018-12-13', $conn);
    for ($i = 0 ; $i < count($result); $i++){
        $encuesta = $result[$i];
        if ($opcion = getOpcionVotada($encuesta['id_encuesta'], "2143032439", $conn)){
            var_dump($opcion);
            $encuesta['votado'] = $opcion['opcion'];
            $result[$i] = $encuesta;
        }
    }

    // foreach ($result as $encuesta){
    // var_dump($encuesta);
    //     if ($opcion = getOpcionVotada($encuesta['id_encuesta'], "2143032439", $conn)){
    //         var_dump($opcion);
    //         $encuesta['votado'] = $opcion['opcion'];
    //     }
    // }
    echo json_encode($result);
    $conn->close();
?>