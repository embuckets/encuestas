<?php
    function getAlumnoPorMatricula($matricula){
        $result = null;
        require 'conexion.php';
        $conn = getConnection();
        if ($conn->connect_error) {
            $conn->close();
            return null;
        }

        $sql = "SELECT * FROM alumno where matricula = '$matricula'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $result = $row;
        } else {
            $result = null;
        }
        $conn->close();
        return $result;
    }
?>