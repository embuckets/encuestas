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
?>