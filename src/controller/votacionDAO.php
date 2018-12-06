<?php
    function getResultadosDeEncuesta($encuestaId, $conn){
        $sql = "select opcion.opcion, count(votacion.id_opcion) as votos from votacion right join opcion using (id_encuesta,id_opcion) where id_encuesta=$encuestaId group by opcion.opcion";
        $resultSet = $conn->query($sql);
        $result = array();
        if ($resultSet->num_rows > 0) {
            while($row = $resultSet->fetch_assoc()){
                $result[] = $row;
            }
        } else {
            $result = null;
        }
        return $result;  
    }

    function getOpcionesDeEncuesta($encuestaId, $conn){
        $sql = "select * from opcion where id_encuesta=$encuestaId";
        $resultSet = $conn->query($sql);
        $result = array();
        if ($resultSet->num_rows > 0) {
            while($row = $resultSet->fetch_assoc()){
                $result[] = $row;
            }
        } else {
            $result = null;
        }
        return $result;  
    }
    
    function crearVotacion($encuestaId, $opcionId, $matricula, $conn){
        $result = false;

        $sql_verifica = "select * from votacion where id_encuesta = $encuestaId and matricula = '$matricula'";

        $resultSet = $conn->query($sql_verifica);
        if($resultSet->num_rows == 0) {
            $sql = "INSERT INTO votacion values($encuestaId, $matricula, $opcionId, default)";
            if($conn->query($sql)) {
                $result = true;
            }
            
        } else {
            $sql = "UPDATE votacion set id_opcion = $opcionId where matricula = '$matricula' and id_encuesta = $encuestaId";
            if($conn->query($sql)) {
                $result = true;
            }
            
        }
        return $result;
    }

    function getOpcionVotada($encuestaId, $matricula, $conn){
        $sql = "select opcion from opcion where id_opcion = (select id_opcion from votacion where id_encuesta=$encuestaId and matricula='$matricula')";
        $resultSet = $conn->query($sql);
        $result = null;
        if ($resultSet->num_rows == 1) {
            $result = $resultSet->fetch_assoc();
        } else {
            $result = null;
        }
        return $result;  

    }
?>