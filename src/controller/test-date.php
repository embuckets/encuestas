<?php
    $abreDate = "2018-10-31";
    $abreTime = "14:04";
    $abreDateObj = date("Y-m-d H:i", strtotime($abreDate . $abreTime));
    var_dump($abreDateObj);
    $today = date("Y-m-d");
    $abre = date('Y-m-d', strtotime("-7 day"));
    $cierra = date('Y-m-d', strtotime("now". ' + 7 days'));
    var_dump($abre);
    var_dump($cierra);
?>