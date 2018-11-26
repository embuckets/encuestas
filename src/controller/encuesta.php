<?php
   require 'conexion.php';
   session_start( );

   $sql = "SELECT * FROM encuesta";

   $encuestas = array( );
   $jsonTemp = array( );
   if ($result = $conn->query($sql)) {
      while ($row = $result->fetch_assoc( )) {
         $jsonTemp['titulo'] = $row['titulo'];
         $jsonTemp['descripcion'] = $row['descripcion'];

         $abre = $row['abre'];
         $fecha_abre = date_parse($abre);

         $cierra = $row['cierra'];
         $fecha_cierra = date_parse($cierra);

         $jsonTemp['abre']['year']   = $fecha_abre['year'];
         $jsonTemp['abre']['month']  = $fecha_abre['month'];
         $jsonTemp['abre']['day']    = $fecha_abre['day'];
         $jsonTemp['abre']['hour']   = $fecha_abre['hour'];
         $jsonTemp['abre']['minute'] = $fecha_abre['minute'];
         $jsonTemp['abre']['second'] = $fecha_abre['second'];

         $jsonTemp['cierra']['year']   = $fecha_cierra['year'];
         $jsonTemp['cierra']['month']  = $fecha_cierra['month'];
         $jsonTemp['cierra']['day']    = $fecha_cierra['day'];
         $jsonTemp['cierra']['hour']   = $fecha_cierra['hour'];
         $jsonTemp['cierra']['minute'] = $fecha_cierra['minute'];
         $jsonTemp['cierra']['second'] = $fecha_cierra['second'];

         $jsonObj = json_encode($jsonTemp);
         $encuestas[] = $jsonObj;
      }
   }

   $conn->close( );
?>