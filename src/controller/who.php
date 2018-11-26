<?php
    $file = popen("/usr/bin/whoami","r");
    //some code to be executed
    echo $file;
    pclose($file);
?>