<?php
    $abreDate = "2018-10-31";
    $abreTime = "14:04";
    $abreDateObj = date("Y-m-d H:i", strtotime($abreDate . $abreTime));
    var_dump($abreDateObj);
?>