<?php 
    function getEncuestasEntre($diasAtras, $diasAdelante, $conn){

        $result = array();
        $sql = "SELECT * FROM encuesta where cierra between now() - interval $diasAtras day and now() + interval $diasAdelante day";
        $resultSet = $conn->query($sql);

        if ($resultSet->num_rows > 0) {
            while ($row = $resultSet->fetch_assoc())
                // $row = $resultSet->fetch_assoc();
                $result[] = $row;
        } else {
            $result = null;
        }
        // $conn->close();
        return $result;
        
    }

?>