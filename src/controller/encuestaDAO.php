<?php 
    function getEncuestasEntre($diasAtras, $diasAdelante, $conn){

        $result = array();
        $sql = "SELECT * FROM encuesta where cierra between now() - interval $diasAtras day and now() + interval $diasAdelante day";
        $resultSet = $conn->query($sql);

        if ($resultSet->num_rows > 0) {
            while ($row = $resultSet->fetch_assoc())
                $result[] = $row;
        } else {
            $result = null;
        }
        return $result;
        
    }

    function crearEncuesta($titulo, $descripcion, $opciones, $abre, $cierra, $conn){
        $result = false;
        $conn->autocommit(FALSE);
        $sql = "INSERT INTO encuesta values(default, '$titulo', '$descripcion', '$abre', '$cierra', default)";

        if ($conn->query($sql)) {
            //pedir id de la nueva encuesta e insertar las opciones 
            $last_id = $conn->insert_id;
            foreach($opciones as $opcion){
                $sql = "INSERT INTO opcion values(default, $last_id, '$opcion')";
                if ($conn->query($sql) === FALSE){
                    $conn->rollback();
                    $conn->autocommit(TRUE);
                    return false;
                }
            }
            $conn->commit();
            $conn->autocommit(TRUE);
            return true;
        } else {
            $conn->rollback();
            $conn->autocommit(TRUE);
            return false;
        }
    }

    function getEncuestaById($encuestaId, $conn){
        $sql = "SELECT * from encuesta where id_encuesta=$encuestaId";
        $resultSet = $conn->query($sql);

        if ($resultSet->num_rows == 1) {
            $result = $resultSet->fetch_assoc();
        } else {
            $result = null;
        }
        return $result;  
    }

?>