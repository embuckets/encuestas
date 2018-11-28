<?php 
// 
function validar($myusername, $mypassword, $conn) {
    // require 'conexion.php';
    // $conn = getConnection();
    $success = false;
    
    // if ($conn->connect_error) {
    //     $conn->close();
    //     return false;
    //     // return false;
    // //    $error = "Por el momento la Base de Datos no funciona<br>";
    // //    $error += $conn->connect_error;
    // //    header('location: ../../index.html');
    // }


    $sql = "SELECT rol FROM rol WHERE id_rol = (select id_rol from login where matricula = '$myusername' and password = '$mypassword')";
    // $sql = "SELECT * FROM login WHERE matricula = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);      
    $count = mysqli_num_rows($result);
    
    if ($count == 1) {
        $success = $row;
        //session_register("myusername");
        //  $_SESSION['login_user'] = $myusername;
        
        //  header('location: ../../home.html');
    } 
    else {
        $success = false;
    //  $error = "Your Login Name or Password is invalid";
    //  header('location: ../../index.html');
    }

    // $conn->close();
    return $success;

}


?>